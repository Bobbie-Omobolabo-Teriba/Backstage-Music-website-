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
/* Show error message for any user input errors if this form was previously submitted */
if (isset($_SESSION["error_message"]))
{
    echo "<div class='error_message'>" . $_SESSION["error_message"] . "</div>";
    unset($_SESSION["error_message"]);
}
else
{
    echo "<div class='error_message'><p>Invalid input.</p></div>";
}
?>

<br><a href="login.php">Go to login webpage</a>

</div> <!-- dkit_container -->
</body>
</html>