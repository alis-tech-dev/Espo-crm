<?php
/*********************************************************************************
 * The contents of this file are subject to the EspoCRM Advanced Pack
 * Agreement ("License") which can be viewed at
 * https://www.espocrm.com/advanced-pack-agreement.
 * By installing or using this file, You have unconditionally agreed to the
 * terms and conditions of the License, and You may not use this file except in
 * compliance with the License.  Under the terms of the license, You shall not,
 * sublicense, resell, rent, lease, distribute, or otherwise  transfer rights
 * or usage to the software.
 *
 * Copyright (C) 2015-2023 Letrium Ltd.
 *
 * License ID: 9e71abacf6ac199ee59911e8bc81aa87
 ***********************************************************************************/

namespace Espo\Modules\Advanced\Core\Workflow;

use Espo\Core\Exceptions\Error;
use Espo\Core\Formula\Exceptions\Error as FormulaException;
use Espo\Core\Formula\Manager as FormulaManager;

use stdClass;

class ConditionManager extends BaseManager
{
    protected string $dirName = 'Conditions';
    protected array $requiredOptions = [
        'comparison',
        'fieldToCompare',
    ];

    /**
     * @param ?stdClass[] $conditionsAll
     * @param ?stdClass[] $conditionsAny
     */
    public function check(
        ?array $conditionsAll = null,
        ?array$conditionsAny = null,
        ?string $conditionsFormula = null
    ): bool {

        $result = true;

        if (!is_null($conditionsAll)) {
            $result &= $this->checkConditionsAll($conditionsAll);
        }

        if (!is_null($conditionsAny)) {
            $result &= $this->checkConditionsAny($conditionsAny);
        }

        if (!empty($conditionsFormula)) {
            $result &= $this->checkConditionsFormula($conditionsFormula);
        }

        return $result;
    }

    /**
     * @param stdClass[] $conditions
     */
    public function checkConditionsAny(array $conditions): bool
    {
        if (empty($conditions)) {
            return true;
        }

        foreach ($conditions as $condition) {
            if ($this->processCheck($condition)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param stdClass[] $conditions
     * @throws Error
     */
    public function checkConditionsAll(array $conditions): bool
    {
        if (!isset($conditions)) {
            return true;
        }

        foreach ($conditions as $condition) {
            if (!$this->processCheck($condition)) {
                return false;
            }
        }

        return true;
    }

    /**
     * @throws Error
     * @throws FormulaException
     */
    public function checkConditionsFormula(?string $formula): bool
    {
        if (empty($formula)) {
            return true;
        }

        $formula = trim($formula, " \t\n\r");

        if (empty($formula)) {
            return true;
        }

        if (substr($formula, -1) === ';') {
            $formula = substr($formula, 0, -1);
        }

        if (empty($formula)) {
            return true;
        }

        $o = (object) [];

        $o->__targetEntity = $this->getEntity();

        return (bool) $this->getFormulaManager()->run($formula, $this->getEntity(), $o);
    }

    /**
     * @throws Error
     */
    private function processCheck(stdClass $condition): bool
    {
        $entity = $this->getEntity();
        $entityType = $entity->getEntityType();

        if (!$this->validate($condition)) {
            $this->getLog()->warning(
                'Workflow['.$this->getWorkflowId().']: Condition data is broken for the Entity ['.$entityType.'].');

            return false;
        }

        $impl = $this->getImpl($condition->comparison);

        return $impl->process($entity, $condition);
    }

    private function getFormulaManager(): FormulaManager
    {
        /** @var FormulaManager */
        return $this->getContainer()->get('formulaManager');
    }
}
