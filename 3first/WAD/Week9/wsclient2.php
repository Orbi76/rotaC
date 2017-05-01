<html>
<head>
    <style type='text/css'>
        body { background-color: black; color: white; font-family: helvetica, arial, sans-serif; }
    </style>
</head>
<body>

<?php
$a = $_GET["artist"];


// Initialise the cURL connection
$connection = curl_init();

// Specify the URL to connect to
curl_setopt($connection, CURLOPT_URL, "http://edward2.solent.ac.uk/~gorban/Emakexml.php?artist=$a");


// This option ensures that the HTTP response is *returned* from curl_exec(),
// (see below) rather than being output to screen.
curl_setopt($connection,CURLOPT_RETURNTRANSFER,1);

// Do not include the HTTP header in the response.
curl_setopt($connection,CURLOPT_HEADER, 0);

// Actually connect to the remote URL. The response is
// returned from curl_exec() and placed in $response.
$response = curl_exec($connection);

$httpCode = curl_getinfo($connection,CURLINFO_HTTP_CODE);
echo"The script returned the HTTP status code: $httpCode <br/>";

// Close the connection.
curl_close($connection);

//echo htmlentities($response);

/*
//==========================

  // SIMPLE XML PARSING
$xml = simplexml_load_string($response);
for($index=0; $index < count($xml->song); $index++)
{
    echo $xml->song[$index]->title. "<br />";
    echo $xml->song[$index]->artist . "<br />";
    echo $xml->song[$index]->year . "<br />";
}
//==========================
*/

// PARSING WITH XMLReader


// Create a new XMLReader object
$xml = new XMLReader();

// Open the XML file. Note that this can also be a web service URL.
//$xml->open("songs.xml");
$xml->xml($response);

$songs = array();
$curTag = "";

// Read the xml line by line
while($xml->read())
{
    // What type of data have we found?
    switch($xml->nodeType)
    {
        // found an opening tag
        case XMLReader::ELEMENT:

            // If it's a student tag, create a new associative array to hold
            // the student details
            if($xml->name == "song")
                $curSong = array();

            // Else, save the current tag in the variable $curTag so we
            // can recall it when we find the text within the tag
            else
                $curTag = $xml->name;
            break;

        // found a closing tag
        case XMLReader::END_ELEMENT:

            // if it's a </student> tag, add the current student to the
            // array of students
            if($xml->name=="song")
                $songs[] = $curSong;

            $data = array();
            break;

        // found some text in between opening and closing tags
        case XMLReader::TEXT:

            // if we find some text, add an entry to the curStudent
            // associative array with the current tag
            $curSong[$curTag] = $xml->value;

            break;
    }
}

// Test it's worked by showing the whole array of students.
// $students will be an array of associative arrays (one associative array
// per student)

echo "<br>";
echo "<table border='1'>";
echo "<tr>";
echo "<th>Title</th>";
echo "<th>Artist</th>";
echo "<th>Year</th>";
echo "<th>ID</th>";
echo "<th>Link</th>";
echo "</tr>";
for($i=0; $i<count($songs); $i++)
{

    $id = $songs[$i]['ID'];// the ID of that song from the XML
    echo "<tr>";
    echo "<td>".$songs[$i]['title']."</td>";
    echo "<td>".$songs[$i]['artist']."</td>";
    echo "<td>".$songs[$i]['year']."</td>";
    echo "<td>".$songs[$i]['ID']."</td>";
    echo "<td><a href='indiebuy.php?ID=$id'> to indiebuy!</a></td>";
 //   	echo "<a href='arecommend.php?ID=$row[ID]'>Would you recommend? </a><br />";
//    echo "a link to indiebuy.php containing a query string with the id from the xml";
    echo "</tr>";
}




?>

</body>
</html>