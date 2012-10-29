<?php 
$db = new mysqli('localhost', 'root', 'root', 'jewelry_box_db');

if(!$db) {
	echo "could not connect to the database";
} else { 
if(isset($_POST['queryString'])) {
	$queryString = $db->real_escape_string($_POST['queryString']);
	
	if(strlen($queryString) >0) {
		$query = $db->query("SELECT name FROM product WHERE name LIKE '%".$queryString."%'");
		if($query) {
			while ($result = $query ->fetch_object()) {
				echo '<li onClick="fill(\''.$result->name.'\');"><b>'.$result->name.'</b></li>';
			}
		}else {
			echo "there was a problem with the query";
		}
	}else {
	}
}else {
	echo "no";
}
}

?>

