
<?php
// Read in the ID and quantity
$id = $_GET["id"];
$q = $_GET["quantity"];

if ($id <= 0 || $q <=0)
{
    header("HTTP/1.1 400 Bad Request");
}
else {

    $conn = new PDO("mysql:host=localhost;dbname=dftitutorials", "dftitutorials", "dftitutorials");

// Get the details of the song with that ID
    $result = $conn->query("SELECT * FROM hits WHERE ID=$id");
    $row = $result->fetch();
    echo $q;
    echo $row["quantity"];
// Is the quantity in the database less than the quantity desired?
    if ($row["quantity"] < $q) {
        // Insufficient quantity in stock.
        // How might you indicate this to the client, and why?
        // echo"There is insufficient quantity"; //A
        echo "OUTOFSTOCK"; //B
        header("HTTP/1.1 404 Not Found");
    } else {
        $conn->query("UPDATE hits SET quantity=quantity-$q WHERE id=$id");
        // How would you indicate success to the client, and why?
        echo "OK";
        header("HTTP/1.1 200 OK");
    }
}
?>
    