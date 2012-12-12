<style type="text/css">
table.curvedEdges { border:5px solid #ccc;-webkit-border-radius:13px;-moz-border-radius:13px;-ms-border-radius:13px;-o-border-radius:13px;border-radius:13px; }
table.curvedEdges td, table.curvedEdges th { border-bottom:1px dotted black;padding:5px; }
</style>

<?php session_start(); 







include "../db/db.php";



$connection = get_conn_and_connect();

 
		 
$product_id = $_POST['id'];	
$action = $_POST['action'];
$modified_qty = $_POST['qty']; 

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
unset($_SESSION['cart'][$product_id]); //if the quantity is zero, remove it completely (using the 'unset' function) - otherwise is will show zero, then -1, -2 etc when the user keeps removing items.
break;

case "empty":
unset($_SESSION['cart']); //unset the whole cart, i.e. empty the cart.
break;

case "update":
if($modified_qty>0)
{
  for($i=0;$i<$modified_qty;$i++)
  {
    $_SESSION['cart'][$product_id]++;
  }
}
if($modified_qty<0)
{
  for($i=0;$i>$modified_qty;$i--)
  {
    $_SESSION['cart'][$product_id]--;
  }
}

break;

case "save": //save only if user is not a guest!!!
//$_SESSION['user'] = "amzraptor"; //hard code
if($_SESSION['user'] != "guest")
{
  foreach($_SESSION['cart'] as $product_id => $quantity)
  {
    //
    for($i=0;$i<$quantity;$i++)  
    {
      save_cart_to_db($_SESSION['user'],$product_id);
    }
  }
}
break;

case "load":
//$_SESSION['user'] = "amzraptor"; //hard code

$loaded_stuff = load_cart_from_db($_SESSION['user']);
delete_products_from_cart($_SESSION['user']); //now just go ahead and clean them from my database
for($i=0;$i<sizeof($loaded_stuff);$i++)
{
  $product_id = $loaded_stuff[$i]['product_id'];
  $_SESSION['cart'][$product_id]++;
}
unset($loaded_stuff); //just for cleaning


break;

}
//end of switch



if($_SESSION['cart']) 
{	//if the cart isn't empty
  //show the cart
  reset($checkout_array);     //reset the array 
  $checkout_array= array();   //now set it
  echo "<H1>Shopping Cart</H1>";
  echo "<table class=\"curvedEdges\">";	//format the cart using a HTML table
  echo "<th></th><th>Item</th><th>Quantity</th><th>Price ($)</th>";        //column tittles
 
  //iterate through the cart, the $product_id is the key and $quantity is the value
  foreach($_SESSION['cart'] as $product_id => $quantity) 
  {	

    // //get the name, description and price from the database - this will depend on your database implementation.

    $result = get_info_for_cart($product_id);

    //Only display the row if there is a product (though there should always be as we have already checked)
    if(mysql_num_rows($result) > 0) 
    {

      list($name, $description, $price, $img1) = mysql_fetch_row($result);
      array_push($checkout_array,array($product_id, $quantity));
      $line_cost = $price * $quantity;	//work out the line cost
      $total = $total + $line_cost;	    //add to the total cost
    ?> 
      <tr>
      <td align="left"  ><input type="checkbox"  id="chkbx_<?=$product_id?>" onclick="chkbx_array(<?=$product_id?>,'chkbx_<?=$product_id?>')"/></td>
      <?php /*<td align="center"><img src="<?php echo $img1?>" /></td> */?>
      <td align="left"><i><?php echo $name?></i></td>
      
      <td align="center"><input type="text" style="width: 30px;" id="qtybx_<?=$product_id?>" value="<?php echo $quantity ?>" onblur="qty_update(<?=$product_id?>,'qtybx_<?=$product_id?>', <?=$quantity?>)" /></td>
      <td align="right"><?php echo number_format($line_cost, 2);?></td>

      </tr>

      <?php
    }
 
  }
    ?>
    <tr></td>
    <tr>
    <td colspan="3" align="right"><b>Total</b></td>
    <td align="right"><b><?php echo "$ ", number_format($total, 2);?></b></td>
    </tr>
    </table>
    
    <table>
    <tr>
    <td colspan="0" align="left"><input  type ="button" value="Remove Marked" id="checked_button" onclick="remove_checked()"/> </td>
    <td colspan="3" align="right"><input  type ="button" value="Empty Cart" id="empty_cart_button" onclick= "empty_cart()"/> </td>
    <td colspan="4" align="right">
      <form method = "post" action = "purchase.php">
        <?php /*<input type = "hidden" name = "cart_final" value = "<?php echo base64_encode(json_encode( $checkout_array ) ); ?>">
        $array = (array) json_decode(base64_decode($_POST['cart_final'])); var_dump($array); USE THAT IN OTHER PAGE */?>
        <input type = "submit" value = "Checkout">
      </form>
    </td>

    <?php
    //echo "array : <pre>".print_r($checkout_array,true)."</pre><br />\n"; //best way to print multi-dim array!
    /*<td colspan="4" align="right"><input  type ="button" value="Save Cart" id="save_cart_button" onclick= "save_cart()" /> </td>
    <td colspan="4" align="right"><input  type ="button" value="Load Cart" id="load_cart_button" onclick= "load_cart()" /> </td> 
    */?>
    </tr>
    </table>

  <?php

}
else
{
  //otherwise tell the user they have no items in their cart
  echo "<H1> Shopping Cart </H1>";
  echo "You have no items in your shopping cart.";
  ?>
  <?php //<input  type ="button" value="Load Cart" id="load_cart_button" onclick= "load_cart()" /> </td>
  ?>
  <?php
}

?>

<!-- <a href="products.php">Continue Shopping</a> !-->

<?php mysql_close($connection); ?>
