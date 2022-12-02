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
                let showingDataWithLargeImage = false
                if (item.abstract==e.results[0].abstract) {
                    if (window.innerWidth<500) {
                        document.getElementById("news").innerHTML += "<img src=\"" + item.multimedia[0].url + "\" style='max-width:400px;'>"
                    } else {
                        document.getElementById("news").innerHTML += '<div style="display: flex;"><img src=\"' + item.multimedia[0].url + '\" style="height:400px;padding-right: 10px;"><div style="padding-top: 20px;"><a href="viewproxy.php?url='+item.short_url+'" target="_blank" style="color: inherit; text-decoration: none;"><div style="padding: 5px; margin-bottom: 10px; cursor: pointer; border-radius: 3px;><p style="width: fit-content; background-color: gray; border-radius: 3px;">'+item.section+' <i>'+item.subsection+'</i></p><h1 style="font-family: \'Manrope\', sans-serif;">'+item.title+'</h1><p>'+item.abstract+'</p><p><i>The New York Times</i></p></div></a></div></div>'
                        showingDataWithLargeImage = true
                    }
                }
                if (!showingDataWithLargeImage) {
                    let sectionText = ""
                    // console.log(item.subsection)
                    if (item.subsection=="" || item.subsection==undefined) {
                        sectionText = item.section
                    } else {
                        sectionText = item.subsection
                    }
                    document.getElementById("news").innerHTML += '<a href="viewproxy.php?url='+item.short_url+'" target="_blank" style="color: inherit; text-decoration: none;"><div class="art" style="background: rgba(255, 255, 255, 0.0); padding: 5px; margin-bottom: 10px; cursor: pointer; border-radius: 3px;><p style="width: fit-content; background-color: gray; border-radius: 3px;"></p><b style="font-size: large;font-family: \'Manrope\', sans-serif;">'+item.title+'</b><p><i>'+sectionText.toUpperCase()+'</i> - '+item.abstract+'</p><table><tr><td><img src="apps/nyt.png" width="20px"></td><td><p><i>The New York Times</i></p></td></tr></table></div></a><hr style="height: 1px;background-color: #121212;border: none;">'
                }
                
              
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