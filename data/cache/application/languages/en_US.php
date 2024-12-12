<?php
return [
  'ActionHistoryRecord' => [
    'fields' => [
      'user' => 'User',
      'action' => 'Action',
      'createdAt' => 'Date',
      'userType' => 'User Type',
      'target' => 'Target',
      'targetType' => 'Target Type',
      'authToken' => 'Auth Token',
      'ipAddress' => 'IP Address',
      'authLogRecord' => 'Auth Log Record'
    ],
    'links' => [
      'authToken' => 'Auth Token',
      'authLogRecord' => 'Auth Log Record',
      'user' => 'User',
      'target' => 'Target'
    ],
    'presetFilters' => [
      'onlyMy' => 'Only My'
    ],
    'options' => [
      'action' => [
        'read' => 'Read',
        'update' => 'Update',
        'delete' => 'Delete',
        'create' => 'Create'
      ]
    ]
  ],
  'Admin' => [
    'labels' => [
      'Enabled' => 'Enabled',
      'Disabled' => 'Disabled',
      'System' => 'System',
      'Users' => 'Users',
      'Email' => 'Email',
      'Messaging' => 'Messaging',
      'Data' => 'Data',
      'Misc' => 'Misc',
      'Customization' => 'Customization',
      'Available Fields' => 'Available Fields',
      'Layout' => 'Layout',
      'Entity Manager' => 'Entity Manager',
      'Add Panel' => 'Add Panel',
      'Add Field' => 'Add Field',
      'Settings' => 'Settings',
      'Scheduled Jobs' => 'Scheduled Jobs',
      'Upgrade' => 'Upgrade',
      'Clear Cache' => 'Clear Cache',
      'Rebuild' => 'Rebuild',
      'Teams' => 'Teams',
      'Roles' => 'Roles',
      'Portal' => 'Portal',
      'Portals' => 'Portals',
      'Portal Roles' => 'Portal Roles',
      'Portal Users' => 'Portal Users',
      'API Users' => 'API Users',
      'Outbound Emails' => 'Outbound Emails',
      'Group Email Accounts' => 'Group Email Accounts',
      'Personal Email Accounts' => 'Personal Email Accounts',
      'Inbound Emails' => 'Inbound Emails',
      'Email Templates' => 'Email Templates',
      'Import' => 'Import',
      'Layout Manager' => 'Layout Manager',
      'User Interface' => 'User Interface',
      'Auth Tokens' => 'Auth Tokens',
      'Auth Log' => 'Auth Log',
      'Authentication' => 'Authentication',
      'Currency' => 'Currency',
      'Integrations' => 'Integrations',
      'Extensions' => 'Extensions',
      'Webhooks' => 'Webhooks',
      'Dashboard Templates' => 'Dashboard Templates',
      'Upload' => 'Upload',
      'Installing...' => 'Installing...',
      'Upgrading...' => 'Upgrading...',
      'Upgraded successfully' => 'Upgraded successfully',
      'Installed successfully' => 'Installed successfully',
      'Ready for upgrade' => 'Ready for upgrade',
      'Run Upgrade' => 'Run Upgrade',
      'Install' => 'Install',
      'Ready for installation' => 'Ready for installation',
      'Uninstalling...' => 'Uninstalling...',
      'Uninstalled' => 'Uninstalled',
      'Create Entity' => 'Create Entity',
      'Edit Entity' => 'Edit Entity',
      'Create Link' => 'Create Link',
      'Edit Link' => 'Edit Link',
      'Notifications' => 'Notifications',
      'Jobs' => 'Jobs',
      'Job Settings' => 'Job Settings',
      'Reset to Default' => 'Reset to Default',
      'Email Filters' => 'Email Filters',
      'Action History' => 'Action History',
      'Label Manager' => 'Label Manager',
      'Template Manager' => 'Template Manager',
      'Lead Capture' => 'Lead Capture',
      'Attachments' => 'Attachments',
      'System Requirements' => 'System Requirements',
      'PDF Templates' => 'PDF Templates',
      'PHP Settings' => 'PHP Settings',
      'Database Settings' => 'Database Settings',
      'Permissions' => 'Permissions',
      'Email Addresses' => 'Email Addresses',
      'Phone Numbers' => 'Phone Numbers',
      'Layout Sets' => 'Layout Sets',
      'Working Time Calendars' => 'Working Time Calendars',
      'Group Email Folders' => 'Group Email Folders',
      'Authentication Providers' => 'Authentication Providers',
      'Success' => 'Success',
      'Fail' => 'Fail',
      'Configuration Instructions' => 'Configuration Instructions',
      'Formula Sandbox' => 'Formula Sandbox',
      'is recommended' => 'is recommended',
      'extension is missing' => 'extension is missing',
      'Add Layout' => 'Add Layout',
      'Add Related Field' => 'Add Related Field',
      'AutoCRM Settings' => 'AutoCRM Settings',
      'Show All Layouts' => 'Show All Layouts',
      'Workflow Manager' => 'Workflows',
      'Flowcharts' => 'Flowcharts',
      'Processes' => 'Processes',
      'Business Process Management' => 'Business Process Management',
      'Report Filters' => 'Report Filters',
      'Report Panels' => 'Report Panels',
      'Records Recurrences' => 'Records Recurrences',
      'Sales Order Settings' => 'Sales Order Settings',
      'HumanResources Settings' => 'HR Settings',
      'Warehouse Management Settings' => 'Warehouse Management Settings',
      'Invoice Settings' => 'Company address and invoice settings'
    ],
    'layouts' => [
      'list' => 'List',
      'detail' => 'Detail',
      'listSmall' => 'List (Small)',
      'detailSmall' => 'Detail (Small)',
      'detailPortal' => 'Detail (Portal)',
      'detailSmallPortal' => 'Detail (Small, Portal)',
      'listSmallPortal' => 'List (Small, Portal)',
      'listPortal' => 'List (Portal)',
      'relationshipsPortal' => 'Relationship Panels (Portal)',
      'filters' => 'Search Filters',
      'massUpdate' => 'Mass Update',
      'relationships' => 'Relationship Panels',
      'defaultSidePanel' => 'Side Panel Fields',
      'bottomPanelsDetail' => 'Bottom Panels',
      'bottomPanelsEdit' => 'Bottom Panels (Edit)',
      'bottomPanelsDetailSmall' => 'Bottom Panels (Detail Small)',
      'bottomPanelsEditSmall' => 'Bottom Panels (Edit Small)',
      'sidePanelsDetail' => 'Side Panels (Detail)',
      'sidePanelsEdit' => 'Side Panels (Edit)',
      'sidePanelsDetailSmall' => 'Side Panels (Detail Small)',
      'sidePanelsEditSmall' => 'Side Panels (Edit Small)',
      'kanban' => 'Kanban',
      'detailConvert' => 'Convert Lead',
      'listForAccount' => 'List (for Account)',
      'listForContact' => 'List (for Contact)',
      'aggregationFunctions' => 'Aggregation Function',
      'listGoodsReceiptSimple' => 'Goods Receipt (Simple Warehouse)',
      'listGoodsReceiptPositional' => 'Goods Receipt (Positional Warehouse)',
      'listGoodsIssueSimple' => 'Goods Issue (Simple Warehouse)',
      'listGoodsIssuePositional' => 'Goods Issue (Positional Warehouse)',
      'listGoodsIssueSelectedSimple' => 'Goods Issue - Selected Items (Simple Warehouse)',
      'listGoodsIssueSelectedPositional' => 'Goods Issue - Selected Items (Positional Warehouse)',
      'listWarehouseTransferSimpleSimple' => 'Warehouse Transfer (Simple -> Simple)',
      'listWarehouseTransferSimplePositional' => 'Warehouse Transfer (Simple -> Positional)',
      'listWarehouseTransferPositionalSimple' => 'Warehouse Transfer (Positional -> Simple)',
      'listWarehouseTransferPositionalPositional' => 'Warehouse Transfer (Positional -> Positional)',
      'listWarehouseSimple' => 'Warehouse (Simple)',
      'listWarehousePositional' => 'Warehouse (Positional)',
      'listProductSimple' => 'Product (Simple Warehouse)',
      'listProductPositional' => 'Product (Positional Warehouse)',
      'listitem' => 'Listitem',
      'listitemsmall' => 'Listitemsmall'
    ],
    'fieldTypes' => [
      'address' => 'Address',
      'array' => 'Array',
      'foreign' => 'Foreign',
      'duration' => 'Duration',
      'password' => 'Password',
      'personName' => 'Person Name',
      'autoincrement' => 'Auto-increment',
      'bool' => 'Boolean',
      'currency' => 'Currency',
      'currencyConverted' => 'Currency (Converted)',
      'date' => 'Date',
      'datetime' => 'Date-Time',
      'datetimeOptional' => 'Date/Date-Time',
      'email' => 'Email',
      'enum' => 'Enum',
      'enumInt' => 'Enum Integer',
      'enumFloat' => 'Enum Float',
      'float' => 'Float',
      'int' => 'Integer',
      'link' => 'Link',
      'linkMultiple' => 'Link Multiple',
      'linkParent' => 'Link Parent',
      'linkOne' => 'Link One',
      'phone' => 'Phone',
      'text' => 'Text',
      'url' => 'Url',
      'urlMultiple' => 'Url Multiple',
      'varchar' => 'Varchar',
      'file' => 'File',
      'image' => 'Image',
      'multiEnum' => 'Multi-Enum',
      'attachmentMultiple' => 'Attachment Multiple',
      'rangeInt' => 'Range Integer',
      'rangeFloat' => 'Range Float',
      'rangeCurrency' => 'Range Currency',
      'wysiwyg' => 'Wysiwyg',
      'map' => 'Map',
      'number' => 'Number (auto-increment)',
      'colorpicker' => 'Color Picker',
      'checklist' => 'Checklist',
      'barcode' => 'Barcode',
      'jsonArray' => 'Json Array',
      'jsonObject' => 'Json Object',
      'electronicSignature' => 'Electronic Signature',
      'foreignMultiple' => 'Foreign Field (multiple relation)',
      'speedometerGraph' => 'Graph (speedometer)',
      'progressBar' => 'Progress Bar',
      'sequenceNumber' => 'Sequence Number',
      'vatId' => 'VAT ID'
    ],
    'fields' => [
      'type' => 'Type',
      'name' => 'Name',
      'label' => 'Label',
      'tooltipText' => 'Tooltip Text',
      'required' => 'Required',
      'default' => 'Default',
      'maxLength' => 'Max Length',
      'options' => 'Options',
      'optionsReference' => 'Options Reference',
      'after' => 'After (field)',
      'before' => 'Before (field)',
      'link' => 'Link',
      'field' => 'Field',
      'min' => 'Min',
      'max' => 'Max',
      'translation' => 'Translation',
      'previewSize' => 'Preview Size',
      'listPreviewSize' => 'Preview Size in List View',
      'noEmptyString' => 'Empty string value is not allowed',
      'defaultType' => 'Default Type',
      'seeMoreDisabled' => 'Disable Text Cut',
      'cutHeight' => 'Cut Height (px)',
      'entityList' => 'Entity List',
      'isSorted' => 'Is Sorted (alphabetically)',
      'audited' => 'Audited',
      'trim' => 'Trim',
      'height' => 'Height (px)',
      'minHeight' => 'Min Height (px)',
      'provider' => 'Provider',
      'typeList' => 'Type List',
      'rows' => 'Max number of rows',
      'lengthOfCut' => 'Length of cut',
      'sourceList' => 'Source List',
      'prefix' => 'Prefix',
      'nextNumber' => 'Next Number',
      'padLength' => 'Pad Length',
      'disableFormatting' => 'Disable Formatting',
      'dynamicLogicVisible' => 'Conditions making field visible',
      'dynamicLogicReadOnly' => 'Conditions making field read-only',
      'dynamicLogicRequired' => 'Conditions making field required',
      'dynamicLogicOptions' => 'Conditional options',
      'dynamicLogicInvalid' => 'Conditions making field invalid',
      'probabilityMap' => 'Stage Probabilities (%)',
      'notActualOptions' => 'Not Actual Options',
      'readOnly' => 'Read-only',
      'readOnlyAfterCreate' => 'Read-only After Create',
      'maxFileSize' => 'Max File Size (Mb)',
      'isPersonalData' => 'Is Personal Data',
      'useIframe' => 'Use Iframe',
      'useNumericFormat' => 'Use Numeric Format',
      'strip' => 'Strip',
      'minuteStep' => 'Minutes Step',
      'inlineEditDisabled' => 'Disable Inline Edit',
      'allowCustomOptions' => 'Allow Custom Options',
      'displayAsLabel' => 'Display as Label',
      'displayAsList' => 'Display as List',
      'maxCount' => 'Max Item Count',
      'accept' => 'Accept',
      'viewMap' => 'View Map Button',
      'codeType' => 'Code Type',
      'lastChar' => 'Last Character',
      'onlyDefaultCurrency' => 'Only default currency',
      'decimal' => 'Decimal',
      'displayRawText' => 'Display raw text (no markdown)',
      'conversionDisabled' => 'Disable Conversion',
      'decimalPlaces' => 'Decimal Places',
      'pattern' => 'Pattern',
      'globalRestrictions' => 'Global Restrictions',
      'copyToClipboard' => 'Copy to clipboard button',
      'createButton' => 'Create Button',
      'autocompleteOnEmpty' => 'Autocomplete on empty input',
      'checkboxesEnabled' => 'Enable Checkboxes',
      'recordListButtonsPosition' => 'Buttons Position',
      'createAsModal' => 'Create as modal',
      'defaultSelectAttributes' => 'Default Select Attributes',
      'lockAfterSigning' => 'Lock after signing',
      'notStorable' => 'Not Storable',
      'recordListConfirmRemove' => 'Confirm Before Remove',
      'recordListCreateDisabled' => 'Disable Create Button',
      'recordListEnabled' => 'Enable Record List',
      'recordListKeepRemoved' => 'Keep Removed Records',
      'recordListLayout' => 'List Layout',
      'recordListLinkDisabled' => 'Disable Link Button',
      'recordListOrderByField' => 'Order Field',
      'recordListRemoveDisabled' => 'Disable Remove Buttons',
      'saveCoordinates' => 'Save coordinates',
      'displayAsLinks' => 'Display as links',
      'currentValue' => 'Current value',
      'targetValue' => 'Target Value',
      'arrowColor' => 'Arrow color',
      'labelsEnabled' => 'Allow label',
      'labelsFontPercentage' => 'Font-size of label (%)',
      'numberLineEnabled' => 'Allow number line',
      'numberLineFontPercentage' => 'Font-size of number line (%)',
      'labelsFormat' => 'Caption format',
      'startColor' => 'Start color',
      'endColor' => 'End color',
      'align' => 'Align',
      'width' => 'Width (px)',
      'labelColor' => 'Label color',
      'backgroundColor' => 'Background color',
      'labelsFontWidth' => 'Label font width',
      'dateWarning' => 'Color highlight after the date',
      'format' => 'Number Format',
      'reset' => 'Reset Number',
      'validateFormat' => 'Validate Format',
      'validateExistence' => 'Validate Existence'
    ],
    'strings' => [
      'rebuildRequired' => 'Rebuild is required'
    ],
    'messages' => [
      'formulaFunctions' => 'More functions can be found in [documentation]({documentationUrl}).',
      'rebuildRequired' => 'You need to run rebuild from CLI.',
      'upgradeVersion' => 'EspoCRM will be upgraded to version **{version}**. Please be patient as this may take a while.',
      'upgradeDone' => 'EspoCRM has been upgraded to version **{version}**.',
      'upgradeBackup' => 'We recommend making a backup of your EspoCRM files and data before upgrading.',
      'thousandSeparatorEqualsDecimalMark' => 'The thousands separator character can not be the same as the decimal point character.',
      'userHasNoEmailAddress' => 'User has no email address.',
      'selectEntityType' => 'Select entity type in the left menu.',
      'selectUpgradePackage' => 'Select upgrade package',
      'downloadUpgradePackage' => 'Download upgrade package(s) [here]({url}).',
      'selectLayout' => 'Select needed layout in the left menu and edit it.',
      'selectExtensionPackage' => 'Select extension package',
      'extensionInstalled' => 'Extension {name} {version} has been installed.',
      'installExtension' => 'Extension {name} {version} is ready for an installation.',
      'cronIsNotConfigured' => 'Scheduled jobs are not running.  Hence inbound emails, notifications and reminders are not working. Please follow the [instructions](https://www.espocrm.com/documentation/administration/server-configuration/#user-content-setup-a-crontab) to setup cron job.',
      'newVersionIsAvailable' => 'New EspoCRM version {latestVersion} is available. Please follow the [instructions](https://www.espocrm.com/documentation/administration/upgrading/) to upgrade your instance.',
      'newExtensionVersionIsAvailable' => 'New {extensionName} version {latestVersion} is available.',
      'uninstallConfirmation' => 'Are you sure you want to uninstall the extension?',
      'upgradeInfo' => 'Check the [documentation]({url}) about how to upgrade your EspoCRM instance.',
      'upgradeRecommendation' => 'This way of upgrading is not recommended. It\'s better to upgrade from CLI.',
      'newAdvancedPackVersionIsAvailable' => 'New Advanced Pack version {latestVersion} is available. It can be downloaded on the customer portal.'
    ],
    'descriptions' => [
      'settings' => 'System settings of application.',
      'scheduledJob' => 'Jobs which are executed by cron.',
      'jobs' => 'Jobs execute tasks in the background.',
      'upgrade' => 'Upgrade EspoCRM.',
      'clearCache' => 'Clear all backend cache.',
      'rebuild' => 'Rebuild backend and clear cache.',
      'users' => 'Users management.',
      'teams' => 'Teams management.',
      'roles' => 'Roles management.',
      'portals' => 'Portals management.',
      'portalRoles' => 'Roles for portal.',
      'portalUsers' => 'Users of portal.',
      'outboundEmails' => 'SMTP settings for outgoing emails.',
      'groupEmailAccounts' => 'Group IMAP email accounts. Email import and Email-to-Case.',
      'personalEmailAccounts' => 'Users email accounts.',
      'emailTemplates' => 'Templates for outbound emails.',
      'import' => 'Import data from CSV file.',
      'layoutManager' => 'Customize layouts (list, detail, edit, search, mass update).',
      'entityManager' => 'Create and edit custom entities. Manage fields and relationships.',
      'userInterface' => 'Configure UI.',
      'authTokens' => 'Active auth sessions. IP address and last access date.',
      'authentication' => 'Authentication settings.',
      'currency' => 'Currency settings and rates.',
      'extensions' => 'Install or uninstall extensions.',
      'integrations' => 'Integration with third-party services.',
      'notifications' => 'In-app and email notification settings.',
      'inboundEmails' => 'Settings for incoming emails.',
      'emailFilters' => 'Email messages that match the specified filter won\'t be imported.',
      'groupEmailFolders' => 'Email folders shared for teams.',
      'actionHistory' => 'Log of user actions.',
      'labelManager' => 'Customize application labels.',
      'templateManager' => 'Customize message templates.',
      'authLog' => 'Login history.',
      'leadCapture' => 'API entry points for Web-to-Lead.',
      'attachments' => 'All file attachments stored in the system.',
      'systemRequirements' => 'System Requirements for EspoCRM.',
      'apiUsers' => 'Separate users for integration purposes.',
      'webhooks' => 'Manage webhooks.',
      'authenticationProviders' => 'Additional authentication providers for portals.',
      'emailAddresses' => 'All email addresses stored in the system.',
      'phoneNumbers' => 'All phone numbers stored in the system.',
      'dashboardTemplates' => 'Deploy dashboards to users.',
      'layoutSets' => 'Collections of layouts that can be assigned to teams & portals.',
      'workingTimeCalendars' => 'Working schedule.',
      'jobsSettings' => 'Job processing settings. Jobs execute tasks in the background.',
      'sms' => 'SMS settings.',
      'pdfTemplates' => 'Templates for printing to PDF.',
      'formulaSandbox' => 'Write and test formula scripts.',
      'autocrm' => 'All config parameters for AutoCRM related extensions.',
      'workflowManager' => 'Configure Workflow rules.',
      'bpmnFlowcharts' => 'Definitions of business processes.',
      'bpmnProcesses' => 'Instances of business processes.',
      'reportFilters' => 'Custom list view filters based on reports.',
      'reportPanels' => 'Detail view panels showing report results.',
      'recordRecurrence' => 'List of all scheduled recurring records.',
      'salesOrderSettingsDescription' => 'Warehouse settings for automatic order workflows',
      'humanResourcesSettings' => 'Basic settings for HR module.',
      'warehouseManagement' => 'Configuration parameters for the WarehouseManagement Extension',
      'invoiceSettings' => 'Settings of default values and other parameters on invoices.'
    ],
    'keywords' => [
      'settings' => 'system',
      'userInterface' => 'ui,theme,tabs,logo,dashboard',
      'authentication' => 'password,security,ldap',
      'scheduledJob' => 'cron,jobs',
      'integrations' => 'google,maps,google maps',
      'authLog' => 'log,history',
      'authTokens' => 'history,access,log',
      'entityManager' => 'fields,relations,relationships',
      'templateManager' => 'notifications',
      'jobs' => 'cron',
      'labelManager' => 'language,translation',
      'bpmnFlowcharts' => 'bpm',
      'bpmnProcesses' => 'bpm'
    ],
    'options' => [
      'previewSize' => [
        '' => 'Default',
        'x-small' => 'X-Small',
        'small' => 'Small',
        'medium' => 'Medium',
        'large' => 'Large'
      ],
      'reset' => [
        'Daily' => 'Daily',
        'Monthly' => 'Monthly',
        'Yearly' => 'Yearly',
        'Never' => 'Never'
      ]
    ],
    'logicalOperators' => [
      'and' => 'AND',
      'or' => 'OR',
      'not' => 'NOT'
    ],
    'systemRequirements' => [
      'requiredPhpVersion' => 'PHP Version',
      'requiredMysqlVersion' => 'MySQL Version',
      'requiredMariadbVersion' => 'MariaDB version',
      'requiredPostgresqlVersion' => 'PostgreSQL version',
      'host' => 'Host Name',
      'dbname' => 'Database Name',
      'user' => 'User Name',
      'writable' => 'Writable',
      'readable' => 'Readable'
    ],
    'templates' => [
      'twoFactorCode' => '2FA Code',
      'accessInfo' => 'Access Info',
      'accessInfoPortal' => 'Access Info for Portals',
      'assignment' => 'Assignment',
      'mention' => 'Mention',
      'noteEmailReceived' => 'Note about Received Email',
      'notePost' => 'Note about Post',
      'notePostNoParent' => 'Note about Post (no Parent)',
      'noteStatus' => 'Note about Status Update',
      'passwordChangeLink' => 'Password Change Link',
      'invitation' => 'Invitation',
      'cancellation' => 'Cancellation',
      'reminder' => 'Reminder',
      'reportSendingGrid1' => 'Report Grid-1',
      'reportSendingGrid2' => 'Report Grid-2',
      'reportSendingList' => 'Report List'
    ]
  ],
  'ApiUser' => [
    'labels' => [
      'Create ApiUser' => 'Create API User'
    ]
  ],
  'Attachment' => [
    'fields' => [
      'role' => 'Role',
      'related' => 'Related',
      'file' => 'File',
      'type' => 'Type',
      'field' => 'Field',
      'sourceId' => 'Source ID',
      'storage' => 'Storage',
      'size' => 'Size (bytes)',
      'isBeingUploaded' => 'Is Being Uploaded'
    ],
    'options' => [
      'role' => [
        'Attachment' => 'Attachment',
        'Inline Attachment' => 'Inline Attachment',
        'Import File' => 'Import File',
        'Export File' => 'Export File',
        'Mail Merge' => 'Mail Merge',
        'Mass Pdf' => 'Mass Pdf'
      ]
    ],
    'insertFromSourceLabels' => [
      'Document' => 'Insert Document'
    ],
    'presetFilters' => [
      'orphan' => 'Orphan'
    ]
  ],
  'AuthLogRecord' => [
    'fields' => [
      'username' => 'Username',
      'ipAddress' => 'IP Address',
      'requestTime' => 'Request Time',
      'createdAt' => 'Requested At',
      'isDenied' => 'Is Denied',
      'denialReason' => 'Denial Reason',
      'portal' => 'Portal',
      'user' => 'User',
      'authToken' => 'Auth Token Created',
      'requestUrl' => 'Request URL',
      'requestMethod' => 'Request Method',
      'authTokenIsActive' => 'Auth Token is Active',
      'authenticationMethod' => 'Authentication Method'
    ],
    'links' => [
      'authToken' => 'Auth Token Created',
      'user' => 'User',
      'portal' => 'Portal',
      'actionHistoryRecords' => 'Action History'
    ],
    'presetFilters' => [
      'denied' => 'Denied',
      'accepted' => 'Accepted'
    ],
    'options' => [
      'denialReason' => [
        'CREDENTIALS' => 'Invalid credentials',
        'INACTIVE_USER' => 'Inactive user',
        'IS_PORTAL_USER' => 'Portal user',
        'IS_NOT_PORTAL_USER' => 'Not a portal user',
        'USER_IS_NOT_IN_PORTAL' => 'User is not related to the portal'
      ]
    ]
  ],
  'AuthToken' => [
    'fields' => [
      'user' => 'User',
      'ipAddress' => 'IP Address',
      'lastAccess' => 'Last Access Date',
      'createdAt' => 'Login Date',
      'isActive' => 'Is Active',
      'portal' => 'Portal'
    ],
    'links' => [
      'actionHistoryRecords' => 'Action History'
    ],
    'presetFilters' => [
      'active' => 'Active',
      'inactive' => 'Inactive'
    ],
    'labels' => [
      'Set Inactive' => 'Set Inactive'
    ],
    'massActions' => [
      'setInactive' => 'Set Inactive'
    ]
  ],
  'AuthenticationProvider' => [
    'fields' => [
      'method' => 'Method'
    ],
    'labels' => [
      'Create AuthenticationProvider' => 'Create Provider'
    ]
  ],
  'Currency' => [
    'names' => [
      'AED' => 'United Arab Emirates Dirham',
      'AFN' => 'Afghan Afghani',
      'ALL' => 'Albanian Lek',
      'AMD' => 'Armenian Dram',
      'ANG' => 'Netherlands Antillean Guilder',
      'AOA' => 'Angolan Kwanza',
      'ARS' => 'Argentine Peso',
      'AUD' => 'Australian Dollar',
      'AWG' => 'Aruban Florin',
      'AZN' => 'Azerbaijani Manat',
      'BAM' => 'Bosnia-Herzegovina Convertible Mark',
      'BBD' => 'Barbadian Dollar',
      'BDT' => 'Bangladeshi Taka',
      'BGN' => 'Bulgarian Lev',
      'BHD' => 'Bahraini Dinar',
      'BIF' => 'Burundian Franc',
      'BMD' => 'Bermudan Dollar',
      'BND' => 'Brunei Dollar',
      'BOB' => 'Bolivian Boliviano',
      'BOV' => 'Bolivian Mvdol',
      'BRL' => 'Brazilian Real',
      'BSD' => 'Bahamian Dollar',
      'BTN' => 'Bhutanese Ngultrum',
      'BWP' => 'Botswanan Pula',
      'BYN' => 'Belarusian Ruble',
      'BZD' => 'Belize Dollar',
      'CAD' => 'Canadian Dollar',
      'CDF' => 'Congolese Franc',
      'CHE' => 'WIR Euro',
      'CHF' => 'Swiss Franc',
      'CHW' => 'WIR Franc',
      'CLF' => 'Chilean Unit of Account (UF)',
      'CLP' => 'Chilean Peso',
      'CNH' => 'Chinese Yuan (offshore)',
      'CNY' => 'Chinese Yuan',
      'COP' => 'Colombian Peso',
      'COU' => 'Colombian Real Value Unit',
      'CRC' => 'Costa Rican Colón',
      'CUC' => 'Cuban Convertible Peso',
      'CUP' => 'Cuban Peso',
      'CVE' => 'Cape Verdean Escudo',
      'CZK' => 'Czech Koruna',
      'DJF' => 'Djiboutian Franc',
      'DKK' => 'Danish Krone',
      'DOP' => 'Dominican Peso',
      'DZD' => 'Algerian Dinar',
      'EGP' => 'Egyptian Pound',
      'ERN' => 'Eritrean Nakfa',
      'ETB' => 'Ethiopian Birr',
      'EUR' => 'Euro',
      'FJD' => 'Fijian Dollar',
      'FKP' => 'Falkland Islands Pound',
      'GBP' => 'British Pound',
      'GEL' => 'Georgian Lari',
      'GHS' => 'Ghanaian Cedi',
      'GIP' => 'Gibraltar Pound',
      'GMD' => 'Gambian Dalasi',
      'GNF' => 'Guinean Franc',
      'GTQ' => 'Guatemalan Quetzal',
      'GYD' => 'Guyanaese Dollar',
      'HKD' => 'Hong Kong Dollar',
      'HNL' => 'Honduran Lempira',
      'HRK' => 'Croatian Kuna',
      'HTG' => 'Haitian Gourde',
      'HUF' => 'Hungarian Forint',
      'IDR' => 'Indonesian Rupiah',
      'ILS' => 'Israeli New Shekel',
      'INR' => 'Indian Rupee',
      'IQD' => 'Iraqi Dinar',
      'IRR' => 'Iranian Rial',
      'ISK' => 'Icelandic Króna',
      'JMD' => 'Jamaican Dollar',
      'JOD' => 'Jordanian Dinar',
      'JPY' => 'Japanese Yen',
      'KES' => 'Kenyan Shilling',
      'KGS' => 'Kyrgystani Som',
      'KHR' => 'Cambodian Riel',
      'KMF' => 'Comorian Franc',
      'KPW' => 'North Korean Won',
      'KRW' => 'South Korean Won',
      'KWD' => 'Kuwaiti Dinar',
      'KYD' => 'Cayman Islands Dollar',
      'KZT' => 'Kazakhstani Tenge',
      'LAK' => 'Laotian Kip',
      'LBP' => 'Lebanese Pound',
      'LKR' => 'Sri Lankan Rupee',
      'LRD' => 'Liberian Dollar',
      'LSL' => 'Lesotho Loti',
      'LYD' => 'Libyan Dinar',
      'MAD' => 'Moroccan Dirham',
      'MDL' => 'Moldovan Leu',
      'MGA' => 'Malagasy Ariary',
      'MKD' => 'Macedonian Denar',
      'MMK' => 'Myanmar Kyat',
      'MNT' => 'Mongolian Tugrik',
      'MOP' => 'Macanese Pataca',
      'MRO' => 'Mauritanian Ouguiya',
      'MUR' => 'Mauritian Rupee',
      'MWK' => 'Malawian Kwacha',
      'MXN' => 'Mexican Peso',
      'MXV' => 'Mexican Investment Unit',
      'MYR' => 'Malaysian Ringgit',
      'MZN' => 'Mozambican Metical',
      'NAD' => 'Namibian Dollar',
      'NGN' => 'Nigerian Naira',
      'NIO' => 'Nicaraguan Córdoba',
      'NOK' => 'Norwegian Krone',
      'NPR' => 'Nepalese Rupee',
      'NZD' => 'New Zealand Dollar',
      'OMR' => 'Omani Rial',
      'PAB' => 'Panamanian Balboa',
      'PEN' => 'Peruvian Sol',
      'PGK' => 'Papua New Guinean Kina',
      'PHP' => 'Philippine Piso',
      'PKR' => 'Pakistani Rupee',
      'PLN' => 'Polish Zloty',
      'PYG' => 'Paraguayan Guarani',
      'QAR' => 'Qatari Rial',
      'RON' => 'Romanian Leu',
      'RSD' => 'Serbian Dinar',
      'RUB' => 'Russian Ruble',
      'RWF' => 'Rwandan Franc',
      'SAR' => 'Saudi Riyal',
      'SBD' => 'Solomon Islands Dollar',
      'SCR' => 'Seychellois Rupee',
      'SDG' => 'Sudanese Pound',
      'SEK' => 'Swedish Krona',
      'SGD' => 'Singapore Dollar',
      'SHP' => 'St. Helena Pound',
      'SLL' => 'Sierra Leonean Leone',
      'SOS' => 'Somali Shilling',
      'SRD' => 'Surinamese Dollar',
      'SSP' => 'South Sudanese Pound',
      'STN' => 'São Tomé & Príncipe Dobra (2018)',
      'SYP' => 'Syrian Pound',
      'SZL' => 'Swazi Lilangeni',
      'SVC' => 'Salvadoran Colón',
      'THB' => 'Thai Baht',
      'TJS' => 'Tajikistani Somoni',
      'TND' => 'Tunisian Dinar',
      'TOP' => 'Tongan Paʻanga',
      'TRY' => 'Turkish Lira',
      'TTD' => 'Trinidad & Tobago Dollar',
      'TWD' => 'New Taiwan Dollar',
      'TZS' => 'Tanzanian Shilling',
      'UAH' => 'Ukrainian Hryvnia',
      'UGX' => 'Ugandan Shilling',
      'USD' => 'US Dollar',
      'USN' => 'US Dollar (Next day)',
      'UYI' => 'Uruguayan Peso (Indexed Units)',
      'UYU' => 'Uruguayan Peso',
      'UZS' => 'Uzbekistani Som',
      'VEF' => 'Venezuelan Bolívar',
      'VND' => 'Vietnamese Dong',
      'VUV' => 'Vanuatu Vatu',
      'WST' => 'Samoan Tala',
      'XAF' => 'Central African CFA Franc',
      'XCD' => 'East Caribbean Dollar',
      'XOF' => 'West African CFA Franc',
      'XPF' => 'CFP Franc',
      'YER' => 'Yemeni Rial',
      'ZAR' => 'South African Rand',
      'ZMW' => 'Zambian Kwacha',
      'ZWL' => 'Zimbabwe Dollar'
    ]
  ],
  'DashboardTemplate' => [
    'fields' => [
      'layout' => 'Layout',
      'append' => 'Append (don\'t remove user\'s tabs)'
    ],
    'links' => [],
    'labels' => [
      'Create DashboardTemplate' => 'Create Template',
      'Deploy to Users' => 'Deploy to Users',
      'Deploy to Team' => 'Deploy to Team'
    ]
  ],
  'DashletOptions' => [
    'fields' => [
      'title' => 'Title',
      'dateFrom' => 'Date From',
      'dateTo' => 'Date To',
      'autorefreshInterval' => 'Auto-refresh Interval',
      'displayRecords' => 'Display Records',
      'isDoubleHeight' => 'Height 2x',
      'mode' => 'Mode',
      'enabledScopeList' => 'What to display',
      'users' => 'Users',
      'entityType' => 'Entity Type',
      'primaryFilter' => 'Primary Filter',
      'boolFilterList' => 'Additional Filters',
      'sortBy' => 'Order (field)',
      'sortDirection' => 'Order (direction)',
      'expandedLayout' => 'Layout',
      'skipOwn' => 'Don\'t show own records',
      'url' => 'URL',
      'dateFilter' => 'Date Filter',
      'text' => 'Text',
      'folder' => 'Folder',
      'team' => 'Team',
      'futureDays' => 'Next X Days',
      'useLastStage' => 'Group by last reached stage',
      'advancedFilters' => 'Advanced Filters',
      'addressField' => 'Address field',
      'mapCenter' => 'Map center',
      'layout' => 'Layout',
      'report' => 'Report',
      'column' => 'Summation Column',
      'displayOnlyCount' => 'Display Only Total',
      'displayTotal' => 'Display Total',
      'useSiMultiplier' => 'SI Multiplier',
      'displayType' => 'What to display'
    ],
    'options' => [
      'mode' => [
        'agendaWeek' => 'Week (agenda)',
        'basicWeek' => 'Week',
        'month' => 'Month',
        'basicDay' => 'Day',
        'agendaDay' => 'Day (agenda)',
        'timeline' => 'Timeline'
      ],
      'mapCenter' => [
        'Czech Republic' => 'Czech Republic',
        'Slovakia' => 'Slovakia'
      ]
    ],
    'messages' => [
      'selectEntityType' => 'Select entity type',
      'selectAddressField' => 'Select address field'
    ],
    'tooltips' => [
      'skipOwn' => 'Actions made by your user account won\'t be displayed.'
    ]
  ],
  'DynamicLogic' => [
    'labels' => [
      'Field' => 'Field'
    ],
    'options' => [
      'operators' => [
        'equals' => 'Equals',
        'notEquals' => 'Not Equals',
        'greaterThan' => 'Greater Than',
        'lessThan' => 'Less Than',
        'greaterThanOrEquals' => 'Greater Than Or Equals',
        'lessThanOrEquals' => 'Less Than Or Equals',
        'in' => 'In',
        'notIn' => 'Not In',
        'inPast' => 'In Past',
        'inFuture' => 'Is Future',
        'isToday' => 'Is Today',
        'isTrue' => 'Is True',
        'isFalse' => 'Is False',
        'isEmpty' => 'Is Empty',
        'isNotEmpty' => 'Is Not Empty',
        'contains' => 'Contains',
        'notContains' => 'Not Contains',
        'has' => 'Contains',
        'notHas' => 'Not Contains',
        'startsWith' => 'Starts With',
        'endsWith' => 'Ends With',
        'matches' => 'Matches (reg exp)'
      ]
    ]
  ],
  'Email' => [
    'fields' => [
      'name' => 'Name (Subject)',
      'parent' => 'Parent',
      'status' => 'Status',
      'dateSent' => 'Date Sent',
      'from' => 'From',
      'to' => 'To',
      'cc' => 'CC',
      'bcc' => 'BCC',
      'replyTo' => 'Reply To',
      'replyToString' => 'Reply To (String)',
      'personStringData' => 'Person String Data',
      'isHtml' => 'HTML',
      'body' => 'Body',
      'bodyPlain' => 'Body (Plain)',
      'subject' => 'Subject',
      'attachments' => 'Attachments',
      'selectTemplate' => 'Select Template',
      'fromEmailAddress' => 'From Address (link)',
      'emailAddress' => 'Email Address',
      'deliveryDate' => 'Delivery Date',
      'account' => 'Account',
      'users' => 'Users',
      'replied' => 'Replied',
      'replies' => 'Replies',
      'isRead' => 'Is Read',
      'isNotRead' => 'Is Not Read',
      'isImportant' => 'Is Important',
      'isReplied' => 'Is Replied',
      'isNotReplied' => 'Is Not Replied',
      'isUsers' => 'Is User\'s',
      'inTrash' => 'In Trash',
      'folder' => 'Folder',
      'inboundEmails' => 'Group Accounts',
      'emailAccounts' => 'Personal Accounts',
      'hasAttachment' => 'Has Attachment',
      'assignedUsers' => 'Assigned Users',
      'sentBy' => 'Sent By',
      'toEmailAddresses' => 'To EmailAddresses',
      'ccEmailAddresses' => 'CC Email Addresses',
      'bccEmailAddresses' => 'BCC EmailAddresses',
      'replyToEmailAddresses' => 'Reply-To EmailAddresses',
      'messageId' => 'Message Id',
      'messageIdInternal' => 'Message Id (Internal)',
      'folderId' => 'Folder Id',
      'fromName' => 'From Name',
      'fromString' => 'From String',
      'fromAddress' => 'From Address',
      'replyToName' => 'Reply-To Name',
      'replyToAddress' => 'Reply-To Address',
      'isSystem' => 'Is System',
      'icsContents' => 'ICS Contents',
      'icsEventData' => 'ICS Event Data',
      'icsEventUid' => 'ICS Event UID',
      'createdEvent' => 'Created Event',
      'event' => 'Event',
      'icsEventDateStart' => 'ICS Event Date Start',
      'groupFolder' => 'Group Folder',
      'tasks' => 'Tasks'
    ],
    'links' => [
      'replied' => 'Replied',
      'replies' => 'Replies',
      'inboundEmails' => 'Group Accounts',
      'emailAccounts' => 'Personal Accounts',
      'assignedUsers' => 'Assigned Users',
      'sentBy' => 'Sent By',
      'attachments' => 'Attachments',
      'fromEmailAddress' => 'From Email Address',
      'toEmailAddresses' => 'To EmailAddresses',
      'ccEmailAddresses' => 'CC EmailAddresses',
      'bccEmailAddresses' => 'BCC EmailAddresses',
      'replyToEmailAddresses' => 'Reply-To EmailAddresses',
      'groupFolder' => 'Group Folder'
    ],
    'options' => [
      'status' => [
        'Draft' => 'Draft',
        'Sending' => 'Sending',
        'Sent' => 'Sent',
        'Archived' => 'Archived',
        'Received' => 'Received',
        'Failed' => 'Failed'
      ],
      'takenStatus' => [
        'Accepted' => 'Accepted',
        'BeingHandled' => 'Being handled',
        'Taken' => 'Taken'
      ]
    ],
    'labels' => [
      'Create Email' => 'Archive Email',
      'Archive Email' => 'Archive Email',
      'Compose' => 'Compose',
      'Reply' => 'Reply',
      'Reply to All' => 'Reply to All',
      'Forward' => 'Forward',
      'Insert Field' => 'Insert Field',
      'Original message' => 'Original message',
      'Forwarded message' => 'Forwarded message',
      'Email Accounts' => 'Personal Email Accounts',
      'Inbound Emails' => 'Group Email Accounts',
      'Email Templates' => 'Email Templates',
      'Send Test Email' => 'Send Test Email',
      'Send' => 'Send',
      'Email Address' => 'Email Address',
      'Mark Read' => 'Mark Read',
      'Sending...' => 'Sending...',
      'Save Draft' => 'Save Draft',
      'Mark all as read' => 'Mark all as read',
      'Show Plain Text' => 'Show Plain Text',
      'Mark as Important' => 'Mark as Important',
      'Unmark Importance' => 'Unmark Importance',
      'Move to Trash' => 'Move to Trash',
      'Retrieve from Trash' => 'Retrieve from Trash',
      'Move to Folder' => 'Move to Folder',
      'Moving to folder' => 'Moving to Folder',
      'Filters' => 'Filters',
      'Folders' => 'Folders',
      'Group Folders' => 'Group Folders',
      'No Subject' => 'No Subject',
      'View Users' => 'View Users',
      'Event' => 'Event',
      'Create Lead' => 'Create Lead',
      'Create Contact' => 'Create Contact',
      'Add to Contact' => 'Add to Contact',
      'Add to Lead' => 'Add to Lead',
      'Create Task' => 'Create Task',
      'Create Case' => 'Create Case',
      'View in Browser' => 'View email in Browser'
    ],
    'strings' => [
      'sendingFailed' => 'Email sending failed'
    ],
    'messages' => [
      'invalidCredentials' => 'Invalid credentials.',
      'unknownError' => 'Unknown error.',
      'recipientAddressRejected' => 'Recipient address rejected.',
      'noSmtpSetup' => 'SMTP is not configured: {link}',
      'testEmailSent' => 'Test email has been sent',
      'emailSent' => 'Email has been sent',
      'savedAsDraft' => 'Saved as draft',
      'sendConfirm' => 'Send the email?',
      'removeSelectedRecordsConfirmation' => 'Are you sure you want to remove selected emails?

They will be removed for other users too.',
      'removeRecordConfirmation' => 'Are you sure you want to remove the email?

It will be removed for other users too.',
      'confirmInsertTemplate' => 'The email body will be lost. Are you sure you want to insert the template?'
    ],
    'presetFilters' => [
      'sent' => 'Sent',
      'archived' => 'Archived',
      'inbox' => 'Inbox',
      'drafts' => 'Drafts',
      'trash' => 'Trash',
      'important' => 'Important'
    ],
    'massActions' => [
      'markAsRead' => 'Mark as Read',
      'markAsNotRead' => 'Mark as Not Read',
      'markAsImportant' => 'Mark as Important',
      'markAsNotImportant' => 'Unmark Importance',
      'moveToTrash' => 'Move to Trash',
      'moveToFolder' => 'Move to Folder',
      'retrieveFromTrash' => 'Retrieve from Trash'
    ],
    'takenStatus' => 'Taken Status'
  ],
  'EmailAccount' => [
    'fields' => [
      'name' => 'Name',
      'status' => 'Status',
      'host' => 'Host',
      'username' => 'Username',
      'password' => 'Password',
      'port' => 'Port',
      'monitoredFolders' => 'Monitored Folders',
      'security' => 'Security',
      'fetchSince' => 'Fetch Since',
      'emailAddress' => 'Email Address',
      'sentFolder' => 'Sent Folder',
      'storeSentEmails' => 'Store Sent Emails',
      'keepFetchedEmailsUnread' => 'Keep Fetched Emails Unread',
      'emailFolder' => 'Put in Folder',
      'useImap' => 'Fetch Emails',
      'useSmtp' => 'Use SMTP',
      'smtpHost' => 'SMTP Host',
      'smtpPort' => 'SMTP Port',
      'smtpAuth' => 'SMTP Auth',
      'smtpSecurity' => 'SMTP Security',
      'smtpAuthMechanism' => 'SMTP Auth Mechanism',
      'smtpUsername' => 'SMTP Username',
      'smtpPassword' => 'SMTP Password',
      'signature' => 'Signature'
    ],
    'links' => [
      'filters' => 'Filters',
      'emails' => 'Emails'
    ],
    'options' => [
      'status' => [
        'Active' => 'Active',
        'Inactive' => 'Inactive'
      ],
      'smtpAuthMechanism' => [
        'plain' => 'PLAIN',
        'login' => 'LOGIN',
        'crammd5' => 'CRAM-MD5'
      ]
    ],
    'labels' => [
      'Create EmailAccount' => 'Create Email Account',
      'IMAP' => 'IMAP',
      'Main' => 'Main',
      'Test Connection' => 'Test Connection',
      'Send Test Email' => 'Send Test Email',
      'SMTP' => 'SMTP'
    ],
    'messages' => [
      'couldNotConnectToImap' => 'Could not connect to IMAP server',
      'connectionIsOk' => 'Connection is Ok'
    ],
    'tooltips' => [
      'useSmtp' => 'The ability to send emails.',
      'emailAddress' => 'The user record (assigned user) should have the same email address to be able to use this email account for sending.',
      'monitoredFolders' => 'Multiple folders should be separated by comma.

You can add a \'Sent\' folder to sync emails sent from an external email client.',
      'storeSentEmails' => 'Sent emails will be stored on the IMAP server. Email Address field should match the address emails will be sent from.',
      'signature' => 'Placeholders like {userName}, {name}, {emailAddress} and {phoneNumber} can be used'
    ]
  ],
  'EmailAddress' => [
    'labels' => [
      'Primary' => 'Primary',
      'Opted Out' => 'Opted Out',
      'Invalid' => 'Invalid'
    ],
    'fields' => [
      'optOut' => 'Opted Out',
      'invalid' => 'Invalid'
    ],
    'presetFilters' => [
      'orphan' => 'Orphan'
    ]
  ],
  'EmailFilter' => [
    'fields' => [
      'from' => 'From',
      'to' => 'To',
      'subject' => 'Subject',
      'bodyContains' => 'Body Contains',
      'bodyContainsAll' => 'Body Contains All',
      'action' => 'Action',
      'isGlobal' => 'Is Global',
      'emailFolder' => 'Folder',
      'groupEmailFolder' => 'Group Email Folder',
      'markAsRead' => 'Mark as Read'
    ],
    'links' => [
      'emailFolder' => 'Folder',
      'groupEmailFolder' => 'Group Email Folder'
    ],
    'labels' => [
      'Create EmailFilter' => 'Create Email Filter',
      'Emails' => 'Emails'
    ],
    'options' => [
      'action' => [
        'None' => 'None',
        'Skip' => 'Ignore',
        'Move to Folder' => 'Put in Folder',
        'Move to Group Folder' => 'Put in Group Folder'
      ]
    ],
    'tooltips' => [
      'name' => 'Give the filter a descriptive name.',
      'subject' => 'Use a wildcard *: 

 * `text*` – starts with text,
 * `*text*` – contains text,
 * `*text` – ends with text.',
      'bodyContains' => 'Body of the email contains any of the specified words or phrases.',
      'bodyContainsAll' => 'An email body contains all specified words or phrases.',
      'from' => 'Emails being sent from the specified address. Leave empty if not needed. You can use wildcard *.',
      'to' => 'Emails being sent to the specified address. Leave empty if not needed. You can use wildcard *.',
      'isGlobal' => 'Applies this filter to all emails incoming to system.'
    ]
  ],
  'EmailFolder' => [
    'fields' => [
      'skipNotifications' => 'Skip Notifications'
    ],
    'labels' => [
      'Create EmailFolder' => 'Create Folder',
      'Manage Folders' => 'Manage Folders',
      'Emails' => 'Emails'
    ]
  ],
  'EmailTemplate' => [
    'fields' => [
      'name' => 'Name',
      'status' => 'Status',
      'isHtml' => 'HTML',
      'body' => 'Body',
      'subject' => 'Subject',
      'attachments' => 'Attachments',
      'oneOff' => 'One-off',
      'category' => 'Category',
      'insertField' => 'Placeholders',
      'bodyEasyEmail' => 'Body'
    ],
    'links' => [],
    'labels' => [
      'Create EmailTemplate' => 'Create Email Template',
      'Info' => 'Info',
      'Available placeholders' => 'Available placeholders',
      'Default' => 'Default',
      'Easy Email Editor' => 'Easy Email Editor'
    ],
    'messages' => [
      'infoText' => 'Available placeholders:

{optOutUrl} &#8211; URL for an unsubscribe link;

{optOutLink} &#8211; an unsubscribe link.',
      'defaultTypeDescription' => 'Ideal for simple plaintext or HTML email templates.',
      'easyEmailTypeDescription' => 'Ideal for complex HTML email templates with images, links, complex layout and more. Uses fully-featured email editor.'
    ],
    'tooltips' => [
      'oneOff' => 'Check if you are going to use this template only once. E.g. for Mass Email.'
    ],
    'presetFilters' => [
      'actual' => 'Actual'
    ],
    'placeholderTexts' => [
      'today' => 'Today\'s date',
      'now' => 'Current date & time',
      'currentYear' => 'Current Year',
      'optOutUrl' => 'URL for an unsubscribe link',
      'optOutLink' => 'an unsubscribe link',
      'viewInBrowserUrl' => 'URL for viewing email in browser',
      'viewInBrowserLink' => 'a link for viewing email in browser',
      'siteUrl' => 'Site URL'
    ],
    'easyEmailEditorLabels' => [
      'Edit' => 'Edit',
      'Full Screen' => 'Full Screen',
      'Exit Full Screen' => 'Exit Full Screen',
      'Export Template' => 'Export Template',
      'Import Template' => 'Import Template'
    ]
  ],
  'EmailTemplateCategory' => [
    'labels' => [
      'Create EmailTemplateCategory' => 'Create Category',
      'Manage Categories' => 'Manage Categories',
      'EmailTemplates' => 'Email Templates'
    ],
    'fields' => [
      'order' => 'Order',
      'childList' => 'Child List'
    ],
    'links' => [
      'emailTemplates' => 'Email Templates'
    ]
  ],
  'EntityManager' => [
    'labels' => [
      'Fields' => 'Fields',
      'Relationships' => 'Relationships',
      'Layouts' => 'Layouts',
      'Schedule' => 'Schedule',
      'Log' => 'Log',
      'Formula' => 'Formula'
    ],
    'fields' => [
      'name' => 'Name',
      'type' => 'Type',
      'labelSingular' => 'Label Singular',
      'labelPlural' => 'Label Plural',
      'stream' => 'Stream',
      'label' => 'Label',
      'linkType' => 'Link Type',
      'entity' => 'Entity',
      'entityForeign' => 'Foreign Entity',
      'linkForeign' => 'Foreign Link',
      'link' => 'Link',
      'labelForeign' => 'Foreign Label',
      'sortBy' => 'Default Order (field)',
      'sortDirection' => 'Default Order (direction)',
      'relationName' => 'Middle Table Name',
      'linkMultipleField' => 'Link Multiple Field',
      'linkMultipleFieldForeign' => 'Foreign Link Multiple Field',
      'disabled' => 'Disabled',
      'textFilterFields' => 'Text Filter Fields',
      'audited' => 'Audited',
      'auditedForeign' => 'Foreign Audited',
      'statusField' => 'Status Field',
      'beforeSaveCustomScript' => 'Before Save Custom Script',
      'beforeSaveApiScript' => 'API Before Save Script',
      'color' => 'Color',
      'kanbanViewMode' => 'Kanban View',
      'kanbanStatusIgnoreList' => 'Ignored groups in Kanban view',
      'iconClass' => 'Icon',
      'countDisabled' => 'Disable record count',
      'fullTextSearch' => 'Full-Text Search',
      'parentEntityTypeList' => 'Parent Entity Types',
      'foreignLinkEntityTypeList' => 'Foreign Links',
      'optimisticConcurrencyControl' => 'Optimistic concurrency control',
      'updateDuplicateCheck' => 'Duplicate check on update',
      'duplicateCheckFieldList' => 'Duplicate check fields',
      'layout' => 'Layout',
      'author' => 'Author',
      'module' => 'Module',
      'version' => 'Version',
      'activityStatusList' => 'Activity Statuses',
      'historyStatusList' => 'History Statuses',
      'completedStatusList' => 'Completed Statuses',
      'canceledStatusList' => 'Canceled Statuses',
      'loaderCustomScript' => 'Loader Custom Script',
      'isWide' => 'Is Wide'
    ],
    'options' => [
      'type' => [
        '' => 'None',
        'Base' => 'Base',
        'Person' => 'Person',
        'CategoryTree' => 'Category Tree',
        'Event' => 'Event',
        'BasePlus' => 'Base Plus',
        'Company' => 'Company'
      ],
      'linkType' => [
        'manyToMany' => 'Many-to-Many',
        'oneToMany' => 'One-to-Many',
        'manyToOne' => 'Many-to-One',
        'oneToOneRight' => 'One-to-One Right',
        'oneToOneLeft' => 'One-to-One Left',
        'parentToChildren' => 'Parent-to-Children',
        'childrenToParent' => 'Children-to-Parent'
      ],
      'sortDirection' => [
        'asc' => 'Ascending',
        'desc' => 'Descending'
      ]
    ],
    'messages' => [
      'nameIsAlreadyUsed' => 'Name \'{name}\' is already used.',
      'nameIsNotAllowed' => 'Name \'{name}\' is not allowed.',
      'nameIsTooLong' => 'Name is too long.',
      'confirmRemove' => 'Are you sure you want to remove the entity type from the system?',
      'entityCreated' => 'Entity has been created',
      'linkAlreadyExists' => 'Link name conflict.',
      'linkConflict' => 'Name conflict: link or field with the same name already exists.',
      'beforeSaveCustomScript' => 'A script called every time before an entity is saved. Use for setting calculated fields.',
      'beforeSaveApiScript' => 'A script called on create and update API requests before an entity is saved. Use for custom validation and duplicate checking.'
    ],
    'tooltips' => [
      'duplicateCheckFieldList' => 'Which fields to check when performing checking for duplicates.',
      'updateDuplicateCheck' => 'Perform checking for duplicates when updating a record.',
      'optimisticConcurrencyControl' => 'Prevents writing conflicts.',
      'statusField' => 'Updates of this field are logged in stream.',
      'textFilterFields' => 'Fields used by text search.',
      'stream' => 'Whether entity has a Stream.',
      'disabled' => 'Check if you don\'t need this entity in your system.',
      'linkAudited' => 'Creating related record and linking with existing record will be logged in Stream.',
      'linkMultipleField' => 'Link Multiple field provides a handy way to edit relations. Don\'t use it if you can have a large number of related records.',
      'entityType' => 'Base Plus - has Activities, History and Tasks panels.

Event - available in Calendar and Activities panel.',
      'countDisabled' => 'Total number won\'t be displayed on the list view. Can decrease loading time when the DB table is big.',
      'fullTextSearch' => 'Running rebuild is required.',
      'activityStatusList' => 'Status values determining that an activity record should be displayed in the Activity panel and considered as actual.',
      'historyStatusList' => 'Status values determining that an activity record should be displayed in the History panel.',
      'completedStatusList' => 'Status values determining that an activity is completed.',
      'canceledStatusList' => 'Status values determining that an activity is canceled and won\'t be taken into account in free/busy ranges.',
      'isWide' => 'If checked, the detail view will be wide and side panels will be at the bottom'
    ]
  ],
  'Export' => [
    'fields' => [
      'exportAllFields' => 'Export all fields',
      'fieldList' => 'Field List',
      'format' => 'Format',
      'status' => 'Status',
      'xlsxLite' => 'Lite',
      'xlsxRecordLinks' => 'Record Links',
      'xlsxTitle' => 'Title'
    ],
    'options' => [
      'format' => [
        'csv' => 'CSV',
        'xlsx' => 'XLSX (Excel)'
      ],
      'status' => [
        'Pending' => 'Pending',
        'Running' => 'Running',
        'Success' => 'Success',
        'Failed' => 'Failed'
      ]
    ],
    'tooltips' => [
      'xlsxLite' => 'Consumes much less memory. Recommended if a big number of records is exported.',
      'xlsxTitle' => 'Print a title and current date in the header.'
    ],
    'messages' => [
      'exportProcessed' => 'Export has been processed. Download the [file]({url}).',
      'infoText' => 'The export is being processed in idle by cron. It can take some time to finish. Closing this modal dialog won\'t affect the execution process.'
    ]
  ],
  'Extension' => [
    'fields' => [
      'name' => 'Name',
      'version' => 'Version',
      'description' => 'Description',
      'isInstalled' => 'Installed',
      'checkVersionUrl' => 'An URL for checking new versions'
    ],
    'labels' => [
      'Uninstall' => 'Uninstall',
      'Install' => 'Install'
    ],
    'messages' => [
      'uninstalled' => 'Extension {name} has been uninstalled'
    ]
  ],
  'ExternalAccount' => [
    'labels' => [
      'Connect' => 'Connect',
      'Disconnect' => 'Disconnect',
      'Disconnected' => 'Disconnected',
      'Connected' => 'Connected'
    ],
    'help' => [],
    'options' => [
      'calendarDefaultEntity' => [
        'Call' => 'Call',
        'Meeting' => 'Meeting'
      ],
      'calendarDirection' => [
        'EspoToGC' => 'One-way: EspoCRM > Google Calendar',
        'GCToEspo' => 'One-way: Google Calendar > EspoCRM',
        'Both' => 'Two-way'
      ]
    ],
    'fields' => [
      'calendarStartDate' => 'Sync since',
      'calendarEntityTypes' => 'Sync Entities and Identification Labels',
      'calendarDirection' => 'Direction',
      'calendarMonitoredCalendars' => 'Other Calendars',
      'calendarMainCalendar' => 'Main Calendar',
      'calendarDefaultEntity' => 'Default Entity',
      'contactsGroups' => 'Add Contacts to Groups',
      'removeGoogleCalendarEventIfRemovedInEspo' => 'Remove Google Calendar Event upon removal in EspoCRM',
      'dontSyncEventAttendees' => 'Don\'t sync event attendees',
      'gmailEmailAddress' => 'Email Address',
      'calendarAssignDefaultTeam' => 'Assign User\'s Default Team'
    ],
    'messages' => [
      'disconnectConfirmation' => 'Do you really want to disconnect?',
      'noPanels' => 'No available Google Products. Contact your Admin.'
    ],
    'tooltips' => [
      'calendarEntityTypes' => 'For type recognizing event name has to start from identification label. Label for default entity can be empty. Recommendation: Do not change identification labels after you saved sync setting',
      'calendarDefaultEntity' => 'Unrecognized Event will be loaded as selected entity.'
    ]
  ],
  'FieldManager' => [
    'labels' => [
      'Dynamic Logic' => 'Dynamic Logic',
      'Name' => 'Name',
      'Label' => 'Label',
      'Type' => 'Type'
    ],
    'options' => [
      'dateTimeDefault' => [
        '' => 'None',
        'javascript: return this.dateTime.getNow(1);' => 'Now',
        'javascript: return this.dateTime.getNow(5);' => 'Now (5m)',
        'javascript: return this.dateTime.getNow(15);' => 'Now (15m)',
        'javascript: return this.dateTime.getNow(30);' => 'Now (30m)',
        'javascript: return this.dateTime.getDateTimeShiftedFromNow(1, \'hours\', 15);' => '+1 hour',
        'javascript: return this.dateTime.getDateTimeShiftedFromNow(2, \'hours\', 15);' => '+2 hours',
        'javascript: return this.dateTime.getDateTimeShiftedFromNow(3, \'hours\', 15);' => '+3 hours',
        'javascript: return this.dateTime.getDateTimeShiftedFromNow(4, \'hours\', 15);' => '+4 hours',
        'javascript: return this.dateTime.getDateTimeShiftedFromNow(5, \'hours\', 15);' => '+5 hours',
        'javascript: return this.dateTime.getDateTimeShiftedFromNow(6, \'hours\', 15);' => '+6 hours',
        'javascript: return this.dateTime.getDateTimeShiftedFromNow(7, \'hours\', 15);' => '+7 hours',
        'javascript: return this.dateTime.getDateTimeShiftedFromNow(8, \'hours\', 15);' => '+8 hours',
        'javascript: return this.dateTime.getDateTimeShiftedFromNow(9, \'hours\', 15);' => '+9 hours',
        'javascript: return this.dateTime.getDateTimeShiftedFromNow(10, \'hours\', 15);' => '+10 hours',
        'javascript: return this.dateTime.getDateTimeShiftedFromNow(11, \'hours\', 15);' => '+11 hours',
        'javascript: return this.dateTime.getDateTimeShiftedFromNow(12, \'hours\', 15);' => '+12 hours',
        'javascript: return this.dateTime.getDateTimeShiftedFromNow(1, \'days\', 15);' => '+1 day',
        'javascript: return this.dateTime.getDateTimeShiftedFromNow(2, \'days\', 15);' => '+2 days',
        'javascript: return this.dateTime.getDateTimeShiftedFromNow(3, \'days\', 15);' => '+3 days',
        'javascript: return this.dateTime.getDateTimeShiftedFromNow(4, \'days\', 15);' => '+4 days',
        'javascript: return this.dateTime.getDateTimeShiftedFromNow(5, \'days\', 15);' => '+5 days',
        'javascript: return this.dateTime.getDateTimeShiftedFromNow(6, \'days\', 15);' => '+6 days',
        'javascript: return this.dateTime.getDateTimeShiftedFromNow(1, \'week\', 15);' => '+1 week'
      ],
      'dateDefault' => [
        '' => 'None',
        'javascript: return this.dateTime.getToday();' => 'Today',
        'javascript: return this.dateTime.getDateShiftedFromToday(1, \'days\');' => '+1 day',
        'javascript: return this.dateTime.getDateShiftedFromToday(2, \'days\');' => '+2 days',
        'javascript: return this.dateTime.getDateShiftedFromToday(3, \'days\');' => '+3 days',
        'javascript: return this.dateTime.getDateShiftedFromToday(4, \'days\');' => '+4 days',
        'javascript: return this.dateTime.getDateShiftedFromToday(5, \'days\');' => '+5 days',
        'javascript: return this.dateTime.getDateShiftedFromToday(6, \'days\');' => '+6 days',
        'javascript: return this.dateTime.getDateShiftedFromToday(7, \'days\');' => '+7 days',
        'javascript: return this.dateTime.getDateShiftedFromToday(8, \'days\');' => '+8 days',
        'javascript: return this.dateTime.getDateShiftedFromToday(9, \'days\');' => '+9 days',
        'javascript: return this.dateTime.getDateShiftedFromToday(10, \'days\');' => '+10 days',
        'javascript: return this.dateTime.getDateShiftedFromToday(1, \'weeks\');' => '+1 week',
        'javascript: return this.dateTime.getDateShiftedFromToday(2, \'weeks\');' => '+2 weeks',
        'javascript: return this.dateTime.getDateShiftedFromToday(3, \'weeks\');' => '+3 weeks',
        'javascript: return this.dateTime.getDateShiftedFromToday(1, \'months\');' => '+1 month',
        'javascript: return this.dateTime.getDateShiftedFromToday(2, \'months\');' => '+2 months',
        'javascript: return this.dateTime.getDateShiftedFromToday(3, \'months\');' => '+3 months',
        'javascript: return this.dateTime.getDateShiftedFromToday(4, \'months\');' => '+4 months',
        'javascript: return this.dateTime.getDateShiftedFromToday(5, \'months\');' => '+5 months',
        'javascript: return this.dateTime.getDateShiftedFromToday(6, \'months\');' => '+6 months',
        'javascript: return this.dateTime.getDateShiftedFromToday(7, \'months\');' => '+7 months',
        'javascript: return this.dateTime.getDateShiftedFromToday(8, \'months\');' => '+8 months',
        'javascript: return this.dateTime.getDateShiftedFromToday(9, \'months\');' => '+9 months',
        'javascript: return this.dateTime.getDateShiftedFromToday(10, \'months\');' => '+10 months',
        'javascript: return this.dateTime.getDateShiftedFromToday(11, \'months\');' => '+11 months',
        'javascript: return this.dateTime.getDateShiftedFromToday(1, \'year\');' => '+1 year'
      ],
      'barcodeType' => [
        'EAN13' => 'EAN-13',
        'EAN8' => 'EAN-8',
        'EAN5' => 'EAN-5',
        'EAN2' => 'EAN-2',
        'UPC' => 'UPC (A)',
        'UPCE' => 'UPC (E)',
        'pharmacode' => 'Pharmacode',
        'QRcode' => 'QR code'
      ],
      'globalRestrictions' => [
        'forbidden' => 'Forbidden',
        'internal' => 'Internal',
        'onlyAdmin' => 'Admin-only',
        'readOnly' => 'Read-only',
        'nonAdminReadOnly' => 'Non-admin read-only'
      ]
    ],
    'tooltips' => [
      'optionsReference' => 'Re-use options from another field.',
      'currencyDecimal' => 'Use the Decimal DB type. In the app, values will be represented as strings. Check this parameter if precision is required.',
      'cutHeight' => 'A text higher then a specified value will be cut with a \'show more\' button displayed.',
      'urlStrip' => 'Strip a protocol and a trailing slash.',
      'audited' => 'Updates will be logged in stream.',
      'required' => 'Field will be mandatory. Can\'t be left empty.',
      'default' => 'Value will be set by default upon creating.',
      'min' => 'Min acceptable value.',
      'max' => 'Max acceptable value.',
      'seeMoreDisabled' => 'If not checked then long texts will be shortened.',
      'lengthOfCut' => 'How long text can be before it will be cut.',
      'maxLength' => 'Max acceptable length of text.',
      'before' => 'The date value should be before the date value of the specified field.',
      'after' => 'The date value should be after the date value of the specified field.',
      'readOnly' => 'Field value can\'t be specified by user. But can be calculated by formula.',
      'readOnlyAfterCreate' => 'The field value can be specified when creating a new record. After that, the field becomes read-only. It can still be calculated by formula.',
      'fileAccept' => 'Which file types to accept. It\'s possible to add custom items.',
      'barcodeLastChar' => 'For EAN-13 type.',
      'maxFileSize' => 'If empty or 0 then no limit.',
      'conversionDisabled' => 'The currency conversion action won\'t be applied to this field.',
      'pattern' => 'A regular expression to check a field value against. Define an expression or select a predefined one.',
      'options' => 'A list of possible values and their labels.',
      'optionsArray' => 'A list of possible values and their labels. If empty, the field will allow entering custom values.',
      'maxCount' => 'Maximum number of items allowed to be selected.',
      'displayAsList' => 'Each item in a new line.',
      'optionsVarchar' => 'A list of autocomplete values.',
      'linkReadOnly' => 'Field value can\'t be specified by user. But can be calculated by formula.

It will also disable the ability to create a related record from relationship panels.',
      'notStorable' => 'Whether the field in not storable in the database. Not storable field can be defined in the loader custom script. It is possible to set this property only when creating the field.',
      'recordListEnabled' => 'Show list of related records, similar to relationship panel. This option will be slow for large number of related records.',
      'recordListKeepRemoved' => 'Records removed from list will be deleted by default for 1-N relationship. If this option is set to true, removed records will be only unlinked.',
      'recordListOrderByField' => 'The field where the position in the record list will be stored. Leave blank if you do not want to enable user sorting.',
      'defaultSelectFilters' => 'Default filters for select popup.',
      'saveCoordinates' => 'Check this field to save coordinates to the database and have the option of selecting this field in the \'Map\' dashlet',
      'format' => 'Use the following placeholders:

**{number}** - The auto-increment number
**{YYYY}** - The current year (4 digits)
**{YY}** - The current year (2 digits)
**{MM}** - The current month (2 digits)
**{DD}** - The current day (2 digits)',
      'validateExistence' => 'Validate existence of VAT ID using VIES service'
    ],
    'fieldParts' => [
      'address' => [
        'street' => 'Street',
        'city' => 'City',
        'state' => 'State',
        'country' => 'Country',
        'postalCode' => 'Postal Code',
        'map' => 'Map'
      ],
      'personName' => [
        'salutation' => 'Salutation',
        'first' => 'First',
        'middle' => 'Middle',
        'last' => 'Last'
      ],
      'currency' => [
        'converted' => '(Converted)',
        'currency' => '(Currency)'
      ],
      'datetimeOptional' => [
        'date' => 'Date'
      ]
    ],
    'fieldInfo' => [
      'varchar' => 'A single-line text.',
      'enum' => 'Selectbox, only one value can be selected.',
      'text' => 'A multiline text with markdown support.',
      'date' => 'Date w/o time.',
      'datetime' => 'Date and time',
      'currency' => 'A currency value. A float number with a currency code.',
      'int' => 'A whole number.',
      'float' => 'A number with a decimal part.',
      'bool' => 'A checkbox. Two possible values: true and false.',
      'multiEnum' => 'A list of values, multiple values can be selected. The list is ordered.',
      'checklist' => 'A list of checkboxes.',
      'array' => 'A list of values, similar to Multi-Enum field.',
      'address' => 'An address with street, city, state, postal code and country.',
      'url' => 'For storing links.',
      'urlMultiple' => 'Multiple links.',
      'wysiwyg' => 'A text with HTML support.',
      'file' => 'For file uploading.',
      'image' => 'For image uploading.',
      'attachmentMultiple' => 'Allows to upload multiple files.',
      'number' => 'An auto-incrementing number of string type with a possible prefix and specific length.',
      'autoincrement' => 'A generated read-only auto-incrementing integer number.',
      'barcode' => 'A barcode. Can be printed to PDF.',
      'email' => 'A set of email addresses with their parameters: Opted-out, Invalid, Primary.',
      'phone' => 'A set of phone numbers with their parameters: Type, Opted-out, Invalid, Primary.',
      'foreign' => 'A field of a related record. Read-only.',
      'link' => 'A record related through Belongs-To (many-to-one or one-to-one) relationship.',
      'linkParent' => 'A record related through Belongs-To-Parent relationship. Can be of different entity types.',
      'linkMultiple' => 'A set of records related through Has-Many (many-to-many or one-to-many) relationship. Not all relationships have their link-multiple fields. Only those do, where Link-Multiple parameter(s) is enabled.'
    ],
    'messages' => [
      'fieldNameIsNotAllowed' => 'Field name \'{field}\' is not allowed.',
      'fieldAlreadyExists' => 'Field \'{field}\' already exists in \'{entityType}\'.',
      'linkWithSameNameAlreadyExists' => 'Link with the name \'{field}\' already exists in \'{entityType}\'.',
      'layoutMissingOrInvalid' => 'Entity \'{entityType}\' is missing layout \'{layout}\' or layout does not contain valid JSON.',
      'orderAttributeMissing' => 'Entity \'{entityType}\' is missing \'{attribute}\' order attribute.',
      'orderAttributeWrongType' => 'Entity \'{entityType}\' order attribute \'{attribute}\' must be of type \'int\'.'
    ]
  ],
  'Formula' => [
    'labels' => [
      'Check Syntax' => 'Check Syntax',
      'Run' => 'Run'
    ],
    'fields' => [
      'target' => 'Target',
      'targetType' => 'Target Type',
      'script' => 'Script',
      'output' => 'Output',
      'error' => 'Error'
    ],
    'messages' => [
      'runSuccess' => 'Executed successfully.',
      'runError' => 'Error.',
      'checkSyntaxSuccess' => 'Syntax is correct.',
      'checkSyntaxError' => 'Syntax error.',
      'emptyScript' => 'Script is empty.'
    ],
    'tooltips' => [
      'output' => 'Print values with the function `output\\printLine`.'
    ]
  ],
  'Global' => [
    'scopeNames' => [
      'Note' => 'Note',
      'Email' => 'Email',
      'User' => 'User',
      'Team' => 'Team',
      'Role' => 'Role',
      'EmailTemplate' => 'Email Template',
      'EmailTemplateCategory' => 'Email Template Categories',
      'EmailAccount' => 'Personal Email Account',
      'EmailAccountScope' => 'Personal Email Account',
      'OutboundEmail' => 'Outbound Email',
      'ScheduledJob' => 'Scheduled Job',
      'ExternalAccount' => 'External Account',
      'Extension' => 'Extension',
      'Dashboard' => 'Dashboard',
      'InboundEmail' => 'Group Email Account',
      'Stream' => 'Stream',
      'Import' => 'Import',
      'ImportError' => 'Import Error',
      'Template' => 'Template',
      'Job' => 'Job',
      'EmailFilter' => 'Email Filter',
      'Portal' => 'Portal',
      'PortalRole' => 'Portal Role',
      'Attachment' => 'Attachment',
      'EmailFolder' => 'Email Folder',
      'GroupEmailFolder' => 'Group Email Folder',
      'PortalUser' => 'Portal User',
      'ApiUser' => 'API User',
      'ScheduledJobLogRecord' => 'Scheduled Job Log Record',
      'PasswordChangeRequest' => 'Password Change Request',
      'ActionHistoryRecord' => 'Action History Record',
      'AuthToken' => 'Auth Token',
      'UniqueId' => 'Unique ID',
      'LastViewed' => 'Last Viewed',
      'Settings' => 'Settings',
      'FieldManager' => 'Field Manager',
      'Integration' => 'Integration',
      'LayoutManager' => 'Layout Manager',
      'EntityManager' => 'Entity Manager',
      'Export' => 'Export',
      'DynamicLogic' => 'Dynamic Logic',
      'DashletOptions' => 'Dashlet Options',
      'Admin' => 'Admin',
      'Global' => 'Global',
      'Preferences' => 'Preferences',
      'EmailAddress' => 'Email Address',
      'PhoneNumber' => 'Phone Number',
      'AuthLogRecord' => 'Auth Log Record',
      'AuthFailLogRecord' => 'Auth Fail Log Record',
      'LeadCapture' => 'Lead Capture Entry Point',
      'LeadCaptureLogRecord' => 'Lead Capture Log Record',
      'ArrayValue' => 'Array Value',
      'DashboardTemplate' => 'Dashboard Template',
      'Currency' => 'Currency',
      'LayoutSet' => 'Layout Set',
      'Webhook' => 'Webhook',
      'Mass Action' => 'Mass Action',
      'WorkingTimeCalendar' => 'Working Time Calendar',
      'WorkingTimeRange' => 'Working Time Range',
      'AuthenticationProvider' => 'Authentication Provider',
      'Account' => 'Account',
      'Contact' => 'Contact',
      'Lead' => 'Lead',
      'Target' => 'Target',
      'Opportunity' => 'Opportunity',
      'Meeting' => 'Meeting',
      'Calendar' => 'Calendar',
      'Call' => 'Call',
      'Task' => 'Task',
      'Case' => 'Case',
      'Document' => 'Document',
      'DocumentFolder' => 'Document Folder',
      'Campaign' => 'Campaign',
      'TargetList' => 'Target List',
      'MassEmail' => 'Mass Email',
      'EmailQueueItem' => 'Email Queue Item',
      'CampaignTrackingUrl' => 'Tracking URL',
      'Activities' => 'Activities',
      'KnowledgeBaseArticle' => 'Knowledge Base Article',
      'KnowledgeBaseCategory' => 'Knowledge Base Category',
      'CampaignLogRecord' => 'Campaign Log Record',
      'Project' => 'Project',
      'ProjectTask' => 'Project Task',
      'PushSubscriber' => 'Push Notifications Subscriber',
      'Workflow' => 'Workflow',
      'Report' => 'Report',
      'ReportCategory' => 'Report Category',
      'WorkflowLogRecord' => 'Workflow Log Record',
      'WorkflowCategory' => 'Workflow Category',
      'BpmnFlowchart' => 'Process Flowchart',
      'BpmnProcess' => 'Process',
      'BpmnUserTask' => 'Process User Task',
      'ReportFilter' => 'Report Filter',
      'ReportPanel' => 'Report Panel',
      'RecordRecurrence' => 'Record Recurrence',
      'Product' => 'Product',
      'ProductCategory' => 'Product Category',
      'TaxClass' => 'Tax Class',
      'Supplier' => 'Supplier',
      'Quote' => 'Quote',
      'QuoteItem' => 'Quote Item',
      'Invoice' => 'Issued Invoice',
      'InvoiceItem' => 'Issued Invoice Item',
      'SalesOrder' => 'Sales Order',
      'SalesOrderItem' => 'Sales Order Item',
      'PurchaseOrder' => 'Purchase Order',
      'PurchaseOrderItem' => 'Purchase Order Item',
      'SupplierInvoice' => 'Received invoice',
      'SupplierInvoiceItem' => 'Supplier Invoice Item',
      'VatIdValidation' => 'VAT ID Validation',
      'HandoverProtocol' => 'Handover Protocol',
      'DeliveryNote' => 'Delivery Note',
      'EducationAndTrainingRecord' => 'Education and Training Record',
      'MedicalExamination' => 'Medical Examination',
      'OtherEvents' => 'Other Event',
      'Password' => 'Login Credentials Record',
      'VacationRequest' => 'Vacation Request',
      'HumanResource' => 'HR employee',
      'Vacation' => 'Vacation',
      'Attendance' => 'Attendance',
      'Chat' => 'Chat',
      'Warehouse' => 'Warehouse',
      'WarehouseItem' => 'Warehouse Item',
      'WarehousePosition' => 'Warehouse Position',
      'GoodsReceipt' => 'Goods Receipt',
      'GoodsIssue' => 'Goods Issue',
      'WarehouseValueRecord' => 'Warehouse Value',
      'ProformaInvoice' => 'Issued proforma invoice',
      'ProformaInvoiceItem' => 'Item of issued proforma invoice',
      'CreditNote' => 'Credit note',
      'IssuedTaxDocument' => 'Tax documents for received payment',
      'ReceivedProformaInvoice' => 'Received proforma invoice',
      'ReceivedTaxDocument' => 'Tax documents for received payment',
      'RevenueReceipt' => 'Revenue receipt',
      'ExpenseReceipt' => 'Expense receipt',
      'GoogleCalendar' => 'Google Calendar',
      'GoogleContacts' => 'Google Contacts',
      'ProductionOrder' => 'Production Order',
      'Operation' => 'Operation',
      'ProductionModel' => 'Production Model',
      'ProductionModelOperation' => 'Production Model Operation',
      'ProductionModelItem' => 'Production Model Item',
      'LogTime' => 'Odpracováno',
      'EspoCRMnvody' => 'EspoCRM . návod',
      'BusinessProject' => 'Zakázka',
      'Porady' => 'Porada',
      'InternalAgenda' => 'Interní dokument',
      'Smernice' => 'Směrnice',
      'RequestForm' => 'Žádanka na nákup',
      'SmerniceItem' => 'Směrnice',
      'RequestItem' => 'Order request item',
      'Complaint' => 'Reklamace',
      'QualityReport' => 'QualityReport',
      'HumanResources' => 'HR Manager',
      'Absence' => 'Dovolená',
      'ClockIn' => 'ClockIn',
      'CompetetionBase' => 'CompetetionBase',
      'ProjectorDatabase' => 'Projector Database',
      'ProductDatabase' => 'Databáze produktů',
      'SupplierReclamation' => 'Supplier Reclamation',
      'SalesOrderSummaryItem' => 'Položka shrnutí zakázky',
      'Seeker' => 'Seeker',
      'JIRA' => 'CRM Task',
      'ComplaintBook' => 'Complains Book',
      'Selector' => 'Selector',
      'Wiso' => 'Wiso',
      'ItTask' => 'IT Marketing Task',
      'Tax' => 'Tax',
      'Manufacturing' => 'Manufacturing',
      'Prospect' => 'Prospect'
    ],
    'scopeNamesPlural' => [
      'Note' => 'Notes',
      'Email' => 'Emails',
      'User' => 'Users',
      'Team' => 'Teams',
      'Role' => 'Roles',
      'EmailTemplate' => 'Email Templates',
      'EmailTemplateCategory' => 'Email Template Categories',
      'EmailAccount' => 'Personal Email Accounts',
      'EmailAccountScope' => 'Personal Email Accounts',
      'OutboundEmail' => 'Outbound Emails',
      'ScheduledJob' => 'Scheduled Jobs',
      'ExternalAccount' => 'External Accounts',
      'Extension' => 'Extensions',
      'Dashboard' => 'Dashboard',
      'InboundEmail' => 'Group Email Accounts',
      'EmailAddress' => 'Email Addresses',
      'PhoneNumber' => 'Phone Numbers',
      'Stream' => 'Stream',
      'Import' => 'Import',
      'ImportError' => 'Import Errors',
      'Template' => 'Templates',
      'Job' => 'Jobs',
      'EmailFilter' => 'Email Filters',
      'Portal' => 'Portals',
      'PortalRole' => 'Portal Roles',
      'Attachment' => 'Attachments',
      'EmailFolder' => 'Email Folders',
      'GroupEmailFolder' => 'Group Email Folders',
      'PortalUser' => 'Portal Users',
      'ApiUser' => 'API Users',
      'ScheduledJobLogRecord' => 'Scheduled Job Log Records',
      'PasswordChangeRequest' => 'Password Change Requests',
      'ActionHistoryRecord' => 'Action History',
      'AuthToken' => 'Auth Tokens',
      'UniqueId' => 'Unique IDs',
      'LastViewed' => 'Last Viewed',
      'AuthLogRecord' => 'Auth Log',
      'AuthFailLogRecord' => 'Auth Fail Log',
      'LeadCapture' => 'Lead Capture',
      'LeadCaptureLogRecord' => 'Lead Capture Log',
      'ArrayValue' => 'Array Values',
      'DashboardTemplate' => 'Dashboard Templates',
      'Currency' => 'Currency',
      'LayoutSet' => 'Layout Sets',
      'Webhook' => 'Webhooks',
      'WorkingTimeCalendar' => 'Working Time Calendars',
      'WorkingTimeRange' => 'Working Time Ranges',
      'AuthenticationProvider' => 'Authentication Providers',
      'Account' => 'Accounts',
      'Contact' => 'Contacts',
      'Lead' => 'Leads',
      'Target' => 'Targets',
      'Opportunity' => 'Opportunities',
      'Meeting' => 'Meetings',
      'Calendar' => 'Calendar',
      'Call' => 'Calls',
      'Task' => 'Tasks',
      'Case' => 'Cases',
      'Document' => 'Documents',
      'DocumentFolder' => 'Document Folders',
      'Campaign' => 'Campaigns',
      'TargetList' => 'Target Lists',
      'MassEmail' => 'Mass Emails',
      'EmailQueueItem' => 'Email Queue Items',
      'CampaignTrackingUrl' => 'Tracking URLs',
      'Activities' => 'Activities',
      'KnowledgeBaseArticle' => 'Knowledge Base',
      'KnowledgeBaseCategory' => 'Knowledge Base Categories',
      'CampaignLogRecord' => 'Campaign Log Records',
      'Project' => 'Projects',
      'ProjectTask' => 'Project Tasks',
      'PushSubscriber' => 'Push Notifications Subscribers',
      'Workflow' => 'Workflows',
      'Report' => 'Reports',
      'ReportCategory' => 'Report Categories',
      'WorkflowLogRecord' => 'Workflows Log',
      'WorkflowCategory' => 'Workflow Categories',
      'BpmnFlowchart' => 'Process Flowcharts',
      'BpmnProcess' => 'Processes',
      'BpmnUserTask' => 'Process User Tasks',
      'ReportFilter' => 'Report Filters',
      'ReportPanel' => 'Report Panels',
      'RecordRecurrence' => 'Records Recurrences',
      'Product' => 'Products',
      'ProductCategory' => 'Product Categories',
      'TaxClass' => 'Tax Classes',
      'Supplier' => 'Suppliers',
      'Quote' => 'Quotes',
      'QuoteItem' => 'Quote Items',
      'Invoice' => 'Issued Invoices',
      'InvoiceItem' => 'Issued Invoice Items',
      'SalesOrder' => 'Sales Orders',
      'SalesOrderItem' => 'Sales Order Items',
      'PurchaseOrder' => 'Purchase Orders',
      'PurchaseOrderItem' => 'Purchase Order Items',
      'SupplierInvoice' => 'Received invoices',
      'SupplierInvoiceItem' => 'Supplier Invoice Items',
      'VatIdValidation' => 'VAT ID Validations',
      'HandoverProtocol' => 'Handover Protocols',
      'DeliveryNote' => 'Delivery Notes',
      'EducationAndTrainingRecord' => 'Education and Training Records',
      'MedicalExamination' => 'Medical Examinations',
      'OtherEvents' => 'Other Events',
      'Password' => 'Login Credentials Records',
      'VacationRequest' => 'Vacation Requests',
      'HumanResource' => 'HR employers',
      'Vacation' => 'Vacations',
      'Attendance' => 'Attendances',
      'Chat' => 'Chat',
      'Warehouse' => 'Warehouses',
      'WarehouseItem' => 'Warehouse Items',
      'WarehousePosition' => 'Warehouse Positions',
      'GoodsReceipt' => 'Goods Receipts',
      'GoodsIssue' => 'Goods Issues',
      'WarehouseValueRecord' => 'Warehouse Values',
      'ProformaInvoice' => 'Issued proforma invoices',
      'ProformaInvoiceItem' => 'Items of issued proforma invoices',
      'CreditNote' => 'Credit notes',
      'IssuedTaxDocument' => 'Tax documents for received payments',
      'ReceivedProformaInvoice' => 'Received proforma invoices',
      'ReceivedTaxDocument' => 'Tax documents for received payments',
      'RevenueReceipt' => 'Revenue receipts',
      'ExpenseReceipt' => 'Expense receipts',
      'GoogleCalendar' => 'Google Calendar',
      'GoogleContacts' => 'Google Contacts',
      'ProductionOrder' => 'Production Orders',
      'Operation' => 'Operations',
      'ProductionModel' => 'Production Models',
      'ProductionModelOperation' => 'Production Model Operations',
      'ProductionModelItem' => 'Production Model Items',
      'LogTime' => 'Odpracováno',
      'EspoCRMnvody' => 'EspoCRM . návodiy',
      'BusinessProject' => 'Zakázky',
      'Porady' => 'Porady',
      'InternalAgenda' => 'Interní dokumenty',
      'Smernice' => 'Směrnice',
      'RequestForm' => 'Žádanky na nákup',
      'SmerniceItem' => 'Směrnice',
      'RequestItem' => 'Request Form Item',
      'Complaint' => 'Reklamace',
      'QualityReport' => 'QualityReports',
      'HumanResources' => 'HR Managers',
      'Absence' => 'Dovolená',
      'ClockIn' => 'ClockIns',
      'CompetetionBase' => 'CompetetionBases',
      'ProjectorDatabase' => 'Databáze projektorů',
      'ProductDatabase' => 'Databáze produktů',
      'SupplierReclamation' => 'Supplier Reclamations',
      'SalesOrderSummaryItem' => 'Položky shrnutí zakázky',
      'Seeker' => 'Projector selector',
      'JIRA' => 'CRM bugs',
      'ComplaintBook' => 'Complains Book',
      'Selector' => 'Projector Selector',
      'Wiso' => 'wiso',
      'ItTask' => 'IT Tasks',
      'Tax' => 'Tax',
      'Manufacturing' => 'Manufacturing',
      'Prospect' => 'Prospects'
    ],
    'labels' => [
      'Sort' => 'Sort',
      'Misc' => 'Misc',
      'Merge' => 'Merge',
      'None' => 'None',
      'Home' => 'Home',
      'by' => 'by',
      'Proceed' => 'Proceed',
      'Saved' => 'Saved',
      'Error' => 'Error',
      'Select' => 'Select',
      'Not valid' => 'Not valid',
      'Please wait...' => 'Please wait...',
      'Please wait' => 'Please wait',
      'Attached' => 'Attached',
      'Loading...' => 'Loading...',
      'Uploading...' => 'Uploading...',
      'Sending...' => 'Sending...',
      'Merged' => 'Merged',
      'Removed' => 'Removed',
      'Posted' => 'Posted',
      'Linked' => 'Linked',
      'Unlinked' => 'Unlinked',
      'Done' => 'Done',
      'Access denied' => 'Access denied',
      'Not found' => 'Not found',
      'Access' => 'Access',
      'Are you sure?' => 'Are you sure?',
      'Record has been removed' => 'Record has been removed',
      'Wrong username/password' => 'Wrong username/password',
      'Post cannot be empty' => 'Post cannot be empty',
      'Username can not be empty!' => 'Username can not be empty!',
      'Cache is not enabled' => 'Cache is not enabled',
      'Cache has been cleared' => 'Cache has been cleared',
      'Rebuild has been done' => 'Rebuild has been done',
      'Return to Application' => 'Return to Application',
      'Modified' => 'Modified',
      'Created' => 'Created',
      'Create' => 'Create',
      'create' => 'create',
      'Overview' => 'Overview',
      'Details' => 'Details',
      'Add Field' => 'Add Field',
      'Add Dashlet' => 'Add Dashlet',
      'Filter' => 'Filter',
      'Edit Dashboard' => 'Edit Dashboard',
      'Add' => 'Add',
      'Add Item' => 'Add Item',
      'Reset' => 'Reset',
      'Menu' => 'Menu',
      'More' => 'More',
      'Search' => 'Search',
      'Only My' => 'Only My',
      'Open' => 'Open',
      'Admin' => 'Admin',
      'About' => 'About',
      'Refresh' => 'Refresh',
      'Remove' => 'Remove',
      'Restore' => 'Restore',
      'Options' => 'Options',
      'Username' => 'Username',
      'Password' => 'Password',
      'Login' => 'Login',
      'Log Out' => 'Log Out',
      'Log in' => 'Log in',
      'Log in as' => 'Log in as',
      'Sign in' => 'Sign in',
      'Preferences' => 'Preferences',
      'State' => 'State',
      'Street' => 'Street',
      'Country' => 'Country',
      'City' => 'City',
      'PostalCode' => 'Postal Code',
      'Followed' => 'Followed',
      'Follow' => 'Follow',
      'Followers' => 'Followers',
      'Clear Local Cache' => 'Clear Local Cache',
      'Actions' => 'Actions',
      'Delete' => 'Delete',
      'Update' => 'Update',
      'Save' => 'Save',
      'Edit' => 'Edit',
      'View' => 'View',
      'Cancel' => 'Cancel',
      'Apply' => 'Apply',
      'Unlink' => 'Unlink',
      'Mass Update' => 'Mass Update',
      'Export' => 'Export',
      'No Data' => 'No Data',
      'No Access' => 'No Access',
      'All' => 'All',
      'Active' => 'Active',
      'Inactive' => 'Inactive',
      'Write your comment here' => 'Write your comment here',
      'Post' => 'Post',
      'Stream' => 'Stream',
      'Show more' => 'Show more',
      'Dashlet Options' => 'Dashlet Options',
      'Full Form' => 'Full Form',
      'Insert' => 'Insert',
      'Person' => 'Person',
      'First Name' => 'First Name',
      'Last Name' => 'Last Name',
      'Middle Name' => 'Middle Name',
      'Original' => 'Original',
      'You' => 'You',
      'you' => 'you',
      'change' => 'change',
      'Change' => 'Change',
      'Primary' => 'Primary',
      'Save Filter' => 'Save Filter',
      'Administration' => 'Administration',
      'Run Import' => 'Run Import',
      'Duplicate' => 'Duplicate',
      'Notifications' => 'Notifications',
      'Mark all read' => 'Mark all read',
      'See more' => 'See more',
      'Today' => 'Today',
      'Tomorrow' => 'Tomorrow',
      'Yesterday' => 'Yesterday',
      'Submit' => 'Submit',
      'Close' => 'Close',
      'Yes' => 'Yes',
      'No' => 'No',
      'Select All Results' => 'Select All Results',
      'Value' => 'Value',
      'Current version' => 'Current version',
      'List View' => 'List View',
      'Tree View' => 'Tree View',
      'Unlink All' => 'Unlink All',
      'Total' => 'Total',
      'Print' => 'Print',
      'Print to PDF' => 'Print to PDF',
      'Default' => 'Default',
      'Number' => 'Number',
      'From' => 'From',
      'To' => 'To',
      'Create Post' => 'Create Post',
      'Previous Entry' => 'Previous Entry',
      'Next Entry' => 'Next Entry',
      'View List' => 'View List',
      'Attach File' => 'Attach File',
      'Skip' => 'Skip',
      'Attribute' => 'Attribute',
      'Function' => 'Function',
      'Self-Assign' => 'Self-Assign',
      'Self-Assigned' => 'Self-Assigned',
      'Expand' => 'Expand',
      'Collapse' => 'Collapse',
      'New notifications' => 'New notifications',
      'Manage Categories' => 'Manage Categories',
      'Manage Folders' => 'Manage Folders',
      'Convert to' => 'Convert to',
      'View Personal Data' => 'View Personal Data',
      'Personal Data' => 'Personal Data',
      'Erase' => 'Erase',
      'View Followers' => 'View Followers',
      'Convert Currency' => 'Convert Currency',
      'View on Map' => 'View on Map',
      'Preview' => 'Preview',
      'Move Over' => 'Move Over',
      'Up' => 'Up',
      'Save & Continue Editing' => 'Save & Continue Editing',
      'Save & New' => 'Save & New',
      'Field' => 'Field',
      'Resolution' => 'Resolution',
      'Resolve Conflict' => 'Resolve Conflict',
      'Download' => 'Download',
      'Global Search' => 'Global Search',
      'Show Navigation Panel' => 'Show Navigation Panel',
      'Hide Navigation Panel' => 'Hide Navigation Panel',
      'Copy to Clipboard' => 'Copy to Clipboard',
      'Copied to clipboard' => 'Copied to clipboard',
      'Schedule' => 'Schedule',
      'Log' => 'Log',
      'Scheduler' => 'Scheduler',
      'Create InboundEmail' => 'Create Inbound Email',
      'Activities' => 'Activities',
      'History' => 'History',
      'Attendees' => 'Attendees',
      'Schedule Meeting' => 'Schedule Meeting',
      'Schedule Call' => 'Schedule Call',
      'Compose Email' => 'Compose Email',
      'Log Meeting' => 'Log Meeting',
      'Log Call' => 'Log Call',
      'Archive Email' => 'Archive Email',
      'Create Task' => 'Create Task',
      'Tasks' => 'Tasks',
      'Add Aggregation Function' => 'Add Aggregation Function',
      'Edit Entity' => 'Edit Entity',
      'Edit Filters' => 'Edit Filters',
      'Edit Labels' => 'Edit Labels',
      'Edit Layout' => 'Edit Layout',
      'Edit Navbar' => 'Edit Navbar',
      'Google Calendar' => 'Google calendar',
      'Increase' => 'Increase',
      'Multiply' => 'Multiply',
      'Outlook Calendar' => 'Outlook calendar',
      'Refresh Entity' => 'Refresh Entity',
      'Return to My Account' => 'Return to My Account',
      'Send Email' => 'Send Email',
      'Undo Last Stroke' => 'Undo Last Stroke',
      'View as User' => 'View as User',
      'Start Process' => 'Start Process',
      'Schedule Recurrence' => 'Schedule Recurrence',
      'Scheduled Recurrences' => 'Scheduled Recurrences',
      'Fill from Contact' => 'Fill from Contact',
      'Fill from Account' => 'Fill from Account',
      'Force Mattermost Sync' => 'Force Mattermost Sync',
      'noVatPayer' => 'I am not a VAT payer',
      'vatPayer' => 'I am a VAT payer'
    ],
    'messages' => [
      'pleaseWait' => 'Please wait...',
      'loading' => 'Loading...',
      'saving' => 'Saving...',
      'confirmLeaveOutMessage' => 'Are you sure you want to leave the form?',
      'notModified' => 'You have not modified the record',
      'duplicate' => 'The record you are creating might already exist',
      'dropToAttach' => 'Drop to attach',
      'fieldUrlExceedsMaxLength' => 'Encoded URL exceeds max length of {maxLength}',
      'fieldNotMatchingPattern' => '{field} does not match the pattern `{pattern}`',
      'fieldNotMatchingPattern$noBadCharacters' => '{field} contains not allowed characters',
      'fieldNotMatchingPattern$noAsciiSpecialCharacters' => '{field} should not contain ASCII special characters',
      'fieldNotMatchingPattern$latinLetters' => '{field} can contain only latin letters',
      'fieldNotMatchingPattern$latinLettersDigits' => '{field} can contain only latin letters and digits',
      'fieldNotMatchingPattern$latinLettersDigitsWhitespace' => '{field} can contain only latin letters, digits and whitespace',
      'fieldNotMatchingPattern$latinLettersWhitespace' => '{field} can contain only latin letters and whitespace',
      'fieldNotMatchingPattern$digits' => '{field} can contain only digits',
      'fieldNotMatchingPattern$uriOptionalProtocol' => '{field} must be a valid URL',
      'fieldInvalid' => '{field} is invalid',
      'fieldIsRequired' => '{field} is required',
      'fieldPhoneInvalid' => '{field} is invalid',
      'fieldPhoneInvalidCode' => 'Invalid country code',
      'fieldPhoneTooShort' => '{field} is too short',
      'fieldPhoneTooLong' => '{field} is too long',
      'fieldPhoneInvalidCharacters' => 'Only digits, latin letters and characters `-+_@:#().` are allowed',
      'fieldShouldBeEmail' => '{field} should be a valid email',
      'fieldShouldBeFloat' => '{field} should be a valid float',
      'fieldShouldBeInt' => '{field} should be a valid integer',
      'fieldShouldBeNumber' => '{field} should be a valid number',
      'fieldShouldBeDate' => '{field} should be a valid date',
      'fieldShouldBeDatetime' => '{field} should be a valid date/time',
      'fieldShouldAfter' => '{field} should be after {otherField}',
      'fieldShouldBefore' => '{field} should be before {otherField}',
      'fieldShouldBeBetween' => '{field} should be between {min} and {max}',
      'fieldShouldBeLess' => '{field} shouldn\'t be greater than {value}',
      'fieldShouldBeGreater' => '{field} shouldn\'t be less than {value}',
      'fieldBadPasswordConfirm' => '{field} not confirmed properly',
      'fieldMaxFileSizeError' => 'File should not exceed {max} Mb',
      'fieldValueDuplicate' => 'Duplicate value',
      'fieldIsUploading' => 'Uploading in progress',
      'fieldExceedsMaxCount' => 'Count exceeds max allowed {maxCount}',
      'barcodeInvalid' => '{field} is not valid {type}',
      'arrayItemMaxLength' => 'Item shouldn\'t be longer than {max} characters',
      'resetPreferencesDone' => 'Preferences has been reset to defaults',
      'confirmation' => 'Are you sure?',
      'unlinkAllConfirmation' => 'Are you sure you want to unlink all related records?',
      'resetPreferencesConfirmation' => 'Are you sure you want to reset preferences to defaults?',
      'removeRecordConfirmation' => 'Are you sure you want to remove the record?',
      'unlinkRecordConfirmation' => 'Are you sure you want to unlink the related record?',
      'removeSelectedRecordsConfirmation' => 'Are you sure you want to remove selected records?',
      'unlinkSelectedRecordsConfirmation' => 'Are you sure you want to unlink selected records?',
      'massUpdateResult' => '{count} records have been updated',
      'massUpdateResultSingle' => '{count} record has been updated',
      'recalculateFormulaConfirmation' => 'Are you sure you want to recalculate formula for selected records?',
      'noRecordsUpdated' => 'No records were updated',
      'massRemoveResult' => '{count} records have been removed',
      'massRemoveResultSingle' => '{count} record has been removed',
      'noRecordsRemoved' => 'No records were removed',
      'clickToRefresh' => 'Click to refresh',
      'writeYourCommentHere' => 'Write your comment here',
      'writeMessageToUser' => 'Write a message to {user}',
      'writeMessageToSelf' => 'Write a message on your stream',
      'typeAndPressEnter' => 'Type & press enter',
      'checkForNewNotifications' => 'Check for new notifications',
      'checkForNewNotes' => 'Check for stream updates',
      'internalPost' => 'Post will be seen only by internal users',
      'internalPostTitle' => 'Post is seen only by internal users',
      'done' => 'Done',
      'notUpdated' => 'Not updated',
      'confirmMassFollow' => 'Are you sure you want to follow selected records?',
      'confirmMassUnfollow' => 'Are you sure you want to unfollow selected records?',
      'massFollowResult' => '{count} records now are followed',
      'massUnfollowResult' => '{count} records now are not followed',
      'massFollowResultSingle' => '{count} record now is followed',
      'massUnfollowResultSingle' => '{count} record now is not followed',
      'massFollowZeroResult' => 'Nothing got followed',
      'massUnfollowZeroResult' => 'Nothing got unfollowed',
      'erasePersonalDataConfirmation' => 'Checked fields will be erased permanently. Are you sure?',
      'maintenanceModeError' => 'The application currently is in maintenance mode.',
      'maintenanceMode' => 'The application currently is in maintenance mode. Only admin users have access.

Maintenance mode can be disabled at Administration → Settings.',
      'resolveSaveConflict' => 'The record has been modified. You need to resolve the conflict before you can save the record.',
      'massPrintPdfMaxCountError' => 'Can\'t print more that {maxCount} records.',
      'massActionProcessed' => 'Mass action has been processed.',
      'validationFailure' => 'Backend validation failure.

Field: `{field}`
Validation: `{type}`',
      'extensionLicenseInvalid' => 'Invalid \'{name}\' extension license.',
      'extensionLicenseExpired' => 'The \'{name}\' extension license subscription has expired.',
      'extensionLicenseSoftExpired' => 'The \'{name}\' extension license subscription has expired.',
      'confirmAppRefresh' => 'The application has been updated. It is recommended to refresh the page to ensure the proper functioning.',
      'loggedOutLeaveOut' => 'Logged out. The session is inactive. You may lose unsaved form data after page refresh. You may need to make a copy.',
      'noAccessToRecord' => 'Operation requires `{action}` access to record.',
      'noAccessToForeignRecord' => 'Operation requires `{action}` access to foreign record.',
      'noLinkAccess' => 'Can\'t relate with {foreignEntityType} record through the link \'{link}\'. No access.',
      'cannotUnrelateRequiredLink' => 'Can\'t unrelate required link.',
      'cannotRelateNonExisting' => 'Can\'t relate with non-existing {foreignEntityType} record.',
      'cannotRelateForbidden' => 'Can\'t relate with forbidden {foreignEntityType} record. `{action}` access required.',
      'cannotRelateForbiddenLink' => 'No access to link \'{link}\'.',
      'error404' => 'The url you requested can\'t be handled.',
      'error403' => 'You don\'t have an access to this area.',
      'emptyMassUpdate' => 'No fields available for Mass Update.',
      'attemptIntervalFailure' => 'The operation is not allowed during a specific time interval. Wait for some time before the next attempt.',
      'foreignMultipleSearchWarning' => 'You can\'t filter by this field',
      'noEmailsInSelect' => 'Selection does not contain any email addresses.',
      'contactInfoTitle' => 'Contact Info',
      'valid' => 'valid',
      'invalid' => 'invalid',
      'verifiedVatId' => 'Verified <b>{vatId}</b> on {vatDate} is {vatType}',
      'shortValidVatIdMessage' => 'Valid VAT ID',
      'shortInvalidVatIdMessage' => 'Invalid VAT ID, or belongs to a non-EU entity',
      'mattermostDisabled' => 'Mattermost chat is disabled for this user. Ensure that the user has enabled Mattermost sync and that the Mattermost integration is configured in the system administration.',
      'mattermostRequiresEmail' => 'Mattermost sync requires you to fill in your email address.',
      'mattermostRequiresFirstName' => 'Mattermost sync requires you to fill in your first name.',
      'mattermostRequiresPassword' => 'Mattermost sync requires you to fill in your password when creating a new user.',
      'enterAmount' => 'Enter amount',
      'theAmountMustBeNumeric' => 'The amount must be numeric (0.00)',
      'theAmountMustNotExceedOneTrillion' => 'The amount must not exceed one trillion'
    ],
    'boolFilters' => [
      'onlyMy' => 'Only My',
      'onlyMyTeam' => 'My Team',
      'followed' => 'Followed'
    ],
    'presetFilters' => [
      'followed' => 'Followed',
      'all' => 'All'
    ],
    'massActions' => [
      'delete' => 'Delete',
      'remove' => 'Remove',
      'merge' => 'Merge',
      'update' => 'Update',
      'massUpdate' => 'Mass Update',
      'unlink' => 'Unlink',
      'export' => 'Export',
      'follow' => 'Follow',
      'unfollow' => 'Unfollow',
      'convertCurrency' => 'Convert Currency',
      'recalculateFormula' => 'Recalculate Formula',
      'printPdf' => 'Print to PDF',
      'bulkEmail' => 'Bulk Email',
      'bulkEmailBcc' => 'Bulk Email (BCC)',
      'zipAttachments' => 'Download attachments as ZIP'
    ],
    'fields' => [
      'name' => 'Name',
      'firstName' => 'First Name',
      'lastName' => 'Last Name',
      'middleName' => 'Middle Name',
      'salutationName' => 'Salutation',
      'assignedUser' => 'Assigned User',
      'assignedUsers' => 'Assigned Users',
      'emailAddress' => 'Email',
      'emailAddressData' => 'Email Address Data',
      'emailAddressIsOptedOut' => 'Email Address is Opted-Out',
      'emailAddressIsInvalid' => 'Email Address is Invalid',
      'assignedUserName' => 'Assigned User Name',
      'teams' => 'Teams',
      'createdAt' => 'Created At',
      'modifiedAt' => 'Modified At',
      'createdBy' => 'Created By',
      'modifiedBy' => 'Modified By',
      'description' => 'Description',
      'address' => 'Address',
      'phoneNumber' => 'Phone',
      'phoneNumberMobile' => 'Phone (Mobile)',
      'phoneNumberHome' => 'Phone (Home)',
      'phoneNumberFax' => 'Phone (Fax)',
      'phoneNumberOffice' => 'Phone (Office)',
      'phoneNumberOther' => 'Phone (Other)',
      'phoneNumberData' => 'Phone Number Data',
      'phoneNumberIsOptedOut' => 'Phone Number is Opted-Out',
      'phoneNumberIsInvalid' => 'Phone Number is Invalid',
      'order' => 'Order',
      'parent' => 'Parent',
      'children' => 'Children',
      'id' => 'ID',
      'ids' => 'IDs',
      'type' => 'Type',
      'names' => 'Names',
      'types' => 'Types',
      'targetListIsOptedOut' => 'Is Opted Out (Target List)',
      'billingAddressCity' => 'City',
      'billingAddressCountry' => 'Country',
      'billingAddressPostalCode' => 'Postal Code',
      'billingAddressState' => 'State',
      'billingAddressStreet' => 'Street',
      'billingAddressMap' => 'Map',
      'addressCity' => 'City',
      'addressStreet' => 'Street',
      'addressCountry' => 'Country',
      'addressState' => 'State',
      'addressPostalCode' => 'Postal Code',
      'addressMap' => 'Map',
      'shippingAddressCity' => 'City (Shipping)',
      'shippingAddressStreet' => 'Street (Shipping)',
      'shippingAddressCountry' => 'Country (Shipping)',
      'shippingAddressState' => 'State (Shipping)',
      'shippingAddressPostalCode' => 'Postal Code (Shipping)',
      'shippingAddressMap' => 'Map (Shipping)',
      'label' => 'Label'
    ],
    'links' => [
      'assignedUser' => 'Assigned User',
      'createdBy' => 'Created By',
      'modifiedBy' => 'Modified By',
      'team' => 'Team',
      'roles' => 'Roles',
      'teams' => 'Teams',
      'users' => 'Users',
      'parent' => 'Parent',
      'children' => 'Children',
      'contacts' => 'Contacts',
      'opportunities' => 'Opportunities',
      'leads' => 'Leads',
      'meetings' => 'Meetings',
      'calls' => 'Calls',
      'tasks' => 'Tasks',
      'emails' => 'Emails',
      'accounts' => 'Accounts',
      'cases' => 'Cases',
      'documents' => 'Documents',
      'account' => 'Account',
      'opportunity' => 'Opportunity',
      'contact' => 'Contact'
    ],
    'dashlets' => [
      'Stream' => 'Stream',
      'Emails' => 'My Inbox',
      'Iframe' => 'Iframe',
      'Records' => 'Record List',
      'Memo' => 'Memo',
      'Leads' => 'My Leads',
      'Opportunities' => 'My Opportunities',
      'Tasks' => 'My Tasks',
      'Cases' => 'My Cases',
      'Calendar' => 'Calendar',
      'Calls' => 'My Calls',
      'Meetings' => 'My Meetings',
      'OpportunitiesByStage' => 'Opportunities by Stage',
      'OpportunitiesByLeadSource' => 'Opportunities by Lead Source',
      'SalesByMonth' => 'Sales by Month',
      'SalesPipeline' => 'Sales Pipeline',
      'Activities' => 'My Activities',
      'Kanban' => 'Kanban',
      'Map' => 'Map',
      'RecordList' => 'Record List',
      'Report' => 'Report',
      'BpmnUserTasks' => 'Process User Tasks'
    ],
    'notificationMessages' => [
      'assign' => '{entityType} {entity} has been assigned to you',
      'emailReceived' => 'Email received from {from}',
      'entityRemoved' => '{user} removed {entityType} {entity}',
      'eventAttendee' => '{user} added you to {entityType} {entity}'
    ],
    'streamMessages' => [
      'post' => '{user} posted on {entityType} {entity}',
      'attach' => '{user} attached on {entityType} {entity}',
      'status' => '{user} updated {field} of {entityType} {entity}',
      'update' => '{user} updated {entityType} {entity}',
      'postTargetTeam' => '{user} posted to team {target}',
      'postTargetTeams' => '{user} posted to teams {target}',
      'postTargetPortal' => '{user} posted to portal {target}',
      'postTargetPortals' => '{user} posted to portals {target}',
      'postTarget' => '{user} posted to {target}',
      'postTargetYou' => '{user} posted to you',
      'postTargetYouAndOthers' => '{user} posted to {target} and you',
      'postTargetAll' => '{user} posted to all',
      'postTargetSelf' => '{user} self-posted',
      'postTargetSelfAndOthers' => '{user} posted to {target} and themself',
      'mentionInPost' => '{user} mentioned {mentioned} in {entityType} {entity}',
      'mentionYouInPost' => '{user} mentioned you in {entityType} {entity}',
      'mentionInPostTarget' => '{user} mentioned {mentioned} in post',
      'mentionYouInPostTarget' => '{user} mentioned you in post to {target}',
      'mentionYouInPostTargetAll' => '{user} mentioned you in post to all',
      'mentionYouInPostTargetNoTarget' => '{user} mentioned you in post',
      'create' => '{user} created {entityType} {entity}',
      'createThis' => '{user} created this {entityType}',
      'createAssignedThis' => '{user} created this {entityType} assigned to {assignee}',
      'createAssigned' => '{user} created {entityType} {entity} assigned to {assignee}',
      'createAssignedYou' => '{user} created {entityType} {entity} assigned to you',
      'createAssignedThisSelf' => '{user} created this {entityType} self-assigned',
      'createAssignedSelf' => '{user} created {entityType} {entity} self-assigned',
      'assign' => '{user} assigned {entityType} {entity} to {assignee}',
      'assignThis' => '{user} assigned this {entityType} to {assignee}',
      'assignYou' => '{user} assigned {entityType} {entity} to you',
      'assignThisVoid' => '{user} unassigned this {entityType}',
      'assignVoid' => '{user} unassigned {entityType} {entity}',
      'assignThisSelf' => '{user} self-assigned this {entityType}',
      'assignSelf' => '{user} self-assigned {entityType} {entity}',
      'postThis' => '{user} posted',
      'attachThis' => '{user} attached',
      'statusThis' => '{user} updated {field}',
      'updateThis' => '{user} updated this {entityType}',
      'createRelatedThis' => '{user} created {relatedEntityType} {relatedEntity} related to this {entityType}',
      'createRelated' => '{user} created {relatedEntityType} {relatedEntity} related to {entityType} {entity}',
      'relate' => '{user} linked {relatedEntityType} {relatedEntity} with {entityType} {entity}',
      'relateThis' => '{user} linked {relatedEntityType} {relatedEntity} with this {entityType}',
      'unrelate' => '{user} unlinked {relatedEntityType} {relatedEntity} from {entityType} {entity}',
      'unrelateThis' => '{user} unlinked {relatedEntityType} {relatedEntity} from this {entityType}',
      'emailReceivedFromThis' => 'Email received from {from}',
      'emailReceivedInitialFromThis' => 'Email received from {from}, this {entityType} created',
      'emailReceivedThis' => 'Email received',
      'emailReceivedInitialThis' => 'Email received, this {entityType} created',
      'emailReceivedFrom' => 'Email received from {from}, related to {entityType} {entity}',
      'emailReceivedFromInitial' => 'Email received from {from}, {entityType} {entity} created',
      'emailReceived' => 'Email received related to {entityType} {entity}',
      'emailReceivedInitial' => 'Email received: {entityType} {entity} created',
      'emailReceivedInitialFrom' => 'Email received from {from}, {entityType} {entity} created',
      'emailSent' => '{by} sent email related to {entityType} {entity}',
      'emailSentThis' => '{by} sent email',
      'eventConfirmationAccepted' => '{invitee} accepted participation in {entityType} {entity}',
      'eventConfirmationDeclined' => '{invitee} declined participation in {entityType} {entity}',
      'eventConfirmationTentative' => '{invitee} is tentative about participation in {entityType} {entity}',
      'eventConfirmationAcceptedThis' => '{invitee} accepted participation',
      'eventConfirmationDeclinedThis' => '{invitee} declined participation',
      'eventConfirmationTentativeThis' => '{invitee} is tentative about participation'
    ],
    'streamMessagesMale' => [
      'postTargetSelfAndOthers' => '{user} posted to {target} and himself'
    ],
    'streamMessagesFemale' => [
      'postTargetSelfAndOthers' => '{user} posted to {target} and herself'
    ],
    'lists' => [
      'monthNames' => [
        0 => 'January',
        1 => 'February',
        2 => 'March',
        3 => 'April',
        4 => 'May',
        5 => 'June',
        6 => 'July',
        7 => 'August',
        8 => 'September',
        9 => 'October',
        10 => 'November',
        11 => 'December'
      ],
      'monthNamesShort' => [
        0 => 'Jan',
        1 => 'Feb',
        2 => 'Mar',
        3 => 'Apr',
        4 => 'May',
        5 => 'Jun',
        6 => 'Jul',
        7 => 'Aug',
        8 => 'Sep',
        9 => 'Oct',
        10 => 'Nov',
        11 => 'Dec'
      ],
      'dayNames' => [
        0 => 'Sunday',
        1 => 'Monday',
        2 => 'Tuesday',
        3 => 'Wednesday',
        4 => 'Thursday',
        5 => 'Friday',
        6 => 'Saturday'
      ],
      'dayNamesShort' => [
        0 => 'Sun',
        1 => 'Mon',
        2 => 'Tue',
        3 => 'Wed',
        4 => 'Thu',
        5 => 'Fri',
        6 => 'Sat'
      ],
      'dayNamesMin' => [
        0 => 'Su',
        1 => 'Mo',
        2 => 'Tu',
        3 => 'We',
        4 => 'Th',
        5 => 'Fr',
        6 => 'Sa'
      ]
    ],
    'durationUnits' => [
      'd' => 'd',
      'h' => 'h',
      'm' => 'm',
      's' => 's'
    ],
    'options' => [
      'salutationName' => [
        'Mr.' => 'Mr.',
        'Mrs.' => 'Mrs.',
        'Ms.' => 'Ms.',
        'Dr.' => 'Dr.'
      ],
      'language' => [
        'ar_AR' => 'Arabic',
        'af_ZA' => 'Afrikaans',
        'az_AZ' => 'Azerbaijani',
        'be_BY' => 'Belarusian',
        'bg_BG' => 'Bulgarian',
        'bn_IN' => 'Bengali',
        'bs_BA' => 'Bosnian',
        'ca_ES' => 'Catalan',
        'cs_CZ' => 'Czech',
        'cy_GB' => 'Welsh',
        'da_DK' => 'Danish',
        'de_DE' => 'German',
        'el_GR' => 'Greek',
        'en_GB' => 'English (UK)',
        'es_MX' => 'Spanish (Mexico)',
        'en_US' => 'English (US)',
        'es_ES' => 'Spanish (Spain)',
        'et_EE' => 'Estonian',
        'eu_ES' => 'Basque',
        'fa_IR' => 'Persian',
        'fi_FI' => 'Finnish',
        'fo_FO' => 'Faroese',
        'fr_CA' => 'French (Canada)',
        'fr_FR' => 'French (France)',
        'ga_IE' => 'Irish',
        'gl_ES' => 'Galician',
        'gn_PY' => 'Guarani',
        'he_IL' => 'Hebrew',
        'hi_IN' => 'Hindi',
        'hr_HR' => 'Croatian',
        'hu_HU' => 'Hungarian',
        'hy_AM' => 'Armenian',
        'id_ID' => 'Indonesian',
        'is_IS' => 'Icelandic',
        'it_IT' => 'Italian',
        'ja_JP' => 'Japanese',
        'ka_GE' => 'Georgian',
        'km_KH' => 'Khmer',
        'ko_KR' => 'Korean',
        'ku_TR' => 'Kurdish',
        'lt_LT' => 'Lithuanian',
        'lv_LV' => 'Latvian',
        'mk_MK' => 'Macedonian',
        'ml_IN' => 'Malayalam',
        'ms_MY' => 'Malay',
        'nb_NO' => 'Norwegian Bokmål',
        'nn_NO' => 'Norwegian Nynorsk',
        'ne_NP' => 'Nepali',
        'nl_NL' => 'Dutch',
        'pa_IN' => 'Punjabi',
        'pl_PL' => 'Polish',
        'ps_AF' => 'Pashto',
        'pt_BR' => 'Portuguese (Brazil)',
        'pt_PT' => 'Portuguese (Portugal)',
        'ro_RO' => 'Romanian',
        'ru_RU' => 'Russian',
        'sk_SK' => 'Slovak',
        'sl_SI' => 'Slovene',
        'sq_AL' => 'Albanian',
        'sr_RS' => 'Serbian',
        'sv_SE' => 'Swedish',
        'sw_KE' => 'Swahili',
        'ta_IN' => 'Tamil',
        'te_IN' => 'Telugu',
        'th_TH' => 'Thai',
        'tl_PH' => 'Tagalog',
        'tr_TR' => 'Turkish',
        'uk_UA' => 'Ukrainian',
        'ur_PK' => 'Urdu',
        'vi_VN' => 'Vietnamese',
        'zh_CN' => 'Simplified Chinese (China)',
        'zh_HK' => 'Traditional Chinese (Hong Kong)',
        'zh_TW' => 'Traditional Chinese (Taiwan)'
      ],
      'dateSearchRanges' => [
        'on' => 'On',
        'notOn' => 'Not On',
        'after' => 'After',
        'before' => 'Before',
        'between' => 'Between',
        'today' => 'Today',
        'past' => 'Past',
        'future' => 'Future',
        'currentMonth' => 'Current Month',
        'lastMonth' => 'Last Month',
        'nextMonth' => 'Next Month',
        'currentQuarter' => 'Current Quarter',
        'lastQuarter' => 'Last Quarter',
        'currentYear' => 'Current Year',
        'lastYear' => 'Last Year',
        'lastSevenDays' => 'Last 7 Days',
        'lastXDays' => 'Last X Days',
        'nextXDays' => 'Next X Days',
        'ever' => 'Ever',
        'isEmpty' => 'Is Empty',
        'olderThanXDays' => 'Older Than X Days',
        'afterXDays' => 'After X Days',
        'currentFiscalYear' => 'Current Fiscal Year',
        'lastFiscalYear' => 'Last Fiscal Year',
        'currentFiscalQuarter' => 'Current Fiscal Quarter',
        'lastFiscalQuarter' => 'Last Fiscal Quarter'
      ],
      'searchRanges' => [
        'is' => 'Is',
        'isEmpty' => 'Is Empty',
        'isNotEmpty' => 'Is Not Empty',
        'isOneOf' => 'Any Of',
        'isFromTeams' => 'Is From Team',
        'isNot' => 'Is Not',
        'isNotOneOf' => 'None Of',
        'anyOf' => 'Any Of',
        'allOf' => 'All Of',
        'noneOf' => 'None Of',
        'any' => 'Any'
      ],
      'varcharSearchRanges' => [
        'equals' => 'Equals',
        'like' => 'Is Like (%)',
        'notLike' => 'Is Not Like (%)',
        'startsWith' => 'Starts With',
        'endsWith' => 'Ends With',
        'contains' => 'Contains',
        'notContains' => 'Not Contains',
        'isEmpty' => 'Is Empty',
        'isNotEmpty' => 'Is Not Empty',
        'notEquals' => 'Not Equals'
      ],
      'intSearchRanges' => [
        'equals' => 'Equals',
        'notEquals' => 'Not Equals',
        'greaterThan' => 'Greater Than',
        'lessThan' => 'Less Than',
        'greaterThanOrEquals' => 'Greater Than or Equals',
        'lessThanOrEquals' => 'Less Than or Equals',
        'between' => 'Between',
        'isEmpty' => 'Is Empty',
        'isNotEmpty' => 'Is Not Empty'
      ],
      'autorefreshInterval' => [
        0 => 'None',
        '0.5' => '30 seconds',
        1 => '1 minute',
        2 => '2 minutes',
        5 => '5 minutes',
        10 => '10 minutes'
      ],
      'phoneNumber' => [
        'Mobile' => 'Mobile',
        'Office' => 'Office',
        'Fax' => 'Fax',
        'Home' => 'Home',
        'Other' => 'Other'
      ],
      'saveConflictResolution' => [
        'current' => 'Current',
        'actual' => 'Actual',
        'original' => 'Original'
      ],
      'reminderTypes' => [
        'Popup' => 'Popup',
        'Email' => 'Email'
      ]
    ],
    'sets' => [
      'summernote' => [
        'NOTICE' => 'You can find translation here: https://github.com/HackerWins/summernote/tree/master/lang',
        'font' => [
          'bold' => 'Bold',
          'italic' => 'Italic',
          'underline' => 'Underline',
          'strike' => 'Strike',
          'clear' => 'Remove Font Style',
          'height' => 'Line Height',
          'name' => 'Font Family',
          'size' => 'Font Size'
        ],
        'image' => [
          'image' => 'Picture',
          'insert' => 'Insert Image',
          'resizeFull' => 'Resize Full',
          'resizeHalf' => 'Resize Half',
          'resizeQuarter' => 'Resize Quarter',
          'floatLeft' => 'Float Left',
          'floatRight' => 'Float Right',
          'floatNone' => 'Float None',
          'dragImageHere' => 'Drag an image here',
          'selectFromFiles' => 'Select from files',
          'url' => 'Image URL',
          'remove' => 'Remove Image'
        ],
        'link' => [
          'link' => 'Link',
          'insert' => 'Insert Link',
          'unlink' => 'Unlink',
          'edit' => 'Edit',
          'textToDisplay' => 'Text to display',
          'url' => 'To what URL should this link go?',
          'openInNewWindow' => 'Open in new window'
        ],
        'video' => [
          'video' => 'Video',
          'videoLink' => 'Video Link',
          'insert' => 'Insert Video',
          'url' => 'Video URL?',
          'providers' => '(YouTube, Vimeo, Vine, Instagram, or DailyMotion)'
        ],
        'table' => [
          'table' => 'Table'
        ],
        'hr' => [
          'insert' => 'Insert Horizontal Rule'
        ],
        'style' => [
          'style' => 'Style',
          'normal' => 'Normal',
          'blockquote' => 'Quote',
          'pre' => 'Code',
          'h1' => 'Header 1',
          'h2' => 'Header 2',
          'h3' => 'Header 3',
          'h4' => 'Header 4',
          'h5' => 'Header 5',
          'h6' => 'Header 6'
        ],
        'lists' => [
          'unordered' => 'Unordered list',
          'ordered' => 'Ordered list'
        ],
        'options' => [
          'help' => 'Help',
          'fullscreen' => 'Full Screen',
          'codeview' => 'Code View'
        ],
        'paragraph' => [
          'paragraph' => 'Paragraph',
          'outdent' => 'Outdent',
          'indent' => 'Indent',
          'left' => 'Align left',
          'center' => 'Align center',
          'right' => 'Align right',
          'justify' => 'Justify full'
        ],
        'color' => [
          'recent' => 'Recent Color',
          'more' => 'More Color',
          'background' => 'BackColor',
          'foreground' => 'FontColor',
          'transparent' => 'Transparent',
          'setTransparent' => 'Set transparent',
          'reset' => 'Reset',
          'resetToDefault' => 'Reset to default'
        ],
        'shortcut' => [
          'shortcuts' => 'Keyboard shortcuts',
          'close' => 'Close',
          'textFormatting' => 'Text formatting',
          'action' => 'Action',
          'paragraphFormatting' => 'Paragraph formatting',
          'documentStyle' => 'Document Style'
        ],
        'history' => [
          'undo' => 'Undo',
          'redo' => 'Redo'
        ]
      ]
    ],
    'listViewModes' => [
      'list' => 'List',
      'kanban' => 'Kanban',
      'combined' => 'Combined',
      'partitioned' => 'Partitioned'
    ],
    'themes' => [
      'Dark' => 'Dark',
      'Light' => 'Light',
      'Espo' => 'Espo',
      'EspoRtl' => 'RTL',
      'Sakura' => 'Sakura',
      'Violet' => 'Violet',
      'Hazyblue' => 'Hazyblue',
      'Glass' => 'Glass'
    ],
    'themeNavbars' => [
      'side' => 'Side Navbar',
      'top' => 'Top Navbar'
    ],
    'fieldValidations' => [
      'required' => 'Required',
      'maxCount' => 'Max Count',
      'maxLength' => 'Max Length',
      'pattern' => 'Pattern Matching',
      'emailAddress' => 'Valid Email Address',
      'phoneNumber' => 'Valid Phone Number',
      'array' => 'Array',
      'arrayOfString' => 'Array of Strings',
      'valid' => 'Valid',
      'noEmptyString' => 'No Empty String',
      'max' => 'Max Value',
      'min' => 'Min Value'
    ],
    'fieldValidationExplanations' => [
      'url_valid' => 'Invalid URL value.',
      'currency_valid' => 'Invalid amount value.',
      'currency_validCurrency' => 'The currency code value is invalid or not allowed.',
      'varchar_pattern' => 'Likely, the value contains not allowed characters.',
      'email_emailAddress' => 'Invalid email address value.',
      'phone_phoneNumber' => 'Invalid phone number value.',
      'datetimeOptional_valid' => 'Invalid date-time value.',
      'datetime_valid' => 'Invalid date-time value.',
      'date_valid' => 'Invalid date value.',
      'enum_valid' => 'Invalid enum value. The value must be one of defined enum options. An empty value is allowed only if the field has an empty option.',
      'int_valid' => 'Invalid integer number value.',
      'float_valid' => 'Invalid number value.',
      'multiEnum_valid' => 'Invalid multi-enum value. Values must be one of defined field options.'
    ],
    'navbarTabs' => [
      'Business' => 'Business',
      'Marketing' => 'Marketing',
      'Support' => 'Support',
      'CRM' => 'CRM',
      'Activities' => 'Activities'
    ],
    'aggregationFunctions' => [
      'average' => 'Average',
      'max' => 'Maximum',
      'min' => 'Minimum',
      'sum' => 'Sum'
    ]
  ],
  'GroupEmailFolder' => [
    'links' => [
      'emails' => 'Emails'
    ],
    'labels' => [
      'Create GroupEmailFolder' => 'Create Folder'
    ]
  ],
  'Import' => [
    'labels' => [
      'New import with same params' => 'New import with same params',
      'Revert Import' => 'Revert Import',
      'Return to Import' => 'Return to Import',
      'Run Import' => 'Run Import',
      'Back' => 'Back',
      'Field Mapping' => 'Field Mapping',
      'Default Values' => 'Default Values',
      'Add Field' => 'Add Field',
      'Created' => 'Created',
      'Updated' => 'Updated',
      'Result' => 'Result',
      'Show records' => 'Show records',
      'Remove Duplicates' => 'Remove Duplicates',
      'importedCount' => 'Imported (count)',
      'duplicateCount' => 'Duplicates (count)',
      'updatedCount' => 'Updated (count)',
      'Create Only' => 'Create Only',
      'Create and Update' => 'Create & Update',
      'Update Only' => 'Update Only',
      'Update by' => 'Update by',
      'Set as Not Duplicate' => 'Set as Not Duplicate',
      'File (CSV)' => 'File (CSV)',
      'First Row Value' => 'First Row Value',
      'Skip' => 'Skip',
      'Header Row Value' => 'Header Row Value',
      'Field' => 'Field',
      'What to Import?' => 'What to Import?',
      'Entity Type' => 'Entity Type',
      'What to do?' => 'What to do?',
      'Properties' => 'Properties',
      'Header Row' => 'Header Row',
      'Person Name Format' => 'Person Name Format',
      'John Smith' => 'John Smith',
      'Smith John' => 'Smith John',
      'Smith, John' => 'Smith, John',
      'Field Delimiter' => 'Field Delimiter',
      'Date Format' => 'Date Format',
      'Decimal Mark' => 'Decimal Mark',
      'Text Qualifier' => 'Text Qualifier',
      'Time Format' => 'Time Format',
      'Currency' => 'Currency',
      'Preview' => 'Preview',
      'Next' => 'Next',
      'Step 1' => 'Step 1',
      'Step 2' => 'Step 2',
      'Double Quote' => 'Double Quote',
      'Single Quote' => 'Single Quote',
      'Imported' => 'Imported',
      'Duplicates' => 'Duplicates',
      'Skip searching for duplicates' => 'Skip searching for duplicates',
      'Timezone' => 'Timezone',
      'Remove Import Log' => 'Remove Import Log',
      'New Import' => 'New Import',
      'Import Results' => 'Import Results',
      'Run Manually' => 'Run Manually',
      'Silent Mode' => 'Silent Mode',
      'Export' => 'Export'
    ],
    'messages' => [
      'importRunning' => 'Import running...',
      'noErrors' => 'No errors',
      'utf8' => 'Should be UTF-8 encoded',
      'duplicatesRemoved' => 'Duplicates removed',
      'inIdle' => 'Execute in idle (for big data; via cron)',
      'revert' => 'This will remove all imported records permanently.',
      'removeDuplicates' => 'This will permanently remove all imported records that were recognized as duplicates.',
      'confirmRevert' => 'This will remove all imported records permanently. Are you sure?',
      'confirmRemoveDuplicates' => 'This will permanently remove all imported records that were recognized as duplicates. Are you sure?',
      'confirmRemoveImportLog' => 'This will remove the import log. All imported records will be kept. You won\'t be able to revert import results. Are you sure?',
      'removeImportLog' => 'This will remove the import log. All imported records will be kept. Use it if you are sure that import is fine.'
    ],
    'params' => [
      'phoneNumberCountry' => 'Telephone country code'
    ],
    'fields' => [
      'file' => 'File',
      'entityType' => 'Entity Type',
      'imported' => 'Imported Records',
      'duplicates' => 'Duplicate Records',
      'updated' => 'Updated Records',
      'status' => 'Status'
    ],
    'links' => [
      'errors' => 'Errors'
    ],
    'options' => [
      'status' => [
        'Failed' => 'Failed',
        'Standby' => 'Standby',
        'Pending' => 'Pending',
        'In Process' => 'In Process',
        'Complete' => 'Complete'
      ],
      'personNameFormat' => [
        'f l' => 'First Last',
        'l f' => 'Last First',
        'f m l' => 'First Middle Last',
        'l f m' => 'Last First Middle',
        'l, f' => 'Last, First'
      ]
    ],
    'strings' => [
      'commandToRun' => 'Command to run (from CLI)',
      'saveAsDefault' => 'Save as default'
    ],
    'tooltips' => [
      'manualMode' => 'If checked, you will need to run import manually from CLI. Command will be shown after setting up the import.',
      'silentMode' => 'A majority of after-save scripts will be skipped, stream notes won\'t be created. Import will run faster.'
    ]
  ],
  'ImportError' => [
    'fields' => [
      'type' => 'Type',
      'validationFailures' => 'Validation Failures',
      'import' => 'Import',
      'rowIndex' => 'Row Index',
      'exportRowIndex' => 'Export Row Index',
      'lineNumber' => 'Line Number',
      'exportLineNumber' => 'Export Line Number',
      'row' => 'Row',
      'entityType' => 'Entity Type'
    ],
    'options' => [
      'type' => [
        'Validation' => 'Validation',
        'Access' => 'Access',
        'Not-Found' => 'Not-Found'
      ]
    ],
    'tooltips' => [
      'lineNumber' => 'A line number in the original CSV.',
      'exportLineNumber' => 'A line number in the export CSV.'
    ]
  ],
  'InboundEmail' => [
    'fields' => [
      'name' => 'Name',
      'emailAddress' => 'Email Address',
      'team' => 'Target Team',
      'status' => 'Status',
      'assignToUser' => 'Assign to User',
      'host' => 'Host',
      'username' => 'Username',
      'password' => 'Password',
      'port' => 'Port',
      'monitoredFolders' => 'Monitored Folders',
      'trashFolder' => 'Trash Folder',
      'security' => 'Security',
      'createCase' => 'Create Case',
      'reply' => 'Auto-Reply',
      'caseDistribution' => 'Case Distribution',
      'replyEmailTemplate' => 'Reply Email Template',
      'replyFromAddress' => 'Reply From Address',
      'replyToAddress' => 'Reply To Address',
      'replyFromName' => 'Reply From Name',
      'targetUserPosition' => 'Target User Position',
      'fetchSince' => 'Fetch Since',
      'addAllTeamUsers' => 'For all team users',
      'teams' => 'Teams',
      'sentFolder' => 'Sent Folder',
      'storeSentEmails' => 'Store Sent Emails',
      'keepFetchedEmailsUnread' => 'Keep Fetched Emails Unread',
      'useImap' => 'Fetch Emails',
      'useSmtp' => 'Use SMTP',
      'smtpHost' => 'SMTP Host',
      'smtpPort' => 'SMTP Port',
      'smtpAuth' => 'SMTP Auth',
      'smtpSecurity' => 'SMTP Security',
      'smtpAuthMechanism' => 'SMTP Auth Mechanism',
      'smtpUsername' => 'SMTP Username',
      'smtpPassword' => 'SMTP Password',
      'fromName' => 'From Name',
      'smtpIsShared' => 'SMTP Is Shared',
      'smtpIsForMassEmail' => 'SMTP Is for Mass Email',
      'groupEmailFolder' => 'Group Email Folder',
      'signature' => 'Signature'
    ],
    'tooltips' => [
      'useSmtp' => 'The ability to send emails.',
      'reply' => 'Notify email senders that their emails has been received.

 Only one email will be sent to a particular recipient during some period of time to prevent looping.',
      'createCase' => 'Automatically create case from incoming emails.',
      'replyToAddress' => 'Specify email address of this mailbox to make responses come here.',
      'caseDistribution' => 'How cases will be assigned to. Assigned directly to the user or among the team.',
      'assignToUser' => 'User cases will be assigned to.',
      'team' => 'Team cases will be assigned to.',
      'teams' => 'Teams emails will be assigned to.',
      'targetUserPosition' => 'Users with specified position will be distributed with cases.',
      'addAllTeamUsers' => 'Emails will be appearing in Inbox of all users of specified teams.',
      'monitoredFolders' => 'Multiple folders should be separated by comma.',
      'smtpIsShared' => 'If checked then users will be able to send emails using this SMTP. Availability is controlled by Roles through the Group Email Account permission.',
      'smtpIsForMassEmail' => 'If checked then SMTP will be available for Mass Email.',
      'storeSentEmails' => 'Sent emails will be stored on the IMAP server.',
      'groupEmailFolder' => 'Put incoming emails in a group folder.',
      'signature' => 'Placeholders like {userName}, {name}, {emailAddress} and {phoneNumber} can be used'
    ],
    'links' => [
      'filters' => 'Filters',
      'emails' => 'Emails',
      'assignToUser' => 'Assign to User',
      'groupEmailFolder' => 'Group Email Folder'
    ],
    'options' => [
      'status' => [
        'Active' => 'Active',
        'Inactive' => 'Inactive'
      ],
      'caseDistribution' => [
        '' => 'None',
        'Direct-Assignment' => 'Direct-Assignment',
        'Round-Robin' => 'Round-Robin',
        'Least-Busy' => 'Least-Busy'
      ],
      'smtpAuthMechanism' => [
        'plain' => 'PLAIN',
        'login' => 'LOGIN',
        'crammd5' => 'CRAM-MD5'
      ]
    ],
    'labels' => [
      'Create InboundEmail' => 'Create Email Account',
      'IMAP' => 'IMAP',
      'Actions' => 'Actions',
      'Main' => 'Main'
    ],
    'messages' => [
      'couldNotConnectToImap' => 'Could not connect to IMAP server'
    ]
  ],
  'Integration' => [
    'fields' => [
      'enabled' => 'Enabled',
      'clientId' => 'Client ID',
      'clientSecret' => 'Client Secret',
      'redirectUri' => 'Redirect URI',
      'apiKey' => 'API Key',
      'serverUrl' => 'Server URL',
      'token' => 'Authentication Token',
      'teamId' => 'Team ID',
      'googleCalendar' => 'Calendar',
      'googleContacts' => 'Contacts',
      'googleTasks' => 'Tasks'
    ],
    'titles' => [
      'GoogleMaps' => 'Google Maps',
      'mattermost' => 'Mattermost'
    ],
    'messages' => [
      'selectIntegration' => 'Select an integration from menu.',
      'noIntegrations' => 'No Integrations is available.'
    ],
    'help' => [
      'Google' => '**Obtain OAuth 2.0 credentials from the Google Developers Console**

Visit [Google Developers Console](https://console.developers.google.com/project) to obtain OAuth 2.0 credentials such as a Client ID and Client Secret that are known to both Google and EspoCRM application.

This integration requires *curl* extension. Google Contacts also needs *libxml* and *xml*.',
      'GoogleMaps' => 'Obtain API key [here](https://developers.google.com/maps/documentation/javascript/get-api-key).',
      'mattermost' => '**Configuring Mattermost Integration**

1. Create a new admin user and [generate personal access token](https://docs.mattermost.com/developer/personal-access-tokens.html#creating-a-personal-access-token) for it.
2. Enable the integration and fill all the fields. It can be quite tricky to obtain the team ID - one way to do it, is to open the team edit page in system console and copy the ID from the URL.
3. Install and configure the AutoCRM Integration plugin on your Mattermost instance. More details: [https://gitlab.apertia.cz/autocrm/mattermost-autocrm-integration#installation](https://gitlab.apertia.cz/autocrm/mattermost-autocrm-integration#installation).'
    ],
    'mattermost' => [
      'tokenDescription' => 'AutoCRM Integration',
      'projectChannelHeader' => 'Project\'s channel'
    ]
  ],
  'Job' => [
    'fields' => [
      'status' => 'Status',
      'executeTime' => 'Execute At',
      'executedAt' => 'Executed At',
      'startedAt' => 'Started At',
      'attempts' => 'Attempts Left',
      'failedAttempts' => 'Failed Attempts',
      'serviceName' => 'Service',
      'method' => 'Method (deprecated)',
      'methodName' => 'Method',
      'scheduledJob' => 'Scheduled Job',
      'scheduledJobJob' => 'Scheduled Job Name',
      'data' => 'Data',
      'targetType' => 'Target Type',
      'targetId' => 'Target ID',
      'number' => 'Number',
      'queue' => 'Queue',
      'group' => 'Group',
      'className' => 'Class Name',
      'targetGroup' => 'Target Group',
      'job' => 'Job'
    ],
    'options' => [
      'status' => [
        'Pending' => 'Pending',
        'Success' => 'Success',
        'Running' => 'Running',
        'Failed' => 'Failed'
      ]
    ]
  ],
  'LayoutManager' => [
    'fields' => [
      'width' => 'Width',
      'link' => 'Link',
      'notSortable' => 'Not Sortable',
      'align' => 'Align',
      'panelName' => 'Panel Name',
      'style' => 'Style',
      'sticked' => 'Sticked',
      'isLarge' => 'Large font size',
      'hidden' => 'Hidden',
      'noLabel' => 'Hide Label',
      'dynamicLogicVisible' => 'Conditions making panel visible',
      'dynamicLogicStyled' => 'Conditions making style applied',
      'tabLabel' => 'Tab Label',
      'tabBreak' => 'Tab-Break',
      'isEditable' => 'Editable',
      'layout' => 'Layout',
      'filtersEnabled' => 'Enable filters',
      'screenSize' => 'Screen Size',
      'customLabel' => 'Custom Label',
      'color' => 'Color',
      'bold' => 'Bold Text',
      'css' => 'Additional CSS Classes',
      'horizontalLabel' => 'Horizontal Label'
    ],
    'options' => [
      'align' => [
        'left' => 'Left',
        'right' => 'Right'
      ],
      'style' => [
        'default' => 'Default',
        'success' => 'Success',
        'danger' => 'Danger',
        'info' => 'Info',
        'warning' => 'Warning',
        'primary' => 'Primary'
      ],
      'screenSize' => [
        'xs' => 'Smart Phones',
        'sm' => 'Tablets',
        'md' => 'Desktop',
        'lg' => 'Large Desktop'
      ],
      'gridLayoutType' => [
        'record' => 'Default',
        'tab' => 'Tabs'
      ],
      'bottomLayoutType' => [
        'default' => 'Default',
        'tab' => 'Tabs'
      ]
    ],
    'labels' => [
      'New panel' => 'New panel',
      'Layout' => 'Layout',
      'Column' => 'Column',
      'New Panel' => 'New Panel',
      'Custom Label' => 'Custom Label',
      'Width' => 'Width',
      'Insert Row' => 'Insert Row',
      'Insert New Panel' => 'Insert New Panel',
      'Remove Row' => 'Remove Row',
      'Add Row' => 'Add Row',
      'Edit Panel' => 'Edit Panel',
      'Remove Panel' => 'Remove Panel',
      'Show Code' => 'Show Code',
      'Color' => 'Color',
      'Columns Count' => 'Column Count',
      'Field' => 'Field',
      'Bold' => 'Bold'
    ],
    'messages' => [
      'alreadyExists' => 'Layout `{name}` already exists.',
      'createInfo' => 'Custom list layouts can be used by relationship panels.',
      'cantBeEmpty' => 'Layout can\'t be empty.',
      'fieldsIncompatible' => 'Fields can\'t be on the layout together: {fields}.',
      'cannotRemoveLastPanel' => 'At least one panel must be exist!'
    ],
    'tooltips' => [
      'tabBreak' => 'A separate tab for the panel and all following panels until the next tab-break.',
      'noLabel' => 'Don\'t display a column label in the header.',
      'notSortable' => 'Disables the ability to sort by the column.',
      'width' => 'A column width. It\'s recommended to have one column without specified width, usually it should be the *Name* field.',
      'sticked' => 'The panel will be sticked to the panel above. No gap between panels.',
      'hiddenPanel' => 'Need to click \'show more\' to see the panel.',
      'panelStyle' => 'A color of the panel.',
      'dynamicLogicVisible' => 'If set, the panel will be hidden unless the condition is met.',
      'dynamicLogicStyled' => 'A color will be applied if a specific condition is met . The color is defined by the *Style* parameter.',
      'link' => 'If checked, then a field value will be displayed as a link pointing to the detail view of the record. Usually it is used for *Name* fields.',
      'isEditable' => 'Whether the field is editable in the list layout. Bare in mind that not every field can be editable (e.g. read-only or link fields) and that editing in a list might cause missclicks and data-loss.'
    ]
  ],
  'LayoutSet' => [
    'fields' => [
      'layoutList' => 'Layouts'
    ],
    'labels' => [
      'Create LayoutSet' => 'Create Layout Set',
      'Edit Layouts' => 'Edit Layouts'
    ],
    'tooltips' => []
  ],
  'LeadCapture' => [
    'fields' => [
      'name' => 'Name',
      'campaign' => 'Campaign',
      'isActive' => 'Is Active',
      'subscribeToTargetList' => 'Subscribe to Target List',
      'subscribeContactToTargetList' => 'Subscribe Contact if exists',
      'targetList' => 'Target List',
      'fieldList' => 'Payload Fields',
      'optInConfirmation' => 'Double Opt-In',
      'optInConfirmationEmailTemplate' => 'Opt-in confirmation email template',
      'optInConfirmationLifetime' => 'Opt-in confirmation lifetime (hours)',
      'optInConfirmationSuccessMessage' => 'Text to show after opt-in confirmation',
      'leadSource' => 'Lead Source',
      'apiKey' => 'API Key',
      'targetTeam' => 'Target Team',
      'exampleRequestMethod' => 'Method',
      'exampleRequestUrl' => 'URL',
      'exampleRequestPayload' => 'Payload',
      'exampleRequestHeaders' => 'Headers',
      'createLeadBeforeOptInConfirmation' => 'Create Lead before confirmation',
      'skipOptInConfirmationIfSubscribed' => 'Skip confirmation if lead is already in target list',
      'smtpAccount' => 'SMTP Account',
      'inboundEmail' => 'Group Email Account',
      'duplicateCheck' => 'Duplicate Check',
      'phoneNumberCountry' => 'Telephone country code'
    ],
    'links' => [
      'targetList' => 'Target List',
      'campaign' => 'Campaign',
      'optInConfirmationEmailTemplate' => 'Opt-in confirmation email template',
      'targetTeam' => 'Target Team',
      'inboundEmail' => 'Group Email Account',
      'logRecords' => 'Log'
    ],
    'labels' => [
      'Create LeadCapture' => 'Create Entry Point',
      'Generate New API Key' => 'Generate New API Key',
      'Request' => 'Request',
      'Confirm Opt-In' => 'Confirm Opt-In'
    ],
    'messages' => [
      'generateApiKey' => 'Create new API Key',
      'optInConfirmationExpired' => 'Opt-in confirmation link is expired.',
      'optInIsConfirmed' => 'Opt-in is confirmed.'
    ],
    'tooltips' => [
      'optInConfirmationSuccessMessage' => 'Markdown is supported.'
    ]
  ],
  'LeadCaptureLogRecord' => [
    'fields' => [
      'number' => 'Number',
      'data' => 'Data',
      'target' => 'Target',
      'leadCapture' => 'Lead Capture',
      'createdAt' => 'Entered At',
      'isCreated' => 'Is Lead Created'
    ],
    'links' => [
      'leadCapture' => 'Lead Capture',
      'target' => 'Target'
    ]
  ],
  'MassAction' => [
    'fields' => [
      'status' => 'Status',
      'processedCount' => 'Processed Count'
    ],
    'options' => [
      'status' => [
        'Pending' => 'Pending',
        'Running' => 'Running',
        'Success' => 'Success',
        'Failed' => 'Failed'
      ]
    ],
    'messages' => [
      'infoText' => 'The mass action is being processed in idle by cron. It can take some time to finish. Closing this modal dialog won\'t affect the execution process.'
    ]
  ],
  'Note' => [
    'fields' => [
      'post' => 'Post',
      'attachments' => 'Attachments',
      'targetType' => 'Target',
      'teams' => 'Teams',
      'users' => 'Users',
      'portals' => 'Portals',
      'type' => 'Type',
      'isGlobal' => 'Is Global',
      'isInternal' => 'Is Internal (for internal users)',
      'related' => 'Related',
      'createdByGender' => 'Created By Gender',
      'data' => 'Data',
      'number' => 'Number'
    ],
    'filters' => [
      'all' => 'All',
      'posts' => 'Posts',
      'updates' => 'Updates'
    ],
    'options' => [
      'targetType' => [
        'self' => 'to myself',
        'users' => 'to particular user(s)',
        'teams' => 'to particular team(s)',
        'all' => 'to all internal users',
        'portals' => 'to portal users'
      ],
      'type' => [
        'Post' => 'Post'
      ]
    ],
    'messages' => [
      'writeMessage' => 'Write your message here'
    ],
    'links' => [
      'portals' => 'Portals',
      'attachments' => 'Attachments',
      'superParent' => 'Super Parent',
      'related' => 'Related'
    ]
  ],
  'PhoneNumber' => [
    'fields' => [
      'type' => 'Type',
      'optOut' => 'Opted Out',
      'invalid' => 'Invalid',
      'numeric' => 'Numeric Value'
    ],
    'presetFilters' => [
      'orphan' => 'Orphan'
    ]
  ],
  'Portal' => [
    'fields' => [
      'name' => 'Name',
      'logo' => 'Logo',
      'url' => 'URL',
      'portalRoles' => 'Roles',
      'isActive' => 'Is Active',
      'isDefault' => 'Is Default',
      'tabList' => 'Tab List',
      'quickCreateList' => 'Quick Create List',
      'companyLogo' => 'Logo',
      'theme' => 'Theme',
      'language' => 'Language',
      'dashboardLayout' => 'Dashboard Layout',
      'dateFormat' => 'Date Format',
      'timeFormat' => 'Time Format',
      'timeZone' => 'Time Zone',
      'weekStart' => 'First Day of Week',
      'defaultCurrency' => 'Default Currency',
      'layoutSet' => 'Layout Set',
      'authenticationProvider' => 'Authentication Provider',
      'customUrl' => 'Custom URL',
      'customId' => 'Custom ID'
    ],
    'links' => [
      'users' => 'Users',
      'portalRoles' => 'Roles',
      'layoutSet' => 'Layout Set',
      'authenticationProvider' => 'Authentication Provider',
      'notes' => 'Notes',
      'articles' => 'Knowledge Base Articles'
    ],
    'tooltips' => [
      'layoutSet' => 'Provides the ability to have layouts that differ from standard ones.',
      'portalRoles' => 'Specified Portal Roles will be applied to all users of this portal.'
    ],
    'labels' => [
      'Create Portal' => 'Create Portal',
      'User Interface' => 'User Interface',
      'General' => 'General',
      'Settings' => 'Settings'
    ]
  ],
  'PortalRole' => [
    'fields' => [
      'exportPermission' => 'Export Permission',
      'massUpdatePermission' => 'Mass Update Permission',
      'data' => 'Data',
      'fieldData' => 'Field Data'
    ],
    'links' => [
      'users' => 'Users'
    ],
    'labels' => [
      'Access' => 'Access',
      'Create PortalRole' => 'Create Portal Role',
      'Scope Level' => 'Scope Level',
      'Field Level' => 'Field Level'
    ]
  ],
  'PortalUser' => [
    'labels' => [
      'Create PortalUser' => 'Create Portal User'
    ]
  ],
  'Preferences' => [
    'fields' => [
      'dateFormat' => 'Date Format',
      'timeFormat' => 'Time Format',
      'timeZone' => 'Time Zone',
      'weekStart' => 'First Day of Week',
      'thousandSeparator' => 'Thousand Separator',
      'decimalMark' => 'Decimal Mark',
      'defaultCurrency' => 'Default Currency',
      'currencyList' => 'Currency List',
      'language' => 'Language',
      'exportDelimiter' => 'Export Delimiter',
      'receiveAssignmentEmailNotifications' => 'Email notifications upon assignment',
      'receiveMentionEmailNotifications' => 'Email notifications about mentions in posts',
      'receiveStreamEmailNotifications' => 'Email notifications about posts and status updates',
      'assignmentNotificationsIgnoreEntityTypeList' => 'In-app assignment notifications',
      'assignmentEmailNotificationsIgnoreEntityTypeList' => 'Email assignment notifications',
      'autoFollowEntityTypeList' => 'Global Auto-Follow',
      'signature' => 'Email Signature',
      'dashboardTabList' => 'Tab List',
      'defaultReminders' => 'Default Reminders',
      'theme' => 'Theme',
      'useCustomTabList' => 'Custom Tab List',
      'tabList' => 'Tab List',
      'emailReplyToAllByDefault' => 'Email Reply to all by default',
      'dashboardLayout' => 'Dashboard Layout',
      'dashboardLocked' => 'Lock Dashboard',
      'emailReplyForceHtml' => 'Email Reply in HTML',
      'doNotFillAssignedUserIfNotRequired' => 'Do not pre-fill assigned user on record creation',
      'followEntityOnStreamPost' => 'Auto-follow record after posting in Stream',
      'followCreatedEntities' => 'Auto-follow created records',
      'followCreatedEntityTypeList' => 'Auto-follow created records of specific entity types',
      'emailUseExternalClient' => 'Use an external email client',
      'scopeColorsDisabled' => 'Disable scope colors',
      'tabColorsDisabled' => 'Disable tab colors',
      'textSearchStoringDisabled' => 'Disable text filter storing',
      'quickViewContextMenu' => 'Replace context menu with quick view action',
      'customFiltersAboveList' => 'Show custom filters above list',
      'collapsibleDashlets' => 'Collapsible dashlets',
      'disableIntroGuide' => 'Disable intro guide',
      'receivePushNotifications' => 'Receive push notifications'
    ],
    'links' => [],
    'options' => [
      'weekStart' => [
        0 => 'Sunday',
        1 => 'Monday'
      ]
    ],
    'labels' => [
      'Notifications' => 'Notifications',
      'User Interface' => 'User Interface',
      'Misc' => 'Misc',
      'Locale' => 'Locale',
      'Reset Dashboard to Default' => 'Reset Dashboard to Default',
      'AutoCRM' => 'AutoCRM'
    ],
    'tooltips' => [
      'autoFollowEntityTypeList' => 'Automatically follow ALL new records (created by any user) of the selected entity types. To be able to see information in the stream and receive notifications about all records in the system.',
      'doNotFillAssignedUserIfNotRequired' => 'When create record assigned user won\'t be filled with own user unless the field is required.',
      'followCreatedEntities' => 'When create new records, they will be automatically followed even if assigned to another user.',
      'followCreatedEntityTypeList' => 'When create new records of selected entity types, they will be followed automatically even if assigned to another user.'
    ]
  ],
  'Role' => [
    'fields' => [
      'name' => 'Name',
      'roles' => 'Roles',
      'assignmentPermission' => 'Assignment Permission',
      'userPermission' => 'User Permission',
      'messagePermission' => 'Message Permission',
      'portalPermission' => 'Portal Permission',
      'groupEmailAccountPermission' => 'Group Email Account Permission',
      'exportPermission' => 'Export Permission',
      'massUpdatePermission' => 'Mass Update Permission',
      'followerManagementPermission' => 'Follower Management Permission',
      'dataPrivacyPermission' => 'Data Privacy Permission',
      'data' => 'Data',
      'fieldData' => 'Field Data'
    ],
    'links' => [
      'users' => 'Users',
      'teams' => 'Teams'
    ],
    'tooltips' => [
      'messagePermission' => 'Allows to send messages to other users.

* all – can send to all
* team – can send only to teammates
* no – cannot send',
      'assignmentPermission' => 'Allows to assign records to other users.

* all – no restriction
* team – can assign only to teammates
* no – can assign only to self',
      'userPermission' => 'Allows view activities, calendar and stream of other users.

* all – can view all
* team – can view activities of teammates only
* no – can\'t view',
      'portalPermission' => 'Access to portal information, the ability to post messages to portal users.',
      'groupEmailAccountPermission' => 'Access to group email accounts, the ability to send emails from group SMTP.',
      'exportPermission' => 'Allows to export records.',
      'massUpdatePermission' => 'The ability to perform mass update of records.',
      'followerManagementPermission' => 'Allows to manage followers of specific records.',
      'dataPrivacyPermission' => 'Allows to view and erase personal data.'
    ],
    'labels' => [
      'Access' => 'Access',
      'Create Role' => 'Create Role',
      'Scope Level' => 'Scope Level',
      'Field Level' => 'Field Level'
    ],
    'options' => [
      'accessList' => [
        'not-set' => 'not-set',
        'enabled' => 'enabled',
        'disabled' => 'disabled'
      ],
      'levelList' => [
        'all' => 'all',
        'team' => 'team',
        'account' => 'account',
        'contact' => 'contact',
        'own' => 'own',
        'no' => 'no',
        'yes' => 'yes',
        'not-set' => 'not-set'
      ]
    ],
    'actions' => [
      'read' => 'Read',
      'edit' => 'Edit',
      'delete' => 'Delete',
      'stream' => 'Stream',
      'create' => 'Create'
    ],
    'messages' => [
      'changesAfterClearCache' => 'All changes in an access control will be applied after cache is cleared.'
    ]
  ],
  'ScheduledJob' => [
    'fields' => [
      'name' => 'Name',
      'status' => 'Status',
      'job' => 'Job',
      'scheduling' => 'Scheduling'
    ],
    'links' => [
      'log' => 'Log'
    ],
    'labels' => [
      'As often as possible' => 'As often as possible',
      'Create ScheduledJob' => 'Create Scheduled Job'
    ],
    'options' => [
      'job' => [
        'Cleanup' => 'Clean-up',
        'CheckInboundEmails' => 'Check Group Email Accounts',
        'CheckEmailAccounts' => 'Check Personal Email Accounts',
        'SendEmailReminders' => 'Send Email Reminders',
        'AuthTokenControl' => 'Auth Token Control',
        'SendEmailNotifications' => 'Send Email Notifications',
        'CheckNewVersion' => 'Check for New Version',
        'ProcessWebhookQueue' => 'Process Webhook Queue',
        'ProcessMassEmail' => 'Send Mass Emails',
        'ControlKnowledgeBaseArticleStatus' => 'Control Knowledge Base Article Status',
        'CNBSync' => 'Exchange rates sync with CNB',
        'ReportTargetListSync' => 'Sync Target Lists with Reports',
        'ScheduleReportSending' => 'Schedule Report Sending',
        'RunScheduledWorkflows' => 'Run Scheduled Workflows',
        'ProcessPendingProcessFlows' => 'Process Pending Flows',
        'CheckRecurringRecords' => 'Schedule Recurring Records',
        'SaveWarehouseValue' => 'Warehouse Value Saving',
        'SynchronizeEventsWithGoogleCalendar' => 'Google Calendar Sync'
      ],
      'cronSetup' => [
        'linux' => 'Note: Add this line to the crontab file to run Espo Scheduled Jobs:',
        'mac' => 'Note: Add this line to the crontab file to run Espo Scheduled Jobs:',
        'windows' => 'Note: Create a batch file with the following commands to run Espo Scheduled Jobs using Windows Scheduled Tasks:',
        'default' => 'Note: Add this command to Cron Job (Scheduled Task):'
      ],
      'status' => [
        'Active' => 'Active',
        'Inactive' => 'Inactive'
      ]
    ],
    'tooltips' => [
      'scheduling' => 'Crontab notation. Defines frequency of job runs.

`*/5 * * * *` - every 5 minutes

`0 */2 * * *` - every 2 hours

`30 1 * * *` - at 01:30 once a day

`0 0 1 * *` - on the first day of the month'
    ]
  ],
  'ScheduledJobLogRecord' => [
    'fields' => [
      'status' => 'Status',
      'executionTime' => 'Execution Time',
      'target' => 'Target'
    ]
  ],
  'Settings' => [
    'fields' => [
      'useCache' => 'Use Cache',
      'dateFormat' => 'Date Format',
      'timeFormat' => 'Time Format',
      'timeZone' => 'Time Zone',
      'weekStart' => 'First Day of Week',
      'thousandSeparator' => 'Thousand Separator',
      'decimalMark' => 'Decimal Mark',
      'defaultCurrency' => 'Default Currency',
      'baseCurrency' => 'Base Currency',
      'currencyRates' => 'Rate Values',
      'currencyList' => 'Currency List',
      'language' => 'Language',
      'companyLogo' => 'Company Logo',
      'smsProvider' => 'SMS Provider',
      'outboundSmsFromNumber' => 'SMS From Number',
      'smtpServer' => 'Server',
      'smtpPort' => 'Port',
      'smtpAuth' => 'Auth',
      'smtpSecurity' => 'Security',
      'smtpUsername' => 'Username',
      'emailAddress' => 'Email',
      'smtpPassword' => 'Password',
      'outboundEmailFromName' => 'From Name',
      'outboundEmailFromAddress' => 'From Address',
      'outboundEmailIsShared' => 'Is Shared',
      'emailAddressLookupEntityTypeList' => 'Email address look-up scopes',
      'recordsPerPage' => 'Records Per Page',
      'recordsPerPageSmall' => 'Records Per Page (Small)',
      'recordsPerPageSelect' => 'Records Per Page (Select)',
      'recordsPerPageKanban' => 'Records Per Page (Kanban)',
      'tabList' => 'Tab List',
      'quickCreateList' => 'Quick Create List',
      'exportDelimiter' => 'Export Delimiter',
      'globalSearchEntityList' => 'Global Search Entity List',
      'authenticationMethod' => 'Authentication Method',
      'ldapHost' => 'Host',
      'ldapPort' => 'Port',
      'ldapAuth' => 'Auth',
      'ldapUsername' => 'Full User DN',
      'ldapPassword' => 'Password',
      'ldapBindRequiresDn' => 'Bind Requires DN',
      'ldapBaseDn' => 'Base DN',
      'ldapAccountCanonicalForm' => 'Account Canonical Form',
      'ldapAccountDomainName' => 'Account Domain Name',
      'ldapTryUsernameSplit' => 'Try Username Split',
      'ldapPortalUserLdapAuth' => 'Use LDAP Authentication for Portal Users',
      'ldapCreateEspoUser' => 'Create User in EspoCRM',
      'ldapSecurity' => 'Security',
      'ldapUserLoginFilter' => 'User Login Filter',
      'ldapAccountDomainNameShort' => 'Account Domain Name Short',
      'ldapOptReferrals' => 'Opt Referrals',
      'ldapUserNameAttribute' => 'Username Attribute',
      'ldapUserObjectClass' => 'User ObjectClass',
      'ldapUserTitleAttribute' => 'User Title Attribute',
      'ldapUserFirstNameAttribute' => 'User First Name Attribute',
      'ldapUserLastNameAttribute' => 'User Last Name Attribute',
      'ldapUserEmailAddressAttribute' => 'User Email Address Attribute',
      'ldapUserTeams' => 'User Teams',
      'ldapUserDefaultTeam' => 'User Default Team',
      'ldapUserPhoneNumberAttribute' => 'User Phone Number Attribute',
      'ldapPortalUserPortals' => 'Default Portals for a Portal User',
      'ldapPortalUserRoles' => 'Default Roles for a Portal User',
      'exportDisabled' => 'Disable Export (only admin is allowed)',
      'assignmentNotificationsEntityList' => 'Entities to notify about upon assignment',
      'assignmentEmailNotifications' => 'Notifications upon assignment',
      'assignmentEmailNotificationsEntityList' => 'Assignment email notifications scopes',
      'streamEmailNotifications' => 'Notifications about updates in Stream for internal users',
      'portalStreamEmailNotifications' => 'Notifications about updates in Stream for portal users',
      'streamEmailNotificationsEntityList' => 'Stream email notifications scopes',
      'streamEmailNotificationsTypeList' => 'What to notify about',
      'emailNotificationsDelay' => 'Delay of email notifications (in seconds)',
      'b2cMode' => 'B2C Mode',
      'avatarsDisabled' => 'Disable Avatars',
      'followCreatedEntities' => 'Follow created records',
      'displayListViewRecordCount' => 'Display Total Count (on List View)',
      'theme' => 'Theme',
      'userThemesDisabled' => 'Disable User Themes',
      'attachmentUploadMaxSize' => 'Upload Max Size (Mb)',
      'attachmentUploadChunkSize' => 'Upload Chunk Size (Mb)',
      'emailMessageMaxSize' => 'Email Max Size (Mb)',
      'massEmailMaxPerHourCount' => 'Max number of emails sent per hour',
      'massEmailMaxPerBatchCount' => 'Max number of emails sent per batch',
      'personalEmailMaxPortionSize' => 'Max email portion size for personal account fetching',
      'inboundEmailMaxPortionSize' => 'Max email portion size for group account fetching',
      'maxEmailAccountCount' => 'Max number of personal email accounts per user',
      'authTokenLifetime' => 'Auth Token Lifetime (hours)',
      'authTokenMaxIdleTime' => 'Auth Token Max Idle Time (hours)',
      'dashboardLayout' => 'Dashboard Layout (default)',
      'siteUrl' => 'Site URL',
      'addressPreview' => 'Address Preview',
      'addressFormat' => 'Address Format',
      'personNameFormat' => 'Person Name Format',
      'notificationSoundsDisabled' => 'Disable Notification Sounds',
      'newNotificationCountInTitle' => 'Display new notification number in page title',
      'applicationName' => 'Application Name',
      'calendarEntityList' => 'Calendar Entity List',
      'busyRangesEntityList' => 'Free/Busy Entity List',
      'mentionEmailNotifications' => 'Send email notifications about mentions in posts',
      'massEmailDisableMandatoryOptOutLink' => 'Disable mandatory opt-out link',
      'massEmailOpenTracking' => 'Email Open Tracking',
      'massEmailVerp' => 'Use VERP',
      'activitiesEntityList' => 'Activities Entity List',
      'historyEntityList' => 'History Entity List',
      'currencyFormat' => 'Currency Format',
      'currencyDecimalPlaces' => 'Currency Decimal Places',
      'aclAllowDeleteCreated' => 'Allow to remove created records',
      'adminNotifications' => 'System notifications in administration panel',
      'adminNotificationsNewVersion' => 'Show notification when new EspoCRM version is available',
      'adminNotificationsNewExtensionVersion' => 'Show notification when new versions of extensions are available',
      'textFilterUseContainsForVarchar' => 'Use \'contains\' operator when filtering varchar fields',
      'phoneNumberNumericSearch' => 'Numeric phone number search',
      'phoneNumberInternational' => 'International phone numbers',
      'phoneNumberPreferredCountryList' => 'Preferred telephone country codes',
      'authTokenPreventConcurrent' => 'Only one auth token per user',
      'scopeColorsDisabled' => 'Disable scope colors',
      'tabColorsDisabled' => 'Disable tab colors',
      'tabIconsDisabled' => 'Disable tab icons',
      'emailAddressIsOptedOutByDefault' => 'Mark new email addresses as opted-out',
      'outboundEmailBccAddress' => 'BCC address for external clients',
      'cleanupDeletedRecords' => 'Clean up deleted records',
      'addressCountryList' => 'Address Country Autocomplete List',
      'addressCityList' => 'Address City Autocomplete List',
      'addressStateList' => 'Address State Autocomplete List',
      'fiscalYearShift' => 'Fiscal Year Start',
      'jobRunInParallel' => 'Jobs Run in Parallel',
      'jobMaxPortion' => 'Jobs Max Portion',
      'jobPoolConcurrencyNumber' => 'Jobs Pool Concurrency Number',
      'daemonInterval' => 'Daemon Interval',
      'daemonMaxProcessNumber' => 'Daemon Max Process Number',
      'daemonProcessTimeout' => 'Daemon Process Timeout',
      'cronDisabled' => 'Disable Cron',
      'maintenanceMode' => 'Maintenance Mode',
      'useWebSocket' => 'Use WebSocket',
      'passwordRecoveryDisabled' => 'Disable password recovery',
      'passwordRecoveryForAdminDisabled' => 'Disable password recovery for admin users',
      'passwordRecoveryForInternalUsersDisabled' => 'Disable password recovery for internal users',
      'passwordRecoveryNoExposure' => 'Prevent email address exposure on password recovery form',
      'passwordGenerateLength' => 'Length of generated passwords',
      'passwordStrengthLength' => 'Minimum password length',
      'passwordStrengthLetterCount' => 'Number of letters required in password',
      'passwordStrengthNumberCount' => 'Number of digits required in password',
      'passwordStrengthBothCases' => 'Password must contain letters of both upper and lower case',
      'auth2FA' => 'Enable 2-Factor Authentication',
      'auth2FAForced' => 'Force regular users to set up 2FA',
      'auth2FAMethodList' => 'Available 2FA methods',
      'auth2FAInPortal' => 'Allow 2FA in portals',
      'workingTimeCalendar' => 'Working Time Calendar',
      'oidcClientId' => 'OIDC Client ID',
      'oidcClientSecret' => 'OIDC Client Secret',
      'oidcAuthorizationRedirectUri' => 'OIDC Authorization Redirect URI',
      'oidcAuthorizationEndpoint' => 'OIDC Authorization Endpoint',
      'oidcTokenEndpoint' => 'OIDC Token Endpoint',
      'oidcJwksEndpoint' => 'OIDC JSON Web Key Set Endpoint',
      'oidcJwtSignatureAlgorithmList' => 'OIDC JWT Allowed Signature Algorithms',
      'oidcScopes' => 'OIDC Scopes',
      'oidcGroupClaim' => 'OIDC Group Claim',
      'oidcCreateUser' => 'OIDC Create User',
      'oidcUsernameClaim' => 'OIDC Username Claim',
      'oidcTeams' => 'OIDC Teams',
      'oidcSync' => 'OIDC Sync',
      'oidcSyncTeams' => 'OIDC Sync Teams',
      'oidcFallback' => 'OIDC Fallback Login',
      'oidcAllowRegularUserFallback' => 'OIDC Allow fallback login for regular users',
      'oidcAllowAdminUser' => 'OIDC Allow OIDC login for admin users',
      'oidcLogoutUrl' => 'OIDC Logout URL',
      'pdfEngine' => 'PDF Engine',
      'addressCountryAsEnum' => 'Address Country as an Enum',
      'aresEnabled' => 'Enable ARES',
      'defaultDetailLayout' => 'Default Detail Layout',
      'defaultIsWide' => 'Wide Default Detail Layout',
      'disableIntroductoryGuide' => 'Disable Introductory Guide',
      'editEntityEnabled' => 'Enable Quick Entity Edit',
      'editFiltersEnabled' => 'Enable Quick Filters Edit',
      'editLabelsEnabled' => 'Enable Quick Labels Edit',
      'editLayoutEnabled' => 'Enable Quick Layout Edit',
      'refreshEntityEnabled' => 'Enable Quick Entity Refresh',
      'emailCheckInterval' => 'Email Check Interval',
      'finstatEnabled' => 'Enable FinStat',
      'isWide' => 'Wide Detail View',
      'link' => 'Link',
      'notificationsCheckInterval' => 'Notification Check Interval',
      'viesEnabled' => 'Enable VIES verification',
      'recurrenceBatchSizeLimit' => 'Single Batch Size Limit',
      'showListScheduledRecurrencesButton' => 'Show Scheduled Recurrences Button',
      'warehouseRevertGoodsInSalesOrder' => 'Warehouse for Returning Goods',
      'humanResourceApprovalRole' => 'Role for Vacation Request Approval',
      'humanResourceApprovalTeam' => 'Team Assigned to Approved Vacations',
      'warehouseGroupByFieldList' => 'Group items based on',
      'updateProductCostPriceWithAveragePrice' => 'Continuously update cost price with average product price',
      'warehouseListToSaveValueOf' => 'Warehouse list to save value of',
      'companyName' => 'Company name / First and Last Name',
      'companyBillingAddress' => 'Billing address',
      'companyShippingAddress' => 'Shipping address',
      'companySicCode' => 'Company registration number',
      'companyVatId' => 'VAT number',
      'companyEmail' => 'Email',
      'companyWebsite' => 'Web',
      'companyPhoneNumber' => 'Phone',
      'companyBankAccount' => 'Bank account number',
      'companyIban' => 'IBAN',
      'companyVatPayer' => 'Vat payer',
      'companyRegisteredIn' => 'Registered in',
      'supplierName' => 'Name / First and Last Name',
      'supplierAddress' => 'Address',
      'supplierSicCode' => 'Company ID',
      'supplierVatId' => 'VAT ID',
      'supplierVATpayer' => 'VAT payer',
      'supplierEmail' => 'Email',
      'supplierPhone' => 'Phone',
      'supplierWebsite' => 'Website',
      'accountNumber' => 'Account Number',
      'iban' => 'IBAN',
      'swift' => 'SWIFT/BIC',
      'invoicePrefix' => 'Issued invoices',
      'invoiceYearNumberFormat' => 'Year number format',
      'invoiceNumberOfMonth' => 'Month number',
      'invoicePerYear' => 'Number of invoices per year / month',
      'invoiceDelimiter' => 'Delimiter',
      'invoiceNumberPreview' => 'Invoice number preview',
      'proformaInvoicePrefix' => 'Issued proforma invoices',
      'issuedTaxDocumentPrefix' => 'Tax documents for received payments',
      'creditNotePrefix' => 'Credit notes',
      'supplierInvoicePrefix' => 'Received invoices',
      'receivedProformaPrefix' => 'Received proforma invoices',
      'receivedTaxDocumentPrefix' => 'Tax documents for received payments',
      'revenueReceiptPrefix' => 'Revenue receipts',
      'expenseReceiptPrefix' => 'Expense receipts',
      'customInvoiceNames' => 'Custom invoice names'
    ],
    'options' => [
      'authenticationMethod' => [
        'Oidc' => 'OIDC'
      ],
      'currencyFormat' => [
        1 => '10 USD',
        2 => '$10',
        3 => '10 $'
      ],
      'personNameFormat' => [
        'firstLast' => 'First Last',
        'lastFirst' => 'Last First',
        'firstMiddleLast' => 'First Middle Last',
        'lastFirstMiddle' => 'Last First Middle'
      ],
      'streamEmailNotificationsTypeList' => [
        'Post' => 'Posts',
        'Status' => 'Status updates',
        'EmailReceived' => 'Received emails'
      ],
      'auth2FAMethodList' => [
        'Totp' => 'TOTP',
        'Email' => 'Email',
        'Sms' => 'SMS'
      ],
      'addressCountryList' => [
        'AD' => 'Andorra',
        'AE' => 'United Arab Emirates',
        'AF' => 'Afghanistan',
        'AG' => 'Antigua And Barbuda',
        'AI' => 'Anguilla',
        'AL' => 'Albania',
        'AM' => 'Armenia',
        'AN' => 'Netherlands Antilles',
        'AO' => 'Angola',
        'AQ' => 'Antarctica',
        'AR' => 'Argentina',
        'AS' => 'American Samoa',
        'AT' => 'Austria',
        'AU' => 'Australia',
        'AW' => 'Aruba',
        'AX' => 'Aland Islands',
        'AZ' => 'Azerbaijan',
        'BA' => 'Bosnia And Herzegovina',
        'BB' => 'Barbados',
        'BD' => 'Bangladesh',
        'BE' => 'Belgium',
        'BF' => 'Burkina Faso',
        'BG' => 'Bulgaria',
        'BH' => 'Bahrain',
        'BI' => 'Burundi',
        'BJ' => 'Benin',
        'BL' => 'Saint Barthelemy',
        'BM' => 'Bermuda',
        'BN' => 'Brunei Darussalam',
        'BO' => 'Bolivia',
        'BR' => 'Brazil',
        'BS' => 'Bahamas',
        'BT' => 'Bhutan',
        'BV' => 'Bouvet Island',
        'BW' => 'Botswana',
        'BY' => 'Belarus',
        'BZ' => 'Belize',
        'CA' => 'Canada',
        'CC' => 'Cocos (Keeling) Islands',
        'CD' => 'Congo, Democratic Republic',
        'CF' => 'Central African Republic',
        'CG' => 'Congo',
        'CH' => 'Switzerland',
        'CI' => 'Cote D"Ivoire',
        'CK' => 'Cook Islands',
        'CL' => 'Chile',
        'CM' => 'Cameroon',
        'CN' => 'China',
        'CO' => 'Colombia',
        'CR' => 'Costa Rica',
        'CU' => 'Cuba',
        'CV' => 'Cape Verde',
        'CX' => 'Christmas Island',
        'CY' => 'Cyprus',
        'CZ' => 'Czech Republic',
        'DE' => 'Germany',
        'DJ' => 'Djibouti',
        'DK' => 'Denmark',
        'DM' => 'Dominica',
        'DO' => 'Dominican Republic',
        'DZ' => 'Algeria',
        'EC' => 'Ecuador',
        'EE' => 'Estonia',
        'EG' => 'Egypt',
        'EH' => 'Western Sahara',
        'ER' => 'Eritrea',
        'ES' => 'Spain',
        'ET' => 'Ethiopia',
        'FI' => 'Finland',
        'FJ' => 'Fiji',
        'FK' => 'Falkland Islands (Malvinas)',
        'FM' => 'Micronesia, Federated States Of',
        'FO' => 'Faroe Islands',
        'FR' => 'France',
        'GA' => 'Gabon',
        'GB' => 'United Kingdom',
        'GD' => 'Grenada',
        'GE' => 'Georgia',
        'GF' => 'French Guiana',
        'GG' => 'Guernsey',
        'GH' => 'Ghana',
        'GI' => 'Gibraltar',
        'GL' => 'Greenland',
        'GM' => 'Gambia',
        'GN' => 'Guinea',
        'GP' => 'Guadeloupe',
        'GQ' => 'Equatorial Guinea',
        'GR' => 'Greece',
        'GS' => 'South Georgia And Sandwich Isl.',
        'GT' => 'Guatemala',
        'GU' => 'Guam',
        'GW' => 'Guinea-Bissau',
        'GY' => 'Guyana',
        'HK' => 'Hong Kong',
        'HM' => 'Heard Island & Mcdonald Islands',
        'HN' => 'Honduras',
        'HR' => 'Croatia',
        'HT' => 'Haiti',
        'HU' => 'Hungary',
        'ID' => 'Indonesia',
        'IE' => 'Ireland',
        'IL' => 'Israel',
        'IM' => 'Isle Of Man',
        'IN' => 'India',
        'IO' => 'British Indian Ocean Territory',
        'IQ' => 'Iraq',
        'IR' => 'Iran, Islamic Republic Of',
        'IS' => 'Iceland',
        'IT' => 'Italy',
        'JE' => 'Jersey',
        'JM' => 'Jamaica',
        'JO' => 'Jordan',
        'JP' => 'Japan',
        'KE' => 'Kenya',
        'KG' => 'Kyrgyzstan',
        'KH' => 'Cambodia',
        'KI' => 'Kiribati',
        'KM' => 'Comoros',
        'KN' => 'Saint Kitts And Nevis',
        'KP' => 'North Korea',
        'KR' => 'Korea',
        'KW' => 'Kuwait',
        'KY' => 'Cayman Islands',
        'KZ' => 'Kazakhstan',
        'LA' => 'Lao People"s Democratic Republic',
        'LB' => 'Lebanon',
        'LC' => 'Saint Lucia',
        'LI' => 'Liechtenstein',
        'LK' => 'Sri Lanka',
        'LR' => 'Liberia',
        'LS' => 'Lesotho',
        'LT' => 'Lithuania',
        'LU' => 'Luxembourg',
        'LV' => 'Latvia',
        'LY' => 'Libyan Arab Jamahiriya',
        'MA' => 'Morocco',
        'MC' => 'Monaco',
        'MD' => 'Moldova',
        'ME' => 'Montenegro',
        'MF' => 'Saint Martin',
        'MG' => 'Madagascar',
        'MH' => 'Marshall Islands',
        'MK' => 'Macedonia',
        'ML' => 'Mali',
        'MM' => 'Myanmar',
        'MN' => 'Mongolia',
        'MO' => 'Macao',
        'MP' => 'Northern Mariana Islands',
        'MQ' => 'Martinique',
        'MR' => 'Mauritania',
        'MS' => 'Montserrat',
        'MT' => 'Malta',
        'MU' => 'Mauritius',
        'MV' => 'Maldives',
        'MW' => 'Malawi',
        'MX' => 'Mexico',
        'MY' => 'Malaysia',
        'MZ' => 'Mozambique',
        'NA' => 'Namibia',
        'NC' => 'New Caledonia',
        'NE' => 'Niger',
        'NF' => 'Norfolk Island',
        'NG' => 'Nigeria',
        'NI' => 'Nicaragua',
        'NL' => 'Netherlands',
        'NO' => 'Norway',
        'NP' => 'Nepal',
        'NR' => 'Nauru',
        'NU' => 'Niue',
        'NZ' => 'New Zealand',
        'OM' => 'Oman',
        'PA' => 'Panama',
        'PE' => 'Peru',
        'PF' => 'French Polynesia',
        'PG' => 'Papua New Guinea',
        'PH' => 'Philippines',
        'PK' => 'Pakistan',
        'PL' => 'Poland',
        'PM' => 'Saint Pierre And Miquelon',
        'PN' => 'Pitcairn',
        'PR' => 'Puerto Rico',
        'PS' => 'Palestinian Territory, Occupied',
        'PT' => 'Portugal',
        'PW' => 'Palau',
        'PY' => 'Paraguay',
        'QA' => 'Qatar',
        'RE' => 'Reunion',
        'RO' => 'Romania',
        'RS' => 'Serbia',
        'RU' => 'Russian Federation',
        'RW' => 'Rwanda',
        'SA' => 'Saudi Arabia',
        'SB' => 'Solomon Islands',
        'SC' => 'Seychelles',
        'SD' => 'Sudan',
        'SE' => 'Sweden',
        'SG' => 'Singapore',
        'SH' => 'Saint Helena',
        'SI' => 'Slovenia',
        'SJ' => 'Svalbard And Jan Mayen',
        'SK' => 'Slovakia',
        'SL' => 'Sierra Leone',
        'SM' => 'San Marino',
        'SN' => 'Senegal',
        'SO' => 'Somalia',
        'SR' => 'Suriname',
        'ST' => 'Sao Tome And Principe',
        'SV' => 'El Salvador',
        'SY' => 'Syrian Arab Republic',
        'SZ' => 'Swaziland',
        'TC' => 'Turks And Caicos Islands',
        'TD' => 'Chad',
        'TF' => 'French Southern Territories',
        'TG' => 'Togo',
        'TH' => 'Thailand',
        'TJ' => 'Tajikistan',
        'TK' => 'Tokelau',
        'TL' => 'Timor-Leste',
        'TM' => 'Turkmenistan',
        'TN' => 'Tunisia',
        'TO' => 'Tonga',
        'TR' => 'Turkey',
        'TT' => 'Trinidad And Tobago',
        'TV' => 'Tuvalu',
        'TW' => 'Taiwan',
        'TZ' => 'Tanzania',
        'UA' => 'Ukraine',
        'UG' => 'Uganda',
        'UM' => 'United States Outlying Islands',
        'US' => 'United States',
        'UY' => 'Uruguay',
        'UZ' => 'Uzbekistan',
        'VA' => 'Holy See (Vatican City State)',
        'VC' => 'Saint Vincent And Grenadines',
        'VE' => 'Venezuela',
        'VG' => 'Virgin Islands, British',
        'VI' => 'Virgin Islands, U.S.',
        'VN' => 'Vietnam',
        'VU' => 'Vanuatu',
        'WF' => 'Wallis And Futuna',
        'WS' => 'Samoa',
        'YE' => 'Yemen',
        'YT' => 'Mayotte',
        'ZA' => 'South Africa',
        'ZM' => 'Zambia',
        'ZW' => 'Zimbabwe'
      ],
      'defaultDetailLayout' => [
        'record' => 'Default',
        'tab' => 'Tabs'
      ],
      'supplierVATpayer' => [
        'Non VAT payer' => 'Non-VAT payer',
        'Identified person' => 'Identified person',
        'VAT payer' => 'VAT payer'
      ],
      'invoiceNumberOfMonth' => [
        'no' => 'No',
        'yes' => 'Yes'
      ],
      'invoiceDelimiter' => [
        '-' => '-',
        'none' => 'None'
      ]
    ],
    'tooltips' => [
      'workingTimeCalendar' => 'A working time calendar that will be applied to all users by default.',
      'displayListViewRecordCount' => 'A total number of records will be shown on the list view.',
      'currencyList' => 'What currencies will be available in the system.',
      'activitiesEntityList' => 'What records will be available in the Activities panel.',
      'historyEntityList' => 'What records will be available in the History panel.',
      'calendarEntityList' => 'What records will be available in the Calendar.',
      'addressStateList' => 'State suggestions for address fields.',
      'addressCityList' => 'City suggestions for address fields.',
      'addressCountryList' => 'Country suggestions for address fields.',
      'exportDisabled' => 'Users won\'t be able to export records. Only admin will be allowed.',
      'globalSearchEntityList' => 'What records can be searched with Global Search.',
      'siteUrl' => 'A URL of this EspoCRM instance. You need to change it if you move to another domain.',
      'useCache' => 'Not recommended to disable, unless for development purpose.',
      'useWebSocket' => 'WebSocket enables two-way interactive communication between a server and a browser. Requires setting up the WebSocket daemon on your server. Check the documentation for more info.',
      'passwordRecoveryForInternalUsersDisabled' => 'Only portal users will be able to recover password.',
      'passwordRecoveryNoExposure' => 'It won\'t be possible to determine whether a specific email address is registered in the system.',
      'emailAddressLookupEntityTypeList' => 'For email address autocomplete.',
      'emailNotificationsDelay' => 'A message can be edited within the specified timeframe before the notification is sent.',
      'outboundEmailFromAddress' => 'The system email address.',
      'smtpServer' => 'If empty, then Group Email Account with the corresponding email address will be used.',
      'busyRangesEntityList' => 'What will be taken into account when showing busy time ranges in scheduler & timeline.',
      'massEmailVerp' => 'Variable envelope return path. For better handling of bounced messages. Make sure that your SMTP provider supports it.',
      'recordsPerPage' => 'Number of records initially displayed in list views.',
      'recordsPerPageSmall' => 'Number of records initially displayed in relationship panels.',
      'recordsPerPageSelect' => 'Number of records initially displayed when selecting records.',
      'recordsPerPageKanban' => 'Number of records initially displayed in kanban columns.',
      'outboundEmailIsShared' => 'Allow users to send emails from this address.',
      'followCreatedEntities' => 'Users will automatically follow records they created.',
      'emailMessageMaxSize' => 'All inbound emails exceeding a specified size will be fetched w/o body and attachments.',
      'authTokenLifetime' => 'Defines how long tokens can exist.
0 - means no expiration.',
      'authTokenMaxIdleTime' => 'Defines how long since the last access tokens can exist.
0 - means no expiration.',
      'userThemesDisabled' => 'If checked then users won\'t be able to select another theme.',
      'ldapUsername' => 'The full system user DN which allows to search other users. E.g. "CN=LDAP System User,OU=users,OU=espocrm, DC=test,DC=lan".',
      'ldapPassword' => 'The password to access to LDAP server.',
      'ldapAuth' => 'Access credentials for the LDAP server.',
      'ldapUserNameAttribute' => 'The attribute to identify the user. 
E.g. "userPrincipalName" or "sAMAccountName" for Active Directory, "uid" for OpenLDAP.',
      'ldapUserObjectClass' => 'ObjectClass attribute for searching users. E.g. "person" for AD, "inetOrgPerson" for OpenLDAP.',
      'ldapAccountCanonicalForm' => 'The type of your account canonical form. There are 4 options:

- \'Dn\' - the form in the format \'CN=tester,OU=espocrm,DC=test, DC=lan\'.

- \'Username\' - the form \'tester\'.

- \'Backslash\' - the form \'COMPANY\\tester\'.

- \'Principal\' - the form \'tester@company.com\'.',
      'ldapBindRequiresDn' => 'The option to format the username in the DN form.',
      'ldapBaseDn' => 'The default base DN used for searching users. E.g. "OU=users,OU=espocrm,DC=test, DC=lan".',
      'ldapTryUsernameSplit' => 'The option to split a username with the domain.',
      'ldapOptReferrals' => 'if referrals should be followed to the LDAP client.',
      'ldapPortalUserLdapAuth' => 'Allow portal users to use LDAP authentication instead of Espo authentication.',
      'ldapCreateEspoUser' => 'This option allows EspoCRM to create a user from the LDAP.',
      'ldapUserFirstNameAttribute' => 'LDAP attribute which is used to determine the user first name. E.g. "givenname".',
      'ldapUserLastNameAttribute' => 'LDAP attribute which is used to determine the user last name. E.g. "sn".',
      'ldapUserTitleAttribute' => 'LDAP attribute which is used to determine the user title. E.g. "title".',
      'ldapUserEmailAddressAttribute' => 'LDAP attribute which is used to determine the user email address. E.g. "mail".',
      'ldapUserPhoneNumberAttribute' => 'LDAP attribute which is used to determine the user phone number. E.g. "telephoneNumber".',
      'ldapUserLoginFilter' => 'The filter which allows to restrict users who able to use EspoCRM. E.g. "memberOf=CN=espoGroup, OU=groups,OU=espocrm, DC=test,DC=lan".',
      'ldapAccountDomainName' => 'The domain which is used for authorization to LDAP server.',
      'ldapAccountDomainNameShort' => 'The short domain which is used for authorization to LDAP server.',
      'ldapUserTeams' => 'Teams for created user. For more, see user profile.',
      'ldapUserDefaultTeam' => 'Default team for created user. For more, see user profile.',
      'ldapPortalUserPortals' => 'Default Portals for created Portal User',
      'ldapPortalUserRoles' => 'Default Roles for created Portal User',
      'b2cMode' => 'By default EspoCRM is adapted for B2B. You can switch it to B2C.',
      'currencyDecimalPlaces' => 'Number of decimal places. If empty then all nonempty decimal places will be displayed.',
      'aclStrictMode' => 'Enabled: Access to scopes will be forbidden if it\'s not specified in roles.

Disabled: Access to scopes will be allowed if it\'s not specified in roles.',
      'aclAllowDeleteCreated' => 'Users will be able to remove records they created even if they don\'t have a delete access.',
      'textFilterUseContainsForVarchar' => 'If not checked then \'starts with\' operator is used. You can use the wildcard \'%\'.',
      'streamEmailNotificationsEntityList' => 'Email notifications about stream updates of followed records. Users will receive email notifications only for specified entity types.',
      'authTokenPreventConcurrent' => 'Users won\'t be able to be logged in on multiple devices simultaneously.',
      'emailAddressIsOptedOutByDefault' => 'When creating new record email addess will be marked as opted-out.',
      'cleanupDeletedRecords' => 'Removed records will be deleted from database after a while.',
      'jobRunInParallel' => 'Jobs will be executed in parallel processes.',
      'jobPoolConcurrencyNumber' => 'Max number of processes run simultaneously.',
      'jobMaxPortion' => 'Max number of jobs processed per one execution.',
      'daemonInterval' => 'Interval between process cron runs in seconds.',
      'daemonMaxProcessNumber' => 'Max number of cron processes run simultaneously.',
      'daemonProcessTimeout' => 'Max execution time (in seconds) allocated for a single cron process.',
      'cronDisabled' => 'Cron will not run.',
      'maintenanceMode' => 'Only administrators will have access to the system.',
      'oidcGroupClaim' => 'A claim to user for team mapping.',
      'oidcFallback' => 'Allow login by username/password.',
      'oidcCreateUser' => 'Create a new user in Espo when no matching user found.',
      'oidcSync' => 'Sync user data (on every login).',
      'oidcSyncTeams' => 'Sync user teams (on every login).',
      'oidcUsernameClaim' => 'A claim to use for a username (for user matching and creation).',
      'oidcTeams' => 'Espo teams mapped against groups/teams/roles of the identity provider. Teams with an empty mapping value will be always assigned to a user (when creating or syncing).',
      'oidcLogoutUrl' => 'An URL the browser will redirect to after logging out from Espo. Intended for clearing the session information in the browser and doing logging out on the provider side. Usually the URL contains a redirect-URL parameter, to return back to Espo.

Available placeholders:
* `{siteUrl}`
* `{clientId}`',
      'aresEnabled' => 'Enable filling account data from ARES.',
      'defaultIsWide' => 'In wide view, the sidebar is moved to the bottom.',
      'disableIntroductoryGuide' => 'Disable introductory guide on first page load.',
      'editEntityEnabled' => 'Add "Edit Entity" button in the top right corner.',
      'editFiltersEnabled' => 'Add "Edit Filters" button in the top right corner.',
      'editLabelsEnabled' => 'Add "Edit Labels" button in the top right corner.',
      'refreshEntityEnabled' => 'Add "Refresh Entity" button in the top right corner.',
      'editLayoutEnabled' => 'Add "Edit Layout" button in the top right corner.',
      'editNavbarEnabled' => 'Add "Edit Navbar" button to the bottom of the navbar.',
      'emailCheckInterval' => 'The interval in seconds between checking for new emails.',
      'finstatEnabled' => 'Enable filling account data from FinStat.',
      'isWide' => 'In wide view, the sidebar is moved to the bottom.',
      'notificationsCheckInterval' => 'The interval in seconds between checking for new notifications.',
      'viesEnabled' => 'Adds VAT ID verification option for supported entities.',
      'recurrenceBatchSizeLimit' => 'The maximum number of records to be processed in a single batch. Setting high values may cause the system to not function properly.',
      'showListScheduledRecurrencesButton' => 'If enabled, the Scheduled Recurrences button will be displayed in every list view with scheduled recurring records.',
      'warehouseRevertGoodsInSalesOrder' => 'Specifies the warehouse to which goods will be returned from the sales order if the order is changed/cancelled and the goods are to be restocked back into the warehouse.'
    ],
    'labels' => [
      'Group Tab' => 'Group Tab',
      'Divider' => 'Divider',
      'System' => 'System',
      'Locale' => 'Locale',
      'Search' => 'Search',
      'Misc' => 'Misc',
      'SMTP' => 'SMTP',
      'General' => 'General',
      'Phone Numbers' => 'Phone Numbers',
      'Navbar' => 'Navbar',
      'Dashboard' => 'Dashboard',
      'Configuration' => 'Configuration',
      'In-app Notifications' => 'In-app Notifications',
      'Email Notifications' => 'Email Notifications',
      'Currency Settings' => 'Currency Settings',
      'Currency Rates' => 'Currency Rates',
      'Mass Email' => 'Mass Email',
      'Test Connection' => 'Test Connection',
      'Connecting' => 'Connecting...',
      'Activities' => 'Activities',
      'Admin Notifications' => 'Admin Notifications',
      'Passwords' => 'Passwords',
      '2-Factor Authentication' => '2-Factor Authentication',
      'Attachments' => 'Attachments',
      'IdP Group' => 'IdP Group',
      'Autocrm' => 'AutoCRM',
      'Custom Link' => 'Custom Link',
      'Record Recurrence' => 'Record Recurrence',
      'Company information' => 'Company information',
      'Others' => 'Others',
      'Billing information' => 'Billing information',
      'Contact information' => 'Contact information',
      'Bank account' => 'Bank account',
      'Number series of invoices' => 'Number series of invoices',
      'Invoice prefixes' => 'Invoice prefixes'
    ],
    'messages' => [
      'ldapTestConnection' => 'The connection successfully established.'
    ],
    'label' => [
      'HumanResources Settings' => 'HR Module Settings'
    ]
  ],
  'Stream' => [
    'messages' => [
      'infoMention' => 'Type **@username** to mention user in the post.',
      'infoSyntax' => 'Available markdown syntax',
      'couldNotAddFollowerUserHasNoAccessToStream' => 'Could not add the user \'{userName}\' to the followers. The user does not have \'stream\' access to the record.'
    ],
    'syntaxItems' => [
      'code' => 'code',
      'multilineCode' => 'multiline code',
      'strongText' => 'strong text',
      'emphasizedText' => 'emphasized text',
      'deletedText' => 'deleted text',
      'blockquote' => 'blockquote',
      'link' => 'link'
    ]
  ],
  'Team' => [
    'fields' => [
      'name' => 'Name',
      'roles' => 'Roles',
      'layoutSet' => 'Layout Set',
      'workingTimeCalendar' => 'Working Time Calendar',
      'positionList' => 'Position List'
    ],
    'links' => [
      'users' => 'Users',
      'notes' => 'Notes',
      'roles' => 'Roles',
      'layoutSet' => 'Layout Set',
      'workingTimeCalendar' => 'Working Time Calendar',
      'inboundEmails' => 'Group Email Accounts',
      'groupEmailFolders' => 'Group Email Folders'
    ],
    'tooltips' => [
      'workingTimeCalendar' => 'A calendar will be applied to users who have this team set as a Default Team.',
      'layoutSet' => 'Provides the ability to have layouts that differ from standard ones. Layout Set will be applied to users who have this team set as Default Team.',
      'roles' => 'Access Roles. Users of this team obtain access control level from selected roles.',
      'positionList' => 'Available positions in this team. E.g. Salesperson, Manager.'
    ],
    'labels' => [
      'Create Team' => 'Create Team'
    ]
  ],
  'Template' => [
    'fields' => [
      'name' => 'Name',
      'body' => 'Body',
      'entityType' => 'Entity Type',
      'header' => 'Header',
      'footer' => 'Footer',
      'leftMargin' => 'Left Margin',
      'topMargin' => 'Top Margin',
      'rightMargin' => 'Right Margin',
      'bottomMargin' => 'Bottom Margin',
      'printFooter' => 'Print Footer',
      'printHeader' => 'Print Header',
      'footerPosition' => 'Footer Position',
      'headerPosition' => 'Header Position',
      'variables' => 'Available Placeholders',
      'pageOrientation' => 'Page Orientation',
      'pageFormat' => 'Paper Format',
      'pageWidth' => 'Page Width (mm)',
      'pageHeight' => 'Page Height (mm)',
      'fontFace' => 'Font',
      'title' => 'Title',
      'type' => 'Editor Type'
    ],
    'links' => [],
    'labels' => [
      'Create Template' => 'Create Template',
      'Default' => 'Default Editor',
      'Ace' => 'Ace Editor',
      'Raw' => 'Raw Editor'
    ],
    'options' => [
      'pageOrientation' => [
        'Portrait' => 'Portrait',
        'Landscape' => 'Landscape'
      ],
      'pageFormat' => [
        'Custom' => 'Custom'
      ],
      'placeholders' => [
        'pagebreak' => 'Page break',
        'today' => 'Today (date)',
        'now' => 'Now (date-time)'
      ],
      'fontFace' => [
        'aealarabiya' => 'AlArabiya',
        'aefurat' => 'Aefurat',
        'cid0cs' => 'CID-0 cs',
        'cid0ct' => 'CID-0 ct',
        'cid0jp' => 'CID-0 jp',
        'cid0kr' => 'CID-0 kr',
        'courier' => 'Courier',
        'dejavusans' => 'DejaVu Sans',
        'dejavusanscondensed' => 'DejaVu Sans Condensed',
        'dejavusansextralight' => 'DejaVu Sans ExtraLight',
        'dejavusansmono' => 'DejaVu Sans Mono',
        'dejavuserif' => 'DejaVu Serif',
        'dejavuserifcondensed' => 'DejaVu Serif Condensed',
        'freemono' => 'FreeMono',
        'freesans' => 'FreeSans',
        'freeserif' => 'FreeSerif',
        'helvetica' => 'Helvetica',
        'hysmyeongjostdmedium' => 'Hysmyeongjostd Medium',
        'kozgopromedium' => 'Kozgo Pro Medium',
        'kozminproregular' => 'Kozmin Pro Regular',
        'msungstdlight' => 'Msung Std Light',
        'pdfacourier' => 'PDFA Courier',
        'pdfahelvetica' => 'PDFA Helvetica',
        'pdfasymbol' => 'PDFA Symbol',
        'pdfatimes' => 'PDFA Times',
        'stsongstdlight' => 'STSong Std Light',
        'symbol' => 'Symbol',
        'times' => 'Times'
      ],
      'type' => [
        'Default' => 'Default Editor',
        'Raw' => 'Raw Editor'
      ]
    ],
    'tooltips' => [
      'footer' => 'Use {pageNumber} to print page number.',
      'variables' => 'Copy-paste needed placeholder to Header, Body or Footer.',
      'headerPosition' => 'Has no effect in Puppeteer PDF engine. Instead, use styling to position the header.',
      'footerPosition' => 'Has no effect in Puppeteer PDF engine. Instead, use styling to position the footer.'
    ],
    'messages' => [
      'Default' => 'User-friendly WYSIWYG editor, provides basic features like text formatting, inserting images, links, tables and more.',
      'Ace' => 'Advanced editor with syntax highlighting, code folding, auto-completion and more, made for developers.',
      'Raw' => 'Editor without any formatting. For advanced users only, that want to write HTML code directly.'
    ]
  ],
  'User' => [
    'fields' => [
      'name' => 'Name',
      'userName' => 'User Name',
      'title' => 'Title',
      'type' => 'Type',
      'isAdmin' => 'Is Admin',
      'defaultTeam' => 'Default Team',
      'emailAddress' => 'Email',
      'phoneNumber' => 'Phone',
      'roles' => 'Roles',
      'portals' => 'Portals',
      'portalRoles' => 'Portal Roles',
      'teamRole' => 'Position',
      'password' => 'Password',
      'currentPassword' => 'Current Password',
      'passwordConfirm' => 'Confirm Password',
      'newPassword' => 'New Password',
      'newPasswordConfirm' => 'Confirm New Password',
      'yourPassword' => 'Your current password',
      'avatar' => 'Avatar',
      'isActive' => 'Is Active',
      'isPortalUser' => 'Is Portal User',
      'contact' => 'Contact',
      'accounts' => 'Accounts',
      'account' => 'Account (Primary)',
      'sendAccessInfo' => 'Send Email with Access Info to User',
      'portal' => 'Portal',
      'gender' => 'Gender',
      'position' => 'Position in Team',
      'ipAddress' => 'IP Address',
      'passwordPreview' => 'Password Preview',
      'isSuperAdmin' => 'Is Super Admin',
      'lastAccess' => 'Last Access',
      'apiKey' => 'API Key',
      'secretKey' => 'Secret Key',
      'dashboardTemplate' => 'Dashboard Template',
      'workingTimeCalendar' => 'Working Time Calendar',
      'auth2FA' => '2FA',
      'authMethod' => 'Authentication Method',
      'auth2FAEnable' => 'Enable 2-Factor Authentication',
      'auth2FAMethod' => '2FA Method',
      'auth2FATotpSecret' => '2FA TOTP Secret',
      'layoutSet' => 'Layout Set',
      'acceptanceStatus' => 'Acceptance Status',
      'acceptanceStatusMeetings' => 'Acceptance Status (Meetings)',
      'acceptanceStatusCalls' => 'Acceptance Status (Calls)',
      'humanResource' => 'HR',
      'mattermostToken' => 'MattermostToken',
      'mattermostSyncEnabled' => 'Mattermost Sync Enabled',
      'mattermostId' => 'MattermostId',
      'pozice' => 'Pozice ve firmě',
      'qualityReports1' => '8D Reporty',
      'qualityReports2' => '8D Report',
      'qualityReports3' => '8D Report',
      'qualityReports4' => '8D Report',
      'qualityReports5' => '8D Report',
      'qualityReports' => '8D Report',
      'qualityReports6' => '8D Report',
      'qualityReport' => '8D Report',
      'alisCardID' => 'alisCardID',
      'daysOff' => 'Zbývající dovolená (h)',
      'vacationRequest' => 'Vacation Request',
      'tasks1' => 'Tasks1',
      'isAllowed' => 'IsAllowed',
      'humanResources' => 'Human Resources',
      'vacationTime' => 'VacationTime',
      'vacationTimePerYear' => 'VacationTimePerYear',
      'remainingVacationTime' => 'RemainingVacationTime',
      'jIRA' => 'J IRA',
      'itTasks' => 'It Tasks',
      'isInvisible' => 'IsInvisible',
      'massEmail' => 'Mass Email'
    ],
    'links' => [
      'defaultTeam' => 'Default Team',
      'teams' => 'Teams',
      'roles' => 'Roles',
      'notes' => 'Notes',
      'portals' => 'Portals',
      'portalRoles' => 'Portal Roles',
      'contact' => 'Contact',
      'accounts' => 'Accounts',
      'account' => 'Account (Primary)',
      'tasks' => 'Tasks',
      'userData' => 'User Data',
      'dashboardTemplate' => 'Dashboard Template',
      'workingTimeCalendar' => 'Working Time Calendar',
      'workingTimeRanges' => 'Working Time Ranges',
      'layoutSet' => 'Layout Set',
      'targetLists' => 'Target Lists',
      'humanResource' => 'HR',
      'qualityReports1' => '8D Reporty',
      'qualityReports2' => '8D Report',
      'qualityReports3' => '8D Report',
      'qualityReports4' => '8D Report',
      'qualityReports5' => '8D Report',
      'qualityReports' => '8D Report',
      'qualityReports6' => '8D Report',
      'qualityReport' => '8D Report',
      'vacationRequest' => 'Vacation Request',
      'tasks1' => 'Tasks1',
      'humanResources' => 'Human Resources',
      'jIRA' => 'J IRA',
      'itTasks' => 'It Tasks',
      'massEmail' => 'Mass Email'
    ],
    'labels' => [
      'Create User' => 'Create User',
      'Generate' => 'Generate',
      'Access' => 'Access',
      'Preferences' => 'Preferences',
      'Change Password' => 'Change Password',
      'Teams and Access Control' => 'Teams and Access Control',
      'Forgot Password?' => 'Forgot Password?',
      'Password Change Request' => 'Password Change Request',
      'Email Address' => 'Email Address',
      'External Accounts' => 'External Accounts',
      'Email Accounts' => 'Email Accounts',
      'Portal' => 'Portal',
      'Create Portal User' => 'Create Portal User',
      'Proceed w/o Contact' => 'Proceed w/o Contact',
      'Generate New API Key' => 'Generate New API Key',
      'Generate New Password' => 'Generate New Password',
      'Send Password Change Link' => 'Send Password Change Link',
      'Back to login form' => 'Back to login form',
      'Requirements' => 'Requirements',
      'Security' => 'Security',
      'Reset 2FA' => 'Reset 2FA',
      'Code' => 'Code',
      'Secret' => 'Secret',
      'Send Code' => 'Send Code',
      'Login Link' => 'Login Link',
      'Create HR' => 'Create HR'
    ],
    'tooltips' => [
      'defaultTeam' => 'All records created by this user will be related to this team by default.',
      'userName' => 'Letters a-z, numbers 0-9, dots, hyphens, @-signs and underscores are allowed.',
      'isAdmin' => 'Admin user can access everything.',
      'isActive' => 'If unchecked then user won\'t be able to login.',
      'teams' => 'Teams which this user belongs to. Access control level is inherited from team\'s roles.',
      'roles' => 'Additional access roles. Use it if user doesn\'t belong to any team or you need to extend access control level exclusively for this user.',
      'portalRoles' => 'Additional portal roles. Use it to extend access control level exclusively for this user.',
      'portals' => 'Portals which this user has access to.',
      'layoutSet' => 'Layouts from a specified set will be applied for the user instead of default ones.',
      'mattermostSyncEnabled' => 'Sync user with Mattermost. (For this to work, ensure that Mattermost integration is enabled and configured)'
    ],
    'messages' => [
      '2faMethodNotConfigured' => 'The 2FA method is not fully configured in the system.',
      'loginAs' => 'Open the login link in an incognito window to preserve your current session. Use your admin credentials to log in.',
      'sendPasswordChangeLinkConfirmation' => 'An email with a unique link will be sent to the user allowing them to change their password. The link will expire after a specific amount of time.',
      'passwordRecoverySentIfMatched' => 'Assuming the entered data matched any user account.',
      'passwordStrengthLength' => 'Must be at least {length} characters long.',
      'passwordStrengthLetterCount' => 'Must contain at least {count} letter(s).',
      'passwordStrengthNumberCount' => 'Must contain at least {count} digit(s).',
      'passwordStrengthBothCases' => 'Must contain letters of both upper and lower case.',
      'passwordWillBeSent' => 'Password will be sent to user\'s email address.',
      'passwordChanged' => 'Password has been changed',
      'userCantBeEmpty' => 'Username can not be empty',
      'wrongUsernamePassword' => 'Wrong username/password',
      'failedToLogIn' => 'Failed to log in',
      'emailAddressCantBeEmpty' => 'Email Address can not be empty',
      'userNameEmailAddressNotFound' => 'Username/Email Address not found',
      'forbidden' => 'Forbidden, please try later',
      'uniqueLinkHasBeenSent' => 'The unique URL has been sent to the specified email address.',
      'passwordChangedByRequest' => 'Password has been changed.',
      'setupSmtpBefore' => 'You need to setup [SMTP settings]({url}) to make the system be able to send password in email.',
      'userNameExists' => 'User Name already exists',
      'loginError' => 'Error occurred',
      'wrongCode' => 'Wrong code',
      'codeIsRequired' => 'Code is required',
      'yourAuthenticationCode' => 'Your authentication code: {code}.',
      'choose2FaSmsPhoneNumber' => 'Select a phone number that will be used for 2FA.',
      'choose2FaEmailAddress' => 'Select an email address that will be used for 2FA. It\'s highly recommended to use a non-primary email address.',
      'enterCodeSentInEmail' => 'Enter the code sent to your email address.',
      'enterCodeSentBySms' => 'Enter the code sent by SMS to your phone number.',
      'enterTotpCode' => 'Enter a code from your authenticator app.',
      'verifyTotpCode' => 'Scan the QR-code with your mobile authenticator app. If you have a trouble with scanning, you can enter the secret manually. After that you will see a 6-digit code in your application. Enter this code in the field below.',
      'generateAndSendNewPassword' => 'A new password will be generated and sent to the user\'s email address.',
      'security2FaResetConfirmation' => 'Are you sure you want to reset the current 2FA settings?',
      'auth2FARequiredHeader' => '2 factor authentication required',
      'auth2FARequired' => 'You need to set up 2 factor authentication. Use an authenticator application on your mobile phone (e.g. Google Authenticator).',
      'ldapUserInEspoNotFound' => 'User is not found in EspoCRM. Contact your administrator to create the user.',
      'passwordChangeRequestNotFound' => 'The password change request is not found. It might be expired. Try to initiate a new password recovery from the [login page]({url}).'
    ],
    'options' => [
      'gender' => [
        '' => 'Not Set',
        'Male' => 'Male',
        'Female' => 'Female',
        'Neutral' => 'Neutral'
      ],
      'type' => [
        'regular' => 'Regular',
        'admin' => 'Admin',
        'portal' => 'Portal',
        'system' => 'System',
        'super-admin' => 'Super-Admin',
        'api' => 'API'
      ],
      'authMethod' => [
        'ApiKey' => 'API Key',
        'Hmac' => 'HMAC'
      ],
      'pozice' => [
        'CSO' => 'CSO',
        'Project Manager' => 'Project Manager',
        'Marketing Manager' => 'Marketing Manager',
        'Key Account Manager' => 'Key Account Manager',
        'International Account Manager' => 'International Account Manager',
        'Business Developer' => 'Business Developer',
        'Sales Support' => 'Sales Support',
        '-' => '-',
        'CFO' => 'CFO',
        'CEO' => 'CEO',
        'CTO' => 'CTO',
        'Installation Technician' => 'Installation Technician',
        'SW Engineer' => 'SW Engineer',
        'FW Engineer' => 'FW Engineer',
        'SW Developer' => 'SW Developer',
        'Office Manager' => 'Office Manager',
        'FW HW Developer' => 'FW HW Developer',
        'FW Engineer Manager' => 'FW Engineer Manager',
        'Business Director' => 'Business Director'
      ]
    ],
    'boolFilters' => [
      'onlyMyTeam' => 'Only My Team'
    ],
    'presetFilters' => [
      'active' => 'Active',
      'activePortal' => 'Portal Active',
      'activeApi' => 'API Active'
    ]
  ],
  'Webhook' => [
    'labels' => [
      'Create Webhook' => 'Create Webhook'
    ],
    'fields' => [
      'event' => 'Event',
      'url' => 'URL',
      'isActive' => 'Is Active',
      'user' => 'API User',
      'entityType' => 'Entity Type',
      'field' => 'Field',
      'secretKey' => 'Secret Key'
    ],
    'links' => [
      'user' => 'User'
    ]
  ],
  'WorkingTimeCalendar' => [
    'labels' => [
      'Create WorkingTimeCalendar' => 'Create Calendar',
      'Ranges' => 'Ranges'
    ],
    'fields' => [
      'timeZone' => 'Time Zone',
      'timeRanges' => 'Workday Schedule',
      'weekday0' => 'Sun',
      'weekday1' => 'Mon',
      'weekday2' => 'Tue',
      'weekday3' => 'Wed',
      'weekday4' => 'Thu',
      'weekday5' => 'Fri',
      'weekday6' => 'Sat',
      'weekday0TimeRanges' => 'Sun Schedule',
      'weekday1TimeRanges' => 'Mon Schedule',
      'weekday2TimeRanges' => 'Tue Schedule',
      'weekday3TimeRanges' => 'Wed Schedule',
      'weekday4TimeRanges' => 'Thu Schedule',
      'weekday5TimeRanges' => 'Fri Schedule',
      'weekday6TimeRanges' => 'Sat Schedule'
    ],
    'links' => [
      'ranges' => 'Ranges'
    ]
  ],
  'WorkingTimeRange' => [
    'labels' => [
      'Create WorkingTimeRange' => 'Create Range',
      'Calendars' => 'Calendars'
    ],
    'fields' => [
      'timeRanges' => 'Schedule',
      'dateStart' => 'Date Start',
      'dateEnd' => 'Date End',
      'type' => 'Type',
      'calendars' => 'Calendars',
      'users' => 'Users'
    ],
    'links' => [
      'calendars' => 'Calendars',
      'users' => 'Users'
    ],
    'options' => [
      'type' => [
        'Non-working' => 'Non-working',
        'Working' => 'Working'
      ]
    ],
    'presetFilters' => [
      'actual' => 'Actual'
    ]
  ],
  'Account' => [
    'fields' => [
      'name' => 'Name',
      'emailAddress' => 'Email',
      'website' => 'Website',
      'phoneNumber' => 'Phone',
      'billingAddress' => 'Billing Address',
      'shippingAddress' => 'Shipping Address',
      'description' => 'Description',
      'sicCode' => 'SIC Code',
      'industry' => 'Industry',
      'type' => 'Type',
      'contactRole' => 'Title',
      'contactIsInactive' => 'Inactive',
      'campaign' => 'Campaign',
      'targetLists' => 'Target Lists',
      'targetList' => 'Target List',
      'originalLead' => 'Original Lead',
      'vatId' => 'VAT ID',
      'slovakVatId' => 'Slovak VAT ID',
      'defaultInvoiceDueDate' => 'Default invoice due date (in days)',
      'processed' => 'Pohoda Import',
      'accountParent' => 'Account Parent',
      'accounts' => 'Accounts',
      'businessProject' => 'Zakázka',
      'businessProjects' => 'Zakázky',
      'businessProjects1' => 'Business Projects1',
      'camerasystem' => 'Camera system',
      'category' => 'Kategorie',
      'defaultPriceList' => 'Price List',
      'dic' => 'DIČ',
      'document' => 'Document',
      'documents1' => 'Documents1',
      'enduser' => 'End-user',
      'firstname' => 'Jméno',
      'idph' => 'IČ DPH',
      'iscustomer' => 'Odběratel',
      'issupplier' => 'Dodavatel',
      'kontakt' => 'Contacts',
      'language' => 'Jazyk',
      'lastname' => 'Příjmení',
      'logTimes' => 'Hodiny',
      'opportunities1' => 'Poptávka',
      'orderItems' => 'Order Items',
      'orders' => 'Orders',
      'partner' => 'Partner',
      'priceType' => 'Cena',
      'qualityReports' => '8D Report',
      'rtls' => 'RTLS',
      'shield' => 'Shield',
      'spolecnosti' => 'Společnosti',
      'vizualization' => 'Vizualization',
      'web' => 'Weby',
      'webs' => 'Webs',
      'productDatabases' => 'Databáze produktů',
      'complaintBook' => 'Complaint Book',
      'warehouses' => 'Warehouses'
    ],
    'links' => [
      'contacts' => 'Contacts',
      'contactsPrimary' => 'Contacts (primary)',
      'opportunities' => 'Opportunities',
      'cases' => 'Cases',
      'documents' => 'Documents',
      'meetingsPrimary' => 'Meetings (expanded)',
      'callsPrimary' => 'Calls (expanded)',
      'tasksPrimary' => 'Tasks (expanded)',
      'emailsPrimary' => 'Emails (expanded)',
      'targetLists' => 'Target Lists',
      'campaignLogRecords' => 'Campaign Log',
      'campaign' => 'Campaign',
      'portalUsers' => 'Portal Users',
      'originalLead' => 'Original Lead',
      'accountParent' => 'Account Parent',
      'accounts' => 'Accounts',
      'businessProject' => 'Zakázka',
      'businessProjects' => 'Zakázky',
      'businessProjects1' => 'Business Projects1',
      'businessProjectsOgranization' => 'Zakázky',
      'document' => 'Document',
      'documents1' => 'Documents1',
      'kontakt' => 'Contacts',
      'logTimes' => 'Hodiny',
      'opportunities1' => 'Poptávka',
      'orderItems' => 'Order Items',
      'orders' => 'Objednávky',
      'productsSupplier' => 'Produkty',
      'qualityReports' => '8D Report',
      'supplier' => 'Komponenty',
      'web' => 'Weby',
      'webs' => 'Webs',
      'productDatabases' => 'Databáze produktů',
      'complaintBook' => 'Complaint Book',
      'warehouses' => 'Warehouses'
    ],
    'options' => [
      'type' => [
        'Customer' => 'Customer',
        'Investor' => 'Investor',
        'Partner' => 'Partner',
        'Reseller' => 'Reseller'
      ],
      'industry' => [
        'Aerospace' => 'Aerospace',
        'Agriculture' => 'Agriculture',
        'Advertising' => 'Advertising',
        'Apparel & Accessories' => 'Apparel & Accessories',
        'Architecture' => 'Architecture',
        'Automotive' => 'Automotive',
        'Banking' => 'Banking',
        'Biotechnology' => 'Biotechnology',
        'Building Materials & Equipment' => 'Building Materials & Equipment',
        'Chemical' => 'Chemical',
        'Construction' => 'Construction',
        'Computer' => 'Computer',
        'Defense' => 'Defense',
        'Creative' => 'Creative',
        'Culture' => 'Culture',
        'Consulting' => 'Consulting',
        'Education' => 'Education',
        'Electronics' => 'Electronics',
        'Electric Power' => 'Electric Power',
        'Energy' => 'Energy',
        'Entertainment & Leisure' => 'Entertainment & Leisure',
        'Finance' => 'Finance',
        'Food & Beverage' => 'Food & Beverage',
        'Grocery' => 'Grocery',
        'Hospitality' => 'Hospitality',
        'Healthcare' => 'Healthcare',
        'Insurance' => 'Insurance',
        'Legal' => 'Legal',
        'Manufacturing' => 'Manufacturing',
        'Mass Media' => 'Mass Media',
        'Mining' => 'Mining',
        'Music' => 'Music',
        'Marketing' => 'Marketing',
        'Publishing' => 'Publishing',
        'Petroleum' => 'Petroleum',
        'Real Estate' => 'Real Estate',
        'Retail' => 'Retail',
        'Shipping' => 'Shipping',
        'Service' => 'Service',
        'Support' => 'Support',
        'Sports' => 'Sports',
        'Software' => 'Software',
        'Technology' => 'Technology',
        'Telecommunications' => 'Telecommunications',
        'Television' => 'Television',
        'Testing, Inspection & Certification' => 'Testing, Inspection & Certification',
        'Transportation' => 'Transportation',
        'Travel' => 'Travel',
        'Venture Capital' => 'Venture Capital',
        'Wholesale' => 'Wholesale',
        'Water' => 'Water'
      ],
      'category' => [
        '-' => '-',
        'A' => 'A',
        'B' => 'B',
        'C' => 'C'
      ],
      'defaultPriceList' => [
        '-' => '-',
        'A' => 'Group A',
        'B' => 'Group B',
        'C' => 'Group C',
        'E' => 'End User',
        'Group A' => 'Group A',
        'Group B' => 'Group B',
        'Group C' => 'Group C'
      ],
      'language' => [
        'CZ' => 'CZ',
        'EN' => 'EN'
      ],
      'priceType' => [
        '' => 'Žádná',
        'A' => 'A',
        'B' => 'B',
        'C' => 'C',
        'Jeseno' => 'Jeseno'
      ],
      'spolecnosti' => [
        'Aledo s.r.o.' => 'Aledo s.r.o.',
        'Aledo SK s.r.o.' => 'Aledo SK s.r.o.',
        'Alis Tech s.r.o.,' => 'Alis Tech s.r.o.,'
      ]
    ],
    'labels' => [
      'Create Account' => 'Create Account',
      'Copy Billing' => 'Copy Billing',
      'Set Primary' => 'Set Primary',
      'Fill Data' => 'Fill Data',
      'Verify VAT Number' => 'Verify VAT Number'
    ],
    'presetFilters' => [
      'customers' => 'Customers',
      'partners' => 'Partners',
      'recentlyCreated' => 'Recently Created'
    ],
    'messages' => [
      'missingSicCode' => 'Please enter your SIC code',
      'invalidAresResponse' => 'Invalid ARES response',
      'invalidFinstatResponse' => 'Invalid Finstat response',
      'couldNotFindCompanyBySicCode' => 'Could not find company with SIC code "{sicCode}"',
      'couldNotFindCompanyByName' => 'Could not find company with name "{name}"',
      'errorWhileFetchingFinstat' => 'Error while fetching Finstat',
      'invalidSicCode' => 'Invalid SIC code',
      'vatNumberIsValid' => 'VAT number is valid',
      'vatNumberIsInvalid' => 'VAT number is invalid',
      'vatVerificationFailed' => 'VAT verification failed',
      'vatIdInvalidformat' => 'VAT ID is not in the correct format',
      'accountNotFound' => 'Account not found'
    ],
    'fillProviders' => [
      'Ares' => 'Fill from ARES',
      'Finstat' => 'Fill from FinStat'
    ],
    'tooltips' => [
      'slovakVatId' => '"IČ DPH" is an identification number for VAT purposes in Slovakia. It is a 10-digit number starting with SK.',
      'dic' => 'Daňové identifikační číslo'
    ]
  ],
  'Calendar' => [
    'modes' => [
      'month' => 'Month',
      'week' => 'Week',
      'day' => 'Day',
      'agendaWeek' => 'Week',
      'agendaDay' => 'Day',
      'timeline' => 'Timeline'
    ],
    'labels' => [
      'Today' => 'Today',
      'Create' => 'Create',
      'Shared' => 'Shared',
      'Add User' => 'Add User',
      'current' => 'current',
      'time' => 'time',
      'User List' => 'User List',
      'Manage Users' => 'Manage Users',
      'View Calendar' => 'View Calendar',
      'Create Shared View' => 'Create Shared View'
    ]
  ],
  'Call' => [
    'fields' => [
      'name' => 'Name',
      'parent' => 'Parent',
      'status' => 'Status',
      'dateStart' => 'Date Start',
      'dateEnd' => 'Date End',
      'direction' => 'Direction',
      'duration' => 'Duration',
      'description' => 'Description',
      'users' => 'Users',
      'contacts' => 'Contacts',
      'leads' => 'Leads',
      'reminders' => 'Reminders',
      'account' => 'Account',
      'acceptanceStatus' => 'Acceptance Status',
      'googleCalendarEventId' => 'Google Calendar Event ID',
      'googleCalendar' => 'Google Calendar',
      'recordedcall' => 'Recorded call',
      'speechtotext' => 'Speechtotext',
      'sendmrkemail' => 'Send marketing email info',
      'calltranscribe' => 'Přepis hovoru',
      'isEditing' => 'IsEditing'
    ],
    'links' => [
      'googleCalendar' => 'Google Calendar'
    ],
    'options' => [
      'status' => [
        'Planned' => 'Planned',
        'Held' => 'Held',
        'Not Held' => 'Not Held'
      ],
      'direction' => [
        'Outbound' => 'Outbound',
        'Inbound' => 'Inbound'
      ],
      'acceptanceStatus' => [
        'None' => 'None',
        'Accepted' => 'Accepted',
        'Declined' => 'Declined',
        'Tentative' => 'Tentative'
      ]
    ],
    'massActions' => [
      'setHeld' => 'Set Held',
      'setNotHeld' => 'Set Not Held'
    ],
    'labels' => [
      'Create Call' => 'Create Call',
      'Set Held' => 'Set Held',
      'Set Not Held' => 'Set Not Held',
      'Send Invitations' => 'Send Invitations'
    ],
    'presetFilters' => [
      'planned' => 'Planned',
      'held' => 'Held',
      'todays' => 'Today\'s'
    ]
  ],
  'Campaign' => [
    'fields' => [
      'name' => 'Name',
      'description' => 'Description',
      'status' => 'Status',
      'type' => 'Type',
      'startDate' => 'Start Date',
      'endDate' => 'End Date',
      'targetLists' => 'Target Lists',
      'excludingTargetLists' => 'Excluding Target Lists',
      'sentCount' => 'Sent',
      'openedCount' => 'Opened',
      'clickedCount' => 'Clicked',
      'optedOutCount' => 'Opted Out',
      'bouncedCount' => 'Bounced',
      'optedInCount' => 'Opted In',
      'hardBouncedCount' => 'Hard Bounced',
      'softBouncedCount' => 'Soft Bounced',
      'leadCreatedCount' => 'Leads Created',
      'revenue' => 'Revenue',
      'revenueConverted' => 'Revenue (converted)',
      'budget' => 'Budget',
      'budgetConverted' => 'Budget (converted)',
      'budgetCurrency' => 'Budget Currency',
      'contactsTemplate' => 'Contacts Template',
      'leadsTemplate' => 'Leads Template',
      'accountsTemplate' => 'Accounts Template',
      'usersTemplate' => 'Users Template',
      'mailMergeOnlyWithAddress' => 'Skip records w/o filled address'
    ],
    'links' => [
      'targetLists' => 'Target Lists',
      'excludingTargetLists' => 'Excluding Target Lists',
      'accounts' => 'Accounts',
      'contacts' => 'Contacts',
      'leads' => 'Leads',
      'opportunities' => 'Opportunities',
      'campaignLogRecords' => 'Log',
      'massEmails' => 'Mass Emails',
      'trackingUrls' => 'Tracking URLs',
      'contactsTemplate' => 'Contacts Template',
      'leadsTemplate' => 'Leads Template',
      'accountsTemplate' => 'Accounts Template',
      'usersTemplate' => 'Users Template'
    ],
    'options' => [
      'type' => [
        'Email' => 'Email',
        'Web' => 'Web',
        'Television' => 'Television',
        'Radio' => 'Radio',
        'Newsletter' => 'Newsletter',
        'Mail' => 'Mail'
      ],
      'status' => [
        'Planning' => 'Planning',
        'Active' => 'Active',
        'Inactive' => 'Inactive',
        'Complete' => 'Complete'
      ]
    ],
    'labels' => [
      'Create Campaign' => 'Create Campaign',
      'Target Lists' => 'Target Lists',
      'Statistics' => 'Statistics',
      'hard' => 'hard',
      'soft' => 'soft',
      'Unsubscribe' => 'Unsubscribe',
      'Mass Emails' => 'Mass Emails',
      'Email Templates' => 'Email Templates',
      'Unsubscribe again' => 'Unsubscribe again',
      'Subscribe again' => 'Subscribe again',
      'Create Target List' => 'Create Target List',
      'Mail Merge' => 'Mail Merge',
      'Generate Mail Merge PDF' => 'Generate Mail Merge PDF'
    ],
    'presetFilters' => [
      'active' => 'Active'
    ],
    'messages' => [
      'unsubscribed' => 'You have been unsubscribed from our mailing list.',
      'subscribedAgain' => 'You are subscribed again.'
    ],
    'tooltips' => [
      'targetLists' => 'Targets that should receive messages.',
      'excludingTargetLists' => 'Targets that should not receive messages.'
    ]
  ],
  'CampaignLogRecord' => [
    'fields' => [
      'action' => 'Action',
      'actionDate' => 'Date',
      'data' => 'Data',
      'campaign' => 'Campaign',
      'parent' => 'Target',
      'object' => 'Object',
      'application' => 'Application',
      'queueItem' => 'Queue Item',
      'stringData' => 'String Data',
      'stringAdditionalData' => 'String Additional Data',
      'isTest' => 'Is Test'
    ],
    'links' => [
      'queueItem' => 'Queue Item',
      'parent' => 'Parent',
      'object' => 'Object',
      'campaign' => 'Campaign'
    ],
    'options' => [
      'action' => [
        'Sent' => 'Sent',
        'Opened' => 'Opened',
        'Opted Out' => 'Opted Out',
        'Bounced' => 'Bounced',
        'Clicked' => 'Clicked',
        'Lead Created' => 'Lead Created',
        'Opted In' => 'Opted In'
      ]
    ],
    'labels' => [
      'All' => 'All'
    ],
    'presetFilters' => [
      'sent' => 'Sent',
      'opened' => 'Opened',
      'optedOut' => 'Opted Out',
      'optedIn' => 'Opted In',
      'bounced' => 'Bounced',
      'clicked' => 'Clicked',
      'leadCreated' => 'Lead Created'
    ]
  ],
  'CampaignTrackingUrl' => [
    'fields' => [
      'url' => 'URL',
      'action' => 'Action',
      'urlToUse' => 'Code to insert instead of URL',
      'message' => 'Message',
      'campaign' => 'Campaign'
    ],
    'links' => [
      'campaign' => 'Campaign'
    ],
    'labels' => [
      'Create CampaignTrackingUrl' => 'Create Tracking URL'
    ],
    'options' => [
      'action' => [
        'Redirect' => 'Redirect',
        'Show Message' => 'Show Message'
      ]
    ],
    'tooltips' => [
      'url' => 'The recipient will be redirected to this location after they follow the link.',
      'message' => 'The message will be shown to the recipient after they follow the link. Markdown is supported.'
    ]
  ],
  'Case' => [
    'fields' => [
      'name' => 'Name',
      'number' => 'Number',
      'status' => 'Status',
      'account' => 'Account',
      'contact' => 'Contact',
      'contacts' => 'Contacts',
      'priority' => 'Priority',
      'type' => 'Type',
      'description' => 'Description',
      'inboundEmail' => 'Group Email Account',
      'lead' => 'Lead',
      'attachments' => 'Attachments'
    ],
    'links' => [
      'inboundEmail' => 'Group Email Account',
      'account' => 'Account',
      'contact' => 'Contact (Primary)',
      'Contacts' => 'Contacts',
      'meetings' => 'Meetings',
      'calls' => 'Calls',
      'tasks' => 'Tasks',
      'emails' => 'Emails',
      'articles' => 'Knowledge Base Articles',
      'lead' => 'Lead',
      'attachments' => 'Attachments'
    ],
    'options' => [
      'status' => [
        'New' => 'New',
        'Assigned' => 'Assigned',
        'Pending' => 'Pending',
        'Closed' => 'Closed',
        'Rejected' => 'Rejected',
        'Duplicate' => 'Duplicate'
      ],
      'priority' => [
        'Low' => 'Low',
        'Normal' => 'Normal',
        'High' => 'High',
        'Urgent' => 'Urgent'
      ],
      'type' => [
        'Question' => 'Question',
        'Incident' => 'Incident',
        'Problem' => 'Problem'
      ]
    ],
    'labels' => [
      'Create Case' => 'Create Case',
      'Close' => 'Close',
      'Reject' => 'Reject',
      'Closed' => 'Closed',
      'Rejected' => 'Rejected'
    ],
    'presetFilters' => [
      'open' => 'Open',
      'closed' => 'Closed'
    ]
  ],
  'Contact' => [
    'fields' => [
      'name' => 'Name',
      'emailAddress' => 'Email',
      'title' => 'Account Title',
      'account' => 'Account',
      'accounts' => 'Accounts',
      'phoneNumber' => 'Phone',
      'accountType' => 'Account Type',
      'doNotCall' => 'Do Not Call',
      'address' => 'Address',
      'opportunityRole' => 'Opportunity Role',
      'accountRole' => 'Title',
      'description' => 'Description',
      'campaign' => 'Campaign',
      'targetLists' => 'Target Lists',
      'targetList' => 'Target List',
      'portalUser' => 'Portal User',
      'hasPortalUser' => 'Has Portal User',
      'originalLead' => 'Original Lead',
      'acceptanceStatus' => 'Acceptance Status',
      'accountIsInactive' => 'Account Inactive',
      'acceptanceStatusMeetings' => 'Acceptance Status (Meetings)',
      'acceptanceStatusCalls' => 'Acceptance Status (Calls)',
      'vatId' => 'VAT number',
      'sicCode' => 'Company registration number',
      'crmcontact' => 'Kontakt k CRM',
      'screenshot' => 'Webový Screenshot',
      'imporFromDB' => 'Nalitý nový kontakt',
      'callAgain' => 'Zavolat znovu',
      'possibleSales' => 'Možný obchod',
      'companyName' => 'CompanyName',
      'www' => 'Www',
      'partner' => 'Partner',
      'contractors' => 'Dodavatelé',
      'businessProjects' => 'Zakázky',
      'installations' => 'Instalace',
      'sendMassEmails' => 'Zasílat hormadné e-maily?',
      'firma' => 'Account',
      'endUser' => 'End-User',
      'category' => 'Kategorie',
      'complaintBook' => 'Complaint Book',
      'padName' => 'PadName'
    ],
    'links' => [
      'opportunities' => 'Opportunities',
      'cases' => 'Cases',
      'targetLists' => 'Target Lists',
      'campaignLogRecords' => 'Campaign Log',
      'campaign' => 'Campaign',
      'account' => 'Account (Primary)',
      'accounts' => 'Accounts',
      'casesPrimary' => 'Cases (Primary)',
      'tasksPrimary' => 'Tasks (expanded)',
      'opportunitiesPrimary' => 'Opportunities (Primary)',
      'portalUser' => 'Portal User',
      'originalLead' => 'Original Lead',
      'documents' => 'Documents',
      'orders' => 'Objednávky',
      'contractors' => 'Dodavatelé',
      'businessProjects' => 'Zakázky',
      'installations' => 'Instalace',
      'firma' => 'Account',
      'complaintBook' => 'Complaint Book'
    ],
    'labels' => [
      'Create Contact' => 'Create Contact'
    ],
    'options' => [
      'opportunityRole' => [
        '' => '',
        'Decision Maker' => 'Decision Maker',
        'Evaluator' => 'Evaluator',
        'Influencer' => 'Influencer'
      ],
      'category' => [
        '-' => '-',
        'A' => 'A',
        'B' => 'B',
        'C' => 'C'
      ]
    ],
    'presetFilters' => [
      'portalUsers' => 'Portal Users',
      'notPortalUsers' => 'Not Portal Users',
      'accountActive' => 'Active'
    ],
    'massActions' => [
      'pushToGoogle' => 'Push to Google'
    ],
    'actions' => [
      'pushToGoogle' => 'Push to Google'
    ],
    'messages' => [
      'confirmationGoogleContactsPush' => 'Do you want to push selected contacts to Google Contacts?',
      'successGoogleContactsPush' => '{count} record(s) successfully pushed. The rest is about to be pushed in idle mode.'
    ]
  ],
  'Document' => [
    'labels' => [
      'Create Document' => 'Create Document',
      'Details' => 'Details'
    ],
    'fields' => [
      'name' => 'Name',
      'status' => 'Status',
      'file' => 'File',
      'type' => 'Type',
      'publishDate' => 'Publish Date',
      'expirationDate' => 'Expiration Date',
      'description' => 'Description',
      'accounts' => 'Accounts',
      'folder' => 'Folder',
      'product' => 'Product',
      'obrazekDokumentu' => 'Obrázek',
      'quote' => 'Nabídka',
      'accounts1' => 'Accounts1',
      'account' => 'Account',
      'businessProjects' => 'Zakázky',
      'businessProject' => 'Business Project',
      'components' => 'Components',
      'salesOrder' => 'Zakázka',
      'files' => 'Přílohy'
    ],
    'links' => [
      'accounts' => 'Accounts',
      'opportunities' => 'Opportunities',
      'folder' => 'Folder',
      'leads' => 'Leads',
      'contacts' => 'Contacts',
      'product' => 'Product',
      'quote' => 'Nabídka',
      'accounts1' => 'Accounts1',
      'account' => 'Account',
      'businessProjects' => 'Zakázky',
      'businessProject' => 'Business Project',
      'components' => 'Components',
      'salesOrder' => 'Zakázka'
    ],
    'options' => [
      'status' => [
        'Active' => 'Active',
        'Draft' => 'Draft',
        'Expired' => 'Expired',
        'Canceled' => 'Canceled'
      ],
      'type' => [
        '' => 'None',
        'Contract' => 'Contract',
        'NDA' => 'NDA',
        'EULA' => 'EULA',
        'License Agreement' => 'License Agreement'
      ]
    ],
    'presetFilters' => [
      'active' => 'Active',
      'draft' => 'Draft'
    ]
  ],
  'DocumentFolder' => [
    'labels' => [
      'Create DocumentFolder' => 'Create Document Folder',
      'Manage Categories' => 'Manage Folders',
      'Documents' => 'Documents'
    ],
    'links' => [
      'documents' => 'Documents',
      'businessProject' => 'Zakázka'
    ],
    'fields' => [
      'businessProject' => 'Zakázka'
    ]
  ],
  'EmailQueueItem' => [
    'fields' => [
      'name' => 'Name',
      'status' => 'Status',
      'target' => 'Target',
      'sentAt' => 'Date Sent',
      'attemptCount' => 'Attempts',
      'emailAddress' => 'Email Address',
      'massEmail' => 'Mass Email',
      'isTest' => 'Is Test'
    ],
    'links' => [
      'target' => 'Target',
      'massEmail' => 'Mass Email'
    ],
    'options' => [
      'status' => [
        'Pending' => 'Pending',
        'Sent' => 'Sent',
        'Failed' => 'Failed',
        'Sending' => 'Sending'
      ]
    ],
    'presetFilters' => [
      'pending' => 'Pending',
      'sent' => 'Sent',
      'failed' => 'Failed'
    ]
  ],
  'KnowledgeBaseArticle' => [
    'labels' => [
      'Create KnowledgeBaseArticle' => 'Create Article',
      'Any' => 'Any',
      'Send in Email' => 'Send in Email',
      'Move Up' => 'Move Up',
      'Move Down' => 'Move Down',
      'Move to Top' => 'Move to Top',
      'Move to Bottom' => 'Move to Bottom'
    ],
    'fields' => [
      'name' => 'Name',
      'status' => 'Status',
      'type' => 'Type',
      'attachments' => 'Attachments',
      'publishDate' => 'Publish Date',
      'expirationDate' => 'Expiration Date',
      'description' => 'Description',
      'body' => 'Body',
      'categories' => 'Categories',
      'language' => 'Language',
      'portals' => 'Portals'
    ],
    'links' => [
      'cases' => 'Cases',
      'opportunities' => 'Opportunities',
      'categories' => 'Categories',
      'portals' => 'Portals'
    ],
    'options' => [
      'status' => [
        'In Review' => 'In Review',
        'Draft' => 'Draft',
        'Archived' => 'Archived',
        'Published' => 'Published'
      ],
      'type' => [
        'Article' => 'Article'
      ]
    ],
    'tooltips' => [
      'portals' => 'Article will be available only in specified portals.'
    ],
    'presetFilters' => [
      'published' => 'Published'
    ]
  ],
  'KnowledgeBaseCategory' => [
    'labels' => [
      'Create KnowledgeBaseCategory' => 'Create Category',
      'Manage Categories' => 'Manage Categories',
      'Articles' => 'Articles'
    ],
    'links' => [
      'articles' => 'Articles'
    ]
  ],
  'Lead' => [
    'labels' => [
      'Converted To' => 'Converted To',
      'Create Lead' => 'Create Lead',
      'Convert' => 'Convert',
      'convert' => 'convert'
    ],
    'fields' => [
      'name' => 'Name',
      'emailAddress' => 'Email',
      'title' => 'Title',
      'website' => 'Website',
      'phoneNumber' => 'Phone',
      'accountName' => 'Account Name',
      'doNotCall' => 'Do Not Call',
      'address' => 'Address',
      'status' => 'Status',
      'source' => 'Source',
      'opportunityAmount' => 'Opportunity Amount',
      'opportunityAmountConverted' => 'Opportunity Amount (converted)',
      'description' => 'Description',
      'createdAccount' => 'Account',
      'createdContact' => 'Contact',
      'createdOpportunity' => 'Opportunity',
      'convertedAt' => 'Converted At',
      'campaign' => 'Campaign',
      'targetLists' => 'Target Lists',
      'targetList' => 'Target List',
      'industry' => 'Industry',
      'acceptanceStatus' => 'Acceptance Status',
      'opportunityAmountCurrency' => 'Opportunity Amount Currency',
      'acceptanceStatusMeetings' => 'Acceptance Status (Meetings)',
      'acceptanceStatusCalls' => 'Acceptance Status (Calls)',
      'sicCode' => 'SIC Code',
      'vatId' => 'VAT ID',
      'year2015' => 'Obrat 2015',
      'year2016' => 'Obrat 2016',
      'year2017' => 'Obrat 2017',
      'year2018' => 'Obrat 2018',
      'year2019' => 'Obrat 2019',
      'importdate' => 'Datum nalití',
      'employees' => 'Počet zameěstnanců 2019',
      'convertedTo' => 'Konvertován na',
      'nextContact' => 'Kontaktovat nejpozději',
      'details' => 'Poznámky',
      'lastContact' => 'Poslední kontakt',
      'headoffice' => 'Head office',
      'type' => 'Typ',
      'alisVisualization' => 'ALIS Visualization',
      'alisAnticollision' => 'ALIS Anti-collision',
      'alisVisualizationDetails' => 'ALIS Visualization poznámky',
      'alisAnticollisionDetails' => 'ALIS Anti-collision poznámky',
      'alisAntiCollisionSafetyBar' => 'ALIS Anti-Collision Safety Bar',
      'alisAntiCollisionSafetyBarDetails' => 'ALIS Anti-collision safety bar poznámky',
      'firstContact' => 'Slyšel už o nás?',
      'leadType' => 'Typ leadu',
      'relatedLead' => 'Související lead',
      'originalLead' => 'Originální lead',
      'leadsRight' => 'Leads Right',
      'leadsLeft' => 'Leads Left',
      'statusPartner' => 'Status (partner)',
      'numberA' => 'Číslo leadu',
      'jesenoLead' => 'JesenoLead',
      'noEmail' => 'NoEmail',
      'statusPriority' => 'StatusPriority',
      'lastContacted' => 'LastContacted',
      'prospect' => 'Prospect'
    ],
    'links' => [
      'targetLists' => 'Target Lists',
      'campaignLogRecords' => 'Campaign Log',
      'campaign' => 'Campaign',
      'createdAccount' => 'Account',
      'createdContact' => 'Contact',
      'createdOpportunity' => 'Opportunity',
      'cases' => 'Cases',
      'documents' => 'Documents',
      'tasksToLeads' => 'Úkoly',
      'relatedLead' => 'Související lead',
      'originalLead' => 'Originální lead',
      'leadsRight' => 'Leads Right',
      'leadsLeft' => 'Leads Left',
      'prospect' => 'Prospect'
    ],
    'options' => [
      'status' => [
        'New' => 'New',
        'Assigned' => 'Assigned',
        'In Process' => 'In Process',
        'Converted' => 'Converted',
        'Recycled' => 'Recycled',
        'Dead' => 'Dead'
      ],
      'source' => [
        'Call' => 'Call',
        'Email' => 'Email',
        'Existing Customer' => 'Existing Customer',
        'Partner' => 'Partner',
        'Public Relations' => 'Public Relations',
        'Web Site' => 'Web Site',
        'Campaign' => 'Campaign',
        'Other' => 'Other',
        '' => '',
        'SEO' => 'SEO',
        'PPC' => 'PPC',
        'LinkedIn' => 'LinkedIn',
        'Reference' => 'Reference',
        'Veletrh' => 'Veletrh',
        'Reklama' => 'Reklama',
        'Veletrh 2021' => 'Veletrh 2021',
        'Prospect search' => 'Prospect search'
      ],
      'convertedTo' => [
        '-' => '-',
        'Partner' => 'Partner',
        'Zákazník' => 'Zákazník'
      ],
      'type' => [
        '-' => '-',
        'End-User' => 'End-User',
        'Partner' => 'Partner',
        'Co-Partner' => 'Co-Partner'
      ],
      'leadType' => [
        '' => '-',
        'end-userNoPartner' => 'End-User no partner',
        'end-userYesPartner' => 'End-User yes partner',
        'partnersNewCountry' => 'Partners (sales) - New country',
        'partnersExistingPartner' => 'Partners (sales) - Existing partner',
        'OEMpartner' => 'OEM partner',
        'co-partnerNewCountry' => 'Co-Partner - New country',
        'co-partnerExistingCountry' => 'Co-Partner - Existing country'
      ],
      'statusPartner' => [
        '-' => '-',
        'New' => 'P - Not contacted',
        'Assigned' => 'P - 0 email',
        'In process' => 'P - Communication',
        'Waiting' => 'P - Not answering',
        'PQ' => 'P - Quoted',
        'Converted' => 'P - Win',
        'Lost' => 'P - Lost'
      ],
      'statusPriority' => [
        'Priority 1' => '1',
        'Priority 2' => '2',
        'Priority 3' => '3'
      ]
    ],
    'presetFilters' => [
      'active' => 'Active',
      'actual' => 'Actual',
      'converted' => 'Converted'
    ],
    'massActions' => [
      'pushToGoogle' => 'Push to Google'
    ],
    'actions' => [
      'pushToGoogle' => 'Push to Google'
    ],
    'messages' => [
      'confirmationGoogleContactsPush' => 'Do you want to push selected leads to Google Contacts?',
      'successGoogleContactsPush' => '{count} record(s) successfully pushed. The rest is about to be pushed in idle mode.'
    ]
  ],
  'MassEmail' => [
    'fields' => [
      'name' => 'Name',
      'status' => 'Status',
      'storeSentEmails' => 'Store Sent Emails',
      'startAt' => 'Date Start',
      'fromAddress' => 'From Address',
      'fromName' => 'From Name',
      'replyToAddress' => 'Reply-to Address',
      'replyToName' => 'Reply-to Name',
      'campaign' => 'Campaign',
      'emailTemplate' => 'Email Template',
      'inboundEmail' => 'Email Account',
      'targetLists' => 'Target Lists',
      'excludingTargetLists' => 'Excluding Target Lists',
      'optOutEntirely' => 'Opt-Out Entirely',
      'smtpAccount' => 'SMTP Account',
      'user' => 'User'
    ],
    'links' => [
      'targetLists' => 'Target Lists',
      'excludingTargetLists' => 'Excluding Target Lists',
      'queueItems' => 'Queue Items',
      'campaign' => 'Campaign',
      'emailTemplate' => 'Email Template',
      'inboundEmail' => 'Email Account',
      'user' => 'User'
    ],
    'options' => [
      'status' => [
        'Draft' => 'Draft',
        'Pending' => 'Pending',
        'In Process' => 'In Process',
        'Complete' => 'Complete',
        'Canceled' => 'Canceled',
        'Failed' => 'Failed'
      ]
    ],
    'labels' => [
      'Create MassEmail' => 'Create Mass Email',
      'Send Test' => 'Send Test',
      'System SMTP' => 'System SMTP',
      'system' => 'system',
      'group' => 'group'
    ],
    'messages' => [
      'selectAtLeastOneTarget' => 'Select at least one target.',
      'testSent' => 'Test email(s) supposed to be sent'
    ],
    'tooltips' => [
      'optOutEntirely' => 'Email addresses of recipients that unsubscribed will be marked as opted out and they will not receive any mass emails anymore.',
      'targetLists' => 'Targets that should receive messages.',
      'excludingTargetLists' => 'Targets that should not receive messages.',
      'storeSentEmails' => 'Emails will be stored in CRM.'
    ],
    'presetFilters' => [
      'actual' => 'Actual',
      'complete' => 'Complete'
    ]
  ],
  'Meeting' => [
    'fields' => [
      'name' => 'Name',
      'parent' => 'Parent',
      'status' => 'Status',
      'dateStart' => 'Date Start',
      'dateEnd' => 'Date End',
      'duration' => 'Duration',
      'description' => 'Description',
      'users' => 'Users',
      'contacts' => 'Contacts',
      'leads' => 'Leads',
      'reminders' => 'Reminders',
      'account' => 'Account',
      'acceptanceStatus' => 'Acceptance Status',
      'dateStartDate' => 'Date Start (all day)',
      'dateEndDate' => 'Date End (all day)',
      'isAllDay' => 'Is All-Day',
      'sourceEmail' => 'Source Email',
      'googleCalendarEventId' => 'Google Calendar Event ID',
      'googleCalendar' => 'Google Calendar'
    ],
    'links' => [
      'googleCalendar' => 'Google Calendar'
    ],
    'options' => [
      'status' => [
        'Planned' => 'Planned',
        'Held' => 'Held',
        'Not Held' => 'Not Held'
      ],
      'acceptanceStatus' => [
        'None' => 'None',
        'Accepted' => 'Accepted',
        'Declined' => 'Declined',
        'Tentative' => 'Tentative'
      ]
    ],
    'massActions' => [
      'setHeld' => 'Set Held',
      'setNotHeld' => 'Set Not Held'
    ],
    'labels' => [
      'Create Meeting' => 'Create Meeting',
      'Set Held' => 'Set Held',
      'Set Not Held' => 'Set Not Held',
      'Send Invitations' => 'Send Invitations',
      'Send Cancellation' => 'Send Cancellation',
      'on time' => 'on time',
      'before' => 'before',
      'All-Day' => 'All-Day',
      'Acceptance' => 'Acceptance'
    ],
    'presetFilters' => [
      'planned' => 'Planned',
      'held' => 'Held',
      'todays' => 'Today\'s'
    ],
    'messages' => [
      'sendInvitationsToSelectedAttendees' => 'Invitation emails will be sent to the selected attendees.',
      'sendCancellationsToSelectedAttendees' => 'Cancellation emails will be sent to the selected attendees.',
      'selectAcceptanceStatus' => 'Set your acceptance status.',
      'nothingHasBeenSent' => 'Nothing were sent'
    ]
  ],
  'Opportunity' => [
    'fields' => [
      'name' => 'Name',
      'account' => 'Account',
      'stage' => 'Stage',
      'amount' => 'Amount',
      'probability' => 'Probability, %',
      'leadSource' => 'Lead Source',
      'doNotCall' => 'Do Not Call',
      'closeDate' => 'Close Date',
      'contacts' => 'Contacts',
      'contact' => 'Contact (Primary)',
      'description' => 'Description',
      'amountConverted' => 'Amount (converted)',
      'amountWeightedConverted' => 'Amount Weighted',
      'campaign' => 'Campaign',
      'originalLead' => 'Original Lead',
      'amountCurrency' => 'Amount Currency',
      'contactRole' => 'Contact Role',
      'lastStage' => 'Last Stage',
      'businessProjects' => 'Zakázka',
      'account1' => 'Firma',
      'salesPerson' => 'Jméno obchodníka',
      'enduser' => 'End-user',
      'estimation' => 'Odhad ceny',
      'estimationCurrency' => 'Odhad ceny (Měna)',
      'estimationConverted' => 'Odhad ceny (Převedeno)',
      'deadline' => 'Deadline',
      'lastContacted' => 'Poslední kontakt',
      'details' => 'Poznámky',
      'lastContact' => 'Poslední kontakt',
      'quotes' => 'Nabídky',
      'opportunities' => 'Poptávky',
      'salesOrders' => 'Zakázky',
      'numberA' => 'Číslo příležitosti'
    ],
    'links' => [
      'contacts' => 'Contacts',
      'contact' => 'Contact (Primary)',
      'documents' => 'Documents',
      'campaign' => 'Campaign',
      'originalLead' => 'Original Lead',
      'businessProjects' => 'Zakázka',
      'account1' => 'Firma',
      'quotes' => 'Nabídky',
      'opportunities' => 'Poptávky',
      'salesOrders' => 'Zakázky'
    ],
    'options' => [
      'stage' => [
        'Prospecting' => 'Prospecting',
        'Qualification' => 'Qualification',
        'Proposal' => 'Proposal',
        'Negotiation' => 'Negotiation',
        'Needs Analysis' => 'Needs Analysis',
        'Value Proposition' => 'Value Proposition',
        'Id. Decision Makers' => 'Id. Decision Makers',
        'Perception Analysis' => 'Perception Analysis',
        'Proposal/Price Quote' => 'Proposal/Price Quote',
        'Negotiation/Review' => 'Negotiation/Review',
        'Closed Won' => 'Closed Won',
        'Closed Lost' => 'Closed Lost'
      ]
    ],
    'labels' => [
      'Create Opportunity' => 'Create Opportunity'
    ],
    'presetFilters' => [
      'open' => 'Open',
      'won' => 'Won',
      'lost' => 'Lost'
    ]
  ],
  'TargetList' => [
    'fields' => [
      'name' => 'Name',
      'description' => 'Description',
      'entryCount' => 'Entry Count',
      'optedOutCount' => 'Opted Out Count',
      'campaigns' => 'Campaigns',
      'endDate' => 'End Date',
      'targetLists' => 'Target Lists',
      'includingActionList' => 'Including',
      'excludingActionList' => 'Excluding',
      'targetStatus' => 'Target Status',
      'isOptedOut' => 'Is Opted Out',
      'syncWithReports' => 'Reports',
      'syncWithReportsEnabled' => 'Enabled',
      'syncWithReportsUnlink' => 'Unlink',
      'prospects' => 'Prospects'
    ],
    'links' => [
      'accounts' => 'Accounts',
      'contacts' => 'Contacts',
      'leads' => 'Leads',
      'campaigns' => 'Campaigns',
      'massEmails' => 'Mass Emails',
      'syncWithReports' => 'Sync with Reports',
      'prospects' => 'Prospects'
    ],
    'options' => [
      'type' => [
        'Email' => 'Email',
        'Web' => 'Web',
        'Television' => 'Television',
        'Radio' => 'Radio',
        'Newsletter' => 'Newsletter'
      ],
      'targetStatus' => [
        'Opted Out' => 'Opted Out',
        'Listed' => 'Listed'
      ]
    ],
    'labels' => [
      'Create TargetList' => 'Create Target List',
      'Opted Out' => 'Opted Out',
      'Cancel Opt-Out' => 'Cancel Opt-Out',
      'Opt-Out' => 'Opt-Out',
      'Sync with Reports' => 'Sync with Reports'
    ],
    'tooltips' => [
      'syncWithReportsEnabled' => 'Enable auto-sync with a list report.',
      'syncWithReportsUnlink' => 'Entries which are not contained in report results will be unlinked from Target List.',
      'syncWithReports' => 'Target List will be synced with results of selected reports.'
    ]
  ],
  'Task' => [
    'fields' => [
      'name' => 'Name',
      'parent' => 'Zakázka',
      'status' => 'Status',
      'dateStart' => 'Date Start',
      'dateEnd' => 'Date Due',
      'dateStartDate' => 'Date Start (all day)',
      'dateEndDate' => 'Date End (all day)',
      'priority' => 'Priority',
      'description' => 'Description',
      'isOverdue' => 'Is Overdue',
      'account' => 'Account',
      'dateCompleted' => 'Date Completed',
      'attachments' => 'Attachments',
      'reminders' => 'Reminders',
      'contact' => 'Contact',
      'timelogs' => 'Hodiny',
      'timelog' => 'Odpracováno',
      'logTimes' => 'Hodiny',
      'taskNumber' => 'Číslo úkolu',
      'finished' => 'Dokončeno dne',
      'parentProject' => 'Nadřazený projekt',
      'email' => 'Email',
      'expenses' => 'Náklady',
      'progress' => 'Splněno %',
      'expectedFinish' => 'Předpokládané dokončení',
      'test' => 'Test',
      'parentBusinessPRoject' => 'Nadřazená zakázka',
      'businessProject' => 'Zakázka',
      'solution' => 'Vyřešeno',
      'solutionAttachement' => 'Výstup - příloha',
      'parentBusinessProject' => 'Zakázka',
      'quote' => 'Nabídka',
      'parentTask' => 'ParentTask',
      'parentQuote' => 'Parent Quote',
      'parentLead' => 'parentLead',
      'parentManufacturing' => 'Úkoly Výroba',
      'datePosEnd' => 'Předpokládané dokončení',
      'isRepeated' => 'Opakovaný úkol',
      'repeatFrom' => 'Opakovat od',
      'repeatUntil' => 'Opakovat do',
      'cronTime' => 'Interval opakování',
      'lastExecuteTime' => 'Příští opakování',
      'parentAnother' => 'Parent Another',
      'taskList' => 'Seznam podúkolů',
      'tasks' => 'Opakované úkoly',
      'users' => 'Users'
    ],
    'links' => [
      'attachments' => 'Attachments',
      'account' => 'Account',
      'contact' => 'Contact',
      'email' => 'Email',
      'timelogs' => 'Hodiny',
      'timelog' => 'Odpracováno',
      'logTimes' => 'Hodiny',
      'parentProject' => 'Nadřazený projekt',
      'parentBusinessPRoject' => 'Nadřazená zakázka',
      'businessProject' => 'Zakázka',
      'parentBusinessProject' => 'Zakázka',
      'quote' => 'Nabídka',
      'parentTask' => 'ParentTask',
      'parentQuote' => 'Parent Quote',
      'parentLead' => 'parentLead',
      'parentManufacturing' => 'Úkoly Výroba',
      'parentAnother' => 'Parent Another',
      'users' => 'Users'
    ],
    'options' => [
      'status' => [
        'Not Started' => 'Not Started',
        'Started' => 'Started',
        'Completed' => 'Completed',
        'Canceled' => 'Canceled',
        'Deferred' => 'Deferred'
      ],
      'priority' => [
        'Low' => 'Low',
        'Normal' => 'Normal',
        'High' => 'High',
        'Urgent' => 'Urgent'
      ],
      'progress' => [
        0 => '0',
        10 => '10',
        20 => '20',
        30 => '30',
        40 => '40',
        50 => '50',
        60 => '60',
        70 => '70',
        80 => '80',
        90 => '90',
        100 => '100'
      ]
    ],
    'labels' => [
      'Create Task' => 'Create Task',
      'Complete' => 'Complete',
      'overdue' => 'overdue'
    ],
    'presetFilters' => [
      'actual' => 'Actual',
      'completed' => 'Completed',
      'deferred' => 'Deferred',
      'todays' => 'Today\'s',
      'overdue' => 'Overdue'
    ],
    'nameOptions' => [
      'replyToEmail' => 'Reply to email'
    ],
    'tooltips' => [
      'name' => 'Name of the task',
      'datePosEnd' => 'Odhadované datum dokončení úkolu',
      'solution' => 'Poznámky k postupu řešení',
      'solutionAttachement' => 'Dokumenty připojené při komplementaci úkolu',
      'tasks' => 'Připojené podúkoly',
      'isRepeated' => 'Opakující se úkol ? ',
      'repeatUntil' => 'Opakovat úkol do datumu',
      'lastExecuteTime' => 'Datum dalšího opakování úkolu',
      'repeatFrom' => 'Opakovat od datumu',
      'finished' => 'Dokončené opakování úkolu'
    ]
  ],
  'Shepherd' => [
    'labels' => [
      'Back' => 'Back',
      'Next' => 'Next'
    ],
    'titles' => [
      'Welcome to AutoCRM' => 'Welcome to AutoCRM',
      'Entities' => 'Entities',
      'Home' => 'Home',
      'GlobalSearch' => 'Global Search',
      'QuestionMark' => 'Help',
      'QuickCreate' => 'Quick Create',
      'Notifications' => 'Notifications',
      'Settings' => 'Settings',
      'Mattermost' => 'Chat',
      'Emails' => 'E-Mails',
      'Calendar' => 'Calendar',
      'Business' => 'Business',
      'Leads' => 'Leads',
      'Accounts' => 'Accounts',
      'Contacts' => 'Contacts',
      'Opportunities' => 'Opportunities',
      'Quotes' => 'Quotes',
      'SalesOrders' => 'Sales Orders',
      'IssuedOrders' => 'Issued Orders',
      'ProjectManagement' => 'Project Management',
      'Invoices' => 'Invoices',
      'WarehouseManagement' => 'Warehouse Management',
      'Campaigns' => 'Campaigns',
      'Reporting' => 'Reporting',
      'KnowledgeBaseArticles' => 'Video-Tutorials',
      'DashboardAndDashlets' => 'Dashboard and Dashlets',
      'Hint Not Available' => 'Hint Not Available'
    ],
    'messages' => [
      'Welcome to AutoCRM' => 'Welcome to AutomaticERP.com, a customized software for your business. This CRM system grows with your team and your processes.',
      'Entities' => 'Let\'s start from the Dashboard. On the left side you will find the menu bar. Each module (entity) is linked to the database.',
      'Home' => 'Home page, you are currently here.',
      'GlobalSearch' => 'Quickly find what you are looking for e.g. name of a company, lead or project.',
      'QuestionMark' => 'Are you lost? Click here to get help about the currently opened page.',
      'QuickCreate' => 'Create a new entity with just a few clicks, e.g.: Contact, Meeting, Email or Task.',
      'Notifications' => 'All notifications appear here, for example: the status of a task has been changed, you have received an e-mail or when a meeting has been held.',
      'Settings' => 'Here you can e.g. manage your user account. Under \'Administration\' you get to the back office of AutomaticERP.',
      'Mattermost' => 'Reduce your email traffic! Communicate in real time with your team via the Mattermost chat tool. Upload documents, videos or images. Schedule online meetings. Create a new task directly from the chat and assign it to a team or user.',
      'Emails' => 'Take advantage of the integrated email client. You will always have an overview, as the email traffic is directly linked to your leads. Of course, you can also create a task directly from a mail, mark it as important or forward it.',
      'Calendar' => 'Never miss important appointments again! Schedule meetings or calls with our integrated calendar, use reminders via email, SMS or as a push-up window on your screen. Set up filters. Of course, you can also set up a shared calendar, so you can see exactly who is working on what or which employee is available for a task. The connection to your Google Calendar is self-evident.',
      'Business' => 'Manage your leads, convert a prospect into a contact, company, supplier or opportunity. An opportunity can be effortlessly converted into a quote and printed as a PDF file or sent via email. A quote can in turn be converted into an invoice, the same scheme of conversion applies here.',
      'Leads' => 'Managing your leads - In this tab you have the complete contact information and other relevant data about your \'prospects\'.',
      'Accounts' => 'Complete overview of all contacts / contact persons in a company, also you can see the communication history.',
      'Contacts' => 'Complete overview of all contact persons / contact persons, also you can see the communication history.',
      'Opportunities' => 'Convert a lead into a sales opportunity. Calculate the probabilities of your deals.',
      'Quotes' => 'Create a quote with a few clicks which you can print directly in your PDF design or send by email. Choose items from the templates and add them.',
      'SalesOrders' => 'Keep track of your orders - link them directly to the associated project.',
      'IssuedOrders' => 'Are likewise linked to the associated project and also to your suppliers.',
      'ProjectManagement' => 'Manage your projects or tasks with the help of the Kanban board or the Gannt diagram.',
      'Invoices' => 'Use the possibilities of automation e.g. sending payment reminders!',
      'WarehouseManagement' => 'Loading and unloading in real time, you always have your stock under control and simplify your inventory.',
      'Campaigns' => 'Always keep an eye on the budget for marketing projects. Create a monthly newsletter to strengthen customer relationships.',
      'Reporting' => 'Create reports from any entity and have a complete overview of your running costs and resources - monthly closings become a breeze.',
      'KnowledgeBaseArticles' => 'In our knowledge base you will find helpful videos that guide you through our low-code platform',
      'DashboardAndDashlets' => 'Welcome to AutomaticERP, we start the tour guide and take you step-by-step through our intuitive low-code platform ({{dashboard_video}})',
      'Hint Not Available' => 'Unfortunately, there is no hint available for this page.'
    ]
  ],
  'Project' => [
    'labels' => [
      'Create Project' => 'Create Projekt'
    ],
    'fields' => [
      'name' => 'Name',
      'status' => 'Status',
      'account' => 'Account',
      'parentQuote' => 'Nabídka',
      'order' => 'Objednávka',
      'projectid' => 'Číslo projektu',
      'parentOrganization' => 'Organizace',
      'mattermostId' => 'MattermostId',
      'details' => 'Poznámky',
      'dateStart' => 'Reálné zahájení',
      'dateEnd' => 'Reálné ukončení',
      'predictedStart' => 'Předpokládané zahájení',
      'predictedEnd' => 'Předpokládané ukončení',
      'requestForms' => 'Žádanky na nákup',
      'projectPriority' => 'Priorita',
      'projectProcent' => 'Procenta dokončení'
    ],
    'links' => [
      'projectTasks' => 'Project Tasks',
      'tasksToProject' => 'Úkoly',
      'parentQuote' => 'Nabídka',
      'order' => 'Objednávka',
      'parentOrganization' => 'Organizace',
      'requestForms' => 'Žádanky na nákup'
    ],
    'tooltips' => [
      'projectPriority' => 'Priorita projektu. 1 je nejvyšší, 5 je nejnižší'
    ],
    'options' => [
      'projectPriority' => [
        1 => '1',
        2 => '2',
        3 => '3',
        4 => '4',
        5 => '5',
        '-' => '-'
      ],
      'projectProcent' => [
        '0%' => '0%',
        '10%' => '10%',
        '20%' => '20%',
        '30%' => '30%',
        '40%' => '40%',
        '50%' => '50%',
        '60%' => '60%',
        '70%' => '70%',
        '80%' => '80%',
        '90%' => '90%',
        '100%' => '100%'
      ]
    ]
  ],
  'ProjectTask' => [
    'labels' => [
      'Create ProjectTask' => 'Create Project Task'
    ],
    'fields' => [
      'name' => 'Name',
      'status' => 'Status',
      'project' => 'Project',
      'dateStart' => 'Date Start',
      'dateEnd' => 'Date End',
      'estimatedEffort' => 'Estimated Effort (hrs)',
      'actualDuration' => 'Actual Duration (hrs)'
    ]
  ],
  'PushSubscriber' => [
    'fields' => [
      'subscription' => 'Subscription',
      'user' => 'User',
      'createdAt' => 'Created At'
    ]
  ],
  'UseCase' => [
    'fields' => [
      'name' => 'Name',
      'quote' => 'Quote',
      'itemList' => 'Položky',
      'imagesField' => 'Fotografie',
      'priceList' => 'Price List',
      'isTemplate' => 'Vzor',
      'manufacturing' => 'Test - Manufacturing',
      'quote1' => 'Quote1'
    ],
    'links' => [
      'quote' => 'Quote',
      'manufacturing' => 'Test - Manufacturing',
      'quote1' => 'Quote1'
    ],
    'tooltips' => [
      'itemList' => 'test'
    ],
    'presetFilters' => [
      'reportFilter604646972402d254c' => 'Bez Transportu',
      'reportFilter6050b6d6ddd3bb8b1' => 'Jen vzorové'
    ],
    'options' => [
      'priceList' => [
        'C' => 'Group C',
        'B' => 'Group B',
        'A' => 'Group A',
        'E' => 'End-User',
        'R' => 'Rent',
        'Skoda' => 'Škoda'
      ]
    ]
  ],
  'UseCaseItem' => [
    'fields' => [
      'name' => 'Name',
      'qty' => 'Qty',
      'quantity' => 'Quantity',
      'listPrice' => 'List Price',
      'unitPrice' => 'Unit Price',
      'amount' => 'Amount',
      'taxRate' => 'Tax Rate',
      'product' => 'Product',
      'order' => 'Line Number',
      'quote' => 'Quote',
      'weight' => 'Weight',
      'unitWeight' => 'Unit Weight',
      'description' => 'Description',
      'discount' => 'Discount (%)',
      'amountConverted' => 'Amount (Converted)',
      'unitPriceConverted' => 'Unit Price (Converted)',
      'listPriceConverted' => 'List Price (Converted)',
      'account' => 'Account',
      'listPriceCurrency' => 'List Price Currency',
      'unitPriceCurrency' => 'Unit Price Currency',
      'amountCurrency' => 'Amount Currency',
      'quoteStatus' => 'Quote Status',
      'productCode' => 'Kód Produktu',
      'unit' => 'Jednotka',
      'descriptionENG' => 'Description',
      'nameCZ' => 'Název česky',
      'guaranteeExtend' => 'Extended Guarantee',
      'manufacturing' => 'Test - Výroba'
    ],
    'links' => [
      'quote' => 'Quote',
      'product' => 'Product',
      'account' => 'Account',
      'manufacturing' => 'Test - Výroba'
    ],
    'labels' => [
      'Quotes' => 'Quotes'
    ],
    'options' => [
      'unit' => [
        'pcs' => 'pcs',
        'km' => 'km',
        'h' => 'h',
        'unit' => 'unit'
      ]
    ]
  ],
  'BpmnFlowNode' => [
    'labels' => [
      'Reset' => 'Reset'
    ],
    'fields' => [
      'status' => 'Status',
      'processedAt' => 'Processed At',
      'elementType' => 'Element Type',
      'element' => 'Element'
    ],
    'options' => [
      'status' => [
        'Created' => 'Created',
        'Pending' => 'Pending',
        'In Process' => 'In Process',
        'Standby' => 'Standby',
        'Processed' => 'Processed',
        'Rejected' => 'Rejected',
        'Failed' => 'Failed',
        'Interrupted' => 'Interrupted'
      ]
    ]
  ],
  'BpmnFlowchart' => [
    'labels' => [
      'Create BpmnFlowchart' => 'Create Flowchart',
      'Hand tool' => 'Hand tool',
      'Create Event tool' => 'Create Event tool',
      'Create Gateway tool' => 'Create Event tool',
      'Create Activity tool' => 'Create Activity tool',
      'Connect tool' => 'Connect tool',
      'Erase tool' => 'Erase tool',
      'Full Screen' => 'Full Screen',
      'Processes' => 'Processes',
      'data' => 'Data',
      'Zoom In' => 'Zoom In',
      'Zoom Out' => 'Zoom Out',
      'Error' => 'Error',
      'Events' => 'Events',
      'Activities' => 'Activities',
      'Gateways' => 'Gateways'
    ],
    'fields' => [
      'isActive' => 'Is Active',
      'targetType' => 'Target Entity Type',
      'data' => 'Data',
      'hasNoneStartEvent' => 'Has Start Event of None type'
    ],
    'links' => [
      'processes' => 'Processes'
    ],
    'elements' => [
      'eventStartConditional' => 'Conditional Start Event',
      'eventStartTimer' => 'Timer Start Event',
      'eventStartError' => 'Error Start Event',
      'eventStartEscalation' => 'Escalation Start Event',
      'eventStartSignal' => 'Signal Start Event',
      'eventStart' => 'Start Event',
      'eventStartCompensation' => 'Compensation Start Event',
      'eventStartConditionalEventSubProcess' => 'Sub-Process Conditional Start Event',
      'eventStartTimerEventSubProcess' => 'Sub-Process Timer Start Event',
      'eventStartSignalEventSubProcess' => 'Sub-Process Signal Start Event',
      'eventIntermediateTimerCatch' => 'Timer Intermediate Event (Catching)',
      'eventIntermediateConditionalCatch' => 'Conditional Intermediate Event (Catching)',
      'eventIntermediateEscalationThrow' => 'Escalation Intermediate Event (Throwing)',
      'eventIntermediateSignalThrow' => 'Signal Intermediate Event (Throwing)',
      'eventIntermediateCompensationThrow' => 'Compensation Intermediate Event (Throwing)',
      'eventIntermediateSignalCatch' => 'Signal Intermediate Event (Catching)',
      'eventIntermediateMessageCatch' => 'Message Intermediate Event (Catching)',
      'eventEnd' => 'End Event',
      'eventEndTerminate' => 'Terminate End Event',
      'eventEndError' => 'Error End Event',
      'eventEndEscalation' => 'Escalation End Event',
      'eventEndSignal' => 'Signal End Event',
      'eventEndCompensation' => 'Compensation End Event',
      'eventIntermediateErrorBoundary' => 'Error Intermediate Event (Boundary)',
      'eventIntermediateTimerBoundary' => 'Timer Intermediate Event (Boundary)',
      'eventIntermediateConditionalBoundary' => 'Conditional Intermediate Event (Boundary)',
      'eventIntermediateEscalationBoundary' => 'Escalation Intermediate Event (Boundary)',
      'eventIntermediateSignalBoundary' => 'Signal Intermediate Event (Boundary)',
      'eventIntermediateMessageBoundary' => 'Message Intermediate Event (Boundary)',
      'eventIntermediateCompensationBoundary' => 'Compensation Intermediate Event (Boundary)',
      'gatewayExclusive' => 'Exclusive Gateway',
      'gatewayInclusive' => 'Inclusive Gateway',
      'gatewayParallel' => 'Parallel Gateway',
      'gatewayEventBased' => 'Event Based Gateway',
      'taskSendMessage' => 'Send Message Task',
      'taskScript' => 'Script Task',
      'taskBusinessRule' => 'Business Rule Task',
      'taskUser' => 'User Task',
      'task' => 'Task',
      'callActivity' => 'Call Activity',
      'subProcess' => 'Sub-Process',
      'eventSubProcess' => 'Event Sub-Process',
      'flow' => 'Sequence Flow'
    ],
    'presetFilters' => [
      'isManuallyStartable' => 'Manually Startable',
      'activeHasNoneStartEvent' => 'Active w/ None Start Event',
      'active' => 'Active'
    ]
  ],
  'BpmnFlowchartElement' => [
    'fields' => [
      'text' => 'Text',
      'triggerType' => 'Trigger Type',
      'timer' => 'Timer Parameters',
      'defaultFlowId' => 'Default Flow',
      'from' => 'From',
      'to' => 'To',
      'replyTo' => 'Reply-To',
      'fromEmailAddress' => 'From Email Address',
      'toEmailAddress' => 'To Email Address',
      'replyToEmailAddress' => 'Reply-To Email Address',
      'toSpecifiedTeams' => 'To Teams',
      'toSpecifiedUsers' => 'To Users',
      'toSpecifiedContacts' => 'To Contacts',
      'emailTemplate' => 'Email Template',
      'doNotStore' => 'Do not store sent email',
      'actions' => 'Actions',
      'formula' => 'Formula (script)',
      'actionType' => 'Action Type',
      'targetUser' => 'Target User',
      'assignmentType' => 'Assignment',
      'targetTeam' => 'Target Team',
      'targetUserPosition' => 'Target User Position',
      'startDirection' => 'Start Direction',
      'targetReport' => 'Target Report',
      'scheduling' => 'Scheduling',
      'schedulingApplyTimezone' => 'Apply timezone',
      'messageType' => 'Message Type',
      'canBeFailed' => 'Can be Failed',
      'target' => 'Target',
      'callableType' => 'Callable Type',
      'errorCode' => 'Error Code',
      'escalationCode' => 'Escalation Code',
      'cancelActivity' => 'Is Interrupting',
      'isInterrupting' => 'Is Interrupting',
      'targetType' => 'Target Entity Type',
      'flowchartVisualization' => 'Flowchart',
      'flowchart' => 'Flowchart',
      'signal' => 'Signal',
      'returnVariableList' => 'Return Variables',
      'returnCollectionVariable' => 'Return Collection Variable',
      'repliedTo' => 'Reply To',
      'relatedTo' => 'Related To',
      'instructions' => 'Instructions',
      'conditionsFormula' => 'Conditions Formula',
      'optOutLink' => 'Opt-Out Link',
      'isMultiInstance' => 'Multi-Instance',
      'isSequential' => 'Sequential',
      'loopCollectionExpression' => 'Collection Expression',
      'targetIdExpression' => 'Target ID Expression',
      'activityId' => 'Activity ID'
    ],
    'labels' => [
      'Conditions' => 'Conditions',
      'Actions' => 'Actions',
      'Field' => 'Field',
      'Flows Conditions' => 'Flows Conditions'
    ],
    'tooltips' => [
      'compensateActivityId' => 'An ID of an activity to compensate. If omitted, all completed compensable activities will be compensated.',
      'targetIdExpression' => 'The expression defining an ID of the target record.',
      'returnCollectionVariable' => 'Specify a variable name for data that will be returned from the multi-instance sub-process. The variable will contain an array of objects. Each object will contain return-variables of each sub-process instance.',
      'loopCollectionExpression' => 'The expression defining a list of values. Each value will instantiate a separate sub-process. The value will be available in the variable `$inputItem`.',
      'taskSendMessageEmailAddress' => 'Available placeholders:

* `{$$variable}`',
      'targetReport' => 'Records from the list report will be passed to the new process.',
      'target' => 'Select which record will be used as a target.',
      'userTaskName' => 'A name of User Task record that will be created.

Available placeholders:
* `{$attribute}`
* `{$$variable}`',
      'userTaskInstructions' => 'Instructions for a user. Markdown is supported.

Available placeholders:
* `{$attribute}`
* `{$$variable}`',
      'returnVariableList' => 'Specify formula variables that will be copied from the sub-process to the parent process once the sub-process successfully ends.',
      'scheduling' => 'Crontab notation. Defines frequency.

`*/5 * * * *` – every 5 minutes

`0 */2 * * *` – every 2 hours

`30 1 * * *` – at 01:30 once a day

`0 0 1 * *` – on the first day of the month',
      'schedulingApplyTimezone' => 'Apply the system default timezone to scheduling. Otherwise, UTC will be used.'
    ],
    'options' => [
      'emailAddress' => [
        'system' => 'System',
        'currentUser' => 'Current User',
        'specifiedEmailAddress' => 'Specified Email Address',
        'assignedUser' => 'Assigned User',
        'followers' => 'Followers',
        'specifiedContacts' => 'Specified Contacts',
        'specifiedUsers' => 'Specified Users',
        'specifiedTeams' => 'Specified Teams',
        'followersExcludingAssignedUser' => 'Followers excluding Assigned User',
        'processAssignedUser' => 'User assigned to Process',
        'targetEntity' => 'Target Record',
        '' => 'None'
      ],
      'triggerType' => [
        'afterRecordCreated' => 'After record created',
        'afterRecordSaved' => 'After record saved',
        'afterRecordUpdated' => 'After record updated',
        'sequential' => 'Sequential'
      ],
      'timerShiftOperator' => [
        'plus' => 'plus',
        'minus' => 'minus'
      ],
      'timerShiftUnits' => [
        'minutes' => 'minutes',
        'hours' => 'hours',
        'days' => 'days',
        'months' => 'months',
        'seconds' => 'seconds'
      ],
      'timerBase' => [
        'moment' => 'Moment when event triggered',
        'formula' => 'Calculated by formula'
      ],
      'actionType' => [
        'Approve' => 'Approve',
        'Review' => 'Review'
      ],
      'assignmentType' => [
        '' => 'None',
        'processAssignedUser' => 'User assigned to Process',
        'specifiedUser' => 'Specified User',
        'rule:Round-Robin' => 'Round-Robin',
        'rule:Least-Busy' => 'Least-Busy'
      ],
      'startDirection' => [
        '' => 'Auto',
        'r' => 'Right',
        'd' => 'Down',
        'u' => 'Up',
        'l' => 'Left'
      ],
      'messageType' => [
        'Email' => 'Email'
      ]
    ]
  ],
  'BpmnProcess' => [
    'labels' => [
      'Create BpmnProcess' => 'Start Process',
      'Stop Process' => 'Stop Process',
      'User Tasks' => 'User Tasks',
      'Flowcharts' => 'Flowcharts',
      'Interrupt' => 'Interrupt',
      'Reject' => 'Reject',
      'Start flow from here' => 'Start flow from here',
      'Reactivate' => 'Reactivate',
      'View Variables' => 'View Variables',
      'View Error' => 'View Error',
      'Error Message' => 'Error Message'
    ],
    'fields' => [
      'status' => 'Status',
      'targetType' => 'Target Entity Type',
      'target' => 'Target',
      'createdEntitiesData' => 'Created Entities Data',
      'flowchartData' => 'Flowchart Data',
      'flowchart' => 'Flowchart',
      'flowchartVisualization' => 'Flowchart (visualization)',
      'flowchartElementsDataHash' => 'Flowchart Elements',
      'variables' => 'Variables',
      'endedAt' => 'Ended At',
      'startElementId' => 'Start Element',
      'workflowId' => 'Workflow ID',
      'parentProcess' => 'Parent Process',
      'parentProcessFlowNode' => 'Parent Process Flow Node',
      'rootProcess' => 'Root Process'
    ],
    'links' => [
      'flowchart' => 'Flowchart',
      'target' => 'Target',
      'flowNodes' => 'Flow Log',
      'userTasks' => 'Process User Tasks',
      'childProcesses' => 'Child Processes',
      'parentProcess' => 'Parent Process',
      'parentProcessFlowNode' => 'Parent Process Flow Node'
    ],
    'options' => [
      'status' => [
        'Created' => 'Created',
        'Started' => 'Started',
        'Ended' => 'Ended',
        'Paused' => 'Paused',
        'Stopped' => 'Stopped',
        'Interrupted' => 'Interrupted'
      ]
    ],
    'presetFilters' => [
      'actual' => 'Actual',
      'ended' => 'Ended'
    ]
  ],
  'BpmnUserTask' => [
    'labels' => [
      'Resolve' => 'Resolve'
    ],
    'fields' => [
      'actionType' => 'Action Type',
      'resolution' => 'Resolution',
      'target' => 'Target',
      'process' => 'Process',
      'isResolved' => 'Is Resolved',
      'resolutionNote' => 'Resolution Note',
      'instructions' => 'Instructions',
      'isCanceled' => 'Is Canceled'
    ],
    'links' => [
      'process' => 'Process',
      'target' => 'Target',
      'flowNode' => 'Flow Node'
    ],
    'options' => [
      'actionType' => [
        'Approve' => 'Approve',
        'Review' => 'Review',
        'Accomplish' => 'Accomplish'
      ],
      'resolution' => [
        '' => 'None',
        'Approved' => 'Approved',
        'Rejected' => 'Rejected',
        'Reviewed' => 'Reviewed',
        'Completed' => 'Completed',
        'Canceled' => 'Canceled'
      ]
    ],
    'presetFilters' => [
      'actual' => 'Actual',
      'resolved' => 'Resolved',
      'canceled' => 'Canceled'
    ]
  ],
  'Report' => [
    'labels' => [
      'Create Report' => 'Create Report',
      'Run' => 'Run',
      'Total' => 'Total',
      'Group Total' => 'Group Total',
      '-Empty-' => '-Empty-',
      'Parameters' => 'Parameters',
      'Filters' => 'Filters',
      'Chart' => 'Chart',
      'List Report' => 'List Report',
      'Grid Report' => 'Grid Report',
      'days' => 'days',
      'never' => 'never',
      'Get Csv' => 'Get Csv',
      'EmailSending' => 'Email Sending',
      'View Report' => 'View Report',
      'Report' => 'Report',
      'AND' => 'AND',
      'OR' => 'OR',
      'NOT' => 'NOT IN',
      'IN' => 'IN',
      'Complex expression' => 'Complex expression',
      'Having' => 'Having',
      'Add AND group' => 'Add AND group',
      'Add OR group' => 'Add OR group',
      'Add NOT group' => 'Add NOT group',
      'Add IN group' => 'Add IN group',
      'Add Having group' => 'Add Having group',
      'Add Complex expression' => 'Add Complex expression',
      'Columns' => 'Columns',
      'Send Email' => 'Send Email',
      'Results View' => 'Results View',
      'Create Joint Grid Report' => 'Create Joint Grid Report'
    ],
    'fields' => [
      'type' => 'Type',
      'entityType' => 'Entity Type',
      'description' => 'Description',
      'groupBy' => 'Group by',
      'columns' => 'Columns',
      'orderBy' => 'Order by',
      'filters' => 'Filters',
      'runtimeFilters' => 'Runtime Filters',
      'chartType' => 'Chart Type',
      'emailSendingInterval' => 'Interval',
      'emailSendingTime' => 'Time',
      'emailSendingUsers' => 'Users',
      'emailSendingSettingDay' => 'Day',
      'emailSendingSettingMonth' => 'Month',
      'emailSendingSettingWeekdays' => 'Days',
      'emailSendingDoNotSendEmptyReport' => 'Don\'t send if report is empty',
      'chartColorList' => 'Colors',
      'chartColor' => 'Color',
      'chartOneColumns' => 'Chart Columns',
      'chartOneY2Columns' => 'Chart Secondary Axis Columns',
      'orderByList' => 'List Order',
      'column' => 'Column',
      'exportFormat' => 'Format',
      'category' => 'Category',
      'applyAcl' => 'Apply ACL',
      'portals' => 'Portals',
      'joinedReports' => 'Sub-Reports',
      'joinedReportLabel' => 'Sub-Report Label'
    ],
    'tooltips' => [
      'emailSendingUsers' => 'Users report result will be sent to',
      'chartColorList' => 'Custom colors for specific groups.',
      'applyAcl' => 'Report results will depend on the user\'s access.',
      'groupBy' => 'Data will be aggregated by one or two groups. If empty, then data will not be aggregated, only totals will be displayed.

[Complex expressions](https://www.espocrm.com/documentation/user-guide/complex-expressions/) can be used.',
      'columns' => 'What data to display.',
      'runtimeFilters' => 'Additional filters that will be available on the report view.',
      'portals' => 'Report will be available only in specified portals.'
    ],
    'functions' => [
      'COUNT' => 'Count',
      'SUM' => 'Sum',
      'AVG' => 'Avg',
      'MIN' => 'Min',
      'MAX' => 'Max',
      'YEAR' => 'Year',
      'QUARTER' => 'Quarter',
      'MONTH' => 'Month',
      'DAY' => 'Day',
      'WEEK' => 'Week',
      'YEAR_FISCAL' => 'Fiscal Year',
      'QUARTER_FISCAL' => 'Fiscal Quarter'
    ],
    'orders' => [
      'ASC' => 'ASC',
      'DESC' => 'DESC',
      'LIST' => 'LIST'
    ],
    'options' => [
      'dashletDisplayType' => [
        '' => '',
        'Chart' => 'Chart',
        'List' => 'List',
        'Chart-Total' => 'Chart & Total',
        'Total' => 'Total',
        'Table' => 'Table'
      ],
      'chartType' => [
        'BarHorizontal' => 'Bar (horizontal)',
        'BarVertical' => 'Bar (vertical)',
        'BarGroupedHorizontal' => 'Bar Grouped (horizontal)',
        'BarGroupedVertical' => 'Bar Grouped (vertical)',
        'Pie' => 'Pie',
        'Line' => 'Line',
        'Radar' => 'Radar'
      ],
      'emailSendingInterval' => [
        '' => 'None',
        'Daily' => 'Daily',
        'Weekly' => 'Weekly',
        'Monthly' => 'Monthly',
        'Yearly' => 'Yearly'
      ],
      'emailSendingSettingDay' => [
        32 => 'Last day of month'
      ],
      'type' => [
        'Grid' => 'Grid',
        'List' => 'List',
        'JointGrid' => 'Joint Grid'
      ],
      'function' => [
        '' => 'No Function',
        'custom' => 'Expression',
        'customWithOperator' => 'Expression w/ Operator',
        'DATE_NUMBER' => 'DATE',
        'MONTH_NUMBER' => 'MONTH',
        'YEAR_NUMBER' => 'YEAR',
        'QUARTER_NUMBER' => 'QUARTER',
        'DAYOFWEEK_NUMBER' => 'DAYOFWEEK',
        'HOUR_NUMBER' => 'HOUR',
        'MINUTE_NUMBER' => 'MINUTE',
        'LOWER' => 'LOWER',
        'UPPER' => 'UPPER',
        'TRIM' => 'TRIM',
        'LENGTH' => 'LENGTH',
        'WEEK_NUMBER_0' => 'WEEK (Sunday)',
        'WEEK_NUMBER_1' => 'WEEK (Monday)',
        'COUNT' => 'COUNT',
        'SUM' => 'SUM',
        'AVG' => 'AVG',
        'MAX' => 'MAX',
        'MIN' => 'MIN'
      ],
      'operator' => [
        'equals' => 'Equals',
        'notEquals' => 'Not Equals',
        'greaterThan' => 'Greater Than',
        'lessThan' => 'Less Than',
        'greaterThanOrEquals' => 'Greater Than or Equals',
        'lessThanOrEquals' => 'Less Than or Equals',
        'in' => 'In',
        'notIn' => 'Not In',
        'isTrue' => 'Is True',
        'isFalse' => 'Is False',
        'isNull' => 'Is Null',
        'isNotNull' => 'Is Not Null',
        'like' => 'Like'
      ],
      'exportFormat' => [
        'csv' => 'CSV',
        'xlsx' => 'XLSX (Excel)'
      ],
      'layoutAlign' => [
        'left' => 'Left',
        'right' => 'Right'
      ]
    ],
    'messages' => [
      'notAllowedFormulaInFilter' => 'Formula expression in filters contains a not allowed function.',
      'validateMaxCount' => 'Count should not be greater than {maxCount}',
      'havingFilterWithoutGroupByError' => 'Having filter can\'t be used without Group-By.',
      'gridReportDescription' => 'Group by one or two columns and see summations. Can be displayed as a chart.',
      'listReportDescription' => 'Simple list of records which meet filters criteria.',
      'sqlSyntaxError' => 'Could not compose a valid SQL from report parameters.',
      'onlyFullGroupByError' => 'Unsupported report parameters. Either change parameters or disable `ONLY_FULL_GROUP_BY` SQL mode in the database config.'
    ],
    'presetFilters' => [
      'list' => 'List',
      'grid' => 'Grid',
      'listTargets' => 'List (Targets)',
      'listAccounts' => 'List (Accounts)',
      'listContacts' => 'List (Contacts)',
      'listLeads' => 'List (Leads)',
      'listUsers' => 'List (Users)'
    ],
    'errorMessages' => [
      'error' => 'Error',
      'noChart' => 'No chart selected for the report.',
      'selectReport' => 'Select a report in the dashlet options.'
    ],
    'filtersGroupTypes' => [
      'or' => 'OR',
      'and' => 'AND',
      'not' => 'NOT IN',
      'subQueryIn' => 'IN',
      'having' => 'Having'
    ],
    'layoutFields' => [
      'link' => 'Link',
      'width' => 'Width',
      'notSortable' => 'Not Sortable',
      'exportOnly' => 'Export Only',
      'align' => 'Align'
    ]
  ],
  'ReportCategory' => [
    'labels' => [
      'Create ReportCategory' => 'Create Category',
      'Manage Categories' => 'Manage Categories',
      'Reports' => 'Reports'
    ],
    'fields' => [
      'order' => 'Order'
    ],
    'links' => [
      'reports' => 'Reports'
    ]
  ],
  'ReportFilter' => [
    'labels' => [
      'Create ReportFilter' => 'Create Filter',
      'Rebuild Filters' => 'Rebuild Filters'
    ],
    'fields' => [
      'order' => 'Order',
      'report' => 'Report',
      'entityType' => 'Entity Type',
      'isActive' => 'Is Enabled'
    ],
    'links' => [
      'report' => 'Report'
    ],
    'tooltips' => [
      'teams' => 'Teams the filter will be available for. If no teams specified then no restriction by team will be applied.',
      'report' => 'List Report that will be used for the filter.'
    ]
  ],
  'ReportPanel' => [
    'labels' => [
      'Create ReportPanel' => 'Create Panel',
      'Rebuild Panels' => 'Rebuild Panels'
    ],
    'fields' => [
      'report' => 'Report',
      'entityType' => 'Entity Type',
      'isActive' => 'Is Enabled',
      'type' => 'Type',
      'reportType' => 'Report Type',
      'displayTotal' => 'Display Total',
      'displayOnlyTotal' => 'Display Only Total',
      'column' => 'Column',
      'reportEntityType' => 'Report Entity Type',
      'columnList' => 'Column List',
      'dynamicLogicVisible' => 'Conditions making panel visible',
      'order' => 'Order',
      'displayType' => 'What to display',
      'useSiMultiplier' => 'SI Multiplier'
    ],
    'links' => [
      'report' => 'Report'
    ],
    'tooltips' => [
      'teams' => 'Teams the panel will be displayed for. If no teams specified then no restriction by team will be applied.',
      'report' => 'Report that will be used for the panel.',
      'order' => '[0..1] - before Stream panel;
[3..4] - before relationship panels;
[6..] - after relationship panels.'
    ],
    'options' => [
      'type' => [
        'side' => 'Side',
        'bottom' => 'Bottom'
      ]
    ]
  ],
  'Workflow' => [
    'fields' => [
      'Name' => 'Name',
      'entityType' => 'Target Entity',
      'type' => 'Trigger Type',
      'isActive' => 'Active',
      'description' => 'Description',
      'usersToMakeToFollow' => 'Users to make to follow the record',
      'whatToFollow' => 'What to follow',
      'portalOnly' => 'Portal Only',
      'portal' => 'Portal',
      'targetReport' => 'Target Report',
      'scheduling' => 'Scheduling',
      'schedulingApplyTimezone' => 'Apply timezone',
      'methodName' => 'Service Method',
      'assignmentRule' => 'Assignment Rule',
      'targetTeam' => 'Target Team',
      'targetUserPosition' => 'Target User Position',
      'listReport' => 'List Report',
      'linkList' => 'Link with Target Entity through relationships',
      'linkListShort' => 'Links',
      'target' => 'Target',
      'whoFollow' => 'Who make to follow',
      'signalName' => 'Signal',
      'requestType' => 'Request Type',
      'requestUrl' => 'URL',
      'requestContentType' => 'Content Type',
      'requestContent' => 'Payload',
      'requestContentVariable' => 'Payload from variable',
      'optOutLink' => 'Opt-Out Link',
      'headers' => 'Headers',
      'manualLabel' => 'Manual Label',
      'manualDynamicLogic' => 'Manual Dynamic-Logic',
      'manualTeams' => 'Manual Teams',
      'manualAccessRequired' => 'Manual Access Required',
      'manualElementType' => 'Manual Element Type',
      'manualElementTypeInForm' => 'Element Type',
      'manualLabelInForm' => 'Label',
      'manualAccessRequiredInForm' => 'Access Required',
      'manualTeamsInForm' => 'For Teams',
      'manualDynamicLogicInForm' => 'Conditions',
      'category' => 'Category'
    ],
    'links' => [
      'portal' => 'Portal',
      'targetReport' => 'Target Report',
      'workflowLogRecords' => 'Log',
      'category' => 'Category'
    ],
    'tooltips' => [
      'schedulingApplyTimezone' => 'Apply the system default timezone to scheduling. Otherwise, UTC will be used.',
      'manualDynamicLogic' => 'Conditions making the workflow available for a record.',
      'manualTeams' => 'Teams who will have access to run the workflow. If empty, only admin will have access.',
      'manualAccessRequired' => 'Access to a record required to be able run the workflow.',
      'manualLabel' => 'A UI element label text.',
      'requestUrl' => 'Available placeholders:
* `{$attribute}`
* `{$$variable}`',
      'requestHeaders' => 'Additional headers.

Format:
```key: value```

Available placeholders:
* `{$attribute}`
* `{$$variable}`',
      'requestContent' => 'In JSON format.

Available placeholders:
* `{$attribute}`
* `{$$variable}`',
      'requestContentVariable' => 'A variable name. If specified, payload will be taken from the variable.',
      'portalOnly' => 'If checked workflow will be triggered only in portal.',
      'portal' => 'Specific portal where workflow will be triggered. Leave empty if you need it to work in any portal.',
      'scheduling' => 'Crontab notation. Defines frequency of workflow rule runs.

`*/5 * * * *` – every 5 minutes

`0 */2 * * *` – every 2 hours

`30 1 * * *` – at 01:30 once a day

`0 0 1 * *` – on the first day of the month'
    ],
    'labels' => [
      'Create Workflow' => 'Create Rule',
      'General' => 'General',
      'Manual Trigger' => 'Manual Trigger',
      'Conditions' => 'Conditions',
      'Actions' => 'Actions',
      'All' => 'All',
      'Any' => 'Any',
      'Formula' => 'Formula',
      'Email Address' => 'Email Address',
      'Email Template' => 'Email Template',
      'From' => 'From',
      'To' => 'To',
      'immediately' => 'Immediately',
      'Reply-To' => 'Reply-To',
      'later' => 'Later',
      'today' => 'now',
      'plus' => 'plus',
      'minus' => 'minus',
      'days' => 'days',
      'hours' => 'hours',
      'months' => 'months',
      'minutes' => 'minutes',
      'Link' => 'Link',
      'Add Field' => 'Add Field',
      'equals' => 'equals',
      'wasEqual' => 'was equal',
      'notEquals' => 'not equals',
      'wasNotEqual' => 'was not equal',
      'changed' => 'changed',
      'notChanged' => 'not changed',
      'notEmpty' => 'not empty',
      'isEmpty' => 'empty',
      'value' => 'value',
      'field' => 'field',
      'true' => 'true',
      'false' => 'false',
      'greaterThan' => 'greater than',
      'lessThan' => 'less than',
      'greaterThanOrEquals' => 'greater than or equals',
      'lessThanOrEquals' => 'less than or equals',
      'between' => 'between',
      'on' => 'on',
      'before' => 'before',
      'after' => 'after',
      'beforeToday' => 'before today',
      'afterToday' => 'after today',
      'recipient' => 'Recipient',
      'has' => 'has',
      'notHas' => 'not has',
      'contains' => 'contains',
      'notContains' => 'not contains',
      'messageTemplate' => 'Message Template',
      'users' => 'Users',
      'Target Entity' => 'Target Entity',
      'Current' => 'Current',
      'Workflow' => 'Workflow',
      'Workflows Log' => 'Workflows Log',
      'methodName' => 'Service Method',
      'additionalParameters' => 'Additional Parameters (JSON format)',
      'doNotStore' => 'Do not store sent email',
      'Related' => 'Related',
      'Entity Type' => 'Entity Type',
      'Workflow Rule' => 'Workflow Rule',
      'Add Condition' => 'Add Condition',
      'Add Action' => 'Add Action',
      'Created' => 'Created',
      'Field' => 'Field',
      'Entity' => 'Entity',
      'Process' => 'Process'
    ],
    'emailAddressOptions' => [
      '' => 'None',
      'currentUser' => 'Current user',
      'specifiedEmailAddress' => 'Specified email address',
      'assignedUser' => 'Assigned user',
      'targetEntity' => 'Target record',
      'specifiedUsers' => 'Specified users',
      'specifiedContacts' => 'Specified contacts',
      'teamUsers' => 'Users of teams related to target record',
      'followers' => 'Followers of target record',
      'followersExcludingAssignedUser' => 'Followers excluding assigned user',
      'specifiedTeams' => 'Users of specified teams',
      'system' => 'System',
      'fromOrReplyTo' => 'From/Reply-To address'
    ],
    'options' => [
      'type' => [
        'afterRecordSaved' => 'After record saved (created or updated)',
        'afterRecordCreated' => 'After record created',
        'afterRecordUpdated' => 'After record updated',
        'manual' => 'Manual',
        'scheduled' => 'Scheduled',
        'sequential' => 'Sequential',
        'signal' => 'Signal'
      ],
      'subjectType' => [
        'value' => 'value',
        'field' => 'field',
        'today' => 'today/now',
        'typeOf' => 'type of'
      ],
      'assignmentRule' => [
        'Round-Robin' => 'Round-Robin',
        'Least-Busy' => 'Least-Busy'
      ],
      'manualAccessRequired' => [
        'read' => 'read',
        'edit' => 'edit',
        'admin' => 'admin'
      ],
      'manualElementType' => [
        'Button' => 'Button',
        'Dropdown-Item' => 'Dropdown Item'
      ]
    ],
    'actionTypes' => [
      'sendEmail' => 'Send Email',
      'createEntity' => 'Create Record',
      'createRelatedEntity' => 'Create Related Record',
      'updateEntity' => 'Update Target Record',
      'updateRelatedEntity' => 'Update Related Record',
      'relateWithEntity' => 'Link with Another Record',
      'unrelateFromEntity' => 'Unlink from Another Record',
      'makeFollowed' => 'Make Followed',
      'createNotification' => 'Create Notification',
      'triggerWorkflow' => 'Trigger Another Workflow Rule',
      'runService' => 'Run Service Action',
      'applyAssignmentRule' => 'Apply Assignment Rule',
      'updateCreatedEntity' => 'Update Created Record',
      'updateProcessEntity' => 'Update Process Record',
      'startBpmnProcess' => 'Start BPM Process',
      'sendRequest' => 'Send HTTP Request',
      'executeFormula' => 'Execute Formula Script'
    ],
    'texts' => [
      'allMustBeMet' => 'All must be met',
      'atLeastOneMustBeMet' => 'At least one must be met',
      'formulaInfo' => 'Conditions of any complexity in espo-formula language'
    ],
    'messages' => [
      'jsonInvalid' => 'Is not valid JSON.',
      'loopNotice' => 'Be careful about a possible looping through two or more workflow rules continuously.',
      'messageTemplateHelpText' => 'Available placeholders:

* `{entity}` – target record
* `{user}` – current user
* `{$$variable}` – formula variable'
    ],
    'serviceActions' => [
      'sendEventInvitations' => 'Send Invitations',
      'addQuoteItemList' => 'Add Quote Items',
      'addInvoiceItemList' => 'Add Invoice Items',
      'addSalesOrderItemList' => 'Add Sales Order Items',
      'convertCurrency' => 'Convert Currency',
      'sendInEmail' => 'Send In Email',
      'optOut' => 'Opt-out',
      'generateAndSendPassword' => 'Generate Password'
    ],
    'serviceActionsHelp' => [
      'generateAndSendPassword' => 'A new password will be generated and sent to the user\'s email address.',
      'optOut' => 'Optional parameter: targetListId. If not specified, then marks an email address opted-out.

 Example:
```{"targetListId": "TARGET_LIST_ID"}```',
      'convertCurrency' => 'Optional parameter: targetCurrency. If not specified, then it will convert to the default currency.',
      'sendInEmail' => 'Parameters:
* templateId - ID of PDF template
* emailTemplateId - ID of email template
* to - recipient (optional parameter); by default will be sent to billing contact or account; example: `link:account.assignedUser`

Example:

```{
    "templateId": "TEMPLATE_ID",
    "emailTemplateId": "EMAIL_TEMPLATE_ID",
    "to": "link:billingContact"
}```',
      'addQuoteItemList' => 'Example: 

```{
  "itemList": [
     {
      "quantity": 1, "procuctId": "productId", "name": "Product Name", "listPrice": 100, "unitPrice": 100
     }
  ]
}```',
      'addInvoiceItemList' => 'Example: 

```{
  "itemList": [
     {
      "quantity": 1, "procuctId": "productId", "name": "Product Name", "listPrice": 100, "unitPrice": 100
     }
  ]
}```',
      'addSalesOrderItemList' => 'Example: 

```{
  "itemList": [
     {
      "quantity": 1, "procuctId": "productId", "name": "Product Name", "listPrice": 100, "unitPrice": 100
     }
  ]
}```'
    ]
  ],
  'WorkflowCategory' => [
    'labels' => [
      'Create WorkflowCategory' => 'Create Category'
    ],
    'fields' => [
      'order' => 'Order'
    ],
    'links' => [
      'workflows' => 'Workflows'
    ]
  ],
  'WorkflowLogRecord' => [
    'labels' => [],
    'fields' => [
      'target' => 'Target',
      'workflow' => 'Workflow'
    ]
  ],
  'RecordRecurrence' => [
    'fields' => [
      'entityType' => 'Entity Type',
      'scheduling' => 'Scheduling',
      'infinite' => 'Infinite',
      'until' => 'Recur until',
      'generateInBatches' => 'Pre-generate in batches',
      'generateInAdvance' => 'Pre-generate in advance for',
      'status' => 'Status'
    ],
    'labels' => [
      'viewMode' => 'view mode (click to toggle)',
      'user-friendly' => 'User-friendly',
      'advanced' => 'Advanced',
      'Create RecordRecurrence' => 'Create Record Recurrence',
      'Batching' => 'Batching',
      'Recurrence' => 'Recurrence'
    ],
    'cronLabels' => [
      'months' => [
        0 => 'January',
        1 => 'February',
        2 => 'March',
        3 => 'April',
        4 => 'May',
        5 => 'June',
        6 => 'July',
        7 => 'August',
        8 => 'September',
        9 => 'October',
        10 => 'November',
        11 => 'December'
      ],
      'days' => [
        0 => 'Sunday',
        1 => 'Monday',
        2 => 'Tuesday',
        3 => 'Wednesday',
        4 => 'Thursday',
        5 => 'Friday',
        6 => 'Saturday'
      ],
      'periods' => [
        0 => 'minute',
        1 => 'hour',
        2 => 'day',
        3 => 'week',
        4 => 'month',
        5 => 'year'
      ],
      'unsupported' => 'Unsupported cron expression. Please use Advanced mode.',
      'Weekdays' => 'Weekdays',
      'Weekends' => 'Weekends',
      'Every' => 'Every',
      'on the' => 'on the',
      'of' => 'of',
      'minutes past the hour' => 'minutes past the hour',
      'at' => 'at',
      'st' => 'st',
      'nd' => 'nd',
      'rd' => 'rd',
      'th' => 'th'
    ],
    'options' => [
      'generateInAdvance' => [
        '1_day' => '1 day',
        '2_days' => '2 days',
        '1_week' => '1 week',
        '2_weeks' => '2 weeks',
        '1_month' => '1 month',
        '2_months' => '2 months',
        '3_months' => '3 months',
        '6_months' => '6 months',
        '1_year' => '1 year'
      ],
      'status' => [
        'Draft' => 'Draft',
        'Active' => 'Active',
        'Completed' => 'Completed'
      ]
    ],
    'tooltips' => [
      'scheduling' => 'Frequency of record recurring

**User-friendly** mode - easy to use, but not as flexible

**Advanced** mode - more flexible, uses cron expression',
      'generateInAdvance' => 'Time period for which records will be pre-generated in advance'
    ],
    'messages' => [
      'missingDateStart' => 'Record must have a start date.',
      'cronExprInvalid' => 'Invalid cron expression',
      'batchSizeLimitExceeded' => 'The number of records generated in one batch would exceed the limit set by the administrator. Please set a more frequent batch or reduce recurrence rate.',
      'invalidSchedulingExpression' => 'Invalid CRON expression'
    ]
  ],
  'Product' => [
    'labels' => [
      'Create Product' => 'Create Product',
      'Price' => 'Price',
      'Categories' => 'Categories'
    ],
    'fields' => [
      'name' => 'Kód produktu',
      'type' => 'Type',
      'ean' => 'EAN',
      'url' => 'URL',
      'category' => 'Category',
      'description' => 'Description',
      'attachments' => 'Attachments',
      'pricingType' => 'Pricing Type',
      'priceMargin' => 'Price Margin',
      'priceMarkup' => 'Price Markup',
      'costPrice' => 'Cost Price',
      'costPriceCurrency' => 'Cost Price Currency',
      'costPriceConverted' => 'Cost Price (Converted)',
      'costPriceWithTax' => 'Cost Price with Tax',
      'costPriceWithTaxCurrency' => 'Cost Price with Tax Currency',
      'costPriceWithTaxConverted' => 'Cost Price with Tax (Converted)',
      'salesPrice' => 'Sales Price',
      'salesPriceCurrency' => 'Sales Price Currency',
      'salesPriceConverted' => 'Sales Price (Converted)',
      'salesPriceWithTax' => 'Sales Price with Tax',
      'salesPriceWithTaxCurrency' => 'Sales Price with Tax Currency',
      'salesPriceWithTaxConverted' => 'Sales Price with Tax (Converted)',
      'taxClass' => 'Tax Class',
      'taxRate' => 'Tax Rate',
      'measureUnit' => 'Measure Unit',
      'totalReservedQuantity' => 'Total Reserved Quantity',
      'totalWarehouseQuantity' => 'Total Warehouse Quantity',
      'totalAvailableQuantity' => 'Total Available Quantity',
      'averagePrice' => 'Average Items Price',
      'totalPrice' => 'Total Items Price',
      'productionComposition' => 'Production Composition',
      'obrazek' => 'Obrazek',
      'buyPrice' => 'Nákupní cena',
      'buyPriceCurrency' => 'Nákupní cena (Currency)',
      'buyPriceConverted' => 'Nákupní cena (Converted)',
      'warehouses' => 'Warehouses',
      'productCode' => 'Name',
      'documents' => 'Documents',
      'nameCZ' => 'Název',
      'descriptionENG' => 'Description',
      'unit' => 'Jednotka',
      'quotes' => 'Quotes',
      'quote' => 'Quote',
      'quoteTransport' => 'Doprava nabídky',
      'komponenty' => 'Komponenty',
      'components' => 'Komponenty',
      'requestItem' => 'Položka žádanky',
      'componentsCost' => 'Cena komponent',
      'componentsCostCurrency' => 'Cena komponent (Měna)',
      'componentsCostConverted' => 'Cena komponent (Převedeno)',
      'priceA' => 'Cena A',
      'priceACurrency' => 'Cena A (Měna)',
      'priceAConverted' => 'Cena A (Převedeno)',
      'priceB' => 'Cena B',
      'priceBCurrency' => 'Cena B (Měna)',
      'priceBConverted' => 'Cena B (Převedeno)',
      'priceC' => 'Cena C',
      'priceCCurrency' => 'Cena C (Měna)',
      'priceCConverted' => 'Cena C (Převedeno)',
      'origName' => 'Original Name',
      'priceE' => 'Cena End-User',
      'priceECurrency' => 'Cena End-User (Měna)',
      'priceEConverted' => 'Cena End-User (Převedeno)',
      'rentPrice' => 'Rent cena/měsíc',
      'rentPriceCurrency' => 'Rent cena/měsíc (Měna)',
      'rentPriceConverted' => 'Rent cena/měsíc (Převedeno)',
      'priceSkoda' => 'Cena Škoda',
      'priceSkodaCurrency' => 'Cena Škoda (Měna)',
      'priceSkodaConverted' => 'Cena Škoda (Převedeno)',
      'productDatabase' => 'Product Database',
      'productDatabase1' => 'Product Database1',
      'productDatabase12' => 'Product Database12',
      'productDatabases' => 'Databáze produktů',
      'produktyPepa' => 'Peordukty Pepa',
      'businessProject' => 'Business Project',
      'minimumStockQuantity' => 'Minimální skladové množství',
      'dismantlable' => 'Rozebiratelný',
      'goodsReceipts' => 'Příjemky',
      'descriptionEn' => 'Popis EN',
      'descriptionDe' => 'Popis DE',
      'nameDE' => 'Name DE',
      'image' => 'Image',
      'quoteItem' => 'Quote Item',
      'salesOrders' => 'Sales Orders',
      'isModel' => 'IsModel',
      'isArchive' => 'IsArchive',
      'isIgnored' => 'Is Ignored',
      'warehouse' => 'Warehouse',
      'defaultProductionModel' => 'Production Model',
      'warehouseCategory' => 'WarehouseCategory',
      'isInvisible' => 'IsInvisible',
      'isHidden' => 'IsHidden',
      'defaultWarehouseId' => 'DefaultWarehouseId',
      'listPrice' => 'List Price',
      'listPriceCurrency' => 'List Price (Currency)',
      'listPriceConverted' => 'List Price (Converted)',
      'unitPrice' => 'Unit Price',
      'unitPriceCurrency' => 'Unit Price (Currency)',
      'unitPriceConverted' => 'Unit Price (Converted)'
    ],
    'links' => [
      'category' => 'Category',
      'attachments' => 'Attachments',
      'taxClass' => 'Tax Class',
      'warehouses' => 'Warehouses',
      'documents' => 'Documents',
      'quotes' => 'Quotes',
      'quote' => 'Quote',
      'quoteTransport' => 'Doprava nabídky',
      'komponenty' => 'Komponenty',
      'components' => 'Komponenty',
      'requestItem' => 'Položka žádanky',
      'productDatabase' => 'Product Database',
      'productDatabase1' => 'Product Database1',
      'productDatabase12' => 'Product Database12',
      'productDatabases' => 'Databáze produktů',
      'produktyPepa' => 'Peordukty Pepa',
      'businessProject' => 'Business Project',
      'goodsReceipts' => 'Příjemky',
      'quoteItem' => 'Quote Item',
      'salesOrders' => 'Sales Orders',
      'warehouse' => 'Warehouse'
    ],
    'options' => [
      'type' => [
        'Normal' => 'Normal',
        'Service' => 'Service',
        'Warehouse Item' => 'Warehouse Item',
        'Product' => 'Product (Manufactured)'
      ],
      'pricingType' => [
        'No Price' => 'No Price',
        'Fixed Sales Price' => 'Fixed Sales Price',
        'Markup over Cost' => 'Markup over Cost',
        'Profit Margin' => 'Profit Margin',
        'Same as Cost Price' => 'Same as Cost Price'
      ],
      'unit' => [
        'pcs' => 'pcs',
        'km' => 'km',
        'h' => 'h',
        'unit' => 'unit',
        'day' => 'day',
        'm' => 'm',
        'hod' => 'hod',
        'ks' => 'ks',
        'set' => 'set',
        'kg' => 'kg',
        'g' => 'g'
      ],
      'priceJesenoCurrency' => []
    ],
    'label' => [
      'Stock Info' => 'Stock Info'
    ],
    'presetFilters' => [
      'stockable' => 'Stockable'
    ],
    'tooltips' => [
      'type' => '**Warehouse Items** can be stored in warehouses.',
      'averagePrice' => 'The weighted average price of all items.',
      'totalPrice' => 'The total price of all items.'
    ]
  ],
  'ProductCategory' => [
    'labels' => [
      'Create ProductCategory' => 'Create Product Category',
      'Manage Categories' => 'Manage Categories',
      'Products' => 'Products'
    ],
    'links' => [
      'products' => 'Products',
      'warehouses' => 'Warehouses'
    ],
    'fields' => [
      'warehouses' => 'Warehouses'
    ]
  ],
  'TaxClass' => [
    'labels' => [
      'Create TaxClass' => 'Create Tax Class'
    ],
    'fields' => [
      'rate' => 'Rate',
      'name' => 'Name',
      'description' => 'Description'
    ]
  ],
  'AdvanceDeductionItem' => [
    'fields' => [
      'name' => 'Name',
      'qty' => 'Qty',
      'quantity' => 'Quantity',
      'listPrice' => 'List Price',
      'listPriceWithTax' => 'List Price Tax Inc.',
      'unitPrice' => 'Unit Price',
      'unitPriceWithTax' => 'Unit Price Tax Inc.',
      'amount' => 'Amount',
      'amountWithTax' => 'Amount Tax Inc.',
      'taxRate' => 'Tax Rate',
      'product' => 'Product',
      'order' => 'Line Number',
      'invoice' => 'Invoice',
      'weight' => 'Weight',
      'unitWeight' => 'Unit Weight',
      'description' => 'Description',
      'discount' => 'Discount (%)',
      'amountConverted' => 'Amount (Converted)',
      'unitPriceConverted' => 'Unit Price (Converted)',
      'listPriceConverted' => 'List Price (Converted)',
      'account' => 'Account',
      'listPriceCurrency' => 'List Price Currency',
      'unitPriceCurrency' => 'Unit Price Currency',
      'amountCurrency' => 'Amount Currency',
      'invoiceStatus' => 'Invoice Status'
    ],
    'links' => [
      'invoice' => 'Invoice',
      'product' => 'Product',
      'account' => 'Account'
    ],
    'labels' => [
      'Invoices' => 'Invoices'
    ]
  ],
  'DeliveryNote' => [
    'fields' => [
      'document' => 'Document',
      'number' => 'Number',
      'issueDate' => 'Issue Date',
      'recieverAddress' => 'Reciever Address',
      'recieverAddressStreet' => 'Reciever Street',
      'recieverAddressCity' => 'Reciever City',
      'recieverAddressState' => 'Reciever State',
      'recieverAddressCountry' => 'Reciever Country',
      'recieverAddressPostalCode' => 'Reciever Postal Code',
      'recieverAddressMap' => 'Reciever Map',
      'invoice' => 'Invoice',
      'supplierInvoice' => 'Supplier Invoice'
    ],
    'links' => [
      'document' => 'Document',
      'invoice' => 'Invoice',
      'supplierInvoice' => 'Supplier Invoice'
    ],
    'labels' => [
      'Create DeliveryNote' => 'Create Delivery Note'
    ]
  ],
  'GoodsIssue' => [
    'messages' => [
      'goodsIssueIsProcessing' => 'Cannot cancel Sales Order, because there is some processing Goods Issue',
      'reversionName' => 'Reversion of %s'
    ],
    'fields' => [
      'warehouse' => 'Warehouse',
      'selectedItems' => 'Selected Items',
      'items' => 'Items to issue',
      'status' => 'Status',
      'parent' => 'Rodič',
      'reclamation' => 'Reclamation',
      'numberA' => 'Číslo výdejky'
    ],
    'labels' => [
      'Process' => 'Process',
      'Create GoodsIssue' => 'Create Goods Issue',
      'Create GoodsReceipt' => 'Create Goods Receipt',
      'Items' => 'Items',
      'Reserve' => 'Reserve',
      'Revert Goods Issue' => 'Revert Goods Issue',
      'Goods Issues' => 'Goods Issues'
    ],
    'tooltips' => [
      'selectedItems' => 'Selected products to issue.',
      'items' => 'Automatically chosen warehouse items to issue based on availability of selected items. Will be selected after reservation.'
    ],
    'options' => [
      'status' => [
        'Draft' => 'Draft',
        'Reserving' => 'Reserving',
        'Reserved' => 'Reserved',
        'Processing' => 'Processing',
        'Issued' => 'Issued',
        'Canceled' => 'Canceled'
      ]
    ],
    'links' => [
      'parent' => 'Rodič',
      'reclamation' => 'Reclamation'
    ]
  ],
  'HandoverProtocol' => [
    'fields' => [
      'senderAddress' => 'Sender Address',
      'senderAddressStreet' => 'Sender Street',
      'senderAddressCity' => 'Sender City',
      'senderAddressState' => 'Sender State',
      'senderAddressCountry' => 'Sender Country',
      'senderAddressPostalCode' => 'Sender Postal Code',
      'senderAddressMap' => 'Sender Map',
      'recieverAddress' => 'Reciever Address',
      'recieverAddressStreet' => 'Reciever Street',
      'recieverAddressCity' => 'Reciever City',
      'recieverAddressState' => 'Reciever State',
      'recieverAddressCountry' => 'Reciever Country',
      'recieverAddressPostalCode' => 'Reciever Postal Code',
      'recieverAddressMap' => 'Reciever Map',
      'printedDate' => 'Printed Date',
      'hasDocumentation' => 'Documentation',
      'customerRegistrationNumber' => 'Customer Registration Number',
      'contractorRegistrationNumber' => 'Contractor Registration Number',
      'number' => 'Number',
      'document' => 'Document',
      'invoice' => 'Invoice',
      'supplierInvoice' => 'Supplier Invoice'
    ],
    'links' => [
      'document' => 'Document',
      'invoice' => 'Invoice',
      'supplierInvoice' => 'Supplier Invoice'
    ],
    'labels' => [
      'Create HandoverProtocol' => 'Create Handover Protocol'
    ]
  ],
  'Invoice' => [
    'labels' => [
      'Create Invoice' => 'Create Invoice',
      'Tax Classes' => 'Tax Classes',
      'Templates' => 'Templates',
      'Items' => 'Items',
      'Email PDF' => 'Email PDF',
      'Invoice Items' => 'Invoice Items',
      'itemDiscount' => 'Item Discount',
      'orderDiscount' => 'Order Discount',
      'Export to ISDOC' => 'Export to ISDOC'
    ],
    'fields' => [
      'status' => 'Status',
      'number' => 'Invoice number',
      'numberA' => 'Number (auto-incremented)',
      'account' => 'Account',
      'quote' => 'Quote',
      'salesOrder' => 'Sales Order',
      'billingAddress' => 'Billing Address',
      'shippingAddress' => 'Shipping Address',
      'billingContact' => 'Billing Contact',
      'shippingContact' => 'Shipping Contact',
      'taxClass' => 'Tax Class',
      'taxRate' => 'Tax Rate',
      'shippingCost' => 'Shipping Cost',
      'taxAmount' => 'VAT',
      'discountAmount' => 'Discount Amount',
      'amount' => 'Total without VAT',
      'preDiscountedAmount' => 'Pre-Discount Amount',
      'grandTotalAmount' => 'Total with VAT',
      'dateInvoiced' => 'Date Invoiced',
      'weight' => 'Weight',
      'amountConverted' => 'Amount (converted)',
      'taxAmountConverted' => 'Tax Amount (converted)',
      'shippingCostConverted' => 'Shipping Cost (converted)',
      'preDiscountedAmountConverted' => 'Pre-Discount Amount (converted)',
      'discountAmountConverted' => 'Discount Amount (converted)',
      'grandTotalAmountConverted' => 'Grand Total Amount (converted)',
      'shippingCostCurrency' => 'Shipping Cost Currency',
      'taxAmountCurrency' => 'Tax Amount Currency',
      'discountAmountCurrency' => 'Discount Amount Currency',
      'amountCurrency' => 'Amount Currency',
      'preDiscountedAmountCurrency' => 'Pre-Discount Amount Currency',
      'grandTotalAmountCurrency' => 'Grand Total Amount Currency',
      'currency' => 'Currency',
      'discount' => 'Discount',
      'processed' => 'Pohoda Import',
      'constantSymbol' => 'Constant symbol',
      'datePaid' => 'Date of payment',
      'dueDate' => 'Due date',
      'duzp' => 'Date of taxable supply',
      'variableSymbol' => 'Variable symbol',
      'paymentMethod' => 'Payment method',
      'orderNumber' => 'Order number',
      'remainsToPay' => 'Amount remaining',
      'warehouse' => 'Warehouse',
      'note' => 'Private note',
      'textBeforeItems' => 'Sentence before invoice items',
      'textAfterItems' => 'Invoice footer',
      'reverseCharge' => 'Reverse charge',
      'fakturaceDoZahranici' => 'Invoice to foreign country',
      'contact' => 'Contact',
      'supplierName' => 'Name',
      'supplierAddress' => 'Address',
      'supplierAddressStreet' => 'Street',
      'supplierAddressCity' => 'City',
      'supplierAddressState' => 'State',
      'supplierAddressCountry' => 'Country',
      'supplierAddressPostalCode' => 'Postal code',
      'supplierAddressMap' => 'Map',
      'supplierEmail' => 'Email',
      'supplierPhone' => 'Phone',
      'supplierWebsite' => 'Website',
      'supplierVATpayer' => 'VAT payer',
      'supplierVatId' => 'VAT ID',
      'supplierSicCode' => 'Company ID',
      'subscriberName' => 'Name',
      'subscriberAddress' => 'Address',
      'subscriberAddressStreet' => 'Street',
      'subscriberAddressCity' => 'City',
      'subscriberAddressState' => 'State',
      'subscriberAddressCountry' => 'Country',
      'subscriberAddressPostalCode' => 'Postal code',
      'subscriberAddressMap' => 'Map',
      'subscriberSicCode' => 'Company ID',
      'subscriberVatId' => 'VAT ID',
      'subscriberShippingAddress' => 'Shipping address',
      'subscriberShippingAddressCity' => 'City',
      'subscriberShippingAddressCountry' => 'Country',
      'subscriberShippingAddressMap' => 'Map',
      'subscriberShippingAddressPostalCode' => 'Postal code',
      'subscriberShippingAddressState' => 'State',
      'subscriberShippingAddressStreet' => 'Street',
      'subscriberBillingAddress' => 'Billing address',
      'subscriberBillingAddressCity' => 'City',
      'subscriberBillingAddressCountry' => 'Country',
      'subscriberBillingAddressMap' => 'Map',
      'subscriberBillingAddressPostalCode' => 'Postal code',
      'subscriberBillingAddressState' => 'State',
      'subscriberBillingAddressStreet' => 'Street',
      'subscriberNote' => 'Note',
      'accountNumber' => 'Account number',
      'iban' => 'IBAN',
      'swift' => 'SWIFT/BIC',
      'supplyCode' => 'Supply code',
      'assignedUser' => 'Assigned user / Issued by',
      'subscriberLink' => 'Subscriber',
      'partialPaymentses' => 'Partial Paymentses',
      'partialPayments' => 'Partial Payments',
      'amountRound' => 'Rounding of the total amount',
      'vatFromRoundedTotal' => 'Vat From Rounded Total',
      'taxRound' => 'TaxRound',
      'amountRoundTo' => 'AmountRoundTo',
      'payday' => 'Datum splatnosti'
    ],
    'links' => [
      'items' => 'Items',
      'billingContact' => 'Billing Contact',
      'shippingContact' => 'Shipping Contact',
      'account' => 'Account',
      'taxClass' => 'Tax Class',
      'quote' => 'Quote',
      'salesOrder' => 'Sales Order',
      'subscriberLink' => 'Subscriber',
      'partialPaymentses' => 'Partial Paymentses',
      'partialPayments' => 'Partial Payments'
    ],
    'options' => [
      'status' => [
        'Draft' => 'Draft',
        'In Review' => 'In Review',
        'Confirmed' => 'Confirmed',
        'Paid' => 'Paid',
        'Rejected' => 'Rejected',
        'Canceled' => 'Canceled',
        'Issued' => 'Issued',
        'Sent' => 'Sent',
        'Partially Paid' => 'Partially Paid'
      ],
      'supplierVATpayer' => [
        'Non VAT payer' => 'Non-VAT payer',
        'Identified person' => 'Identified person',
        'VAT payer' => 'VAT payer'
      ],
      'supplyCode' => [
        '' => 'For reporting of invoices subject to reverse charge',
        1 => '1 – Supply of gold (fulfillment according to § 92b)',
        '1a' => '1a – Gold – intermediary supply of investment gold',
        3 => '3 – Supply of immovable property, if VAT is applied to such supply (fulfillment according to § 92d)',
        '3a' => '3a – Supply of immovable property in compulsory auction',
        4 => '4 – Provision of construction or assembly work (fulfillment according to § 92e)',
        '4a' => '4a – Construction and assembly work – provision of workers',
        5 => '5 – Goods listed in Annex No. 5 to the VAT Act (fulfillment according to § 92c)',
        6 => '6 – Supply of goods originally provided as a guarantee',
        7 => '7 – Supply of goods after transfer of reservation of ownership',
        11 => '11 – Transfer of allowances for greenhouse gas emissions',
        12 => '12 – Cereals and technical crops',
        13 => '13 – Metals, including precious metals',
        14 => '14 – Mobile phones',
        15 => '15 – Integrated circuits and printed circuit boards',
        16 => '16 – Portable devices for automated data processing (e.g. tablets or laptops)',
        17 => '17 – Video game consoles',
        18 => '18 – Supply of electricity certificates',
        19 => '19 – Supply of electricity through systems or networks to a trader',
        20 => '20 – Supply of gas through systems or networks to a trader',
        21 => '21 – Provision of defined electronic communication services'
      ],
      'amountRound' => [
        'dontRound' => 'dontRound',
        'RoundUp' => 'RoundUp',
        'RoundDown' => 'RoundDown',
        'upRound' => 'upRound',
        'downRound' => 'downRound',
        'mathRound' => 'mathRound'
      ],
      'taxRound' => [
        'RoundUp' => 'RoundUp',
        'RoundDown' => 'RoundDown',
        'AllRound.1' => 'AllRound.1',
        'AllRound.5' => 'AllRound.5',
        'AllRound1' => 'AllRound1',
        'ItesRound.1' => 'ItesRound.1',
        'ItesRound.5' => 'ItesRound.5',
        'ItesRound1' => 'ItesRound1',
        'DontRound' => 'DontRound',
        'allRound.1' => 'allRound.1',
        'allRound.5' => 'allRound.5',
        'allRound1' => 'allRound1',
        'itesRound.1' => 'itesRound.1',
        'itesRound.5' => 'itesRound.5',
        'itesRound1' => 'itesRound1',
        'dontRound' => 'dontRound'
      ],
      'amountRoundTo' => [
        'decimals' => 'decimals',
        'fifties' => 'fifties',
        'whole' => 'whole'
      ],
      'paymentMethod' => [
        'draft' => 'draft',
        'cash' => 'cash',
        'postal delivery' => 'postal delivery',
        'creditcard' => 'creditcard',
        'advance' => 'advance',
        'encashment' => 'encashment',
        'cheque' => 'cheque',
        'compensation' => 'compensation'
      ]
    ],
    'tooltips' => [
      'number' => 'Unique identifier of the invoice used for identifying the issued document',
      'paymentMethod' => 'The way in which the invoice will be paid (e.g. by transfer, in cash, by card, etc.)',
      'dateInvoiced' => 'The date when the invoice was issued',
      'dueDate' => 'The date by which the invoice must be paid',
      'constantSymbol' => 'Unique identifier of the subject in the given payment system. Max. length is 10 characters.',
      'duzp' => 'The date when the taxable service or sale for which the invoice was issued was performed',
      'variableSymbol' => 'Variable symbol is used to identify the invoice in the bank system. Max. length is 10 characters.'
    ],
    'massActions' => [
      'zipIsdocs' => 'Export to ISDOC (.zip)'
    ]
  ],
  'InvoiceItem' => [
    'fields' => [
      'name' => 'Description',
      'qty' => 'Quantity',
      'quantity' => 'Quantity',
      'listPrice' => 'List Price',
      'listPriceWithTax' => 'List Price Tax Inc.',
      'unitPrice' => 'Price per unit',
      'unitPriceWithTax' => 'Unit Price Tax Inc.',
      'amount' => 'Total excl. VAT',
      'amountWithTax' => 'Amount Tax Inc.',
      'taxRate' => 'VAT rate (%)',
      'product' => 'Product',
      'order' => 'Line Number',
      'invoice' => 'Invoice',
      'weight' => 'Weight',
      'unitWeight' => 'Unit Weight',
      'description' => 'Description',
      'discount' => 'Discount (%)',
      'amountConverted' => 'Amount (Converted)',
      'unitPriceConverted' => 'Unit Price (Converted)',
      'listPriceConverted' => 'List Price (Converted)',
      'account' => 'Account',
      'listPriceCurrency' => 'List Price Currency',
      'unitPriceCurrency' => 'Unit Price Currency',
      'amountCurrency' => 'Amount Currency',
      'invoiceStatus' => 'Invoice Status',
      'unit' => 'Unit'
    ],
    'links' => [
      'invoice' => 'Invoice',
      'product' => 'Product',
      'account' => 'Account'
    ],
    'labels' => [
      'Invoices' => 'Invoices'
    ]
  ],
  'PurchaseOrder' => [
    'labels' => [
      'Create PurchaseOrder' => 'Create Purchase Order',
      'Tax Classes' => 'Tax Classes',
      'Templates' => 'Templates',
      'Items' => 'Items',
      'Email PDF' => 'Email PDF',
      'Sales Order Items' => 'Sales Order Items'
    ],
    'fields' => [
      'status' => 'Status',
      'number' => 'Sales Order Number',
      'numberA' => 'Sales Order Number (auto-incremented)',
      'account' => 'Account',
      'billingAddress' => 'Billing Address',
      'shippingAddress' => 'Shipping Address',
      'billingContact' => 'Billing Contact',
      'shippingContact' => 'Shipping Contact',
      'taxCLass' => 'Tax Class',
      'taxRate' => 'Tax Rate',
      'taxAmount' => 'Tax Amount',
      'discountAmount' => 'Discount Amount',
      'amount' => 'Amount',
      'preDiscountedAmount' => 'Pre-Discount Amount',
      'grandTotalAmount' => 'Grand Total Amount',
      'dateOrdered' => 'Date Ordered',
      'weight' => 'Weight',
      'amountConverted' => 'Amount (converted)',
      'taxAmountConverted' => 'Tax Amount (converted)',
      'shippingCostConverted' => 'Shipping Cost (converted)',
      'preDiscountedAmountConverted' => 'Pre-Discount Amount (converted)',
      'discountAmountConverted' => 'Discount Amount (converted)',
      'grandTotalAmountConverted' => 'Grand Total Amount (converted)',
      'shippingCostCurrency' => 'Shipping Cost Currency',
      'taxAmountCurrency' => 'Tax Amount Currency',
      'discountAmountCurrency' => 'Discount Amount Currency',
      'amountCurrency' => 'Amount Currency',
      'preDiscountedAmountCurrency' => 'Pre-Discount Amount Currency',
      'grandTotalAmountCurrency' => 'Grand Total Amount Currency',
      'currency' => 'Currency'
    ],
    'links' => [
      'items' => 'Items',
      'billingContact' => 'Billing Contact',
      'shippingContact' => 'Shipping Contact',
      'account' => 'Account',
      'taxClass' => 'Tax Class',
      'invoices' => 'Invoices',
      'quote' => 'Quote',
      'supplierInvoices' => 'Supplier Invoices'
    ],
    'options' => [
      'status' => [
        'Draft' => 'Draft',
        'Ready' => 'Ready',
        'Active' => 'Active',
        'Approved' => 'Approved',
        'Completed' => 'Completed',
        'Rejected' => 'Rejected',
        'Canceled' => 'Canceled'
      ],
      'paymentMethod' => [
        'bank' => 'Bank transfer',
        'card' => 'Card',
        'cash' => 'Cash',
        'cod' => 'Cash on delivery'
      ]
    ]
  ],
  'PurchaseOrderItem' => [
    'fields' => [
      'name' => 'Name',
      'qty' => 'Qty',
      'quantity' => 'Quantity',
      'unitPrice' => 'Unit Price',
      'unitPriceWithTax' => 'Unit Price Tax Inc.',
      'amount' => 'Amount',
      'amountWithTax' => 'Amount Tax Inc.',
      'taxRate' => 'Tax Rate',
      'product' => 'Product',
      'order' => 'Line Number',
      'purchaseOrder' => 'Purchase Order',
      'weight' => 'Weight',
      'unitWeight' => 'Unit Weight',
      'description' => 'Description',
      'discount' => 'Discount (%)',
      'amountConverted' => 'Amount (Converted)',
      'unitPriceConverted' => 'Unit Price (Converted)',
      'listPriceConverted' => 'List Price (Converted)',
      'account' => 'Account',
      'listPriceCurrency' => 'List Price Currency',
      'unitPriceCurrency' => 'Unit Price Currency',
      'amountCurrency' => 'Amount Currency'
    ],
    'links' => [
      'purchaseOrder' => 'Purchase Order',
      'product' => 'Product',
      'account' => 'Account'
    ],
    'labels' => [
      'Purchase Orders' => 'Purchase Orders'
    ]
  ],
  'Quote' => [
    'labels' => [
      'Create Quote' => 'Create Quote',
      'Tax Classes' => 'Tax Classes',
      'Templates' => 'Templates',
      'Items' => 'Items',
      'Email PDF' => 'Email PDF',
      'Quote Items' => 'Quote Items',
      'Select Sales Order Items' => 'Select Sales Order Items',
      'Select' => 'Select',
      'Convert to Sales Order' => 'Convert to Sales Order'
    ],
    'fields' => [
      'status' => 'Status',
      'number' => 'Quote Number',
      'numberA' => 'Quote Number (auto-incremented)',
      'account' => 'Organizace',
      'billingAddress' => 'Billing Address',
      'shippingAddress' => 'Shipping Address',
      'billingContact' => 'Billing Contact',
      'shippingContact' => 'Shipping Contact',
      'taxCLass' => 'Tax Class',
      'taxRate' => 'Tax Rate',
      'shippingCost' => 'Shipping Cost',
      'taxAmount' => 'Tax Amount',
      'discountAmount' => 'Discount Amount',
      'amount' => 'Amount',
      'preDiscountedAmount' => 'Pre-Discount Amount',
      'grandTotalAmount' => 'Grand Total Amount',
      'dateQuoted' => 'Date Quoted',
      'dateOrdered' => 'Date Ordered',
      'dateInvoiced' => 'Date Invoiced',
      'weight' => 'Weight',
      'amountConverted' => 'Amount (converted)',
      'taxAmountConverted' => 'Tax Amount (converted)',
      'shippingCostConverted' => 'Shipping Cost (converted)',
      'preDiscountedAmountConverted' => 'Pre-Discount Amount (converted)',
      'discountAmountConverted' => 'Discount Amount (converted)',
      'grandTotalAmountConverted' => 'Grand Total Amount (converted)',
      'shippingCostCurrency' => 'Shipping Cost Currency',
      'taxAmountCurrency' => 'Tax Amount Currency',
      'discountAmountCurrency' => 'Discount Amount Currency',
      'amountCurrency' => 'Amount Currency',
      'preDiscountedAmountCurrency' => 'Pre-Discount Amount Currency',
      'grandTotalAmountCurrency' => 'Grand Total Amount Currency',
      'currency' => 'Currency',
      'validUntil' => 'Platnost nabídky',
      'parentQuote' => 'Nabídka',
      'alisSolution' => 'ALIS řešení',
      'documents' => 'Dokumenty',
      'parent' => 'Parent',
      'businessProject' => 'Parent',
      'tasks' => 'Úkol',
      'quotes' => 'quotes',
      'firma' => 'Firma',
      'products' => 'Products',
      'quoteItem' => 'Doprava',
      'stavZamitnuta' => 'Modifikovaná - důvod',
      'stavProhrana' => 'Prohraná - důvod',
      'transportcosts' => 'Dopravné',
      'accomodationCost' => 'Náklady na ubytování',
      'accomodationCostCurrency' => 'Náklady na ubytování (Měna)',
      'accomodationCostConverted' => 'Náklady na ubytování (Převedeno)',
      'installationRequirements' => 'requirements',
      'conditions' => 'Podmínky instalace',
      'specification' => 'Obecné zadání',
      'solutionGeneral' => 'Obecné řešení',
      'km' => 'Počet km',
      'h' => 'Počet h',
      'hTransport' => 'hTransport',
      'kmTransport' => 'kmTransport',
      'enduser' => 'End-user',
      'priceList' => 'Ceník',
      'noConditions' => 'Nechci tisknout instalační podmínky',
      'accommodation' => 'Ubytování',
      'czechConditions' => 'Chci instalační podmínky v češtině',
      'conditionsCZ' => 'Podmínky instalace',
      'quoteEntries' => 'Quote Entries',
      'files' => 'Přílohy',
      'opportunity' => 'Příležitost',
      'opportunities' => 'Opportunities',
      'salesOrder' => 'Zakázka',
      'product' => 'Product',
      'products1' => 'Products1',
      'priceC' => 'Cena C',
      'priceCCurrency' => 'Cena C (Měna)',
      'priceCConverted' => 'Cena C (Převedeno)',
      'priceLists' => 'Price Lists',
      'useCases' => 'Use Cases'
    ],
    'links' => [
      'items' => 'Items',
      'billingContact' => 'Billing Contact',
      'shippingContact' => 'Shipping Contact',
      'account' => 'Account',
      'taxClass' => 'Tax Class',
      'invoices' => 'Invoices',
      'salesOrders' => 'Sales Orders',
      'quoteProject' => 'Projekty',
      'parentQuote' => 'Nabídka',
      'documents' => 'Dokumenty',
      'parent' => 'Parent',
      'businessProject' => 'Parent',
      'tasks' => 'Úkol',
      'quotes' => 'quotes',
      'tasksAnother' => 'Úkoly',
      'firma' => 'Firma',
      'products' => 'Products',
      'quoteItem' => 'Doprava',
      'transportcosts' => 'Dopravné',
      'quoteEntries' => 'Quote Entries',
      'priceList' => 'Ceník',
      'opportunity' => 'Příležitost',
      'opportunities' => 'Opportunities',
      'salesOrder' => 'Zakázka',
      'product' => 'Product',
      'products1' => 'Products1',
      'priceLists' => 'Price Lists',
      'complaintBooks' => 'Complaint Books',
      'useCases' => 'Use Cases',
      'manufacturings' => 'Manufacturing'
    ],
    'options' => [
      'status' => [
        'Draft' => 'Draft',
        'In Review' => 'In Review',
        'Presented' => 'Presented',
        'Approved' => 'Approved',
        'Rejected' => 'Rejected',
        'Canceled' => 'Canceled'
      ],
      'alisSolution' => [
        'ALIS Vizualizace' => 'ALIS Vizualizace',
        'ALIS Shield' => 'ALIS Shield',
        'ALIS RTLS' => 'ALIS RTLS',
        'ALIS Medical' => 'ALIS Medical',
        'ALIS System' => 'ALIS System'
      ],
      'stavZamitnuta' => [
        'Změna zadání' => 'Změna zadání',
        'Přeceněno se slevou' => 'Přeceněno se slevou'
      ],
      'stavProhrana' => [
        'Vysoká cena' => 'Vysoká cena',
        'Zákazník zvolil konkurenci' => 'Zákazník zvolil konkurenci',
        'Chybné technické řešení' => 'Chybné technické řešení',
        'Mimo rozpočet' => 'Mimo rozpočet',
        'Jiné' => 'Jiné',
        ' ' => ' '
      ],
      'priceList' => [
        'C' => 'Group C',
        'B' => 'Group B',
        'A' => 'Group A'
      ]
    ]
  ],
  'QuoteItem' => [
    'fields' => [
      'name' => 'Kód produktu',
      'qty' => 'Qty',
      'quantity' => 'Quantity',
      'listPrice' => 'Unit Price',
      'listPriceWithTax' => 'List Price Tax Inc.',
      'unitPrice' => 'List Price',
      'unitPriceWithTax' => 'Unit Price Tax Inc.',
      'amount' => 'Amount',
      'amountWithTax' => 'Amount Tax Inc.',
      'taxRate' => 'Tax Rate',
      'product' => 'Product',
      'order' => 'Line Number',
      'quote' => 'Quote',
      'weight' => 'Weight',
      'unitWeight' => 'Unit Weight',
      'description' => 'Description',
      'discount' => 'Discount (%)',
      'amountConverted' => 'Amount (Converted)',
      'unitPriceConverted' => 'Unit Price (Converted)',
      'listPriceConverted' => 'List Price (Converted)',
      'account' => 'Account',
      'listPriceCurrency' => 'List Price Currency',
      'unitPriceCurrency' => 'Unit Price Currency',
      'amountCurrency' => 'Amount Currency',
      'colisionPlace' => 'Kolizní místo',
      'unit' => 'Jednotka',
      'quote1' => 'Nabídka',
      'files' => 'Přílohy',
      'products' => 'Products',
      'kod' => 'Name',
      'productDescription' => 'ProductDescription'
    ],
    'links' => [
      'Quote' => 'Quote',
      'product' => 'Product',
      'account' => 'Account',
      'quote1' => 'Nabídka',
      'products' => 'Products'
    ],
    'labels' => [
      'Quotes' => 'Quotes'
    ],
    'options' => [
      'colisionPlace' => [
        1 => '1',
        2 => '2',
        3 => '3',
        4 => '4',
        5 => '5'
      ],
      'unit' => [
        'pcs' => 'pcs',
        'km' => 'km',
        'h' => 'h',
        'unit' => 'unit'
      ]
    ]
  ],
  'SalesOrder' => [
    'labels' => [
      'Create SalesOrder' => 'Create Sales Order',
      'Tax Classes' => 'Tax Classes',
      'Templates' => 'Templates',
      'Items' => 'Items',
      'Email PDF' => 'Email PDF',
      'Sales Order Items' => 'Sales Order Items',
      'ProcessSalesOrder' => 'Process Sales Order'
    ],
    'fields' => [
      'status' => 'Status',
      'quote' => 'Quote',
      'number' => 'Sales Order Number',
      'numberA' => 'Sales Order Number (auto-incremented)',
      'account' => 'Organizace',
      'billingAddress' => 'Billing Address',
      'shippingAddress' => 'Shipping Address',
      'billingContact' => 'Billing Contact',
      'shippingContact' => 'Shipping Contact',
      'taxCLass' => 'Tax Class',
      'taxRate' => 'Tax Rate',
      'shippingCost' => 'Shipping Cost',
      'taxAmount' => 'Tax Amount',
      'discountAmount' => 'Discount Amount',
      'amount' => 'Amount',
      'preDiscountedAmount' => 'Pre-Discount Amount',
      'grandTotalAmount' => 'Grand Total Amount',
      'dateOrdered' => 'Date Ordered',
      'weight' => 'Weight',
      'amountConverted' => 'Amount (converted)',
      'taxAmountConverted' => 'Tax Amount (converted)',
      'shippingCostConverted' => 'Shipping Cost (converted)',
      'preDiscountedAmountConverted' => 'Pre-Discount Amount (converted)',
      'discountAmountConverted' => 'Discount Amount (converted)',
      'grandTotalAmountConverted' => 'Grand Total Amount (converted)',
      'shippingCostCurrency' => 'Shipping Cost Currency',
      'taxAmountCurrency' => 'Tax Amount Currency',
      'discountAmountCurrency' => 'Discount Amount Currency',
      'amountCurrency' => 'Amount Currency',
      'preDiscountedAmountCurrency' => 'Pre-Discount Amount Currency',
      'grandTotalAmountCurrency' => 'Grand Total Amount Currency',
      'currency' => 'Currency',
      'shippingCostTaxRate' => 'Shipping Cost Tax Rate',
      'vatId' => 'Vat ID',
      'sicCode' => 'SIC Code',
      'deadline' => 'Deadline',
      'salesOrderSummaryItems' => 'Položka shrnutí zakázky',
      'opportunity' => 'Příležitost',
      'documents' => 'Dokumenty',
      'supplierInvoices' => 'Přijaté faktura',
      'supplierOrders' => 'Objednávky od dodavatele',
      'productDatabases' => 'Databáze produktů',
      'reclamations1' => 'Reclamations1',
      'reminder' => 'Připomínka',
      'enduser' => 'Enduser',
      'intertninazev' => 'Interní název',
      'visualization' => 'Vizualizace',
      'crane' => 'Crane',
      'shield' => 'ALIS Shield',
      'attachments' => 'Přílohy',
      'orderBanner' => 'Objednat',
      'internDeadline' => 'Interní deadline',
      'quotes' => 'Nabídky',
      'products' => 'Products',
      'salesOrderItem' => 'Sales Order Item',
      'order' => 'Order',
      'priceList' => 'Price List2',
      'priceType' => 'Price type',
      'complexity' => 'Complexity',
      'priceList1' => 'Price List',
      'typePrice' => 'TypePrice',
      'priorita' => 'Priorita',
      'testAmount' => 'TestAmount',
      'salesOrderItems' => 'Sales Order Items',
      'saleSorderReclamation' => 'SaleSorderReclamation',
      'startedProduction' => 'StartedProduction',
      'accommodation' => 'Ubytování',
      'accomodationCost' => 'Náklady na ubytování',
      'accomodationCostCurrency' => 'Náklady na ubytování (Currency)',
      'accomodationCostConverted' => 'Náklady na ubytování (Converted)',
      'warehouseItems' => 'Warehouse Items',
      'warehouseItem' => 'WarehouseItems',
      'warehouseItems1' => 'Warehouse Items1',
      'warehouseItemsList' => 'WarehouseItemsList',
      'wiso' => 'Wiso',
      'wisos' => 'Wisos',
      'itemsList' => 'Warehouse Items',
      'reservedQuantity' => 'ReservedQuantity',
      'reservQuantity' => 'Reserved Quantity',
      'manufacturings' => 'Manufacturings',
      'color' => 'Color'
    ],
    'links' => [
      'items' => 'Items',
      'billingContact' => 'Billing Contact',
      'shippingContact' => 'Shipping Contact',
      'account' => 'Account',
      'taxClass' => 'Tax Class',
      'invoices' => 'Invoices',
      'quote' => 'Quote',
      'salesOrderSummaryItems' => 'Položka shrnutí zakázky',
      'opportunity' => 'Příležitost',
      'documents' => 'Dokumenty',
      'supplierInvoices' => 'Přijaté faktura',
      'supplierOrders' => 'Objednávky od dodavatele',
      'productDatabases' => 'Databáze produktů',
      'reclamations1' => 'Reclamations1',
      'quotes' => 'Nabídky',
      'products' => 'Products',
      'salesOrderItem' => 'Sales Order Item',
      'salesOrderItems' => 'Sales Order Items',
      'priceList' => 'Price List',
      'priceList1' => 'Price List1',
      'salesOrderItemsView' => 'Sales Order Items View',
      'tasks' => 'Tasks',
      'complaintBooks' => 'Complaint Books',
      'warehouseItems' => 'Warehouse Items',
      'warehouseItems1' => 'Warehouse Items1',
      'wiso' => 'Wiso',
      'wisos' => 'Wisos',
      'manufacturings' => 'Manufacturings'
    ],
    'options' => [
      'status' => [
        'Draft' => 'Draft',
        'Ready' => 'Ready',
        'Active' => 'Active',
        'Approved' => 'Approved',
        'Completed' => 'Completed',
        'Rejected' => 'Rejected',
        'Canceled' => 'Canceled',
        'Not Started' => 'Not Started',
        'In Production' => 'In Production',
        'Ready To Go' => 'Ready To Go',
        'To Install' => 'To Install',
        'OnHold' => 'OnHold',
        'Invoice' => 'Invoice',
        'Finished' => 'Finished',
        'Returned' => 'Returned',
        'Zapujcka' => 'Zapujcka',
        'Cancelled' => 'Cancelled'
      ],
      'paymentMethod' => [
        'bank' => 'Bank transfer',
        'card' => 'Card',
        'cash' => 'Cash',
        'cod' => 'Cash on delivery'
      ],
      'complexity' => [
        'Easy' => 'Easy',
        'Hard' => 'Hard',
        '' => '',
        'Very Hard' => 'Very Hard',
        'Costom' => 'Costom'
      ],
      'priorita' => [
        '-' => '-',
        'Very High' => 'Very High',
        'High' => 'High',
        'Medium' => 'Medium',
        'Low' => 'Low',
        'Very low' => 'Very low'
      ]
    ],
    'confirmation' => [
      'processSalesOrderConfirmation' => 'Are you sure you want to process this sales order?'
    ],
    'messages' => [
      'processSalesOrderSuccess' => 'Sales order has been processed successfully.',
      'processSalesOrderFailed' => 'Failed to process sales order.'
    ],
    'tooltips' => [
      'productionStatus' => 'hello',
      'complexity' => 'Easy - 2 weeks for internal and deadline
Hard - 4 weeks for internal and external deadline
Very Hard - internal and external deadline must be set manually'
    ]
  ],
  'SalesOrderItem' => [
    'fields' => [
      'name' => 'Name',
      'qty' => 'Qty',
      'quantity' => 'Quantity',
      'listPrice' => 'Unit Price',
      'listPriceWithTax' => 'List Price Tax Inc.',
      'unitPrice' => 'List Price',
      'unitPriceWithTax' => 'Unit Price Tax Inc.',
      'amount' => 'Amount',
      'amountWithTax' => 'Amount Tax Inc.',
      'taxRate' => 'Tax Rate',
      'product' => 'Product',
      'order' => 'Line Number',
      'salesOrder' => 'Sales Order',
      'weight' => 'Weight',
      'unitWeight' => 'Unit Weight',
      'description' => 'Description',
      'discount' => 'Discount (%)',
      'amountConverted' => 'Amount (Converted)',
      'unitPriceConverted' => 'Unit Price (Converted)',
      'listPriceConverted' => 'List Price (Converted)',
      'account' => 'Account',
      'listPriceCurrency' => 'List Price Currency',
      'unitPriceCurrency' => 'Unit Price Currency',
      'amountCurrency' => 'Amount Currency',
      'files' => 'Dokumenty',
      'salesOrder1' => 'Sales Order1',
      'salesOrderView' => 'Sales OrderView',
      'salesOrder12' => 'Sales Order12',
      'kod' => 'Kod',
      'unit' => 'Jednotka',
      'productDescription' => 'ProductDescription'
    ],
    'links' => [
      'SalesOrder' => 'Sales Order',
      'product' => 'Product',
      'account' => 'Account',
      'salesOrder1' => 'Sales Order1',
      'salesOrderView' => 'Sales OrderView',
      'salesOrder12' => 'Sales Order12'
    ],
    'labels' => [
      'Sales Orders' => 'Sales Orders'
    ],
    'options' => [
      'unit' => [
        'pcs' => 'pcs',
        'km' => 'km',
        'h' => 'h',
        'unit' => 'unit'
      ]
    ]
  ],
  'SupplierInvoice' => [
    'labels' => [
      'Create SupplierInvoice' => 'Create Supplier Invoice',
      'Tax Classes' => 'Tax Classes',
      'Templates' => 'Templates',
      'Items' => 'Items',
      'Supplier Invoice Items' => 'Supplier Invoice Items'
    ],
    'fields' => [
      'status' => 'Status',
      'number' => 'Number',
      'numberA' => 'Number (auto-incremented)',
      'account' => 'Account',
      'billingAddress' => 'Billing Address',
      'billingContact' => 'Billing Contact',
      'taxClass' => 'Tax Class',
      'taxRate' => 'Tax Rate',
      'taxAmount' => 'Tax Amount',
      'amount' => 'Amount',
      'grandTotalAmount' => 'Grand Total Amount',
      'dateInvoiced' => 'Date Invoiced',
      'weight' => 'Weight',
      'amountConverted' => 'Amount (converted)',
      'taxAmountConverted' => 'Tax Amount (converted)',
      'grandTotalAmountConverted' => 'Grand Total Amount (converted)',
      'taxAmountCurrency' => 'Tax Amount Currency',
      'amountCurrency' => 'Amount Currency',
      'grandTotalAmountCurrency' => 'Grand Total Amount Currency',
      'currency' => 'Currency',
      'attachments' => 'Attachments',
      'processed' => 'Pohoda Import',
      'vatId' => 'VAT ID',
      'sicCode' => 'SIC Code',
      'salesOrder' => 'Zakázka',
      'totalAmount' => 'TotalAmount'
    ],
    'links' => [
      'items' => 'Items',
      'billingContact' => 'Billing Contact',
      'account' => 'Account',
      'taxClass' => 'Tax Class',
      'salesOrder' => 'Zakázka'
    ],
    'options' => [
      'status' => [
        'Draft' => 'Draft',
        'In Review' => 'In Review',
        'Confirmed' => 'Confirmed',
        'Paid' => 'Paid',
        'Rejected' => 'Rejected'
      ],
      'paymentMethod' => [
        'draft' => 'draft',
        'cash' => 'cash',
        'postal' => 'postal',
        'delivery' => 'delivery',
        'creditcard' => 'creditcard',
        'advance' => 'advance',
        'encashment' => 'encashment',
        'cheque' => 'cheque',
        'compensation' => 'compensation',
        'bank' => 'bank',
        '' => ''
      ]
    ]
  ],
  'SupplierInvoiceItem' => [
    'fields' => [
      'name' => 'Name',
      'qty' => 'Qty',
      'quantity' => 'Quantity',
      'unitPrice' => 'Unit Price',
      'unitPriceWithTax' => 'Unit Price Tax Inc.',
      'amount' => 'Amount',
      'amountWithTax' => 'Amount Tax Inc.',
      'taxRate' => 'Tax Rate',
      'product' => 'Product',
      'order' => 'Line Number',
      'supplierInvoice' => 'Supplier Invoice',
      'weight' => 'Weight',
      'unitWeight' => 'Unit Weight',
      'description' => 'Description',
      'amountConverted' => 'Amount (Converted)',
      'unitPriceConverted' => 'Unit Price (Converted)',
      'account' => 'Account',
      'unitPriceCurrency' => 'Unit Price Currency',
      'amountCurrency' => 'Amount Currency'
    ],
    'links' => [
      'supplierInvoice' => 'Supplier Invoice',
      'product' => 'Product',
      'account' => 'Account'
    ],
    'labels' => [
      'Supplier Invoices' => 'Supplier Invoices'
    ]
  ],
  'VatIdValidation' => [
    'fields' => [
      'name' => 'Vat ID',
      'valid' => 'Valid',
      'lastValidCheck' => 'Last Valid Check'
    ],
    'links' => [],
    'labels' => [
      'Create VatIdValidation' => 'Create Vat ID Validation'
    ]
  ],
  'Attendance' => [
    'labels' => [
      'Create Attendance' => 'Create Attendance',
      'Choose attendance type' => 'Choose attendance type',
      'Mark departure' => 'Mark departure',
      'Mark arrival' => 'Mark arrival'
    ],
    'fields' => [
      'dateStartDate' => 'Start Date (all day)',
      'dateStart' => 'Start Date',
      'dateEnd' => 'End Date',
      'dateEndDate' => 'End Date (all day)',
      'duration' => 'Duration',
      'isAllDay' => 'All Day',
      'reminders' => 'Reminders',
      'status' => 'Attendance Type'
    ],
    'options' => [
      'status' => [
        'V práci' => 'Working',
        'Dovolená' => 'Vacation',
        'Nemoc' => 'Sick',
        'Neplacené volno' => 'Unpaid leave'
      ]
    ]
  ],
  'EducationAndTrainingRecord' => [
    'labels' => [
      'Create EducationAndTrainingRecord' => 'Create Education and training record'
    ],
    'fields' => [
      'dateOfLastInspection' => 'Date of last inspection',
      'numberOfYearsForRepetition' => 'Number of years for repetition',
      'dateOfTheNextInspection' => 'Date of the next inspection'
    ]
  ],
  'HumanResource' => [
    'labels' => [
      'Create HumanResource' => 'Create HR employee'
    ],
    'fields' => [
      'educationAndTrainingRecords' => 'Education and Training Records',
      'medicalExaminations' => 'Medical Examinations',
      'otherEvents' => 'Other Events',
      'passwords' => 'Login Credentials Records',
      'amountOfBasicSalary' => 'Amount of Basic Salary',
      'variableSalary' => 'Variable Salary',
      'note' => 'Notes',
      'listOfCompetencesAndJobDuties' => 'List of Competences and Job Duties',
      'employmentRelationship' => 'Employment Relationship',
      'job' => 'Job Position',
      'employmentContract' => 'Contracts + Amendments',
      'birthdate' => 'Date of Birth',
      'permanentResidence' => 'Permanent Residence',
      'permanentResidenceStreet' => 'Permanent Residence Street',
      'permanentResidenceCity' => 'Permanent Residence City',
      'permanentResidenceState' => 'Permanent Residence State',
      'permanentResidenceCountry' => 'Permanent Residence Country',
      'permanentResidencePostalCode' => 'Permanent Residence ZIP Code',
      'permanentResidenceMap' => 'Permanent Residence Map',
      'bankAccountNumber' => 'Bank Account',
      'birthplace' => 'Place of Birth',
      'birthCertificateNumber' => 'Social Security Number',
      'citizenship' => 'Citizenship',
      'healthInsuranceCompany' => 'Health Insurance Company',
      'workStartDate' => 'Work Start Date',
      'employmentPeriod' => 'Employment Period (indefinite/fixed-term until xx yy zzzz)',
      'contractDate' => 'Contract Date',
      'testtime' => 'Employee\'s probationary (Number of months)',
      'guaranteedSalary' => 'Guaranteed Salary Group',
      'vacationRequests' => 'Vacation Requests',
      'vacationDays' => 'Number of Vacation Hours per Year',
      'vacationDaysLeft' => 'Remaining Number of Vacation Hours',
      'vacations' => 'Vacations',
      'user' => 'User',
      'phoneNumber' => 'Phone',
      'emailAddress' => 'Email',
      'isActual' => 'IsActive',
      'vacationTimeCorrection' => 'Úprava zůstatku dovolené'
    ],
    'links' => [
      'educationAndTrainingRecords' => 'Education and Training Records',
      'medicalExaminations' => 'Medical Examinations',
      'otherEvents' => 'Other Events',
      'passwords' => 'Login Credentials Records',
      'vacationRequests' => 'Vacation Requests',
      'vacations' => 'Vacations',
      'user' => 'User'
    ],
    'options' => [
      'employmentRelationship' => [
        'full-time' => 'Employee',
        'part-time' => 'Part-time',
        'gainfully employed person' => 'Self-Employed'
      ],
      'job' => [
        'Managing Director' => 'Managing Director',
        'Administrative Worker' => 'Administrative Worker',
        'Technician' => 'Technician',
        'Salesperson' => 'Salesperson'
      ],
      'testtime' => [
        1 => '1',
        2 => '2',
        3 => '3',
        '-' => '-'
      ],
      'guaranteedSalary' => [
        '------' => '------',
        '1.' => '1.',
        '2.' => '2.',
        '3.' => '3.',
        '4.' => '4.',
        '5.' => '5.',
        '6.' => '6.',
        '7.' => '7.',
        '8.' => '8.'
      ]
    ],
    'tooltips' => [
      'vacationTimeCorrection' => 'If you want to change value \'Remaining Number of Vacation Hours\' , just provide required value and update, after updating remove any value from this field and save again.'
    ]
  ],
  'MedicalExamination' => [
    'labels' => [
      'Create MedicalExamination' => 'Create Medical Examination'
    ],
    'fields' => [
      'dateOfLastInspection' => 'Date of Last Inspection',
      'numberOfYearsForRepetition' => 'Number of Years for Repetition',
      'dateOfTheNextInspection' => 'Date of the Next Inspection'
    ]
  ],
  'OtherEvent' => [
    'labels' => [
      'Create OtherEvent' => 'Create Other Event'
    ],
    'fields' => [
      'dateOfLastInspection' => 'Date of Last Event',
      'numberOfYearsForRepetition' => 'Number of Years for Repetition',
      'dateOfTheNextInspection' => 'Date of the Next Event',
      'type' => 'Type of Event'
    ]
  ],
  'Password' => [
    'labels' => [
      'Create Password' => 'Create Login Credentials Record'
    ],
    'fields' => [
      'system' => 'Name of the System for Login',
      'login' => 'Login',
      'password' => 'Password'
    ]
  ],
  'Vacation' => [
    'fields' => [
      'dateStart' => 'Date Start',
      'dateEnd' => 'Date End',
      'duration' => 'Duration',
      'status' => 'Status',
      'reminders' => 'Reminders',
      'dateStartDate' => 'Date Start (all day)',
      'dateEndDate' => 'Date End (all day)',
      'isAllDay' => 'Is All-Day',
      'vacationRequests' => 'Vacation Requests',
      'humanResource' => 'HR',
      'type' => 'Typ',
      'approved' => 'Schválení',
      'vacationTypes' => 'Vacation Types',
      'humanResources' => 'Human Resources'
    ],
    'links' => [
      'vacationRequests' => 'Vacation Requests',
      'humanResource' => 'HR',
      'vacationTypes' => 'Vacation Types',
      'humanResources' => 'Human Resources'
    ],
    'options' => [
      'status' => [
        'Planned' => 'Planned',
        'Held' => 'Held',
        'Not Held' => 'Not Held'
      ],
      'type' => [
        'Paid' => 'Dovolená',
        'NonPaid' => 'Neplacené volno',
        'exchange' => 'Náhradní volno',
        'medical' => 'Lékař',
        'sick' => 'Sick Day',
        'illness' => 'Pracovní neschopnost',
        'paidAbsence' => 'Placené volno '
      ],
      'approved' => [
        'waiting' => 'Čeká na schválení',
        'approved' => 'Schváleno',
        'declined' => 'Neschváleno'
      ]
    ],
    'labels' => [
      'Create Vacation' => 'Create Vacation',
      'Schedule Vacation' => 'Schedule Vacation',
      'Log Vacation' => 'Log Vacation',
      'Set Held' => 'Set Held',
      'Set Not Held' => 'Set Not Held'
    ],
    'massActions' => [
      'setHeld' => 'Set Held',
      'setNotHeld' => 'Set Not Held'
    ],
    'presetFilters' => [
      'planned' => 'Planned',
      'held' => 'Held',
      'todays' => 'Today\'s'
    ]
  ],
  'VacationApproval' => [
    'messages' => [
      'entityAlreadyApproved' => 'Entity is already approved or rejected.',
      'hrNotFound' => 'HR not found.',
      'fromDateBeforeToDate' => 'FROM date must be before TO date.',
      'notEnoughVacationDaysLeft' => 'Not enough vacation days left.'
    ],
    'labels' => [
      'employeeTraining' => 'Employee training',
      'employeeMedicalExamination' => 'Employee medical examination'
    ]
  ],
  'VacationRequest' => [
    'labels' => [
      'Create VacationRequest' => 'Create Vacation Request',
      'Approve Vacation Request' => 'Approve Vacation Request'
    ],
    'fields' => [
      'from' => 'From',
      'to' => 'To',
      'numberOfDays' => 'Number of hours',
      'numberOfDaysLeft' => 'Number of Remaining Vacation Hours for the User After Vacation',
      'numberOfDaysLeftBefore' => 'Number of Remaining Vacation hours for the User Before Vacation',
      'humanResource' => 'Human Resource',
      'statusOfApproval' => 'Approval Status',
      'vacationRequestApprovalItems' => 'Approval Process',
      'name' => 'Purpose of Vacation',
      'vacation' => 'Vacation',
      'type' => 'Type',
      'dateStart' => 'Date Start',
      'dateEnd' => 'Date End',
      'user' => 'User',
      'assignedUser' => 'Requested by',
      'humanResources' => 'Approved by',
      'timeBeforeVacation' => 'TimeBeforeVacation',
      'timeAfterVacation' => 'TimeAfterVacation',
      'timeVacation' => 'TimeVacation',
      'vacationDays' => 'Počet dní',
      'isApproved' => 'IsApproved'
    ],
    'options' => [
      'statusOfApproval' => [
        '' => 'Awaiting Approval',
        'Approved' => 'Schváleno',
        'Rejected' => 'Neschváleno',
        'Returned' => 'Vráceno k doplnění',
        'AwaitingApproval' => 'Čeká na schválení'
      ],
      'type' => [
        'Paid' => 'Dovolená',
        'NonPaid' => 'Neplacené volno',
        'Exchange' => 'Náhradní volno',
        'Medical' => 'Lékař',
        'Sick' => 'Sick Day',
        'Illness' => 'Pracovní neschopnost',
        'PaidAbsence' => 'Placené volno ',
        'Home office' => 'Home office'
      ]
    ],
    'tooltips' => [
      'numberOfDaysLeft' => 'Data is taken at the moment of request creation',
      'numberOfDaysLeftBefore' => 'Data is taken at the moment of request creation',
      'humanResources' => 'Your line manager will be set as default if no other approver is selected.',
      'statusOfApproval' => 'If status "Schváleno", status can\'t be changed.',
      'numberOfDays' => 'Must be set manually'
    ],
    'links' => [
      'humanResource' => 'HR',
      'vacationRequestApprovalItems' => 'Approval Process',
      'vacation' => 'Vacation',
      'user' => 'User',
      'humanResources' => 'Human Resources'
    ]
  ],
  'VacationRequestApproval' => [
    'labels' => [
      'Approve' => 'Approve',
      'Reject' => 'Reject',
      'Return for completion' => 'Return for completion',
      'Approved' => 'Approved',
      'Rejected' => 'Rejected',
      'Returned' => 'Returned',
      'Approval process' => 'Approval process',
      'Unknown response' => 'Unknown response',
      'approveVacationRequest' => 'Approve Vacation Request'
    ],
    'fields' => [
      'description' => 'Note'
    ]
  ],
  'VacationRequestApprovalItem' => [
    'labels' => [
      'Create VacationRequestApprovalItem' => 'Create Approval Process Item'
    ],
    'fields' => [
      'description' => 'Note',
      'status' => 'Status',
      'assignedUser' => 'Processed by'
    ],
    'options' => [
      'status' => [
        'Approved' => 'Approved',
        'Returned' => 'Returned for Completion',
        'Rejected' => 'Rejected'
      ]
    ]
  ],
  'ProformaInvoice' => [
    'fields' => [
      'processed' => 'Pohoda Import',
      'partialPaymentses' => 'Partial Paymentses',
      'partialPayments' => 'partialPayments',
      'amount' => 'Total without VAT',
      'taxAmount' => 'VAT',
      'grandTotalAmount' => 'Total with VAT',
      'constantSymbol' => 'Constant symbol',
      'datePaid' => 'Date paid',
      'dueDate' => 'Due date',
      'duzp' => 'Date of tax liability',
      'variableSymbol' => 'Variable symbol',
      'paymentMethod' => 'Payment method',
      'number' => 'Invoice number',
      'orderNumber' => 'Order number',
      'remainsToPay' => 'Remaining amount to be paid',
      'warehouse' => 'Warehouse',
      'note' => 'Private note',
      'textBeforeItems' => 'Sentence before invoice items',
      'textAfterItems' => 'Invoice footer',
      'reverseCharge' => 'Reverse charge',
      'fakturaceDoZahranici' => 'Foreign invoice',
      'contact' => 'Contact',
      'supplierName' => 'Name',
      'supplierAddress' => 'Address',
      'supplierAddressStreet' => 'Street',
      'supplierAddressCity' => 'City',
      'supplierAddressState' => 'State',
      'supplierAddressCountry' => 'Country',
      'supplierAddressPostalCode' => 'Postal code',
      'supplierAddressMap' => 'Map',
      'supplierEmail' => 'Email',
      'supplierPhone' => 'Phone',
      'supplierWebsite' => 'Website',
      'supplierVATpayer' => 'VAT payer',
      'supplierVatId' => 'VAT ID',
      'supplierSicCode' => 'Company ID',
      'subscriberName' => 'Name',
      'subscriberAddress' => 'Address',
      'subscriberAddressStreet' => 'Street',
      'subscriberAddressCity' => 'City',
      'subscriberAddressState' => 'State',
      'subscriberAddressCountry' => 'Country',
      'subscriberAddressPostalCode' => 'Postal code',
      'subscriberAddressMap' => 'Map',
      'subscriberSicCode' => 'Company ID',
      'subscriberVatId' => 'VAT ID',
      'subscriberShippingAddress' => 'Shipping address',
      'subscriberShippingAddressCity' => 'City',
      'subscriberShippingAddressCountry' => 'Country',
      'subscriberShippingAddressMap' => 'Map',
      'subscriberShippingAddressPostalCode' => 'Postal code',
      'subscriberShippingAddressState' => 'State',
      'subscriberShippingAddressStreet' => 'Street',
      'subscriberBillingAddress' => 'Billing address',
      'subscriberBillingAddressCity' => 'City',
      'subscriberBillingAddressCountry' => 'Country',
      'subscriberBillingAddressMap' => 'Map',
      'subscriberBillingAddressPostalCode' => 'Postal code',
      'subscriberBillingAddressState' => 'State',
      'subscriberBillingAddressStreet' => 'Street',
      'subscriberNote' => 'Note',
      'accountNumber' => 'Account number',
      'iban' => 'IBAN',
      'swift' => 'SWIFT/BIC',
      'supplyCode' => 'Supply code',
      'assignedUser' => 'Assigned user / Issued by',
      'subscriberLink' => 'Subscriber'
    ],
    'labels' => [
      'Templates' => 'Templates'
    ],
    'options' => [
      'supplierVATpayer' => [
        'Non VAT payer' => 'Non-VAT payer',
        'Identified person' => 'Identified person',
        'VAT payer' => 'VAT payer'
      ],
      'supplyCode' => [
        '' => 'For reporting of invoices subject to reverse charge',
        1 => '1 – Supply of gold (fulfillment according to § 92b)',
        '1a' => '1a – Gold – intermediary supply of investment gold',
        3 => '3 – Supply of immovable property, if VAT is applied to such supply (fulfillment according to § 92d)',
        '3a' => '3a – Supply of immovable property in compulsory auction',
        4 => '4 – Provision of construction or assembly work (fulfillment according to § 92e)',
        '4a' => '4a – Construction and assembly work – provision of workers',
        5 => '5 – Goods listed in Annex No. 5 to the VAT Act (fulfillment according to § 92c)',
        6 => '6 – Supply of goods originally provided as a guarantee',
        7 => '7 – Supply of goods after transfer of reservation of ownership',
        11 => '11 – Transfer of allowances for greenhouse gas emissions',
        12 => '12 – Cereals and technical crops',
        13 => '13 – Metals, including precious metals',
        14 => '14 – Mobile phones',
        15 => '15 – Integrated circuits and printed circuit boards',
        16 => '16 – Portable devices for automated data processing (e.g. tablets or laptops)',
        17 => '17 – Video game consoles',
        18 => '18 – Supply of electricity certificates',
        19 => '19 – Supply of electricity through systems or networks to a trader',
        20 => '20 – Supply of gas through systems or networks to a trader',
        21 => '21 – Provision of defined electronic communication services'
      ],
      'status' => [
        'Issued' => 'Issued',
        'Sent' => 'Sent',
        'Partially Paid' => 'Partially paid',
        'Paid' => 'Paid',
        'Canceled' => 'Canceled'
      ]
    ],
    'links' => [
      'partialPaymentses' => 'Partial Paymentses',
      'partialPayments' => 'partialPayments',
      'subscriberLink' => 'Subscriber'
    ],
    'tooltips' => [
      'number' => 'A unique identifier of an invoice used to identify the issued document',
      'paymentMethod' => 'The method by which the invoice will be paid (e.g. bank transfer, cash, card, etc.)',
      'dateInvoiced' => 'The date when the invoice was issued',
      'dueDate' => 'The date by which the invoice must be paid',
      'constantSymbol' => 'A unique identifier of the subject in the given payment system. The maximum length is 10 characters.',
      'duzp' => 'The date when the taxable service or sale was provided for which the invoice was issued.',
      'variableSymbol' => 'The variable symbol is used to identify the invoice in the banking system. The maximum length is 10 characters.'
    ]
  ],
  'ReceivedInvoice' => [
    'fields' => [
      'processed' => 'Pohoda Import',
      'status' => 'Status',
      'dateInvoiced' => 'Invoice Date',
      'amount' => 'Subtotal',
      'taxAmount' => 'Tax Amount',
      'grandTotalAmount' => 'Total Amount',
      'constantSymbol' => 'Constant Symbol',
      'datePaid' => 'Payment Date',
      'dueDate' => 'Due Date',
      'duzp' => 'Date of Taxable Supply',
      'variableSymbol' => 'Variable Symbol',
      'paymentMethod' => 'Payment Method',
      'number' => 'Invoice Number',
      'orderNumber' => 'Order Number',
      'remainsToPay' => 'Amount Due',
      'warehouse' => 'Warehouse',
      'note' => 'Private Note',
      'contact' => 'Contact',
      'accountNumber' => 'Account Number',
      'iban' => 'IBAN',
      'swift' => 'SWIFT/BIC',
      'supplyCode' => 'Supply Code',
      'assignedUser' => 'Assigned User',
      'subscriberLink' => 'Subscriber',
      'supplierLink' => 'Supplier',
      'expenseOriginalNumber' => 'Original Invoice Number',
      'originalInvoiceFile' => 'Original Invoice File',
      'dateOfReceiving' => 'Date of Receipt'
    ],
    'labels' => [
      'Templates' => 'Templates',
      'Items' => 'Items',
      'Totals' => 'Totals',
      'Create CreditNote' => 'Create Credit Note'
    ],
    'options' => [
      'status' => [
        'Received' => 'Received',
        'Paid' => 'Paid',
        'UnpaidAfterMaturity' => 'Unpaid After Maturity'
      ],
      'paymentMethod' => [
        'bank' => 'Bank Transfer',
        'card' => 'Card Payment',
        'cash' => 'Cash Payment',
        'cod' => 'Cash on Delivery'
      ]
    ],
    'links' => [
      'supplierLink' => 'Supplier'
    ],
    'tooltips' => [
      'number' => 'Unique identifier used to identify the issued document',
      'paymentMethod' => 'Method by which the invoice will be paid (e.g. bank transfer, cash, card payment, etc.)',
      'dateInvoiced' => 'Date on which the invoice was issued',
      'dueDate' => 'Date by which the invoice must be paid',
      'constantSymbol' => 'Unique identifier of the entity in the payment system. Maximum length is 10 characters.',
      'duzp' => 'Date on which a taxable service or sale was made for which the invoice was issued.',
      'variableSymbol' => 'Variable symbol used to identify the invoice in the banking system. Maximum length is 10 characters.',
      'proformaInvoice' => 'An invoice that has been paid by a deposit.'
    ]
  ],
  'ReceivedProformaInvoice' => [
    'fields' => [
      'processed' => 'Pohoda Import',
      'status' => 'Status',
      'dateInvoiced' => 'Invoice date',
      'amount' => 'Total amount excl. VAT',
      'taxAmount' => 'VAT',
      'grandTotalAmount' => 'Total amount incl. VAT',
      'constantSymbol' => 'Constant symbol',
      'datePaid' => 'Payment date',
      'dueDate' => 'Due date',
      'duzp' => 'Date of taxable supply',
      'variableSymbol' => 'Variable symbol',
      'paymentMethod' => 'Payment method',
      'number' => 'Invoice number',
      'orderNumber' => 'Order number',
      'remainsToPay' => 'Remaining balance',
      'warehouse' => 'Warehouse',
      'note' => 'Private note',
      'contact' => 'Contact',
      'accountNumber' => 'Account number',
      'iban' => 'IBAN',
      'swift' => 'SWIFT/BIC',
      'supplyCode' => 'Supply code',
      'assignedUser' => 'Assigned user',
      'subscriberLink' => 'Subscriber',
      'supplierLink' => 'Supplier',
      'expenseOriginalNumber' => 'Original invoice number',
      'originalInvoiceFile' => 'Original invoice file',
      'dateOfReceiving' => 'Date of receiving'
    ],
    'labels' => [
      'Templates' => 'Templates',
      'Items' => 'Items',
      'Totals' => 'Totals',
      'Create CreditNote' => 'Create credit note'
    ],
    'options' => [
      'status' => [
        'Received' => 'Received',
        'Paid' => 'Paid',
        'UnpaidAfterMaturity' => 'Unpaid after maturity'
      ],
      'paymentMethod' => [
        'bank' => 'Bank transfer',
        'card' => 'Card',
        'cash' => 'Cash',
        'cod' => 'Cash on delivery'
      ]
    ],
    'links' => [
      'supplierLink' => 'Supplier'
    ],
    'tooltips' => [
      'number' => 'Unique identifier used to identify the issued document',
      'paymentMethod' => 'Method used to pay the invoice (e.g. bank transfer, cash, card)',
      'dateInvoiced' => 'Date the invoice was issued',
      'dueDate' => 'Date by which the invoice must be paid',
      'constantSymbol' => 'Unique identifier of the subject in the payment system. Maximum length is 10 characters.',
      'duzp' => 'Date when a taxable service or sale was made, for which the invoice was issued',
      'variableSymbol' => 'Variable symbol used to identify the invoice in the banking system. Maximum length is 10 characters.',
      'proformaInvoice' => 'Invoice that has been paid by a deposit payment'
    ]
  ],
  'GoodsReceipt' => [
    'fields' => [
      'warehouse' => 'Warehouse',
      'items' => 'Items',
      'status' => 'Status',
      'parent' => 'Rodič',
      'numberA' => 'Číslo příjemky',
      'product' => 'Product'
    ],
    'labels' => [
      'Process' => 'Process',
      'Create GoodsReceipt' => 'Create Goods Receipt',
      'Items' => 'Items',
      'Create Warehouse Transfer' => 'Create Warehouse Transfer',
      'Goods Receipts' => 'Goods Receipts'
    ],
    'options' => [
      'status' => [
        'Draft' => 'Draft',
        'Processing' => 'Processing',
        'Received' => 'Received',
        'Canceled' => 'Canceled'
      ]
    ],
    'links' => [
      'parent' => 'Rodič',
      'product' => 'Product'
    ]
  ],
  'Warehouse' => [
    'fields' => [
      'name' => 'Name',
      'description' => 'Description',
      'type' => 'Type',
      'address' => 'Address',
      'attachments' => 'Attachments',
      'positions' => 'Positions',
      'totalValue' => 'Total value',
      'warehouseValueRecords' => 'Warehouse values',
      'products' => 'Products',
      'count' => 'Počet',
      'product' => 'Product',
      'quantity' => 'Quantity',
      'category' => 'Category',
      'availableQuantity' => 'Available Quantity',
      'position' => 'Position',
      'warehouseItems' => 'Warehouse Items',
      'productionOrder' => 'Production Order',
      'productionModelItem' => 'Production Model Item',
      'productCategory' => 'productCategory',
      'isSerialNumber' => 'IsSerialNumber',
      'availableBrno' => 'Available in Brno',
      'availablePv' => 'Available in Prostějov',
      'alisId' => 'AlisId',
      'componentsCost' => 'ComponentsCost',
      'componentsCostCurrency' => 'ComponentsCost (Currency)',
      'componentsCostConverted' => 'ComponentsCost (Converted)',
      'costPrice' => 'CostPrice',
      'costPriceCurrency' => 'CostPrice (Currency)',
      'costPriceConverted' => 'CostPrice (Converted)',
      'costPriceWithTax' => 'Cost Price With Tax',
      'costPriceWithTaxCurrency' => 'Cost Price With Tax (Currency)',
      'costPriceWithTaxConverted' => 'Cost Price With Tax (Converted)',
      'productionModel' => 'defaultProductionModel',
      'descriptionDe' => 'Popis DE',
      'descriptionEn' => 'Popis EN',
      'dismantlable' => 'Rozebiratelný',
      'ean' => 'EAN',
      'image' => 'Image',
      'isArchive' => 'IsArchive',
      'isIgnored' => 'Is Ignored',
      'isModel' => 'IsModel',
      'minimumStockQuantity' => 'Minimální skladové množství',
      'nameDE' => 'NameDE',
      'ordered' => 'Ordered',
      'priceA' => 'Cena A',
      'priceACurrency' => 'Cena A (Currency)',
      'priceAConverted' => 'Cena A (Converted)',
      'priceB' => 'Cena B',
      'priceBCurrency' => 'Cena B (Currency)',
      'priceBConverted' => 'Cena B (Converted)',
      'priceC' => 'Cena C',
      'priceCCurrency' => 'Cena C (Currency)',
      'priceCConverted' => 'Cena C (Converted)',
      'priceDamage' => 'PriceDamage',
      'priceDamageCurrency' => 'PriceDamage (Currency)',
      'priceDamageConverted' => 'PriceDamage (Converted)',
      'priceEndUser' => 'PriceEndUser',
      'priceEndUserCurrency' => 'PriceEndUser (Currency)',
      'priceEndUserConverted' => 'PriceEndUser (Converted)',
      'priceJesenoConverted' => 'PriceJesenoConverted',
      'priceJesenoConvertedCurrency' => 'PriceJesenoConverted (Currency)',
      'priceJesenoConvertedConverted' => 'PriceJesenoConverted (Converted)',
      'priceListPrice' => 'PriceListPrice',
      'priceListPriceCurrency' => 'PriceListPrice (Currency)',
      'priceListPriceConverted' => 'PriceListPrice (Converted)',
      'priceMargin' => 'Price Margin',
      'priceMarkup' => 'Price Markup',
      'priceRent' => 'PriceRent',
      'priceRentCurrency' => 'PriceRent (Currency)',
      'priceRentConverted' => 'PriceRent (Converted)',
      'pricingType' => 'PricingType',
      'productCode' => 'Product Name',
      'qrCode' => 'QrCode',
      'salesPrice' => 'Sales Price',
      'salesPriceCurrency' => 'Sales Price (Currency)',
      'salesPriceConverted' => 'Sales Price (Converted)',
      'salesPriceWithTax' => 'Sales Price With Tax',
      'salesPriceWithTaxCurrency' => 'Sales Price With Tax (Currency)',
      'salesPriceWithTaxConverted' => 'Sales Price With Tax (Converted)',
      'accounts' => 'Suppliers',
      'taxRate' => 'Tax Rate',
      'totalPrice' => 'TotalPrice',
      'totalPriceCurrency' => 'TotalPrice (Currency)',
      'totalPriceConverted' => 'TotalPrice (Converted)',
      'productType' => 'ProductType',
      'unit' => 'Jednotka',
      'url' => 'URL',
      'weight' => 'Weight',
      'productName' => 'Product  Code',
      'isInvisible' => 'IsInvisible',
      'listPrice' => 'List Price',
      'listPriceCurrency' => 'List Price (Currency)',
      'listPriceConverted' => 'List Price (Converted)',
      'unitPrice' => 'Unit Price',
      'unitPriceCurrency' => 'Unit Price (Currency)',
      'unitPriceConverted' => 'Unit Price (Converted)'
    ],
    'links' => [
      'items' => 'Items',
      'positions' => 'Positions',
      'warehouseValueRecords' => 'Warehouse values',
      'products' => 'Products',
      'product' => 'Product',
      'warehouseItems' => 'Warehouse Items',
      'productionOrder' => 'Production Order',
      'productionModelItem' => 'Production Model Item',
      'productCategory' => 'Product Category',
      'productionModel' => 'defaultProductionModel',
      'accounts' => 'Suppliers'
    ],
    'messages' => [
      'itemNotFound' => 'Product {product} was not found.',
      'notEnoughQuantity' => 'Product {productame} does not have enough quantity in stock. Requested quantity: {quantityRequested}, available quantity: {quantityAvaliable}.',
      'itemHasMissingProduct' => 'Some items have missing products.',
      'productIsNotStockable' => 'Product {productName} is not stockable. You may want to change its type.',
      'itemHasMissingPosition' => 'Some items have missing positions.',
      'itemHasPositionNotInWarehouse' => 'Product {productName} has a position {positionName} that doesn\'t belong to warehouse {warehouseName}.'
    ],
    'options' => [
      'type' => [
        'Simple' => 'Simple',
        'Positional' => 'Positional'
      ],
      'category' => [
        'Product' => 'Product',
        'Semi-product' => 'Semi-product',
        'Component' => 'Component'
      ],
      'pricingType' => [
        'No Price' => 'No Price',
        'Fixed Sales Price' => 'Fixed Sales Price',
        'Markup over Cost' => 'Markup over Cost',
        'Profit Margin' => 'Profit Margin',
        'Same as Cost Price' => 'Same as Cost Price'
      ],
      'productType' => [
        'Normal' => 'Normal',
        'Service' => 'Service',
        'Warehouse Item' => 'Warehouse Item',
        'Product (Manufactured)' => 'Product (Manufactured)',
        'Material' => 'Material',
        'Component' => 'Component'
      ],
      'unit' => [
        'km' => 'km',
        'm' => 'm',
        'h' => 'h',
        'day' => 'day',
        'pcs' => 'pcs',
        'hod' => 'hod',
        'ks' => 'ks',
        'set' => 'set',
        'kg' => 'kg',
        'g' => 'g'
      ]
    ],
    'labels' => [
      'Create Warehouse' => 'Create Sklad'
    ],
    'tooltips' => [
      'availableQuantity' => 'Available quantity at the current date and time.',
      'quantity' => 'Total produced or stocked quantity during the time.',
      'productCategory' => 'When the products has the prefix A, it means Archive. In the folder tree is main folder Archive and inside it subfolders for each product folders as A_Projecotors.'
    ]
  ],
  'WarehouseItem' => [
    'fields' => [
      'product' => 'Product',
      'quantity' => 'Total Quantity',
      'quantityReserved' => 'Reserved Quantity',
      'quantityAvailable' => 'Available Quantity',
      'parent' => 'Parent',
      'position' => 'Position',
      'price' => 'Price',
      'priceCurrency' => 'Price (Currency)',
      'priceConverted' => 'Price (Converted)',
      'positionFrom' => 'From Position',
      'positionTo' => 'To Position',
      'warehouse' => 'Warehouse',
      'isReserved' => 'IsReserved',
      'salesOrder' => 'Sales Order',
      'unit' => 'Unit',
      'salesOrders' => 'Sales Orders',
      'salesOrdersList' => 'SalesOrdersList',
      'wisos' => 'Sales orders list',
      'reservedQuantity' => 'ReservedQuantity',
      'name' => 'Name',
      'wiso' => 'SalesOrder List',
      'stockLocation' => 'StockLocation'
    ],
    'links' => [
      'product' => 'Product',
      'parent' => 'Parent',
      'salesOrder' => 'Sales Order',
      'warehouse' => 'Warehouse',
      'salesOrders' => 'Sales Orders',
      'wiso' => 'Wiso',
      'wisos' => 'Sales orders list'
    ],
    'options' => [
      'stockLocation' => [
        'brno' => 'Brno',
        'pv' => 'Prostějov'
      ]
    ]
  ],
  'WarehousePosition' => [
    'fields' => [
      'warehouse' => 'Warehouse'
    ],
    'labels' => [
      'Create WarehousePosition' => 'Create Warehouse Position'
    ],
    'links' => [
      'warehouse' => 'Warehouse',
      'items' => 'Items'
    ]
  ],
  'WarehouseTransfer' => [
    'fields' => [
      'warehouseFrom' => 'From Warehouse',
      'warehouseTo' => 'To Warehouse',
      'items' => 'Items',
      'status' => 'Status',
      'numberA' => 'Číslo přesunu'
    ],
    'labels' => [
      'Process' => 'Process',
      'Create WarehouseTransfer' => 'Create Warehouse Transfer',
      'Items' => 'Items'
    ],
    'options' => [
      'status' => [
        'Draft' => 'Draft',
        'Processing' => 'Processing',
        'Transferred' => 'Transferred',
        'Canceled' => 'Canceled'
      ]
    ]
  ],
  'WarehouseValueRecord' => [
    'labels' => [
      'Create WarehouseValueRecord' => 'Create Warehouse Value'
    ],
    'fields' => [
      'warehouse' => 'Warehouse',
      'value' => 'Value',
      'valueCurrency' => 'Value (Currency)',
      'valueConverted' => 'Value (Converted)'
    ],
    'links' => [
      'warehouse' => 'Warehouse'
    ]
  ],
  'CreditNote' => [
    'labels' => [
      'Templates' => 'Templates',
      'Items' => 'Items',
      'Totals' => 'Totals',
      'Create CreditNote' => 'Create credit note'
    ],
    'fields' => [
      'status' => 'Status',
      'dateInvoiced' => 'Date invoiced',
      'amount' => 'Total amount without VAT',
      'taxAmount' => 'VAT amount',
      'grandTotalAmount' => 'Total amount with VAT',
      'constantSymbol' => 'Constant symbol',
      'datePaid' => 'Date paid',
      'dueDate' => 'Due date',
      'duzp' => 'Taxable supply date',
      'variableSymbol' => 'Variable symbol',
      'paymentMethod' => 'Payment method',
      'number' => 'Invoice number',
      'orderNumber' => 'Order number',
      'remainsToPay' => 'Remains to pay',
      'warehouse' => 'Warehouse',
      'note' => 'Private note',
      'textBeforeItems' => 'Reason for correction',
      'textAfterItems' => 'Invoice footer',
      'reverseCharge' => 'Reverse charge',
      'fakturaceDoZahranici' => 'Foreign invoicing',
      'contact' => 'Contact',
      'supplierName' => 'Name / Firstname and Lastname',
      'supplierAddress' => 'Address',
      'supplierAddressStreet' => 'Street',
      'supplierAddressCity' => 'City',
      'supplierAddressState' => 'State',
      'supplierAddressCountry' => 'Country',
      'supplierAddressPostalCode' => 'Postal code',
      'supplierAddressMap' => 'Map',
      'supplierEmail' => 'Email',
      'supplierPhone' => 'Phone',
      'supplierWebsite' => 'Website',
      'supplierVATpayer' => 'VAT payer',
      'supplierVatId' => 'VAT ID',
      'supplierSicCode' => 'Business ID',
      'subscriberName' => 'Name / Firstname and Lastname',
      'subscriberAddress' => 'Address',
      'subscriberAddressStreet' => 'Street',
      'subscriberAddressCity' => 'City',
      'subscriberAddressState' => 'State',
      'subscriberAddressCountry' => 'Country',
      'subscriberAddressPostalCode' => 'Postal code',
      'subscriberAddressMap' => 'Map',
      'subscriberSicCode' => 'Business ID',
      'subscriberVatId' => 'VAT ID',
      'subscriberShippingAddress' => 'Shipping address',
      'subscriberShippingAddressCity' => 'City',
      'subscriberShippingAddressCountry' => 'Country',
      'subscriberShippingAddressMap' => 'Map',
      'subscriberShippingAddressPostalCode' => 'Postal code',
      'subscriberShippingAddressState' => 'State',
      'subscriberShippingAddressStreet' => 'Street',
      'subscriberBillingAddress' => 'Billing address',
      'subscriberBillingAddressCity' => 'City',
      'subscriberBillingAddressCountry' => 'Country',
      'subscriberBillingAddressMap' => 'Map',
      'subscriberBillingAddressPostalCode' => 'Postal code',
      'subscriberBillingAddressState' => 'State',
      'subscriberBillingAddressStreet' => 'Street',
      'subscriberNote' => 'Note',
      'accountNumber' => 'Account number',
      'iban' => 'IBAN',
      'swift' => 'SWIFT/BIC',
      'supplyCode' => 'Supply code',
      'assignedUser' => 'Assigned user / Issued by',
      'subscriberLink' => 'Subscriber',
      'invoice' => 'Corrected invoice'
    ],
    'options' => [
      'supplierVATpayer' => [
        'Non VAT payer' => 'Non-VAT payer',
        'Identified person' => 'Identified person',
        'VAT payer' => 'VAT payer'
      ],
      'supplyCode' => [
        '' => 'For reporting of invoices subject to reverse charge',
        1 => '1 – Supply of gold (fulfillment according to § 92b)',
        '1a' => '1a – Gold – intermediary supply of investment gold',
        3 => '3 – Supply of immovable property, if VAT is applied to such supply (fulfillment according to § 92d)',
        '3a' => '3a – Supply of immovable property in compulsory auction',
        4 => '4 – Provision of construction or assembly work (fulfillment according to § 92e)',
        '4a' => '4a – Construction and assembly work – provision of workers',
        5 => '5 – Goods listed in Annex No. 5 to the VAT Act (fulfillment according to § 92c)',
        6 => '6 – Supply of goods originally provided as a guarantee',
        7 => '7 – Supply of goods after transfer of reservation of ownership',
        11 => '11 – Transfer of allowances for greenhouse gas emissions',
        12 => '12 – Cereals and technical crops',
        13 => '13 – Metals, including precious metals',
        14 => '14 – Mobile phones',
        15 => '15 – Integrated circuits and printed circuit boards',
        16 => '16 – Portable devices for automated data processing (e.g. tablets or laptops)',
        17 => '17 – Video game consoles',
        18 => '18 – Supply of electricity certificates',
        19 => '19 – Supply of electricity through systems or networks to a trader',
        20 => '20 – Supply of gas through systems or networks to a trader',
        21 => '21 – Provision of defined electronic communication services'
      ],
      'status' => [
        'Issued' => 'Issued',
        'Sent' => 'Sent',
        'Paid' => 'Paid',
        'Canceled' => 'Canceled'
      ],
      'paymentMethod' => [
        'bank' => 'Bank transfer',
        'card' => 'Card',
        'cash' => 'Cash',
        'cod' => 'Cash on delivery'
      ]
    ],
    'links' => [
      'subscriberLink' => 'Subscriber'
    ],
    'tooltips' => [
      'number' => 'A unique identifier used to identify the issued document',
      'paymentMethod' => 'The method by which the invoice will be paid (e.g. bank transfer, cash, credit card, etc.)',
      'dateInvoiced' => 'The date on which the invoice was issued',
      'dueDate' => 'The date by which the invoice must be paid',
      'constantSymbol' => 'A unique identifier of the subject in a given payment system. The maximum length is 10 characters.',
      'duzp' => 'The date on which the taxable service or sale for which the invoice was issued was performed.',
      'variableSymbol' => 'A variable symbol is used to identify the invoice in the banking system. The maximum length is 10 characters.',
      'invoice' => 'Used to identify the original invoice that you are correcting with this corrective tax document.'
    ]
  ],
  'CreditNoteItem' => [
    'fields' => [
      'listPrice' => 'List price',
      'product' => 'Product',
      'order' => 'Order number',
      'invoice' => 'Invoice',
      'weight' => 'Weight',
      'unitWeight' => 'Unit weight',
      'description' => 'Description',
      'discount' => 'Discount (%)',
      'amountConverted' => 'Amount (converted)',
      'unitPriceConverted' => 'Unit price (converted)',
      'listPriceConverted' => 'List price (converted)',
      'account' => 'Organization',
      'listPriceCurrency' => 'List price currency',
      'unitPriceCurrency' => 'Unit price currency',
      'amountCurrency' => 'Amount currency',
      'invoiceStatus' => 'Invoice status',
      'name' => 'Description',
      'qty' => 'Quantity',
      'quantity' => 'Quantity',
      'unitPrice' => 'Price per unit',
      'amount' => 'Total amount without VAT',
      'unit' => 'Unit of measurement',
      'taxRate' => 'VAT rate (%)'
    ],
    'links' => [
      'invoice' => 'Invoice',
      'product' => 'Product',
      'account' => 'Organization'
    ],
    'labels' => [
      'Invoices' => 'Invoices'
    ]
  ],
  'ExpenseReceipt' => [
    'labels' => [
      'Templates' => 'Templates',
      'Create ExpenseReceipt' => 'Create Expense Receipt'
    ],
    'fields' => [
      'dateInvoiced' => 'Date invoiced',
      'amount' => 'Total without VAT',
      'taxAmount' => 'VAT',
      'grandTotalAmount' => 'Grand total',
      'amountInWords' => 'Amount in words',
      'issued' => 'Issued by',
      'received' => 'Received by',
      'paymentPurpose' => 'Payment purpose',
      'invoice' => 'Invoice',
      'constantSymbol' => 'Constant symbol',
      'datePaid' => 'Date paid',
      'dueDate' => 'Due date',
      'duzp' => 'Date of taxable supply',
      'variableSymbol' => 'Variable symbol',
      'paymentMethod' => 'Payment method',
      'number' => 'Document number',
      'orderNumber' => 'Order number',
      'remainsToPay' => 'Remains to pay',
      'warehouse' => 'Warehouse',
      'note' => 'Private note',
      'contact' => 'Contact',
      'accountNumber' => 'Account number',
      'iban' => 'IBAN',
      'swift' => 'SWIFT/BIC',
      'supplyCode' => 'Supply code',
      'assignedUser' => 'Assigned user',
      'subscriberLink' => 'Subscriber',
      'supplierLink' => 'Supplier',
      'expenseOriginalNumber' => 'Original invoice number',
      'originalInvoiceFile' => 'Original invoice file',
      'dateOfReceiving' => 'Date of receiving',
      'subscriberName' => 'Name / First name and Last name',
      'subscriberAddress' => 'Address',
      'subscriberAddressStreet' => 'Street',
      'subscriberAddressCity' => 'City',
      'subscriberAddressState' => 'State',
      'subscriberAddressCountry' => 'Country',
      'subscriberAddressPostalCode' => 'Postal code',
      'subscriberAddressMap' => 'Map',
      'subscriberSicCode' => 'Company ID',
      'subscriberVatId' => 'VAT ID',
      'subscriberShippingAddress' => 'Shipping address',
      'subscriberShippingAddressCity' => 'City',
      'subscriberShippingAddressCountry' => 'Country',
      'subscriberShippingAddressMap' => 'Map',
      'subscriberShippingAddressPostalCode' => 'Postal code',
      'subscriberShippingAddressState' => 'State',
      'subscriberShippingAddressStreet' => 'Street',
      'subscriberBillingAddress' => 'Billing address',
      'subscriberBillingAddressCity' => 'City',
      'subscriberBillingAddressCountry' => 'Country',
      'subscriberBillingAddressMap' => 'Map',
      'subscriberBillingAddressPostalCode' => 'Postal code',
      'subscriberBillingAddressState' => 'State',
      'subscriberBillingAddressStreet' => 'Street',
      'subscriberNote' => 'Note',
      'supplierName' => 'Name / First name and Last name',
      'supplierAddress' => 'Address',
      'supplierAddressStreet' => 'Street',
      'supplierAddressCity' => 'City',
      'supplierAddressState' => 'State',
      'supplierAddressCountry' => 'Country',
      'supplierAddressPostalCode' => 'Postal code',
      'supplierAddressMap' => 'Map',
      'supplierEmail' => 'Email',
      'supplierPhone' => 'Phone',
      'supplierWebsite' => 'Website',
      'supplierVATpayer' => 'VAT payer',
      'supplierVatId' => 'VAT ID',
      'supplierSicCode' => 'Company ID'
    ],
    'options' => [
      'status' => [
        'Received' => 'Received',
        'Paid' => 'Paid',
        'UnpaidAfterMaturity' => 'Unpaid After Maturity'
      ],
      'paymentMethod' => [
        'bank' => 'Bank transfer',
        'card' => 'Card',
        'cash' => 'Cash',
        'cod' => 'Cash on delivery'
      ]
    ],
    'links' => [
      'supplierLink' => 'Supplier'
    ],
    'tooltips' => [
      'number' => 'Unique identifier used to identify the issued document',
      'paymentMethod' => 'The way the invoice will be paid (e.g. bank transfer, cash, card, etc.)',
      'dateInvoiced' => 'The date when the invoice was issued',
      'dueDate' => 'The date by which the invoice must be paid',
      'constantSymbol' => 'Unique identifier of the entity in the given payment system. Maximum length is 10 characters.',
      'duzp' => 'The date when the taxable service or sale was provided, for which the invoice was issued',
      'variableSymbol' => 'Variable symbol is used to identify the invoice in the banking system. Maximum length is 10 characters.',
      'proformaInvoice' => 'An invoice that has been paid as an advance payment.'
    ]
  ],
  'IssuedTaxDocument' => [
    'labels' => [
      'Templates' => 'Templates',
      'Items' => 'Items',
      'Totals' => 'Totals',
      'Create IssuedTaxDocument' => 'Create Credit Note',
      'Item Text' => 'Tax invoice for received payment on {date} with variable symbol {variableSymbol} for proforma invoice number {number}'
    ],
    'fields' => [
      'status' => 'Status',
      'dateInvoiced' => 'Invoice date',
      'paymentReceivedDate' => 'Payment received date',
      'amount' => 'Subtotal',
      'taxAmount' => 'VAT amount',
      'grandTotalAmount' => 'Total',
      'number' => 'Invoice number',
      'orderNumber' => 'Order number',
      'textBeforeItems' => 'Reason for correction',
      'textAfterItems' => 'Invoice footer',
      'assignedUser' => 'Assigned user / Issued by',
      'account' => 'Account',
      'billingAddress' => 'Billing address',
      'amountCurrency' => 'Currency',
      'vatId' => 'VAT ID',
      'sicCode' => 'SIC code'
    ],
    'options' => [
      'status' => [
        'Unsettled' => 'Unsettled',
        'Settled' => 'Settled'
      ]
    ]
  ],
  'IssuedTaxDocumentItem' => [
    'fields' => [
      'listPrice' => 'List price',
      'product' => 'Product',
      'order' => 'Order number',
      'invoice' => 'Invoice',
      'weight' => 'Weight',
      'unitWeight' => 'Unit weight',
      'description' => 'Description',
      'discount' => 'Discount (%)',
      'amountConverted' => 'Amount (converted)',
      'unitPriceConverted' => 'Unit price (converted)',
      'listPriceConverted' => 'List price (converted)',
      'account' => 'Organization',
      'listPriceCurrency' => 'List price currency',
      'unitPriceCurrency' => 'Unit price currency',
      'amountCurrency' => 'Amount currency',
      'invoiceStatus' => 'Invoice status',
      'name' => 'Name',
      'qty' => 'Quantity',
      'quantity' => 'Quantity',
      'unitPrice' => 'Unit price',
      'amount' => 'Total without VAT',
      'unit' => 'Unit',
      'taxRate' => 'VAT rate (%)'
    ],
    'links' => [
      'invoice' => 'Invoice',
      'product' => 'Product',
      'account' => 'Organization'
    ],
    'labels' => [
      'Invoices' => 'Invoices'
    ]
  ],
  'PartialPayments' => [
    'fields' => [
      'invoice' => 'Invoice',
      'proformaInvoice' => 'Proforma Invoice',
      'amount' => 'Amount',
      'amountCurrency' => 'Amount (Currency)',
      'amountConverted' => 'Amount (Converted)',
      'date' => 'Date of payment'
    ],
    'links' => [
      'invoice' => 'Invoice',
      'proformaInvoice' => 'Proforma Invoice'
    ],
    'labels' => [
      'Create PartialPayments' => 'Create PartialPayments'
    ]
  ],
  'ProformaInvoiceItem' => [
    'fields' => [
      'listPrice' => 'List price',
      'product' => 'Product',
      'order' => 'Line number',
      'invoice' => 'Invoice',
      'weight' => 'Weight',
      'unitWeight' => 'Unit weight',
      'description' => 'Description',
      'discount' => 'Discount (%)',
      'amountConverted' => 'Amount (converted)',
      'unitPriceConverted' => 'Unit price (converted)',
      'listPriceConverted' => 'List price (converted)',
      'account' => 'Organization',
      'listPriceCurrency' => 'List price currency',
      'unitPriceCurrency' => 'Unit price currency',
      'amountCurrency' => 'Amount currency',
      'invoiceStatus' => 'Invoice status',
      'name' => 'Name',
      'qty' => 'Quantity',
      'quantity' => 'Quantity',
      'unitPrice' => 'Unit price',
      'amount' => 'Total without VAT',
      'unit' => 'Unit',
      'taxRate' => 'VAT (%)'
    ],
    'links' => [
      'invoice' => 'Invoice',
      'product' => 'Product',
      'account' => 'Organization'
    ],
    'labels' => [
      'Invoices' => 'Invoices'
    ]
  ],
  'ReceivedInvoiceItem' => [
    'fields' => [
      'listPrice' => 'List price',
      'product' => 'Product',
      'order' => 'Order number',
      'invoice' => 'Invoice',
      'weight' => 'Weight',
      'unitWeight' => 'Unit weight',
      'description' => 'Description',
      'discount' => 'Discount (%)',
      'amountConverted' => 'Amount (converted)',
      'unitPriceConverted' => 'Unit price (converted)',
      'listPriceConverted' => 'List price (converted)',
      'account' => 'Organization',
      'listPriceCurrency' => 'List price currency',
      'unitPriceCurrency' => 'Unit price currency',
      'amountCurrency' => 'Amount currency',
      'invoiceStatus' => 'Invoice status',
      'name' => 'Name',
      'qty' => 'Quantity',
      'quantity' => 'Quantity',
      'unitPrice' => 'Unit price',
      'amount' => 'Total amount without VAT',
      'unit' => 'Unit',
      'taxRate' => 'VAT rate (%)'
    ],
    'links' => [
      'invoice' => 'Invoice',
      'product' => 'Product',
      'account' => 'Organization'
    ],
    'labels' => [
      'Invoices' => 'Invoices'
    ]
  ],
  'ReceivedProformaInvoiceItem' => [
    'fields' => [
      'listPrice' => 'List price',
      'product' => 'Product',
      'order' => 'Order number',
      'invoice' => 'Invoice',
      'weight' => 'Weight',
      'unitWeight' => 'Unit weight',
      'description' => 'Description',
      'discount' => 'Discount (%)',
      'amountConverted' => 'Amount (converted)',
      'unitPriceConverted' => 'Unit price (converted)',
      'listPriceConverted' => 'List price (converted)',
      'account' => 'Organization',
      'listPriceCurrency' => 'List price currency',
      'unitPriceCurrency' => 'Unit price currency',
      'amountCurrency' => 'Amount currency',
      'invoiceStatus' => 'Invoice status',
      'name' => 'Name',
      'qty' => 'Quantity',
      'quantity' => 'Quantity',
      'unitPrice' => 'Unit price',
      'amount' => 'Total without VAT',
      'unit' => 'Unit',
      'taxRate' => 'VAT rate (%)'
    ],
    'links' => [
      'invoice' => 'Invoice',
      'product' => 'Product',
      'account' => 'Organization'
    ],
    'labels' => [
      'Invoices' => 'Invoices'
    ]
  ],
  'ReceivedTaxDocument' => [
    'labels' => [
      'Templates' => 'Templates',
      'Items' => 'Items',
      'Totals' => 'Totals',
      'Create CreditNote' => 'Create credit note'
    ],
    'fields' => [
      'status' => 'Status',
      'dateInvoiced' => 'Invoice date',
      'amount' => 'Total without VAT',
      'taxAmount' => 'VAT',
      'grandTotalAmount' => 'Total with VAT',
      'constantSymbol' => 'Constant symbol',
      'datePaid' => 'Payment date',
      'dueDate' => 'Due date',
      'duzp' => 'Date of taxable supply',
      'variableSymbol' => 'Variable symbol',
      'paymentMethod' => 'Payment method',
      'number' => 'Invoice number',
      'orderNumber' => 'Order number',
      'remainsToPay' => 'Amount due',
      'warehouse' => 'Warehouse',
      'note' => 'Private note',
      'contact' => 'Contact',
      'accountNumber' => 'Account number',
      'iban' => 'IBAN',
      'swift' => 'SWIFT/BIC',
      'supplyCode' => 'Supply code',
      'assignedUser' => 'Assigned user',
      'subscriberLink' => 'Subscriber',
      'supplierLink' => 'Supplier',
      'expenseOriginalNumber' => 'Original invoice number',
      'originalInvoiceFile' => 'Original invoice file',
      'dateOfReceiving' => 'Date of receipt',
      'amountCurrency' => 'Amount currency'
    ],
    'options' => [
      'status' => [
        'Received' => 'Received',
        'Paid' => 'Paid',
        'UnpaidAfterMaturity' => 'Unpaid after maturity'
      ],
      'paymentMethod' => [
        'bank' => 'Bank transfer',
        'card' => 'Card',
        'cash' => 'Cash',
        'cod' => 'Cash on delivery'
      ]
    ],
    'links' => [
      'supplierLink' => 'Supplier'
    ],
    'tooltips' => [
      'number' => 'Unique identifier used to identify the issued document',
      'paymentMethod' => 'The method by which the invoice will be paid (e.g. bank transfer, cash, card, etc.)',
      'dateInvoiced' => 'The date when the invoice was issued',
      'dueDate' => 'The date by which the invoice must be paid',
      'constantSymbol' => 'A unique identifier of the entity in the given payment system. Maximum length is 10 characters.',
      'duzp' => 'The date when the taxable service or sale for which the invoice was issued took place.',
      'variableSymbol' => 'Variable symbol is used to identify the invoice in the banking system. Maximum length is 10 characters.',
      'proformaInvoice' => 'An invoice that has been paid with an advance payment.'
    ]
  ],
  'ReceivedTaxDocumentItem' => [
    'fields' => [
      'listPrice' => 'List price',
      'product' => 'Product',
      'order' => 'Order number',
      'invoice' => 'Invoice',
      'weight' => 'Weight',
      'unitWeight' => 'Unit weight',
      'description' => 'Description',
      'discount' => 'Discount (%)',
      'amountConverted' => 'Amount (converted)',
      'unitPriceConverted' => 'Unit price (converted)',
      'listPriceConverted' => 'List price (converted)',
      'account' => 'Organization',
      'listPriceCurrency' => 'List price currency',
      'unitPriceCurrency' => 'Unit price currency',
      'amountCurrency' => 'Amount currency',
      'invoiceStatus' => 'Invoice status',
      'name' => 'Name',
      'qty' => 'Quantity',
      'quantity' => 'Quantity',
      'unitPrice' => 'Unit price',
      'amount' => 'Total without VAT',
      'unit' => 'Unit',
      'taxRate' => 'VAT (%)'
    ],
    'links' => [
      'invoice' => 'Invoice',
      'product' => 'Product',
      'account' => 'Organization'
    ],
    'labels' => [
      'Invoices' => 'Invoices'
    ]
  ],
  'RevenueReceipt' => [
    'labels' => [
      'Templates' => 'Templates',
      'Create CreditNote' => 'Create Credit Note'
    ],
    'fields' => [
      'status' => 'Status',
      'dateInvoiced' => 'Invoice date',
      'amount' => 'Total net amount',
      'taxAmount' => 'VAT amount',
      'grandTotalAmount' => 'Grand total amount',
      'amountInWords' => 'Amount in words',
      'issued' => 'Issued by',
      'received' => 'Received by',
      'paymentPurpose' => 'Payment purpose',
      'invoice' => 'Invoice',
      'constantSymbol' => 'Constant symbol',
      'datePaid' => 'Payment date',
      'dueDate' => 'Due date',
      'duzp' => 'Date of taxable supply',
      'variableSymbol' => 'Variable symbol',
      'paymentMethod' => 'Payment method',
      'number' => 'Invoice number',
      'orderNumber' => 'Order number',
      'remainsToPay' => 'Remains to be paid',
      'warehouse' => 'Warehouse',
      'note' => 'Private note',
      'contact' => 'Contact',
      'accountNumber' => 'Account number',
      'iban' => 'IBAN',
      'swift' => 'SWIFT/BIC',
      'supplyCode' => 'Supply code',
      'assignedUser' => 'Assigned user',
      'subscriberLink' => 'Subscriber link',
      'supplierLink' => 'Supplier link',
      'expenseOriginalNumber' => 'Original invoice number',
      'originalInvoiceFile' => 'Original invoice file',
      'dateOfReceiving' => 'Date of receiving',
      'subscriberName' => 'Name / First name and last name',
      'subscriberAddress' => 'Address',
      'subscriberAddressStreet' => 'Street',
      'subscriberAddressCity' => 'City',
      'subscriberAddressState' => 'State',
      'subscriberAddressCountry' => 'Country',
      'subscriberAddressPostalCode' => 'Postal code',
      'subscriberAddressMap' => 'Map',
      'subscriberSicCode' => 'Business ID',
      'subscriberVatId' => 'VAT ID',
      'subscriberShippingAddress' => 'Shipping address',
      'subscriberShippingAddressCity' => 'City',
      'subscriberShippingAddressCountry' => 'Country',
      'subscriberShippingAddressMap' => 'Map',
      'subscriberShippingAddressPostalCode' => 'Postal code',
      'subscriberShippingAddressState' => 'State',
      'subscriberShippingAddressStreet' => 'Street',
      'subscriberBillingAddress' => 'Billing address',
      'subscriberBillingAddressCity' => 'City',
      'subscriberBillingAddressCountry' => 'Country',
      'subscriberBillingAddressMap' => 'Map',
      'subscriberBillingAddressPostalCode' => 'Postal code',
      'subscriberBillingAddressState' => 'State',
      'subscriberBillingAddressStreet' => 'Street',
      'subscriberNote' => 'Note',
      'supplierName' => 'Name / First name and last name',
      'supplierAddress' => 'Address',
      'supplierAddressStreet' => 'Street',
      'supplierAddressCity' => 'City',
      'supplierAddressState' => 'State',
      'supplierAddressCountry' => 'Country',
      'supplierAddressPostalCode' => 'Postal code',
      'supplierAddressMap' => 'Map',
      'supplierEmail' => 'Email',
      'supplierPhone' => 'Phone',
      'supplierWebsite' => 'Website',
      'supplierVATpayer' => 'VAT payer',
      'supplierVatId' => 'VAT ID',
      'supplierSicCode' => 'Business ID'
    ],
    'options' => [
      'status' => [
        'Received' => 'Received',
        'Paid' => 'Paid',
        'UnpaidAfterMaturity' => 'Unpaid after maturity'
      ],
      'paymentMethod' => [
        'bank' => 'Bank transfer',
        'card' => 'Card',
        'cash' => 'Cash',
        'cod' => 'Cash on delivery'
      ]
    ],
    'links' => [
      'supplierLink' => 'Supplier'
    ],
    'tooltips' => [
      'number' => 'Unique identifier used to identify the issued document',
      'paymentMethod' => 'The method by which the invoice will be paid (e.g. bank transfer, cash, card, etc.)',
      'dateInvoiced' => 'The date when the invoice was issued',
      'dueDate' => 'The date by which the invoice must be paid',
      'constantSymbol' => 'Unique identifier of the subject in a particular payment system. The maximum length is 10 characters.',
      'duzp' => 'The date when a taxable service or sale was performed for which the invoice was issued.',
      'variableSymbol' => 'The variable symbol is used to identify the invoice in the banking system. The maximum length is 10 characters.',
      'proformaInvoice' => 'An invoice that has been paid with an advance payment.'
    ]
  ],
  'SummaryVatRates' => [
    'fields' => [
      'taxRate' => 'Rate',
      'basis' => 'Base',
      'vat' => 'VAT'
    ]
  ],
  'Google' => [
    'products' => [
      'googleCalendar' => 'Google Calendar',
      'googleTask' => 'Google Task',
      'googleContacts' => 'Contacts',
      'gmail' => 'Gmail'
    ],
    'message' => [
      'notConfigured' => 'Google Integration is not configured.'
    ]
  ],
  'GoogleCalendar' => [
    'messages' => [
      'fieldLabelIsRequired' => 'Only one entity can be w/o Identification Label',
      'emptyNotDefaultEnitityLabel' => 'Identification Label of not by default Entity can\'t be empty',
      'defaultEntityIsRequiredInList' => 'Default Entity is required in the Sync Entities List',
      'notUniqueIdentificationLabel' => 'Identification Labels have to be unique'
    ]
  ],
  'GoogleContacts' => [
    'messages' => [
      'onlyOneGroupAllowed' => 'Only one group can be selected.'
    ]
  ],
  'Production' => [
    'fields' => [
      'status' => 'Status',
      'product' => 'Product',
      'quantity' => 'Quantity',
      'componentWarehouse' => 'Component Warehouse',
      'productWarehouse' => 'Product Warehouse'
    ],
    'labels' => [
      'Create Production' => 'Create Production'
    ]
  ],
  'ProductionItem' => [
    'fields' => [
      'parent' => 'Parent',
      'item' => 'Item',
      'quantity' => 'Quantity',
      'done' => 'Done',
      'available' => 'Available'
    ]
  ],
  'ProductionOperation' => [
    'labels' => [
      'Create ProductionOperation' => 'Create Production Operation'
    ]
  ],
  'Absence' => [
    'fields' => [
      'parent' => 'Parent',
      'dateStart' => 'Date Start',
      'dateEnd' => 'Date End',
      'duration' => 'Duration',
      'status' => 'Status',
      'reminders' => 'Reminders',
      'dateStartDate' => 'Date Start (all day)',
      'dateEndDate' => 'Date End (all day)',
      'isAllDay' => 'Is All-Day',
      'type' => 'Typ',
      'approved' => 'Schválení',
      'hours' => 'Počet hodin',
      'remainingHrs' => 'Zbývá hodin'
    ],
    'links' => [
      'parent' => 'Parent'
    ],
    'options' => [
      'status' => [
        'Planned' => 'Planned',
        'Held' => 'Held',
        'Not Held' => 'Not Held'
      ],
      'type' => [
        'Paid' => 'Dovolená',
        'NonPaid' => 'Neplacené volno',
        'illness' => 'Pracovní neschopnost',
        'sick' => 'Sick Day',
        'medical' => 'Lékař',
        'exchange' => 'Náhradní volno',
        'paidAbsence' => 'Placené volno'
      ],
      'approved' => [
        'waiting' => 'Čeká na schválení',
        'approved' => 'Schváleno',
        'declined' => 'Neschváleno'
      ]
    ],
    'labels' => [
      'Create Absence' => 'Create Dovolená',
      'Schedule Absence' => 'Schedule Dovolená',
      'Log Absence' => 'Log Dovolená',
      'Set Held' => 'Set Held',
      'Set Not Held' => 'Set Not Held'
    ],
    'massActions' => [
      'setHeld' => 'Set Held',
      'setNotHeld' => 'Set Not Held'
    ],
    'presetFilters' => [
      'planned' => 'Planned',
      'held' => 'Held',
      'todays' => 'Today\'s'
    ]
  ],
  'ClockIn' => [
    'fields' => [
      'type' => 'Typ'
    ],
    'links' => [],
    'labels' => [
      'Create ClockIn' => 'Create ClockIn'
    ],
    'options' => [
      'type' => [
        'IN' => 'IN',
        'OUT' => 'OUT'
      ]
    ]
  ],
  'CompetetionBase' => [
    'links' => [],
    'labels' => [
      'Create CompetetionBase' => 'Create CompetetionBase'
    ],
    'fields' => [
      'pedestrianAvoidance' => 'Avoidance collision with pedestrian/employe',
      'hmeAvoidance' => 'Avoidance collision with material handling equipment',
      'propertyAvoidance' => 'Avoidance collision with company property',
      'personalTagTypes' => 'Types of personal tags',
      'iotLED' => 'IoT - LED visualization',
      'iotRTLS' => 'IoT - RTLS module',
      'iotOtherDevices' => 'IoT - activation of el. devices',
      'uwb' => 'Technology - UWB',
      'neuralNetwork' => 'Technology - neural network',
      'otherTechnology' => 'Technology - other (BLE, WiFi,...)',
      'pedestrianAlert' => 'Active alert of pedestrian',
      'alertOfForklift' => 'Active alert of forklift driver',
      'alertOf3rdParts' => 'Active alert of 3rd parts',
      'vibrationAlert' => 'Vibration',
      'accousticAlert' => 'Accoustic',
      'optoaccousticAlert' => 'Opto-accoustic',
      'elTruck' => 'Installation on el. truck',
      'crane' => 'Installation on crane',
      'allHME' => 'Installation on all handling material equipment',
      'visualizationInHMECabin' => 'Visualization of pedestrian position inside the HME cabin',
      'oneZone' => 'One zone',
      'moreZones' => 'More zones',
      'indoor' => 'Indoor',
      'outdoor' => 'Outdoor',
      'atexCertification' => 'ATEX certification',
      'multifunctionTag' => 'Multifunction personal tag',
      'diagnosticForTag' => 'Diagnostic tool for personal tag',
      'pressetingOption' => 'Option for user friendly custom presseting'
    ],
    'options' => [
      'personalTagTypes' => [
        'card' => 'Card',
        'wristBand' => 'Wrist band',
        'helmetTag' => 'Helmet tag',
        'beltTag' => 'Belt tag',
        'safetyVest' => 'Safety vest',
        '-' => '-'
      ]
    ]
  ],
  'Complaint' => [
    'fields' => [
      'businessProject' => 'Zakázka'
    ],
    'links' => [
      'businessProject' => 'Zakázka'
    ],
    'labels' => [
      'Create Complaint' => 'Create Reklamace'
    ]
  ],
  'Contractor' => [
    'fields' => [
      'contractorItems' => 'Contractor Items',
      'billingAddress' => 'Fakturační adresa',
      'billingAddressStreet' => 'Fakturační adresa Ulice',
      'billingAddressCity' => 'Fakturační adresa Město',
      'billingAddressState' => 'Fakturační adresa Stát',
      'billingAddressCountry' => 'Fakturační adresa Země',
      'billingAddressPostalCode' => 'Fakturační adresa PSČ',
      'billingAddressMap' => 'Fakturační adresa Mapa',
      'contacts' => 'Kontakty',
      'componentss' => 'Komponenty',
      'web' => 'Web',
      'productDatabase' => 'Product Database',
      'productDatabase1' => 'Databáze produktů',
      'productDatabases' => 'Databáze produktů'
    ],
    'links' => [
      'contractorItems' => 'Contractor Items',
      'contacts' => 'Kontakty',
      'componentss' => 'Komponenty',
      'orders' => 'Objednávky',
      'productDatabase' => 'Product Database',
      'productDatabase1' => 'Databáze produktů',
      'productDatabases' => 'Databáze produktů'
    ],
    'labels' => [
      'Create Contractor' => 'Create Contractor'
    ]
  ],
  'ContractorItem' => [
    'fields' => [
      'componentss' => 'Componentss',
      'contractors' => 'Contractors',
      'contractor' => 'Contractor',
      'components' => 'Components'
    ],
    'links' => [
      'componentss' => 'Componentss',
      'contractors' => 'Contractors',
      'contractor' => 'Contractor',
      'components' => 'Components'
    ],
    'labels' => [
      'Create ContractorItem' => 'Create ContractorItem'
    ]
  ],
  'EspoCRMnvody' => [
    'fields' => [
      'cRMNvod' => 'CRM návod'
    ],
    'links' => [],
    'labels' => [
      'Create EspoCRMnvody' => 'Create EspoCRM . návod'
    ]
  ],
  'HumanResources' => [
    'fields' => [
      'pracPomer' => 'Druh pracovního poměru',
      'employeeId' => 'Číslo zaměstnance',
      'documentation' => 'Soubory',
      'pozice' => 'Pozice',
      'majetek' => 'Majetek',
      'auto' => 'Auto',
      'mobil' => 'Mobil',
      'notebook' => 'Notebook',
      'notes' => 'Poznámky',
      'pomer' => 'Druh pracovního poměru',
      'cP' => 'Color Picker',
      'vacationRequests' => 'Vacation Requests',
      'isActive' => 'IsActive',
      'user' => 'User',
      'users' => 'Users'
    ],
    'links' => [
      'vacationRequests' => 'Vacation Requests',
      'user' => 'User',
      'users' => 'Users'
    ],
    'labels' => [
      'Create HumanResources' => 'Create HR Manager'
    ],
    'options' => [
      'pracPomer' => [
        'HPP' => 'HPP',
        'VPP' => 'VPP',
        'DPP' => 'DPP',
        'DPC' => 'DPČ'
      ],
      'majetek' => [
        'Auto' => 'Auto',
        'Mobil' => 'Mobil',
        'Notebook' => 'Notebook',
        'tarif' => 'Tarif'
      ]
    ]
  ],
  'InternalAgenda' => [
    'fields' => [
      'attachement' => 'Přílohy'
    ],
    'links' => [],
    'labels' => [
      'Create InternalAgenda' => 'Create Interní dokument'
    ]
  ],
  'LogTime' => [
    'fields' => [
      'parent' => 'Parent',
      'dateStart' => 'Date Start',
      'dateEnd' => 'Date End',
      'duration' => 'Duration',
      'status' => 'Status',
      'reminders' => 'Reminders',
      'dateStartDate' => 'Date Start (all day)',
      'dateEndDate' => 'Date End (all day)',
      'isAllDay' => 'Is All-Day',
      'task' => 'Úkol',
      'account' => 'Organizace',
      'hours' => 'Čas instalace (h)',
      'additionalCosts' => 'Další náklady',
      'transport' => 'Doprava (km)',
      'atWeekend' => 'O víkendu',
      'attachments' => 'Přílohy',
      'transportHours' => 'Čas dopravy (h)',
      'acc' => 'Ubytování',
      'cost' => 'Náklady na ubytování',
      'costCurrency' => 'Cost (Měna)',
      'costConverted' => 'Cost (Převedeno)',
      'businessProject' => 'Zakázka',
      'externist' => 'Technici',
      'contact' => 'Kontaktní osoba'
    ],
    'links' => [
      'parent' => 'Parent',
      'task' => 'Úkol',
      'account' => 'Organizace',
      'businessProject' => 'Zakázka',
      'contact' => 'Kontaktní osoba'
    ],
    'options' => [
      'status' => [
        'Planned' => 'Planned',
        'Held' => 'Held',
        'Not Held' => 'Not Held'
      ]
    ],
    'labels' => [
      'Create LogTime' => 'Create Odpracováno',
      'Schedule LogTime' => 'Schedule Odpracováno',
      'Log LogTime' => 'Log Odpracováno',
      'Set Held' => 'Set Held',
      'Set Not Held' => 'Set Not Held'
    ],
    'massActions' => [
      'setHeld' => 'Set Held',
      'setNotHeld' => 'Set Not Held'
    ],
    'presetFilters' => [
      'planned' => 'Planned',
      'held' => 'Held',
      'todays' => 'Today\'s'
    ]
  ],
  'OrderItem' => [
    'fields' => [
      'account1' => 'Account1',
      'components' => 'Components',
      'code' => 'Kód'
    ],
    'links' => [
      'account1' => 'Account1',
      'components' => 'Components'
    ]
  ],
  'Porady' => [
    'fields' => [
      'parent' => 'Parent',
      'dateStart' => 'Date Start',
      'dateEnd' => 'Date End',
      'duration' => 'Duration',
      'status' => 'Status',
      'reminders' => 'Reminders',
      'dateStartDate' => 'Date Start (all day)',
      'dateEndDate' => 'Date End (all day)',
      'isAllDay' => 'Is All-Day',
      'number' => 'Číslo porady',
      'type' => 'Typ',
      'attachement' => 'Přílohy',
      'harmonogram' => 'Harmonogram',
      'zapisProjektova' => 'Zápis',
      'zapisObchodni' => 'Zápis',
      'obchodniChecklist' => 'Přítomni',
      'nazevObchodni' => 'Název',
      'nazevIS' => 'Název',
      'nazevManagement' => 'Název',
      'nazevRD' => 'Název',
      'nazevProjektova' => 'Název',
      'nazevISO' => 'Název',
      'nazevShareholders' => 'Název',
      'nazevKvalita' => 'Název',
      'nazevSkoleni' => 'Název',
      'nazevVysledky' => 'Název',
      'nazevRizeni' => 'Název',
      'zapisIS' => 'Zápis',
      'zapisManagement' => 'Zápis',
      'zapisRD' => 'Zápis',
      'rdChecklist' => 'Přítomni',
      'qualityChecklist' => 'Přítomni',
      'isoChecklist' => 'Přítomni',
      'shareholdersChecklist' => 'Přítomni',
      'nazevDB' => 'Název',
      'nazevCT' => 'Název',
      'dbChecklist' => 'Přítomni',
      'zapisISO' => 'Zápis',
      'isChecklist' => 'Přítomni',
      'zapisKvalita' => 'Zápis',
      'zapisCT' => 'Zápis',
      'zapisShareholders' => 'Zápis',
      'zapisSkoleni' => 'Zápis',
      'zapisRizeniNakladu' => 'Zápis',
      'rizeniNakladuChecklist' => 'Přítomni',
      'zapisCR' => 'Zápis',
      'zapisDB' => 'Zápis',
      'nazevUni' => 'Název',
      'zapisUni' => 'Zápis',
      'upresnujiciNazev' => 'Upřesňující název'
    ],
    'links' => [
      'parent' => 'Parent'
    ],
    'options' => [
      'status' => [
        'Planned' => 'Planned',
        'Held' => 'Held',
        'Not Held' => 'Not Held'
      ],
      'type' => [
        'Obchodní' => 'Obchod',
        'Provozní' => 'Routine management',
        'Vývojářská' => 'R&D',
        'Update' => 'IS realizace',
        'Projektová' => 'Projekty / Výroba / Expedice',
        'ISO' => 'ISO proces',
        'Shareholders' => 'Board Shareholders',
        'Kvalita' => 'Kvalita - týdenní vyhodnocení',
        'Interní sebeškolení' => 'Interní sebeškolení',
        'Výsledky společnosti' => 'Prezentace výsledků společnosti',
        'Řízení nákladů' => 'Řízení nákladů',
        'Directors Board' => 'Director\'s Board',
        'Company Tour' => 'Company Tour',
        'Uni' => 'Univerzální'
      ],
      'obchodniChecklist' => [
        'Hrabal' => 'Hrabal',
        'Valtarová' => 'Valtarová',
        'Doležal' => 'Doležal',
        'Skoták' => 'Skoták',
        'Štencel' => 'Štencel',
        'Šikula' => 'Šikula',
        'Snížek' => 'Snížek',
        'Žochová' => 'Žochová',
        'Tobola' => 'Tobola - dobrovolný',
        'Vajda' => 'Vajda'
      ],
      'rdChecklist' => [
        'Michl Antonín' => 'Michl ',
        'Krejčí Miloslav' => 'Krejčí M.',
        'Krejčí Jiří' => 'Krejčí J.',
        'Junkerová Zuzana' => 'Junkerová',
        'Rumian Dominik' => 'Rumian',
        'Růžička Michal' => 'Růžička',
        'Tobola Miroslav' => 'Tobola'
      ],
      'qualityChecklist' => [
        'Doležal' => 'Doležal',
        'Valtarová' => 'Valtarová'
      ],
      'isoChecklist' => [
        'Michl' => 'Michl',
        'Šulc' => 'Šulc',
        'doplnit' => 'doplnit'
      ],
      'shareholdersChecklist' => [
        'Hrabal' => 'Hrabal',
        'Michl' => 'Michl',
        'Růžička' => 'Růžička',
        'Snížek' => 'Snížek'
      ],
      'dbChecklist' => [
        'Hrabal' => 'Hrabal',
        'Michl' => 'Michl',
        'Růžička' => 'Růžička',
        'Snížek' => 'Snížek'
      ],
      'isChecklist' => [
        'Junkerová' => 'Junkerová',
        'Hrabal' => 'Hrabal',
        'Tobola' => 'Tobola'
      ],
      'rizeniNakladuChecklist' => [
        'Šulc' => 'Šulc',
        'Tobola' => 'Tobola',
        'Snížek' => 'Snížek',
        'Hrabal' => 'Hrabal'
      ]
    ],
    'labels' => [
      'Create Porady' => 'Create Porada',
      'Schedule Porady' => 'Schedule Porada',
      'Log Porady' => 'Log Porada',
      'Set Held' => 'Set Held',
      'Set Not Held' => 'Set Not Held'
    ],
    'massActions' => [
      'setHeld' => 'Set Held',
      'setNotHeld' => 'Set Not Held'
    ],
    'presetFilters' => [
      'planned' => 'Planned',
      'held' => 'Held',
      'todays' => 'Today\'s'
    ]
  ],
  'ProductDatabase' => [
    'fields' => [
      'manufacturerSerialNumber' => 'Sériové číslo výrobce',
      'product' => 'Komponent',
      'product1' => 'Produkt v2',
      'contractor' => 'Dodavatel',
      'businessProject' => 'Business Project',
      'productType' => 'Typ produktu',
      'projectorType' => 'Typ projektoru',
      'lensType' => 'Optika',
      'macAddress' => 'Mac adresa',
      'wristFirmware' => 'Typ firmwaru',
      'piType' => 'Typ desky',
      'acceptanceDate' => 'Datum naskladnění',
      'ledChipImage' => 'Fotka LED čipu',
      'componentCheck' => 'Kontrola komponent',
      'temperatureCheck' => 'Provozní kontrola',
      'projectorPower' => 'Wattáž',
      'productCode' => 'Kód produktu',
      'businessProjects' => 'Business Projects',
      'contractor1' => 'Dodavatel v2',
      'details' => 'Poznámky',
      'products' => 'Product v3',
      'product12' => 'Prodkt v3',
      'contractor12' => 'Dodavatel v3',
      'components' => 'Komponenta',
      'productDatabaseParent' => 'Dodavatel',
      'productDatabases' => 'Databáze produktů',
      'productAvailability' => 'Dostupnost',
      'operationalControl' => 'Provozní kontrola komponenty',
      'isTested' => 'Otestováno',
      'print' => 'Vytisknout Brno',
      'weight' => 'Váha',
      'voltage' => 'Provozní napětí',
      'current' => 'Provozní proud',
      'print2' => 'Vytisknout Prostějov',
      'account' => 'Dodavatel',
      'salesOrder' => 'Zakázka',
      'firmVersion' => 'Verze firweru'
    ],
    'links' => [
      'product' => 'Komponent',
      'product1' => 'Produkt v2',
      'contractor' => 'Dodavatel',
      'businessProject' => 'Business Project',
      'businessProjects' => 'Business Projects',
      'contractor1' => 'Dodavatel v2',
      'products' => 'Product v3',
      'product12' => 'Prodkt v3',
      'contractor12' => 'Dodavatel v3',
      'components' => 'Komponenta',
      'productDatabaseParent' => 'Dodavatel',
      'productDatabases' => 'Databáze produktů',
      'account' => 'Dodavatel',
      'salesOrder' => 'Zakázka'
    ],
    'labels' => [
      'Create ProductDatabase' => 'Vytvořit Databáze produktů'
    ],
    'options' => [
      'productType' => [
        '-' => '-',
        'projector' => 'Projektor',
        'wristTag' => 'Wrist tag',
        'controlUnit' => 'Řídící jednotka',
        'vehicleTag' => 'Vozíkový tag',
        'Special' => 'Special',
        'Lens' => 'Optika',
        'component' => 'Komponenta',
        'lens' => 'Optika',
        'special' => 'Special'
      ],
      'projectorType' => [
        '-' => '-',
        '25-E' => '25-E',
        '22-S' => '22-S',
        '100-S' => '100-S',
        '300-S' => '300-S'
      ],
      'lensType' => [
        13 => '13°',
        20 => '20°',
        25 => '25°',
        30 => '30°',
        45 => '45°',
        47 => '47°',
        '-' => '-'
      ],
      'wristFirmware' => [
        '-' => '-',
        'classic' => 'Klasický',
        'onOnly' => 'Bez možnosti vypnutí',
        'UT-206-V05-Czech V1.0.2@V1.0.6AK' => 'UT-206-V05-Czech V1.0.2@V1.0.6AK',
        ' UT-206-Czech_V2.0.01@MMAC_V2.0.01 Alpha' => ' UT-206-Czech_V2.0.01@MMAC_V2.0.01 Alpha',
        'UT-206-Czech_V2.0.02_bez_vyp_tlacitkem@MMAC_V2.0.01 Alpha' => 'UT-206-Czech_V2.0.02_bez_vyp_tlacitkem@MMAC_V2.0.01 Alpha'
      ],
      'piType' => [
        '-' => '-',
        'rapsberryPi' => 'Rapsberry Pi',
        'bananaPi' => 'Banana Pi'
      ],
      'projectorPower' => [
        40 => '40',
        100 => '100 W',
        300 => '300 W',
        '-' => ' ',
        'Other' => 'Written in note',
        130 => '130 W',
        320 => '320 W',
        ' ' => ' ',
        25 => '25 W',
        '300-I' => '300 W',
        '300 ' => '300 W (I)'
      ],
      'productAvailability' => [
        'sent' => 'Odesláno',
        'inStock' => 'Na skladě Brno',
        'reserved' => 'Rezervováno',
        'unavailable' => 'Nedostupný',
        'inStockAledo' => 'Na skladě Prostějov',
        '' => 'Zapůjčeno',
        'rent' => 'Zapůjčeno',
        'stockAledoPv' => 'Na skladě Aledo'
      ],
      'firmVersion' => [
        2 => '2',
        3 => '3',
        4 => '4',
        '' => '1'
      ]
    ],
    'tooltips' => [
      'projectorPower' => 'Poslední 300 W = 300I'
    ]
  ],
  'ProjectorDatabase' => [
    'fields' => [
      'manufacturerSerialNumber' => 'Sériové číslo výrobce',
      'projectorType' => 'ProjectorType',
      'ledChipImage' => 'Fotka LED čipu',
      'bysinessProjectNumber' => 'Číslo zakázky',
      'defects' => 'Vady/Jiné poznámky',
      'businessProject' => 'Zakázka',
      'businessProject1' => 'Zakázka',
      'dateOfAcceptance' => 'Datum naskladnění',
      'manufacturer' => 'Dodavatel',
      'businessProjects' => 'Business Projects'
    ],
    'links' => [
      'businessProject' => 'Zakázka',
      'businessProject1' => 'Zakázka',
      'businessProjects' => 'Business Projects'
    ],
    'labels' => [
      'Create ProjectorDatabase' => 'Create Databáze projektorů'
    ],
    'options' => [
      'projectorType' => [
        '-' => '-',
        '25-E' => '25-E',
        '25-S' => '25-S',
        '100-S' => '100-S',
        '300-S' => '300-S'
      ]
    ]
  ],
  'QualityReport' => [
    'fields' => [
      'rootDefectCauses' => 'Kořenové příčiny problému',
      'correctiveActions' => 'Nápravná opatření',
      'implementedActions' => 'Ověření přijatých opatření',
      'preventiveActions' => 'Preventive Actions',
      'influence' => 'Vliv (%)',
      'efficiency' => 'Účinnost (%)',
      'correctiveActionsDate' => 'Datum opatření',
      'implementedActionsDate' => 'Datum opatření',
      'preventiveActionsDate' => 'Datum opatření',
      'closeDate' => 'Datum uzavření',
      'number' => 'Číslo protokolu',
      'repeat' => 'Může se chyba objevit také u jiných dodávek?',
      'action' => 'Okamžitá opatření',
      'partNumber' => 'Sériové číslo',
      'dateReceived' => 'Datum přijetí reklamace',
      'partName' => 'Název dílu',
      'user1' => 'Uživatel',
      'user2' => 'Uživatel',
      'user3' => 'Uživatel',
      'user4' => 'Uživatel',
      'user5' => 'Uživatel',
      'user' => 'Uživatel',
      'user6' => 'Uživatel',
      'team' => 'Tým',
      'deliveredQty' => 'Dodané množství',
      'claimQty' => 'Reklamované množství',
      'account' => 'Firma',
      'users' => 'Členové',
      'users1' => 'Členové týmu pro řešení',
      'parent' => 'Parent',
      'deliveryNote' => 'Číslo dodacího listu'
    ],
    'links' => [
      'user1' => 'Uživatel',
      'user2' => 'Uživatel',
      'user3' => 'Uživatel',
      'user4' => 'Uživatel',
      'user5' => 'Uživatel',
      'user' => 'Uživatel',
      'user6' => 'Uživatel',
      'account' => 'Firma',
      'users' => 'Uživatelé',
      'users1' => 'Členové týmu',
      'parent' => 'Parent',
      'qualityReports' => '8D Reporty'
    ],
    'labels' => [
      'Create QualityReport' => 'Create QualityReport'
    ],
    'options' => [
      'team' => [
        'Tobola' => 'Tobola',
        'Dolezal' => 'Doležal',
        'Michl' => 'Michl',
        'KrejciM' => 'Krejčí M.',
        'KrejciJ' => 'Krejčí J.',
        'Ruzicka' => 'Růžička',
        'Rumian' => 'Rumian',
        'Junkerova' => 'Junkerová',
        'Bartosik' => 'Bartošík',
        'Reithar' => 'Reithar',
        'Hrabal' => 'Hrabal',
        'Prikryl' => 'Přikryl',
        'Skotak' => 'Skoták',
        'Stencel' => 'Štencel',
        'Valtarova' => 'Valtarová',
        'Zochova' => 'Žochová',
        'Sikula' => 'Šikula',
        'Snizek' => 'Snížek',
        'Sulc' => 'Šulc',
        'Ctvrtlikova' => 'Čtvrtlíková',
        'Sramek' => 'Šrámek',
        'Sevcik' => 'Ševčík',
        'Liptak' => 'Lipták',
        'Molovcak' => 'Molovčák',
        'Kalabisova' => 'Kalabisová'
      ]
    ]
  ],
  'ReceivedInvoices' => [
    'fields' => [],
    'links' => [],
    'labels' => [
      'Create ReceivedInvoices' => 'Create Přijatá faktura'
    ]
  ],
  'RequestForm' => [
    'fields' => [
      'druh' => 'Druh',
      'projects' => 'Projekty',
      'businessProjects' => 'Zakázky',
      'purpose' => 'Účel nákupu',
      'priority' => 'Priorita',
      'requestItems' => 'Položka žádanky na nákup',
      'status' => 'Stav žádanky',
      'reasonDeclined' => 'Důvod zamítnutí',
      'approved' => 'Schváleno',
      'disapproved' => 'Zamítnuto',
      'amount' => 'Celková částka',
      'amountCurrency' => 'Celková částka (Měna)',
      'amountConverted' => 'Celková částka (Převedeno)',
      'orderStatus' => 'Stav objednávky',
      'invoice' => 'Faktura',
      'number' => 'Číslo',
      'attachments' => 'Přílohy',
      'isAllowed' => 'Is allowed'
    ],
    'links' => [
      'projects' => 'Projekty',
      'businessProjects' => 'Zakázky',
      'requestItems' => 'Položka žádanky na nákup'
    ],
    'labels' => [
      'Create RequestForm' => 'Vytvořit Žádanka na nákup'
    ],
    'options' => [
      'druh' => [
        '-' => '-',
        'Výroba' => 'Materiál do výroby',
        'Vývoj' => 'Materiál na vývoj',
        'Režijní' => 'Režijní materiál',
        'Ostatní' => 'Ostatní'
      ],
      'priority' => [
        'Nízká' => 'Nízká',
        'Střední' => 'Střední',
        'Vysoká' => 'Vysoká'
      ],
      'status' => [
        'Čeká na schválení' => 'Čeká na schváleni',
        'Schváleno' => 'Schváleno',
        'Neschváleno' => 'Neschváleno',
        'approved' => 'Schváleno',
        'disapproved' => 'Neschváleno',
        'pending' => 'Čeká na schválení',
        'panding' => 'Čeká na schválení'
      ],
      'orderStatus' => [
        'Not ordered' => 'Neobjednáno',
        'Ordered' => 'Objednáno',
        'Done' => 'Dokončeno',
        'Archive' => 'Archív'
      ]
    ],
    'tooltips' => [
      'amount' => 'If the amount is less than 10,000 CZK, the request  will be approved automatically.'
    ]
  ],
  'RequestItem' => [
    'fields' => [
      'requestForms' => 'Žádanky na nákup',
      'requestForm' => 'Žádanka na nákup',
      'products' => 'Položky',
      'product' => 'Položky'
    ],
    'links' => [
      'requestForms' => 'Žádanky na nákup',
      'requestForm' => 'Žádanka na nákup',
      'products' => 'Položky',
      'product' => 'Položky'
    ],
    'labels' => [
      'Create RequestItem' => 'Create Položka žádanky na nákup'
    ]
  ],
  'ShippingProvider' => [
    'fields' => [
      'shippingProviderTestItem' => 'TestItem'
    ],
    'links' => [
      'shippingProviderTestItem' => 'TestItem'
    ]
  ],
  'Smernice' => [
    'fields' => [
      'smerniceItems' => 'Smernice Items',
      'smrs' => 'Směrnice - dokumenty'
    ],
    'links' => [
      'smerniceItems' => 'Smernice Items',
      'smrs' => 'Směrnice - dokumenty'
    ]
  ],
  'SmerniceItem' => [
    'fields' => [
      'smerniceSlozka' => 'Smernice Slozka',
      'text' => 'Obsah'
    ],
    'links' => [
      'smerniceSlozka' => 'Smernice Slozka'
    ],
    'labels' => [
      'Create SmerniceItem' => 'Create Směrnice'
    ]
  ],
  'ComplaintBook' => [
    'fields' => [
      'account' => 'Account',
      'contact' => 'Contact',
      'parent' => 'Parent',
      'attachment' => 'Attachment'
    ],
    'links' => [
      'account' => 'Account',
      'contact' => 'Contact',
      'parent' => 'Parent'
    ],
    'labels' => [
      'Create ComplaintBook' => 'Create Complains Book'
    ]
  ],
  'ItTask' => [
    'fields' => [
      'status' => 'Status',
      'start' => 'Start',
      'finish' => 'Finish',
      'url' => 'Url',
      'attachment' => 'Attachment',
      'priority' => 'Priority',
      'solution' => 'Solution',
      'users' => 'Users'
    ],
    'links' => [
      'meetings' => 'Meetings',
      'calls' => 'Calls',
      'tasks' => 'Tasks',
      'users' => 'Users'
    ],
    'labels' => [
      'Create ItTask' => 'Create IT Marketing Task'
    ],
    'options' => [
      'status' => [
        'Created' => 'Created',
        'In Progress' => 'In Progress',
        'Testing' => 'Testing',
        'Partially' => 'Partially',
        'Done' => 'Done',
        'On hold' => 'On hold',
        'Canceled' => 'Canceled'
      ],
      'priority' => [
        1 => 'Very High',
        2 => 'High',
        3 => 'Medium',
        4 => 'Low',
        5 => 'Very low'
      ]
    ]
  ],
  'JIRA' => [
    'fields' => [
      'priority' => 'Priority',
      'predictedStart' => 'předpokládané zahájení',
      'predictedEnd' => 'Předpokládaný konec',
      'procenta' => 'Procenta',
      'image' => 'Screenshot',
      'status' => 'Status',
      'screenshot' => 'Screenshots',
      'cRM' => 'CRM',
      'queue' => 'Queue',
      'users' => 'Users',
      'toAll' => 'To All'
    ],
    'links' => [
      'users' => 'Users'
    ],
    'labels' => [
      'Create JIRA' => 'Create CRM Task'
    ],
    'options' => [
      'priority' => [
        1 => 'Very High',
        2 => 'High',
        3 => 'Medium',
        4 => 'Low',
        5 => 'Very low',
        '-' => '-'
      ],
      'procenta' => [
        '0%' => '0%',
        '10%' => '10%',
        '20%' => '20%',
        '30%' => '30%',
        '40%' => '40%',
        '50%' => '50%',
        '60%' => '60%',
        '70%' => '70%',
        '80%' => '80%',
        '90%' => '90%',
        '100%' => '100%'
      ],
      'status' => [
        'Created' => 'Created',
        'In Progress' => 'In Progress',
        'Done' => 'Done',
        '' => 'Test',
        'Testing' => 'Testing',
        'Partially' => 'Partially',
        'On hold' => 'On hold',
        'Canceled' => 'Canceled'
      ],
      'cRM' => [
        'crm.alis-is' => 'crm.alis-is',
        'alis-is' => 'alis-is',
        'aledo-de.alis-is' => 'aledo-de',
        'aledo-holding.alis-is' => 'aledo-holding',
        '' => ''
      ],
      'queue' => [
        1 => '1',
        2 => '2',
        3 => '3',
        4 => '4',
        5 => '5',
        6 => '6',
        7 => '7',
        8 => '8',
        9 => '9',
        10 => '10'
      ]
    ],
    'tooltips' => [
      'toAll' => 'Email notification will be sent to all users when this task is completed.'
    ]
  ],
  'Manufacturing' => [
    'fields' => [
      'parent' => 'ParentQuote',
      'salesOrder' => 'Sales Order',
      'bPname' => 'Název zakázky',
      'bPnumber' => 'Číslo zakázky',
      'complaintBanner' => 'Upozornění',
      'complaintProtocol' => 'Reklamační protokol',
      'deadline' => 'Deadline Výroby',
      'glassPicture' => 'Sklíčko 1',
      'glassPicture2' => 'Sklíčko 2',
      'glassPicture3' => 'Sklíčko 3',
      'isComplaint' => 'Reklamace zakázky',
      'manufacturingBanner' => 'Důvod On Hold',
      'manufacturingFinished' => 'Výroba dokončena',
      'nace' => 'Obodování',
      'progress' => 'Procento dokončení',
      'quoteProducts' => 'Produkty z nabídky',
      'status' => 'Stav'
    ],
    'links' => [
      'parent' => 'Parent',
      'salesOrder' => 'Sales Order'
    ],
    'labels' => [
      'Create Manufacturing' => 'Create Manufacturing'
    ],
    'options' => [
      'complaintBanner' => [
        '-' => '-',
        'Complaint' => 'Reklamace',
        'Special' => 'Special'
      ],
      'manufacturingBanner' => [
        '-' => '-',
        'Materiál' => 'Materiál',
        'Informace' => 'Informace',
        'Komponenta' => 'Komponenta'
      ],
      'nace' => [
        1 => '1',
        2 => '2',
        3 => '3',
        5 => '5',
        8 => '8',
        13 => '13',
        21 => '21',
        '-' => '-'
      ],
      'progress' => [
        0 => '0 %',
        10 => '10 %',
        20 => '20 %',
        25 => '25 %',
        30 => '30 %',
        40 => '40 %',
        50 => '50 %',
        60 => '60 %',
        70 => '70 %',
        75 => '75 %',
        80 => '80 %',
        90 => '90 %',
        95 => '95 %',
        100 => '100 %'
      ],
      'status' => [
        'NearLaunch' => 'Před zahájením',
        'Backlog' => 'Backlog',
        'OnHold' => 'On Hold',
        'ToDo' => 'To Do',
        'HW' => 'HW',
        'SW' => 'FW / SW',
        'Testing' => 'Testování',
        'Done' => 'Hotovo',
        'Archive' => 'Archiv'
      ]
    ]
  ],
  'Operation' => [
    'fields' => [
      'test' => 'Test',
      'describePicture' => 'Popisující obrázek',
      'productionModel' => 'Technologický postup'
    ],
    'links' => [
      'productionModel' => 'Technologický postup'
    ]
  ],
  'PriceList' => [
    'fields' => [
      'quotes' => 'Nabídky',
      'quotes1' => 'Quotes1',
      'salesOrder' => 'Sales Order',
      'salesOrders' => 'Sales Orders'
    ],
    'links' => [
      'quotes' => 'Nabídky',
      'quotes1' => 'Quotes1',
      'salesOrder' => 'Sales Order',
      'salesOrders' => 'Sales Orders'
    ]
  ],
  'ProductionModel' => [
    'fields' => [
      'operation' => 'Operace',
      'numberA' => 'Číslo postupu',
      'warehouse' => 'defaultOfWarehouse'
    ],
    'links' => [
      'operation' => 'Operace',
      'warehouse' => 'defaultOfWarehouse'
    ]
  ],
  'ProductionModelItem' => [
    'fields' => [
      'name' => 'name',
      'warehouse' => 'Warehouse',
      'stock' => 'Stock',
      'stockQuantity' => 'StockQuantity'
    ],
    'links' => [
      'warehouse' => 'Warehouse'
    ]
  ],
  'ProductionModelOperation' => [
    'fields' => [
      'testVykaz' => 'Test vykaz'
    ]
  ],
  'ProductionOrder' => [
    'fields' => [
      'numberA' => 'Číslo příkazu',
      'itemQuantity' => 'ItemQuantity',
      'fromWarehouse' => 'From stock',
      'totalProduced' => 'Total quantity',
      'quantityPlanned' => 'Planned',
      'quantityProduced' => 'Produced',
      'stockQuantity' => 'StockQuantity',
      'entryKey' => 'EntryKey',
      'isPerform' => 'IsPerform',
      'performWorkTime' => 'PerformWorkTime',
      'availableBrno' => 'In Brno',
      'availablePv' => 'In Prostějov'
    ],
    'links' => [
      'warehouse' => 'Warehouse',
      'worksPerformed' => 'WorkPerformed'
    ]
  ],
  'Prospect' => [
    'fields' => [
      'url' => 'URL',
      'linkedIn' => 'LinkedIn',
      'company' => 'Company',
      'position' => 'Position',
      'email' => 'Email',
      'phoneNumber' => 'PhoneNumber',
      'country' => 'Country',
      'fromHunter' => 'FromHunter',
      'targetLists' => 'Target Lists',
      'emailAddress' => 'Email',
      'targetListIsOptedOut' => 'Target List (Is Opted Out)',
      'status' => 'Status',
      'lead' => 'Created Lead',
      'emailDb' => 'EmailDb',
      'isChecked' => 'IsChecked'
    ],
    'links' => [
      'targetLists' => 'Target Lists',
      'lead' => 'Created Lead'
    ],
    'labels' => [
      'Create Prospect' => 'Create Prospect'
    ],
    'options' => [
      'status' => [
        'New' => 'New',
        'Contacted' => 'Contacted',
        'Forwarded' => 'Forwarded',
        'In communication' => 'In communication',
        'Quoted' => 'Quoted',
        'Waitning' => 'Waitning',
        'Converted' => 'Converted',
        'Lost' => 'Lost',
        'First contact' => 'First contact',
        'Second contact' => 'Second contact'
      ]
    ]
  ],
  'Reclamation' => [
    'fields' => [
      'type' => 'Typ',
      'parent' => 'Výdejka',
      'goodsIssue' => 'Výdejka',
      'goodsIssues' => 'Výdejka',
      'numberA' => 'Číslo reklamace',
      'salesOrder1' => 'Sales Order1'
    ],
    'options' => [
      'type' => [
        'Reclamation' => 'Reklamace',
        'Notice' => 'Upozornění'
      ]
    ],
    'links' => [
      'parent' => 'Výdejka',
      'goodsIssue' => 'Výdejka',
      'goodsIssues' => 'Výdejka',
      'salesOrder1' => 'Sales Order1'
    ]
  ],
  'SalesOrderSummaryItem' => [
    'fields' => [
      'salesOrder' => 'Zakázka',
      'quantity' => 'Požadované množství',
      'reservedQuantity' => 'Rezervované množství',
      'producedQuantity' => 'Vyrobené množství'
    ],
    'links' => [
      'salesOrder' => 'Zakázka'
    ],
    'labels' => [
      'Create SalesOrderSummaryItem' => 'Create Položka shrnutí zakázky'
    ]
  ],
  'Seeker' => [
    'fields' => [],
    'links' => [],
    'labels' => [
      'Create Seeker' => 'Create Seeker'
    ]
  ],
  'Selector' => [
    'fields' => [
      'name' => 'Projector',
      'lens' => 'Lens',
      'illuminance' => 'Illuminance (LUX)',
      'symbolIlluminance' => 'Symbol Illuminance (LUX)',
      'price' => 'Price (EUR)',
      'priceCurrency' => 'Price (Currency)',
      'priceConverted' => 'Price (Converted)',
      'symbolSize' => 'SymbolSize',
      'height' => 'Height (mm)'
    ],
    'links' => [],
    'labels' => [
      'Create Selector' => 'Create Selector'
    ]
  ],
  'SupplierOrder' => [
    'fields' => [
      'salesOrder' => 'Zakázka',
      'isDelivered' => 'IsDelivered',
      'attachment' => 'Attachments'
    ],
    'links' => [
      'salesOrder' => 'Zakázka'
    ]
  ],
  'SupplierOrderItem' => [
    'fields' => [
      'deliveredQuantity' => 'DeliveredQuantity',
      'deliveredBefore' => 'DeliveredBefore',
      'stockLocation' => 'StockLocation'
    ],
    'options' => [
      'stockLocation' => [
        'brno' => 'Brno',
        'pv' => 'Prostějov'
      ]
    ],
    'tooltips' => [
      'deliveredBefore' => 'If ordered 100 pcs of item A. We get partial 20 pcs. I must choose the correct stock. Next time we get another 20 pcs, choose the stock. In the field Delivered before is 20 pcs and in the Delivered quantity you must write 40 pcs as a new stock amount.'
    ]
  ],
  'SupplierReclamation' => [
    'labels' => [
      'Create SupplierReclamation' => 'Create Supplier Reclamation'
    ],
    'fields' => [
      'numberA' => 'Číslo reklamace'
    ]
  ],
  'Tax' => [
    'fields' => [],
    'links' => [],
    'labels' => [
      'Create Tax' => 'Create Tax'
    ]
  ],
  'Wiso' => [
    'fields' => [
      'warehouseItem' => 'Warehouse Item',
      'salesOrder' => 'Sales Order',
      'quantity' => 'Quantity',
      'warehouseItem1' => 'WarehouseItem',
      'salesOrder1' => 'Sales Order',
      'itemName' => 'ItemName',
      'entryKey' => 'EntryKey',
      'stockLocation' => 'StockLocation'
    ],
    'links' => [
      'warehouseItem' => 'Warehouse Item',
      'salesOrder' => 'Sales Order',
      'warehouseItem1' => 'Warehouse Item1',
      'salesOrder1' => 'Sales Order1'
    ],
    'labels' => [
      'Create Wiso' => 'Create Wiso'
    ],
    'options' => [
      'stockLocation' => [
        'brno' => 'Brno',
        'pv' => 'Prostějov'
      ]
    ]
  ],
  'WorkCenter' => [
    'fields' => [
      'availableTools' => 'Dostupné nářadí'
    ],
    'options' => [
      'availableTools' => []
    ]
  ],
  'WorkPerformed' => [
    'fields' => [
      'parent' => 'Rodič',
      'stockLocation' => 'StockLocation'
    ],
    'links' => [
      'parent' => 'Rodič'
    ],
    'options' => [
      'stockLocation' => [
        'Brno' => 'Brno',
        'Prostejov' => 'Prostějov',
        'brno' => 'Brno',
        'pv' => 'Prostějov'
      ]
    ]
  ]
];
