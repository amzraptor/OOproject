<!doctype html>
<html>

<head>

<style>
body {
	background-color: #ccc;
	margin: 0;
}
#header {
	background-color:#eee;
	margin-bottom: 36px;
}
#contents {
	margin: 0 0 60px;
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
#footer {
	background-color: #eee;
	background-position: 0 -57px;
	width: 100%;
	position: absolute;
	left: 0;
}

#required {

font-size:12px;
color:red;

}

#notrequired {

font-size:12px;

}

.error {
display:none;
font-size:12px;
color:red;
}

</style>

<script type="text/javascript">

		var prod_name = document.getElementsByName("name");
		var prod_desc = document.getElementsByName("description");
		var prod_size = document.getElementsByName("size");
		var prod_qty = document.getElementsByName("quantity");
		var prod_price = document.getElementsByName("price");
		var prod_img = document.getElementsByName("image");
		var prod_mat = document.getElementsByName("material");
		var prod_cat = document.getElementsByName("category");
		var prod_col = document.getElementsByName("color");
		var prod_gen = document.getElementsByName("gender");


	function name_error_function()
	{
		
		// name
		var name_match = true;
		var name_length = true;
		var name_pattern = /[a-zA-Z0-9' .]+/i;
		var test_name = prod_name[0].value;
		if(prod_name[0].value != test_name.match(name_pattern)) name_match = false;
		if(prod_name[0].value.length > 50 || prod_name[0].value == "") name_length = false;

		if(name_length == 0 || name_match == 0) 
		{
			/*$("#name_error.error").show();*/
			document.getElementById("name_error").style.display = "block";
		}
		else  
		{
			document.getElementById("name_error").style.display = "none";
		}

	}

	
</script>

</head>

<body>
<div id="background">
<div id="header">
			header
		</div>

	<div id="page">

		<div id="content">

		<form action="add_product_back.php" method="post" enctype="multipart/form-data">

		Name <label id="required"> *required </label> 
		<span id="name_error" class="error">(50 alpha-numeric characters or less)</span>
		<br /><input type="text" name="name" onblur="name_error_function()" id="name_input" /><br /><br />

		Description <label id="required"> *required</label>
 		<span id="desc_error" class="error"> (500 alpha-numeric characters or less)</span>
		<br /><textarea rows="10" cols="100" type="text" name="description"></textarea><br /><br />
		
		Size 
 		<span id="size_error" class="error"> (50 alpha-numeric characters or less)</span>
		<br /><input type="text" name="size" /><br /><br />

		Qty <label id="required"> *required </label>
 		<span id="qty_error" class="error">  (9 numbers or less)</span> 
		<br /><input type="text" name="quantity" /><br /><br />

		Price <label id="required"> *required</label>  
 		<span id="price_error" class="error">(number with two decimal places e.i. 1234.56)</span> 
		<br /><input type="text" name="price" /><br /><br />
	
		<div id="radiobutton_error"></div>

		Gender <label id="required"> *required </label>  <br />
		<input type="radio" name="gender" value="male">Male
		<input type="radio" name="gender" value="female">Female
		<input type="radio" name="gender" value="unisex">Unisex
		<br />
		<br />

		<label for="file">Image</label><label id="required"> *required </label> <br />
			<input type="file" name="file" id="file"><br>
		<br />
		
		<div id="add_options" style="width:100%;min-height:350px;">

			<div id="material_options" style="float:left;width:33%;">
				<strong> Material </strong> <label id="required"> *required </label> 
				<ul style="list-style:none;">
				<li><input type="radio" name ="material" value="gold" />Gold</li>
				<li><input type="radio" name ="material" value="silver" />Silver</li>
				<li><input type="radio" name ="material" value="bronze" />Bronze</li>
				<li><input type="radio" name ="material" value="brass" />Brass</li>
				<li><input type="radio" name ="material" value="wood" />Wood</li>
				<li><input type="radio" name ="material" value="copper" />Copper</li>
				<li><input type="radio" name ="material" value="aluminum" />Aluminum</li>
				<li><input type="radio" name ="material" value="other" />Other</li>
				</ul>
				<br />
				<br />
			</div>

			<div id="category_options" style="float:left;width:33%;">
				<strong> Category </strong> <label id="required"> *required </label> 
				<ul style="list-style:none;">
				<li><input type="radio" name ="category" value="wedding" /><label for="Wedding">Wedding</label></li>
				<li><input type="radio" name ="category" value="rings" /><label for="Rings">Rings</label></li>
				<li><input type="radio" name ="category" value="bracelets" /><label for="Bracelets">Bracelets</label></li>
				<li><input type="radio" name ="category" value="earrings" /><label for="Earrings">Earrings</label></li>
				<li><input type="radio" name ="category" value="necklaces" /><label for="Necklaces">Necklaces</label></li>
				<li><input type="radio" name ="category" value="brooches" /><label for="Brooches">Brooches</label></li>
				<li><input type="radio" name ="category" value="body jewelry" /><label for="body jewelry">Body Jewelry</label></li>
				<li><input type="radio" name ="category" value="belt buckles" /><label for="belt buckles">Belt Buckles</label></li>
				<li><input type="radio" name ="category" value="charms" /><label for="charms">Charms</label></li>
				<li><input type="radio" name ="category" value="watch bands" /><label for="watch bands">Watch Bands</label></li>
				<li><input type="radio" name ="category" value="children" /><label for="Children">Children</label></li>
				<li><input type="radio" name ="category" value="jewelry boxes" /><label for="jewelry boxes">Jewelry Boxes</label></li>
				<li><input type="radio" name ="category" value="other" /><label for="Other">Other</label></li>
				</ul>
				<br />
				<br />
			</div>

			<div id="color_options" style="float:left;width:33%;">
				<strong> Color </strong> <label id="required"> *required </label> 
				<ul style="list-style:none;">
				<li><input type="radio" name ="color" value="black" />Black</li>
				<li><input type="radio" name ="color" value="white" />White</li>
				<li><input type="radio" name ="color" value="red" />Red</li>
				<li><input type="radio" name ="color" value="green" />Green</li>
				<li><input type="radio" name ="color" value="blue" />Blue</li>
				<li><input type="radio" name ="color" value="yellow" />Yellow</li>
				<li><input type="radio" name ="color" value="gold" />Gold</li>
				<li><input type="radio" name ="color" value="bronze" />Bronze</li>
				<li><input type="radio" name ="color" value="silver" />Silver</li>
				<li><input type="radio" name ="color" value="purple" />Purple</li>
				<li><input type="radio" name ="color" value="other" />Other</li>
				</ul>
				<br />
				<br />
			</div>
		</div>

		<br />

		<input type="submit" name="submit" value="add">
		</form>
		<br />
		</div>

		<div id="footer">
		footer
		</div>
	</div>
</div>

</body>

</html>
