<?php
/************************************************************************
 * This file is part of EspoCRM.
 *
 * EspoCRM - Open Source CRM application.
 * Copyright (C) 2014-2020 Yuri Kuznetsov, Taras Machyshyn, Oleksiy Avramenko
 * Website: https://www.espocrm.com
 *
 * EspoCRM is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * EspoCRM is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with EspoCRM. If not, see http://www.gnu.org/licenses/.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "EspoCRM" word.
 ************************************************************************/

namespace Espo\Services;

use Espo\Core\Exceptions\Forbidden;
use Espo\Core\Exceptions\NotFound;
use Espo\Core\Exceptions\Error;
use Espo\ORM\EntityManager;
use mikehaertl\wkhtmlto\Pdf;
use Espo\ORM\Entity;
use Espo\Core\Htmlizer\Htmlizer;

class BetterPdf extends \Espo\Core\Services\Base
{

    protected $fontFace = 'freesans';

    protected $fontSize = 12;

    protected $removeMassFilePeriod = '1 hour';

    protected function init()
    {
        $this->addDependency('acl');
        $this->addDependency('metadata');
        $this->addDependency('serviceFactory');
        $this->addDependency('entityManager');
        $this->addDependency('defaultLanguage');

        $this->addDependency('htmlizerFactory');
    }

    protected function getAcl()
    {
        return $this->getInjection('acl');
    }

    protected function getMetadata()
    {
        return $this->getInjection('metadata');
    }

    protected function getServiceFactory()
    {
        return $this->getInjection('serviceFactory');
    }

