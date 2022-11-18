<head>
    <title>NXT News Viewer</time>
    <link rel="icon" href="/logo.png">
    <link rel="apple-touch-icon" href="/logo.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php

echo file_get_contents($_GET['url']);


?>
</body>