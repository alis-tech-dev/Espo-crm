<?php

namespace Espo\Modules\Puppeteer\Tools\Pdf\Puppeteer;

use Espo\Core\Utils\Log;
use Espo\Core\Htmlizer\{
    TemplateRenderer,
    TemplateRendererFactory,
};
use Espo\Core\Utils\Config;
use Espo\Core\Utils\Resource\{
    FileReader,
    FileReader\Params as FileReaderParams,
    PathProvider,
};
use Espo\ORM\Entity;
use Espo\Tools\Pdf\{
    Data,
    Params,
    Template,
};
use Spatie\Browsershot\Browsershot;
use Spatie\Browsershot\Exceptions\HtmlIsNotAllowedToContainFile;
use TCPDF2DBarcode;
use TCPDFBarcode;

class EntityProcessor
{
    private const PUPPETEER_FOLDER = 'puppeteer';

    private const NODE_MODULES_FOLDER = 'node_modules';

    private const BODY_TEMPLATE_FILE = 'body.html';

    public function __construct(
        private readonly TemplateRendererFactory $templateRendererFactory,
        private readonly PathProvider            $pathProvider,
        private readonly FileReader              $fileReader,
        private readonly Config                  $config,
        private readonly ImageSourceProvider     $imageSourceProvider,
        private readonly Log                     $log
    ) {}

    /**
     * @throws HtmlIsNotAllowedToContainFile
     */
    public function processEntity(Browsershot $browsershot, Template $template, Entity $entity, Params $params, Data $data): void
    {
        $renderer = $this->templateRendererFactory
            ->create()
            ->setApplyAcl($params->applyAcl())
            ->setEntity($entity)
            ->setSkipInlineAttachmentHandling()
            ->setData($data->getAdditionalTemplateData());

        $html = $this->renderBody($template, $renderer);

        $browsershot->setHtml($html);

        $this->preparePdf($browsershot, $template, $renderer);
    }

    private function preparePdf(Browsershot $browsershot, Template $template, TemplateRenderer $renderer): void
    {
        $browsershot
			->newHeadless()
            ->noSandbox()
            ->setNodeModulePath($this->getPuppeteerPath())
            ->margins(
                $template->getTopMargin(),
                $template->getRightMargin(),
                $template->getBottomMargin(),
                $template->getLeftMargin(),
            )
            ->showBackground()
            ->showBrowserHeaderAndFooter();

        $pageFormat = $template->getPageFormat();

        if ($pageFormat === 'Custom') {
            $browsershot->paperSize(
                $template->getPageWidth(),
                $template->getPageHeight()
            );
        } else {
            $browsershot->format($pageFormat);
        }

        $browsershot->landscape($template->getPageOrientation() === 'Landscape');

        if ($template->hasHeader()) {
            $headerHtml = $renderer->renderTemplate($template->getHeader());
            $headerHtml = $this->prepareHeaderFooter($headerHtml, 'header');

            $browsershot->headerHtml($headerHtml);
        } else {
            $browsershot->hideHeader();
        }

        if ($template->hasFooter()) {
            $footerHtml = $renderer->renderTemplate($template->getFooter());
            $footerHtml = $this->prepareHeaderFooter($footerHtml, 'footer');

            $browsershot->footerHtml($footerHtml);
        } else {
            $browsershot->hideFooter();
        }
    }

    private function prepareHeaderFooter(string $html, string $id): string
    {
        $html = sprintf('<style>#%s{font-size:12px;}</style><div id="%s">%s</div>', $id, $id, $html);
        $html = $this->handleInlineAttachments($html);
        return str_replace(
            ['{pageNumber}', '{totalPageNumber}'],
            ['<span class="pageNumber"></span>', '<span class="totalPages"></span>'],
            $html
        );
    }

