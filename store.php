<?php
require ("Database.php");

    $album_id = filter_input(INPUT_GET, 'album_id', FILTER_VALIDATE_INT);


$query = 'SELECT albumID FROM albumOrder WHERE albumID =:album_id';
$statement = $db->prepare($query);
$statement->bindValue(":album_id", $album_id);
$statement->execute();
$albums = $statement->fetch();
$statement->closeCursor();


?>


<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Backstage - Store</title>

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/storeCss.css" rel="stylesheet" type="text/css"/>
        <link rel="icon" href="IMG/headphones.png" type="image/gif" sizes="16x16">
        <script src="vendor/jquery/store.js" type="text/javascript"></script>
        <link href="css/one-page-wonder.css" rel="stylesheet">

    </head>

    <body>

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
                            <a class="nav-link" href="#mid">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="explore.php">Explore</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="store.php">Store</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <br>


        <section>
            <div class="container">
                <h2>Top Albums of 2017 </h2>
            </div>
        </section>
        <br>
        <section id="mid">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <article class="col-item">
                            <div class="photo">
                                <div class="options-cart">
                                    <button class="btn btn-default" title="Add to cart">
                                        <a href ="checkout.php.?album_id=1">
                                            <span class="fa fa-shopping-cart"></span>
                                        </a>
                                    </button>
                                </div>
                                <a href="#"> <img class="storeImg" src="IMG/childish.jpg" class="img-responsive" alt="Product Image" /> </a>
                            </div>
                            <div class="info">
                                <div class="row">
                                    <div class="price-details col-md-9">
                                        <p class="details">Childish Gambino</p>
                                        <p class="details">Genre: R&B/Soul</p>
                                        <h1>Awaken, My Love</h1>
                                        <span id="albumPrice">€13.99</span>
                                    </div>
                                </div>
                            </div>
                            </article>
                    </div>
                    <div class="col-sm-3">
                        <article class="col-item">
                            <div class="photo">
                                <div class="options-cart">
                                    <button class="btn btn-default" title="Add to cart">
                                        <a href ="checkout.php.?album_id=2">
                                            <span class="fa fa-shopping-cart"></span>
                                        </a>
                                    </button>
                                </div>
                                <a href="#"> <img src="IMG/damn.jpg" class="img-responsive" alt="Product Image" /> </a>
                            </div>
                            <div class="info">
                                <div class="row">
                                    <div class="price-details col-md-9">
                                        <p class="details">Kendrick Lamar</p>
                                        <p class="details">Genre: Hip Hop</p>
                                        <h1>Damn</h1>
                                        <span id="albumPrice">€14.00</span>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-sm-3">
                        <article class="col-item">
                            <div class="photo">
                                <div class="options-cart">
                                    <button class="btn btn-default" title="Add to cart">
                                        <a href ="checkout.php.?album_id=3">
                                            <span class="fa fa-shopping-cart"></span>
                                        </a>
                                    </button>
                                </div>
                                <a href="#"> <img src="IMG/morelife.jpg" class="img-responsive" alt="Product Image" /> </a>
                            </div>
                            <div class="info">
                                <div class="row">
                                    <div class="price-details col-md-9">
                                        <p class="details">Drake</p>
                                        <p class="details">Genre: Hip Hop/R&B</p>
                                        <h1>More Life</h1>
                                        <span id="albumPrice">€14.99</span>
                                    </div>
                                </div>
                                </div>
                        </article>
                    </div>
                    <div class="col-sm-3">
                        <article class="col-item">
                            <div class="photo">
                                <div class="options-cart">
                                    <button class="btn btn-default" title="Add to cart">
                                        <a href ="checkout.php.?album_id=4">
                                            <span class="fa fa-shopping-cart"></span>
                                        </a>
                                    </button>
                                </div>
                                <a href="#"> <img src="IMG/humanz.png" class="img-responsive" alt="Product Image" /> </a>
                            </div>
                            <div class="info">
                                <div class="row">
                                    <div class="price-details col-md-9">
                                        <p class="details">Gorillaz</p>
                                        <p class="details">Genre: Contemporary R&B</p>
                                        <h1>Humanz</h1>
                                        <span id="albumPrice">€12.00</span>
                                    </div>
                                </div>
                                </div>
                        </article>
                    </div>


                    <div class="col-sm-3">
                        <article class="col-item">
                            <div class="photo">
                                <div class="options-cart">
                                    <button class="btn btn-default" title="Add to cart">
                                        <a href ="checkout.php.?album_id=5">
                                            <span class="fa fa-shopping-cart"></span>
                                        </a>
                                    </button>
                                </div>
                                <a href="#"> <img src="IMG/wardrugs.jpg" class="img-responsive" alt="Product Image" /> </a>
                            </div>
                            <div class="info">
                                <div class="row">
                                    <div class="price-details col-md-9">
                                        <p class="details">The War on Drugs</p>
                                        <p class="details">Genre: Electropop</p>
                                        <h1>A Deeper Understanding</h1>
                                        <span id="albumPrice">€10.00</span>
                                    </div>
                                </div>
                                </div>
                        </article>
                    </div>
                    <div class="col-sm-3">
                        <article class="col-item">
                            <div class="photo">
                                <div class="options-cart">
                                    <button class="btn btn-default" title="Add to cart">
                                        <a href ="checkout.php.?album_id=6">
                                            <span class="fa fa-shopping-cart"></span>
                                        </a>
                                    </button>
                                </div>
                                <a href="#"> <img src="IMG/drunkcat.jpg" class="img-responsive" alt="Product Image" /> </a>
                            </div>
                            <div class="info">
                                <div class="row">
                                    <div class="price-details col-md-9">
                                        <p class="details">Thundercat</p>
                                        <p class="details">Genre: Jazz Fusion</p>
                                        <h1>Drunk</h1>
                                        <span id="albumPrice">€13.00</span>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-sm-3">
                        <article class="col-item">
                            <div class="photo">
                                <div class="options-cart">
                                    <button class="btn btn-default" title="Add to cart">
                                        <a href ="checkout.php.?album_id=7">
                                            <span class="fa fa-shopping-cart"></span>
                                        </a>
                                    </button>
                                </div>
                                <a href="#"> <img src="IMG/lorde.png" class="img-responsive" alt="Product Image" /> </a>
                            </div>
                            <div class="info">
                                <div class="row">
                                    <div class="price-details col-md-9">
                                        <p class="details">Lorde</p>
                                        <p class="details">Genre: Electropop</p>
                                        <h1>Melodrama</h1>
                                        <span id="albumPrice">€11.99</span>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-sm-3">
                        <article class="col-item">
                            <div class="photo">
                                <div class="options-cart">
                                    <button class="btn btn-default" title="Add to cart">
                                        <a href ="checkout.php.?album_id=8">
                                            <span class="fa fa-shopping-cart"></span>
                                        </a>
                                    </button>
                                </div>
                                <a href="#"> <img src="IMG/reputation.jpg" class="img-responsive" alt="Product Image" /> </a>
                            </div>
                            <div class="info">
                                <div class="row">
                                    <div class="price-details col-md-9">
                                        <p class="details">Taylor Swift</p>
                                        <p class="details">Genre: Electropop</p>
                                        <h1>Reputation</h1>
                                        <span id="albumPrice">€19.00</span>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-sm-3">
                        <article class="col-item">
                            <div class="photo">
                                <div class="options-cart">
                                    <button class="btn btn-default" title="Add to cart">
                                        <a href ="checkout.php.?album_id=9">
                                            <span class="fa fa-shopping-cart"></span>
                                        </a>
                                    </button>
                                </div>
                                <a href="#"> <img src="IMG/stoneage.png" class="img-responsive" alt="Product Image" /> </a>
                            </div>
                            <div class="info">
                                <div class="row">
                                    <div class="price-details col-md-9">
                                        <p class="details">Queens of the Stone Age</p>
                                        <p class="details">Genre: Boogie Rock</p>
                                        <h1>Villions</h1>
                                        <span id="albumPrice">€14.99</span>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-sm-3">
                        <article class="col-item">
                            <div class="photo">
                                <div class="options-cart">
                                    <button class="btn btn-default" title="Add to cart">
                                        <a href ="checkout.php.?album_id=10">
                                            <span class="fa fa-shopping-cart"></span>
                                        </a>
                                    </button>
                                </div>
                                <a href="#"> <img src="IMG/sza.jpg" class="img-responsive" alt="Product Image" /> </a>
                            </div>
                            <div class="info">
                                <div class="row">
                                   <div class="price-details col-md-9">
                                        <p class="details">SZA</p>
                                        <p class="details">Genre: Neo Soul</p>
                                        <h1>Ctrl</h1>
                                        <span id="albumPrice">€13.95</span>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-sm-3">
                        <article class="col-item">
                            <div class="photo">
                                <div class="options-cart">
                                    <button class="btn btn-default" title="Add to cart">
                                        <a href ="checkout.php.?album_id=11">
                                            <span class="fa fa-shopping-cart"></span>
                                        </a>
                                    </button>
                                </div>
                                <a href="#"> <img src="IMG/stormzy.jpg" class="img-responsive" alt="Product Image" /> </a>
                            </div>
                            <div class="info">
                                <div class="row">
                                    <div class="price-details col-md-9">
                                        <p class="details">Stormzy</p>
                                        <p class="details">Genre: Grime</p>
                                        <h1>Gang Signs and Prayers</h1>
                                        <span id="albumPrice">€9.99</span>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-sm-3">
                        <article class="col-item">
                            <div class="photo">
                                <div class="options-cart">
                                    <button class="btn btn-default" title="Add to cart">
                                        <a href ="checkout.php.?album_id=12">
                                            <span class="fa fa-shopping-cart"></span>
                                        </a>
                                    </button>
                                </div>
                                <a href="#"> <img src="IMG/samsmith.jpg" class="img-responsive" alt="Product Image" /> </a>
                            </div>
                            <div class="info">
                                <div class="row">
                                    <div class="price-details col-md-9">
                                        <p class="details">Sam Smith</p>
                                        <p class="details">Genre: R&B</p>
                                        <h1>The Thrill of It All</h1>
                                        <span id="albumPrice">€14.00</span>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div> 
                <br>
                <hr>
                <a href="https://www.facebook.com/" target="blank"><img class="linkImg" src="IMG/facebook.png" alt=""/></a>
                <a href="https://twitter.com/" target="blank"><img class="linkImg" src="IMG/twitter.png" alt=""/></a>
                <a href="https://gmail.com/" target="blank"><img class="linkImg" src="IMG/gmail.png" alt=""/></a>
                <br> 
            </div>
        </section>
        <br>



        <!-- Footer -->
        <footer class="py-5 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; Backstage 2017</p>
            </div>
            <!-- /.container -->
        </footer>

        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    </body>

</html>
