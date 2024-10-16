<?php

namespace Espo\Modules\Accounting\Classes\Jobs;

use Espo\Core\Job\JobDataLess;
use Espo\Core\ORM\EntityManager;
use Espo\Modules\Accounting\Tools\UnreliablePayer\Client;
use stdClass;

class DownloadUnreliablePayers implements JobDataLess
{
    public const STATUS_MAP = [
        'ANO' => 'NotOk',
        'NE' => 'Ok',
        'NENALEZEN' => 'Unknown',
    ];

    public function __construct(
        private readonly Client $client,
        private readonly EntityManager $entityManager,
    ) {
    }

    public function run(): void
    {
        $list = $this->client->getList();

        foreach ($list as $item) {
            $this->createOrUpdateUnreliablePayer($item);
        }

        $vatIdList = array_map(fn (stdClass $item) => $item->dic, $list);

        $notInList = $this->entityManager
            ->getRDBRepository('UnreliablePayer')
            ->where('vatId!=', $vatIdList)
            ->find();

        foreach ($notInList as $item) {
            //TODO: individually fetch status for each payer not in list
        }
    }

    protected function createOrUpdateUnreliablePayer(stdClass $item): void
    {
        $vatId = 'CZ' . trim($item->dic);

        $payer = $this
            ->entityManager
            ->getRDBRepository('UnreliablePayer')
            ->where('vatId', $vatId)
            ->findOne() ?? $this->entityManager->getNewEntity('UnreliablePayer');

        $payer->set([
            'name' =>  $vatId,
            'vatId' =>  $vatId,
            'status' => Self::STATUS_MAP[$item->nespolehlivyPlatce] ?? 'Unknown',
            'dateOfPublication' => $item->datumZverejneniNespolehlivosti,
        ]);

        $this->entityManager->saveEntity($payer);
    }
}
