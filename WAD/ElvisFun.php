<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ElvisFun</title>
</head>
<body>
<h1>Elvis Presley</h1>

<?php
// Initialise the cURL connection
$connection = curl_init();

// Specify the URL to connect to
curl_setopt($connection, CURLOPT_URL, "http://edward2.solent.ac.uk/~gorban/WAD/jsone.php?artist=elvis+presley");


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


$json = '[
    {"name" : "Barack Obama", "age" : 55, "nationality" : "US", "job": "President"},
    {"name" : "Hillary Clinton", "age" : 68, "nationality" : "US",  
     "job": "Presidential candidate" }
]';

$json2 ='[{"songid":"1","0":"1","title":"Woop","1":"Woop","artist":"Woop","2":"Woop","day":"18","3":"18","month":"December","4":"December","year":"1959","5":"1959","chart":"1","6":"1","likes":"10","7":"10","downloads":"34","8":"34"}] 
';

$json3 ='[{"songid":"635","0":"635","title":"Some Might Say","1":"Some Might Say","artist":"Oasis","2":"Oasis","day":"6","3":"6","month":"May","4":"May","year":"1995","5":"1995","chart":"1","6":"1","likes":"11","7":"11","downloads":"15","8":"15"},{"songid":"649","0":"649","title":"Dont Look Back in Anger","1":"Dont Look Back in Anger","artist":"Oasis","2":"Oasis","day":"2","3":"2","month":"March","4":"March","year":"1996","5":"1996","chart":"1","6":"1","likes":"1","7":"1","downloads":"1","8":"1"},{"songid":"686","0":"686","title":"DYou Know What I Mean?","1":"DYou Know What I Mean?","artist":"Oasis","2":"Oasis","day":"19","3":"19","month":"July","4":"July","year":"1997","5":"1997","chart":"1","6":"1","likes":"1","7":"1","downloads":"1","8":"1"},{"songid":"696","0":"696","title":"All Around the World","1":"All Around the World","artist":"Oasis","2":"Oasis","day":"24","3":"24","month":"January","4":"January","year":"1998","5":"1998","chart":"1","6":"1","likes":"2","7":"2","downloads":"1","8":"1"},{"songid":"764","0":"764","title":"Go Let It Out","1":"Go Let It Out","artist":"Oasis","2":"Oasis","day":"19","3":"19","month":"February","4":"February","year":"2000","5":"2000","chart":"1","6":"1","likes":"1","7":"1","downloads":"1","8":"1"},{"songid":"841","0":"841","title":"The Hindu Times","1":"The Hindu Times","artist":"Oasis","2":"Oasis","day":"27","3":"27","month":"April","4":"April","year":"2002","5":"2002","chart":"1","6":"1","likes":"1","7":"1","downloads":"1","8":"1"},{"songid":"930","0":"930","title":"Lyla","1":"Lyla","artist":"Oasis","2":"Oasis","day":"28","3":"28","month":"May","4":"May","year":"2005","5":"2005","chart":"1","6":"1","likes":"1","7":"1","downloads":"1","8":"1"},{"songid":"935","0":"935","title":"The Importance of Being Idle","1":"The Importance of Being Idle","artist":"Oasis","2":"Oasis","day":"3","3":"3","month":"September","4":"September","year":"2005","5":"2005","chart":"1","6":"1","likes":"1","7":"1","downloads":"1","8":"1"}] ';


$data = json_decode($json, true);
for($i=0; $i<count($data); $i++)
{
    echo "data" . "<br>" .
        "Name " . $data[$i]["name"] . " " .
        "Age " . $data[$i]["age"] . " " .
        "Nationality " . $data[$i]["nationality"] . " " .
        "Job " . $data[$i]["job"] . "<br/>";
}
$data2 = json_decode($json2, true);
for($i=0; $i<count($data2); $i++)
{
    echo "data2" . "<br>" .
        "songid " .$data2[$i] ["songid"] . " " .
        "Title " . $data2[$i]["title"] . " " .
        "Artist " . $data2[$i]["artist"] . " " .
        "Day " . $data2[$i]["day"] . " " .
        "Month " . $data2[$i]["month"] . " " .
        "Year " . $data2[$i]["year"] . " " .
        "Chart " . $data2[$i]["chart"] . " " .
        "Likes " . $data2[$i]["likes"] . " " .
        "Download " . $data2[$i]["download"] . " <br>";
}

$data3 = json_decode($json3, true);
for($i=0; $i<count($data3); $i++)
{
    echo "data3" . "<br>" .
        "songid " .$data3[$i] ["songid"] . " " .
        "Title " . $data3[$i]["title"] . " " .
        "Artist " . $data3[$i]["artist"] . " " .
        "Day " . $data3[$i]["day"] . " " .
        "Month " . $data3[$i]["month"] . " " .
        "Year " . $data3[$i]["year"] . " " .
        "Chart " . $data3[$i]["chart"] . " " .
        "Likes " . $data3[$i]["likes"] . " " .
        "Download " . $data3[$i]["download"] . " <br>";
}

$data4 = json_decode($response, true);
for($i=0; $i<count($data4); $i++)
{
    echo "data4" . "<br>" .
        "songid " .$data4[$i] ["songid"] . " " .
        "Title " . $data4[$i]["title"] . " " .
        "Artist " . $data4[$i]["artist"] . " " .
        "Day " . $data4[$i]["day"] . " " .
        "Month " . $data4[$i]["month"] . " " .
        "Year " . $data4[$i]["year"] . " " .
        "Chart " . $data4[$i]["chart"] . " " .
        "Likes " . $data4[$i]["likes"] . " " .
        "Download " . $data4[$i]["download"] . " <br>";
}

?>

</body>
</html>