<?php
session_start();
if (!isset($_SESSION["user_id"]))
{
    header("location: login.php");
    exit();
}
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
<p>The "members_area.php" file contains a template that can be used for any webpages that is password protected within this website.</p>
<p>The user must be logged in to see this webpage.</p>
<?php
echo "<h1>Welcome " . $_SESSION["user_name"] . "</h1>";
?>

<p>If you see this text, then you have successfully logged in!</p>
</main>

<?php
include_once 'footer.php';
?>
</div> <!-- dkit_container -->
</body>
</html>