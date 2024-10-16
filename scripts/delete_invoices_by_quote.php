<?php

use Espo\Core\Application;
use Espo\ORM\EntityManager;

require dirname(__DIR__) . '/bootstrap.php';

$app = new Application();
$app->setupSystemUser();

/** @var EntityManager */
$entityManager = $app->getContainer()->get('entityManager');

$invoiceRepository = $entityManager->getRDBRepository('Invoice');
$quoteRepository = $entityManager->getRDBRepository('Quote');

// Start a transaction
$entityManager->getTransactionManager()->start();

try {
    // Fetch all invoices
    $invoices = $invoiceRepository->find();

    $removedCount = 0;

    foreach ($invoices as $invoice) {
        $quoteId = $invoice->get('quoteId');

        // If quoteId is not set, skip this invoice
        if (!$quoteId) {
            continue;
        }

        // Check if the quote exists
        $quote = $quoteRepository->getById($quoteId);

        // If the quote doesn't exist, remove the invoice
        if (!$quote) {
            $entityManager->removeEntity($invoice);

            $removedCount++;
            
            echo "Removed Invoice ID: " . $invoice->getId() . " (Invalid Quote ID: $quoteId)\n";
        }
    }

    // Commit the transaction
    $entityManager->getTransactionManager()->commit();

    echo "Operation completed. Total invoices removed: $removedCount\n";
} catch (Exception $e) {
    // If an error occurs, roll back the transaction
    $entityManager->getTransactionManager()->rollback();
    echo "An error occurred: " . $e->getMessage() . "\n";
}