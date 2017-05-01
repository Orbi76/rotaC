<?php
// get format from query string
$a = $_GET["format"];
$xml = simplexml_load_file("songs.xml.xml");

// write if statement for html
if ($a == "html") {
   echo "
    <html>
    <body>
    <h1>Available Music on HitTastic!</h1>
    <a href=\"songs.xml.xml\">Songs</a>
    <br />";

    for ($index = 0; $index < count($xml->CD); $index++) {
        echo "<br />";
        echo $xml->CD[$index]->artist . "<br />";
        echo $xml->CD[$index]->title . "<br />";
        echo $xml->CD[$index]->genre . "<br />";
    }
   echo "</body>
        </html>";
// otherwise csv
}
else{
    header("content-type:text/plain");
    for ($index = 0; $index < count($xml->CD); $index++) {
        echo $xml->CD[$index]->artist . ",";
        echo $xml->CD[$index]->title . ",";
        echo $xml->CD[$index]->genre . "\n";
    }
}
?>

