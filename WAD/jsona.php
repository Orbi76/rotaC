<?php
/**
 * Created by PhpStorm.
 * User: Orbi
 * Date: 11/10/2016
 * Time: 02:50
 */


// php array


$monthLengths = array ( 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
echo json_encode($monthLengths);

echo "<br>";
echo "<br>";
echo "<br>";


//associative array
$obama = array ("name" => "Barack Obama",
    "age" => 55,
    "nationality" => "US",
    "job" => "President" );

echo json_encode($obama);

//

echo "<br>";
echo "<br>";
echo "<br>";
//array of associative arrays


$politicians = array (

    array ("name" => "Barack Obama",
        "age" => 55,
        "nationality" => "US",
        "job" => "President" ),

    array ("name" => "Hillary Clinton",
        "age" => 68,
        "nationality" => "US",
        "job" => "Presidential candidate" )

);
echo json_encode($politicians);


echo "<br>";
echo "<br>";
echo "<br>";

//JSON Task

$conn = new PDO("mysql:host=localhost;dbname=dftitutorials;", "root", "root");
$a=$_GET ['artist'];
$results = $conn->query("select * from wadsongs where artist= '$a' ");

$allresults = array();
while($row=$results->fetch()) {

        $allresults[] = $row;
}
        echo json_encode($allresults);





?>




