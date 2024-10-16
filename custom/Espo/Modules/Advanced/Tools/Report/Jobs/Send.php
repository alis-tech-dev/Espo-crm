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

namespace Espo\Modules\Advanced\Tools\Report\Jobs;

use Espo\Core\Job\Job;
use Espo\Core\Job\Job\Data;
use Espo\Core\Select\SearchParams;
use Espo\Core\Utils\Config;
use Espo\Core\Utils\Log;
use Espo\Entities\User;
use Espo\Modules\Advanced\Business\Report\EmailBuilder;
use Espo\Modules\Advanced\Entities\Report as ReportEntity;
use Espo\Modules\Advanced\Tools\Report\ListType\Result as ListResult;
use Espo\Modules\Advanced\Tools\Report\SendingService;
use Espo\Modules\Advanced\Tools\Report\Service;
use Espo\ORM\EntityManager;
use RuntimeException;

class Send implements Job
{
    private const LIST_REPORT_MAX_SIZE = 3000;

    private Config $config;
    private Service $service;
    private EntityManager $entityManager;
    private SendingService $sendingService;
    private EmailBuilder $emailBuilder;
    private Log $log;

    public function __construct(
        Config $config,
        Service $service,
        EntityManager $entityManager,
        SendingService $sendingService,
        EmailBuilder $emailBuilder,
        Log $log
    ) {
        $this->config = $config;
        $this->service = $service;
        $this->entityManager = $entityManager;
        $this->sendingService = $sendingService;
        $this->emailBuilder = $emailBuilder;
        $this->log = $log;
    }

    public function run(Data $data): void
    {
        $data = $data->getRaw();

        $reportId = $data->reportId;
        $userId = $data->userId;

        /** @var ?ReportEntity $report */
        $report = $this->entityManager->getEntityById(ReportEntity::ENTITY_TYPE, $reportId);

        if (!$report) {
            throw new RuntimeException("Report Sending: No report $reportId.");
        }

        /** @var ?User $user */
        $user = $this->entityManager->getEntityById(User::ENTITY_TYPE, $userId);

        if (!$user) {
            throw new RuntimeException("Report Sending: No user $userId.");
        }

        if ($report->getType() === ReportEntity::TYPE_LIST) {
            $searchParams = SearchParams::create()
                ->withMaxSize($this->getSendingListMaxCount());

            $orderByList = $report->get('orderByList');

            if ($orderByList) {
                $arr = explode(':', $orderByList);

                $searchParams = $searchParams
                    ->withOrderBy($arr[1])
                    ->withOrder(strtoupper($arr[0]));
            }

            $result = $this->service->runList($reportId, $searchParams, $user);
        }
        else {
            $result = $this->service->runGrid($reportId, null, $user);
        }

        $reportResult = $result;

        if ($result instanceof ListResult) {
            $reportResult = [];

            foreach ($result->getCollection() as $e) {
                $reportResult[] = get_object_vars($e->getValueMap());
            }

            if (
                count($reportResult) === 0 &&
                $report->get('emailSendingDoNotSendEmptyReport')
            ) {
                $this->log->debug('Report Sending: Report ' . $report->get('name') . ' is empty and was not sent.');

                return;
            }
        }

        $attachmentId = $this->sendingService->getExportAttachmentId($report, $result, null, $user);

        $this->emailBuilder->buildEmailData($data, $reportResult, $report);

        $this->emailBuilder->sendEmail(
            $data->userId,
            $data->emailSubject,
            $data->emailBody,
            $attachmentId
        );
    }

    private function getSendingListMaxCount(): int
    {
        return $this->config->get('reportSendingListMaxCount', self::LIST_REPORT_MAX_SIZE);
    }
}
