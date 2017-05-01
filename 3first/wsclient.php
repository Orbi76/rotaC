<?php
/**
 * Created by PhpStorm.
 * User: Orbi
 * Date: 19/03/15
 * Time: 11:28
 */
include ("/var/www/lib/call_web_service.php");
$a = urlencode($_GET["artist"]);
$result = call_web_service("http://www.free-map.org.uk/course/dfti/ws/hittastic.php?artist=$a");

$xml=simplexml_load_string($result["content"]);


//echo htmlentities($result["content"]);

for($index=0; $index < count($xml->cd); $index++)
{
    echo"<br />";
    echo $xml->cd[$index]->hitid ."<br />";
    echo $xml->cd[$index]->title ."<br />";
    echo $xml->cd[$index]->artist ."<br />";
    echo $xml->cd[$index]->month ."<br />";
    echo $xml->cd[$index]->year ."<br />";
    echo $xml->cd[$index]->chart ."<br />";
}




//<hitid>1</hitid><title>(apple)</title><artist>Britney Spears</artist><month>Dec</month><year>1999</year><chart>3</chart>