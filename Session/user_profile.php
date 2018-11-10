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
    set_header("DkIT", "User Profile");
    ?>

<main>
    <?php
    /* Show error message for any user input errors if this form was previously submitted */
    if (isset($_SESSION["error_message"]))
    {
        echo "<div class='error_message'><p>" . $_SESSION["error_message"] . "<br>Please input data again.</p></div>";
        unset($_SESSION["error_message"]);
    }
    ?>

<form id="dkit_user_profile_form" action="user_profile_transaction.php" method="post">
<label for="name">New Name: </label>
<input type="text" id = "name" name = "name"  autofocus><br>

<label for="email">New Email: </label>
<input type="email" id = "email" name = "email" ><br>

<label for="confirmEmail">Confirm New Email: </label>
<input type="email" id = "confirmEmail" name = "confirmEmail" ><br>

<a href="change_password.php">Change Password</a><br><br>

<input type="submit" value="Update Profile">
</form>
</main>

<?php
include_once 'footer.php';
?>
</div> <!-- dkit_container -->
</body>
</html>