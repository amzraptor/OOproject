<?php 
session_start();

echo '<!DOCTYPE html>
<html>
    <head>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
        <script type="text/javascript">
            $(function() {
				$(document).ready(function()
				{
					$("#price_down").click(function()
					{
					    $(".as_price").show();
					    $("#price_up").show();
					    $("#price_down").hide();
					});

					$("#price_up").click(function(){
					    $(".as_price").hide();
					    $("#price_down").show();
					    $("#price_up").hide();
					});

					$("#order_down").click(function()
					{
					    $(".as_order").show();
					    $("#order_up").show();
					    $("#order_down").hide();
					});

					$("#order_up").click(function(){
					    $(".as_order").hide();
					    $("#order_down").show();
					    $("#order_up").hide();
					});
	
					$("#material_down").click(function()
					{
					    $(".as_material").show();
					    $("#material_up").show();
					    $("#material_down").hide();
					});

					$("#material_up").click(function(){
					    $(".as_material").hide();
					    $("#material_down").show();
					    $("#material_up").hide();
					});

					$("#color_down").click(function()
					{
					    $(".as_color").show();
					    $("#color_up").show();
					    $("#color_down").hide();
					});

					$("#color_up").click(function(){
					    $(".as_color").hide();
					    $("#color_down").show();
					    $("#color_up").hide();
					});

					$("#category_down").click(function()
					{
					    $(".as_category").show();
					    $("#category_up").show();
					    $("#category_down").hide();
					});

					$("#category_up").click(function(){
					    $(".as_category").hide();
					    $("#category_down").show();
					    $("#category_up").hide();
					});
		
					$("#gender_down").click(function()
					{
					    $(".as_gender").show();
					    $("#gender_up").show();
					    $("#gender_down").hide();
					});

					$("#gender_up").click(function(){
					    $(".as_gender").hide();
					    $("#gender_down").show();
					    $("#gender_up").hide();
					});
		

				});
            });
        </script>	
    </head>
	<body id="body_background">
	<div id="body_background" style="width:100%;">';

