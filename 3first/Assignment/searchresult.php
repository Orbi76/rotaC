<?php
$a = $_GET["type"];

$conn = new PDO("mysql:host=localhost;dbname=gorban;", "root", "root");

$result = $conn->query("select * from venues where type='$a'");
while($row=$result->fetch())
{
	echo "<p>";
	echo " The name of the place is:  $row[name] <br/>";
	echo " id: $row[ID]<br/>";
	echo " Description: $row[description] <br/>";
	
	echo "<a href='recommend.php?ID=$row[ID]'>Would you recommend? </a><br />";
	echo "<a href='review.php?ID=$row[ID]'>See all reviews! </a>";
	echo "</p>";
}

?>