    protected function printEntity(Entity $entity, Entity $template, Htmlizer $htmlizer, array $additionalData = null)
    {
        ini_set('max_execution_time', '300');
        $wkpdf = new \mikehaertl\wkhtmlto\Pdf;
        $wkpdf->binary = $_SERVER['DOCUMENT_ROOT'] . '/wkhtmltopdf/usr/local/bin/wkhtmltopdf';

        foreach (glob('tmppdf/*') as $file)
            if (is_file($file))
                unlink($file);

        $filename = "tmppdf/" . uniqid(rand(), true);

        $pageFormat = $template->get('pageFormat') ?? 'A4';
        $options = array(
            "enable-local-file-access",
            "orientation" => $template->get('pageOrientation') ?? "portrait",
            "no-outline",
            "disable-smart-shrinking",
            'margin-top' => $template->get('topMargin'),
            'margin-right' => $template->get('rightMargin'),
            'margin-bottom' => $template->get('bottomMargin'),
            'margin-left' => $template->get('leftMargin'),
            'load-error-handling' => 'ignore'
        );

        if ($pageFormat !== 'Custom')
            $options['page-size'] = $pageFormat;
        else {
            $options['page-width'] = $template->get('pageWidth');
            $options['page-height'] = $template->get('pageHeight');
        }

        ob_start();
        ?>
        * {
        box-sizing: border-box;
        }

        html, body {
        width: 100%;
        font-size: 16px;
        padding: 0;
        margin: 0;
        }

        .insert-page-break {
        page-break-before: always;
        }
        <?php
        file_put_contents($filename . ".css", ob_get_clean());

        ob_start();
        ?>
        <meta charset="utf-8">

        <base href="file://<?php echo $_SERVER['DOCUMENT_ROOT']; ?>/">
        <link rel="stylesheet" href="<?php echo $filename . ".css" ?>">
        <?php
        $defaultHeader = ob_get_clean();

        $headerTemplate = $htmlizer->render($entity, $template->get('header'), null, $additionalData);

        if ($template->get("printHeader")) {
            ob_start();
            ?>
            <!DOCTYPE html>
            <html lang="cs">
            <head>
                <?php echo $defaultHeader; ?>
            </head>
            <body>
            <?php echo $headerTemplate ?>
            </body>
            </html>
            <?php
            $headerHtml = ob_get_clean();

            if ($template->get("disableDefaultTemplate"))
                $headerHtml = $headerTemplate;

            file_put_contents($filename . "_header.html", $headerHtml);
            $options['header-html'] = $filename . "_header.html";
            $options['header-spacing'] = $template->get("headerPosition");
        }

        $bodyTemplate = $htmlizer->render($entity, $template->get('body'), null, $additionalData);

        ob_start();
        ?>
        <!DOCTYPE html>
        <html lang="cs">
        <head>
            <?php echo $defaultHeader; ?>
        </head>
        <body>
        <?php
        if (!$template->get("printHeader")):
            ?>
            <header>
                <?php echo $headerTemplate; ?>
            </header>
        <?php
        endif;
        ?>
        <section>
            <?php echo $bodyTemplate; ?>
        </section>
        </body>
        </html>
        <?php
        $mainHtml = ob_get_clean();
        if ($template->get("disableDefaultTemplate") && !$template->get("printHeader")) {
            file_put_contents($filename . "_header.html", $headerTemplate);
            $wkpdf->addPage($filename . "_header.html");

            $mainHtml = $bodyTemplate;
        }

        file_put_contents($filename . ".html", $mainHtml);
        $wkpdf->addPage($filename . ".html");

        if ($template->get("printFooter")) {
            $footerTemplate = $htmlizer->render($entity, $template->get('footer'), null, $additionalData);
            ob_start();
            ?>
            <!DOCTYPE html>
            <html>
            <head>
                <?php echo $defaultHeader; ?>
                <script>
                    function substitutePdfVariables() {

                        function getParameterByName(name) {
                            var match = RegExp('[?&]' + name + '=([^&]*)').exec(window.location.search);
                            return match && decodeURIComponent(match[1].replace(/\+/g, ' '));
                        }

                        function substitute(name) {
                            var value = getParameterByName(name);
                            var body = document.getElementsByTagName('body')[0];
                            var bodyHtml = body.innerHTML;
                            body.innerHTML = bodyHtml.replace("{" + name + "Number" + "}", value);
                        }

                        ['frompage', 'topage', 'page', 'webpage', 'section', 'subsection', 'subsubsection']
                            .forEach(function (param) {
                                substitute(param);
                            });

                    }
                </script>
            </head>
            <body onload="substitutePdfVariables()">
            <?php echo $footerTemplate; ?>
            </body>
            </html>
            <?php
            $footerHtml = ob_get_clean();

            if ($template->get("disableDefaultTemplate"))
                $footerHtml = $footerTemplate;

            file_put_contents($filename . "_footer.html", $footerHtml);
            $options['footer-html'] = $filename . "_footer.html";
            $options['margin-bottom'] += $template->get('footerPosition');
            $options['footer-spacing'] = $template->get('footerPosition');
        }

        $outputName = $filename . ".pdf";

        $wkpdf->setOptions($options);
        $wkpdf->saveAs($outputName);

        if ($template->get("printCoverPage")) {
            $coverpdf = new \mikehaertl\wkhtmlto\Pdf;
            $coverpdf->binary = $wkpdf->binary;

            $newOptions = $options;
            unset($newOptions["margin-top"]);
            unset($newOptions["margin-bottom"]);
            unset($newOptions["header-html"]);
            unset($newOptions["footer-html"]);

            $coverTemplate = $htmlizer->render($entity, $template->get('coverPage'), null, $additionalData);

            ob_start();
            ?>
            <!DOCTYPE html>
            <html lang="cs">
            <head>
                <?php echo $defaultHeader; ?>
            </head>
            <body>
            <?php echo $coverTemplate; ?>
            </body>
            </html>
            <?php
            $coverHtml = ob_get_clean();

            if ($template->get("disableDefaultTemplate"))
                $coverHtml = $coverTemplate;

            file_put_contents($filename . "_cover.html", $coverHtml);
            $coverpdf->addCover($filename . "_cover.html");
            $coverpdf->setOptions($newOptions);
            $coverpdf->saveAs($filename . "_cover.pdf");

            $fileArray= [$filename . "_cover.pdf", $filename . ".pdf"];
            $outputName = $filename . "_merged.pdf";
            $cmd = "gs -q -dNOPAUSE -dBATCH -dPrinted=false -sDEVICE=pdfwrite -sOutputFile=$outputName ";

            foreach($fileArray as $file)
                $cmd .= $file." ";

            shell_exec($cmd);
        }

        //echo $wkpdf->getError();
        return file_get_contents($outputName);
    }

    public function generateMailMerge($entityType, $entityList, Entity $template, $name, $campaignId = null)
    {
        $htmlizer = $this->createHtmlizer();
        $pdf = new \Espo\Core\Pdf\Tcpdf();
        $pdf->setUseGroupNumbers(true);

        if ($this->getServiceFactory()->checkExists($entityType)) {
            $service = $this->getServiceFactory()->create($entityType);
        } else {
            $service = $this->getServiceFactory()->create('Record');
        }

        foreach ($entityList as $entity) {
            $service->loadAdditionalFields($entity);
            if (method_exists($service, 'loadAdditionalFieldsForPdf')) {
                $service->loadAdditionalFieldsForPdf($entity);
            }
            $pdf->startPageGroup();
            $this->printEntity($entity, $template, $htmlizer);
        }

        $filename = \Espo\Core\Utils\Util::sanitizeFileName($name) . '.pdf';

        $attachment = $this->getEntityManager()->getEntity('Attachment');

        $content = $pdf->output('', 'S');

        $attachment->set([
            'name' => $filename,
            'relatedType' => 'Campaign',
            'type' => 'application/pdf',
            'relatedId' => $campaignId,
            'role' => 'Mail Merge',
            'contents' => $content
        ]);

        $this->getEntityManager()->saveEntity($attachment);

        return $attachment->id;
    }

