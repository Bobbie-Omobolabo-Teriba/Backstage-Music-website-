<?php
session_start();
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

$name = ltrim(rtrim(filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING)));

$email = ltrim(rtrim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL)));
filter_var($email, FILTER_VALIDATE_EMAIL);

$confirmEmail = ltrim(rtrim(filter_input(INPUT_POST, "confirmEmail", FILTER_SANITIZE_EMAIL)));
filter_var($confirmEmail, FILTER_VALIDATE_EMAIL);


/* Validate input data */
if ($email != $confirmEmail)
{
    $_SESSION["error_message"] = $ERROR_MESSAGE_EMAILS_DO_NOT_MATCH;
    header("location: user_profile.php");
    exit();
}


/* Connect to the database */
require_once "configuration.php";



/* Connect to the database */
$dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   // set the PDO error mode to exception


if (($name == "") && (($email != "")))
{
    $query = "UPDATE users SET email = :email WHERE id = :id";
    $statement = $dbConnection->prepare($query);
    $statement->bindParam(":email", $email, PDO::PARAM_STR);
    $statement->bindParam(":id", $_SESSION["user_id"], PDO::PARAM_INT);
    $statement->execute();
}
else if (($name != "") && (($email == "")))
{
    $query = "UPDATE users SET name = :name WHERE id = :id";
    $statement = $dbConnection->prepare($query);
    $statement->bindParam(":name", $name, PDO::PARAM_STR);
    $statement->bindParam(":id", $_SESSION["user_id"], PDO::PARAM_INT);
    $statement->execute();

    $_SESSION["user_name"] = $name;
}
else if (($name != "") && (($email != "")))
{
    $query = "UPDATE users SET name = :name, email = :email WHERE id = :id";
    $statement = $dbConnection->prepare($query);
    $statement->bindParam(":name", $name, PDO::PARAM_STR);
    $statement->bindParam(":email", $email, PDO::PARAM_STR);
    $statement->bindParam(":id", $_SESSION["user_id"], PDO::PARAM_INT);
    $statement->execute();

    $_SESSION["user_name"] = $name;
}
mysqli_close($dbConnection);

header("location: members_area.php");
?>        
</body>
</html>