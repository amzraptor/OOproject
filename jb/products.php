<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="PHP Shopping Cart Using Sessions" /> 
<meta name="keywords" content="shopping cart tutorial, shopping cart, php, sessions" />
<link rel="stylesheet" media="all" href="/style/style.css" type="text/css" />
<title>Products</title>

<?php
function get_conn_and_connect()
{
    $con = mysql_connect("localhost","root","root");
    if (!$con)
      {
      	echo("I can't get a connection");
      }

    if (!mysql_select_db("jewelry_box", $con))
      {
      	echo("problem with jbox");
      }

    return $con;
}
?>

<?php
	$con = get_conn_and_connect();
?>

</head>

<body>


<table border="1">

	<?php
		
		$sql = "SELECT product_id, name, description, price FROM product;";
		
		$result = mysql_query($sql);
		
		while(list($id, $name, $description, $price) = mysql_fetch_row($result)) {
		
			echo "<tr>";
			
				echo "<td>$name</td>";
				echo "<td>$description</td>";
				echo "<td>$price</td>";
				echo "<td><a href=\"cart.php?action=add&id=$id\">Add To Cart</a></td>";
			
			echo "</tr>";
		}
		
	?>
</table>


<a href="cart.php">View Cart</a>

</body>
</html>

