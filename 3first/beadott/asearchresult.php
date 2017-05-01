<?php if(!isset($_SESSION)) session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>asearchresult.php</title>
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
		$a = $_GET["type"];
		echo "<p>We found the following ".$a."s in our database!!! <p/>";
		$conn = new PDO("mysql:host=localhost;dbname=rcp;", "root", "root");

		$result = $conn->query("select * from venues where type='$a'");
		while($row=$result->fetch())
		{
			echo "<p>";
			echo " The name of the place is:  $row[name] <br/>";
			echo " id: $row[ID]<br/>";
			echo " Description: $row[description] <br/>";
	
			echo "<a href='arecommend.php?ID=$row[ID]'>Would you recommend? </a><br />";
			echo "<a href='areview.php?ID=$row[ID]'>See all reviews! </a><br />";
			echo "<a href='awritereview.php?ID=$row[ID]'>or write one! </a>";
			echo "<a href='bookingcalendar.php?ID=$row[ID]'>or Booking! </a>";
			echo "</p>";
		}

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