<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nxt Article</title>
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@800&display=swap" rel="stylesheet">
</head>
<body>
    <div style="display: flex;">
        <div id="left">
            <h1 style="font-family: 'Manrope', sans-serif; margin-left: 7px;margin-bottom: 0px;"><span>nxt.</span></h1>
            <a href="javascript:history.back()">← Go Back</a><br>
            <p style="color: gray;">This article is made by a new organization not related to NXT, all article content is not affiliated with NXT.</p>
            <a href="<?php echo $_GET['url']; ?>">Open Article</a>
        </div>
        <iframe src="viewproxy.php?url=<?php echo $_GET['url'];?>">Error</iframe>
    </div>
</body>
<style>
    iframe {
        width: 800px;
        height: 100vh;
        border: none;
    }
    body {
        margin: 0;
        font-family: 'Manrope';
        /* background: black;
        color: white; */
    }
    a {
        color: black;
        text-decoration: none;
    }
    a:hover {
        text-decoration: underline;
    }
    #left {
        padding: 10px;
        width: 290px;
    }
    @media screen and (min-width: 0px) and (max-width: 1100px) {
        #left {
            display: none;
        }
    }
</style>
</html>