<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="description" content="PHP Shopping Cart Using Sessions" />
<meta name="keywords" content="shopping cart tutorial, shopping cart, php, sessions" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" media="all" href="/style/style.css" type="text/css" />
<title>Cart</title>


<?php
include "db.php";
?>

<?php
$con = get_conn_and_connect();
?>


</head>
<body>


<?php

$product_id = $_GET[id];	//the product id from the URL
$action = $_GET[action]; //the action from the URL

//if there is an product_id and that product_id doesn't exist display an error message
if($product_id && !productExists($product_id)) 
{
  die("Error. Product Doesn't Exist");
}

switch($action) {	//decide what to do

case "add":
$_SESSION['cart'][$product_id]++; //add one to the quantity of the product with id $product_id
break;

case "remove":
$_SESSION['cart'][$product_id]--; //remove one from the quantity of the product with id $product_id
if($_SESSION['cart'][$product_id] == 0) unset($_SESSION['cart'][$product_id]); //if the quantity is zero, remove it completely (using the 'unset' function) - otherwise is will show zero, then -1, -2 etc when the user keeps removing items.
break;

case "empty":
unset($_SESSION['cart']); //unset the whole cart, i.e. empty the cart.
break;

}

?>


<?php	

if($_SESSION['cart']) 
{	//if the cart isn't empty
//show the cart

  echo "<table border=\"5\" padding=\"5\" width=\"60%\">";	//format the cart using a HTML table

  //iterate through the cart, the $product_id is the key and $quantity is the value
  foreach($_SESSION['cart'] as $product_id => $quantity) 
  {	

    // //get the name, description and price from the database - this will depend on your database implementation.

    $result = get_info_for_cart($product_id);

    //Only display the row if there is a product (though there should always be as we have already checked)
    if(mysql_num_rows($result) > 0) 
    {

      list($name, $description, $price, $img1) = mysql_fetch_row($result);

      $line_cost = $price * $quantity;	//work out the line cost
      $total = $total + $line_cost;	//add to the total cost
    ?> 
      <tr>
      <td align="center"><img src="<?php echo$img1?>"</td>
      <td align="center"><?php echo $name?></td>
      
      <td align="center"><?php echo $quantity ?><a href="cart.php?action=remove&id=<?php echo $product_id ?>">X</a></td>
      <td align="center"><?php echo $line_cost?></td>

      </tr>

      <?php
    }

  }
    ?>
    
    <tr>
    <td colspan="3" align="right">Total</td>
    <td align="right"><?php echo $total?></td>
    </tr>

    
    <tr>
    <td colspan="4" align="right"><a href="cart.php?action=empty" onclick="return confirm('Are you sure?');">Empty Cart</a></td>
    </tr>
    </table>

  <?php

}
else
{
  //otherwise tell the user they have no items in their cart
  echo "You have no items in your shopping cart.";

}

?>

<a href="products.php">Continue Shopping</a>

</body>
</html>
