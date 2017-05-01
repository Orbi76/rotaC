<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Elvis</title>
</head>
<body>
<h1>Elvis Presley</h1>

    <?php
    // Initialise the cURL connection
    $connection = curl_init();

    // Specify the URL to connect to
    //curl_setopt($connection, CURLOPT_URL, "http://localhost:8888/WAD/json.php?artist=elvis+presley");
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

    //echo "Response is : $response<br />";
  

    $data4 = json_decode($response, true);
    for($i=0; $i<count($data4); $i++)
    {
        echo "songid " .$data4[$i] ["songid"] . " " .
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