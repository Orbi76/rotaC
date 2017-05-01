<?php
$ID = $_GET["ID"];
$qua = 1; //$_GET["quantity"];

echo "hello on indiebuy<br />";
/*
echo " this is the ID  ";
echo $ID;
echo"<br />";
echo $qua;

echo"<br/>";
*/
//echo "quantity:<br /><input id='qu' /> <br />";
//echo "<input type='button' value='Go!' onclick='changecolour()'/><br />";

$connection = curl_init();
curl_setopt($connection, CURLOPT_URL, "http://edward2.solent.ac.uk/~gorban/xmlexercise3.php");
$dataToPost = array
("ID" => "$ID" , "quantity" => "$qua");

curl_setopt($connection,CURLOPT_RETURNTRANSFER,1);
curl_setopt($connection,CURLOPT_HEADER, 0);

curl_setopt($connection,CURLOPT_POSTFIELDS,$dataToPost);


$response = curl_exec($connection);
$httpCode = curl_getinfo($connection,CURLINFO_HTTP_CODE);
echo"The script returned the HTTP status code: $httpCode <br/>";

//echo htmlentities($response); /// Ezzel csak sima szövegként írja ki a sorokat egy sorba az xmlexrcise3.php tól
echo ($response); // Ezzel figyelembeveszi a kódokat és azok érteleme szerint jeleníti meg az echo kat a xmlexercie3.php ból
curl_close($connection);

if ($httpCode==200){
    echo"The buy was succesfull";
}
if ($httpCode==404){
    echo"The song what you would like to buy is out of stock at the moment!";
}


?>