    public function massGenerate($entityType, $idList, $templateId, $checkAcl = false)
    {
        if ($this->getServiceFactory()->checkExists($entityType)) {
            $service = $this->getServiceFactory()->create($entityType);
        } else {
            $service = $this->getServiceFactory()->create('Record');
        }

        $maxCount = $this->getConfig()->get('massPrintPdfMaxCount');
        if ($maxCount) {
            if (count($idList) > $maxCount) {
                throw new Error("Mass print to PDF max count exceeded.");
            }
        }

        $template = $this->getEntityManager()->getEntity('Template', $templateId);

        if (!$template) {
            throw new NotFound();
        }

        if ($checkAcl) {
            if (!$this->getAcl()->check($template)) {
                throw new Forbidden();
            }
            if (!$this->getAcl()->checkScope($entityType)) {
                throw new Forbidden();
            }
        }

        $htmlizer = $this->createHtmlizer();
        $pdf = new \Espo\Core\Pdf\Tcpdf();
        $pdf->setUseGroupNumbers(true);

        $entityList = $this->getEntityManager()->getRepository($entityType)->where([
            'id' => $idList
        ])->find();

        foreach ($entityList as $entity) {
            if ($checkAcl) {
                if (!$this->getAcl()->check($entity)) continue;
            }
            $service->loadAdditionalFields($entity);
            if (method_exists($service, 'loadAdditionalFieldsForPdf')) {
                $service->loadAdditionalFieldsForPdf($entity);
            }
            $pdf->startPageGroup();
            $this->printEntity($entity, $template, $htmlizer);
        }

        $content = $pdf->output('', 'S');

        $entityTypeTranslated = $this->getInjection('defaultLanguage')->translate($entityType, 'scopeNamesPlural');
        $filename = \Espo\Core\Utils\Util::sanitizeFileName($entityTypeTranslated) . '.pdf';

        $attachment = $this->getEntityManager()->getEntity('Attachment');
        $attachment->set([
            'name' => $filename,
            'type' => 'application/pdf',
            'role' => 'Mass Pdf',
            'contents' => $content
        ]);
        $this->getEntityManager()->saveEntity($attachment);

        $job = $this->getEntityManager()->getEntity('Job');
        $job->set([
            'serviceName' => 'Pdf',
            'methodName' => 'removeMassFileJob',
            'data' => [
                'id' => $attachment->id
            ],
            'executeTime' => (new \DateTime())->modify('+' . $this->removeMassFilePeriod)->format('Y-m-d H:i:s'),
            'queue' => 'q1'
        ]);
        $this->getEntityManager()->saveEntity($job);

        return $attachment->id;
    }

    public function removeMassFileJob($data)
    {
        if (empty($data->id)) {
            return;
        }
        $attachment = $this->getEntityManager()->getEntity('Attachment', $data->id);
        if (!$attachment) return;
        if ($attachment->get('role') !== 'Mass Pdf') return;
        $this->getEntityManager()->removeEntity($attachment);
    }

    public function buildFromTemplate(Entity $entity, Entity $template, $displayInline = false, ?array $additionalData = null, ?string $pdfName = null)
    {
        $entityType = $entity->getEntityType();

        if ($this->getServiceFactory()->checkExists($entityType)) {
            $service = $this->getServiceFactory()->create($entityType);
        } else {
            $service = $this->getServiceFactory()->create('Record');
        }

        $service->loadAdditionalFields($entity);

        if (method_exists($service, 'loadAdditionalFieldsForPdf')) {
            $service->loadAdditionalFieldsForPdf($entity);
        }

        if ($template->get('entityType') !== $entityType) {
            throw new Forbidden();
        }

        if (!$this->getAcl()->check($entity, 'read') || !$this->getAcl()->check($template, 'read')) {
            throw new Forbidden();
        }

        $htmlizer = $this->createHtmlizer();

        $contents = $this->printEntity($entity, $template, $htmlizer, $additionalData);

        if ($displayInline) {
            header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            header('Expires: 0');
            header("Content-type:application/pdf; charset=utf-8");

            if (!is_null($pdfName))
                header("Content-Disposition: inline; filename=\"{$pdfName}.pdf\"");

            echo $contents;
            exit;
        }

        return $contents;
    }

    protected function createHtmlizer()
    {
        return $this->getInjection('htmlizerFactory')->create();
    }
}
