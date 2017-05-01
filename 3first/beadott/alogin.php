<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<title>alogin.php</title>
<link href="data:image/x-icon;base64,AAABAAEAEBAQAAEABAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAgAAAAAAAAAAAAAAAEAAAAAAAAAAMlBcA////AAsL3gAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAEREiIiIiERERIiIiIiIiERIiAAAAACIhEiAAAAAAAiEiAAERERAAIiIAEREREQAiIgARERERACIiABEREAAAIiIAEREQAAAiIgARERERESIiABEREREAIiIAAREREAAiEiAAAAAAAiESIgAAAAAiIREiIiIiIiIREREiIiIiEREAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA" rel="icon" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="rcp.css"/>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
</head>

<body>
<?php
include('header.php');
write_header();
?>

<?php include 'navbar.php';
write_navbar();
?>

<div id="main">
<?php
$un = $_POST["username"];
$pw = $_POST["password"];

$conn = new PDO("mysql:host=localhost;dbname=rcp;", "root", "root");
$result = $conn->prepare("select * FROM users where username=? AND password =?");

$result->bindParam(1,$un);
$result->bindParam(2,$pw);
$result->execute();

$row = $result->fetch();

if($row != false)
{
	$_SESSION["gatekeeper"] = $un;
	
	$_SESSION["admin"] = $row["isadmin"];
	if($row["isadmin"] == 1)
	{
		echo '<meta http-equiv="refresh" content="0; url=aadmin.php" />';
	}
	else
	{
		echo '<meta http-equiv="refresh" content="0; url=aindex.php" />';
	}
	
	
	//header ("Location: aindex.php");
}


else
{
	echo "There is no matchig user. <br/>";
	echo ' Go back to <a href="aloginh.php">Login</a> please.';
}
?>

</div>

<?php include 'footer.php';
write_footer();
?>
</body>
</html>