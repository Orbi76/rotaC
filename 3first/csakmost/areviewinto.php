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
<?php
echo "Dear " . $_SESSION["gatekeeper"] . ",<br />";

$un = $_SESSION["gatekeeper"];
$rev = $_POST["review"];
$venueID = $_POST['venueID'];
$conn = new PDO("mysql:host=localhost;dbname=rcp;", "root", "root");

$result = $conn->query("INSERT INTO reviews (venueID,username,review,approved)
	VALUES ('$venueID','$un','$rev',0)");

		echo"<p>Thank you for your review.</p>";
		echo"<p>Your review will appear on our site when the admin will approved.<p/>";
		

echo '<br /> <br />back to <a href="aindex.php">Start</a>';
?>


</div>


<?php include 'footer.php';
write_footer();
?>

</body>
</html>