<?php

$name = $_POST["name"];
$type = $_POST['type'];
$country = $_POST['country'];
$region = $_POST['region'];
$lon = $_POST['lon'];
$lat = $_POST['lat'];
$description = $_POST['description'];


if ($name == '' || !isset($name)  ||  $type=='' || !isset($type) || $country == '' || !isset($country)  ||  $region=='' || !isset($region) ||$lon == '' || !isset($lon)  ||  $lat=='' || !isset($lat) || $description == ''|| !isset($description))
{
    header("HTTP/1.1 400 Not Found");
    echo" Dont leave blank field !";

}
elseif (-90 > $lat || $lat> 90)
{
    header("HTTP/1.1 406 Not Acceptable");
    // return some JSON indicating the type of error
    echo"Wrong latitude  value what you give is: ". $lat." .  It has to be between -90 and 90";

}
elseif (-180 > $lon || $lon > 180)
{
    header("HTTP/1.1 406 Not Acceptable");
    echo"Wrong longitude  value what you give is: ". $lon." . It has to be between -180 and 180";
}
else

// Connect to the database
$conn = new PDO("mysql:host=localhost;dbname=gorban;", "gorban", "kaihiegh");
//   $conn = new PDO("mysql:host=localhost;dbname=gabordb;", "root", "root");
//huuwaisa a masik jelszo


$result = $conn->query("INSERT INTO pointsofinterest (name,type,country,region,lon,lat,description)
	VALUES ('$name','$type','$country','$region','$lon','$lat','$description')");


//$result = $conn->query("INSERT INTO pointsofinterest (country)
//	VALUES ('$country')");
header("HTTP/1.1 200 OK");
echo"We upload your poi";




//  http://localhost:8888/WAD/Assign/webadd.php?name=alma+type=gyumolcs+country=hun+region=bud+lon=1+lat=1+description=leiras
//  http://localhost:8888/WAD/Assign/webadd.php?name=alma+type=gyumolcs+country=hun
//check the datatas http codes
?>



