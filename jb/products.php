<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="PHP Shopping Cart Using Sessions" /> 
<meta name="keywords" content="shopping cart tutorial, shopping cart, php, sessions" />
<link rel="stylesheet" media="all" href="/style/style.css" type="text/css" />
<title>Products</title>

<?php
include "db.php";
?>

<?php
	$con = get_conn_and_connect();
?>

</head>

<body>


<table border="5" padding = "5" width = "60%">

	<?php
		
		$sql = "SELECT product_id, name, description, price, img1 FROM product;";
		
		$result = mysql_query($sql);
		
		while(list($id, $name, $description, $price, $img1) = mysql_fetch_row($result)) {
		
			echo "<tr>";
				echo "<td>";
				echo "<img src= \"$img1\">";
				echo "</td>";
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

