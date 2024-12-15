<?php
return [
  'Account' => [
    'afterRelate' => [
      0 => [
        'className' => 'Espo\\Modules\\Crm\\Hooks\\Account\\Contacts',
        'order' => 9
      ]
    ],
    'afterUnrelate' => [
      0 => [
        'className' => 'Espo\\Modules\\Crm\\Hooks\\Account\\Contacts',
        'order' => 9
      ]
    ],
    'afterSave' => [
      0 => [
        'className' => 'Espo\\Modules\\Crm\\Hooks\\Account\\TargetList',
        'order' => 9
      ],
      1 => [
        'className' => 'Espo\\Modules\\Pohoda\\Hooks\\Account\\SynchronizeAccountHook',
        'order' => 9
      ]
    ]
  ],
  'Call' => [
    'beforeSave' => [
      0 => [
        'className' => 'Espo\\Modules\\Crm\\Hooks\\Call\\ParentLink',
        'order' => 9
      ],
      1 => [
        'className' => 'Espo\\Modules\\Google\\Hooks\\Call\\Google',
        'order' => 9
      ],
      2 => [
        'className' => 'Espo\\Modules\\Crm\\Hooks\\Call\\Users',
        'order' => 12
      ]
    ]
  ],
  'Case' => [
    'afterSave' => [
      0 => [
        'className' => 'Espo\\Modules\\Crm\\Hooks\\CaseObj\\Contacts',
        'order' => 9
      ]
    ]
  ],
  'Contact' => [
    'afterSave' => [
      0 => [
        'className' => 'Espo\\Modules\\Crm\\Hooks\\Contact\\Accounts',
        'order' => 9
      ],
      1 => [
        'className' => 'Espo\\Modules\\Crm\\Hooks\\Contact\\TargetList',
        'order' => 9
      ]
    ],
    'afterRelate' => [
      0 => [
        'className' => 'Espo\\Modules\\Crm\\Hooks\\Contact\\Opportunities',
        'order' => 9
      ]
    ],
    'afterUnrelate' => [
      0 => [
        'className' => 'Espo\\Modules\\Crm\\Hooks\\Contact\\Opportunities',
        'order' => 9
      ]
    ]
  ],
  'Lead' => [
    'beforeSave' => [
      0 => [
        'className' => 'Espo\\Modules\\Crm\\Hooks\\Lead\\ConvertedAt',
        'order' => 9
      ]
    ],
    'afterSave' => [
      0 => [
        'className' => 'Espo\\Modules\\Crm\\Hooks\\Lead\\TargetList',
        'order' => 9
      ]
    ]
  ],
  'Meeting' => [
    'afterRemove' => [
      0 => [
        'className' => 'Espo\\Modules\\Crm\\Hooks\\Meeting\\EmailCreatedEvent',
        'order' => 9
      ]
    ],
    'beforeSave' => [
      0 => [
        'className' => 'Espo\\Modules\\Crm\\Hooks\\Meeting\\ParentLink',
        'order' => 9
      ],
      1 => [
        'className' => 'Espo\\Modules\\Google\\Hooks\\Meeting\\Google',
        'order' => 9
      ],
      2 => [
        'className' => 'Espo\\Modules\\Crm\\Hooks\\Meeting\\Users',
        'order' => 12
      ]
    ]
  ],
  'Opportunity' => [
    'afterSave' => [
      0 => [
        'className' => 'Espo\\Modules\\Crm\\Hooks\\Opportunity\\AmountWeightedConverted',
        'order' => 9
      ],
      1 => [
        'className' => 'Espo\\Modules\\Crm\\Hooks\\Opportunity\\Contacts',
        'order' => 9
      ]
    ],
    'beforeSave' => [
      0 => [
        'className' => 'Espo\\Modules\\Crm\\Hooks\\Opportunity\\Probability',
        'order' => 7
      ],
      1 => [
        'className' => 'Espo\\Modules\\Crm\\Hooks\\Opportunity\\LastStage',
        'order' => 8
      ]
    ]
  ],
  'Task' => [
    'beforeSave' => [
      0 => [
        'className' => 'Espo\\Modules\\Crm\\Hooks\\Task\\DateCompleted',
        'order' => 9
      ],
      1 => [
        'className' => 'Espo\\Modules\\Crm\\Hooks\\Task\\ParentLink',
        'order' => 9
      ],
      2 => [
        'className' => 'Espo\\Modules\\Erp\\Hooks\\Task\\SetForRepeated',
        'order' => 9
      ]
    ]
  ],
  'Common' => [
    'beforeSave' => [
      0 => [
        'className' => 'Espo\\Hooks\\Common\\CurrencyConverted',
        'order' => 1
      ],
      1 => [
        'className' => 'Espo\\Modules\\Google\\Hooks\\Common\\GoogleCalendar',
        'order' => 8
      ],
      2 => [
        'className' => 'Espo\\Modules\\Autocrm\\Hooks\\Common\\CalculateCoordinates',
        'order' => 9
      ],
      3 => [
        'className' => 'Espo\\Modules\\Accounting\\Hooks\\Common\\UpdateNextSequenceNumber',
        'order' => 9
      ],
      4 => [
        'className' => 'Espo\\Hooks\\Common\\NextNumber',
        'order' => 9
      ],
      5 => [
        'className' => 'Espo\\Hooks\\Common\\VersionNumber',
        'order' => 9
      ],
      6 => [
        'className' => 'Espo\\Hooks\\Common\\Formula',
        'order' => 11
      ],
      7 => [
        'className' => 'Espo\\Hooks\\Common\\CurrencyDefault',
        'order' => 200
      ]
    ],
    'afterSave' => [
      0 => [
        'className' => 'Espo\\Hooks\\Common\\FieldProcessing',
        'order' => -11
      ],
      1 => [
        'className' => 'Espo\\Modules\\Advanced\\Hooks\\Common\\UpdateDeferredFlowNodes',
        'order' => 9
      ],
      2 => [
        'className' => 'Espo\\Hooks\\Common\\AssignmentEmailNotification',
        'order' => 9
      ],
      3 => [
        'className' => 'Espo\\Hooks\\Common\\Stream',
        'order' => 9
      ],
      4 => [
        'className' => 'Espo\\Hooks\\Common\\Notifications',
        'order' => 10
      ],
      5 => [
        'className' => 'Espo\\Hooks\\Common\\StreamNotesAcl',
        'order' => 10
      ],
      6 => [
        'className' => 'Espo\\Hooks\\Common\\WebSocketSubmit',
        'order' => 20
      ],
      7 => [
        'className' => 'Espo\\Modules\\Advanced\\Hooks\\Common\\Workflow',
        'order' => 99
      ],
      8 => [
        'className' => 'Espo\\Modules\\Advanced\\Hooks\\Common\\Signal',
        'order' => 100
      ],
      9 => [
        'className' => 'Espo\\Hooks\\Common\\Webhook',
        'order' => 101
      ]
    ],
    'afterRemove' => [
      0 => [
        'className' => 'Espo\\Hooks\\Common\\Stream',
        'order' => 9
      ],
      1 => [
        'className' => 'Espo\\Hooks\\Common\\Notifications',
        'order' => 10
      ],
      2 => [
        'className' => 'Espo\\Modules\\Advanced\\Hooks\\Common\\Signal',
        'order' => 100
      ],
      3 => [
        'className' => 'Espo\\Hooks\\Common\\Webhook',
        'order' => 101
      ]
    ],
    'afterRelate' => [
      0 => [
        'className' => 'Espo\\Hooks\\Common\\Stream',
        'order' => 9
      ],
      1 => [
        'className' => 'Espo\\Modules\\Advanced\\Hooks\\Common\\Signal',
        'order' => 100
      ]
    ],
    'afterUnrelate' => [
      0 => [
        'className' => 'Espo\\Hooks\\Common\\Stream',
        'order' => 9
      ],
      1 => [
        'className' => 'Espo\\Modules\\Advanced\\Hooks\\Common\\Signal',
        'order' => 100
      ]
    ],
    'afterMassRelate' => [
      0 => [
        'className' => 'Espo\\Modules\\Advanced\\Hooks\\Common\\Signal',
        'order' => 100
      ]
    ],
    'afterLeadCapture' => [
      0 => [
        'className' => 'Espo\\Modules\\Advanced\\Hooks\\Common\\Signal',
        'order' => 100
      ]
    ],
    'afterConfirmation' => [
      0 => [
        'className' => 'Espo\\Modules\\Advanced\\Hooks\\Common\\Signal',
        'order' => 100
      ]
    ],
    'afterOptOut' => [
      0 => [
        'className' => 'Espo\\Modules\\Advanced\\Hooks\\Common\\Signal',
        'order' => 100
      ]
    ],
    'afterCancelOptOut' => [
      0 => [
        'className' => 'Espo\\Modules\\Advanced\\Hooks\\Common\\Signal',
        'order' => 100
      ]
    ],
    'beforeRemove' => [
      0 => [
        'className' => 'Espo\\Hooks\\Common\\Notifications',
        'order' => 10
      ]
    ]
  ],
  'TestInvoice' => [
    'beforeSave' => [
      0 => [
        'className' => 'Espo\\Modules\\Erp\\Hooks\\TestInvoice\\OCR',
        'order' => 9
      ]
    ]
  ],
  'BpmnFlowchart' => [
    'afterRemove' => [
      0 => [
        'className' => 'Espo\\Modules\\Advanced\\Hooks\\BpmnFlowchart\\RemoveRoundRobin',
        'order' => 9
      ]
    ]
  ],
  'BpmnProcess' => [
    'beforeSave' => [
      0 => [
        'className' => 'Espo\\Modules\\Advanced\\Hooks\\BpmnProcess\\RootProcess',
        'order' => 9
      ]
    ],
    'afterSave' => [
      0 => [
        'className' => 'Espo\\Modules\\Advanced\\Hooks\\BpmnProcess\\StartProcess',
        'order' => 9
      ],
      1 => [
        'className' => 'Espo\\Modules\\Advanced\\Hooks\\BpmnProcess\\StopProcess',
        'order' => 9
      ]
    ],
    'afterRemove' => [
      0 => [
        'className' => 'Espo\\Modules\\Advanced\\Hooks\\BpmnProcess\\SubProcesses',
        'order' => 9
      ]
    ]
  ],
  'BpmnUserTask' => [
    'afterSave' => [
      0 => [
        'className' => 'Espo\\Modules\\Advanced\\Hooks\\BpmnUserTask\\Resolve',
        'order' => 9
      ]
    ]
  ],
  'CampaignTrackingUrl' => [
    'afterClick' => [
      0 => [
        'className' => 'Espo\\Modules\\Advanced\\Hooks\\CampaignTrackingUrl\\Signal',
        'order' => 100
      ]
    ]
  ],
  'TargetList' => [
    'afterOptOut' => [
      0 => [
        'className' => 'Espo\\Modules\\Advanced\\Hooks\\TargetList\\Signal',
        'order' => 100
      ]
    ],
    'afterCancelOptOut' => [
      0 => [
        'className' => 'Espo\\Modules\\Advanced\\Hooks\\TargetList\\Signal',
        'order' => 100
      ]
    ]
  ],
  'Workflow' => [
    'afterSave' => [
      0 => [
        'className' => 'Espo\\Modules\\Advanced\\Hooks\\Workflow\\ReloadWorkflows',
        'order' => 9
      ],
      1 => [
        'className' => 'Espo\\Modules\\Advanced\\Hooks\\Workflow\\RemoveJobs',
        'order' => 9
      ]
    ],
    'afterRemove' => [
      0 => [
        'className' => 'Espo\\Modules\\Advanced\\Hooks\\Workflow\\ReloadWorkflows',
        'order' => 9
      ],
      1 => [
        'className' => 'Espo\\Modules\\Advanced\\Hooks\\Workflow\\RemoveRoundRobin',
        'order' => 9
      ]
    ]
  ],
  'RecordRecurrence' => [
    'beforeSave' => [
      0 => [
        'className' => 'Espo\\Modules\\RecurringRecords\\Hooks\\RecordRecurrence\\DuplicateData',
        'order' => 9
      ]
    ],
    'afterSave' => [
      0 => [
        'className' => 'Espo\\Modules\\RecurringRecords\\Hooks\\RecordRecurrence\\Process',
        'order' => 9
      ],
      1 => [
        'className' => 'Espo\\Modules\\RecurringRecords\\Hooks\\RecordRecurrence\\RemoveScheduledJobs',
        'order' => 9
      ]
    ],
    'afterRemove' => [
      0 => [
        'className' => 'Espo\\Modules\\RecurringRecords\\Hooks\\RecordRecurrence\\RemoveScheduledJobs',
        'order' => 9
      ]
    ]
  ],
  'Product' => [
    'beforeSave' => [
      0 => [
        'className' => 'Espo\\Modules\\ProductBase\\Hooks\\Product\\PriceCalculation',
        'order' => 9
      ],
      1 => [
        'className' => 'Espo\\Modules\\Production\\Hooks\\Product\\SetDefaultProductionModel',
        'order' => 9
      ]
    ],
    'afterStocked' => [
      0 => [
        'className' => 'Espo\\Modules\\WarehouseManagement\\Hooks\\Product\\UpdateCostPrice',
        'order' => 9
      ]
    ],
    'afterUnstocked' => [
      0 => [
        'className' => 'Espo\\Modules\\WarehouseManagement\\Hooks\\Product\\UpdateCostPrice',
        'order' => 9
      ]
    ]
  ],
  'SalesOrder' => [
    'beforeSave' => [
      0 => [
        'className' => 'Espo\\Modules\\Accounting\\Hooks\\SalesOrder\\CancelledSalesOrder',
        'order' => 9
      ],
      1 => [
        'className' => 'Espo\\Modules\\Main\\Hooks\\SalesOrder\\CalcOnHoldTime',
        'order' => 9
      ]
    ]
  ],
  'EducationAndTrainingRecord' => [
    'beforeSave' => [
      0 => [
        'className' => 'Espo\\Modules\\HumanResources\\Hooks\\EducationAndTrainingRecord\\CalculateEstimatedDate',
        'order' => 9
      ]
    ]
  ],
  'HumanResource' => [
    'afterRelate' => [
      0 => [
        'className' => 'Espo\\Modules\\HumanResources\\Hooks\\HumanResource\\CreateMeetingForEducation',
        'order' => 9
      ],
      1 => [
        'className' => 'Espo\\Modules\\HumanResources\\Hooks\\HumanResource\\CreateMeetingForMedicalExamination',
        'order' => 9
      ],
      2 => [
        'className' => 'Espo\\Modules\\HumanResources\\Hooks\\HumanResource\\CreateMeetingForOtherEvent',
        'order' => 9
      ]
    ],
    'beforeSave' => [
      0 => [
        'className' => 'Espo\\Modules\\HumanResources\\Hooks\\HumanResource\\VacationDaysLeftUpdate',
        'order' => 9
      ]
    ]
  ],
  'MedicalExamination' => [
    'beforeSave' => [
      0 => [
        'className' => 'Espo\\Modules\\HumanResources\\Hooks\\MedicalExamination\\CalculateEstimatedDate',
        'order' => 9
      ]
    ]
  ],
  'OtherEvent' => [
    'beforeSave' => [
      0 => [
        'className' => 'Espo\\Modules\\HumanResources\\Hooks\\OtherEvent\\CalculateEstimatedDate',
        'order' => 9
      ]
    ]
  ],
  'VacationRequest' => [
    'beforeSave' => [
      0 => [
        'className' => 'Espo\\Modules\\HumanResources\\Hooks\\VacationRequest\\CalculateRemainingDays',
        'order' => 9
      ],
      1 => [
        'className' => 'Espo\\Modules\\Main\\Hooks\\VacationRequest\\CustomCalculateRemainingDays',
        'order' => 9
      ]
    ]
  ],
  'Integration' => [
    'afterSave' => [
      0 => [
        'className' => 'Espo\\Modules\\Mattermost\\Hooks\\Integration\\Mattermost',
        'order' => 9
      ],
      1 => [
        'className' => 'Espo\\Modules\\OnlyOffice\\Hooks\\Integration\\OnlyOffice',
        'order' => 9
      ],
      2 => [
        'className' => 'Espo\\Hooks\\Integration\\GoogleMaps',
        'order' => 9
      ],
      3 => [
        'className' => 'Espo\\Modules\\Google\\Hooks\\Integration\\Google',
        'order' => 20
      ]
    ]
  ],
  'Project' => [
    'afterSave' => [
      0 => [
        'className' => 'Espo\\Modules\\Mattermost\\Hooks\\Project\\SyncChannel',
        'order' => 9
      ]
    ],
    'afterRemove' => [
      0 => [
        'className' => 'Espo\\Modules\\Mattermost\\Hooks\\Project\\SyncChannel',
        'order' => 9
      ]
    ]
  ],
  'User' => [
    'beforeSave' => [
      0 => [
        'className' => 'Espo\\Modules\\Mattermost\\Hooks\\User\\SyncUser',
        'order' => 9
      ],
      1 => [
        'className' => 'Espo\\Hooks\\User\\DeleteId',
        'order' => 9
      ]
    ],
    'afterRemove' => [
      0 => [
        'className' => 'Espo\\Modules\\Mattermost\\Hooks\\User\\SyncUser',
        'order' => 9
      ],
      1 => [
        'className' => 'Espo\\Hooks\\User\\ApiKey',
        'order' => 9
      ]
    ],
    'afterSave' => [
      0 => [
        'className' => 'Espo\\Hooks\\User\\ApiKey',
        'order' => 9
      ]
    ],
    'beforeRemove' => [
      0 => [
        'className' => 'Espo\\Hooks\\User\\DeleteId',
        'order' => 9
      ]
    ]
  ],
  'Reclamation' => [
    'afterSave' => [
      0 => [
        'className' => 'Espo\\Modules\\Reclamations\\Hooks\\Reclamation\\CreateGoodsReceipt',
        'order' => 9
      ]
    ]
  ],
  'SupplierReclamation' => [
    'afterSave' => [
      0 => [
        'className' => 'Espo\\Modules\\Reclamations\\Hooks\\SupplierReclamation\\CreateGoodsIssue',
        'order' => 9
      ]
    ]
  ],
  'SupplierOrder' => [
    'beforeSave' => [
      0 => [
        'className' => 'Espo\\Modules\\WarehouseManagement\\Hooks\\SupplierOrder\\CreateGoodsIssue',
        'order' => 9
      ]
    ]
  ],
  'Warehouse' => [
    'afterRemove' => [
      0 => [
        'className' => 'Espo\\Modules\\WarehouseManagement\\Hooks\\Warehouse\\RemoveItems',
        'order' => 9
      ]
    ],
    'beforeAddStock' => [
      0 => [
        'className' => 'Espo\\Modules\\Main\\Hooks\\Warehouse\\SerialNumber',
        'order' => 9
      ]
    ],
    'composeNumberAttribute' => [
      0 => [
        'className' => 'Espo\\Modules\\Main\\Hooks\\Warehouse\\SerialNumber',
        'order' => 9
      ]
    ]
  ],
  'ExternalAccount' => [
    'afterSave' => [
      0 => [
        'className' => 'Espo\\Modules\\Google\\Hooks\\ExternalAccount\\Google',
        'order' => 9
      ]
    ],
    'beforeSave' => [
      0 => [
        'className' => 'Espo\\Modules\\Google\\Hooks\\ExternalAccount\\Google',
        'order' => 9
      ]
    ]
  ],
  'ProductionModel' => [
    'afterSave' => [
      0 => [
        'className' => 'Espo\\Modules\\Production\\Hooks\\ProductionModel\\SetAsDefault',
        'order' => 9
      ]
    ]
  ],
  'ProductionModelOperation' => [
    'beforeSave' => [
      0 => [
        'className' => 'Espo\\Modules\\Production\\Hooks\\ProductionModelOperation\\SetName',
        'order' => 9
      ]
    ]
  ],
  'ProductionOrder' => [
    'afterSave' => [
      0 => [
        'className' => 'Espo\\Modules\\Production\\Hooks\\ProductionOrder\\FillFromModel',
        'order' => 15
      ],
      1 => [
        'className' => 'Espo\\Modules\\Production\\Hooks\\ProductionOrder\\CreateChildOrders',
        'order' => 20
      ]
    ],
    'beforeSave' => [
      0 => [
        'className' => 'Espo\\Modules\\Main\\Hooks\\ProductionOrder\\ChangeSalesOrderStatus',
        'order' => 9
      ]
    ]
  ],
  'WorkPerformed' => [
    'afterSave' => [
      0 => [
        'className' => 'Espo\\Modules\\Production\\Hooks\\WorkPerformed\\ChangeStatuses',
        'order' => 9
      ]
    ],
    'beforeSave' => [
      0 => [
        'className' => 'Espo\\Modules\\Main\\Hooks\\WorkPerformed\\CreateGoodsIssue',
        'order' => 9
      ]
    ],
    'createWarehouseItem' => [
      0 => [
        'className' => 'Espo\\Modules\\Main\\Hooks\\WorkPerformed\\CreateGoodsIssue',
        'order' => 9
      ]
    ],
    'updateQuantityForModelItems' => [
      0 => [
        'className' => 'Espo\\Modules\\Main\\Hooks\\WorkPerformed\\CreateGoodsIssue',
        'order' => 9
      ]
    ]
  ],
  'GoodsIssue' => [
    'afterSave' => [
      0 => [
        'className' => 'Espo\\Modules\\Main\\Hooks\\GoodsIssue\\LinkToReclamation',
        'order' => 9
      ]
    ]
  ],
  'WarehouseItem' => [
    'beforeSave' => [
      0 => [
        'className' => 'Espo\\Modules\\Main\\Hooks\\WarehouseItem\\SerialNumber',
        'order' => 9
      ]
    ],
    'composeNumberAttribute' => [
      0 => [
        'className' => 'Espo\\Modules\\Main\\Hooks\\WarehouseItem\\SerialNumber',
        'order' => 9
      ]
    ]
  ],
  'Attachment' => [
    'afterRemove' => [
      0 => [
        'className' => 'Espo\\Hooks\\Attachment\\RemoveFile',
        'order' => 9
      ]
    ]
  ],
  'EmailFilter' => [
    'afterSave' => [
      0 => [
        'className' => 'Espo\\Hooks\\EmailFilter\\CacheClearing',
        'order' => 9
      ]
    ],
    'afterRemove' => [
      0 => [
        'className' => 'Espo\\Hooks\\EmailFilter\\CacheClearing',
        'order' => 9
      ]
    ]
  ],
  'GroupEmailFolder' => [
    'beforeSave' => [
      0 => [
        'className' => 'Espo\\Hooks\\GroupEmailFolder\\Order',
        'order' => 9
      ]
    ]
  ],
  'LayoutSet' => [
    'afterRemove' => [
      0 => [
        'className' => 'Espo\\Hooks\\LayoutSet\\Removal',
        'order' => 9
      ]
    ]
  ],
  'Note' => [
    'beforeSave' => [
      0 => [
        'className' => 'Espo\\Hooks\\Note\\Mentions',
        'order' => 9
      ]
    ],
    'afterSave' => [
      0 => [
        'className' => 'Espo\\Hooks\\Note\\Notifications',
        'order' => 14
      ],
      1 => [
        'className' => 'Espo\\Hooks\\Note\\WebSocketSubmit',
        'order' => 20
      ]
    ]
  ],
  'Notification' => [
    'afterSave' => [
      0 => [
        'className' => 'Espo\\Hooks\\Notification\\WebSocketSubmit',
        'order' => 20
      ]
    ]
  ],
  'Portal' => [
    'afterSave' => [
      0 => [
        'className' => 'Espo\\Hooks\\Portal\\WriteConfig',
        'order' => 9
      ]
    ]
  ],
  'Sms' => [
    'beforeSave' => [
      0 => [
        'className' => 'Espo\\Hooks\\Sms\\Numbers',
        'order' => 9
      ]
    ]
  ]
];
