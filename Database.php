<?php

$dsn = 'mysql:host=localhost;dbname=bobbieteriba_backstage';
$username = 'bs_user';
$password = 'pa55word';

try{
    $db = new PDO($dsn, $username, $password);
    $db ->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $db ->setAttribute(PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
    error_reporting(E_ALL);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('Database_error.php');
    exit();
}
