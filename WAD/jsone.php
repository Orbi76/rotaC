<?php


// Connect to the database
$conn = new PDO("mysql:host=localhost;dbname=dftitutorials;", "dftitutorials", "dftitutorials");


$a=$_GET ['artist'];
$results = $conn->query("select * from wadsongs where artist= '$a' ");


$allresults = array();
while($row=$results->fetch(PDO::FETCH_ASSOC)) {

    $allresults[] = $row;
}
echo json_encode($allresults);



?>




