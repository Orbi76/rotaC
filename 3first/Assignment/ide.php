<?php if(!isset($_SESSION)) session_start(); ?>
<html>
<body>
<?php
echo "Hi " . $_SESSION["gatekeeper"] . ".<br />";
$rev = $_POST["review"];

$venueID = $_POST['venueID'];

echo "irdki $venueID ezzel $rev ";



?>
</body>
</html>