// Use this if searching for product
$product_search_filter = '<div id="side_panel" style="width:20%;float:left;">
		      
			<ul id="as">
				<strong>
				<input id="price_down" type="image" style="height:10px;width:10px;"src="images/down.png" value=""/>
				<input id="price_up" type="image" style="height:10px;width:10px;display:none;"src="images/up.png" value=""/>
				<label style="font-size:20px;">Price</label>
				</strong><br />

				<ul class="as_price" style="display:none;">
					<li><input type="checkbox" name ="price[]" value="0-10" /><label>$0 - $10</label></li>
					<li><input type="checkbox" name ="price[]" value="10-20" /><label>$10 - $20</label></li>
					<li><input type="checkbox" name ="price[]" value="20-50" /><label>$20 - $50</label></li>
					<li><input type="checkbox" name ="price[]" value="50-100" /><label>$50 - $100</label></li>
					<li><input type="checkbox" name ="price[]" value="100-500" /><label>$100 - $500</label></li>
					<li><input type="checkbox" name ="price[]" value="500-1000" /><label>$500 - $1000</label></li>
					<li><input type="checkbox" name ="price[]" value="1000-5000" /><label>$1000 - $5000</label></li>
					<li><input type="checkbox" name ="price[]" value="5000+" /><label>$5000+</label></li>
				</ul>
	
				<strong>
				<input id="order_down" type="image" style="height:10px;width:10px;"src="images/down.png" value=""/>
				<input id="order_up" type="image" style="height:10px;width:10px;display:none;"src="images/up.png" value=""/>
				<label style="font-size:20px;">Order</label>
				</strong><br />

				<ul class="as_order" style="display:none;">
					<li><input type="radio" name ="price_order[]" value="highestfirst" /><label>Highest to Lowest</label></li>
					<li><input type="radio" name ="price_order[]" value="lowestfirst" /><label>Lowest to Highest</label></li>
				</ul>

				<strong>
				<input id="material_down" type="image" style="height:10px;width:10px;"src="images/down.png" value=""/>
				<input id="material_up" type="image" style="height:10px;width:10px;display:none;"src="images/up.png" value=""/>
				<label style="font-size:20px;">Material</label>
				</strong><br />

				<ul class="as_material" style="display:none;">
					<li><input type="checkbox" name ="material[]" value="gold" /><label>Gold</label></li>
					<li><input type="checkbox" name ="material[]" value="silver" /><label>Silver</label></li>
					<li><input type="checkbox" name ="material[]" value="bronze" /><label>Bronze</label></li>
					<li><input type="checkbox" name ="material[]" value="brass" /><label>Brass</label></li>
					<li><input type="checkbox" name ="material[]" value="wood" /><label>Wood</label></li>
					<li><input type="checkbox" name ="material[]" value="copper" /><label>Copper</label></li>
					<li><input type="checkbox" name ="material[]" value="aluminum" /><label>Aluminum</label></li>
					<li><input type="checkbox" name ="material[]" value="other" /><label>Other</label></li>
				</ul>
				<strong>
				<input id="color_down" type="image" style="height:10px;width:10px;"src="images/down.png" value=""/>
				<input id="color_up" type="image" style="height:10px;width:10px;display:none;"src="images/up.png" value=""/>
				<label style="font-size:20px;">Color</label>
				</strong><br />

				<ul class="as_color" style="display:none;">
					<li><input type="checkbox" name ="color[]" value="gold" /><label>Gold</label></li>
					<li><input type="checkbox" name ="color[]" value="black" /><label>Black</label></li>
					<li><input type="checkbox" name ="color[]" value="white" /><label>White</label></li>
					<li><input type="checkbox" name ="color[]" value="silver" /><label>Silver</label></li>
					<li><input type="checkbox" name ="color[]" value="bronze" /><label>Bronze</label></li>
					<li><input type="checkbox" name ="color[]" value="red" /><label>Red</label></li>
					<li><input type="checkbox" name ="color[]" value="green" /><label>Gren</label></li>
					<li><input type="checkbox" name ="color[]" value="blue" /><label>Blue</label></li>
					<li><input type="checkbox" name ="color[]" value="brown" /><label>Brown</label></li>
					<li><input type="checkbox" name ="color[]" value="orange" /><label>Orange</label></li>
					<li><input type="checkbox" name ="color[]" value="purple" /><label>Purple</label></li>
					<li><input type="checkbox" name ="color[]" value="other" /><label>Other</label></li>
				</ul>
				<strong>
				<input id="category_down" type="image" style="height:10px;width:10px;"src="images/down.png" value=""/>
				<input id="category_up" type="image" style="height:10px;width:10px;display:none;"src="images/up.png" value=""/>
				<label style="font-size:20px;">Category</label>
				</strong><br />

				<ul class="as_category" style="display:none;">
					<li><input type="checkbox" name ="category[]" value="wedding" /><label>Wedding</label></li>
					<li><input type="checkbox" name ="category[]" value="rings" /><label>Rings</label></li>
					<li><input type="checkbox" name ="category[]" value="bracelets" /><label>Bracelets</label></li>
					<li><input type="checkbox" name ="category[]" value="earrings" /><label>Earrings</label></li>
					<li><input type="checkbox" name ="category[]" value="necklaces" /><label>Necklaces</label></li>
					<li><input type="checkbox" name ="category[]" value="brooches" /><label>Brooches</label></li>
					<li><input type="checkbox" name ="category[]" value="body jewelry" /><label>Body Jewelry</label></li>
					<li><input type="checkbox" name ="category[]" value="belt buckles" /><label>Belt Buckles</label></li>
					<li><input type="checkbox" name ="category[]" value="charms" /><label>Charms</label></li>
					<li><input type="checkbox" name ="category[]" value="watch bands" /><label>Watch Bands</label></li>
					<li><input type="checkbox" name ="category[]" value="children" /><label>Children</label></li>	
					<li><input type="checkbox" name ="category[]" value="jewelry boxes" /><label>Jewelry Boxes</label></li>
					<li><input type="checkbox" name ="category[]" value="other" /><label>Other</label></li>
				</ul>
				<strong>
				<input id="gender_down" type="image" style="height:10px;width:10px;"src="images/down.png" value=""/>
				<input id="gender_up" type="image" style="height:10px;width:10px;display:none;"src="images/up.png" value=""/>
				<label style="font-size:20px;">Gender</label></strong><br />

				<ul class="as_gender" style="display:none;">
					<li><input type="checkbox" name ="gender[]" value="male" /><label>Male</label></li>
					<li><input type="checkbox" name ="gender[]" value="female" /><label>Female</label></li>
					<li><input type="checkbox" name ="gender[]" value="unisex" /><label>Unisex</label></li>
				</ul>
			</ul>

 			<form method="post" onsubmit="return price_adjust();">
			<input type="submit" name="filter_submit" value="filter" style="margin:10px;"/>
			
		        </form></div>';

