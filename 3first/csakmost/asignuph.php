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

<h1>Sign up to RCP in Town!</h1>

<form  method="post" action="aprocess.php">
<p>Username:<input type="text" name="username"/></p>
<p>Password:<input type="text" name="password"/></p>
<input type="submit" value="Submit"><br />
</form>
</div>

<?php include 'footer.php';
write_footer();
?>
</body>
</html>