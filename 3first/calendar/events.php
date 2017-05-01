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
//$query = mysql_query('SELECT description FROM events WHERE dayofmonth = "'.$deets.'"');
//$num_rows = mysql_num_rows($query);
$sql = 'SELECT description FROM availability WHERE evdate="'.$deets.'"';
	//$result = $conn->query($sql);
	//$row = $result->fetch();
	//echo " id: $row[ID]<br/>";
	//echo .$row["ID"];
	$num_rows = mysql_num_rows($sql);
if($num_rows > 0) {
	$events .= '<div id="eventsControl"><button onMouseDown="overlay()">Close</button><br /><br /><b> ' . $deets . '</b><br /><br /></div>';

	while ($row = $result->fetch()) {
		$desc = $row['availability'];
		$events .= '<div id="eventsBody">' . $desc .'<br /><hr><br /></div>';
	}
}
echo $events;
?>