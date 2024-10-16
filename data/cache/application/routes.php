<?php
return [
  0 => [
    'route' => '/Activities/:parentType/:id/:type',
    'method' => 'get',
    'actionClassName' => 'Espo\\Modules\\Crm\\Tools\\Activities\\Api\\Get',
    'adjustedRoute' => '/Activities/{parentType}/{id}/{type}'
  ],
  1 => [
    'route' => '/Activities/:parentType/:id/:type/list/:targetType',
    'method' => 'get',
    'actionClassName' => 'Espo\\Modules\\Crm\\Tools\\Activities\\Api\\GetListTyped',
    'adjustedRoute' => '/Activities/{parentType}/{id}/{type}/list/{targetType}'
  ],
  2 => [
    'route' => '/Activities/upcoming',
    'method' => 'get',
    'actionClassName' => 'Espo\\Modules\\Crm\\Tools\\Activities\\Api\\GetUpcoming',
    'adjustedRoute' => '/Activities/upcoming'
  ],
  3 => [
    'route' => '/Activities',
    'method' => 'get',
    'actionClassName' => 'Espo\\Modules\\Crm\\Tools\\Calendar\\Api\\GetCalendar',
    'adjustedRoute' => '/Activities'
  ],
  4 => [
    'route' => '/Timeline',
    'method' => 'get',
    'actionClassName' => 'Espo\\Modules\\Crm\\Tools\\Calendar\\Api\\GetTimeline',
    'adjustedRoute' => '/Timeline'
  ],
  5 => [
    'route' => '/Timeline/busyRanges',
    'method' => 'get',
    'actionClassName' => 'Espo\\Modules\\Crm\\Tools\\Calendar\\Api\\GetBusyRanges',
    'adjustedRoute' => '/Timeline/busyRanges'
  ],
  6 => [
    'route' => '/Meeting/:id/attendees',
    'method' => 'get',
    'params' => [
      'controller' => 'Meeting',
      'action' => 'attendees'
    ],
    'adjustedRoute' => '/Meeting/{id}/attendees'
  ],
  7 => [
    'route' => '/Call/:id/attendees',
    'method' => 'get',
    'params' => [
      'controller' => 'Call',
      'action' => 'attendees'
    ],
    'adjustedRoute' => '/Call/{id}/attendees'
  ],
  8 => [
    'route' => '/Campaign/:id/generateMailMerge',
    'method' => 'post',
    'actionClassName' => 'Espo\\Modules\\Crm\\Tools\\Campaign\\Api\\PostGenerateMailMerge',
    'adjustedRoute' => '/Campaign/{id}/generateMailMerge'
  ],
  9 => [
    'route' => ':scope/:id/:parentLink/related/:link',
    'method' => 'get',
    'params' => [
      'controller' => 'RelatedLinkLister',
      'action' => 'listRelatedLink',
      'scope' => ':scope',
      'id' => ':id',
      'parentLink' => ':parentLink',
      'link' => ':link'
    ],
    'adjustedRoute' => '/{scope}/{id}/{parentLink}/related/{link}'
  ],
  10 => [
    'route' => 'RecordList/:scope/:id/:link',
    'method' => 'get',
    'actionClassName' => 'Espo\\Modules\\Autocrm\\Tools\\RecordList\\Api\\GetData',
    'adjustedRoute' => '/RecordList/{scope}/{id}/{link}'
  ],
  11 => [
    'route' => 'Aggregation/:scope',
    'method' => 'get',
    'actionClassName' => 'Espo\\Modules\\Autocrm\\Tools\\Aggregation\\Api\\GetData',
    'adjustedRoute' => '/Aggregation/{scope}'
  ],
  12 => [
    'route' => ':entityType/partition/:by',
    'method' => 'get',
    'actionClassName' => 'Espo\\Modules\\Autocrm\\Tools\\Partition\\Api\\GetData',
    'adjustedRoute' => '/{entityType}/partition/{by}'
  ],
  13 => [
    'route' => '/Vies/verifyVatNumber/:countryCode/:vatNumber',
    'method' => 'get',
    'actionClassName' => 'Espo\\Modules\\Autocrm\\Tools\\Vies\\Api\\Validate',
    'adjustedRoute' => '/Vies/verifyVatNumber/{countryCode}/{vatNumber}'
  ],
  14 => [
    'route' => '/Ares/fill/:sicCode',
    'method' => 'get',
    'actionClassName' => 'Espo\\Modules\\Autocrm\\Tools\\Ares\\Api\\GetFillData',
    'adjustedRoute' => '/Ares/fill/{sicCode}'
  ],
  15 => [
    'route' => '/Ares/suggest/:companyName',
    'method' => 'get',
    'actionClassName' => 'Espo\\Modules\\Autocrm\\Tools\\Ares\\Api\\GetSuggestData',
    'adjustedRoute' => '/Ares/suggest/{companyName}'
  ],
  16 => [
    'route' => '/ClearBrowserCache',
    'method' => 'post',
    'actionClassName' => 'Espo\\Modules\\Autocrm\\Tools\\NavbarAction\\Api\\ClearBrowserCache',
    'adjustedRoute' => '/ClearBrowserCache'
  ],
  17 => [
    'route' => '/Finstat/fill/:sicCode',
    'method' => 'get',
    'actionClassName' => 'Espo\\Modules\\Autocrm\\Tools\\Finstat\\Api\\GetFillData',
    'adjustedRoute' => '/Finstat/fill/{sicCode}'
  ],
  18 => [
    'route' => 'Attachment/action/copy',
    'method' => 'post',
    'actionClassName' => 'Espo\\Modules\\Autocrm\\Api\\CopyAttachments',
    'adjustedRoute' => '/Attachment/action/copy'
  ],
  19 => [
    'route' => 'Attachment/action/zip',
    'method' => 'get',
    'actionClassName' => 'Espo\\Modules\\Autocrm\\Api\\ZipAttachments',
    'adjustedRoute' => '/Attachment/action/zip'
  ],
  20 => [
    'route' => 'VatNumberValidation/validate/:vatId',
    'method' => 'get',
    'params' => [
      'controller' => 'VatNumberValidation',
      'action' => 'checkVatId',
      'vatId' => ':vatId'
    ],
    'adjustedRoute' => '/VatNumberValidation/validate/{vatId}'
  ],
  21 => [
    'route' => '/ProcessSalesOrder',
    'method' => 'post',
    'actionClassName' => 'Espo\\Modules\\Accounting\\Classes\\Actions\\ProcessSalesOrder',
    'adjustedRoute' => '/ProcessSalesOrder'
  ],
  22 => [
    'route' => '/Attendance/action/createOrUpdate',
    'method' => 'post',
    'actionClassName' => 'Espo\\Modules\\HumanResources\\Api\\Attendance\\AttendanceEndPoint',
    'adjustedRoute' => '/Attendance/action/createOrUpdate'
  ],
  23 => [
    'route' => '/HumanResources/Attendance/:entityType/:id',
    'method' => 'post',
    'actionClassName' => 'Espo\\Modules\\HumanResources\\Api\\VacationRequestApproval\\Handle',
    'adjustedRoute' => '/HumanResources/Attendance/{entityType}/{id}'
  ],
  24 => [
    'route' => 'OnlyOffice/callback/:key',
    'method' => 'post',
    'params' => [
      'controller' => 'OnlyOffice',
      'action' => 'callback',
      'key' => ':key'
    ],
    'noAuth' => true,
    'adjustedRoute' => '/OnlyOffice/callback/{key}'
  ],
  25 => [
    'route' => 'Warehouse/products',
    'method' => 'get',
    'actionClassName' => 'Espo\\Modules\\WarehouseManagement\\Tools\\Warehouse\\Api\\Products',
    'adjustedRoute' => '/Warehouse/products'
  ],
  26 => [
    'route' => 'SupplierOrder/hintProducts',
    'method' => 'get',
    'actionClassName' => 'Espo\\Modules\\WarehouseManagement\\Tools\\SupplierOrder\\Api\\HintProducts',
    'adjustedRoute' => '/SupplierOrder/hintProducts'
  ],
  27 => [
    'route' => 'Warehouse/items/:id',
    'method' => 'get',
    'params' => [
      'controller' => 'Warehouse',
      'action' => 'items',
      'id' => ':id'
    ],
    'adjustedRoute' => '/Warehouse/items/{id}'
  ],
  28 => [
    'route' => 'Product/stockInfo/:id',
    'method' => 'get',
    'actionClassName' => 'Espo\\Modules\\WarehouseManagement\\Tools\\Product\\Api\\GetStockInfo',
    'adjustedRoute' => '/Product/stockInfo/{id}'
  ],
  29 => [
    'route' => '/GoodsReceipt/product/:id',
    'method' => 'get',
    'actionClassName' => 'Espo\\Modules\\WarehouseManagement\\Tools\\Product\\Api\\GetGoodsReceipts',
    'adjustedRoute' => '/GoodsReceipt/product/{id}'
  ],
  30 => [
    'route' => '/GoodsIssue/product/:id',
    'method' => 'get',
    'actionClassName' => 'Espo\\Modules\\WarehouseManagement\\Tools\\Product\\Api\\GetGoodsIssues',
    'adjustedRoute' => '/GoodsIssue/product/{id}'
  ],
  31 => [
    'route' => '/ZipIsdocs',
    'method' => 'post',
    'actionClassName' => 'Espo\\Modules\\AccountingCz\\Api\\ZipIsdocs',
    'adjustedRoute' => '/ZipIsdocs'
  ],
  32 => [
    'route' => '/ExportToIsdoc',
    'method' => 'get',
    'actionClassName' => 'Espo\\Modules\\AccountingCz\\Api\\ExportToIsdoc',
    'adjustedRoute' => '/ExportToIsdoc'
  ],
  33 => [
    'route' => '/Kanban/:entityType/:statusField',
    'method' => 'get',
    'actionClassName' => 'Espo\\Modules\\CustomProduction\\Tools\\CustomKanban\\Api\\GetData',
    'adjustedRoute' => '/Kanban/{entityType}/{statusField}'
  ],
  34 => [
    'route' => '/CustomKanban/order',
    'method' => 'put',
    'actionClassName' => 'Espo\\Modules\\CustomProduction\\Tools\\CustomKanban\\Api\\PutOrder',
    'adjustedRoute' => '/CustomKanban/order'
  ],
  35 => [
    'route' => 'SalesOrder/createProductionOrders/:id',
    'method' => 'post',
    'actionClassName' => 'Espo\\Modules\\CustomProduction\\Tools\\SalesOrder\\Api\\CreateProductionOrders',
    'adjustedRoute' => '/SalesOrder/createProductionOrders/{id}'
  ],
  36 => [
    'route' => 'Warehouse/changeCategory/:id/:categoryId',
    'method' => 'post',
    'actionClassName' => 'Espo\\Modules\\CustomProduction\\Tools\\Warehouse\\Api\\ChangeCategory',
    'adjustedRoute' => '/Warehouse/changeCategory/{id}/{categoryId}'
  ],
  37 => [
    'route' => '/QuoteConversion/salesOrderAttributes/:id',
    'method' => 'get',
    'actionClassName' => 'Espo\\Modules\\QuoteConversion\\Tools\\Api\\GetSalesOrderAttributes',
    'adjustedRoute' => '/QuoteConversion/salesOrderAttributes/{id}'
  ],
  38 => [
    'route' => '/SalesOrder/summary/:id',
    'method' => 'get',
    'actionClassName' => 'Espo\\Modules\\Main\\Tools\\Api\\SalesOrder\\Summary',
    'adjustedRoute' => '/SalesOrder/summary/{id}'
  ],
  39 => [
    'route' => '/SalesOrder/timeOn/:id',
    'method' => 'post',
    'actionClassName' => 'Espo\\Modules\\Main\\Tools\\Api\\SalesOrder\\TimeOn',
    'adjustedRoute' => '/SalesOrder/timeOn/{id}'
  ],
  40 => [
    'route' => '/SalesOrder/timeOff/:id',
    'method' => 'post',
    'actionClassName' => 'Espo\\Modules\\Main\\Tools\\Api\\SalesOrder\\TimeOff',
    'adjustedRoute' => '/SalesOrder/timeOff/{id}'
  ],
  41 => [
    'route' => '/ProductionOrder/takeFromWarehouse/:id/:quantity/:stock',
    'method' => 'post',
    'actionClassName' => 'Espo\\Modules\\Main\\Tools\\Api\\ProductionOrder\\TakeFromWarehouse',
    'adjustedRoute' => '/ProductionOrder/takeFromWarehouse/{id}/{quantity}/{stock}'
  ],
  42 => [
    'route' => '/WarehouseItem/takeItems/:id',
    'method' => 'get',
    'actionClassName' => 'Espo\\Modules\\Main\\Tools\\Api\\WarehouseItem\\TakeItems',
    'adjustedRoute' => '/WarehouseItem/takeItems/{id}'
  ],
  43 => [
    'route' => '/WarehouseItem/createItems/:productId/:count/:stock',
    'method' => 'post',
    'actionClassName' => 'Espo\\Modules\\Main\\Tools\\Api\\WarehouseItem\\CreateItems',
    'adjustedRoute' => '/WarehouseItem/createItems/{productId}/{count}/{stock}'
  ],
  44 => [
    'route' => '/WarehouseItem/updateItems/:id/:quantity',
    'method' => 'post',
    'actionClassName' => 'Espo\\Modules\\Main\\Tools\\Api\\WarehouseItem\\UpdateItems',
    'adjustedRoute' => '/WarehouseItem/updateItems/{id}/{quantity}'
  ],
  45 => [
    'route' => '/WarehouseItem/productUpdate/:id/:field/:value',
    'method' => 'post',
    'actionClassName' => 'Espo\\Modules\\Main\\Tools\\Api\\WarehouseItem\\ProductUpdate',
    'adjustedRoute' => '/WarehouseItem/productUpdate/{id}/{field}/{value}'
  ],
  46 => [
    'route' => '/ProductionOrder/checkQuantity/:id',
    'method' => 'get',
    'actionClassName' => 'Espo\\Modules\\Main\\Tools\\Api\\ProductionOrder\\CheckQuantity',
    'adjustedRoute' => '/ProductionOrder/checkQuantity/{id}'
  ],
  47 => [
    'route' => '/SalesOrder/updateProductionOrder/:id/:quantity/:stock',
    'method' => 'post',
    'actionClassName' => 'Espo\\Modules\\Main\\Tools\\Api\\SalesOrder\\UpdateProductionOrder',
    'adjustedRoute' => '/SalesOrder/updateProductionOrder/{id}/{quantity}/{stock}'
  ],
  48 => [
    'route' => '/ProductionOrder/updatePerformWork/:id',
    'method' => 'post',
    'actionClassName' => 'Espo\\Modules\\Main\\Tools\\Api\\ProductionOrder\\UpdatePerformWork',
    'adjustedRoute' => '/ProductionOrder/updatePerformWork/{id}'
  ],
  49 => [
    'route' => '/Selector/createSelector',
    'method' => 'post',
    'actionClassName' => 'Espo\\Modules\\Main\\Tools\\Api\\Selector\\CreateSelector',
    'adjustedRoute' => '/Selector/createSelector'
  ],
  50 => [
    'route' => '/',
    'method' => 'get',
    'params' => [
      'controller' => 'ApiIndex',
      'action' => 'index'
    ],
    'adjustedRoute' => '/'
  ],
  51 => [
    'route' => '/App/user',
    'method' => 'get',
    'actionClassName' => 'Espo\\Tools\\App\\Api\\GetUser',
    'adjustedRoute' => '/App/user'
  ],
  52 => [
    'route' => '/App/destroyAuthToken',
    'method' => 'post',
    'actionClassName' => 'Espo\\Tools\\App\\Api\\PostDestroyAuthToken',
    'adjustedRoute' => '/App/destroyAuthToken'
  ],
  53 => [
    'route' => '/App/about',
    'method' => 'get',
    'actionClassName' => 'Espo\\Tools\\App\\Api\\GetAbout',
    'adjustedRoute' => '/App/about'
  ],
  54 => [
    'route' => '/Metadata',
    'method' => 'get',
    'params' => [
      'controller' => 'Metadata'
    ],
    'adjustedRoute' => '/Metadata'
  ],
  55 => [
    'route' => '/I18n',
    'method' => 'get',
    'params' => [
      'controller' => 'I18n'
    ],
    'noAuth' => true,
    'adjustedRoute' => '/I18n'
  ],
  56 => [
    'route' => '/Settings',
    'method' => 'get',
    'params' => [
      'controller' => 'Settings'
    ],
    'noAuth' => true,
    'adjustedRoute' => '/Settings'
  ],
  57 => [
    'route' => '/Settings',
    'method' => 'patch',
    'params' => [
      'controller' => 'Settings'
    ],
    'adjustedRoute' => '/Settings'
  ],
  58 => [
    'route' => '/Settings',
    'method' => 'put',
    'params' => [
      'controller' => 'Settings'
    ],
    'adjustedRoute' => '/Settings'
  ],
  59 => [
    'route' => '/Stream',
    'method' => 'get',
    'params' => [
      'controller' => 'Stream',
      'action' => 'list',
      'scope' => 'User'
    ],
    'adjustedRoute' => '/Stream'
  ],
  60 => [
    'route' => '/GlobalSearch',
    'method' => 'get',
    'actionClassName' => 'Espo\\Tools\\GlobalSearch\\Api\\Get',
    'adjustedRoute' => '/GlobalSearch'
  ],
  61 => [
    'route' => '/LeadCapture/:apiKey',
    'method' => 'post',
    'params' => [
      'controller' => 'LeadCapture',
      'action' => 'leadCapture',
      'apiKey' => ':apiKey'
    ],
    'noAuth' => true,
    'adjustedRoute' => '/LeadCapture/{apiKey}'
  ],
  62 => [
    'route' => '/LeadCapture/:apiKey',
    'method' => 'options',
    'params' => [
      'controller' => 'LeadCapture',
      'action' => 'leadCapture',
      'apiKey' => ':apiKey'
    ],
    'noAuth' => true,
    'adjustedRoute' => '/LeadCapture/{apiKey}'
  ],
  63 => [
    'route' => '/:controller/action/:action',
    'method' => 'post',
    'params' => [
      'controller' => ':controller',
      'action' => ':action'
    ],
    'adjustedRoute' => '/{controller}/action/{action}'
  ],
  64 => [
    'route' => '/:controller/action/:action',
    'method' => 'put',
    'params' => [
      'controller' => ':controller',
      'action' => ':action'
    ],
    'adjustedRoute' => '/{controller}/action/{action}'
  ],
  65 => [
    'route' => '/:controller/action/:action',
    'method' => 'get',
    'params' => [
      'controller' => ':controller',
      'action' => ':action'
    ],
    'adjustedRoute' => '/{controller}/action/{action}'
  ],
  66 => [
    'route' => '/:controller/layout/:name',
    'method' => 'get',
    'params' => [
      'controller' => 'Layout',
      'scope' => ':controller'
    ],
    'adjustedRoute' => '/{controller}/layout/{name}'
  ],
  67 => [
    'route' => '/:controller/layout/:name',
    'method' => 'put',
    'params' => [
      'controller' => 'Layout',
      'scope' => ':controller'
    ],
    'adjustedRoute' => '/{controller}/layout/{name}'
  ],
  68 => [
    'route' => '/:controller/layout/:name/:setId',
    'method' => 'put',
    'params' => [
      'controller' => 'Layout',
      'scope' => ':controller'
    ],
    'adjustedRoute' => '/{controller}/layout/{name}/{setId}'
  ],
  69 => [
    'route' => '/Admin/rebuild',
    'method' => 'post',
    'params' => [
      'controller' => 'Admin',
      'action' => 'rebuild'
    ],
    'adjustedRoute' => '/Admin/rebuild'
  ],
  70 => [
    'route' => '/Admin/clearCache',
    'method' => 'post',
    'params' => [
      'controller' => 'Admin',
      'action' => 'clearCache'
    ],
    'adjustedRoute' => '/Admin/clearCache'
  ],
  71 => [
    'route' => '/Admin/jobs',
    'method' => 'get',
    'params' => [
      'controller' => 'Admin',
      'action' => 'jobs'
    ],
    'adjustedRoute' => '/Admin/jobs'
  ],
  72 => [
    'route' => '/Admin/fieldManager/:scope/:name',
    'method' => 'get',
    'params' => [
      'controller' => 'FieldManager',
      'action' => 'read',
      'scope' => ':scope',
      'name' => ':name'
    ],
    'adjustedRoute' => '/Admin/fieldManager/{scope}/{name}'
  ],
  73 => [
    'route' => '/Admin/fieldManager/:scope',
    'method' => 'post',
    'params' => [
      'controller' => 'FieldManager',
      'action' => 'create',
      'scope' => ':scope'
    ],
    'adjustedRoute' => '/Admin/fieldManager/{scope}'
  ],
  74 => [
    'route' => '/Admin/fieldManager/:scope/:name',
    'method' => 'put',
    'params' => [
      'controller' => 'FieldManager',
      'action' => 'update',
      'scope' => ':scope',
      'name' => ':name'
    ],
    'adjustedRoute' => '/Admin/fieldManager/{scope}/{name}'
  ],
  75 => [
    'route' => '/Admin/fieldManager/:scope/:name',
    'method' => 'patch',
    'params' => [
      'controller' => 'FieldManager',
      'action' => 'update',
      'scope' => ':scope',
      'name' => ':name'
    ],
    'adjustedRoute' => '/Admin/fieldManager/{scope}/{name}'
  ],
  76 => [
    'route' => '/Admin/fieldManager/:scope/:name',
    'method' => 'delete',
    'params' => [
      'controller' => 'FieldManager',
      'action' => 'delete',
      'scope' => ':scope',
      'name' => ':name'
    ],
    'adjustedRoute' => '/Admin/fieldManager/{scope}/{name}'
  ],
  77 => [
    'route' => '/CurrencyRate',
    'method' => 'get',
    'actionClassName' => 'Espo\\Tools\\Currency\\Api\\Get',
    'adjustedRoute' => '/CurrencyRate'
  ],
  78 => [
    'route' => '/CurrencyRate',
    'method' => 'put',
    'actionClassName' => 'Espo\\Tools\\Currency\\Api\\PutUpdate',
    'adjustedRoute' => '/CurrencyRate'
  ],
  79 => [
    'route' => '/Action',
    'method' => 'post',
    'actionClassName' => 'Espo\\Core\\Action\\Api\\PostProcess',
    'adjustedRoute' => '/Action'
  ],
  80 => [
    'route' => '/MassAction',
    'method' => 'post',
    'actionClassName' => 'Espo\\Core\\MassAction\\Api\\PostProcess',
    'adjustedRoute' => '/MassAction'
  ],
  81 => [
    'route' => '/MassAction/:id/status',
    'method' => 'get',
    'actionClassName' => 'Espo\\Core\\MassAction\\Api\\GetStatus',
    'adjustedRoute' => '/MassAction/{id}/status'
  ],
  82 => [
    'route' => '/MassAction/:id/subscribe',
    'method' => 'post',
    'actionClassName' => 'Espo\\Core\\MassAction\\Api\\PostSubscribe',
    'adjustedRoute' => '/MassAction/{id}/subscribe'
  ],
  83 => [
    'route' => '/Export',
    'method' => 'post',
    'actionClassName' => 'Espo\\Tools\\Export\\Api\\PostProcess',
    'adjustedRoute' => '/Export'
  ],
  84 => [
    'route' => '/Export/:id/status',
    'method' => 'get',
    'actionClassName' => 'Espo\\Tools\\Export\\Api\\GetStatus',
    'adjustedRoute' => '/Export/{id}/status'
  ],
  85 => [
    'route' => '/Export/:id/subscribe',
    'method' => 'post',
    'actionClassName' => 'Espo\\Tools\\Export\\Api\\PostSubscribe',
    'adjustedRoute' => '/Export/{id}/subscribe'
  ],
  86 => [
    'route' => '/Import',
    'method' => 'post',
    'actionClassName' => 'Espo\\Tools\\Import\\Api\\Post',
    'adjustedRoute' => '/Import'
  ],
  87 => [
    'route' => '/Import/file',
    'method' => 'post',
    'actionClassName' => 'Espo\\Tools\\Import\\Api\\PostFile',
    'adjustedRoute' => '/Import/file'
  ],
  88 => [
    'route' => '/Import/:id/revert',
    'method' => 'post',
    'actionClassName' => 'Espo\\Tools\\Import\\Api\\PostRevert',
    'adjustedRoute' => '/Import/{id}/revert'
  ],
  89 => [
    'route' => '/Import/:id/removeDuplicates',
    'method' => 'post',
    'actionClassName' => 'Espo\\Tools\\Import\\Api\\PostRemoveDuplicates',
    'adjustedRoute' => '/Import/{id}/removeDuplicates'
  ],
  90 => [
    'route' => '/Import/:id/unmarkDuplicates',
    'method' => 'post',
    'actionClassName' => 'Espo\\Tools\\Import\\Api\\PostUnmarkDuplicates',
    'adjustedRoute' => '/Import/{id}/unmarkDuplicates'
  ],
  91 => [
    'route' => '/Import/:id/exportErrors',
    'method' => 'post',
    'actionClassName' => 'Espo\\Tools\\Import\\Api\\PostExportErrors',
    'adjustedRoute' => '/Import/{id}/exportErrors'
  ],
  92 => [
    'route' => '/Kanban/order',
    'method' => 'put',
    'actionClassName' => 'Espo\\Tools\\Kanban\\Api\\PutOrder',
    'adjustedRoute' => '/Kanban/order'
  ],
  93 => [
    'route' => '/Kanban/:entityType',
    'method' => 'get',
    'actionClassName' => 'Espo\\Tools\\Kanban\\Api\\GetData',
    'adjustedRoute' => '/Kanban/{entityType}'
  ],
  94 => [
    'route' => '/Attachment/file/:id',
    'method' => 'get',
    'actionClassName' => 'Espo\\Tools\\Attachment\\Api\\GetFile',
    'adjustedRoute' => '/Attachment/file/{id}'
  ],
  95 => [
    'route' => '/Attachment/chunk/:id',
    'method' => 'post',
    'actionClassName' => 'Espo\\Tools\\Attachment\\Api\\PostChunk',
    'adjustedRoute' => '/Attachment/chunk/{id}'
  ],
  96 => [
    'route' => '/Attachment/fromImageUrl',
    'method' => 'post',
    'actionClassName' => 'Espo\\Tools\\Attachment\\Api\\PostFromImageUrl',
    'adjustedRoute' => '/Attachment/fromImageUrl'
  ],
  97 => [
    'route' => '/Attachment/copy/:id',
    'method' => 'post',
    'actionClassName' => 'Espo\\Tools\\Attachment\\Api\\PostCopy',
    'adjustedRoute' => '/Attachment/copy/{id}'
  ],
  98 => [
    'route' => '/EmailTemplate/:id/prepare',
    'method' => 'post',
    'actionClassName' => 'Espo\\Tools\\EmailTemplate\\Api\\PostPrepare',
    'adjustedRoute' => '/EmailTemplate/{id}/prepare'
  ],
  99 => [
    'route' => '/Email/:id/attachments/copy',
    'method' => 'post',
    'actionClassName' => 'Espo\\Tools\\Email\\Api\\PostAttachmentsCopy',
    'adjustedRoute' => '/Email/{id}/attachments/copy'
  ],
  100 => [
    'route' => '/Email/sendTest',
    'method' => 'post',
    'actionClassName' => 'Espo\\Tools\\Email\\Api\\PostSendTest',
    'adjustedRoute' => '/Email/sendTest'
  ],
  101 => [
    'route' => '/Email/inbox/read',
    'method' => 'post',
    'actionClassName' => 'Espo\\Tools\\Email\\Api\\PostInboxRead',
    'adjustedRoute' => '/Email/inbox/read'
  ],
  102 => [
    'route' => '/Email/inbox/read',
    'method' => 'delete',
    'actionClassName' => 'Espo\\Tools\\Email\\Api\\DeleteInboxRead',
    'adjustedRoute' => '/Email/inbox/read'
  ],
  103 => [
    'route' => '/Email/inbox/important',
    'method' => 'post',
    'actionClassName' => 'Espo\\Tools\\Email\\Api\\PostInboxImportant',
    'adjustedRoute' => '/Email/inbox/important'
  ],
  104 => [
    'route' => '/Email/inbox/important',
    'method' => 'delete',
    'actionClassName' => 'Espo\\Tools\\Email\\Api\\DeleteInboxImportant',
    'adjustedRoute' => '/Email/inbox/important'
  ],
  105 => [
    'route' => '/Email/inbox/inTrash',
    'method' => 'post',
    'actionClassName' => 'Espo\\Tools\\Email\\Api\\PostInboxInTrash',
    'adjustedRoute' => '/Email/inbox/inTrash'
  ],
  106 => [
    'route' => '/Email/inbox/inTrash',
    'method' => 'delete',
    'actionClassName' => 'Espo\\Tools\\Email\\Api\\DeleteInboxInTrash',
    'adjustedRoute' => '/Email/inbox/inTrash'
  ],
  107 => [
    'route' => '/Email/inbox/folders/:folderId',
    'method' => 'post',
    'actionClassName' => 'Espo\\Tools\\Email\\Api\\PostFolder',
    'adjustedRoute' => '/Email/inbox/folders/{folderId}'
  ],
  108 => [
    'route' => '/Email/inbox/notReadCounts',
    'method' => 'get',
    'actionClassName' => 'Espo\\Tools\\Email\\Api\\GetNotReadCounts',
    'adjustedRoute' => '/Email/inbox/notReadCounts'
  ],
  109 => [
    'route' => '/Email/insertFieldData',
    'method' => 'get',
    'actionClassName' => 'Espo\\Tools\\Email\\Api\\GetInsertFieldData',
    'adjustedRoute' => '/Email/insertFieldData'
  ],
  110 => [
    'route' => '/EmailAddress/search',
    'method' => 'get',
    'actionClassName' => 'Espo\\Tools\\EmailAddress\\Api\\GetSearch',
    'adjustedRoute' => '/EmailAddress/search'
  ],
  111 => [
    'route' => '/User/:id/acl',
    'method' => 'get',
    'actionClassName' => 'Espo\\Tools\\UserSecurity\\Api\\GetUserAcl',
    'adjustedRoute' => '/User/{id}/acl'
  ],
  112 => [
    'route' => '/UserSecurity/apiKey/generate',
    'method' => 'post',
    'actionClassName' => 'Espo\\Tools\\UserSecurity\\Api\\PostApiKeyGenerate',
    'adjustedRoute' => '/UserSecurity/apiKey/generate'
  ],
  113 => [
    'route' => '/UserSecurity/password',
    'method' => 'put',
    'actionClassName' => 'Espo\\Tools\\UserSecurity\\Api\\PutPassword',
    'adjustedRoute' => '/UserSecurity/password'
  ],
  114 => [
    'route' => '/UserSecurity/password/recovery',
    'method' => 'post',
    'actionClassName' => 'Espo\\Tools\\UserSecurity\\Api\\PostPasswordRecovery',
    'adjustedRoute' => '/UserSecurity/password/recovery'
  ],
  115 => [
    'route' => '/UserSecurity/password/generate',
    'method' => 'post',
    'actionClassName' => 'Espo\\Tools\\UserSecurity\\Api\\PostPasswordGenerate',
    'adjustedRoute' => '/UserSecurity/password/generate'
  ],
  116 => [
    'route' => '/User/passwordChangeRequest',
    'method' => 'post',
    'actionClassName' => 'Espo\\Tools\\UserSecurity\\Api\\PostPasswordChangeRequest',
    'noAuth' => true,
    'adjustedRoute' => '/User/passwordChangeRequest'
  ],
  117 => [
    'route' => '/User/changePasswordByRequest',
    'method' => 'post',
    'actionClassName' => 'Espo\\Tools\\UserSecurity\\Api\\PostChangePasswordByRequest',
    'noAuth' => true,
    'adjustedRoute' => '/User/changePasswordByRequest'
  ],
  118 => [
    'route' => '/Oidc/authorizationData',
    'method' => 'get',
    'params' => [
      'controller' => 'Oidc',
      'action' => 'authorizationData'
    ],
    'noAuth' => true,
    'adjustedRoute' => '/Oidc/authorizationData'
  ],
  119 => [
    'route' => '/Oidc/backchannelLogout',
    'method' => 'post',
    'params' => [
      'controller' => 'Oidc',
      'action' => 'backchannelLogout'
    ],
    'noAuth' => true,
    'adjustedRoute' => '/Oidc/backchannelLogout'
  ],
  120 => [
    'route' => '/:controller/:id',
    'method' => 'get',
    'params' => [
      'controller' => ':controller',
      'action' => 'read',
      'id' => ':id'
    ],
    'adjustedRoute' => '/{controller}/{id}'
  ],
  121 => [
    'route' => '/:controller',
    'method' => 'get',
    'params' => [
      'controller' => ':controller',
      'action' => 'index'
    ],
    'adjustedRoute' => '/{controller}'
  ],
  122 => [
    'route' => '/:controller',
    'method' => 'post',
    'params' => [
      'controller' => ':controller',
      'action' => 'create'
    ],
    'adjustedRoute' => '/{controller}'
  ],
  123 => [
    'route' => '/:controller/:id',
    'method' => 'put',
    'params' => [
      'controller' => ':controller',
      'action' => 'update',
      'id' => ':id'
    ],
    'adjustedRoute' => '/{controller}/{id}'
  ],
  124 => [
    'route' => '/:controller/:id',
    'method' => 'patch',
    'params' => [
      'controller' => ':controller',
      'action' => 'update',
      'id' => ':id'
    ],
    'adjustedRoute' => '/{controller}/{id}'
  ],
  125 => [
    'route' => '/:controller/:id',
    'method' => 'delete',
    'params' => [
      'controller' => ':controller',
      'action' => 'delete',
      'id' => ':id'
    ],
    'adjustedRoute' => '/{controller}/{id}'
  ],
  126 => [
    'route' => '/:controller/:id/stream',
    'method' => 'get',
    'params' => [
      'controller' => 'Stream',
      'action' => 'list',
      'id' => ':id',
      'scope' => ':controller'
    ],
    'adjustedRoute' => '/{controller}/{id}/stream'
  ],
  127 => [
    'route' => '/:controller/:id/posts',
    'method' => 'get',
    'params' => [
      'controller' => 'Stream',
      'action' => 'listPosts',
      'id' => ':id',
      'scope' => ':controller'
    ],
    'adjustedRoute' => '/{controller}/{id}/posts'
  ],
  128 => [
    'route' => '/:controller/:id/subscription',
    'method' => 'put',
    'params' => [
      'controller' => ':controller',
      'id' => ':id',
      'action' => 'follow'
    ],
    'adjustedRoute' => '/{controller}/{id}/subscription'
  ],
  129 => [
    'route' => '/:controller/:id/subscription',
    'method' => 'delete',
    'params' => [
      'controller' => ':controller',
      'id' => ':id',
      'action' => 'unfollow'
    ],
    'adjustedRoute' => '/{controller}/{id}/subscription'
  ],
  130 => [
    'route' => '/:controller/:id/:link',
    'method' => 'get',
    'params' => [
      'controller' => ':controller',
      'action' => 'listLinked',
      'id' => ':id',
      'link' => ':link'
    ],
    'adjustedRoute' => '/{controller}/{id}/{link}'
  ],
  131 => [
    'route' => '/:controller/:id/:link',
    'method' => 'post',
    'params' => [
      'controller' => ':controller',
      'action' => 'createLink',
      'id' => ':id',
      'link' => ':link'
    ],
    'adjustedRoute' => '/{controller}/{id}/{link}'
  ],
  132 => [
    'route' => '/:controller/:id/:link',
    'method' => 'delete',
    'params' => [
      'controller' => ':controller',
      'action' => 'removeLink',
      'id' => ':id',
      'link' => ':link'
    ],
    'adjustedRoute' => '/{controller}/{id}/{link}'
  ]
];
