<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Login Example</title> 
<link href="login_and_registration.css" rel="stylesheet" type="text/css"/>
<script>

    function ajaxFillAccessLevelList()
    {
        var fileName = "ajaxGetAccessLevels.php";   /* use POST method to send data to ajax_json_search.php */
        var method = "POST";
        var urlParameterStringToSend = "";   /* Construct a url parameter string to POST to fileName */


        var http_request;
        if (window.XMLHttpRequest)
        {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            http_request = new XMLHttpRequest();
        }
        else
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


        function read_http_request_data(data)
        {
            var accessLevelDetails = JSON.parse(data);
            var htmlString = "<select id = 'accessLevel' name = 'accessLevel' required>";
            htmlString += "<option value=''>Select Access Level</option>";
            for (var i = 0; i < accessLevelDetails.length; i++)
            {
                htmlString += "<option value='" + accessLevelDetails[i].id + "'>" + accessLevelDetails[i].name + "</option>";
            }
            htmlString += "</select>";
            document.getElementById('accessLevelDiv').innerHTML = htmlString;
        }
    }
</script>

</head>

<body onload="ajaxFillAccessLevelList()">
<div id="dkit_container">
    <?php
    include_once 'header.php';
    set_header("DkIT", "Confirm Registration");
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

<form id="dkit_confirm_registration_form" action="confirm_registration_transaction.php" method="post">
<input type="hidden" id ="token" name = "token">
<label for="name">Name: </label>
<input type="text" id = "name" name = "name" required autofocus><br>

<label for="email">Email: </label>
<input type="email" id = "email" name = "email" required><br>

<label for="password">Password: </label>
<input type="password" id = "password" name = "password" required><br>

<label for="confirmPassword">Confirm Password: </label>
<input type="password" id = "confirmPassword" name = "confirmPassword" required><br>

<label for="accessLevel">Access Level: </label>
<span id="accessLevelDiv"></span>
<br>

<input type="submit" value="Activate Account">
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