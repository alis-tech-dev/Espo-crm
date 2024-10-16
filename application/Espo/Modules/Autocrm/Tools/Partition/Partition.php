<?php

namespace Espo\Modules\Autocrm\Tools\Partition;

use Espo\Core\Exceptions\Error;
use Espo\Core\FieldProcessing\ListLoadProcessor;
use Espo\Core\FieldProcessing\Loader\Params as FieldLoaderParams;
use Espo\Core\Record\Collection;
use Espo\Core\Record\ServiceContainer as RecordServiceContainer;
use Espo\Core\Select\SearchParams;
use Espo\Core\Select\SelectBuilderFactory;
use Espo\Core\Utils\Metadata;
use Espo\ORM\EntityManager;
use Espo\Tools\Kanban\Result;

class Partition
{
    private ?string $entityType = null;
    private ?string $statusField = null;
    private bool $countDisabled = false;
    private ?SearchParams $searchParams = null;
    private ?string $userId = null;

    public function __construct(
        private readonly Metadata $metadata,
        private readonly EntityManager $entityManager,
        private readonly SelectBuilderFactory $selectBuilderFactory,
        private readonly ListLoadProcessor $listLoadProcessor,
        private readonly RecordServiceContainer $recordServiceContainer,
    ) {
    }

    public function setEntityType(string $entityType): self
    {
        $this->entityType = $entityType;

        return $this;
    }

    public function setStatusField(string $by): self
    {
        $this->statusField = $by;

        return $this;
    }

    public function setSearchParams(SearchParams $searchParams): self
    {
        $this->searchParams = $searchParams;

        return $this;
    }

    public function setCountDisabled(bool $countDisabled): self
    {
        $this->countDisabled = $countDisabled;

        return $this;
    }

    public function setUserId(string $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @throws Error
     */
    public function getResult(): Result
    {
        if (!$this->entityType) {
            throw new Error("Entity type is not specified.");
        }

        if (!$this->statusField) {
            throw new Error("Status field is not specified.");
        }

        if (!$this->searchParams) {
            throw new Error("No search params.");
        }

        $searchParams = $this->searchParams;
        $service = $this->recordServiceContainer->get($this->entityType);
        $maxSize = $searchParams->getMaxSize();

        if ($this->countDisabled && $maxSize) {
            $searchParams = $searchParams->withMaxSize($maxSize + 1);
        }

        $query = $this->selectBuilderFactory
            ->create()
            ->from($this->entityType)
            ->withSearchParams($searchParams)
            ->build();

        $collection = $this->entityManager
            ->getCollectionFactory()
            ->create($this->entityType);

        $statusList = $this->getStatusList();

        $additionalData = (object)[
            'groupList' => [],
        ];

        $repository = $this->entityManager->getRDBRepository($this->entityType);
        $hasMore = false;

        foreach ($statusList as $status) {
            if (!$status) {
                continue;
            }

            $itemSelectBuilder = $this->entityManager
                ->getQueryBuilder()
                ->select()
                ->clone($query);

            $itemSelectBuilder->where([
                $this->statusField => $status,
            ]);

            $groupData = (object)[
                'name' => $status,
            ];

            $itemQuery = $itemSelectBuilder->build();
            $collectionSub = $repository->clone($itemQuery)->find();

            if (!$this->countDisabled) {
                $totalSub = $repository->clone($itemQuery)->count();
            } else {
                $recordCollection = Collection::createNoCount($collectionSub, $maxSize);

                $collectionSub = $recordCollection->getCollection();
                $totalSub = $recordCollection->getTotal();

                if ($totalSub === Collection::TOTAL_HAS_MORE) {
                    $hasMore = true;
                }
            }

            $loadProcessorParams = FieldLoaderParams::create()->withSelect($searchParams->getSelect());

            foreach ($collectionSub as $e) {
                $this->listLoadProcessor->process($e, $loadProcessorParams);

                $service->prepareEntityForOutput($e);

                $collection[] = $e;
            }

            $groupData->total = $totalSub;
            $groupData->list = $collectionSub->getValueMapList();

            $additionalData->groupList[] = $groupData;
        }

        $total = !$this->countDisabled
            ? $repository->clone($query)->count()
            :
            ($hasMore ? Collection::TOTAL_HAS_MORE : Collection::TOTAL_HAS_NO_MORE);

        return new Result($collection, $total, $additionalData);
    }

    /**
     * @throws Error
     */
    private function getStatusList(): array
    {
        $statusList = $this->metadata->get(['entityDefs', $this->entityType, 'fields', $this->statusField, 'options']) ?? [];

        if (empty($statusList)) {
            throw new Error("No options for status field for entity type '{$this->entityType}'.");
        }

        return $statusList;
    }
}
