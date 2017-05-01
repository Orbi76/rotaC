<html>
<body>
<?php
$ID = $_GET["ID"];

// connect to the database
$conn = new PDO("mysql:host=localhost;dbname=gorban;", "root", "root");
// get details of the venue using the id
$results = $conn->query("SELECT * FROM venues WHERE ID='$ID'");
$row = $results->fetch();
$old_recommendation = $row['recommended'];

$sql = "UPDATE venues SET recommended = recommended+1 WHERE ID='$ID'";
$q = $conn->prepare($sql);
$q->execute();
$results = $conn->query("SELECT * FROM venues WHERE ID=$ID");
$row = $results->fetch();
$new_recommendation = $row['recommended'];
echo"<p><br />";
echo "<p>Sofar $old_recommendation people recommend this venue, but </p>";
echo "<p>with your vote now $new_recommendation people offer this place! </p>";
echo "<p/>";
?>
</body>
</html>