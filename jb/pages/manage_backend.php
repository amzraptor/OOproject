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
case 'get_invoices':
	{
		$arr = array ();
		$arr['error'] = '';
		$x = load_store($_POST['store_id']);
		$arr['store_name'] = $x['sname'];
		$arr['invoices'] = get_invoices($_POST['store_id']);
		$totals = array();
		$dates = array();
		$orders = array();
		for($i=0; $i<sizeof($arr['invoices']); $i++)
		{
			$sum = invoice_total($arr['invoices'][$i][0], $_POST['store_id']);
			array_push($totals, $sum['total']);
			$date = invoice_date($arr['invoices'][$i][0]);
			array_push($dates, $date);
			$order = invoice_status($arr['invoices'][$i][0]);
			array_push($orders, $order);
		}
		$arr['totals'] = $totals;
		$arr['dates'] = $dates;
		$arr['orders'] = $orders;

		echo json_encode($arr);
		break;
	}
case 'get_inventory':
	{
		$arr = array ();
		$arr['error'] = '';

		$arr = array ();
		$arr['error'] = '';
		$x = load_store($_POST['store_id']);
		$arr['store_name'] = $x['sname'];
		$arr['item'] = load_product($_POST['store_id']);
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

























