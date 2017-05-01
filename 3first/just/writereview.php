<?php if(!isset($_SESSION)) session_start(); ?>
<html>
<body>
<?php
echo "Hi " . $_SESSION["gatekeeper"] . ".<br />";
$ID = $_GET["ID"];

// connect to the database
$conn = new PDO("mysql:host=localhost;dbname=rcp;", "root", "root");
$results = $conn->query("SELECT * FROM venues WHERE ID='$ID'");
$row = $results->fetch();


echo "Here you can write a review from $row[name].<br />";

?>
<form method="post" action="reviewinto.php">
<input type="hidden" name="venueID" value="<?php echo $ID; ?>" /> 
<p>Your review:<textarea name="review" rows="5" cols="40"></textarea></p>
<br />

<input type="submit" value="Submit"/><br />
<br />
</form>




</body>
</html>