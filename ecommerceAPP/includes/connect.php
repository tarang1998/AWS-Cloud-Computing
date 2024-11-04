<?php

// Enable error reporting
error_reporting(-1);
ini_set('display_errors', TRUE);


// Define the path to your SSL certificate
$ssl_cert_path = '/var/www/html/global-bundle.pem'; // Path to the downloaded SSL certificate


// Define database connection variables (these will be set by UserData)
$servername = '';
$username = '';
$password = '';
$dbname = '';


// Creating a new MySQLi connection
//$con = new mysqli($servername, $username, $password, $dbname);

// Check connection
//if ($con->connect_error) {
//    die("Connection failed: " . $con->connect_error);
//}

$con = mysqli_init();
mysqli_ssl_set($con,NULL,NULL,$ssl_cert_path,NULL,NULL);
mysqli_real_connect($con,$servername, $username, $password, $dbname, 3306, NULL, MYSQLI_CLIENT_SSL);

// Set SSL options
//$con->ssl_set(null, null, $ssl_cert_path, null, null);

// Verify the SSL connection
//$con->options(MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, true);

// Reconnect using SSL
//if (!$con->real_connect($servername, $username, $password, $dbname, 3306, null, MYSQLI_CLIENT_SSL)) {
//    die("Connection failed: " . $con->connect_error);
//}

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

//echo "Connection Successful";

?>