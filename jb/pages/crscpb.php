<?php 
include "../db/db.php";
$action = $_POST['action'];
session_start();
switch($action)
{
case "start":
	{
//session_unset();

		$color = $_POST['color'];
		if($color != "none")
		{
			save_color($_POST['selection'], $color, $_SESSION['store_id']);
		}
		
		$arr = array ();
		$arr['error'] = '';
		

		if (empty($_SESSION['user']) || $_SESSION['user'] == "guest")
		{
			$arr['error'] = "not logged in";
			echo json_encode($arr);
			break;
		}
		else if(empty($_SESSION['store_id']))
		{
			$arr['stores']  = load_stores("bdpoag1");
		}
		echo json_encode($arr);
		break;
	}
case "load_store":
	{
		$arr = array ();
		$arr['error'] = '';
		if($_SESSION['user'] == "guest")
		{
			$arr['error'] = "please signin to your account first if you do not have an account then signup for free.";
			echo json_encode($arr);
			break;
		}
		if(!empty($_SESSION['store_id']))
		{
			$store = load_store($_SESSION['store_id']);
		}
		else if($_POST['store_id'] == "none")
		{
			$_SESSION['store_id'] = add_store($_SESSION['user']); 
			$store = $_SESSION['store_id'];
		}
		else
		{
			$store = load_store($_POST['store_id']);
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
?>

























