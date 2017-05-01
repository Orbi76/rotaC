<?php if(!isset($_SESSION)) session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>arecommend.php</title>
<link href="data:image/x-icon;base64,AAABAAEAEBAQAAEABAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAgAAAAAAAAAAAAAAAEAAAAAAAAAAMlBcA////AAsL3gAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAEREiIiIiERERIiIiIiIiERIiAAAAACIhEiAAAAAAAiEiAAERERAAIiIAEREREQAiIgARERERACIiABEREAAAIiIAEREQAAAiIgARERERESIiABEREREAIiIAAREREAAiEiAAAAAAAiESIgAAAAAiIREiIiIiIiIREREiIiIiEREAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA" rel="icon" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="rcp.css"/>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
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
		$conn = new PDO("mysql:host=localhost;dbname=rcp;", "root", "root");
		// get details of the venue using the id
		$results = $conn->query("SELECT * FROM venues WHERE ID='$ID'");
		$row = $results->fetch();
		$old_recommendation = $row['recommended'];

		$sql = "UPDATE venues SET recommended = recommended+1 WHERE ID='$ID'";
		$q = $conn->prepare($sql);
		$q->execute();
		$results = $conn->query("SELECT * FROM venues WHERE ID=$ID");
		$row = $results->fetch();
		$new_recommendation = $row['recommended'];
		echo"<p><br />";
		echo "<p>Sofar $old_recommendation people recommend this venue, but </p>";
		echo "<p>with your vote now $new_recommendation people offer this place! </p>";
		echo "<p/>";
		
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