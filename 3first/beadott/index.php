<?php if(!isset($_SESSION)) session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>aindex.php</title>
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
?>
	<h1>Welcom to RCP in Town!</h1>
<?php
	echo "Hi " . $_SESSION["gatekeeper"] . ".";
?>
	<p> Find the best place in the Town! <br />
	On this site you can search between the best Restaurants, Cafés and Puds!  <br />
	For your fellow user you can advise a place as well wich you find the perfect one.<br />
	Please recommend that place where you enjoyed yourself, so others can experience the good atmosphere as well.  </p>
	<br />
	<p> Here you can add a venue to our database by fill out this form. </p>
	<form method="post" action="avenueinto.php">

	<p>Venue name:<input type="text" name="name"/></p>
	<p>Venue type:
  	<select name="type">
	<option value="Restaurant">Restaurant</option>
	<option value="Café">Café</option>
	<option value="Bar">Bar</option>
	</select></p>
	<p>Venue description:<textarea name="description" rows="5" cols="40"></textarea></p>
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

<?php include 'footer.php';
write_footer();
?>

</body>
</html>