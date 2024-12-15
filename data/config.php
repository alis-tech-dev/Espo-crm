<?php
return [
  'cacheTimestamp' => 1734282467,
  'useCache' => true,
  'recordsPerPage' => 100,
  'isDeveloperMode' => false,
  'recordsPerPageSmall' => 100,
  'applicationName' => 'NEW CRM Alistech',
  'version' => '8.1.4',
  'timeZone' => 'Europe/Prague',
  'dateFormat' => 'DD.MM.YYYY',
  'timeFormat' => 'HH:mm',
  'weekStart' => 1,
  'thousandSeparator' => ' ',
  'decimalMark' => ',',
  'exportDelimiter' => ';',
  'customInvoiceNames' => true,
  'currencyList' => [
    0 => 'EUR',
    1 => 'CZK'
  ],
  'defaultCurrency' => 'EUR',
  'baseCurrency' => 'EUR',
  'currencyRates' => [
    'CZK' => 0.04
  ],
  'outboundEmailIsShared' => false,
  'outboundEmailFromName' => 'Alis-Tech s.r.o.',
  'outboundEmailFromAddress' => 'alis@alis-tech.com',
  'smtpServer' => 'smtp.gmail.com',
  'smtpPort' => 587,
  'smtpAuth' => true,
  'smtpSecurity' => 'TLS',
  'smtpUsername' => 'alis@alis-tech.com',
  'languageList' => [
    0 => 'en_GB',
    1 => 'en_US',
    2 => 'es_MX',
    3 => 'cs_CZ',
    4 => 'da_DK',
    5 => 'de_DE',
    6 => 'es_ES',
    7 => 'hr_HR',
    8 => 'hu_HU',
    9 => 'fa_IR',
    10 => 'fr_FR',
    11 => 'id_ID',
    12 => 'it_IT',
    13 => 'lt_LT',
    14 => 'lv_LV',
    15 => 'nb_NO',
    16 => 'nl_NL',
    17 => 'tr_TR',
    18 => 'sk_SK',
    19 => 'sr_RS',
    20 => 'ro_RO',
    21 => 'ru_RU',
    22 => 'pl_PL',
    23 => 'pt_BR',
    24 => 'uk_UA',
    25 => 'vi_VN',
    26 => 'zh_CN'
  ],
  'language' => 'cs_CZ',
  'logger' => [
    'path' => 'data/logs/espo.log',
    'level' => 'DEBUG',
    'rotation' => true,
    'maxFileNumber' => 30,
    'printTrace' => true
  ],
  'authenticationMethod' => 'Espo',
  'globalSearchEntityList' => [
    0 => 'Account',
    1 => 'Contact',
    2 => 'Lead',
    3 => 'Opportunity',
    4 => 'Email',
    5 => 'ReceivedInvoice',
    6 => 'Product',
    7 => 'UseCase',
    8 => 'BusinessProject'
  ],
  'tabList' => [
    0 => 'Task',
    1 => 'ItTask',
    2 => 'JIRA',
    3 => 'Selector',
    4 => 'Email',
    5 => 'Product',
    6 => (object) [
      'type' => 'group',
      'text' => 'Sales',
      'iconClass' => 'fas fa-money-bill-wave-alt',
      'color' => '#03bf1f',
      'id' => '157063',
      'itemList' => [
        0 => 'Lead',
        1 => 'Account',
        2 => 'Contact',
        3 => 'Opportunity',
        4 => 'Quote',
        5 => 'SalesOrder'
      ]
    ],
    7 => (object) [
      'type' => 'group',
      'text' => 'Warehouse',
      'iconClass' => 'fas fa-warehouse',
      'color' => '#de2c2c',
      'id' => '210353',
      'itemList' => [
        0 => 'Warehouse',
        1 => 'RequestForm',
        2 => 'SupplierOrder',
        3 => 'SupplierReclamation',
        4 => 'Reclamation',
        5 => 'ProductionModel',
        6 => 'ProductionOrder'
      ]
    ],
    8 => (object) [
      'type' => 'group',
      'text' => 'Fakturace',
      'iconClass' => 'fas fa-file-invoice',
      'color' => NULL,
      'id' => '46795',
      'itemList' => [
        0 => 'SupplierInvoice',
        1 => 'Invoice',
        2 => 'ReceivedProformaInvoice',
        3 => 'ProformaInvoice',
        4 => 'ExpenseReceipt',
        5 => 'CreditNote',
        6 => 'ReceivedTaxDocument',
        7 => 'RevenueReceipt'
      ]
    ],
    9 => (object) [
      'type' => 'group',
      'text' => 'Documents',
      'iconClass' => 'fas fa-file-alt',
      'color' => '#cae023',
      'id' => '549075',
      'itemList' => [
        0 => 'Document',
        1 => 'Report',
        2 => 'Campaign',
        3 => 'Case'
      ]
    ],
    10 => 'Porady',
    11 => 'Calendar',
    12 => (object) [
      'type' => 'group',
      'text' => 'HR',
      'iconClass' => 'fas fa-users-cog',
      'color' => NULL,
      'itemList' => [
        0 => 'HumanResource',
        1 => 'HumanResources',
        2 => 'VacationRequest'
      ],
      'id' => '902424'
    ],
    13 => 'Campaign',
    14 => 'TargetList',
    15 => 'Prospect'
  ],
  'quickCreateList' => [
    0 => 'Quote',
    1 => 'Contact',
    2 => 'Task',
    3 => 'Lead',
    4 => 'Opportunity',
    5 => 'Account',
    6 => 'Call',
    7 => 'Email',
    8 => 'Meeting',
    9 => 'Absence',
    10 => 'Campaign',
    11 => 'InternalAgenda',
    12 => 'ExpenseReceipt',
    13 => 'CreditNote',
    14 => 'ReceivedTaxDocument',
    15 => 'RevenueReceipt'
  ],
  'exportDisabled' => false,
  'adminNotifications' => true,
  'adminNotificationsNewVersion' => true,
  'adminNotificationsCronIsNotConfigured' => true,
  'adminNotificationsNewExtensionVersion' => true,
  'assignmentEmailNotifications' => true,
  'assignmentEmailNotificationsEntityList' => [
    0 => 'Opportunity',
    1 => 'Task',
    2 => 'Case',
    3 => 'Contact',
    4 => 'Project',
    5 => 'Complaint',
    6 => 'BusinessProject',
    7 => 'VacationRequest'
  ],
  'assignmentNotificationsEntityList' => [
    0 => 'Meeting',
    1 => 'BpmnUserTask'
  ],
  'portalStreamEmailNotifications' => true,
  'streamEmailNotificationsEntityList' => [
    0 => 'SalesOrder',
    1 => 'RequestForm',
    2 => 'Task',
    3 => 'VacationRequest'
  ],
  'streamEmailNotificationsTypeList' => [
    0 => 'Post',
    1 => 'Status'
  ],
  'emailNotificationsDelay' => 30,
  'emailMessageMaxSize' => 50,
  'notificationsCheckInterval' => 10,
  'maxEmailAccountCount' => 4,
  'followCreatedEntities' => true,
  'b2cMode' => false,
  'restrictedMode' => false,
  'theme' => 'Violet',
  'massEmailMaxPerHourCount' => 100,
  'personalEmailMaxPortionSize' => 50,
  'inboundEmailMaxPortionSize' => 50,
  'authTokenLifetime' => 0,
  'authTokenMaxIdleTime' => 120,
  'userNameRegularExpression' => '[^a-z0-9\\-@_\\.\\s]',
  'addressFormat' => 1,
  'displayListViewRecordCount' => true,
  'dashboardLayout' => [
    0 => (object) [
      'name' => 'týmové aktivity',
      'layout' => [
        0 => (object) [
          'id' => 'd201951',
          'name' => 'Iframe',
          'x' => 0,
          'y' => '0',
          'width' => 4,
          'height' => '10'
        ],
        1 => (object) [
          'id' => 'd362375',
          'name' => 'Tasks',
          'x' => 0,
          'y' => '10',
          'width' => 2,
          'height' => '2'
        ],
        2 => (object) [
          'id' => 'd883840',
          'name' => 'Iframe',
          'x' => 2,
          'y' => '10',
          'width' => 2,
          'height' => '3'
        ],
        3 => (object) [
          'id' => 'd254554',
          'name' => 'Report',
          'x' => 0,
          'y' => '12',
          'width' => 2,
          'height' => '2'
        ],
        4 => (object) [
          'id' => 'd80690',
          'name' => 'Calendar',
          'x' => 2,
          'y' => '13',
          'width' => 2,
          'height' => '2'
        ],
        5 => (object) [
          'id' => 'default-stream',
          'name' => 'Stream',
          'x' => 0,
          'y' => '14',
          'width' => 2,
          'height' => '4'
        ],
        6 => (object) [
          'id' => 'default-activities',
          'name' => 'Activities',
          'x' => 2,
          'y' => '15',
          'width' => 2,
          'height' => '3'
        ]
      ]
    ]
  ],
  'calendarEntityList' => [
    0 => 'Meeting',
    1 => 'Call',
    2 => 'Task',
    3 => 'Absence',
    4 => 'Vacation'
  ],
  'activitiesEntityList' => [
    0 => 'Meeting',
    1 => 'Call',
    2 => 'Email'
  ],
  'historyEntityList' => [
    0 => 'Meeting',
    1 => 'Call',
    2 => 'Email'
  ],
  'cleanupJobPeriod' => '1 month',
  'cleanupActionHistoryPeriod' => '15 days',
  'cleanupAuthTokenPeriod' => '1 month',
  'currencyFormat' => 1,
  'currencyDecimalPlaces' => 2,
  'aclStrictMode' => true,
  'aclAllowDeleteCreated' => false,
  'aclAllowDeleteCreatedThresholdPeriod' => '24 hours',
  'inlineAttachmentUploadMaxSize' => 20,
  'textFilterUseContainsForVarchar' => true,
  'tabColorsDisabled' => false,
  'massPrintPdfMaxCount' => 50,
  'emailKeepParentTeamsEntityList' => [
    0 => 'Case'
  ],
  'recordListMaxSizeLimit' => 200,
  'noteDeleteThresholdPeriod' => '1 month',
  'noteEditThresholdPeriod' => '7 days',
  'emailForceUseExternalClient' => false,
  'useWebSocket' => false,
  'auth2FAMethodList' => [
    0 => 'Totp'
  ],
  'isInstalled' => true,
  'siteUrl' => 'https://www.crm.alis-is.com',
  'fullTextSearchMinLength' => 4,
  'actualDatabaseType' => 'mariadb',
  'defaultPortalId' => '5e0cb43a69644a393',
  'userThemesDisabled' => false,
  'avatarsDisabled' => false,
  'scopeColorsDisabled' => false,
  'tabIconsDisabled' => false,
  'dashletsOptions' => (object) [
    'd254554' => (object) [
      'title' => 'leads 2022',
      'reportName' => 'leads 2022',
      'reportId' => '6234c43abba9cff25',
      'column' => 'COUNT:id',
      'displayOnlyCount' => false,
      'displayTotal' => false,
      'useSiMultiplier' => true,
      'autorefreshInterval' => 0,
      'entityType' => 'Lead',
      'runtimeFilters' => [],
      'type' => 'Grid',
      'columns' => [
        0 => 'COUNT:id'
      ],
      'depth' => 1
    ],
    'd883840' => (object) [
      'title' => 'Chat',
      'url' => 'https://mail.google.com/chat/u/0/#chat/home',
      'autorefreshInterval' => 0.5
    ],
    'd201951' => (object) [
      'title' => 'alis-is.com',
      'url' => 'https://alis-is.com',
      'autorefreshInterval' => 0.5
    ]
  ],
  'companyLogoId' => '65b39c24aebb4e953',
  'companyLogoName' => 'alis-logo.svg',
  'mentionEmailNotifications' => true,
  'streamEmailNotifications' => true,
  'cronDisabled' => false,
  'adminPanelIframeUrl' => 'https://s.espocrm.com/?sales-pack=ab90ca3eab7c48e8ae6409bc1af8bf16&advanced-pack=9e71abacf6ac199ee59911e8bc81aa87&google-integration=d222cd5ec22d93ad3eb7a092569d85b3',
  'latestVersion' => '8.4.2',
  'latestExtensionVersions' => (object) [
    'Sales Pack' => '1.2.1',
    'Advanced Pack' => '3.4.3',
    'Google Integration' => '1.7.3'
  ],
  'emailAddressIsOptedOutByDefault' => false,
  'cleanupDeletedRecords' => false,
  'fiscalYearShift' => 0,
  'addressCityList' => [],
  'addressStateList' => [],
  'addressCountryList' => [
    0 => 'CZ',
    1 => 'PL',
    2 => 'SK',
    3 => 'DE'
  ],
  'googleMapsApiKey' => NULL,
  'integrations' => (object) [
    'GoogleMaps' => false,
    'Google' => true,
    'OnlyOffice' => true,
    'mattermost' => true,
    'Pohoda' => true,
    'MoneyS3' => false
  ],
  'personNameFormat' => 'firstLast',
  'streamEmailWithContentEntityTypeList' => [
    0 => 'Case'
  ],
  'massEmailVerp' => false,
  'newNotificationCountInTitle' => false,
  'microtime' => 1734282467.351661,
  'busyRangesEntityList' => [
    0 => 'Meeting',
    1 => 'Call'
  ],
  'emailAddressLookupEntityTypeList' => [
    0 => 'User',
    1 => 'Contact',
    2 => 'Lead',
    3 => 'Account',
    4 => 'Prospect'
  ],
  'outboundEmailBccAddress' => NULL,
  'massEmailDisableMandatoryOptOutLink' => true,
  'massEmailOpenTracking' => true,
  'defaultTeam' => 'Support',
  'defaultTeamName' => 'Support',
  'defaultTeamId' => '5ef35f19bddc723ca',
  'temporaryUpgradeParams5fa66ecd9ab66d4e4' => (object) [
    'maintenanceMode' => false,
    'cronDisabled' => false,
    'useCache' => true
  ],
  'jobRunInParallel' => true,
  'temporaryUpgradeParams6454cfa59faa38e1f' => (object) [
    'maintenanceMode' => false,
    'cronDisabled' => false,
    'useCache' => false
  ],
  'pdfEngine' => 'Dompdf',
  'jobMaxPortion' => 15,
  'jobPoolConcurrencyNumber' => 8,
  'daemonMaxProcessNumber' => 5,
  'daemonInterval' => 10,
  'daemonProcessTimeout' => 36000,
  'recordsPerPageSelect' => 50,
  'emailAutoReplySuppressPeriod' => '2 hours',
  'emailAutoReplyLimit' => 5,
  'smsProvider' => NULL,
  'defaultFileStorage' => 'EspoUploadDir',
  'ldapUserNameAttribute' => 'sAMAccountName',
  'ldapUserFirstNameAttribute' => 'givenName',
  'ldapUserLastNameAttribute' => 'sn',
  'ldapUserTitleAttribute' => 'title',
  'ldapUserEmailAddressAttribute' => 'mail',
  'ldapUserPhoneNumberAttribute' => 'telephoneNumber',
  'ldapUserObjectClass' => 'person',
  'ldapPortalUserLdapAuth' => false,
  'passwordGenerateLength' => 10,
  'massActionIdleCountThreshold' => 100,
  'exportIdleCountThreshold' => 1000,
  'appTimestamp' => 1724315747,
  'themeParams' => (object) [
    'navbar' => 'side'
  ],
  'attachmentUploadMaxSize' => 256,
  'attachmentUploadChunkSize' => 4,
  'currencyNoJoinMode' => false,
  'popupNotificationsCheckInterval' => 15,
  'cleanupSubscribers' => true,
  'oidcJwtSignatureAlgorithmList' => [
    0 => 'RS256'
  ],
  'oidcUsernameClaim' => 'sub',
  'oidcFallback' => true,
  'oidcScopes' => [
    0 => 'profile',
    1 => 'email',
    2 => 'phone'
  ],
  'recordsPerPageKanban' => 10,
  'emailAddressEntityLookupDefaultOrder' => [
    0 => 'User',
    1 => 'Contact',
    2 => 'Lead',
    3 => 'Account',
    4 => 'Prospect'
  ],
  'phoneNumberEntityLookupDefaultOrder' => [
    0 => 'User',
    1 => 'Contact',
    2 => 'Lead',
    3 => 'Account',
    4 => 'Prospect'
  ],
  'auth2FAInPortal' => false,
  'emailCheckInterval' => 60,
  'editEntityEnabled' => true,
  'editLayoutEnabled' => true,
  'workingTimeCalendarName' => 'first',
  'workingTimeCalendarId' => '66bc74cf8cd367fb2',
  'editFiltersEnabled' => true,
  'aresEnabled' => true,
  'defaultDetailLayout' => 'record',
  'defaultIsWide' => false,
  'supplierVATpayer' => 'VAT payer',
  'maintenanceMode' => false,
  'emailRecipientAddressMaxCount' => 100,
  'attachmentAvailableStorageList' => NULL,
  'warehouseGroupByFieldList' => [
    0 => 'price',
    1 => 'serialNumber',
    2 => 'quantity',
    3 => 'quantityAvailable',
    4 => 'quantityReserved'
  ],
  'updateProductCostPriceWithAveragePrice' => true,
  'recurrenceBatchSizeLimit' => 500,
  'showListScheduledRecurrencesButton' => true,
  'viesEnabled' => true,
  'kanbanMinColumnWidth' => 100,
  'massEmailMaxPerBatchCount' => NULL,
  'mapProvider' => 'Google',
  'listViewSettingsDisabled' => false,
  'phoneNumberNumericSearch' => false,
  'phoneNumberInternational' => false,
  'phoneNumberPreferredCountryList' => [
    0 => 'us',
    1 => 'de'
  ],
  'editLabelsEnabled' => false,
  'addressCountryListOptions' => [
    0 => 'AF',
    1 => 'AX',
    2 => 'AL',
    3 => 'DZ',
    4 => 'AS',
    5 => 'AD',
    6 => 'AO',
    7 => 'AI',
    8 => 'AQ',
    9 => 'AG',
    10 => 'AR',
    11 => 'AM',
    12 => 'AW',
    13 => 'AU',
    14 => 'AT',
    15 => 'AZ',
    16 => 'BS',
    17 => 'BH',
    18 => 'BD',
    19 => 'BB',
    20 => 'BY',
    21 => 'BE',
    22 => 'BZ',
    23 => 'BJ',
    24 => 'BM',
    25 => 'BT',
    26 => 'BO',
    27 => 'BA',
    28 => 'BW',
    29 => 'BV',
    30 => 'BR',
    31 => 'IO',
    32 => 'BN',
    33 => 'BG',
    34 => 'BF',
    35 => 'BI',
    36 => 'KH',
    37 => 'CM',
    38 => 'CA',
    39 => 'CV',
    40 => 'KY',
    41 => 'CF',
    42 => 'TD',
    43 => 'CL',
    44 => 'CN',
    45 => 'CX',
    46 => 'CC',
    47 => 'CO',
    48 => 'KM',
    49 => 'CG',
    50 => 'CD',
    51 => 'CK',
    52 => 'CR',
    53 => 'CI',
    54 => 'HR',
    55 => 'CU',
    56 => 'CY',
    57 => 'CZ',
    58 => 'DK',
    59 => 'DJ',
    60 => 'DM',
    61 => 'DO',
    62 => 'EC',
    63 => 'EG',
    64 => 'SV',
    65 => 'GQ',
    66 => 'ER',
    67 => 'EE',
    68 => 'ET',
    69 => 'FK',
    70 => 'FO',
    71 => 'FJ',
    72 => 'FI',
    73 => 'FR',
    74 => 'GF',
    75 => 'PF',
    76 => 'TF',
    77 => 'GA',
    78 => 'GM',
    79 => 'GE',
    80 => 'DE',
    81 => 'GH',
    82 => 'GI',
    83 => 'GR',
    84 => 'GL',
    85 => 'GD',
    86 => 'GP',
    87 => 'GU',
    88 => 'GT',
    89 => 'GG',
    90 => 'GN',
    91 => 'GW',
    92 => 'GY',
    93 => 'HT',
    94 => 'HM',
    95 => 'VA',
    96 => 'HN',
    97 => 'HK',
    98 => 'HU',
    99 => 'IS',
    100 => 'IN',
    101 => 'ID',
    102 => 'IR',
    103 => 'IQ',
    104 => 'IE',
    105 => 'IM',
    106 => 'IL',
    107 => 'IT',
    108 => 'JM',
    109 => 'JP',
    110 => 'JE',
    111 => 'JO',
    112 => 'KZ',
    113 => 'KE',
    114 => 'KI',
    115 => 'KR',
    116 => 'KP',
    117 => 'KW',
    118 => 'KG',
    119 => 'LA',
    120 => 'LV',
    121 => 'LB',
    122 => 'LS',
    123 => 'LR',
    124 => 'LY',
    125 => 'LI',
    126 => 'LT',
    127 => 'LU',
    128 => 'MO',
    129 => 'MK',
    130 => 'MG',
    131 => 'MW',
    132 => 'MY',
    133 => 'MV',
    134 => 'ML',
    135 => 'MT',
    136 => 'MH',
    137 => 'MQ',
    138 => 'MR',
    139 => 'MU',
    140 => 'YT',
    141 => 'MX',
    142 => 'FM',
    143 => 'MD',
    144 => 'MC',
    145 => 'MN',
    146 => 'ME',
    147 => 'MS',
    148 => 'MA',
    149 => 'MZ',
    150 => 'MM',
    151 => 'NA',
    152 => 'NR',
    153 => 'NP',
    154 => 'NL',
    155 => 'AN',
    156 => 'NC',
    157 => 'NZ',
    158 => 'NI',
    159 => 'NE',
    160 => 'NG',
    161 => 'NU',
    162 => 'NF',
    163 => 'MP',
    164 => 'NO',
    165 => 'OM',
    166 => 'PK',
    167 => 'PW',
    168 => 'PS',
    169 => 'PA',
    170 => 'PG',
    171 => 'PY',
    172 => 'PE',
    173 => 'PH',
    174 => 'PN',
    175 => 'PL',
    176 => 'PT',
    177 => 'PR',
    178 => 'QA',
    179 => 'RE',
    180 => 'RO',
    181 => 'RU',
    182 => 'RW',
    183 => 'BL',
    184 => 'SH',
    185 => 'KN',
    186 => 'LC',
    187 => 'MF',
    188 => 'PM',
    189 => 'VC',
    190 => 'WS',
    191 => 'SM',
    192 => 'ST',
    193 => 'SA',
    194 => 'SN',
    195 => 'RS',
    196 => 'SC',
    197 => 'SL',
    198 => 'SG',
    199 => 'SK',
    200 => 'SI',
    201 => 'SB',
    202 => 'SO',
    203 => 'ZA',
    204 => 'GS',
    205 => 'ES',
    206 => 'LK',
    207 => 'SD',
    208 => 'SR',
    209 => 'SJ',
    210 => 'SZ',
    211 => 'SE',
    212 => 'CH',
    213 => 'SY',
    214 => 'TW',
    215 => 'TJ',
    216 => 'TZ',
    217 => 'TH',
    218 => 'TL',
    219 => 'TG',
    220 => 'TK',
    221 => 'TO',
    222 => 'TT',
    223 => 'TN',
    224 => 'TR',
    225 => 'TM',
    226 => 'TC',
    227 => 'TV',
    228 => 'UG',
    229 => 'UA',
    230 => 'AE',
    231 => 'GB',
    232 => 'US',
    233 => 'UM',
    234 => 'UY',
    235 => 'UZ',
    236 => 'VU',
    237 => 'VE',
    238 => 'VN',
    239 => 'VG',
    240 => 'VI',
    241 => 'WF',
    242 => 'EH',
    243 => 'YE',
    244 => 'ZM',
    245 => 'ZW'
  ],
  'reclamationDefaultWarehouseName' => 'reklamační sklad',
  'reclamationDefaultWarehouseId' => '65cf4e434175ec5a4',
  'warehouseRunningOutMultiplier' => 1.1,
  'weightUnitList' => [
    0 => 't',
    1 => 'kg',
    2 => 'g'
  ],
  'timeUnitList' => [
    0 => 'h',
    1 => 'min',
    2 => 's'
  ],
  'lengthUnitList' => [
    0 => 'km',
    1 => 'm',
    2 => 'cm',
    3 => 'mm'
  ],
  'areaUnitList' => [
    0 => 'km²',
    1 => 'm²',
    2 => 'cm²',
    3 => 'mm²'
  ],
  'volumeUnitList' => [
    0 => 'm³',
    1 => 'l',
    2 => 'ml'
  ],
  'warehouseListToSaveValueOfIds' => [],
  'warehouseListToSaveValueOfNames' => (object) [],
  'mattermostMasterToken' => 'ptw8x94gbtb88b9ukqshtx1bxe',
  'mattermostTeamId' => 'huht38o31fdymdktdmntwdrpza',
  'mattermostServerUrl' => 'https://chat.alis-is.com',
  'temporaryUpgradeParams664761731d0c8a633' => (object) [
    'maintenanceMode' => false,
    'cronDisabled' => false,
    'useCache' => true
  ],
  'humanResourceApprovalRoleId' => '6655c6f04560752cb',
  'humanResourceApprovalRoleName' => 'HR Manager',
  'humanResourceApprovalTeamId' => '6655c6f049e729b6e',
  'humanResourceApprovalTeamName' => 'HR Management',
  'editNavbarEnabled' => true,
  'finstatEnabled' => false,
  'refreshEntityEnabled' => true,
  'systemUserAttributes' => (object) [
    'lastName' => 'System'
  ],
  'jobPeriod' => 7800,
  'jobPeriodForActiveProcess' => 36000,
  'jobRerunAttemptNumber' => 1,
  'cronMinInterval' => 2,
  'passwordRecoveryEnabled' => true,
  'logoSrc' => 'client/img/logo.svg'
];
