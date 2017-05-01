<?php
session_start();


if ( !isset ($_SESSION["gatekeeper"]))
{
	echo "You are not logged in. Go away!<br />";
	echo 'Or, Please log in <a href="login.html">Here</a>';
}
else
{	
	?>
		<!DOCTYPE html>
<html>
<head>
<title>RCT in Town Html</title>
</head>

<body>
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
<form method="post" action="venueinto.php">

<p>Venue name:<input type="text" name="name"/></p>
<p>Venue type:<input type="text" name="type"/></p>
<p>Venue description:<textarea name="description" rows="5" cols="40"></textarea></p>
<br />

<input type="submit" value="Submit"/><br />
<br />
</form>

<br />
<a href="search.html">Search between the venues!!! </a><br />
<br />
<a href="http://www.free-map.org.uk/course">Developing for the Internet Course page</a>

</body>
</html>
<?php
}

?>