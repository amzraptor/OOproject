<?php 
include "db/db.php";//include db script
$action = $_POST['action'];
session_start();
switch($action)
{
case "valid":
	{
		update_email_valid($_SESSION['user']);
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

