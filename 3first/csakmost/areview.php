<?php if(!isset($_SESSION)) session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Home page</title>
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

<html>
<body>
<?php
echo "Hi " . $_SESSION["gatekeeper"] . ".";
$ID = $_GET["ID"];

// connect to the database
$conn = new PDO("mysql:host=localhost;dbname=rcp;", "root", "root");
$results = $conn->query("SELECT name FROM venues WHERE ID='$ID'");
$row =$results->fetch();
echo "<br />The $row[name] get the following reviews from our site members.";

// get reviews of the venue using the id
$results = $conn->query("SELECT * FROM reviews WHERE venueID='$ID'");
while($row = $results->fetch())
{
	echo "<p>";
	echo " Review: $row[ID]<br/>";
	echo " $row[review] <br/>";
	echo "<p/>";
}

?>
</body>
</html>



</div>


<?php include 'footer.php';
write_footer();
?>

</body>
</html>