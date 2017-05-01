<?php if(!isset($_SESSION)) session_start();
echo "Dear " . $_SESSION["gatekeeper"] . ",<br />";

$un = $_SESSION["gatekeeper"];
$rev = $_POST["review"];
$venueID = $_POST['venueID'];
$conn = new PDO("mysql:host=localhost;dbname=gorban;", "root", "root");

$result = $conn->query("INSERT INTO reviews (venueID,username,review,approved)
	VALUES ('$venueID','$un','$rev',0)");

		echo"<p>Thank you for your review.</p>";
		echo"<p>Your review will appear on our site when the admin will approved.<p/>";
		

echo '<br /> <br />back to <a href="aindex.php">Start</a>';
?>
