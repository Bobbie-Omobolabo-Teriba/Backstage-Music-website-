<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Example</title>
<link href="login_and_registration.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div id="dkit_container">
    <?php
    include_once 'header.php';
    set_header("DkIT", "Home Page");
    ?>

<main>
<p>The "home.php" file can be used as a template for any webpage that is not password protected within this website.</p>
</main>

<?php
include_once 'footer.php';
?>
</div> <!-- dkit_container -->
</body>
</html>