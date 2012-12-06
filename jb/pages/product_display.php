<?php 
include "db/db.php";//include db script
session_start();

if(empty($_SESSION['user']))
{
      $_SESSION['user'] = "guest";
      $username = "guest";
      //$_SESSION['cart'] = array();
}
else
{
      $username = $_SESSION['user'];
	//load cart
}
$sessionid = session_id();

//echo"$username and $sessionid";
?>
<?php 

$product_id = "";
$product_image = "";
$product_description = "";
$product_price = "";
$product_size = "";
$product_color = "";
$product_material = "";

if(empty($_POST['product_id'])){ $product_id = ""; } 
else { $product_id = $_POST['product_id']; }

if(empty($_POST['product_image'])){ $product_image = ""; } 
else { $product_image = $_POST['product_image']; }

if(empty($_POST['product_description'])){ $product_description = ""; } 
else { $product_description = $_POST['product_description']; }

if(empty($_POST['product_price'])){ $product_price = ""; } 
else { $product_price = $_POST['product_price']; }

if(empty($_POST['product_size'])){ $product_size = ""; } 
else { $product_size = $_POST['product_size']; }

if(empty($_POST['product_color'])){ $product_color = ""; } 
else { $product_color = $_POST['product_color']; }

if(empty($_POST['product_material'])){ $product_material = ""; } 
else { $product_material = $_POST['product_material']; }


?>

<!doctype hmtl>
<html>

<head>
<style>
body {
	background-color: #ebebeb;
	margin: 0;
}
#header {
	background-color:#ccc;
}
#contents {
	margin: 0 0;
}
#background {
	background-color:#fff;
}
#page {
	background-color: #ccc;
	width: 924px;
	margin: 0 auto;
	padding: 0 18px;
}
.header{
	background-color:black;
 
    .ui-tabs-vertical { width: 55em; }
    .ui-tabs-vertical .ui-tabs-nav { padding: .2em .1em .2em .2em; float: left; width: 12em; }
    .ui-tabs-vertical .ui-tabs-nav li { clear: left; width: 100%; border-bottom-width: 1px !important; border-right-width: 0 !important; margin: 0 -1px .2em 0; }
    .ui-tabs-vertical .ui-tabs-nav li a { display:block; }
    .ui-tabs-vertical .ui-tabs-nav li.ui-tabs-active { padding-bottom: 0; padding-right: .1em; border-right-width: 1px; border-right-width: 1px; }
    .ui-tabs-vertical .ui-tabs-panel { padding: 1em; float: right; width: 40em;}
</style>

</head>

<body>

<div class="header" style="width:100%;height:60px;">	

	<div style="color:white;width:50%;float:left;">
		<a href="../index.php" style="font-size:30px;margin-top:5px;margin-left:20px;">The Jewelry Box</a><br />
<lable style="color:#ccc;font-size:11px;margin-left:30px;">Hand Crafted Trinkets</lable>		
	</div>

	<div style="height:100%;width:50%;float:left">
        <form action="signin.php" method="POST">
	<button id="signin" style="width:90px;float:right;margin-right:10px;margin-top:10px;display:none;">Sign In</button>
        </form>
        <form action="signup.php" method="POST">
	<button id="signup" style="width:90px;float:right;margin-right:10px;margin-top:10px;display:none;">Sign Up</button>
        </form>
        <form action="logout.php" method="POST">
	<button id="logout" style="width:90px;float:right;margin-right:10px;margin-top:10px;display:none;">Logout</button>
        </form>
        <form action="stores.php" method="POST">
	<button id="stores" style="width:90px;float:right;margin-right:10px;margin-top:10px;display:none;">Stores</button>
        </form>
        <form action="cart.php" method="POST">
	<button id="cart1" style="width:90px;float:right;margin-right:10px;margin-top:10px;display:none;">Cart</button>
        </form>
        <form action="aboutus.php" method="POST">
	<button id="aboutus" style="width:90px;float:right;margin-right:10px;margin-top:10px;display:none;">About Us</button>
        </form>
	</div>
</div>
<div id="search_header" style="float:left;background-color:black;width:100%;">
	
		<div  style="float:right;margin-right:10px;margin-bottom:10px;">
			<form action="search.php" method="post">
				<input name="search_text" value="" placeholder="necklace"/>
				<input style="width:70px" type="submit" id="search_button" value="search" />
			</form>
		</div>
</div>

<div id="background">

	<div id="page">
		<!-- <div id="header">
		header
		</div> !-->

		<div id="content">
			<!-- top of contents-->
			<div style="text-align:center;width:100%;height:50px;background-color:#cfc;">
				<h1> Product Name </h1>
			</div>

			<!-- middle of contents-->
			<div style="margin-top:10px;min-height:500px;min-width:500px;">

				<div id="image" style="min-width:200px;width:25%;float:left;height:100%;">
				<img src="<?php echo $product_image ?>" width="200" height="200" />
				</div>

				<div id="product_specs" style="min-width:300px;width:75%;float:left;height:500px;">
				
					<div id="description" style="width:100%;float:left;height:200px;"> 
						<p style="margin-left:10px;"> Description: <?php echo $product_description ?> </p>
					</div>

					<div id="more_specs" style="width:100%;float:left;min-height:20px;">
						<p style="float:left;margin-left:10px;"> Size: <?php echo $product_size ?> </p>
						<p style="float:left;margin-left:10px;"> Color: <?php echo $product_color ?> </p>
						<p style="float:left;margin-left:10px;"> Material: <?php echo $product_material ?> </p>
					</div>
				
					<div id="price" style="width:100%;float:left;"> 
						<p style="float:left;margin-left:10px;"> Price: <?php echo $product_price ?> </p>
					</div>
		
				</div>

			</div>

			<!-- bottom contents-->
			<div style="height:50px;">
				<form style="float:right;">
				<input  type ="button" value="add to cart" id="add_label" onclick="add_to_cart(<?= $product_id?>)"/>
				</form>
			</div>
		</div>

	</div>

</div>

</body>


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<script type="text/javascript" src = "cart.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	var username = "<?php echo $username; ?>";
/////////////////////////////////////////////
	if(username == "guest")
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
      
});
</script>

</html>
