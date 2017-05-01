<?php
header('Content-type: text/xml');
$a = $_GET["artist"];
//$conn = new PDO("mysql:host=edward2.solent.ac.uk;dbname=gorban;", "gorban", "kaihiegh");
$conn = new PDO("mysql:host=edward2.solent.ac.uk;dbname=dftitutorials;", "dftitutorials", "dftitutorials");
$results = $conn->query("SELECT * FROM hits WHERE artist='$a'");
echo "<songs>";
while($row = $results->fetch()) {
    echo "<song>";
    echo "<title>" . $row['song'] . "</title>";
    echo "<artist>" . $row['artist'] . "</artist>";
    echo "<year>" . $row['year'] . "</year>";
    echo "<ID>" . $row['ID'] . "</ID>";
    echo "</song>";
}
echo "</songs>";

?>


