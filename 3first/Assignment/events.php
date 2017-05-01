<?php
$deets = $_POST['deets'];
$deets = preg_replace('#[^0-9/]#i', '', $deets);

include ("connect.php");

/*
$sql = 'SELECT description FROM availability WHERE dayofmonth="'.$deete.'"';
	$result = $conn->query($sql);
	$row = $result->fetch();
	if ($row>0) {


$sql = 'SELECT ID FROM availability WHERE dayofmonth="'.$date.'"';
	$result = $conn->query($sql);
	$row = $result->fetch();
	if ($row>0) {


*/

$events = '';

$sql = 'SELECT * FROM availability WHERE evdate="'.$deets.'"';
	$result = $conn->query($sql);
	$row = $result->fetch();
	echo "$row[availability] available space left to book. <br/>";
	
if($row > 0) {
	$events .= '<div id="eventsControl"><button onMouseDown="overlay()">Close</button><br /><br /><b> ' . $deets . '</b><br /><br /></div>';
	
	while ($row = $result->fetch()) {
		$desc = $row['availability'];
		$events .= '<div id="eventsBody">' . $desc .'<br /><hr><br /></div>';
	
	}
}
echo $events;
?>