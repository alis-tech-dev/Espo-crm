<?php

namespace Espo\Modules\Autocrm\Controllers;

use Espo\Core\{
    Acl,
    Api\Request,
    Exceptions\BadRequest,
    Exceptions\Forbidden,
    ORM\EntityManager,
    Record\SearchParamsFetcher,
    Record\ServiceContainer as RecordServiceContainer,
    Select\SelectBuilderFactory,
};
use Espo\ORM\Entity;

class RelatedLinkLister
{
    public function __construct(
        protected EntityManager $entityManager,
        protected Acl $acl,
        protected SearchParamsFetcher $searchParamsFetcher,
        protected SelectBuilderFactory $selectBuilderFactory,
        protected RecordServiceContainer $recordServiceContainer,
    ) {
    }

    /**
     * @throws BadRequest
     * @throws Forbidden
     */
    public function getActionListRelatedLink(Request $request): object
    {
        $parentScope = $request->getRouteParam('scope');
        $parentId = $request->getRouteParam('id');
        $parentLink = $request->getRouteParam('parentLink');
        $link = $request->getRouteParam('link');

        if (!$parentScope || !$parentId || !$parentLink || !$link) {
            throw new BadRequest();
        }

        $parentEntity = $this->entityManager->getEntity($parentScope, $parentId);

        $parentLinkRelation = $this->entityManager->getDefs()
            ->getEntity($parentScope)
            ->getRelation($parentLink);

        $parentLinkScope = $parentLinkRelation->getForeignEntityType();

        $linkRelation = $this->entityManager->getDefs()
            ->getEntity($parentLinkScope)
            ->getRelation($link);

        $linkScope = $linkRelation->getForeignEntityType();
        $linkScopeForeignName = $linkRelation->getForeignRelationName();

        if (!$this->acl->check($parentEntity)
            || !$this->acl->checkScope($parentLinkScope)
            || !$this->acl->checkScope($linkScope)
        ) {
            throw new Forbidden();
        }

        $recordService = $this->recordServiceContainer->get($linkScope);
        $searchParams = $this->searchParamsFetcher->fetch($request);
        $preparedSearchParams = $recordService->prepareSearchParams($searchParams);
        $selectBuilder = $this->selectBuilderFactory->create();

        $selectBuilder->from($linkScope)
            ->withSearchParams($preparedSearchParams)
            ->withStrictAccessControl();

        $builder = $this->entityManager->getRDBRepository($linkScope)
            ->clone($selectBuilder->build())
            ->join($linkScopeForeignName);

        if ($parentLinkRelation->getType() === Entity::MANY_MANY) {
            $relationName = $parentLinkRelation->getRelationshipName();
            $key = $parentLinkRelation->getKey();
            $foreignKey = $parentLinkRelation->getForeignKey();
            $nearKey = $parentLinkRelation->getMidKey();
            $distantKey = $parentLinkRelation->getForeignMidKey();

            $builder->join(ucfirst($relationName), $relationName, [
                $distantKey . ':' => $linkScopeForeignName . '.' . $foreignKey,
                $nearKey => $parentEntity->get($key),
                'deleted' => false,
            ]);
        } else {
            $builder->where($linkScopeForeignName . '.' . $parentLinkRelation->getForeignKey(), $parentId);
        }

        $collection = $builder->find();

        return (object)[
            'total' => $builder->count(),
            'list' => $collection->getValueMapList(),
        ];
    }
}
