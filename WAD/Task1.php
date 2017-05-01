<!DOCTYPE html>
<html>
<head>
    <link rel='stylesheet' type='text/css'
          href='http://www.free-map.org.uk/course/css/dfti0910.css' />
</head>
<body>

<h1>Elvis Presley</h1>

<?php


$conn = new PDO("mysql:host=localhost;dbname=dftitutorials;", "root", "root");

$a = $_GET["artist"];
$results = $conn->query("select * from wadsongs where artist= 'Elvis Presley' ");
while($row=$results->fetch())
{
echo "<p>";
    echo " Title $row[title]  <br/> ";
    echo " Artist $row[artist]  <br/> ";
    echo " Year $row[year] <br/> " ;
    echo " Likes $row[likes] <br/> " ;
    echo " <a href="http://www.w3schools.com">Like it!</a>"

    echo "</p>";
}


?>


<!-- http://localhost:8888/WAD/wadsearch.php?artist=elvis%20presley
-->

</body>
</html>