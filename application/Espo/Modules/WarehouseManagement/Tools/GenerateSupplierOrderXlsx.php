<?php

namespace Espo\Modules\WarehouseManagement\Tools;

use Espo\Core\Exceptions\NotFound;
use Espo\Core\ORM\EntityManager;
use Espo\Core\FileStorage\Manager as FileStorageManager;
use Espo\Entities\Attachment;
use Espo\Entities\User;
use GuzzleHttp\Psr7\Stream;
use PhpOffice\PhpSpreadsheet\{
    IOFactory,
    Spreadsheet
};

class GenerateSupplierOrderXlsx
{
    private const SUPPORTED_ENTITIES = ["StockTaking", "StockTakingList"];

    public function __construct(
        private readonly EntityManager $entityManager,
        private readonly FileStorageManager $fileStorageManager,
        private readonly User $user,
    ) {
    }

    public function generate(string $id): string
    {
        $entityType = 'SupplierOrder';
        $entity = $this->entityManager->getEntity($entityType, $id);

        if (!$entity) {
            throw new NotFound();
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $repository = $this->entityManager->getRDBRepository($entityType);
        $items = $repository->getRelation($entity, "items")->find();

        $column = 1;
        $row = 1;

        // deprecated setCellValueByColumnAndRow
        // see: https://phpoffice.github.io/PhpSpreadsheet/classes/PhpOffice-PhpSpreadsheet-Worksheet-Worksheet.html#method_setCellValueByColumnAndRow

        $sheet->setCellValueByColumnAndRow($column++, $row, 'Kód');
        $sheet->setCellValueByColumnAndRow($column++, $row, 'EAN');
        $sheet->setCellValueByColumnAndRow($column++, $row, 'Název');
        $sheet->setCellValueByColumnAndRow($column++, $row, 'Počet ks');
        $sheet->setCellValueByColumnAndRow($column++, $row, 'Dodavatel');
        $sheet->setCellValueByColumnAndRow($column++, $row, 'Název objednávky');

        $row++;

        foreach ($items as $item) {
            $product = $this->entityManager->getEntity('Product', $item->get('productId'));

            $column = 1;
            $sheet->setCellValueByColumnAndRow($column++, $row, $product->get('catalogNumber'));
            $sheet->setCellValueByColumnAndRow($column++, $row, (string) $product->get('ean'));
            $sheet->setCellValueByColumnAndRow($column++, $row, $product->get('name'));
            $sheet->setCellValueByColumnAndRow($column++, $row, $item->get('quantity'));
            $sheet->setCellValueByColumnAndRow($column++, $row, $entity->get('accountName'));
            $sheet->setCellValueByColumnAndRow($column++, $row, $entity->get('name'));

            $row++;
        }

        // ean format fix
        $spreadsheet->getActiveSheet()->getStyle('B')->getNumberFormat()
            ->setFormatCode('0');


        $objWriter = IOFactory::createWriter($spreadsheet, 'Xlsx');

        $resource = fopen('php://temp', 'r+');

        if ($resource === false) {
            throw new \RuntimeException('Failed to create temporary file');
        }

        $objWriter->save($resource);

        $stream = new Stream($resource);

        $stream->seek(0);
        $attachment = $this->entityManager->getRepositoryByClass(Attachment::class)->getNew();

        $attachment->set('name', "Export_{$entityType}_{$id}.xlsx");
        $attachment->set('role', Attachment::ROLE_EXPORT_FILE);
        $attachment->set('type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $attachment->set('size', $stream->getSize());

        $this->entityManager->saveEntity($attachment, [
            'createdById' => $this->user->getId(),
        ]);

        $this->fileStorageManager->putStream($attachment, $stream);

        return $attachment->getId();
    }
}
