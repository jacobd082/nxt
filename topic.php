<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NXT News</title>
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@800&display=swap" rel="stylesheet">
    <link rel="icon" href="/logo.png">
    <link rel="apple-touch-icon" href="/logo.png">
</head>
<div>
    <h1 style="font-family: 'Manrope', sans-serif; margin-left: 12px;" id="toptitle">nxt.</h1>
    <p>Showing articles for "<i><?php echo $_GET['q'] ?></i>"</p>
    <div style="background-color: gray; height: 4px;"></div>
    <div id="news"></div>
    <p>Source via NYT</p>
    <div id="footer" style="max-width: 400px; padding-bottom: 15px; backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);">
    </div>
    <script>
        function after(b, a) {
            return a.substring(a.indexOf(b) + 1);
        }

        document.getElementById("news").innerHTML=("<p>Loading...</p>")
        fetch('https://api.nytimes.com/svc/topstories/v2/'+after("=", window.location.href)+'.json?api-key=PqQPyzANt1BoUfEHOGGDwAzIALMUssli')
            .then((response) => response.json())
            .then((data) => handleData(data));

        function handleData(e) {
            console.log(e)
            document.getElementById("news").innerHTML=("")
            e.results.forEach((item, index) => {
                if (item.abstract==e.results[0].abstract) {
                    if (!(item.multimedia==null)) {
                        document.getElementById("news").innerHTML += "<img src=\"" + item.multimedia[0].url + "\" style='max-width:400px;'>"
                    }
                }
                document.getElementById("news").innerHTML += '<a href="viewproxy.php?url='+item.short_url+'" target="_blank" style="color: inherit; text-decoration: none;"><div style="background: rgba(255, 255, 255, 0.1); padding: 5px; margin-bottom: 10px; cursor: pointer; border-radius: 3px;><p style="width: fit-content; background-color: gray; border-radius: 3px;">'+item.section+' <i>'+item.subsection+'</i></p><b>'+item.title+'</b><p>'+item.abstract+'</p></div></a>'
            })
        }

    </script>
</body>
<style>
    body {
        background-color: black;
        color: white;
        font-family: 'Open Sans', sans-serif;
    }
    #footer {
        position: fixed;
        bottom: 0;
        right: 0;
    }
</style>
</html>