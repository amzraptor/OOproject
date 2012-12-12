<?php 
include "db.php";//include db script
session_start();

if(empty($_SESSION['user']))
{
      $_SESSION['user'] = "guest";
      $username = "guest";
}
else
{
      $username = $_SESSION['user'];
	
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="PHP Shopping Cart Using Sessions" /> 
<meta name="keywords" content="shopping cart tutorial, shopping cart, php, sessions" />
<link rel="stylesheet" media="all" href="/style/style.css" type="text/css" />
<link rel="stylesheet" media="all" href="header.css" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<title>Products</title>

<?php
include "../db/db.php";
?>

<?php
	$con = get_conn_and_connect();
?>

</head>

<body>
	<div class="header" id="header" name="header">
	
		
	</div>

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
				 
				?>
					<td> <input  type ="button" value="add to cart" id="add_label" onclick="add_to_cart(<?= $id?>)"/> </td>
				<?php
			
			echo "</tr>";
		}
		
	?>
</table>


<p></p>
	<hr/>
	<hr/>
	<div id="cart">



	</div>



<a href="cart.php">View Cart</a>


</body>

<script type="text/javascript" src = "header.js"></script>
<script type="text/javascript">
$(document).ready(function(){

/////////////////////////////////////////////
	var username = '<?php echo $username; ?>';
	if(username == 'guest')
	{
		$('#signin').show(); //
		$('#signup').show(); //
		$('#aboutus').show(); //
		$('#cart1').show(); //
	}
	else
	{
		$('#stores').show(); //
		$('#logout').show(); //
		$('#cart1').show(); //
		$('#aboutus').show(); //
	}

/////////////////////////////////////////////
</script>
});
</html>


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<script type="text/javascript" src = "cart.js"></script>








