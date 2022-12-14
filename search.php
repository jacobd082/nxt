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
    <p>Search Results for "<i><?php echo $_GET['q'] ?></i>"</p>
    <div style="background-color: gray; height: 4px;"></div>
    <div id="news"></div>
    <p>Source via NYT & The Guardian</p>
    <div id="footer" style="max-width: 400px; padding-bottom: 15px; backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);">
        <form action="search.php" method="get">
            <input id="q" name="q" placeholder="Search nxt..." style="width: 300px;
            padding: 8px;
            border: none;
            color: white;
            background-color: rgba(221, 221, 221, 0.2);
            border-radius: 70px;">
            <button style="
            padding: 8px;
            border: none;
            border-radius: 70px;
            color: white;
            background: rgb(178,82,245);
            background: linear-gradient(90deg, rgba(178,82,245,1) 0%, rgba(112,62,222,1) 35%, rgba(0,212,255,1) 100%);
            "
            type="submit"
            >Search</button>
        </form>
    </div>
    <script>
        function after(b, a) {
            return a.substring(a.indexOf(b) + 1);
        }

        document.getElementById("news").innerHTML=("<p>Loading...</p>")
        fetch('https://api.nytimes.com/svc/search/v2/articlesearch.json?q='+after("=", window.location.href)+'&api-key=PqQPyzANt1BoUfEHOGGDwAzIALMUssli')
            .then((response) => response.json())
            .then((data) => handleData(data));

        function handleData(e) {
            console.log(e)
            document.getElementById("news").innerHTML=("")
            e.response.docs.forEach(item => {
                    let sectionText = ""
                    console.log(item)
                    if (item.subsection_name=="" || item.subsection_name==undefined) {
                        sectionText = item.section_name
                    } else {
                        sectionText = item.subsection_name
                    }
                    document.getElementById("news").innerHTML += '<a href="view.php?url='+item.web_url+'" target="_blank" style="color: inherit; text-decoration: none;"><div class="art" style="background: rgba(255, 255, 255, 0.0); padding: 5px; margin-bottom: 10px; cursor: pointer; border-radius: 3px;><p style="width: fit-content; background-color: gray; border-radius: 3px;"></p><b style="font-size: large;font-family: \'Manrope\', sans-serif;">'+item.headline.main+'</b><p><i>'+sectionText.toUpperCase()+'</i> - '+item.abstract+'</p><table><tr><td><img src="apps/nyt.png" width="20px"></td><td><p><i>The New York Times</i></p></td></tr></table></div></a><hr style="height: 1px;background-color: #121212;border: none;">'
            })
            fetch('https://content.guardianapis.com/search?q='+after("=", window.location.href)+'%20news&api-key=test')
            .then((response) => response.json())
            .then((data) => handleDataGUARD(data));
        }
        function handleDataGUARD(e) {
            console.log(e.response.results)
            e.response.results.forEach(item => {
                document.getElementById("news").innerHTML += '<a href="view.php?url='+item.webUrl+'" target="_blank" style="color: inherit; text-decoration: none;"><div class="art" style="background: rgba(255, 255, 255, 0.0); padding: 5px; margin-bottom: 10px; cursor: pointer; border-radius: 3px;><p style="width: fit-content; background-color: gray; border-radius: 3px;"><i>'+item.sectionName.toUpperCase()+'</i></p><b style="font-size: large;font-family: \'Manrope\', sans-serif;">'+item.webTitle+'</b><table><tr><td><img src="apps/guard.png" width="20px" style="border-radius: 500px;"></td><td><p><i>The Guardian</i></p></td></tr></table></div></a><hr style="height: 1px;background-color: #121212;border: none;">'
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