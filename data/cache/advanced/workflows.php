<?php
return [
  'scheduled' => [
    'Task' => [
      '5f3545a4605a35e64' => [
        'actions' => [
          0 => (object) [
            'fieldList' => [
              0 => 'status'
            ],
            'fields' => (object) [
              'status' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'status' => 'Archiv'
                ]
              ]
            ],
            'cid' => 0,
            'id' => 'g8ypvujq2e',
            'formula' => '',
            'type' => 'updateEntity'
          ]
        ],
        'portalOnly' => false
      ],
      '5fda160e052bbd36a' => [
        'portalOnly' => false
      ]
    ],
    'BusinessProject' => [
      '613b1fe582715d939' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'on',
            'subjectType' => 'today',
            'shiftDays' => -5,
            'cid' => 0,
            'fieldToCompare' => 'deadline',
            'type' => 'all'
          ]
        ],
        'conditionsAny' => [
          0 => (object) [
            'comparison' => 'equals',
            'subjectType' => 'value',
            'cid' => 1,
            'fieldToCompare' => 'status',
            'type' => 'any',
            'value' => 'Not Started'
          ],
          1 => (object) [
            'comparison' => 'equals',
            'subjectType' => 'value',
            'cid' => 2,
            'fieldToCompare' => 'status',
            'type' => 'any',
            'value' => 'In progress'
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
            'from' => 'system',
            'to' => 'specifiedUsers',
            'optOutLink' => false,
            'cid' => 0,
            'id' => '8bte9u8czx',
            'emailTemplateId' => '613b0bba8b267a5b8',
            'emailTemplateName' => 'Blíží se deadline zakázky',
            'replyTo' => '',
            'toSpecifiedEntityName' => 'User',
            'toSpecifiedEntityIds' => [
              0 => '5fb3d06f564288583'
            ],
            'toSpecifiedEntityNames' => (object) [
              '5fb3d06f564288583' => 'Zuzana Kalová'
            ],
            'fromEmail' => '',
            'toEmail' => '',
            'replyToEmail' => '',
            'doNotStore' => true,
            'type' => 'sendEmail'
          ]
        ],
        'portalOnly' => false
      ]
    ]
  ],
  'afterRecordUpdated' => [
    'Task' => [
      '5f636064bb9436a96' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'equals',
            'subjectType' => 'value',
            'cid' => 0,
            'fieldToCompare' => 'status',
            'type' => 'all',
            'value' => 'Completed'
          ],
          1 => (object) [
            'comparison' => 'wasNotEqual',
            'subjectType' => 'value',
            'cid' => 1,
            'fieldToCompare' => 'status',
            'type' => 'all',
            'value' => 'Completed'
          ]
        ],
        'portalOnly' => false
      ],
      '5f7c6ba6aad2ce6ab' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'equals',
            'subjectType' => 'value',
            'cid' => 0,
            'fieldToCompare' => 'status',
            'type' => 'all',
            'value' => 'Completed'
          ]
        ],
        'actions' => [
          0 => (object) [
            'execution' => (object) [
              'type' => 'later',
              'field' => '',
              'shiftDays' => '5',
              'shiftUnit' => 'minutes'
            ],
            'from' => 'system',
            'to' => 'link:parent',
            'optOutLink' => false,
            'cid' => 0,
            'id' => 'brbd922604',
            'emailTemplateId' => '5f7c6c5c765d196d8',
            'emailTemplateName' => 'Task done',
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
    'Invoice' => [
      '5f7d73497abc05b4b' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'equals',
            'subjectType' => 'value',
            'cid' => 0,
            'fieldToCompare' => 'status',
            'type' => 'all',
            'value' => 'Paid'
          ],
          1 => (object) [
            'comparison' => 'wasEqual',
            'subjectType' => 'value',
            'cid' => 1,
            'fieldToCompare' => 'status',
            'value' => 'Draft',
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
            'from' => 'system',
            'to' => 'specifiedUsers',
            'optOutLink' => false,
            'cid' => 0,
            'id' => '7sdzm6cnrm',
            'emailTemplateId' => '5f7d733eb70a11ed4',
            'emailTemplateName' => 'Paid Invoice',
            'replyTo' => '',
            'toSpecifiedEntityName' => 'User',
            'toSpecifiedEntityIds' => [
              0 => '5e0da9ddedcd8f388',
              1 => '1'
            ],
            'toSpecifiedEntityNames' => (object) [
              1 => 'David Strejc',
              '5e0da9ddedcd8f388' => 'Eva Strejcová'
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
    'Call' => [
      '5f8186c5b828229e1' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'equals',
            'cid' => 0,
            'fieldToCompare' => 'createdBy',
            'subjectType' => 'value',
            'valueName' => 'callingbot',
            'value' => '5f05dbd5abced2135',
            'type' => 'all'
          ],
          1 => (object) [
            'comparison' => 'false',
            'cid' => 1,
            'fieldToCompare' => 'isEditing',
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
            'from' => 'system',
            'to' => 'specifiedUsers',
            'optOutLink' => false,
            'cid' => 0,
            'id' => 've7itjdyb1',
            'emailTemplateId' => '5f818688149f3f092',
            'emailTemplateName' => 'Call notification',
            'replyTo' => '',
            'toSpecifiedEntityName' => 'User',
            'toSpecifiedEntityIds' => [
              0 => '5e0da9ddedcd8f388'
            ],
            'toSpecifiedEntityNames' => (object) [
              '5e0da9ddedcd8f388' => 'Eva Strejcová'
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
    'Quote' => [
      '6007eb18cbce966b5' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'equals',
            'subjectType' => 'value',
            'cid' => 0,
            'fieldToCompare' => 'status',
            'type' => 'all',
            'value' => 'Approved'
          ],
          1 => (object) [
            'comparison' => 'wasNotEqual',
            'subjectType' => 'value',
            'cid' => 1,
            'fieldToCompare' => 'status',
            'type' => 'all',
            'value' => 'Approved'
          ]
        ],
        'actions' => [
          0 => (object) [
            'link' => 'BusinessProject',
            'fieldList' => [
              0 => 'name',
              1 => 'account1',
              2 => 'status',
              3 => 'enduser',
              4 => 'billingAdress',
              5 => 'internDeadline',
              6 => 'deadline'
            ],
            'fields' => (object) [
              'name' => (object) [
                'subjectType' => 'field',
                'attributes' => (object) [],
                'field' => 'name'
              ],
              'account1' => (object) [
                'subjectType' => 'field',
                'attributes' => (object) [],
                'field' => 'account'
              ],
              'status' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'status' => 'Not Started'
                ]
              ],
              'enduser' => (object) [
                'subjectType' => 'field',
                'attributes' => (object) [],
                'field' => 'enduser'
              ],
              'billingAdress' => (object) [
                'subjectType' => 'field',
                'attributes' => (object) [],
                'field' => 'billingAddress'
              ],
              'internDeadline' => (object) [
                'subjectType' => 'today',
                'shiftDays' => '1',
                'attributes' => (object) [],
                'shiftUnit' => 'months'
              ],
              'deadline' => (object) [
                'subjectType' => 'today',
                'shiftDays' => '2',
                'attributes' => (object) [],
                'shiftUnit' => 'months'
              ]
            ],
            'cid' => 0,
            'id' => 'dhlxacic4a',
            'linkList' => [
              0 => 'quotesBusiness'
            ],
            'formula' => '',
            'entityType' => 'BusinessProject',
            'type' => 'createEntity'
          ],
          1 => (object) [
            'execution' => (object) [
              'type' => 'immediately',
              'field' => false,
              'shiftDays' => 0
            ],
            'cid' => 1,
            'id' => 'kfoazowhll',
            'recipient' => 'specifiedUsers',
            'userIdList' => [
              0 => '5fb41eec35121693c'
            ],
            'userNames' => (object) [
              '5fb41eec35121693c' => 'Barbora Valtarová'
            ],
            'whatToFollow' => 'link:businessProject',
            'specifiedTeamsIds' => [],
            'specifiedTeamsNames' => (object) [],
            'type' => 'makeFollowed'
          ]
        ],
        'portalOnly' => false
      ]
    ],
    'Opportunity' => [
      '600b1d4e1c84788fe' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'equals',
            'subjectType' => 'value',
            'cid' => 0,
            'fieldToCompare' => 'stage',
            'type' => 'all',
            'value' => 'Closed Won'
          ]
        ],
        'actions' => [
          0 => (object) [
            'link' => 'Quote',
            'fieldList' => [
              0 => 'name',
              1 => 'account',
              2 => 'specification',
              3 => 'billingAddress',
              4 => 'billingContact',
              5 => 'assignedUser',
              6 => 'dateQuoted',
              7 => 'solutionGeneral'
            ],
            'fields' => (object) [
              'name' => (object) [
                'subjectType' => 'field',
                'attributes' => (object) [],
                'field' => 'name'
              ],
              'account' => (object) [
                'subjectType' => 'field',
                'attributes' => (object) [],
                'field' => 'account'
              ],
              'specification' => (object) [
                'subjectType' => 'field',
                'attributes' => (object) [],
                'field' => 'description'
              ],
              'billingAddress' => (object) [
                'subjectType' => 'field',
                'attributes' => (object) [],
                'field' => 'account.billingAddress'
              ],
              'billingContact' => (object) [
                'subjectType' => 'field',
                'attributes' => (object) [],
                'field' => 'contact'
              ],
              'assignedUser' => (object) [
                'subjectType' => 'field',
                'attributes' => (object) [],
                'field' => 'assignedUser'
              ],
              'dateQuoted' => (object) [
                'subjectType' => 'today',
                'shiftDays' => '0',
                'attributes' => (object) [],
                'shiftUnit' => 'days'
              ],
              'solutionGeneral' => (object) [
                'subjectType' => 'field',
                'attributes' => (object) [],
                'field' => 'description'
              ]
            ],
            'cid' => 0,
            'id' => '46xf8tm6mt',
            'linkList' => [
              0 => 'opportunity'
            ],
            'formula' => '',
            'entityType' => 'Quote',
            'type' => 'createEntity'
          ]
        ],
        'portalOnly' => false
      ]
    ],
    'RequestForm' => [
      '601d3fc1a63afc78b' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'changed',
            'subjectType' => 'value',
            'cid' => 0,
            'fieldToCompare' => 'status',
            'type' => 'all'
          ]
        ],
        'conditionsAny' => [
          0 => (object) [
            'comparison' => 'equals',
            'subjectType' => 'value',
            'cid' => 1,
            'fieldToCompare' => 'status',
            'type' => 'any',
            'value' => 'Schváleno'
          ],
          1 => (object) [
            'comparison' => 'equals',
            'subjectType' => 'value',
            'cid' => 2,
            'fieldToCompare' => 'status',
            'type' => 'any',
            'value' => 'Neschváleno'
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
            'from' => 'system',
            'to' => 'link:assignedUser',
            'optOutLink' => false,
            'cid' => 0,
            'id' => 'xnz73uyf9x',
            'emailTemplateId' => '601c0c2d182e45ff9',
            'emailTemplateName' => 'Žádanka na nákup - VÝSLEDEK',
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
            'from' => 'system',
            'to' => 'specifiedUsers',
            'optOutLink' => false,
            'cid' => 1,
            'id' => 'spen19lbgj',
            'emailTemplateId' => '602fc6adbffab46a3',
            'emailTemplateName' => 'Žádanka na nákup - VÝSLEDEK - Petr Šulc',
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
            'doNotStore' => false,
            'type' => 'sendEmail'
          ]
        ],
        'portalOnly' => false
      ]
    ],
    'Lead' => [
      '6048c69296c6e9cae' => [
        'portalOnly' => false
      ]
    ],
    'UseCase' => [
      '60586682b8cd5a8b0' => [
        'conditionsAny' => [
          0 => (object) [
            'comparison' => 'notEmpty',
            'subjectType' => 'value',
            'cid' => 0,
            'fieldToCompare' => 'priceList',
            'type' => 'any'
          ]
        ],
        'actions' => [
          0 => (object) [
            'link' => 'items',
            'fieldList' => [],
            'fields' => (object) [],
            'cid' => 0,
            'id' => 'nb3t0j8itq',
            'parentEntityType' => NULL,
            'formula' => '',
            'type' => 'updateRelatedEntity'
          ],
          1 => (object) [
            'formula' => 'ifThen(
	useCase.priceList == \'A\',
	listPrice = product.priceA
);
ifThen(
	useCase.priceList == \'B\',
	listPrice = product.priceB
);
ifThen(
	useCase.priceList == \'C\',
	listPrice = product.priceC
);
ifThen(
	useCase.priceList == \'E\',
	listPrice = product.priceE
);
ifThen(
	useCase.priceList == \'R\',
	listPrice = product.rentPrice
);
unitPrice = (listPrice - listPrice*discount/100);
amount = unitPrice*quantity;
',
            'cid' => 1,
            'id' => 'ty8otyc7uw',
            'type' => 'executeFormula'
          ]
        ],
        'portalOnly' => false
      ]
    ],
    'BusinessProject' => [
      '605b29822f60eeb81' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'equals',
            'subjectType' => 'value',
            'cid' => 0,
            'fieldToCompare' => 'status',
            'type' => 'all',
            'value' => 'Returned'
          ],
          1 => (object) [
            'comparison' => 'true',
            'cid' => 1,
            'fieldToCompare' => 'qualityReport',
            'type' => 'all'
          ],
          2 => (object) [
            'comparison' => 'changed',
            'subjectType' => 'value',
            'cid' => 2,
            'fieldToCompare' => 'status',
            'type' => 'all'
          ]
        ],
        'actions' => [
          0 => (object) [
            'link' => 'qualityReports',
            'fieldList' => [
              0 => 'account'
            ],
            'fields' => (object) [
              'account' => (object) [
                'subjectType' => 'field',
                'attributes' => (object) [],
                'field' => 'account1'
              ]
            ],
            'cid' => 0,
            'id' => '7dg38b1bo9',
            'linkList' => [],
            'formula' => '',
            'type' => 'createRelatedEntity'
          ],
          1 => (object) [
            'link' => 'qualityReports',
            'fieldList' => [
              0 => 'name'
            ],
            'fields' => (object) [
              'name' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'name' => '8DR'
                ]
              ]
            ],
            'cid' => 2,
            'id' => 'pw43tbmyxi',
            'parentEntityType' => NULL,
            'formula' => '',
            'type' => 'updateRelatedEntity'
          ]
        ],
        'portalOnly' => false
      ],
      '607414ead447afd9c' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'true',
            'cid' => 0,
            'fieldToCompare' => 'parcelService',
            'type' => 'all'
          ],
          1 => (object) [
            'comparison' => 'notEmpty',
            'cid' => 1,
            'fieldToCompare' => 'account2',
            'type' => 'all'
          ],
          2 => (object) [
            'comparison' => 'isEmpty',
            'cid' => 2,
            'fieldToCompare' => 'shippingAddressStreet',
            'type' => 'all'
          ],
          3 => (object) [
            'comparison' => 'isEmpty',
            'subjectType' => 'value',
            'cid' => 3,
            'fieldToCompare' => 'shippingAddressCity',
            'type' => 'all'
          ],
          4 => (object) [
            'comparison' => 'isEmpty',
            'subjectType' => 'value',
            'cid' => 4,
            'fieldToCompare' => 'shippingAddressPostalCode',
            'type' => 'all'
          ]
        ],
        'actions' => [
          0 => (object) [
            'fieldList' => [
              0 => 'shippingAddress'
            ],
            'fields' => (object) [
              'shippingAddress' => (object) [
                'subjectType' => 'field',
                'attributes' => (object) [],
                'field' => 'account2.shippingAddress'
              ]
            ],
            'cid' => 0,
            'id' => '5cffyjfgau',
            'formula' => '',
            'type' => 'updateEntity'
          ]
        ],
        'portalOnly' => false
      ],
      '60754190e5e38f0c1' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'notEmpty',
            'cid' => 0,
            'fieldToCompare' => 'account1',
            'type' => 'all'
          ],
          1 => (object) [
            'comparison' => 'changed',
            'cid' => 1,
            'fieldToCompare' => 'parentOrganization',
            'type' => 'all'
          ]
        ],
        'actions' => [
          0 => (object) [
            'fieldList' => [
              0 => 'billingAdress'
            ],
            'fields' => (object) [
              'billingAdress' => (object) [
                'subjectType' => 'field',
                'attributes' => (object) [],
                'field' => 'account1.billingAddress'
              ]
            ],
            'cid' => 0,
            'id' => '5oyiizf7jd',
            'formula' => '',
            'type' => 'updateEntity'
          ]
        ],
        'portalOnly' => false
      ],
      '611522c298ec23f84' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'equals',
            'subjectType' => 'value',
            'cid' => 0,
            'fieldToCompare' => 'status',
            'type' => 'all',
            'value' => 'In progress'
          ],
          1 => (object) [
            'comparison' => 'wasNotEqual',
            'subjectType' => 'value',
            'cid' => 1,
            'fieldToCompare' => 'status',
            'type' => 'all',
            'value' => 'In progress'
          ]
        ],
        'actions' => [
          0 => (object) [
            'link' => 'manufacturings',
            'fieldList' => [
              0 => 'status'
            ],
            'fields' => (object) [
              'status' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'status' => 'ToDo'
                ]
              ]
            ],
            'cid' => 1,
            'id' => '895m1rctbl',
            'parentEntityType' => NULL,
            'formula' => '',
            'type' => 'updateRelatedEntity'
          ]
        ],
        'portalOnly' => false
      ],
      '61152a083283abf75' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'equals',
            'subjectType' => 'value',
            'cid' => 0,
            'fieldToCompare' => 'status',
            'type' => 'all',
            'value' => 'Returned'
          ],
          1 => (object) [
            'comparison' => 'wasNotEqual',
            'subjectType' => 'value',
            'cid' => 1,
            'fieldToCompare' => 'status',
            'type' => 'all',
            'value' => 'Returned'
          ]
        ],
        'actions' => [
          0 => (object) [
            'link' => 'Manufacturing',
            'fieldList' => [
              0 => 'deadline',
              1 => 'description',
              2 => 'isComplaint',
              3 => 'complaintBanner',
              4 => 'status',
              5 => 'assignedUser'
            ],
            'fields' => (object) [
              'deadline' => (object) [
                'subjectType' => 'today',
                'shiftDays' => -7,
                'attributes' => (object) [],
                'shiftUnit' => 'days',
                'field' => 'deadline'
              ],
              'description' => (object) [
                'subjectType' => 'field',
                'attributes' => (object) [],
                'field' => 'description'
              ],
              'isComplaint' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'isComplaint' => true
                ]
              ],
              'complaintBanner' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'complaintBanner' => 'Complaint'
                ]
              ],
              'status' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'status' => 'ToDo'
                ]
              ],
              'assignedUser' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'assignedUserName' => 'Miloslav Krejčí',
                  'assignedUserId' => '5fb3d11f4b9995a53'
                ]
              ]
            ],
            'cid' => 0,
            'id' => 'nzqyoilw82',
            'linkList' => [
              0 => 'businessProject'
            ],
            'formula' => 'name = string\\concatenate("R-", targetEntity\\attribute(\'bOnumber\'), ": ", targetEntity\\attribute(\'name\'));',
            'entityType' => 'Manufacturing',
            'type' => 'createEntity'
          ],
          1 => (object) [
            'execution' => (object) [
              'type' => 'immediately',
              'field' => false,
              'shiftDays' => 0
            ],
            'cid' => 1,
            'id' => 'ewhl6r9apn',
            'recipient' => 'specifiedUsers',
            'userIdList' => [
              0 => '6113b60cce4aefac9'
            ],
            'userNames' => (object) [
              '6113b60cce4aefac9' => 'Vyroba ALIS'
            ],
            'whatToFollow' => 'targetEntity',
            'specifiedTeamsIds' => [],
            'specifiedTeamsNames' => (object) [],
            'type' => 'makeFollowed'
          ]
        ],
        'portalOnly' => false
      ],
      '6116545742b906917' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'equals',
            'subjectType' => 'value',
            'cid' => 0,
            'fieldToCompare' => 'status',
            'type' => 'all',
            'value' => 'Finished'
          ],
          1 => (object) [
            'comparison' => 'wasNotEqual',
            'subjectType' => 'value',
            'cid' => 1,
            'fieldToCompare' => 'status',
            'type' => 'all',
            'value' => 'Finished'
          ]
        ],
        'actions' => [
          0 => (object) [
            'fieldList' => [
              0 => 'endDate'
            ],
            'fields' => (object) [
              'endDate' => (object) [
                'subjectType' => 'today',
                'shiftDays' => '0',
                'attributes' => (object) [],
                'shiftUnit' => 'days'
              ]
            ],
            'cid' => 0,
            'id' => '7upsogjjmu',
            'formula' => '',
            'type' => 'updateEntity'
          ]
        ],
        'portalOnly' => false
      ],
      '611a2538587bc00ca' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'equals',
            'subjectType' => 'value',
            'cid' => 0,
            'fieldToCompare' => 'status',
            'type' => 'all',
            'value' => 'Invoice'
          ],
          1 => (object) [
            'comparison' => 'wasNotEqual',
            'subjectType' => 'value',
            'cid' => 1,
            'fieldToCompare' => 'status',
            'type' => 'all',
            'value' => 'Invoice'
          ]
        ],
        'actions' => [
          0 => (object) [
            'execution' => (object) [
              'type' => 'immediately',
              'field' => false,
              'shiftDays' => 0
            ],
            'cid' => 0,
            'id' => 'g0u9w9fyjx',
            'recipient' => 'specifiedUsers',
            'userIdList' => [
              0 => '5fb41e0e495069151',
              1 => '614865e053e8e7392'
            ],
            'userNames' => (object) [
              '5fb41e0e495069151' => 'Petr Šulc',
              '614865e053e8e7392' => 'Josef Bogar'
            ],
            'whatToFollow' => 'targetEntity',
            'specifiedTeamsIds' => [],
            'specifiedTeamsNames' => (object) [],
            'type' => 'makeFollowed'
          ],
          1 => (object) [
            'execution' => (object) [
              'type' => 'immediately',
              'field' => false,
              'shiftDays' => 0,
              'shiftUnit' => 'days'
            ],
            'from' => 'system',
            'to' => 'specifiedUsers',
            'optOutLink' => false,
            'cid' => 1,
            'id' => 'vajhtv268g',
            'emailTemplateId' => '611a25e3ce6aa4fa5',
            'emailTemplateName' => 'Fakturování zakázky',
            'replyTo' => '',
            'toSpecifiedEntityName' => 'User',
            'toSpecifiedEntityIds' => [
              0 => '5fb41e0e495069151',
              1 => '614865e053e8e7392'
            ],
            'toSpecifiedEntityNames' => (object) [
              '5fb41e0e495069151' => 'Petr Šulc',
              '614865e053e8e7392' => 'Josef Bogar'
            ],
            'fromEmail' => '',
            'toEmail' => '',
            'replyToEmail' => '',
            'doNotStore' => true,
            'type' => 'sendEmail'
          ]
        ],
        'portalOnly' => false
      ],
      '62397d1da5dab4a9c' => [
        'conditionsAny' => [
          0 => (object) [
            'comparison' => 'equals',
            'subjectType' => 'value',
            'cid' => 0,
            'fieldToCompare' => 'status',
            'type' => 'any',
            'value' => 'Invoice'
          ],
          1 => (object) [
            'comparison' => 'equals',
            'subjectType' => 'value',
            'cid' => 1,
            'fieldToCompare' => 'status',
            'type' => 'any',
            'value' => 'Finished'
          ],
          2 => (object) [
            'comparison' => 'equals',
            'subjectType' => 'value',
            'cid' => 2,
            'fieldToCompare' => 'status',
            'type' => 'any',
            'value' => 'Returned'
          ],
          3 => (object) [
            'comparison' => 'equals',
            'subjectType' => 'value',
            'cid' => 3,
            'fieldToCompare' => 'status',
            'type' => 'any',
            'value' => 'Zapujcka'
          ]
        ],
        'actions' => [
          0 => (object) [
            'link' => 'productDatabases1',
            'fieldList' => [
              0 => 'productAvailability'
            ],
            'fields' => (object) [
              'productAvailability' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'productAvailability' => 'sent'
                ]
              ]
            ],
            'cid' => 1,
            'id' => 'lpfqsm3hlk',
            'parentEntityType' => NULL,
            'formula' => '',
            'type' => 'updateRelatedEntity'
          ]
        ],
        'portalOnly' => false
      ],
      '629f2613a7bd368a2' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'changed',
            'subjectType' => 'today',
            'shiftDays' => 0,
            'cid' => 0,
            'fieldToCompare' => 'internDeadline',
            'type' => 'all'
          ]
        ],
        'actions' => [
          0 => (object) [
            'link' => 'manufacturings',
            'fieldList' => [
              0 => 'deadline'
            ],
            'fields' => (object) [
              'deadline' => (object) [
                'subjectType' => 'field',
                'shiftDays' => '0',
                'attributes' => (object) [],
                'shiftUnit' => 'days',
                'field' => 'internDeadline'
              ]
            ],
            'cid' => 0,
            'id' => 'at9erd776o',
            'parentEntityType' => NULL,
            'formula' => '',
            'type' => 'updateRelatedEntity'
          ]
        ],
        'portalOnly' => false
      ],
      '632d8a834a292f5b8' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'equals',
            'subjectType' => 'value',
            'cid' => 0,
            'fieldToCompare' => 'status',
            'type' => 'all',
            'value' => 'Cancelled'
          ],
          1 => (object) [
            'comparison' => 'wasNotEqual',
            'subjectType' => 'value',
            'cid' => 1,
            'fieldToCompare' => 'status',
            'type' => 'all',
            'value' => 'Cancelled'
          ]
        ],
        'actions' => [
          0 => (object) [
            'link' => 'manufacturings',
            'fieldList' => [
              0 => 'status'
            ],
            'fields' => (object) [
              'status' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'status' => 'Archive'
                ]
              ]
            ],
            'cid' => 0,
            'id' => 'su141a4kxk',
            'parentEntityType' => NULL,
            'formula' => '',
            'type' => 'updateRelatedEntity'
          ]
        ],
        'portalOnly' => false
      ],
      '63ecd4a0c22a37a5c' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'equals',
            'subjectType' => 'value',
            'cid' => 0,
            'fieldToCompare' => 'status',
            'type' => 'all',
            'value' => 'Not Started'
          ],
          1 => (object) [
            'comparison' => 'wasEqual',
            'subjectType' => 'value',
            'cid' => 1,
            'fieldToCompare' => 'status',
            'type' => 'all',
            'value' => 'Submitted'
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
            'from' => 'system',
            'to' => 'specifiedUsers',
            'optOutLink' => false,
            'cid' => 0,
            'id' => 'jnrz1gb7oz',
            'emailTemplateId' => '63ecd43051c840e18',
            'emailTemplateName' => 'Zakázka - předloženo -> nezahájeno',
            'replyTo' => '',
            'toSpecifiedEntityName' => 'User',
            'toSpecifiedEntityIds' => [
              0 => '62667d7d9bb53b237',
              1 => '619cde729792efe6a'
            ],
            'toSpecifiedEntityNames' => (object) [
              '62667d7d9bb53b237' => 'Kateryna Malovana',
              '619cde729792efe6a' => 'Helena Svobodová'
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
    'Components' => [
      '609e301b07e4e7494' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'lessThan',
            'subjectType' => 'field',
            'cid' => 1,
            'fieldToCompare' => 'stock',
            'type' => 'all',
            'subject' => 'minSklad',
            'field' => 'minSklad'
          ]
        ],
        'actions' => [
          0 => (object) [
            'fieldList' => [
              0 => 'skladem'
            ],
            'fields' => (object) [
              'skladem' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'skladem' => 'less'
                ]
              ]
            ],
            'cid' => 0,
            'id' => '4bmkekwgi9',
            'formula' => '',
            'type' => 'updateEntity'
          ]
        ],
        'portalOnly' => false
      ],
      '609e3051ca3fb7933' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'greaterThanOrEquals',
            'subjectType' => 'field',
            'cid' => 0,
            'fieldToCompare' => 'stock',
            'type' => 'all',
            'subject' => 'minSklad',
            'field' => 'minSklad'
          ],
          1 => (object) [
            'comparison' => 'notEmpty',
            'subjectType' => 'value',
            'cid' => 1,
            'fieldToCompare' => 'minSklad',
            'type' => 'all'
          ],
          2 => (object) [
            'comparison' => 'notEquals',
            'subjectType' => 'value',
            'cid' => 2,
            'fieldToCompare' => 'minSklad',
            'type' => 'all',
            'subject' => '-',
            'value' => NULL
          ]
        ],
        'actions' => [
          0 => (object) [
            'fieldList' => [
              0 => 'skladem'
            ],
            'fields' => (object) [
              'skladem' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'skladem' => 'more'
                ]
              ]
            ],
            'cid' => 0,
            'id' => '4bmkekwgi9',
            'formula' => '',
            'type' => 'updateEntity'
          ]
        ],
        'portalOnly' => false
      ],
      '60eec764766ab8534' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'lessThan',
            'subjectType' => 'field',
            'cid' => 1,
            'fieldToCompare' => 'stock',
            'type' => 'all',
            'subject' => 'minSklad',
            'field' => 'minSklad'
          ]
        ],
        'actions' => [
          0 => (object) [
            'fieldList' => [
              0 => 'skladem'
            ],
            'fields' => (object) [
              'skladem' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'skladem' => 'less'
                ]
              ]
            ],
            'cid' => 0,
            'id' => 'ixnd59lphi',
            'formula' => '',
            'type' => 'updateEntity'
          ]
        ],
        'portalOnly' => false
      ],
      '60eec799b0b8de3d9' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'greaterThanOrEquals',
            'subjectType' => 'field',
            'cid' => 0,
            'fieldToCompare' => 'stock',
            'type' => 'all',
            'subject' => 'minSklad',
            'field' => 'minSklad'
          ],
          1 => (object) [
            'comparison' => 'notEquals',
            'subjectType' => 'value',
            'cid' => 1,
            'fieldToCompare' => 'stock',
            'type' => 'all',
            'value' => NULL
          ],
          2 => (object) [
            'comparison' => 'notEmpty',
            'subjectType' => 'value',
            'cid' => 2,
            'fieldToCompare' => 'minSklad',
            'type' => 'all'
          ]
        ],
        'actions' => [
          0 => (object) [
            'fieldList' => [
              0 => 'skladem'
            ],
            'fields' => (object) [
              'skladem' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'skladem' => 'more'
                ]
              ]
            ],
            'cid' => 0,
            'id' => 'ixnd59lphi',
            'formula' => '',
            'type' => 'updateEntity'
          ]
        ],
        'portalOnly' => false
      ]
    ],
    'Absence' => [
      '60ec0ec41200b70b2' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'changed',
            'subjectType' => 'value',
            'cid' => 0,
            'fieldToCompare' => 'approved',
            'type' => 'all'
          ]
        ],
        'conditionsAny' => [
          0 => (object) [
            'comparison' => 'equals',
            'subjectType' => 'value',
            'cid' => 1,
            'fieldToCompare' => 'approved',
            'type' => 'any',
            'value' => 'approved'
          ],
          1 => (object) [
            'comparison' => 'equals',
            'subjectType' => 'value',
            'cid' => 2,
            'fieldToCompare' => 'approved',
            'type' => 'any',
            'value' => 'declined'
          ]
        ],
        'actions' => [
          0 => (object) [
            'execution' => (object) [
              'type' => 'later',
              'field' => '',
              'shiftDays' => '3',
              'shiftUnit' => 'minutes'
            ],
            'from' => 'system',
            'to' => 'link:assignedUser',
            'optOutLink' => false,
            'cid' => 0,
            'id' => '0keqo69hbm',
            'emailTemplateId' => '60ec0d7649eecf40e',
            'emailTemplateName' => 'Dovolená - VÝSLEDEK',
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
      '60ec1b1fef143990d' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'equals',
            'subjectType' => 'value',
            'cid' => 0,
            'fieldToCompare' => 'approved',
            'type' => 'all',
            'value' => 'declined'
          ]
        ],
        'actions' => [
          0 => (object) [
            'fieldList' => [
              0 => 'status'
            ],
            'fields' => (object) [
              'status' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'status' => 'Not Held'
                ]
              ]
            ],
            'cid' => 0,
            'id' => '4pruhdg01n',
            'formula' => '',
            'type' => 'updateEntity'
          ]
        ],
        'portalOnly' => false
      ],
      '6141ab845f3b88fdb' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'equals',
            'subjectType' => 'value',
            'cid' => 0,
            'fieldToCompare' => 'approved',
            'type' => 'all',
            'value' => 'approved'
          ],
          1 => (object) [
            'comparison' => 'wasNotEqual',
            'subjectType' => 'value',
            'cid' => 1,
            'fieldToCompare' => 'approved',
            'type' => 'all',
            'value' => 'approved'
          ]
        ],
        'actions' => [
          0 => (object) [
            'formula' => '$remaining = assignedUser.daysOff;
assignedUser.daysOff = $remaining - hours;',
            'cid' => 0,
            'id' => '07ypgvhqx3',
            'type' => 'executeFormula'
          ]
        ],
        'portalOnly' => false
      ]
    ],
    'Manufacturing' => [
      '61162fe8922ee1bdb' => [
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
            'comparison' => 'wasNotEqual',
            'subjectType' => 'value',
            'cid' => 1,
            'fieldToCompare' => 'status',
            'type' => 'all',
            'value' => 'Done'
          ]
        ],
        'actions' => [
          0 => (object) [
            'link' => 'businessProject',
            'fieldList' => [
              0 => 'status',
              1 => 'manufacturingReady'
            ],
            'fields' => (object) [
              'status' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'status' => 'To Install'
                ]
              ],
              'manufacturingReady' => (object) [
                'subjectType' => 'today',
                'shiftDays' => '0',
                'attributes' => (object) [],
                'shiftUnit' => 'days'
              ]
            ],
            'cid' => 0,
            'id' => 'd7zcxjrfa6',
            'parentEntityType' => NULL,
            'formula' => '',
            'type' => 'updateRelatedEntity'
          ],
          1 => (object) [
            'execution' => (object) [
              'type' => 'immediately',
              'field' => false,
              'shiftDays' => 0,
              'shiftUnit' => 'days'
            ],
            'from' => 'link:modifiedBy',
            'to' => 'specifiedUsers',
            'optOutLink' => false,
            'cid' => 1,
            'id' => '91bpk54rfp',
            'emailTemplateId' => '6116514d5fbc16b8e',
            'emailTemplateName' => 'Výroba zakázky dokončena',
            'replyTo' => '',
            'toSpecifiedEntityName' => 'User',
            'toSpecifiedEntityIds' => [
              0 => '5fb41eec35121693c',
              1 => '614865e053e8e7392',
              2 => '5fb3cfdc06fca7302'
            ],
            'toSpecifiedEntityNames' => (object) [
              '5fb41eec35121693c' => 'Barbora Valtarová',
              '614865e053e8e7392' => 'Josef Bogar',
              '5fb3cfdc06fca7302' => 'Josef Hrabal'
            ],
            'fromEmail' => '',
            'toEmail' => '',
            'replyToEmail' => '',
            'doNotStore' => true,
            'type' => 'sendEmail'
          ],
          2 => (object) [
            'fieldList' => [
              0 => 'manufacturingFinished',
              1 => 'progress'
            ],
            'fields' => (object) [
              'manufacturingFinished' => (object) [
                'subjectType' => 'today',
                'shiftDays' => '0',
                'attributes' => (object) [],
                'shiftUnit' => 'days'
              ],
              'progress' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'progress' => '100'
                ]
              ]
            ],
            'cid' => 2,
            'id' => 'rmruzj1y95',
            'formula' => '',
            'type' => 'updateEntity'
          ],
          3 => (object) [
            'execution' => (object) [
              'type' => 'immediately',
              'field' => false,
              'shiftDays' => 0,
              'shiftUnit' => 'days'
            ],
            'cid' => 3,
            'id' => 'u2nefe83oy',
            'workflowId' => '61556bd09c3b384bd',
            'workflowName' => 'Přidání labelu Vyřízená reklamace',
            'target' => NULL,
            'type' => 'triggerWorkflow'
          ]
        ],
        'portalOnly' => false
      ],
      '61d2dd53d44a35efe' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'notEquals',
            'subjectType' => 'value',
            'cid' => 0,
            'fieldToCompare' => 'status',
            'type' => 'all',
            'value' => 'OnHold'
          ],
          1 => (object) [
            'comparison' => 'wasEqual',
            'subjectType' => 'value',
            'cid' => 1,
            'fieldToCompare' => 'status',
            'type' => 'all',
            'value' => 'OnHold'
          ]
        ],
        'actions' => [
          0 => (object) [
            'fieldList' => [
              0 => 'manufacturingBanner'
            ],
            'fields' => (object) [
              'manufacturingBanner' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'manufacturingBanner' => '-'
                ]
              ]
            ],
            'cid' => 0,
            'id' => 'wkuky1buuv',
            'formula' => '',
            'type' => 'updateEntity'
          ]
        ],
        'portalOnly' => false
      ],
      '626fc178102fdbbb2' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'equals',
            'subjectType' => 'value',
            'cid' => 0,
            'fieldToCompare' => 'status',
            'type' => 'all',
            'value' => 'Testing'
          ],
          1 => (object) [
            'comparison' => 'wasNotEqual',
            'subjectType' => 'value',
            'cid' => 1,
            'fieldToCompare' => 'status',
            'type' => 'all',
            'value' => 'Testing'
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
            'from' => 'link:modifiedBy',
            'to' => 'specifiedUsers',
            'optOutLink' => false,
            'cid' => 0,
            'id' => 'p97f66bv05',
            'emailTemplateId' => '626fc02fa39421836',
            'emailTemplateName' => 'Zakázky - Testování',
            'replyTo' => '',
            'toSpecifiedEntityName' => 'User',
            'toSpecifiedEntityIds' => [
              0 => '6246fa166a2cc458b'
            ],
            'toSpecifiedEntityNames' => (object) [
              '6246fa166a2cc458b' => 'Ondřej Sukup'
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
    'Account' => [
      '618e33b4cc1a95185' => [
        'actions' => [
          0 => (object) [
            'link' => 'contacts',
            'fieldList' => [
              0 => 'partner',
              1 => 'endUser',
              2 => 'category'
            ],
            'fields' => (object) [
              'partner' => (object) [
                'subjectType' => 'field',
                'attributes' => (object) [],
                'field' => 'partner'
              ],
              'endUser' => (object) [
                'subjectType' => 'field',
                'attributes' => (object) [],
                'field' => 'enduser'
              ],
              'category' => (object) [
                'subjectType' => 'field',
                'attributes' => (object) [],
                'field' => 'category'
              ]
            ],
            'cid' => 0,
            'id' => '4a7nkbuyp8',
            'parentEntityType' => NULL,
            'formula' => 'partner = account.partner;
endUser = account.enduser;
category = account.category;',
            'type' => 'updateRelatedEntity'
          ]
        ],
        'portalOnly' => false
      ]
    ],
    'ProductDatabase' => [
      '61dd78970d727edcf' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'isEmpty',
            'cid' => 0,
            'fieldToCompare' => 'product12',
            'type' => 'all'
          ],
          1 => (object) [
            'comparison' => 'notEmpty',
            'cid' => 1,
            'fieldToCompare' => 'components',
            'type' => 'all'
          ]
        ],
        'actions' => [
          0 => (object) [
            'fieldList' => [],
            'fields' => (object) [],
            'cid' => 0,
            'id' => 'ld2b722syj',
            'formula' => 'productCode = components.componentCode;',
            'type' => 'updateEntity'
          ]
        ],
        'portalOnly' => false
      ],
      '62f5044e178f78285' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'true',
            'cid' => 0,
            'fieldToCompare' => 'print',
            'type' => 'all'
          ]
        ],
        'actions' => [
          0 => (object) [
            'requestType' => 'PATCH',
            'contentType' => 'application/json',
            'content' => '{"name": "thisIsAFileNameUploadedViaOsmoCRM"}',
            'requestUrl' => 'https://www.googleapis.com/drive/v3/files/1GK2fp5Hv6qNyjwiA7BEbxxHhK2jdOZ1O?key=AIzaSyC-FtjPjDp1y3CGWKAycbrRZJBS99uXogo',
            'headers' => [
              0 => 'Accept: application/json',
              1 => 'Content-Type: application/json',
              2 => 'Authorization: Bearer ya29.A0AVA9y1tQxwIVOBZuDmd6tm1HN4efSbgNNroUpCK5x62p_1MRhlKtgNY8few3UoS8a0t1uTDEXOiXfdvHQXUoxUSQEr_9K7Z--nWgG6JaD8Oe_cYx_KvRRjXxft_FiR71YT_iyJ4jYNbJd_ihsaUnbqVlmXp-HAaCgYKATASATASFQE65dr8mAgET7FpdYHIIbpBLkHckA0165'
            ],
            'cid' => 0,
            'id' => 'q2qryt8qdu',
            'type' => 'sendRequest'
          ]
        ],
        'portalOnly' => false
      ]
    ],
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
    ]
  ],
  'afterRecordCreated' => [
    'Task' => [
      '5f7dd4b7c5e3442ce' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'notEmpty',
            'cid' => 0,
            'fieldToCompare' => 'parent',
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
            'from' => 'system',
            'to' => 'link:parent',
            'optOutLink' => false,
            'cid' => 0,
            'id' => '4sdklzf7ki',
            'emailTemplateId' => '5f7dd49d9d51667cd',
            'emailTemplateName' => 'Task notify parent',
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
      '5f871a2c4aedfc3ff' => [
        'conditionsFormula' => 'entity\\attribute(\'emailId\') != NULL',
        'portalOnly' => false
      ]
    ],
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
      ],
      '602fbf77bc78a0160' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'equals',
            'subjectType' => 'value',
            'cid' => 0,
            'fieldToCompare' => 'status',
            'type' => 'all',
            'value' => 'Čeká na schválení'
          ]
        ],
        'conditionsAny' => [
          0 => (object) [
            'comparison' => 'equals',
            'subjectType' => 'value',
            'cid' => 2,
            'fieldToCompare' => 'druh',
            'type' => 'any',
            'value' => 'Režijní'
          ],
          1 => (object) [
            'comparison' => 'equals',
            'subjectType' => 'value',
            'cid' => 3,
            'fieldToCompare' => 'druh',
            'type' => 'any',
            'value' => 'Ostatní'
          ],
          2 => (object) [
            'comparison' => 'equals',
            'subjectType' => 'value',
            'cid' => 4,
            'fieldToCompare' => 'amount',
            'type' => 'any',
            'subject' => '1250',
            'value' => 1250
          ],
          3 => (object) [
            'comparison' => 'isEmpty',
            'subjectType' => 'value',
            'cid' => 5,
            'fieldToCompare' => 'amount',
            'type' => 'any'
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
            'id' => 'xwqe6b9qhe',
            'emailTemplateId' => '601c08339d133fed2',
            'emailTemplateName' => 'Žádanka na nákup - KE SCHVÁLENÍ',
            'replyTo' => '',
            'toSpecifiedEntityName' => 'User',
            'toSpecifiedEntityIds' => [
              0 => '614865e053e8e7392',
              1 => '619cde729792efe6a'
            ],
            'toSpecifiedEntityNames' => (object) [
              '614865e053e8e7392' => 'Josef Bogar',
              '619cde729792efe6a' => 'Helena Svobodová'
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
            'cid' => 1,
            'id' => '92t0501ipd',
            'formula' => '',
            'type' => 'updateEntity'
          ]
        ],
        'portalOnly' => false
      ],
      '602fc02fa335ba789' => [
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
            'value' => 'Výroba'
          ],
          2 => (object) [
            'comparison' => 'greaterThan',
            'subjectType' => 'value',
            'cid' => 2,
            'fieldToCompare' => 'amount',
            'type' => 'all',
            'subject' => '4167',
            'value' => 4167
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
            'id' => 't7ve4wl6fo',
            'emailTemplateId' => '601c08339d133fed2',
            'emailTemplateName' => 'Žádanka na nákup - KE SCHVÁLENÍ',
            'replyTo' => '',
            'toSpecifiedEntityName' => 'User',
            'toSpecifiedEntityIds' => [
              0 => '614865e053e8e7392'
            ],
            'toSpecifiedEntityNames' => (object) [
              '614865e053e8e7392' => 'Josef Bogar'
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
            'cid' => 1,
            'id' => 'jaewu1zl6x',
            'formula' => '',
            'type' => 'updateEntity'
          ]
        ],
        'portalOnly' => false
      ],
      '602fc274de8a755f0' => [
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
            'value' => 'Výroba'
          ]
        ],
        'conditionsAny' => [
          0 => (object) [
            'comparison' => 'lessThanOrEquals',
            'subjectType' => 'value',
            'cid' => 3,
            'fieldToCompare' => 'amount',
            'type' => 'any',
            'subject' => '4167',
            'value' => 4167
          ],
          1 => (object) [
            'comparison' => 'isEmpty',
            'subjectType' => 'value',
            'cid' => 4,
            'fieldToCompare' => 'amount',
            'type' => 'any'
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
            'id' => '6t9t0hcwlx',
            'emailTemplateId' => '601c08339d133fed2',
            'emailTemplateName' => 'Žádanka na nákup - KE SCHVÁLENÍ',
            'replyTo' => '',
            'toSpecifiedEntityName' => 'User',
            'toSpecifiedEntityIds' => [
              0 => '614865e053e8e7392',
              1 => '619cde729792efe6a'
            ],
            'toSpecifiedEntityNames' => (object) [
              '614865e053e8e7392' => 'Josef Bogar',
              '619cde729792efe6a' => 'Helena Svobodová'
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
            'cid' => 1,
            'id' => 'urjxiom571',
            'formula' => '',
            'type' => 'updateEntity'
          ]
        ],
        'portalOnly' => false
      ],
      '6034e416c2ef7b2dd' => [
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
            'comparison' => 'greaterThan',
            'subjectType' => 'value',
            'cid' => 1,
            'fieldToCompare' => 'amount',
            'type' => 'all',
            'subject' => '1250',
            'value' => 1250
          ]
        ],
        'conditionsAny' => [
          0 => (object) [
            'comparison' => 'equals',
            'subjectType' => 'value',
            'cid' => 2,
            'fieldToCompare' => 'druh',
            'type' => 'any',
            'value' => 'Režijní'
          ],
          1 => (object) [
            'comparison' => 'equals',
            'subjectType' => 'value',
            'cid' => 3,
            'fieldToCompare' => 'druh',
            'type' => 'any',
            'value' => 'Ostatní'
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
            'id' => 'xwqe6b9qhe',
            'emailTemplateId' => '601c08339d133fed2',
            'emailTemplateName' => 'Žádanka na nákup - KE SCHVÁLENÍ',
            'replyTo' => '',
            'toSpecifiedEntityName' => 'User',
            'toSpecifiedEntityIds' => [
              0 => '5fb3cf0649511ee0d',
              1 => '614865e053e8e7392',
              2 => '619cde729792efe6a'
            ],
            'toSpecifiedEntityNames' => (object) [
              '5fb3cf0649511ee0d' => 'Jakub Snížek',
              '614865e053e8e7392' => 'Josef Bogar',
              '619cde729792efe6a' => 'Helena Svobodová'
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
            'cid' => 1,
            'id' => '06wm1ch9va',
            'formula' => '',
            'type' => 'updateEntity'
          ]
        ],
        'portalOnly' => false
      ]
    ],
    'QualityReport' => [
      '6078112fb2b32086f' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'isEmpty',
            'subjectType' => 'value',
            'cid' => 0,
            'fieldToCompare' => 'name',
            'type' => 'all'
          ]
        ],
        'actions' => [
          0 => (object) [
            'fieldList' => [
              0 => 'name'
            ],
            'fields' => (object) [
              'name' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'name' => '8D'
                ]
              ]
            ],
            'cid' => 0,
            'id' => '03vlsq0t8u',
            'formula' => '',
            'type' => 'updateEntity'
          ]
        ],
        'portalOnly' => false
      ]
    ],
    'Absence' => [
      '60ec0bd03bb501a7c' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'equals',
            'subjectType' => 'value',
            'cid' => 0,
            'fieldToCompare' => 'approved',
            'type' => 'all',
            'value' => 'waiting'
          ],
          1 => (object) [
            'comparison' => 'wasNotEqual',
            'subjectType' => 'value',
            'cid' => 2,
            'fieldToCompare' => 'approved',
            'type' => 'all',
            'value' => 'waiting'
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
            'id' => 'wyyldcp2wb',
            'emailTemplateId' => '60ec0b818c8e1dfb7',
            'emailTemplateName' => 'Dovolená - KE SCHVÁLENÍ',
            'replyTo' => '',
            'toSpecifiedEntityName' => 'User',
            'toSpecifiedEntityIds' => [
              0 => '642a92617f151a2c5',
              1 => '5fb3d0be8bf0b7c8b'
            ],
            'toSpecifiedEntityNames' => (object) [
              '642a92617f151a2c5' => 'Miroslav Tobola',
              '5fb3d0be8bf0b7c8b' => 'Jiří Krejčí'
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
    'BusinessProject' => [
      '611a2227aa322a253' => [
        'actions' => [
          0 => (object) [
            'execution' => (object) [
              'type' => 'immediately',
              'field' => false,
              'shiftDays' => 0
            ],
            'cid' => 0,
            'id' => '4mdofm2wpb',
            'recipient' => 'specifiedUsers',
            'userIdList' => [
              0 => '6113b60cce4aefac9',
              1 => '5fb41eec35121693c'
            ],
            'userNames' => (object) [
              '6113b60cce4aefac9' => 'Vyroba ALIS',
              '5fb41eec35121693c' => 'Barbora Valtarová'
            ],
            'whatToFollow' => 'targetEntity',
            'specifiedTeamsIds' => [],
            'specifiedTeamsNames' => (object) [],
            'type' => 'makeFollowed'
          ],
          1 => (object) [
            'execution' => (object) [
              'type' => 'immediately',
              'field' => false,
              'shiftDays' => 0
            ],
            'cid' => 1,
            'id' => 'zxwwutn3sk',
            'recipient' => 'link:assignedUser',
            'userIdList' => [],
            'userNames' => (object) [],
            'whatToFollow' => 'targetEntity',
            'specifiedTeamsIds' => [],
            'specifiedTeamsNames' => (object) [],
            'type' => 'makeFollowed'
          ],
          2 => (object) [
            'link' => 'Manufacturing',
            'fieldList' => [
              0 => 'deadline',
              1 => 'isComplaint',
              2 => 'complaintBanner',
              3 => 'status',
              4 => 'assignedUser',
              5 => 'description'
            ],
            'fields' => (object) [
              'deadline' => (object) [
                'subjectType' => 'field',
                'shiftDays' => -7,
                'attributes' => (object) [],
                'shiftUnit' => 'days',
                'field' => 'deadline'
              ],
              'isComplaint' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'isComplaint' => false
                ]
              ],
              'complaintBanner' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'complaintBanner' => '-'
                ]
              ],
              'status' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'status' => 'NearLaunch'
                ]
              ],
              'assignedUser' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'assignedUserName' => 'Miloslav Krejčí',
                  'assignedUserId' => '5fb3d11f4b9995a53'
                ]
              ],
              'description' => (object) [
                'subjectType' => 'field',
                'attributes' => (object) [],
                'field' => 'description'
              ]
            ],
            'cid' => 2,
            'id' => 'rgrm51rbuk',
            'linkList' => [
              0 => 'businessProject'
            ],
            'formula' => 'name = string\\concatenate(businessProject.bOnumber, ": ", businessProject.name);',
            'entityType' => 'Manufacturing',
            'type' => 'createEntity'
          ]
        ],
        'portalOnly' => false
      ]
    ],
    'Manufacturing' => [
      '611a3cd618e9f6a27' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'notEquals',
            'subjectType' => 'value',
            'cid' => 2,
            'fieldToCompare' => 'complaintBanner',
            'type' => 'all',
            'value' => 'Complaint'
          ]
        ],
        'actions' => [
          0 => (object) [
            'execution' => (object) [
              'type' => 'immediately',
              'field' => false,
              'shiftDays' => 0
            ],
            'cid' => 0,
            'id' => 'lv2gl1kci1',
            'recipient' => 'specifiedUsers',
            'userIdList' => [
              0 => '6113b60cce4aefac9'
            ],
            'userNames' => (object) [
              '6113b60cce4aefac9' => 'Vyroba ALIS'
            ],
            'whatToFollow' => 'targetEntity',
            'specifiedTeamsIds' => [],
            'specifiedTeamsNames' => (object) [],
            'type' => 'makeFollowed'
          ],
          1 => (object) [
            'execution' => (object) [
              'type' => 'immediately',
              'field' => false,
              'shiftDays' => 0,
              'shiftUnit' => 'days'
            ],
            'from' => 'link:businessProject.modifiedBy',
            'to' => 'specifiedUsers',
            'optOutLink' => false,
            'cid' => 1,
            'id' => 'itrtrfwgvy',
            'emailTemplateId' => '611a3a951c21560b8',
            'emailTemplateName' => 'Zakázka ve výrobě',
            'replyTo' => '',
            'toSpecifiedEntityName' => 'User',
            'toSpecifiedEntityIds' => [
              0 => '5fb3d11f4b9995a53'
            ],
            'toSpecifiedEntityNames' => (object) [
              '5fb3d11f4b9995a53' => 'Miloslav Krejčí'
            ],
            'fromEmail' => '',
            'toEmail' => '',
            'replyToEmail' => '',
            'doNotStore' => true,
            'type' => 'sendEmail'
          ],
          2 => (object) [
            'fieldList' => [],
            'fields' => (object) [],
            'cid' => 2,
            'id' => 'b6mqdllrhk',
            'formula' => 'name = string\\concatenate(businessProject.bOnumber, \': \', businessProject.name);',
            'type' => 'updateEntity'
          ]
        ],
        'portalOnly' => false
      ]
    ],
    'Quote' => [
      '611a693f0698fea87' => [
        'actions' => [
          0 => (object) [
            'fieldList' => [
              0 => 'dateQuoted',
              1 => 'validUntil'
            ],
            'fields' => (object) [
              'dateQuoted' => (object) [
                'subjectType' => 'today',
                'shiftDays' => '0',
                'attributes' => (object) [],
                'shiftUnit' => 'days'
              ],
              'validUntil' => (object) [
                'subjectType' => 'today',
                'shiftDays' => '1',
                'attributes' => (object) [],
                'shiftUnit' => 'months'
              ]
            ],
            'cid' => 0,
            'id' => 'u773w02o1b',
            'formula' => '',
            'type' => 'updateEntity'
          ]
        ],
        'portalOnly' => false
      ]
    ],
    'ClockIn' => [
      '613b3e29e7b1869c8' => [
        'actions' => [
          0 => (object) [
            'fieldList' => [],
            'fields' => (object) [],
            'cid' => 0,
            'id' => 'q0tllcjf9n',
            'formula' => 'ifThenElse(
    type == \'IN\', 
    name = \'Příchod\', 
    name = \'Odchod\'
);',
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
              'type' => 'immediately',
              'field' => false,
              'shiftDays' => 0,
              'shiftUnit' => 'days'
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
    ]
  ],
  'sequential' => [
    'OpportunityItem' => [
      '6037789eeccb700a0' => [
        'actions' => [
          0 => (object) [
            'link' => 'UseCaseItem',
            'fieldList' => [
              0 => 'name',
              1 => 'amount',
              2 => 'quantity',
              3 => 'unitPrice',
              4 => 'product',
              5 => 'nameCZ'
            ],
            'fields' => (object) [
              'name' => (object) [
                'subjectType' => 'field',
                'attributes' => (object) [],
                'field' => 'name'
              ],
              'amount' => (object) [
                'subjectType' => 'field',
                'attributes' => (object) [],
                'field' => 'amount'
              ],
              'quantity' => (object) [
                'subjectType' => 'field',
                'attributes' => (object) [],
                'field' => 'quantity'
              ],
              'unitPrice' => (object) [
                'subjectType' => 'field',
                'attributes' => (object) [],
                'field' => 'unitPrice'
              ],
              'product' => (object) [
                'subjectType' => 'field',
                'attributes' => (object) [],
                'field' => 'product'
              ],
              'nameCZ' => (object) [
                'subjectType' => 'field',
                'attributes' => (object) [],
                'field' => 'product.nameCZ'
              ]
            ],
            'cid' => 0,
            'id' => 'kzp59yvyh',
            'linkList' => [],
            'formula' => '',
            'entityType' => 'UseCaseItem',
            'type' => 'createEntity'
          ]
        ],
        'portalOnly' => false
      ]
    ],
    'QualityReport' => [
      '605b240b9a2560688' => [
        'portalOnly' => false
      ]
    ],
    'BusinessProject' => [
      '613b14697e36e2d82' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'on',
            'subjectType' => 'today',
            'shiftDays' => -3,
            'cid' => 0,
            'fieldToCompare' => 'deadline',
            'type' => 'all'
          ]
        ],
        'conditionsAny' => [
          0 => (object) [
            'comparison' => 'equals',
            'subjectType' => 'value',
            'cid' => 1,
            'fieldToCompare' => 'status',
            'type' => 'any',
            'value' => 'Not Started'
          ],
          1 => (object) [
            'comparison' => 'equals',
            'subjectType' => 'value',
            'cid' => 2,
            'fieldToCompare' => 'status',
            'type' => 'any',
            'value' => 'In progress'
          ]
        ],
        'portalOnly' => false
      ]
    ],
    'Manufacturing' => [
      '61556bd09c3b384bd' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'equals',
            'subjectType' => 'value',
            'cid' => 0,
            'fieldToCompare' => 'complaintBanner',
            'type' => 'all',
            'value' => 'Complaint'
          ]
        ],
        'actions' => [
          0 => (object) [
            'link' => 'businessProject',
            'fieldList' => [
              0 => 'alert'
            ],
            'fields' => (object) [
              'alert' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'alert' => [
                    0 => 'Returned'
                  ]
                ]
              ]
            ],
            'cid' => 0,
            'id' => '283fvz3ta1',
            'parentEntityType' => NULL,
            'formula' => '',
            'type' => 'updateRelatedEntity'
          ]
        ],
        'portalOnly' => false
      ]
    ]
  ],
  'afterRecordSaved' => [
    'ProductDatabase' => [
      '61c1da86c810a5d3a' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'isEmpty',
            'cid' => 0,
            'fieldToCompare' => 'components',
            'type' => 'all'
          ],
          1 => (object) [
            'comparison' => 'notEmpty',
            'cid' => 1,
            'fieldToCompare' => 'product12',
            'type' => 'all'
          ]
        ],
        'actions' => [
          0 => (object) [
            'fieldList' => [],
            'fields' => (object) [],
            'cid' => 0,
            'id' => 'zzjhns03o1',
            'formula' => '//productCode = product.productCode;
productCode = product12.productCode;',
            'type' => 'updateEntity'
          ]
        ],
        'portalOnly' => false
      ],
      '623970ed4da7d6e01' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'isEmpty',
            'cid' => 0,
            'fieldToCompare' => 'businessProject',
            'type' => 'all'
          ]
        ],
        'conditionsAny' => [
          0 => (object) [
            'comparison' => 'changed',
            'cid' => 2,
            'fieldToCompare' => 'businessProject',
            'type' => 'any',
            'subjectType' => 'value',
            'valueName' => NULL,
            'value' => NULL
          ]
        ],
        'actions' => [
          0 => (object) [
            'fieldList' => [
              0 => 'productAvailability'
            ],
            'fields' => (object) [
              'productAvailability' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'productAvailability' => 'inStock'
                ]
              ]
            ],
            'cid' => 0,
            'id' => '51mxnqksi5',
            'formula' => '',
            'type' => 'updateEntity'
          ]
        ],
        'portalOnly' => false
      ],
      '6239732e24fe09467' => [
        'conditionsAny' => [
          0 => (object) [
            'comparison' => 'equals',
            'subjectType' => 'value',
            'cid' => 0,
            'fieldToCompare' => 'businessProject.status',
            'type' => 'any',
            'value' => 'Not Started'
          ],
          1 => (object) [
            'comparison' => 'equals',
            'subjectType' => 'value',
            'cid' => 1,
            'fieldToCompare' => 'businessProject.status',
            'type' => 'any',
            'value' => 'In progress'
          ],
          2 => (object) [
            'comparison' => 'equals',
            'subjectType' => 'value',
            'cid' => 2,
            'fieldToCompare' => 'businessProject.status',
            'type' => 'any',
            'value' => 'Not Started'
          ]
        ],
        'actions' => [
          0 => (object) [
            'fieldList' => [
              0 => 'productAvailability'
            ],
            'fields' => (object) [
              'productAvailability' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'productAvailability' => 'reserved'
                ]
              ]
            ],
            'cid' => 0,
            'id' => 'l00iqttmxn',
            'formula' => '',
            'type' => 'updateEntity'
          ]
        ],
        'portalOnly' => false
      ],
      '631f05e8e0dcc258f' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'contains',
            'subjectType' => 'value',
            'cid' => 1,
            'fieldToCompare' => 'name',
            'type' => 'all',
            'subject' => 'ALPPC25S',
            'value' => 'ALPPC25S'
          ]
        ],
        'actions' => [
          0 => (object) [
            'fieldList' => [
              0 => 'voltage'
            ],
            'fields' => (object) [
              'voltage' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'voltage' => '16 VDC'
                ]
              ]
            ],
            'cid' => 0,
            'id' => 'e945x4ewps',
            'formula' => '',
            'type' => 'updateEntity'
          ],
          1 => (object) [
            'fieldList' => [
              0 => 'current'
            ],
            'fields' => (object) [
              'current' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'current' => '2.7 A'
                ]
              ]
            ],
            'cid' => 1,
            'id' => '7wf1tizuuc',
            'formula' => '',
            'type' => 'updateEntity'
          ],
          2 => (object) [
            'fieldList' => [
              0 => 'weight'
            ],
            'fields' => (object) [
              'weight' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'weight' => '2.3 kg'
                ]
              ]
            ],
            'cid' => 2,
            'id' => 'reweq5tez7',
            'formula' => '',
            'type' => 'updateEntity'
          ],
          3 => (object) [
            'fieldList' => [
              0 => 'projectorPower'
            ],
            'fields' => (object) [
              'projectorPower' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'projectorPower' => '25'
                ]
              ]
            ],
            'cid' => 3,
            'id' => '17horqp6l9',
            'formula' => '',
            'type' => 'updateEntity'
          ]
        ],
        'portalOnly' => false
      ],
      '631f06c338aad205e' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'contains',
            'subjectType' => 'value',
            'cid' => 0,
            'fieldToCompare' => 'name',
            'type' => 'all',
            'subject' => 'ALPPC25E',
            'value' => 'ALPPC25E'
          ]
        ],
        'actions' => [
          0 => (object) [
            'fieldList' => [
              0 => 'voltage'
            ],
            'fields' => (object) [
              'voltage' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'voltage' => '16 VDC'
                ]
              ]
            ],
            'cid' => 0,
            'id' => 'y15gxmhjre',
            'formula' => '',
            'type' => 'updateEntity'
          ],
          1 => (object) [
            'fieldList' => [
              0 => 'current'
            ],
            'fields' => (object) [
              'current' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'current' => '2.7 A'
                ]
              ]
            ],
            'cid' => 1,
            'id' => 'xiw3dmold4',
            'formula' => '',
            'type' => 'updateEntity'
          ],
          2 => (object) [
            'fieldList' => [
              0 => 'weight'
            ],
            'fields' => (object) [
              'weight' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'weight' => '1.0 kg'
                ]
              ]
            ],
            'cid' => 2,
            'id' => 'm9wm8mac00',
            'formula' => '',
            'type' => 'updateEntity'
          ],
          3 => (object) [
            'fieldList' => [
              0 => 'projectorPower'
            ],
            'fields' => (object) [
              'projectorPower' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'projectorPower' => '25'
                ]
              ]
            ],
            'cid' => 3,
            'id' => 'ii666bzh6r',
            'formula' => '',
            'type' => 'updateEntity'
          ]
        ],
        'portalOnly' => false
      ],
      '631f07613a47cd01f' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'contains',
            'subjectType' => 'value',
            'cid' => 0,
            'fieldToCompare' => 'name',
            'type' => 'all',
            'subject' => 'ALPAC100S',
            'value' => 'ALPAC100S'
          ]
        ],
        'actions' => [
          0 => (object) [
            'fieldList' => [
              0 => 'voltage'
            ],
            'fields' => (object) [
              'voltage' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'voltage' => '16 VDC'
                ]
              ]
            ],
            'cid' => 0,
            'id' => 'gf7uy5vpve',
            'formula' => '',
            'type' => 'updateEntity'
          ],
          1 => (object) [
            'fieldList' => [
              0 => 'current'
            ],
            'fields' => (object) [
              'current' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'current' => '5.5 A'
                ]
              ]
            ],
            'cid' => 1,
            'id' => 'whtc6sjhwt',
            'formula' => '',
            'type' => 'updateEntity'
          ],
          2 => (object) [
            'fieldList' => [
              0 => 'weight'
            ],
            'fields' => (object) [
              'weight' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'weight' => '2.3 kg'
                ]
              ]
            ],
            'cid' => 2,
            'id' => 'i1vmwnttt6',
            'formula' => '',
            'type' => 'updateEntity'
          ],
          3 => (object) [
            'fieldList' => [
              0 => 'projectorPower'
            ],
            'fields' => (object) [
              'projectorPower' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'projectorPower' => '100'
                ]
              ]
            ],
            'cid' => 3,
            'id' => 'x95zqn6rrs',
            'formula' => '',
            'type' => 'updateEntity'
          ]
        ],
        'portalOnly' => false
      ],
      '631f07f5f1c06af8f' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'contains',
            'subjectType' => 'value',
            'cid' => 0,
            'fieldToCompare' => 'name',
            'type' => 'all',
            'subject' => 'ALPAC3',
            'value' => 'ALPAC3'
          ]
        ],
        'actions' => [
          0 => (object) [
            'fieldList' => [
              0 => 'voltage'
            ],
            'fields' => (object) [
              'voltage' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'voltage' => '36 VDC'
                ]
              ]
            ],
            'cid' => 0,
            'id' => 'm5zywccs9a',
            'formula' => '',
            'type' => 'updateEntity'
          ],
          1 => (object) [
            'fieldList' => [
              0 => 'current'
            ],
            'fields' => (object) [
              'current' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'current' => '8 A'
                ]
              ]
            ],
            'cid' => 1,
            'id' => 'tgpxdvz4sk',
            'formula' => '',
            'type' => 'updateEntity'
          ],
          2 => (object) [
            'fieldList' => [
              0 => 'weight'
            ],
            'fields' => (object) [
              'weight' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'weight' => '6.6 kg'
                ]
              ]
            ],
            'cid' => 2,
            'id' => 'u3h1yrkogj',
            'formula' => '',
            'type' => 'updateEntity'
          ],
          3 => (object) [
            'fieldList' => [
              0 => 'projectorPower'
            ],
            'fields' => (object) [
              'projectorPower' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'projectorPower' => '300'
                ]
              ]
            ],
            'cid' => 3,
            'id' => 't04468c9x9',
            'formula' => '',
            'type' => 'updateEntity'
          ]
        ],
        'portalOnly' => false
      ],
      '631f0b3d9a465f639' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'contains',
            'subjectType' => 'value',
            'cid' => 0,
            'fieldToCompare' => 'name',
            'type' => 'all',
            'subject' => 'AWLV1',
            'value' => 'AWLV1'
          ]
        ],
        'actions' => [
          0 => (object) [
            'fieldList' => [
              0 => 'voltage'
            ],
            'fields' => (object) [
              'voltage' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'voltage' => '5 VDC'
                ]
              ]
            ],
            'cid' => 0,
            'id' => '9vsj2fcj4p',
            'formula' => '',
            'type' => 'updateEntity'
          ],
          1 => (object) [
            'fieldList' => [
              0 => 'current'
            ],
            'fields' => (object) [
              'current' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'current' => '3 A'
                ]
              ]
            ],
            'cid' => 1,
            'id' => 'bafe92gme1',
            'formula' => '',
            'type' => 'updateEntity'
          ]
        ],
        'portalOnly' => false
      ],
      '631f0b7e9d069652f' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'contains',
            'subjectType' => 'value',
            'cid' => 0,
            'fieldToCompare' => 'name',
            'type' => 'all',
            'subject' => 'AWLV3',
            'value' => 'AWLV3'
          ]
        ],
        'actions' => [
          0 => (object) [
            'fieldList' => [
              0 => 'voltage'
            ],
            'fields' => (object) [
              'voltage' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'voltage' => '24 VDC'
                ]
              ]
            ],
            'cid' => 0,
            'id' => '79wn3eokem',
            'formula' => '',
            'type' => 'updateEntity'
          ],
          1 => (object) [
            'fieldList' => [
              0 => 'current'
            ],
            'fields' => (object) [
              'current' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'current' => '1.1 A'
                ]
              ]
            ],
            'cid' => 1,
            'id' => '5yzzb4mj0b',
            'formula' => '',
            'type' => 'updateEntity'
          ]
        ],
        'portalOnly' => false
      ],
      '631f1132be4d39058' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'contains',
            'subjectType' => 'value',
            'cid' => 0,
            'fieldToCompare' => 'name',
            'type' => 'all',
            'subject' => 'AWRS0',
            'value' => 'AWRS0'
          ]
        ],
        'actions' => [
          0 => (object) [
            'fieldList' => [
              0 => 'voltage'
            ],
            'fields' => (object) [
              'voltage' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'voltage' => '24 VDC'
                ]
              ]
            ],
            'cid' => 0,
            'id' => 'jqc7yyqnlc',
            'formula' => '',
            'type' => 'updateEntity'
          ],
          1 => (object) [
            'fieldList' => [
              0 => 'current'
            ],
            'fields' => (object) [
              'current' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'current' => '1 A'
                ]
              ]
            ],
            'cid' => 1,
            'id' => '5sx4uzf8g9',
            'formula' => '',
            'type' => 'updateEntity'
          ]
        ],
        'portalOnly' => false
      ],
      '631f1398b59969639' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'contains',
            'subjectType' => 'value',
            'cid' => 0,
            'fieldToCompare' => 'name',
            'type' => 'all',
            'subject' => 'AWR03A',
            'value' => 'AWR03A'
          ]
        ],
        'actions' => [
          0 => (object) [
            'fieldList' => [
              0 => 'voltage'
            ],
            'fields' => (object) [
              'voltage' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'voltage' => '24 VDC'
                ]
              ]
            ],
            'cid' => 0,
            'id' => 'eajmhk1xxn',
            'formula' => '',
            'type' => 'updateEntity'
          ],
          1 => (object) [
            'fieldList' => [
              0 => 'current'
            ],
            'fields' => (object) [
              'current' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'current' => '1 A'
                ]
              ]
            ],
            'cid' => 1,
            'id' => 'srsus0fd72',
            'formula' => '',
            'type' => 'updateEntity'
          ]
        ],
        'portalOnly' => false
      ],
      '631f13da9a58c01c8' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'contains',
            'subjectType' => 'value',
            'cid' => 0,
            'fieldToCompare' => 'name',
            'type' => 'all',
            'subject' => 'AWR03B',
            'value' => 'AWR03B'
          ]
        ],
        'actions' => [
          0 => (object) [
            'fieldList' => [
              0 => 'voltage'
            ],
            'fields' => (object) [
              'voltage' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'voltage' => '5 VDC'
                ]
              ]
            ],
            'cid' => 0,
            'id' => 'iq7ayfegmx',
            'formula' => '',
            'type' => 'updateEntity'
          ],
          1 => (object) [
            'fieldList' => [
              0 => 'current'
            ],
            'fields' => (object) [
              'current' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'current' => '1.2 A'
                ]
              ]
            ],
            'cid' => 1,
            'id' => 'j6j636p0m7',
            'formula' => '',
            'type' => 'updateEntity'
          ]
        ],
        'portalOnly' => false
      ],
      '631f142710f7420bd' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'contains',
            'subjectType' => 'value',
            'cid' => 0,
            'fieldToCompare' => 'name',
            'type' => 'all',
            'subject' => 'AWR03C',
            'value' => 'AWR03C'
          ]
        ],
        'actions' => [
          0 => (object) [
            'fieldList' => [
              0 => 'voltage'
            ],
            'fields' => (object) [
              'voltage' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'voltage' => '24 VDC'
                ]
              ]
            ],
            'cid' => 1,
            'id' => 'zquj0azks3',
            'formula' => '',
            'type' => 'updateEntity'
          ],
          1 => (object) [
            'fieldList' => [
              0 => 'current'
            ],
            'fields' => (object) [
              'current' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'current' => '1 A'
                ]
              ]
            ],
            'cid' => 2,
            'id' => 'rk52e5nh0p',
            'formula' => '',
            'type' => 'updateEntity'
          ]
        ],
        'portalOnly' => false
      ],
      '631f149c7e6a7043f' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'contains',
            'subjectType' => 'value',
            'cid' => 0,
            'fieldToCompare' => 'name',
            'type' => 'all',
            'subject' => 'AWR05',
            'value' => 'AWR05'
          ]
        ],
        'actions' => [
          0 => (object) [
            'fieldList' => [
              0 => 'voltage'
            ],
            'fields' => (object) [
              'voltage' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'voltage' => '5 VDC'
                ]
              ]
            ],
            'cid' => 0,
            'id' => 'c9qvmkh8m2',
            'formula' => '',
            'type' => 'updateEntity'
          ],
          1 => (object) [
            'fieldList' => [
              0 => 'current'
            ],
            'fields' => (object) [
              'current' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'current' => '1.2 A'
                ]
              ]
            ],
            'cid' => 1,
            'id' => 'cu8doyisle',
            'formula' => '',
            'type' => 'updateEntity'
          ]
        ],
        'portalOnly' => false
      ],
      '641c3d2e9980a5ef8' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'contains',
            'subjectType' => 'value',
            'cid' => 0,
            'fieldToCompare' => 'name',
            'type' => 'all',
            'subject' => 'ALPAC300I',
            'value' => 'ALPAC300I'
          ]
        ],
        'actions' => [
          0 => (object) [
            'fieldList' => [
              0 => 'voltage'
            ],
            'fields' => (object) [
              'voltage' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'voltage' => '22 VDC'
                ]
              ]
            ],
            'cid' => 0,
            'id' => 'e945x4ewps',
            'formula' => '',
            'type' => 'updateEntity'
          ],
          1 => (object) [
            'fieldList' => [
              0 => 'current'
            ],
            'fields' => (object) [
              'current' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'current' => '9.9 A'
                ]
              ]
            ],
            'cid' => 1,
            'id' => '7wf1tizuuc',
            'formula' => '',
            'type' => 'updateEntity'
          ],
          2 => (object) [
            'fieldList' => [
              0 => 'weight'
            ],
            'fields' => (object) [
              'weight' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'weight' => '5.8 kg'
                ]
              ]
            ],
            'cid' => 2,
            'id' => 'reweq5tez7',
            'formula' => '',
            'type' => 'updateEntity'
          ],
          3 => (object) [
            'fieldList' => [
              0 => 'projectorPower'
            ],
            'fields' => (object) [
              'projectorPower' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'projectorPower' => '300-I'
                ]
              ]
            ],
            'cid' => 3,
            'id' => '17horqp6l9',
            'formula' => '',
            'type' => 'updateEntity'
          ]
        ],
        'portalOnly' => false
      ]
    ],
    'Manufacturing' => [
      '632c3edd868dd3307' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'changed',
            'subjectType' => 'value',
            'cid' => 0,
            'fieldToCompare' => 'nace',
            'type' => 'all'
          ]
        ],
        'actions' => [
          0 => (object) [
            'link' => 'businessProject',
            'fieldList' => [
              0 => 'obodovanivyroby'
            ],
            'fields' => (object) [
              'obodovanivyroby' => (object) [
                'subjectType' => 'field',
                'attributes' => (object) [],
                'field' => 'nace'
              ]
            ],
            'cid' => 0,
            'id' => 'bwsybnm7h4',
            'parentEntityType' => NULL,
            'formula' => '',
            'type' => 'updateRelatedEntity'
          ]
        ],
        'portalOnly' => false
      ]
    ],
    'QuoteItem' => [
      '668664251d5ab71ae' => [
        'actions' => [
          0 => (object) [
            'fieldList' => [],
            'fields' => (object) [],
            'cid' => 0,
            'id' => '3ls2vpcoqw',
            'formula' => 'workflow.targetEntity.attribute(\'priceC\') = related.Product.priceC',
            'type' => 'updateEntity'
          ]
        ],
        'portalOnly' => false
      ]
    ]
  ],
  '$@update' => [
    'Manufacturing' => [
      '629f2acb74fe829e6' => [
        'conditionsAll' => [
          0 => (object) [
            'comparison' => 'changed',
            'subjectType' => 'today',
            'shiftDays' => 0,
            'cid' => 0,
            'fieldToCompare' => 'deadline',
            'type' => 'all'
          ]
        ],
        'actions' => [
          0 => (object) [
            'recipient' => 'link:assignedUser',
            'userIdList' => [],
            'userNames' => (object) [],
            'cid' => 0,
            'id' => 'gr21qmwtlr',
            'messageTemplate' => 'Zakázce ve výrobě byl změněn deadline výroby.',
            'specifiedTeamsIds' => [],
            'specifiedTeamsNames' => (object) [],
            'type' => 'createNotification'
          ]
        ],
        'portalOnly' => false
      ]
    ]
  ],
  '$@relate.productDatabases1' => [
    'BusinessProject' => [
      '62da4f8225e770aef' => [
        'actions' => [
          0 => (object) [
            'link' => 'productDatabases1',
            'fieldList' => [
              0 => 'productAvailability'
            ],
            'fields' => (object) [
              'productAvailability' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'productAvailability' => 'reserved'
                ]
              ]
            ],
            'cid' => 0,
            'id' => '8jk1lofzld',
            'parentEntityType' => NULL,
            'formula' => '',
            'type' => 'updateRelatedEntity'
          ]
        ],
        'portalOnly' => false
      ]
    ]
  ],
  '$@unrelate.productDatabases1' => [
    'BusinessProject' => [
      '62da51e96416a6fc7' => [
        'actions' => [
          0 => (object) [
            'link' => 'productDatabases1',
            'fieldList' => [
              0 => 'productAvailability'
            ],
            'fields' => (object) [
              'productAvailability' => (object) [
                'subjectType' => 'value',
                'attributes' => (object) [
                  'productAvailability' => 'inStock'
                ]
              ]
            ],
            'cid' => 1,
            'id' => 'r4vs55dnry',
            'parentEntityType' => NULL,
            'formula' => '',
            'type' => 'updateRelatedEntity'
          ]
        ],
        'portalOnly' => false
      ]
    ]
  ]
];