    private function renderBody(Template $template, TemplateRenderer $renderer): string
    {
        $bodyTemplate = $this->fileReader->read(
            self::PUPPETEER_FOLDER . '/' . self::BODY_TEMPLATE_FILE,
            FileReaderParams::create()->withModuleName('Puppeteer'),
        );

        $html = $this->templateRendererFactory
            ->create()
            ->setSkipInlineAttachmentHandling() // important to skip two times
            ->setData([
                'title' => $template->getTitle(),
                'bodyHtml' => $renderer->renderTemplate($template->getBody()),
                'topMargin' => $template->getTopMargin(),
                'rightMargin' => $template->getRightMargin(),
                'bottomMargin' => $template->getBottomMargin(),
                'leftMargin' => $template->getLeftMargin(),
                'fontSize' => $this->config->get('pdfFontSize') ?? 12,
            ])
            ->setTemplate($bodyTemplate)
            ->render();

        return $this->replaceBodyTags($html);
    }

    private function replaceBodyTags(string $html): string
    {
        $html = str_replace('<br pagebreak="true">', '<div style="page-break-after: always;"></div>', $html);
        $html = preg_replace('/src="\@([A-Za-z0-9\+\/]*={0,2})"/', 'src="data:image/jpeg;base64,$1"', $html);
        $html = $this->handleInlineAttachments($html);

        return preg_replace_callback(
            '/<barcodeimage data="([^"]+)"\/>/',
            function ($matches) {
                $dataString = $matches[1];

                $data = json_decode(urldecode($dataString), true);

                return $this->composeBarcode($data);
            },
            $html
        ) ?? '';
    }

    private function handleInlineAttachments(string $html): string
    {
        $html = str_replace('?entryPoint=attachment&amp;', '?entryPoint=attachment&', $html ?? '');

        return preg_replace_callback(
            "/src=\"\?entryPoint=attachment&id=([A-Za-z0-9]*)\"/",
            function ($matches) {
                $id = $matches[1];

                if (!$id) {
                    return '';
                }

                $src = $this->imageSourceProvider->get($id);

                if (!$src) {
                    return '';
                }

                return "src=\"{$src}\"";
            },
            $html
        ) ?? '';
    }

    /**
     * Duplicated from upstream Espo dompdf engine code. Might need rework.
     *
     * @param array<string, mixed> $data
     *
     * @return string
     */
    private function composeBarcode(array $data): string
    {
        $value = $data['value'] ?? null;

        if ($value === null) {
            return '';
        }

        $codeType = $data['type'] ?? 'CODE128';

        $typeMap = [
            "CODE128" => 'C128',
            "CODE128A" => 'C128A',
            "CODE128B" => 'C128B',
            "CODE128C" => 'C128C',
            "EAN13" => 'EAN13',
            "EAN8" => 'EAN8',
            "EAN5" => 'EAN5',
            "EAN2" => 'EAN2',
            "UPC" => 'UPCA',
            "UPCE" => 'UPCE',
            "ITF14" => 'I25',
            "pharmacode" => 'PHARMA',
            "QRcode" => 'QRCODE,H',
        ];

        $type = $typeMap[$codeType] ?? null;

        if ($codeType === 'QRcode') {
            $width = $data['width'] ?? 40;
            $height = $data['height'] ?? 40;
            $color = $data['color'] ?? [0, 0, 0];

            $barcode = new TCPDF2DBarcode($value, $type);
            $code = $barcode->getBarcodeSVGcode($width, $height, $color);

            $encoded = base64_encode($code);

            $css = "width: {$width}mm; height: {$height}mm;";

            return "<img src=\"data:image/svg+xml;base64,{$encoded}\" style=\"{$css}\">";
        }

        if (!$type) {
            $this->log->warning("Not supported barcode type {$codeType}.");

            return '';
        }

        $width = $data['width'] ?? 60;
        $height = $data['height'] ?? 30;
        $color = $data['color'] ?? [0, 0, 0];

        $barcode = new TCPDFBarcode($value, $type);
        $code = $barcode->getBarcodeSVGcode($width, $height, $color);

        $encoded = base64_encode($code);

        $css = "width: {$width}mm; height: {$height}mm;";

        return "<img src=\"data:image/svg+xml;base64,{$encoded}\" style=\"{$css}\">";
    }

    private function getPuppeteerPath(): string
    {
        return $this->pathProvider->getModule('Puppeteer') . self::PUPPETEER_FOLDER . '/' . self::NODE_MODULES_FOLDER;
    }
}