$store_search_filter = '<div id="side_panel" style="width:20%;height:100%;float:left;"> Filter by Store popularity</div>';

if($_POST["search_type"] == "bystore")
{ 
	echo $store_search_filter;
}
else
{
	echo $product_search_filter;
}

echo '<div style="width:70%;float:right;">';

// BASIC SEARCH RESULT		
function search_page()
{
	$db = new mysqli('localhost', 'root', 'root', 'jewelry_box');
	if(!$db) { echo "could not connect to the database"; } 

	if(isset($_POST['inputString']))
	{
		$queryString = $db->real_escape_string($_POST['inputString']);

		if(strlen($queryString) > 0) 
		{
			$search_type = $_POST["search_type"];
			$search = $_POST["search"];
			$gender_search = $_POST["gender"];

			for ($i = 0; $i < 10;$i++)
			{	
				echo $search[$i], " ";
			}				
			echo "<br/>";
			$category_checks = count($search); 
			$gender_checks = count($gender_search);

		
			if ($search_type == "bystore")
			{
				$sql_query = "SELECT store_name FROM STORE WHERE store_name LIKE '%".$queryString."%'";
			}
			else	//if ($search_type == "byproduct")
			{

				$sql_query = "SELECT product_img1, product_name, product_price FROM PRODUCT WHERE product_name LIKE '%".$queryString."%'";

				if ($category_checks >= 1) $sql_query .= " AND ";
				for ($i = 0; $i < $category_checks;$i++)
				{
					$sql_query .= "product_category = " ."'".$search[$i]."'";
					if ($i != $category_checks - 1) $sql_query .= " AND ";	
				}

				if ($gender_checks >= 1) $sql_query .= " AND ";
				for ($i = 0; $i < $gender_checks;$i++)
				{
					$sql_query .= "product_gender = " ."'".$gender_search[$i]."'";
					if ($i != $gender_checks - 1) $sql_query .= " AND ";	
				}
	
			}

			$query = $db->query($sql_query);
			if($query) 
			{
				if ($search_type == "bystore")
				{
					while ($result = $query ->fetch_object()) 
					{
						$query_store_result .= '<div id="store_window" style="
							background-color:red;width:100px;height:160px;margin:10px;float:left;">
							<p onClick="fill(\''.$result->store_name.'\');
							"><b>'.$result->store_name.'</b></p></div>';
					}

					mysql_close($db);
					return $query_store_result;
				}
				else
				{
					while ($result = $query ->fetch_object()) 
					{
					
						$query_product_result .= '<div id="store_window" style="
							background-color:blue;width:200px;height:200px;margin:10px;float:left;">

							<img border="00" src="'.$result->product_img1.'" width="200" height="160" />
							<b>'.$result->product_name.'</b><br >'
							.$result->product_price.'
							</div>';

							//echo "<br />IN RESULT: ",$result->product_img1;
					}
					mysql_close($db);
					return $query_product_result;
				}

			}
			else 
			{
				echo "there was a problem with the query";
			}
		}
		else 
		{

		}
	}
	else 
	{
		echo "no";
	}

	mysql_close($db);

}

// Database Stuff to handle price adjustment request
function price_adjust()
{
	$db = new mysqli('localhost', 'root', 'root', 'jewelry_box');
	if(!$db) { echo "could not connect to the database"; } 

	$price = $_POST["price"];
	$price_order = $_POST["price_order"];

	$price_checks = count($price); 
	$result_of_search = search_page();

	if ($price_order == "lowestfirst") $result_of_search .= " ORDER BY product_price ASC";
	if ($price_order == "highestfirst") $result_of_search .= " ORDER BY product_price DESC";

	mysql_close($db);
	echo "<br> QUERY PRODUCT RESULT ",$result_of_search;
}

function advanced_search()
{
	$db = new mysqli('localhost', 'root', 'root', 'jewelry_box');
	if(!$db) { echo "could not connect to the database"; } 
	
	$price_options = $_POST['price'];
	$order_options = $_POST['price_order'];
	$material_options = $_POST['material'];
	$color_options = $_POST['color'];
	$category_options = $_POST['category'];
	
	// get query from sessions
	$queryString = $db->real_escape_string($_POST['inputString']);
	
	if(strlen($queryString) > 0) 
	{
			
	}

	mysql_close($db);
}

if(isset($_POST['search_submit']))
{
	echo search_page();
}


echo '</div></div></body></html>';

?>
