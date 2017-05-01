<?php


// Connect to the database
$conn = new PDO("mysql:host=localhost;dbname=dftitutorials;", "root", "root");


$a=$_GET ['artist'];
$results = $conn->query("select * from wadsongs where artist= '$a' ");


$allresults = array();
//while($row=$results->fetch(PDO::FETCH_ASSOC)) {

//  $allresults[] = $row;
//}
//echo json_encode($allresults);

echo "<table>
<tr>
<th>SongID</th>
<th>Title</th>
<th>Artist</th>
<th>Date</th>
<th>Chart</th>
<th>Likes</th>
<th>Downloads</th>
</tr>";
//while($row = mysqli_fetch_array($allresults)) {
while($row=$results->fetch(PDO::FETCH_ASSOC)) {
    $allresults[] = $row;
    echo "<tr>";
    echo "<td>" . $row['songid'] . "</td>";
    echo "<td>" . $row['title'] . "</td>";
    echo "<td>" . $row['artist'] . "</td>";
    echo "<td>" . $row['day'] .". " . $row['month'] ." ". $row['year'] . "</td>";
    echo "<td>" . $row['chart'] . "</td>";
    echo "<td>" . $row['likes'] . "</td>";
    echo "<td>" . $row['downloads'] . "</td>";
    echo "</tr>";
}
echo "</table>";

?>




