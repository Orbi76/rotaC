<?php


// Connect to the database
$conn = new PDO("mysql:host=localhost;dbname=gorban;", "gorban", "kaihiegh");
//$conn = new PDO("mysql:host=localhost;dbname=gabordb;", "root", "root");
//huuwaisa a masik jelszo


$b=$_GET ['type'];



$results = $conn->query("select name,type, country,region,lon,lat from pointsofinterest where type ='$b'");



$allresults = array();
//while($row=$results->fetch(PDO::FETCH_ASSOC)) {

//    $allresults[] = $row;
//}
//echo json_encode($allresults);


//Applications/MAMP/htdocs/WAD/Assign/websearchforpoi.php
//websearchforpoi.php?type=pub


echo "<table>
<tr>
<th>Name</th>
<th>Type</th>
<th>Country</th>
<th>Region</th>
<th>Longitude</th>
<th>Lattitude</th>
</tr>";
//while($row = mysqli_fetch_array($allresults)) {
while($row=$results->fetch(PDO::FETCH_ASSOC)) {
    $allresults[] = $row;
    echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['type'] . "</td>";
    echo "<td>" . $row['country'] . "</td>";
    echo "<td>" . $row['region'] . "</td>";
    echo "<td>" . $row['lon'] . "</td>";
    echo "<td>" . $row['lat'] . "</td>";
 //   echo "<td>" . $row['description'] . "</td>";
    echo "</tr>";
}
echo "</table>";


?>



