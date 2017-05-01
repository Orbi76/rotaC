<?php
/**
 * Created by PhpStorm.
 * User: Orbi
 * Date: 25/02/2016
 * Time: 00:36
 */


header('Content-type: text/xml');
$a = $_GET["locationbox"];
$b = $_GET["type"];



$conn = new PDO("mysql:host=localhost;dbname=gorban;", "gorban", "kaihiegh");
$results = $conn->query("SELECT * FROM accommodation WHERE location='$a' or type='$b'");
$id=$row['ID'];
echo "<accommodations>";
while($row = $results->fetch()) {
    echo "<accommodation>";
    echo "<name>" . $row['name'] . "</name>";
    echo "<id>" . $row['ID'] . "</id>";
    echo "<type>" . $row['type'] . "</type>";
    echo "<location>" . $row['location'] . "</location>";
    echo "<longitude>" . $row['longitude'] . "</longitude>";
    echo "<latitude>" . $row['latitude'] . "</latitude>";
    echo "<description>" . $row['description'] . "</description>";
//    echo "<a href='booking.php?ID=$id'> to book click here!</a>";
    echo "</accommodation>";
}

echo "</accommodations>";

?>
