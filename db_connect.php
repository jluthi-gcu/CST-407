<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// modify these settings according to the account on your database server.
$host = "d13xat1hwxt21t45.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$port = "3306";
$username = "fh6zwc9dfg8xa3kr";
$user_pass = "caxjh0i4pqejtgg7";
$database_in_use = "xejxvoiettamng4x";


$mysqli = new mysqli($host, $username, $user_pass, $database_in_use);
if ($mysqli->connect_error) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo $mysqli->host_info . "<br>";

?>
