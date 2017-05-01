<?php if(!isset($_SESSION)) session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>awritereview.php</title>
<link href="data:image/x-icon;base64,AAABAAEAEBAQAAEABAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAgAAAAAAAAAAAAAAAEAAAAAAAAAAMlBcA////AAsL3gAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAEREiIiIiERERIiIiIiIiERIiAAAAACIhEiAAAAAAAiEiAAERERAAIiIAEREREQAiIgARERERACIiABEREAAAIiIAEREQAAAiIgARERERESIiABEREREAIiIAAREREAAiEiAAAAAAAiESIgAAAAAiIREiIiIiIiIREREiIiIiEREAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA" rel="icon" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="rcp.css"/>
</head>



<?php
include('header.php');
write_header();
?>
<body>
<?php
include('navbar.php');
write_navbar();
?>

<div id="main">
<?php
	if (isset($_SESSION["gatekeeper"]))
	{
	echo "Hi " . $_SESSION["gatekeeper"] . ".<br />";
	$ID = $_GET["ID"];

	// connect to the database
	$conn = new PDO("mysql:host=localhost;dbname=gorban;", "root", "root");
	$results = $conn->query("SELECT * FROM venues WHERE ID='$ID'");
	$row = $results->fetch();


	echo "Here you can write a review from $row[name].<br />";

?>
	<form method="post" action="areviewinto.php">
	<input type="hidden" name="venueID" value="<?php echo $ID; ?>" /> 
	<p>Your review:<textarea name="review" rows="5" cols="40"></textarea></p>
	<br />

	<input type="submit" value="Submit"/><br />
	<br />
	</form>
<?php	
	}
	else
	{
?>
	<p> You are not logged in.<p/>
<?php
	}
?>	

</div>
</body>

<?php include 'footer.php';
write_footer();
?>


</html>