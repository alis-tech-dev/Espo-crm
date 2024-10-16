<!doctype html>
<html lang="{{lang}}">
<head>
    <title>{{applicationName}}</title>
	<script type="text/javascript" src="client/modules/autocrm/src/js/extender.old.js?r={{cacheTimestamp}}"></script>{{scriptsHtml}}
    <link href="{{basePath}}{{stylesheet}}?r={{cacheTimestamp}}" rel="stylesheet" id='main-stylesheet'>{{additionalStyleSheetsHtml}}{{linksHtml}}
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="{{applicationDescription}}">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" sizes="196x196" href="{{basePath}}{{favicon196Path}}">
    <link rel="icon" href="{{basePath}}{{faviconPath}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{basePath}}{{faviconPath}}" type="image/x-icon">
    <script type="text/javascript" nonce="{{nonce}}">
        window.addEventListener('DOMContentLoaded', () => {
            Espo.loader.setCacheTimestamp({{loaderCacheTimestamp}});
            Espo.loader.setBasePath('{{basePath}}');
            Espo.loader.setInternalModuleList({{internalModuleList}});
            Espo.loader.setViewExtensionMap({{extensionViews}});

            require('{{appClientClassName}}', App => {
                new App({
                    id: '{{applicationId}}',
                    useCache: {{useCache}},
                    cacheTimestamp: {{cacheTimestamp}},
                    basePath: '{{basePath}}',
                    apiUrl: '{{apiUrl}}',
                    ajaxTimeout: {{ajaxTimeout}},
                    internalModuleList: {{internalModuleList}},
                }, app => {
                    {{runScript}}
                });
            });
        });
    </script>
</head>
<body>
<div class="container content"></div>
<footer>
    <p class="credit small">&copy; 2022
        <a href="https://www.autocrm.cz" title="Powered by AutoCRM" rel="noopener" target="_blank">AutoCRM</a></p>
</footer>
</body>
</html>
