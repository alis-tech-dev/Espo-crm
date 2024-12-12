<?php
return [
  'afterRecordCreated' => [
    'RequestForm' => [
      '601d2c5e290f71099' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'equals',
            'subjectType' => 'value',
            'cid' => 0,
            'fieldToCompare' => 'status',
            'type' => 'all',
            'value' => 'Čeká na schválení'
          ],
          1 => (object) [
            'comparison' => 'equals',
            'subjectType' => 'value',
            'cid' => 1,
            'fieldToCompare' => 'druh',
            'type' => 'all',
            'value' => 'Vývoj'
          ]
        ],
        'actions' => [
          0 => (object) [
            'execution' => (object) [
              'type' => 'immediately',
              'field' => false,
              'shiftDays' => 0,
              'shiftUnit' => 'days'
            ],
            'from' => 'link:assignedUser',
            'to' => 'specifiedUsers',
            'optOutLink' => false,
            'cid' => 1,
            'id' => '7yau814lz4',
            'emailTemplateId' => '601c08339d133fed2',
            'emailTemplateName' => 'Žádanka na nákup - KE SCHVÁLENÍ',
            'replyTo' => '',
            'toSpecifiedEntityName' => 'User',
            'toSpecifiedEntityIds' => [
              0 => '5fb41e0e495069151'
            ],
            'toSpecifiedEntityNames' => (object) [
              '5fb41e0e495069151' => 'Petr Šulc'
            ],
            'fromEmail' => '',
            'toEmail' => '',
            'replyToEmail' => '',
            'doNotStore' => true,
            'type' => 'sendEmail'
          ],
          1 => (object) [
            'fieldList' => [
              0 => 'status',
              1 => 'orderStatus',
              2 => 'approved',
              3 => 'disapproved',
              4 => 'reasonDeclined'
            ],
            'fields' => (object) [
              'status' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'status' => 'Čeká na schválení'
                ]
              ],
              'orderStatus' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'orderStatus' => 'Not ordered'
                ]
              ],
              'approved' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'approved' => false
                ]
              ],
              'disapproved' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'disapproved' => false
                ]
              ],
              'reasonDeclined' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'reasonDeclined' => NULL
                ]
              ]
            ],
            'cid' => 2,
            'id' => '4mwx82s354',
            'formula' => '',
            'type' => 'updateEntity'
          ]
        ],
        'portalOnly' => false
      ]
    ],
    'VacationRequest' => [
      '66e84951d305c48ea' => [
        'actions' => [
          0 => (object) [
            'execution' => (object) [
              'type' => 'later',
              'field' => '',
              'shiftDays' => '1',
              'shiftUnit' => 'minutes'
            ],
            'from' => 'link:assignedUser',
            'to' => 'link:humanResources.assignedUser',
            'optOutLink' => false,
            'cid' => 0,
            'id' => '6ysqefrgnq',
            'emailTemplateId' => '66e84b677064ffa68',
            'emailTemplateName' => 'Dovolená - KE SCHVÁLENÍ_new',
            'replyTo' => '',
            'fromEmail' => '',
            'toEmail' => '',
            'replyToEmail' => '',
            'doNotStore' => false,
            'type' => 'sendEmail'
          ]
        ],
        'portalOnly' => false
      ]
    ],
    'JIRA' => [
      '66e9aef1669db0b10' => [
        'actions' => [
          0 => (object) [
            'execution' => (object) [
              'type' => 'immediately',
              'field' => false,
              'shiftDays' => 0,
              'shiftUnit' => 'days'
            ],
            'from' => 'link:createdBy',
            'to' => 'link:assignedUser',
            'optOutLink' => false,
            'cid' => 0,
            'id' => 'jxi4g11hod',
            'emailTemplateId' => '66e9aee6b7e638d6a',
            'emailTemplateName' => 'CRM Bug created',
            'replyTo' => '',
            'fromEmail' => '',
            'toEmail' => '',
            'replyToEmail' => '',
            'doNotStore' => false,
            'type' => 'sendEmail'
          ]
        ],
        'portalOnly' => false
      ]
    ],
    'Warehouse' => [
      '673493fdeaf56fda5' => [
        'actions' => [
          0 => (object) [
            'link' => 'Product',
            'fieldList' => [
              0 => 'alisId',
              1 => 'category',
              2 => 'priceA',
              3 => 'priceB',
              4 => 'priceC',
              5 => 'componentsCost',
              6 => 'description',
              7 => 'costPrice',
              8 => 'image',
              9 => 'isIgnored',
              10 => 'isArchive',
              11 => 'isInvisible',
              12 => 'ean',
              13 => 'isModel',
              14 => 'unit',
              15 => 'name',
              16 => 'listPrice',
              17 => 'productCode',
              18 => 'priceEndUser',
              19 => 'qrCode',
              20 => 'unitPrice',
              21 => 'salesPrice',
              22 => 'salesPriceWithTax'
            ],
            'fields' => (object) [
              'alisId' => (object) [
                'subjectType' => 'field',
                'attributes' => (object) [],
                'field' => 'alisId'
              ],
              'category' => (object) [
                'subjectType' => 'field',
                'attributes' => (object) [],
                'field' => 'productCategory'
              ],
              'priceA' => (object) [
                'subjectType' => 'field',
                'attributes' => (object) [],
                'field' => 'priceA'
              ],
              'priceB' => (object) [
                'subjectType' => 'field',
                'attributes' => (object) [],
                'field' => 'priceB'
              ],
              'priceC' => (object) [
                'subjectType' => 'field',
                'attributes' => (object) [],
                'field' => 'priceC'
              ],
              'componentsCost' => (object) [
                'subjectType' => 'field',
                'attributes' => (object) [],
                'field' => 'componentsCost'
              ],
              'description' => (object) [
                'subjectType' => 'field',
                'attributes' => (object) [],
                'field' => 'description'
              ],
              'costPrice' => (object) [
                'subjectType' => 'field',
                'attributes' => (object) [],
                'field' => 'costPrice'
              ],
              'image' => (object) [
                'subjectType' => 'field',
                'attributes' => (object) [],
                'field' => 'image'
              ],
              'isIgnored' => (object) [
                'subjectType' => 'field',
                'attributes' => (object) [],
                'field' => 'isIgnored'
              ],
              'isArchive' => (object) [
                'subjectType' => 'field',
                'attributes' => (object) [],
                'field' => 'isArchive'
              ],
              'isInvisible' => (object) [
                'subjectType' => 'field',
                'attributes' => (object) [],
                'field' => 'isInvisible'
              ],
              'ean' => (object) [
                'subjectType' => 'field',
                'attributes' => (object) [],
                'field' => 'ean'
              ],
              'isModel' => (object) [
                'subjectType' => 'field',
                'attributes' => (object) [],
                'field' => 'isModel'
              ],
              'unit' => (object) [
                'subjectType' => 'field',
                'attributes' => (object) [],
                'field' => 'unit'
              ],
              'name' => (object) [
                'subjectType' => 'field',
                'attributes' => (object) [],
                'field' => 'productName'
              ],
              'listPrice' => (object) [
                'subjectType' => 'field',
                'attributes' => (object) [],
                'field' => 'listPrice'
              ],
              'productCode' => (object) [
                'subjectType' => 'field',
                'attributes' => (object) [],
                'field' => 'productCode'
              ],
              'priceEndUser' => (object) [
                'subjectType' => 'field',
                'attributes' => (object) [],
                'field' => 'priceEndUser'
              ],
              'qrCode' => (object) [
                'subjectType' => 'field',
                'attributes' => (object) [],
                'field' => 'qrCode'
              ],
              'unitPrice' => (object) [
                'subjectType' => 'field',
                'attributes' => (object) [],
                'field' => 'unitPrice'
              ],
              'salesPrice' => (object) [
                'subjectType' => 'field',
                'attributes' => (object) [],
                'field' => 'salesPrice'
              ],
              'salesPriceWithTax' => (object) [
                'subjectType' => 'field',
                'attributes' => (object) [],
                'field' => 'salesPriceWithTax'
              ]
            ],
            'cid' => 0,
            'id' => 'gq0qidihbm',
            'linkList' => [
              0 => 'warehouse'
            ],
            'formula' => NULL,
            'entityType' => 'Product',
            'type' => 'createEntity'
          ]
        ],
        'portalOnly' => false
      ]
    ],
    'CampaignLogRecord' => [
      '673726ef0c4597604' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'equals',
            'subjectType' => 'value',
            'cid' => 0,
            'fieldToCompare' => 'action',
            'type' => 'all',
            'value' => 'Sent'
          ]
        ],
        'actions' => [
          0 => (object) [
            'link' => 'parent',
            'fieldList' => [],
            'fields' => (object) [],
            'cid' => 0,
            'id' => 'djxw33tsst',
            'parentEntityType' => 'Prospect',
            'formula' => 'ifThen(status == "First contact", status = "Second contact");
ifThen(status == "New", status = "First contact");
',
            'type' => 'updateRelatedEntity'
          ]
        ],
        'portalOnly' => false
      ]
    ],
    'Lead' => [
      '67375b2bd45d97fa8' => [
        'actions' => [
          0 => (object) [
            'link' => 'prospect',
            'fieldList' => [
              0 => 'status'
            ],
            'fields' => (object) [
              'status' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'status' => 'Converted'
                ]
              ]
            ],
            'cid' => 0,
            'id' => '7h4xnhowhf',
            'parentEntityType' => NULL,
            'formula' => NULL,
            'type' => 'updateRelatedEntity'
          ]
        ],
        'portalOnly' => false
      ]
    ]
  ],
  'afterRecordUpdated' => [
    'JIRA' => [
      '66fbb26a4fba31484' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'equals',
            'subjectType' => 'value',
            'cid' => 0,
            'fieldToCompare' => 'status',
            'type' => 'all',
            'value' => 'Done'
          ]
        ],
        'actions' => [
          0 => (object) [
            'execution' => (object) [
              'type' => 'immediately',
              'field' => false,
              'shiftDays' => 0,
              'shiftUnit' => 'days'
            ],
            'from' => 'link:assignedUser',
            'to' => 'link:users',
            'optOutLink' => false,
            'cid' => 0,
            'id' => 'ez9ylpab1e',
            'emailTemplateId' => '66fbb25f6ecfa7221',
            'emailTemplateName' => 'CRM bug fixed',
            'replyTo' => '',
            'fromEmail' => '',
            'toEmail' => '',
            'replyToEmail' => '',
            'doNotStore' => false,
            'type' => 'sendEmail'
          ],
          1 => (object) [
            'execution' => (object) [
              'type' => 'immediately',
              'field' => false,
              'shiftDays' => 0,
              'shiftUnit' => 'days'
            ],
            'from' => 'link:assignedUser',
            'to' => 'link:createdBy',
            'optOutLink' => false,
            'cid' => 1,
            'id' => 'vpvny8gdpq',
            'emailTemplateId' => '66fbb25f6ecfa7221',
            'emailTemplateName' => 'CRM bug fixed',
            'replyTo' => '',
            'fromEmail' => '',
            'toEmail' => '',
            'replyToEmail' => '',
            'doNotStore' => false,
            'type' => 'sendEmail'
          ]
        ],
        'portalOnly' => false
      ],
      '66fbbca3011dddcfa' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'equals',
            'subjectType' => 'value',
            'cid' => 0,
            'fieldToCompare' => 'status',
            'type' => 'all',
            'value' => 'Done'
          ],
          1 => (object) [
            'comparison' => 'true',
            'cid' => 1,
            'fieldToCompare' => 'toAll',
            'type' => 'all'
          ]
        ],
        'actions' => [
          0 => (object) [
            'execution' => (object) [
              'type' => 'immediately',
              'field' => false,
              'shiftDays' => 0,
              'shiftUnit' => 'days'
            ],
            'from' => 'link:assignedUser',
            'to' => 'specifiedUsers',
            'optOutLink' => false,
            'cid' => 0,
            'id' => 'zutg0nqliq',
            'emailTemplateId' => '66fbb25f6ecfa7221',
            'emailTemplateName' => 'CRM bug fixed',
            'replyTo' => '',
            'toSpecifiedEntityName' => 'User',
            'toSpecifiedEntityIds' => [
              0 => '6672b81d428f963aa',
              1 => '6668137083ad48988',
              2 => '63615a9a682908a1a',
              3 => '665d69ea71ffc2b2a',
              4 => '5f96e73f7102ed004',
              5 => '663a01cf6933cd98a',
              6 => '65b3763a37a806667',
              7 => '665d6979bc4565e80',
              8 => '653b43792678c0604',
              9 => '5fb41f4b76af7285b',
              10 => '63c6902d9256480b8',
              11 => '609e273806d6b6335',
              12 => '665d6c911e6816362',
              13 => '665d6a9d9ee8c4ba1',
              14 => '665d6d3c51101966b',
              15 => '6641fe72728e4cd89',
              16 => '665d6e60443379858',
              17 => '66794c69f253ef857',
              18 => '5fb3cf0649511ee0d',
              19 => '64ae13ae9c887d5de',
              20 => '6426d51b1239bfe02',
              21 => '5fb3cf64242a5c856',
              22 => '614865e053e8e7392',
              23 => '5fb3cfdc06fca7302',
              24 => '66794e539e81a3fd5',
              25 => '5fc0faffca4f33bd3',
              26 => '665d7abcef25ea2ae',
              27 => '62667d7d9bb53b237',
              28 => '66794b1e143b58599',
              29 => '66794eada04a91031',
              30 => '665d6bbc2699ae57a',
              31 => '66794eda984985d95',
              32 => '5fc0faa0590b1f7a0',
              33 => '665d63c693dc5784e',
              34 => '665d6c35bc9741100',
              35 => '5fc0fb6ce16257be4',
              36 => '642a92617f151a2c5',
              37 => '663cdc147a08c0c23',
              38 => '5fb3bd3f42a41788d',
              39 => '63da22e6978766358',
              40 => '665d6b1fdc9a5c430',
              41 => '1',
              42 => '5fc0dc72d7bdf550f',
              43 => '66794bb2345fc5915',
              44 => '609e284c189630c4a',
              45 => '667441464fdc976fb',
              46 => '626fbdef963431e1d',
              47 => '664736e606e19599f',
              48 => '65cf3b2d24ac9a844',
              49 => '6645da635db9a3d1b'
            ],
            'toSpecifiedEntityNames' => (object) [
              1 => 'David Strejc',
              '6672b81d428f963aa' => 'Andrii Malovany',
              '6668137083ad48988' => 'Adéla Nakládalová',
              '63615a9a682908a1a' => 'aledo aledo',
              '665d69ea71ffc2b2a' => 'Alexandr Roman',
              '5f96e73f7102ed004' => 'Alis Admin',
              '663a01cf6933cd98a' => 'Bernd Schraeder',
              '65b3763a37a806667' => 'Admin Admin',
              '665d6979bc4565e80' => 'Dagmar Pišťáková',
              '653b43792678c0604' => 'Daniel Rycka',
              '5fb41f4b76af7285b' => 'Denisa Žochová',
              '63c6902d9256480b8' => 'Diana Seifriedová',
              '609e273806d6b6335' => 'Dominik Kadlček',
              '665d6c911e6816362' => 'Dominik Lakomý',
              '665d6a9d9ee8c4ba1' => 'Dominika Šarmanová',
              '665d6d3c51101966b' => 'Eva Navrátilová',
              '6641fe72728e4cd89' => 'Georg Dörner',
              '665d6e60443379858' => 'Iveta Hrabalová',
              '66794c69f253ef857' => 'Jakub Rozsíval',
              '5fb3cf0649511ee0d' => 'Jakub Snížek',
              '64ae13ae9c887d5de' => 'Jan Vařeka',
              '6426d51b1239bfe02' => 'Jeseno Jeseno',
              '5fb3cf64242a5c856' => 'Jiří Štencel',
              '614865e053e8e7392' => 'Josef Bogar',
              '5fb3cfdc06fca7302' => 'Josef Hrabal',
              '66794e539e81a3fd5' => 'Josef Lipták',
              '5fc0faffca4f33bd3' => 'Jozef Lipták',
              '665d7abcef25ea2ae' => 'Kamila Tomášková',
              '62667d7d9bb53b237' => 'Kateryna Malovana',
              '66794b1e143b58599' => 'Ladislav Boháč',
              '66794eada04a91031' => 'Marianna Maroši',
              '665d6bbc2699ae57a' => 'Markéta Navrátilová',
              '66794eda984985d95' => 'Martin Holly',
              '5fc0faa0590b1f7a0' => 'Martin Ševčík',
              '665d63c693dc5784e' => 'Martina Tomanová',
              '665d6c35bc9741100' => 'Matěj Bartůněk',
              '5fc0fb6ce16257be4' => 'Michal Molovčák',
              '642a92617f151a2c5' => 'Miroslav Tobola',
              '663cdc147a08c0c23' => 'nemeckej testovač',
              '5fb3bd3f42a41788d' => 'Ondřej Bartošík',
              '63da22e6978766358' => 'Ondřej Flek',
              '665d6b1fdc9a5c430' => 'Ondřej Matoušek',
              '5fc0dc72d7bdf550f' => 'Romana Čtvrtlíková',
              '66794bb2345fc5915' => 'Romana Tichá',
              '609e284c189630c4a' => 'Sergij Černičko',
              '667441464fdc976fb' => 'Tereza Kalabisová',
              '626fbdef963431e1d' => 'Test Test',
              '664736e606e19599f' => 'test apertia',
              '65cf3b2d24ac9a844' => 'Jirka Apertia',
              '6645da635db9a3d1b' => 'adam apertia'
            ],
            'fromEmail' => '',
            'toEmail' => '',
            'replyToEmail' => '',
            'doNotStore' => false,
            'type' => 'sendEmail'
          ]
        ],
        'portalOnly' => false
      ]
    ],
    'SalesOrder' => [
      '6710cef0084ce25ed' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'equals',
            'subjectType' => 'value',
            'cid' => 0,
            'fieldToCompare' => 'status',
            'type' => 'all',
            'value' => 'In Production'
          ],
          1 => (object) [
            'comparison' => 'wasNotEqual',
            'subjectType' => 'value',
            'cid' => 1,
            'fieldToCompare' => 'status',
            'type' => 'all',
            'value' => 'In Production'
          ]
        ],
        'actions' => [
          0 => (object) [
            'execution' => (object) [
              'type' => 'immediately',
              'field' => false,
              'shiftDays' => 0,
              'shiftUnit' => 'days'
            ],
            'from' => 'currentUser',
            'to' => 'specifiedUsers',
            'optOutLink' => false,
            'cid' => 0,
            'id' => 'ef1kr9qw2l',
            'emailTemplateId' => '6710cea9219e5a6de',
            'emailTemplateName' => 'SalesOrderInProduction',
            'replyTo' => '',
            'toSpecifiedEntityName' => 'User',
            'toSpecifiedEntityIds' => [
              0 => '653b43792678c0604'
            ],
            'toSpecifiedEntityNames' => (object) [
              '653b43792678c0604' => 'Daniel Rycka'
            ],
            'fromEmail' => '',
            'toEmail' => '',
            'replyToEmail' => '',
            'doNotStore' => false,
            'type' => 'sendEmail'
          ]
        ],
        'portalOnly' => false
      ]
    ],
    'VacationRequest' => [
      '67164838de51f25d9' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'changed',
            'subjectType' => 'value',
            'cid' => 0,
            'fieldToCompare' => 'statusOfApproval',
            'type' => 'all'
          ]
        ],
        'conditionsAny' => [
          0 => (object) [
            'comparison' => 'equals',
            'subjectType' => 'value',
            'cid' => 1,
            'fieldToCompare' => 'statusOfApproval',
            'type' => 'any',
            'value' => 'Approved'
          ],
          1 => (object) [
            'comparison' => 'equals',
            'subjectType' => 'value',
            'cid' => 2,
            'fieldToCompare' => 'statusOfApproval',
            'type' => 'any',
            'value' => 'Rejected'
          ],
          2 => (object) [
            'comparison' => 'equals',
            'subjectType' => 'value',
            'cid' => 3,
            'fieldToCompare' => 'statusOfApproval',
            'type' => 'any',
            'value' => 'AwaitingApproval'
          ]
        ],
        'actions' => [
          0 => (object) [
            'execution' => (object) [
              'type' => 'later',
              'field' => '',
              'shiftDays' => '1',
              'shiftUnit' => 'minutes'
            ],
            'from' => 'link:humanResources.assignedUser',
            'to' => 'link:assignedUser',
            'optOutLink' => false,
            'cid' => 0,
            'id' => 'a6wg92c0l1',
            'emailTemplateId' => '60ec0d7649eecf40e',
            'emailTemplateName' => 'Dovolená - VÝSLEDEK_new',
            'replyTo' => '',
            'fromEmail' => '',
            'toEmail' => '',
            'replyToEmail' => '',
            'doNotStore' => false,
            'type' => 'sendEmail'
          ]
        ],
        'portalOnly' => false
      ]
    ]
  ]
];
