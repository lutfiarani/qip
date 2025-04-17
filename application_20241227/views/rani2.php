<head>
    <script src="https://microsoft.github.io/PowerBI-JavaScript/demo/node_modules/powerbi-client/dist/powerbi.min.js"></script>
</head>
<body>
    <div id="reportContainer" style="height: 600px;"></div>

    <script>
        // Konfigurasi Power BI
        var config = {
            type: 'report',
            tokenType: models.TokenType.Embed,
            accessToken: 'YOUR_ACCESS_TOKEN',
            embedUrl: 'https://app.powerbi.com/reportEmbed?reportId=32e43f87-4a86-49e6-b5fd-280a0918dc5d&autoAuth=true&ctid=d7e7ea3d-79f0-4a50-b741-9e729cd509c1',
            id: '32e43f87-4a86-49e6-b5fd-280a0918dc5d',
            permissions: models.Permissions.All,
            settings: {
                filterPaneEnabled: false,
                navContentPaneEnabled: true
            }
        };

        // Sematkan visual Power BI
        var reportContainer = document.getElementById('reportContainer');
        var report = powerbi.embed(reportContainer, config);
    </script>
</body>
