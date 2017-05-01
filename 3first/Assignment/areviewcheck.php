<?php if(!isset($_SESSION)) session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>areviewcheck.php</title>
<link href="data:image/x-icon;base64,AAABAAEAEBAQAAEABAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAgAAAAAAAAAAAAAAAEAAAAAAAAAAMlBcA////AAsL3gAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAEREiIiIiERERIiIiIiIiERIiAAAAACIhEiAAAAAAAiEiAAERERAAIiIAEREREQAiIgARERERACIiABEREAAAIiIAEREQAAAiIgARERERESIiABEREREAIiIAAREREAAiEiAAAAAAAiESIgAAAAAiIREiIiIiIiIREREiIiIiEREAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA" rel="icon" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="rcp.css"/>
</head>


<body>
<?php
include('header.php');
write_header();
?>

<?php
include('navbar.php');
write_navbar();
?>

<div id="main">

<?php
if (isset($_SESSION["gatekeeper"])  && ($_SESSION["admin"]))
	{
	$reviewID = $_GET["reviewID"];


	$conn = new PDO("mysql:host=localhost;dbname=gorban;", "root", "root");

	$result = $conn->query("UPDATE reviews SET approved = '1' WHERE ID='$reviewID'");

	echo " Review ID: " . $reviewID . " has been approved.<br/>";
	echo '<br /> <br />back to the<a href="aadmin.php"> pending reviews!</a>';

	}
else
	{
?>
	<p> You are not an admin.<p/>
<?php
	}
?>
</div>

<?php include 'footer.php';
write_footer();
?>

</body>
</html>