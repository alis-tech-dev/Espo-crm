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

namespace Espo\Modules\Advanced\Core\TemplateHelpers;

use Espo\Core\Exceptions\Error;
use Espo\Core\Exceptions\Forbidden;
use Espo\Core\Exceptions\NotFound;
use Espo\Core\Htmlizer\Helper;
use Espo\Core\Htmlizer\Helper\Data;
use Espo\Core\Htmlizer\Helper\Result;
use Espo\Core\InjectableFactory;
use Espo\Modules\Advanced\Entities\Report as ReportEntity;
use Espo\Modules\Advanced\Tools\Report\Service;
use Espo\ORM\EntityManager;
use RuntimeException;

class Report implements Helper
{
    private EntityManager $entityManager;
    private InjectableFactory $injectableFactory;

    public function __construct(
        EntityManager $entityManager,
        InjectableFactory $injectableFactory
    ) {
        $this->entityManager = $entityManager;
        $this->injectableFactory = $injectableFactory;
    }

    /**
     * @throws Forbidden
     * @throws NotFound
     * @throws Error
     */
    public function render(Data $data): Result
    {
        $color = $data->getOption('color');
        $fontSize = $data->getOption('fontSize');
        $border = $data->getOption('border') ?? 1;
        $borderColor = $data->getOption('borderColor');
        $cellpadding = $data->getOption('cellpadding') ?? 2;
        $column = $data->getOption('column');
        $flip = (bool) $data->getOption('flip');

        $id = $data->getRootContext()['id'] ?? null;
        $where = $data->getRootContext()['reportWhere'] ?? null;
        $user = $data->getRootContext()['user'] ?? null;

        if (!$id) {
            throw new RuntimeException("No ID.");
        }

        /** @var ?ReportEntity $report */
        $report = $this->entityManager->getEntity(ReportEntity::ENTITY_TYPE, $id);

        if (!$report) {
            throw new RuntimeException("Report $id not found.");
        }

        if (
            $report->getType() === ReportEntity::TYPE_GRID ||
            $report->getType() === ReportEntity::TYPE_JOINT_GRID
        ) {
            if ($report->get('groupBy') && count($report->get('groupBy')) == 2) {
                if ($column && $report->get('columns') && count($report->get('columns'))) {
                    $column = $report->get('columns')[0];
                }
            }
        }

        $tableStyle = '';

        $service = $this->injectableFactory->create(Service::class);

        $data = $service->getReportResultsTableData($id, $where, $column, $user);

        if ($flip) {
            $flipped = [];

            foreach ($data as $key => $row) {
                foreach ($row as $subKey => $value) {
                    $flipped[$subKey][$key] = $value;
                }
            }

            $data = $flipped;
        }

        if ($borderColor) {
            $tableStyle .= "border-color: {$borderColor};";
        }

        $tableStyle .= 'border-collapse: collapse;';

        $html = "<table border=\"{$border}\" cellpadding=\"{$cellpadding}\" style=\"{$tableStyle}\">";

        foreach ($data as $i => $row) {
            $html .= '<tr>';

            foreach ($row as $item) {
                $attributes = $item['attrs'] ?? [];
                $align = $attributes['align'] ?? 'left';
                $isBold = $item['isBold'] ?? false;

                $cellStyle = "";

                $width = $attributes['width'] ?? null;
                $widthPart = '';

                if ($i == 0) {
                    $widthLeft = 100;
                    $noWidthCount = count($row);

                    foreach ($row as $item2) {
                        $attributes2 = $item2['attrs'] ?? [];
                        $width2 = $attributes2['width'] ?? null;

                        if ($width2) {
                            $widthLeft -= intval(substr($width2, 0, -1));
                            $noWidthCount --;
                        }
                    }

                    if (!$width) {
                        $width = ($widthLeft / $noWidthCount) . '%';
                    }

                    $widthPart = 'width = "'.(string) $width.'"';
                }

                $value = $item['value'] ?? '';

                if (is_array($value)) {
                    $value = implode(', ', $value);
                }

                $value = htmlspecialchars($value);

                if ($isBold) {
                    $value = '<strong>' . $value . '</strong>';
                }

                $style = "";

                if ($fontSize) {
                    $style .= "font-size: {$fontSize}px;";
                }

                if ($color) {
                    $style .= "color: {$color};";
                }

                if ($borderColor) {
                    $style .= "border-color: {$borderColor};";
                }

                $value = "<span style=\"{$style}\">{$value}</span>";

                $html .= "<td align=\"{$align}\" {$widthPart} style=\"{$cellStyle}\">" . $value . '</td>';

            }

            $html .= '</tr>';
        }

        $html .= '</table>';

        return Result::createSafeString($html);
    }
}
