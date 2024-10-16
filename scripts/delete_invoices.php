<?php

use Espo\Core\Application;
use Espo\ORM\EntityManager;

require dirname(__DIR__) . '/bootstrap.php';

$app = new Application();
$app->setupSystemUser();

/** @var EntityManager */
$entityManager = $app->getContainer()->get('entityManager');

$invoiceRepository = $entityManager->getRDBRepository('Invoice');
$accountRepository = $entityManager->getRDBRepository('Account');

// Start a transaction
$entityManager->getTransactionManager()->start();

try {
    // Fetch all invoices
    $invoices = $invoiceRepository->find();

    $removedCount = 0;

    foreach ($invoices as $invoice) {
        $accountId = $invoice->get('accountId');

        // If accountId is not set, skip this invoice
        if (!$accountId) {
            continue;
        }

        // Check if the account exists
        $account = $accountRepository->getById($accountId);

        // If the account doesn't exist, remove the invoice
        if (!$account) {
            $entityManager->removeEntity($invoice);
            $removedCount++;
            echo "Removed Invoice ID: " . $invoice->getId() . " (Invalid Account ID: $accountId)\n";
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