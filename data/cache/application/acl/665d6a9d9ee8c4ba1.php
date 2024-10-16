<?php
return (object) [
  'scopes' => (object) [
    'Currency' => (object) [
      'read' => 'yes',
      'edit' => 'yes'
    ],
    'Email' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'own',
      'create' => 'yes'
    ],
    'EmailAccountScope' => true,
    'EmailTemplate' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'own',
      'create' => 'yes'
    ],
    'EmailTemplateCategory' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'ExternalAccount' => true,
    'Import' => true,
    'Team' => (object) [
      'read' => 'all'
    ],
    'Template' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'User' => (object) [
      'read' => 'all',
      'edit' => 'own'
    ],
    'Webhook' => true,
    'Account' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'own',
      'create' => 'yes'
    ],
    'Activities' => true,
    'Calendar' => true,
    'Call' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'own',
      'create' => 'yes'
    ],
    'Campaign' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'own',
      'create' => 'yes'
    ],
    'Case' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'Contact' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'own',
      'create' => 'yes'
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
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'KnowledgeBaseArticle' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'KnowledgeBaseCategory' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'Lead' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'Meeting' => (object) [
      'read' => 'all',
      'stream' => 'all',
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
      'edit' => 'all',
      'delete' => 'own',
      'create' => 'yes'
    ],
    'Project' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'own',
      'create' => 'yes'
    ],
    'ProjectTask' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'own',
      'create' => 'yes'
    ],
    'UseCase' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'own',
      'create' => 'yes'
    ],
    'BpmnFlowchart' => (object) [
      'read' => 'all'
    ],
    'BpmnProcess' => (object) [
      'create' => 'yes',
      'read' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'stream' => 'no'
    ],
    'BpmnUserTask' => (object) [
      'read' => 'all',
      'edit' => 'all',
      'delete' => 'no'
    ],
    'Report' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'own',
      'create' => 'yes'
    ],
    'ReportCategory' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'Product' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'ProductCategory' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'Invoice' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'PurchaseOrder' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'Quote' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'SalesOrder' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'all',
      'create' => 'yes'
    ],
    'SupplierInvoice' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'Attendance' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'Vacation' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'VacationRequest' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'Chat' => true,
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
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'all',
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
    'ReceivedProformaInvoice' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'RevenueReceipt' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'SummaryVatRates' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'GoogleCalendar' => true,
    'GoogleContacts' => true,
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
    'ProductionOrder' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'WorkPerformed' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'Absence' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'own',
      'create' => 'yes'
    ],
    'ClockIn' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'CompetetionBase' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'Complaint' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'Contractor' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'ContractorItem' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'HumanResources' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'InternalAgenda' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'LogTime' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
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
    'QualityReport' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'RequestForm' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
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
      'edit' => 'all',
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
    'JIRA' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'SalesOrderSummaryItem' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
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
    'WorkingTimeCalendar' => true,
    'PushSubscriber' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'TaxClass' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'DeliveryNote' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'HandoverProtocol' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'UnreliablePayer' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'VatNumberValidation' => (object) [
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
    'GoodsReceipt' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'CreditNote' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'ExpenseReceipt' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'IssuedTaxDocument' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'ReceivedTaxDocument' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'Cooperation' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'WorkCenter' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'XmlTemplate' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'EspoCRMnvody' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'ReceivedInvoices' => false,
    'Wiso' => false,
    'Target' => false,
    'QuoteEntry' => false,
    'Note' => (object) [
      'read' => 'own',
      'edit' => 'own',
      'delete' => 'own',
      'create' => 'yes'
    ],
    'Portal' => (object) [
      'read' => 'all',
      'edit' => 'no',
      'delete' => 'no',
      'create' => 'no'
    ],
    'Attachment' => (object) [
      'read' => 'own',
      'edit' => 'own',
      'delete' => 'own',
      'create' => 'yes'
    ],
    'EmailAccount' => (object) [
      'read' => 'own',
      'edit' => 'own',
      'delete' => 'own',
      'create' => 'yes'
    ],
    'EmailFilter' => (object) [
      'read' => 'own',
      'edit' => 'own',
      'delete' => 'own',
      'create' => 'yes'
    ],
    'EmailFolder' => (object) [
      'read' => 'own',
      'edit' => 'own',
      'delete' => 'own',
      'create' => 'yes'
    ],
    'GroupEmailFolder' => (object) [
      'read' => 'team',
      'edit' => 'no',
      'delete' => 'no',
      'create' => 'no'
    ],
    'Preferences' => (object) [
      'read' => 'own',
      'edit' => 'own',
      'delete' => 'no',
      'create' => 'no'
    ],
    'Notification' => (object) [
      'read' => 'own',
      'edit' => 'no',
      'delete' => 'own',
      'create' => 'no'
    ],
    'ActionHistoryRecord' => (object) [
      'read' => 'own'
    ],
    'Role' => false,
    'PortalRole' => false,
    'ImportError' => true,
    'WorkingTimeRange' => true,
    'Stream' => true,
    'MassEmail' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'own',
      'create' => 'yes'
    ],
    'CampaignLogRecord' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'own',
      'create' => 'yes'
    ],
    'CampaignTrackingUrl' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'own',
      'create' => 'yes'
    ],
    'EmailQueueItem' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'own',
      'create' => 'yes'
    ],
    'Workflow' => false,
    'WorkflowLogRecord' => false,
    'ReportPanel' => false,
    'BpmnFlowNode' => (object) [
      'create' => 'yes',
      'read' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'stream' => 'no'
    ],
    'RecordRecurrence' => (object) [
      'read' => 'own',
      'edit' => 'own',
      'delete' => 'own',
      'create' => 'yes'
    ],
    'InvoiceItem' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'AdvanceDeductionItem' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'QuoteItem' => (object) [
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
      'delete' => 'all',
      'create' => 'yes'
    ],
    'PurchaseOrderItem' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'SupplierInvoiceItem' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'EducationAndTrainingRecord' => (object) [
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
    'VacationRequestApprovalItem' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'WarehouseItem' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'all',
      'create' => 'yes'
    ],
    'ProformaInvoiceItem' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'CreditNoteItem' => (object) [
      'read' => 'all',
      'stream' => 'no',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'IssuedTaxDocumentItem' => (object) [
      'read' => 'all',
      'stream' => 'no',
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
    'ReceivedTaxDocumentItem' => (object) [
      'read' => 'all',
      'stream' => 'no',
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
    ]
  ],
  'fields' => (object) [
    'Currency' => (object) [],
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
    'EmailTemplate' => (object) [],
    'EmailTemplateCategory' => (object) [],
    'ExternalAccount' => (object) [],
    'Import' => (object) [],
    'Team' => (object) [],
    'Template' => (object) [],
    'User' => (object) [
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
      'password' => (object) [
        'read' => 'no',
        'edit' => 'no'
      ],
      'passwordConfirm' => (object) [
        'read' => 'no',
        'edit' => 'no'
      ],
      'auth2FA' => (object) [
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
      ]
    ],
    'Webhook' => (object) [],
    'WorkingTimeCalendar' => (object) [],
    'Account' => (object) [],
    'Call' => (object) [],
    'Campaign' => (object) [],
    'Case' => (object) [],
    'Contact' => (object) [],
    'Document' => (object) [],
    'DocumentFolder' => (object) [],
    'KnowledgeBaseArticle' => (object) [],
    'KnowledgeBaseCategory' => (object) [],
    'Lead' => (object) [],
    'Meeting' => (object) [],
    'Opportunity' => (object) [],
    'TargetList' => (object) [],
    'Task' => (object) [],
    'Project' => (object) [],
    'ProjectTask' => (object) [],
    'PushSubscriber' => (object) [],
    'UseCase' => (object) [],
    'BpmnFlowchart' => (object) [],
    'BpmnProcess' => (object) [],
    'BpmnUserTask' => (object) [],
    'Report' => (object) [],
    'ReportCategory' => (object) [],
    'Product' => (object) [],
    'ProductCategory' => (object) [],
    'TaxClass' => (object) [],
    'DeliveryNote' => (object) [],
    'HandoverProtocol' => (object) [],
    'Invoice' => (object) [],
    'PurchaseOrder' => (object) [],
    'Quote' => (object) [
      'priceList' => (object) [
        'read' => 'yes',
        'edit' => 'yes'
      ],
      'items' => (object) [
        'read' => 'yes',
        'edit' => 'yes'
      ]
    ],
    'SalesOrder' => (object) [
      'priceList1' => (object) [
        'read' => 'yes',
        'edit' => 'yes'
      ],
      'productionOrders' => (object) [
        'read' => 'yes',
        'edit' => 'yes'
      ],
      'salesOrderItems' => (object) [
        'read' => 'yes',
        'edit' => 'yes'
      ],
      'warehouseItems' => (object) [
        'read' => 'yes',
        'edit' => 'yes'
      ],
      'warehouseItem' => (object) [
        'read' => 'yes',
        'edit' => 'yes'
      ]
    ],
    'SupplierInvoice' => (object) [],
    'UnreliablePayer' => (object) [],
    'VatNumberValidation' => (object) [],
    'Attendance' => (object) [],
    'HumanResource' => (object) [],
    'Vacation' => (object) [
      'vacationRequests' => (object) [
        'read' => 'yes',
        'edit' => 'yes'
      ]
    ],
    'VacationRequest' => (object) [
      'statusOfApproval' => (object) [
        'read' => 'yes',
        'edit' => 'yes'
      ]
    ],
    'PriceList' => (object) [],
    'Reclamation' => (object) [],
    'SupplierReclamation' => (object) [],
    'GoodsIssue' => (object) [],
    'GoodsReceipt' => (object) [],
    'SupplierOrder' => (object) [],
    'SupplierOrderItem' => (object) [],
    'Warehouse' => (object) [
      'product' => (object) [
        'read' => 'yes',
        'edit' => 'yes'
      ]
    ],
    'WarehousePosition' => (object) [],
    'WarehouseTransfer' => (object) [],
    'WarehouseValueRecord' => (object) [],
    'CreditNote' => (object) [],
    'ExpenseReceipt' => (object) [],
    'IssuedTaxDocument' => (object) [],
    'PartialPayments' => (object) [],
    'Payment' => (object) [],
    'ProformaInvoice' => (object) [],
    'ReceivedProformaInvoice' => (object) [],
    'ReceivedTaxDocument' => (object) [],
    'RevenueReceipt' => (object) [],
    'SummaryVatRates' => (object) [],
    'GoogleCalendar' => (object) [],
    'Cooperation' => (object) [],
    'Operation' => (object) [],
    'ProductionModel' => (object) [
      'billOfMaterials' => (object) [
        'read' => 'yes',
        'edit' => 'yes'
      ]
    ],
    'ProductionOrder' => (object) [
      'billOfMaterials' => (object) [
        'read' => 'yes',
        'edit' => 'yes'
      ]
    ],
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
    'Porady' => (object) [],
    'ProductDatabase' => (object) [],
    'ProjectorDatabase' => (object) [],
    'QualityReport' => (object) [],
    'RequestForm' => (object) [
      'amount' => (object) [
        'read' => 'yes',
        'edit' => 'yes'
      ],
      'amountCurrency' => (object) [
        'read' => 'yes',
        'edit' => 'yes'
      ],
      'amountConverted' => (object) [
        'read' => 'yes',
        'edit' => 'yes'
      ],
      'approved' => (object) [
        'read' => 'yes',
        'edit' => 'yes'
      ],
      'disapproved' => (object) [
        'read' => 'yes',
        'edit' => 'yes'
      ]
    ],
    'RequestItem' => (object) [],
    'Smernice' => (object) [],
    'SmerniceItem' => (object) [],
    'ComplaintBook' => (object) [],
    'JIRA' => (object) [],
    'SalesOrderSummaryItem' => (object) [],
    'Seeker' => (object) [],
    'Selector' => (object) [],
    'Wiso' => (object) [],
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
    'EmailAccount' => (object) [
      'assignedUser' => (object) [
        'read' => 'yes',
        'edit' => 'no'
      ]
    ],
    'EmailFolder' => (object) [
      'assignedUser' => (object) [
        'read' => 'yes',
        'edit' => 'no'
      ]
    ]
  ],
  'permissions' => (object) [
    'assignment' => 'all',
    'user' => 'all',
    'message' => 'all',
    'portal' => 'yes',
    'groupEmailAccount' => 'all',
    'export' => 'yes',
    'massUpdate' => 'yes',
    'followerManagement' => 'all',
    'dataPrivacy' => 'yes'
  ]
];
