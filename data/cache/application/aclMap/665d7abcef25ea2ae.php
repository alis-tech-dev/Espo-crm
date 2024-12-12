<?php
return (object) [
  'table' => (object) [
    'ActionHistoryRecord' => (object) [
      'read' => 'own',
      'stream' => 'no',
      'edit' => 'no',
      'delete' => 'no',
      'create' => 'no'
    ],
    'ArrayValue' => false,
    'Attachment' => (object) [
      'read' => 'own',
      'stream' => 'no',
      'edit' => 'own',
      'delete' => 'own',
      'create' => 'yes'
    ],
    'AuthLogRecord' => false,
    'AuthToken' => false,
    'AuthenticationProvider' => false,
    'Autofollow' => false,
    'Currency' => (object) [
      'read' => 'yes',
      'stream' => 'no',
      'edit' => 'yes',
      'delete' => 'no',
      'create' => 'no'
    ],
    'Dashboard' => false,
    'DashboardTemplate' => false,
    'Email' => (object) [
      'read' => 'own',
      'stream' => 'no',
      'edit' => 'own',
      'delete' => 'own',
      'create' => 'yes'
    ],
    'EmailAccount' => (object) [
      'read' => 'own',
      'stream' => 'no',
      'edit' => 'own',
      'delete' => 'own',
      'create' => 'yes'
    ],
    'EmailAccountScope' => true,
    'EmailAddress' => false,
    'EmailFilter' => (object) [
      'read' => 'own',
      'stream' => 'no',
      'edit' => 'own',
      'delete' => 'own',
      'create' => 'yes'
    ],
    'EmailFolder' => (object) [
      'read' => 'own',
      'stream' => 'no',
      'edit' => 'own',
      'delete' => 'own',
      'create' => 'yes'
    ],
    'EmailTemplate' => false,
    'EmailTemplateCategory' => false,
    'Export' => false,
    'Extension' => false,
    'ExternalAccount' => true,
    'Formula' => false,
    'GroupEmailFolder' => (object) [
      'read' => 'team',
      'stream' => 'no',
      'edit' => 'no',
      'delete' => 'no',
      'create' => 'no'
    ],
    'Import' => false,
    'ImportError' => false,
    'InboundEmail' => false,
    'Integration' => false,
    'Job' => false,
    'LastViewed' => false,
    'LayoutRecord' => false,
    'LayoutSet' => false,
    'LeadCapture' => false,
    'LeadCaptureLogRecord' => false,
    'MassAction' => false,
    'Note' => (object) [
      'read' => 'own',
      'stream' => 'no',
      'edit' => 'own',
      'delete' => 'own',
      'create' => 'yes'
    ],
    'Notification' => (object) [
      'read' => 'own',
      'stream' => 'no',
      'edit' => 'no',
      'delete' => 'own',
      'create' => 'no'
    ],
    'PasswordChangeRequest' => false,
    'PhoneNumber' => false,
    'Portal' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'no',
      'delete' => 'no',
      'create' => 'no'
    ],
    'PortalRole' => false,
    'PortalUser' => false,
    'Preferences' => (object) [
      'read' => 'own',
      'stream' => 'no',
      'edit' => 'own',
      'delete' => 'no',
      'create' => 'no'
    ],
    'Role' => false,
    'ScheduledJob' => false,
    'ScheduledJobLogRecord' => false,
    'Stream' => true,
    'Subscription' => false,
    'Team' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'no',
      'delete' => 'no',
      'create' => 'no'
    ],
    'Template' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'no',
      'delete' => 'no',
      'create' => 'no'
    ],
    'UniqueId' => false,
    'User' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'own',
      'delete' => 'no',
      'create' => 'no'
    ],
    'UserData' => false,
    'Webhook' => true,
    'WebhookEventQueueItem' => false,
    'WebhookQueueItem' => false,
    'WorkingTimeCalendar' => false,
    'WorkingTimeRange' => false,
    'Account' => (object) [
      'read' => 'all',
      'stream' => 'team',
      'edit' => 'no',
      'delete' => 'no',
      'create' => 'no'
    ],
    'Activities' => true,
    'Calendar' => true,
    'Call' => (object) [
      'read' => 'team',
      'stream' => 'own',
      'edit' => 'own',
      'delete' => 'own',
      'create' => 'yes'
    ],
    'Campaign' => false,
    'CampaignLogRecord' => false,
    'CampaignTrackingUrl' => false,
    'Case' => false,
    'Contact' => (object) [
      'read' => 'all',
      'stream' => 'team',
      'edit' => 'no',
      'delete' => 'no',
      'create' => 'no'
    ],
    'Document' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'own',
      'create' => 'yes'
    ],
    'DocumentFolder' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'no',
      'delete' => 'no',
      'create' => 'no'
    ],
    'EmailQueueItem' => false,
    'KnowledgeBaseArticle' => false,
    'KnowledgeBaseCategory' => false,
    'Lead' => false,
    'MassEmail' => false,
    'Meeting' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'own',
      'create' => 'yes'
    ],
    'Opportunity' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'Reminder' => false,
    'Target' => false,
    'TargetList' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'Task' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'team',
      'delete' => 'own',
      'create' => 'yes'
    ],
    'Project' => (object) [
      'read' => 'all',
      'stream' => 'own',
      'edit' => 'all',
      'delete' => 'own',
      'create' => 'yes'
    ],
    'ProjectTask' => (object) [
      'read' => 'all',
      'stream' => 'team',
      'edit' => 'all',
      'delete' => 'own',
      'create' => 'yes'
    ],
    'PushSubscriber' => false,
    'UseCase' => false,
    'UseCaseItem' => false,
    'BpmnFlowNode' => false,
    'BpmnFlowchart' => false,
    'BpmnProcess' => false,
    'BpmnSignalListener' => false,
    'BpmnUserTask' => false,
    'Report' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'no',
      'delete' => 'no',
      'create' => 'no'
    ],
    'ReportCategory' => false,
    'ReportFilter' => false,
    'ReportPanel' => false,
    'Workflow' => false,
    'WorkflowCategory' => false,
    'WorkflowLogRecord' => false,
    'WorkflowRoundRobin' => false,
    'RecordRecurrence' => (object) [
      'read' => 'own',
      'stream' => 'no',
      'edit' => 'own',
      'delete' => 'own',
      'create' => 'yes'
    ],
    'Product' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'all',
      'create' => 'yes'
    ],
    'ProductCategory' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'all',
      'create' => 'yes'
    ],
    'TaxClass' => false,
    'AdvanceDeductionItem' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'DeliveryNote' => false,
    'HandoverProtocol' => false,
    'Invoice' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'InvoiceItem' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'PurchaseOrder' => false,
    'PurchaseOrderItem' => false,
    'Quote' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'no',
      'delete' => 'no',
      'create' => 'no'
    ],
    'QuoteItem' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'no',
      'delete' => 'no',
      'create' => 'no'
    ],
    'SalesOrder' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'SalesOrderItem' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'SupplierInvoice' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'SupplierInvoiceItem' => false,
    'UnreliablePayer' => false,
    'VatNumberValidation' => false,
    'Attendance' => false,
    'EducationAndTrainingRecord' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'HumanResource' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'MedicalExamination' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'OtherEvent' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'Password' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'Vacation' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'own',
      'delete' => 'own',
      'create' => 'yes'
    ],
    'VacationRequest' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'VacationRequestApprovalItem' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'Chat' => true,
    'OnlyOffice' => false,
    'PriceList' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'Reclamation' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'SupplierReclamation' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'GoodsIssue' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'GoodsReceipt' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'SupplierOrder' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'SupplierOrderItem' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'Warehouse' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'WarehouseItem' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'WarehousePosition' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'WarehouseTransfer' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'WarehouseValueRecord' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'CreditNote' => false,
    'CreditNoteItem' => false,
    'ExpenseReceipt' => false,
    'IssuedTaxDocument' => false,
    'IssuedTaxDocumentItem' => false,
    'PartialPayments' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'Payment' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'ProformaInvoice' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'ProformaInvoiceItem' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'ReceivedProformaInvoice' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'ReceivedProformaInvoiceItem' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'ReceivedTaxDocument' => false,
    'ReceivedTaxDocumentItem' => false,
    'RevenueReceipt' => false,
    'SummaryVatRates' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'Google' => false,
    'GoogleCalendar' => true,
    'GoogleCalendarRecurrentEvent' => false,
    'GoogleCalendarUser' => false,
    'GoogleContacts' => true,
    'GoogleContactsGroup' => false,
    'GoogleContactsPair' => false,
    'GoogleGmail' => false,
    'Cooperation' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'Operation' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'ProductionModel' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'ProductionModelItem' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'ProductionModelOperation' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'ProductionOrder' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'WorkCenter' => false,
    'WorkPerformed' => false,
    'XmlTemplate' => false,
    'Absence' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'own',
      'delete' => 'own',
      'create' => 'yes'
    ],
    'ClockIn' => false,
    'CompetetionBase' => false,
    'Complaint' => false,
    'Contractor' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'no',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'ContractorItem' => false,
    'EspoCRMnvody' => false,
    'HumanResources' => (object) [
      'read' => 'own',
      'stream' => 'no',
      'edit' => 'no',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'InternalAgenda' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'LogTime' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'OpportunityItem' => false,
    'OrderItem' => false,
    'Porady' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'own',
      'create' => 'yes'
    ],
    'ProductDatabase' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'ProjectorDatabase' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'QualityReport' => false,
    'QuoteEntry' => false,
    'ReceivedInvoiceItem' => false,
    'ReceivedInvoices' => false,
    'RequestForm' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'own',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'RequestItem' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'Smernice' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'team',
      'delete' => 'own',
      'create' => 'yes'
    ],
    'SmerniceItem' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'own',
      'create' => 'yes'
    ],
    'ComplaintBook' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'own',
      'create' => 'yes'
    ],
    'ItTask' => false,
    'JIRA' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'Manufacturing' => false,
    'Prospect' => false,
    'SalesOrderSummaryItem' => false,
    'Seeker' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'Selector' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'Tax' => false,
    'Wiso' => false
  ],
  'fieldTable' => (object) [
    'ActionHistoryRecord' => (object) [
      'authToken' => (object) [
        'read' => 'no',
        'edit' => 'no'
      ],
      'authLogRecord' => (object) [
        'read' => 'no',
        'edit' => 'no'
      ]
    ],
    'ArrayValue' => (object) [],
    'Attachment' => (object) [],
    'AuthLogRecord' => (object) [],
    'AuthToken' => (object) [],
    'AuthenticationProvider' => (object) [],
    'Autofollow' => (object) [],
    'Currency' => (object) [],
    'DashboardTemplate' => (object) [],
    'Email' => (object) [
      'inboundEmails' => (object) [
        'read' => 'no',
        'edit' => 'no'
      ],
      'emailAccounts' => (object) [
        'read' => 'no',
        'edit' => 'no'
      ]
    ],
    'EmailAccount' => (object) [
      'assignedUser' => (object) [
        'read' => 'yes',
        'edit' => 'no'
      ]
    ],
    'EmailAddress' => (object) [],
    'EmailFilter' => (object) [],
    'EmailFolder' => (object) [
      'assignedUser' => (object) [
        'read' => 'yes',
        'edit' => 'no'
      ]
    ],
    'EmailTemplate' => (object) [],
    'EmailTemplateCategory' => (object) [],
    'Extension' => (object) [],
    'ExternalAccount' => (object) [],
    'GroupEmailFolder' => (object) [],
    'Import' => (object) [],
    'ImportError' => (object) [],
    'InboundEmail' => (object) [],
    'Integration' => (object) [],
    'Job' => (object) [],
    'LayoutRecord' => (object) [],
    'LayoutSet' => (object) [],
    'LeadCapture' => (object) [],
    'LeadCaptureLogRecord' => (object) [],
    'Note' => (object) [],
    'Notification' => (object) [],
    'PasswordChangeRequest' => (object) [],
    'PhoneNumber' => (object) [],
    'Portal' => (object) [],
    'PortalRole' => (object) [],
    'Preferences' => (object) [],
    'Role' => (object) [],
    'ScheduledJob' => (object) [],
    'ScheduledJobLogRecord' => (object) [],
    'Subscription' => (object) [],
    'Team' => (object) [],
    'Template' => (object) [],
    'UniqueId' => (object) [],
    'User' => (object) [
      'password' => (object) [
        'read' => 'no',
        'edit' => 'no'
      ],
      'passwordConfirm' => (object) [
        'read' => 'no',
        'edit' => 'no'
      ],
      'authMethod' => (object) [
        'read' => 'no',
        'edit' => 'no'
      ],
      'apiKey' => (object) [
        'read' => 'no',
        'edit' => 'no'
      ],
      'secretKey' => (object) [
        'read' => 'no',
        'edit' => 'no'
      ],
      'token' => (object) [
        'read' => 'no',
        'edit' => 'no'
      ],
      'gender' => (object) [
        'read' => 'no',
        'edit' => 'no'
      ],
      'dashboardTemplate' => (object) [
        'read' => 'no',
        'edit' => 'no'
      ],
      'workingTimeCalendar' => (object) [
        'read' => 'yes',
        'edit' => 'no'
      ],
      'auth2FA' => (object) [
        'read' => 'no',
        'edit' => 'no'
      ]
    ],
    'UserData' => (object) [],
    'Webhook' => (object) [],
    'WebhookEventQueueItem' => (object) [],
    'WebhookQueueItem' => (object) [],
    'WorkingTimeCalendar' => (object) [],
    'WorkingTimeRange' => (object) [],
    'Account' => (object) [],
    'Call' => (object) [],
    'Campaign' => (object) [],
    'CampaignLogRecord' => (object) [],
    'CampaignTrackingUrl' => (object) [],
    'Case' => (object) [],
    'Contact' => (object) [],
    'Document' => (object) [],
    'DocumentFolder' => (object) [],
    'EmailQueueItem' => (object) [],
    'KnowledgeBaseArticle' => (object) [],
    'KnowledgeBaseCategory' => (object) [],
    'Lead' => (object) [],
    'MassEmail' => (object) [],
    'Meeting' => (object) [],
    'Opportunity' => (object) [],
    'Reminder' => (object) [],
    'TargetList' => (object) [],
    'Task' => (object) [],
    'Project' => (object) [],
    'ProjectTask' => (object) [],
    'PushSubscriber' => (object) [],
    'UseCase' => (object) [],
    'UseCaseItem' => (object) [],
    'BpmnFlowNode' => (object) [],
    'BpmnFlowchart' => (object) [],
    'BpmnProcess' => (object) [],
    'BpmnSignalListener' => (object) [],
    'BpmnUserTask' => (object) [],
    'Report' => (object) [],
    'ReportCategory' => (object) [],
    'ReportFilter' => (object) [],
    'ReportPanel' => (object) [],
    'Workflow' => (object) [],
    'WorkflowCategory' => (object) [],
    'WorkflowLogRecord' => (object) [],
    'WorkflowRoundRobin' => (object) [],
    'RecordRecurrence' => (object) [],
    'Product' => (object) [],
    'ProductCategory' => (object) [],
    'TaxClass' => (object) [],
    'AdvanceDeductionItem' => (object) [],
    'DeliveryNote' => (object) [],
    'HandoverProtocol' => (object) [],
    'Invoice' => (object) [],
    'InvoiceItem' => (object) [],
    'PurchaseOrder' => (object) [],
    'PurchaseOrderItem' => (object) [],
    'Quote' => (object) [],
    'QuoteItem' => (object) [],
    'SalesOrder' => (object) [],
    'SalesOrderItem' => (object) [],
    'SupplierInvoice' => (object) [],
    'SupplierInvoiceItem' => (object) [],
    'UnreliablePayer' => (object) [],
    'VatNumberValidation' => (object) [],
    'Attendance' => (object) [],
    'EducationAndTrainingRecord' => (object) [],
    'HumanResource' => (object) [],
    'MedicalExamination' => (object) [],
    'OtherEvent' => (object) [],
    'Password' => (object) [],
    'Vacation' => (object) [],
    'VacationRequest' => (object) [],
    'VacationRequestApprovalItem' => (object) [],
    'PriceList' => (object) [],
    'Reclamation' => (object) [],
    'SupplierReclamation' => (object) [],
    'GoodsIssue' => (object) [],
    'GoodsReceipt' => (object) [],
    'SupplierOrder' => (object) [],
    'SupplierOrderItem' => (object) [],
    'Warehouse' => (object) [],
    'WarehouseItem' => (object) [],
    'WarehousePosition' => (object) [],
    'WarehouseTransfer' => (object) [],
    'WarehouseValueRecord' => (object) [],
    'CreditNote' => (object) [],
    'CreditNoteItem' => (object) [],
    'ExpenseReceipt' => (object) [],
    'IssuedTaxDocument' => (object) [],
    'IssuedTaxDocumentItem' => (object) [],
    'PartialPayments' => (object) [],
    'Payment' => (object) [],
    'ProformaInvoice' => (object) [],
    'ProformaInvoiceItem' => (object) [],
    'ReceivedProformaInvoice' => (object) [],
    'ReceivedProformaInvoiceItem' => (object) [],
    'ReceivedTaxDocument' => (object) [],
    'ReceivedTaxDocumentItem' => (object) [],
    'RevenueReceipt' => (object) [],
    'SummaryVatRates' => (object) [],
    'GoogleCalendar' => (object) [],
    'GoogleCalendarRecurrentEvent' => (object) [],
    'GoogleCalendarUser' => (object) [],
    'GoogleContactsGroup' => (object) [],
    'GoogleContactsPair' => (object) [],
    'Cooperation' => (object) [],
    'Operation' => (object) [],
    'ProductionModel' => (object) [],
    'ProductionModelItem' => (object) [],
    'ProductionModelOperation' => (object) [],
    'ProductionOrder' => (object) [],
    'WorkCenter' => (object) [],
    'WorkPerformed' => (object) [],
    'XmlTemplate' => (object) [],
    'Absence' => (object) [
      'approved' => (object) [
        'read' => 'yes',
        'edit' => 'no'
      ]
    ],
    'ClockIn' => (object) [],
    'CompetetionBase' => (object) [],
    'Complaint' => (object) [],
    'Contractor' => (object) [],
    'ContractorItem' => (object) [],
    'EspoCRMnvody' => (object) [],
    'HumanResources' => (object) [],
    'InternalAgenda' => (object) [],
    'LogTime' => (object) [],
    'OrderItem' => (object) [],
    'Porady' => (object) [],
    'ProductDatabase' => (object) [],
    'ProjectorDatabase' => (object) [],
    'QualityReport' => (object) [],
    'QuoteEntry' => (object) [],
    'ReceivedInvoiceItem' => (object) [],
    'ReceivedInvoices' => (object) [],
    'RequestForm' => (object) [
      'approved' => (object) [
        'read' => 'yes',
        'edit' => 'no'
      ],
      'disapproved' => (object) [
        'read' => 'yes',
        'edit' => 'no'
      ]
    ],
    'RequestItem' => (object) [],
    'Smernice' => (object) [],
    'SmerniceItem' => (object) [],
    'ComplaintBook' => (object) [],
    'ItTask' => (object) [],
    'JIRA' => (object) [],
    'Manufacturing' => (object) [],
    'Prospect' => (object) [],
    'SalesOrderSummaryItem' => (object) [],
    'Seeker' => (object) [],
    'Selector' => (object) [],
    'Tax' => (object) [],
    'Wiso' => (object) []
  ],
  'assignmentPermission' => 'all',
  'userPermission' => 'all',
  'messagePermission' => 'all',
  'portalPermission' => 'yes',
  'groupEmailAccountPermission' => 'no',
  'exportPermission' => 'yes',
  'massUpdatePermission' => 'yes',
  'followerManagementPermission' => 'no',
  'dataPrivacyPermission' => 'yes',
  'fieldTableQuickAccess' => (object) [
    'ActionHistoryRecord' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => [
            0 => 'authTokenId',
            1 => 'authTokenName',
            2 => 'authLogRecordId',
            3 => 'authLogRecordName'
          ]
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => [
            0 => 'authTokenId',
            1 => 'authTokenName',
            2 => 'authLogRecordId',
            3 => 'authLogRecordName'
          ]
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => [
            0 => 'authToken',
            1 => 'authLogRecord'
          ]
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => [
            0 => 'authToken',
            1 => 'authLogRecord'
          ]
        ]
      ]
    ],
    'ArrayValue' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Attachment' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'AuthLogRecord' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'AuthToken' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'AuthenticationProvider' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Autofollow' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Currency' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'DashboardTemplate' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Email' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => [
            0 => 'inboundEmailsIds',
            1 => 'inboundEmailsRecordList',
            2 => 'inboundEmailsNames',
            3 => 'emailAccountsIds',
            4 => 'emailAccountsRecordList',
            5 => 'emailAccountsNames'
          ]
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => [
            0 => 'inboundEmailsIds',
            1 => 'inboundEmailsRecordList',
            2 => 'inboundEmailsNames',
            3 => 'emailAccountsIds',
            4 => 'emailAccountsRecordList',
            5 => 'emailAccountsNames'
          ]
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => [
            0 => 'inboundEmails',
            1 => 'emailAccounts'
          ]
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => [
            0 => 'inboundEmails',
            1 => 'emailAccounts'
          ]
        ]
      ]
    ],
    'EmailAccount' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [
            0 => 'assignedUserId',
            1 => 'assignedUserName'
          ],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => [
            0 => 'assignedUserId',
            1 => 'assignedUserName'
          ]
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [
            0 => 'assignedUser'
          ],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => [
            0 => 'assignedUser'
          ]
        ]
      ]
    ],
    'EmailAddress' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'EmailFilter' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'EmailFolder' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [
            0 => 'assignedUserId',
            1 => 'assignedUserName'
          ],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => [
            0 => 'assignedUserId',
            1 => 'assignedUserName'
          ]
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [
            0 => 'assignedUser'
          ],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => [
            0 => 'assignedUser'
          ]
        ]
      ]
    ],
    'EmailTemplate' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'EmailTemplateCategory' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Extension' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'ExternalAccount' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'GroupEmailFolder' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Import' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'ImportError' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'InboundEmail' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Integration' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Job' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'LayoutRecord' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'LayoutSet' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'LeadCapture' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'LeadCaptureLogRecord' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Note' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Notification' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'PasswordChangeRequest' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'PhoneNumber' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Portal' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'PortalRole' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Preferences' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Role' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'ScheduledJob' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'ScheduledJobLogRecord' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Subscription' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Team' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Template' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'UniqueId' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'User' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [
            0 => 'workingTimeCalendarId',
            1 => 'workingTimeCalendarName'
          ],
          'no' => [
            0 => 'password',
            1 => 'passwordConfirm',
            2 => 'authMethod',
            3 => 'apiKey',
            4 => 'secretKey',
            5 => 'token',
            6 => 'gender',
            7 => 'dashboardTemplateId',
            8 => 'dashboardTemplateName',
            9 => 'auth2FA'
          ]
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => [
            0 => 'password',
            1 => 'passwordConfirm',
            2 => 'authMethod',
            3 => 'apiKey',
            4 => 'secretKey',
            5 => 'token',
            6 => 'gender',
            7 => 'dashboardTemplateId',
            8 => 'dashboardTemplateName',
            9 => 'workingTimeCalendarId',
            10 => 'workingTimeCalendarName',
            11 => 'auth2FA'
          ]
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [
            0 => 'workingTimeCalendar'
          ],
          'no' => [
            0 => 'password',
            1 => 'passwordConfirm',
            2 => 'authMethod',
            3 => 'apiKey',
            4 => 'secretKey',
            5 => 'token',
            6 => 'gender',
            7 => 'dashboardTemplate',
            8 => 'auth2FA'
          ]
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => [
            0 => 'password',
            1 => 'passwordConfirm',
            2 => 'authMethod',
            3 => 'apiKey',
            4 => 'secretKey',
            5 => 'token',
            6 => 'gender',
            7 => 'dashboardTemplate',
            8 => 'workingTimeCalendar',
            9 => 'auth2FA'
          ]
        ]
      ]
    ],
    'UserData' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Webhook' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'WebhookEventQueueItem' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'WebhookQueueItem' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'WorkingTimeCalendar' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'WorkingTimeRange' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Account' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Call' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Campaign' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'CampaignLogRecord' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'CampaignTrackingUrl' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Case' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Contact' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Document' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'DocumentFolder' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'EmailQueueItem' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'KnowledgeBaseArticle' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'KnowledgeBaseCategory' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Lead' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'MassEmail' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Meeting' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Opportunity' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Reminder' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'TargetList' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Task' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Project' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'ProjectTask' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'PushSubscriber' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'UseCase' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'UseCaseItem' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'BpmnFlowNode' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'BpmnFlowchart' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'BpmnProcess' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'BpmnSignalListener' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'BpmnUserTask' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Report' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'ReportCategory' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'ReportFilter' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'ReportPanel' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Workflow' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'WorkflowCategory' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'WorkflowLogRecord' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'WorkflowRoundRobin' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'RecordRecurrence' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Product' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'ProductCategory' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'TaxClass' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'AdvanceDeductionItem' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'DeliveryNote' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'HandoverProtocol' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Invoice' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'InvoiceItem' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'PurchaseOrder' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'PurchaseOrderItem' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Quote' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'QuoteItem' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'SalesOrder' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'SalesOrderItem' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'SupplierInvoice' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'SupplierInvoiceItem' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'UnreliablePayer' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'VatNumberValidation' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Attendance' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'EducationAndTrainingRecord' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'HumanResource' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'MedicalExamination' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'OtherEvent' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Password' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Vacation' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'VacationRequest' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'VacationRequestApprovalItem' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'PriceList' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Reclamation' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'SupplierReclamation' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'GoodsIssue' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'GoodsReceipt' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'SupplierOrder' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'SupplierOrderItem' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Warehouse' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'WarehouseItem' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'WarehousePosition' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'WarehouseTransfer' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'WarehouseValueRecord' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'CreditNote' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'CreditNoteItem' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'ExpenseReceipt' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'IssuedTaxDocument' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'IssuedTaxDocumentItem' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'PartialPayments' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Payment' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'ProformaInvoice' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'ProformaInvoiceItem' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'ReceivedProformaInvoice' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'ReceivedProformaInvoiceItem' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'ReceivedTaxDocument' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'ReceivedTaxDocumentItem' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'RevenueReceipt' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'SummaryVatRates' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'GoogleCalendar' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'GoogleCalendarRecurrentEvent' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'GoogleCalendarUser' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'GoogleContactsGroup' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'GoogleContactsPair' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Cooperation' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Operation' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'ProductionModel' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'ProductionModelItem' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'ProductionModelOperation' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'ProductionOrder' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'WorkCenter' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'WorkPerformed' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'XmlTemplate' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Absence' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [
            0 => 'approved'
          ],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => [
            0 => 'approved'
          ]
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [
            0 => 'approved'
          ],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => [
            0 => 'approved'
          ]
        ]
      ]
    ],
    'ClockIn' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'CompetetionBase' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Complaint' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Contractor' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'ContractorItem' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'EspoCRMnvody' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'HumanResources' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'InternalAgenda' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'LogTime' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'OrderItem' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Porady' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'ProductDatabase' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'ProjectorDatabase' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'QualityReport' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'QuoteEntry' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'ReceivedInvoiceItem' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'ReceivedInvoices' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'RequestForm' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [
            0 => 'approved',
            1 => 'disapproved'
          ],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => [
            0 => 'approved',
            1 => 'disapproved'
          ]
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [
            0 => 'approved',
            1 => 'disapproved'
          ],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => [
            0 => 'approved',
            1 => 'disapproved'
          ]
        ]
      ]
    ],
    'RequestItem' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Smernice' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'SmerniceItem' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'ComplaintBook' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'ItTask' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'JIRA' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Manufacturing' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Prospect' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'SalesOrderSummaryItem' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Seeker' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Selector' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Tax' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ],
    'Wiso' => (object) [
      'attributes' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ],
      'fields' => (object) [
        'read' => (object) [
          'yes' => [],
          'no' => []
        ],
        'edit' => (object) [
          'yes' => [],
          'no' => []
        ]
      ]
    ]
  ]
];
