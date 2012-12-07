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

<body>

<div id="contents" style="width:100%;">

	<div id="left-contents" style="width:10%;float:left;">
	left
	</div>		
	
	<div id="center-contents" style="float:left;width:80%;">
		<!-- top of contents-->
		<div style="text-align:center;width:100%;height:50px;background-color:#cfc;">
			<h1> Product Name </h1>
		</div>

		<!-- middle of contents-->
		<div style="margin-top:10px;min-width:500px;">

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
			<input type="submit" value="add to cart" />
			</form>
		</div>

	</div>

	<div id="right-contents" style="width:10%;float:left;">
	right
	</div>

</div>

</body>

</html>
