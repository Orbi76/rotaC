<?php if(!isset($_SESSION)) session_start(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>aadmin.php</title>
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

	$un = $_SESSION["gatekeeper"];
	echo"<h1>Hello $un, check the reviews.</h1>";
	?>
	<form method="post" action="areviewcheck.php">
	<?php
	$conn = new PDO("mysql:host=localhost;dbname=gorban;", "root", "root");
	$results = $conn->query("SELECT * FROM reviews WHERE approved=0 ORDER BY timestamp DESC");
	$results->rowCount();
		echo "<h2>". $results->rowCount() . " review are waiting for approval!</h2>";
	
	//string date ( string $format [, int $timestamp = time() ] );
	while($row = $results->fetch())
	{
		$b = $row["username"];
		$c = $row["venueID"];
		$d = $row["ID"];
		$e = $row["review"];
		$f = $row["approved"];
		$t = $row["timestamp"];		
		echo "<p>";
		echo "The user who write the review is: ". $row["username"] . "<br />";
		echo "Review ID: " . $row["ID"] . "<br/>";
		echo "The review: $row[review] <br/>";
		echo "VenueID: $row[venueID] <br/>";
		echo "Review submitted on ";
		echo date('l F jS Y \a\t h:i a', strtotime($t));
		echo "<br/>";
		echo "<a href='areviewcheck.php?reviewID=$row[ID]'>This review is OK then click here!</a><br />";
		echo "</p>";
	}

?>

	</form>
<?php
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

