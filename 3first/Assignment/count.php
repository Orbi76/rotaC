<?php
try {
	$handler = new PDO("mysql:host=localhost;dbname=gorban;", "root", "root");
	$handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e) {
	echo $e->getMessage();
	die();
}

$query =  $handler->query('SELECT * FROM reviews');
$query->rowCount();
	echo $query->rowCount();
//} else{
//echo 'No results';
//}
