<?php

namespace Espo\Modules\Autocrm\Classes\FieldProcessing\Formula;

use Espo\Core\{
    FieldProcessing\Loader as LoaderInterface,
    Formula\Manager as FormulaManager,
    Utils\Log,
    Utils\Metadata,
};
use Espo\Core\FieldProcessing\Loader\Params;
use Espo\ORM\Entity;
use Exception;
use stdClass;

class ReadLoader implements LoaderInterface
{
    protected string $loaderType = 'read';

    public function __construct(
        private readonly Metadata $metadata,
        private readonly FormulaManager $formulaManager,
        private readonly Log $log
    ) {
    }

    public function process(Entity $entity, Params $params): void
    {
        $variables = new stdClass();

        $customScript = $this->metadata->get([
            'formula',
            $entity->getEntityType(),
            $this->loaderType . 'LoaderCustomScript',
        ]);

        if ($customScript) {
            try {
                $this->formulaManager->run($customScript, $entity, $variables);
            } catch (Exception $e) {
                $type = $entity->getEntityType();
                $id = $entity->getId();

                $this->log->error("Formula execution failed for $type $id:" . $e->getMessage());
            }
        }
    }
}
