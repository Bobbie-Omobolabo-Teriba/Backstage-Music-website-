<?php
require ("Database.php");

$album_id = filter_input(INPUT_GET, 'album_id', FILTER_VALIDATE_INT);

$query = 'SELECT * FROM albumOrder WHERE albumID =:album_id';
$statement = $db->prepare($query);
$statement->bindValue(":album_id", $album_id);
$statement->execute();
$statement->closeCursor();
$statement->execute();

include('getImage.php');

while ($row = $statement->fetch()) {

    $album_id = $row['albumID'];
    $title = $row['title'];
    $genre = $row['genre'];
    $price = $row['price'];
    $artist = $row['artist'];
}

?>


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
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="css/checkoutCss.css" rel="stylesheet" type="text/css"/>
        <link rel="icon" href="IMG/headphones.png" type="image/gif" sizes="16x16">
        <link href="css/one-page-wonder.css" rel="stylesheet">

        <style>
            .linkImg
            {
                width: 50px;
                height:50px;
                margin:auto;
            }
            .orderedAlbum
            {
                width:100px;
                height:100px;
            }
            h5,h4{
                margin-left: 15px;
            }
        </style>
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
        <section id="mid">

            <div class="container">
                <h2>Shopping Cart</h2>
                <table id="cart" class="table table-hover table-condensed">
                    <thead>
                        <tr>
                            <th style="width:50%">Product</th>
                            <th style="width:10%">Price</th>
                            <th style="width:22%" class="text-center">Subtotal</th>
                            <th style="width:10%"></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-th="Product">
                                <div class="row">
                                    <div class="col-sm-2 hidden-xs"><img class="orderedAlbum" src="<?php  echo $image ?>" alt="..." class="img-responsive"/></div>
                                    <div class="col-sm-6">
                                        <h4><?php echo $title?></h4>
                                        <h5><?php echo $artist?></h5>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Price: ">
                                €<?php echo $price?>
<!--                            </td>
                            <td data-th="Quantity">
                                <input type="number" name="numberOfProductA" class="form-control text-center" value="1" readonly>
                            </td>-->
                            <td data-th="Subtotal" class="text-center">
                                <input type="number" id="paymentAmount" class="form-control text-center" value="<?php echo $price?>" readonly>
                            </td>
                            <td></td>
                            <td class="actions" data-th="">
                                <button class="btn btn-info btn-sm"><i class="fa fa-refresh" onclick="location.reload(true)"></i></button>
                                <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>								
                            </td>
                            
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td><a href="store.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                            <td colspan="2" class="hidden-xs"></td>
                            <td class="hidden-xs text-center"><strong>Subtotal <?php echo $price?></strong></td>
                            
                            <td>
                                <a href="index.php.?album_id=<?php echo $album_id?>" class="btn btn-success btn-block">Checkout 
                                    <i class="fa fa-angle-right"></i></a>
                            </td>
                        </tr>
                    </tfoot>
                </table>
                <br>
                <hr>
                <a href="https://www.facebook.com/" target="blank"><img class="linkImg" src="IMG/facebook.png" alt=""/></a>
                <a href="https://twitter.com/" target="blank"><img class="linkImg" src="IMG/twitter.png" alt=""/></a>
                <a href="https://gmail.com/" target="blank"><img class="linkImg" src="IMG/gmail.png" alt=""/></a>
                <br> 
                <br>
            </div>

        </section>



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
