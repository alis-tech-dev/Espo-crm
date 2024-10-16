<?php return array (
  0 => 
  array (
    'GET' => 
    array (
      '/api/v1/Activities/upcoming' => 'route2',
      '/api/v1/Activities' => 'route3',
      '/api/v1/Timeline' => 'route4',
      '/api/v1/Timeline/busyRanges' => 'route5',
      '/api/v1/Attachment/action/zip' => 'route19',
      '/api/v1/Warehouse/products' => 'route25',
      '/api/v1/SupplierOrder/hintProducts' => 'route26',
      '/api/v1/ExportToIsdoc' => 'route32',
      '/api/v1/' => 'route50',
      '/api/v1/App/user' => 'route51',
      '/api/v1/App/about' => 'route53',
      '/api/v1/Metadata' => 'route54',
      '/api/v1/I18n' => 'route55',
      '/api/v1/Settings' => 'route56',
      '/api/v1/Stream' => 'route59',
      '/api/v1/GlobalSearch' => 'route60',
      '/api/v1/Admin/jobs' => 'route71',
      '/api/v1/CurrencyRate' => 'route77',
      '/api/v1/Email/inbox/notReadCounts' => 'route108',
      '/api/v1/Email/insertFieldData' => 'route109',
      '/api/v1/EmailAddress/search' => 'route110',
      '/api/v1/Oidc/authorizationData' => 'route118',
    ),
    'POST' => 
    array (
      '/api/v1/ClearBrowserCache' => 'route16',
      '/api/v1/Attachment/action/copy' => 'route18',
      '/api/v1/ProcessSalesOrder' => 'route21',
      '/api/v1/Attendance/action/createOrUpdate' => 'route22',
      '/api/v1/ZipIsdocs' => 'route31',
      '/api/v1/Selector/createSelector' => 'route49',
      '/api/v1/App/destroyAuthToken' => 'route52',
      '/api/v1/Admin/rebuild' => 'route69',
      '/api/v1/Admin/clearCache' => 'route70',
      '/api/v1/Action' => 'route79',
      '/api/v1/MassAction' => 'route80',
      '/api/v1/Export' => 'route83',
      '/api/v1/Import' => 'route86',
      '/api/v1/Import/file' => 'route87',
      '/api/v1/Attachment/fromImageUrl' => 'route96',
      '/api/v1/Email/sendTest' => 'route100',
      '/api/v1/Email/inbox/read' => 'route101',
      '/api/v1/Email/inbox/important' => 'route103',
      '/api/v1/Email/inbox/inTrash' => 'route105',
      '/api/v1/UserSecurity/apiKey/generate' => 'route112',
      '/api/v1/UserSecurity/password/recovery' => 'route114',
      '/api/v1/UserSecurity/password/generate' => 'route115',
      '/api/v1/User/passwordChangeRequest' => 'route116',
      '/api/v1/User/changePasswordByRequest' => 'route117',
      '/api/v1/Oidc/backchannelLogout' => 'route119',
    ),
    'PUT' => 
    array (
      '/api/v1/CustomKanban/order' => 'route34',
      '/api/v1/Settings' => 'route58',
      '/api/v1/CurrencyRate' => 'route78',
      '/api/v1/Kanban/order' => 'route92',
      '/api/v1/UserSecurity/password' => 'route113',
    ),
    'PATCH' => 
    array (
      '/api/v1/Settings' => 'route57',
    ),
    'DELETE' => 
    array (
      '/api/v1/Email/inbox/read' => 'route102',
      '/api/v1/Email/inbox/important' => 'route104',
      '/api/v1/Email/inbox/inTrash' => 'route106',
    ),
  ),
  1 => 
  array (
    'GET' => 
    array (
      0 => 
      array (
        'regex' => '~^(?|/api/v1/Activities/([^/]+)/([^/]+)/([^/]+)|/api/v1/Activities/([^/]+)/([^/]+)/([^/]+)/list/([^/]+)|/api/v1/Meeting/([^/]+)/attendees()()()()|/api/v1/Call/([^/]+)/attendees()()()()()|/api/v1/([^/]+)/([^/]+)/([^/]+)/related/([^/]+)()()()|/api/v1/RecordList/([^/]+)/([^/]+)/([^/]+)()()()()()|/api/v1/Aggregation/([^/]+)()()()()()()()()|/api/v1/([^/]+)/partition/([^/]+)()()()()()()()()|/api/v1/Vies/verifyVatNumber/([^/]+)/([^/]+)()()()()()()()()())$~',
        'routeMap' => 
        array (
          4 => 
          array (
            0 => 'route0',
            1 => 
            array (
              'parentType' => 'parentType',
              'id' => 'id',
              'type' => 'type',
            ),
          ),
          5 => 
          array (
            0 => 'route1',
            1 => 
            array (
              'parentType' => 'parentType',
              'id' => 'id',
              'type' => 'type',
              'targetType' => 'targetType',
            ),
          ),
          6 => 
          array (
            0 => 'route6',
            1 => 
            array (
              'id' => 'id',
            ),
          ),
          7 => 
          array (
            0 => 'route7',
            1 => 
            array (
              'id' => 'id',
            ),
          ),
          8 => 
          array (
            0 => 'route9',
            1 => 
            array (
              'scope' => 'scope',
              'id' => 'id',
              'parentLink' => 'parentLink',
              'link' => 'link',
            ),
          ),
          9 => 
          array (
            0 => 'route10',
            1 => 
            array (
              'scope' => 'scope',
              'id' => 'id',
              'link' => 'link',
            ),
          ),
          10 => 
          array (
            0 => 'route11',
            1 => 
            array (
              'scope' => 'scope',
            ),
          ),
          11 => 
          array (
            0 => 'route12',
            1 => 
            array (
              'entityType' => 'entityType',
              'by' => 'by',
            ),
          ),
          12 => 
          array (
            0 => 'route13',
            1 => 
            array (
              'countryCode' => 'countryCode',
              'vatNumber' => 'vatNumber',
            ),
          ),
        ),
      ),
      1 => 
      array (
        'regex' => '~^(?|/api/v1/Ares/fill/([^/]+)|/api/v1/Ares/suggest/([^/]+)()|/api/v1/Finstat/fill/([^/]+)()()|/api/v1/VatNumberValidation/validate/([^/]+)()()()|/api/v1/Warehouse/items/([^/]+)()()()()|/api/v1/Product/stockInfo/([^/]+)()()()()()|/api/v1/GoodsReceipt/product/([^/]+)()()()()()()|/api/v1/GoodsIssue/product/([^/]+)()()()()()()()|/api/v1/Kanban/([^/]+)/([^/]+)()()()()()()())$~',
        'routeMap' => 
        array (
          2 => 
          array (
            0 => 'route14',
            1 => 
            array (
              'sicCode' => 'sicCode',
            ),
          ),
          3 => 
          array (
            0 => 'route15',
            1 => 
            array (
              'companyName' => 'companyName',
            ),
          ),
          4 => 
          array (
            0 => 'route17',
            1 => 
            array (
              'sicCode' => 'sicCode',
            ),
          ),
          5 => 
          array (
            0 => 'route20',
            1 => 
            array (
              'vatId' => 'vatId',
            ),
          ),
          6 => 
          array (
            0 => 'route27',
            1 => 
            array (
              'id' => 'id',
            ),
          ),
          7 => 
          array (
            0 => 'route28',
            1 => 
            array (
              'id' => 'id',
            ),
          ),
          8 => 
          array (
            0 => 'route29',
            1 => 
            array (
              'id' => 'id',
            ),
          ),
          9 => 
          array (
            0 => 'route30',
            1 => 
            array (
              'id' => 'id',
            ),
          ),
          10 => 
          array (
            0 => 'route33',
            1 => 
            array (
              'entityType' => 'entityType',
              'statusField' => 'statusField',
            ),
          ),
        ),
      ),
      2 => 
      array (
        'regex' => '~^(?|/api/v1/QuoteConversion/salesOrderAttributes/([^/]+)|/api/v1/SalesOrder/summary/([^/]+)()|/api/v1/WarehouseItem/takeItems/([^/]+)()()|/api/v1/ProductionOrder/checkQuantity/([^/]+)()()()|/api/v1/([^/]+)/action/([^/]+)()()()|/api/v1/([^/]+)/layout/([^/]+)()()()()|/api/v1/Admin/fieldManager/([^/]+)/([^/]+)()()()()()|/api/v1/MassAction/([^/]+)/status()()()()()()()|/api/v1/Export/([^/]+)/status()()()()()()()())$~',
        'routeMap' => 
        array (
          2 => 
          array (
            0 => 'route37',
            1 => 
            array (
              'id' => 'id',
            ),
          ),
          3 => 
          array (
            0 => 'route38',
            1 => 
            array (
              'id' => 'id',
            ),
          ),
          4 => 
          array (
            0 => 'route42',
            1 => 
            array (
              'id' => 'id',
            ),
          ),
          5 => 
          array (
            0 => 'route46',
            1 => 
            array (
              'id' => 'id',
            ),
          ),
          6 => 
          array (
            0 => 'route65',
            1 => 
            array (
              'controller' => 'controller',
              'action' => 'action',
            ),
          ),
          7 => 
          array (
            0 => 'route66',
            1 => 
            array (
              'controller' => 'controller',
              'name' => 'name',
            ),
          ),
          8 => 
          array (
            0 => 'route72',
            1 => 
            array (
              'scope' => 'scope',
              'name' => 'name',
            ),
          ),
          9 => 
          array (
            0 => 'route81',
            1 => 
            array (
              'id' => 'id',
            ),
          ),
          10 => 
          array (
            0 => 'route84',
            1 => 
            array (
              'id' => 'id',
            ),
          ),
        ),
      ),
      3 => 
      array (
        'regex' => '~^(?|/api/v1/Kanban/([^/]+)|/api/v1/Attachment/file/([^/]+)()|/api/v1/User/([^/]+)/acl()()|/api/v1/([^/]+)/([^/]+)()()|/api/v1/([^/]+)()()()()|/api/v1/([^/]+)/([^/]+)/stream()()()()|/api/v1/([^/]+)/([^/]+)/posts()()()()()|/api/v1/([^/]+)/([^/]+)/([^/]+)()()()()())$~',
        'routeMap' => 
        array (
          2 => 
          array (
            0 => 'route93',
            1 => 
            array (
              'entityType' => 'entityType',
            ),
          ),
          3 => 
          array (
            0 => 'route94',
            1 => 
            array (
              'id' => 'id',
            ),
          ),
          4 => 
          array (
            0 => 'route111',
            1 => 
            array (
              'id' => 'id',
            ),
          ),
          5 => 
          array (
            0 => 'route120',
            1 => 
            array (
              'controller' => 'controller',
              'id' => 'id',
            ),
          ),
          6 => 
          array (
            0 => 'route121',
            1 => 
            array (
              'controller' => 'controller',
            ),
          ),
          7 => 
          array (
            0 => 'route126',
            1 => 
            array (
              'controller' => 'controller',
              'id' => 'id',
            ),
          ),
          8 => 
          array (
            0 => 'route127',
            1 => 
            array (
              'controller' => 'controller',
              'id' => 'id',
            ),
          ),
          9 => 
          array (
            0 => 'route130',
            1 => 
            array (
              'controller' => 'controller',
              'id' => 'id',
              'link' => 'link',
            ),
          ),
        ),
      ),
    ),
    'POST' => 
    array (
      0 => 
      array (
        'regex' => '~^(?|/api/v1/Campaign/([^/]+)/generateMailMerge|/api/v1/HumanResources/Attendance/([^/]+)/([^/]+)|/api/v1/OnlyOffice/callback/([^/]+)()()|/api/v1/SalesOrder/createProductionOrders/([^/]+)()()()|/api/v1/Warehouse/changeCategory/([^/]+)/([^/]+)()()()|/api/v1/SalesOrder/timeOn/([^/]+)()()()()()|/api/v1/SalesOrder/timeOff/([^/]+)()()()()()()|/api/v1/ProductionOrder/takeFromWarehouse/([^/]+)/([^/]+)/([^/]+)()()()()()|/api/v1/WarehouseItem/createItems/([^/]+)/([^/]+)/([^/]+)()()()()()()|/api/v1/WarehouseItem/updateItems/([^/]+)/([^/]+)()()()()()()()())$~',
        'routeMap' => 
        array (
          2 => 
          array (
            0 => 'route8',
            1 => 
            array (
              'id' => 'id',
            ),
          ),
          3 => 
          array (
            0 => 'route23',
            1 => 
            array (
              'entityType' => 'entityType',
              'id' => 'id',
            ),
          ),
          4 => 
          array (
            0 => 'route24',
            1 => 
            array (
              'key' => 'key',
            ),
          ),
          5 => 
          array (
            0 => 'route35',
            1 => 
            array (
              'id' => 'id',
            ),
          ),
          6 => 
          array (
            0 => 'route36',
            1 => 
            array (
              'id' => 'id',
              'categoryId' => 'categoryId',
            ),
          ),
          7 => 
          array (
            0 => 'route39',
            1 => 
            array (
              'id' => 'id',
            ),
          ),
          8 => 
          array (
            0 => 'route40',
            1 => 
            array (
              'id' => 'id',
            ),
          ),
          9 => 
          array (
            0 => 'route41',
            1 => 
            array (
              'id' => 'id',
              'quantity' => 'quantity',
              'stock' => 'stock',
            ),
          ),
          10 => 
          array (
            0 => 'route43',
            1 => 
            array (
              'productId' => 'productId',
              'count' => 'count',
              'stock' => 'stock',
            ),
          ),
          11 => 
          array (
            0 => 'route44',
            1 => 
            array (
              'id' => 'id',
              'quantity' => 'quantity',
            ),
          ),
        ),
      ),
      1 => 
      array (
        'regex' => '~^(?|/api/v1/WarehouseItem/productUpdate/([^/]+)/([^/]+)/([^/]+)|/api/v1/SalesOrder/updateProductionOrder/([^/]+)/([^/]+)/([^/]+)()|/api/v1/ProductionOrder/updatePerformWork/([^/]+)()()()()|/api/v1/LeadCapture/([^/]+)()()()()()|/api/v1/([^/]+)/action/([^/]+)()()()()()|/api/v1/Admin/fieldManager/([^/]+)()()()()()()()|/api/v1/MassAction/([^/]+)/subscribe()()()()()()()()|/api/v1/Export/([^/]+)/subscribe()()()()()()()()()|/api/v1/Import/([^/]+)/revert()()()()()()()()()()|/api/v1/Import/([^/]+)/removeDuplicates()()()()()()()()()()())$~',
        'routeMap' => 
        array (
          4 => 
          array (
            0 => 'route45',
            1 => 
            array (
              'id' => 'id',
              'field' => 'field',
              'value' => 'value',
            ),
          ),
          5 => 
          array (
            0 => 'route47',
            1 => 
            array (
              'id' => 'id',
              'quantity' => 'quantity',
              'stock' => 'stock',
            ),
          ),
          6 => 
          array (
            0 => 'route48',
            1 => 
            array (
              'id' => 'id',
            ),
          ),
          7 => 
          array (
            0 => 'route61',
            1 => 
            array (
              'apiKey' => 'apiKey',
            ),
          ),
          8 => 
          array (
            0 => 'route63',
            1 => 
            array (
              'controller' => 'controller',
              'action' => 'action',
            ),
          ),
          9 => 
          array (
            0 => 'route73',
            1 => 
            array (
              'scope' => 'scope',
            ),
          ),
          10 => 
          array (
            0 => 'route82',
            1 => 
            array (
              'id' => 'id',
            ),
          ),
          11 => 
          array (
            0 => 'route85',
            1 => 
            array (
              'id' => 'id',
            ),
          ),
          12 => 
          array (
            0 => 'route88',
            1 => 
            array (
              'id' => 'id',
            ),
          ),
          13 => 
          array (
            0 => 'route89',
            1 => 
            array (
              'id' => 'id',
            ),
          ),
        ),
      ),
      2 => 
      array (
        'regex' => '~^(?|/api/v1/Import/([^/]+)/unmarkDuplicates|/api/v1/Import/([^/]+)/exportErrors()|/api/v1/Attachment/chunk/([^/]+)()()|/api/v1/Attachment/copy/([^/]+)()()()|/api/v1/EmailTemplate/([^/]+)/prepare()()()()|/api/v1/Email/([^/]+)/attachments/copy()()()()()|/api/v1/Email/inbox/folders/([^/]+)()()()()()()|/api/v1/([^/]+)()()()()()()()|/api/v1/([^/]+)/([^/]+)/([^/]+)()()()()()())$~',
        'routeMap' => 
        array (
          2 => 
          array (
            0 => 'route90',
            1 => 
            array (
              'id' => 'id',
            ),
          ),
          3 => 
          array (
            0 => 'route91',
            1 => 
            array (
              'id' => 'id',
            ),
          ),
          4 => 
          array (
            0 => 'route95',
            1 => 
            array (
              'id' => 'id',
            ),
          ),
          5 => 
          array (
            0 => 'route97',
            1 => 
            array (
              'id' => 'id',
            ),
          ),
          6 => 
          array (
            0 => 'route98',
            1 => 
            array (
              'id' => 'id',
            ),
          ),
          7 => 
          array (
            0 => 'route99',
            1 => 
            array (
              'id' => 'id',
            ),
          ),
          8 => 
          array (
            0 => 'route107',
            1 => 
            array (
              'folderId' => 'folderId',
            ),
          ),
          9 => 
          array (
            0 => 'route122',
            1 => 
            array (
              'controller' => 'controller',
            ),
          ),
          10 => 
          array (
            0 => 'route131',
            1 => 
            array (
              'controller' => 'controller',
              'id' => 'id',
              'link' => 'link',
            ),
          ),
        ),
      ),
    ),
    'OPTIONS' => 
    array (
      0 => 
      array (
        'regex' => '~^(?|/api/v1/LeadCapture/([^/]+))$~',
        'routeMap' => 
        array (
          2 => 
          array (
            0 => 'route62',
            1 => 
            array (
              'apiKey' => 'apiKey',
            ),
          ),
        ),
      ),
    ),
    'PUT' => 
    array (
      0 => 
      array (
        'regex' => '~^(?|/api/v1/([^/]+)/action/([^/]+)|/api/v1/([^/]+)/layout/([^/]+)()|/api/v1/([^/]+)/layout/([^/]+)/([^/]+)()|/api/v1/Admin/fieldManager/([^/]+)/([^/]+)()()()|/api/v1/([^/]+)/([^/]+)()()()()|/api/v1/([^/]+)/([^/]+)/subscription()()()()())$~',
        'routeMap' => 
        array (
          3 => 
          array (
            0 => 'route64',
            1 => 
            array (
              'controller' => 'controller',
              'action' => 'action',
            ),
          ),
          4 => 
          array (
            0 => 'route67',
            1 => 
            array (
              'controller' => 'controller',
              'name' => 'name',
            ),
          ),
          5 => 
          array (
            0 => 'route68',
            1 => 
            array (
              'controller' => 'controller',
              'name' => 'name',
              'setId' => 'setId',
            ),
          ),
          6 => 
          array (
            0 => 'route74',
            1 => 
            array (
              'scope' => 'scope',
              'name' => 'name',
            ),
          ),
          7 => 
          array (
            0 => 'route123',
            1 => 
            array (
              'controller' => 'controller',
              'id' => 'id',
            ),
          ),
          8 => 
          array (
            0 => 'route128',
            1 => 
            array (
              'controller' => 'controller',
              'id' => 'id',
            ),
          ),
        ),
      ),
    ),
    'PATCH' => 
    array (
      0 => 
      array (
        'regex' => '~^(?|/api/v1/Admin/fieldManager/([^/]+)/([^/]+)|/api/v1/([^/]+)/([^/]+)())$~',
        'routeMap' => 
        array (
          3 => 
          array (
            0 => 'route75',
            1 => 
            array (
              'scope' => 'scope',
              'name' => 'name',
            ),
          ),
          4 => 
          array (
            0 => 'route124',
            1 => 
            array (
              'controller' => 'controller',
              'id' => 'id',
            ),
          ),
        ),
      ),
    ),
    'DELETE' => 
    array (
      0 => 
      array (
        'regex' => '~^(?|/api/v1/Admin/fieldManager/([^/]+)/([^/]+)|/api/v1/([^/]+)/([^/]+)()|/api/v1/([^/]+)/([^/]+)/subscription()()|/api/v1/([^/]+)/([^/]+)/([^/]+)()())$~',
        'routeMap' => 
        array (
          3 => 
          array (
            0 => 'route76',
            1 => 
            array (
              'scope' => 'scope',
              'name' => 'name',
            ),
          ),
          4 => 
          array (
            0 => 'route125',
            1 => 
            array (
              'controller' => 'controller',
              'id' => 'id',
            ),
          ),
          5 => 
          array (
            0 => 'route129',
            1 => 
            array (
              'controller' => 'controller',
              'id' => 'id',
            ),
          ),
          6 => 
          array (
            0 => 'route132',
            1 => 
            array (
              'controller' => 'controller',
              'id' => 'id',
              'link' => 'link',
            ),
          ),
        ),
      ),
    ),
  ),
);