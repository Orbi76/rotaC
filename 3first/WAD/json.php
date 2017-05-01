<?php
header("Content-type: application/json");

$conn = new PDO("mysql:host=localhost;dbname=dftitutorials;", "root", "root");

$a = $_GET["artist"];

$result = $conn->query("SELECT * FROM hits WHERE artist='$a'");
$data = array();
while($row = $result->fetch(PDO::FETCH_ASSOC))
{
    $data[] = $row;

    // echo '<artist>'.$row['artist'].'</artist>';

}

echo json_encode($data);
?>