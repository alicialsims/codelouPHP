<?php 
require_once('database.php');

if(isset($_GET['wine'], $_GET['rating'])) {

	$wine = (int)$_GET['wine'];
	$rating = (int)$_GET['rating'];

	if(in_array($rating, [1,2,3,4,5] )) {
		$exists = $database_connection->query("SELECT id FROM wine_t WHERE id = {$wine}")->rowCount() > 0;
	
		if($exists) {
			$database_connection->query("INSERT INTO rating_t (wine_id, rating) VALUES ({$wine}, {$rating})");
		}
	}

  	header('Location: wines.php?id=' .$wine);
}