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
		$user_id = intval(get_user_id($user_name));

		save_shipping_info_to_db($user_id, $name, $st_ad, $city, $state, $zip, $atten); //now save the info
		//$arr = array($user_name, $name, $atten, $email, $st_ad, $city, $state, $zip);

		//saving the cart itself

		$invoice_id = intval(get_last_invoice_id()); //get last MAX invoice_id
		$message = "Thank you for shopping at JeweleryBox, Order Number: ".$invoice_id."\n=============================\n";
		foreach($_SESSION['cart'] as $product_id => $qty)
		{
			$store_id = intval(get_product_store_id($product_id));
			$product_name = get_product_name($product_id);
			$product_name_mail_format = str_replace("'", "", $product_name);
			$price = get_product_price($product_id);
			$product_id = intval($product_id);
			$qty = intval($qty);
			//$arr = array($product_id);
			//$message .= "hiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii\n";
			$message .= $product_name_mail_format."\nQuantity: ".$qty."\nPrice: $ ".$price."\n\n";
			save_product_to_invoice($store_id, $invoice_id, $product_id, $product_name, $price, $qty);
		}

		$arr['invoice'] = load_invoice($invoice_id);
		$arr['total'] = invoice_a_total($invoice_id);
		$arr['products'] = load_products_invoice($invoice_id);

		$total = invoice_a_total($invoice_id);
		$from = "aelhedek1@cougars.ccis.edu";
		$message .= "=============================\nTotal:                                          $ ".$total[0]."\n";

		
		$subject = "Your Order From JeweleryBox";
		
		$mail = "To: $email\nFrom: $from \nSubject: $subject\n\n$message";

		exec("echo -e '$mail' | ssmtp $email");

		unset($_SESSION['cart']);
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

