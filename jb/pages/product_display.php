<?php 
include "../db/db.php";//include db script
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
<?php 

$product_id = "";
$product_image = "";
$product_description = "";
$product_price = "";
$product_size = "";
$product_color = "";
$product_material = "";
$product_name = "";

if(empty($_POST['product_id'])){ $product_id = ""; } 
else { $product_id = $_POST['product_id']; }

if(empty($_POST['product_image'])){ $product_image = ""; } 
else { $product_image = $_POST['product_image']; }

if(empty($_POST["product_description"])){ $product_description = ""; } 
else { $product_description = $_POST["product_description"]; }

if(empty($_POST['product_price'])){ $product_price = ""; } 
else { $product_price = $_POST['product_price']; }

if(empty($_POST['product_size'])){ $product_size = ""; } 
else { $product_size = $_POST['product_size']; }

if(empty($_POST['product_color'])){ $product_color = ""; } 
else { $product_color = $_POST['product_color']; }

if(empty($_POST['product_material'])){ $product_material = ""; } 
else { $product_material = $_POST['product_material']; }

if(empty($_POST["product_name"])){ $product_name = ""; } 
else { $product_name = $_POST["product_name"]; }


?>

<!doctype hmtl>
<html>

<head>
<style>
body {
margin:0 0;
}
#content {
	margin: 0 0 0;
}
#background {

	background-color:#fff;
}
#page {
	background-color: #fff;
	width: 924px;
	height: 100%;
	margin: 0 auto;
	padding: 0 18px;
	/*background-color:#4f6266;*/
}

#footer {
	background-color:#ccc;
}


 
    .ui-tabs-vertical { width: 55em; }
    .ui-tabs-vertical .ui-tabs-nav { padding: .2em .1em .2em .2em; float: left; width: 12em; }
    .ui-tabs-vertical .ui-tabs-nav li { clear: left; width: 100%; border-bottom-width: 1px !important; border-right-width: 0 !important; margin: 0 -1px .2em 0; }
    .ui-tabs-vertical .ui-tabs-nav li a { display:block; }
    .ui-tabs-vertical .ui-tabs-nav li.ui-tabs-active { padding-bottom: 0; padding-right: .1em; border-right-width: 1px; border-right-width: 1px; }
    .ui-tabs-vertical .ui-tabs-panel { padding: 1em; float: right; width: 40em;}
</style>
<link rel="stylesheet" media="all" href="header.css" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
	<div class="header" id="header" name="header">
	
		
	</div>
</head>

<body>

<div id="background" style="margin-top:1%;">

	<div id="page">
		<!-- <div id="header">
		header
		</div> !-->

		<div id="content">
			<!-- top of contents-->
			<div style="text-align:center;width:100%;min-height:50px;background-color:#fff;">
				<h1> <?php echo $product_name ?> </h1>
			</div>

			<!-- middle of contents-->
			

				<div id="image" style="min-width:200px;width:25%;float:left;height:100%;">
					<img src="<?php echo $product_image ?>" width="200" height="200" />

						<div id="rating" style="float:left;margin-left:25px;margin-top:10px;">
						
							<div style="float:left;width:100%;">

							<button style="border:none;background:transparent;" onclick="update_likes()" > 
									<img src="../site_images/thumbUp.png" width="20px" hieght="20px" > LIKE </button>
							<label id="likes" style="color:#0f0;"> </label>
							<div id="likes" > </div>

							</div>

							<script type="text/javascript" >
							function update_likes() {
									var y = "<?php echo $product_id ?>";
									var x = {"type" : "1", "prod_id" : y };
								 $.ajax({
											url:"product_display_backend.php",
											data: x,
											type:"post",
											dataType:"html",
											success:function(result)
													{ 
														$("#likes").html(result);
													},

											error:function(e){alert("there was an error");}
										});
							}
							</script>

							<div style="float:left;width:100%;">
							<button style="border:none;background:transparent;" onclick="update_dislikes()"> 
									<img src="../site_images/thumbDown.png" width="20px" hieght="20px" > DISLIKE </button>
							<label id="dislikes" style="color:#f00;"> </label>
							<div id="dislikes" > </div>
							</div>
							<script type="text/javascript">
							function update_dislikes() {

									var y = "<?php echo $product_id ?>";
									var x = {"type" : "2", "prod_id" : y };

 									$.ajax({
											url:"product_display_backend.php",
											data: x,
											type:"post",
											dataType:"html",
											success:function(result)
													{ 
														$("#dislikes").html(result);
													},

											error:function(e){alert("there was an error");}
										});
							}
							</script>

						</div>
				</div>
			
<!----  -->
			<div id="product_specs" style="min-width:300px;width:50%;float:left;height:500px;">
				
					<div id="description" style="width:100%;float:left;height:200px;"> 
						<p style="margin-left:10px;"> <?php echo "Description: ".$product_description ?> </p>
					</div>

					<div id="more_specs" style="width:100%;float:left;min-height:20px;">
						<p style="float:left;margin-left:10px;"> <?php echo "Size: ".$product_size ?> </p>
						<p style="float:left;margin-left:10px;"> <?php echo "Color: ".$product_color ?> </p>
						<p style="float:left;margin-left:10px;"> <?php echo "Material: ".$product_material ?> </p>
					</div>
				
					<div id="price" style="width:100%;float:left;"> 
						<p style="float:left;margin-left:10px;"> <?php echo "Price: ".$product_price ?> </p>
					</div>
		
			
<!----  -->
	</div>
			<!-- bottom contents-->
			<div style="height:50px;">
				<form style="float:right;">
				<input  type ="button" value="add to cart" id="add_label" onclick="add_to_cart(<?php echo $product_id?>)"/>
				</form>
			</div>
		
			<div id="footer">

			</div>

		</div>

	</div>

</div>

</body>


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<script type="text/javascript" src = "cart.js"></script>
<script type="text/javascript" src = "header.js"></script>
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


var y = "<?php echo $product_id ?>";
var x = {"type" : "3", "prod_id" : y };

$.ajax({
	url:"product_display_backend.php",
	data: x,
	type:"post",
	dataType:"html",
	success:function(result)
			{ 
				$("#likes").html(result);
			},

	error:function(e){alert("there was an error");}
});

var x = {"type" : "4", "prod_id" : y };

$.ajax({
	url:"product_display_backend.php",
	data: x,
	type:"post",
	dataType:"html",
	success:function(result)
			{ 
				$("#dislikes").html(result);
			},

	error:function(e){alert("there was an error");}
});

      
});
</script>

</html>
