<?php


// Connect to the database
$conn = new PDO("mysql:host=localhost;dbname=casino_emp;", "root", "root");


$a=$_GET ['PositionID'];
$results = $conn->query("select * from Employee where Positions_positionID= '$a' ");


$allresults = array();
while($row=$results->fetch(PDO::FETCH_ASSOC)) {

    $allresults[] = $row;
}
echo json_encode($allresults);



?>

