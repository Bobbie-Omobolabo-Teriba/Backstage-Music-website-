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
</head>
<body>

<?php
/* Read posted data */
require_once "error_messages.php";  // contains a list of error messages that can be assigned to $_SESSION["error_message"]

$old_password = ltrim(rtrim(filter_input(INPUT_POST, "old_password", FILTER_SANITIZE_STRING)));
if (empty($old_password))
{
    $_SESSION["error_message"] = $ERROR_MESSAGE_INVALID_OR_EMPTY_FIELD;
    header("location: change_password.php"); // deal with invalid input
    exit();
}

$new_password = ltrim(rtrim(filter_input(INPUT_POST, "new_password", FILTER_SANITIZE_STRING)));
if (empty($new_password))
{
    $_SESSION["error_message"] = $ERROR_MESSAGE_INVALID_OR_EMPTY_FIELD;
    header("location: change_password.php"); // deal with invalid input
    exit();
}

$confirm_new_password = ltrim(rtrim(filter_input(INPUT_POST, "confirm_new_password", FILTER_SANITIZE_STRING)));
if (empty($confirm_new_password))
{
    $_SESSION["error_message"] = $ERROR_MESSAGE_INVALID_OR_EMPTY_FIELD;
    header("location: change_password.php"); // deal with invalid input
    exit();
}


/* Validate input data */
if ($new_password != $confirm_new_password)
{
    $_SESSION["error_message"] = $ERROR_MESSAGE_PASSWORDS_DO_NOT_MATCH;
    header("location: change_password.php");
    exit();
}


/* Connect to the database */
require_once "configuration.php";



/* Connect to the database */
$dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   // set the PDO error mode to exception


/* Check that user is not already added  */
$query = "SELECT password FROM users WHERE id = :id";
$statement = $dbConnection->prepare($query);
$statement->bindParam(":id", $_SESSION["user_id"], PDO::PARAM_INT);
$statement->execute();

if ($statement->rowCount() == 0)
{
    $_SESSION["error_message"] = $ERROR_MESSAGE_INVALID_OR_EMPTY_FIELD;
    header("location: change_password.php"); // deal with invalid input
    exit();
}

$row = $statement->fetch(PDO::FETCH_OBJ);
if (!password_verify($old_password, $row->password))
{
    $_SESSION["error_message"] = $ERROR_MESSAGE_OLD_PASSWORD_INCORRECT;
    header("location: change_password.php");
    exit();
}

// change the user's password
$hashedPassword = password_hash($new_password, PASSWORD_DEFAULT);
$query = "UPDATE users SET password = :password WHERE id = :id";
$statement = $dbConnection->prepare($query);
$statement->bindParam(":password", $hashedPassword, PDO::PARAM_STR);
$statement->bindParam(":id", $_SESSION["user_id"], PDO::PARAM_INT);
$statement->execute();


header("location: members_area.php");
?>        
</body>
</html>