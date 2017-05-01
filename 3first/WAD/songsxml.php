<?php
$xml=simplexml_load_file("songs.xml") or die("Error: nem megy");
$a = $_GET["year"];
//$sxml = simplexml_load_string($xml);
// connect to the database
$conn = new PDO("mysql:host=localhost;dbname=dftitutorials;", "root", "root");
// get details of the venue using the id
$results = $conn->query("SELECT * FROM hits WHERE artist='$a'");
$row = $results->fetch();
echo"songs";
echo "$row[song]";
if ($a == "1999") {


    for ($index = 0; $index < count($xml->hits); $index++) {
        echo "<br />";
        echo $xml->hits[$index]->artist . "<br />";
        echo $xml->hits[$index]->title . "<br />";
        echo $xml->hits[$index]->year . "<br />";
    }

}
else {
    echo "ez az else";
}
/*foreach ($sxml->artist as $a){
    $out = array();
    $out[] = 'title:'.$a->title;
    $out[] = 'year: '.$a->year;

    echo implode('<br />', $out).'<hr>';
}

---------------

/*while($row = $results->fetch()) {

    echo "<songs>";

    echo "<song>";
    echo "'<title>'$row[song] . </title>";
    echo "<artist>$row[artist] </artist>";
    echo "<year> $row[year]</year>";
    echo "<song>";

    echo "</songs>";

}
*/
?>