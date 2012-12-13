<?php 
include "../db/db.php";//include db script
$action = $_POST['action'];
session_start();
switch($action)
{
case "start":
	{
		$arr = array ();
		
		if(store_inactive($_POST['store']))
		{
			$arr['error'] = 'none';
		}
		else
		{
			$arr['error'] = 'error';
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

