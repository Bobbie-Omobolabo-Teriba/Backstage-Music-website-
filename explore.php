<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Backstage - Home page</title>

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <link rel="icon" href="IMG/headphones.png" type="image/gif" sizes="16x16">
        <link href="css/one-page-wonder.css" rel="stylesheet">
        <style>
            .imgAlbum
            {
                height:300px;
                width: 300px;
                border-radius: 50%;
                margin-left: 50px;
            }
            .linkImg
            {
                width: 50px;
                height:50px;
                margin:auto;
            }
        </style>
        <script>

            function ajaxGetArtist()
            {
                var fileName = "ajaxGetArtists.php";  /* name of file to send request to */
                var method = "POST";                     /* use POST method */
                var urlParameterStringToSend = "";           /* Construct a url parameter string to POST to fileName */

                var http_request;

                if (window.XMLHttpRequest)
                {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    http_request = new XMLHttpRequest();
                } else
                {
                    // code for IE6, IE5
                    http_request = new ActiveXObject("Microsoft.XMLHTTP");
                }
                http_request.onreadystatechange = function ()
                {
                    if ((http_request.readyState === 4) && (http_request.status === 200))
                    {
                        read_http_request_data(http_request.responseText);
                    }
                };

                http_request.open(method, fileName, true);
                http_request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                http_request.send(urlParameterStringToSend);

                function read_http_request_data(responseText)
                {

                    var jsonData = JSON.parse(responseText);
                    var htmlString = "<table><tr><th>Name</th><th>Genre</th><th>Country</th></tr>";

                    for (var i = 0; i < jsonData.length; i++)
                    {

                        htmlString += "<tr><td>" + jsonData[i].name + "</td><td>" + jsonData[i].genre + "</td><td>" + jsonData[i].country + "</td></tr>";
                    }
                    htmlString += "</table><br>";
                    document.getElementById('artistList').innerHTML = htmlString;


                }
            }

            function ajaxGetSong()
            {
                var fileName = "ajaxGetSongs.php";  /* name of file to send request to */
                var method = "POST";                     /* use POST method */
                var urlParameterStringToSend = "";           /* Construct a url parameter string to POST to fileName */
                var http_request;

                if (window.XMLHttpRequest)
                {
                    http_request = new XMLHttpRequest();

                } else
                {
                    http_request = new ActiveXObject("Microsoft.XMLHTTP");

                }
                http_request.onreadystatechange = function ()
                {

                    if ((http_request.readyState === 4) && (http_request.status === 200))

                    {

                        read_http_request_data(http_request.responseText);

                    }
                };
                http_request.open(method, fileName, true);
                http_request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                http_request.send(urlParameterStringToSend);

                function read_http_request_data(responseText)
                {
                    var jsonData = JSON.parse(responseText);
                    var htmlString = "<table><tr><th>#</th><th>Title</th><th>Artist</th><th>Album</th><th>Genre</th><th>Release Date</th></tr>";

                    for (var i = 0; i < jsonData.length; i++)
                    {
                        htmlString += "<tr><td>" + jsonData[i].songID + "</td><td>" + jsonData[i].title + "</td><td>" + jsonData[i].artist + "</td><td>" + jsonData[i].album + "</td><td>" + jsonData[i].genre + "</td><td>" + jsonData[i].releaseDate + "</td></tr>";
                    }
                    htmlString += "</table><br>";
                    document.getElementById('songList').innerHTML = htmlString;
                }
            }

            function ajaxGetDetails()
            {
                ajaxGetArtist();
                ajaxGetSong();
            }

        </script>
    </head>

    <body onload="ajaxGetDetails();">

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="index.html"><img class="topImg" src="IMG/bs.png"/></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.html">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Explore.php">Explore</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="store.php">Store</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <section class="bighead">
            <div class="overlay">
                <img class ="bigheadImg" src="https://www.recordingconnection.com/wp-content/uploads/2013/05/studio-hdr-1024x515.jpg"/>
                <div class="container">
                    <h2 id="bigheadH" class="display-3 text-white">Explore and Express</h2>
                </div>
            </div>
        </section>
        <br>
        <br>
        <section>
            <div class="container">
                <img class="imgAlbum" src="IMG/albumPic1.jpg" alt=""/>
                <img class="imgAlbum" src="IMG/albumPic2.jpg" alt=""/>
                <img class="imgAlbum" src="IMG/albumPic3.jpg" alt=""/>
                <br>
                <br>
                <h4>Up And Coming Arists</h4>
                <br>
                <p id ="artistList"></p>    
                <h4>On the Rise Songs</h4>
                <br>
                <p id ="songList"></p> 
                <hr>
                <a href="https://www.facebook.com/" target="blank"><img class="linkImg" src="IMG/facebook.png" alt=""/></a>
                <a href="https://twitter.com/" target="blank"><img class="linkImg" src="IMG/twitter.png" alt=""/></a>
                <a href="https://gmail.com/" target="blank"><img class="linkImg" src="IMG/gmail.png" alt=""/></a>
                <br>
                <br>
            </div>

        </section>



        <footer class="py-5 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; Backstage 2017</p>
            </div>
        </footer>

        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    </body>

</html>
