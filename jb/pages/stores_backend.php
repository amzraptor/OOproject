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
		
		if($_SESSION['user'] == "guest")
		{
			$arr['error'] = "please signin to your account first if you do not have an account then signup for free.";
			echo json_encode($arr);
			break;
		}
		else 
		{
			$arr['stores']  = load_stores($_SESSION['user']);
		}
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

























