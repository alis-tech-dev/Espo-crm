<?php

use Espo\ApiClient\Client;
use Espo\ApiClient\Exception\ResponseError;
use Espo\Core\Application;
use Espo\ORM\EntityManager;

require dirname(__DIR__) . '/bootstrap.php';

$app = new Application();
$app->setupSystemUser();

/** @var EntityManager */
$entityManager = $app->getContainer()->get('entityManager');

$vacations = $entityManager->getRDBRepository('Vacation')->find();

$entityManager->getTransactionManager()->start();

$count = 0;

foreach ($vacations as $vacation) {
    $absence = $entityManager
        ->getRDBRepository('Absence')
        ->where('dateStart', $vacation->get('dateStart'))
        ->where('assignedUserId', $vacation->get('assignedUserId'))
        ->findOne();

    if (!$absence) {
        echo 'https://project.alis-tech.com/#Vacation/view/' . $vacation->getId() . PHP_EOL;

        $entityManager->createEntity('Absence', [
            'dateStart' => $vacation->get('dateStart'),
            'type' => $vacation->get('type'),
            'dateEnd' => $vacation->get('dateEnd'),
            'description' => $vacation->get('description'),
            'assignedUserId' => $vacation->get('assignedUserId')
        ]);
    }
}

$entityManager->getTransactionManager()->commit();