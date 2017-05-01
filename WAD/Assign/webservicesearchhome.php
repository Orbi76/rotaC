<?php


// Connect to the database
$conn = new PDO("mysql:host=localhost;dbname=gorban;", "gorban", "kaihiegh");
//$conn = new PDO("mysql:host=localhost;dbname=gabordb;", "root", "root");
//huuwaisa a masik jelszo

$a=$_GET ['region'];
$b=$_GET ['type'];


if(isset($a) && isset($b)) {
    $results = $conn->query("select * from pointsofinterest where region= '$a' and type='$b'");

}

else if (isset($a)) {
    $results = $conn->query("select * from pointsofinterest where region='$a'");
}

else if (isset($b)) {
    $results = $conn->query("select * from pointsofinterest where type ='$b'");

}
else {
    $results = $conn->query("select * from pointsofinterest");
}


$allresults = array();
while($row=$results->fetch(PDO::FETCH_ASSOC)) {

    $allresults[] = $row;
}
echo json_encode($allresults);



?>



