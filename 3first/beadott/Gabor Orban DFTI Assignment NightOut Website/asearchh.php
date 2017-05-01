<?php if(!isset($_SESSION)) session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>asearchh.php</title>
<link href="data:image/x-icon;base64,AAABAAEAEBAQAAEABAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAgAAAAAAAAAAAAAAAEAAAAAAAAAAMlBcA////AAsL3gAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAEREiIiIiERERIiIiIiIiERIiAAAAACIhEiAAAAAAAiEiAAERERAAIiIAEREREQAiIgARERERACIiABEREAAAIiIAEREQAAAiIgARERERESIiABEREREAIiIAAREREAAiEiAAAAAAAiESIgAAAAAiIREiIiIiIiIREREiIiIiEREAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA" rel="icon" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="rcp.css"/>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />

<style type='text/css'>
body { font-family: Calibri, DejaVu Sans, sans-serif; }
#results { background-color: #ffffc0; width:400px; height:auto; }
</style>
<script type='text/javascript'>
function ajaxrequest()
{
    // Create the XMLHttpRequest variable.
    // This variable represents the AJAX communication between client and
    // server.
    var xhr2 = new XMLHttpRequest();

    // Read the data from the form fields.
    var type = document.getElementById("type").value;
    

    // Specify the CALLBACK function. 
    // When we get a response from the server, the callback function will run
    xhr2.addEventListener ("load", resultsReturned);

    // Open the connection to the server
    // We are sending a request to "flights.php" and passing in the 
    // destination and date as a query string. 'http://edward/ewt/hits.php?artist='
     //xhr2.open('GET','http://Macintosh HD/Applications/MAMP/htdocs/Assignment/asearchh.php?type=' + type);
    xhr2.open('GET','asearchresultajax.php?type=' + type);
    // Send the request.
    xhr2.send();
}

// The callback function
// It simply places the response from the server in the div with the ID
// of 'response'.

// The parameter "e" contains the original XMLHttpRequest variable as
// "e.target".
// We get the actual response from the server as "e.target.responseText"
function resultsReturned(e)
{
    document.getElementById('results').innerHTML = e.target.responseText;
}

</script>



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
	<p> On this page you can find your favorit place in our database.<br />
	Just give the type of the place and you will find the best ones in the City! <br />
	</p>

	<form method="get" action="asearchresult.php">
	<p>What type of venue would like to search?<br />
  	<select name="type">
	<option value="Restaurant">Restaurant</option>
	<option value="Café">Café</option>
	<option value="Bar">Bar</option>
  </select></p>
	
	<input type="submit" value="Submit"/><br />
	</form>
	
	
<p>
Venue type:<br/>
<input id="type" onkeyup='ajaxrequest()' /> <br/>
<input type="button" value="Go!" onclick="ajaxrequest()" />
</p>

<div id="results"></div>	
	
	
	
	
	
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