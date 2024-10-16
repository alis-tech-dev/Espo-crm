<?php
namespace Espo\Modules\Erp\Hooks\TestInvoice;

use Espo\ORM\Entity;
use thiagoalessio\TesseractOCR\TesseractOCR;
use Spatie\PdfToText\Pdf;
class OCR extends \Espo\Core\Hooks\Base
{
    public function beforeSave(Entity $entity, array $options = [])
    {
        $actualResult = "";
        $attachments = $entity->get("attachIds");
	$GLOBALS['log']->warning($attachments);
        if (!empty($attachments))
        {
            foreach ($attachments as $attachment)
            {
		$at = $this->getEntityManager()
                    ->getRepository('Attachment')
		    ->get($attachment);
$GLOBALS['log']->warning(json_encode($at));

$fileName = $this->getEntityManager()
                    ->getRepository('Attachment')
                    ->getFilePath($at);

		$GLOBALS['log']->warning($fileName);
                $actualResult = (new Pdf())->setPdf($fileName)->text();
            }
        }
        $pictures = $entity->get("picture");
        if (!empty($pictures))
        {
            foreach ($pictures as $attachment)
            {
		$at = $this->getEntityManager()
                    ->getRepository('Attachment')
                    ->get($attachment);
$fileName = $this->getEntityManager()
                    ->getRepository('Attachment')
                    ->getFilePath($at);

                $ocr = new TesseractOCR();
                $ocr->executable("/usr/bin/tesseract");
                $ocr->image($fileName);
                $actualResult .= $ocr->run();

            }
            $entity->set("description", $actualResult);
        }
    }
}

