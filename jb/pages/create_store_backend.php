<?php 
include "../db/db.php";
$action = $_POST['action'];
$color = $_POST['color'];
session_start();
switch($action)
{
case "start":
	{
//session_unset();

		if($color != "none")
		{
			save_color($_POST['selection'], $color, $_SESSION['store_id']);
		}
		
		$arr = array ();
		$arr['error'] = '';
		
		$store = load_store($_SESSION['store_id']);

		if ($_SESSION['user'] == "guest")
		{
			$arr['error'] = "please signin to your account first if you do not have an account then signup for free.";
			echo json_encode($arr);
			break;
		}
		
		if($store != false)
		{
			$arr['store'] = $store;
		}
		else
		{
			$arr['error'] = 'store load fail';
			$arr['store'] = 'none';
		}
		if($_SESSION['user'] == "guest")
		{
			$arr['error'] = 'not logged in';

			$arr['store_id'] = $_SESSION['store_id'].$_SESSION['user'];
		}
		echo json_encode($arr);
		break;
	}
case "save_info":
	{
		$arr = array ('error'=>"");
		if(save_info($_SESSION['store_id'], $_POST['field'], $_POST['value']) != true)
		{
			$arr['error'] = 'error saving info';
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
/*
	//in signin change the user to the new user!!
	
*/
?>

