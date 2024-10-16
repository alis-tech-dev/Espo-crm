<?php

use Espo\Core\Application;
use Espo\ORM\EntityManager;

require dirname(__DIR__) . '/bootstrap.php';

$app = new Application();
$app->setupSystemUser();

/** @var EntityManager */
$entityManager = $app->getContainer()->get('entityManager');

$opportunityRepository = $entityManager->getRDBRepository('Opportunity');
$accountRepository = $entityManager->getRDBRepository('Account');

// Start a transaction
$entityManager->getTransactionManager()->start();

try {
    // Fetch all opportunities
    $opportunities = $opportunityRepository->find();

    $removedCount = 0;

    foreach ($opportunities as $opportunity) {
        $accountId = $opportunity->get('accountId');

        // If accountId is not set, skip this opportunity
        if (!$accountId) {
            continue;
        }

        // Check if the account exists
        $account = $accountRepository->getById($accountId);

        // If the account doesn't exist, remove the opportunity
        if (!$account) {
            $entityManager->removeEntity($opportunity);
            $removedCount++;
            echo "Removed Opportunity ID: " . $opportunity->getId() . " (Invalid Account ID: $accountId)\n";
        }
    }

    // Commit the transaction
    $entityManager->getTransactionManager()->commit();

    echo "Operation completed. Total opportunities removed: $removedCount\n";
} catch (Exception $e) {
    // If an error occurs, roll back the transaction
    $entityManager->getTransactionManager()->rollback();
    echo "An error occurred: " . $e->getMessage() . "\n";
}