<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>VisitHampshire</title>
</head>
<body>


<?php

$a=$_GET ['type'];

// Initialise the cURL connection
$connection = curl_init();

// Specify the URL to connect to
curl_setopt($connection, CURLOPT_URL, "http://edward2.solent.ac.uk/~gorban/webservicesearch.php?region=hampshire&type=$a");
    //"http://edward2.solent.ac.uk/~gorban/WAD/jsone.php?artist=elvis+presley");


// This option ensures that the HTTP response is *returned* from curl_exec(),
// (see below) rather than being output to screen.
curl_setopt($connection,CURLOPT_RETURNTRANSFER,1);

// Do not include the HTTP header in the response.
curl_setopt($connection,CURLOPT_HEADER, 0);

// Actually connect to the remote URL. The response is
// returned from curl_exec() and placed in $response.
$response = curl_exec($connection);

// Close the connection.
curl_close($connection);


//echo "Response is: $response";

$data = json_decode($response, true);

if ($data == null)
{
    echo "The given type is not exist!";
}


for($i=0; $i<count($data); $i++)
{
$idez = $data[$i] ["ID"];
        echo "ID " . $data[$i] ["ID"] . " " .
            "Name " . $data[$i]["name"] . " " .
            "Type " . $data[$i]["type"] . " " .
            "Country " . $data[$i]["country"] . " " .
            "Region " . $data[$i]["region"] . " " .
            "Longitude " . $data[$i]["lon"] . " " .
            "Lattitude " . $data[$i]["lat"] . "<br>".
            " To give review for this poi please <a href='givereview.php?ID=$idez'> click here</a><br><br>";


}


?>



</body>
</html>

