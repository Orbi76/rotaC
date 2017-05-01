<?php
session_start();

$un = $_POST["username"];
$pw = $_POST["password"];

$conn = new PDO("mysql:host=localhost;dbname=gorban;", "root", "root");
$result = $conn->prepare("select * FROM users where username=? AND password =?");

$result->bindParam(1,$un);
$result->bindParam(2,$pw);
$result->execute();


if($result->fetch() != false)
{
	$_SESSION["gatekeeper"] = $un;
	header ("Location: index.php");

}
else
{
	echo "There is no matchig user <br/>";
	echo ' go back to <a href="login.html">Login</a>';
	
	
}

?>