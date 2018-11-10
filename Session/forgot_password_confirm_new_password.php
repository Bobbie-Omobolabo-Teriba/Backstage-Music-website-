<?php
session_start();
?>

<!DOCTYPE html>
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
    set_header("DkIT", "Confirm New Password");
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

<form id="dkit_forgot_password_confirm_new_password_form" action="forgot_password_confirm_new_password_transaction.php" method="post">
<input type="hidden" id ="token" name = token>

<label for="email">Email: </label>
<input type="email" id = "email" name = "email" required autofocus><br>

<p>Password must be at least eight-digits long and contains at least one lowercase letter, one uppercase letter, one digit and one of the following characters (Â£!()#â‚¬$%^&*)</p>
<label for="password">New Password: </label>
<input type="password" id = "password" name = "password" required pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[Â£!()#â‚¬$%^&*]).{8,}" title="Password must be at least eight-digits long and contains at least one lowercase letter, one uppercase letter, one digit and one of the following characters (Â£!()#â‚¬$%^&*)"><br>

<label for="confirmPassword">Confirm Password: </label>
<input type="password" id = "confirmPassword" name = "confirmPassword" required pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[Â£!()#â‚¬$%^&*]).{8,}" title="Password must be at least eight-digits long and contains at least one lowercase letter, one uppercase letter, one digit and one of the following characters (Â£!()#â‚¬$%^&*)"><br>

<input type="submit" value="Change Password">
</form>
</main>

<?php
include_once 'footer.php';
?>
</div> <!-- dkit_container -->

<script>
    /* get the 'token' from the url */
    function getURLValue(name)
    {
        name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
        var regexS = "[\\?&]" + name + "=([^&#]*)";
        var regex = new RegExp(regexS);
        var results = regex.exec(window.location.href);
        if (results === null)
            return null;
        else
            return results[1];
    }

    document.getElementById('token').value = getURLValue('token');
</script>

</body>
</html>