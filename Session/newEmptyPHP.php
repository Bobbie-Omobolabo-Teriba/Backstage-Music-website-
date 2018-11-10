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
    set_header("DkIT", "Change Password");
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

<form id="dkit_change_password_form" action="change_password_transaction.php" method="post">
<label for="old_password">Old Password: </label>
<input type="password" id = "old_password" name = "old_password" required autofocus><br>
<br>

<p>Password must be at least eight-digits long and contains at least one lowercase letter, one uppercase letter, one digit and one of the following characters (Â£!()#â‚¬$%^&*)</p>
<label for="new_password">New Password: </label>
<input type="password" id = "new_password" name = "new_password" required pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[Â£!()#â‚¬$%^&*]).{8,}" title="Password must be at least eight-digits long and contains at least one lowercase letter, one uppercase letter, one digit and one of the following characters (Â£!()#â‚¬$%^&*)"><br>

<label for="confirm_new_password">Confirm New Password: </label>
<input type="password" id = "confirm_new_password" name = "confirm_new_password" required pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[Â£!()#â‚¬$%^&*]).{8,}" title="Password must be at least eight-digits long and contains at least one lowercase letter, one uppercase letter, one digit and one of the following characters (Â£!()#â‚¬$%^&*)"><br>

<input type="submit" value="Change Password">
</form>

</main>

<?php
include_once 'footer.php';
?>
</div> <!-- dkit_container -->

</body>
</html>