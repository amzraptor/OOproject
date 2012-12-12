<?php 
include "../db/db.php";
$action = $_POST['action'];
session_start();
switch($action)
{
case "start":
	{	
		$arr = array ();
		$arr['error'] = '';
		
		
		echo json_encode($arr);
		break;
	}
default:
	{
		echo "from index backend error";
		break;
	}
}
?>

























