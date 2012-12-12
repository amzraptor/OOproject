<?php 
include "../db/db.php";//include db script
$action = $_POST['action'];
$arr = array ();
$arr['error'] = "";

session_start();

switch($action)
{
case "order":
	{
		$user_name = $_POST['user_name'];
		$name = $_POST['name'];
		$atten = $_POST['atten'];
		$email = $_POST['email'];
		$st_ad = $_POST['st_ad'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$zip = $_POST['zip'];
		$user_id = get_user_id($user_name);

		save_shipping_info_to_db($user_id, $name, $st_ad, $city, $state, $zip, $atten); //now save the info
		//$arr = array($user_name, $name, $atten, $email, $st_ad, $city, $state, $zip);

		//saving the cart itself

		$invoice_id = get_last_invoice_id(); //get last MAX invoice_id
		foreach($_SESSION['cart'] as $product_id => $quantity)
		{
			$store_id = get_product_store_id($product_id);
			$product_name = get_product_name($product_id);
			$price = get_product_price($product_id);
			//$arr = array($product_id);
			save_product_to_invoice($store_id, $invoice_id, $product_id, $product_name, $price, $quantity);
		}
		echo json_encode($arr);
		break;

	}
	
	case "check_qty":
	{
		foreach($_SESSION['cart'] as $product_id => $quantity)
		{
			$product_db_qty = get_product_qty_from_db($product_id);
			if($quantity > $product_db_qty)
			{
				$arr['error'] = "Only $product_db_qty of " .get_product_name($product_id). "(s) are left in store! \n";
			}
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

