
<?php
$venue = $_GET['type'];
$a = '%' . $venue .  '%';
if($venue == '') {
	echo '';
} else {
$conn = new PDO("mysql:host=localhost;dbname=rcp;", "root", "root");

$result = $conn->query("select * from venues where type LIKE '$a'");
while($row=$result->fetch())
{
	echo "<p>";
	echo " The name of the place is:  $row[name] <br/>";
	echo " id: $row[ID]<br/>";
	echo " Description: $row[description] <br/>";
	
	echo "<a href='arecommend.php?ID=$row[ID]'>Would you recommend? </a><br />";
	echo "<a href='areview.php?ID=$row[ID]'>See all reviews! </a><br />";
	echo "<a href='awritereview.php?ID=$row[ID]'>or write one! </a>";
	echo "</p>";
}
}
?>
