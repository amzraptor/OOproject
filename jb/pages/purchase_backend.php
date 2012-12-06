<?php 
include "db.php";//include db script
$action = $_POST['action'];
session_start();
switch($action)
{
case "valid":
	{
		$arr = array('success'=>'true');
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

