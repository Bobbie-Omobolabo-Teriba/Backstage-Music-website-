<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Example</title>  
        <link href="../assets/main.css" rel="stylesheet" type="text/css"/>
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="icon" href="../IMG/headphones.png" type="image/gif" sizes="16x16">
        <link href="../css/one-page-wonder.css" rel="stylesheet">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="../IMG/headphones.png" type="image/gif" sizes="16x16">
    </head>

    <body>
           
        <?php
        /* Show error message for any user input errors if this form was previously submitted */
        if (isset($_SESSION["error_message"])) {
            echo "<div class='error_message'><p>" . $_SESSION["error_message"] . "<br>Please input data again.</p></div>";
            unset($_SESSION["error_message"]);
        }
        ?>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="../index.html"><img class="topImg" src="../IMG/bs.png"/></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="../index.html">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../index.html">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../Explore.php">Explore</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php">Store</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
     
    <br>
    <br>
        
    <section>
        <form action="login_transaction.php" method="post">
            <label for="email">Email: </label>
            <input type="email" id = "email" name = "email" placeholder = "Enter your email" required autofocus><br>

            <label for="password">Password: </label>
            <input type="password" id = "password" name = "password" placeholder = "Enter your password" required><br>

            <input type="submit" value="Login"><br>
        </form>

        <br><a href="forgot_password.php">Forgot password</a>
        <br><a href="register_new_user.php">Register as a new user</a>
    </section>


        <footer class="py-5 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; Backstage 2017</p>
            </div>
            <!-- /.container -->
        </footer>

        <!-- Bootstrap core JavaScript -->
        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>
</html>