<html>
<body>
<?php
$ID = $_GET["ID"];

// connect to the database
$conn = new PDO("mysql:host=localhost;dbname=gorban;", "root", "root");
$results = $conn->query("SELECT name FROM venues WHERE ID='$ID'");
$row =$results->fetch();
echo "The $row[name] get the following reviews from our site members.";

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

