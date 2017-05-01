<html>
<body>
<?php

$a= $_POST["username"];
$b= $_POST["password"];


$conn = new PDO("mysql:host=localhost;dbname=gorban;", "root", "root");

$result = $conn->query("INSERT INTO users (username,password)
						VALUES('$a','$b')");




echo "<p> Your details created in the database as follows: <br/>Username is: $a<br/>Password is: $b</p>";
echo ' Please log in <a href="login.html">Login</a>';
?>
</body>
</html>