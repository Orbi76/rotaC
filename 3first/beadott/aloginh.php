<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>alogin.php</title>
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
<h1>Welcom to RCP in Town!</h1>
<h1>Please log in!</h1>

<form method="post" action="alogin.php">

<label for="username">Username:</label><br />
<input name="username" id="username"/>
<br/>

<label for="password">Password:</label><br />
<input name="password" id="password" type="password"/>
<br/>

<input type="submit" value="Login!" />
<p>If you are not a member yet please Sign Up!</p>
</form>
</div>


<?php include 'footer.php';
write_footer();
?>

</body>
</html>