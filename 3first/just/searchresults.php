<?php
session_start();

$na = $_POST["name"];
$ty = $_POST["type"];
$des = $_POST["description"];
$un = $_SESSION["gatekeeper"];

$conn = new PDO("mysql:host=localhost;dbname=rcp;", "root", "root");


$result = $conn->query("INSERT INTO venues (name,type,description,username)
	VALUES ('$na','$ty','$des','$un')");

		echo"<p>Thank you for your cooperation.</p>";
		echo"Your favorite place created succesfully as follow <br/> Venue name is : $na <br/> Type is : $ty <br/> Description is : $des";


echo '<br /> <br />back to <a href="index.php">Start</a>';
?>
