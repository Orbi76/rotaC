<?php
// Read in the ID and quantity
$id = $_GET["id"];
$q = $_GET["quantity"];

$conn=new PDO("mysql:host=localhost;dbname=dftitutorials", "dftitutorials", "dftitutorials");

// Get the details of the song with that ID
$result=$conn->query("SELECT * FROM hits WHERE ID=$id");
$row=$result->fetch();

// Is the quantity in the database less than the quantity desired?
if ($row["quantity"] < $q)
{
    // Insufficient quantity in stock.
    // How might you indicate this to the client, and why?
}
else
{
    $conn->query
    ("UPDATE hits SET quantity=quantity-$q WHERE id=$id");
    // How would you indicate success to the client, and why?
}
?>
