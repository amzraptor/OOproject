<?php 
include "../db/db.php";
$action = $_POST['action'];
session_start();
switch($action)
{
case 'get_invoice':
	{
		$arr = array ();
		$arr['error'] = 'none';
		$x = load_store($_POST['store']);
		$arr['sname'] = $x['sname'];
		$arr['invoice'] = load_invoice($_POST['invoice']);
		$arr['total'] = invoice_total($_POST['invoice'], $_POST['store']);
		$arr['products'] = load_a_product_invoice($_POST['invoice'], $_POST['store']);
		

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

























