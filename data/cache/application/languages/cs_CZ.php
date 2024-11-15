<?php
return [
  'ActionHistoryRecord' => [
    'fields' => [
      'user' => 'Uživatel',
      'action' => 'Akce',
      'createdAt' => 'Datum',
      'userType' => 'Typ uživatele',
      'target' => 'Cíl',
      'targetType' => 'Typ cíle',
      'authToken' => 'Auth Token',
      'ipAddress' => 'IP Adresa',
      'authLogRecord' => 'Auth Log Record'
    ],
    'links' => [
      'authToken' => 'Auth Token',
      'authLogRecord' => 'Auth Log Record',
      'user' => 'Uživatel',
      'target' => 'Cíl'
    ],
    'presetFilters' => [
      'onlyMy' => 'Jenom já'
    ],
    'options' => [
      'action' => [
        'read' => 'Číst',
        'update' => 'Aktualizovat',
        'delete' => 'Smazat',
        'create' => 'Vytořit'
      ]
    ]
  ],
  'Admin' => [
    'labels' => [
      'Enabled' => 'Povoleno',
      'Disabled' => 'Zakázáno',
      'System' => 'Systém',
      'Users' => 'Uživatelé',
      'Email' => 'Email',
      'Messaging' => 'Messaging',
      'Data' => 'Data',
      'Misc' => 'Misc',
      'Customization' => 'Přizpůsobení',
      'Available Fields' => 'Dostupná pole',
      'Layout' => 'Vzhled',
      'Entity Manager' => 'Správa entit',
      'Add Panel' => 'Přidat panel',
      'Add Field' => 'Přidat pole',
      'Settings' => 'Nastavení',
      'Scheduled Jobs' => 'Naplánované akce',
      'Upgrade' => 'Upgrade',
      'Clear Cache' => 'Vyčistit cache',
      'Rebuild' => 'Přestavět',
      'Teams' => 'Týmy',
      'Roles' => 'Role',
      'Portal' => 'Portal',
      'Portals' => 'Portály',
      'Portal Roles' => 'Role portálu',
      'Portal Users' => 'Uživatelé portálu',
      'API Users' => 'API uživatelé',
      'Outbound Emails' => 'Odchozí emaily',
      'Group Email Accounts' => 'Skupinové e-mailové účty',
      'Personal Email Accounts' => 'Osobní e-mailové účty',
      'Inbound Emails' => 'Příchozí emaily',
      'Email Templates' => 'Šablony emailů',
      'Import' => 'Import',
      'Layout Manager' => 'Správa vzhledu',
      'User Interface' => 'Uživatelské rozhraní',
      'Auth Tokens' => 'Autentizační tokeny',
      'Auth Log' => 'Auth Log',
      'Authentication' => 'Autentizace',
      'Currency' => 'Měna',
      'Integrations' => 'Integrace',
      'Extensions' => 'Rozšíření',
      'Webhooks' => 'Webhooks',
      'Dashboard Templates' => 'Šablony hlavních panelů',
      'Upload' => 'Nahrát',
      'Installing...' => 'Instaluji...',
      'Upgrading...' => 'Upgraduji...',
      'Upgraded successfully' => 'Úspěšně upgradováno',
      'Installed successfully' => 'Úspěšně nainstalováno',
      'Ready for upgrade' => 'Připraveno k upgradu',
      'Run Upgrade' => 'Spustit upgrade',
      'Install' => 'Instalovat',
      'Ready for installation' => 'Připraveno k instalaci',
      'Uninstalling...' => 'Odebírám...',
      'Uninstalled' => 'Odebráno',
      'Create Entity' => 'Vytvořit entitu',
      'Edit Entity' => 'Upravit entitu',
      'Create Link' => 'Vytvořit link',
      'Edit Link' => 'Upravit link',
      'Notifications' => 'Upozornění',
      'Jobs' => 'Jobs',
      'Job Settings' => 'Job Settings',
      'Reset to Default' => 'Obnovit do základního nastavení',
      'Email Filters' => 'E-mailové filtry',
      'Action History' => 'Historie akcí',
      'Label Manager' => 'Správce labelů',
      'Template Manager' => 'Správce šablon',
      'Lead Capture' => 'Lead Capture',
      'Attachments' => 'Přílohy',
      'System Requirements' => 'Požadavky na systém',
      'PDF Templates' => 'PDF Šablony',
      'PHP Settings' => 'Nastavení PHP',
      'Database Settings' => 'Nastavení databáze',
      'Permissions' => 'Oprávnění',
      'Email Addresses' => 'Emailové adresy',
      'Phone Numbers' => 'Telefonní čísla',
      'Layout Sets' => 'Sady vzhledů',
      'Working Time Calendars' => 'Working Time Calendars',
      'Group Email Folders' => 'Group Email Folders',
      'Authentication Providers' => 'Authentication Providers',
      'Success' => 'Úspěch',
      'Fail' => 'Fail',
      'Configuration Instructions' => 'Configuration Instructions',
      'Formula Sandbox' => 'Formula Sandbox',
      'is recommended' => 'je doporučeno',
      'extension is missing' => 'extension is missing',
      'Add Layout' => 'Přidat layout',
      'Add Related Field' => 'Přidat příbuzné pole',
      'AutoCRM Settings' => 'AutoCRM nastavení',
      'Show All Layouts' => 'Zobrazit všechny layouty',
      'Workflow Manager' => 'Workflows',
      'Flowcharts' => 'Vývojové diagramy',
      'Processes' => 'Procesy',
      'Business Process Management' => 'Řízení podnikových procesů',
      'Report Filters' => 'Filtry reportů',
      'Report Panels' => 'Panely reportů',
      'Records Recurrences' => 'Opakované záznamy',
      'Sales Order Settings' => 'Nastavení objednávek',
      'HumanResources Settings' => 'Nastavení HR modulu',
      'Warehouse Management Settings' => 'Nastavení skladů',
      'Invoice Settings' => 'Adresa firmy a nastavení faktur',
      'Clear Browser Cache' => 'Vyčistit mezipaměť prohlížeče',
      'Unit Settings' => 'Nastavení jednotek',
      'Scheduled Recurrences' => 'Naplánované opakovaní',
      'Reclamation Settings' => 'Nastavení reklamací'
    ],
    'layouts' => [
      'list' => 'Seznam',
      'detail' => 'Detail',
      'listSmall' => 'Seznam (malý)',
      'detailSmall' => 'Detail (malý)',
      'detailPortal' => 'Detail (Portál)',
      'detailSmallPortal' => 'Detail (Small, Portál)',
      'listSmallPortal' => 'List (Small, Portal)',
      'listPortal' => 'Seznam (portál)',
      'relationshipsPortal' => 'Panely vztahů (Portál)',
      'filters' => 'Vyhledávací filtry',
      'massUpdate' => 'Hromadný update',
      'relationships' => 'Vztah',
      'defaultSidePanel' => 'Pole bočního panelu',
      'bottomPanelsDetail' => 'Spodní panely',
      'bottomPanelsEdit' => 'Spodní panely (Upravit)',
      'bottomPanelsDetailSmall' => 'Spodní panely (Detail malé)',
      'bottomPanelsEditSmall' => 'Spodní panely (Upravit malé)',
      'sidePanelsDetail' => 'Boční panely (Detail)',
      'sidePanelsEdit' => 'Boční panely (Upravit)',
      'sidePanelsDetailSmall' => 'Boční panely (Detail malé)',
      'sidePanelsEditSmall' => 'Boční panely (Upravit malé)',
      'kanban' => 'Kanban',
      'detailConvert' => 'Konvertovat stopu',
      'listForAccount' => 'Seznam (pro organizace)',
      'listForContact' => 'Seznam (pro kontakt)',
      'aggregationFunctions' => 'Agregační funkce',
      'listGoodsReceiptSimple' => 'Příjemka (Jednoduchý sklad)',
      'listGoodsReceiptPositional' => 'Příjemka (sklad s pozicemi)',
      'listGoodsIssueSimple' => 'Výdejka (Jednoduchý sklad)',
      'listGoodsIssuePositional' => 'Výdejka (Sklad s pozicemi)',
      'listGoodsIssueSelectedSimple' => 'Výdejka - požadované položky (Jednoduchý sklad)',
      'listGoodsIssueSelectedPositional' => 'Výdejka - požadované položky (Sklad s pozicemi)',
      'listWarehouseTransferSimpleSimple' => 'Skladový přesun (Jednoduchý -> Jednoduchý)',
      'listWarehouseTransferSimplePositional' => 'Skladový přesun (Jednoduchý -> S pozicemi)',
      'listWarehouseTransferPositionalSimple' => 'Skladový přesun (S pozicemi -> Jednoduchý)',
      'listWarehouseTransferPositionalPositional' => 'Skladový přesun (S pozicemi -> S pozicemi)',
      'listWarehouseSimple' => 'Sklad (Jednoduchý)',
      'listWarehousePositional' => 'Sklad (S pozicemi)',
      'listProductSimple' => 'Produkt (Jednoduchý sklad)',
      'listProductPositional' => 'Produkt (Sklad s pozicemi)',
      'listitem' => 'Listitem',
      'listitemsmall' => 'Listitemsmall',
      'Create and Update' => 'Vytvořit a aktualizovat',
      'Create Only' => 'Pouze vytvořit',
      'listItem' => 'Seznam (položka)',
      'Update Only' => 'Pouze aktualizovat',
      'listPriceList' => 'Produkty ceníku',
      'listRunningOut' => 'Docházející produkty (dashlet)',
      'test' => 'Test'
    ],
    'fieldTypes' => [
      'address' => 'Adresa',
      'array' => 'Pole',
      'foreign' => 'Cizí pole',
      'duration' => 'Trvání',
      'password' => 'Heslo',
      'personName' => 'Jméno osoby',
      'autoincrement' => 'Automatický přírůstek',
      'bool' => 'Ano/Ne',
      'currency' => 'Měna',
      'currencyConverted' => 'Měna (převedená)',
      'date' => 'Datum',
      'datetime' => 'Datum a čas',
      'datetimeOptional' => 'Datum/Datum a čas',
      'email' => 'Email',
      'enum' => 'Výběr',
      'enumInt' => 'Výběr (číslo)',
      'enumFloat' => 'Výběr (desetinné číslo)',
      'float' => 'Číslo (desetinné)',
      'int' => 'Číslo (celé)',
      'link' => 'Vazba',
      'linkMultiple' => 'Vazba (vícenásobná)',
      'linkParent' => 'Vazba (rodič)',
      'linkOne' => 'Vazba (jednonásobná)',
      'phone' => 'Telefon',
      'text' => 'Text',
      'url' => 'URL adresa',
      'urlMultiple' => 'Url Multiple',
      'varchar' => 'Varchar',
      'file' => 'Soubor',
      'image' => 'Obrázek',
      'multiEnum' => 'Výběr (vícenásobný)',
      'attachmentMultiple' => 'Více příloh',
      'rangeInt' => 'Range Integer',
      'rangeFloat' => 'Range Float',
      'rangeCurrency' => 'Range Currency',
      'wysiwyg' => 'Wysiwyg',
      'map' => 'Map',
      'number' => 'Číslo faktury',
      'colorpicker' => 'Color Picker',
      'checklist' => 'Ano/Ne (seznam)',
      'barcode' => 'Čárový kód',
      'jsonArray' => 'JSON pole',
      'jsonObject' => 'JSON objekt',
      'electronicSignature' => 'Elektronický podpis',
      'foreignMultiple' => 'Cizí pole (vícenásobný vztah)',
      'speedometerGraph' => 'Graf (tachometr)',
      'progressBar' => 'Ukazatel postupu',
      'sequenceNumber' => 'Číslo řady',
      'vatId' => 'DIČ',
      'parsonName' => 'Jméno',
      'multienim' => 'Multienum',
      'arrowColor' => 'Barva ručičky',
      'base' => 'Výchozí',
      'currentValue' => 'Aktualní hodnota',
      'dynamicChecklist' => 'Ano/Ne (dynamický seznam)',
      'floatWithUnit' => 'Číslo (desetinné) s jednotkou',
      'targetValue' => 'Cílová hodnota',
      'unitPerUnit' => 'Jednotka / jednotka'
    ],
    'fields' => [
      'type' => 'Typ',
      'name' => 'Jméno',
      'label' => 'Popisek',
      'tooltipText' => 'Tooltip Text',
      'required' => 'Povinné',
      'default' => 'Výchozí',
      'maxLength' => 'Maximální délka',
      'options' => 'Možnosti',
      'optionsReference' => 'Options Reference',
      'after' => 'Po (pole)',
      'before' => 'Před (pole)',
      'link' => 'Odkaz',
      'field' => 'Pole',
      'min' => 'Min',
      'max' => 'Max',
      'translation' => 'Překlad',
      'previewSize' => 'Velikost náhledu',
      'listPreviewSize' => 'Preview Size in List View',
      'noEmptyString' => 'Neprázdný řetězec',
      'defaultType' => 'Výchozí typ',
      'seeMoreDisabled' => 'Zakázat ořez textu',
      'cutHeight' => 'Oříznout výšku (px)',
      'entityList' => 'Entity List',
      'isSorted' => 'Je seřazeno (abecedně)',
      'audited' => 'Audited',
      'trim' => 'Trim',
      'height' => 'Výška (px)',
      'minHeight' => 'Minimální výška (px)',
      'provider' => 'Poskytovatel',
      'typeList' => 'Type List',
      'rows' => 'Počet řádků textové oblasti',
      'lengthOfCut' => 'Délka řezu',
      'sourceList' => 'Seznam zdrojů',
      'prefix' => 'Předpona',
      'nextNumber' => 'Další číslo',
      'padLength' => 'Minimální počet číslic',
      'disableFormatting' => 'Zakázat formátování',
      'dynamicLogicVisible' => 'Podmínky pro zviditelnění pole',
      'dynamicLogicReadOnly' => 'Podmínky umožňující pole jen pro čtení',
      'dynamicLogicRequired' => 'Je vyžadováno pole pro vytváření podmínek',
      'dynamicLogicOptions' => 'Podmíněné možnosti',
      'dynamicLogicInvalid' => 'Conditions making field invalid',
      'probabilityMap' => 'Pravděpodobnosti fáze (%)',
      'notActualOptions' => 'Not Actual Options',
      'readOnly' => 'Pouze ke čtení',
      'readOnlyAfterCreate' => 'Read-only After Create',
      'maxFileSize' => 'Maximální velikost souboru (Mb)',
      'isPersonalData' => 'Jsou osobní údaje',
      'useIframe' => 'Use Iframe',
      'useNumericFormat' => 'Use Numeric Format',
      'strip' => 'Strip',
      'minuteStep' => 'Minutes Step',
      'inlineEditDisabled' => 'Zakázat vložené úpravy',
      'allowCustomOptions' => 'Povolit vlastní možnosti',
      'displayAsLabel' => 'Zobrazit jako štítek',
      'displayAsList' => 'Zobrazit jako seznam',
      'maxCount' => 'Maximální počet položek',
      'accept' => 'Přijmout',
      'viewMap' => 'View Map Button',
      'codeType' => 'Code Type',
      'lastChar' => 'Poslední znak',
      'onlyDefaultCurrency' => 'Pouze výchozí měna',
      'decimal' => 'Decimal',
      'displayRawText' => 'Zobrazit holý text (bez označení)',
      'conversionDisabled' => 'Disable Conversion',
      'decimalPlaces' => 'Decimal Places',
      'pattern' => 'Pattern',
      'globalRestrictions' => 'Global Restrictions',
      'copyToClipboard' => 'Copy to clipboard button',
      'createButton' => 'Create Button',
      'autocompleteOnEmpty' => 'Autocomplete on empty input',
      'checkboxesEnabled' => 'Povolit zaškrtávací políčka',
      'recordListButtonsPosition' => 'Buttons Position',
      'createAsModal' => 'Vytváření jako modal',
      'defaultSelectAttributes' => 'Default Select Attributes',
      'lockAfterSigning' => 'Zamknout po podpisu',
      'notStorable' => 'Neuložitelné',
      'recordListConfirmRemove' => 'Potvrzovat odstranění záznamů',
      'recordListCreateDisabled' => 'Zakázat vytváření tlačítko záznamů',
      'recordListEnabled' => 'Povolit seznam záznamů',
      'recordListKeepRemoved' => 'Ponechat odstraněné záznamy',
      'recordListLayout' => 'Rozvržení seznamu',
      'recordListLinkDisabled' => 'Zakázat linkování tlačítko záznamů',
      'recordListOrderByField' => 'Pole pořadí',
      'recordListRemoveDisabled' => 'Zakázat odstraňování záznamů',
      'saveCoordinates' => 'Ukládat souřadnice',
      'displayAsLinks' => 'Zobrazit jako odkazy',
      'currentValue' => 'Aktualní hodnota',
      'targetValue' => 'Cílová hodnota',
      'arrowColor' => 'Barva ručičky',
      'labelsEnabled' => 'Povolit popisky',
      'labelsFontPercentage' => 'Velikost popisku (%)',
      'numberLineEnabled' => 'Povolit číselnou osu',
      'numberLineFontPercentage' => 'Velikost číselné osy (%)',
      'labelsFormat' => 'Formát popisků',
      'startColor' => 'Počáteční barva',
      'endColor' => 'Koncová barva',
      'align' => 'Zarovnání',
      'width' => 'Šířka (px)',
      'labelColor' => 'Barva popisku',
      'backgroundColor' => 'Barva pozadí',
      'labelsFontWidth' => 'Šířka písma (px)',
      'dateWarning' => 'Barevné vyznačení data po termínu',
      'format' => 'Formát čísla',
      'reset' => 'Resetovat číslo',
      'validateFormat' => 'Validovat formát',
      'validateExistence' => 'Validovat existenci',
      'copyAttachmentsButton' => 'Tlačítko pro kopírování příloh',
      'copyAttachmentsEntityList' => 'Seznam entit pro kopírování příloh',
      'copyFieldList' => 'Pole ke kopírování',
      'defaultSelectFilters' => 'Výchozí filtry'
    ],
    'strings' => [
      'rebuildRequired' => 'Rebuild je vyžadován.'
    ],
    'messages' => [
      'formulaFunctions' => 'More functions can be found in [documentation]({documentationUrl}).',
      'rebuildRequired' => 'Musíte spustit znovu rebuild z CLI.',
      'upgradeVersion' => 'AutoCRM bude upgradováno na verzi &lt;strong&gt;{version}&lt;/strong&gt;. Toto může chvíli trvat.',
      'upgradeDone' => 'AutoCRM bylo upgradováno na verzi &lt;strong&gt;{version}&lt;/strong&gt;.',
      'upgradeBackup' => 'Doporučujeme zálohovat soubory a data AutoCRM před upgradem.',
      'thousandSeparatorEqualsDecimalMark' => 'Oddělovač tisíců nemůže být stejný jako desetinný symbol.',
      'userHasNoEmailAddress' => 'Uživatel nemá emailovou adresu.',
      'selectEntityType' => 'Vybrat entitu v levém menu.',
      'selectUpgradePackage' => 'Vybrat upgrade balíček',
      'downloadUpgradePackage' => 'Stáhnout upgradovací balíčky na <a href="https://sourceforge.net/projects/espocrm/files/Upgrades/">tomto odkaze</a>.',
      'selectLayout' => 'Vybrat požadovaný layout v levém menu a upravit ho.',
      'selectExtensionPackage' => 'Vybrat rozšiřující balíček',
      'extensionInstalled' => 'Rozšíření {name} {version} bylo nainstalováno.',
      'installExtension' => 'Rozšíření {name} {version} je připraveno k instalaci.',
      'cronIsNotConfigured' => 'Naplánované úlohy nejsou spuštěny. Příchozí e-maily, oznámení a připomenutí proto nefungují. Postupujte podle [pokynů] (https://www.espocrm.com/documentation/administration/server-configuration/#user-content-setup-a-crontab) k nastavení úlohy cron.',
      'newVersionIsAvailable' => 'K dispozici je nová verze AutoCRM {latestVersion}. Při aktualizaci instance postupujte podle [pokynů] (https://www.espocrm.com/documentation/administration/upgrading/).',
      'newExtensionVersionIsAvailable' => 'Je k dispozici nová verze {latestName} {latestVersion}.',
      'uninstallConfirmation' => 'Opravdu odinstalovat vybrané rozšíření?',
      'upgradeInfo' => 'Přečtěte si [dokumentaci] ({url}) o tom, jak upgradovat instanci AutoCRM.',
      'upgradeRecommendation' => 'Tento způsob upgradu se nedoporučuje. Je lepší upgradovat z CLI.',
      'newAdvancedPackVersionIsAvailable' => 'K dispozici je nová verze Advanced Pack {latestVersion}. Lze jej stáhnout na zákaznickém portálu'
    ],
    'descriptions' => [
      'settings' => 'Systémová nastavení aplikace.',
      'scheduledJob' => 'Činnosti vykonávané CRONem.',
      'jobs' => 'Spustit akce na pozadí',
      'upgrade' => 'Upgradovat EspoCRM.',
      'clearCache' => 'Vyčistit veškerou cache.',
      'rebuild' => 'Přestavět backend a vyčistit cache.',
      'users' => 'Správa uživatelů.',
      'teams' => 'Správa týmů.',
      'roles' => 'Správa rolí.',
      'portals' => 'Správa portálů.',
      'portalRoles' => 'Role pro portál.',
      'portalUsers' => 'Uživatelé portálu.',
      'outboundEmails' => 'Nastavení SMTP pro odchozí emaily.',
      'groupEmailAccounts' => 'Group IMAP email accounts. Email import and Email-to-Case.',
      'personalEmailAccounts' => 'E-mailové účty uživatelů.',
      'emailTemplates' => 'Šablony pro odchozí emaily.',
      'import' => 'Importovat data z CSV souboru.',
      'layoutManager' => 'Přizpůsobit layouty (seznam, detail, upravit, hledat, hromadný update).',
      'entityManager' => 'Vytvořit vlastní entity, úpravit existující. Správa polí a vztahů.',
      'userInterface' => 'Nastavit uživatelské rozhraní.',
      'authTokens' => 'Aktivní autentizační sessions. IP adresa a datum posledního přístupu.',
      'authentication' => 'Nastavení autentizace.',
      'currency' => 'Nastavení měn a kurzů.',
      'extensions' => 'Instalovat a odebrat rozšíření.',
      'integrations' => 'Integrace se službami třetích stran.',
      'notifications' => 'Nastavení In-app a emailových upozornění.',
      'inboundEmails' => 'Skupinové IMAP účty. Email import a Email Do Případu',
      'emailFilters' => 'E-mailové zprávy, které odpovídají zadanému filtru, nebudou importovány.',
      'groupEmailFolders' => 'Email folders shared for teams.',
      'actionHistory' => 'Protokol akcí uživatelů.',
      'labelManager' => 'Upravit popisky',
      'templateManager' => 'Přizpůsobte si šablony zpráv.',
      'authLog' => 'Historie přihlášení.',
      'leadCapture' => 'API entry points for Web-to-Lead.',
      'attachments' => 'Všechny přílohy souborů uložené v systému.',
      'systemRequirements' => 'Systémové požadavky na AutoCRM.',
      'apiUsers' => 'Oddělte uživatele pro účely integrace.',
      'webhooks' => 'Manage webhooks.',
      'authenticationProviders' => 'Additional authentication providers for portals.',
      'emailAddresses' => 'Všechny e-mailové adresy uložené v systému.',
      'phoneNumbers' => 'Všechna telefonní čísla uložená v systému.',
      'dashboardTemplates' => 'Přidat dashboardy uživatelům',
      'layoutSets' => 'Kolekce layoutů, které lze přiřadit týmům a portálům.',
      'workingTimeCalendars' => 'Working schedule.',
      'jobsSettings' => 'Job processing settings. Jobs execute tasks in the background.',
      'sms' => 'SMS settings.',
      'pdfTemplates' => 'Šablony pro tisk do PDF.',
      'formulaSandbox' => 'Write and test formula scripts.',
      'autocrm' => 'Konfigurační parametry pro AutoCRM rozšíření.',
      'workflowManager' => 'Sestavit pravidla Workflow',
      'bpmnFlowcharts' => 'Definice obchodních procesů.',
      'bpmnProcesses' => 'Instance obchodních procesů.',
      'reportFilters' => 'Vlastní filtry zobrazení seznamu na základě sestav.',
      'reportPanels' => 'Panely podrobného zobrazení zobrazující výsledky zprávy.',
      'recordRecurrence' => 'Seznam všech naplánovaných opakovaných záznamů.',
      'salesOrderSettingsDescription' => 'Nastavení skladu pro automatické workflow objednávek',
      'humanResourcesSettings' => 'Nastavení výchozích hodnot HR modulu.',
      'warehouseManagement' => 'Konfigurační parametry pro skladové rozšíření',
      'invoiceSettings' => 'Nastavení výchozích hodnot a dalších parametrů na fakturách.',
      'reclamationSettingsDescription' => 'Nastavení pro reklamace'
    ],
    'keywords' => [
      'settings' => 'system',
      'userInterface' => 'ui,theme,tabs,logo,dashboard',
      'authentication' => 'password',
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
        'x-small' => 'Extra-malý',
        'small' => 'Malý',
        'medium' => 'Střední',
        'large' => 'Velký'
      ],
      'reset' => [
        'Daily' => 'Denně',
        'Monthly' => 'Měsíčně',
        'Yearly' => 'Ročně',
        'Never' => 'Nikdy'
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
      'host' => 'Jméno hostitele',
      'dbname' => 'Název databáze',
      'user' => 'User Name',
      'writable' => 'Writable',
      'readable' => 'Readable'
    ],
    'templates' => [
      'twoFactorCode' => '2FA Code',
      'accessInfo' => 'Přístupové údaje',
      'accessInfoPortal' => 'Přístupové údaje na portály',
      'assignment' => 'Úkol',
      'mention' => 'Mention',
      'noteEmailReceived' => 'Poznámka o přijatém e-mailu',
      'notePost' => 'Poznámka k příspěvku',
      'notePostNoParent' => 'Poznámka k příspěvku (bez rodiče)',
      'noteStatus' => 'Poznámka k aktualizaci stavu',
      'passwordChangeLink' => 'Odkaz na změnu hesla',
      'invitation' => 'Pozvání',
      'cancellation' => 'Cancellation',
      'reminder' => 'Připomínka',
      'reportSendingGrid1' => 'Report Grid-1',
      'reportSendingGrid2' => 'Report Grid-2',
      'reportSendingList' => 'Report List',
      'salesEmailPdf' => 'Zaslat e-mailem PDF (prodej)'
    ]
  ],
  'ApiUser' => [
    'labels' => [
      'Create ApiUser' => 'Vytvořit API uživatele'
    ]
  ],
  'Attachment' => [
    'fields' => [
      'role' => 'Role',
      'related' => 'Příbuzný',
      'file' => 'Soubor',
      'type' => 'Typ',
      'field' => 'Pole',
      'sourceId' => 'Zdrojové ID',
      'storage' => 'Úložiště',
      'size' => 'Velikost v bytech',
      'isBeingUploaded' => 'Is Being Uploaded',
      'global' => 'Globální',
      'storageFilePath' => 'Cesta k úložišti',
      'contents' => 'Obsah'
    ],
    'options' => [
      'role' => [
        'Attachment' => 'Příloha',
        'Inline Attachment' => 'Vložená příloha',
        'Import File' => 'Importovat soubor',
        'Export File' => 'Exportovat soubor',
        'Mail Merge' => 'Spojit Emaily',
        'Mass Pdf' => 'Hromadná tvorba PDF'
      ]
    ],
    'insertFromSourceLabels' => [
      'Document' => 'Vložit dokument'
    ],
    'presetFilters' => [
      'orphan' => 'Sirotek'
    ],
    'labels' => [
      'Create Attachment' => 'Vytvořit přílohu'
    ],
    'links' => [
      'related' => 'Příbuzný'
    ]
  ],
  'AuthLogRecord' => [
    'fields' => [
      'username' => 'Uživatelské jméno',
      'ipAddress' => 'IP Adresa',
      'requestTime' => 'Čas požadavku',
      'createdAt' => 'Požadováno v',
      'isDenied' => 'Je odmítnuto',
      'denialReason' => 'Důvod odmítnutí',
      'portal' => 'Portál',
      'user' => 'Uživatel',
      'authToken' => 'Token ověření vytvořen',
      'requestUrl' => 'URL požadavku',
      'requestMethod' => 'Způsob vyžádání',
      'authTokenIsActive' => 'Ověřovací token je aktivní',
      'authenticationMethod' => 'Metoda ověřování'
    ],
    'links' => [
      'authToken' => 'Token ověření vytvořen',
      'user' => 'Uživatel',
      'portal' => 'Portál',
      'actionHistoryRecords' => 'Historie akcí'
    ],
    'presetFilters' => [
      'denied' => 'Zamítnuto',
      'accepted' => 'Přijato'
    ],
    'options' => [
      'denialReason' => [
        'CREDENTIALS' => 'Nesprávné údaje',
        'INACTIVE_USER' => 'Neaktivní uživatel',
        'IS_PORTAL_USER' => 'Portálový uživatel',
        'IS_NOT_PORTAL_USER' => 'Není portálovým uživatelem',
        'USER_IS_NOT_IN_PORTAL' => 'Uživatel není přiřazen k portálu'
      ]
    ],
    'labels' => [
      'Create AuthLogRecord' => 'Vytvořit záznam protokolu autentizace'
    ]
  ],
  'AuthToken' => [
    'fields' => [
      'user' => 'Uživatel',
      'ipAddress' => 'IP adresa',
      'lastAccess' => 'Datum posledního přístupu',
      'createdAt' => 'Datum přihlášení',
      'isActive' => 'Je aktivní',
      'portal' => 'Portál',
      'hash' => 'Klíč',
      'secret' => 'Tajný',
      'token' => 'Token',
      'userId' => 'Uživatelské ID'
    ],
    'links' => [
      'actionHistoryRecords' => 'Historie akcí',
      'portal' => 'Portál',
      'user' => 'Uživatel'
    ],
    'presetFilters' => [
      'active' => 'Aktivní',
      'inactive' => 'Neaktivní'
    ],
    'labels' => [
      'Set Inactive' => 'Zneplatnit',
      'Create AuthToken' => 'Vytvořit Token'
    ],
    'massActions' => [
      'setInactive' => 'Nastavit jako neplatný'
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
      'AED' => 'Dirham (Spojené arabské emiráty)',
      'AFN' => 'Afgháský Afghani',
      'ALL' => 'Albánský Lek',
      'AMD' => 'Arménský Dram',
      'ANG' => 'Nizozemsko atilský Gulden',
      'AOA' => 'Angolská Kwanza',
      'ARS' => 'Argentinské Peso',
      'AUD' => 'Australský Dolar',
      'AWG' => 'Arubanský Florin',
      'AZN' => 'Ázerbájdžánský Manat',
      'BAM' => 'Konvertibilní Marka (Bosna a Hercegovina)',
      'BBD' => 'Barbadoský Dolar',
      'BDT' => 'Bangladéšská Taka',
      'BGN' => 'Bulharský Lev',
      'BHD' => 'Bahrajnský Dinár',
      'BIF' => 'Burundský Frank',
      'BMD' => 'Bermudský Dolar',
      'BND' => 'Brunejský Dolar',
      'BOB' => 'Bolivijský Boliviano',
      'BOV' => 'Bolivijský Mvdol',
      'BRL' => 'Brazilský Real',
      'BSD' => 'Bahamský Dolar',
      'BTN' => 'Bhútánský Ngultrum',
      'BWP' => 'Botswanská Pula',
      'BYN' => 'Běloruský Rubl',
      'BZD' => 'Belizký Dolar',
      'CAD' => 'Kanadský Dolar',
      'CDF' => 'Konžský Frank',
      'CHE' => 'WIR Euro',
      'CHF' => 'Švýcarský Frank',
      'CHW' => 'WIR Frank',
      'CLF' => 'Chilská účetní jednotka (UF)',
      'CLP' => 'Chilské Peso',
      'CNH' => 'Jüan (zahraniční)',
      'CNY' => 'Čínský Jüan',
      'COP' => 'Kolumbijské Peso',
      'COU' => 'Colombian Real Value Unit',
      'CRC' => 'Kostarický Colón',
      'CUC' => 'Kubánské Peso (konvertibilní)',
      'CUP' => 'Kubánské Peso',
      'CVE' => 'Kapverdské Escudo',
      'CZK' => 'Česká Koruna',
      'DJF' => 'Džibutský Frank',
      'DKK' => 'Dánská Koruna',
      'DOP' => 'Dominikánské Peso',
      'DZD' => 'Alžírský Dinár',
      'EGP' => 'Egyptská Libra',
      'ERN' => 'Eritrejský Nakfa',
      'ETB' => 'Etiopský Birr',
      'EUR' => 'Euro',
      'FJD' => 'Fidžijský Dolar',
      'FKP' => 'Libra Falklandských ostrovů',
      'GBP' => 'Britská Libra',
      'GEL' => 'Gruzínská Lari',
      'GHS' => 'Ghanský Cedi',
      'GIP' => 'Gibraltarská Libra',
      'GMD' => 'Gambijský Dalasi',
      'GNF' => 'Guinejský Frank',
      'GTQ' => 'Guatemalský Quetzal',
      'GYD' => 'Guyanský Dolar',
      'HKD' => 'Hong Kongský Dolar',
      'HNL' => 'Honduraská Lempira',
      'HRK' => 'Chorvatská Kuna',
      'HTG' => 'Haitská Gourde',
      'HUF' => 'Maďarský Forint',
      'IDR' => 'Indonéská Rupie',
      'ILS' => 'Nový izraelský Šekel',
      'INR' => 'Indická Eupie',
      'IQD' => 'Irácký Dinár',
      'IRR' => 'Íránský Rial',
      'ISK' => 'Islandská Króna',
      'JMD' => 'Jamajský Dolar',
      'JOD' => 'Jordánský Dinár',
      'JPY' => 'Japonský Yen',
      'KES' => 'Keňský Šilink',
      'KGS' => 'Kyrgystani Som',
      'KHR' => 'Kambodžská Riel',
      'KMF' => 'Komorský Frank',
      'KPW' => 'Severokorejský Won',
      'KRW' => 'Jihokorejský Won',
      'KWD' => 'Kuvajtský Dinár',
      'KYD' => 'Dolar Kajmanských ostrovů',
      'KZT' => 'Kazašský Tenge',
      'LAK' => 'Laoský Kip',
      'LBP' => 'Libanonská Libra',
      'LKR' => 'Srílanská Rupie',
      'LRD' => 'Libérijský Dolar',
      'LSL' => 'Lesotho Loti',
      'LYD' => 'Libyjský Dinár',
      'MAD' => 'Marocký Dirham',
      'MDL' => 'Moldavský Leu',
      'MGA' => 'Madagaskarský Ariary',
      'MKD' => 'Makedonský Denár',
      'MMK' => 'Myanmar Kyat',
      'MNT' => 'Mongolský Tugrik',
      'MOP' => 'Macanese Pataca',
      'MRO' => 'Mauritánská Ouguiya',
      'MUR' => 'Mauricijská Rupie',
      'MWK' => 'Malawijská Kwacha',
      'MXN' => 'Mexické Peso',
      'MXV' => 'Mexická investiční jednotka',
      'MYR' => 'Malajský Ringgit',
      'MZN' => 'Mozambican Metical',
      'NAD' => 'Namibijský Dolar',
      'NGN' => 'Nigerijská Naira',
      'NIO' => 'Nikaragujská Córdoba',
      'NOK' => 'Norská Koruna',
      'NPR' => 'Nepálská Rupie',
      'NZD' => 'Novozélandský Dolar',
      'OMR' => 'Ománský Rial',
      'PAB' => 'Panamská Balboa',
      'PEN' => 'Peruánský Sol',
      'PGK' => 'Papua-Nová Guinea Kina',
      'PHP' => 'Philippine Piso',
      'PKR' => 'Pákistánská Rupie',
      'PLN' => 'Polský Zlotý',
      'PYG' => 'Paraguayský Guarani',
      'QAR' => 'Katarský Rial',
      'RON' => 'Rumunský Leu',
      'RSD' => 'Srbský Dinár',
      'RUB' => 'Ruský Rubl',
      'RWF' => 'Rwandský Frank',
      'SAR' => 'Saudský Riyal',
      'SBD' => 'Dolar Šalamounových ostrovů',
      'SCR' => 'Seychelská Rupie',
      'SDG' => 'Súdánská Libra',
      'SEK' => 'Švédská Koruna',
      'SGD' => 'Singapurský Dolar',
      'SHP' => 'Libra Sv. Heleny',
      'SLL' => 'Sierra Leonean Leone',
      'SOS' => 'Somálský Šilink',
      'SRD' => 'Surinamský Dolar',
      'SSP' => 'Jihosúdánská Libra',
      'STN' => 'São Tomé & Príncipe Dobra (2018)',
      'SYP' => 'Syrská Libra',
      'SZL' => 'Swazi Lilangeni',
      'SVC' => 'Salvadoran Colón',
      'THB' => 'Thajský Baht',
      'TJS' => 'Tajikistani Somoni',
      'TND' => 'Tuniský Dinár',
      'TOP' => 'Tongan Paʻanga',
      'TRY' => 'Turecká Lira',
      'TTD' => 'Dolar Trinidad a Tobago',
      'TWD' => 'Nový tchajwanský dolar',
      'TZS' => 'Tanzanský Šilink',
      'UAH' => 'Ukrajinská Hřivna',
      'UGX' => 'Ugandský Šilink',
      'USD' => 'Americký Dolar',
      'USN' => 'Americký Dolar (následující den)',
      'UYI' => 'Uruguayské Peso (indexované jednotky)',
      'UYU' => 'Uruguayské Peso',
      'UZS' => 'Uzbekistánský Som',
      'VEF' => 'Venezuelský Bolívar',
      'VND' => 'Vietnamský Dong',
      'VUV' => 'Vanuatu Vatu',
      'WST' => 'Samoan Tala',
      'XAF' => 'Středoafrický Frank CFA',
      'XCD' => 'Východokaribský Dolar',
      'XOF' => 'Západoafrický CFA Frank',
      'XPF' => 'CFP Frank',
      'YER' => 'Jemenský Rial',
      'ZAR' => 'Jihoafrický Rand',
      'ZMW' => 'Zambijská Kwacha',
      'ZWL' => 'Zimbabwe Dolar'
    ],
    'fields' => [
      'rate' => 'Kurz'
    ],
    'labels' => [
      'Create Currency' => 'Vytvořit měnu'
    ]
  ],
  'DashboardTemplate' => [
    'fields' => [
      'layout' => 'Vzhled',
      'append' => 'Připojit'
    ],
    'links' => [],
    'labels' => [
      'Create DashboardTemplate' => 'Vytvořit šablonu',
      'Deploy to Users' => 'Přiřadit uživateli',
      'Deploy to Team' => 'Přiřadit do týmu'
    ]
  ],
  'DashletOptions' => [
    'fields' => [
      'title' => 'Titulek',
      'dateFrom' => 'Datum od',
      'dateTo' => 'Datum do',
      'autorefreshInterval' => 'Interval automatického obnovení',
      'displayRecords' => 'Zobrazit záznamů',
      'isDoubleHeight' => 'Výška 2x',
      'mode' => 'Mód',
      'enabledScopeList' => 'Co má být zobrazeno',
      'users' => 'Uživatelé',
      'entityType' => 'Typ entity',
      'primaryFilter' => 'Základní filtr',
      'boolFilterList' => 'Další filtry',
      'sortBy' => 'Pořadí podle',
      'sortDirection' => 'Typ řazení',
      'expandedLayout' => 'Vzhled',
      'skipOwn' => 'Nezobrazovat záznamy',
      'url' => 'URL',
      'dateFilter' => 'Filtr datumů',
      'text' => 'Text',
      'folder' => 'Folder',
      'team' => 'Tým',
      'futureDays' => 'Dalších X dní',
      'useLastStage' => 'Seskupit podle',
      'advancedFilters' => 'Pokročilé filtry',
      'addressField' => 'Pole s adresou',
      'mapCenter' => 'Střed mapy',
      'layout' => 'Rozložení',
      'report' => 'Zpráva',
      'column' => 'Sčítací sloupec',
      'displayOnlyCount' => 'Zobrazit pouze celkem',
      'displayTotal' => 'Zobrazit celkem',
      'useSiMultiplier' => 'SI Multiplier',
      'displayType' => 'What to display',
      'body' => 'Tělo',
      'warehouse' => 'Sklad'
    ],
    'options' => [
      'mode' => [
        'agendaWeek' => 'Týden (agenda)',
        'basicWeek' => 'Týden',
        'month' => 'Měsíc',
        'basicDay' => 'Den',
        'agendaDay' => 'Den (agenda)',
        'timeline' => 'Časová osa'
      ],
      'mapCenter' => [
        'Czech Republic' => 'Česká republika',
        'Slovakia' => 'Slovensko'
      ]
    ],
    'messages' => [
      'selectEntityType' => 'Vyberte typ entity v dashletu',
      'selectAddressField' => 'Vyberte pole s adresou'
    ],
    'tooltips' => [
      'skipOwn' => 'Nezobrazovat moje akce'
    ]
  ],
  'DynamicLogic' => [
    'labels' => [
      'Field' => 'Pole'
    ],
    'options' => [
      'operators' => [
        'equals' => 'Je rovno',
        'notEquals' => 'Nerovná se',
        'greaterThan' => 'Větší než',
        'lessThan' => 'Méně než',
        'greaterThanOrEquals' => 'Vetší nebo rovno',
        'lessThanOrEquals' => 'Méně nebo rovno',
        'in' => 'V',
        'notIn' => 'Není z',
        'inPast' => 'V minulosti',
        'inFuture' => 'V budoucnosti',
        'isToday' => 'Je dnes',
        'isTrue' => 'Je pravda',
        'isFalse' => 'Není pravda',
        'isEmpty' => 'Je prázdné',
        'isNotEmpty' => 'Není prázdné',
        'contains' => 'Obsahuje',
        'notContains' => 'Neobsahuje',
        'has' => 'Má některý',
        'notHas' => 'Nemá',
        'startsWith' => 'Starts With',
        'endsWith' => 'Ends With',
        'matches' => 'Matches (reg exp)'
      ]
    ]
  ],
  'Email' => [
    'fields' => [
      'name' => 'Jméno',
      'parent' => 'Rodič',
      'status' => 'Stav',
      'dateSent' => 'Datum odeslání',
      'from' => 'Od',
      'to' => 'Komu',
      'cc' => 'Kopie',
      'bcc' => 'Skrytá kopie',
      'replyTo' => 'Odpovědět na',
      'replyToString' => 'Reply To (String)',
      'personStringData' => 'Osobní data',
      'isHtml' => 'Je HTML',
      'body' => 'Tělo',
      'bodyPlain' => 'Tělo v textu',
      'subject' => 'Předmět',
      'attachments' => 'Přílohy',
      'selectTemplate' => 'Vybrat šablonu',
      'fromEmailAddress' => 'Adresa od',
      'emailAddress' => 'Emailová adresa',
      'deliveryDate' => 'Datum doručení',
      'account' => 'Účet',
      'users' => 'Uživatelé',
      'replied' => 'Odpovězeno',
      'replies' => 'Odpovíd',
      'isRead' => 'Je přečtený',
      'isNotRead' => 'Není přečtený',
      'isImportant' => 'Je důležitý',
      'isReplied' => 'Je zodpovězený',
      'isNotReplied' => 'Není odpovězeno',
      'isUsers' => 'Je uživatelův',
      'inTrash' => 'V koši',
      'folder' => 'Adresář',
      'inboundEmails' => 'Skupinové účty',
      'emailAccounts' => 'Emailové účty',
      'hasAttachment' => 'Má přílohy',
      'assignedUsers' => 'Přiřazení uživatelé',
      'sentBy' => 'Odesláno',
      'toEmailAddresses' => 'Adresa komu',
      'ccEmailAddresses' => 'Kopie emailová adresa',
      'bccEmailAddresses' => 'Skrytá kopie emailová adresa',
      'replyToEmailAddresses' => 'Reply-To EmailAddresses',
      'messageId' => 'ID zprávy',
      'messageIdInternal' => 'ID zprávy',
      'folderId' => 'ID adresáře',
      'fromName' => 'Jméno',
      'fromString' => 'Jméno',
      'fromAddress' => 'Adresa od',
      'replyToName' => 'Reply-To Name',
      'replyToAddress' => 'Adresa odpovědi',
      'isSystem' => 'Je systémový',
      'icsContents' => 'ICS Contents',
      'icsEventData' => 'ICS Event Data',
      'icsEventUid' => 'ICS Event UID',
      'createdEvent' => 'Created Event',
      'event' => 'Event',
      'icsEventDateStart' => 'ICS Event Date Start',
      'groupFolder' => 'Group Folder',
      'tasks' => 'Úkoly',
      'takenStatus' => 'Stav zpracování',
      'isJustSent' => 'Je poslaný',
      'task' => 'Úkol',
      'isBeingImported' => 'Je importován'
    ],
    'links' => [
      'replied' => 'Odpověď na',
      'replies' => 'Odeslaná odpověď',
      'inboundEmails' => 'Skupinové účty',
      'emailAccounts' => 'Osobní účty',
      'assignedUsers' => 'Přiřazení uživatelé',
      'sentBy' => 'Odesláno od',
      'attachments' => 'Přílohy',
      'fromEmailAddress' => 'Adresa od',
      'toEmailAddresses' => 'Na email',
      'ccEmailAddresses' => 'Příjemce',
      'bccEmailAddresses' => 'Příjemce skryté kopie',
      'replyToEmailAddresses' => 'Reply-To EmailAddresses',
      'groupFolder' => 'Group Folder',
      'tasks' => 'Úkoly',
      'task' => 'Úkol'
    ],
    'options' => [
      'status' => [
        'Draft' => 'Rozepsané',
        'Sending' => 'Odesílám',
        'Sent' => 'Odesláno',
        'Archived' => 'Archivováno',
        'Received' => 'Received',
        'Failed' => 'Selhalo'
      ],
      'takenStatus' => [
        'Accepted' => 'Přijatý',
        'BeingHandled' => 'Vyřizuje se',
        'Taken' => 'Zabraný',
        'Handled' => 'Vyřízený'
      ],
      'Draft' => 'Rozepsané',
      'Sending' => 'Odesílání',
      'Sent' => 'Odesláno',
      'Archived' => 'Archivováno',
      'Received' => 'Přijato'
    ],
    'labels' => [
      'Create Email' => 'Vytvořit email',
      'Archive Email' => 'Archivovat email',
      'Compose' => 'Napsat',
      'Reply' => 'Odpovědět',
      'Reply to All' => 'Odpovědět všem',
      'Forward' => 'Přeposlat',
      'Insert Field' => 'Insert Field',
      'Original message' => 'Původní zpráva',
      'Forwarded message' => 'Přeposlaná zpráva',
      'Email Accounts' => 'Emailové účty',
      'Inbound Emails' => 'Příchozí emaily',
      'Email Templates' => 'Emailové šablony',
      'Send Test Email' => 'Poslat zkušební email',
      'Send' => 'Odeslat',
      'Email Address' => 'Emailová adresa',
      'Mark Read' => 'Označit jako přečtěné',
      'Sending...' => 'Odesílání...',
      'Save Draft' => 'Uložit rozepsaný',
      'Mark all as read' => 'Označit vše jako přečtené',
      'Show Plain Text' => 'Zobrazit jako text',
      'Mark as Important' => 'Označit jako důležité',
      'Unmark Importance' => 'Není důležité',
      'Move to Trash' => 'Přesunout do koše',
      'Retrieve from Trash' => 'Vytáhnout z koše',
      'Move to Folder' => 'Přesunout do složky',
      'Moving to folder' => 'Moving to Folder',
      'Filters' => 'Filtry',
      'Folders' => 'Složky',
      'Group Folders' => 'Group Folders',
      'No Subject' => 'Bez předmětu',
      'View Users' => 'Zobrazit uživatele',
      'Event' => 'Event',
      'Create Lead' => 'Vytvořit akvizici',
      'Create Contact' => 'Vytvořit kontakt',
      'Add to Contact' => 'Přidat ke kontaktu',
      'Add to Lead' => 'Přidat k akvizici',
      'Create Task' => 'Vytvořit úkol',
      'Create Case' => 'Vytvořit událost',
      'View in Browser' => 'Zobrazit email v prohlížeči'
    ],
    'strings' => [
      'sendingFailed' => 'Email sending failed'
    ],
    'messages' => [
      'invalidCredentials' => 'Invalid credentials.',
      'unknownError' => 'Unknown error.',
      'recipientAddressRejected' => 'Recipient address rejected.',
      'noSmtpSetup' => 'Chybí nastavení SMTP. {link}.',
      'testEmailSent' => 'Zkušební email byl odeslán',
      'emailSent' => 'Email byl odeslán',
      'savedAsDraft' => 'Uloženo jako koncept',
      'sendConfirm' => 'Odeslat email?',
      'removeSelectedRecordsConfirmation' => 'Jste si jisti, že chcete tyto emaly smazat?',
      'removeRecordConfirmation' => 'Chcete smazat email?',
      'confirmInsertTemplate' => 'Tělo zprávy zmizí. Jste si jisti, že chcete použít template?'
    ],
    'presetFilters' => [
      'sent' => 'Odeslané',
      'archived' => 'Archivované',
      'inbox' => 'Doručené',
      'drafts' => 'Rozepsané',
      'trash' => 'V koši',
      'important' => 'Důležité'
    ],
    'massActions' => [
      'markAsRead' => 'Označit jako přečtené',
      'markAsNotRead' => 'Označit jako nepřečtené',
      'markAsImportant' => 'Označit jako důležité',
      'markAsNotImportant' => 'Označit jako nedůležité',
      'moveToTrash' => 'Přesunout do koše',
      'moveToFolder' => 'Přesunout do adresáře',
      'retrieveFromTrash' => 'Vytáhnout z koše'
    ],
    'takenStatus' => 'Taken Status'
  ],
  'EmailAccount' => [
    'fields' => [
      'name' => 'Jméno',
      'status' => 'Status',
      'host' => 'Server',
      'username' => 'Uživatelské jméno',
      'password' => 'Heslo',
      'port' => 'Port',
      'monitoredFolders' => 'Synchronizované složky',
      'security' => 'Security',
      'fetchSince' => 'Nastaveno od',
      'emailAddress' => 'Emailová adresa',
      'sentFolder' => 'Sent Folder',
      'storeSentEmails' => 'Uložit odeslané e-maily',
      'keepFetchedEmailsUnread' => 'Ponechat načtené e-maily jako nepřečtené',
      'emailFolder' => 'Vložit do složky',
      'useImap' => 'Načíst e-maily',
      'useSmtp' => 'Use SMTP',
      'smtpHost' => 'SMTP Host',
      'smtpPort' => 'SMTP Port',
      'smtpAuth' => 'SMTP Auth',
      'smtpSecurity' => 'SMTP Security',
      'smtpAuthMechanism' => 'SMTP Auth Mechanism',
      'smtpUsername' => 'SMTP uživatelské jméno',
      'smtpPassword' => 'SMTP heslo',
      'signature' => 'Podpis',
      'ssl' => 'SSL',
      'fetchData' => 'Načíst data'
    ],
    'links' => [
      'filters' => 'Filtry',
      'emails' => 'Emaily',
      'emailFolder' => 'Složka'
    ],
    'options' => [
      'status' => [
        'Active' => 'Aktivní',
        'Inactive' => 'Neaktivní'
      ],
      'smtpAuthMechanism' => [
        'plain' => 'PLAIN',
        'login' => 'LOGIN',
        'crammd5' => 'CRAM-MD5'
      ]
    ],
    'labels' => [
      'Create EmailAccount' => 'Vytvořit emailový účet',
      'IMAP' => 'IMAP',
      'Main' => 'Hlavní',
      'Test Connection' => 'Test spojení',
      'Send Test Email' => 'Odeslat testovací email',
      'SMTP' => 'SMTP'
    ],
    'messages' => [
      'couldNotConnectToImap' => 'Nemohu se připojit k IMAP serveru',
      'connectionIsOk' => 'Spojení je OK'
    ],
    'tooltips' => [
      'useSmtp' => 'Možnost odesílat e-maily.',
      'emailAddress' => 'Záznam uživatele (přiřazený uživatel) by měl mít stejnou e-mailovou adresu, aby bylo možné použít tento e-mailový účet k odesílání.',
      'monitoredFolders' => 'Můžete přidat složku \'Odeslané\' k synchronizaci externím emailovým klientem.',
      'storeSentEmails' => 'Odeslané e-maily budou uloženy na serveru IMAP. Pole E-mailová adresa by se mělo shodovat s adresou, ze které budou e-maily zasílány.',
      'signature' => 'Je možno používat zástupné symboly jako {userName}, {name}, {emailAddress} a {phoneNumber}'
    ]
  ],
  'EmailAddress' => [
    'labels' => [
      'Primary' => 'Primární',
      'Opted Out' => 'Odhlášené',
      'Invalid' => 'Neplatné',
      'Create EmailAddress' => 'Vytvořit emailovou adresu'
    ],
    'fields' => [
      'optOut' => 'Odhlášený',
      'invalid' => 'Neplatný'
    ],
    'presetFilters' => [
      'orphan' => 'Sirotek'
    ]
  ],
  'EmailFilter' => [
    'fields' => [
      'from' => 'Od',
      'to' => 'Příjemce',
      'subject' => 'Předmět',
      'bodyContains' => 'Tělo obsahuje',
      'bodyContainsAll' => 'Body Contains All',
      'action' => 'Akce',
      'isGlobal' => 'Globální',
      'emailFolder' => 'Složka',
      'groupEmailFolder' => 'Group Email Folder',
      'markAsRead' => 'Mark as Read'
    ],
    'links' => [
      'emailFolder' => 'Emailová složka',
      'groupEmailFolder' => 'Group Email Folder'
    ],
    'labels' => [
      'Create EmailFilter' => 'Vytvořit emailový filter',
      'Emails' => 'Emaily'
    ],
    'options' => [
      'action' => [
        'None' => 'None',
        'Skip' => 'Ignorovat',
        'Move to Folder' => 'Přesunout do složky',
        'Move to Group Folder' => 'Put in Group Folder'
      ]
    ],
    'tooltips' => [
      'name' => 'Popište filtr',
      'subject' => 'Můžete používat zástupný znak *',
      'bodyContains' => 'Tělo zprávy obsahuje některé ze slov',
      'bodyContainsAll' => 'An email body contains all specified words or phrases.',
      'from' => 'Email je poslán z této adresy',
      'to' => 'Komu je email poslán',
      'isGlobal' => 'Platí pro všechny'
    ]
  ],
  'EmailFolder' => [
    'fields' => [
      'skipNotifications' => 'Přeskočit oznámení'
    ],
    'labels' => [
      'Create EmailFolder' => 'Vytvořit adresář',
      'Manage Folders' => 'Spravovat adresáře',
      'Emails' => 'Emaily'
    ]
  ],
  'EmailTemplate' => [
    'fields' => [
      'name' => 'Jméno',
      'status' => 'Stav',
      'isHtml' => 'Je HTML',
      'body' => 'Tělo',
      'subject' => 'Předmět',
      'attachments' => 'Přílohy',
      'oneOff' => 'Jednorázový',
      'category' => 'Kategorie',
      'insertField' => '',
      'bodyEasyEmail' => 'Tělo'
    ],
    'links' => [
      'attachments' => 'Přílohy',
      'category' => 'Kategorie'
    ],
    'labels' => [
      'Create EmailTemplate' => 'Vytvořit šablonu',
      'Info' => 'Info',
      'Available placeholders' => 'Dostupné zástupné symboly',
      'Default' => 'Výchozí',
      'Easy Email Editor' => 'Easy Email editor'
    ],
    'messages' => [
      'infoText' => 'Dostupné zástupné symboly: \\ n {optOutUrl} & # 8211; URL odkazu pro odhlášení z odběru; {optOutLink} & # 8211; odkaz pro odhlášení.',
      'defaultTypeDescription' => 'Ideální pro jednoduché textové nebo HTML šablony emailů.',
      'easyEmailTypeDescription' => 'Ideální pro komlexní HTML šablony emailů s obrázky, odkazy, složitým rozvržením a dalšími funkcemi. Používá plnohodnotný editor emailů.'
    ],
    'tooltips' => [
      'oneOff' => 'Zkontrolujte, zda tuto šablonu použijete pouze jednou. Např. pro hromadný e-mail.'
    ],
    'presetFilters' => [
      'actual' => 'Aktuální'
    ],
    'placeholderTexts' => [
      'today' => 'Dnešní datum',
      'now' => 'Aktuální datum a čas',
      'currentYear' => 'Aktuální rok',
      'optOutUrl' => 'URL odkazu pro odhlášení',
      'optOutLink' => 'Odkaz pro odhlášení',
      'viewInBrowserUrl' => 'URL for viewing email in browser',
      'viewInBrowserLink' => 'odkaz na zobrazení emailu v prohlížeči',
      'siteUrl' => 'URL stránky'
    ],
    'easyEmailEditorLabels' => [
      'Edit' => 'Editace',
      'Full Screen' => 'Celá obrazovka',
      'Exit Full Screen' => 'Ukončit celou obrazovku',
      'Export Template' => 'Export šablony',
      'Import Template' => 'Import šablony',
      'Layer' => 'Vrstvy',
      'Theme Setting' => 'Nastavení motivu',
      'Font family' => 'Font',
      'Import font' => 'Import fontu',
      'Points to a hosted css file' => 'Odkaz na css soubor',
      'attributes' => '- atributy',
      'Email Setting' => 'Nastavení emailu',
      'Subject' => 'Předmět',
      'SubTitle' => 'Podtitul',
      'Width' => 'Šířka',
      'Breakpoint' => 'Breakpoint',
      'Allows you to control on which breakpoint the layout should go desktop/mobile.' => 'Umožňuje nastavit breakpoint, na kterém se má layout přepnout na desktop nebo mobilní.',
      'Font size' => 'Velikost písma',
      'Font weight' => 'Tloušťka písma',
      'Text color' => 'Barva textu',
      'Background' => 'Pozadí',
      'Content background' => 'Pozadí obsahu',
      'User style' => 'Uživatelské CSS',
      'No matching components' => 'Žádné odpovídající komponenty',
      'Configuration' => 'Konfigurace',
      'Source code' => 'Zdrojový kód',
      'Page' => 'Stránka',
      'Section' => 'Sekce',
      'Column' => 'Sloupec'
    ]
  ],
  'EmailTemplateCategory' => [
    'labels' => [
      'Create EmailTemplateCategory' => 'Vytvořit kategorii',
      'Manage Categories' => 'Spravovat kategorie',
      'EmailTemplates' => 'Šablony emailu'
    ],
    'fields' => [
      'order' => 'Pořadí',
      'childList' => 'Child List'
    ],
    'links' => [
      'emailTemplates' => 'Šablony emailu'
    ]
  ],
  'EntityManager' => [
    'labels' => [
      'Fields' => 'Pole',
      'Relationships' => 'Vztahy',
      'Layouts' => 'Layouts',
      'Schedule' => 'Schedule',
      'Log' => 'Log',
      'Formula' => 'Formula'
    ],
    'fields' => [
      'name' => 'Jméno',
      'type' => 'Typ',
      'labelSingular' => 'Popisek jednotného čísla',
      'labelPlural' => 'Popisek množného čísla',
      'stream' => 'Stream',
      'label' => 'Popisek',
      'linkType' => 'Typ linku',
      'entity' => 'Entity',
      'entityForeign' => 'Cizí entita',
      'linkForeign' => 'Cizí link',
      'link' => 'Odkaz',
      'labelForeign' => 'Cizí popisek',
      'sortBy' => 'Výchozí řazení (pole)',
      'sortDirection' => 'Výchozí řazení (směr)',
      'relationName' => 'Middle Table Name',
      'linkMultipleField' => 'Link Multiple Field',
      'linkMultipleFieldForeign' => 'Foreign Link Multiple Field',
      'disabled' => 'Zakázáno',
      'textFilterFields' => 'Pole textového filtru',
      'audited' => 'Auditováno',
      'auditedForeign' => 'Zahraniční audit',
      'statusField' => 'Stavové pole',
      'beforeSaveCustomScript' => 'Před uložením vlastního skriptu',
      'beforeSaveApiScript' => 'API Before Save Script',
      'color' => 'Barva',
      'kanbanViewMode' => 'Kanban zobrazení',
      'kanbanStatusIgnoreList' => 'Ignorované skupiny v zobrazení Kanban',
      'iconClass' => 'Ikona',
      'countDisabled' => 'Zakázat počet záznamů',
      'fullTextSearch' => 'Fulltextové vyhledávání',
      'parentEntityTypeList' => 'Typy nadřazených entit',
      'foreignLinkEntityTypeList' => 'Zahraniční odkazy',
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
      'loaderCustomScript' => 'Vlastní skript pro načítání',
      'isWide' => 'Široký',
      'gridViewMode' => 'Mřižkové zobrazení'
    ],
    'options' => [
      'type' => [
        '' => '',
        'Base' => 'Báze',
        'Person' => 'Osoba',
        'CategoryTree' => 'Strom kategorií',
        'Event' => 'Událost',
        'BasePlus' => 'Base Plus',
        'Company' => 'Company'
      ],
      'linkType' => [
        'manyToMany' => 'N-N',
        'oneToMany' => '1-N',
        'manyToOne' => 'N-1',
        'oneToOneRight' => 'One-to-One Right',
        'oneToOneLeft' => 'One-to-One Left',
        'parentToChildren' => 'Rodič-Potomek',
        'childrenToParent' => 'Potomek-Rodič'
      ],
      'sortDirection' => [
        'asc' => 'Vzestupně',
        'desc' => 'Sestupně'
      ]
    ],
    'messages' => [
      'nameIsAlreadyUsed' => 'Name \'{name}\' is already used.',
      'nameIsNotAllowed' => 'Name \'{name}\' is not allowed.',
      'nameIsTooLong' => 'Name is too long.',
      'confirmRemove' => 'Are you sure you want to remove the entity type from the system?',
      'entityCreated' => 'Entita byla vytvořena',
      'linkAlreadyExists' => 'Konflikt: link již existuje.',
      'linkConflict' => 'Konflikt názvu: odkaz nebo pole se stejným názvem již existuje.',
      'beforeSaveCustomScript' => 'A script called every time before an entity is saved. Use for setting calculated fields.',
      'beforeSaveApiScript' => 'A script called on create and update API requests before an entity is saved. Use for custom validation and duplicate checking.'
    ],
    'tooltips' => [
      'duplicateCheckFieldList' => 'Which fields to check when performing checking for duplicates.',
      'updateDuplicateCheck' => 'Perform checking for duplicates when updating a record.',
      'optimisticConcurrencyControl' => 'Prevents writing conflicts.',
      'statusField' => 'Aktualizace tohoto pole se zaznamenávají ve streamu.',
      'textFilterFields' => 'Pole používaná při textovém vyhledávání.',
      'stream' => 'Zda má entita Stream.',
      'disabled' => 'Zkontrolujte, zda tuto entitu ve svém systému nepotřebujete.',
      'linkAudited' => 'Vytvoření souvisejícího záznamu a propojení s existujícím záznamem bude uloženo ve streamu.',
      'linkMultipleField' => 'Pole Více odkazů poskytuje praktický způsob úpravy vztahů. Nepoužívejte jej, pokud máte velký počet souvisejících záznamů.',
      'entityType' => 'Base Plus - má panely Aktivity, Historie a Úkoly. \\ N Událost - k dispozici na panelu Kalendář a Aktivity.',
      'countDisabled' => 'Celkový počet se v zobrazení seznamu nezobrazí. Může snížit dobu načítání, když je tabulka DB velká.',
      'fullTextSearch' => 'Je nutné spustit Obnovení.',
      'activityStatusList' => 'Status values determining that an activity record should be displayed in the Activity panel and considered as actual.',
      'historyStatusList' => 'Status values determining that an activity record should be displayed in the History panel.',
      'completedStatusList' => 'Status values determining that an activity is completed.',
      'canceledStatusList' => 'Status values determining that an activity is canceled and won\'t be taken into account in free/busy ranges.',
      'isWide' => 'Pokud je zaškrtnuto, zobrazení detailu bude široké a postranní panely budou dole'
    ]
  ],
  'Export' => [
    'fields' => [
      'exportAllFields' => 'Exportovat všechna pole',
      'fieldList' => 'Seznam polí',
      'format' => 'Formát',
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
      'name' => 'Jméno',
      'version' => 'Verze',
      'description' => 'Popis',
      'isInstalled' => 'Instalováno',
      'checkVersionUrl' => 'URL pro kontrolu nových verzí',
      'fileList' => 'Seznam souborů'
    ],
    'labels' => [
      'Uninstall' => 'Odebrat',
      'Install' => 'Nainstalovat',
      'Create Extension' => 'Vytvořit Rozšíření'
    ],
    'messages' => [
      'uninstalled' => 'Rozšíření {name} bylo odebráno'
    ]
  ],
  'ExternalAccount' => [
    'labels' => [
      'Connect' => 'Připojit',
      'Disconnect' => 'Odpojit',
      'Disconnected' => 'Odpojeno',
      'Connected' => 'Připojeno',
      'Create ExternalAccount' => 'Vytvořit externí účet'
    ],
    'help' => [],
    'options' => [
      'calendarDefaultEntity' => [
        'Call' => 'Hovor',
        'Meeting' => 'Schůze'
      ],
      'calendarDirection' => [
        'EspoToGC' => 'Jednostranně: EspoCRM -> Gogle kalendář',
        'GCToEspo' => 'Jednostranně: Google kalendář -> EspoCRM',
        'Both' => 'Dvoustranně'
      ]
    ],
    'fields' => [
      'calendarStartDate' => 'Synchronizováno od',
      'calendarEntityTypes' => 'Synchronizační subjekty a identifikační štítky',
      'calendarDirection' => 'Směr',
      'calendarMonitoredCalendars' => 'Další kalendáře',
      'calendarMainCalendar' => 'Hlavní kalendář',
      'calendarDefaultEntity' => 'Výchozí subjekt',
      'contactsGroups' => 'Add Contacts to Groups',
      'removeGoogleCalendarEventIfRemovedInEspo' => 'Remove Google Calendar Event upon removal in EspoCRM',
      'dontSyncEventAttendees' => 'Don\'t sync event attendees',
      'gmailEmailAddress' => 'Email Address',
      'calendarAssignDefaultTeam' => 'Assign User\'s Default Team',
      'isLocked' => 'Je uzamčen',
      'enabled' => 'Povolen'
    ],
    'messages' => [
      'disconnectConfirmation' => 'Do you really want to disconnect?',
      'noPanels' => 'No available Google Products. Contact your Admin.'
    ],
    'tooltips' => [
      'calendarEntityTypes' => 'Pro rozpoznání názvu případ je nutné začít od identifikačního štítku. Štítek může být pro výchozí subjekt prázdný. Doporučení: Po uložení nastavení synchronizace již neměňte identifikační štítek',
      'calendarDefaultEntity' => 'Nerozpoznaný případ bude načten jako vybraný subjekt'
    ]
  ],
  'FieldManager' => [
    'labels' => [
      'Dynamic Logic' => 'Dynamická logika',
      'Name' => 'Název',
      'Label' => 'Označení',
      'Type' => 'Typ'
    ],
    'options' => [
      'dateTimeDefault' => [
        '' => 'Žádný',
        'javascript: return this.dateTime.getNow(1);' => 'Nyní',
        'javascript: return this.dateTime.getNow(5);' => 'Nyní (5m)',
        'javascript: return this.dateTime.getNow(15);' => 'Nyní (15m)',
        'javascript: return this.dateTime.getNow(30);' => 'Nyní (30m)',
        'javascript: return this.dateTime.getDateTimeShiftedFromNow(1, \'hours\', 15);' => '+1 hodina',
        'javascript: return this.dateTime.getDateTimeShiftedFromNow(2, \'hours\', 15);' => '+2 hodiny',
        'javascript: return this.dateTime.getDateTimeShiftedFromNow(3, \'hours\', 15);' => '+3 hodiny',
        'javascript: return this.dateTime.getDateTimeShiftedFromNow(4, \'hours\', 15);' => '+4 hodiny',
        'javascript: return this.dateTime.getDateTimeShiftedFromNow(5, \'hours\', 15);' => '+5 hodin',
        'javascript: return this.dateTime.getDateTimeShiftedFromNow(6, \'hours\', 15);' => '+6 hodin',
        'javascript: return this.dateTime.getDateTimeShiftedFromNow(7, \'hours\', 15);' => '+7 hodin',
        'javascript: return this.dateTime.getDateTimeShiftedFromNow(8, \'hours\', 15);' => '+8 hodin',
        'javascript: return this.dateTime.getDateTimeShiftedFromNow(9, \'hours\', 15);' => '+9 hodin',
        'javascript: return this.dateTime.getDateTimeShiftedFromNow(10, \'hours\', 15);' => '+10 hodin',
        'javascript: return this.dateTime.getDateTimeShiftedFromNow(11, \'hours\', 15);' => '+11 hodin',
        'javascript: return this.dateTime.getDateTimeShiftedFromNow(12, \'hours\', 15);' => '+12 hodin',
        'javascript: return this.dateTime.getDateTimeShiftedFromNow(1, \'days\', 15);' => '+1 den',
        'javascript: return this.dateTime.getDateTimeShiftedFromNow(2, \'days\', 15);' => '+2 dny',
        'javascript: return this.dateTime.getDateTimeShiftedFromNow(3, \'days\', 15);' => '+3 dny',
        'javascript: return this.dateTime.getDateTimeShiftedFromNow(4, \'days\', 15);' => '+4 dny',
        'javascript: return this.dateTime.getDateTimeShiftedFromNow(5, \'days\', 15);' => '+5 dnů',
        'javascript: return this.dateTime.getDateTimeShiftedFromNow(6, \'days\', 15);' => '+6 dnů',
        'javascript: return this.dateTime.getDateTimeShiftedFromNow(1, \'week\', 15);' => '+1 týden'
      ],
      'dateDefault' => [
        '' => 'None',
        'javascript: return this.dateTime.getToday();' => 'Dnes',
        'javascript: return this.dateTime.getDateShiftedFromToday(1, \'days\');' => '+1 den',
        'javascript: return this.dateTime.getDateShiftedFromToday(2, \'days\');' => '+2 dny',
        'javascript: return this.dateTime.getDateShiftedFromToday(3, \'days\');' => '+3 dny',
        'javascript: return this.dateTime.getDateShiftedFromToday(4, \'days\');' => '+4 dny',
        'javascript: return this.dateTime.getDateShiftedFromToday(5, \'days\');' => '+5 dnů',
        'javascript: return this.dateTime.getDateShiftedFromToday(6, \'days\');' => '+6 dní',
        'javascript: return this.dateTime.getDateShiftedFromToday(7, \'days\');' => '+7 dnů',
        'javascript: return this.dateTime.getDateShiftedFromToday(8, \'days\');' => '+8 dnů',
        'javascript: return this.dateTime.getDateShiftedFromToday(9, \'days\');' => '+9 dnů',
        'javascript: return this.dateTime.getDateShiftedFromToday(10, \'days\');' => '+10 dní',
        'javascript: return this.dateTime.getDateShiftedFromToday(1, \'weeks\');' => '+1týden',
        'javascript: return this.dateTime.getDateShiftedFromToday(2, \'weeks\');' => '+2 týdny',
        'javascript: return this.dateTime.getDateShiftedFromToday(3, \'weeks\');' => '+3 týdny',
        'javascript: return this.dateTime.getDateShiftedFromToday(1, \'months\');' => '+1 měsíc',
        'javascript: return this.dateTime.getDateShiftedFromToday(2, \'months\');' => '+2 měsíce',
        'javascript: return this.dateTime.getDateShiftedFromToday(3, \'months\');' => '+3 měsíce',
        'javascript: return this.dateTime.getDateShiftedFromToday(4, \'months\');' => '+4 měsíce',
        'javascript: return this.dateTime.getDateShiftedFromToday(5, \'months\');' => '+5 měsíců',
        'javascript: return this.dateTime.getDateShiftedFromToday(6, \'months\');' => '+6 měsíců',
        'javascript: return this.dateTime.getDateShiftedFromToday(7, \'months\');' => '+7 měsíců',
        'javascript: return this.dateTime.getDateShiftedFromToday(8, \'months\');' => '+8 měsíců',
        'javascript: return this.dateTime.getDateShiftedFromToday(9, \'months\');' => '+9 měsíců',
        'javascript: return this.dateTime.getDateShiftedFromToday(10, \'months\');' => '+10 měsíců',
        'javascript: return this.dateTime.getDateShiftedFromToday(11, \'months\');' => '+11 měsíců',
        'javascript: return this.dateTime.getDateShiftedFromToday(1, \'year\');' => '+1 rok'
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
      'audited' => 'Aktualizace budou zobrazeny ve streamu.',
      'required' => 'Pole bude povinné. Nelze nechat prázdné.',
      'default' => 'Hodnota bude nastavena ve výchozím nastavení při vytváření.',
      'min' => 'Minimální přijatelná hodnota.',
      'max' => 'Maximální přijatelná hodnota.',
      'seeMoreDisabled' => 'Pokud není zaškrtnuto, budou dlouhé texty zkráceny.',
      'lengthOfCut' => 'Jak dlouhý může být text, než bude oříznut.',
      'maxLength' => 'Maximální přijatelná délka textu.',
      'before' => 'Datum by mělo být před datem zadaného pole.',
      'after' => 'Datum by mělo být po datu zadaného pole.',
      'readOnly' => 'Hodnotu pole nelze určit uživatelem. Lze jej však vypočítat podle vzorce.',
      'readOnlyAfterCreate' => 'The field value can be specified when creating a new record. After that, the field becomes read-only. It can still be calculated by formula.',
      'fileAccept' => 'Které typy souborů přijímat. Je možné přidat vlastní položky.',
      'barcodeLastChar' => 'Pro typ EAN-13.',
      'maxFileSize' => 'Pokud je prázdné nebo 0, pak žádný limit.',
      'conversionDisabled' => 'The currency conversion action won\'t be applied to this field.',
      'pattern' => 'A regular expression to check a field value against. Define an expression or select a predefined one.',
      'options' => 'A list of possible values and their labels.',
      'optionsArray' => 'A list of possible values and their labels. If empty, the field will allow entering custom values.',
      'maxCount' => 'Maximum number of items allowed to be selected.',
      'displayAsList' => 'Each item in a new line.',
      'optionsVarchar' => 'A list of autocomplete values.',
      'linkReadOnly' => 'Field value can\'t be specified by user. But can be calculated by formula.

It will also disable the ability to create a related record from relationship panels.',
      'notStorable' => 'Zda pole nelze uložit do databáze. Pole, které nelze uložit, lze definovat ve vlastním skriptu načítání. Tuto vlastnost je možné nastavit pouze při vytváření pole.',
      'recordListEnabled' => 'Zobrazení seznamu příbuzných záznamů, podobně jako v panelu vztahů. Tato možnost bude pomalá při velkém počtu příbuzných záznamů.',
      'recordListKeepRemoved' => 'Záznamy odstraněné ze seznamu budou ve výchozím nastavení pro vztah 1-N odstraněny. Pokud je tato možnost povolena, budou odstraněné záznamy pouze odpojeny.',
      'recordListOrderByField' => 'Pole, do kterého se bude ukládat pozice v seznamu příbuzných záznamů. Nechte prázdné, pokud nechcete povolit uživatelské řazení.',
      'defaultSelectFilters' => 'Výchozí filtry pro seznam příbuzných záznamů.',
      'saveCoordinates' => 'Zaškrtněte toto pole, aby se souřadnice ukládaly do databáze a pole šlo vybrat v dashletu \'Mapa\'',
      'format' => 'Použijte následující zástupné znaky:

**{number}** - Automaticky inkrementované číslo
**{YYYY}** - Aktuální rok (4 číslice)
**{YY}** - Aktuální rok (2 číslice)
**{MM}** - Aktuální měsíc (2 číslice)
**{DD}** - Aktuální den (2 číslice)',
      'validateExistence' => 'Ověřit existenci DIČ pomocí služby VIES',
      'copyAttachmentsButton' => 'Zobrazí tlačítko pro kopírování příloh v detailním zobrazení'
    ],
    'fieldParts' => [
      'address' => [
        'street' => 'Ulice',
        'city' => 'Město',
        'state' => 'Stát',
        'country' => 'Země',
        'postalCode' => 'PSČ',
        'map' => 'Mapa'
      ],
      'personName' => [
        'salutation' => 'Oslovení',
        'first' => 'Jméno',
        'middle' => 'Prostřední',
        'last' => 'Příjmení'
      ],
      'currency' => [
        'converted' => '(Převedeno)',
        'currency' => '(Měna)'
      ],
      'datetimeOptional' => [
        'date' => 'Datum'
      ]
    ],
    'fieldInfo' => [
      'varchar' => 'Jednořádkový text.',
      'enum' => 'Selectbox, lze vybrat pouze jednu hodnotu.',
      'text' => 'Víceřádkový text s podporou markdown.',
      'date' => 'Datum bez času.',
      'datetime' => 'Datum a čas',
      'currency' => 'Hodnota měny. Plovoucí číslo s kódem měny.',
      'int' => 'Celé číslo.',
      'float' => 'Číslo s desetinnou částí.',
      'bool' => 'Zaškrtávací políčko. Dvě možné hodnoty: true a false.',
      'multiEnum' => 'Seznam hodnot, lze vybrat více hodnot. Seznam je seřazen.',
      'checklist' => 'Seznam zaškrtávacích políček.',
      'array' => 'Seznam hodnot, podobný poli Multi-Enum.',
      'address' => 'Adresa s ulicí, městem, státem, PSČ a zemí.',
      'url' => 'Pro ukládání odkazů',
      'urlMultiple' => 'Multiple links.',
      'wysiwyg' => 'Text s podporou HTML.',
      'file' => 'Pro nahrávání souborů.',
      'image' => 'Pro nahrávání obrázků.',
      'attachmentMultiple' => 'Umožňuje nahrát více souborů.',
      'number' => 'Automatické zvyšování počtu typů řetězců s možnou předponou a konkrétní délkou.',
      'autoincrement' => 'Generované celé číslo jen pro čtení s automatickým zvyšováním.',
      'barcode' => 'Čárový kód. Lze tisknout do PDF.',
      'email' => 'Sada e-mailových adres s jejich parametry: Odhlášeno, Neplatné, Primární.',
      'phone' => 'Sada telefonních čísel s jejich parametry: Typ, Odhlášeno, Neplatné, Primární.',
      'foreign' => 'Pole souvisejícího záznamu. Pouze ke čtení.',
      'link' => 'Záznam vztahu Belongs-To (více na jednoho nebo jeden na jednoho).',
      'linkParent' => 'Záznam vztahu mezi rodiči. Může být různých typů entit.',
      'linkMultiple' => 'Sada záznamů vztahu Has-Many (many-to-many or one-to-many). Ne všechny vztahy mají svá pole s více odkazy. Pouze ty, kde je povolen parametr Link-Multiple.'
    ],
    'messages' => [
      'fieldNameIsNotAllowed' => 'Field name \'{field}\' is not allowed.',
      'fieldAlreadyExists' => 'Field \'{field}\' already exists in \'{entityType}\'.',
      'linkWithSameNameAlreadyExists' => 'Link with the name \'{field}\' already exists in \'{entityType}\'.',
      'layoutMissingOrInvalid' => 'Entitě \'{entityType}\' chybí layout \'{layout}\' nebo layout neobsahuje platný JSON.',
      'orderAttributeMissing' => 'Entitě \'{entityType}\' chybí atribut \'{attribute}\' pro řazení.',
      'orderAttributeWrongType' => 'Atribut řazení \'{attribute}\' entity \'{entityType}\' musí být typu \'int\'.'
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
      'Note' => 'Poznámka',
      'Email' => 'Email',
      'User' => 'Uživatel',
      'Team' => 'Tým',
      'Role' => 'Role',
      'EmailTemplate' => 'Emailová šablona',
      'EmailTemplateCategory' => 'Kategorie emailových šablon',
      'EmailAccount' => 'Emailový účet',
      'EmailAccountScope' => 'Rozsah emailového účtu',
      'OutboundEmail' => 'Odchozí email',
      'ScheduledJob' => 'Naplánovaná činnost',
      'ExternalAccount' => 'Externí účet',
      'Extension' => 'Rozšíření',
      'Dashboard' => 'Nástěnka',
      'InboundEmail' => 'Účet příchozích emailů',
      'Stream' => 'Stream',
      'Import' => 'Import',
      'ImportError' => 'Import Error',
      'Template' => 'Šablona',
      'Job' => 'Job',
      'EmailFilter' => 'Emailový filter',
      'Portal' => 'Portál',
      'PortalRole' => 'Portálová role',
      'Attachment' => 'Příloha',
      'EmailFolder' => 'Adresář emailů',
      'GroupEmailFolder' => 'Group Email Folder',
      'PortalUser' => 'Portálový uživatel',
      'ApiUser' => 'API uživatel',
      'ScheduledJobLogRecord' => 'Scheduled Job Log Record',
      'PasswordChangeRequest' => 'Změna hesla',
      'ActionHistoryRecord' => 'Záznam historie',
      'AuthToken' => 'Auth Token',
      'UniqueId' => 'Unique ID',
      'LastViewed' => 'Naposledy zobrazeno',
      'Settings' => 'Nastavení',
      'FieldManager' => 'Správa polí',
      'Integration' => 'Integrace',
      'LayoutManager' => 'Správa vzhledu',
      'EntityManager' => 'Správa entit',
      'Export' => 'Export',
      'DynamicLogic' => 'Dynamická logika',
      'DashletOptions' => 'Volby dashletu',
      'Admin' => 'Admin',
      'Global' => 'Globální',
      'Preferences' => 'Předvolba',
      'EmailAddress' => 'Emailová adresa',
      'PhoneNumber' => 'Telefonní číslo',
      'AuthLogRecord' => 'Záznam přihlášení',
      'AuthFailLogRecord' => 'Seznam selhaných přihlášení',
      'LeadCapture' => 'Potenciál',
      'LeadCaptureLogRecord' => 'Potenciál log',
      'ArrayValue' => 'Hodnota pole',
      'DashboardTemplate' => 'Šablona hlavního panelu',
      'Currency' => 'Měna',
      'LayoutSet' => 'Nastavení vzhledu',
      'Webhook' => 'Webhook',
      'Mass Action' => 'Mass Action',
      'WorkingTimeCalendar' => 'Working Time Calendar',
      'WorkingTimeRange' => 'Working Time Range',
      'AuthenticationProvider' => 'Authentication Provider',
      'Account' => 'Organizace',
      'Contact' => 'Kontakt',
      'Lead' => 'Lead',
      'Target' => 'Cíl',
      'Opportunity' => 'Příležitost',
      'Meeting' => 'Schůzka',
      'Calendar' => 'Kalendář',
      'Call' => 'Volání',
      'Task' => 'Úkol',
      'Case' => 'Případ',
      'Document' => 'Dokument',
      'DocumentFolder' => 'Složka dokumentů',
      'Campaign' => 'Kampaň',
      'TargetList' => 'Cílový seznam',
      'MassEmail' => 'Hromadný email',
      'EmailQueueItem' => 'Položka fronty emailů',
      'CampaignTrackingUrl' => 'Tracking URL',
      'Activities' => 'Aktivita',
      'KnowledgeBaseArticle' => 'Článek znalostní báze',
      'KnowledgeBaseCategory' => 'Kategorie znalostní báze',
      'CampaignLogRecord' => 'Log kampaně',
      'Project' => 'Vývojové projekty',
      'ProjectTask' => 'Úkol k projektu',
      'PushSubscriber' => 'Odběratel notifikací',
      'Workflow' => 'Workflow',
      'Report' => 'Report',
      'ReportCategory' => 'Kategorie reportů',
      'WorkflowLogRecord' => 'Log Workflow',
      'WorkflowCategory' => 'Workflow Category',
      'BpmnFlowchart' => 'Vývojový diagram obchodního procesu',
      'BpmnProcess' => 'Proces',
      'BpmnUserTask' => 'Zpracovat úlohu uživatele',
      'ReportFilter' => 'Filtr reportů',
      'ReportPanel' => 'Panel reportů',
      'RecordRecurrence' => 'Opakování záznamu',
      'Product' => 'Katalog komponent',
      'ProductCategory' => 'Kategorie produktu',
      'TaxClass' => 'Daňová třída',
      'Supplier' => 'Supplier',
      'Quote' => 'Nabídka',
      'QuoteItem' => 'Položka nabídky',
      'Invoice' => 'Vydaná faktura',
      'InvoiceItem' => 'Položka vydané faktury',
      'SalesOrder' => 'Zakázka',
      'SalesOrderItem' => 'Položka zakázky',
      'PurchaseOrder' => 'Nákupní objednávka',
      'PurchaseOrderItem' => 'Položka nákupní objednávky',
      'SupplierInvoice' => 'Přijatá faktura',
      'SupplierInvoiceItem' => 'Položka přijaté faktury',
      'VatIdValidation' => 'Validace DIČ',
      'HandoverProtocol' => 'Předávací protokol',
      'DeliveryNote' => 'Dodací list',
      'EducationAndTrainingRecord' => 'Evidence vzdělání a školení',
      'MedicalExamination' => 'Zdravotní prohlídka',
      'OtherEvents' => 'Ostatní událost',
      'Password' => 'Záznam přihlašovacích údajů',
      'VacationRequest' => 'Žádost o dovolenou',
      'HumanResource' => 'HR',
      'Vacation' => 'Dovolená',
      'Attendance' => 'Docházka',
      'Chat' => 'Chat',
      'Warehouse' => 'Sklad',
      'WarehouseItem' => 'Skladová položka',
      'WarehousePosition' => 'Skladová pozice',
      'GoodsReceipt' => 'Příjemka',
      'GoodsIssue' => 'Výdejka',
      'WarehouseValueRecord' => 'Skladová hodnota',
      'ProformaInvoice' => 'Vydaná zálohová faktura',
      'ProformaInvoiceItem' => 'Položka vydané zálohové faktury',
      'CreditNote' => 'Opravný daňový doklad',
      'IssuedTaxDocument' => 'Vydaný daňový doklad k platbě',
      'ReceivedProformaInvoice' => 'Přijatá zálohová faktura',
      'ReceivedTaxDocument' => 'Přijatý daňový doklad k platbě',
      'RevenueReceipt' => 'Příjmový doklad',
      'ExpenseReceipt' => 'Výdejní doklad',
      'GoogleCalendar' => 'Google Calendar',
      'GoogleContacts' => 'Google Contacts',
      'ProductionOrder' => 'Výrobní příkaz',
      'Operation' => 'Operace',
      'ProductionModel' => 'Technologický postup',
      'ProductionModelOperation' => 'Operace technologického postupu',
      'ProductionModelItem' => 'Položka technologického postupu',
      'LogTime' => 'Instalace',
      'EspoCRMnvody' => 'EspoCRM návod',
      'BusinessProject' => 'Zakázka',
      'Porady' => 'Porada',
      'InternalAgenda' => 'Interní dokument',
      'Smernice' => 'Směrnice',
      'RequestForm' => 'Žádanka na nákup',
      'SmerniceItem' => 'Položka směrnice',
      'RequestItem' => 'Order request item',
      'Complaint' => 'Reklamace',
      'QualityReport' => '8D Report',
      'HumanResources' => 'HR Manager',
      'Absence' => 'Dovolená',
      'ClockIn' => 'Docházka',
      'CompetetionBase' => 'Seznam Konkurence',
      'ProjectorDatabase' => 'Projector Database',
      'ProductDatabase' => 'Databáze produktů',
      'SupplierReclamation' => 'Reklamace u dodavatele',
      'SalesOrderSummaryItem' => 'Položka shrnutí zakázky',
      'Seeker' => 'Seeker',
      'JIRA' => 'CRM Task',
      'ComplaintBook' => 'Complains Book',
      'Selector' => 'Selector',
      'Wiso' => 'Wiso',
      'ItTask' => 'IT Marketing Task',
      'Tax' => 'Daň',
      'Manufacturing' => 'Manufacturing',
      'Prospect' => 'Prospect',
      'AnalyticsPerson' => 'Analytika',
      'AdvanceDeductionItem' => 'Položka odpočtu zálohy',
      'PriceList' => 'Ceník',
      'Reclamation' => 'Reklamace',
      'WarehouseTransfer' => 'Skladový přesun',
      'SupplierOrder' => 'Objednávka u dodavatele',
      'SupplierOrderItem' => 'Položka objednávky u dodavatele',
      'Payment' => 'Platba',
      'ProductBrand' => 'Označení produktu',
      'ShippingProvider' => 'Přepravce',
      'OpportunityItem' => 'Položka poptávky',
      'Cooperation' => 'Kooperace',
      'WorkCenter' => 'Pracoviště',
      'WorkPerformed' => 'Odvedená práce',
      'Order' => 'Objednávka',
      'BpmnFlowNode' => 'Záznam obchodního procesu',
      'Contractor' => 'Dodavatel',
      'ContractorItem' => 'Položka dodavatele',
      'LayoutRecord' => 'Záznam vzhledu',
      'Milestone' => 'Milník',
      'Notification' => 'Oznámení',
      'OrderItem' => 'Položka objednávky',
      'Reminder' => 'Připomínky',
      'UserData' => 'Uživatelská data',
      'ReceivedInvoiceItem' => 'Položka přijaté faktury',
      'ReceivedInvoices' => 'Přijaté faktury',
      'UseCaseItem' => 'Use Case položky',
      'ReceivedProformaInvoiceItem' => 'Položka přijaté zálohové faktury'
    ],
    'scopeNamesPlural' => [
      'Note' => 'Poznámky',
      'Email' => 'Emaily',
      'User' => 'Uživatelé',
      'Team' => 'Týmy',
      'Role' => 'Role',
      'EmailTemplate' => 'Emailové šablony',
      'EmailTemplateCategory' => 'Kategorie e-mailových šablon',
      'EmailAccount' => 'Emailové účty',
      'EmailAccountScope' => 'Emailové účty',
      'OutboundEmail' => 'Odchozí emaily',
      'ScheduledJob' => 'Naplánované činnosti',
      'ExternalAccount' => 'Externí účty',
      'Extension' => 'Rozšíření',
      'Dashboard' => 'Nástěnky',
      'InboundEmail' => 'Účty příchozích emailů',
      'EmailAddress' => 'Email Addresses',
      'PhoneNumber' => 'Tel. čísla',
      'Stream' => 'Stream',
      'Import' => 'Výsledky importu',
      'ImportError' => 'Import Errors',
      'Template' => 'Šablony',
      'Job' => 'Jobs',
      'EmailFilter' => 'Filtry emailu',
      'Portal' => 'Portály',
      'PortalRole' => 'Role portálu',
      'Attachment' => 'Přilohy',
      'EmailFolder' => 'Adresáře emailu',
      'GroupEmailFolder' => 'Group Email Folders',
      'PortalUser' => 'Uživatelé portálu',
      'ApiUser' => 'API uživatelé',
      'ScheduledJobLogRecord' => 'Scheduled Job Log Records',
      'PasswordChangeRequest' => 'Požadavek na změnu hesla',
      'ActionHistoryRecord' => 'Historie akcí',
      'AuthToken' => 'Auth Tokens',
      'UniqueId' => 'Unique IDs',
      'LastViewed' => 'Naposledy zobrazeno',
      'AuthLogRecord' => 'Auth Log',
      'AuthFailLogRecord' => 'Auth Fail Log',
      'LeadCapture' => 'Lead Capture',
      'LeadCaptureLogRecord' => 'Lead Capture Log',
      'ArrayValue' => 'Hodnoty pole',
      'DashboardTemplate' => 'Šablony hlavního panelu',
      'Currency' => 'Měna',
      'LayoutSet' => 'Sady rozložení',
      'Webhook' => 'Webhooks',
      'WorkingTimeCalendar' => 'Working Time Calendars',
      'WorkingTimeRange' => 'Working Time Ranges',
      'AuthenticationProvider' => 'Authentication Providers',
      'Account' => 'Organizace',
      'Contact' => 'Kontakty',
      'Lead' => 'Leady',
      'Target' => 'Cíle',
      'Opportunity' => 'Příležitosti',
      'Meeting' => 'Schůzky',
      'Calendar' => 'Kalendáře',
      'Call' => 'Volání',
      'Task' => 'Úkoly',
      'Case' => 'Případy',
      'Document' => 'Dokumenty',
      'DocumentFolder' => 'Složky dokumentů',
      'Campaign' => 'Kampaně',
      'TargetList' => 'Cílové seznamy',
      'MassEmail' => 'Hromadné emaily',
      'EmailQueueItem' => 'Položky e-mailové fronty',
      'CampaignTrackingUrl' => 'Tracking URLs',
      'Activities' => 'Aktivity',
      'KnowledgeBaseArticle' => 'Znalostní báze',
      'KnowledgeBaseCategory' => 'Kategorie znalostní báze',
      'CampaignLogRecord' => 'Campaign Log Records',
      'Project' => 'Vývojové projekty',
      'ProjectTask' => 'Úlohy projektu',
      'PushSubscriber' => 'Odběratelé notifikací',
      'Workflow' => 'Workflows',
      'Report' => 'Reporty',
      'ReportCategory' => 'Kategorie reportů',
      'WorkflowLogRecord' => 'Workflows Log',
      'WorkflowCategory' => 'Workflow Categories',
      'BpmnFlowchart' => 'Procesní vývojový diagram',
      'BpmnProcess' => 'Procesy',
      'BpmnUserTask' => 'Zpracovat uživatelské úkoly',
      'ReportFilter' => 'Filtry reportů',
      'ReportPanel' => 'Panely reportů',
      'RecordRecurrence' => 'Opakované záznamy',
      'Product' => 'Katalog komponent',
      'ProductCategory' => 'Kategorie produktu',
      'TaxClass' => 'Daňové třídy',
      'Supplier' => 'Suppliers',
      'Quote' => 'Nabídky',
      'QuoteItem' => 'Položky nabídky',
      'Invoice' => 'Vydané faktury',
      'InvoiceItem' => 'Položky faktury',
      'SalesOrder' => 'Zakázky',
      'SalesOrderItem' => 'Položky zakázek',
      'PurchaseOrder' => 'Nákupní objednávky',
      'PurchaseOrderItem' => 'Položky nákupní objednávky',
      'SupplierInvoice' => 'Přijaté faktury',
      'SupplierInvoiceItem' => 'Položky přijaté faktury',
      'VatIdValidation' => 'Validace DIČ',
      'HandoverProtocol' => 'Předávací protokoly',
      'DeliveryNote' => 'Dodací listy',
      'EducationAndTrainingRecord' => 'Evidence vzdělání a školení',
      'MedicalExamination' => 'Zdravotní prohlídky',
      'OtherEvents' => 'Ostatní události',
      'Password' => 'Záznamy přihlašovacích údajů',
      'VacationRequest' => 'Žádosti o dovolené',
      'HumanResource' => 'HR',
      'Vacation' => 'Dovolené',
      'Attendance' => 'Docházka',
      'Chat' => 'Chat',
      'Warehouse' => 'Sklady',
      'WarehouseItem' => 'Skladové položky',
      'WarehousePosition' => 'Skladové pozice',
      'GoodsReceipt' => 'Příjemky',
      'GoodsIssue' => 'Výdejky',
      'WarehouseValueRecord' => 'Skladové hodnoty',
      'ProformaInvoice' => 'Vydané zálohové faktury',
      'ProformaInvoiceItem' => 'Položky vydaných zalohových faktur',
      'CreditNote' => 'Opravné daňové doklady',
      'IssuedTaxDocument' => 'Vydané daňové doklady k platbám',
      'ReceivedProformaInvoice' => 'Přijaté zálohové faktury',
      'ReceivedTaxDocument' => 'Přijaté daňové doklady k platbám',
      'RevenueReceipt' => 'Příjmové doklady',
      'ExpenseReceipt' => 'Výdejní doklady',
      'GoogleCalendar' => 'Google Calendar',
      'GoogleContacts' => 'Google Contacts',
      'ProductionOrder' => 'Výrobní příkazy',
      'Operation' => 'Operace',
      'ProductionModel' => 'Technologické postupy',
      'ProductionModelOperation' => 'Operace technologického postupu',
      'ProductionModelItem' => 'Položky technologického postupu',
      'LogTime' => 'Instalace',
      'EspoCRMnvody' => 'EspoCRM návody',
      'BusinessProject' => 'Zakázky',
      'Porady' => 'Porady',
      'InternalAgenda' => 'Interní dokumenty',
      'Smernice' => 'Směrnice',
      'RequestForm' => 'Žádanky na nákup',
      'SmerniceItem' => 'Položky směrnice',
      'RequestItem' => 'Request Form Item',
      'Complaint' => 'Reklamace',
      'QualityReport' => '8D Reporty',
      'HumanResources' => 'HR Managers',
      'Absence' => 'Dovolená',
      'ClockIn' => 'Docházka',
      'CompetetionBase' => 'Seznam Konkurence',
      'ProjectorDatabase' => 'Databáze projektorů',
      'ProductDatabase' => 'Databáze produktů',
      'SupplierReclamation' => 'Reklamace u dodavatele',
      'SalesOrderSummaryItem' => 'Položky shrnutí zakázky',
      'Seeker' => 'Projector selector',
      'JIRA' => 'CRM bugs',
      'ComplaintBook' => 'Complains Book',
      'Selector' => 'Projector Selector',
      'Wiso' => 'wiso',
      'ItTask' => 'IT Marketing task',
      'Tax' => 'Daně',
      'Manufacturing' => 'Manufacturing',
      'Prospect' => 'Prospects',
      'AnalyticsPerson' => 'Analytiky',
      'AdvanceDeductionItem' => 'Položky odpočtů záloh',
      'PriceList' => 'Ceníky',
      'Reclamation' => 'Reklamace',
      'WarehouseTransfer' => 'Skladové přesuny',
      'SupplierOrder' => 'Objednávky u dodavatelů',
      'SupplierOrderItem' => 'Položky objednávky u dodavatele',
      'Payment' => 'Platby',
      'ShippingProvider' => 'Dodavatelé',
      'OpportunityItem' => 'Položky poptávky',
      'ProductBrand' => 'Označení produktu',
      'Cooperation' => 'Kooperace',
      'WorkCenter' => 'Pracoviště',
      'WorkPerformed' => 'Odvedené práce',
      'Order' => 'Objednávky',
      'Contractor' => 'Dodavatelé',
      'ContractorItem' => 'Položky dodavatele',
      'LayoutRecord' => 'Záznamy rozložení',
      'Milestone' => 'Milníky',
      'Notification' => 'Oznámení',
      'OrderItem' => 'Položky objednávky',
      'Preferences' => 'Předvolby',
      'ReceivedInvoiceItem' => 'Položky přijaté faktury',
      'ReceivedInvoices' => 'Přijaté faktury',
      'Reminder' => 'Připomínky',
      'UserData' => 'Uživatelská data',
      'Integration' => 'Integrace'
    ],
    'labels' => [
      'Sort' => 'Sort',
      'Misc' => 'Různé',
      'Merge' => 'Sloučit',
      'None' => '-',
      'Home' => 'Domů',
      'by' => 'dle',
      'Proceed' => 'Pokračovat',
      'Saved' => 'Uloženo',
      'Error' => 'Chyba',
      'Select' => 'Vybrat',
      'Not valid' => 'Neplatné',
      'Please wait...' => 'Prosím počkejte...',
      'Please wait' => 'Prosím počkejte',
      'Attached' => 'Přiloženo',
      'Loading...' => 'Nahrávání...',
      'Uploading...' => 'Uploaduje se...',
      'Sending...' => 'Posílá se...',
      'Merged' => 'Sloučeno',
      'Removed' => 'Odstraněno',
      'Posted' => 'Zasláno',
      'Linked' => 'Nalinkováno',
      'Unlinked' => 'Odpojeno',
      'Done' => 'Hotovo',
      'Access denied' => 'Přístup odepřen',
      'Not found' => 'Nenalezeno',
      'Access' => 'Přístup',
      'Are you sure?' => 'Jste si jisti?',
      'Record has been removed' => 'Záznam byl odstraněn',
      'Wrong username/password' => 'Neplatné přihlašovací jméno/heslo',
      'Post cannot be empty' => 'Příspěvek nemůže být prázdný',
      'Username can not be empty!' => 'Přihlašovací jméno nemůže být prázdné!',
      'Cache is not enabled' => 'Cache není povolena',
      'Cache has been cleared' => 'Cache byla vyčištěna',
      'Rebuild has been done' => 'Přestavba byla dokončena',
      'Return to Application' => 'Zpět do aplikace',
      'Modified' => 'Modifikováno',
      'Created' => 'Vytvořeno',
      'Create' => 'Vytvořit',
      'create' => 'vytvořit',
      'Overview' => 'Přehled',
      'Details' => 'Detaily',
      'Add Field' => 'Přidat pole',
      'Add Dashlet' => 'Přidat panel',
      'Filter' => 'Filtr',
      'Edit Dashboard' => 'Upravit nástěnku',
      'Add' => 'Přidat',
      'Add Item' => 'Přidat položku',
      'Reset' => 'Resetovat',
      'Menu' => 'Menu',
      'More' => 'Více',
      'Search' => 'Hledat',
      'Only My' => 'Pouze moje',
      'Open' => 'Otevřený',
      'Admin' => 'Admin',
      'About' => 'O AutoCRM',
      'Refresh' => 'Obnovit',
      'Remove' => 'Odebrat',
      'Restore' => 'Obnovit',
      'Options' => 'Možnosti',
      'Username' => 'Uživatelské jméno',
      'Password' => 'Heslo',
      'Login' => 'Přihlásit',
      'Log Out' => 'Odhlásit',
      'Log in' => 'Log in',
      'Log in as' => 'Log in as',
      'Sign in' => 'Sign in',
      'Preferences' => 'Předvolby',
      'State' => 'Kraj',
      'Street' => 'Ulice',
      'Country' => 'Země',
      'City' => 'Město',
      'PostalCode' => 'PSČ',
      'Followed' => 'Sledováno',
      'Follow' => 'Sledovat',
      'Followers' => 'Sledující',
      'Clear Local Cache' => 'Vyčistit lokální cache',
      'Actions' => 'Akce',
      'Delete' => 'Smazat',
      'Update' => 'Aktualizovat',
      'Save' => 'Uložit',
      'Edit' => 'Upravit',
      'View' => 'Zobrazit',
      'Cancel' => 'Zrušit',
      'Apply' => 'Použít',
      'Unlink' => 'Odpojit',
      'Mass Update' => 'Hromadný update',
      'Export' => 'Export',
      'No Data' => 'Žádná data',
      'No Access' => 'Nepřístupno',
      'All' => 'Vše',
      'Active' => 'Aktivní',
      'Inactive' => 'Neaktivní',
      'Write your comment here' => 'Napište Váš komentář',
      'Post' => 'Poslat',
      'Stream' => 'Stream',
      'Show more' => 'Ukázat více',
      'Dashlet Options' => 'Možnosti panelu',
      'Full Form' => 'Plný formulář',
      'Insert' => 'Vložit',
      'Person' => 'Osoba',
      'First Name' => 'Křestní jméno',
      'Last Name' => 'Příjmení',
      'Middle Name' => 'Prostřední jméno',
      'Original' => 'Originál',
      'You' => 'Vy',
      'you' => 'vy',
      'change' => 'změna',
      'Change' => 'Změna',
      'Primary' => 'Primární',
      'Save Filter' => 'Uložit filtr',
      'Administration' => 'Administrace',
      'Run Import' => 'Spustit import',
      'Duplicate' => 'Duplikovat',
      'Notifications' => 'Upozornění',
      'Mark all read' => 'Označit jako přečtené',
      'See more' => 'Zobrazit více',
      'Today' => 'Dnes',
      'Tomorrow' => 'Zítra',
      'Yesterday' => 'Včera',
      'Submit' => 'Vložit',
      'Close' => 'Zavřít',
      'Yes' => 'Ano',
      'No' => 'Ne',
      'Select All Results' => 'Vybrat celý výsledek',
      'Value' => 'Hodnota',
      'Current version' => 'Současná verze',
      'List View' => 'Seznam',
      'Tree View' => 'Zobrazit hierarchii',
      'Unlink All' => 'Odpojit vše',
      'Total' => 'Celkem',
      'Print' => 'Print',
      'Print to PDF' => 'Tisk do PDF',
      'Default' => 'Výchozí',
      'Number' => 'Číslo',
      'From' => 'Od',
      'To' => 'To',
      'Create Post' => 'Vytvořit post',
      'Previous Entry' => 'Předchozí položka',
      'Next Entry' => 'Další záznam',
      'View List' => 'Zobrazit seznam',
      'Attach File' => 'Přiložit soubor',
      'Skip' => 'Přeskočit',
      'Attribute' => 'Atribut',
      'Function' => 'Funkce',
      'Self-Assign' => 'Přiřadit na sebe',
      'Self-Assigned' => 'Přiřazeno na sebe',
      'Expand' => 'Rozbalit',
      'Collapse' => 'Sbalit',
      'New notifications' => 'Nové notifikace',
      'Manage Categories' => 'Spravovat kategorie',
      'Manage Folders' => 'Spravovat složky',
      'Convert to' => 'Převést na',
      'View Personal Data' => 'Zobrazit osobní data',
      'Personal Data' => 'Osobní údaje',
      'Erase' => 'Smazat',
      'View Followers' => 'Zobrazit sledující',
      'Convert Currency' => 'Převod měny',
      'View on Map' => 'Zobrazit na mapě',
      'Preview' => 'Náhled',
      'Move Over' => 'Přesunout',
      'Up' => 'Up',
      'Save & Continue Editing' => 'Save & Continue Editing',
      'Save & New' => 'Save & New',
      'Field' => 'Field',
      'Resolution' => 'Resolution',
      'Resolve Conflict' => 'Resolve Conflict',
      'Download' => 'Download',
      'Global Search' => 'Global Search',
      'Show Navigation Panel' => 'Zobrazit navigační panel',
      'Hide Navigation Panel' => 'Skrýt navigační panel',
      'Copy to Clipboard' => 'Copy to Clipboard',
      'Copied to clipboard' => 'Copied to clipboard',
      'Schedule' => 'Schedule',
      'Log' => 'Log',
      'Scheduler' => 'Plánovač',
      'Create InboundEmail' => 'Vytvořit příchozí email',
      'Activities' => 'Aktivity',
      'History' => 'Historie',
      'Attendees' => 'Účastníci',
      'Schedule Meeting' => 'Plánovaná schůzka',
      'Schedule Call' => 'Plánované volání',
      'Compose Email' => 'Napsat email',
      'Log Meeting' => 'Zapsat schůzku',
      'Log Call' => 'Zapsat volání',
      'Archive Email' => 'Archivovat email',
      'Create Task' => 'Vytvořit úkol',
      'Tasks' => 'Úkoly',
      'Add Aggregation Function' => 'Přidat agregační funkci',
      'Edit Entity' => 'Upravit entitu',
      'Edit Filters' => 'Upravit filtry',
      'Edit Labels' => 'Upravit labely',
      'Edit Layout' => 'Upravit layout',
      'Edit Navbar' => 'Upravit lištu',
      'Google Calendar' => 'Přidat do Google kalendáře',
      'Increase' => 'Přičíst',
      'Multiply' => 'Vynásobit',
      'Outlook Calendar' => 'Přidat do Outlook kalendáře',
      'Refresh Entity' => 'Obnovit entitu',
      'Return to My Account' => 'Zpět do mého účtu',
      'Send Email' => 'Send Email',
      'Undo Last Stroke' => 'Vrátit poslední krok',
      'View as User' => 'Zobrazit jako uživatel',
      'Start Process' => 'Start procesu',
      'Schedule Recurrence' => 'Naplánovat opakování',
      'Scheduled Recurrences' => 'Naplánované opakování',
      'Fill from Contact' => 'Vyplnit z kontaktu',
      'Fill from Account' => 'Vyplnit z organizace',
      'Force Mattermost Sync' => 'Vynutit synchronizaci s Mattermost',
      'noVatPayer' => 'I am not a VAT payer',
      'vatPayer' => 'I am a VAT payer',
      'Merging...' => 'Slučuje se...',
      'Removing...' => 'Odstraňování...',
      'Unlinking...' => 'Odpojování',
      'Posting...' => 'Zasílání...',
      'Saving...' => 'Ukládání...',
      'Browser cache cleared' => 'Cache prohlížeče byla úspěšně vymazána',
      'Copy Attachments' => 'Kopírovat přílohy',
      'Remove Filter' => 'Odstranit filtr',
      'Email PDF' => 'Odeslat PDF',
      'Print to XML' => 'Vyexportovat do XML'
    ],
    'messages' => [
      'pleaseWait' => 'Prosím počkejte...',
      'loading' => 'Nahrávání...',
      'saving' => 'Ukládám ...',
      'confirmLeaveOutMessage' => 'Opravdu chcete opustit formulář?',
      'notModified' => 'Záznam nebyl upraven',
      'duplicate' => 'Vytvářený záznam je duplicitní',
      'dropToAttach' => 'Přetáhněte pro příložení',
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
      'fieldIsRequired' => '{field} je povinné',
      'fieldPhoneInvalid' => '{field} is invalid',
      'fieldPhoneInvalidCode' => 'Invalid country code',
      'fieldPhoneTooShort' => '{field} is too short',
      'fieldPhoneTooLong' => '{field} is too long',
      'fieldPhoneInvalidCharacters' => 'Only digits, latin letters and characters `-+_@:#().` are allowed',
      'fieldShouldBeEmail' => '{field} má být platný email',
      'fieldShouldBeFloat' => '{field} má být platný float',
      'fieldShouldBeInt' => '{field} má být platný integer',
      'fieldShouldBeNumber' => '{field} should be a valid number',
      'fieldShouldBeDate' => '{field} má být platné datum',
      'fieldShouldBeDatetime' => '{field} má být platné date/time',
      'fieldShouldAfter' => '{field} má být po {otherField}',
      'fieldShouldBefore' => '{field} má být před {otherField}',
      'fieldShouldBeBetween' => '{field} má být mezi {min} a {max}',
      'fieldShouldBeLess' => '{field} má být menší než {value}',
      'fieldShouldBeGreater' => '{field} má být většá než {value}',
      'fieldBadPasswordConfirm' => '{field} není správně potvrzeno',
      'fieldMaxFileSizeError' => 'Soubor by neměl překročit {max} Mb',
      'fieldValueDuplicate' => 'Duplicitní hodnota',
      'fieldIsUploading' => 'Nahrávám',
      'fieldExceedsMaxCount' => 'Překročen maximální počet {maxCount}',
      'barcodeInvalid' => '{field} is not valid {type}',
      'arrayItemMaxLength' => 'Item shouldn\'t be longer than {max} characters',
      'resetPreferencesDone' => 'Předvolby byly resetovány na výchozí.',
      'confirmation' => 'Opravdu to chcete?',
      'unlinkAllConfirmation' => 'Opravdu chcete odlinkovat všechny související záznamy?',
      'resetPreferencesConfirmation' => 'Opravdu chcete resetovat předvolby na výchozí?',
      'removeRecordConfirmation' => 'Opravdu chcete smazat záznam?',
      'unlinkRecordConfirmation' => 'Opravdu chcete odlinkovat všechny související záznamy?',
      'removeSelectedRecordsConfirmation' => 'Opravdu chcete odebrat vybrané záznamy?',
      'unlinkSelectedRecordsConfirmation' => 'Opravdu chcete odlinkovat vybrané záznamy?',
      'massUpdateResult' => '{count} záznamů bylo upraveno',
      'massUpdateResultSingle' => '{count} záznam byl upraven',
      'recalculateFormulaConfirmation' => 'Jste si jisti, že chcete přepočítat záznamy?',
      'noRecordsUpdated' => 'Žádné záznamy nebyly upraveny',
      'massRemoveResult' => '{count} záznamů bylo odstraněno',
      'massRemoveResultSingle' => '{count} záznam byl odstraněn',
      'noRecordsRemoved' => 'Žádné záznamy nebyly odstraněny',
      'clickToRefresh' => 'Kliknout pro obnovení',
      'writeYourCommentHere' => 'Napište komentář',
      'writeMessageToUser' => 'Napište zprávu uživateli {user}',
      'writeMessageToSelf' => 'Napište poznámku do svého seznamu poznámek',
      'typeAndPressEnter' => 'Pište a pro odeslání stiskněte enter',
      'checkForNewNotifications' => 'Zkontrolovat nové notifikace',
      'checkForNewNotes' => 'Zkontrolovat nové poznámky',
      'internalPost' => 'Příspěvek uvidí pouze interní uživatelé',
      'internalPostTitle' => 'Příspěvek vidí pouze interní uživatelé',
      'done' => 'Hotovo',
      'notUpdated' => 'Soubor nebyl nahrán',
      'confirmMassFollow' => 'Opravdu chcete sledovat vybrané záznamy?',
      'confirmMassUnfollow' => 'Opravdu chcete zrušit sledování vybraných záznamů?',
      'massFollowResult' => '{count} záznamů je nyní sledováno',
      'massUnfollowResult' => '{count} záznamy nyní nejsou sledovány',
      'massFollowResultSingle' => '{count} záznam je nyní sledován',
      'massUnfollowResultSingle' => '{count} záznam nyní není sledován',
      'massFollowZeroResult' => 'dné sledované záznamy',
      'massUnfollowZeroResult' => 'dné záznamy',
      'erasePersonalDataConfirmation' => 'Zaškrtnutá pole budou trvale vymazána. Jste si jisti?',
      'maintenanceModeError' => 'The application currently is in maintenance mode.',
      'maintenanceMode' => 'Aplikace je momentálně v maintanance módu',
      'resolveSaveConflict' => 'The record has been modified. You need to resolve the conflict before you can save the record.',
      'massPrintPdfMaxCountError' => 'Není možné vytisknout více než {maxCount} záznamů.',
      'massActionProcessed' => 'Mass action has been processed.',
      'validationFailure' => 'Serverová validace selhala.

Pole: `{field}`

Validace: {type}',
      'extensionLicenseInvalid' => 'Invalid \'{name}\' extension license.',
      'extensionLicenseExpired' => 'The \'{name}\' extension license subscription has expired.',
      'extensionLicenseSoftExpired' => 'The \'{name}\' extension license subscription has expired.',
      'confirmAppRefresh' => 'Aplikace byla aktualizována. Doporučujeme obnovit stránku, abyste zajistili její správné fungování.',
      'loggedOutLeaveOut' => 'Logged out. The session is inactive. You may lose unsaved form data after page refresh. You may need to make a copy.',
      'noAccessToRecord' => 'Operation requires `{action}` access to record.',
      'noAccessToForeignRecord' => 'Operation requires `{action}` access to foreign record.',
      'noLinkAccess' => 'Can\'t relate with {foreignEntityType} record through the link \'{link}\'. No access.',
      'cannotUnrelateRequiredLink' => 'Can\'t unrelate required link.',
      'cannotRelateNonExisting' => 'Can\'t relate with non-existing {foreignEntityType} record.',
      'cannotRelateForbidden' => 'Can\'t relate with forbidden {foreignEntityType} record. `{action}` access required.',
      'cannotRelateForbiddenLink' => 'No access to link \'{link}\'.',
      'error404' => 'Vámi požadovaná url nelze zpracovat.',
      'error403' => 'Do této sekce nemáte přístup.',
      'emptyMassUpdate' => 'No fields available for Mass Update.',
      'attemptIntervalFailure' => 'The operation is not allowed during a specific time interval. Wait for some time before the next attempt.',
      'foreignMultipleSearchWarning' => 'Nemůžete filtrovat podle tohoto pole',
      'noEmailsInSelect' => 'Ve výběru se nenachází žádné emailové adresy.',
      'contactInfoTitle' => 'Informace o kontaktu',
      'valid' => 'platné',
      'invalid' => 'neplatné',
      'verifiedVatId' => 'Ověřené <b>{vatId}</b> k datu {vatDate} je {vatType}',
      'shortValidVatIdMessage' => 'Platné DIČ',
      'shortInvalidVatIdMessage' => 'DIČ není platné, nebo patří subjektu mimo EU',
      'mattermostDisabled' => 'Chat Mattermost je pro tohoto uživatele zakázán. Ujistěte se, že má uživatel povolenou synchronizaci Mattermost a že je integrace Mattermost nakonfigurována v systémové administraci.',
      'mattermostRequiresEmail' => 'Synchronizace s Mattermost vyžaduje nastavenou e-mailovou adresu. Prosím, vyplňte e-mailovou adresu a zkuste to znovu.',
      'mattermostRequiresFirstName' => 'Synchronizace s Mattermost vyžaduje nastavené křestní jméno. Prosím, vyplňte křestní jméno a zkuste to znovu.',
      'mattermostRequiresPassword' => 'Synchronizace s Mattermost vyžaduje vyplněné heslo při zakládání nového uživatele. Prosím, vyplňte heslo a zkuste to znovu.',
      'enterAmount' => 'Zadejte částku',
      'theAmountMustBeNumeric' => 'Částka musí být číselná (0,00)',
      'theAmountMustNotExceedOneTrillion' => 'Částka nesmí být větší než tisíc miliard',
      'streamPostInfo' => 'Napište <strong>@username</strong> pro zmínění uživatelů v příspěvku.

Dostupná syntaxe:
`<code>code</code>`
**<strong>tučný text</strong>**
*<em>kurzíva</em>*
~<del>smazaný text</del>~
> citace
[text](url)',
      'copyAttachmentsConfirmation' => 'Opravdu chcete zkopírovat přílohy?',
      'posting' => 'Postuji ...',
      'reverseChargeText' => 'Faktura je v režimu přenesené daňové povinnosti. Daň odvede zákazník.',
      'issuedTaxDocumentItemText' => 'Daňový doklad k přijaté platbě zálohové faktury s VS:'
    ],
    'boolFilters' => [
      'onlyMy' => 'Pouze moje',
      'onlyMyTeam' => 'Můj tým',
      'followed' => 'Sledované'
    ],
    'presetFilters' => [
      'followed' => 'Sledované',
      'all' => 'Vše'
    ],
    'massActions' => [
      'delete' => 'Delete',
      'remove' => 'Odstranit',
      'merge' => 'Sloučit',
      'update' => 'Update',
      'massUpdate' => 'Hromadně upravit',
      'unlink' => 'Odlinkovat',
      'export' => 'Exportovat',
      'follow' => 'Sledovat',
      'unfollow' => 'Přestat sledovat',
      'convertCurrency' => 'Převést měnu',
      'recalculateFormula' => 'Přepočítat vzorec',
      'printPdf' => 'Vytisknout do PDF',
      'bulkEmail' => 'Hromadný email',
      'bulkEmailBcc' => 'Hromadný email (BCC)',
      'zipAttachments' => 'Stáhnout přílohy jako zip'
    ],
    'fields' => [
      'name' => 'Název',
      'firstName' => 'Křestní jméno',
      'lastName' => 'Příjmení',
      'middleName' => 'Prostřední jméno',
      'salutationName' => 'Oslovení',
      'assignedUser' => 'Přiřazený uživatel',
      'assignedUsers' => 'Přiřazení uživatelé',
      'emailAddress' => 'Email',
      'emailAddressData' => 'Údaje o e-mailové adrese',
      'emailAddressIsOptedOut' => 'E-mailová adresa je odhlášena',
      'emailAddressIsInvalid' => 'Email Address is Invalid',
      'assignedUserName' => 'Přiřazená uživatelská jména',
      'teams' => 'Týmy',
      'createdAt' => 'Vytvořeno',
      'modifiedAt' => 'Upraveno',
      'createdBy' => 'Vytvořil',
      'modifiedBy' => 'Upravil',
      'description' => 'Popis',
      'address' => 'Adresa',
      'phoneNumber' => 'Telefon',
      'phoneNumberMobile' => 'Telefon (Mobil)',
      'phoneNumberHome' => 'Telefon (Domácí)',
      'phoneNumberFax' => 'Telefon (Fax)',
      'phoneNumberOffice' => 'Telefon (Kancelář)',
      'phoneNumberOther' => 'Telefon (Další)',
      'phoneNumberData' => 'Telefonní data',
      'phoneNumberIsOptedOut' => 'Telefonní číslo je odhlášené',
      'phoneNumberIsInvalid' => 'Phone Number is Invalid',
      'order' => 'Pořadí',
      'parent' => 'Rodič',
      'children' => 'Potomek',
      'id' => 'ID',
      'ids' => 'IDs',
      'type' => 'Typ',
      'names' => 'Názvy',
      'types' => 'Typy',
      'targetListIsOptedOut' => 'Je vyřazen z listu',
      'billingAddressCity' => 'Město',
      'billingAddressCountry' => 'Země',
      'billingAddressPostalCode' => 'PSČ',
      'billingAddressState' => 'Kraj',
      'billingAddressStreet' => 'Ulice',
      'billingAddressMap' => 'Mapa',
      'addressCity' => 'Město',
      'addressStreet' => 'Ulice',
      'addressCountry' => 'Země',
      'addressState' => 'Kraj',
      'addressPostalCode' => 'PSČ',
      'addressMap' => 'Mapa',
      'shippingAddressCity' => 'Město (doručovací)',
      'shippingAddressStreet' => 'Ulice (doručovací)',
      'shippingAddressCountry' => 'Země (doručovací)',
      'shippingAddressState' => 'Kraj (doručovací)',
      'shippingAddressPostalCode' => 'PSČ (doručovací)',
      'shippingAddressMap' => 'Mapa (doručovací)',
      'label' => 'Popisek',
      'Name' => 'Název'
    ],
    'links' => [
      'assignedUser' => 'Přiřazený uživatel',
      'createdBy' => 'Vytvořil',
      'modifiedBy' => 'Upravil',
      'team' => 'Tým',
      'roles' => 'Role',
      'teams' => 'Týmy',
      'users' => 'Uživatelé',
      'parent' => 'Rodič',
      'children' => 'Potomek',
      'contacts' => 'Kontakty',
      'opportunities' => 'Poptávky',
      'leads' => 'Leady',
      'meetings' => 'Schůzky',
      'calls' => 'Volání',
      'tasks' => 'Úkoly',
      'emails' => 'Emaily',
      'accounts' => 'Firmy',
      'cases' => 'Případy',
      'documents' => 'Dokumenty',
      'account' => 'Firma',
      'opportunity' => 'Poptávka',
      'contact' => 'Kontakt'
    ],
    'dashlets' => [
      'Stream' => 'Stream',
      'Emails' => 'Můj Inbox',
      'Iframe' => 'Iframe',
      'Records' => 'Záznamy',
      'Memo' => 'Memo',
      'Leads' => 'Moje leady',
      'Opportunities' => 'Moje poptávky',
      'Tasks' => 'Moje úkoly',
      'Cases' => 'Moje případy',
      'Calendar' => 'Kalendář',
      'Calls' => 'Moje volání',
      'Meetings' => 'Moje schůzky',
      'OpportunitiesByStage' => 'Poptávky podle stavu',
      'OpportunitiesByLeadSource' => 'Poptávky podle zdroje',
      'SalesByMonth' => 'Prodeje za měsíc',
      'SalesPipeline' => 'Prodejní pipeline',
      'Activities' => 'Moje aktivity',
      'Kanban' => 'Kanban',
      'Map' => 'Mapa',
      'RecordList' => 'Seznam záznamů',
      'Report' => 'Reporty',
      'BpmnUserTasks' => 'Zpracovat úkoly uživatele',
      'RunningOutOfProducts' => 'Docházející produkty'
    ],
    'notificationMessages' => [
      'assign' => '{entityType} {entity} Ti byla přiřazena.',
      'emailReceived' => 'Email přijat od {from}',
      'entityRemoved' => '{user} odstranil {entityType} {entity}',
      'eventAttendee' => '{user} added you to {entityType} {entity}'
    ],
    'streamMessages' => [
      'post' => '{user} poslal {entityType} {entity}',
      'attach' => '{user} připojený {entityType} {entity}',
      'status' => '{user} upravil {field} k {entityType} {entity}',
      'update' => '{user} upravil {entityType} {entity}',
      'postTargetTeam' => '{user} přidal (a) příspěvek do týmu {target}',
      'postTargetTeams' => '{user} přidal příspěvek týmům {target}',
      'postTargetPortal' => '{user} přidal na portál {target}',
      'postTargetPortals' => '{user} přidal na portály {target}',
      'postTarget' => '{user} přidal příspěvek na {target}',
      'postTargetYou' => '{user} vám poslal příspěvek',
      'postTargetYouAndOthers' => '{user} přidal příspěvek na {target} a vám',
      'postTargetAll' => '{user} přidal příspěvek všem',
      'postTargetSelf' => '{user} sám přidal příspěvek',
      'postTargetSelfAndOthers' => '{user} přidal příspěvek na {target} a sebe',
      'mentionInPost' => '{user} zmínil {mentioned} v {entityType} {entity}',
      'mentionYouInPost' => '{user} se o vás zmínil v {entityType} {entity}',
      'mentionInPostTarget' => '{uživatel} zmínil {zmínil} v příspěvku',
      'mentionYouInPostTarget' => '{user} se o vás zmínil v příspěvku pro {target}',
      'mentionYouInPostTargetAll' => '{user} se o vás zmínil v příspěvku všem',
      'mentionYouInPostTargetNoTarget' => '{user} se o vás zmínil v příspěvku',
      'create' => '{user} vytvořil {entityType} {entity}',
      'createThis' => '{user} vytvořil {entityType}',
      'createAssignedThis' => '{user} vytvořil {entityType} přiřazené {assignee}',
      'createAssigned' => '{user} vytvořil {entityType} {entity} přiřazené {assignee}',
      'createAssignedYou' => 'Uživatel {user} vytvořil {entityType} {entity}, který vám byl přidělen',
      'createAssignedThisSelf' => '{user} vytvořil tento {entityType}, který si sám přidělil',
      'createAssignedSelf' => '{user} vytvořil {entityType} {entity} s vlastním přiřazením',
      'assign' => '{user} přiřadil {entityType} {entity} {assignee}',
      'assignThis' => '{user} přiřadil {entityType} {assignee}',
      'assignYou' => 'Uživatel {user} vám přidělil {entityType} {entity}',
      'assignThisVoid' => '{user} zrušil přiřazení {entityType}',
      'assignVoid' => '{user} nepřiřazeno {entityType} {entity}',
      'assignThisSelf' => '{user} si sám přidělil tento {entityType}',
      'assignSelf' => '{user} self-assigned {entityType} {entity}',
      'postThis' => '{user} poslal',
      'attachThis' => '{user} připojil',
      'statusThis' => '{user} upravil {field}',
      'updateThis' => '{user} upravil {entityType}',
      'createRelatedThis' => '{user} vytvořil {relatedEntityType} {relatedEntity} související s {entityType}',
      'createRelated' => '{user} vytvořil {relatedEntityType} {relatedEntity} související s {entityType} {entity}',
      'relate' => '{user} propojen {relatedEntityType} {relatedEntity} s {entityType} {entity}',
      'relateThis' => '{user} propojil {relatedEntityType} {relatedEntity} s tímto {entityType}',
      'unrelate' => '{user} unlinked {relatedEntityType} {relatedEntity} from {entityType} {entity}',
      'unrelateThis' => '{user} unlinked {relatedEntityType} {relatedEntity} from this {entityType}',
      'emailReceivedFromThis' => 'Email přijat od {from}',
      'emailReceivedInitialFromThis' => 'Tento email byl přijat od {from}, vytvořen {entityType}',
      'emailReceivedThis' => 'Email přijat',
      'emailReceivedInitialThis' => 'Email přijat, vytvořen {entityType}',
      'emailReceivedFrom' => 'Email přijat od {from}, související s {entityType} {entity}',
      'emailReceivedFromInitial' => 'Email přijat od {from}, vytvořeno {entityType} {entity}',
      'emailReceived' => 'Email přijat, související s {entityType} {entity}',
      'emailReceivedInitial' => 'Email přijat: {entityType} {entity} vytvořeno',
      'emailReceivedInitialFrom' => 'Email přijat od {from}, vytvořeno {entityType} {entity}',
      'emailSent' => '{by} poslal email související s {entityType} {entity}',
      'emailSentThis' => '{by} poslal email',
      'eventConfirmationAccepted' => '{invitee} accepted participation in {entityType} {entity}',
      'eventConfirmationDeclined' => '{invitee} declined participation in {entityType} {entity}',
      'eventConfirmationTentative' => '{invitee} is tentative about participation in {entityType} {entity}',
      'eventConfirmationAcceptedThis' => '{invitee} accepted participation',
      'eventConfirmationDeclinedThis' => '{invitee} declined participation',
      'eventConfirmationTentativeThis' => '{invitee} is tentative about participation'
    ],
    'streamMessagesMale' => [
      'postTargetSelfAndOthers' => '{user} napsal {target} a sobě'
    ],
    'streamMessagesFemale' => [
      'postTargetSelfAndOthers' => '{user} napsala {target} a sobě'
    ],
    'lists' => [
      'monthNames' => [
        0 => 'Leden',
        1 => 'Únor',
        2 => 'Březen',
        3 => 'Duben',
        4 => 'Květen',
        5 => 'Červen',
        6 => 'červenec',
        7 => 'Srpen',
        8 => 'Září',
        9 => 'Říjen',
        10 => 'Listopad',
        11 => 'Prosinec'
      ],
      'monthNamesShort' => [
        0 => 'Led',
        1 => 'Úno',
        2 => 'Bře',
        3 => 'Dub',
        4 => 'Kvě',
        5 => 'Črv',
        6 => 'Črc',
        7 => 'Srp',
        8 => 'Zář',
        9 => 'Říj',
        10 => 'Lis',
        11 => 'Pro'
      ],
      'dayNames' => [
        0 => 'Neděle',
        1 => 'Pondělí',
        2 => 'Úterý',
        3 => 'Středa',
        4 => 'Čtvrtek',
        5 => 'Pátek',
        6 => 'Sobota'
      ],
      'dayNamesShort' => [
        0 => 'Ned',
        1 => 'Pon',
        2 => 'Úte',
        3 => 'Stř',
        4 => 'Čtv',
        5 => 'Pát',
        6 => 'Sob'
      ],
      'dayNamesMin' => [
        0 => 'Ne',
        1 => 'Po',
        2 => 'Út',
        3 => 'St',
        4 => 'Čt',
        5 => 'Pá',
        6 => 'So'
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
        'Mr.' => 'Pan',
        'Mrs.' => 'Paní',
        'Ms.' => 'Slečna',
        'Dr.' => 'Doktor(ka)'
      ],
      'language' => [
        'ar_AR' => 'Arabic',
        'af_ZA' => 'Afrikánština',
        'az_AZ' => 'Ázerbájdžánština',
        'be_BY' => 'Běloruština',
        'bg_BG' => 'Bulharština',
        'bn_IN' => 'Bengálština',
        'bs_BA' => 'Bosenština',
        'ca_ES' => 'Kalatánština',
        'cs_CZ' => 'Čeština',
        'cy_GB' => 'Welština',
        'da_DK' => 'Dánština',
        'de_DE' => 'Němčina',
        'el_GR' => 'Řečtina',
        'en_GB' => 'Angličtina (UK)',
        'es_MX' => 'Španělština (Mexico)',
        'en_US' => 'Angličtina (US)',
        'es_ES' => 'Španělština (Spain)',
        'et_EE' => 'Estónština',
        'eu_ES' => 'Baskičtina',
        'fa_IR' => 'Perština',
        'fi_FI' => 'Finština',
        'fo_FO' => 'Faerština',
        'fr_CA' => 'Francouzština (Kanada)',
        'fr_FR' => 'Francouzština (Francie)',
        'ga_IE' => 'Irština',
        'gl_ES' => 'Galicijština',
        'gn_PY' => 'Guarani',
        'he_IL' => 'Hebrejština',
        'hi_IN' => 'Hindština',
        'hr_HR' => 'Chorvatština',
        'hu_HU' => 'Maďarština',
        'hy_AM' => 'Arménština',
        'id_ID' => 'Indonéština',
        'is_IS' => 'Islandština',
        'it_IT' => 'Italština',
        'ja_JP' => 'Japonština',
        'ka_GE' => 'Gruzínština',
        'km_KH' => 'Khmerština',
        'ko_KR' => 'Korejština',
        'ku_TR' => 'Kurdština',
        'lt_LT' => 'Litevština',
        'lv_LV' => 'Lotyšština',
        'mk_MK' => 'Makedónština',
        'ml_IN' => 'Malayalam',
        'ms_MY' => 'Malajština',
        'nb_NO' => 'Norský Bokmål',
        'nn_NO' => 'Norský Nynorsk',
        'ne_NP' => 'Nepálština',
        'nl_NL' => 'Holandština',
        'pa_IN' => 'Pandžábština',
        'pl_PL' => 'Polština',
        'ps_AF' => 'Pashto',
        'pt_BR' => 'Portugalština (Brazílie)',
        'pt_PT' => 'Portugalština (Portugalsko)',
        'ro_RO' => 'Rumunština',
        'ru_RU' => 'Ruština',
        'sk_SK' => 'Slovenština',
        'sl_SI' => 'Slovinština',
        'sq_AL' => 'Albánština',
        'sr_RS' => 'Srbština',
        'sv_SE' => 'Švédština',
        'sw_KE' => 'Swahilština',
        'ta_IN' => 'Tamil',
        'te_IN' => 'Telugština',
        'th_TH' => 'Thaiština',
        'tl_PH' => 'Tagalog',
        'tr_TR' => 'Turečtina',
        'uk_UA' => 'Ukrajinština',
        'ur_PK' => 'Urdu',
        'vi_VN' => 'Vietnamština',
        'zh_CN' => 'Zjednodušená čínština (Čína)',
        'zh_HK' => 'Tradiční čínština (Hong Kong)',
        'zh_TW' => 'Tradiční čínština (Taiwan)'
      ],
      'dateSearchRanges' => [
        'on' => 'Dne',
        'notOn' => 'Jiného dne než',
        'after' => 'Po',
        'before' => 'Před',
        'between' => 'Mezi',
        'today' => 'Dnes',
        'past' => 'Minulé',
        'future' => 'Budoucí',
        'currentMonth' => 'Tento měsíc',
        'lastMonth' => 'Minulý měsíc',
        'nextMonth' => 'Následující měsíc',
        'currentQuarter' => 'Toto čtvrtletí',
        'lastQuarter' => 'Minulý kvartál',
        'currentYear' => 'Tento rok',
        'lastYear' => 'Minulý rok',
        'lastSevenDays' => 'Posledních 7 dní',
        'lastXDays' => 'Posledních X dní',
        'nextXDays' => 'Následujících X dní',
        'ever' => 'Každý',
        'isEmpty' => 'Je prázdné',
        'olderThanXDays' => 'Starší než X dní',
        'afterXDays' => 'After X Days',
        'currentFiscalYear' => 'Tento fiskální rok',
        'lastFiscalYear' => 'Poslední fiskální rok',
        'currentFiscalQuarter' => 'Toto fiskální čtvrtletí',
        'lastFiscalQuarter' => 'Poslední fiskální čtvrtletí'
      ],
      'searchRanges' => [
        'is' => 'Je',
        'isEmpty' => 'Je prázdné',
        'isNotEmpty' => 'Není prázdné',
        'isOneOf' => 'Jeden z',
        'isFromTeams' => 'Je z týmů',
        'isNot' => 'Není',
        'isNotOneOf' => 'Není jeden z',
        'anyOf' => 'Kterýkoli z vybraných',
        'allOf' => 'Všechny z',
        'noneOf' => 'Žádný z',
        'any' => 'Kterýkoli'
      ],
      'varcharSearchRanges' => [
        'equals' => 'Rovná se',
        'like' => 'Je jako (%)',
        'notLike' => 'Není jako (%)',
        'startsWith' => 'Začíná',
        'endsWith' => 'Končí na',
        'contains' => 'Obsahuje',
        'notContains' => 'Neobsahuje',
        'isEmpty' => 'Je prázdný',
        'isNotEmpty' => 'Není prázdný',
        'notEquals' => 'Nerovná se'
      ],
      'intSearchRanges' => [
        'equals' => 'Rovná se',
        'notEquals' => 'Nerovná se',
        'greaterThan' => 'Větší než',
        'lessThan' => 'Menší než',
        'greaterThanOrEquals' => 'Větší než nebo se rovná',
        'lessThanOrEquals' => 'Menší než nebo se rovná',
        'between' => 'Mezi',
        'isEmpty' => 'Je prázdné',
        'isNotEmpty' => 'Není prázdné'
      ],
      'autorefreshInterval' => [
        0 => 'Není',
        '0.5' => '30 sekund',
        1 => '1 minuta',
        2 => '2 minuty',
        5 => '5 minuty',
        10 => '10 minut'
      ],
      'phoneNumber' => [
        'Mobile' => 'Mobilní',
        'Office' => 'Kancelář',
        'Fax' => 'Fax',
        'Home' => 'Domácí',
        'Other' => 'Další'
      ],
      'saveConflictResolution' => [
        'current' => 'Current',
        'actual' => 'Actual',
        'original' => 'Original'
      ],
      'reminderTypes' => [
        'Popup' => 'Vyskakovací',
        'Email' => 'Email'
      ],
      'align' => [
        'left' => 'Vlevo',
        'right' => 'Vpravo'
      ],
      'labelsFormat' => [
        'float' => 'Číslo (desetinné)',
        'int' => 'Číslo (celé)'
      ]
    ],
    'sets' => [
      'summernote' => [
        'NOTICE' => 'You can find translation here: https://github.com/HackerWins/summernote/tree/master/lang',
        'font' => [
          'bold' => 'Tučné',
          'italic' => 'Kurzíva',
          'underline' => 'Podtržené',
          'strike' => 'Přeškrtnuté',
          'clear' => 'Odebrat styl písma',
          'height' => 'Velikost řádku',
          'name' => 'Rodina písma',
          'size' => 'Velikost písma'
        ],
        'image' => [
          'image' => 'Obrázek',
          'insert' => 'Vložit obrázek',
          'resizeFull' => 'Změna velikost 1/1',
          'resizeHalf' => 'Změna velikosti 1/2',
          'resizeQuarter' => 'Změna velikosti 1/4',
          'floatLeft' => 'Plavat vlevo',
          'floatRight' => 'Plavat vpravo',
          'floatNone' => 'Neplavat',
          'dragImageHere' => 'Přesunout obrázek sem.',
          'selectFromFiles' => 'Vybrat ze souboru',
          'url' => 'URL obrázku',
          'remove' => 'Odebrat obrázek'
        ],
        'link' => [
          'link' => 'Link',
          'insert' => 'Vložit link',
          'unlink' => 'Odebrat link',
          'edit' => 'Upravit',
          'textToDisplay' => 'Text k zobrazení',
          'url' => 'Na jaké URL má link směřovat?',
          'openInNewWindow' => 'Otevřít v novém okně'
        ],
        'video' => [
          'video' => 'Video',
          'videoLink' => 'Video link',
          'insert' => 'Vložit video',
          'url' => 'Video URL?',
          'providers' => '(YouTube, Vimeo, Vine, Instagram, nebo DailyMotion)'
        ],
        'table' => [
          'table' => 'Tabulka'
        ],
        'hr' => [
          'insert' => 'Vložit horizontální čáru'
        ],
        'style' => [
          'style' => 'Styl',
          'normal' => 'Normální',
          'blockquote' => 'Citace',
          'pre' => 'Kód',
          'h1' => 'Nadpis 1',
          'h2' => 'Nadpis 2',
          'h3' => 'Nadpis 3',
          'h4' => 'Nadpis 4',
          'h5' => 'Nadpis 5',
          'h6' => 'Nadpis 6'
        ],
        'lists' => [
          'unordered' => 'Neřazený seznam',
          'ordered' => 'Řazený seznam'
        ],
        'options' => [
          'help' => 'Nápověda',
          'fullscreen' => 'Celá obrazovka',
          'codeview' => 'Zobrazit kód'
        ],
        'paragraph' => [
          'paragraph' => 'Odstavec',
          'outdent' => 'Předsadit',
          'indent' => 'Odsadit',
          'left' => 'Zarovnat vlevo',
          'center' => 'Zarovnat na střed',
          'right' => 'Zarovnat vpravo',
          'justify' => 'Zarovnat do bloku'
        ],
        'color' => [
          'recent' => 'Nedávná baarva',
          'more' => 'Víc barev',
          'background' => 'Barva pozadí',
          'foreground' => 'Barva písma',
          'transparent' => 'Průhlednost',
          'setTransparent' => 'Nastavení průhlednosti',
          'reset' => 'Resetovat',
          'resetToDefault' => 'Resetovat na výchozí'
        ],
        'shortcut' => [
          'shortcuts' => 'Klávesové zkratky',
          'close' => 'Zavřít',
          'textFormatting' => 'Formát textu',
          'action' => 'Akce',
          'paragraphFormatting' => 'Formát odstavce',
          'documentStyle' => 'Styl dokumentu'
        ],
        'history' => [
          'undo' => 'Zpět',
          'redo' => 'Znovu'
        ],
        'UPOZORNĚNÍ' => 'Překlady lze najít zde: https://github.com/HackerWins/summernote/tree/master/lang'
      ]
    ],
    'listViewModes' => [
      'list' => 'Seznam',
      'kanban' => 'Kanban',
      'combined' => 'Kombinovaný',
      'partitioned' => 'Seskupený'
    ],
    'themes' => [
      'Dark' => 'Dark',
      'Light' => 'Light',
      'Espo' => 'Classic',
      'EspoRtl' => 'RTL',
      'Sakura' => 'Classic Sakura',
      'Violet' => 'Classic Violet',
      'Hazyblue' => 'Classic Hazy',
      'Glass' => 'Glass',
      'EspoVertical' => 'Vertical',
      'HazyblueVertical' => 'Vertical Hazyblue',
      'SakuraVertical' => 'Vertical Sakura',
      'VioletVertical' => 'Vertical Violet'
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
      'Activities' => 'Activities',
      'warehouseManufacturing' => 'Sklady a výroba'
    ],
    'aggregationFunctions' => [
      'average' => 'Průměr',
      'max' => 'Maximum',
      'min' => 'Minimum',
      'sum' => 'Součet'
    ],
    'units' => [
      'pcs' => 'ks'
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
      'New import with same params' => 'Nový import se stejnými parametry',
      'Revert Import' => 'Reverzní import',
      'Return to Import' => 'Návrat do importu',
      'Run Import' => 'Spustit import',
      'Back' => 'Zpět',
      'Field Mapping' => 'Mapování polí',
      'Default Values' => 'Výchozí hodnoty',
      'Add Field' => 'Přidat pole',
      'Created' => 'Vytvořeno',
      'Updated' => 'Aktualizováno',
      'Result' => 'Výsledek',
      'Show records' => 'Zobrazit záznamy',
      'Remove Duplicates' => 'Odebrat duplicity',
      'importedCount' => 'Naimportováno (počet)',
      'duplicateCount' => 'Duplicity (počet)',
      'updatedCount' => 'Aktualizováno (počet)',
      'Create Only' => 'Pouze vytvořit',
      'Create and Update' => 'Vytvořit a aktualizovat',
      'Update Only' => 'Pouze aktualizovat',
      'Update by' => 'Aktualizace podle',
      'Set as Not Duplicate' => 'Nastavit jako neduplikovat',
      'File (CSV)' => 'Soubor (CSV)',
      'First Row Value' => 'Hodnota prvního řádku',
      'Skip' => 'Přeskočit',
      'Header Row Value' => 'Hodnota řádku záhlaví',
      'Field' => 'Pole',
      'What to Import?' => 'Co importovat?',
      'Entity Type' => 'Typ entitiy',
      'What to do?' => 'Co dělat?',
      'Properties' => 'Vlastnosti',
      'Header Row' => 'Řádek záhlaví',
      'Person Name Format' => 'Formát jména osoby',
      'John Smith' => 'John Smith',
      'Smith John' => 'Smith John',
      'Smith, John' => 'Smith, John',
      'Field Delimiter' => 'Oddělovač pole',
      'Date Format' => 'Formát datumu',
      'Decimal Mark' => 'Desetinná značka',
      'Text Qualifier' => 'Kvalifikátor textu',
      'Time Format' => 'Formát času',
      'Currency' => 'Měna',
      'Preview' => 'Náhled',
      'Next' => 'Další',
      'Step 1' => 'Krok 1',
      'Step 2' => 'Krok 2',
      'Double Quote' => 'Dvojitá nabídka',
      'Single Quote' => 'Jednotlivá nabídka',
      'Imported' => 'Importováno',
      'Duplicates' => 'Duplicity',
      'Skip searching for duplicates' => 'Přeskočit vyhledávání duplikátů',
      'Timezone' => 'Časové pásmo',
      'Remove Import Log' => 'Odebrat protokol importu',
      'New Import' => 'Nový import',
      'Import Results' => 'Výsledky importu',
      'Run Manually' => 'Run Manually',
      'Silent Mode' => 'Tichý mód',
      'Export' => 'Export'
    ],
    'messages' => [
      'importRunning' => 'Import running...',
      'noErrors' => 'No errors',
      'utf8' => 'Mělo by být v UTF-8 kódování',
      'duplicatesRemoved' => 'Duplicity odstraněny',
      'inIdle' => 'Provádět v nečinnosti (pro velká data; přes cron)',
      'revert' => 'Tímto trvale odstraníte všechny importované záznamy.',
      'removeDuplicates' => 'Tím trvale odstraníte všechny importované záznamy, které byly rozpoznány jako duplikáty.',
      'confirmRevert' => 'Tímto trvale odstraníte všechny importované záznamy. Jste si jistí?',
      'confirmRemoveDuplicates' => 'Tím trvale odstraníte všechny importované záznamy, které byly rozpoznány jako duplikáty. Jsi si jistá?',
      'confirmRemoveImportLog' => 'Tím odstraníte protokol importu. Všechny importované záznamy budou uchovány. Nebudete moci vrátit výsledky importu. Jste si jistí?',
      'removeImportLog' => 'Tím odstraníte protokol importu. Všechny importované záznamy budou uchovány. Použijte jej, pokud jste si jisti, že import je v pořádku.',
      'Create Only' => 'Pouze vytvořit',
      'Create and Update' => 'Vytvořit a aktualizovat',
      'Update Only' => 'Pouze aktualizovat',
      'Update by' => 'Aktualizace podle',
      'Run Manually' => 'Spustit ručně'
    ],
    'params' => [
      'phoneNumberCountry' => 'Telephone country code'
    ],
    'fields' => [
      'file' => 'Soubor',
      'entityType' => 'Typ entity',
      'imported' => 'Naimportované záznamy',
      'duplicates' => 'Duplicitní záznamy',
      'updated' => 'Aktualizované záznamy',
      'status' => 'Status',
      'duplicateCount' => 'Duplicitní počet',
      'importedCount' => 'Importovaný počet',
      'updatedCount' => 'Aktualizovaný počet'
    ],
    'links' => [
      'errors' => 'Errors'
    ],
    'options' => [
      'status' => [
        'Failed' => 'Selhalo',
        'Standby' => 'Standby',
        'Pending' => 'Pending',
        'In Process' => 'V procesu',
        'Complete' => 'Kompletní'
      ],
      'personNameFormat' => [
        'f l' => 'First Last (Jméno a Příjmení)',
        'l f' => 'Last First (Příjmení a Jméno)',
        'f m l' => 'First Middle Last (Jméno, Druhý jméno, Příjmení)',
        'l f m' => 'Last First Middle (Příjmení Jméno Střední)',
        'l, f' => 'Last, First (Příjmení, Jméno)'
      ]
    ],
    'strings' => [
      'commandToRun' => 'Command to run (from CLI)',
      'saveAsDefault' => 'Uložit jako výchozí'
    ],
    'tooltips' => [
      'manualMode' => 'If checked, you will need to run import manually from CLI. Command will be shown after setting up the import.',
      'silentMode' => 'Většina skriptů po uložení bude přeskočena, záznamy ve streamu nebudou vytvořeny. Import bude probíhat rychleji.'
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
      'name' => 'Jméno',
      'emailAddress' => 'Emailová adresa',
      'team' => 'Tým',
      'status' => 'Stav',
      'assignToUser' => 'Přiřadit k uživateli',
      'host' => 'Server',
      'username' => 'Uživatelské jméno',
      'password' => 'Heslo',
      'port' => 'Port',
      'monitoredFolders' => 'Synchronizované složky',
      'trashFolder' => 'Koš',
      'security' => 'Security',
      'createCase' => 'Vytvořit událost',
      'reply' => 'Auto-odpověď',
      'caseDistribution' => 'Distribuce událostí',
      'replyEmailTemplate' => 'Odpověď: Šablona',
      'replyFromAddress' => 'Odpověď: Od',
      'replyToAddress' => 'Odpověď: Komu',
      'replyFromName' => 'Odpověď: Jméno',
      'targetUserPosition' => 'Pozice cílového uživatele',
      'fetchSince' => 'Načíst od',
      'addAllTeamUsers' => 'Pro všechny uživatele týmu',
      'teams' => 'Týmy',
      'sentFolder' => 'Odeslaná složka',
      'storeSentEmails' => 'Uložit odeslané e-maily',
      'keepFetchedEmailsUnread' => 'Nechat načtené e-maily jako nepřečtené',
      'useImap' => 'Načíst e-maily',
      'useSmtp' => 'Použít SMTP',
      'smtpHost' => 'SMTP Host',
      'smtpPort' => 'SMTP Port',
      'smtpAuth' => 'SMTP Auth',
      'smtpSecurity' => 'SMTP Security',
      'smtpAuthMechanism' => 'SMTP Auth Mechanism',
      'smtpUsername' => 'SMTP uživatelské jméno',
      'smtpPassword' => 'SMTP heslo',
      'fromName' => 'Od jména',
      'smtpIsShared' => 'SMTP je sdíleno',
      'smtpIsForMassEmail' => 'SMTP pro hromadný e-mail',
      'groupEmailFolder' => 'Group Email Folder',
      'signature' => 'Podpis',
      'ssl' => 'SSL',
      'fetchData' => 'Načíst data'
    ],
    'tooltips' => [
      'useSmtp' => 'Možnost odesílat e-maily.',
      'reply' => 'Upozornit odesílatele emailů, že jejich emaily byly přijaty.

 Pro potlačení zacyklení, pouze jeden email za časové období bude poslán každému příjemci.',
      'createCase' => 'Automaticky vytvořit událost z příchozích emailů.',
      'replyToAddress' => 'Specifikovat emailovou adresu této schánky, aby sem chodily odpovědi.',
      'caseDistribution' => 'Nastavení, jak budou události přiřazovány - přímo uživateli nebo dle týmů.',
      'assignToUser' => 'Emaily/události přiřadit uživateli.',
      'team' => 'Emaily/události přiřadit týmu.',
      'teams' => 'E-maily týmů budou přiřazeny.',
      'targetUserPosition' => 'Definice pozice uživatelů, kterým budou redistribuovány události.',
      'addAllTeamUsers' => 'E-maily se budou zobrazovat ve složce Doručená pošta všech uživatelů určených týmů.',
      'monitoredFolders' => 'Více složek by mělo být odděleno čárkou.',
      'smtpIsShared' => 'Je-li toto políčko zaškrtnuto, uživatelé budou moci odesílat e-maily pomocí tohoto protokolu SMTP. Dostupnost je kontrolována rolemi prostřednictvím oprávnění skupinového e-mailového účtu.',
      'smtpIsForMassEmail' => 'Pokud je zaškrtnuto, pak bude SMTP k dispozici pro hromadný e-mail.',
      'storeSentEmails' => 'Odeslané e-maily budou uloženy na serveru IMAP.',
      'groupEmailFolder' => 'Put incoming emails in a group folder.',
      'signature' => 'Je možno používat zástupné symboly jako {userName}, {name}, {emailAddress} a {phoneNumber}'
    ],
    'links' => [
      'filters' => 'Filtry',
      'emails' => 'Emaily',
      'assignToUser' => 'Přiřadit uživateli',
      'groupEmailFolder' => 'Group Email Folder'
    ],
    'options' => [
      'status' => [
        'Active' => 'Aktivní',
        'Inactive' => 'Neaktivní'
      ],
      'caseDistribution' => [
        '' => 'None',
        'Direct-Assignment' => 'Přímé přiřazení',
        'Round-Robin' => 'Round-Robin',
        'Least-Busy' => 'Poslední zaneprázdněný'
      ],
      'smtpAuthMechanism' => [
        'plain' => 'PLAIN',
        'login' => 'LOGIN',
        'crammd5' => 'CRAM-MD5'
      ]
    ],
    'labels' => [
      'Create InboundEmail' => 'Vytvořit emailový účet',
      'IMAP' => 'IMAP',
      'Actions' => 'Akce',
      'Main' => 'Hlavní'
    ],
    'messages' => [
      'couldNotConnectToImap' => 'Nelze se připojit k IMAP serveru'
    ]
  ],
  'Integration' => [
    'fields' => [
      'enabled' => 'Povoleno',
      'clientId' => 'ID klienta',
      'clientSecret' => 'Client Secret',
      'redirectUri' => 'Přesměrování URI',
      'apiKey' => 'API klíč',
      'serverUrl' => 'Adresa serveru',
      'token' => 'Autentizační token',
      'teamId' => 'ID týmu',
      'googleCalendar' => 'Calendar',
      'googleContacts' => 'Contacts',
      'googleTasks' => 'Tasks',
      'scriptSrc' => 'Url adresa skriptu'
    ],
    'titles' => [
      'GoogleMaps' => 'Google Maps',
      'mattermost' => 'Mattermost'
    ],
    'messages' => [
      'selectIntegration' => 'Vybrat integraci z menu.',
      'noIntegrations' => 'Žádné integrace nejsou dostupné.'
    ],
    'help' => [
      'Google' => '& lt; p & gt; & lt; b & gt; Získejte přihlašovací údaje OAuth 2.0 z konzoly Google Developers Console. & Lt; / b & gt; & lt; / p & gt; & lt; p & gt; Navštivte & lt; a href = "https://console.developers.google. com / project "& gt; Google Developers Console & lt; / a & gt; získat přihlašovací údaje OAuth 2.0, jako je ID klienta a Tajné heslo klienta, které jsou známé aplikacím Google i AutoCRM. & lt; / p & gt;',
      'GoogleMaps' => 'Získejte klíč API [zde] (https://developers.google.com/maps/documentation/javascript/get-api-key).',
      'mattermost' => '**Konfigurace integrace s Mattermost**

1. Vytvořte nového administrátorského uživatele a [vygenerujte pro něj osobní přístupový token](https://docs.mattermost.com/developer/personal-access-tokens.html#creating-a-personal-access-token).
2. Povolte integraci a vyplňte všechna pole. Získat ID týmu může být poměrně složité - jedním ze způsobů, jak to udělat, je otevřít stránku pro úpravu týmu v systémové konzoli a zkopírovat ID z adresy URL.
3. Nainstalujte a nakonfigurujte plugin AutoCRM Integration ve své instanci Mattermost. Další podrobnosti: [https://gitlab.apertia.cz/autocrm/mattermost-autocrm-integration#installation](https://gitlab.apertia.cz/autocrm/mattermost-autocrm-integration#installation).'
    ],
    'mattermost' => [
      'tokenDescription' => 'AutoCRM Integrace',
      'projectChannelHeader' => 'Kanál k projektu'
    ],
    'labels' => [
      'Create Integration' => 'Vytvořit integraci'
    ]
  ],
  'Job' => [
    'fields' => [
      'status' => 'Status',
      'executeTime' => 'Provádět v',
      'executedAt' => 'Provedeno v',
      'startedAt' => 'Zahájeno v',
      'attempts' => 'Zbývající pokusy',
      'failedAttempts' => 'Neúspěšné pokusy',
      'serviceName' => 'Servis',
      'method' => 'Metoda (deprecated)',
      'methodName' => 'Meoda',
      'scheduledJob' => 'Plánovaná úloha',
      'scheduledJobJob' => 'Název naplánované úlohy',
      'data' => 'Data',
      'targetType' => 'Typ cíle',
      'targetId' => 'Cílové ID',
      'number' => 'Číslo',
      'queue' => 'Fronta',
      'group' => 'Group',
      'className' => 'Class Name',
      'targetGroup' => 'Target Group',
      'job' => 'Úloha'
    ],
    'options' => [
      'status' => [
        'Pending' => 'Čekající',
        'Success' => 'Úspěšně dokončeno',
        'Running' => 'V procesu',
        'Failed' => 'Selhalo',
        'Ready' => 'Připraven'
      ]
    ],
    'labels' => [
      'Create Job' => 'Vytvořit job'
    ],
    'links' => [
      'scheduledJob' => 'Naplánovaný job'
    ]
  ],
  'LayoutManager' => [
    'fields' => [
      'width' => 'Šířka (%)',
      'link' => 'Odkaz',
      'notSortable' => 'Neřaditelné',
      'align' => 'Zarovnání',
      'panelName' => 'Název panelu',
      'style' => 'Styl',
      'sticked' => 'Sticked',
      'isLarge' => 'Velká velikost písma',
      'hidden' => 'Skrytý',
      'noLabel' => 'Skrýt název',
      'dynamicLogicVisible' => 'Podmínky zviditelnění panelu',
      'dynamicLogicStyled' => 'Conditions making style applied',
      'tabLabel' => 'Tab Label',
      'tabBreak' => 'Tab-Break',
      'isEditable' => 'Upravitelné',
      'layout' => 'Layout panelu',
      'filtersEnabled' => 'Zobrazit filtry',
      'screenSize' => 'Velikost obrazovky',
      'customLabel' => 'Vlastní název',
      'color' => 'Barva',
      'bold' => 'Tučný text',
      'css' => 'Doplňkové CSS třídy',
      'horizontalLabel' => 'Horizontální popisek'
    ],
    'options' => [
      'align' => [
        'left' => 'Vlevo',
        'right' => 'Vpravo'
      ],
      'style' => [
        'default' => 'Výchozí',
        'success' => 'Úspěch',
        'danger' => 'Danger',
        'info' => 'Info',
        'warning' => 'Varování',
        'primary' => 'Primární'
      ],
      'screenSize' => [
        'xs' => 'Mobil',
        'sm' => 'Tablet',
        'md' => 'Desktop',
        'lg' => 'Větší desktop'
      ],
      'gridLayoutType' => [
        'record' => 'Výchozí',
        'tab' => 'Záložky'
      ],
      'bottomLayoutType' => [
        'default' => 'Výchozí',
        'tab' => 'Záložky'
      ]
    ],
    'labels' => [
      'New panel' => 'Nový panel',
      'Layout' => 'Vzhled',
      'Column' => 'Sloupec',
      'New Panel' => 'Nový panel',
      'Custom Label' => 'Vlastní název',
      'Width' => 'Šířka',
      'Insert Row' => 'Vložit řádek',
      'Insert New Panel' => 'Vložit nový panel',
      'Remove Row' => 'Odstranit řádek',
      'Add Row' => 'Přidat řádek',
      'Edit Panel' => 'Upravit panel',
      'Remove Panel' => 'Odstranit panel',
      'Show Code' => 'Zobrazit kód',
      'Color' => 'Barva',
      'Columns Count' => 'Počet sloupců',
      'Field' => 'Pole',
      'Bold' => 'Zvýrazněný (tučný)'
    ],
    'messages' => [
      'alreadyExists' => 'Layout `{name}` already exists.',
      'createInfo' => 'Custom list layouts can be used by relationship panels.',
      'cantBeEmpty' => 'Layout can\'t be empty.',
      'fieldsIncompatible' => 'Fields can\'t be on the layout together: {fields}.',
      'cannotRemoveLastPanel' => 'Nelze odstranit poslední panel!'
    ],
    'tooltips' => [
      'tabBreak' => 'A separate tab for the panel and all following panels until the next tab-break.',
      'noLabel' => 'Don\'t display a column label in the header.',
      'notSortable' => 'Disables the ability to sort by the column.',
      'width' => 'A column width. It\'s recommended to have one column without specified width, usually it should be the *Name* field.',
      'sticked' => 'The panel will be sticked to the panel above. No gap between panels.',
      'hiddenPanel' => 'Chcete-li zobrazit panel, musíte kliknout na „zobrazit více“.',
      'panelStyle' => 'A color of the panel.',
      'dynamicLogicVisible' => 'If set, the panel will be hidden unless the condition is met.',
      'dynamicLogicStyled' => 'A color will be applied if a specific condition is met . The color is defined by the *Style* parameter.',
      'link' => 'Pokud je zaškrtnuto, zobrazí se hodnota pole jako odkaz směřující na detailní pohled na záznam. Obvykle se používá pro pole * Jméno *.',
      'isEditable' => 'Zda je pole v rozvržení seznamu editovatelné. Mějte na paměti, že ne každé pole může být editovatelné (např. pole pouze pro čtení nebo pole s odkazy) a že editace v seznamu může způsobit chybné kliknutí a ztrátu dat.'
    ]
  ],
  'LayoutSet' => [
    'fields' => [
      'layoutList' => 'Rozvržení (Layouts)'
    ],
    'labels' => [
      'Create LayoutSet' => 'Vytvořit sadu rozvržení (layout)',
      'Edit Layouts' => 'Editovat rozvržení (layouty)'
    ],
    'tooltips' => [],
    'links' => [
      'portals' => 'Portály'
    ]
  ],
  'LeadCapture' => [
    'fields' => [
      'name' => 'Name',
      'campaign' => 'Kampaň',
      'isActive' => 'Je aktivní',
      'subscribeToTargetList' => 'Subscribe to Target List',
      'subscribeContactToTargetList' => 'Subscribe Contact if exists',
      'targetList' => 'Cílový seznam',
      'fieldList' => 'Payload Fields',
      'optInConfirmation' => 'Double Opt-In',
      'optInConfirmationEmailTemplate' => 'Opt-in confirmation email template',
      'optInConfirmationLifetime' => 'Opt-in confirmation lifetime (hours)',
      'optInConfirmationSuccessMessage' => 'Text, který se zobrazí po potvrzení přihlášení',
      'leadSource' => 'Lead Source',
      'apiKey' => 'API klíč',
      'targetTeam' => 'Cílový tým',
      'exampleRequestMethod' => 'Metoda',
      'exampleRequestUrl' => 'URL',
      'exampleRequestPayload' => 'Payload',
      'exampleRequestHeaders' => 'Headers',
      'createLeadBeforeOptInConfirmation' => 'Před potvrzením vytvořte zájemce',
      'skipOptInConfirmationIfSubscribed' => 'Přeskočte potvrzení, pokud je Potenciál již v seznamu cílů',
      'smtpAccount' => 'SMTP Account',
      'inboundEmail' => 'Skupinový e-mailový účet',
      'duplicateCheck' => 'Duplicitní kontrola',
      'phoneNumberCountry' => 'Telephone country code'
    ],
    'links' => [
      'targetList' => 'Cílový seznam',
      'campaign' => 'Kampaň',
      'optInConfirmationEmailTemplate' => 'Opt-in confirmation email template',
      'targetTeam' => 'Cílový tým',
      'inboundEmail' => 'Skupinový emailový účet',
      'logRecords' => 'Log'
    ],
    'labels' => [
      'Create LeadCapture' => 'Vytvořit vstupní bod',
      'Generate New API Key' => 'Generovat nový klíč API',
      'Request' => 'Požadavek',
      'Confirm Opt-In' => 'Potvrďte přihlášení'
    ],
    'messages' => [
      'generateApiKey' => 'Vytvořit nový klíč API',
      'optInConfirmationExpired' => 'Platnost odkazu pro potvrzení přihlášení vypršela.',
      'optInIsConfirmed' => 'Přihlášení je potvrzeno.'
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
      'attachments' => 'Přílohy',
      'targetType' => 'Cíl',
      'teams' => 'Týmy',
      'users' => 'Uživatelé',
      'portals' => 'Portály',
      'type' => 'Typ',
      'isGlobal' => 'Globální',
      'isInternal' => 'Interní (pro interní uživatele)',
      'related' => 'Related',
      'createdByGender' => 'Created By Gender',
      'data' => 'Data',
      'number' => 'Číslo'
    ],
    'filters' => [
      'all' => 'Vše',
      'posts' => 'Posts',
      'updates' => 'Updates'
    ],
    'options' => [
      'targetType' => [
        'self' => 'sobě',
        'users' => 'konkrétnímu uživateli (uživatelům)',
        'teams' => 'konkrétnímu týmu (týmům)',
        'all' => 'všem interním uživatelům',
        'portals' => 'uživatelům portálu'
      ],
      'type' => [
        'Post' => 'Post'
      ]
    ],
    'messages' => [
      'writeMessage' => 'Napište zprávu zde'
    ],
    'links' => [
      'portals' => 'Portály',
      'attachments' => 'Přílohy',
      'superParent' => 'Super rodič',
      'related' => 'Related'
    ],
    'labels' => [
      'Create Note' => 'Vytvořit poznámku'
    ]
  ],
  'PhoneNumber' => [
    'fields' => [
      'type' => 'Typ',
      'optOut' => 'Odhlášeno',
      'invalid' => 'Neplatný',
      'numeric' => 'Číselný'
    ],
    'presetFilters' => [
      'orphan' => 'Orphan'
    ],
    'labels' => [
      'Create PhoneNumber' => 'Vytvořit telefonní číslo'
    ]
  ],
  'Portal' => [
    'fields' => [
      'name' => 'Jméno',
      'logo' => 'Logo',
      'url' => 'URL',
      'portalRoles' => 'Role',
      'isActive' => 'Je aktivní',
      'isDefault' => 'Výchozí',
      'tabList' => 'Seznam záložek',
      'quickCreateList' => 'Rychlé vytvoření seznamu',
      'companyLogo' => 'Logo',
      'theme' => 'Téma',
      'language' => 'Jazyk',
      'dashboardLayout' => 'Rozvržení Dashboardu',
      'dateFormat' => 'Formát datumu',
      'timeFormat' => 'Formát času',
      'timeZone' => 'Časové pásmo',
      'weekStart' => 'První den týdne',
      'defaultCurrency' => 'Výchozí měna',
      'layoutSet' => 'Sada layoutu',
      'authenticationProvider' => 'Authentication Provider',
      'customUrl' => 'Custom URL',
      'customId' => 'Custom ID'
    ],
    'links' => [
      'users' => 'Uživatelé',
      'portalRoles' => 'Role',
      'layoutSet' => 'Sada layoutu',
      'authenticationProvider' => 'Authentication Provider',
      'notes' => 'Poznámky',
      'articles' => 'Články znalostní báze',
      'reports' => 'Reporty'
    ],
    'tooltips' => [
      'layoutSet' => 'Poskytuje možnost mít rozložení (layouty), která se liší od standardních.',
      'portalRoles' => 'Určené role portálu budou použity pro všechny uživatele tohoto portálu.'
    ],
    'labels' => [
      'Create Portal' => 'Vytvořit portál',
      'User Interface' => 'Uživatelské prostředí',
      'General' => 'Obecné',
      'Settings' => 'Nastavení'
    ]
  ],
  'PortalRole' => [
    'fields' => [
      'exportPermission' => 'Oprávnění exportu',
      'massUpdatePermission' => 'Oprávnění hromadné aktualizace',
      'data' => 'Data',
      'fieldData' => 'Field Data'
    ],
    'links' => [
      'users' => 'Uživatelé',
      'portals' => 'Portály'
    ],
    'labels' => [
      'Access' => 'Přístup',
      'Create PortalRole' => 'Vytvořit portálovou roli',
      'Scope Level' => 'Scope Level',
      'Field Level' => 'Úroveň pole'
    ],
    'tooltips' => [
      'exportPermission' => 'Definuje, zda uživatelé portálu mají možnost exportovat záznamy.',
      'massUpdatePermission' => 'Definuje, zda mají uživatelé portálu možnost provádět hromadnou aktualizaci záznamů.'
    ]
  ],
  'PortalUser' => [
    'labels' => [
      'Create PortalUser' => 'Vytvořit uživatele portálu'
    ]
  ],
  'Preferences' => [
    'fields' => [
      'dateFormat' => 'Formát data',
      'timeFormat' => 'Formát času',
      'timeZone' => 'Časové pásmo',
      'weekStart' => 'Začátek týdne',
      'thousandSeparator' => 'Oddělovač tisíců',
      'decimalMark' => 'Desetinný oddělovač',
      'defaultCurrency' => 'Výchozí měna',
      'currencyList' => 'Seznam měn',
      'language' => 'Jazyk',
      'exportDelimiter' => 'Exportovat oddělovač',
      'receiveAssignmentEmailNotifications' => 'Dostávat emailová upozornění dle přiřazení',
      'receiveMentionEmailNotifications' => 'Emailová oznámení o zmínkách v příspěvcích',
      'receiveStreamEmailNotifications' => 'Emailová upozornění na příspěvky a aktualizace stavu',
      'assignmentNotificationsIgnoreEntityTypeList' => 'Oznámení o přiřazení v aplikaci',
      'assignmentEmailNotificationsIgnoreEntityTypeList' => 'Oznámení o přiřazení e-mailu',
      'autoFollowEntityTypeList' => 'Automatické sledování',
      'signature' => 'Emailový podpis',
      'dashboardTabList' => 'Seznam záložek',
      'defaultReminders' => 'Výchozí upozornění',
      'theme' => 'Téma',
      'useCustomTabList' => 'Seznam vlastních záložek',
      'tabList' => 'Seznam záložek',
      'emailReplyToAllByDefault' => 'Odpovědět všem jako výchozí',
      'dashboardLayout' => 'Rozvržení Dashboardu',
      'dashboardLocked' => 'Lock Dashboard',
      'emailReplyForceHtml' => 'Odpovědět emailem v HTML',
      'doNotFillAssignedUserIfNotRequired' => 'Při vytváření záznamu předem nevyplňujte přiřazeného uživatele',
      'followEntityOnStreamPost' => 'Automaticky sledovat záznam po zveřejnění ve streamu',
      'followCreatedEntities' => 'Automaticky sledovat vytvořené záznamy',
      'followCreatedEntityTypeList' => 'Automaticky sledovat vytvořené záznamy konkrétních typů entit',
      'emailUseExternalClient' => 'Použít externího emailového klienta',
      'scopeColorsDisabled' => 'Zakázat barvy rozsahu',
      'tabColorsDisabled' => 'Zakázat barvy záložek',
      'textSearchStoringDisabled' => 'Disable text filter storing',
      'quickViewContextMenu' => 'Nahradit kontextové menu akcí zobrazení',
      'customFiltersAboveList' => 'Zobrazit vlastní filtry nad seznamem',
      'collapsibleDashlets' => 'Schovávání dashletů',
      'disableIntroGuide' => 'Zakázat úvodního průvodce',
      'receivePushNotifications' => 'Odebírat notifikace na plochu',
      'smtpServer' => 'Server',
      'smtpPort' => 'Port',
      'smtpAuth' => 'Auth',
      'smtpSecurity' => 'Zabezpečení',
      'smtpUsername' => 'Uživatelské jméno',
      'emailAddress' => 'Email',
      'smtpPassword' => 'Heslo',
      'smtpEmailAddress' => 'Emailová adresa',
      'ignoreEmailNotifications' => 'Nedostávat notifikace o emailech',
      'presetFilters' => 'Přednastavné filtry',
      'isPortalUser' => 'Uživatel portálu',
      'sharedCalendarUserList' => 'Sdílený seznam uživatelů kalendáře'
    ],
    'links' => [],
    'options' => [
      'weekStart' => [
        0 => 'Neděle',
        1 => 'Pondělí'
      ]
    ],
    'labels' => [
      'Notifications' => 'Upozornění',
      'User Interface' => 'Uživatelské prostředí',
      'Misc' => 'Různé',
      'Locale' => 'Lokální nastavení',
      'Reset Dashboard to Default' => 'Nastavit Dashboard na Výchozí',
      'AutoCRM' => 'AutoCRM',
      'Create Preferences' => 'Vytvořit předvolby'
    ],
    'tooltips' => [
      'autoFollowEntityTypeList' => 'Uživatel bude automaticky sledovat všechny nové záznamy vybraných entit, uvidí informace ve streamu a bude dostávat upozornění.',
      'doNotFillAssignedUserIfNotRequired' => 'Při vytvoření záznamu nebude přiřazený uživatel vyplněn vlastním uživatelem, pokud není toto pole povinné.',
      'followCreatedEntities' => 'Při vytváření nových záznamů budou automaticky sledovány, i když budou přiřazeny jinému uživateli.',
      'followCreatedEntityTypeList' => 'Při vytváření nových záznamů vybraných typů entit budou automaticky sledovány, i když budou přiřazeny jinému uživateli.'
    ]
  ],
  'Role' => [
    'fields' => [
      'name' => 'Jméno',
      'roles' => 'Role',
      'assignmentPermission' => 'Přiřazení oprávnění',
      'userPermission' => 'Uživatelská oprávnění',
      'messagePermission' => 'Message Permission',
      'portalPermission' => 'Práva portálu',
      'groupEmailAccountPermission' => 'Práva skupinového e-mailového účtu',
      'exportPermission' => 'Práva exportu',
      'massUpdatePermission' => 'Práva hromadné aktualizace',
      'followerManagementPermission' => 'Follower Management Permission',
      'dataPrivacyPermission' => 'Práva k ochraně osobních údajů',
      'data' => 'Data',
      'fieldData' => 'Field Data'
    ],
    'links' => [
      'users' => 'Uživatelé',
      'teams' => 'Týmy'
    ],
    'tooltips' => [
      'messagePermission' => 'Allows to send messages to other users.

* all – can send to all
* team – can send only to teammates
* no – cannot send',
      'assignmentPermission' => 'Povolit omezení přiřazení záznamů ostatním uživatelům.n
vše - bez omezení

tým - povoluje přiřadit uživatelům ze svého týmu

ne - povoluje přiřadit pouze sobě',
      'userPermission' => 'Povolit omezení zobrazení aktivit ostatních uživatelů.

vše - viditelné vše

tým - viditelné u uživatelů ze svého týmu

ne - není viditelné',
      'portalPermission' => 'Definuje přístup k informacím o portálu, schopnost posílat zprávy uživatelům portálu.',
      'groupEmailAccountPermission' => 'Definuje přístup ke skupinovým e-mailovým účtům, schopnost odesílat e-maily ze skupinového SMTP.',
      'exportPermission' => 'Definuje, zda mají uživatelé možnost exportovat záznamy.',
      'massUpdatePermission' => 'Definuje, zda mají uživatelé možnost provádět hromadnou aktualizaci záznamů.',
      'followerManagementPermission' => 'Allows to manage followers of specific records.',
      'dataPrivacyPermission' => 'Umožňuje prohlížet a mazat osobní údaje.'
    ],
    'labels' => [
      'Access' => 'Přístup',
      'Create Role' => 'Vytvořit roli',
      'Scope Level' => 'Scope Level',
      'Field Level' => 'Úroveň pole'
    ],
    'options' => [
      'accessList' => [
        'not-set' => 'není nastaveno',
        'enabled' => 'povoleno',
        'disabled' => 'zakázáno'
      ],
      'levelList' => [
        'all' => 'vše',
        'team' => 'tým',
        'account' => 'účet',
        'contact' => 'kontakt',
        'own' => 'vlastní',
        'no' => 'ne',
        'yes' => 'ano',
        'not-set' => 'nenastaveno'
      ]
    ],
    'actions' => [
      'read' => 'Číst',
      'edit' => 'Upravit',
      'delete' => 'Smazat',
      'stream' => 'Stream',
      'create' => 'Vytvořit'
    ],
    'messages' => [
      'changesAfterClearCache' => 'Všechny změny v nastavení ACL budou aplikovány po vyčištění cache.'
    ]
  ],
  'ScheduledJob' => [
    'fields' => [
      'name' => 'Jméno',
      'status' => 'Status',
      'job' => 'Činnost',
      'scheduling' => 'Plánování (crontab notace)'
    ],
    'links' => [
      'log' => 'Log'
    ],
    'labels' => [
      'As often as possible' => 'Tak často, jak je to možné',
      'Create ScheduledJob' => 'Vytvořit naplánovanou činnost'
    ],
    'options' => [
      'job' => [
        'Cleanup' => 'Vyčistit',
        'CheckInboundEmails' => 'Zkontrolovat příchozí emaily',
        'CheckEmailAccounts' => 'Zkontrolovat emaily',
        'SendEmailReminders' => 'Připomenutí emaiů k poslání',
        'AuthTokenControl' => 'Auth Token Control',
        'SendEmailNotifications' => 'Odeslat emailová oznámení',
        'CheckNewVersion' => 'Zkontrolovat novou verzi',
        'ProcessWebhookQueue' => 'Process Webhook Queue',
        'ProcessMassEmail' => 'Poslat hromadné emaily',
        'ControlKnowledgeBaseArticleStatus' => 'Zkontrolovat status článku znalostní báze',
        'CNBSync' => 'Synchronizace měnových kurzů s CNB',
        'ReportTargetListSync' => 'Synchronizace cílových seznamů se záznamy',
        'ScheduleReportSending' => 'Odesílání záznamu o plánování',
        'RunScheduledWorkflows' => 'Spustit plánovaný proces',
        'ProcessPendingProcessFlows' => 'Process Pending Flows',
        'CheckRecurringRecords' => 'Naplánovat opakující se záznamy',
        'SaveWarehouseValue' => 'Ukládání hodnoty skladu',
        'SynchronizeEventsWithGoogleCalendar' => 'Synchronizace Google kalendáře'
      ],
      'cronSetup' => [
        'linux' => 'Poznámka: přidejte tento řádek do crontab souboru pro spuštění ESPO naplánovaných činností:',
        'mac' => 'Poznámka: přidejte tento řádek do crontab souboru pro spuštění ESPO naplánovaných činností:',
        'windows' => 'Poznánmka: Vytvořte batch soubor s následujícími příkazy pro spuštění ESPO naplánovaných činností pomocí Windows Scheduled Tasks:',
        'default' => 'Poznámka: přidejte tento příkaz do Cron Job (Scheduled Task):'
      ],
      'status' => [
        'Active' => 'Aktivní',
        'Inactive' => 'Neaktivní'
      ]
    ],
    'tooltips' => [
      'scheduling' => 'Crontabova notace. Definuje frekvenci spouštění úloh. \\ N` * / 5 * * * * `- každých 5 minut`0 * / 2 * * *` - každé 2 hodiny`30 1 * * * `- v 01:30 jednou denně` 0 0 1 * * `- první den v měsíci'
    ]
  ],
  'ScheduledJobLogRecord' => [
    'fields' => [
      'status' => 'Status',
      'executionTime' => 'Čas vykonání',
      'target' => 'Cíl',
      'scheduledJob' => 'Naplánovaná úloha'
    ],
    'labels' => [
      'Create ScheduledJobLogRecord' => 'Vytvořit záznam protokolu naplánované úlohy'
    ],
    'links' => [
      'scheduledJob' => 'Naplánovaná úloha'
    ]
  ],
  'Settings' => [
    'fields' => [
      'useCache' => 'Použít cache',
      'dateFormat' => 'Formát data',
      'timeFormat' => 'Formát času',
      'timeZone' => 'Časové pásmo',
      'weekStart' => 'První den v týdnu',
      'thousandSeparator' => 'Oddělovač tisíců',
      'decimalMark' => 'Desetinný oddělovač',
      'defaultCurrency' => 'Výchozí měna',
      'baseCurrency' => 'Základní měna',
      'currencyRates' => 'Kurzy měn',
      'currencyList' => 'Seznam měn',
      'language' => 'Jazyk',
      'companyLogo' => 'Logo společnosti',
      'smsProvider' => 'SMS Provider',
      'outboundSmsFromNumber' => 'SMS From Number',
      'smtpServer' => 'Server',
      'smtpPort' => 'Port',
      'smtpAuth' => 'Auth',
      'smtpSecurity' => 'Zabezpečení',
      'smtpUsername' => 'Uživatelské jméno',
      'emailAddress' => 'Email',
      'smtpPassword' => 'Heslo',
      'outboundEmailFromName' => 'Od (jméno)',
      'outboundEmailFromAddress' => 'Od (adresa)',
      'outboundEmailIsShared' => 'Sdílení',
      'emailAddressLookupEntityTypeList' => 'Rozsahy vyhledávání emailových adres',
      'recordsPerPage' => 'Záznamy na stránku',
      'recordsPerPageSmall' => 'Záznamy na stránku (malý)',
      'recordsPerPageSelect' => 'Records Per Page (Select)',
      'recordsPerPageKanban' => 'Records Per Page (Kanban)',
      'tabList' => 'Seznam záložek',
      'quickCreateList' => 'Rychlé odkazy',
      'exportDelimiter' => 'Export oddělovač',
      'globalSearchEntityList' => 'Seznam entit globálního vyhledávání',
      'authenticationMethod' => 'Autentizační metoda',
      'ldapHost' => 'Host',
      'ldapPort' => 'Port',
      'ldapAuth' => 'Auth',
      'ldapUsername' => 'Uživatelské jméno',
      'ldapPassword' => 'Heslo',
      'ldapBindRequiresDn' => 'Přiřazení vyžaduje Dn',
      'ldapBaseDn' => 'Základní Dn',
      'ldapAccountCanonicalForm' => 'Account Canonical Form',
      'ldapAccountDomainName' => 'Název domény účtu',
      'ldapTryUsernameSplit' => 'Zkuste rozdělit uživatelské jméno',
      'ldapPortalUserLdapAuth' => 'Pro uživatele portálu použijte ověřování LDAP',
      'ldapCreateEspoUser' => 'Vytvořit uživatele v AutoCRM',
      'ldapSecurity' => 'Zabezpečení',
      'ldapUserLoginFilter' => 'Filtr uživatelského přihlášení',
      'ldapAccountDomainNameShort' => 'Název domény účtu (krátké)',
      'ldapOptReferrals' => 'Volit doporučení',
      'ldapUserNameAttribute' => 'Atribut uživatelského jména',
      'ldapUserObjectClass' => 'User ObjectClass',
      'ldapUserTitleAttribute' => 'Atribut názvu uživatele',
      'ldapUserFirstNameAttribute' => 'User First Name Attribute',
      'ldapUserLastNameAttribute' => 'User Last Name Attribute',
      'ldapUserEmailAddressAttribute' => 'User Email Address Attribute',
      'ldapUserTeams' => 'Týmy uživatele',
      'ldapUserDefaultTeam' => 'Výchozí tým uživatele',
      'ldapUserPhoneNumberAttribute' => 'Atribut telefonního čísla uživatele',
      'ldapPortalUserPortals' => 'Výchozí portály pro uživatele portálu',
      'ldapPortalUserRoles' => 'Výchozí role pro uživatele portálu',
      'exportDisabled' => 'Zakázat export (povolen pouze správce)',
      'assignmentNotificationsEntityList' => 'Entity k upozornění podle přiřazení',
      'assignmentEmailNotifications' => 'Poslat emailová upozornění podle přiřazení',
      'assignmentEmailNotificationsEntityList' => 'Entity k upozornění emailem podle přiřazení',
      'streamEmailNotifications' => 'Oznámení o aktualizacích ve streamu pro interní uživatele',
      'portalStreamEmailNotifications' => 'Oznámení o aktualizacích ve streamu pro uživatele portálu',
      'streamEmailNotificationsEntityList' => 'Stream email notifications scopes',
      'streamEmailNotificationsTypeList' => 'Na co upozorňovat',
      'emailNotificationsDelay' => 'Zpoždění e-mailových oznámení (v sekundách)',
      'b2cMode' => 'Režm B2C',
      'avatarsDisabled' => 'Zakázat avatary',
      'followCreatedEntities' => 'Sledovat vytvořené entity',
      'displayListViewRecordCount' => 'Zobrazit celkový počet (v zobrazení seznamu)',
      'theme' => 'Téma',
      'userThemesDisabled' => 'Zakázat uživatelské motivy',
      'attachmentUploadMaxSize' => 'Upload Max Size (Mb)',
      'attachmentUploadChunkSize' => 'Upload Chunk Size (Mb)',
      'emailMessageMaxSize' => 'Maximální velikost emailu (Mb)',
      'massEmailMaxPerHourCount' => 'Maximální počet e-mailů odeslaných za hodinu',
      'massEmailMaxPerBatchCount' => 'Max number of emails sent per batch',
      'personalEmailMaxPortionSize' => 'Maximální velikost emailové části pro načítání osobních účtů',
      'inboundEmailMaxPortionSize' => 'Maximální velikost emailové části pro načítání skupinových účtů',
      'maxEmailAccountCount' => 'Maximální počet osobních emailových účtů na uživatele',
      'authTokenLifetime' => 'Životnost ověřovacího tokenu (hodiny)',
      'authTokenMaxIdleTime' => 'Maximální doba nečinnosti ověřovacího tokenu (hodiny)',
      'dashboardLayout' => 'Rozvržení Dashboardu (výchozí)',
      'siteUrl' => 'URL stránky',
      'addressPreview' => 'Náhled adresy',
      'addressFormat' => 'Formát adresy',
      'personNameFormat' => 'Formát jména osoby',
      'notificationSoundsDisabled' => 'Zakázat zvuky oznámení',
      'newNotificationCountInTitle' => 'Zobrazit nové číslo oznámení v názvu stránky',
      'applicationName' => 'Název aplikace',
      'calendarEntityList' => 'Seznam entit kalendáře',
      'busyRangesEntityList' => 'Seznam volných / zaneprázdněných entit',
      'mentionEmailNotifications' => 'Zasílejte emailová oznámení o nových příspěvcích',
      'massEmailDisableMandatoryOptOutLink' => 'Zakázat povinný odkaz pro odhlášení',
      'massEmailOpenTracking' => 'Sledování otevření emailů',
      'massEmailVerp' => 'Použít VERP',
      'activitiesEntityList' => 'Seznam entit aktivit',
      'historyEntityList' => 'Seznam entit historie',
      'currencyFormat' => 'Formát měny',
      'currencyDecimalPlaces' => 'Currency Decimal Places',
      'aclAllowDeleteCreated' => 'Povolit odebrání vytvořených záznamů',
      'adminNotifications' => 'Systémová oznámení v administračním panelu',
      'adminNotificationsNewVersion' => 'Zobrazit oznámení, až bude k dispozici nová verze CRM',
      'adminNotificationsNewExtensionVersion' => 'Zobrazit oznámení, když jsou k dispozici nové verze rozšíření',
      'textFilterUseContainsForVarchar' => 'Při filtrování polí varchar použijte operátor „contains“',
      'phoneNumberNumericSearch' => 'Numeric phone number search',
      'phoneNumberInternational' => 'International phone numbers',
      'phoneNumberPreferredCountryList' => 'Preferred telephone country codes',
      'authTokenPreventConcurrent' => 'Pouze jeden ověřovací token na uživatele',
      'scopeColorsDisabled' => 'Zakázat barvy rozsahu',
      'tabColorsDisabled' => 'Zakázat barvy záložek',
      'tabIconsDisabled' => 'Zakázat ikony na kartě',
      'emailAddressIsOptedOutByDefault' => 'Označit nové emailové adresy jako odhlášené',
      'outboundEmailBccAddress' => 'Adresa BCC pro externí klienty',
      'cleanupDeletedRecords' => 'Vyčistit smazané záznamy',
      'addressCountryList' => 'Address Country Autocomplete List',
      'addressCityList' => 'Address City Autocomplete List',
      'addressStateList' => 'Address State Autocomplete List',
      'fiscalYearShift' => 'Začátek fiskálního roku',
      'jobRunInParallel' => 'Úlohy běží paralelně',
      'jobMaxPortion' => 'Maximální velikost části úloh',
      'jobPoolConcurrencyNumber' => 'Číslo souběhu úloh',
      'daemonInterval' => 'Daemon Interval',
      'daemonMaxProcessNumber' => 'Daemon Max Process Number',
      'daemonProcessTimeout' => 'Daemon Process Timeout',
      'cronDisabled' => 'Zakázat Cron',
      'maintenanceMode' => 'Režim údržby',
      'useWebSocket' => 'Use WebSocket',
      'passwordRecoveryDisabled' => 'Zakázat obnovení hesla',
      'passwordRecoveryForAdminDisabled' => 'Zakázat obnovení hesla pro uživatele správce',
      'passwordRecoveryForInternalUsersDisabled' => 'Zakázat obnovení hesla pro uživatele',
      'passwordRecoveryNoExposure' => 'Zabraňte vystavení emailové adresy ve formuláři pro obnovení hesla',
      'passwordGenerateLength' => 'Délka vygenerovaných hesel',
      'passwordStrengthLength' => 'Minimální délka hesla',
      'passwordStrengthLetterCount' => 'Počet písmen požadovaných v hesle',
      'passwordStrengthNumberCount' => 'Počet číslic požadovaných v hesle',
      'passwordStrengthBothCases' => 'Zabraňte vystavení e-mailové adresy ve formuláři pro obnovení hesla',
      'auth2FA' => 'Povolit dvoufaktorové ověřování',
      'auth2FAForced' => 'Přimět uživatele k nastavení dvoufaktorové autorizace',
      'auth2FAMethodList' => 'Dostupné metody dvoufaktorové autorizace',
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
      'addressCountryAsEnum' => 'Země adresy jako výběr',
      'aresEnabled' => 'Povolit ARES',
      'defaultDetailLayout' => 'Výchozí rozložení detailu',
      'defaultIsWide' => 'Široké výchozí rozložení detailu',
      'disableIntroductoryGuide' => 'Vypnout průvodce',
      'editEntityEnabled' => 'Povolit rychlou editaci entit',
      'editFiltersEnabled' => 'Povolit rychlou editaci filtrů',
      'editLabelsEnabled' => 'Povolit rychlou editaci labelů',
      'editLayoutEnabled' => 'Povolit rychlou editaci layoutu',
      'refreshEntityEnabled' => 'Povolit rychlou obnovu entit',
      'emailCheckInterval' => 'Interval kontroly emailu',
      'finstatEnabled' => 'Povolit FinStat',
      'isWide' => 'Široké rozložení detailu',
      'link' => 'Odkaz',
      'notificationsCheckInterval' => 'Interval kontroly upozornění',
      'viesEnabled' => 'Povolit VIES verifikaci',
      'recurrenceBatchSizeLimit' => 'Maximální velikost jedné dávky',
      'showListScheduledRecurrencesButton' => 'Zobrazit tlačítko Naplánované opakování',
      'warehouseRevertGoodsInSalesOrder' => 'Sklad pro vrácení zboží',
      'humanResourceApprovalRole' => 'Role pro schvalování žádostí o dovolenou',
      'humanResourceApprovalTeam' => 'Tým přiřazovaný ke schváleným dovoleným',
      'warehouseGroupByFieldList' => 'Seskupovat položky na základě',
      'updateProductCostPriceWithAveragePrice' => 'Průběžně aktualizovat nákupní cenu průměrnou prodejní cenou',
      'warehouseListToSaveValueOf' => 'Ukládat hodnotu u těchto skladů',
      'companyName' => 'Název společnosti / Jméno a příjmení',
      'companyBillingAddress' => 'Fakturační adresa',
      'companyShippingAddress' => 'Doručovací adresa',
      'companySicCode' => 'IČO',
      'companyVatId' => 'DIČ',
      'companyEmail' => 'Email',
      'companyWebsite' => 'Web',
      'companyPhoneNumber' => 'Telefon',
      'companyBankAccount' => 'Číslo bankovního účtu',
      'companyIban' => 'IBAN',
      'companyVatPayer' => 'Plátce DPH',
      'companyRegisteredIn' => 'Zapsáno v',
      'supplierName' => 'Název / Jméno a příjmení',
      'supplierAddress' => 'Adresa',
      'supplierSicCode' => 'IČO',
      'supplierVatId' => 'DIČ',
      'supplierVATpayer' => 'Plátce DPH',
      'supplierEmail' => 'Email',
      'supplierPhone' => 'Telefon',
      'supplierWebsite' => 'Web',
      'accountNumber' => 'Číslo účtu',
      'iban' => 'IBAN',
      'swift' => 'SWIFT/BIC',
      'invoicePrefix' => 'Vydané faktury',
      'invoiceYearNumberFormat' => 'Formát čísla roku',
      'invoiceNumberOfMonth' => 'Číslo měsíce',
      'invoicePerYear' => 'Počet faktur ročně / měsíčně',
      'invoiceDelimiter' => 'Oddělovník',
      'invoiceNumberPreview' => 'Náhled čísla faktur',
      'proformaInvoicePrefix' => 'Vydané zálohové faktury',
      'issuedTaxDocumentPrefix' => 'Daňové doklady k přijatým platbám',
      'creditNotePrefix' => 'Opravné daňové doklady',
      'supplierInvoicePrefix' => 'Přijaté faktury',
      'receivedProformaPrefix' => 'Received proforma invoices',
      'receivedTaxDocumentPrefix' => 'Přijaté daňové doklady k přijatým platbám',
      'revenueReceiptPrefix' => 'Příjmové doklady',
      'expenseReceiptPrefix' => 'Výdejní doklady',
      'customInvoiceNames' => 'Vlastní názvy faktur',
      'disableExport' => 'Zakázat export (povolenou pouze adminovi)',
      'disableAvatars' => 'Zakázat avatary',
      'areaUnitList' => 'Seznam jednotek plochy',
      'editNavbarEnabled' => 'Povolit rychlou editaci záložek navigačního panelu',
      'lengthUnitList' => 'Seznam jednotek délky',
      'timeUnitList' => 'Seznam jednotek času',
      'reclamationDefaultWarehouse' => 'Výchozí sklad pro reklamace',
      'warehouseRunningOutMultiplier' => 'Násobek pro upozornění na nedostatek zásob',
      'receivedProformaInvoicePrefix' => 'Přijaté zálohové faktury'
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
        'Post' => 'Příspěvky',
        'Status' => 'Aktualizace stavu',
        'EmailReceived' => 'Příchozí emaily'
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
        'CZ' => 'Česká republika',
        'DE' => 'Německo',
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
        'PL' => 'Polsko',
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
        'SK' => 'Slovensko',
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
        'record' => 'Výchozí',
        'tab' => 'Záložky'
      ],
      'supplierVATpayer' => [
        'Non VAT payer' => 'Neplátce DPH',
        'Identified person' => 'Identifikovaná osoba',
        'VAT payer' => 'Plátce DPH'
      ],
      'invoiceNumberOfMonth' => [
        'no' => 'Ne',
        'yes' => 'Ano'
      ],
      'invoiceDelimiter' => [
        '-' => '-',
        'none' => 'Žádný'
      ],
      'weekStart' => [
        0 => 'Neděle',
        1 => 'Pondělí'
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
      'passwordRecoveryForInternalUsersDisabled' => 'Obnovit heslo budou moci pouze uživatelé portálu.',
      'passwordRecoveryNoExposure' => 'Nebude možné určit, zda je v systému zaregistrována konkrétní e-mailová adresa.',
      'emailAddressLookupEntityTypeList' => 'Pro automatické vyplňování emailových adres.',
      'emailNotificationsDelay' => 'Zprávu lze upravit ve stanoveném časovém rámci před odesláním oznámení.',
      'outboundEmailFromAddress' => 'Systémová emailová adresa.',
      'smtpServer' => 'Pokud je prázdný, použije se skupinový emailový účet s odpovídající e-mailovou adresou.',
      'busyRangesEntityList' => 'Co se bude brát v úvahu při zobrazování časových období zaneprázdnění v plánovači a časové ose.',
      'massEmailVerp' => 'Variabilní zpětná cesta obálky. Pro lepší zpracování odražených zpráv. Ujistěte se, že to váš poskytovatel SMTP podporuje.',
      'recordsPerPage' => 'Počet záznamů původně zobrazených v zobrazení seznamu.',
      'recordsPerPageSmall' => 'Počet záznamů v panelu vztahů.',
      'recordsPerPageSelect' => 'Number of records initially displayed when selecting records.',
      'recordsPerPageKanban' => 'Number of records initially displayed in kanban columns.',
      'outboundEmailIsShared' => 'Povolit posílání emailů uživatelům pomocí SMTP.',
      'followCreatedEntities' => 'Pokud uživatel vytvoří záznam, bude jej sledovat automaticky.',
      'emailMessageMaxSize' => 'Všechny příchozí emaily přesahující stanovenou velikost budou načteny bez těla a příloh.',
      'authTokenLifetime' => 'Definuje, jak dlouho mohou existovat tokeny. \\ N0 - znamená žádné vypršení platnosti.',
      'authTokenMaxIdleTime' => 'Definuje, jak dlouho mohou existovat poslední přístupové tokeny. \\ N0 - znamená žádné vypršení platnosti.',
      'userThemesDisabled' => 'Pokud je zaškrtnuto, uživatelé nebudou moci vybrat jiné téma.',
      'ldapUsername' => 'Úplné uživatelské jméno systému, které umožňuje vyhledávat další uživatele. Např. "CN = uživatel systému LDAP, OU = uživatelé, OU = espocrm, DC = test, DC = lan".',
      'ldapPassword' => 'Heslo pro přístup k serveru LDAP.',
      'ldapAuth' => 'Přístup k pověření serveru LDAP.',
      'ldapUserNameAttribute' => 'Atribut k identifikaci uživatele. \\ n Např. „userPrincipalName“ nebo „sAMAccountName“ pro Active Directory, „uid“ pro OpenLDAP.',
      'ldapUserObjectClass' => 'Atribut ObjectClass pro vyhledávání uživatelů. Např. „osoba“ pro AD, „inetOrgPerson“ pro OpenLDAP.',
      'ldapAccountCanonicalForm' => 'Typ kanonického formuláře vašeho účtu. K dispozici jsou 4 možnosti: \\ n- „Dn“ - formulář ve formátu „CN = tester, OU = espocrm, DC = test, DC = lan“. - „Uživatelské jméno“ - formulář „tester“ .- „Zpětné lomítko“ - formulář „SPOLEČNOST \\ tester“. - „Principal“ - formulář „tester@company.com“.',
      'ldapBindRequiresDn' => 'Možnost formátovat uživatelské jméno ve formuláři DN.',
      'ldapBaseDn' => 'Výchozí základní DN používané pro vyhledávání uživatelů. Např. "OU = uživatelé, OU = espocrm, DC = test, DC = lan".',
      'ldapTryUsernameSplit' => 'Možnost rozdělit uživatelské jméno na doménu.',
      'ldapOptReferrals' => 'pokud by měla být sledována doporučení klientovi LDAP.',
      'ldapPortalUserLdapAuth' => 'Umožněte uživatelům portálu používat autentizaci LDAP namísto autentizace Auto.',
      'ldapCreateEspoUser' => 'Tato možnost umožňuje AutoCRM vytvořit uživatele z LDAP.',
      'ldapUserFirstNameAttribute' => 'Atribut LDAP, který se používá k určení křestního jména uživatele. Např. "křestní jméno".',
      'ldapUserLastNameAttribute' => 'Atribut LDAP, který se používá k určení příjmení uživatele. Např. "sn".',
      'ldapUserTitleAttribute' => 'LDAP attribute which is used to determine the user title. E.g. "title".',
      'ldapUserEmailAddressAttribute' => 'Atribut LDAP, který se používá k určení e-mailové adresy uživatele. Např. "pošta".',
      'ldapUserPhoneNumberAttribute' => 'LDAP attribute which is used to determine the user phone number. E.g. "telephoneNumber".',
      'ldapUserLoginFilter' => 'Filtr, který umožňuje omezit uživatele, kteří mohou používat AutoCRM. Např. "memberOf = CN = espoGroup, OU = groups, OU = espocrm, DC = test, DC = lan".',
      'ldapAccountDomainName' => 'Doména, která se používá k autorizaci k serveru LDAP.',
      'ldapAccountDomainNameShort' => 'Krátká doména, která se používá k autorizaci k serveru LDAP.',
      'ldapUserTeams' => 'Teams for created user. For more, see user profile.',
      'ldapUserDefaultTeam' => 'Výchozí tým pro vytvořeného uživatele. Další informace najdete v uživatelském profilu.',
      'ldapPortalUserPortals' => 'Výchozí portály pro vytvořeného uživatele portálu',
      'ldapPortalUserRoles' => 'Výchozí role pro vytvořeného uživatele portálu',
      'b2cMode' => 'Ve výchozím nastavení je AutoCRM přizpůsoben pro B2B. Můžete jej přepnout na B2C.',
      'currencyDecimalPlaces' => 'Počet desetinných míst. Pokud jsou prázdné, zobrazí se všechna neprázdná desetinná místa.',
      'aclStrictMode' => 'Povoleno: Přístup k rozsahům bude zakázán, pokud není uveden v rolích. \\ NZakázán: Přístup k rozsahům bude povolen, pokud není uveden v rolích.',
      'aclAllowDeleteCreated' => 'Uživatelé budou moci odebrat záznamy, které vytvořili, i když nemají přístup k odstranění.',
      'textFilterUseContainsForVarchar' => 'Pokud není zaškrtnuto, použije se operátor „začíná na“. Můžete použít zástupný znak \'%\'.',
      'streamEmailNotificationsEntityList' => 'Emailová upozornění na aktualizace streamu sledovaných záznamů. Uživatelé budou dostávat e-mailová oznámení pouze pro určené typy entit.',
      'authTokenPreventConcurrent' => 'Uživatelé nebudou moci být přihlášeni na více zařízeních současně.',
      'emailAddressIsOptedOutByDefault' => 'Při vytváření nového záznamu bude emailová adresa označena jako odhlášena.',
      'cleanupDeletedRecords' => 'Odebrané záznamy budou po chvíli z databáze odstraněny.',
      'jobRunInParallel' => 'Úlohy budou prováděny paralelně.',
      'jobPoolConcurrencyNumber' => 'Maximální počet procesů spuštěných současně.',
      'jobMaxPortion' => 'Maximální počet zpracovaných úloh na jedno provedení.',
      'daemonInterval' => 'Interval between process cron runs in seconds.',
      'daemonMaxProcessNumber' => 'Maximální počet procesů cron běžících současně.',
      'daemonProcessTimeout' => 'Maximální doba provedení (v sekundách) přidělená jednomu procesu cron.',
      'cronDisabled' => 'Cron se nespustí.',
      'maintenanceMode' => 'Do systému budou mít přístup pouze správci.',
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
      'aresEnabled' => 'Povolit vyplňování detailů organizací z ARESu.',
      'defaultIsWide' => 'V širokém zobrazení je postranní panel přesunut do spodní části.',
      'disableIntroductoryGuide' => 'Zakázat průvodce s nápovědou při prvním otevření stránek.',
      'editEntityEnabled' => 'Přidat tlačítko Upravit entitu v pravém horním rohu.',
      'editFiltersEnabled' => 'Přidat tlačítko Upravit filtry v pravém horním rohu.',
      'editLabelsEnabled' => 'Přidat tlačítko Upravit labely v pravém horním rohu.',
      'refreshEntityEnabled' => 'Přidat tlačítko Obnovit entitu v pravém horním rohu.',
      'editLayoutEnabled' => 'Přidat tlačítko Upravit layout v pravém horním rohu.',
      'editNavbarEnabled' => 'Add "Edit Navbar" button to the bottom of the navbar.',
      'emailCheckInterval' => 'Interval kontroly nových emailu v sekundách.',
      'finstatEnabled' => 'Povolit vyplňování detailů organizací z FinStatu.',
      'isWide' => 'V širokém zobrazení je postranní panel přesunut do spodní části.',
      'notificationsCheckInterval' => 'Interval kontroly nových upozornění v sekundách.',
      'viesEnabled' => 'Přidat možnost kontroly DIČ u podporovaných entit.',
      'recurrenceBatchSizeLimit' => 'Maximální počet záznamů, které se zpracovávají v jedné dávce. Větší počet záznamů může zapříčinit nesprávné chování serveru.',
      'showListScheduledRecurrencesButton' => 'Zobrazit tlačítko Naplánované opakování v seznamech u entit s naplánovanými opakovanými záznamy.',
      'warehouseRevertGoodsInSalesOrder' => 'Určuje sklad, na který se zboží bude vracet z prodejní objednávky, pokud se objednávka změní/zruší a zboží se má naskladnit zpět do skladu.'
    ],
    'labels' => [
      'Group Tab' => 'Group Tab',
      'Divider' => 'Divider',
      'System' => 'Systém',
      'Locale' => 'Lokalizace',
      'Search' => 'Vyhledat',
      'Misc' => 'Misc',
      'SMTP' => 'SMTP',
      'General' => 'General',
      'Phone Numbers' => 'Phone Numbers',
      'Navbar' => 'Navbar',
      'Dashboard' => 'Dashboard',
      'Configuration' => 'Konfigurace',
      'In-app Notifications' => 'In-app notifikace',
      'Email Notifications' => 'Email notifikace',
      'Currency Settings' => 'Nastavení měn',
      'Currency Rates' => 'Kurzy měn',
      'Mass Email' => 'Hromadný email',
      'Test Connection' => 'Test připojení',
      'Connecting' => 'Připojování...',
      'Activities' => 'Aktivity',
      'Admin Notifications' => 'Oznámení správce',
      'Passwords' => 'Hesla',
      '2-Factor Authentication' => 'Dvoufaktorové ověřování',
      'Attachments' => 'Attachments',
      'IdP Group' => 'IdP Group',
      'Autocrm' => 'AutoCRM',
      'Custom Link' => 'Vlastní odkaz',
      'Record Recurrence' => 'Opakování záznamu',
      'Company information' => 'Informace o společnosti',
      'Others' => 'Ostatní',
      'Billing information' => 'Fakturační údaje',
      'Contact information' => 'Kontaktní informace',
      'Bank account' => 'Bankovní účet',
      'Number series of invoices' => 'Číselná řada faktur',
      'Invoice prefixes' => 'Prefixy faktur'
    ],
    'messages' => [
      'ldapTestConnection' => 'Připojení bylo úspěšně navázáno.'
    ],
    'label' => [
      'HumanResources Settings' => 'Nastavení HR modulu'
    ]
  ],
  'Stream' => [
    'messages' => [
      'infoMention' => 'Zadejte ** @ uživatelské jméno ** a uveďte uživatele v příspěvku.',
      'infoSyntax' => 'K dispozici syntaxe markdown',
      'couldNotAddFollowerUserHasNoAccessToStream' => 'Could not add the user \'{userName}\' to the followers. The user does not have \'stream\' access to the record.'
    ],
    'syntaxItems' => [
      'code' => 'kód',
      'multilineCode' => 'víceřádkový kód',
      'strongText' => 'strong text',
      'emphasizedText' => 'zvýrazněný text',
      'deletedText' => 'smazaný text',
      'blockquote' => 'blockquote',
      'link' => 'odkaz'
    ]
  ],
  'Team' => [
    'fields' => [
      'name' => 'Jméno',
      'roles' => 'Role',
      'layoutSet' => 'Nastavení vzhledu',
      'workingTimeCalendar' => 'Working Time Calendar',
      'positionList' => 'Seznam pozic',
      'userRole' => 'Uživatelská role'
    ],
    'links' => [
      'users' => 'Uživatelé',
      'notes' => 'Poznámky',
      'roles' => 'Role',
      'layoutSet' => 'Nastavení vzhledu',
      'workingTimeCalendar' => 'Working Time Calendar',
      'inboundEmails' => 'Skupinové e-mailové účty',
      'groupEmailFolders' => 'Group Email Folders'
    ],
    'tooltips' => [
      'workingTimeCalendar' => 'A calendar will be applied to users who have this team set as a Default Team.',
      'layoutSet' => 'Poskytuje možnost mít rozložení, která se liší od standardních. Sada rozložení bude použita pro uživatele, kteří mají tento tým nastavený jako Výchozí tým.',
      'roles' => 'Přístupové role. Uživatelé tohoto týmu získávají úroveň řízení přístupu z vybraných rolí.',
      'positionList' => 'Dostupné pozice v tomto týmu. Např. Prodavač, manažer.'
    ],
    'labels' => [
      'Create Team' => 'Vytvořit tým'
    ]
  ],
  'Template' => [
    'fields' => [
      'name' => 'Název',
      'body' => 'Tělo',
      'entityType' => 'Typ entity',
      'header' => 'Záhlaví',
      'footer' => 'Zápatí',
      'leftMargin' => 'Levý okraj',
      'topMargin' => 'Horní okraj',
      'rightMargin' => 'Pravý okraj',
      'bottomMargin' => 'Spodní okraj',
      'printFooter' => 'Tisk zápatí',
      'printHeader' => 'Tisknout záhlaví na každé stránce',
      'footerPosition' => 'Pozice zápatí',
      'headerPosition' => 'Pozice záhlaví',
      'variables' => 'Dostupné zástupné symboly',
      'pageOrientation' => 'Orientace stránky',
      'pageFormat' => 'Formát papíru',
      'pageWidth' => 'Šířka stránky (mm)',
      'pageHeight' => 'Výška stránky (mm)',
      'fontFace' => 'Font',
      'title' => 'Title',
      'type' => 'Typ editoru',
      'coverPage' => 'Titulní strana',
      'printCoverPage' => 'Tisknout titulní stranu',
      'disableDefaultTemplate' => 'Zakázat výchozí šablonu (úprava čistého HTML)'
    ],
    'links' => [],
    'labels' => [
      'Create Template' => 'Vytvořit šablonu',
      'Default' => 'Výchozí editor',
      'Ace' => 'Ace editor',
      'Raw' => 'Čistý editor'
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
        'Default' => 'Výchozí editor',
        'Raw' => 'Čistý editor'
      ]
    ],
    'tooltips' => [
      'footer' => 'K vytištění čísla stránky použijte {pageNumber}.',
      'variables' => 'Zkopírujte a vložte potřebný zástupný symbol do záhlaví, těla nebo zápatí.',
      'headerPosition' => 'Nemá žádny vliv při použití PDF enginu Puppeteer. Místo toho použijte stylování pro pozicování záhlaví.',
      'footerPosition' => 'Nemá žádny vliv při použití PDF enginu Puppeteer. Místo toho použijte stylování pro pozicování zápatí.'
    ],
    'messages' => [
      'Default' => 'Uživatelsky přívětivý WYSIWYG editor, poskytuje základní funkce jako formátování textu, vkladání obrázků, odkazů, tabulek a dalších prvků.',
      'Ace' => 'Pokročilý editor, který poskytuje funkce jako zvýrazňování syntaxe, automatické dokončování kódu, zobrazení chyb a další. Určený pro developery.',
      'Raw' => 'Editor, bez jakéhokoliv formátování, pouze čistý text. Určený pro pokročilé uživatele.'
    ]
  ],
  'User' => [
    'fields' => [
      'name' => 'Jméno',
      'userName' => 'Uživatelské jméno',
      'title' => 'Titul',
      'type' => 'Typ',
      'isAdmin' => 'Je admin',
      'defaultTeam' => 'Výchozí tým',
      'emailAddress' => 'Email',
      'phoneNumber' => 'Telefon',
      'roles' => 'Role',
      'portals' => 'Portály',
      'portalRoles' => 'Role portálu',
      'teamRole' => 'Pozice',
      'password' => 'Heslo',
      'currentPassword' => 'Aktuální heslo',
      'passwordConfirm' => 'Potvrzení hesla',
      'newPassword' => 'Nové heslo',
      'newPasswordConfirm' => 'Potvrzení nového hesla',
      'yourPassword' => 'Vaše aktuální heslo',
      'avatar' => 'Avatar',
      'isActive' => 'Je aktivní',
      'isPortalUser' => 'Je uživatel portálu',
      'contact' => 'Kontakt',
      'accounts' => 'Accounts',
      'account' => 'Account (Primary)',
      'sendAccessInfo' => 'Poslat e-mail s přístupovými informacemi uživateli',
      'portal' => 'Portál',
      'gender' => 'Pohlaví',
      'position' => 'Pozice v týmu',
      'ipAddress' => 'IP Adresa',
      'passwordPreview' => 'Password Preview',
      'isSuperAdmin' => 'Is Super Admin',
      'lastAccess' => 'Poslední přístup',
      'apiKey' => 'API Key',
      'secretKey' => 'Soukromý klíč',
      'dashboardTemplate' => 'Dashboard šablona',
      'workingTimeCalendar' => 'Working Time Calendar',
      'auth2FA' => '2FA',
      'authMethod' => 'Authentication Method',
      'auth2FAEnable' => 'Enable 2-Factor Authentication',
      'auth2FAMethod' => '2FA Method',
      'auth2FATotpSecret' => '2FA TOTP Secret',
      'layoutSet' => 'Layout Set',
      'acceptanceStatus' => 'Stav přijetí',
      'acceptanceStatusMeetings' => 'Stav přijetí (Schůzky)',
      'acceptanceStatusCalls' => 'Stav přijetí (Volání)',
      'humanResource' => 'HR',
      'mattermostToken' => 'MattermostToken',
      'mattermostSyncEnabled' => 'Synchronizovat s Mattermost',
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
      'isInvisible' => 'IsInvisible'
    ],
    'links' => [
      'defaultTeam' => 'Výchozí tým',
      'teams' => 'Týmy',
      'roles' => 'Role',
      'notes' => 'Poznámky',
      'portals' => 'Portály',
      'portalRoles' => 'Role portálu',
      'contact' => 'Kontakt',
      'accounts' => 'Accounts',
      'account' => 'Account (Primary)',
      'tasks' => 'Úkoly',
      'userData' => 'Data uživatele',
      'dashboardTemplate' => 'Dashboard šabkiba',
      'workingTimeCalendar' => 'Working Time Calendar',
      'workingTimeRanges' => 'Working Time Ranges',
      'layoutSet' => 'Layout Set',
      'targetLists' => 'Cílové seznamy',
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
      'preferences' => 'Předvolby',
      'timeOnSalesOrder' => 'Čas na zakázce'
    ],
    'labels' => [
      'Create User' => 'Vytvořit uživatele',
      'Generate' => 'Generovat',
      'Access' => 'Přístup',
      'Preferences' => 'Předvolby',
      'Change Password' => 'Změnit heslo',
      'Teams and Access Control' => 'Týmy a kontrola přístupu',
      'Forgot Password?' => 'Zapomenuté heslo?',
      'Password Change Request' => 'Požadavek na změnu hesla',
      'Email Address' => 'Emailová adresa',
      'External Accounts' => 'Externí účty',
      'Email Accounts' => 'Emailové účty',
      'Portal' => 'Portál',
      'Create Portal User' => 'Vytvořit uživatele portálu',
      'Proceed w/o Contact' => 'Proceed w/o Contact',
      'Generate New API Key' => 'Generovat nový API klíč',
      'Generate New Password' => 'Generovat nové heslo',
      'Send Password Change Link' => 'Send Password Change Link',
      'Back to login form' => 'Zpět na přihlašovací formulář',
      'Requirements' => 'Požadavky',
      'Security' => 'Security',
      'Reset 2FA' => 'Reset 2FA',
      'Code' => 'Code',
      'Secret' => 'Secret',
      'Send Code' => 'Send Code',
      'Login Link' => 'Login Link',
      'Create HR' => 'Vytvořit HR'
    ],
    'tooltips' => [
      'defaultTeam' => 'Všechny záznamy vytvořené tímto uživatelem budou ve výchozím nastavení souviset s tímto týmem.',
      'userName' => 'Písmena a-z, čísla 0-9 a podtržítka jsou povolena.',
      'isAdmin' => 'Správce má přístup ke všemu.',
      'isActive' => 'Pokud není zaškrtnuto, uživatel se nebude moci přihlásit.',
      'teams' => 'Týmy, do kterých tento uživatel patří. Úroveň řízení přístupu se dědí z rolí týmu.',
      'roles' => 'Další přístupové role. Použijte jej, pokud uživatel nepatří do žádného týmu nebo potřebujete rozšířit úroveň řízení přístupu pouze pro tohoto uživatele.',
      'portalRoles' => 'Další role portálu. Použijte jej k rozšíření úrovně řízení přístupu výhradně pro tohoto uživatele.',
      'portals' => 'Portály, ke kterým má tento uživatel přístup.',
      'layoutSet' => 'Layouts from a specified set will be applied for the user instead of default ones.',
      'mattermostSyncEnabled' => 'Synchronizovat uživatele s Mattermost. (Funguje, pokud je povolena a nakonfigurována Mattermost integrace)'
    ],
    'messages' => [
      '2faMethodNotConfigured' => 'The 2FA method is not fully configured in the system.',
      'loginAs' => 'Open the login link in an incognito window to preserve your current session. Use your admin credentials to log in.',
      'sendPasswordChangeLinkConfirmation' => 'An email with a unique link will be sent to the user allowing them to change their password. The link will expire after a specific amount of time.',
      'passwordRecoverySentIfMatched' => 'Za předpokladu, že se zadané údaje shodovaly s jakýmkoli uživatelským účtem.',
      'passwordStrengthLength' => 'Musí mít alespoň {délku} znaků.',
      'passwordStrengthLetterCount' => 'Musí obsahovat alespoň {count} písmen.',
      'passwordStrengthNumberCount' => 'Musí obsahovat alespoň {počet} číslic.',
      'passwordStrengthBothCases' => 'Musí obsahovat velká i malá písmena.',
      'passwordWillBeSent' => 'Heslo bude posláno na emailovou adresu uživatele.',
      'passwordChanged' => 'Heslo bylo změněno',
      'userCantBeEmpty' => 'Uživatelské jméno nemůže být prázdné',
      'wrongUsernamePassword' => 'Nesprávné uživatelské jmén/heslo',
      'failedToLogIn' => 'Failed to log in',
      'emailAddressCantBeEmpty' => 'Emailová adresa nemůže zůstat prázdná',
      'userNameEmailAddressNotFound' => 'Uživatelské jméno/heslo nebylo nalezeno',
      'forbidden' => 'Tato operace není povolena, prosím zkuste to později',
      'uniqueLinkHasBeenSent' => 'Unikátní link byl poslán na zadanou emailovou adresu.',
      'passwordChangedByRequest' => 'Heslo bylo změněo.',
      'setupSmtpBefore' => 'Abyste mohli systému odesílat heslo e-mailem, musíte nastavit [nastavení SMTP] ({url}).',
      'userNameExists' => 'Uživatelské jméno již existuje',
      'loginError' => 'Error occurred',
      'wrongCode' => 'Špatný kód',
      'codeIsRequired' => 'Je vyžadován kód',
      'yourAuthenticationCode' => 'Your authentication code: {code}.',
      'choose2FaSmsPhoneNumber' => 'Select a phone number that will be used for 2FA.',
      'choose2FaEmailAddress' => 'Select an email address that will be used for 2FA. It\'s highly recommended to use a non-primary email address.',
      'enterCodeSentInEmail' => 'Enter the code sent to your email address.',
      'enterCodeSentBySms' => 'Enter the code sent by SMS to your phone number.',
      'enterTotpCode' => 'Zadejte kód z aplikace ověřovatele.',
      'verifyTotpCode' => 'Naskenujte QR kód pomocí aplikace pro mobilní autentizaci. Pokud máte potíže se skenováním, můžete toto tajemství zadat ručně. Poté se ve vaší aplikaci zobrazí šestimístný kód. Zadejte tento kód do pole níže.',
      'generateAndSendNewPassword' => 'Bude vygenerováno nové heslo a odesláno na e-mailovou adresu uživatele.',
      'security2FaResetConfirmation' => 'Are you sure you want to reset the current 2FA settings?',
      'auth2FARequiredHeader' => 'Vyžaduje se dvoufaktorové ověření',
      'auth2FARequired' => 'Musíte nastavit dvoufaktorové ověřování. Na svém mobilním telefonu použijte aplikaci ověřovatele (např. Google Authenticator)',
      'ldapUserInEspoNotFound' => 'Uživatel nebyl nalezen v CRM. Požádejte správce o vytvoření uživatele.',
      'passwordChangeRequestNotFound' => 'The password change request is not found. It might be expired. Try to initiate a new password recovery from the [login page]({url}).',
      'security2FaResetConfimation' => 'Opravdu chcete obnovit aktuální nastavení 2FA?'
    ],
    'options' => [
      'gender' => [
        '' => 'Not Set',
        'Male' => 'Muž',
        'Female' => 'Žena',
        'Neutral' => 'Neutrální'
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
      'onlyMyTeam' => 'Pouze můj tým'
    ],
    'presetFilters' => [
      'active' => 'Aktivní',
      'activePortal' => 'Portal Active',
      'activeApi' => 'API Active'
    ]
  ],
  'Webhook' => [
    'labels' => [
      'Create Webhook' => 'Vytvořit Webhook'
    ],
    'fields' => [
      'event' => 'Událost',
      'url' => 'URL',
      'isActive' => 'Je aktivní',
      'user' => 'API Uživatel',
      'entityType' => 'Typ entity',
      'field' => 'Pole',
      'secretKey' => 'Soukromý klíč'
    ],
    'links' => [
      'user' => 'Uživatel'
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
      'name' => 'Název',
      'emailAddress' => 'Email',
      'website' => 'Web',
      'phoneNumber' => 'Telefon',
      'billingAddress' => 'Fakturační adresa',
      'shippingAddress' => 'Doručovací adresa',
      'description' => 'Popis',
      'sicCode' => 'IČ',
      'industry' => 'Průmysl',
      'type' => 'Typ',
      'contactRole' => 'Pozice',
      'contactIsInactive' => 'Je neaktivní',
      'campaign' => 'Kampaň',
      'targetLists' => 'Cílové seznamy',
      'targetList' => 'Cílový seznam',
      'originalLead' => 'Původní Lead',
      'vatId' => 'DIČ',
      'slovakVatId' => 'IČ DPH',
      'defaultInvoiceDueDate' => 'Výchozí splatnost faktur (ve dnech)',
      'processed' => 'Pohoda Import',
      'accountParent' => 'Account Parent',
      'accounts' => 'Accounts',
      'businessProject' => 'Zakázka',
      'businessProjects' => 'Zakázky',
      'businessProjects1' => 'Zakázka',
      'camerasystem' => 'Camera system',
      'category' => 'Kategorie',
      'defaultPriceList' => 'Price List',
      'dic' => 'DIČ',
      'document' => 'Document',
      'documents1' => 'Documents1',
      'enduser' => 'End-user',
      'firstname' => 'Jméno',
      'idph' => 'IČ DPH',
      'iscustomer' => 'Je odběratel',
      'issupplier' => 'Dodavatel',
      'kontakt' => 'Contacts',
      'language' => 'Jazyk',
      'lastname' => 'Příjmení',
      'logTimes' => 'Odpracováno',
      'opportunities1' => 'Poptávka',
      'orderItems' => 'Položky objednávky',
      'orders' => 'Objednávky',
      'partner' => 'Partner',
      'priceType' => 'Cena',
      'qualityReports' => '8D Report',
      'rtls' => 'RTLS',
      'shield' => 'Shield',
      'spolecnosti' => 'Společnosti',
      'vizualization' => 'Vizualization',
      'web' => 'Web',
      'webs' => 'Weby',
      'productDatabases' => 'Databáze produktů',
      'complaintBook' => 'Complaint Book',
      'warehouses' => 'Warehouses',
      'priceLists' => 'Ceníky',
      'billingAddressMap' => 'Mapa',
      'changeIco' => 'Stáhnout z ARESu',
      'invoices' => 'Faktury',
      'opportunities' => 'Příležitosti',
      'shippingAddressMap' => 'Mapa (doručovací)',
      'quotes' => 'Nabídky',
      'salesOrders' => 'Zakázky'
    ],
    'links' => [
      'contacts' => 'Kontakty',
      'contactsPrimary' => 'Contacts (primary)',
      'opportunities' => 'Příležitosti',
      'cases' => 'Případy',
      'documents' => 'Dokumenty',
      'meetingsPrimary' => 'Schůzky (rozšířené)',
      'callsPrimary' => 'Volání (rozšířené)',
      'tasksPrimary' => 'Úkoly (rozšířené)',
      'emailsPrimary' => 'Emaily (rozšířené)',
      'targetLists' => 'Cílové seznamy',
      'campaignLogRecords' => 'Log kampaně',
      'campaign' => 'Kampaň',
      'portalUsers' => 'Uživatelé portálu',
      'originalLead' => 'Originální Lead',
      'accountParent' => 'Account Parent',
      'accounts' => 'Accounts',
      'businessProject' => 'Zakázka',
      'businessProjects' => 'Zakázky',
      'businessProjects1' => 'Zakázka',
      'businessProjectsOgranization' => 'Zakázky',
      'document' => 'Document',
      'documents1' => 'Documents1',
      'kontakt' => 'Contacts',
      'logTimes' => 'Odpracováno',
      'opportunities1' => 'Poptávka',
      'orderItems' => 'Položky objednávky',
      'orders' => 'Objednávky',
      'productsSupplier' => 'Produkty',
      'qualityReports' => '8D Report',
      'supplier' => 'Dodavatel',
      'web' => 'Web',
      'webs' => 'Weby',
      'productDatabases' => 'Databáze produktů',
      'complaintBook' => 'Complaint Book',
      'warehouses' => 'Warehouses',
      'priceLists' => 'Ceníky',
      'invoiceItems' => 'Položky faktury',
      'invoices' => 'Faktury',
      'quoteItems' => 'Položky nabídky',
      'salesOrderItems' => 'Položky Proforma faktury',
      'salesOrders' => 'Zakázky',
      'quotes' => 'Nabídky'
    ],
    'options' => [
      'type' => [
        'Customer' => 'Zákazník',
        'Investor' => 'Investor',
        'Partner' => 'Partner',
        'Reseller' => 'Prodejce'
      ],
      'industry' => [
        'Aerospace' => 'Letectví a kosmonautika',
        'Agriculture' => 'Zemědělství',
        'Advertising' => 'Reklama',
        'Apparel & Accessories' => 'Oblečení a doplňky',
        'Architecture' => 'Architektura',
        'Automotive' => 'Automobilový průmysl',
        'Banking' => 'Bankovnictví',
        'Biotechnology' => 'Biotechnologie',
        'Building Materials & Equipment' => 'Stavebnictví',
        'Chemical' => 'Chemie',
        'Construction' => 'Konstrukce',
        'Computer' => 'Počítače',
        'Defense' => 'Obrana',
        'Creative' => 'Tvůrčí činnost',
        'Culture' => 'Kultura',
        'Consulting' => 'Poradenství',
        'Education' => 'Vzdělání',
        'Electronics' => 'Elektronika',
        'Electric Power' => 'Electric Power',
        'Energy' => 'Energie',
        'Entertainment & Leisure' => 'Zábava a volný čas',
        'Finance' => 'Finance',
        'Food & Beverage' => 'Stravování a nápoje',
        'Grocery' => 'Potraviny',
        'Hospitality' => 'Hospitality',
        'Healthcare' => 'Zdravotnictví',
        'Insurance' => 'Pojištění',
        'Legal' => 'Právo',
        'Manufacturing' => 'Výroba',
        'Mass Media' => 'Hromadné sdělovací prostředky',
        'Mining' => 'Hornictví',
        'Music' => 'Hudba',
        'Marketing' => 'Marketing',
        'Publishing' => 'Vydavatelství',
        'Petroleum' => 'Ropa',
        'Real Estate' => 'Nemovitosti',
        'Retail' => 'Maloobchod',
        'Shipping' => 'Přeprava',
        'Service' => 'Služby',
        'Support' => 'Podpora',
        'Sports' => 'Sport',
        'Software' => 'Software',
        'Technology' => 'Technologie',
        'Telecommunications' => 'Telekomunikace',
        'Television' => 'TV',
        'Testing, Inspection & Certification' => 'Testování, inspekce a certifikace',
        'Transportation' => 'Doprava',
        'Travel' => 'Cestování',
        'Venture Capital' => 'Rizikový kapitál',
        'Wholesale' => 'Velkoobchod',
        'Water' => 'Vodohospodářství'
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
      'Create Account' => 'Vytvořit Organizace',
      'Copy Billing' => 'Zkopírovat fakturační údaje',
      'Set Primary' => 'Nastavit jako primární',
      'Fill Data' => 'Vyplnit údaje',
      'Verify VAT Number' => 'Ověřit DIČ'
    ],
    'presetFilters' => [
      'customers' => 'Zákazníci',
      'partners' => 'Partneři',
      'recentlyCreated' => 'Nedávno vytvořeno'
    ],
    'messages' => [
      'missingSicCode' => 'Zadejte IČO',
      'invalidAresResponse' => 'Neplatná odpověď z ARESu',
      'invalidFinstatResponse' => 'Neplatná odpověď z Finstatu',
      'couldNotFindCompanyBySicCode' => 'Nelze najít společnost s IČO "{sicCode}"',
      'couldNotFindCompanyByName' => 'Nelze najít společnost s názvem "{name}"',
      'errorWhileFetchingFinstat' => 'Chyba při získávání údajů z Finstatu',
      'invalidSicCode' => 'IČO má neplatný formát',
      'vatNumberIsValid' => 'DIČ je validní',
      'vatNumberIsInvalid' => 'DIČ je neplatné',
      'vatVerificationFailed' => 'Ověření DIČ selhalo',
      'vatIdInvalidformat' => 'DIČ má neplatný formát',
      'accountNotFound' => 'Organizace nenalezena'
    ],
    'fillProviders' => [
      'Ares' => 'Vyplnit z ARES',
      'Finstat' => 'Vyplnit z FinStatu'
    ],
    'tooltips' => [
      'slovakVatId' => 'IČ DPH je slovenské identifikační číslo pro účely DPH',
      'dic' => 'Daňové identifikační číslo'
    ]
  ],
  'Calendar' => [
    'modes' => [
      'month' => 'Měsíc',
      'week' => 'Týden',
      'day' => 'Den',
      'agendaWeek' => 'Týden',
      'agendaDay' => 'Den',
      'timeline' => 'Časová osa'
    ],
    'labels' => [
      'Today' => 'Dnes',
      'Create' => 'Vytvořit',
      'Shared' => 'Sdílené',
      'Add User' => 'Přidat uživatele',
      'current' => 'current',
      'time' => 'čas',
      'User List' => 'Seznam uživatelů',
      'Manage Users' => 'Spravovat uživatele',
      'View Calendar' => 'Zobrazit kalendář',
      'Create Shared View' => 'Vytvořit sdílené zobrazení'
    ]
  ],
  'Call' => [
    'fields' => [
      'name' => 'Název',
      'parent' => 'Rodič',
      'status' => 'Stav',
      'dateStart' => 'Datum zahájení',
      'dateEnd' => 'Datum ukončení',
      'direction' => 'Směr',
      'duration' => 'Trvání',
      'description' => 'Popis',
      'users' => 'Uživatelé',
      'contacts' => 'Kontakty',
      'leads' => 'Stopy',
      'reminders' => 'Připomenutí',
      'account' => 'Organizace',
      'acceptanceStatus' => 'Stav přijetí',
      'googleCalendarEventId' => 'Google Calendar Event ID',
      'googleCalendar' => 'Google Calendar',
      'recordedcall' => 'Nahraný hovor',
      'speechtotext' => 'Hovor do textu',
      'sendmrkemail' => 'Odesílat marketingové emailové informace',
      'calltranscribe' => 'Přepis hovoru',
      'isEditing' => 'IsEditing'
    ],
    'links' => [
      'googleCalendar' => 'Google Calendar',
      'recordedcall' => 'Nahraný hovor'
    ],
    'options' => [
      'status' => [
        'Planned' => 'Plánovaný',
        'Held' => 'Uskutečněný',
        'Not Held' => 'Neuskutečněný'
      ],
      'direction' => [
        'Outbound' => 'Odchozí',
        'Inbound' => 'Příchozí'
      ],
      'acceptanceStatus' => [
        'None' => 'Žádný',
        'Accepted' => 'Přijatý',
        'Declined' => 'Odmítnutý',
        'Tentative' => 'Předběžný'
      ]
    ],
    'massActions' => [
      'setHeld' => 'Nastavit jako uskutečněný',
      'setNotHeld' => 'Nastavit jako neuskutečněný'
    ],
    'labels' => [
      'Create Call' => 'Vytvořit volání',
      'Set Held' => 'Nastavit jako uskutečněný',
      'Set Not Held' => 'Nastavit jako neuskutečněný',
      'Send Invitations' => 'Poslat pozvánky'
    ],
    'presetFilters' => [
      'planned' => 'Plánovaný',
      'held' => 'Uskutečněný',
      'todays' => 'Dnešní'
    ]
  ],
  'Campaign' => [
    'fields' => [
      'name' => 'Název',
      'description' => 'Popis',
      'status' => 'Stav',
      'type' => 'Typ',
      'startDate' => 'Datum zahájení',
      'endDate' => 'Datum ukončení',
      'targetLists' => 'Cílové seznamy',
      'excludingTargetLists' => 'Vyloučené cílové seznamy',
      'sentCount' => 'Poslané',
      'openedCount' => 'Otevřené',
      'clickedCount' => 'Kliknuté',
      'optedOutCount' => 'Odhlášené',
      'bouncedCount' => 'Odmítnuté',
      'optedInCount' => 'Přihlášené',
      'hardBouncedCount' => 'Tvrdě odmítnuté',
      'softBouncedCount' => 'Měkce odmítnuté',
      'leadCreatedCount' => 'Počet potenciálů',
      'revenue' => 'Příjem',
      'revenueConverted' => 'Příjem (konvertováno)',
      'budget' => 'Rozpočet',
      'budgetConverted' => 'Rozpočet (převeden)',
      'budgetCurrency' => 'Měna rozpočtu',
      'contactsTemplate' => 'Šablona kontaktů',
      'leadsTemplate' => 'Šablona potenciálů',
      'accountsTemplate' => 'Šablona organizací',
      'usersTemplate' => 'Šablona uživatelů',
      'mailMergeOnlyWithAddress' => 'Přeskočit záznamy bez vyplněné adresy'
    ],
    'links' => [
      'targetLists' => 'Cílové seznamy',
      'excludingTargetLists' => 'Vyloučené cílové seznamy',
      'accounts' => 'Organizace',
      'contacts' => 'Kontakty',
      'leads' => 'Potenciály',
      'opportunities' => 'Příležitosti',
      'campaignLogRecords' => 'Log',
      'massEmails' => 'Hromadné emaily',
      'trackingUrls' => 'Sledovaná URL',
      'contactsTemplate' => 'Šablona kontaktů',
      'leadsTemplate' => 'Šablony Potenciálů',
      'accountsTemplate' => 'Šablona organizací',
      'usersTemplate' => 'Šablona uživatelů'
    ],
    'options' => [
      'type' => [
        'Email' => 'Email',
        'Web' => 'Web',
        'Television' => 'TV',
        'Radio' => 'Rádio',
        'Newsletter' => 'Newsletter',
        'Mail' => 'Email'
      ],
      'status' => [
        'Planning' => 'Plánované',
        'Active' => 'Aktivní',
        'Inactive' => 'Neaktivní',
        'Complete' => 'Kompletní'
      ]
    ],
    'labels' => [
      'Create Campaign' => 'Vytvořit kampaň',
      'Target Lists' => 'Cílové seznamy',
      'Statistics' => 'Statistiky',
      'hard' => 'těžký',
      'soft' => 'měkký',
      'Unsubscribe' => 'Odhlásit se',
      'Mass Emails' => 'Hromadné e-maily',
      'Email Templates' => 'Šablony emailu',
      'Unsubscribe again' => 'Znovu se odhlásit',
      'Subscribe again' => 'Přihlásit se znovu',
      'Create Target List' => 'Vytvořit cílový seznam',
      'Mail Merge' => 'Sloučení emailů',
      'Generate Mail Merge PDF' => 'Generování hromadné korespondence PDF'
    ],
    'presetFilters' => [
      'active' => 'Aktivní'
    ],
    'messages' => [
      'unsubscribed' => 'Byli jste odhlášeni z našeho seznamu adresátů.',
      'subscribedAgain' => 'Jste znovu přihlášeni k odběru.'
    ],
    'tooltips' => [
      'targetLists' => 'Cíle, které by měly přijímat zprávy.',
      'excludingTargetLists' => 'Cíle, které by neměly přijímat zprávy.'
    ]
  ],
  'CampaignLogRecord' => [
    'fields' => [
      'action' => 'Akce',
      'actionDate' => 'Datum',
      'data' => 'Data',
      'campaign' => 'Kampaň',
      'parent' => 'Cíl',
      'object' => 'Objekt',
      'application' => 'Aplikace',
      'queueItem' => 'Položka fronty',
      'stringData' => 'String Data',
      'stringAdditionalData' => 'string Additional Data',
      'isTest' => 'Je Test'
    ],
    'links' => [
      'queueItem' => 'Položka fronty',
      'parent' => 'Rodič',
      'object' => 'Objekt',
      'campaign' => 'Kampaň'
    ],
    'options' => [
      'action' => [
        'Sent' => 'Poslané',
        'Opened' => 'Otevřené',
        'Opted Out' => 'Odhlášené',
        'Bounced' => 'Odraženo',
        'Clicked' => 'Kliknuté',
        'Lead Created' => 'Vytvořen potenciál',
        'Opted In' => 'Příhlášené'
      ]
    ],
    'labels' => [
      'All' => 'Vše',
      'Create CampaignLogRecord' => 'Vytvořit záznam protokolu kampaně'
    ],
    'presetFilters' => [
      'sent' => 'Posláno',
      'opened' => 'Otevřeno',
      'optedOut' => 'Odhlášeno',
      'optedIn' => 'Přihlášeno',
      'bounced' => 'Odraženo',
      'clicked' => 'Kliknuto',
      'leadCreated' => 'Lead vytvořen'
    ]
  ],
  'CampaignTrackingUrl' => [
    'fields' => [
      'url' => 'URL',
      'action' => 'Akce',
      'urlToUse' => 'Kód, který se má vložit místo adresy URL',
      'message' => 'Zpráva',
      'campaign' => 'Kampaň'
    ],
    'links' => [
      'campaign' => 'Kampaň'
    ],
    'labels' => [
      'Create CampaignTrackingUrl' => 'Vytvořit sledovací URL'
    ],
    'options' => [
      'action' => [
        'Redirect' => 'Přesměrování',
        'Show Message' => 'Zobrazit zprávu'
      ]
    ],
    'tooltips' => [
      'url' => 'Po kliknutí na odkaz bude příjemce přesměrován na toto místo.',
      'message' => 'Po kliknutí na odkaz se zpráva zobrazí příjemci. Markdown je podporován.'
    ]
  ],
  'Case' => [
    'fields' => [
      'name' => 'Název',
      'number' => 'Číslo',
      'status' => 'Stav',
      'account' => 'Organizace',
      'contact' => 'Kontakt',
      'contacts' => 'Kontakty',
      'priority' => 'Priorita',
      'type' => 'Typ',
      'description' => 'Popis',
      'inboundEmail' => 'Skupinový e-mailový účet',
      'lead' => 'Potenciál',
      'attachments' => 'Přílohy',
      'reclamation' => 'Reklamace'
    ],
    'links' => [
      'inboundEmail' => 'Skupinový e-mailový účet',
      'account' => 'Organizace',
      'contact' => 'Kontakt (primární)',
      'Contacts' => 'Kontakty',
      'meetings' => 'Schůzky',
      'calls' => 'Volání',
      'tasks' => 'Úlohy',
      'emails' => 'Emaily',
      'articles' => 'Články znalostní báze',
      'lead' => 'Potenciál',
      'attachments' => 'Přílohy'
    ],
    'options' => [
      'status' => [
        'New' => 'Nový',
        'Assigned' => 'Přiřazený',
        'Pending' => 'Čekající',
        'Closed' => 'Uzavřený',
        'Rejected' => 'Odmítnutý',
        'Duplicate' => 'Duplikovaný'
      ],
      'priority' => [
        'Low' => 'Malá',
        'Normal' => 'Normální',
        'High' => 'Vysoká',
        'Urgent' => 'Urgentní'
      ],
      'type' => [
        'Question' => 'Otázka',
        'Incident' => 'Incident',
        'Problem' => 'Problém',
        '' => '',
        'Warranty' => 'Přijatá reklamace',
        'Software' => 'Software'
      ]
    ],
    'labels' => [
      'Create Case' => 'Vytvořit Případ',
      'Close' => 'Uzavřít',
      'Reject' => 'Odmítnout',
      'Closed' => 'Uzavřeno',
      'Rejected' => 'Odmítnuto',
      'Create Reclamation' => 'Vytvořit reklamaci',
      'Reclamation created' => 'Reklamace vytvořena'
    ],
    'presetFilters' => [
      'open' => 'Otevřený',
      'closed' => 'Zavřený'
    ]
  ],
  'Contact' => [
    'fields' => [
      'name' => 'Jméno',
      'emailAddress' => 'Email',
      'title' => 'Titul',
      'account' => 'Firma',
      'accounts' => 'Firmy',
      'phoneNumber' => 'Telefon',
      'accountType' => 'Typ firmy',
      'doNotCall' => 'Nevolat',
      'address' => 'Adresa',
      'opportunityRole' => 'Role příležitosti',
      'accountRole' => 'Pozice',
      'description' => 'Popis',
      'campaign' => 'Kampaň',
      'targetLists' => 'Cílové seznamy',
      'targetList' => 'Cílový seznam',
      'portalUser' => 'Uživatel portálu',
      'hasPortalUser' => 'Has Portal User',
      'originalLead' => 'Původní Lead',
      'acceptanceStatus' => 'Stav přijetí',
      'accountIsInactive' => 'Neaktivní',
      'acceptanceStatusMeetings' => 'Stav přijetí (Schůzky)',
      'acceptanceStatusCalls' => 'Stav přijetí (Volání)',
      'vatId' => 'DIČ',
      'sicCode' => 'IČ',
      'crmcontact' => 'Kontakt k CRM',
      'screenshot' => 'Webový Screenshot',
      'imporFromDB' => 'Nahrát nový kontakt',
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
      'opportunities' => 'Příležitosti',
      'cases' => 'Případy',
      'targetLists' => 'Cílové seznamy',
      'campaignLogRecords' => 'Log kampaně',
      'campaign' => 'Kampaň',
      'account' => 'Organizace (hlavní)',
      'accounts' => 'Organizace',
      'casesPrimary' => 'Případy (primární)',
      'tasksPrimary' => 'Úkoly (rozšířené)',
      'opportunitiesPrimary' => 'Příležitosti (hlavní)',
      'portalUser' => 'Uživatel portálu',
      'originalLead' => 'Originální Lead',
      'documents' => 'Documenty',
      'orders' => 'Objednávky',
      'contractors' => 'Dodavatelé',
      'businessProjects' => 'Zakázky',
      'installations' => 'Instalace',
      'firma' => 'Account',
      'complaintBook' => 'Complaint Book',
      'quotesShipping' => 'Nabídky (přepravné)',
      'salesOrdersBilling' => 'Proforma faktury (vyúčtování)',
      'salesOrdersShipping' => 'Proforma faktury (přepravné)',
      'invoicesBilling' => 'Faktury (vyúčtování)',
      'invoicesShipping' => 'Faktury (přepravné)'
    ],
    'labels' => [
      'Create Contact' => 'Vytvořit Kontakt'
    ],
    'options' => [
      'opportunityRole' => [
        '' => '',
        'Decision Maker' => 'Rozhoduje',
        'Evaluator' => 'Hodnotí',
        'Influencer' => 'Má vliv'
      ],
      'category' => [
        '-' => '-',
        'A' => 'A',
        'B' => 'B',
        'C' => 'C'
      ]
    ],
    'presetFilters' => [
      'portalUsers' => 'Uživatelé portálu',
      'notPortalUsers' => 'Není uživatel portálu',
      'accountActive' => 'Aktivní'
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
      'Create Document' => 'Vytvořit dokument',
      'Details' => 'Detaily',
      'Open In OnlyOffice' => 'Otevřít v OnlyOffice'
    ],
    'fields' => [
      'name' => 'Název',
      'status' => 'Stav',
      'file' => 'Soubor',
      'type' => 'Typ',
      'publishDate' => 'Datum publikace',
      'expirationDate' => 'Datum expirace',
      'description' => 'Popis',
      'accounts' => 'Organizace',
      'folder' => 'Složka',
      'product' => 'Produkt',
      'obrazekDokumentu' => 'Obrázek',
      'quote' => 'Nabídka',
      'accounts1' => 'Accounts1',
      'account' => 'Account',
      'businessProjects' => 'Zakázky',
      'businessProject' => 'Business Project',
      'components' => 'Components',
      'salesOrder' => 'Zakázka',
      'files' => 'Přílohy',
      'source' => 'Zdroj',
      'openButton' => ' '
    ],
    'links' => [
      'accounts' => 'Organizace',
      'opportunities' => 'Případy',
      'folder' => 'Složka',
      'leads' => 'Potenciálové',
      'contacts' => 'Kontakty',
      'product' => 'Produkt',
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
        'Active' => 'Aktivní',
        'Draft' => 'Rozepsaný',
        'Expired' => 'Expirovaný',
        'Canceled' => 'Zrušený'
      ],
      'type' => [
        '' => '-',
        'Contract' => 'Kontrakt',
        'NDA' => 'NDA',
        'EULA' => 'EULA',
        'License Agreement' => 'Licenční smlouva'
      ]
    ],
    'presetFilters' => [
      'active' => 'Aktivní',
      'draft' => 'Draft'
    ]
  ],
  'DocumentFolder' => [
    'labels' => [
      'Create DocumentFolder' => 'Vytvořit složku',
      'Manage Categories' => 'Spravovat složky',
      'Documents' => 'Dokumenty',
      'documents' => 'Dokumenty'
    ],
    'links' => [
      'documents' => 'Dokumenty',
      'businessProject' => 'Zakázka',
      'children' => 'Podsložky'
    ],
    'fields' => [
      'businessProject' => 'Zakázka',
      'children' => 'Podsložky'
    ]
  ],
  'EmailQueueItem' => [
    'fields' => [
      'name' => 'Jméno',
      'status' => 'Stav',
      'target' => 'Cíl',
      'sentAt' => 'Datum odeslání',
      'attemptCount' => 'Počet pokusů',
      'emailAddress' => 'Emailová adresa',
      'massEmail' => 'Hromadný email',
      'isTest' => 'Je test'
    ],
    'links' => [
      'target' => 'Cíl',
      'massEmail' => 'Hromadný email'
    ],
    'options' => [
      'status' => [
        'Pending' => 'Ve frontě',
        'Sent' => 'Odesláno',
        'Failed' => 'Selhalo',
        'Sending' => 'Odesílá se'
      ]
    ],
    'presetFilters' => [
      'pending' => 'Ve frontě',
      'sent' => 'Odesláno',
      'failed' => 'Selhalo'
    ],
    'labels' => [
      'Create EmailQueueItem' => 'Vytvořit položku emailové fronty'
    ]
  ],
  'KnowledgeBaseArticle' => [
    'labels' => [
      'Create KnowledgeBaseArticle' => 'Vytvořit článek',
      'Any' => 'Any',
      'Send in Email' => 'Odeslat emailem',
      'Move Up' => 'Posunout nahoru',
      'Move Down' => 'Posunout dolů',
      'Move to Top' => 'Přesunout nahoru',
      'Move to Bottom' => 'Přesunout dolů'
    ],
    'fields' => [
      'name' => 'Název',
      'status' => 'Stav',
      'type' => 'Typ',
      'attachments' => 'Přílohy',
      'publishDate' => 'Datum publikování',
      'expirationDate' => 'Datum vypršení',
      'description' => 'Popis',
      'body' => 'Text',
      'categories' => 'Kategorie',
      'language' => 'Jazyk',
      'portals' => 'Portály'
    ],
    'links' => [
      'cases' => 'Případy',
      'opportunities' => 'Příležitosti',
      'categories' => 'Kategorie',
      'portals' => 'Portály'
    ],
    'options' => [
      'status' => [
        'In Review' => 'In Review',
        'Draft' => 'Návrh',
        'Archived' => 'Archivováno',
        'Published' => 'Publikováno'
      ],
      'type' => [
        'Article' => 'Článek'
      ]
    ],
    'tooltips' => [
      'portals' => 'Článek bude k dispozici pouze na určených portálech.'
    ],
    'presetFilters' => [
      'published' => 'Publikováno'
    ]
  ],
  'KnowledgeBaseCategory' => [
    'labels' => [
      'Create KnowledgeBaseCategory' => 'Vytvořit kategorii',
      'Manage Categories' => 'Spravovat kategorie',
      'Articles' => 'Články'
    ],
    'links' => [
      'articles' => 'Články'
    ]
  ],
  'Lead' => [
    'labels' => [
      'Converted To' => 'Konvertováno do',
      'Create Lead' => 'Vytvořit Lead',
      'Convert' => 'Konvertovat',
      'convert' => 'konvertovat'
    ],
    'fields' => [
      'name' => 'Jméno kontaktu',
      'emailAddress' => 'Email',
      'title' => 'Pozice',
      'website' => 'Web',
      'phoneNumber' => 'Telefon',
      'accountName' => 'Název firmy',
      'doNotCall' => 'Nevolat',
      'address' => 'Adresa',
      'status' => 'Status (ALIS)',
      'source' => 'Zdroj',
      'opportunityAmount' => 'Částka příležitosti',
      'opportunityAmountConverted' => 'Částka příležitosti (konvertováno)',
      'description' => 'Popis',
      'createdAccount' => 'Organizace',
      'createdContact' => 'Kontakt',
      'createdOpportunity' => 'Příležitost',
      'convertedAt' => 'Převedeno na',
      'campaign' => 'Kampaň',
      'targetLists' => 'Cílové seznamy',
      'targetList' => 'Cílový seznam',
      'industry' => 'Druh činnosti',
      'acceptanceStatus' => 'Stav přijetí',
      'opportunityAmountCurrency' => 'Částka příležitosti v měně',
      'acceptanceStatusMeetings' => 'Stav přijetí (Schůzky)',
      'acceptanceStatusCalls' => 'Stav přijetí (Volání)',
      'sicCode' => 'IČ',
      'vatId' => 'DIČ',
      'year2015' => 'Obrat 2015',
      'year2016' => 'Obrat 2016',
      'year2017' => 'Obrat 2017',
      'year2018' => 'Obrat 2018',
      'year2019' => 'Obrat 2019',
      'importdate' => 'Datum importu',
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
      'tasksToLeads' => 'Úkoly'
    ],
    'links' => [
      'targetLists' => 'Cílové seznamy',
      'campaignLogRecords' => 'Log kampaně',
      'campaign' => 'Kampaň',
      'createdAccount' => 'Organizace',
      'createdContact' => 'Contact',
      'createdOpportunity' => 'Příležitost',
      'cases' => 'Případy',
      'documents' => 'Dokumenty',
      'tasksToLeads' => 'Úkoly',
      'relatedLead' => 'Související lead',
      'originalLead' => 'Originální lead',
      'leadsRight' => 'Leads Right',
      'leadsLeft' => 'Leads Left'
    ],
    'options' => [
      'status' => [
        'New' => 'A - Not contacted',
        'Assigned' => 'A - 0 email',
        'In Process' => 'A - Communication',
        'Converted' => 'A - Converted',
        'Recycled' => 'Recyklovaný',
        'Dead' => 'A - Lost',
        'Forwarded' => 'A - Forwarded',
        'Potential' => 'Potenciál',
        'Waiting' => 'A - Not answering',
        'PQ' => 'A - Quoted',
        'Sent' => 'A - Catalog sent',
        'Done' => 'A - Zero call done',
        'ZeroDone' => 'A - Zero call done'
      ],
      'source' => [
        'Call' => 'Volání',
        'Email' => 'Mailing',
        'Existing Customer' => 'Existující zákazník',
        'Partner' => 'Partner',
        'Public Relations' => 'Veřejné vztahy',
        'Web Site' => 'Web',
        'Campaign' => 'Kampaň',
        'Other' => 'Ostatní',
        '' => '-',
        'Reference' => 'Reference',
        'Veletrh' => 'Veletrh',
        'Reklama' => 'Reklama',
        'SEO' => 'SEO',
        'PPC' => 'PPC',
        'LinkedIn' => 'LinkedIn',
        'Veletrh 2021' => 'Veletrh 2021'
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
      ],
      'salutationName' => [
        ' ' => ' ',
        'Mr.' => 'Mr.',
        'Ms.' => 'Ms.',
        'Mrs.' => 'Mrs.',
        'Dr.' => 'Doktor(ka)',
        'Pan' => 'Pan',
        'Pani' => 'Paní',
        'Slecna' => 'Slečna'
      ]
    ],
    'presetFilters' => [
      'active' => 'Aktivní',
      'actual' => 'Aktuální',
      'converted' => 'Konvertovaný'
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
      'name' => 'Název',
      'status' => 'Stav',
      'storeSentEmails' => 'Uložit odeslané e-maily',
      'startAt' => 'Datum zahájení',
      'fromAddress' => 'Z adresy',
      'fromName' => 'Jméno',
      'replyToAddress' => 'Adresa pro odpověď',
      'replyToName' => 'Jméno pro odpověď',
      'campaign' => 'Kampaň',
      'emailTemplate' => 'Šablona emailu',
      'inboundEmail' => 'Emailový účet',
      'targetLists' => 'Cílové seznamy',
      'excludingTargetLists' => 'Vyloučené cílové seznamy',
      'optOutEntirely' => 'Odhlásit se úplně',
      'smtpAccount' => 'SMTP účet'
    ],
    'links' => [
      'targetLists' => 'Cílové seznamy',
      'excludingTargetLists' => 'Vyloučení Cílových seznamů',
      'queueItems' => 'Položky fronty',
      'campaign' => 'Kampaň',
      'emailTemplate' => 'Šablona e-mailu',
      'inboundEmail' => 'Emailový účet'
    ],
    'options' => [
      'status' => [
        'Draft' => 'Návrh',
        'Pending' => 'Čekající',
        'In Process' => 'V přípravě',
        'Complete' => 'Kompletní',
        'Canceled' => 'Canceled',
        'Failed' => 'Selhalo'
      ]
    ],
    'labels' => [
      'Create MassEmail' => 'Vytvořit hromadný email',
      'Send Test' => 'Poslat test',
      'System SMTP' => 'System SMTP',
      'system' => 'systém',
      'group' => 'skupina'
    ],
    'messages' => [
      'selectAtLeastOneTarget' => 'Vyberte alespoň jeden cíl.',
      'testSent' => 'Testovací e-maily, které mají být odeslány.'
    ],
    'tooltips' => [
      'optOutEntirely' => 'E-mailové adresy příjemců, kteří se odhlásili, budou označeni jako odhlášeni a již nebudou dostávat žádné hromadné e-maily.',
      'targetLists' => 'Cíle, které by měly přijímat zprávy.',
      'excludingTargetLists' => 'Cíle, které by neměly přijímat zprávy.',
      'storeSentEmails' => 'E-maily budou uloženy v CRM.'
    ],
    'presetFilters' => [
      'actual' => 'Aktuální',
      'complete' => 'Kompletní'
    ]
  ],
  'Meeting' => [
    'fields' => [
      'name' => 'Název',
      'parent' => 'Rodič',
      'status' => 'Stav',
      'dateStart' => 'Datum zahájení',
      'dateEnd' => 'Datum ukončení',
      'duration' => 'Trvání',
      'description' => 'Popis',
      'users' => 'Uživatelé',
      'contacts' => 'Kontakty',
      'leads' => 'Stopy',
      'reminders' => 'Připomenutí',
      'account' => 'Organizace',
      'acceptanceStatus' => 'Stav přijetí',
      'dateStartDate' => 'Date Start (all day)',
      'dateEndDate' => 'End Date (all day)',
      'isAllDay' => 'Is All-Day',
      'sourceEmail' => 'Source Email',
      'googleCalendarEventId' => 'Google Calendar Event ID',
      'googleCalendar' => 'Google Calendar',
      'isRepeated' => 'Opakovat',
      'repeatInterval' => 'Interval opakování',
      'Acceptance' => 'Přijetí'
    ],
    'links' => [
      'googleCalendar' => 'Google Calendar'
    ],
    'options' => [
      'status' => [
        'Planned' => 'Planovaná',
        'Held' => 'Uskutečněná',
        'Not Held' => 'Neuskutečněná'
      ],
      'acceptanceStatus' => [
        'None' => '-',
        'Accepted' => 'Přijatý',
        'Declined' => 'Odmítnutý',
        'Tentative' => 'Předběžný'
      ]
    ],
    'massActions' => [
      'setHeld' => 'Nastavit jako uskutečněný',
      'setNotHeld' => 'Nastavit jako neuskutečněný'
    ],
    'labels' => [
      'Create Meeting' => 'Vytvořit schůzku',
      'Set Held' => 'Nastavit jako uskutečněný',
      'Set Not Held' => 'Nastavit jako neuskutečněný',
      'Send Invitations' => 'Odeslat pozvánky',
      'Send Cancellation' => 'Send Cancellation',
      'on time' => 'na čas',
      'before' => 'před',
      'All-Day' => 'All-Day',
      'Acceptance' => 'Acceptance'
    ],
    'presetFilters' => [
      'planned' => 'Plánovaný',
      'held' => 'Uskutečněný',
      'todays' => 'Dnešní'
    ],
    'messages' => [
      'sendInvitationsToSelectedAttendees' => 'Invitation emails will be sent to the selected attendees.',
      'sendCancellationsToSelectedAttendees' => 'Cancellation emails will be sent to the selected attendees.',
      'selectAcceptanceStatus' => 'Nastavit svůj stav přijetí.',
      'nothingHasBeenSent' => 'Nic nebylo odesláno'
    ]
  ],
  'Opportunity' => [
    'fields' => [
      'name' => 'Název',
      'account' => 'Firma',
      'stage' => 'Stav',
      'amount' => 'Částka za položky',
      'probability' => 'Pravděpodobnost (%)',
      'leadSource' => 'Zdroj',
      'doNotCall' => 'Nevolat',
      'closeDate' => 'Kontaktovat nejpozději',
      'contacts' => 'Kontakty',
      'contact' => 'Primární kontakt',
      'description' => 'Popis',
      'amountConverted' => 'Částka (převedeno)',
      'amountWeightedConverted' => 'Amount weighted (converted)',
      'campaign' => 'Kampaň',
      'originalLead' => 'Původní Potenciál',
      'amountCurrency' => 'Částka v měně',
      'contactRole' => 'Role kontaktu',
      'lastStage' => 'Poslední fáze',
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
      'opportunities' => 'Příležitosti',
      'salesOrders' => 'Zakázky',
      'numberA' => 'Číslo příležitosti'
    ],
    'links' => [
      'contacts' => 'Kontakty',
      'contact' => 'Primární kontakt',
      'documents' => 'Dokumenty',
      'campaign' => 'Kampaň',
      'originalLead' => 'Originální Potenciál',
      'businessProjects' => 'Zakázka',
      'account1' => 'Firma',
      'quotes' => 'Nabídky',
      'opportunities' => 'Příležitosti',
      'salesOrders' => 'Zakázky',
      'invoices' => 'Faktury',
      'items' => 'Položky'
    ],
    'options' => [
      'stage' => [
        'Prospecting' => 'Prospecting',
        'Qualification' => 'Příprava',
        'Proposal' => 'Poptáno',
        'Negotiation' => 'Vyjednávání',
        'Needs Analysis' => 'Needs Analysis',
        'Value Proposition' => 'Value Proposition',
        'Id. Decision Makers' => 'Id. Decision Makers',
        'Perception Analysis' => 'Perception Analysis',
        'Proposal/Price Quote' => 'Proposal/Price Quote',
        'Negotiation/Review' => 'Negotiation/Review',
        'Closed Won' => 'Vytvoření nabídky',
        'Closed Lost' => 'Prohraná'
      ]
    ],
    'labels' => [
      'Create Opportunity' => 'Vytvořit Příležitost',
      'Convert to Quote' => 'Vytvořit Nabídku',
      'Quote Created' => 'Nabídka vytvořena'
    ],
    'presetFilters' => [
      'open' => 'Otevřený',
      'won' => 'Vyhraný',
      'lost' => 'Ztracený'
    ]
  ],
  'TargetList' => [
    'fields' => [
      'name' => 'Název',
      'description' => 'Popis',
      'entryCount' => 'Počet vstupů',
      'optedOutCount' => 'Počet odhlášených',
      'campaigns' => 'Kampaně',
      'endDate' => 'Datum ukončení',
      'targetLists' => 'Cílové seznamy',
      'includingActionList' => 'Zahrnout',
      'excludingActionList' => 'Vyloučit',
      'targetStatus' => 'Cílový stav',
      'isOptedOut' => 'Je odhlášen',
      'syncWithReports' => 'Záznamy',
      'syncWithReportsEnabled' => 'Povolený',
      'syncWithReportsUnlink' => 'Není synchronizován',
      'prospects' => 'Prospects'
    ],
    'links' => [
      'accounts' => 'Organizace',
      'contacts' => 'Kontakty',
      'leads' => 'Potenciálové',
      'campaigns' => 'Kampaně',
      'massEmails' => 'Hromadný email',
      'syncWithReports' => 'Synchronizace se záznamy',
      'prospects' => 'Prospects',
      'campaignsExcluding' => 'Vyloučené z kampaní',
      'massEmailsExcluding' => 'Vyloučené z hromadných emailů'
    ],
    'options' => [
      'type' => [
        'Email' => 'Email',
        'Web' => 'Web',
        'Television' => 'Televize',
        'Radio' => 'Rádio',
        'Newsletter' => 'Novinky'
      ],
      'targetStatus' => [
        'Opted Out' => 'Odhlášený',
        'Listed' => 'Vypsaný'
      ]
    ],
    'labels' => [
      'Create TargetList' => 'Vytvořit cílový seznam',
      'Opted Out' => 'Odhlášené',
      'Cancel Opt-Out' => 'Zrušit odhlášení',
      'Opt-Out' => 'Odhlásit',
      'Sync with Reports' => 'Synchronizace se záznamy'
    ],
    'tooltips' => [
      'syncWithReportsEnabled' => 'Enable auto-sync with a list report.',
      'syncWithReportsUnlink' => 'Údaje neobsažené ve výsledných zápisech nebudou připojeny k sílovému seznamu.',
      'syncWithReports' => 'Cílový seznam bude synchronizován s vybranými výslednými zápisy.'
    ]
  ],
  'Task' => [
    'fields' => [
      'name' => 'Název',
      'parent' => 'Rodič',
      'status' => 'Stav',
      'dateStart' => 'Datum zahájení',
      'dateEnd' => 'Datum ukončení',
      'dateStartDate' => 'Datum zahájení (celý den)',
      'dateEndDate' => 'Datum ukončení (celý den)',
      'priority' => 'Priorita',
      'description' => 'Zadání',
      'isOverdue' => 'Je zpozděné',
      'account' => 'Organizace',
      'dateCompleted' => 'Datum dokončení',
      'attachments' => 'Podklady - příloha',
      'reminders' => 'Připomenutí',
      'contact' => 'Kontakt',
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
      'parentLead' => 'Lead',
      'parentManufacturing' => 'Úkoly Výroba',
      'datePosEnd' => 'Předpokládané dokončení',
      'isRepeated' => 'Opakovaný úkol',
      'repeatFrom' => 'Opakovat od',
      'repeatUntil' => 'Opakovat do',
      'cronTime' => 'Interval opakování',
      'lastExecuteTime' => 'Příští opakování',
      'parentAnother' => 'Parent Another',
      'taskList' => 'Seznam podúkolů',
      'tasks' => 'Podúkoly',
      'users' => 'Users',
      'milestone' => 'Milník',
      'repeatedTaskParent' => 'Nadřazený opakovaný úkol',
      'repeatedTasks' => 'Opakované úkoly',
      'taskParent' => 'Nadřazený úkol'
    ],
    'links' => [
      'attachments' => 'Přílohy',
      'account' => 'Organizace',
      'contact' => 'Kontakt',
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
      'parentLead' => 'Lead',
      'parentManufacturing' => 'Úkoly Výroba',
      'parentAnother' => 'Parent Another',
      'users' => 'Users',
      'milestone' => 'Milník',
      'repeatedTasks' => 'Opakované úkoly',
      'taskParent' => 'Nadřazený úkol',
      'repeatedTaskParent' => 'Opakovaný nadřazený úkol'
    ],
    'options' => [
      'status' => [
        'Not Started' => 'To Do',
        'Started' => 'Zahájeno',
        'Completed' => 'Dokončeno',
        'Canceled' => 'Zrušeno',
        'Deferred' => 'Odloženo',
        'Test' => 'Test',
        'West' => 'West',
        'Work' => 'Makáme na tom',
        'Archiv' => 'Archiv',
        'Planned' => 'Před zahájením',
        'Ještě fakturujeme' => 'Ještě fakturujeme'
      ],
      'priority' => [
        'Low' => 'Malá',
        'Normal' => 'Normální',
        'High' => 'Vysoká',
        'Urgent' => 'Urgentní'
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
      'Create Task' => 'Vytvořit úkol',
      'Complete' => 'Dokončit',
      'overdue' => 'Po termínu'
    ],
    'presetFilters' => [
      'actual' => 'Aktuální',
      'completed' => 'Dokončený',
      'deferred' => 'Odložený',
      'todays' => 'Dnešní',
      'overdue' => 'Zpožděný'
    ],
    'nameOptions' => [
      'replyToEmail' => 'Reply to email'
    ],
    'tooltips' => [
      'name' => 'Název úkolu',
      'datePosEnd' => 'Odhadované datum dokončení úkolu',
      'solution' => 'Poznámky k postupu řešení',
      'solutionAttachement' => 'Dokumenty připojené při komplementaci úkolu',
      'tasks' => 'Připojené podúkoly',
      'isRepeated' => 'Opakující se úkol ? ',
      'repeatUntil' => 'Opakovat úkol do datumu',
      'lastExecuteTime' => 'Datum dalšího opakování úkolu',
      'repeatFrom' => 'Opakovat od datumu',
      'finished' => 'Dokončené opakování úkolu',
      'taskParent' => 'Název hlavního úkolu',
      'priority' => 'Priorita úkolu',
      'status' => 'Aktuální stav úkolu',
      'dateStart' => 'Datum zahájení práce na úkolu',
      'parent' => 'Entita které se úkol týká',
      'description' => 'Popis zadání úkolu',
      'attachments' => 'Podklady a dokumenty k úkolu',
      'dateEnd' => 'Datum dokončení celého úkolu',
      'reminders' => 'Připomenout kdy? notifikace/email'
    ]
  ],
  'Shepherd' => [
    'labels' => [
      'Back' => 'Zpět',
      'Next' => 'Další',
      'Finish' => 'Dokončit'
    ],
    'titles' => [
      'Welcome to AutoCRM' => 'Vítejte v AutoCRM',
      'Entities' => 'Entity',
      'Home' => 'Domů',
      'GlobalSearch' => 'Globální vyhledávání',
      'QuestionMark' => 'Nápověda',
      'QuickCreate' => 'Rychlé vytvoření',
      'Notifications' => 'Oznámení',
      'Settings' => 'Nastavení',
      'Mattermost' => 'Chat',
      'Emails' => 'Emaily',
      'Calendar' => 'Kalendář',
      'Business' => 'Obchod',
      'Leads' => 'Potenciály',
      'Accounts' => 'Organizace',
      'Contacts' => 'Kontakty',
      'Opportunities' => 'Obchodní příležitosti',
      'Quotes' => 'Nabídky',
      'SalesOrders' => 'Přijaté objednávky',
      'IssuedOrders' => 'Vydané objednávky',
      'ProjectManagement' => 'Projektové řízení',
      'Invoices' => 'Faktury',
      'WarehouseManagement' => 'Řízení skladů',
      'Campaigns' => 'Kampaně',
      'Reporting' => 'Reporting',
      'KnowledgeBaseArticles' => 'Videa a tutoriály',
      'DashboardAndDashlets' => 'Dashboard and Dashlety',
      'Hint Not Available' => 'Nápověda není k dispozici'
    ],
    'messages' => [
      'Welcome to AutoCRM' => 'Vítejte v AutoCRM.cz, softwaru na míru pro vaše podnikání. Tento CRM systém roste s vaším týmem a vašimi procesy.',
      'Entities' => 'Začněme od ovládacího panelu. Na levé straně najdete navigační panel. Každý modul (entita) je propojen s databází.',
      'Home' => 'Domovská stránka, právě se nacházíte zde.',
      'GlobalSearch' => 'Rychle najdete to, co hledáte, např. název organizace, potenciálu nebo projektu.',
      'QuestionMark' => 'Potřebujete pomoc? Kliknutím sem získáte nápovědu k právě otevřené stránce.',
      'QuickCreate' => 'Vytvořte novou entitu několika kliknutími, např.: Kontakt, Schůzka, E-mail nebo Úkol.',
      'Notifications' => 'Zde se zobrazují všechna oznámení, například o změně stavu úkolu, o přijetí e-mailu nebo o konání schůzky.',
      'Settings' => 'Zde můžete např. spravovat svůj uživatelský účet. V části \'Administrace\' se dostanete do nastavení AutoCRM.',
      'Mattermost' => 'Snižte počet vašich e-mailů! Komunikujte v reálném čase se svým týmem prostřednictvím chatovacího nástroje Mattermost. Nahrávejte dokumenty, videa nebo obrázky. Plánujte online schůzky. Vytvořte nový úkol přímo z chatu a přiřaďte jej týmu nebo uživateli.',
      'Emails' => 'Využijte integrovaného e-mailového klienta. Budete mít vždy přehled, protože e-maily jsou přímo spojeny s vašimi potenciálními zákazníky. Samozřejmě můžete také přímo z e-mailu vytvořit úkol, označit jej jako důležitý nebo jej přeposlat.',
      'Calendar' => 'Už nikdy nezmeškejte důležité schůzky! Naplánujte si schůzky nebo hovory pomocí našeho integrovaného kalendáře, používejte připomenutí prostřednictvím e-mailu, SMS nebo jako push-up okno na obrazovce. Nastavte si filtry. Samozřejmě si můžete nastavit i sdílený kalendář, abyste přesně viděli, kdo na čem pracuje nebo který zaměstnanec je pro daný úkol k dispozici. Propojení s kalendářem Google je samozřejmostí.',
      'Business' => 'Spravujte své potenciální zákazníky, přeměňte je na kontakt, společnost, dodavatele nebo příležitost. Příležitost lze bez námahy převést na nabídku a vytisknout ji jako soubor PDF nebo odeslat e-mailem. Nabídku lze zase převést na fakturu, zde platí stejné schéma převodu.',
      'Leads' => 'Správa potenciálních zákazníků - na této kartě máte k dispozici kompletní kontaktní informace a další relevantní údaje o svých \'potenciálních zákaznících\'.',
      'Accounts' => 'Kompletní přehled všech kontaktů / kontaktních osob ve firmě, můžete si také prohlédnout historii komunikace.',
      'Contacts' => 'Kompletní přehled všech kontaktních osob / kontaktních osob, také můžete vidět historii komunikace.',
      'Opportunities' => 'Přeměňte potenciální zákazníky na prodejní příležitosti. Vypočítejte pravděpodobnost svých obchodů.',
      'Quotes' => 'Několika kliknutími vytvoříte cenovou nabídku, kterou můžete vytisknout přímo v návrhu PDF nebo odeslat e-mailem. Vyberte položky ze šablon a přidejte je.',
      'SalesOrders' => 'Mějte přehled o svých objednávkách - propojte je přímo se souvisejícím projektem.',
      'IssuedOrders' => 'Jsou rovněž propojeny se souvisejícím projektem a také s vašimi dodavateli..',
      'ProjectManagement' => 'Spravujte své projekty nebo úkoly pomocí tabule Kanban nebo Ganntova diagramu.',
      'Invoices' => 'Využijte možnosti automatizace, např. zasílání platebních upomínek!',
      'WarehouseManagement' => 'Díky naskladnění a vyskladnění v reálném čase budete mít své zásoby vždy pod kontrolou a zjednodušíte si inventuru.',
      'Campaigns' => 'Vždy sledujte rozpočet na marketingové projekty. Vytvořte měsíční zpravodaj, který posílí vztahy se zákazníky.',
      'Reporting' => 'Vytvářejte reporty z libovolného subjektu a mějte kompletní přehled o svých provozních nákladech a zdrojích - měsíční uzávěrky se stanou hračkou.',
      'KnowledgeBaseArticles' => 'V naší znalostní databázi najdete užitečná videa, která vás provedou naší low-code platformou.',
      'DashboardAndDashlets' => 'Vítejte v AutoCRM, spustíme průvodce a krok za krokem vás provedeme naší intuitivní low-code platformou ({{dashboard_video}}).',
      'Hint Not Available' => 'Pro tuto stránku není k dispozici nápověda.'
    ]
  ],
  'Project' => [
    'labels' => [
      'Create Project' => 'Vytvořit Vývojové projekty'
    ],
    'fields' => [
      'name' => 'Název',
      'status' => 'Stav',
      'account' => 'Firma',
      'parentQuote' => 'Nabídka',
      'order' => 'Objednávka',
      'projectid' => 'Číslo projektu',
      'parentOrganization' => 'Firma',
      'mattermostId' => 'MattermostId',
      'details' => 'Poznámky',
      'dateStart' => 'Reálné zahájení',
      'dateEnd' => 'Reálné ukončení',
      'predictedStart' => 'Předpokládané zahájení',
      'predictedEnd' => 'Předpokládané ukončení',
      'requestForms' => 'Žádanky na nákup',
      'projectPriority' => 'Priorita',
      'projectProcent' => 'Procenta dokončení',
      'description' => 'Přínos'
    ],
    'links' => [
      'projectTasks' => 'Úlohy projektu',
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
      ],
      'status' => [
        'Draft' => 'Čeká na schválení',
        'Active' => 'Aktivní',
        'Completed' => 'Dokončený',
        'On Hold' => 'Neaktivní',
        'Dropped' => 'Zrušený'
      ]
    ]
  ],
  'ProjectTask' => [
    'labels' => [
      'Create ProjectTask' => 'Vytvořit úkol projektu'
    ],
    'fields' => [
      'name' => 'Jméno',
      'status' => 'Status',
      'project' => 'Projekt',
      'dateStart' => 'Datum zahájení',
      'dateEnd' => 'Datum ukončení',
      'estimatedEffort' => 'Odhadované úsilí (h)',
      'actualDuration' => 'Skutečná doba trvání (h)'
    ],
    'links' => [
      'project' => 'Projekt'
    ]
  ],
  'PushSubscriber' => [
    'fields' => [
      'subscription' => 'Push objekt',
      'user' => 'Uživatel',
      'createdAt' => 'Vytvořeno'
    ]
  ],
  'UseCase' => [
    'fields' => [
      'name' => 'Název',
      'quote' => 'Nabídka',
      'itemList' => 'Položky test',
      'imagesField' => 'Fotografie',
      'priceList' => 'Price List',
      'isTemplate' => 'Vzor',
      'manufacturing' => 'Test - Manufacturing',
      'quote1' => 'Quote1',
      'tax' => 'Sazba DPH',
      'taxRate' => 'Daňová sazba',
      'shippingCost' => 'Přepravní sazba',
      'shippingProvider' => 'Dopravce',
      'taxAmount' => 'Částka DPH',
      'discountAmount' => 'Sleva',
      'amount' => 'Částka',
      'preDiscountedAmount' => 'Částka před slevou',
      'grandTotalAmount' => 'Celková částka',
      'images' => 'Vložení fotografií - Typ I',
      'assignment' => 'Zadání',
      'solution' => 'Řešení',
      'account' => 'Firma',
      'amountConverted' => 'Částka (převedeno)',
      'amountCurrency' => 'Částka v měně',
      'discountAmountConverted' => 'Sleva (převedeno)',
      'discountAmountCurrency' => 'Sleva v měně',
      'grandTotalAmountConverted' => 'Celková částka (převedeno)',
      'grandTotalAmountCurrency' => 'Celková částka v měně',
      'preDiscountedAmountConverted' => 'Částka před slevou (převedeno)',
      'preDiscountedAmountCurrency' => 'Částka před slevou v měně',
      'quoteStatus' => 'Stav nabídky',
      'taxAmountConverted' => 'Částka DPH (převedeno)',
      'taxAmountCurrency' => 'Částka DPH v měně'
    ],
    'links' => [
      'quote' => 'Nabídka',
      'manufacturing' => 'Test - Manufacturing',
      'quote1' => 'Quote1',
      'items' => 'Položky',
      'images' => 'Obrázky',
      'tax' => 'Sazba DPH'
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
    ],
    'labels' => [
      'Create UseCase' => 'Vytvořit Use Case'
    ]
  ],
  'UseCaseItem' => [
    'fields' => [
      'name' => 'Název',
      'qty' => 'Množství',
      'quantity' => 'Qty',
      'listPrice' => 'Katalogová cena',
      'unitPrice' => 'Jednotková cena',
      'amount' => 'Částka',
      'taxRate' => 'Sazba DPH',
      'product' => 'Produkt',
      'order' => 'Číslo řádku',
      'quote' => 'Nabídka',
      'weight' => 'Váha',
      'unitWeight' => 'Jednotková váha',
      'description' => 'Popis',
      'discount' => 'Sleva (%)',
      'amountConverted' => 'Částka (převedeno)',
      'unitPriceConverted' => 'Jednotková cena (převedeno)',
      'listPriceConverted' => 'Katalogová cena (převedeno)',
      'account' => 'Firma',
      'listPriceCurrency' => 'Katalogová cena v měně',
      'unitPriceCurrency' => 'Jednotková cena v měně',
      'amountCurrency' => 'Částka v měně',
      'quoteStatus' => 'Stav nabídky',
      'productCode' => 'Kód Produktu',
      'unit' => 'Jednotka',
      'descriptionENG' => 'Description',
      'nameCZ' => 'Název česky',
      'guaranteeExtend' => 'Extended Guarantee',
      'manufacturing' => 'Test - Výroba',
      'belongsToSection' => 'Náleží k sekci',
      'useCase' => 'Use Case'
    ],
    'links' => [
      'quote' => 'Nabídka',
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
      'processedAt' => 'Zpracováno v',
      'elementType' => 'Element Type',
      'element' => 'Element',
      'target' => 'Cíl',
      'isLocked' => 'Je zamčeno',
      'proceedAt' => 'Pokračovat v'
    ],
    'options' => [
      'status' => [
        'Created' => 'Vytvořeno',
        'Pending' => 'Čekající',
        'In Process' => 'V procesu',
        'Standby' => 'Pohotovostní',
        'Processed' => 'Zpracováno',
        'Rejected' => 'Odmítnuto',
        'Failed' => 'Selhalo',
        'Interrupted' => 'Přerušeno'
      ]
    ],
    'links' => [
      'target' => 'Cíl',
      'process' => 'Proces',
      'flowchart' => 'Vývojový diagram',
      'previousFlowNode' => 'předchozí Flow Node'
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
      'isActive' => 'Je aktivní',
      'targetType' => 'Typ cílové entity',
      'data' => 'Data',
      'hasNoneStartEvent' => 'Má počáteční událost typu None'
    ],
    'links' => [
      'processes' => 'Procesy',
      'startWorkflows' => 'Spustit workflows'
    ],
    'elements' => [
      'eventStartConditional' => 'Podmíněná počáteční událost',
      'eventStartTimer' => 'Časovač počáteční události',
      'eventStartError' => 'Chyba při spuštění události',
      'eventStartEscalation' => 'Eskalace počáteční události',
      'eventStartSignal' => 'Signal Start Event',
      'eventStart' => 'Zahájit událost',
      'eventStartCompensation' => 'Compensation Start Event',
      'eventStartConditionalEventSubProcess' => 'Podmíněná počáteční událost dílčího procesu',
      'eventStartTimerEventSubProcess' => 'Počáteční událost časovače podprocesu',
      'eventStartSignalEventSubProcess' => 'Sub-Process Signal Start Event',
      'eventIntermediateTimerCatch' => 'Timer Intermediate Event (Catching)',
      'eventIntermediateConditionalCatch' => 'Podmíněná mezilehlá událost (chytání)',
      'eventIntermediateEscalationThrow' => 'Mezistupeň eskalace (házení)',
      'eventIntermediateSignalThrow' => 'Signal Intermediate Event (Throwing)',
      'eventIntermediateCompensationThrow' => 'Compensation Intermediate Event (Throwing)',
      'eventIntermediateSignalCatch' => 'Signal Intermediate Event (Catching)',
      'eventIntermediateMessageCatch' => 'Message Intermediate Event (Catching)',
      'eventEnd' => 'Koncová událost',
      'eventEndTerminate' => 'Ukončit koncovou událost',
      'eventEndError' => 'Chyba koncové události',
      'eventEndEscalation' => 'Eskalace koncové události',
      'eventEndSignal' => 'Signal End Event',
      'eventEndCompensation' => 'Compensation End Event',
      'eventIntermediateErrorBoundary' => 'Mezilehlá událost chyby (hranice)',
      'eventIntermediateTimerBoundary' => 'Timer Intermediate Event (Boundary)',
      'eventIntermediateConditionalBoundary' => 'Podmíněná střední událost (hranice)',
      'eventIntermediateEscalationBoundary' => 'Mezistupeň eskalace (hranice)',
      'eventIntermediateSignalBoundary' => 'Signal Intermediate Event (Boundary)',
      'eventIntermediateMessageBoundary' => 'Message Intermediate Event (Boundary)',
      'eventIntermediateCompensationBoundary' => 'Compensation Intermediate Event (Boundary)',
      'gatewayExclusive' => 'Brána založená na událostech',
      'gatewayInclusive' => 'Inkluzivní brána',
      'gatewayParallel' => 'Paralelní brána',
      'gatewayEventBased' => 'Event Based Gateway',
      'taskSendMessage' => 'Odeslat zprávu',
      'taskScript' => 'Script Task',
      'taskBusinessRule' => 'Úkol obchodního pravidla',
      'taskUser' => 'Úkol uživatele',
      'task' => 'Úkol',
      'callActivity' => 'Událost Volání',
      'subProcess' => 'Dílčí proces',
      'eventSubProcess' => 'Události dílčího procesu',
      'flow' => 'Sekvenční flow'
    ],
    'presetFilters' => [
      'isManuallyStartable' => 'Ruční spuštění',
      'activeHasNoneStartEvent' => 'Aktivní s žádnou počáteční událostí',
      'active' => 'Aktivní'
    ]
  ],
  'BpmnFlowchartElement' => [
    'fields' => [
      'text' => 'Text',
      'triggerType' => 'Trigger Type',
      'timer' => 'Parametry časovače',
      'defaultFlowId' => 'Výchozí Flow',
      'from' => 'Od/z',
      'to' => 'Komu/na',
      'replyTo' => 'Odpovědět',
      'fromEmailAddress' => 'Z e-mailové adresy',
      'toEmailAddress' => 'Na emailovou adresu',
      'replyToEmailAddress' => 'Odpovědět na emailovou adresu',
      'toSpecifiedTeams' => 'Týmům',
      'toSpecifiedUsers' => 'Uživatelům',
      'toSpecifiedContacts' => 'Kontaktům',
      'emailTemplate' => 'Šablona e-mailu',
      'doNotStore' => 'Neukládat odeslané e-maily',
      'actions' => 'Akce',
      'formula' => 'Vzorec (script)',
      'actionType' => 'Typ akcí',
      'targetUser' => 'Cílový uživatel',
      'assignmentType' => 'Úkol',
      'targetTeam' => 'Cílový tým',
      'targetUserPosition' => 'Cílová pozice uživatele',
      'startDirection' => 'Začít směrem',
      'targetReport' => 'Cílový report',
      'scheduling' => 'Plánování',
      'schedulingApplyTimezone' => 'Apply timezone',
      'messageType' => 'Typ zpráv',
      'canBeFailed' => 'Může selhat',
      'target' => 'Cíl',
      'callableType' => 'Volatelný typ',
      'errorCode' => 'Chybový kód',
      'escalationCode' => 'Eskalační kód',
      'cancelActivity' => 'Je přerušováno',
      'isInterrupting' => 'Je přerušováno',
      'targetType' => 'Typ cílové entity',
      'flowchartVisualization' => 'Flowchart Vývojový diagram',
      'flowchart' => 'Vývojový diagram',
      'signal' => 'Signál',
      'returnVariableList' => 'Vrátit proměnné',
      'returnCollectionVariable' => 'Return Collection Variable',
      'repliedTo' => 'Odpovězeno',
      'relatedTo' => 'Související s',
      'instructions' => 'Instrukce',
      'conditionsFormula' => 'Vzorec podmínek',
      'optOutLink' => 'Odkaz pro odhlášení',
      'isMultiInstance' => 'Multi-Instance',
      'isSequential' => 'Sequential',
      'loopCollectionExpression' => 'Collection Expression',
      'targetIdExpression' => 'Target ID Expression',
      'activityId' => 'Activity ID'
    ],
    'labels' => [
      'Conditions' => 'Podmínky',
      'Actions' => 'Akce',
      'Field' => 'Pole',
      'Flows Conditions' => 'Podmínky Flows'
    ],
    'tooltips' => [
      'compensateActivityId' => 'An ID of an activity to compensate. If omitted, all completed compensable activities will be compensated.',
      'targetIdExpression' => 'The expression defining an ID of the target record.',
      'returnCollectionVariable' => 'Specify a variable name for data that will be returned from the multi-instance sub-process. The variable will contain an array of objects. Each object will contain return-variables of each sub-process instance.',
      'loopCollectionExpression' => 'The expression defining a list of values. Each value will instantiate a separate sub-process. The value will be available in the variable `$inputItem`.',
      'taskSendMessageEmailAddress' => 'Dostupné zástupné symboly: \\ n * `{$$ variable}`',
      'targetReport' => 'Záznamy ze seznamu reportu budou předány novému procesu.',
      'target' => 'Vyberte, který záznam bude použit jako cíl.',
      'userTaskName' => 'Název záznamu uživatelské úlohy, který bude vytvořen. \\ NDostupné zástupné symboly: * `{$ attribute}` * * {$$ variable} `',
      'userTaskInstructions' => 'Pokyny pro uživatele. Markdown je podporován. \\ NDostupné zástupné symboly: * `{$ attribute}` * * {$$ variable} `',
      'returnVariableList' => 'Určete proměnné vzorce, které se zkopírují z dílčího procesu do nadřazeného procesu, jakmile dílčí proces úspěšně skončí.',
      'scheduling' => 'Crontabova notace. Definuje frekvenci. Časové pásmo UTC. \\ N * / 5 * * * * - každých 5 minut 0 * / 2 * * * - každé 2 hodiny 30 1 * * * - v 01:30 jednou denně 0 0 1 * * - první den v měsíci',
      'schedulingApplyTimezone' => 'Apply the system default timezone to scheduling. Otherwise, UTC will be used.'
    ],
    'options' => [
      'emailAddress' => [
        'system' => 'Systém',
        'currentUser' => 'Aktuální uživatel',
        'specifiedEmailAddress' => 'Zadaná e-mailová adresa',
        'assignedUser' => 'Přiřazený uživatel',
        'followers' => 'Následovníci',
        'specifiedContacts' => 'Specifikované kontakty',
        'specifiedUsers' => 'Zadaní uživatelé',
        'specifiedTeams' => 'Specifikované týmy',
        'followersExcludingAssignedUser' => 'Následovníci kromě přiděleného uživatele',
        'processAssignedUser' => 'Uživatel přiřazený k procesu',
        'targetEntity' => 'Cílový záznam',
        '' => 'Žádný'
      ],
      'triggerType' => [
        'afterRecordCreated' => 'Po vytvoření záznamu',
        'afterRecordSaved' => 'Po uložení záznamu',
        'afterRecordUpdated' => 'After record updated',
        'sequential' => 'Sekvenční'
      ],
      'timerShiftOperator' => [
        'plus' => 'plus',
        'minus' => 'mínus'
      ],
      'timerShiftUnits' => [
        'minutes' => 'minuty',
        'hours' => 'hodiny',
        'days' => 'dny',
        'months' => 'měsíce',
        'seconds' => 'sekundy'
      ],
      'timerBase' => [
        'moment' => 'Okamžik, kdy se událost spustila',
        'formula' => 'Vypočteno podle vzorce'
      ],
      'actionType' => [
        'Approve' => 'Schválit',
        'Review' => 'Posoudit'
      ],
      'assignmentType' => [
        '' => 'Žádný',
        'processAssignedUser' => 'Uživatel přiřazený k procesu',
        'specifiedUser' => 'Zadaný uživatel',
        'rule:Round-Robin' => 'Round-Robin',
        'rule:Least-Busy' => 'Nejméně zaneprázdněn'
      ],
      'startDirection' => [
        '' => 'Auto',
        'r' => 'Doprava',
        'd' => 'Dolů',
        'u' => 'Nahoru',
        'l' => 'Doleva'
      ],
      'messageType' => [
        'Email' => 'Email'
      ]
    ]
  ],
  'BpmnProcess' => [
    'labels' => [
      'Create BpmnProcess' => 'Spustit proces',
      'Stop Process' => 'Zastavit proces',
      'User Tasks' => 'Uživatelské úlohy',
      'Flowcharts' => 'Vývojové diagramy',
      'Interrupt' => 'Přerušit',
      'Reject' => 'Odmítnout',
      'Start flow from here' => 'Začít proces odtud',
      'Reactivate' => 'Reactivate',
      'View Variables' => 'View Variables',
      'View Error' => 'View Error',
      'Error Message' => 'Error Message'
    ],
    'fields' => [
      'status' => 'Status',
      'targetType' => 'Typ cílové entity',
      'target' => 'Cíl',
      'createdEntitiesData' => 'Data vytvořených entit',
      'flowchartData' => 'Data vývojového diagramu',
      'flowchart' => 'Vývojový diagram',
      'flowchartVisualization' => 'Vývojový diagram (vizualizace)',
      'flowchartElementsDataHash' => 'Prvky vývojového diagramu',
      'variables' => 'Proměnné',
      'endedAt' => 'Ukončeno v',
      'startElementId' => 'Počáteční prvek',
      'workflowId' => 'Workflow ID',
      'parentProcess' => 'Nadřazený proces',
      'parentProcessFlowNode' => 'Uzel toku nadřazeného procesu',
      'rootProcess' => 'Root Process'
    ],
    'links' => [
      'flowchart' => 'Vývojový diagram',
      'target' => 'Cíl',
      'flowNodes' => 'Flow Log',
      'userTasks' => 'Zpracovat uživatelské úlohy',
      'childProcesses' => 'Podřízené procesy',
      'parentProcess' => 'Nadřazený proces',
      'parentProcessFlowNode' => 'Parent Process Flow Node'
    ],
    'options' => [
      'status' => [
        'Created' => 'Vytvořeno',
        'Started' => 'Započato',
        'Ended' => 'Ukončeno',
        'Paused' => 'Pozastaveno',
        'Stopped' => 'Zastaveno',
        'Interrupted' => 'Přerušeno'
      ]
    ],
    'presetFilters' => [
      'actual' => 'Aktální',
      'ended' => 'Ukončené'
    ]
  ],
  'BpmnUserTask' => [
    'labels' => [
      'Resolve' => 'Resolve'
    ],
    'fields' => [
      'actionType' => 'Typ akce',
      'resolution' => 'Řešení',
      'target' => 'Cíl',
      'process' => 'Proces',
      'isResolved' => 'Je vyřešen',
      'resolutionNote' => 'Resolution Note',
      'instructions' => 'Instrukce',
      'isCanceled' => 'Je zrušen'
    ],
    'links' => [
      'process' => 'Proces',
      'target' => 'Cíl',
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
      'actual' => 'Aktuální',
      'resolved' => 'Vyřešeno',
      'canceled' => 'Zrušeno'
    ]
  ],
  'Report' => [
    'labels' => [
      'Create Report' => 'Vytvořít zprávu',
      'Run' => 'Spustit',
      'Total' => 'Souhrn',
      'Group Total' => 'Group Total',
      '-Empty-' => '-Prázdný-',
      'Parameters' => 'Parametry',
      'Filters' => 'Filtry',
      'Chart' => 'Diagram',
      'List Report' => 'Seznam reportů',
      'Grid Report' => 'Síť zpráv',
      'days' => 'Dny',
      'never' => 'Nikdy',
      'Get Csv' => 'Získat Csv',
      'EmailSending' => 'Odesílání emailu',
      'View Report' => 'Předváděcí report',
      'Report' => 'Report',
      'AND' => 'AND',
      'OR' => 'OR',
      'NOT' => 'NOT IN',
      'IN' => 'IN',
      'Complex expression' => 'Komplexní výraz',
      'Having' => 'Having',
      'Add AND group' => 'Přidat skupinu AND',
      'Add OR group' => 'Přidat skupinu OR',
      'Add NOT group' => 'Přidat skupinu NOT',
      'Add IN group' => 'Přidat skupinu IN',
      'Add Having group' => 'Add Having group',
      'Add Complex expression' => 'Přidat komplexní výraz',
      'Columns' => 'Sloupce',
      'Send Email' => 'Poslat Email',
      'Results View' => 'Zobrazení výsledků',
      'Create Joint Grid Report' => 'Create Joint Grid Report'
    ],
    'fields' => [
      'type' => 'Typ',
      'entityType' => 'Typ subjektu',
      'description' => 'Popis',
      'groupBy' => 'Skupina podle',
      'columns' => 'Sloupce',
      'orderBy' => 'Seřadit dle',
      'filters' => 'Filtry',
      'runtimeFilters' => 'Časové filtry',
      'chartType' => 'Typ diagramu',
      'emailSendingInterval' => 'Interval',
      'emailSendingTime' => 'Čas',
      'emailSendingUsers' => 'Uživatelé',
      'emailSendingSettingDay' => 'Den',
      'emailSendingSettingMonth' => 'Měsíc',
      'emailSendingSettingWeekdays' => 'Dny',
      'emailSendingDoNotSendEmptyReport' => 'Neodesílejte, pokud je zpráva prázdná',
      'chartColorList' => 'Seznam barev diagramu',
      'chartColor' => 'Barva diagramu',
      'chartOneColumns' => 'Chart Columns',
      'chartOneY2Columns' => 'Chart Secondary Axis Columns',
      'orderByList' => 'Seřadit dle',
      'column' => 'Sloupec',
      'exportFormat' => 'Formát',
      'category' => 'Kategorie',
      'applyAcl' => 'Apply ACL',
      'portals' => 'Portály',
      'joinedReports' => 'Dílčí reporty',
      'joinedReportLabel' => 'Sub-Report Label',
      'data' => 'Data',
      'depth' => 'Hloubka',
      'emailSendingLastDateSent' => 'Poslední datum odeslání',
      'chartColors' => 'Barvy diagramu',
      'isInternal' => 'Interní'
    ],
    'tooltips' => [
      'emailSendingUsers' => 'Výsledek uživatelské zprávy bude odeslán do',
      'chartColorList' => 'Zákaznické barvy pro specifické skupiny',
      'applyAcl' => 'Výsledky reportu budou záviset na přístupu uživatele.',
      'groupBy' => 'Data budou agregována jednou nebo dvěma skupinami. Pokud jsou prázdné, nebudou data agregována, budou zobrazeny pouze součty. \\ N [Složité výrazy] (https://www.espocrm.com/documentation/user-guide/complex-expressions/) lze použít.',
      'columns' => 'Jaká data se mají zobrazit.',
      'runtimeFilters' => 'Další filtry, které budou k dispozici v zobrazení přehledu.',
      'portals' => 'Report bude k dispozici pouze na určených portálech.'
    ],
    'functions' => [
      'COUNT' => 'Spočítat',
      'SUM' => 'Součet',
      'AVG' => 'Průměr',
      'MIN' => 'Min',
      'MAX' => 'Max',
      'YEAR' => 'Rok',
      'QUARTER' => 'Čtvrtletí',
      'MONTH' => 'Měsíc',
      'DAY' => 'Den',
      'WEEK' => 'Týden',
      'YEAR_FISCAL' => 'Fiskální rok',
      'QUARTER_FISCAL' => 'Fiskální čtvrtletí'
    ],
    'orders' => [
      'ASC' => 'Vzestupně',
      'DESC' => 'Sestupně',
      'LIST' => 'Seznam'
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
        'BarHorizontal' => 'Sloupcový (hozintální)',
        'BarVertical' => 'Sloupcový (vertikální)',
        'BarGroupedHorizontal' => 'Bar Grouped (horizontal)',
        'BarGroupedVertical' => 'Bar Grouped (vertical)',
        'Pie' => 'Koláčový',
        'Line' => 'Čárový',
        'Radar' => 'Radar'
      ],
      'emailSendingInterval' => [
        '' => 'Žádný',
        'Daily' => 'Denní',
        'Weekly' => 'Týdenní',
        'Monthly' => 'Měsíční',
        'Yearly' => 'Roční'
      ],
      'emailSendingSettingDay' => [
        32 => 'Poslední den měsíce'
      ],
      'type' => [
        'Grid' => 'Mřížka',
        'List' => 'Seznam',
        'JointGrid' => 'Joint Grid'
      ],
      'function' => [
        '' => 'No Function',
        'custom' => 'Expression',
        'customWithOperator' => 'Expression w/ Operator',
        'DATE_NUMBER' => 'DATUM',
        'MONTH_NUMBER' => 'MĚSÍC',
        'YEAR_NUMBER' => 'TÝDEN',
        'QUARTER_NUMBER' => 'ČTVRTLETÍ',
        'DAYOFWEEK_NUMBER' => 'DEN V TÝDNU',
        'HOUR_NUMBER' => 'HODINA',
        'MINUTE_NUMBER' => 'MINUTA',
        'LOWER' => 'DOLNÍ',
        'UPPER' => 'HORNÍ',
        'TRIM' => 'TRIM',
        'LENGTH' => 'DÉLKA',
        'WEEK_NUMBER_0' => 'TÝDEN (Neděle)',
        'WEEK_NUMBER_1' => 'TÝDEN (Pondělí)',
        'COUNT' => 'COUNT',
        'SUM' => 'SUMA',
        'AVG' => 'AVG',
        'MAX' => 'MAX',
        'MIN' => 'MIN'
      ],
      'operator' => [
        'equals' => 'Rovno',
        'notEquals' => 'Nerovná se',
        'greaterThan' => 'Větší než',
        'lessThan' => 'Méně než',
        'greaterThanOrEquals' => 'Větší nebo rovno',
        'lessThanOrEquals' => 'Méně než nebo rovno',
        'in' => 'In',
        'notIn' => 'Not In',
        'isTrue' => 'Je Pravda',
        'isFalse' => 'Is False',
        'isNull' => 'Je nula',
        'isNotNull' => 'Není nula',
        'like' => 'Like'
      ],
      'exportFormat' => [
        'csv' => 'CSV',
        'xlsx' => 'XLSX (Excel)'
      ],
      'layoutAlign' => [
        'left' => 'Vlevo',
        'right' => 'Vpravo'
      ]
    ],
    'messages' => [
      'notAllowedFormulaInFilter' => 'Formula expression in filters contains a not allowed function.',
      'validateMaxCount' => 'Počet nesmí být větší než {maximální počet}',
      'havingFilterWithoutGroupByError' => 'Having filter can\'t be used without Group-By.',
      'gridReportDescription' => 'Seskupení jednoho nebo dvou sloupců a zobrazení součtu, které lze znázornit jako diagram.',
      'listReportDescription' => 'Jednoduchý přehled zápisů čelících filtračním kritériím  ',
      'sqlSyntaxError' => 'Could not compose a valid SQL from report parameters.',
      'onlyFullGroupByError' => 'Unsupported report parameters. Either change parameters or disable `ONLY_FULL_GROUP_BY` SQL mode in the database config.'
    ],
    'presetFilters' => [
      'list' => 'Seznam',
      'grid' => 'Síť',
      'listTargets' => 'Seznam cílů',
      'listAccounts' => 'Seznam účtů',
      'listContacts' => 'Seznam kontaktů',
      'listLeads' => 'Seznam vedoucích',
      'listUsers' => 'Seznam uživatelů'
    ],
    'errorMessages' => [
      'error' => 'Chyba',
      'noChart' => 'Není vybrán žádný diagram pro zápis',
      'selectReport' => 'Vyberte zápis v liště nastavení'
    ],
    'filtersGroupTypes' => [
      'or' => 'Nebo',
      'and' => 'a',
      'not' => 'Ne z',
      'subQueryIn' => 'V',
      'having' => 'Mající'
    ],
    'layoutFields' => [
      'link' => 'Odkaz',
      'width' => 'Šířka',
      'notSortable' => 'Nelze třídit',
      'exportOnly' => 'Pouze export',
      'align' => 'Zarovnání'
    ],
    'links' => [
      'category' => 'Kategorie',
      'portals' => 'Portály'
    ]
  ],
  'ReportCategory' => [
    'labels' => [
      'Create ReportCategory' => 'Vytvořit kategorii',
      'Manage Categories' => 'Spravovat kategorie',
      'Reports' => 'Reporty'
    ],
    'fields' => [
      'order' => 'Pořadí'
    ],
    'links' => [
      'reports' => 'Reporty'
    ]
  ],
  'ReportFilter' => [
    'labels' => [
      'Create ReportFilter' => 'Vytvořit filtr',
      'Rebuild Filters' => 'Přestavět filtr'
    ],
    'fields' => [
      'order' => 'Pořadí',
      'report' => 'FIltr',
      'entityType' => 'Typ entity',
      'isActive' => 'Je povoleno'
    ],
    'links' => [
      'report' => 'Filtr'
    ],
    'tooltips' => [
      'teams' => 'Týmy, pro které bude filtr k dispozici. Pokud není zadán žádný tým, nebude aplikováno žádné omezení ze strany týmu.',
      'report' => 'Filtry které budou použity pro report'
    ]
  ],
  'ReportPanel' => [
    'labels' => [
      'Create ReportPanel' => 'Vytvořit panel',
      'Rebuild Panels' => 'Obnovit panely'
    ],
    'fields' => [
      'report' => 'Report',
      'entityType' => 'Typ entity',
      'isActive' => 'Je povoleno',
      'type' => 'Typ',
      'reportType' => 'Typ reportu',
      'displayTotal' => 'Zobrazit celkem',
      'displayOnlyTotal' => 'Zobrazit pouze celkem',
      'column' => 'Sloupec',
      'reportEntityType' => 'Typ entity',
      'columnList' => 'Seznam sloupců',
      'dynamicLogicVisible' => 'Podmínky zviditelnění panelu',
      'order' => 'Pořadí',
      'displayType' => 'What to display',
      'useSiMultiplier' => 'SI Multiplier'
    ],
    'links' => [
      'report' => 'Report'
    ],
    'tooltips' => [
      'teams' => 'Týmy, pro které se zobrazí panel. Pokud není zadán žádný tým, nebude aplikováno žádné omezení ze strany týmu.',
      'report' => 'Zpráva, která bude použita pro panel.',
      'order' => '[0..1] - před panelem Stream; \\ n [3..4] - před panely vztahů; [6 ..] - po panelech vztahů'
    ],
    'options' => [
      'type' => [
        'side' => 'Boční',
        'bottom' => 'Spodní'
      ]
    ]
  ],
  'Workflow' => [
    'fields' => [
      'Name' => 'Název',
      'entityType' => 'Cílový subjekt',
      'type' => 'Typ spuštění',
      'isActive' => 'Aktivní',
      'description' => 'Popis',
      'usersToMakeToFollow' => 'Uživatelé k vytvoření sledování záznamu.',
      'whatToFollow' => 'Co sledovat',
      'portalOnly' => 'Pouze portál',
      'portal' => 'Portál',
      'targetReport' => 'Cílová zpráva',
      'scheduling' => 'Plánování',
      'schedulingApplyTimezone' => 'Apply timezone',
      'methodName' => 'Service Method',
      'assignmentRule' => 'Pravidlo přiřazení',
      'targetTeam' => 'Cílový tým',
      'targetUserPosition' => 'Cílová pozice uživatele',
      'listReport' => 'List Report',
      'linkList' => 'Propojte s cílovou entitou prostřednictvím vztahů',
      'linkListShort' => 'Odkazy',
      'target' => 'Cíl',
      'whoFollow' => 'Who make to follow',
      'signalName' => 'Signal',
      'requestType' => 'Typ požadavku',
      'requestUrl' => 'URL',
      'requestContentType' => 'Typ obsahu',
      'requestContent' => 'Payload',
      'requestContentVariable' => 'Payload from variable',
      'optOutLink' => 'Odkaz pro odhlášení',
      'headers' => 'Záhlaví',
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
      'category' => 'Category',
      'actions' => 'Akce'
    ],
    'links' => [
      'portal' => 'Portál',
      'targetReport' => 'Cílová zpráva',
      'workflowLogRecords' => 'Log',
      'category' => 'Category',
      'flowchart' => 'Vývojový diagram'
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
      'requestHeaders' => 'Další záhlaví. \\ NFormát: `` `klíč: hodnota``ʻDostupné zástupné symboly: *` {$ attribute} `* * {$$ variable}`',
      'requestContent' => 'Ve formátu JSON. \\ NDostupné zástupné symboly: * `{$ attribute}` * * {$$ variable} `',
      'requestContentVariable' => 'A variable name. If specified, payload will be taken from the variable.',
      'portalOnly' => 'Pokud zkontrolovaný postup bude spuštěn pouze z portálu ',
      'portal' => 'Speciální portál ke spuštění procesu. V případě potřeby k práci na jiném portálu jej zanechte prázdný.',
      'scheduling' => 'Crontab zápis. Definování frekvence pracovního chodu.

`*/5 * * * *` - každých  minut

`0 */2 * * *` - každé 2 hodiny

`30 1 * * *` - v 01:30 jednou denně

`0 0 1 * *` - první den v měsíci'
    ],
    'labels' => [
      'Create Workflow' => 'Vytvořit pravidla',
      'General' => 'Hlavní',
      'Manual Trigger' => 'Manual Trigger',
      'Conditions' => 'Podmínky',
      'Actions' => 'Akce',
      'All' => 'Všechny',
      'Any' => 'Nějaký',
      'Formula' => 'Vzorec',
      'Email Address' => 'Emailová adresa',
      'Email Template' => 'emailová šablona',
      'From' => 'Od',
      'To' => 'Komu',
      'immediately' => 'Ihned',
      'Reply-To' => 'Reply-To',
      'later' => 'Později',
      'today' => 'teď',
      'plus' => 'Plus',
      'minus' => 'Mínus',
      'days' => 'Dny',
      'hours' => 'Hodiny',
      'months' => 'měsíce',
      'minutes' => 'Minuty',
      'Link' => 'Řádek',
      'Add Field' => 'Přidat pole',
      'equals' => 'Rovno',
      'wasEqual' => 'Bylo rovno',
      'notEquals' => 'Není rovno',
      'wasNotEqual' => 'Nebylo rovno',
      'changed' => 'Změněný',
      'notChanged' => 'not changed',
      'notEmpty' => 'Není prázdný',
      'isEmpty' => 'Prázdný',
      'value' => 'Hodnota',
      'field' => 'Pole',
      'true' => 'Pravda',
      'false' => 'Lež',
      'greaterThan' => 'Větší než',
      'lessThan' => 'Menší než',
      'greaterThanOrEquals' => 'Vetší nebo rovno',
      'lessThanOrEquals' => 'Menší nebo rovno',
      'between' => 'Mezi',
      'on' => 'Na',
      'before' => 'Před',
      'after' => 'Po',
      'beforeToday' => 'Před dneškem',
      'afterToday' => 'Po dnešku',
      'recipient' => 'Příjemce',
      'has' => 'Má',
      'notHas' => 'not has',
      'contains' => 'obsahuje',
      'notContains' => 'neobsahuje',
      'messageTemplate' => 'Položka zprávy',
      'users' => 'Uživatelé',
      'Target Entity' => 'Cílový subjekt',
      'Current' => 'Current',
      'Workflow' => 'Workflow',
      'Workflows Log' => 'Workflows Log',
      'methodName' => 'Service Method',
      'additionalParameters' => 'Další parametry (JSON format)',
      'doNotStore' => 'Neukládat odeslané e-maily',
      'Related' => 'Related',
      'Entity Type' => 'Typ entity',
      'Workflow Rule' => 'Pravidlo workflow',
      'Add Condition' => 'Přidat podmínku',
      'Add Action' => 'Přidat akci',
      'Created' => 'Vytvořeno',
      'Field' => 'Pole',
      'Entity' => 'Subjekt',
      'Process' => 'Proces'
    ],
    'emailAddressOptions' => [
      '' => 'Žádný',
      'currentUser' => 'Běžný uživatel',
      'specifiedEmailAddress' => 'Předepsaná emailová adresa',
      'assignedUser' => 'Přiřazený uživatel',
      'targetEntity' => 'Cílový subjekt',
      'specifiedUsers' => 'Předepsaný uživatel',
      'specifiedContacts' => 'Specifikované kontakty',
      'teamUsers' => 'Týmový uživatel',
      'followers' => 'Další',
      'followersExcludingAssignedUser' => 'Další bez předepsaného uživatele',
      'specifiedTeams' => 'Uživatelé předepsaných týmů',
      'system' => 'Systém',
      'fromOrReplyTo' => 'From/Reply-To address'
    ],
    'options' => [
      'type' => [
        'afterRecordSaved' => 'Po nahrátí uložit',
        'afterRecordCreated' => 'Po nahrátí vytvořit',
        'afterRecordUpdated' => 'Po aktualizaci záznamu',
        'manual' => 'Manual',
        'scheduled' => 'Naplánováno',
        'sequential' => 'Sekvenční',
        'signal' => 'Signal'
      ],
      'subjectType' => [
        'value' => 'Hodnota',
        'field' => 'Pole',
        'today' => 'dnes/nyní',
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
      'sendEmail' => 'Poslat email',
      'createEntity' => 'Vytvořit subjekt',
      'createRelatedEntity' => 'Vytvořit příbuzný subjekt',
      'updateEntity' => 'Aktualizovat subjekt',
      'updateRelatedEntity' => 'Aktualizovat příbuzný subjekt',
      'relateWithEntity' => 'Propojit s jiným záznamem',
      'unrelateFromEntity' => 'Odpojit od jiného záznamu',
      'makeFollowed' => 'Vytvořit další',
      'createNotification' => 'Vytvořit poznámku',
      'triggerWorkflow' => 'Spustit další proces',
      'runService' => 'Spustit servisní akci',
      'applyAssignmentRule' => 'Použít pravidlo přiřazení',
      'updateCreatedEntity' => 'Aktualizovat vytvořený záznam',
      'updateProcessEntity' => 'Aktualizovat záznam procesu',
      'startBpmnProcess' => 'Spusťte proces BPM',
      'sendRequest' => 'Odeslat požadavek HTTP',
      'executeFormula' => 'Execute Formula Script'
    ],
    'texts' => [
      'allMustBeMet' => 'Všechny se musí shodovat',
      'atLeastOneMustBeMet' => 'Alespoň jeden se musí shodovat',
      'formulaInfo' => 'Conditions of any complexity in espo-formula language'
    ],
    'messages' => [
      'jsonInvalid' => 'Není platný JSON.',
      'loopNotice' => 'Pozor na možnost neustálého tvoření smyček skrz větší počet(dvě a více) pravidel workflow.',
      'messageTemplateHelpText' => 'Známé proměnné:

* `{subjekt}` – cílový záznam
* `{uživatel}` – běžný uživatel
* `{$$variable}`'
    ],
    'serviceActions' => [
      'sendEventInvitations' => 'Poslat pozvánky',
      'addQuoteItemList' => 'Přidat položky nabídky',
      'addInvoiceItemList' => 'Přidejte položky faktury',
      'addSalesOrderItemList' => 'Přidejte položky proforma faktury',
      'convertCurrency' => 'Převést měnu',
      'sendInEmail' => 'Odeslat e-mailem',
      'optOut' => 'Odhlášení',
      'generateAndSendPassword' => 'Generovat heslo'
    ],
    'serviceActionsHelp' => [
      'generateAndSendPassword' => 'Bude vygenerováno nové heslo a odesláno na e-mailovou adresu uživatele.',
      'optOut' => 'Volitelný parametr: targetListId. Pokud není zadán, označí odhlášenou e-mailovou adresu. \\ N Příklad: `` {"targetListId": "TARGET_LIST_ID"} `` "',
      'convertCurrency' => 'Volitelný parametr: targetCurrency. Pokud není zadán, převede se na výchozí měnu.',
      'sendInEmail' => 'Parametry: \\ n * templateId - ID šablony PDF * emailTemplateId - ID šablony e-mailu * příjemci (volitelný parametr); ve výchozím nastavení bude odeslána na fakturační kontakt nebo na účet; příklad: `link: account.assignedUserʻExample:` `{" templateId ":" TEMPLATE_ID "," emailTemplateId ":" EMAIL_TEMPLATE_ID "," to ":" link: billingContact "}" "',
      'addQuoteItemList' => 'Příklad: \\ n``` {"itemList": [{"number": 1, "procuctId": "productId", "name": "název produktu", "listPrice": 100, "unitPrice": 100}] } ``',
      'addInvoiceItemList' => 'Příklad: \\ n``` {"itemList": [{"number": 1, "procuctId": "productId", "name": "název produktu", "listPrice": 100, "unitPrice": 100}] } ``',
      'addSalesOrderItemList' => 'Příklad: \\ n``` {"itemList": [{"number": 1, "procuctId": "productId", "name": "název produktu", "listPrice": 100, "unitPrice": 100}] } ``'
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
    'labels' => [
      'Create WorkflowLogRecord' => 'Vytvořit záznam protokolu workflow'
    ],
    'fields' => [
      'target' => 'Cíl',
      'workflow' => 'Workflow'
    ],
    'links' => [
      'target' => 'Cíl',
      'workflow' => 'Workflow'
    ]
  ],
  'RecordRecurrence' => [
    'fields' => [
      'entityType' => 'Typ subjektu',
      'scheduling' => 'Plánování',
      'infinite' => 'Bez datumu ukončení',
      'until' => 'Opakovat do',
      'generateInBatches' => 'Předgenerovávat v dávkách',
      'generateInAdvance' => 'Generovat dopředu na',
      'status' => 'Stav'
    ],
    'labels' => [
      'viewMode' => 'typ zobrazení (kliknutím přepnout)',
      'user-friendly' => 'Uživatelsky přívětivý',
      'advanced' => 'Pokročilý',
      'Create RecordRecurrence' => 'Vytvořit opakování záznamu',
      'Batching' => 'Dávkování',
      'Recurrence' => 'Opakování'
    ],
    'cronLabels' => [
      'months' => [
        0 => 'Ledna',
        1 => 'Února',
        2 => 'Března',
        3 => 'Dubna',
        4 => 'Května',
        5 => 'Června',
        6 => 'Července',
        7 => 'Srpna',
        8 => 'Září',
        9 => 'Října',
        10 => 'Listopadu',
        11 => 'Prosince'
      ],
      'days' => [
        0 => 'Neděli',
        1 => 'Pondělí',
        2 => 'Úterý',
        3 => 'Středu',
        4 => 'Čtvrtek',
        5 => 'Pátek',
        6 => 'Sobotu'
      ],
      'periods' => [
        0 => 'minutu',
        1 => 'hodinu',
        2 => 'den',
        3 => 'týden',
        4 => 'měsíc',
        5 => 'rok'
      ],
      'unsupported' => 'Nepodporovaný cron výraz. Prosím použijte pokročilý typ zobrazení.',
      'Weekdays' => 'Pracovní dny',
      'Weekends' => 'Víkendy',
      'Every' => 'Každ(ou/ý)',
      'on the' => 'na',
      'of' => '',
      'minutes past the hour' => 'minut(u/y)',
      'at' => 'v',
      'st' => '.',
      'nd' => '.',
      'rd' => '.',
      'th' => '.'
    ],
    'options' => [
      'generateInAdvance' => [
        '1_day' => '1 den',
        '2_days' => '2 dny',
        '1_week' => '1 týden',
        '2_weeks' => '2 týdny',
        '1_month' => '1 měsíc',
        '2_months' => '2 měsíce',
        '3_months' => '3 měsíce',
        '6_months' => '6 měsíců',
        '1_year' => '1 rok'
      ],
      'status' => [
        'Draft' => 'Koncept',
        'Active' => 'Aktivní',
        'Completed' => 'Dokončeno'
      ]
    ],
    'tooltips' => [
      'scheduling' => 'Frekvence opakování záznamu

**Uživatelsky přívětivý** mód - jednoduchý na použití, méně flexibilní

**Pokročilý** mód - plně flexibilní, používá cron výraz',
      'generateInAdvance' => 'Časová perioda, po kterou se záznamy dopředu předgenerují'
    ],
    'messages' => [
      'missingDateStart' => 'Opakovaný záznam musí mít vyplněné datum zahájení.',
      'cronExprInvalid' => 'Cron výraz není platný.',
      'batchSizeLimitExceeded' => 'Počet vygenerovaných záznamů v jedné dávce by překročila limit nastavený administrátorem. Nastavte prosím častější dávkování nebo snižte míru opakování.',
      'invalidSchedulingExpression' => 'Neplatný výraz CRON'
    ]
  ],
  'Product' => [
    'labels' => [
      'Create Product' => 'Vytvořit Katalog komponent',
      'Price' => 'Ceny',
      'Categories' => 'Kategorie',
      'Stock Info' => 'Skladové zásoby'
    ],
    'fields' => [
      'name' => 'Název',
      'type' => 'Typ',
      'ean' => 'EAN',
      'url' => 'URL',
      'category' => 'Kategorie',
      'description' => 'Popis',
      'attachments' => 'Přílohy',
      'pricingType' => 'Ceník',
      'priceMargin' => 'Marže',
      'priceMarkup' => 'Přirážka',
      'costPrice' => 'Cena nákladů',
      'costPriceCurrency' => 'Měna ceny nákladů',
      'costPriceConverted' => 'Cena nákladů (převedená)',
      'costPriceWithTax' => 'Cena nákladů s DPH',
      'costPriceWithTaxCurrency' => 'Měna ceny nákladů s DPH',
      'costPriceWithTaxConverted' => 'Cena nákladů s DPH (převedená)',
      'salesPrice' => 'Prodejní cena',
      'salesPriceCurrency' => 'Měna prodejní ceny',
      'salesPriceConverted' => 'Prodejní cena (převedená)',
      'salesPriceWithTax' => 'Prodejní cena s DPH',
      'salesPriceWithTaxCurrency' => 'Měna prodejní ceny s DPH',
      'salesPriceWithTaxConverted' => 'Prodejní cena s DPH (převedená)',
      'taxClass' => 'Daňová třída',
      'taxRate' => 'Daňová sazba',
      'measureUnit' => 'Měrná jednotka',
      'totalReservedQuantity' => 'Celkové rezervované množství',
      'totalWarehouseQuantity' => 'Celkové množství na skladě',
      'totalAvailableQuantity' => 'Celkové dostupné množství',
      'averagePrice' => 'Průměrná cena zásob',
      'totalPrice' => 'Celková cena zásob',
      'productionComposition' => 'Výrobní složení',
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
      'image' => 'Obrázek',
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
      'unitPriceConverted' => 'Unit Price (Converted)',
      'alisId' => 'Alis ID',
      'qrCode' => 'QR kód',
      'priceEndUser' => 'Cena koncového zákazníka',
      'priceRent' => 'Cena renty/měsíc',
      'priceDamage' => 'Cena škody',
      'priceLists' => 'Ceníky',
      'ordered' => 'Objednáno',
      'productionModels' => 'Technologické postupy',
      'priceJesenoCurrency' => 'Price Jeseno',
      'priceJesenoConverted' => 'Price Jeseno',
      'priceJesenoConvertedCurrency' => 'Price Jeseno (Měna)',
      'priceJesenoConvertedConverted' => 'Price Jeseno (Převedeno)',
      'suppliers' => 'Dodavatelé',
      'defaultWarehousePosition' => 'Výchozí skladová pozice'
    ],
    'links' => [
      'category' => 'Kategorie',
      'attachments' => 'Přílohy',
      'taxClass' => 'Daňová třída',
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
      'warehouse' => 'Warehouse',
      'priceLists' => 'Ceníky',
      'productionModels' => 'Technologické postupy'
    ],
    'options' => [
      'type' => [
        'Normal' => 'Běžný',
        'Service' => 'Služba',
        'Warehouse Item' => 'Skladová položka',
        'Product' => 'Výrobek',
        'Material' => 'Material',
        'Component' => 'Komponent'
      ],
      'pricingType' => [
        'No Price' => 'Bez ceny',
        'Fixed Sales Price' => 'Pevná prodejní cena',
        'Markup over Cost' => 'Nákladová přirážka',
        'Profit Margin' => 'Marže',
        'Same as Cost Price' => 'Stejná jako cena nákladů',
        'Same as List' => 'Totožný s ceníkem',
        'Fixed' => 'Stálý',
        'Discount from List' => 'Sleva z ceníku'
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
      'stockable' => 'Naskladnitelné'
    ],
    'tooltips' => [
      'type' => 'Na **skladové položky** se vztahuje skladové řízení',
      'averagePrice' => 'Vážený průměr mezi všemi zásobami',
      'totalPrice' => 'Celková cena zásob'
    ],
    'messages' => [
      'salesPriceRequiredForFixedSalesPrice' => 'Prodejní cena je povinná pro typ cenění \'Pevná prodejní cena\'.',
      'markupRequiredForMarkupOverCost' => 'Přirážka je povinná pro typ cenění \'Obchodní přirážka\'.',
      'costPriceRequiredForMarkupOverCost' => 'Cena nákladů je povinná pro typ cenění \'Obchodní přirážka\'.',
      'marginRequiredForProfitMargin' => 'Marže je povinná pro typ cenění \'Marže\'.',
      'costPriceRequiredForProfitMargin' => 'Cena nákladů je povinná pro typ cenění \'Marže\'.'
    ]
  ],
  'ProductCategory' => [
    'labels' => [
      'Create ProductCategory' => 'Vytvořit kategorii produktu',
      'Manage Categories' => 'Spravovat kategorie',
      'Products' => 'Produkty'
    ],
    'links' => [
      'products' => 'Produkty',
      'warehouses' => 'Warehouses'
    ],
    'fields' => [
      'warehouses' => 'Warehouses',
      'order' => 'Pořadí'
    ]
  ],
  'TaxClass' => [
    'labels' => [
      'Create TaxClass' => 'Vytvořit daňovou třídu'
    ],
    'fields' => [
      'rate' => 'Sazba',
      'name' => 'Název',
      'description' => 'Popis'
    ]
  ],
  'AdvanceDeductionItem' => [
    'fields' => [
      'name' => 'Popis',
      'qty' => 'Počet',
      'quantity' => 'Počet',
      'listPrice' => 'List Price',
      'listPriceWithTax' => 'List Price Tax Inc.',
      'unitPrice' => 'Cena za MJ',
      'unitPriceWithTax' => 'Unit Price Tax Inc.',
      'amount' => 'Celkem bez DPH',
      'amountWithTax' => 'Částka s DPH',
      'taxRate' => 'DPH (%)',
      'product' => 'Produkt',
      'order' => 'Číslo řádku',
      'invoice' => 'Faktura',
      'weight' => 'Hmotnost',
      'unitWeight' => 'Jednotková hmotnost',
      'description' => 'Popis',
      'discount' => 'Sleva (%)',
      'amountConverted' => 'Částka (převedeno)',
      'unitPriceConverted' => 'Jednotková cena (převedeno)',
      'listPriceConverted' => 'List Price (Converted)',
      'account' => 'Account',
      'listPriceCurrency' => 'List Price Currency',
      'unitPriceCurrency' => 'Měna jednotkové ceny',
      'amountCurrency' => 'Částka v měně',
      'invoiceStatus' => 'Invoice Status',
      'taxAmount' => 'DPH',
      'unit' => 'MJ',
      'type' => 'Typ',
      'withTax' => 'S'
    ],
    'links' => [
      'invoice' => 'Faktura',
      'product' => 'Produkt',
      'account' => 'Account'
    ],
    'labels' => [
      'Invoices' => 'Faktury'
    ],
    'options' => [
      'type' => [
        'normal' => 'normalní položka',
        'discount' => 'sleva',
        'advanceDeduction' => 'odpočet zálohy'
      ]
    ]
  ],
  'DeliveryNote' => [
    'fields' => [
      'document' => 'Dokument',
      'number' => 'Č. Dodacího listu',
      'issueDate' => 'Datum vystavení',
      'recieverAddress' => 'Adresa příjemce',
      'recieverAddressStreet' => 'Ulice příjemce',
      'recieverAddressCity' => 'Město příjemce',
      'recieverAddressState' => 'Stát příjemce',
      'recieverAddressCountry' => 'Země příjemce',
      'recieverAddressPostalCode' => 'PSČ příjemce',
      'recieverAddressMap' => 'Mapa příjemce',
      'invoice' => 'Faktura',
      'supplierInvoice' => 'Přijatá faktura'
    ],
    'links' => [
      'document' => 'Dokument',
      'invoice' => 'Faktura',
      'supplierInvoice' => 'Přijatá faktura'
    ],
    'labels' => [
      'Create DeliveryNote' => 'Vytvořit Dodací list'
    ]
  ],
  'GoodsIssue' => [
    'messages' => [
      'goodsIssueIsProcessing' => 'Nelze zrušit objednávku, protože některé výdejky se zpracovávají',
      'reversionName' => 'Vrácení výdejky %s'
    ],
    'fields' => [
      'warehouse' => 'Sklad',
      'selectedItems' => 'Požadované položky',
      'items' => 'Položky',
      'status' => 'Stav',
      'parent' => 'Rodič',
      'reclamation' => 'Reclamation',
      'numberA' => 'Číslo výdejky',
      'name' => 'Popisek'
    ],
    'labels' => [
      'Process' => 'Zpracovat',
      'Create GoodsIssue' => 'Vytvořit výdejku',
      'Create GoodsReceipt' => 'Vytvořit příjemku',
      'Items' => 'Položky',
      'Reserve' => 'Rezervovat',
      'Revert Goods Issue' => 'Vrátit výdejku',
      'Goods Issues' => 'Výdejky'
    ],
    'tooltips' => [
      'selectedItems' => 'Vybrané produkty k vyskladnění.',
      'items' => 'Automaticky vybrané skladové položky podle dostupnosti vybraných položek. Vybere se po rezervaci.'
    ],
    'options' => [
      'status' => [
        'Draft' => 'Návrh',
        'Reserving' => 'Rezervování',
        'Reserved' => 'Rezervováno',
        'Processing' => 'Zpracovává se',
        'Issued' => 'Vyskladněno',
        'Canceled' => 'Zrušeno'
      ]
    ],
    'links' => [
      'parent' => 'Rodič',
      'reclamation' => 'Reclamation'
    ]
  ],
  'HandoverProtocol' => [
    'fields' => [
      'senderAddress' => 'Adresa předávajícího',
      'senderAddressStreet' => 'Ulice předávajícího',
      'senderAddressCity' => 'Město předávajícího',
      'senderAddressState' => 'Stát předávajícího',
      'senderAddressCountry' => 'Země předávajícího',
      'senderAddressPostalCode' => 'PSČ předávajícího',
      'senderAddressMap' => 'Mapa předávajícího',
      'recieverAddress' => 'Adresa přebírajícího',
      'recieverAddressStreet' => 'Ulice přebírajícího',
      'recieverAddressCity' => 'Město přebírajícího',
      'recieverAddressState' => 'Stát přebírajícího',
      'recieverAddressCountry' => 'Země přebírajícího',
      'recieverAddressPostalCode' => 'PSČ přebírajícího',
      'recieverAddressMap' => 'Mapa přebírajícího',
      'printedDate' => 'Vystaveno',
      'hasDocumentation' => 'Dokumentace',
      'customerRegistrationNumber' => 'Ev. č. objednatele',
      'contractorRegistrationNumber' => 'Ev. č. zhotovitele',
      'number' => 'Č. Protokolu',
      'document' => 'Dokument',
      'invoice' => 'Faktura',
      'supplierInvoice' => 'Přijatá faktura',
      'project' => 'Zakázka'
    ],
    'links' => [
      'document' => 'Document',
      'invoice' => 'Faktura',
      'supplierInvoice' => 'Přijatá faktura',
      'project' => 'Zakázka'
    ],
    'labels' => [
      'Create HandoverProtocol' => 'Vytvořit Předávací protokol'
    ]
  ],
  'Invoice' => [
    'labels' => [
      'Create Invoice' => 'Vytvořit Vydanou fakturu',
      'Tax Classes' => 'Daňové třídy',
      'Templates' => 'Šablony',
      'Items' => 'Položky',
      'Email PDF' => 'Email PDF',
      'Invoice Items' => 'Položky faktury',
      'itemDiscount' => 'Item Discount',
      'orderDiscount' => 'Order Discount',
      'Export to ISDOC' => 'Exportovat do ISDOCu',
      'Taxes' => 'Daně',
      'Advance deductions' => 'Odpočty záloh',
      'Totals' => 'Shrnutí',
      'Discount' => 'Sleva',
      'General' => 'Základní údaje',
      'Round' => 'Zaokrouhlení',
      'Record Payment' => 'Zaznamenat platbu',
      'Item Text' => 'Odpočet zálohy {number}',
      'Add Item' => 'Přidat položku',
      'Shipping Providers' => 'Dopravci'
    ],
    'fields' => [
      'status' => 'Stav',
      'number' => 'Číslo',
      'numberA' => 'Číslo (auto-incremented)',
      'account' => 'Organizace',
      'quote' => 'Nabídka',
      'salesOrder' => 'Proforma faktura',
      'billingAddress' => 'Fakturační adresa',
      'shippingAddress' => 'Adresa pro doručení',
      'billingContact' => 'Kontakt',
      'shippingContact' => 'Kontakt pro doručení',
      'taxClass' => 'Daňová třída',
      'taxRate' => 'Sazba daně',
      'shippingCost' => 'Dopravné',
      'taxAmount' => 'Výpočet daně',
      'discountAmount' => 'Částka slevy',
      'amount' => 'Částka',
      'preDiscountedAmount' => 'Částka před slevou',
      'grandTotalAmount' => 'Celková cena',
      'dateInvoiced' => 'Datum vystavení',
      'weight' => 'Hmotnost',
      'amountConverted' => 'Částka (převedeno)',
      'taxAmountConverted' => 'Částka daně (převedeno)',
      'shippingCostConverted' => 'Dopravné (převedeno)',
      'preDiscountedAmountConverted' => 'Částka před slevou (převedeno)',
      'discountAmountConverted' => 'Částka slevy (převedeno)',
      'grandTotalAmountConverted' => 'Celková cena (převedeno)',
      'shippingCostCurrency' => 'Dopravné v měně',
      'taxAmountCurrency' => 'Částka daně v měně',
      'discountAmountCurrency' => 'Částka slevy v měně',
      'amountCurrency' => 'Částka v měně',
      'preDiscountedAmountCurrency' => 'Částka před slevou v měně',
      'grandTotalAmountCurrency' => 'Celková cena v měně',
      'currency' => 'Měna',
      'discount' => 'Sleva',
      'processed' => 'Pohoda Import',
      'constantSymbol' => 'Konstantní symbol',
      'datePaid' => 'Datum úhrady',
      'dueDate' => 'Datum splatnosti',
      'duzp' => 'Datum zdan. plnění',
      'variableSymbol' => 'Variabilní symbol',
      'paymentMethod' => 'Způsob úhrady',
      'orderNumber' => 'Číslo objednávky',
      'remainsToPay' => 'Zbývá uhradit',
      'warehouse' => 'Sklad',
      'note' => 'Soukromá poznámka',
      'textBeforeItems' => 'Věta před položkami faktury',
      'textAfterItems' => 'Patička faktury',
      'reverseCharge' => 'Přenesená DPH',
      'fakturaceDoZahranici' => 'Invoice to foreign country',
      'contact' => 'Kontakt',
      'supplierName' => 'Název / Jméno a příjmení',
      'supplierAddress' => 'Adresa',
      'supplierAddressStreet' => 'Adresa Ulice',
      'supplierAddressCity' => 'Adresa Město',
      'supplierAddressState' => 'Adresa Stát',
      'supplierAddressCountry' => 'Adresa Země',
      'supplierAddressPostalCode' => 'Adresa PSČ',
      'supplierAddressMap' => 'Adresa Mapa',
      'supplierEmail' => 'Email',
      'supplierPhone' => 'Telefon',
      'supplierWebsite' => 'Web',
      'supplierVATpayer' => 'Plátce DPH',
      'supplierVatId' => 'DIČ',
      'supplierSicCode' => 'IČO',
      'subscriberName' => 'Název / Jméno a příjmení',
      'subscriberAddress' => 'Adresa',
      'subscriberAddressStreet' => 'Adresa Ulice',
      'subscriberAddressCity' => 'Adresa Město',
      'subscriberAddressState' => 'Adresa Stát',
      'subscriberAddressCountry' => 'Adresa Země',
      'subscriberAddressPostalCode' => 'Adresa PSČ',
      'subscriberAddressMap' => 'Adresa Mapa',
      'subscriberSicCode' => 'IČO',
      'subscriberVatId' => 'DIČ',
      'subscriberShippingAddress' => 'Doručovací adresa',
      'subscriberShippingAddressCity' => 'Město',
      'subscriberShippingAddressCountry' => 'Země',
      'subscriberShippingAddressMap' => 'Mapa',
      'subscriberShippingAddressPostalCode' => 'PSČ',
      'subscriberShippingAddressState' => 'Kraj',
      'subscriberShippingAddressStreet' => 'Ulice',
      'subscriberBillingAddress' => 'Fakturační adresa',
      'subscriberBillingAddressCity' => 'Město',
      'subscriberBillingAddressCountry' => 'Země',
      'subscriberBillingAddressMap' => 'Mapa',
      'subscriberBillingAddressPostalCode' => 'PSČ',
      'subscriberBillingAddressState' => 'Kraj',
      'subscriberBillingAddressStreet' => 'Ulice',
      'subscriberNote' => 'Poznámka',
      'accountNumber' => 'Číslo účtu',
      'iban' => 'IBAN',
      'swift' => 'SWIFT/BIC',
      'supplyCode' => 'Kód plnění',
      'assignedUser' => 'Přiřazený uživatel / Vystavil',
      'subscriberLink' => 'Odběratel',
      'partialPaymentses' => 'Částečné úhrady',
      'partialPayments' => 'Částečné úhrady',
      'amountRound' => 'Zaokrouhlení celkové částky',
      'vatFromRoundedTotal' => 'Vypočítat DPH ze zaokrouhlení',
      'taxRound' => 'Zaokrouhlení vypočítané hodnoty DPH',
      'amountRoundTo' => 'Zaokrouhlení',
      'payday' => 'Datum splatnosti',
      'shippingCostTaxRate' => 'Daňová sazba dopravného',
      'billingAddressFirstName' => 'Jméno',
      'billingAddressLastName' => 'Příjmení',
      'billingAddressPhoneNumber' => 'Telefon',
      'billingAddressEmail' => 'E-mail',
      'shippingAddressFirstName' => 'Jméno',
      'shippingAddressLastName' => 'Příjmení',
      'shippingAddressPhoneNumber' => 'Telefon',
      'shippingAddressEmail' => 'E-mail',
      'foreignInvoicing' => 'Fakturace do zahraničí',
      'creditNotes' => 'Opravné daňové doklady',
      'revenueReceipts' => 'Příjmové doklady',
      'proformaInvoice' => 'Vydaná zálohová faktura',
      'specificSymbol' => 'Specifický symbol',
      'vatId' => 'DIČ',
      'sicCode' => 'IČ',
      'paidAdvances' => 'Zaplacené zálohy',
      'paid' => 'Zaplaceno',
      'remainingToPay' => 'Zbývá zaplatit',
      'billingAddressMap' => 'Mapa',
      'tax' => 'Daň',
      'itemList' => 'Seznam položek',
      'opportunity' => 'Příležitost',
      'shippingProvider' => 'Dopravce',
      'items' => 'Položky'
    ],
    'links' => [
      'items' => 'Položky',
      'billingContact' => 'Fakturační kontakt',
      'shippingContact' => 'Kontakt pro doručení',
      'account' => 'Organizace',
      'taxClass' => 'Daňová třída',
      'quote' => 'Nabídka',
      'salesOrder' => 'Proforma faktura',
      'subscriberLink' => 'Odběratel',
      'partialPaymentses' => 'Partial Paymentses',
      'partialPayments' => 'Partial Payments',
      'creditNotes' => 'Opravné daňové doklady',
      'revenueReceipts' => 'Příjmové doklady',
      'proformaInvoices' => 'Zálohové faktury',
      'payments' => 'Přijaté platby',
      'opportunity' => 'Příležitost',
      'shippingProvider' => 'Dopravce',
      'tax' => 'Daň'
    ],
    'options' => [
      'status' => [
        'Draft' => 'Návrh',
        'In Review' => 'V procesu',
        'Confirmed' => 'Potvrzeno',
        'Paid' => 'Zaplaceno',
        'Rejected' => 'Zamítnuto',
        'Canceled' => 'Zrušeno',
        'Issued' => 'Vystavená',
        'Sent' => 'Odeslaná',
        'Partially Paid' => 'Částečně uhrazená'
      ],
      'supplierVATpayer' => [
        'Non VAT payer' => 'Neplátce DPH',
        'Identified person' => 'Identifikovaná osoba',
        'VAT payer' => 'Plátce DPH'
      ],
      'supplyCode' => [
        '' => 'Pro hlášení o fakturách v přenesené daňové povinnosti',
        1 => '1 – Dodání zlata (plnění podle § 92b)',
        '1a' => '1a – Zlato – zprostředkování dodání investičního zlata',
        3 => '3 – Dodání nemovité věci, pokud se při tomto dodání uplatní daň (plnění podle § 92d)',
        '3a' => '3a – Dodání nemovité věci v nuceném prodeji',
        4 => '4 – Poskytnutí stavebních nebo montážních prací (plnění podle § 92e)',
        '4a' => '4a – Stavební a montážní práce – poskytnutí pracovníků',
        5 => '5 – Zboží uvedené v příloze č. 5 zákona o DPH (plnění podle § 92c)',
        6 => '6 – Dodání zboží poskytnutého původně jako záruka',
        7 => '7 – Dodání zboží po postoupení výhrady vlastnictví',
        11 => '11 – Převod povolenek na emise skleníkových plynů',
        12 => '12 – Obiloviny a technické plodiny',
        13 => '13 – Kovy, včetně drahých kovů',
        14 => '14 – Mobilní telefony',
        15 => '15 – Integrované obvody a desky plošných spojů',
        16 => '16 – Přenosná zařízení pro automatizované zpracování dat (např. tablety či laptopy)',
        17 => '17 – Videoherní konzole',
        18 => '18 – Dodání certifikátů elektřiny',
        19 => '19 – Dodání elektřiny soustavami nebo sítěmi obchodníkovi',
        20 => '20 – Dodání plynu soustavami nebo sítěmi obchodníkovi',
        21 => '21 – Poskytnutí vymezených služeb elektronických komunikací',
        'foreign' => 'pro Souhrnné hlášení DPH',
        '0eu' => '0 – Dodání zboží plátci DPH do EU',
        '1eu' => '1 – Přemístění obchodního majetku plátcem do EU',
        '2eu' => '2 – Dodání zboží uvnitř EU – třístranný obchod',
        '3eu' => '3 – Poskytnutí služby s místem plnění v EU – přenesená DPH'
      ],
      'amountRound' => [
        'dontRound' => 'Nezaokrouhlovat',
        'RoundUp' => 'RoundUp',
        'RoundDown' => 'RoundDown',
        'upRound' => 'Zaokrouhlit nahoru',
        'downRound' => 'Zaokrouhlit dolů',
        'mathRound' => 'Zaokrouhli matematicky'
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
        'allRound.1' => 'Zaokr. DPH v každé sazbě, mat. na 10h',
        'allRound.5' => 'Zaokr. DPH v každé sazbě, mat. na 50h',
        'allRound1' => 'Zaokr. DPH v každé sazbě, mat. na koruny',
        'itesRound.1' => 'Matematicky zaokroulit na 10h',
        'itesRound.5' => 'Matematicky zaokroulit na 50h',
        'itesRound1' => 'Matematicky zaokroulit na koruny',
        'dontRound' => 'DPH nezaokrouhlovat'
      ],
      'amountRoundTo' => [
        'decimals' => 'Na desetníky',
        'fifties' => 'Na padesátníky',
        'whole' => 'Na koruny'
      ],
      'paymentMethod' => [
        'bank' => 'Převodem',
        'card' => 'Kartou',
        'cash' => 'Hotově',
        'cod' => 'Dobírka'
      ]
    ],
    'tooltips' => [
      'number' => 'Unikátní identifikátor faktury, který slouží k identifikaci vystaveného dokladu',
      'paymentMethod' => 'Způsob, jakým bude faktura uhrazena (např. převodem, hotově, kartou apod.)',
      'dateInvoiced' => ' Datum, kdy byla faktura vystavena',
      'dueDate' => 'Datum, do kdy musí být faktura uhrazena',
      'constantSymbol' => 'Unikátní identifikátor subjektu v daném platebním systému. Maximální délka je 10 znaků.',
      'duzp' => 'Datum, kdy byla uskutečněna zdanitelná služba nebo prodej, pro který byla faktura vystavena.',
      'variableSymbol' => 'Variabilní symbol se používá k identifikaci faktury v bankovním systému. Maximální délka je 10 znaků.',
      'specificSymbol' => ' Je to často označení sloužící k jednoznačné identifikaci faktury mezi různými subjekty. Symbol může například obsahovat kombinaci čísel, písmen nebo znaků.'
    ],
    'massActions' => [
      'zipIsdocs' => 'Exportovat do ISDOCu (.zip)'
    ],
    'presetFilters' => [
      'actual' => 'Aktuální',
      'paid' => 'Zaplacené'
    ]
  ],
  'InvoiceItem' => [
    'fields' => [
      'name' => 'Název',
      'qty' => 'Množství',
      'quantity' => 'Množství',
      'listPrice' => 'Katalogová cena',
      'listPriceWithTax' => 'List Price Tax Inc.',
      'unitPrice' => 'Jednotková cena',
      'unitPriceWithTax' => 'Unit Price Tax Inc.',
      'amount' => 'Částka',
      'amountWithTax' => 'Částka s DPH',
      'taxRate' => 'Sazba daně',
      'product' => 'Produkt',
      'order' => 'Číslo řádku',
      'invoice' => 'Faktura',
      'weight' => 'Hmotnost',
      'unitWeight' => 'Jednotková hmotnost',
      'description' => 'Popis',
      'discount' => 'Sleva (%)',
      'amountConverted' => 'Částka (převedeno)',
      'unitPriceConverted' => 'Jednotková cena (převedeno)',
      'listPriceConverted' => 'Katalogová cena (převedeno)',
      'account' => 'Organizace',
      'listPriceCurrency' => 'Měna katalogové ceny',
      'unitPriceCurrency' => 'Měna jednotkové ceny',
      'amountCurrency' => 'Částka v měně',
      'invoiceStatus' => 'Stav faktury',
      'unit' => 'MJ',
      'taxAmount' => 'DPH',
      'type' => 'Typ',
      'withTax' => 'S'
    ],
    'links' => [
      'invoice' => 'Faktura',
      'product' => 'Produkt',
      'account' => 'Organizace'
    ],
    'labels' => [
      'Invoices' => 'Faktury',
      'Create InvoiceItem' => 'Vytvořit položku faktury'
    ],
    'options' => [
      'type' => [
        'normal' => 'normalní položka',
        'discount' => 'sleva',
        'advanceDeduction' => 'odpočet zálohy'
      ]
    ]
  ],
  'PurchaseOrder' => [
    'labels' => [
      'Create PurchaseOrder' => 'Vytvořit nákupní objednávku',
      'Tax Classes' => 'Daňové třídy',
      'Templates' => 'Šablony',
      'Items' => 'Položky',
      'Email PDF' => 'Email PDF',
      'Sales Order Items' => 'Sales Order Items',
      'Totals' => 'Shrnutí'
    ],
    'fields' => [
      'status' => 'Status',
      'number' => 'Číslo objednávky',
      'numberA' => 'Číslo objednávky (automatické)',
      'account' => 'Organizace',
      'billingAddress' => 'Fakturační adresa',
      'shippingAddress' => 'Dodací adresa',
      'billingContact' => 'Fakturační kontakt',
      'shippingContact' => 'Kontakt pro doručení',
      'taxCLass' => 'Tax Class',
      'taxRate' => 'Sazba daně',
      'taxAmount' => 'Výpočet daně',
      'discountAmount' => 'Částka slevy',
      'amount' => 'Částka',
      'preDiscountedAmount' => 'Částka před slevou',
      'grandTotalAmount' => 'Celková cena',
      'dateOrdered' => 'Datum objednávky',
      'weight' => 'Hmotnost',
      'amountConverted' => 'Částka (převedeno)',
      'taxAmountConverted' => 'Částka daně (převedeno)',
      'shippingCostConverted' => 'Dopravné (převedeno)',
      'preDiscountedAmountConverted' => 'Částka před slevou (převedeno)',
      'discountAmountConverted' => 'Částka slevy (převedeno)',
      'grandTotalAmountConverted' => 'Celková cena (převedeno)',
      'shippingCostCurrency' => 'Dopravné v měně',
      'taxAmountCurrency' => 'Částka daně v měně',
      'discountAmountCurrency' => 'Částka slevy v měně',
      'amountCurrency' => 'Částka v měně',
      'preDiscountedAmountCurrency' => 'Částka před slevou v měně',
      'grandTotalAmountCurrency' => 'Celková cena v měně',
      'currency' => 'Měna',
      'taxClass' => 'Daňová třída',
      'paymentMethod' => 'Způsob úhrady'
    ],
    'links' => [
      'items' => 'Položky',
      'billingContact' => 'Kontakt',
      'shippingContact' => 'Konktakt pro doručení',
      'account' => 'Organizace',
      'taxClass' => 'Daňová třída',
      'invoices' => 'Vydané faktury',
      'quote' => 'Nabídka',
      'supplierInvoices' => 'Přijaté faktury'
    ],
    'options' => [
      'status' => [
        'Draft' => 'Návrh',
        'Ready' => 'Připraveno',
        'Active' => 'Aktivní',
        'Approved' => 'Schváleno',
        'Completed' => 'Dokončeno',
        'Rejected' => 'Zamítnuto',
        'Canceled' => 'Zrušeno'
      ],
      'paymentMethod' => [
        'bank' => 'Převodem',
        'card' => 'Kartou',
        'cash' => 'Hotově',
        'cod' => 'Dobírka'
      ]
    ]
  ],
  'PurchaseOrderItem' => [
    'fields' => [
      'name' => 'Popis',
      'qty' => 'Počet',
      'quantity' => 'Počet',
      'unitPrice' => 'Cena za MJ',
      'unitPriceWithTax' => 'Unit Price Tax Inc.',
      'amount' => 'Celkem bez DPH',
      'amountWithTax' => 'Částka s DPH',
      'taxRate' => 'DPH (%)',
      'product' => 'Produkt',
      'order' => 'Číslo řádku',
      'purchaseOrder' => 'Nákupní objednávka',
      'weight' => 'Hmotnost',
      'unitWeight' => 'Jednotková hmotnost',
      'description' => 'Popis',
      'discount' => 'Sleva (%)',
      'amountConverted' => 'Částka (převedeno)',
      'unitPriceConverted' => 'Jednotková cena (převedeno)',
      'listPriceConverted' => 'List Price (Converted)',
      'account' => 'Account',
      'listPriceCurrency' => 'List Price Currency',
      'unitPriceCurrency' => 'Měna jednotkové ceny',
      'amountCurrency' => 'Částka v měně',
      'taxAmount' => 'DPH',
      'unit' => 'MJ',
      'type' => 'Typ',
      'withTax' => 'S'
    ],
    'links' => [
      'purchaseOrder' => 'Nákupní objednávka',
      'product' => 'Produkt',
      'account' => 'Account'
    ],
    'labels' => [
      'Purchase Orders' => 'Nákupní objednávky'
    ],
    'options' => [
      'type' => [
        'normal' => 'normalní položka',
        'discount' => 'sleva'
      ]
    ]
  ],
  'Quote' => [
    'labels' => [
      'Create Quote' => 'Vytvořit nabídku',
      'Tax Classes' => 'Daňové třídy',
      'Templates' => 'Šablony',
      'Items' => 'Položky',
      'Email PDF' => 'Odeslat PDF mailem',
      'Quote Items' => 'Položky nabídky',
      'Select Sales Order Items' => 'Vyberte položky zakázky',
      'Select' => 'Vybrat',
      'Convert to Sales Order' => 'Převést na zakázku',
      'Totals' => 'Shrnutí'
    ],
    'fields' => [
      'status' => 'Stav',
      'number' => 'Číslo nabídky',
      'numberA' => 'Číslo nabídky (auto-incremented)',
      'account' => 'Firma',
      'billingAddress' => 'Fakturační adresa',
      'shippingAddress' => 'Dodací adresa',
      'billingContact' => 'Fakturační kontakt',
      'shippingContact' => 'Kontakt na dopravce',
      'taxCLass' => 'Tax Class',
      'taxRate' => 'Sazba daně',
      'shippingCost' => 'Částka za dopravu',
      'taxAmount' => 'Částka daně',
      'discountAmount' => 'Částka slevy',
      'amount' => 'Částka',
      'preDiscountedAmount' => 'Částka před slevou',
      'grandTotalAmount' => 'Celková cena',
      'dateQuoted' => 'Datum nabídky',
      'dateOrdered' => 'Datum objednání',
      'dateInvoiced' => 'Date Invoiced',
      'weight' => 'Hmotnost',
      'amountConverted' => 'Částka (převedeno)',
      'taxAmountConverted' => 'Částka daně (převedená)',
      'shippingCostConverted' => 'Přepravní náklady (převedené)',
      'preDiscountedAmountConverted' => 'Částka před slevou (převedená)',
      'discountAmountConverted' => 'Částka slevy (převedená)',
      'grandTotalAmountConverted' => 'Celková částka (převedená)',
      'shippingCostCurrency' => 'Přepravní náklady',
      'taxAmountCurrency' => 'Částka daně v měně',
      'discountAmountCurrency' => 'Částka slevy v měně',
      'amountCurrency' => 'Částka v měně',
      'preDiscountedAmountCurrency' => 'Částka před slevou, v měně',
      'grandTotalAmountCurrency' => 'Celková částka',
      'currency' => 'Měna',
      'validUntil' => 'Platnost nabídky',
      'parentQuote' => 'Nabídka',
      'alisSolution' => 'ALIS řešení',
      'documents' => 'Dokumenty',
      'parent' => 'Parent',
      'businessProject' => 'Zakázka',
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
      'useCases' => 'Use Cases',
      'taxClass' => 'Daňová třída',
      'shippingCostTaxRate' => 'Daňová sazba dopravného',
      'billingAddressMap' => 'Mapa',
      'shippingAddressMap' => 'Mapa (doručovací)',
      'name' => 'Interní název'
    ],
    'links' => [
      'items' => 'Položky',
      'billingContact' => 'Kontakt',
      'shippingContact' => 'Konktakt pro doručení',
      'account' => 'Firma',
      'taxClass' => 'Daňová třída',
      'invoices' => 'Faktury',
      'salesOrders' => 'Proforma faktury',
      'quoteProject' => 'Projekty',
      'parentQuote' => 'Nabídka',
      'documents' => 'Dokumenty',
      'parent' => 'Parent',
      'businessProject' => 'Zakázka',
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
      'useCases' => 'Use case + produkty',
      'manufacturings' => 'Manufacturing',
      'shippingProvider' => 'Dopravce'
    ],
    'options' => [
      'status' => [
        'Draft' => 'Rozpracovaná',
        'In Review' => 'Čeká na schválení',
        'Presented' => 'Prezentovaná',
        'Approved' => 'Schválená',
        'Rejected' => 'Modifikovaná',
        'Canceled' => 'Zrušená',
        'On Hold' => 'Odložená',
        'Rejected - with changes' => 'Zamítnutá - změna zadání',
        'Rejected - price' => 'Zamítnutá - cena (přeceněna se slevou)',
        'Lost' => 'Prohraná',
        'Informative' => 'Orientační'
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
      'name' => 'Název',
      'qty' => 'Množství',
      'quantity' => 'Množství',
      'listPrice' => 'Katalogová cena',
      'listPriceWithTax' => 'Katalogová cena s DPH',
      'unitPrice' => 'Cena za MJ',
      'unitPriceWithTax' => 'Cena za MJ s DPH',
      'amount' => 'Celkem bez DPH',
      'amountWithTax' => 'Celkem s DPH',
      'taxRate' => 'Sazba daně',
      'product' => 'Produkt',
      'order' => 'Číslo řádku',
      'quote' => 'Nabídka',
      'weight' => 'Hmotnost',
      'unitWeight' => 'Jednotková hmotnost',
      'description' => 'Popis',
      'discount' => 'Sleva (%)',
      'amountConverted' => 'Částka (převedeno)',
      'unitPriceConverted' => 'Jednotková cena (převedeno)',
      'listPriceConverted' => 'Katalogová cena (převedeno)',
      'account' => 'Organizace',
      'listPriceCurrency' => 'Měna katalogové ceny',
      'unitPriceCurrency' => 'Měna jednotkové ceny',
      'amountCurrency' => 'Částka v měně',
      'colisionPlace' => 'Kolizní místo',
      'unit' => 'Jednotka',
      'quote1' => 'Nabídka',
      'files' => 'Přílohy',
      'products' => 'Products',
      'kod' => 'Name',
      'productDescription' => 'ProductDescription',
      'invoiceStatus' => 'Stav faktury',
      'withTax' => 'S',
      'taxAmount' => 'DPH',
      'quoteStatus' => 'Stav nabídky',
      'processed' => 'Z'
    ],
    'links' => [
      'Quote' => 'Quote',
      'product' => 'Produkt',
      'account' => 'Organizace',
      'quote1' => 'Nabídka',
      'products' => 'Products',
      'quote' => 'Nabídka'
    ],
    'labels' => [
      'Quotes' => 'Nabídky',
      'Create QuoteItem' => 'Vytvořit položku nabídky'
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
      'Create SalesOrder' => 'Vytvořit zakázku',
      'Tax Classes' => 'Daňové třídy',
      'Templates' => 'Šablony',
      'Items' => 'Položky',
      'Email PDF' => 'Email PDF',
      'Sales Order Items' => 'Položky zakázky',
      'ProcessSalesOrder' => 'Zpracovat objednávku',
      'Totals' => 'Shrnutí',
      'Time On' => 'Zapnout čas',
      'Time Off' => 'Vypnout čas'
    ],
    'fields' => [
      'status' => 'Status',
      'quote' => 'Nabídka',
      'number' => 'Číslo zakázky',
      'numberA' => 'Číslo objednávky (automatické)',
      'account' => 'Firma',
      'billingAddress' => 'Fakturační adresa',
      'shippingAddress' => 'Doručovací adresa',
      'billingContact' => 'Fakturační kontakt',
      'shippingContact' => 'Kontakt pro doručení',
      'taxCLass' => 'Tax Class',
      'taxRate' => 'Sazba daně',
      'shippingCost' => 'Dopravné',
      'taxAmount' => 'Výpočet daně',
      'discountAmount' => 'Částka slevy',
      'amount' => 'Částka',
      'preDiscountedAmount' => 'Částka před slevou',
      'grandTotalAmount' => 'Celková cena',
      'dateOrdered' => 'Datum přijetí',
      'weight' => 'Hmotnost',
      'amountConverted' => 'Částka (převedeno)',
      'taxAmountConverted' => 'Částka daně (převedeno)',
      'shippingCostConverted' => 'Dopravné (převedeno)',
      'preDiscountedAmountConverted' => 'Částka před slevou (převedeno)',
      'discountAmountConverted' => 'Částka slevy (převedeno)',
      'grandTotalAmountConverted' => 'Celková cena (převedeno)',
      'shippingCostCurrency' => 'Dopravné v měně',
      'taxAmountCurrency' => 'Částka daně v měně',
      'discountAmountCurrency' => 'Částka slevy v měně',
      'amountCurrency' => 'Částka v měně',
      'preDiscountedAmountCurrency' => 'Částka před slevou v měně',
      'grandTotalAmountCurrency' => 'Celková cena v měně',
      'currency' => 'Měna',
      'shippingCostTaxRate' => 'Daňová sazba dopravného',
      'vatId' => 'DIČ',
      'sicCode' => 'IČ',
      'deadline' => 'Deadline',
      'salesOrderSummaryItems' => 'Položka shrnutí zakázky',
      'opportunity' => 'Poptávka',
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
      'order' => 'Objednávka',
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
      'manufacturings' => 'Výroba',
      'taxClass' => 'Daňová třída',
      'paymentMethod' => 'Způsob úhrady',
      'billingAddressFirstName' => 'Jméno',
      'billingAddressLastName' => 'Příjmení',
      'billingAddressPhoneNumber' => 'Telefon',
      'billingAddressEmail' => 'E-mail',
      'shippingAddressFirstName' => 'Jméno',
      'shippingAddressLastName' => 'Příjmení',
      'shippingAddressPhoneNumber' => 'Telefon',
      'shippingAddressEmail' => 'E-mail',
      'productionStatus' => 'Stav výroby',
      'internalDeadline' => 'Interní deadline',
      'onHoldTime' => 'Čas ve stavu On Hold',
      'productionOrders' => 'Výrobní příkazy',
      'users' => 'Uživatelé',
      'alert' => 'Upozornění',
      'responsiblePerson' => 'Zodpovědná osoba',
      'industrySector' => 'Průmyslové odvětví',
      'toInstall' => 'Instalace (ano/ne)',
      'businessProjectTasks' => 'Úkoly',
      'parentOrganization' => 'Firma',
      'parentQuote' => 'Nabídka',
      'order1' => 'Objednávka',
      'orderFile' => 'Přijatá objednávka',
      'expectedInstallationDate' => 'Datum instalace',
      'companies' => 'Firma',
      'bOnumber' => 'Číslo zakázky',
      'approvalDate' => 'Datum přijetí',
      'billingAdress' => 'Fakturační adresa',
      'billingAdressStreet' => 'Fakturační adresa Ulice',
      'billingAdressCity' => 'Fakturační adresa Město',
      'billingAdressState' => 'Fakturační adresa Stát',
      'billingAdressCountry' => 'Fakturační adresa Země',
      'billingAdressPostalCode' => 'Fakturační adresa PSČ',
      'billingAdressMap' => 'Fakturační adresa Mapa',
      'accounts' => 'Firma',
      'account1' => 'Account1',
      'requestForms' => 'Žádanky na nákup',
      'cisloObj' => 'Číslo objednávky',
      'deliveryNote' => 'Dodací list',
      'faktura' => 'Faktura',
      'predavaciProtokol' => 'Předávací protokol',
      'start' => 'Plánované zahájení',
      'endDate' => 'Dokončeno',
      'logTimes' => 'Instalace',
      'vO' => 'Vydaná objednávka',
      'deliveryNoteNumber' => 'ČÍslo dodacího listu',
      'quoteNumber' => 'ČÍslo nabídky',
      'orders' => 'Orders',
      'typeAB' => 'Typ plánování',
      'priority' => 'Priorita',
      'parcelService' => 'Doprava',
      'parcelServiceProvider' => 'Dopravce',
      'parcelTrackingNumber' => 'Trackovací číslo',
      'parcelSent' => 'Balík odeslán',
      'parcelLabel' => 'Štítek',
      'shippingAddressStreet' => 'Doručovací adresa Ulice',
      'shippingAddressCity' => 'Doručovací adresa Město',
      'shippingAddressState' => 'Doručovací adresa Stát',
      'shippingAddressCountry' => 'Doručovací adresa Země',
      'shippingAddressPostalCode' => 'Doručovací adresa PSČ',
      'shippingAddressMap' => 'Doručovací adresa Mapa',
      'account2' => 'Adresát',
      'documents1' => 'Documents1',
      'qualityReport' => 'Vytvořit 8D Report',
      'documentFolder' => 'Složka dokumentů',
      'contact' => 'Kontakt',
      'orderAmount' => 'Částka objednávky',
      'orderAmountCurrency' => 'Částka objednávky (Měna)',
      'orderAmountConverted' => 'Částka objednávky (Převedeno)',
      'ready2goBanner' => 'Budeme instalovat',
      'manufacturingReady' => 'Dokončení výroby',
      'rentDeadline' => 'Vrácení zápůjčky',
      'invoiceNumber' => 'Číslo faktury',
      'businessProjectsRight' => 'Business Projects Right',
      'businessProjectsLeft' => 'Business Projects Left',
      'businessProjects' => 'Business Projects',
      'businessProjectParent' => 'Business Project Parent',
      'deliveryNoteDate' => 'Datum vystavení dodacího listu',
      'readyToGoBanner' => 'Budeme instalovat',
      'projectorDatabases' => 'Projector Databases',
      'projectorDatabases1' => 'Databáze projektorů',
      'testovaciEntita' => 'Testovaci Entita',
      'testovaciEntitas' => 'Testovaci Entitas',
      'projectorDatabase' => 'Projector Database',
      'personalCollection' => 'Osobní odběr',
      'productDatabases1' => 'Product Databases1',
      'fooField' => 'FooField',
      'obodovanivyroby' => 'Obodování',
      'product' => 'Product',
      'componentss' => 'Componentss',
      'progress' => 'Procento dokončení',
      'reclamations' => 'Reklamace',
      'reklamace' => 'Reklamace'
    ],
    'links' => [
      'items' => 'Položky',
      'billingContact' => 'Kontakt',
      'shippingContact' => 'Konktakt pro doručení',
      'account' => 'Organizace',
      'taxClass' => 'Daňová třída',
      'invoices' => 'Vydané faktury',
      'quote' => 'Nabídka',
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
      'manufacturings' => 'Manufacturings',
      'productionOrders' => 'Výrobní příkazy',
      'reclamations' => 'Reklamace'
    ],
    'options' => [
      'status' => [
        'Draft' => 'Předloženo',
        'Ready' => 'Připraveno',
        'Active' => 'Aktivní',
        'Approved' => 'Schváleno',
        'Completed' => 'Dokončeno',
        'Rejected' => 'Zamítnuto',
        'Canceled' => 'Zrušeno',
        'Not Started' => 'Nezahájená',
        'In Production' => 'Ve výrobě',
        'Ready To Go' => 'Ready To Go',
        'To Install' => 'Ready to go',
        'OnHold' => 'OnHold',
        'Invoice' => 'Fakturování',
        'Finished' => 'Dokončená',
        'Returned' => 'V reklamaci',
        'Zapujcka' => 'Zápůjčeno',
        'Cancelled' => 'Zrušeno',
        'Special' => 'Special',
        'Waiting' => 'On Hold',
        'Submitted' => 'Předloženo'
      ],
      'paymentMethod' => [
        'bank' => 'Převodem',
        'card' => 'Kartou',
        'cash' => 'Hotově',
        'cod' => 'Dobírka'
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
      ],
      'productionStatus' => [
        'ToDo' => 'To Do',
        'OnHold' => 'On Hold',
        'HW' => 'HW',
        'SW' => 'FW / SW',
        'Testing' => 'Testování',
        'Done' => 'Hotovo',
        'Archive' => 'Archiv',
        'NearLaunch' => 'Před zahájením',
        'Backlog' => 'Backlog'
      ],
      'orderBanner' => [
        '' => '',
        'KAVAN' => 'KAVAN',
        'Kavan ordered' => 'Kavan objednáno',
        'HOTRON' => 'HOTRON',
        'order' => 'OBJEDNAT v pozn.',
        'Edison' => 'Edison',
        'Edison ordered' => 'Edison objednáno',
        'Doručeno' => 'Doručeno',
        'Ze skladu' => 'Ze skladu',
        'laser PV' => 'Edison laser',
        'Edison / laser PV' => 'Edison / laser PV',
        'Edison laser' => 'Edison laser',
        'Edison design&laser' => 'Edison design&laser',
        'PV design & Edison laser' => 'PV design & Edison laser',
        'PV design & PV laser' => 'PV design & PV laser'
      ],
      'alert' => [
        'To Install' => 'Instalace',
        'Returned' => 'Vyřízená reklamace',
        'Special' => 'Special',
        'Rent' => 'Zápůjčka'
      ],
      'industrySector' => [
        '-' => '-',
        'automotive' => 'Automotive industry',
        'heavy' => 'Heavy industry',
        'food' => 'Food industry',
        'chemical' => 'Chemical industry',
        'logistic' => 'Logistic industry',
        'warehousing' => 'Warehousing industry',
        'minning' => 'Minning industry',
        'energy' => 'Energy industry',
        'transport' => 'Transport industry',
        'other' => 'Other'
      ],
      'obodovanivyroby' => [
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
      'parcelServiceProvider' => [
        'GLS' => 'GLS',
        'DBSchenker' => 'DB Schenker',
        'DHLexpress' => 'DHL Express',
        'JOPPAlogistics' => 'JOPPA Logistics',
        'TNT' => 'TNT',
        'DPD' => 'DPD',
        'UPS' => 'UPS',
        'jiné' => 'jiné'
      ],
      'typeAB' => [
        'undefined' => 'Nepřiřazeno',
        'A' => 'A',
        'B' => 'B'
      ]
    ],
    'confirmation' => [
      'processSalesOrderConfirmation' => 'Jste si jisti, že chcete zpracovat tuto objednávku?'
    ],
    'messages' => [
      'processSalesOrderSuccess' => 'Objednávka byla úspěšně zpracována.',
      'processSalesOrderFailed' => 'Objednávka nemohla být zpracována.'
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
      'name' => 'Název',
      'qty' => 'Množství',
      'quantity' => 'Množství',
      'listPrice' => 'Katalogová cena',
      'listPriceWithTax' => 'Katalogová cena s DPH',
      'unitPrice' => 'Jednotková cena',
      'unitPriceWithTax' => 'Cena za MJ s DPH',
      'amount' => 'Částka',
      'amountWithTax' => 'Celkem s DPH',
      'taxRate' => 'Sazba daně',
      'product' => 'Produkt',
      'order' => 'Číslo řádku',
      'salesOrder' => 'Zakázka',
      'weight' => 'Hmotnost',
      'unitWeight' => 'Jednotková hmotnost',
      'description' => 'Popis',
      'discount' => 'Sleva (%)',
      'amountConverted' => 'Částka (převedeno)',
      'unitPriceConverted' => 'Jednotková cena (převedeno)',
      'listPriceConverted' => 'Katalogová cena (převedeno)',
      'account' => 'Organizace',
      'listPriceCurrency' => 'Měna katalogové ceny',
      'unitPriceCurrency' => 'Měna jednotkové ceny',
      'amountCurrency' => 'Měna částky',
      'files' => 'Dokumenty',
      'salesOrder1' => 'Sales Order1',
      'salesOrderView' => 'Sales OrderView',
      'salesOrder12' => 'Sales Order12',
      'kod' => 'Kod',
      'unit' => 'Jednotka',
      'productDescription' => 'ProductDescription',
      'invoiceStatus' => 'Stav faktury',
      'withTax' => 'S daní',
      'taxAmount' => 'DPH',
      'salesOrderStatus' => 'Stav proforma faktury'
    ],
    'links' => [
      'SalesOrder' => 'Sales Order',
      'product' => 'Produkt',
      'account' => 'Organizace',
      'salesOrder1' => 'Sales Order1',
      'salesOrderView' => 'Sales OrderView',
      'salesOrder12' => 'Sales Order12',
      'salesOrder' => 'Proforma faktura'
    ],
    'labels' => [
      'Sales Orders' => 'Proforma faktury',
      'Create SalesOrderItem' => 'Vytvořit položku proforma faktury'
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
      'Create SupplierInvoice' => 'Vytvořit přijatou fakturu',
      'Tax Classes' => 'Daňové třídy',
      'Templates' => 'Šablony',
      'Items' => 'Položky',
      'Supplier Invoice Items' => 'Položky přijaté faktury',
      'Totals' => 'Shrnutí'
    ],
    'fields' => [
      'status' => 'Stav',
      'number' => 'Číslo faktury',
      'numberA' => 'Číslo (automatické)',
      'account' => 'Dodavatel',
      'billingAddress' => 'Fakturační adresa',
      'billingContact' => 'Kontakt',
      'taxClass' => 'Daňová třída',
      'taxRate' => 'Sazba daně',
      'taxAmount' => 'DPH',
      'amount' => 'Celkem bez DPH',
      'grandTotalAmount' => 'Celkem s DPH',
      'dateInvoiced' => 'Datum vystavení',
      'weight' => 'Hmotnost',
      'amountConverted' => 'Částka (převedeno)',
      'taxAmountConverted' => 'Částka daně (převedeno)',
      'grandTotalAmountConverted' => 'Celková cena (převedeno)',
      'taxAmountCurrency' => 'Částka daně v měně',
      'amountCurrency' => 'Částka v měně',
      'grandTotalAmountCurrency' => 'Celková cena v měně',
      'currency' => 'Měna',
      'attachments' => 'Přílohy',
      'processed' => 'Pohoda Import',
      'vatId' => 'DIČ',
      'sicCode' => 'IČ',
      'salesOrder' => 'Zakázka',
      'shippingCost' => 'Dopravné',
      'shippingCostConverted' => 'Dopravné (převedeno)',
      'shippingCostCurrency' => 'Dopravné v měně',
      'shippingCostTaxRate' => 'Daňová sazba dopravy',
      'purchaseOrder' => 'Nákupní objednávka',
      'constantSymbol' => 'Konstantní symbol',
      'datePaid' => 'Datum úhrady',
      'dueDate' => 'Datum splatnosti',
      'duzp' => 'Datum zdan. plnění',
      'variableSymbol' => 'Variabilní symbol',
      'paymentMethod' => 'Způsob úhrady',
      'orderNumber' => 'Číslo objednávky',
      'remainsToPay' => 'Zbývá uhradit',
      'warehouse' => 'Sklad',
      'note' => 'Soukromá poznámka',
      'contact' => 'Kontakt',
      'accountNumber' => 'Číslo účtu',
      'iban' => 'IBAN',
      'swift' => 'SWIFT/BIC',
      'supplyCode' => 'Kód plnění',
      'assignedUser' => 'Přiřazený uživatel',
      'subscriberLink' => 'Odběratel',
      'supplierLink' => 'Dodavatel',
      'originalNumber' => 'Původní číslo faktury',
      'originalInvoiceFile' => 'Originální soubor faktury',
      'dateOfReceiving' => 'Datum přijetí',
      'expenseReceipts' => 'Výdejní doklady',
      'receivedProformaInvoice' => 'Přijatá zálohová faktura',
      'reverseCharge' => 'Přenesená DPH',
      'foreignInvoicing' => 'Fakturace do zahraničí',
      'specificSymbol' => 'Specifický symbol'
    ],
    'links' => [
      'items' => 'Položky',
      'billingContact' => 'Kontakt',
      'account' => 'Organizace',
      'taxClass' => 'Daňová třída',
      'salesOrder' => 'Zakázka',
      'supplierLink' => 'Dodavatel'
    ],
    'options' => [
      'status' => [
        'Draft' => 'Návrh',
        'In Review' => 'V procesu',
        'Confirmed' => 'Potvrzeno',
        'Paid' => 'Uhrazená',
        'Rejected' => 'Zamítnuto',
        'Received' => 'Přijatá',
        'UnpaidAfterMaturity' => 'Po splatnosti'
      ],
      'paymentMethod' => [
        'bank' => 'Převodem',
        'card' => 'Kartou',
        'cash' => 'Hotově',
        'cod' => 'Dobírka',
        'collection' => 'Inkaso'
      ],
      'supplyCode' => [
        '' => 'Pro hlášení o fakturách v přenesené daňové povinnosti',
        1 => '1 – Dodání zlata (plnění podle § 92b)',
        '1a' => '1a – Zlato – zprostředkování dodání investičního zlata',
        3 => '3 – Dodání nemovité věci, pokud se při tomto dodání uplatní daň (plnění podle § 92d)',
        '3a' => '3a – Dodání nemovité věci v nuceném prodeji',
        4 => '4 – Poskytnutí stavebních nebo montážních prací (plnění podle § 92e)',
        '4a' => '4a – Stavební a montážní práce – poskytnutí pracovníků',
        5 => '5 – Zboží uvedené v příloze č. 5 zákona o DPH (plnění podle § 92c)',
        6 => '6 – Dodání zboží poskytnutého původně jako záruka',
        7 => '7 – Dodání zboží po postoupení výhrady vlastnictví',
        11 => '11 – Převod povolenek na emise skleníkových plynů',
        12 => '12 – Obiloviny a technické plodiny',
        13 => '13 – Kovy, včetně drahých kovů',
        14 => '14 – Mobilní telefony',
        15 => '15 – Integrované obvody a desky plošných spojů',
        16 => '16 – Přenosná zařízení pro automatizované zpracování dat (např. tablety či laptopy)',
        17 => '17 – Videoherní konzole',
        18 => '18 – Dodání certifikátů elektřiny',
        19 => '19 – Dodání elektřiny soustavami nebo sítěmi obchodníkovi',
        20 => '20 – Dodání plynu soustavami nebo sítěmi obchodníkovi',
        21 => '21 – Poskytnutí vymezených služeb elektronických komunikací',
        'foreign' => 'pro Souhrnné hlášení DPH',
        '0eu' => '0 – Dodání zboží plátci DPH do EU',
        '1eu' => '1 – Přemístění obchodního majetku plátcem do EU',
        '2eu' => '2 – Dodání zboží uvnitř EU – třístranný obchod',
        '3eu' => '3 – Poskytnutí služby s místem plnění v EU – přenesená DPH'
      ]
    ],
    'tooltips' => [
      'number' => 'Unikátní identifikátor, který slouží k identifikaci vystaveného dokladu',
      'paymentMethod' => 'Způsob, jakým bude faktura uhrazena (např. převodem, hotově, kartou apod.)',
      'dateInvoiced' => ' Datum, kdy byla faktura vystavena',
      'dueDate' => 'Datum, do kdy musí být faktura uhrazena',
      'constantSymbol' => 'Unikátní identifikátor subjektu v daném platebním systému. Maximální délka je 10 znaků.',
      'duzp' => 'Datum, kdy byla uskutečněna zdanitelná služba nebo prodej, pro který byla faktura vystavena.',
      'variableSymbol' => 'Variabilní symbol se používá k identifikaci faktury v bankovním systému. Maximální délka je 10 znaků.',
      'proformaInvoice' => 'Faktura která byla uhrazena zálohovou platbou.'
    ]
  ],
  'SupplierInvoiceItem' => [
    'fields' => [
      'name' => 'Popis',
      'qty' => 'Počet',
      'quantity' => 'Počet',
      'unitPrice' => 'Cena za MJ',
      'unitPriceWithTax' => 'Unit Price Tax Inc.',
      'amount' => 'Celkem bez DPH',
      'amountWithTax' => 'Částka s DPH',
      'taxRate' => 'DPH (%)',
      'product' => 'Produkt',
      'order' => 'Číslo řádku',
      'supplierInvoice' => 'Přijatá faktura',
      'weight' => 'Hmotnost',
      'unitWeight' => 'Jednotková hmotnost',
      'description' => 'Popis',
      'amountConverted' => 'Částka (převedeno)',
      'unitPriceConverted' => 'Jednotková cena (převedeno)',
      'account' => 'Organizace',
      'unitPriceCurrency' => 'Měna jednotkové ceny',
      'amountCurrency' => 'Částka v měně',
      'taxAmount' => 'DPH',
      'discount' => 'Sleva (%)',
      'unit' => 'MJ',
      'type' => 'Typ',
      'withTax' => 'S',
      'listPrice' => 'Katalogová cena',
      'invoice' => 'Faktura',
      'listPriceConverted' => 'Katalogová cena (převedeno)',
      'listPriceCurrency' => 'Měna katalogové ceny',
      'invoiceStatus' => 'Stav faktury',
      'purchasePrice' => 'Pořizovací cena za MJ',
      'purchasePriceAmount' => 'Pořiz. celkem bez DPH'
    ],
    'links' => [
      'supplierInvoice' => 'Přijatá faktura',
      'product' => 'Produkt',
      'account' => 'Organizace',
      'invoice' => 'Faktura'
    ],
    'labels' => [
      'Supplier Invoices' => 'Přijaté faktury',
      'Invoices' => 'Faktury',
      'Create SupplierInvoiceItem' => 'Vytvořit Položka přijaté faktury'
    ],
    'options' => [
      'type' => [
        'normal' => 'normalní položka',
        'discount' => 'sleva',
        'advanceDeduction' => 'odpočet zálohy'
      ]
    ]
  ],
  'VatIdValidation' => [
    'fields' => [
      'name' => 'DIČ',
      'valid' => 'Platný',
      'lastValidCheck' => 'Poslední kontrola'
    ],
    'links' => [],
    'labels' => [
      'Create VatIdValidation' => 'Vytvořit Validaci DIČ'
    ]
  ],
  'Attendance' => [
    'labels' => [
      'Create Attendance' => 'Vytvořit Docházka',
      'Choose attendance type' => 'Vyberte typ docházky',
      'Mark departure' => 'Označit odchod',
      'Mark arrival' => 'Označit příchod'
    ],
    'fields' => [
      'dateStartDate' => 'Datum zahájení (celý den)',
      'dateStart' => 'Datum zahájení',
      'dateEnd' => 'Datum konce',
      'dateEndDate' => 'Datum konce (celý den)',
      'duration' => 'Trvání',
      'isAllDay' => 'Celý den',
      'reminders' => 'Upomínky',
      'status' => 'Typ docházky'
    ],
    'options' => [
      'status' => [
        'V práci' => 'V práci',
        'Dovolená' => 'Dovolená',
        'Nemoc' => 'Nemoc',
        'Neplacené volno' => 'Neplacené volno'
      ]
    ],
    'messages' => [
      'Choose attendance type' => 'Vyberte typ docházky'
    ]
  ],
  'EducationAndTrainingRecord' => [
    'labels' => [
      'Create EducationAndTrainingRecord' => 'Vytvořit Evidenci vzdělání a školení'
    ],
    'fields' => [
      'dateOfLastInspection' => 'Datum posledního školení',
      'numberOfYearsForRepetition' => 'Počet let pro opakování',
      'dateOfTheNextInspection' => 'Termín dalšího školení'
    ]
  ],
  'HumanResource' => [
    'labels' => [
      'Create HumanResource' => 'Vytvořit HR',
      'Create HumanResources' => 'Vytvořit HR'
    ],
    'fields' => [
      'educationAndTrainingRecords' => 'Evidence vzdělání a školení',
      'medicalExaminations' => 'Zdravotní prohlídky',
      'otherEvents' => 'Ostatní události',
      'passwords' => 'Záznamy přihlašovacích údajů',
      'amountOfBasicSalary' => 'Výše základní mzdy',
      'variableSalary' => 'Variabilní mzda',
      'note' => 'Poznámky',
      'listOfCompetencesAndJobDuties' => 'Seznam kompetencí a pracovních povinností',
      'employmentRelationship' => 'Pracovní poměr',
      'job' => 'Pracovní funkce',
      'employmentContract' => 'Smlouvy + dodatky',
      'birthdate' => 'Datum narození',
      'permanentResidence' => 'Trvalé bydliště',
      'permanentResidenceStreet' => 'Trvalé bydliště Ulice',
      'permanentResidenceCity' => 'Trvalé bydliště Město',
      'permanentResidenceState' => 'Trvalé bydliště Stát',
      'permanentResidenceCountry' => 'Trvalé bydliště Země',
      'permanentResidencePostalCode' => 'Trvalé bydliště PSČ',
      'permanentResidenceMap' => 'Trvalé bydliště Mapa',
      'bankAccountNumber' => 'Bankovní účet',
      'birthplace' => 'Místo narození',
      'birthCertificateNumber' => 'Rodné číslo',
      'citizenship' => 'Státní občanství',
      'healthInsuranceCompany' => 'Zdravotní pojišťovna',
      'workStartDate' => 'Den nástupu do práce',
      'employmentPeriod' => 'Pracovního poměr na dobu (neurčitou / určitou do  xx yy zzzz)',
      'contractDate' => 'Datum smlouvy',
      'testtime' => 'Zkušební doba (počet měsíců)',
      'guaranteedSalary' => 'Skupina zaručené mzdy',
      'vacationRequests' => 'Žádosti o dovolenou',
      'vacationDays' => 'Počet hodin dovolené na rok',
      'vacationDaysLeft' => 'Zbývající počet hodin dovolené',
      'vacations' => 'Dovolené',
      'user' => 'Uživatel',
      'phoneNumber' => 'Telefon',
      'emailAddress' => 'Email',
      'isActual' => 'IsActive',
      'vacationTimeCorrection' => 'Úprava zůstatku dovolené',
      'name' => 'Jméno a příjmení',
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
      'cP' => 'Color Picker'
    ],
    'links' => [
      'educationAndTrainingRecords' => 'Evidence vzdělání a školení',
      'medicalExaminations' => 'Zdravotní prohlídky',
      'otherEvents' => 'Ostatní události',
      'passwords' => 'Záznamy přihlašovacích údajů',
      'vacationRequests' => 'Žádosti o dovolenou',
      'vacations' => 'Dovolené',
      'user' => 'Uživatel'
    ],
    'options' => [
      'employmentRelationship' => [
        'full-time' => 'Zaměstnanec',
        'part-time' => 'Brigáda',
        'gainfully employed person' => 'OSVČ'
      ],
      'job' => [
        'Managing Director' => 'Jednatel',
        'Administrative Worker' => 'Administrativní pracovník',
        'Technician' => 'Technik',
        'Salesperson' => 'Obchodník'
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
      ],
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
    ],
    'tooltips' => [
      'vacationTimeCorrection' => 'If you want to change value \'Remaining Number of Vacation Hours\' , just provide required value and update, after updating remove any value from this field and save again.'
    ]
  ],
  'MedicalExamination' => [
    'labels' => [
      'Create MedicalExamination' => 'Vytvořit Zdravotní prohlídku'
    ],
    'fields' => [
      'dateOfLastInspection' => 'Datum posledního kontroly',
      'numberOfYearsForRepetition' => 'Počet let pro opakování',
      'dateOfTheNextInspection' => 'Termín dalšího kontroly'
    ]
  ],
  'OtherEvent' => [
    'labels' => [
      'Create OtherEvent' => 'Vytvořit Ostatní událost'
    ],
    'fields' => [
      'dateOfLastInspection' => 'Datum posledního události',
      'numberOfYearsForRepetition' => 'Počet let pro opakování',
      'dateOfTheNextInspection' => 'Termín dalšího události',
      'type' => 'Typ události'
    ]
  ],
  'Password' => [
    'labels' => [
      'Create Password' => 'Vytvořit Záznam přihlašovacích údajů'
    ],
    'fields' => [
      'system' => 'Název přihlašovaného systému',
      'login' => 'Login',
      'password' => 'Heslo'
    ]
  ],
  'Vacation' => [
    'fields' => [
      'dateStart' => 'Datum zahájení',
      'dateEnd' => 'Datum ukončení',
      'duration' => 'Duration',
      'status' => 'Status',
      'reminders' => 'Reminders',
      'dateStartDate' => 'Date Start (all day)',
      'dateEndDate' => 'Date End (all day)',
      'isAllDay' => 'Is All-Day',
      'vacationRequests' => 'Žádosti o dovolenou',
      'humanResource' => 'HR',
      'type' => 'Typ',
      'approved' => 'Schválení',
      'vacationTypes' => 'Vacation Types',
      'humanResources' => 'Human Resources'
    ],
    'links' => [
      'vacationRequests' => 'Žádosti o dovolenou',
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
      'Create Vacation' => 'Vytvořit Dovolenou',
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
      'entityAlreadyApproved' => 'Záznam již byl schválen nebo zamítnut.',
      'hrNotFound' => 'HR nenalezeno.',
      'fromDateBeforeToDate' => 'Datum OD musí být před datom DO.',
      'notEnoughVacationDaysLeft' => 'Nemáte dostatek zbývajících dnů dovolené.'
    ],
    'labels' => [
      'employeeTraining' => 'Školení zaměstnance',
      'employeeMedicalExamination' => 'Zdravotní prohlídka zaměstnance'
    ]
  ],
  'VacationRequest' => [
    'labels' => [
      'Create VacationRequest' => 'Vytvořit Žádost o dovolenou',
      'Approve Vacation Request' => 'Schválit Žádost o dovolenou'
    ],
    'fields' => [
      'from' => 'Od',
      'to' => 'Do',
      'numberOfDays' => 'Počet hodin',
      'numberOfDaysLeft' => 'Počet zbývajících hodin dovolené uživatele po dovolené',
      'numberOfDaysLeftBefore' => 'Počet zbývajících hodin dovolené uživatele před dovolenou',
      'humanResource' => 'HR',
      'statusOfApproval' => 'Stav schválení',
      'vacationRequestApprovalItems' => 'Průběh schvalování',
      'name' => 'Účel dovolené',
      'vacation' => 'Dovolená',
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
        '' => 'Čeká na schválení',
        'Approved' => 'Schváleno',
        'Rejected' => 'Zamítnuto',
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
        'PaidAbsence' => 'Placené volno '
      ]
    ],
    'tooltips' => [
      'numberOfDaysLeft' => 'Data se berou v moment vytvoření žádosti',
      'numberOfDaysLeftBefore' => 'Data se berou v moment vytvoření žádosti',
      'humanResources' => 'Your line manager will be set as default if no other approver is selected.',
      'statusOfApproval' => 'If status "Schváleno", status can\'t be changed.',
      'numberOfDays' => 'Must be set manually'
    ],
    'links' => [
      'humanResource' => 'HR',
      'vacationRequestApprovalItems' => 'Průběh schvalování',
      'vacation' => 'Dovolená',
      'user' => 'User',
      'humanResources' => 'Human Resources'
    ]
  ],
  'VacationRequestApproval' => [
    'labels' => [
      'Approve' => 'Schválit',
      'Reject' => 'Zamítnout',
      'Return for completion' => 'Vrátit k doplnění',
      'Approved' => 'Schváleno',
      'Rejected' => 'Zamítnuto',
      'Returned' => 'Vráceno k doplnění',
      'Approval process' => 'Schvalovací proces',
      'Unknown response' => 'Neznámá odpověď',
      'approveVacationRequest' => 'Schválit žádost o dovolenou'
    ],
    'fields' => [
      'description' => 'Poznámka'
    ]
  ],
  'VacationRequestApprovalItem' => [
    'labels' => [
      'Create VacationRequestApprovalItem' => 'Vytvořit Průběh schvalování'
    ],
    'fields' => [
      'description' => 'Poznámka',
      'status' => 'Stav',
      'assignedUser' => 'Provedl'
    ],
    'options' => [
      'status' => [
        'Approved' => 'Schváleno',
        'Returned' => 'Vráceno k doplnění',
        'Rejected' => 'Zamítnuto'
      ]
    ]
  ],
  'ProformaInvoice' => [
    'fields' => [
      'processed' => 'Pohoda Import',
      'partialPaymentses' => 'Partial Paymentses',
      'partialPayments' => 'partialPayments',
      'amount' => 'Celkem bez DPH',
      'taxAmount' => 'DPH',
      'grandTotalAmount' => 'Celkem s DPH',
      'constantSymbol' => 'Konstantní symbol',
      'datePaid' => 'Datum úhrady',
      'dueDate' => 'Datum splatnosti',
      'duzp' => 'Datum zdan. plnění',
      'variableSymbol' => 'Variabilní symbol',
      'paymentMethod' => 'Způsob úhrady',
      'number' => 'Číslo faktury',
      'orderNumber' => 'Číslo objednávky',
      'remainsToPay' => 'Zbývá uhradit',
      'warehouse' => 'Sklad',
      'note' => 'Soukromá poznámka',
      'textBeforeItems' => 'Věta před položkami faktury',
      'textAfterItems' => 'Patička faktury',
      'reverseCharge' => 'Přenesená DPH',
      'fakturaceDoZahranici' => 'Fakturace do zahraničí',
      'contact' => 'Kontakt',
      'supplierName' => 'Název / Jméno a příjmení',
      'supplierAddress' => 'Adresa',
      'supplierAddressStreet' => 'Adresa Ulice',
      'supplierAddressCity' => 'Adresa Město',
      'supplierAddressState' => 'Adresa Stát',
      'supplierAddressCountry' => 'Adresa Země',
      'supplierAddressPostalCode' => 'Adresa PSČ',
      'supplierAddressMap' => 'Adresa Mapa',
      'supplierEmail' => 'Email',
      'supplierPhone' => 'Telefon',
      'supplierWebsite' => 'Web',
      'supplierVATpayer' => 'Plátce DPH',
      'supplierVatId' => 'DIČ',
      'supplierSicCode' => 'IČO',
      'subscriberName' => 'Název / Jméno a příjmení',
      'subscriberAddress' => 'Adresa',
      'subscriberAddressStreet' => 'Adresa Ulice',
      'subscriberAddressCity' => 'Adresa Město',
      'subscriberAddressState' => 'Adresa Stát',
      'subscriberAddressCountry' => 'Adresa Země',
      'subscriberAddressPostalCode' => 'Adresa PSČ',
      'subscriberAddressMap' => 'Adresa Mapa',
      'subscriberSicCode' => 'IČO',
      'subscriberVatId' => 'DIČ',
      'subscriberShippingAddress' => 'Doručovací adresa',
      'subscriberShippingAddressCity' => 'Město',
      'subscriberShippingAddressCountry' => 'Země',
      'subscriberShippingAddressMap' => 'Mapa',
      'subscriberShippingAddressPostalCode' => 'PSČ',
      'subscriberShippingAddressState' => 'Kraj',
      'subscriberShippingAddressStreet' => 'Ulice',
      'subscriberBillingAddress' => 'Fakturační adresa',
      'subscriberBillingAddressCity' => 'Město',
      'subscriberBillingAddressCountry' => 'Země',
      'subscriberBillingAddressMap' => 'Mapa',
      'subscriberBillingAddressPostalCode' => 'PSČ',
      'subscriberBillingAddressState' => 'Kraj',
      'subscriberBillingAddressStreet' => 'Ulice',
      'subscriberNote' => 'Poznámka',
      'accountNumber' => 'Číslo účtu',
      'iban' => 'IBAN',
      'swift' => 'SWIFT/BIC',
      'supplyCode' => 'Kód plnění',
      'assignedUser' => 'Přiřazený uživatel / Vystavil',
      'subscriberLink' => 'Odběratel',
      'revenueReceipts' => 'Příjmové doklady',
      'issuedTaxDocuments' => 'Daňové doklady k přijatým platbámy',
      'dateInvoiced' => 'Datum vystavení',
      'invoice' => 'Vydaná faktura',
      'foreignInvoicing' => 'Fakturace do zahraničí',
      'billingAddress' => 'Fakturační adresa',
      'shippingAddress' => 'Adresa pro doručení',
      'taxClass' => 'Daňová třída',
      'billingContact' => 'Kontakt',
      'shippingContact' => 'Konktakt pro doručení',
      'account' => 'Odběratel',
      'amountCurrency' => 'Částka v měně',
      'specificSymbol' => 'Specifický symbol',
      'vatId' => 'DIČ',
      'sicCode' => 'IČ',
      'shippingCost' => 'Dopravné',
      'shippingCostConverted' => 'Dopravné (převedeno)',
      'shippingCostCurrency' => 'Dopravné v měně',
      'shippingCostTaxRate' => 'Daňová sazba dopravného',
      'paid' => 'Zaplaceno',
      'remainingToPay' => 'Zbývá zaplatit',
      'status' => 'Stav'
    ],
    'labels' => [
      'Templates' => 'Šablony',
      'Create ProformaInvoice' => 'Vytvořit vydanou zálohovou fakturu',
      'Items' => 'Položky',
      'Totals' => 'Shrnutí',
      'Record Payment' => 'Zaznamenat platbu'
    ],
    'options' => [
      'supplierVATpayer' => [
        'Non VAT payer' => 'Neplátce DPH',
        'Identified person' => 'Identifikovaná osoba',
        'VAT payer' => 'Plátce DPH'
      ],
      'supplyCode' => [
        '' => 'Pro hlášení o fakturách v přenesené daňové povinnosti',
        1 => '1 – Dodání zlata (plnění podle § 92b)',
        '1a' => '1a – Zlato – zprostředkování dodání investičního zlata',
        3 => '3 – Dodání nemovité věci, pokud se při tomto dodání uplatní daň (plnění podle § 92d)',
        '3a' => '3a – Dodání nemovité věci v nuceném prodeji',
        4 => '4 – Poskytnutí stavebních nebo montážních prací (plnění podle § 92e)',
        '4a' => '4a – Stavební a montážní práce – poskytnutí pracovníků',
        5 => '5 – Zboží uvedené v příloze č. 5 zákona o DPH (plnění podle § 92c)',
        6 => '6 – Dodání zboží poskytnutého původně jako záruka',
        7 => '7 – Dodání zboží po postoupení výhrady vlastnictví',
        11 => '11 – Převod povolenek na emise skleníkových plynů',
        12 => '12 – Obiloviny a technické plodiny',
        13 => '13 – Kovy, včetně drahých kovů',
        14 => '14 – Mobilní telefony',
        15 => '15 – Integrované obvody a desky plošných spojů',
        16 => '16 – Přenosná zařízení pro automatizované zpracování dat (např. tablety či laptopy)',
        17 => '17 – Videoherní konzole',
        18 => '18 – Dodání certifikátů elektřiny',
        19 => '19 – Dodání elektřiny soustavami nebo sítěmi obchodníkovi',
        20 => '20 – Dodání plynu soustavami nebo sítěmi obchodníkovi',
        21 => '21 – Poskytnutí vymezených služeb elektronických komunikací',
        'foreign' => 'pro Souhrnné hlášení DPH',
        '0eu' => '0 – Dodání zboží plátci DPH do EU',
        '1eu' => '1 – Přemístění obchodního majetku plátcem do EU',
        '2eu' => '2 – Dodání zboží uvnitř EU – třístranný obchod',
        '3eu' => '3 – Poskytnutí služby s místem plnění v EU – přenesená DPH'
      ],
      'status' => [
        'Issued' => 'Vystavená',
        'Sent' => 'Odeslaná',
        'Partially Paid' => 'Částečně uhrazená',
        'Paid' => 'Uhrazená',
        'Canceled' => 'Zrušená'
      ],
      'paymentMethod' => [
        'bank' => 'Převodem',
        'card' => 'Kartou',
        'cash' => 'Hotově',
        'cod' => 'Dobírka'
      ]
    ],
    'links' => [
      'partialPaymentses' => 'Partial Paymentses',
      'partialPayments' => 'partialPayments',
      'subscriberLink' => 'Odběratel',
      'revenueReceipts' => 'Příjmové doklady',
      'issuedTaxDocuments' => 'Daňové doklady k přijatým platbámy',
      'payments' => 'Přijaté platby',
      'invoices' => 'Vydané faktury'
    ],
    'tooltips' => [
      'number' => 'Unikátní identifikátor faktury, který slouží k identifikaci vystaveného dokladu',
      'paymentMethod' => 'Způsob, jakým bude faktura uhrazena (např. převodem, hotově, kartou apod.)',
      'dateInvoiced' => ' Datum, kdy byla faktura vystavena',
      'dueDate' => 'Datum, do kdy musí být faktura uhrazena',
      'constantSymbol' => 'Unikátní identifikátor subjektu v daném platebním systému. Maximální délka je 10 znaků.',
      'duzp' => 'Datum, kdy byla uskutečněna zdanitelná služba nebo prodej, pro který byla faktura vystavena.',
      'variableSymbol' => 'Variabilní symbol se používá k identifikaci faktury v bankovním systému. Maximální délka je 10 znaků.',
      'specificSymbol' => ' Je to často označení sloužící k jednoznačné identifikaci faktury mezi různými subjekty. Symbol může například obsahovat kombinaci čísel, písmen nebo znaků.'
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
      'status' => 'Stav',
      'dateInvoiced' => 'Datum vystavení',
      'amount' => 'Celkem bez DPH',
      'taxAmount' => 'DPH',
      'grandTotalAmount' => 'Celkem s DPH',
      'constantSymbol' => 'Konstantní symbol',
      'datePaid' => 'Datum úhrady',
      'dueDate' => 'Datum splatnosti',
      'duzp' => 'Datum zdan. plnění',
      'variableSymbol' => 'Variabilní symbol',
      'paymentMethod' => 'Způsob úhrady',
      'number' => 'Číslo faktury',
      'orderNumber' => 'Číslo objednávky',
      'remainsToPay' => 'Zbývá uhradit',
      'warehouse' => 'Sklad',
      'note' => 'Soukromá poznámka',
      'contact' => 'Kontakt',
      'accountNumber' => 'Číslo účtu',
      'iban' => 'IBAN',
      'swift' => 'SWIFT/BIC',
      'supplyCode' => 'Kód plnění',
      'assignedUser' => 'Přiřazený uživatel',
      'subscriberLink' => 'Odběratel',
      'supplierLink' => 'Dodavatel',
      'expenseOriginalNumber' => 'Původní číslo faktury',
      'originalInvoiceFile' => 'Originální soubor faktury',
      'dateOfReceiving' => 'Datum přijetí',
      'supplierInvoice' => 'Přijatá faktura',
      'receivedTaxDocuments' => 'Přijaté daňové doklady k přijatým platbám',
      'originalNumber' => 'Původní číslo faktury',
      'numberA' => 'Číslo (automatické)',
      'account' => 'Organizace',
      'billingAddress' => 'Fakturační adresa',
      'billingContact' => 'Kontakt',
      'taxClass' => 'Daňová třída',
      'taxRate' => 'Sazba daně',
      'weight' => 'Hmotnost',
      'amountConverted' => 'Částka (převedeno)',
      'taxAmountConverted' => 'Částka daně (převedeno)',
      'grandTotalAmountConverted' => 'Celková cena (převedeno)',
      'taxAmountCurrency' => 'Částka daně v měně',
      'amountCurrency' => 'Částka v měně',
      'grandTotalAmountCurrency' => 'Celková cena v měně',
      'currency' => 'Měna',
      'attachments' => 'Přílohy',
      'shippingCost' => 'Doprava',
      'shippingCostTaxRate' => 'Daňová sazba dopravy',
      'expenseReceipts' => 'Výdejní doklady'
    ],
    'labels' => [
      'Templates' => 'Šablony',
      'Items' => 'Položky',
      'Totals' => 'Shrnutí',
      'Create CreditNote' => 'Create credit note',
      'Create ReceivedProformaInvoice' => 'Vytvořit přijatou zálohovou fakturu',
      'Tax Classes' => 'Daňové třídy'
    ],
    'options' => [
      'status' => [
        'Received' => 'Přijatá',
        'Paid' => 'Uhrazená',
        'UnpaidAfterMaturity' => 'Po splatnosti',
        'Draft' => 'Návrh',
        'In Review' => 'V procesu',
        'Confirmed' => 'Potvrzeno',
        'Rejected' => 'Zamítnuto'
      ],
      'paymentMethod' => [
        'bank' => 'Převodem',
        'card' => 'Kartou',
        'cash' => 'Hotově',
        'cod' => 'Dobírka'
      ]
    ],
    'links' => [
      'supplierLink' => 'Dodavatel',
      'items' => 'Položky',
      'billingContact' => 'Kontakt',
      'account' => 'Organizace',
      'taxClass' => 'Daňová třída',
      'receivedTaxDocuments' => 'Přijaté daňové doklady k přijatým platbám'
    ],
    'tooltips' => [
      'number' => 'Unikátní identifikátor, který slouží k identifikaci vystaveného dokladu',
      'paymentMethod' => 'Způsob, jakým bude faktura uhrazena (např. převodem, hotově, kartou apod.)',
      'dateInvoiced' => ' Datum, kdy byla faktura vystavena',
      'dueDate' => 'Datum, do kdy musí být faktura uhrazena',
      'constantSymbol' => 'Unikátní identifikátor subjektu v daném platebním systému. Maximální délka je 10 znaků.',
      'duzp' => 'Datum, kdy byla uskutečněna zdanitelná služba nebo prodej, pro který byla faktura vystavena.',
      'variableSymbol' => 'Variabilní symbol se používá k identifikaci faktury v bankovním systému. Maximální délka je 10 znaků.',
      'proformaInvoice' => 'Faktura která byla uhrazena zálohovou platbou.'
    ]
  ],
  'GoodsReceipt' => [
    'fields' => [
      'warehouse' => 'Sklad',
      'items' => 'Položky',
      'status' => 'Stav',
      'parent' => 'Rodič',
      'numberA' => 'Číslo příjemky',
      'product' => 'Product',
      'name' => 'Popisek'
    ],
    'labels' => [
      'Process' => 'Zpracovat',
      'Create GoodsReceipt' => 'Vytvořit příjemku',
      'Items' => 'Položky',
      'Create Warehouse Transfer' => 'Vytvořit skladový přesun',
      'Goods Receipts' => 'Příjemky',
      'Create Goods Issue' => 'Vytvořit výdejku'
    ],
    'options' => [
      'status' => [
        'Draft' => 'Návrh',
        'Processing' => 'Zpracovává se',
        'Received' => 'Naskladněno',
        'Canceled' => 'Zrušeno'
      ]
    ],
    'links' => [
      'parent' => 'Rodič',
      'product' => 'Product'
    ]
  ],
  'Warehouse' => [
    'fields' => [
      'name' => 'Název',
      'description' => 'Popis',
      'type' => 'Typ',
      'address' => 'Adresa',
      'attachments' => 'Přílohy',
      'positions' => 'Pozice',
      'totalValue' => 'Celková hodnota',
      'warehouseValueRecords' => 'Skladové hodnoty',
      'products' => 'Produkty',
      'count' => 'Počet',
      'product' => 'Produkt',
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
      'items' => 'Položky',
      'positions' => 'Pozice',
      'warehouseValueRecords' => 'Skladové hodnoty',
      'products' => 'Produkty',
      'product' => 'Produkt',
      'warehouseItems' => 'Warehouse Items',
      'productionOrder' => 'Production Order',
      'productionModelItem' => 'Production Model Item',
      'productCategory' => 'Product Category',
      'productionModel' => 'defaultProductionModel',
      'accounts' => 'Suppliers'
    ],
    'messages' => [
      'itemNotFound' => 'Položka {product} nebyla nalezena.',
      'notEnoughQuantity' => 'Produkt {productName} nemá dostatek množství na skladě. Požadované množství: {quantityRequested}, dostupné množství: {quantityAvailable}.',
      'itemHasMissingProduct' => 'Některé položky nemají produkt.',
      'productIsNotStockable' => 'Produkt {productName} není skladovatelný. Zkuste změnit jeho typ',
      'itemHasMissingPosition' => 'Některé položky nemají vyplněnou pozici.',
      'itemHasPositionNotInWarehouse' => 'Produkt {productName} má pozici {positionName}, která nepatří do skladu {warehouseName}.',
      'notEnoughRoomInPosition' => 'Pozice {positionName} nemá dostatek místa pro produkt {productName}. Požadované množství: {quantity}, kapacita pozice: {positionFilledCapacity} / {positionCapacity}.'
    ],
    'options' => [
      'type' => [
        'Simple' => 'Jednoduchý',
        'Positional' => 'S pozicemi'
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
      'Create Warehouse' => 'Vytvořit Sklad'
    ],
    'tooltips' => [
      'availableQuantity' => 'Available quantity at the current date and time.',
      'quantity' => 'Total produced or stocked quantity during the time.',
      'productCategory' => 'When the products has the prefix A, it means Archive. In the folder tree is main folder Archive and inside it subfolders for each product folders as A_Projecotors.'
    ]
  ],
  'WarehouseItem' => [
    'fields' => [
      'product' => 'Produkt',
      'quantity' => 'Celkové množství',
      'quantityReserved' => 'Rezervované množství',
      'quantityAvailable' => 'Dostupné množství',
      'parent' => 'Rodič',
      'position' => 'Pozice',
      'price' => 'Cena',
      'priceCurrency' => 'Cena (měna)',
      'priceConverted' => 'Cena (konvertováno)',
      'positionFrom' => 'Z pozice',
      'positionTo' => 'Na pozici',
      'warehouse' => 'Sklad',
      'isReserved' => 'IsReserved',
      'salesOrder' => 'Sales Order',
      'unit' => 'Unit',
      'salesOrders' => 'Sales Orders',
      'salesOrdersList' => 'SalesOrdersList',
      'wisos' => 'Sales orders list',
      'reservedQuantity' => 'ReservedQuantity',
      'name' => 'Name',
      'wiso' => 'SalesOrder List',
      'stockLocation' => 'StockLocation',
      'serialNumber' => 'Sériové číslo'
    ],
    'links' => [
      'product' => 'Produkt',
      'parent' => 'Rodič',
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
      'warehouse' => 'Sklad',
      'capacity' => 'Kapacita'
    ],
    'labels' => [
      'Create WarehousePosition' => 'Vytvořit skladovou pozici'
    ],
    'links' => [
      'warehouse' => 'Sklad',
      'items' => 'Položky'
    ]
  ],
  'WarehouseTransfer' => [
    'fields' => [
      'warehouseFrom' => 'Ze skladu',
      'warehouseTo' => 'Na sklad',
      'items' => 'Položky',
      'status' => 'Stav',
      'numberA' => 'Číslo přesunu'
    ],
    'labels' => [
      'Process' => 'Zpracovat',
      'Create WarehouseTransfer' => 'Vytvořit skladový přesun',
      'Items' => 'Položky'
    ],
    'options' => [
      'status' => [
        'Draft' => 'Návrh',
        'Processing' => 'Zpracovává se',
        'Transferred' => 'Přesunuto',
        'Canceled' => 'Zrušeno'
      ]
    ]
  ],
  'WarehouseValueRecord' => [
    'labels' => [
      'Create WarehouseValueRecord' => 'Vytvořit skladovou hodnotu'
    ],
    'fields' => [
      'warehouse' => 'Sklad',
      'value' => 'Hodnota',
      'valueCurrency' => 'Hodnota (Měna)',
      'valueConverted' => 'Hodnota (Převedeno)'
    ],
    'links' => [
      'warehouse' => 'Sklad'
    ]
  ],
  'CreditNote' => [
    'labels' => [
      'Templates' => 'Šablony',
      'Items' => 'Položky',
      'Totals' => 'Shrnutí',
      'Create CreditNote' => 'Vytvořit opravný daňový doklad',
      'General' => 'Základní údaje',
      'Round' => 'Zaokrouhlení'
    ],
    'fields' => [
      'status' => 'Stav',
      'dateInvoiced' => 'Datum vystavení',
      'amount' => 'Celkem bez DPH',
      'taxAmount' => 'DPH',
      'grandTotalAmount' => 'Celkem s DPH',
      'constantSymbol' => 'Konstantní symbol',
      'datePaid' => 'Datum úhrady',
      'dueDate' => 'Datum splatnosti',
      'duzp' => 'Datum zdan. plnění',
      'variableSymbol' => 'Variabilní symbol',
      'paymentMethod' => 'Způsob úhrady',
      'number' => 'Číslo dokladu',
      'orderNumber' => 'Číslo objednávky',
      'remainsToPay' => 'Zbývá uhradit',
      'warehouse' => 'Sklad',
      'note' => 'Soukromá poznámka',
      'textBeforeItems' => 'Důvod opravy',
      'textAfterItems' => 'Patička dokladu',
      'reverseCharge' => 'Přenesená DPH',
      'fakturaceDoZahranici' => 'Fakturace do zahraničí',
      'contact' => 'Kontakt',
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
      'accountNumber' => 'Číslo účtu',
      'iban' => 'IBAN',
      'swift' => 'SWIFT/BIC',
      'supplyCode' => 'Kód plnění',
      'assignedUser' => 'Přiřazený uživatel / Vystavil',
      'subscriberLink' => 'Odběratel',
      'invoice' => 'Corrected invoice',
      'account' => 'Organizace',
      'billingAddress' => 'Fakturační adresa',
      'shippingAddress' => 'Adresa pro doručení',
      'billingContact' => 'Kontakt',
      'shippingContact' => 'Kontakt pro doručení',
      'amountCurrency' => 'Částka v měně',
      'taxClass' => 'Daňová třída',
      'vatId' => 'DIČ',
      'sicCode' => 'IČ'
    ],
    'options' => [
      'supplierVATpayer' => [
        'Non VAT payer' => 'Neplátce DPH',
        'Identified person' => 'Identifikovaná osoba',
        'VAT payer' => 'Plátce DPH'
      ],
      'supplyCode' => [
        '' => 'Pro hlášení o fakturách v přenesené daňové povinnosti',
        1 => '1 – Dodání zlata (plnění podle § 92b)',
        '1a' => '1a – Zlato – zprostředkování dodání investičního zlata',
        3 => '3 – Dodání nemovité věci, pokud se při tomto dodání uplatní daň (plnění podle § 92d)',
        '3a' => '3a – Dodání nemovité věci v nuceném prodeji',
        4 => '4 – Poskytnutí stavebních nebo montážních prací (plnění podle § 92e)',
        '4a' => '4a – Stavební a montážní práce – poskytnutí pracovníků',
        5 => '5 – Zboží uvedené v příloze č. 5 zákona o DPH (plnění podle § 92c)',
        6 => '6 – Dodání zboží poskytnutého původně jako záruka',
        7 => '7 – Dodání zboží po postoupení výhrady vlastnictví',
        11 => '11 – Převod povolenek na emise skleníkových plynů',
        12 => '12 – Obiloviny a technické plodiny',
        13 => '13 – Kovy, včetně drahých kovů',
        14 => '14 – Mobilní telefony',
        15 => '15 – Integrované obvody a desky plošných spojů',
        16 => '16 – Přenosná zařízení pro automatizované zpracování dat (např. tablety či laptopy)',
        17 => '17 – Videoherní konzole',
        18 => '18 – Dodání certifikátů elektřiny',
        19 => '19 – Dodání elektřiny soustavami nebo sítěmi obchodníkovi',
        20 => '20 – Dodání plynu soustavami nebo sítěmi obchodníkovi',
        21 => '21 – Poskytnutí vymezených služeb elektronických komunikací'
      ],
      'status' => [
        'Issued' => 'Vystavený',
        'Sent' => 'Odeslaný',
        'Paid' => 'Uhrazený',
        'Canceled' => 'Zrušený'
      ],
      'paymentMethod' => [
        'bank' => 'Převodem',
        'card' => 'Kartou',
        'cash' => 'Hotově',
        'cod' => 'Dobírka'
      ]
    ],
    'links' => [
      'subscriberLink' => 'Odběratel',
      'invoices' => 'Vydaná faktura'
    ],
    'tooltips' => [
      'number' => 'Unikátní identifikátor, který slouží k identifikaci vystaveného dokladu',
      'paymentMethod' => 'Způsob, jakým bude faktura uhrazena (např. převodem, hotově, kartou apod.)',
      'dateInvoiced' => ' Datum, kdy byla faktura vystavena',
      'dueDate' => 'Datum, do kdy musí být faktura uhrazena',
      'constantSymbol' => 'Unikátní identifikátor subjektu v daném platebním systému. Maximální délka je 10 znaků.',
      'duzp' => 'Datum, kdy byla uskutečněna zdanitelná služba nebo prodej, pro který byla faktura vystavena.',
      'variableSymbol' => 'Variabilní symbol se používá k identifikaci faktury v bankovním systému. Maximální délka je 10 znaků.',
      'invoice' => 'Slouží k označení původní faktury, kterou tímto opravným daňovým dokladem opravujete'
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
      'discount' => 'Sleva (%)',
      'amountConverted' => 'Amount (converted)',
      'unitPriceConverted' => 'Unit price (converted)',
      'listPriceConverted' => 'List price (converted)',
      'account' => 'Organization',
      'listPriceCurrency' => 'List price currency',
      'unitPriceCurrency' => 'Unit price currency',
      'amountCurrency' => 'Amount currency',
      'invoiceStatus' => 'Invoice status',
      'name' => 'Popis',
      'qty' => 'Počet',
      'quantity' => 'Počet',
      'unitPrice' => 'Cena za MJ',
      'amount' => 'Celkem bez DPH',
      'unit' => 'MJ',
      'taxRate' => 'DPH (%)',
      'type' => 'Typ',
      'withTax' => 'S',
      'amountWithTax' => 'Částka s DPH',
      'taxAmount' => 'DPH'
    ],
    'links' => [
      'invoice' => 'Invoice',
      'product' => 'Product',
      'account' => 'Organization'
    ],
    'labels' => [
      'Invoices' => 'Invoices'
    ],
    'options' => [
      'type' => [
        'normal' => 'normalní položka',
        'discount' => 'sleva',
        'advanceDeduction' => 'odpočet zálohy'
      ]
    ]
  ],
  'ExpenseReceipt' => [
    'labels' => [
      'Templates' => 'Šablony',
      'Create ExpenseReceipt' => 'Vytvořit výdejní doklad'
    ],
    'fields' => [
      'dateInvoiced' => 'Datum vystavení',
      'amount' => 'Celkem bez DPH',
      'taxAmount' => 'DPH',
      'grandTotalAmount' => 'Celková částka',
      'amountInWords' => 'Částka slovy',
      'issued' => 'Vydal',
      'received' => 'Přijal',
      'paymentPurpose' => 'Účel platby',
      'invoice' => 'Doklad pro fakturu',
      'constantSymbol' => 'Konstantní symbol',
      'datePaid' => 'Datum úhrady',
      'dueDate' => 'Datum splatnosti',
      'duzp' => 'Datum zdan. plnění',
      'variableSymbol' => 'Variabilní symbol',
      'paymentMethod' => 'Způsob úhrady',
      'number' => 'Číslo dokladu',
      'orderNumber' => 'Číslo objednávky',
      'remainsToPay' => 'Zbývá uhradit',
      'warehouse' => 'Sklad',
      'note' => 'Soukromá poznámka',
      'contact' => 'Kontakt',
      'accountNumber' => 'Číslo účtu',
      'iban' => 'IBAN',
      'swift' => 'SWIFT/BIC',
      'supplyCode' => 'Kód plnění',
      'assignedUser' => 'Přiřazený uživatel',
      'subscriberLink' => 'Odběratel',
      'supplierLink' => 'Dodavatel',
      'expenseOriginalNumber' => 'Původní číslo faktury',
      'originalInvoiceFile' => 'Originální soubor faktury',
      'dateOfReceiving' => 'Datum přijetí',
      'subscriberName' => 'Název / Jméno a příjmení',
      'subscriberAddress' => 'Adresa',
      'subscriberAddressStreet' => 'Adresa Ulice',
      'subscriberAddressCity' => 'Adresa Město',
      'subscriberAddressState' => 'Adresa Stát',
      'subscriberAddressCountry' => 'Adresa Země',
      'subscriberAddressPostalCode' => 'Adresa PSČ',
      'subscriberAddressMap' => 'Adresa Mapa',
      'subscriberSicCode' => 'IČO',
      'subscriberVatId' => 'DIČ',
      'subscriberShippingAddress' => 'Doručovací adresa',
      'subscriberShippingAddressCity' => 'Město',
      'subscriberShippingAddressCountry' => 'Země',
      'subscriberShippingAddressMap' => 'Mapa',
      'subscriberShippingAddressPostalCode' => 'PSČ',
      'subscriberShippingAddressState' => 'Kraj',
      'subscriberShippingAddressStreet' => 'Ulice',
      'subscriberBillingAddress' => 'Fakturační adresa',
      'subscriberBillingAddressCity' => 'Město',
      'subscriberBillingAddressCountry' => 'Země',
      'subscriberBillingAddressMap' => 'Mapa',
      'subscriberBillingAddressPostalCode' => 'PSČ',
      'subscriberBillingAddressState' => 'Kraj',
      'subscriberBillingAddressStreet' => 'Ulice',
      'subscriberNote' => 'Poznámka',
      'supplierName' => 'Název / Jméno a příjmení',
      'supplierAddress' => 'Adresa',
      'supplierAddressStreet' => 'Adresa Ulice',
      'supplierAddressCity' => 'Adresa Město',
      'supplierAddressState' => 'Adresa Stát',
      'supplierAddressCountry' => 'Adresa Země',
      'supplierAddressPostalCode' => 'Adresa PSČ',
      'supplierAddressMap' => 'Adresa Mapa',
      'supplierEmail' => 'Email',
      'supplierPhone' => 'Telefon',
      'supplierWebsite' => 'Web',
      'supplierVATpayer' => 'Plátce DPH',
      'supplierVatId' => 'DIČ',
      'supplierSicCode' => 'IČO',
      'supplierBillingAddress' => 'Fakturační adresa',
      'supplierNote' => 'Poznámka',
      'supplierShippingAddress' => 'Dodací adresa',
      'subscriberWebsite' => 'Webové stránky',
      'subscriberEmail' => 'E-mail',
      'subscriberPhone' => 'Telefonní číslo'
    ],
    'options' => [
      'status' => [
        'Received' => 'Přijatá',
        'Paid' => 'Uhrazená',
        'UnpaidAfterMaturity' => 'Po splatnosti'
      ],
      'paymentMethod' => [
        'bank' => 'Převodem',
        'card' => 'Kartou',
        'cash' => 'Hotově',
        'cod' => 'Dobírka'
      ]
    ],
    'links' => [
      'supplierLink' => 'Dodavatel'
    ],
    'tooltips' => [
      'number' => 'Unikátní identifikátor, který slouží k identifikaci vystaveného dokladu',
      'paymentMethod' => 'Způsob, jakým bude faktura uhrazena (např. převodem, hotově, kartou apod.)',
      'dateInvoiced' => ' Datum, kdy byla faktura vystavena',
      'dueDate' => 'Datum, do kdy musí být faktura uhrazena',
      'constantSymbol' => 'Unikátní identifikátor subjektu v daném platebním systému. Maximální délka je 10 znaků.',
      'duzp' => 'Datum, kdy byla uskutečněna zdanitelná služba nebo prodej, pro který byla faktura vystavena.',
      'variableSymbol' => 'Variabilní symbol se používá k identifikaci faktury v bankovním systému. Maximální délka je 10 znaků.',
      'proformaInvoice' => 'Faktura která byla uhrazena zálohovou platbou.'
    ]
  ],
  'IssuedTaxDocument' => [
    'labels' => [
      'Templates' => 'Šablony',
      'Items' => 'Položky',
      'Totals' => 'Shrnutí',
      'Create IssuedTaxDocument' => 'Vytvořit daňový doklad k přijaté platbě',
      'Item Text' => 'Daňový doklad k přijaté platbě ze dne {date} s VS {variableSymbol} pro zálohovou fakturu č. {number}'
    ],
    'fields' => [
      'status' => 'Stav',
      'dateInvoiced' => 'Datum vystavení',
      'paymentReceivedDate' => 'Datum přijetí platby',
      'amount' => 'Celkem bez DPH',
      'taxAmount' => 'DPH',
      'grandTotalAmount' => 'Celkem s DPH',
      'number' => 'Číslo faktury',
      'orderNumber' => 'Číslo objednávky',
      'textBeforeItems' => 'Věta před položkami faktury',
      'textAfterItems' => 'Patička faktury',
      'assignedUser' => 'Přiřazený uživatel / Vystavil',
      'account' => 'Odběratel',
      'billingAddress' => 'Fakturační adresa',
      'amountCurrency' => 'Měna',
      'vatId' => 'DIČ',
      'sicCode' => 'IČ',
      'variableSymbol' => 'Variabilní symbol',
      'constantSymbol' => 'Konstantní symbol',
      'proformaInvoice' => 'Zálohová faktura'
    ],
    'options' => [
      'status' => [
        'Unsettled' => 'Nevyúčtováno',
        'Settled' => 'Vyúčtováno'
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
      'discount' => 'Sleva (%)',
      'amountConverted' => 'Amount (converted)',
      'unitPriceConverted' => 'Unit price (converted)',
      'listPriceConverted' => 'List price (converted)',
      'account' => 'Organization',
      'listPriceCurrency' => 'List price currency',
      'unitPriceCurrency' => 'Unit price currency',
      'amountCurrency' => 'Amount currency',
      'invoiceStatus' => 'Invoice status',
      'name' => 'Popis',
      'qty' => 'Počet',
      'quantity' => 'Počet',
      'unitPrice' => 'Cena za MJ',
      'amount' => 'Celkem bez DPH',
      'unit' => 'MJ',
      'taxRate' => 'DPH (%)',
      'type' => 'Typ',
      'withTax' => 'S',
      'amountWithTax' => 'Částka s DPH',
      'taxAmount' => 'DPH'
    ],
    'links' => [
      'invoice' => 'Invoice',
      'product' => 'Product',
      'account' => 'Organization'
    ],
    'labels' => [
      'Invoices' => 'Invoices'
    ],
    'options' => [
      'type' => [
        'normal' => 'normalní položka',
        'discount' => 'sleva'
      ]
    ]
  ],
  'PartialPayments' => [
    'fields' => [
      'invoice' => 'Invoice',
      'proformaInvoice' => 'Proforma Invoice',
      'amount' => 'Částka',
      'amountCurrency' => 'Částka (Měna)',
      'amountConverted' => 'Částka (Převedeno)',
      'date' => 'Datum úhrady'
    ],
    'links' => [
      'invoice' => 'Invoice',
      'proformaInvoice' => 'Proforma Invoice'
    ],
    'labels' => [
      'Create PartialPayments' => 'Vytvořit PartialPayments'
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
      'discount' => 'Sleva (%)',
      'amountConverted' => 'Amount (converted)',
      'unitPriceConverted' => 'Unit price (converted)',
      'listPriceConverted' => 'List price (converted)',
      'account' => 'Organization',
      'listPriceCurrency' => 'List price currency',
      'unitPriceCurrency' => 'Unit price currency',
      'amountCurrency' => 'Amount currency',
      'invoiceStatus' => 'Invoice status',
      'name' => 'Popis',
      'qty' => 'Počet',
      'quantity' => 'Počet',
      'unitPrice' => 'Cena za MJ',
      'amount' => 'Celkem bez DPH',
      'unit' => 'MJ',
      'taxRate' => 'DPH (%)',
      'type' => 'Typ',
      'withTax' => 'S',
      'amountWithTax' => 'Částka s DPH',
      'taxAmount' => 'DPH'
    ],
    'links' => [
      'invoice' => 'Invoice',
      'product' => 'Product',
      'account' => 'Organization'
    ],
    'labels' => [
      'Invoices' => 'Invoices'
    ],
    'options' => [
      'type' => [
        'normal' => 'normalní položka',
        'discount' => 'sleva'
      ]
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
      'discount' => 'Sleva (%)',
      'amountConverted' => 'Amount (converted)',
      'unitPriceConverted' => 'Unit price (converted)',
      'listPriceConverted' => 'List price (converted)',
      'account' => 'Organization',
      'listPriceCurrency' => 'List price currency',
      'unitPriceCurrency' => 'Unit price currency',
      'amountCurrency' => 'Amount currency',
      'invoiceStatus' => 'Invoice status',
      'name' => 'Popis',
      'qty' => 'Počet',
      'quantity' => 'Počet',
      'unitPrice' => 'Cena za MJ',
      'amount' => 'Celkem bez DPH',
      'unit' => 'MJ',
      'taxRate' => 'DPH (%)',
      'type' => 'Typ',
      'withTax' => 'S',
      'amountWithTax' => 'Částka s DPH',
      'taxAmount' => 'DPH'
    ],
    'links' => [
      'invoice' => 'Faktura',
      'product' => 'Produkt',
      'account' => 'Organizace'
    ],
    'labels' => [
      'Invoices' => 'Faktury',
      'Create ReceivedProformaInvoiceItem' => 'Vytvořit Položka přijaté zálohové faktury'
    ]
  ],
  'ReceivedTaxDocument' => [
    'labels' => [
      'Templates' => 'Šablony',
      'Items' => 'Položky',
      'Totals' => 'Shrnutí',
      'Create CreditNote' => 'Create credit note',
      'Create ReceivedTaxDocument' => 'Vytvořit přijatý daňový doklad k přijaté platbě'
    ],
    'fields' => [
      'status' => 'Stav',
      'dateInvoiced' => 'Datum vystavení',
      'amount' => 'Celkem bez DPH',
      'taxAmount' => 'DPH',
      'grandTotalAmount' => 'Celkem s DPH',
      'constantSymbol' => 'Konstantní symbol',
      'datePaid' => 'Datum úhrady',
      'dueDate' => 'Datum splatnosti',
      'duzp' => 'Datum zdan. plnění',
      'variableSymbol' => 'Variabilní symbol',
      'paymentMethod' => 'Způsob úhrady',
      'number' => 'Číslo faktury',
      'orderNumber' => 'Číslo objednávky',
      'remainsToPay' => 'Zbývá uhradit',
      'warehouse' => 'Sklad',
      'note' => 'Soukromá poznámka',
      'contact' => 'Kontakt',
      'accountNumber' => 'Číslo účtu',
      'iban' => 'IBAN',
      'swift' => 'SWIFT/BIC',
      'supplyCode' => 'Kód plnění',
      'assignedUser' => 'Přiřazený uživatel',
      'subscriberLink' => 'Odběratel',
      'supplierLink' => 'Dodavatel',
      'expenseOriginalNumber' => 'Původní číslo dokladu',
      'originalInvoiceFile' => 'Originální soubor dokladu',
      'dateOfReceiving' => 'Datum přijetí',
      'amountCurrency' => 'Částka v měně',
      'receivedProformaInvoice' => 'Přijatá zálohová faktura',
      'billingAddress' => 'Fakturační adresa',
      'billingContact' => 'Kontakt',
      'taxClass' => 'Daňová třída',
      'taxRate' => 'Sazba daně'
    ],
    'options' => [
      'status' => [
        'Received' => 'Přijatá',
        'Paid' => 'Uhrazená',
        'UnpaidAfterMaturity' => 'Po splatnosti'
      ],
      'paymentMethod' => [
        'bank' => 'Převodem',
        'card' => 'Kartou',
        'cash' => 'Hotově',
        'cod' => 'Dobírka'
      ]
    ],
    'links' => [
      'supplierLink' => 'Dodavatel'
    ],
    'tooltips' => [
      'number' => 'Unikátní identifikátor, který slouží k identifikaci vystaveného dokladu',
      'paymentMethod' => 'Způsob, jakým bude faktura uhrazena (např. převodem, hotově, kartou apod.)',
      'dateInvoiced' => ' Datum, kdy byla faktura vystavena',
      'dueDate' => 'Datum, do kdy musí být faktura uhrazena',
      'constantSymbol' => 'Unikátní identifikátor subjektu v daném platebním systému. Maximální délka je 10 znaků.',
      'duzp' => 'Datum, kdy byla uskutečněna zdanitelná služba nebo prodej, pro který byla faktura vystavena.',
      'variableSymbol' => 'Variabilní symbol se používá k identifikaci faktury v bankovním systému. Maximální délka je 10 znaků.',
      'proformaInvoice' => 'Faktura která byla uhrazena zálohovou platbou.'
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
      'discount' => 'Sleva (%)',
      'amountConverted' => 'Amount (converted)',
      'unitPriceConverted' => 'Unit price (converted)',
      'listPriceConverted' => 'List price (converted)',
      'account' => 'Organization',
      'listPriceCurrency' => 'List price currency',
      'unitPriceCurrency' => 'Unit price currency',
      'amountCurrency' => 'Amount currency',
      'invoiceStatus' => 'Invoice status',
      'name' => 'Popis',
      'qty' => 'Počet',
      'quantity' => 'Počet',
      'unitPrice' => 'Cena za MJ',
      'amount' => 'Celkem bez DPH',
      'unit' => 'MJ',
      'taxRate' => 'DPH (%)',
      'type' => 'Typ',
      'withTax' => 'S',
      'amountWithTax' => 'Částka s DPH',
      'taxAmount' => 'DPH'
    ],
    'links' => [
      'invoice' => 'Invoice',
      'product' => 'Product',
      'account' => 'Organization'
    ],
    'labels' => [
      'Invoices' => 'Invoices'
    ],
    'options' => [
      'type' => [
        'normal' => 'normalní položka',
        'discount' => 'sleva'
      ]
    ]
  ],
  'RevenueReceipt' => [
    'labels' => [
      'Templates' => 'Šablony',
      'Create CreditNote' => 'Create Credit Note',
      'Create RevenueReceipt' => 'Vytvořit příjmový doklad'
    ],
    'fields' => [
      'status' => 'Stav',
      'dateInvoiced' => 'Datum vystavení',
      'amount' => 'Celkem bez DPH',
      'taxAmount' => 'DPH',
      'grandTotalAmount' => 'Celková částka',
      'amountInWords' => 'Částka slovy',
      'issued' => 'Vydal',
      'received' => 'Přijal',
      'paymentPurpose' => 'Účel platby',
      'invoice' => 'Doklad pro fakturu',
      'constantSymbol' => 'Konstantní symbol',
      'datePaid' => 'Datum úhrady',
      'dueDate' => 'Datum splatnosti',
      'duzp' => 'Datum zdan. plnění',
      'variableSymbol' => 'Variabilní symbol',
      'paymentMethod' => 'Způsob úhrady',
      'number' => 'Číslo dokladu',
      'orderNumber' => 'Číslo objednávky',
      'remainsToPay' => 'Zbývá uhradit',
      'warehouse' => 'Sklad',
      'note' => 'Soukromá poznámka',
      'contact' => 'Kontakt',
      'accountNumber' => 'Číslo účtu',
      'iban' => 'IBAN',
      'swift' => 'SWIFT/BIC',
      'supplyCode' => 'Kód plnění',
      'assignedUser' => 'Přiřazený uživatel',
      'subscriberLink' => 'Odběratel',
      'supplierLink' => 'Dodavatel',
      'expenseOriginalNumber' => 'Původní číslo faktury',
      'originalInvoiceFile' => 'Originální soubor faktury',
      'dateOfReceiving' => 'Datum přijetí',
      'subscriberName' => 'Název / Jméno a příjmení',
      'subscriberAddress' => 'Adresa',
      'subscriberAddressStreet' => 'Adresa Ulice',
      'subscriberAddressCity' => 'Adresa Město',
      'subscriberAddressState' => 'Adresa Stát',
      'subscriberAddressCountry' => 'Adresa Země',
      'subscriberAddressPostalCode' => 'Adresa PSČ',
      'subscriberAddressMap' => 'Adresa Mapa',
      'subscriberSicCode' => 'IČO',
      'subscriberVatId' => 'DIČ',
      'subscriberShippingAddress' => 'Doručovací adresa',
      'subscriberShippingAddressCity' => 'Město',
      'subscriberShippingAddressCountry' => 'Země',
      'subscriberShippingAddressMap' => 'Mapa',
      'subscriberShippingAddressPostalCode' => 'PSČ',
      'subscriberShippingAddressState' => 'Kraj',
      'subscriberShippingAddressStreet' => 'Ulice',
      'subscriberBillingAddress' => 'Fakturační adresa',
      'subscriberBillingAddressCity' => 'Město',
      'subscriberBillingAddressCountry' => 'Země',
      'subscriberBillingAddressMap' => 'Mapa',
      'subscriberBillingAddressPostalCode' => 'PSČ',
      'subscriberBillingAddressState' => 'Kraj',
      'subscriberBillingAddressStreet' => 'Ulice',
      'subscriberNote' => 'Poznámka',
      'supplierName' => 'Název / Jméno a příjmení',
      'supplierAddress' => 'Adresa',
      'supplierAddressStreet' => 'Adresa Ulice',
      'supplierAddressCity' => 'Adresa Město',
      'supplierAddressState' => 'Adresa Stát',
      'supplierAddressCountry' => 'Adresa Země',
      'supplierAddressPostalCode' => 'Adresa PSČ',
      'supplierAddressMap' => 'Adresa Mapa',
      'supplierEmail' => 'Email',
      'supplierPhone' => 'Telefon',
      'supplierWebsite' => 'Web',
      'supplierVATpayer' => 'Plátce DPH',
      'supplierVatId' => 'DIČ',
      'supplierSicCode' => 'IČO',
      'billingAddress' => 'Fakturační adresa',
      'billingContact' => 'Kontakt'
    ],
    'options' => [
      'status' => [
        'Received' => 'Přijatá',
        'Paid' => 'Uhrazená',
        'UnpaidAfterMaturity' => 'Po splatnosti'
      ],
      'paymentMethod' => [
        'bank' => 'Převodem',
        'card' => 'Kartou',
        'cash' => 'Hotově',
        'cod' => 'Dobírka'
      ]
    ],
    'links' => [
      'supplierLink' => 'Dodavatel'
    ],
    'tooltips' => [
      'number' => 'Unikátní identifikátor, který slouží k identifikaci vystaveného dokladu',
      'paymentMethod' => 'Způsob, jakým bude faktura uhrazena (např. převodem, hotově, kartou apod.)',
      'dateInvoiced' => ' Datum, kdy byla faktura vystavena',
      'dueDate' => 'Datum, do kdy musí být faktura uhrazena',
      'constantSymbol' => 'Unikátní identifikátor subjektu v daném platebním systému. Maximální délka je 10 znaků.',
      'duzp' => 'Datum, kdy byla uskutečněna zdanitelná služba nebo prodej, pro který byla faktura vystavena.',
      'variableSymbol' => 'Variabilní symbol se používá k identifikaci faktury v bankovním systému. Maximální délka je 10 znaků.',
      'proformaInvoice' => 'Faktura která byla uhrazena zálohovou platbou.'
    ]
  ],
  'SummaryVatRates' => [
    'fields' => [
      'taxRate' => 'Sazba',
      'basis' => 'Základ',
      'vat' => 'DPH',
      'total' => 'Celkem'
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
      'fieldLabelIsRequired' => 'Pouze jeden subjekt by nemusel mít identifikační štítek',
      'emptyNotDefaultEnitityLabel' => 'Identifikační štítek nemůže být u nevýchozího subjektu prázdný',
      'defaultEntityIsRequiredInList' => 'Výchozí subjekt je vyžadován v seznamu synchronizačních subjektů',
      'notUniqueIdentificationLabel' => 'Identification Labels have to be unique'
    ],
    'fields' => [
      'calendarId' => 'ID kalendáře'
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
      'dateStart' => 'Od',
      'dateEnd' => 'Do',
      'duration' => 'Duration',
      'status' => 'Status',
      'reminders' => 'Reminders',
      'dateStartDate' => 'Date Start (all day)',
      'dateEndDate' => 'Date End (all day)',
      'isAllDay' => 'Is All-Day',
      'type' => 'Typ',
      'approved' => 'Schválení',
      'hours' => 'Počet hodin',
      'remainingHrs' => 'Zbývá hodin',
      'description' => 'Poznámka'
    ],
    'links' => [
      'parent' => 'Parent'
    ],
    'options' => [
      'status' => [
        'Planned' => 'Plánované',
        'Held' => 'Proběhlé',
        'Not Held' => 'Neproběhlé'
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
      'Create Absence' => 'Vytvořit Dovolená',
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
      'Create ClockIn' => 'Vytvořit Docházka'
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
      'Create CompetetionBase' => 'Vytvořit Seznam Konkurence'
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
      'pressetingOption' => 'Option for user friendly custom presseting',
      'name' => 'Název firmy'
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
      'Create Complaint' => 'Vytvořit Reklamace'
    ]
  ],
  'Contractor' => [
    'fields' => [
      'contractorItems' => 'Položky dodavatele',
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
      'contractorItems' => 'Položky dodavatele',
      'contacts' => 'Kontakty',
      'componentss' => 'Komponenty',
      'orders' => 'Objednávky',
      'productDatabase' => 'Product Database',
      'productDatabase1' => 'Databáze produktů',
      'productDatabases' => 'Databáze produktů'
    ],
    'labels' => [
      'Create Contractor' => 'Vytvořit dodavatele'
    ]
  ],
  'ContractorItem' => [
    'fields' => [
      'componentss' => 'Komponenty',
      'contractors' => 'Dodavatelé',
      'contractor' => 'Dodavatel',
      'components' => 'Komponenty'
    ],
    'links' => [
      'componentss' => 'Componentss',
      'contractors' => 'Dodavatelé',
      'contractor' => 'Dodavatel',
      'components' => 'Komponenty'
    ],
    'labels' => [
      'Create ContractorItem' => 'Vytvořit položku dodavatele'
    ]
  ],
  'EspoCRMnvody' => [
    'fields' => [
      'cRMNvod' => 'CRM návod'
    ],
    'links' => [],
    'labels' => [
      'Create EspoCRMnvody' => 'Vytvořit EspoCRM návod'
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
      'users' => 'Users',
      'name' => 'Jméno a příjmení'
    ],
    'links' => [
      'vacationRequests' => 'Vacation Requests',
      'user' => 'User',
      'users' => 'Users'
    ],
    'labels' => [
      'Create HumanResources' => 'Vytvořit HR'
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
      'Create InternalAgenda' => 'Přidat Interní dokument'
    ]
  ],
  'LogTime' => [
    'fields' => [
      'parent' => 'Rodič',
      'dateStart' => 'Datum zahájení',
      'dateEnd' => 'Datum ukončení',
      'duration' => 'Doba trvání',
      'status' => 'Status',
      'reminders' => 'Připomenutí',
      'dateStartDate' => 'Datum zahájení (celý den)',
      'dateEndDate' => 'Datum ukončení (celý den)',
      'isAllDay' => 'Is All-Day',
      'task' => 'Úkol',
      'account' => 'Firma',
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
      'contact' => 'Kontaktní osoba',
      'description' => 'Popis'
    ],
    'links' => [
      'parent' => 'Rodič',
      'task' => 'Úkol',
      'account' => 'Organizace',
      'businessProject' => 'Zakázka',
      'contact' => 'Kontaktní osoba'
    ],
    'options' => [
      'status' => [
        'Planned' => 'Plánováho',
        'Held' => 'Held',
        'Not Held' => 'Not Held'
      ]
    ],
    'labels' => [
      'Create LogTime' => 'Vytvořit Instalace',
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
      'planned' => 'Plánovaný',
      'held' => 'Held',
      'todays' => 'Today\'s'
    ]
  ],
  'OrderItem' => [
    'fields' => [
      'account1' => 'Account1',
      'components' => 'Components',
      'code' => 'Kód',
      'account' => 'Firma',
      'amount' => 'Částka',
      'amountConverted' => 'Částka (převedeno)',
      'amountCurrency' => 'Částka v měně',
      'discount' => 'Sleva',
      'listPrice' => 'Katalogová cena',
      'listPriceConverted' => 'Katalogová cena (převedeno)',
      'listPriceCurrency' => 'Katalogová cena v měně',
      'orderStatus' => 'Stav',
      'product' => 'Produkt',
      'quantity' => 'Množství',
      'taxRate' => 'Sazba daně',
      'unitPrice' => 'Jednotková cena',
      'unitPriceConverted' => 'Jednotková cena (převedeno)',
      'unitPriceCurrency' => 'Jednotková cena v měně',
      'unitWeight' => 'Jednotková hmotnost',
      'weight' => 'Hmotnost'
    ],
    'links' => [
      'account1' => 'Account1',
      'components' => 'Components',
      'order' => 'Objednávka',
      'product' => 'Produkt'
    ],
    'labels' => [
      'Create OrderItem' => 'Vytvořit položku objednávky'
    ]
  ],
  'Porady' => [
    'fields' => [
      'parent' => 'Parent',
      'dateStart' => 'Datum',
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
      'upresnujiciNazev' => 'Upřesňující název',
      'name' => 'Name'
    ],
    'links' => [
      'parent' => 'Parent',
      'attachement' => 'Přílohy'
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
      'Create Porady' => 'Vytvořit Poradu',
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
      'planned' => 'Plánovaná',
      'held' => 'Held',
      'todays' => 'Dnes'
    ]
  ],
  'ProductDatabase' => [
    'fields' => [
      'manufacturerSerialNumber' => 'Sériové číslo výrobce',
      'product' => 'Komponent',
      'product1' => 'Produkt v2',
      'contractor' => 'Dodavatel',
      'businessProject' => 'Zakázka',
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
      'businessProjects' => 'Zakázka_Staré',
      'contractor1' => 'Dodavatel v2',
      'details' => 'Poznámky',
      'products' => 'Product v3',
      'product12' => 'Produkt',
      'contractor12' => 'Dodavatel',
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
      'firmVersion' => 'Verze firweru',
      'name' => 'Sériové číslo'
    ],
    'links' => [
      'product' => 'Komponent',
      'product1' => 'Produkt v2',
      'contractor' => 'Dodavatel',
      'businessProject' => 'Zakázka',
      'businessProjects' => 'Zakázka_Staré',
      'contractor1' => 'Dodavatel v2',
      'products' => 'Product v3',
      'product12' => 'Produkt',
      'contractor12' => 'Dodavatel',
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
      'businessProjects' => 'Business Projects',
      'name' => 'ALIS sériové číslo'
    ],
    'links' => [
      'businessProject' => 'Zakázka',
      'businessProject1' => 'Zakázka',
      'businessProjects' => 'Business Projects'
    ],
    'labels' => [
      'Create ProjectorDatabase' => 'Vytvořit Databáze projektorů'
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
      'user1' => 'Vedoucí týmu',
      'user2' => 'Uzavřel',
      'user3' => 'Zodpovědný za nápravu',
      'user4' => 'Zodpovědný za prevenci',
      'user5' => 'Kontroloval',
      'user' => 'Uživatel',
      'user6' => 'Zodpovědný',
      'team' => 'Tým',
      'deliveredQty' => 'Dodané množství',
      'claimQty' => 'Reklamované množství',
      'account' => 'Firma',
      'users' => 'Členové',
      'users1' => 'Členové týmu pro řešení',
      'parent' => 'Zakázka',
      'deliveryNote' => 'Číslo dodacího listu',
      'description' => 'Popis problému'
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
      'users' => 'Členové týmu',
      'users1' => 'Členové týmu pro řešení',
      'parent' => 'Zakázka',
      'qualityReports' => '8D Reporty'
    ],
    'labels' => [
      'Create QualityReport' => 'Vytvořit 8D Report'
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
      'Create ReceivedInvoices' => 'Vytvořit Přijaté faktury'
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
      'isAllowed' => 'Is allowed',
      'description' => 'Poznámka'
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
        'Čeká na schválení' => 'Čeká na schválení',
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
      'Create RequestItem' => 'Vytvořit Položka žádanky na nákup'
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
      'smerniceItems' => 'Jednotlivé směrnice',
      'smrs' => 'Směrnice - dokumenty',
      'children' => 'Složky'
    ],
    'links' => [
      'smerniceItems' => 'Jednotlivé směrnice',
      'smrs' => 'Směrnice - dokumenty',
      'children' => 'Složky'
    ],
    'labels' => [
      'Create Smernice' => 'Vytvořit Směrnice'
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
      'Create SmerniceItem' => 'Vytvořit Položka směrnice'
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
      'Create ComplaintBook' => 'Vytvořit Complaint Book'
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
      'Create ItTask' => 'Vytvořit ItTask'
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
      'status' => 'Stav',
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
      'Create JIRA' => 'Vytvořit JIRA'
    ],
    'options' => [
      'priority' => [
        1 => '1',
        2 => '2',
        3 => '3',
        4 => '4',
        5 => '5',
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
        'Canceled' => 'Canceled',
        'draft' => 'Waiting',
        'On Hold' => 'On Hold',
        'Active' => 'Active',
        'Completed' => 'Completed'
      ],
      'cRM' => [
        'crm.alis-is' => 'crm.alis-is',
        'alis-is' => 'alis-is',
        'aledo-de.alis-is' => 'aledo-de',
        'aledo-holding.alis-is' => 'aledo-holding'
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
      'Create Manufacturing' => 'Vytvořit Manufacturing'
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
    ],
    'labels' => [
      'Create Operation' => 'Vytvořit operaci'
    ]
  ],
  'PriceList' => [
    'fields' => [
      'quotes' => 'Nabídky',
      'quotes1' => 'Quotes1',
      'salesOrder' => 'Sales Order',
      'salesOrders' => 'Sales Orders',
      'products' => 'Produkty',
      'accounts' => 'Organizace',
      'productPrice' => 'Cena',
      'status' => 'Stav',
      'validUntil' => 'Platnost do'
    ],
    'links' => [
      'quotes' => 'Nabídky',
      'quotes1' => 'Quotes1',
      'salesOrder' => 'Sales Order',
      'salesOrders' => 'Sales Orders',
      'products' => 'Produkty',
      'accounts' => 'Organizace'
    ],
    'options' => [
      'status' => [
        'Draft' => 'Návrh',
        'Sent' => 'Odeslaný',
        'Approved' => 'Schválený',
        'Rejected' => 'Zamítnutý',
        'Expired' => 'Vypršelý'
      ]
    ]
  ],
  'ProductionModel' => [
    'fields' => [
      'operation' => 'Operace',
      'numberA' => 'Číslo postupu',
      'warehouse' => 'defaultOfWarehouse',
      'product' => 'Produkt',
      'status' => 'Stav',
      'default' => 'Výchozí',
      'quantity' => 'Množství',
      'unit' => 'Jednotka',
      'description' => 'Popis',
      'billOfMaterials' => 'Materiálová rozpiska',
      'operations' => 'Operace',
      'attachments' => 'Přílohy'
    ],
    'links' => [
      'operation' => 'Operace',
      'warehouse' => 'defaultOfWarehouse',
      'billOfMaterials' => 'Materiálová rozpiska',
      'operations' => 'Operace'
    ],
    'labels' => [
      'Create ProductionModel' => 'Vytvořit technologický postup'
    ],
    'tooltips' => [
      'quantity' => 'Počet produktů vyrobeno tímto technologickým postupem.',
      'default' => 'Zaškrtnutím této možnosti nastavíme technologický postup jako primární. Tzn., že se u výrobních příkazů tohoto produktu automaticky nastaví tento postup.'
    ]
  ],
  'ProductionModelItem' => [
    'fields' => [
      'name' => 'name',
      'warehouse' => 'Warehouse',
      'stock' => 'Stock',
      'stockQuantity' => 'StockQuantity',
      'productionModelOperation' => 'Operace',
      'product' => 'Produkt',
      'quantity' => 'Množství',
      'independent' => 'Nezávislé na vyráběném množství',
      'quantityWithdrawnPlanned' => 'Vyskladněno plánováno',
      'quantityWithdrawnActual' => 'Vyskladněno skutečně'
    ],
    'links' => [
      'warehouse' => 'Warehouse'
    ],
    'labels' => [
      'Create ProductionModelItem' => 'Vytvořit položku technologického postupu'
    ]
  ],
  'ProductionModelOperation' => [
    'fields' => [
      'testVykaz' => 'Test vykaz',
      'operation' => 'Operace',
      'preparationTime' => 'Přípravný čas',
      'productionTime' => 'Výrobní čas',
      'interoperationTime' => 'Mezioperační čas',
      'workCenter' => 'Pracoviště'
    ],
    'labels' => [
      'Create ProductionModelOperation' => 'Vytvořit operaci technologického postupu'
    ],
    'links' => [
      'workCenter' => 'Pracoviště'
    ]
  ],
  'ProductionOrder' => [
    'fields' => [
      'numberA' => 'Číslo příkazu',
      'itemQuantity' => 'ItemQuantity',
      'fromWarehouse' => 'From stock',
      'totalProduced' => 'Total quantity',
      'quantityPlanned' => 'Množství plánované',
      'quantityProduced' => 'Množství vyrobené',
      'stockQuantity' => 'StockQuantity',
      'entryKey' => 'EntryKey',
      'isPerform' => 'IsPerform',
      'performWorkTime' => 'PerformWorkTime',
      'availableBrno' => 'In Brno',
      'availablePv' => 'In Prostějov',
      'status' => 'Stav',
      'product' => 'Produkt',
      'productionModel' => 'Technologický postup',
      'productWarehouse' => 'Sklad výrobku',
      'materialWarehouse' => 'Sklad materiálů',
      'attachments' => 'Přílohy',
      'forceMaterialWarehouse' => 'Vynutit použití skladu u všech materiálů',
      'operations' => 'Operace',
      'billOfMaterials' => 'Materiálová rozpiska',
      'parentProductionOrder' => 'Nadřazený výrobní příkaz',
      'childProductionOrders' => 'Podřízené výrobní příkazy',
      'salesOrder' => 'Zakázka'
    ],
    'links' => [
      'warehouse' => 'Warehouse',
      'worksPerformed' => 'WorkPerformed',
      'operations' => 'Operace',
      'billOfMaterials' => 'Materiálová rozpiska',
      'workPerformed' => 'Odvedené práce',
      'parentProductionOrder' => 'Nadřazený výrobní příkaz',
      'childProductionOrders' => 'Podřízené výrobní příkazy',
      'salesOrder' => 'Zakázka'
    ],
    'options' => [
      'status' => [
        'Draft' => 'Návrh',
        'Planned' => 'Naplánováno',
        'Ongoing' => 'Probíhající',
        'Completed' => 'Dokončeno',
        'Cancelled' => 'Zrušeno'
      ]
    ],
    'labels' => [
      'Create ProductionOrder' => 'Vytvořit výrobní příkaz',
      'Configuration' => 'Konfigurace',
      'Plan' => 'Plán',
      'Perform Work Main' => 'Odvést práci',
      'Perform Work' => 'Odvést práci',
      'Perform Remaining Work' => 'Odvést zbytek'
    ],
    'tooltips' => [
      'productWarehouse' => 'Na tento sklad se přesouvá hotový výrobek.',
      'materialWarehouse' => 'Z tohoto skladu odebíráme materiál pro vytvoření výrobku.'
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
      'status' => 'Status'
    ],
    'links' => [
      'targetLists' => 'Target Lists'
    ],
    'labels' => [
      'Create Prospect' => 'Vytvořit Prospect'
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
      'salesOrder1' => 'Sales Order1',
      'case' => 'Případ',
      'status' => 'Stav',
      'product' => 'Produkt',
      'salesOrder' => 'Zakázka',
      'goodsReceipt' => 'Příjemka',
      'supplierReclamations' => 'Reklamace u dodavatele',
      'reclamationSalesOrder' => 'Reklamační zakázka'
    ],
    'options' => [
      'type' => [
        'Reclamation' => 'Reklamace',
        'Notice' => 'Upozornění'
      ],
      'status' => [
        'Draft' => 'Návrh',
        'Processing' => 'Zpracovává se',
        'Closed' => 'Uzavřeno',
        'Rejected' => 'Zamítnuto'
      ]
    ],
    'links' => [
      'parent' => 'Výdejka',
      'goodsIssue' => 'Výdejka',
      'goodsIssues' => 'Výdejka',
      'salesOrder1' => 'Sales Order1',
      'supplierReclamations' => 'Reklamace u dodavatele',
      'salesOrder' => 'Zakázka'
    ],
    'labels' => [
      'Create Reclamation Sales Order' => 'Vytvořit reklamační zakázku',
      'Create Reclamation' => 'Vytvořit reklamaci',
      'Create Supplier Reclamation' => 'Vytvořit reklamaci u dodavatele',
      'Supplier reclamation created' => 'Reklamace u dodavatele vytvořena',
      'Supplier order created' => 'Reklamační zakázka vytvořena'
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
      'Create SalesOrderSummaryItem' => 'Vytvořit Položka shrnutí zakázky'
    ]
  ],
  'Seeker' => [
    'fields' => [],
    'links' => [],
    'labels' => [
      'Create Seeker' => 'Vytvořit Seeker'
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
      'Create Selector' => 'Vytvořit Selector'
    ]
  ],
  'SupplierOrder' => [
    'fields' => [
      'salesOrder' => 'Zakázka',
      'isDelivered' => 'IsDelivered',
      'attachment' => 'Attachments',
      'account' => 'Dodavatel',
      'items' => 'Položky',
      'status' => 'Stav',
      'goodsReceipt' => 'Příjemka',
      'supplierInvoices' => 'Přijaté faktury'
    ],
    'links' => [
      'salesOrder' => 'Zakázka',
      'account' => 'Dodavatel',
      'goodsReceipt' => 'Příjemka',
      'supplierInvoices' => 'Přijaté faktury'
    ],
    'labels' => [
      'Create SupplierOrder' => 'Vytvořit objednávku u dodavatele',
      'Total Amount Panel' => 'Celkový součet objednávky',
      'Create Goods Receipt' => 'Vytvořit Příjemku',
      'Export to Excel' => 'Exportovat do Excelu',
      'Hint Products' => 'Navhrnout další produkty',
      'Delivered' => 'Dodáno'
    ],
    'options' => [
      'status' => [
        'Draft' => 'Návrh',
        'Processing' => 'Objednáno',
        'Delivered' => 'Dodáno',
        'Cancelled' => 'Zrušeno'
      ]
    ]
  ],
  'SupplierOrderItem' => [
    'fields' => [
      'deliveredQuantity' => 'DeliveredQuantity',
      'deliveredBefore' => 'DeliveredBefore',
      'stockLocation' => 'StockLocation',
      'quantity' => 'Množství',
      'catalogNumber' => 'Kód produktu',
      'minimalQuantity' => 'Minimální zásoba v ks',
      'totalQuantity' => 'Počet na skladě',
      'recentSales' => 'Prodeje za 90 dní',
      'orderedQuantity' => 'Objednané množství'
    ],
    'options' => [
      'stockLocation' => [
        'brno' => 'Brno',
        'pv' => 'Prostějov'
      ]
    ],
    'tooltips' => [
      'deliveredBefore' => 'If ordered 100 pcs of item A. We get partial 20 pcs. I must choose the correct stock. Next time we get another 20 pcs, choose the stock. In the field Delivered before is 20 pcs and in the Delivered quantity you must write 40 pcs as a new stock amount.'
    ],
    'labels' => [
      'Create SupplierOrderItem' => 'Vytvořit Položka objednávky u dodavatele'
    ]
  ],
  'SupplierReclamation' => [
    'labels' => [
      'Create SupplierReclamation' => 'Vytvořit reklamaci u dodavatele'
    ],
    'fields' => [
      'numberA' => 'Číslo reklamace',
      'case' => 'Případ',
      'status' => 'Stav',
      'product' => 'Produkt',
      'salesOrder' => 'Zakázka',
      'goodsIssue' => 'Výdejka',
      'goodsReceipt' => 'Příjemka',
      'reclamation' => 'Reklamace'
    ],
    'options' => [
      'status' => [
        'Draft' => 'Návrh',
        'Processing' => 'Zpracovává se',
        'Closed' => 'Uzavřeno',
        'Rejected' => 'Zamítnuto'
      ]
    ]
  ],
  'Tax' => [
    'fields' => [],
    'links' => [],
    'labels' => [
      'Create Tax' => 'Vytvořit Tax'
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
      'Create Wiso' => 'Vytvořit Wiso'
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
      'availableTools' => 'Dostupné nářadí',
      'description' => 'Popis',
      'productionModelOperation' => 'Operace'
    ],
    'options' => [
      'availableTools' => []
    ],
    'links' => [
      'productionModelOperations' => 'Operace technologických postupů',
      'productionModelOperation' => 'Operace'
    ],
    'labels' => [
      'Create WorkCenter' => 'Vytvořit pracoviště'
    ]
  ],
  'WorkPerformed' => [
    'fields' => [
      'parent' => 'Rodič',
      'stockLocation' => 'StockLocation',
      'description' => 'Popis',
      'operation' => 'Operace',
      'producedAmount' => 'Vyrobené množství',
      'productionOrder' => 'Výrobní příkaz',
      'workCenter' => 'Pracoviště',
      'dateStart' => 'Datum zahájení',
      'dateEnd' => 'Datum ukončení',
      'duration' => 'Trvání'
    ],
    'links' => [
      'parent' => 'Rodič',
      'operation' => 'Operace',
      'workCenter' => 'Pracoviště'
    ],
    'options' => [
      'stockLocation' => [
        'Brno' => 'Brno',
        'Prostejov' => 'Prostějov',
        'brno' => 'Brno',
        'pv' => 'Prostějov'
      ]
    ],
    'labels' => [
      'Create WorkPerformed' => 'Odvést práci'
    ]
  ],
  'CopyAttachments' => [
    'fields' => [
      'entity' => 'Entita',
      'createNew' => 'Vytvořit novou',
      'attachmentField' => 'Pole přílohy'
    ]
  ],
  'UnreliablePayer' => [
    'fields' => [
      'vatId' => 'DIČ',
      'dateOfPublication' => 'Datum zveřejnění nespolehlivosti'
    ],
    'options' => [
      'status' => [
        'payerOk' => 'Spolehlivý plátce DPH',
        'payerNotOk' => 'Nespolehlivý plátce DPH',
        'vatIdOk' => 'Platné DIČ',
        'payerIsNotValidate' => 'Nelze ověřit spolehlivost plátce',
        'Unknown' => 'DIČ není platné, nebo patří subjektu mimo EU.'
      ],
      'description' => [
        'payerOk' => 'Výsledek ověření DIČ: <b>{vatId}</b> k datu <b>{date}</b><br>Spolehlivý plátce DPH',
        'payerNotOk' => 'Výsledek ověření DIČ: <b>{vatId}</b> k datu <b>{date}</b><br>Nespolehlivý plátce DPH',
        'vatIdOk' => 'vatIdOk',
        'payerIsNotValidate' => 'Výsledek ověření DIČ: <b>{vatId}</b> k datu <b>{date}</b><br>Subjekt nenalezen',
        'Unknown' => 'Zadali jste správné číslo? Zadané DIČ <b>({vatId})</b> není platné nebo patří subjektu mimo EU.'
      ]
    ]
  ],
  'OnlyOffice' => [
    'messages' => [
      'scriptSrcMissing' => 'Skript není nastavený. Nastavte ho v integracích'
    ]
  ],
  'Payment' => [
    'labels' => [
      'Paid Today' => 'Zaplaceno dnes',
      'Record Payment Date' => 'Zaznamenat datum platby',
      'Paid on Due Date' => 'Zaplacena v den splatnosti',
      'Payment Details' => 'Platební údaje',
      'Record Payment for Invoice' => 'Zaznamenat platbu k faktuře',
      'Create Payment' => 'Vytvořit platbu'
    ],
    'fields' => [
      'account' => 'Odběratel',
      'grandTotalAmount' => 'Částka na faktuře',
      'remainingToPay' => 'Zbývá zaplatit',
      'paidOn' => 'Vyberte datum zaplacení',
      'amount' => 'Zaplacená částka',
      'amountCurrency' => 'Zaplacená částka v měně',
      'amountConverted' => 'Zaplacená částka (převedeno)',
      'markAsPaid' => 'Označit fakturu jako zaplacenou',
      'followupDocument' => 'S platbou vystavit',
      'variableSymbol' => 'Variabilní symbol platby',
      'date' => 'Datum platby',
      'taxDocument' => 'Daňový doklad k platbě'
    ],
    'options' => [
      'followupDocument' => [
        'FinalInvoicePaid' => 'Fakturu zaplacenou',
        'FinalInvoice' => 'Fakturu s doplněním',
        'TaxDocument' => 'Doklad k platbě',
        'None' => 'Nic'
      ]
    ]
  ],
  'ShippingPayments' => [
    'fields' => [
      'name' => 'Popis',
      'amount' => 'Cena',
      'taxRate' => 'DPH (%)'
    ]
  ],
  'Cooperation' => [
    'labels' => [
      'Create {entityType}' => 'Vytvořit {entityTypeTranslated}'
    ]
  ],
  'XmlTemplate' => [
    'fields' => [
      'body' => 'Tělo',
      'title' => 'Název',
      'entityType' => 'Typ entity'
    ]
  ],
  'AnalyticsPerson' => [
    'labels' => [
      'Create AnalyticsPerson' => 'Vytvořit Analytika'
    ],
    'fields' => [
      'ip' => 'Ip',
      'visitorId' => 'VisitorId',
      'visitTime' => 'VisitTime',
      'siteId' => 'SiteId'
    ]
  ],
  'Nvm' => [
    'labels' => [
      'Create Nvm' => 'Vytvořit Nvm'
    ],
    'fields' => [
      'asdf' => 'Asdf'
    ]
  ],
  'OpportunityItem' => [
    'fields' => [
      'amountConverted' => 'Částka (převedená)',
      'amountCurrency' => 'Částka v měně',
      'description' => 'Popis',
      'opportunityStage' => 'Fáze',
      'qty' => 'Množství',
      'quantity' => 'Množství',
      'unitPriceConverted' => 'Jednotková cena (Převedená)',
      'unitPriceCurrency' => 'Jednotková cena',
      'opportunity' => 'Poptávky'
    ],
    'labels' => [
      'Opportunities' => 'Příležitosti',
      'Create OpportunityItem' => 'Vytvořit Položka poptávky'
    ],
    'links' => [
      'product' => 'Produkt',
      'opportunity' => 'Poptávky'
    ]
  ],
  'ProductionO3rder' => [
    'labels' => [
      'Perform Work' => 'Odvést práci',
      'Perform Remaining Work' => 'Odvést zbytek'
    ]
  ]
];
