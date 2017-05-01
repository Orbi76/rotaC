<?php if(!isset($_SESSION)) session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>areview.php</title>
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
	if (isset($_SESSION["gatekeeper"]))
	{

	echo "Hi " . $_SESSION["gatekeeper"] . ".";
	$ID = $_GET["ID"];

	// connect to the database
	$conn = new PDO("mysql:host=localhost;dbname=gorban;", "root", "root");
	$results = $conn->query("SELECT * FROM venues WHERE ID='$ID'");
	$row =$results->fetch();
	$name = $row["name"];
	echo "<br />The $row[name] get the following reviews from our site members in the last 3 years.";

	// get reviews of the venue using the id
	$results = $conn->query("SELECT * FROM reviews WHERE venueID='$ID' AND approved=1 AND timestamp > DATE_SUB(CURDATE(), INTERVAL 1095 DAY) ORDER BY timestamp DESC");
	while($row = $results->fetch())
	{
		$t = $row["timestamp"];	
		echo "<p>";
		echo " Review from: $row[username].<br/>";
		echo " $row[review] <br/>";
		echo "Review submitted on ";
		echo date('l F jS Y \a\t h:i a', strtotime($t));
		echo "<br/>";
		echo "<p/>";
	}
	echo "<br /><p>Here you can write a review as well from ". $name ."! </p>";
?>
	<form method="get" action="awritereview.php">
	<input type="hidden" name="ID" value="<?php echo $ID; ?>" /> 
	<input type="submit" value="Write a Review!"/><br />
	<br />
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


<?php include 'footer.php';
write_footer();
?>

</body>
</html>