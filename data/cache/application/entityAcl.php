<?php
return (object) [
  'Attachment' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'source',
        1 => 'createdAt',
        2 => 'createdBy',
        3 => 'storage'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'sourceId',
        1 => 'sourceName',
        2 => 'createdAt',
        3 => 'createdById',
        4 => 'createdByName',
        5 => 'storage'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'AuthLogRecord' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'username',
        1 => 'portal',
        2 => 'user',
        3 => 'authToken',
        4 => 'ipAddress',
        5 => 'createdAt',
        6 => 'isDenied',
        7 => 'denialReason',
        8 => 'requestTime',
        9 => 'requestUrl',
        10 => 'requestMethod',
        11 => 'authTokenIsActive'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'username',
        1 => 'portalId',
        2 => 'portalName',
        3 => 'userId',
        4 => 'userName',
        5 => 'authTokenId',
        6 => 'authTokenName',
        7 => 'ipAddress',
        8 => 'createdAt',
        9 => 'isDenied',
        10 => 'denialReason',
        11 => 'requestTime',
        12 => 'requestUrl',
        13 => 'requestMethod',
        14 => 'authTokenIsActive'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'AuthToken' => (object) [
    'fields' => (object) [
      'forbidden' => [
        0 => 'token',
        1 => 'hash',
        2 => 'secret'
      ],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'token',
        1 => 'hash',
        2 => 'secret',
        3 => 'user',
        4 => 'portal',
        5 => 'ipAddress',
        6 => 'lastAccess',
        7 => 'createdAt',
        8 => 'modifiedAt'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [
        0 => 'token',
        1 => 'hash',
        2 => 'secret'
      ],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'token',
        1 => 'hash',
        2 => 'secret',
        3 => 'userId',
        4 => 'userName',
        5 => 'portalId',
        6 => 'portalName',
        7 => 'ipAddress',
        8 => 'lastAccess',
        9 => 'createdAt',
        10 => 'modifiedAt'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'AuthenticationProvider' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'oidcAuthorizationRedirectUri'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'oidcAuthorizationRedirectUri'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'DashboardTemplate' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'Email' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'fromName',
        1 => 'fromAddress',
        2 => 'replyToName',
        3 => 'replyToAddress',
        4 => 'addressNameMap',
        5 => 'isRead',
        6 => 'isNotRead',
        7 => 'isReplied',
        8 => 'isNotReplied',
        9 => 'folder',
        10 => 'nameHash',
        11 => 'typeHash',
        12 => 'idHash',
        13 => 'messageId',
        14 => 'messageIdInternal',
        15 => 'hasAttachment',
        16 => 'deliveryDate',
        17 => 'createdAt',
        18 => 'modifiedAt',
        19 => 'createdBy',
        20 => 'sentBy',
        21 => 'modifiedBy',
        22 => 'replies',
        23 => 'isSystem',
        24 => 'users',
        25 => 'assignedUsers',
        26 => 'inboundEmails',
        27 => 'emailAccounts',
        28 => 'icsContents',
        29 => 'icsEventData',
        30 => 'icsEventDateStart',
        31 => 'createdEvent',
        32 => 'account',
        33 => 'tasks',
        34 => 'icsEventDateStartDate'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'fromName',
        1 => 'fromAddress',
        2 => 'replyToName',
        3 => 'replyToAddress',
        4 => 'addressNameMap',
        5 => 'isRead',
        6 => 'isNotRead',
        7 => 'isReplied',
        8 => 'isNotReplied',
        9 => 'folderId',
        10 => 'folderName',
        11 => 'nameHash',
        12 => 'typeHash',
        13 => 'idHash',
        14 => 'messageId',
        15 => 'messageIdInternal',
        16 => 'hasAttachment',
        17 => 'deliveryDate',
        18 => 'createdAt',
        19 => 'modifiedAt',
        20 => 'createdById',
        21 => 'createdByName',
        22 => 'sentById',
        23 => 'sentByName',
        24 => 'modifiedById',
        25 => 'modifiedByName',
        26 => 'repliesIds',
        27 => 'repliesRecordList',
        28 => 'repliesNames',
        29 => 'isSystem',
        30 => 'usersIds',
        31 => 'usersRecordList',
        32 => 'usersNames',
        33 => 'assignedUsersIds',
        34 => 'assignedUsersRecordList',
        35 => 'assignedUsersNames',
        36 => 'inboundEmailsIds',
        37 => 'inboundEmailsRecordList',
        38 => 'inboundEmailsNames',
        39 => 'emailAccountsIds',
        40 => 'emailAccountsRecordList',
        41 => 'emailAccountsNames',
        42 => 'icsContents',
        43 => 'icsEventData',
        44 => 'icsEventDateStart',
        45 => 'icsEventDateStartDate',
        46 => 'createdEventId',
        47 => 'createdEventType',
        48 => 'createdEventName',
        49 => 'accountId',
        50 => 'accountName',
        51 => 'tasksIds',
        52 => 'tasksRecordList',
        53 => 'tasksNames',
        54 => 'icsEventDateStartDate'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [
        0 => 'users'
      ],
      'readOnly' => [
        0 => 'tasks'
      ],
      'nonAdminReadOnly' => []
    ]
  ],
  'EmailAccount' => (object) [
    'fields' => (object) [
      'forbidden' => [
        0 => 'imapHandler',
        1 => 'smtpHandler'
      ],
      'internal' => [
        0 => 'password',
        1 => 'smtpPassword'
      ],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'fetchData',
        1 => 'createdAt',
        2 => 'modifiedAt',
        3 => 'imapHandler',
        4 => 'smtpHandler',
        5 => 'createdBy',
        6 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [
        0 => 'imapHandler',
        1 => 'smtpHandler'
      ],
      'internal' => [
        0 => 'password',
        1 => 'smtpPassword'
      ],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'fetchData',
        1 => 'createdAt',
        2 => 'modifiedAt',
        3 => 'imapHandler',
        4 => 'smtpHandler',
        5 => 'createdById',
        6 => 'createdByName',
        7 => 'modifiedById',
        8 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'EmailFilter' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'EmailFolder' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'assignedUser',
        1 => 'createdAt',
        2 => 'modifiedAt',
        3 => 'createdBy',
        4 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'assignedUserId',
        1 => 'assignedUserName',
        2 => 'createdAt',
        3 => 'modifiedAt',
        4 => 'createdById',
        5 => 'createdByName',
        6 => 'modifiedById',
        7 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'EmailTemplate' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'EmailTemplateCategory' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'Export' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'Extension' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'createdBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'createdById',
        2 => 'createdByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'GroupEmailFolder' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'Import' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'entityType',
        1 => 'status',
        2 => 'file',
        3 => 'importedCount',
        4 => 'duplicateCount',
        5 => 'updatedCount',
        6 => 'lastIndex',
        7 => 'params',
        8 => 'attributeList',
        9 => 'createdAt',
        10 => 'createdBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'entityType',
        1 => 'status',
        2 => 'fileId',
        3 => 'fileName',
        4 => 'importedCount',
        5 => 'duplicateCount',
        6 => 'updatedCount',
        7 => 'lastIndex',
        8 => 'params',
        9 => 'attributeList',
        10 => 'createdAt',
        11 => 'createdById',
        12 => 'createdByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'errors'
      ],
      'nonAdminReadOnly' => []
    ]
  ],
  'ImportError' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'import',
        1 => 'rowIndex',
        2 => 'exportRowIndex',
        3 => 'lineNumber',
        4 => 'exportLineNumber',
        5 => 'type',
        6 => 'validationFailures',
        7 => 'row'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'importId',
        1 => 'importName',
        2 => 'rowIndex',
        3 => 'exportRowIndex',
        4 => 'lineNumber',
        5 => 'exportLineNumber',
        6 => 'type',
        7 => 'validationFailures',
        8 => 'row'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'InboundEmail' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [
        0 => 'password',
        1 => 'smtpPassword',
        2 => 'imapHandler',
        3 => 'smtpHandler'
      ],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'fetchData',
        1 => 'imapHandler',
        2 => 'smtpHandler',
        3 => 'createdAt',
        4 => 'modifiedAt',
        5 => 'createdBy',
        6 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [
        0 => 'password',
        1 => 'smtpPassword',
        2 => 'imapHandler',
        3 => 'smtpHandler'
      ],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'fetchData',
        1 => 'imapHandler',
        2 => 'smtpHandler',
        3 => 'createdAt',
        4 => 'modifiedAt',
        5 => 'createdById',
        6 => 'createdByName',
        7 => 'modifiedById',
        8 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'Job' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'number',
        1 => 'createdAt',
        2 => 'modifiedAt'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'number',
        1 => 'createdAt',
        2 => 'modifiedAt'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'LayoutSet' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'LeadCapture' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'apiKey',
        1 => 'exampleRequestUrl',
        2 => 'exampleRequestMethod',
        3 => 'exampleRequestPayload',
        4 => 'exampleRequestHeaders',
        5 => 'createdAt',
        6 => 'modifiedAt',
        7 => 'createdBy',
        8 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'apiKey',
        1 => 'exampleRequestUrl',
        2 => 'exampleRequestMethod',
        3 => 'exampleRequestPayload',
        4 => 'exampleRequestHeaders',
        5 => 'createdAt',
        6 => 'modifiedAt',
        7 => 'createdById',
        8 => 'createdByName',
        9 => 'modifiedById',
        10 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'LeadCaptureLogRecord' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'number',
        1 => 'createdAt'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'number',
        1 => 'createdAt'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'MassAction' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'Note' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'data',
        1 => 'type',
        2 => 'related',
        3 => 'number',
        4 => 'createdAt',
        5 => 'modifiedAt',
        6 => 'createdBy',
        7 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'data',
        1 => 'type',
        2 => 'relatedId',
        3 => 'relatedType',
        4 => 'relatedName',
        5 => 'number',
        6 => 'createdAt',
        7 => 'modifiedAt',
        8 => 'createdById',
        9 => 'createdByName',
        10 => 'modifiedById',
        11 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'Notification' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'related',
        2 => 'relatedParent'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'relatedId',
        2 => 'relatedType',
        3 => 'relatedName',
        4 => 'relatedParentId',
        5 => 'relatedParentType',
        6 => 'relatedParentName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'PasswordChangeRequest' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'user',
        1 => 'createdAt'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'userId',
        1 => 'userName',
        2 => 'createdAt'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'Portal' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'url',
        1 => 'modifiedAt',
        2 => 'modifiedBy',
        3 => 'createdAt',
        4 => 'createdBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'url',
        1 => 'modifiedAt',
        2 => 'modifiedById',
        3 => 'modifiedByName',
        4 => 'createdAt',
        5 => 'createdById',
        6 => 'createdByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'PortalRole' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'Role' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'ScheduledJob' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'lastRun',
        1 => 'createdAt',
        2 => 'modifiedAt',
        3 => 'createdBy',
        4 => 'modifiedBy',
        5 => 'isInternal'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'lastRun',
        1 => 'createdAt',
        2 => 'modifiedAt',
        3 => 'createdById',
        4 => 'createdByName',
        5 => 'modifiedById',
        6 => 'modifiedByName',
        7 => 'isInternal'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'ScheduledJobLogRecord' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'name',
        1 => 'status',
        2 => 'executionTime',
        3 => 'createdAt'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'name',
        1 => 'status',
        2 => 'executionTime',
        3 => 'createdAt'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'Settings' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'addressPreview',
        1 => 'addressPreviewStreet',
        2 => 'addressPreviewCity',
        3 => 'addressPreviewState',
        4 => 'addressPreviewCountry',
        5 => 'addressPreviewPostalCode',
        6 => 'addressPreviewMap',
        7 => 'companyBillingAddressMap',
        8 => 'companyShippingAddressMap'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'addressPreviewStreet',
        1 => 'addressPreviewCity',
        2 => 'addressPreviewState',
        3 => 'addressPreviewCountry',
        4 => 'addressPreviewPostalCode',
        5 => 'addressPreviewStreet',
        6 => 'addressPreviewCity',
        7 => 'addressPreviewState',
        8 => 'addressPreviewCountry',
        9 => 'addressPreviewPostalCode',
        10 => 'addressPreviewMap',
        11 => 'companyBillingAddressMap',
        12 => 'companyShippingAddressMap'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'Sms' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy',
        4 => 'replied',
        5 => 'replies'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName',
        6 => 'repliedId',
        7 => 'repliedName',
        8 => 'repliesIds',
        9 => 'repliesRecordList',
        10 => 'repliesNames'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'Team' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'Template' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'TwoFactorCode' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'UniqueId' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'createdBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'createdById',
        2 => 'createdByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'User' => (object) [
    'fields' => (object) [
      'forbidden' => [
        0 => 'authLogRecordId',
        1 => 'userData',
        2 => 'deleteId'
      ],
      'internal' => [
        0 => 'password',
        1 => 'passwordConfirm'
      ],
      'onlyAdmin' => [
        0 => 'authMethod',
        1 => 'apiKey',
        2 => 'secretKey',
        3 => 'layoutSet',
        4 => 'auth2FA'
      ],
      'readOnly' => [
        0 => 'apiKey',
        1 => 'secretKey',
        2 => 'position',
        3 => 'account',
        4 => 'portal',
        5 => 'createdAt',
        6 => 'modifiedAt',
        7 => 'createdBy',
        8 => 'auth2FA',
        9 => 'lastAccess',
        10 => 'deleteId',
        11 => 'targetListIsOptedOut',
        12 => 'vacationTimePerYear',
        13 => 'remainingVacationTime'
      ],
      'nonAdminReadOnly' => [
        0 => 'userName',
        1 => 'type',
        2 => 'password',
        3 => 'passwordConfirm',
        4 => 'apiKey',
        5 => 'isActive',
        6 => 'emailAddress',
        7 => 'teams',
        8 => 'roles',
        9 => 'portals',
        10 => 'portalRoles',
        11 => 'contact',
        12 => 'accounts',
        13 => 'workingTimeCalendar'
      ]
    ],
    'attributes' => (object) [
      'forbidden' => [
        0 => 'authLogRecordId',
        1 => 'userDataId',
        2 => 'userDataName',
        3 => 'deleteId'
      ],
      'internal' => [
        0 => 'password',
        1 => 'passwordConfirm'
      ],
      'onlyAdmin' => [
        0 => 'authMethod',
        1 => 'apiKey',
        2 => 'secretKey',
        3 => 'layoutSetId',
        4 => 'layoutSetName',
        5 => 'auth2FA'
      ],
      'readOnly' => [
        0 => 'apiKey',
        1 => 'secretKey',
        2 => 'position',
        3 => 'accountId',
        4 => 'accountName',
        5 => 'portalId',
        6 => 'portalName',
        7 => 'createdAt',
        8 => 'modifiedAt',
        9 => 'createdById',
        10 => 'createdByName',
        11 => 'auth2FA',
        12 => 'lastAccess',
        13 => 'deleteId',
        14 => 'targetListIsOptedOut',
        15 => 'vacationTimePerYear',
        16 => 'remainingVacationTime'
      ],
      'nonAdminReadOnly' => [
        0 => 'userName',
        1 => 'type',
        2 => 'password',
        3 => 'passwordConfirm',
        4 => 'apiKey',
        5 => 'isActive',
        6 => 'emailAddressIsOptedOut',
        7 => 'emailAddressIsInvalid',
        8 => 'emailAddress',
        9 => 'emailAddressData',
        10 => 'teamsIds',
        11 => 'teamsRecordList',
        12 => 'teamsColumns',
        13 => 'teamsNames',
        14 => 'rolesIds',
        15 => 'rolesRecordList',
        16 => 'rolesNames',
        17 => 'portalsIds',
        18 => 'portalsRecordList',
        19 => 'portalsNames',
        20 => 'portalRolesIds',
        21 => 'portalRolesRecordList',
        22 => 'portalRolesNames',
        23 => 'contactId',
        24 => 'contactName',
        25 => 'accountsIds',
        26 => 'accountsRecordList',
        27 => 'accountsNames',
        28 => 'workingTimeCalendarId',
        29 => 'workingTimeCalendarName'
      ]
    ],
    'links' => (object) [
      'forbidden' => [
        0 => 'userData'
      ],
      'internal' => [],
      'onlyAdmin' => [
        0 => 'defaultTeam',
        1 => 'roles',
        2 => 'portalRoles',
        3 => 'dashboardTemplate',
        4 => 'preferences',
        5 => 'accounts'
      ],
      'readOnly' => [],
      'nonAdminReadOnly' => [
        0 => 'teams',
        1 => 'workingTimeRanges'
      ]
    ]
  ],
  'Webhook' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'entityType',
        1 => 'type',
        2 => 'field',
        3 => 'secretKey',
        4 => 'createdAt',
        5 => 'modifiedAt',
        6 => 'createdBy',
        7 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'entityType',
        1 => 'type',
        2 => 'field',
        3 => 'secretKey',
        4 => 'createdAt',
        5 => 'modifiedAt',
        6 => 'createdById',
        7 => 'createdByName',
        8 => 'modifiedById',
        9 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'WebhookEventQueueItem' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'WorkingTimeCalendar' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'teams',
        1 => 'createdAt',
        2 => 'modifiedAt',
        3 => 'createdBy',
        4 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'teamsIds',
        1 => 'teamsRecordList',
        2 => 'teamsNames',
        3 => 'createdAt',
        4 => 'modifiedAt',
        5 => 'createdById',
        6 => 'createdByName',
        7 => 'modifiedById',
        8 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'teams'
      ],
      'nonAdminReadOnly' => []
    ]
  ],
  'WorkingTimeRange' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'Account' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy',
        4 => 'originalLead',
        5 => 'targetListIsOptedOut',
        6 => 'billingAddressMap',
        7 => 'shippingAddressMap'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName',
        6 => 'originalLeadId',
        7 => 'originalLeadName',
        8 => 'targetListIsOptedOut',
        9 => 'billingAddressMap',
        10 => 'shippingAddressMap'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'Call' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'account',
        1 => 'createdAt',
        2 => 'modifiedAt',
        3 => 'createdBy',
        4 => 'modifiedBy',
        5 => 'googleCalendar',
        6 => 'googleCalendarEventId'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'accountId',
        1 => 'accountName',
        2 => 'createdAt',
        3 => 'modifiedAt',
        4 => 'createdById',
        5 => 'createdByName',
        6 => 'modifiedById',
        7 => 'modifiedByName',
        8 => 'googleCalendarId',
        9 => 'googleCalendarName',
        10 => 'googleCalendarEventId'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'Campaign' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy',
        4 => 'sentCount',
        5 => 'openedCount',
        6 => 'clickedCount',
        7 => 'optedInCount',
        8 => 'optedOutCount',
        9 => 'bouncedCount',
        10 => 'hardBouncedCount',
        11 => 'softBouncedCount',
        12 => 'leadCreatedCount',
        13 => 'openedPercentage',
        14 => 'clickedPercentage',
        15 => 'optedOutPercentage',
        16 => 'bouncedPercentage',
        17 => 'revenue',
        18 => 'revenueCurrency',
        19 => 'revenueConverted',
        20 => 'budgetConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName',
        6 => 'sentCount',
        7 => 'openedCount',
        8 => 'clickedCount',
        9 => 'optedInCount',
        10 => 'optedOutCount',
        11 => 'bouncedCount',
        12 => 'hardBouncedCount',
        13 => 'softBouncedCount',
        14 => 'leadCreatedCount',
        15 => 'openedPercentage',
        16 => 'clickedPercentage',
        17 => 'optedOutPercentage',
        18 => 'bouncedPercentage',
        19 => 'revenueCurrency',
        20 => 'revenue',
        21 => 'revenueCurrency',
        22 => 'revenueConverted',
        23 => 'budgetConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'CampaignLogRecord' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'createdBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'createdById',
        2 => 'createdByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'CampaignTrackingUrl' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'urlToUse',
        1 => 'modifiedAt',
        2 => 'modifiedBy',
        3 => 'createdAt',
        4 => 'createdBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'urlToUse',
        1 => 'modifiedAt',
        2 => 'modifiedById',
        3 => 'modifiedByName',
        4 => 'createdAt',
        5 => 'createdById',
        6 => 'createdByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'Case' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'inboundEmail',
        1 => 'createdAt',
        2 => 'modifiedAt',
        3 => 'createdBy',
        4 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'inboundEmailId',
        1 => 'inboundEmailName',
        2 => 'createdAt',
        3 => 'modifiedAt',
        4 => 'createdById',
        5 => 'createdByName',
        6 => 'modifiedById',
        7 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'inboundEmail'
      ],
      'nonAdminReadOnly' => []
    ]
  ],
  'Contact' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'accountType',
        1 => 'createdAt',
        2 => 'modifiedAt',
        3 => 'createdBy',
        4 => 'modifiedBy',
        5 => 'portalUser',
        6 => 'hasPortalUser',
        7 => 'originalLead',
        8 => 'targetListIsOptedOut',
        9 => 'addressMap'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'accountType',
        1 => 'createdAt',
        2 => 'modifiedAt',
        3 => 'createdById',
        4 => 'createdByName',
        5 => 'modifiedById',
        6 => 'modifiedByName',
        7 => 'portalUserId',
        8 => 'portalUserName',
        9 => 'hasPortalUser',
        10 => 'originalLeadId',
        11 => 'originalLeadName',
        12 => 'targetListIsOptedOut',
        13 => 'addressMap'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'Document' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'DocumentFolder' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'EmailQueueItem' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'massEmail',
        1 => 'status',
        2 => 'attemptCount',
        3 => 'target',
        4 => 'createdAt',
        5 => 'sentAt',
        6 => 'emailAddress'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'massEmailId',
        1 => 'massEmailName',
        2 => 'status',
        3 => 'attemptCount',
        4 => 'targetId',
        5 => 'targetType',
        6 => 'targetName',
        7 => 'createdAt',
        8 => 'sentAt',
        9 => 'emailAddress'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'KnowledgeBaseArticle' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'KnowledgeBaseCategory' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'Lead' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'opportunityAmountConverted',
        1 => 'convertedAt',
        2 => 'createdAt',
        3 => 'modifiedAt',
        4 => 'createdBy',
        5 => 'modifiedBy',
        6 => 'targetListIsOptedOut',
        7 => 'addressMap'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'opportunityAmountConverted',
        1 => 'convertedAt',
        2 => 'createdAt',
        3 => 'modifiedAt',
        4 => 'createdById',
        5 => 'createdByName',
        6 => 'modifiedById',
        7 => 'modifiedByName',
        8 => 'targetListIsOptedOut',
        9 => 'addressMap'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'MassEmail' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'Meeting' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'account',
        1 => 'createdAt',
        2 => 'modifiedAt',
        3 => 'createdBy',
        4 => 'modifiedBy',
        5 => 'googleCalendar',
        6 => 'googleCalendarEventId'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'accountId',
        1 => 'accountName',
        2 => 'createdAt',
        3 => 'modifiedAt',
        4 => 'createdById',
        5 => 'createdByName',
        6 => 'modifiedById',
        7 => 'modifiedByName',
        8 => 'googleCalendarId',
        9 => 'googleCalendarName',
        10 => 'googleCalendarEventId'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'Opportunity' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'amount',
        1 => 'amountConverted',
        2 => 'amountWeightedConverted',
        3 => 'originalLead',
        4 => 'createdAt',
        5 => 'modifiedAt',
        6 => 'createdBy',
        7 => 'modifiedBy',
        8 => 'amountCurrency',
        9 => 'estimationConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'amountCurrency',
        1 => 'amount',
        2 => 'amountConverted',
        3 => 'amountWeightedConverted',
        4 => 'originalLeadId',
        5 => 'originalLeadName',
        6 => 'createdAt',
        7 => 'modifiedAt',
        8 => 'createdById',
        9 => 'createdByName',
        10 => 'modifiedById',
        11 => 'modifiedByName',
        12 => 'amountCurrency',
        13 => 'estimationConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'Target' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy',
        4 => 'addressMap'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName',
        6 => 'addressMap'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'TargetList' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'entryCount',
        1 => 'optedOutCount',
        2 => 'createdAt',
        3 => 'modifiedAt',
        4 => 'createdBy',
        5 => 'modifiedBy',
        6 => 'targetStatus',
        7 => 'isOptedOut'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'entryCount',
        1 => 'optedOutCount',
        2 => 'createdAt',
        3 => 'modifiedAt',
        4 => 'createdById',
        5 => 'createdByName',
        6 => 'modifiedById',
        7 => 'modifiedByName',
        8 => 'targetStatus',
        9 => 'isOptedOut'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'Task' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'dateCompleted',
        1 => 'isOverdue',
        2 => 'account',
        3 => 'contact',
        4 => 'createdAt',
        5 => 'modifiedAt',
        6 => 'createdBy',
        7 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'dateCompleted',
        1 => 'isOverdue',
        2 => 'accountId',
        3 => 'accountName',
        4 => 'contactId',
        5 => 'contactName',
        6 => 'createdAt',
        7 => 'modifiedAt',
        8 => 'createdById',
        9 => 'createdByName',
        10 => 'modifiedById',
        11 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'Project' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'ProjectTask' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'PushSubscriber' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'UseCase' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'account',
        1 => 'quoteStatus',
        2 => 'taxAmount',
        3 => 'discountAmount',
        4 => 'preDiscountedAmount',
        5 => 'grandTotalAmount',
        6 => 'createdAt',
        7 => 'modifiedAt',
        8 => 'createdBy',
        9 => 'modifiedBy',
        10 => 'taxAmountCurrency',
        11 => 'taxAmountConverted',
        12 => 'discountAmountCurrency',
        13 => 'discountAmountConverted',
        14 => 'amountConverted',
        15 => 'preDiscountedAmountCurrency',
        16 => 'preDiscountedAmountConverted',
        17 => 'grandTotalAmountCurrency',
        18 => 'grandTotalAmountConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'accountId',
        1 => 'accountName',
        2 => 'quoteStatus',
        3 => 'taxAmountCurrency',
        4 => 'taxAmount',
        5 => 'discountAmountCurrency',
        6 => 'discountAmount',
        7 => 'preDiscountedAmountCurrency',
        8 => 'preDiscountedAmount',
        9 => 'grandTotalAmountCurrency',
        10 => 'grandTotalAmount',
        11 => 'createdAt',
        12 => 'modifiedAt',
        13 => 'createdById',
        14 => 'createdByName',
        15 => 'modifiedById',
        16 => 'modifiedByName',
        17 => 'taxAmountCurrency',
        18 => 'taxAmountConverted',
        19 => 'discountAmountCurrency',
        20 => 'discountAmountConverted',
        21 => 'amountConverted',
        22 => 'preDiscountedAmountCurrency',
        23 => 'preDiscountedAmountConverted',
        24 => 'grandTotalAmountCurrency',
        25 => 'grandTotalAmountConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'UseCaseItem' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'useCase',
        1 => 'account',
        2 => 'product',
        3 => 'amount',
        4 => 'weight',
        5 => 'taxRate',
        6 => 'order',
        7 => 'createdAt',
        8 => 'modifiedAt',
        9 => 'createdBy',
        10 => 'modifiedBy',
        11 => 'productCode',
        12 => 'unit',
        13 => 'listPriceConverted',
        14 => 'unitPriceConverted',
        15 => 'amountCurrency',
        16 => 'amountConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'useCaseId',
        1 => 'useCaseName',
        2 => 'accountId',
        3 => 'accountName',
        4 => 'productId',
        5 => 'productName',
        6 => 'amountCurrency',
        7 => 'amount',
        8 => 'weight',
        9 => 'taxRate',
        10 => 'order',
        11 => 'createdAt',
        12 => 'modifiedAt',
        13 => 'createdById',
        14 => 'createdByName',
        15 => 'modifiedById',
        16 => 'modifiedByName',
        17 => 'productCode',
        18 => 'unit',
        19 => 'listPriceConverted',
        20 => 'unitPriceConverted',
        21 => 'amountCurrency',
        22 => 'amountConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'Product' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy',
        4 => 'totalWarehouseQuantity',
        5 => 'totalReservedQuantity',
        6 => 'totalAvailableQuantity',
        7 => 'averagePrice',
        8 => 'totalPrice',
        9 => 'priceAConverted',
        10 => 'priceBConverted',
        11 => 'priceCConverted',
        12 => 'priceEndUserConverted',
        13 => 'priceRentConverted',
        14 => 'priceDamageConverted',
        15 => 'costPriceConverted',
        16 => 'costPriceWithTaxConverted',
        17 => 'salesPriceConverted',
        18 => 'salesPriceWithTaxConverted',
        19 => 'priceListPriceConverted',
        20 => 'averagePriceCurrency',
        21 => 'averagePriceConverted',
        22 => 'totalPriceCurrency',
        23 => 'totalPriceConverted',
        24 => 'priceJesenoConvertedConverted',
        25 => 'componentsCostConverted',
        26 => 'listPriceConverted',
        27 => 'unitPriceConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName',
        6 => 'totalWarehouseQuantity',
        7 => 'totalReservedQuantity',
        8 => 'totalAvailableQuantity',
        9 => 'averagePriceCurrency',
        10 => 'averagePrice',
        11 => 'totalPriceCurrency',
        12 => 'totalPrice',
        13 => 'priceAConverted',
        14 => 'priceBConverted',
        15 => 'priceCConverted',
        16 => 'priceEndUserConverted',
        17 => 'priceRentConverted',
        18 => 'priceDamageConverted',
        19 => 'costPriceConverted',
        20 => 'costPriceWithTaxConverted',
        21 => 'salesPriceConverted',
        22 => 'salesPriceWithTaxConverted',
        23 => 'priceListPriceConverted',
        24 => 'averagePriceCurrency',
        25 => 'averagePriceConverted',
        26 => 'totalPriceCurrency',
        27 => 'totalPriceConverted',
        28 => 'priceJesenoConvertedConverted',
        29 => 'componentsCostConverted',
        30 => 'listPriceConverted',
        31 => 'unitPriceConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'BpmnFlowchart' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'elementsDataHash',
        1 => 'hasNoneStartEvent',
        2 => 'eventStartIdList',
        3 => 'eventStartAllIdList',
        4 => 'createdAt',
        5 => 'modifiedAt',
        6 => 'createdBy',
        7 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'elementsDataHash',
        1 => 'hasNoneStartEvent',
        2 => 'eventStartIdList',
        3 => 'eventStartAllIdList',
        4 => 'createdAt',
        5 => 'modifiedAt',
        6 => 'createdById',
        7 => 'createdByName',
        8 => 'modifiedById',
        9 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'BpmnProcess' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'status',
        1 => 'flowchartData',
        2 => 'flowchartElementsDataHash',
        3 => 'flowchartVisualization',
        4 => 'parentProcess',
        5 => 'parentProcessFlowNode',
        6 => 'rootProcess',
        7 => 'createdEntitiesData',
        8 => 'variables',
        9 => 'createdAt',
        10 => 'modifiedAt',
        11 => 'endedAt',
        12 => 'createdBy',
        13 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'status',
        1 => 'flowchartData',
        2 => 'flowchartElementsDataHash',
        3 => 'flowchartVisualization',
        4 => 'parentProcessId',
        5 => 'parentProcessName',
        6 => 'parentProcessFlowNodeId',
        7 => 'parentProcessFlowNodeName',
        8 => 'rootProcessId',
        9 => 'rootProcessName',
        10 => 'createdEntitiesData',
        11 => 'variables',
        12 => 'createdAt',
        13 => 'modifiedAt',
        14 => 'endedAt',
        15 => 'createdById',
        16 => 'createdByName',
        17 => 'modifiedById',
        18 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'parentProcess',
        1 => 'childProcesses'
      ],
      'nonAdminReadOnly' => []
    ]
  ],
  'BpmnUserTask' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'name',
        1 => 'actionType',
        2 => 'target',
        3 => 'process',
        4 => 'isResolved',
        5 => 'instructions',
        6 => 'createdAt',
        7 => 'modifiedAt',
        8 => 'createdBy',
        9 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'name',
        1 => 'actionType',
        2 => 'targetId',
        3 => 'targetType',
        4 => 'targetName',
        5 => 'processId',
        6 => 'processName',
        7 => 'isResolved',
        8 => 'instructions',
        9 => 'createdAt',
        10 => 'modifiedAt',
        11 => 'createdById',
        12 => 'createdByName',
        13 => 'modifiedById',
        14 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'Report' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [
        0 => 'internalClassName'
      ],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'internalClassName',
        1 => 'createdAt',
        2 => 'modifiedAt',
        3 => 'createdBy',
        4 => 'modifiedBy',
        5 => 'emailSendingLastDateSent'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [
        0 => 'internalClassName'
      ],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'internalClassName',
        1 => 'createdAt',
        2 => 'modifiedAt',
        3 => 'createdById',
        4 => 'createdByName',
        5 => 'modifiedById',
        6 => 'modifiedByName',
        7 => 'emailSendingLastDateSent'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [
        0 => 'portals'
      ],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'ReportCategory' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'ReportFilter' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'ReportPanel' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'reportEntityType',
        1 => 'createdAt',
        2 => 'modifiedAt',
        3 => 'createdBy',
        4 => 'modifiedBy',
        5 => 'reportType'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'reportEntityType',
        1 => 'createdAt',
        2 => 'modifiedAt',
        3 => 'createdById',
        4 => 'createdByName',
        5 => 'modifiedById',
        6 => 'modifiedByName',
        7 => 'reportType'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'Workflow' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'isInternal',
        1 => 'lastRun',
        2 => 'createdAt',
        3 => 'modifiedAt',
        4 => 'createdBy',
        5 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'isInternal',
        1 => 'lastRun',
        2 => 'createdAt',
        3 => 'modifiedAt',
        4 => 'createdById',
        5 => 'createdByName',
        6 => 'modifiedById',
        7 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'WorkflowCategory' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'WorkflowLogRecord' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'createdBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'createdById',
        2 => 'createdByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'RecordRecurrence' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'status',
        1 => 'createdRecords',
        2 => 'lastGenerated',
        3 => 'createdAt',
        4 => 'createdBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'status',
        1 => 'createdRecordsIds',
        2 => 'createdRecordsRecordList',
        3 => 'createdRecordsNames',
        4 => 'lastGenerated',
        5 => 'createdAt',
        6 => 'createdById',
        7 => 'createdByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'ProductCategory' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'TaxClass' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'AdvanceDeductionItem' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'invoice',
        1 => 'createdAt',
        2 => 'modifiedAt',
        3 => 'createdBy',
        4 => 'modifiedBy',
        5 => 'unitPriceConverted',
        6 => 'amountConverted',
        7 => 'taxAmountConverted',
        8 => 'amountWithTaxConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'invoiceId',
        1 => 'invoiceName',
        2 => 'createdAt',
        3 => 'modifiedAt',
        4 => 'createdById',
        5 => 'createdByName',
        6 => 'modifiedById',
        7 => 'modifiedByName',
        8 => 'unitPriceConverted',
        9 => 'amountConverted',
        10 => 'taxAmountConverted',
        11 => 'amountWithTaxConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'DeliveryNote' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy',
        4 => 'recieverAddressMap'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName',
        6 => 'recieverAddressMap'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'HandoverProtocol' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy',
        4 => 'senderAddressMap',
        5 => 'recieverAddressMap'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName',
        6 => 'senderAddressMap',
        7 => 'recieverAddressMap'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'Invoice' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'taxAmount',
        1 => 'discountAmount',
        2 => 'preDiscountedAmount',
        3 => 'grandTotalAmount',
        4 => 'weight',
        5 => 'createdAt',
        6 => 'modifiedAt',
        7 => 'createdBy',
        8 => 'modifiedBy',
        9 => 'discountAmountCurrency',
        10 => 'remainsToPay',
        11 => 'summaryVatRates',
        12 => 'grandTotalAmountCurrency',
        13 => 'preDiscountedAmountCurrency',
        14 => 'taxAmountCurrency',
        15 => 'paidAdvances',
        16 => 'paid',
        17 => 'remainingToPay',
        18 => 'billingAddressMap',
        19 => 'shippingAddressMap',
        20 => 'shippingCostConverted',
        21 => 'taxAmountConverted',
        22 => 'discountAmountConverted',
        23 => 'amountConverted',
        24 => 'preDiscountedAmountConverted',
        25 => 'grandTotalAmountConverted',
        26 => 'partiallyPaidAmountConverted',
        27 => 'remainsToPayCurrency',
        28 => 'remainsToPayConverted',
        29 => 'paidAdvancesCurrency',
        30 => 'paidAdvancesConverted',
        31 => 'paidCurrency',
        32 => 'paidConverted',
        33 => 'remainingToPayCurrency',
        34 => 'remainingToPayConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'taxAmountCurrency',
        1 => 'taxAmount',
        2 => 'discountAmountCurrency',
        3 => 'discountAmount',
        4 => 'preDiscountedAmountCurrency',
        5 => 'preDiscountedAmount',
        6 => 'grandTotalAmountCurrency',
        7 => 'grandTotalAmount',
        8 => 'weight',
        9 => 'createdAt',
        10 => 'modifiedAt',
        11 => 'createdById',
        12 => 'createdByName',
        13 => 'modifiedById',
        14 => 'modifiedByName',
        15 => 'discountAmountCurrency',
        16 => 'remainsToPayCurrency',
        17 => 'remainsToPay',
        18 => 'summaryVatRatesIds',
        19 => 'summaryVatRatesRecordList',
        20 => 'summaryVatRatesNames',
        21 => 'grandTotalAmountCurrency',
        22 => 'preDiscountedAmountCurrency',
        23 => 'taxAmountCurrency',
        24 => 'paidAdvancesCurrency',
        25 => 'paidAdvances',
        26 => 'paidCurrency',
        27 => 'paid',
        28 => 'remainingToPayCurrency',
        29 => 'remainingToPay',
        30 => 'billingAddressMap',
        31 => 'shippingAddressMap',
        32 => 'shippingCostConverted',
        33 => 'taxAmountConverted',
        34 => 'discountAmountConverted',
        35 => 'amountConverted',
        36 => 'preDiscountedAmountConverted',
        37 => 'grandTotalAmountConverted',
        38 => 'partiallyPaidAmountConverted',
        39 => 'remainsToPayCurrency',
        40 => 'remainsToPayConverted',
        41 => 'paidAdvancesCurrency',
        42 => 'paidAdvancesConverted',
        43 => 'paidCurrency',
        44 => 'paidConverted',
        45 => 'remainingToPayCurrency',
        46 => 'remainingToPayConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'InvoiceItem' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'weight',
        1 => 'createdAt',
        2 => 'modifiedAt',
        3 => 'createdBy',
        4 => 'modifiedBy',
        5 => 'unitPriceConverted',
        6 => 'amountConverted',
        7 => 'taxAmountConverted',
        8 => 'amountWithTaxConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'weight',
        1 => 'createdAt',
        2 => 'modifiedAt',
        3 => 'createdById',
        4 => 'createdByName',
        5 => 'modifiedById',
        6 => 'modifiedByName',
        7 => 'unitPriceConverted',
        8 => 'amountConverted',
        9 => 'taxAmountConverted',
        10 => 'amountWithTaxConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'PurchaseOrder' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'weight',
        1 => 'createdAt',
        2 => 'modifiedAt',
        3 => 'createdBy',
        4 => 'modifiedBy',
        5 => 'billingAddressMap',
        6 => 'taxAmountConverted',
        7 => 'amountConverted',
        8 => 'grandTotalAmountConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'weight',
        1 => 'createdAt',
        2 => 'modifiedAt',
        3 => 'createdById',
        4 => 'createdByName',
        5 => 'modifiedById',
        6 => 'modifiedByName',
        7 => 'billingAddressMap',
        8 => 'taxAmountConverted',
        9 => 'amountConverted',
        10 => 'grandTotalAmountConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'PurchaseOrderItem' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'purchaseOrder',
        1 => 'weight',
        2 => 'createdAt',
        3 => 'modifiedAt',
        4 => 'createdBy',
        5 => 'modifiedBy',
        6 => 'unitPriceConverted',
        7 => 'amountConverted',
        8 => 'taxAmountConverted',
        9 => 'amountWithTaxConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'purchaseOrderId',
        1 => 'purchaseOrderName',
        2 => 'weight',
        3 => 'createdAt',
        4 => 'modifiedAt',
        5 => 'createdById',
        6 => 'createdByName',
        7 => 'modifiedById',
        8 => 'modifiedByName',
        9 => 'unitPriceConverted',
        10 => 'amountConverted',
        11 => 'taxAmountConverted',
        12 => 'amountWithTaxConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'Quote' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'number',
        1 => 'weight',
        2 => 'createdAt',
        3 => 'modifiedAt',
        4 => 'createdBy',
        5 => 'modifiedBy',
        6 => 'priceC',
        7 => 'billingAddressMap',
        8 => 'shippingAddressMap',
        9 => 'shippingCostConverted',
        10 => 'taxAmountConverted',
        11 => 'discountAmountConverted',
        12 => 'amountConverted',
        13 => 'preDiscountedAmountConverted',
        14 => 'grandTotalAmountConverted',
        15 => 'accomodationCostConverted',
        16 => 'priceCCurrency',
        17 => 'priceCConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'number',
        1 => 'weight',
        2 => 'createdAt',
        3 => 'modifiedAt',
        4 => 'createdById',
        5 => 'createdByName',
        6 => 'modifiedById',
        7 => 'modifiedByName',
        8 => 'priceCCurrency',
        9 => 'priceC',
        10 => 'billingAddressMap',
        11 => 'shippingAddressMap',
        12 => 'shippingCostConverted',
        13 => 'taxAmountConverted',
        14 => 'discountAmountConverted',
        15 => 'amountConverted',
        16 => 'preDiscountedAmountConverted',
        17 => 'grandTotalAmountConverted',
        18 => 'accomodationCostConverted',
        19 => 'priceCCurrency',
        20 => 'priceCConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'QuoteItem' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'quote',
        1 => 'weight',
        2 => 'createdAt',
        3 => 'modifiedAt',
        4 => 'createdBy',
        5 => 'modifiedBy',
        6 => 'unit',
        7 => 'kod',
        8 => 'imageId',
        9 => 'productDescription',
        10 => 'listPriceConverted',
        11 => 'listPriceWithTaxConverted',
        12 => 'unitPriceConverted',
        13 => 'unitPriceWithTaxConverted',
        14 => 'amountConverted',
        15 => 'amountWithTaxConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'quoteId',
        1 => 'quoteName',
        2 => 'weight',
        3 => 'createdAt',
        4 => 'modifiedAt',
        5 => 'createdById',
        6 => 'createdByName',
        7 => 'modifiedById',
        8 => 'modifiedByName',
        9 => 'unit',
        10 => 'kod',
        11 => 'imageId',
        12 => 'productDescription',
        13 => 'listPriceConverted',
        14 => 'listPriceWithTaxConverted',
        15 => 'unitPriceConverted',
        16 => 'unitPriceWithTaxConverted',
        17 => 'amountConverted',
        18 => 'amountWithTaxConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'SalesOrder' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'number',
        1 => 'weight',
        2 => 'createdAt',
        3 => 'modifiedAt',
        4 => 'createdBy',
        5 => 'modifiedBy',
        6 => 'summaryVatRates',
        7 => 'order',
        8 => 'typePrice',
        9 => 'testAmount',
        10 => 'saleSorderReclamation',
        11 => 'warehouseItem',
        12 => 'warehouseItemsList',
        13 => 'itemsList',
        14 => 'reservedQuantity',
        15 => 'reservQuantity',
        16 => 'billingAddressMap',
        17 => 'shippingAddressMap',
        18 => 'shippingCostConverted',
        19 => 'taxAmountConverted',
        20 => 'discountAmountConverted',
        21 => 'amountConverted',
        22 => 'preDiscountedAmountConverted',
        23 => 'grandTotalAmountConverted',
        24 => 'orderAmountConverted',
        25 => 'accomodationCostConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'number',
        1 => 'weight',
        2 => 'createdAt',
        3 => 'modifiedAt',
        4 => 'createdById',
        5 => 'createdByName',
        6 => 'modifiedById',
        7 => 'modifiedByName',
        8 => 'summaryVatRatesIds',
        9 => 'summaryVatRatesRecordList',
        10 => 'summaryVatRatesNames',
        11 => 'order',
        12 => 'typePrice',
        13 => 'testAmount',
        14 => 'saleSorderReclamation',
        15 => 'warehouseItem',
        16 => 'warehouseItemsList',
        17 => 'itemsList',
        18 => 'reservedQuantity',
        19 => 'reservQuantity',
        20 => 'billingAddressMap',
        21 => 'shippingAddressMap',
        22 => 'shippingCostConverted',
        23 => 'taxAmountConverted',
        24 => 'discountAmountConverted',
        25 => 'amountConverted',
        26 => 'preDiscountedAmountConverted',
        27 => 'grandTotalAmountConverted',
        28 => 'orderAmountConverted',
        29 => 'accomodationCostConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'SalesOrderItem' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'salesOrder',
        1 => 'weight',
        2 => 'createdAt',
        3 => 'modifiedAt',
        4 => 'createdBy',
        5 => 'modifiedBy',
        6 => 'kod',
        7 => 'imageId',
        8 => 'unit',
        9 => 'productDescription',
        10 => 'listPriceConverted',
        11 => 'listPriceWithTaxConverted',
        12 => 'unitPriceConverted',
        13 => 'unitPriceWithTaxConverted',
        14 => 'amountConverted',
        15 => 'taxAmountConverted',
        16 => 'amountWithTaxConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'salesOrderId',
        1 => 'salesOrderName',
        2 => 'weight',
        3 => 'createdAt',
        4 => 'modifiedAt',
        5 => 'createdById',
        6 => 'createdByName',
        7 => 'modifiedById',
        8 => 'modifiedByName',
        9 => 'kod',
        10 => 'imageId',
        11 => 'unit',
        12 => 'productDescription',
        13 => 'listPriceConverted',
        14 => 'listPriceWithTaxConverted',
        15 => 'unitPriceConverted',
        16 => 'unitPriceWithTaxConverted',
        17 => 'amountConverted',
        18 => 'taxAmountConverted',
        19 => 'amountWithTaxConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'SupplierInvoice' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'weight',
        1 => 'createdAt',
        2 => 'modifiedAt',
        3 => 'createdBy',
        4 => 'modifiedBy',
        5 => 'processed',
        6 => 'summaryVatRates',
        7 => 'billingAddressMap',
        8 => 'taxAmountConverted',
        9 => 'amountConverted',
        10 => 'grandTotalAmountConverted',
        11 => 'shippingCostConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'weight',
        1 => 'createdAt',
        2 => 'modifiedAt',
        3 => 'createdById',
        4 => 'createdByName',
        5 => 'modifiedById',
        6 => 'modifiedByName',
        7 => 'processed',
        8 => 'summaryVatRatesIds',
        9 => 'summaryVatRatesRecordList',
        10 => 'summaryVatRatesNames',
        11 => 'billingAddressMap',
        12 => 'taxAmountConverted',
        13 => 'amountConverted',
        14 => 'grandTotalAmountConverted',
        15 => 'shippingCostConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'SupplierInvoiceItem' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'weight',
        1 => 'createdAt',
        2 => 'modifiedAt',
        3 => 'createdBy',
        4 => 'modifiedBy',
        5 => 'unitPriceConverted',
        6 => 'amountConverted',
        7 => 'taxAmountConverted',
        8 => 'amountWithTaxConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'weight',
        1 => 'createdAt',
        2 => 'modifiedAt',
        3 => 'createdById',
        4 => 'createdByName',
        5 => 'modifiedById',
        6 => 'modifiedByName',
        7 => 'unitPriceConverted',
        8 => 'amountConverted',
        9 => 'taxAmountConverted',
        10 => 'amountWithTaxConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'UnreliablePayer' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'VatNumberValidation' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'Attendance' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'isAllDay',
        1 => 'createdAt',
        2 => 'modifiedAt',
        3 => 'createdBy',
        4 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'isAllDay',
        1 => 'createdAt',
        2 => 'modifiedAt',
        3 => 'createdById',
        4 => 'createdByName',
        5 => 'modifiedById',
        6 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'EducationAndTrainingRecord' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy',
        4 => 'dateOfTheNextInspection'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName',
        6 => 'dateOfTheNextInspection'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'HumanResource' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy',
        4 => 'phoneNumber',
        5 => 'emailAddress',
        6 => 'permanentResidenceMap',
        7 => 'amountOfBasicSalaryConverted',
        8 => 'variableSalaryConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName',
        6 => 'phoneNumber',
        7 => 'emailAddress',
        8 => 'permanentResidenceMap',
        9 => 'amountOfBasicSalaryConverted',
        10 => 'variableSalaryConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'MedicalExamination' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy',
        4 => 'dateOfTheNextInspection'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName',
        6 => 'dateOfTheNextInspection'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'OtherEvent' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy',
        4 => 'dateOfTheNextInspection'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName',
        6 => 'dateOfTheNextInspection'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'Password' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'Vacation' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'VacationRequest' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy',
        4 => 'numberOfDaysLeft',
        5 => 'numberOfDaysLeftBefore',
        6 => 'humanResource',
        7 => 'timeBeforeVacation',
        8 => 'vacationDays'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName',
        6 => 'numberOfDaysLeft',
        7 => 'numberOfDaysLeftBefore',
        8 => 'humanResourceId',
        9 => 'humanResourceName',
        10 => 'timeBeforeVacation',
        11 => 'vacationDays'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'VacationRequestApprovalItem' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'ProformaInvoice' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'weight',
        1 => 'createdAt',
        2 => 'modifiedAt',
        3 => 'createdBy',
        4 => 'modifiedBy',
        5 => 'remainsToPay',
        6 => 'summaryVatRates',
        7 => 'paid',
        8 => 'remainingToPay',
        9 => 'billingAddressMap',
        10 => 'shippingAddressMap',
        11 => 'taxAmountConverted',
        12 => 'discountAmountConverted',
        13 => 'amountConverted',
        14 => 'preDiscountedAmountConverted',
        15 => 'grandTotalAmountConverted',
        16 => 'partiallyPaidAmountConverted',
        17 => 'remainsToPayCurrency',
        18 => 'remainsToPayConverted',
        19 => 'shippingCostConverted',
        20 => 'paidCurrency',
        21 => 'paidConverted',
        22 => 'remainingToPayCurrency',
        23 => 'remainingToPayConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'weight',
        1 => 'createdAt',
        2 => 'modifiedAt',
        3 => 'createdById',
        4 => 'createdByName',
        5 => 'modifiedById',
        6 => 'modifiedByName',
        7 => 'remainsToPayCurrency',
        8 => 'remainsToPay',
        9 => 'summaryVatRatesIds',
        10 => 'summaryVatRatesRecordList',
        11 => 'summaryVatRatesNames',
        12 => 'paidCurrency',
        13 => 'paid',
        14 => 'remainingToPayCurrency',
        15 => 'remainingToPay',
        16 => 'billingAddressMap',
        17 => 'shippingAddressMap',
        18 => 'taxAmountConverted',
        19 => 'discountAmountConverted',
        20 => 'amountConverted',
        21 => 'preDiscountedAmountConverted',
        22 => 'grandTotalAmountConverted',
        23 => 'partiallyPaidAmountConverted',
        24 => 'remainsToPayCurrency',
        25 => 'remainsToPayConverted',
        26 => 'shippingCostConverted',
        27 => 'paidCurrency',
        28 => 'paidConverted',
        29 => 'remainingToPayCurrency',
        30 => 'remainingToPayConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'ReceivedProformaInvoice' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'number',
        1 => 'weight',
        2 => 'createdAt',
        3 => 'modifiedAt',
        4 => 'createdBy',
        5 => 'modifiedBy',
        6 => 'summaryVatRates',
        7 => 'billingAddressMap',
        8 => 'taxAmountConverted',
        9 => 'amountConverted',
        10 => 'grandTotalAmountConverted',
        11 => 'shippingCostConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'number',
        1 => 'weight',
        2 => 'createdAt',
        3 => 'modifiedAt',
        4 => 'createdById',
        5 => 'createdByName',
        6 => 'modifiedById',
        7 => 'modifiedByName',
        8 => 'summaryVatRatesIds',
        9 => 'summaryVatRatesRecordList',
        10 => 'summaryVatRatesNames',
        11 => 'billingAddressMap',
        12 => 'taxAmountConverted',
        13 => 'amountConverted',
        14 => 'grandTotalAmountConverted',
        15 => 'shippingCostConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'PriceList' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy',
        4 => 'productPriceConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName',
        6 => 'productPriceConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'GoodsIssue' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy',
        4 => 'warehouseType',
        5 => 'items',
        6 => 'numberA'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName',
        6 => 'warehouseType',
        7 => 'itemsIds',
        8 => 'itemsRecordList',
        9 => 'itemsNames',
        10 => 'numberA'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'GoodsReceipt' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'warehouseType',
        1 => 'createdAt',
        2 => 'modifiedAt',
        3 => 'createdBy',
        4 => 'modifiedBy',
        5 => 'numberA'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'warehouseType',
        1 => 'createdAt',
        2 => 'modifiedAt',
        3 => 'createdById',
        4 => 'createdByName',
        5 => 'modifiedById',
        6 => 'modifiedByName',
        7 => 'numberA'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'Reclamation' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy',
        4 => 'goodsReceipt',
        5 => 'goodsIssue'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName',
        6 => 'goodsReceiptId',
        7 => 'goodsReceiptType',
        8 => 'goodsReceiptName',
        9 => 'goodsIssueId',
        10 => 'goodsIssueName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'SupplierReclamation' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'SupplierOrder' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'SupplierOrderItem' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy',
        4 => 'supplierOrder',
        5 => 'deliveredBefore'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName',
        6 => 'supplierOrderId',
        7 => 'supplierOrderName',
        8 => 'deliveredBefore'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'Warehouse' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy',
        4 => 'totalValue',
        5 => 'quantity',
        6 => 'availableQuantity',
        7 => 'availableBrno',
        8 => 'availablePv',
        9 => 'addressMap',
        10 => 'totalValueCurrency',
        11 => 'totalValueConverted',
        12 => 'componentsCostConverted',
        13 => 'costPriceConverted',
        14 => 'costPriceWithTaxConverted',
        15 => 'priceAConverted',
        16 => 'priceBConverted',
        17 => 'priceCConverted',
        18 => 'priceDamageConverted',
        19 => 'priceEndUserConverted',
        20 => 'priceJesenoConvertedConverted',
        21 => 'priceListPriceConverted',
        22 => 'priceRentConverted',
        23 => 'salesPriceConverted',
        24 => 'salesPriceWithTaxConverted',
        25 => 'totalPriceConverted',
        26 => 'listPriceConverted',
        27 => 'unitPriceConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName',
        6 => 'totalValueCurrency',
        7 => 'totalValue',
        8 => 'quantity',
        9 => 'availableQuantity',
        10 => 'availableBrno',
        11 => 'availablePv',
        12 => 'addressMap',
        13 => 'totalValueCurrency',
        14 => 'totalValueConverted',
        15 => 'componentsCostConverted',
        16 => 'costPriceConverted',
        17 => 'costPriceWithTaxConverted',
        18 => 'priceAConverted',
        19 => 'priceBConverted',
        20 => 'priceCConverted',
        21 => 'priceDamageConverted',
        22 => 'priceEndUserConverted',
        23 => 'priceJesenoConvertedConverted',
        24 => 'priceListPriceConverted',
        25 => 'priceRentConverted',
        26 => 'salesPriceConverted',
        27 => 'salesPriceWithTaxConverted',
        28 => 'totalPriceConverted',
        29 => 'listPriceConverted',
        30 => 'unitPriceConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'WarehouseItem' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'quantityAvailable',
        1 => 'createdAt',
        2 => 'unit',
        3 => 'salesOrdersList',
        4 => 'reservedQuantity',
        5 => 'wiso',
        6 => 'priceConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'quantityAvailable',
        1 => 'createdAt',
        2 => 'unit',
        3 => 'salesOrdersList',
        4 => 'reservedQuantity',
        5 => 'wiso',
        6 => 'priceConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'WarehouseTransfer' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'warehouseFromType',
        1 => 'warehouseToType',
        2 => 'createdAt',
        3 => 'modifiedAt',
        4 => 'createdBy',
        5 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'warehouseFromType',
        1 => 'warehouseToType',
        2 => 'createdAt',
        3 => 'modifiedAt',
        4 => 'createdById',
        5 => 'createdByName',
        6 => 'modifiedById',
        7 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'WarehouseValueRecord' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy',
        4 => 'valueConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName',
        6 => 'valueConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'CreditNote' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'taxAmount',
        1 => 'discountAmount',
        2 => 'amount',
        3 => 'preDiscountedAmount',
        4 => 'grandTotalAmount',
        5 => 'weight',
        6 => 'createdAt',
        7 => 'modifiedAt',
        8 => 'createdBy',
        9 => 'modifiedBy',
        10 => 'amountCurrency',
        11 => 'discountAmountCurrency',
        12 => 'summaryVatRates',
        13 => 'grandTotalAmountCurrency',
        14 => 'preDiscountedAmountCurrency',
        15 => 'taxAmountCurrency',
        16 => 'billingAddressMap',
        17 => 'shippingAddressMap',
        18 => 'shippingCostConverted',
        19 => 'taxAmountConverted',
        20 => 'discountAmountConverted',
        21 => 'amountConverted',
        22 => 'preDiscountedAmountConverted',
        23 => 'grandTotalAmountConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'taxAmountCurrency',
        1 => 'taxAmount',
        2 => 'discountAmountCurrency',
        3 => 'discountAmount',
        4 => 'amountCurrency',
        5 => 'amount',
        6 => 'preDiscountedAmountCurrency',
        7 => 'preDiscountedAmount',
        8 => 'grandTotalAmountCurrency',
        9 => 'grandTotalAmount',
        10 => 'weight',
        11 => 'createdAt',
        12 => 'modifiedAt',
        13 => 'createdById',
        14 => 'createdByName',
        15 => 'modifiedById',
        16 => 'modifiedByName',
        17 => 'amountCurrency',
        18 => 'discountAmountCurrency',
        19 => 'summaryVatRatesIds',
        20 => 'summaryVatRatesRecordList',
        21 => 'summaryVatRatesNames',
        22 => 'grandTotalAmountCurrency',
        23 => 'preDiscountedAmountCurrency',
        24 => 'taxAmountCurrency',
        25 => 'billingAddressMap',
        26 => 'shippingAddressMap',
        27 => 'shippingCostConverted',
        28 => 'taxAmountConverted',
        29 => 'discountAmountConverted',
        30 => 'amountConverted',
        31 => 'preDiscountedAmountConverted',
        32 => 'grandTotalAmountConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'CreditNoteItem' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'creditNote',
        1 => 'weight',
        2 => 'createdAt',
        3 => 'modifiedAt',
        4 => 'createdBy',
        5 => 'modifiedBy',
        6 => 'unitPriceConverted',
        7 => 'amountConverted',
        8 => 'taxAmountConverted',
        9 => 'amountWithTaxConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'creditNoteId',
        1 => 'creditNoteName',
        2 => 'weight',
        3 => 'createdAt',
        4 => 'modifiedAt',
        5 => 'createdById',
        6 => 'createdByName',
        7 => 'modifiedById',
        8 => 'modifiedByName',
        9 => 'unitPriceConverted',
        10 => 'amountConverted',
        11 => 'taxAmountConverted',
        12 => 'amountWithTaxConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'ExpenseReceipt' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy',
        4 => 'grandTotalAmountConverted',
        5 => 'supplierShippingAddressMap',
        6 => 'supplierBillingAddressMap',
        7 => 'subscriberAddressMap'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName',
        6 => 'grandTotalAmountConverted',
        7 => 'supplierShippingAddressMap',
        8 => 'supplierBillingAddressMap',
        9 => 'subscriberAddressMap'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'IssuedTaxDocument' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'status',
        1 => 'taxAmount',
        2 => 'amount',
        3 => 'grandTotalAmount',
        4 => 'createdAt',
        5 => 'modifiedAt',
        6 => 'createdBy',
        7 => 'modifiedBy',
        8 => 'summaryVatRates',
        9 => 'payment',
        10 => 'paymentReceivedDate',
        11 => 'billingAddressMap',
        12 => 'taxAmountCurrency',
        13 => 'taxAmountConverted',
        14 => 'amountConverted',
        15 => 'grandTotalAmountCurrency',
        16 => 'grandTotalAmountConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'status',
        1 => 'taxAmountCurrency',
        2 => 'taxAmount',
        3 => 'amountCurrency',
        4 => 'amount',
        5 => 'grandTotalAmountCurrency',
        6 => 'grandTotalAmount',
        7 => 'createdAt',
        8 => 'modifiedAt',
        9 => 'createdById',
        10 => 'createdByName',
        11 => 'modifiedById',
        12 => 'modifiedByName',
        13 => 'summaryVatRatesIds',
        14 => 'summaryVatRatesRecordList',
        15 => 'summaryVatRatesNames',
        16 => 'paymentId',
        17 => 'paymentName',
        18 => 'paymentReceivedDate',
        19 => 'billingAddressMap',
        20 => 'taxAmountCurrency',
        21 => 'taxAmountConverted',
        22 => 'amountConverted',
        23 => 'grandTotalAmountCurrency',
        24 => 'grandTotalAmountConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'IssuedTaxDocumentItem' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'issuedTaxDocument',
        1 => 'quantity',
        2 => 'unitPrice',
        3 => 'amount',
        4 => 'taxAmount',
        5 => 'amountWithTax',
        6 => 'taxRate',
        7 => 'createdAt',
        8 => 'modifiedAt',
        9 => 'createdBy',
        10 => 'modifiedBy',
        11 => 'withTax',
        12 => 'unitPriceCurrency',
        13 => 'unitPriceConverted',
        14 => 'amountCurrency',
        15 => 'amountConverted',
        16 => 'taxAmountCurrency',
        17 => 'taxAmountConverted',
        18 => 'amountWithTaxCurrency',
        19 => 'amountWithTaxConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'issuedTaxDocumentId',
        1 => 'issuedTaxDocumentName',
        2 => 'quantity',
        3 => 'unitPriceCurrency',
        4 => 'unitPrice',
        5 => 'amountCurrency',
        6 => 'amount',
        7 => 'taxAmountCurrency',
        8 => 'taxAmount',
        9 => 'amountWithTaxCurrency',
        10 => 'amountWithTax',
        11 => 'taxRate',
        12 => 'createdAt',
        13 => 'modifiedAt',
        14 => 'createdById',
        15 => 'createdByName',
        16 => 'modifiedById',
        17 => 'modifiedByName',
        18 => 'withTax',
        19 => 'unitPriceCurrency',
        20 => 'unitPriceConverted',
        21 => 'amountCurrency',
        22 => 'amountConverted',
        23 => 'taxAmountCurrency',
        24 => 'taxAmountConverted',
        25 => 'amountWithTaxCurrency',
        26 => 'amountWithTaxConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'PartialPayments' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy',
        4 => 'invoice',
        5 => 'amountConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName',
        6 => 'invoiceId',
        7 => 'invoiceName',
        8 => 'amountConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'Payment' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy',
        4 => 'variableSymbol',
        5 => 'amount',
        6 => 'date',
        7 => 'parent',
        8 => 'taxDocument',
        9 => 'amountCurrency',
        10 => 'amountConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName',
        6 => 'variableSymbol',
        7 => 'amountCurrency',
        8 => 'amount',
        9 => 'date',
        10 => 'parentId',
        11 => 'parentType',
        12 => 'parentName',
        13 => 'taxDocumentId',
        14 => 'taxDocumentName',
        15 => 'amountCurrency',
        16 => 'amountConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'ProformaInvoiceItem' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'proformaInvoice',
        1 => 'weight',
        2 => 'createdAt',
        3 => 'modifiedAt',
        4 => 'createdBy',
        5 => 'modifiedBy',
        6 => 'unitPriceConverted',
        7 => 'amountConverted',
        8 => 'taxAmountConverted',
        9 => 'amountWithTaxConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'proformaInvoiceId',
        1 => 'proformaInvoiceName',
        2 => 'weight',
        3 => 'createdAt',
        4 => 'modifiedAt',
        5 => 'createdById',
        6 => 'createdByName',
        7 => 'modifiedById',
        8 => 'modifiedByName',
        9 => 'unitPriceConverted',
        10 => 'amountConverted',
        11 => 'taxAmountConverted',
        12 => 'amountWithTaxConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'ReceivedProformaInvoiceItem' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'receivedProformaInvoice',
        1 => 'weight',
        2 => 'createdAt',
        3 => 'modifiedAt',
        4 => 'createdBy',
        5 => 'modifiedBy',
        6 => 'unitPriceConverted',
        7 => 'amountConverted',
        8 => 'taxAmountConverted',
        9 => 'amountWithTaxConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'receivedProformaInvoiceId',
        1 => 'receivedProformaInvoiceName',
        2 => 'weight',
        3 => 'createdAt',
        4 => 'modifiedAt',
        5 => 'createdById',
        6 => 'createdByName',
        7 => 'modifiedById',
        8 => 'modifiedByName',
        9 => 'unitPriceConverted',
        10 => 'amountConverted',
        11 => 'taxAmountConverted',
        12 => 'amountWithTaxConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'ReceivedTaxDocument' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'taxAmount',
        1 => 'discountAmount',
        2 => 'amount',
        3 => 'preDiscountedAmount',
        4 => 'grandTotalAmount',
        5 => 'weight',
        6 => 'createdAt',
        7 => 'modifiedAt',
        8 => 'createdBy',
        9 => 'modifiedBy',
        10 => 'amountCurrency',
        11 => 'discountAmountCurrency',
        12 => 'summaryVatRates',
        13 => 'grandTotalAmountCurrency',
        14 => 'preDiscountedAmountCurrency',
        15 => 'taxAmountCurrency',
        16 => 'subscriberShippingAddressMap',
        17 => 'subscriberBillingAddressMap',
        18 => 'billingAddressMap',
        19 => 'shippingAddressMap',
        20 => 'taxAmountConverted',
        21 => 'discountAmountConverted',
        22 => 'amountConverted',
        23 => 'preDiscountedAmountConverted',
        24 => 'grandTotalAmountConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'taxAmountCurrency',
        1 => 'taxAmount',
        2 => 'discountAmountCurrency',
        3 => 'discountAmount',
        4 => 'amountCurrency',
        5 => 'amount',
        6 => 'preDiscountedAmountCurrency',
        7 => 'preDiscountedAmount',
        8 => 'grandTotalAmountCurrency',
        9 => 'grandTotalAmount',
        10 => 'weight',
        11 => 'createdAt',
        12 => 'modifiedAt',
        13 => 'createdById',
        14 => 'createdByName',
        15 => 'modifiedById',
        16 => 'modifiedByName',
        17 => 'amountCurrency',
        18 => 'discountAmountCurrency',
        19 => 'summaryVatRatesIds',
        20 => 'summaryVatRatesRecordList',
        21 => 'summaryVatRatesNames',
        22 => 'grandTotalAmountCurrency',
        23 => 'preDiscountedAmountCurrency',
        24 => 'taxAmountCurrency',
        25 => 'subscriberShippingAddressMap',
        26 => 'subscriberBillingAddressMap',
        27 => 'billingAddressMap',
        28 => 'shippingAddressMap',
        29 => 'taxAmountConverted',
        30 => 'discountAmountConverted',
        31 => 'amountConverted',
        32 => 'preDiscountedAmountConverted',
        33 => 'grandTotalAmountConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'ReceivedTaxDocumentItem' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'receivedTaxDocument',
        1 => 'weight',
        2 => 'createdAt',
        3 => 'modifiedAt',
        4 => 'createdBy',
        5 => 'modifiedBy',
        6 => 'unitPriceConverted',
        7 => 'amountConverted',
        8 => 'taxAmountConverted',
        9 => 'amountWithTaxConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'receivedTaxDocumentId',
        1 => 'receivedTaxDocumentName',
        2 => 'weight',
        3 => 'createdAt',
        4 => 'modifiedAt',
        5 => 'createdById',
        6 => 'createdByName',
        7 => 'modifiedById',
        8 => 'modifiedByName',
        9 => 'unitPriceConverted',
        10 => 'amountConverted',
        11 => 'taxAmountConverted',
        12 => 'amountWithTaxConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'RevenueReceipt' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy',
        4 => 'billingAddressMap',
        5 => 'shippingAddressMap',
        6 => 'grandTotalAmountConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName',
        6 => 'billingAddressMap',
        7 => 'shippingAddressMap',
        8 => 'grandTotalAmountConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'SummaryVatRates' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy',
        4 => 'basisConverted',
        5 => 'vatConverted',
        6 => 'totalConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName',
        6 => 'basisConverted',
        7 => 'vatConverted',
        8 => 'totalConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'Cooperation' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'ProductionModel' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'ProductionModelItem' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'quantityWithdrawnPlanned',
        1 => 'quantityWithdrawnActual',
        2 => 'stock'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'quantityWithdrawnPlanned',
        1 => 'quantityWithdrawnActual',
        2 => 'stock'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'ProductionModelOperation' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'quantityPlanned',
        1 => 'quantityActual'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'quantityPlanned',
        1 => 'quantityActual'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'ProductionOrder' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'createdBy',
        2 => 'modifiedAt',
        3 => 'modifiedBy',
        4 => 'progress',
        5 => 'quantityProduced',
        6 => 'itemQuantity',
        7 => 'stockQuantity',
        8 => 'performWorkTime',
        9 => 'availableBrno',
        10 => 'availablePv'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'createdById',
        2 => 'createdByName',
        3 => 'modifiedAt',
        4 => 'modifiedById',
        5 => 'modifiedByName',
        6 => 'progress',
        7 => 'quantityProduced',
        8 => 'itemQuantity',
        9 => 'stockQuantity',
        10 => 'performWorkTime',
        11 => 'availableBrno',
        12 => 'availablePv'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'XmlTemplate' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'Absence' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'ClockIn' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'CompetetionBase' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'Complaint' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'Contractor' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy',
        4 => 'billingAddressMap'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName',
        6 => 'billingAddressMap'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'ContractorItem' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'EspoCRMnvody' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'HumanResources' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'InternalAgenda' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'LogTime' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy',
        4 => 'costConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName',
        6 => 'costConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'Porady' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy',
        4 => 'harmonogram'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName',
        6 => 'harmonogram'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'ProductDatabase' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'ProjectorDatabase' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'QualityReport' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'QuoteEntry' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'ReceivedInvoices' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'RequestForm' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy',
        4 => 'status',
        5 => 'amountConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName',
        6 => 'status',
        7 => 'amountConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'RequestItem' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'Smernice' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'SmerniceItem' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'ComplaintBook' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'ItTask' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'JIRA' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'Manufacturing' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'Prospect' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy',
        4 => 'targetListIsOptedOut'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName',
        6 => 'targetListIsOptedOut'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'SalesOrderSummaryItem' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'Seeker' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'Selector' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy',
        4 => 'priceConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName',
        6 => 'priceConverted'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'Tax' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ],
  'Wiso' => (object) [
    'fields' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdBy',
        3 => 'modifiedBy'
      ],
      'nonAdminReadOnly' => []
    ],
    'attributes' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [
        0 => 'createdAt',
        1 => 'modifiedAt',
        2 => 'createdById',
        3 => 'createdByName',
        4 => 'modifiedById',
        5 => 'modifiedByName'
      ],
      'nonAdminReadOnly' => []
    ],
    'links' => (object) [
      'forbidden' => [],
      'internal' => [],
      'onlyAdmin' => [],
      'readOnly' => [],
      'nonAdminReadOnly' => []
    ]
  ]
];
