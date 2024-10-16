<?php

require __DIR__ . '/vendor/autoload.php';

use Espo\Core\Application;
use Espo\ORM\EntityManager;

require dirname(__DIR__) . '/bootstrap.php';

$app = new Application();
$app->setupSystemUser();

/** @var EntityManager */
$entityManager = $app->getContainer()->get('entityManager');

$query = $entityManager->getQueryBuilder()->delete()->from('HumanResource')->build();

$entityManager->getQueryExecutor()->execute($query);

createHumanResourceEntities($entityManager);


echo "Creation process completed." . PHP_EOL;

function createHumanResourceEntities($entityManager)
{
    echo "Fetching all HumanResources" . PHP_EOL;
    
    $humanResources = $entityManager->getRDBRepository('HumanResources')->find();

    if (count($humanResources) == 0) {
        echo "No HumanResources to process" . PHP_EOL;
    } else {
        foreach ($humanResources as $humanResource) {
            try {
                $newEntity = $entityManager->getNewEntity('HumanResource');
                
                $newEntity->set([
                    'name' => $humanResource->get('name'),
                    'majetek' => $humanResource->get('majetek'),
                    'auto' => $humanResource->get('auto'),
                    'mobil' => $humanResource->get('mobil'),
                    'notebook' => $humanResource->get('notebook')
                ]);

                $entityManager->saveEntity($newEntity);

                echo "Created HumanResource entity with ID: " . $newEntity->getId() . PHP_EOL;
            } catch (Exception $e) {
                echo "Error creating HumanResource entity: " . $e->getMessage() . PHP_EOL;
            }
        }
    }
}