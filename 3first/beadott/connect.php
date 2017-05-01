<?php
$db_host = "localhost";
$db_username = "root";
$db_pass = "root";
$db_name = "rcp";
try {
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

//$conn = new PDO("mysql:host=localhost;dbname=rcp;", "root", "root");
?>