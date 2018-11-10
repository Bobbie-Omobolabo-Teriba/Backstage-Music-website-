<?php
/* * ************************ You need to set the values below to match your project ************************ */

// localhost website and localhost database
$localHostSiteFolderName = "D00197875";
$localhostDatabaseName = "D00197875";
$localHostDatabaseHostAddress = "localhost";
$localHostDatabaseUserName = "root";
$localHostDatabasePassword = "";



// remotely hosted website and remotely hosted database       /* you will need to get the server details below from your host provider */
$serverWebsiteName = "http://mysql02.comp.dkit.ie/D00197875"; /* use this address if hosting website on the college students' website server */

$serverDatabaseName = "D00197875";
$serverDatabaseHostAddress = "mysql02.comp.dkit.ie";         /* use this address if hosting database on the college computing department database server */
$serverDatabaseUserName = "D00197875";
$serverDatabasePassword = "ujZgTIh1";




$useLocalHost = true;      /* set to false if your database is NOT hosted on localhost */

$useTestStripeKey = true;

if ($useTestStripeKey == true)
{
    $privateStripeKey = "sk_test_P6tKIWAEX83D1164dUaMhzeK"; 
    $publicStripeKey = "pk_test_1av2ZFX5GpPqBHoZrQKnQYSG"; 
}
else // live system
{
    $privateStripeKey = "place your private live key"; 
    $publicStripeKey = "place your public live key here"; 
}

/* * ******************************* WARNING                                 ******************************** */
/* * ******************************* Do not modify any code BELOW this point ******************************** */

if ($useLocalHost == true)
{
    $siteName = "http://localhost/" . $localHostSiteFolderName;
    $dbName = $localhostDatabaseName;
    $dbHost = $localHostDatabaseHostAddress;
    $dbUsername = $localHostDatabaseUserName;
    $dbPassword = $localHostDatabasePassword;
}
else  // using remote host
{
    $siteName = $serverWebsiteName;
    $dbName = $serverDatabaseName;
    $dbHost = $serverDatabaseHostAddress;
    $dbUsername = $serverDatabaseUserName;
    $dbPassword = $serverDatabasePassword;
}

/* Connect to the database */
/* Not needed in this example */
/* However, you will need to connect to a database in the real world, so that you can save customer order details */
// $dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
// $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   // set the PDO error mode to exception


chmod("configuration.php", 0600); // do not allow anyone to view this file
