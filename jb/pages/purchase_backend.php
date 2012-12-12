<?php 
include "../db/db.php";//include db script
$action = $_POST['action'];
$cart_array = (array) json_decode($_POST['cart_final']);


switch($action)
{
case "valid":
	{
		$arr = array('success'=>'true');
		echo json_encode($arr);
		break;

	}
	case "check_qty":
	{
		$arr = array();
		//$arr = array('go'=>array("he", "yo"));
		$arr['cart'] = $cart_array;
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

