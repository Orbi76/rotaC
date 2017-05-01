<?php

$conn = new PDO("mysql:host=localhost;dbname=dftitutorials;", "dftitutorials", "dftitutorials");

$a = $_GET["artist"];
$results = $conn->query("select * from wadsongs where artist= '$a' ");
while($row=$results->fetch())
{
    echo "<p>";
    echo " Title $row[title]  <br/> ";
    echo " Artist $row[artist]  <br/> ";
    echo " Year $row[year] <br/> " ;
    echo " Likes $row[likes] <br/> " ;
    echo "<a href='recommend.php?ID=$row[ID]'>Did you like it? </a><br?>";

    echo "</p>";
}


?>


<!-- http://localhost:8888/WAD/wadsearch.php?artist=elvis%20presley