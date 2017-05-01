<?php // https://www.youtube.com/watch?v=l76uglZBjpk&list=PLC3FA336653950084  
	//https://www.youtube.com/watch?v=0v39T-9_cFM&index=2&list=PLC3FA336653950084
	//https://www.youtube.com/watch?v=DXNNNVHr9X0&list=PLC3FA336653950084&index=3
	//	This is the link where the codes from.
?>





<!DOCTYPE html>
<html>
<head>
<link href="calCss.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript">
function overlay() {
	el = document.getElementById('overlay');
	el.style.display = (el.style.display == "block") ? "none" : "block";
	el = document.getElementById("events");
	el.style.display = (el.style.display == "block") ? "none" : "block";
	el = document.getElementById("eventsBody");
	el.style.display = (el.style.display == "block") ? "none" : "block";
}
<script language="javascript" type="text/javascript">
function show_details(theId.id);{
	var deets = (theId.id);
	el = document.getElementById("overlay");
	el.style.display = (el.style.display == "block") ? "none" : "block";
	el = document.getElementById("events");
	el.style.display = (el.style.display == "block") ? "none" : "block";
	var hr = new XMLHttpRequest();
	var url = "events.php";
	var vars = "deets="+deets;
	hr.open("POST", url, true);
	hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	hr.onreadystatechange = function() {
		if (hr.readyState == 4 && hr.status == 200) {
			var return_data = hr.responseText;
			document.getElementById("events").innerHTML = return_data;
		}
	}
	hr.send(vars);
	document.getElementById("events").innerHTML = "processing...";
}

</script>
</head>
<body onLoad="initialCalendar();">
<div id="showCalendar"></div>
<div id="overlay">
	<div id="events"></div>
	
<?php include ("calendar_start.php"); ?>
</body>
</html>
