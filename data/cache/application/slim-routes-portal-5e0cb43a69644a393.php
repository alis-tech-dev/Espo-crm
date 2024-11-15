<?php return array (
  0 => 
  array (
  ),
  1 => 
  array (
    'GET' => 
    array (
      0 => 
      array (
        'regex' => '~^(?|/api/v1/portal\\-access/([^/]+)/Activities/([^/]+)/([^/]+)/([^/]+)|/api/v1/portal\\-access/([^/]+)/Activities/([^/]+)/([^/]+)/([^/]+)/list/([^/]+)|/api/v1/portal\\-access/([^/]+)/Activities/upcoming()()()()()|/api/v1/portal\\-access/([^/]+)/Activities()()()()()()|/api/v1/portal\\-access/([^/]+)/Timeline()()()()()()()|/api/v1/portal\\-access/([^/]+)/Timeline/busyRanges()()()()()()()()|/api/v1/portal\\-access/([^/]+)/Meeting/([^/]+)/attendees()()()()()()()()|/api/v1/portal\\-access/([^/]+)/Call/([^/]+)/attendees()()()()()()()()()|/api/v1/portal\\-access/([^/]+)/([^/]+)/([^/]+)/([^/]+)/related/([^/]+)()()()()()()()|/api/v1/portal\\-access/([^/]+)/RecordList/([^/]+)/([^/]+)/([^/]+)()()()()()()()()())$~',
        'routeMap' => 
        array (
          5 => 
          array (
            0 => 'route0',
            1 => 
            array (
              'portalId' => 'portalId',
              'parentType' => 'parentType',
              'id' => 'id',
              'type' => 'type',
            ),
          ),
          6 => 
          array (
            0 => 'route1',
            1 => 
            array (
              'portalId' => 'portalId',
              'parentType' => 'parentType',
              'id' => 'id',
              'type' => 'type',
              'targetType' => 'targetType',
            ),
          ),
          7 => 
          array (
            0 => 'route2',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          8 => 
          array (
            0 => 'route3',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          9 => 
          array (
            0 => 'route4',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          10 => 
          array (
            0 => 'route5',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          11 => 
          array (
            0 => 'route6',
            1 => 
            array (
              'portalId' => 'portalId',
              'id' => 'id',
            ),
          ),
          12 => 
          array (
            0 => 'route7',
            1 => 
            array (
              'portalId' => 'portalId',
              'id' => 'id',
            ),
          ),
          13 => 
          array (
            0 => 'route9',
            1 => 
            array (
              'portalId' => 'portalId',
              'scope' => 'scope',
              'id' => 'id',
              'parentLink' => 'parentLink',
              'link' => 'link',
            ),
          ),
          14 => 
          array (
            0 => 'route10',
            1 => 
            array (
              'portalId' => 'portalId',
              'scope' => 'scope',
              'id' => 'id',
              'link' => 'link',
            ),
          ),
        ),
      ),
      1 => 
      array (
        'regex' => '~^(?|/api/v1/portal\\-access/([^/]+)/Aggregation/([^/]+)|/api/v1/portal\\-access/([^/]+)/([^/]+)/partition/([^/]+)|/api/v1/portal\\-access/([^/]+)/Vies/verifyVatNumber/([^/]+)/([^/]+)()|/api/v1/portal\\-access/([^/]+)/Ares/fill/([^/]+)()()()|/api/v1/portal\\-access/([^/]+)/Ares/suggest/([^/]+)()()()()|/api/v1/portal\\-access/([^/]+)/Finstat/fill/([^/]+)()()()()()|/api/v1/portal\\-access/([^/]+)/Attachment/action/zip()()()()()()()|/api/v1/portal\\-access/([^/]+)/VatNumberValidation/validate/([^/]+)()()()()()()()|/api/v1/portal\\-access/([^/]+)/Warehouse/products()()()()()()()()()|/api/v1/portal\\-access/([^/]+)/SupplierOrder/hintProducts()()()()()()()()()())$~',
        'routeMap' => 
        array (
          3 => 
          array (
            0 => 'route11',
            1 => 
            array (
              'portalId' => 'portalId',
              'scope' => 'scope',
            ),
          ),
          4 => 
          array (
            0 => 'route12',
            1 => 
            array (
              'portalId' => 'portalId',
              'entityType' => 'entityType',
              'by' => 'by',
            ),
          ),
          5 => 
          array (
            0 => 'route13',
            1 => 
            array (
              'portalId' => 'portalId',
              'countryCode' => 'countryCode',
              'vatNumber' => 'vatNumber',
            ),
          ),
          6 => 
          array (
            0 => 'route14',
            1 => 
            array (
              'portalId' => 'portalId',
              'sicCode' => 'sicCode',
            ),
          ),
          7 => 
          array (
            0 => 'route15',
            1 => 
            array (
              'portalId' => 'portalId',
              'companyName' => 'companyName',
            ),
          ),
          8 => 
          array (
            0 => 'route17',
            1 => 
            array (
              'portalId' => 'portalId',
              'sicCode' => 'sicCode',
            ),
          ),
          9 => 
          array (
            0 => 'route19',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          10 => 
          array (
            0 => 'route20',
            1 => 
            array (
              'portalId' => 'portalId',
              'vatId' => 'vatId',
            ),
          ),
          11 => 
          array (
            0 => 'route25',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          12 => 
          array (
            0 => 'route26',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
        ),
      ),
      2 => 
      array (
        'regex' => '~^(?|/api/v1/portal\\-access/([^/]+)/Warehouse/items/([^/]+)|/api/v1/portal\\-access/([^/]+)/Product/stockInfo/([^/]+)()|/api/v1/portal\\-access/([^/]+)/GoodsReceipt/product/([^/]+)()()|/api/v1/portal\\-access/([^/]+)/GoodsIssue/product/([^/]+)()()()|/api/v1/portal\\-access/([^/]+)/ExportToIsdoc()()()()()|/api/v1/portal\\-access/([^/]+)/Kanban/([^/]+)/([^/]+)()()()()|/api/v1/portal\\-access/([^/]+)/QuoteConversion/salesOrderAttributes/([^/]+)()()()()()()|/api/v1/portal\\-access/([^/]+)/SalesOrder/summary/([^/]+)()()()()()()()|/api/v1/portal\\-access/([^/]+)/WarehouseItem/takeItems/([^/]+)()()()()()()()()|/api/v1/portal\\-access/([^/]+)/ProductionOrder/checkQuantity/([^/]+)()()()()()()()()())$~',
        'routeMap' => 
        array (
          3 => 
          array (
            0 => 'route27',
            1 => 
            array (
              'portalId' => 'portalId',
              'id' => 'id',
            ),
          ),
          4 => 
          array (
            0 => 'route28',
            1 => 
            array (
              'portalId' => 'portalId',
              'id' => 'id',
            ),
          ),
          5 => 
          array (
            0 => 'route29',
            1 => 
            array (
              'portalId' => 'portalId',
              'id' => 'id',
            ),
          ),
          6 => 
          array (
            0 => 'route30',
            1 => 
            array (
              'portalId' => 'portalId',
              'id' => 'id',
            ),
          ),
          7 => 
          array (
            0 => 'route32',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          8 => 
          array (
            0 => 'route33',
            1 => 
            array (
              'portalId' => 'portalId',
              'entityType' => 'entityType',
              'statusField' => 'statusField',
            ),
          ),
          9 => 
          array (
            0 => 'route37',
            1 => 
            array (
              'portalId' => 'portalId',
              'id' => 'id',
            ),
          ),
          10 => 
          array (
            0 => 'route38',
            1 => 
            array (
              'portalId' => 'portalId',
              'id' => 'id',
            ),
          ),
          11 => 
          array (
            0 => 'route42',
            1 => 
            array (
              'portalId' => 'portalId',
              'id' => 'id',
            ),
          ),
          12 => 
          array (
            0 => 'route46',
            1 => 
            array (
              'portalId' => 'portalId',
              'id' => 'id',
            ),
          ),
        ),
      ),
      3 => 
      array (
        'regex' => '~^(?|/api/v1/portal\\-access/([^/]+)/|/api/v1/portal\\-access/([^/]+)/App/user()|/api/v1/portal\\-access/([^/]+)/App/about()()|/api/v1/portal\\-access/([^/]+)/Metadata()()()|/api/v1/portal\\-access/([^/]+)/I18n()()()()|/api/v1/portal\\-access/([^/]+)/Settings()()()()()|/api/v1/portal\\-access/([^/]+)/Stream()()()()()()|/api/v1/portal\\-access/([^/]+)/GlobalSearch()()()()()()()|/api/v1/portal\\-access/([^/]+)/([^/]+)/action/([^/]+)()()()()()()|/api/v1/portal\\-access/([^/]+)/([^/]+)/layout/([^/]+)()()()()()()())$~',
        'routeMap' => 
        array (
          2 => 
          array (
            0 => 'route50',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          3 => 
          array (
            0 => 'route51',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          4 => 
          array (
            0 => 'route53',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          5 => 
          array (
            0 => 'route54',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          6 => 
          array (
            0 => 'route55',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          7 => 
          array (
            0 => 'route56',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          8 => 
          array (
            0 => 'route59',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          9 => 
          array (
            0 => 'route60',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          10 => 
          array (
            0 => 'route65',
            1 => 
            array (
              'portalId' => 'portalId',
              'controller' => 'controller',
              'action' => 'action',
            ),
          ),
          11 => 
          array (
            0 => 'route66',
            1 => 
            array (
              'portalId' => 'portalId',
              'controller' => 'controller',
              'name' => 'name',
            ),
          ),
        ),
      ),
      4 => 
      array (
        'regex' => '~^(?|/api/v1/portal\\-access/([^/]+)/Admin/jobs|/api/v1/portal\\-access/([^/]+)/Admin/fieldManager/([^/]+)/([^/]+)|/api/v1/portal\\-access/([^/]+)/CurrencyRate()()()|/api/v1/portal\\-access/([^/]+)/MassAction/([^/]+)/status()()()|/api/v1/portal\\-access/([^/]+)/Export/([^/]+)/status()()()()|/api/v1/portal\\-access/([^/]+)/Kanban/([^/]+)()()()()()|/api/v1/portal\\-access/([^/]+)/Attachment/file/([^/]+)()()()()()()|/api/v1/portal\\-access/([^/]+)/Email/inbox/notReadCounts()()()()()()()()|/api/v1/portal\\-access/([^/]+)/Email/insertFieldData()()()()()()()()()|/api/v1/portal\\-access/([^/]+)/EmailAddress/search()()()()()()()()()())$~',
        'routeMap' => 
        array (
          2 => 
          array (
            0 => 'route71',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          4 => 
          array (
            0 => 'route72',
            1 => 
            array (
              'portalId' => 'portalId',
              'scope' => 'scope',
              'name' => 'name',
            ),
          ),
          5 => 
          array (
            0 => 'route77',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          6 => 
          array (
            0 => 'route81',
            1 => 
            array (
              'portalId' => 'portalId',
              'id' => 'id',
            ),
          ),
          7 => 
          array (
            0 => 'route84',
            1 => 
            array (
              'portalId' => 'portalId',
              'id' => 'id',
            ),
          ),
          8 => 
          array (
            0 => 'route93',
            1 => 
            array (
              'portalId' => 'portalId',
              'entityType' => 'entityType',
            ),
          ),
          9 => 
          array (
            0 => 'route94',
            1 => 
            array (
              'portalId' => 'portalId',
              'id' => 'id',
            ),
          ),
          10 => 
          array (
            0 => 'route108',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          11 => 
          array (
            0 => 'route109',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          12 => 
          array (
            0 => 'route110',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
        ),
      ),
      5 => 
      array (
        'regex' => '~^(?|/api/v1/portal\\-access/([^/]+)/User/([^/]+)/acl|/api/v1/portal\\-access/([^/]+)/Oidc/authorizationData()()|/api/v1/portal\\-access/([^/]+)/([^/]+)/([^/]+)()|/api/v1/portal\\-access/([^/]+)/([^/]+)()()()|/api/v1/portal\\-access/([^/]+)/([^/]+)/([^/]+)/stream()()()|/api/v1/portal\\-access/([^/]+)/([^/]+)/([^/]+)/posts()()()()|/api/v1/portal\\-access/([^/]+)/([^/]+)/([^/]+)/([^/]+)()()()())$~',
        'routeMap' => 
        array (
          3 => 
          array (
            0 => 'route111',
            1 => 
            array (
              'portalId' => 'portalId',
              'id' => 'id',
            ),
          ),
          4 => 
          array (
            0 => 'route118',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          5 => 
          array (
            0 => 'route120',
            1 => 
            array (
              'portalId' => 'portalId',
              'controller' => 'controller',
              'id' => 'id',
            ),
          ),
          6 => 
          array (
            0 => 'route121',
            1 => 
            array (
              'portalId' => 'portalId',
              'controller' => 'controller',
            ),
          ),
          7 => 
          array (
            0 => 'route126',
            1 => 
            array (
              'portalId' => 'portalId',
              'controller' => 'controller',
              'id' => 'id',
            ),
          ),
          8 => 
          array (
            0 => 'route127',
            1 => 
            array (
              'portalId' => 'portalId',
              'controller' => 'controller',
              'id' => 'id',
            ),
          ),
          9 => 
          array (
            0 => 'route130',
            1 => 
            array (
              'portalId' => 'portalId',
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
        'regex' => '~^(?|/api/v1/portal\\-access/([^/]+)/Campaign/([^/]+)/generateMailMerge|/api/v1/portal\\-access/([^/]+)/ClearBrowserCache()()|/api/v1/portal\\-access/([^/]+)/Attachment/action/copy()()()|/api/v1/portal\\-access/([^/]+)/ProcessSalesOrder()()()()|/api/v1/portal\\-access/([^/]+)/Attendance/action/createOrUpdate()()()()()|/api/v1/portal\\-access/([^/]+)/HumanResources/Attendance/([^/]+)/([^/]+)()()()()|/api/v1/portal\\-access/([^/]+)/OnlyOffice/callback/([^/]+)()()()()()()|/api/v1/portal\\-access/([^/]+)/ZipIsdocs()()()()()()()()|/api/v1/portal\\-access/([^/]+)/SalesOrder/createProductionOrders/([^/]+)()()()()()()()()|/api/v1/portal\\-access/([^/]+)/Warehouse/changeCategory/([^/]+)/([^/]+)()()()()()()()()|/api/v1/portal\\-access/([^/]+)/SalesOrder/timeOn/([^/]+)()()()()()()()()()())$~',
        'routeMap' => 
        array (
          3 => 
          array (
            0 => 'route8',
            1 => 
            array (
              'portalId' => 'portalId',
              'id' => 'id',
            ),
          ),
          4 => 
          array (
            0 => 'route16',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          5 => 
          array (
            0 => 'route18',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          6 => 
          array (
            0 => 'route21',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          7 => 
          array (
            0 => 'route22',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          8 => 
          array (
            0 => 'route23',
            1 => 
            array (
              'portalId' => 'portalId',
              'entityType' => 'entityType',
              'id' => 'id',
            ),
          ),
          9 => 
          array (
            0 => 'route24',
            1 => 
            array (
              'portalId' => 'portalId',
              'key' => 'key',
            ),
          ),
          10 => 
          array (
            0 => 'route31',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          11 => 
          array (
            0 => 'route35',
            1 => 
            array (
              'portalId' => 'portalId',
              'id' => 'id',
            ),
          ),
          12 => 
          array (
            0 => 'route36',
            1 => 
            array (
              'portalId' => 'portalId',
              'id' => 'id',
              'categoryId' => 'categoryId',
            ),
          ),
          13 => 
          array (
            0 => 'route39',
            1 => 
            array (
              'portalId' => 'portalId',
              'id' => 'id',
            ),
          ),
        ),
      ),
      1 => 
      array (
        'regex' => '~^(?|/api/v1/portal\\-access/([^/]+)/SalesOrder/timeOff/([^/]+)|/api/v1/portal\\-access/([^/]+)/ProductionOrder/takeFromWarehouse/([^/]+)/([^/]+)/([^/]+)|/api/v1/portal\\-access/([^/]+)/WarehouseItem/createItems/([^/]+)/([^/]+)/([^/]+)()|/api/v1/portal\\-access/([^/]+)/WarehouseItem/updateItems/([^/]+)/([^/]+)()()()|/api/v1/portal\\-access/([^/]+)/WarehouseItem/productUpdate/([^/]+)/([^/]+)/([^/]+)()()()|/api/v1/portal\\-access/([^/]+)/SalesOrder/updateProductionOrder/([^/]+)/([^/]+)/([^/]+)()()()()|/api/v1/portal\\-access/([^/]+)/ProductionOrder/updatePerformWork/([^/]+)()()()()()()()|/api/v1/portal\\-access/([^/]+)/Selector/createSelector()()()()()()()()()|/api/v1/portal\\-access/([^/]+)/App/destroyAuthToken()()()()()()()()()()|/api/v1/portal\\-access/([^/]+)/LeadCapture/([^/]+)()()()()()()()()()()|/api/v1/portal\\-access/([^/]+)/([^/]+)/action/([^/]+)()()()()()()()()()())$~',
        'routeMap' => 
        array (
          3 => 
          array (
            0 => 'route40',
            1 => 
            array (
              'portalId' => 'portalId',
              'id' => 'id',
            ),
          ),
          5 => 
          array (
            0 => 'route41',
            1 => 
            array (
              'portalId' => 'portalId',
              'id' => 'id',
              'quantity' => 'quantity',
              'stock' => 'stock',
            ),
          ),
          6 => 
          array (
            0 => 'route43',
            1 => 
            array (
              'portalId' => 'portalId',
              'productId' => 'productId',
              'count' => 'count',
              'stock' => 'stock',
            ),
          ),
          7 => 
          array (
            0 => 'route44',
            1 => 
            array (
              'portalId' => 'portalId',
              'id' => 'id',
              'quantity' => 'quantity',
            ),
          ),
          8 => 
          array (
            0 => 'route45',
            1 => 
            array (
              'portalId' => 'portalId',
              'id' => 'id',
              'field' => 'field',
              'value' => 'value',
            ),
          ),
          9 => 
          array (
            0 => 'route47',
            1 => 
            array (
              'portalId' => 'portalId',
              'id' => 'id',
              'quantity' => 'quantity',
              'stock' => 'stock',
            ),
          ),
          10 => 
          array (
            0 => 'route48',
            1 => 
            array (
              'portalId' => 'portalId',
              'id' => 'id',
            ),
          ),
          11 => 
          array (
            0 => 'route49',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          12 => 
          array (
            0 => 'route52',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          13 => 
          array (
            0 => 'route61',
            1 => 
            array (
              'portalId' => 'portalId',
              'apiKey' => 'apiKey',
            ),
          ),
          14 => 
          array (
            0 => 'route63',
            1 => 
            array (
              'portalId' => 'portalId',
              'controller' => 'controller',
              'action' => 'action',
            ),
          ),
        ),
      ),
      2 => 
      array (
        'regex' => '~^(?|/api/v1/portal\\-access/([^/]+)/Admin/rebuild|/api/v1/portal\\-access/([^/]+)/Admin/clearCache()|/api/v1/portal\\-access/([^/]+)/Admin/fieldManager/([^/]+)()|/api/v1/portal\\-access/([^/]+)/Action()()()|/api/v1/portal\\-access/([^/]+)/MassAction()()()()|/api/v1/portal\\-access/([^/]+)/MassAction/([^/]+)/subscribe()()()()|/api/v1/portal\\-access/([^/]+)/Export()()()()()()|/api/v1/portal\\-access/([^/]+)/Export/([^/]+)/subscribe()()()()()()|/api/v1/portal\\-access/([^/]+)/Import()()()()()()()()|/api/v1/portal\\-access/([^/]+)/Import/file()()()()()()()()()|/api/v1/portal\\-access/([^/]+)/Import/([^/]+)/revert()()()()()()()()())$~',
        'routeMap' => 
        array (
          2 => 
          array (
            0 => 'route69',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          3 => 
          array (
            0 => 'route70',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          4 => 
          array (
            0 => 'route73',
            1 => 
            array (
              'portalId' => 'portalId',
              'scope' => 'scope',
            ),
          ),
          5 => 
          array (
            0 => 'route79',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          6 => 
          array (
            0 => 'route80',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          7 => 
          array (
            0 => 'route82',
            1 => 
            array (
              'portalId' => 'portalId',
              'id' => 'id',
            ),
          ),
          8 => 
          array (
            0 => 'route83',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          9 => 
          array (
            0 => 'route85',
            1 => 
            array (
              'portalId' => 'portalId',
              'id' => 'id',
            ),
          ),
          10 => 
          array (
            0 => 'route86',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          11 => 
          array (
            0 => 'route87',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          12 => 
          array (
            0 => 'route88',
            1 => 
            array (
              'portalId' => 'portalId',
              'id' => 'id',
            ),
          ),
        ),
      ),
      3 => 
      array (
        'regex' => '~^(?|/api/v1/portal\\-access/([^/]+)/Import/([^/]+)/removeDuplicates|/api/v1/portal\\-access/([^/]+)/Import/([^/]+)/unmarkDuplicates()|/api/v1/portal\\-access/([^/]+)/Import/([^/]+)/exportErrors()()|/api/v1/portal\\-access/([^/]+)/Attachment/chunk/([^/]+)()()()|/api/v1/portal\\-access/([^/]+)/Attachment/fromImageUrl()()()()()|/api/v1/portal\\-access/([^/]+)/Attachment/copy/([^/]+)()()()()()|/api/v1/portal\\-access/([^/]+)/EmailTemplate/([^/]+)/prepare()()()()()()|/api/v1/portal\\-access/([^/]+)/Email/([^/]+)/attachments/copy()()()()()()()|/api/v1/portal\\-access/([^/]+)/Email/sendTest()()()()()()()()()|/api/v1/portal\\-access/([^/]+)/Email/inbox/read()()()()()()()()()()|/api/v1/portal\\-access/([^/]+)/Email/inbox/important()()()()()()()()()()())$~',
        'routeMap' => 
        array (
          3 => 
          array (
            0 => 'route89',
            1 => 
            array (
              'portalId' => 'portalId',
              'id' => 'id',
            ),
          ),
          4 => 
          array (
            0 => 'route90',
            1 => 
            array (
              'portalId' => 'portalId',
              'id' => 'id',
            ),
          ),
          5 => 
          array (
            0 => 'route91',
            1 => 
            array (
              'portalId' => 'portalId',
              'id' => 'id',
            ),
          ),
          6 => 
          array (
            0 => 'route95',
            1 => 
            array (
              'portalId' => 'portalId',
              'id' => 'id',
            ),
          ),
          7 => 
          array (
            0 => 'route96',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          8 => 
          array (
            0 => 'route97',
            1 => 
            array (
              'portalId' => 'portalId',
              'id' => 'id',
            ),
          ),
          9 => 
          array (
            0 => 'route98',
            1 => 
            array (
              'portalId' => 'portalId',
              'id' => 'id',
            ),
          ),
          10 => 
          array (
            0 => 'route99',
            1 => 
            array (
              'portalId' => 'portalId',
              'id' => 'id',
            ),
          ),
          11 => 
          array (
            0 => 'route100',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          12 => 
          array (
            0 => 'route101',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          13 => 
          array (
            0 => 'route103',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
        ),
      ),
      4 => 
      array (
        'regex' => '~^(?|/api/v1/portal\\-access/([^/]+)/Email/inbox/inTrash|/api/v1/portal\\-access/([^/]+)/Email/inbox/folders/([^/]+)|/api/v1/portal\\-access/([^/]+)/UserSecurity/apiKey/generate()()|/api/v1/portal\\-access/([^/]+)/UserSecurity/password/recovery()()()|/api/v1/portal\\-access/([^/]+)/UserSecurity/password/generate()()()()|/api/v1/portal\\-access/([^/]+)/User/passwordChangeRequest()()()()()|/api/v1/portal\\-access/([^/]+)/User/changePasswordByRequest()()()()()()|/api/v1/portal\\-access/([^/]+)/Oidc/backchannelLogout()()()()()()()|/api/v1/portal\\-access/([^/]+)/([^/]+)()()()()()()()|/api/v1/portal\\-access/([^/]+)/([^/]+)/([^/]+)/([^/]+)()()()()()())$~',
        'routeMap' => 
        array (
          2 => 
          array (
            0 => 'route105',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          3 => 
          array (
            0 => 'route107',
            1 => 
            array (
              'portalId' => 'portalId',
              'folderId' => 'folderId',
            ),
          ),
          4 => 
          array (
            0 => 'route112',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          5 => 
          array (
            0 => 'route114',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          6 => 
          array (
            0 => 'route115',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          7 => 
          array (
            0 => 'route116',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          8 => 
          array (
            0 => 'route117',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          9 => 
          array (
            0 => 'route119',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          10 => 
          array (
            0 => 'route122',
            1 => 
            array (
              'portalId' => 'portalId',
              'controller' => 'controller',
            ),
          ),
          11 => 
          array (
            0 => 'route131',
            1 => 
            array (
              'portalId' => 'portalId',
              'controller' => 'controller',
              'id' => 'id',
              'link' => 'link',
            ),
          ),
        ),
      ),
    ),
    'PUT' => 
    array (
      0 => 
      array (
        'regex' => '~^(?|/api/v1/portal\\-access/([^/]+)/CustomKanban/order|/api/v1/portal\\-access/([^/]+)/Settings()|/api/v1/portal\\-access/([^/]+)/([^/]+)/action/([^/]+)|/api/v1/portal\\-access/([^/]+)/([^/]+)/layout/([^/]+)()|/api/v1/portal\\-access/([^/]+)/([^/]+)/layout/([^/]+)/([^/]+)()|/api/v1/portal\\-access/([^/]+)/Admin/fieldManager/([^/]+)/([^/]+)()()()|/api/v1/portal\\-access/([^/]+)/CurrencyRate()()()()()()|/api/v1/portal\\-access/([^/]+)/Kanban/order()()()()()()()|/api/v1/portal\\-access/([^/]+)/UserSecurity/password()()()()()()()()|/api/v1/portal\\-access/([^/]+)/([^/]+)/([^/]+)()()()()()()()|/api/v1/portal\\-access/([^/]+)/([^/]+)/([^/]+)/subscription()()()()()()()())$~',
        'routeMap' => 
        array (
          2 => 
          array (
            0 => 'route34',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          3 => 
          array (
            0 => 'route58',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          4 => 
          array (
            0 => 'route64',
            1 => 
            array (
              'portalId' => 'portalId',
              'controller' => 'controller',
              'action' => 'action',
            ),
          ),
          5 => 
          array (
            0 => 'route67',
            1 => 
            array (
              'portalId' => 'portalId',
              'controller' => 'controller',
              'name' => 'name',
            ),
          ),
          6 => 
          array (
            0 => 'route68',
            1 => 
            array (
              'portalId' => 'portalId',
              'controller' => 'controller',
              'name' => 'name',
              'setId' => 'setId',
            ),
          ),
          7 => 
          array (
            0 => 'route74',
            1 => 
            array (
              'portalId' => 'portalId',
              'scope' => 'scope',
              'name' => 'name',
            ),
          ),
          8 => 
          array (
            0 => 'route78',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          9 => 
          array (
            0 => 'route92',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          10 => 
          array (
            0 => 'route113',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          11 => 
          array (
            0 => 'route123',
            1 => 
            array (
              'portalId' => 'portalId',
              'controller' => 'controller',
              'id' => 'id',
            ),
          ),
          12 => 
          array (
            0 => 'route128',
            1 => 
            array (
              'portalId' => 'portalId',
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
        'regex' => '~^(?|/api/v1/portal\\-access/([^/]+)/Settings|/api/v1/portal\\-access/([^/]+)/Admin/fieldManager/([^/]+)/([^/]+)|/api/v1/portal\\-access/([^/]+)/([^/]+)/([^/]+)())$~',
        'routeMap' => 
        array (
          2 => 
          array (
            0 => 'route57',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          4 => 
          array (
            0 => 'route75',
            1 => 
            array (
              'portalId' => 'portalId',
              'scope' => 'scope',
              'name' => 'name',
            ),
          ),
          5 => 
          array (
            0 => 'route124',
            1 => 
            array (
              'portalId' => 'portalId',
              'controller' => 'controller',
              'id' => 'id',
            ),
          ),
        ),
      ),
    ),
    'OPTIONS' => 
    array (
      0 => 
      array (
        'regex' => '~^(?|/api/v1/portal\\-access/([^/]+)/LeadCapture/([^/]+))$~',
        'routeMap' => 
        array (
          3 => 
          array (
            0 => 'route62',
            1 => 
            array (
              'portalId' => 'portalId',
              'apiKey' => 'apiKey',
            ),
          ),
        ),
      ),
    ),
    'DELETE' => 
    array (
      0 => 
      array (
        'regex' => '~^(?|/api/v1/portal\\-access/([^/]+)/Admin/fieldManager/([^/]+)/([^/]+)|/api/v1/portal\\-access/([^/]+)/Email/inbox/read()()()|/api/v1/portal\\-access/([^/]+)/Email/inbox/important()()()()|/api/v1/portal\\-access/([^/]+)/Email/inbox/inTrash()()()()()|/api/v1/portal\\-access/([^/]+)/([^/]+)/([^/]+)()()()()|/api/v1/portal\\-access/([^/]+)/([^/]+)/([^/]+)/subscription()()()()()|/api/v1/portal\\-access/([^/]+)/([^/]+)/([^/]+)/([^/]+)()()()()())$~',
        'routeMap' => 
        array (
          4 => 
          array (
            0 => 'route76',
            1 => 
            array (
              'portalId' => 'portalId',
              'scope' => 'scope',
              'name' => 'name',
            ),
          ),
          5 => 
          array (
            0 => 'route102',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          6 => 
          array (
            0 => 'route104',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          7 => 
          array (
            0 => 'route106',
            1 => 
            array (
              'portalId' => 'portalId',
            ),
          ),
          8 => 
          array (
            0 => 'route125',
            1 => 
            array (
              'portalId' => 'portalId',
              'controller' => 'controller',
              'id' => 'id',
            ),
          ),
          9 => 
          array (
            0 => 'route129',
            1 => 
            array (
              'portalId' => 'portalId',
              'controller' => 'controller',
              'id' => 'id',
            ),
          ),
          10 => 
          array (
            0 => 'route132',
            1 => 
            array (
              'portalId' => 'portalId',
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