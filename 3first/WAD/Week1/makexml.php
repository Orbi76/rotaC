<?php
header('Content-type: text/xml');
$a = $_GET["artist"];
$conn = new PDO("mysql:host=localhost;dbname=dftitutorials;", "root", "root");
$results = $conn->query("SELECT * FROM hits WHERE artist='$a'");
echo "<songs>";
while($row = $results->fetch()) {
    echo "<song>";
    echo "<title>" . $row['song'] . "</title>";
    echo "<artist>" . $row['artist'] . "</artist>";
    echo "<year>" . $row['year'] . "</year>";
    echo "</song>";
}

echo "</songs>";

?>


