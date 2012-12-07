<?php
include "../db/db.php";
session_start();
//session_unset();
$color = "none";
$selection = "none";
if(!empty($_POST['color']))
{
	$color = $_POST['color'];
}

if(!empty($_POST['sload']))
{
	$sload = $_POST['sload'];

      	if($sload == 'none')
	{
	      $_SESSION['store_id'] = add_store($_SESSION['user']);
	}
	else
	{
		$_SESSION['store_id'] = $sload;
	}
}

if(!empty($_POST['selection']))
{
	$selection = $_POST['selection'];
}

if(empty($_SESSION['user']))
{
      $_SESSION['user'] = "guest";
      $username = "guest";
      $_SESSION['cart'] = array();
}
else
{
      $username = $_SESSION['user'];
}

?>
<!doctype html>
 
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>The Jewelry Box</title>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css" />


    <style>
    .header{background-color:black;}
    .ui-tabs-vertical { width: 55em; }
    .ui-tabs-vertical .ui-tabs-nav { padding: .2em .1em .2em .2em; float: left; width: 12em; }
    .ui-tabs-vertical .ui-tabs-nav li { clear: left; width: 100%; border-bottom-width: 1px !important; border-right-width: 0 !important; margin: 0 -1px .2em 0; }
    .ui-tabs-vertical .ui-tabs-nav li a { display:block; }
    .ui-tabs-vertical .ui-tabs-nav li.ui-tabs-active { padding-bottom: 0; padding-right: .1em; border-right-width: 1px; border-right-width: 1px; }
    .ui-tabs-vertical .ui-tabs-panel { padding: 1em; float: right; width: 40em;}

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
<!-- north -->
<div class="header" style="width:100%;height:60px;">	

	<div style="color:white;width:50%;float:left;">
		<lable style="font-size:/30px;margin-top:5px;margin-left:20px;">The Jewelry Box</lable><br />
<lable style="color:#ccc;font-size:11px;margin-left:30px;">Hand Crafted Trinkets</lable>		
	</div>
	<div style="height:100%;width:50%;float:left">
        <form action="signin.php" method="POST">
	<button id="signin" style="width:70px;float:right;margin-right:10px;margin-top:10px;display:none;">Sign In</button>
        </form>
        <form action="signup.php" method="POST">
	<button id="signup" style="width:70px;float:right;margin-right:10px;margin-top:10px;display:none;">Sign Up</button>
        </form>
        <form action="logout.php" method="POST">
	<button id="logout" style="width:70px;float:right;margin-right:10px;margin-top:10px;display:none;">Logout</button>
        </form>
        <form action="stores.php" method="POST">
	<button id="stores" style="width:70px;float:right;margin-right:10px;margin-top:10px;display:none;">Stores</button>
        </form>
        <form action="cart.php" method="POST">
	<button id="cart" style="width:70px;float:right;margin-right:10px;margin-top:10px;display:none;">Cart</button>
        </form>
        <form action="aboutus.php" method="POST">
	<button id="aboutus" style="width:70px;float:right;margin-right:10px;margin-top:10px;display:none;">About Us</button>
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
<!-- north -->

</head>
<body>

<div class="sub" style="width:100%;height:100%;margin-top:5%;display:none;">
<button id="back">back</button>
<!--template1-->

<div class="template1" id="store_background" name=="store_background" style="width:100%;float:left;height:14%;display:none;">
<div id="banner" name="banner" style="width:80%;float:left;margin-left:10%;margin-top:2%;height:10%;"> 
<h1 id="store_name" name="store_name" align="center"> STORE NAME </h1>
</div>

<div id="store_foreground" name="store_foreground" style="width:80%;float:left;margin-top:5%;margin-bottom:5%;height:70%;margin-left:10%;">

<div id="store_category" name="store_category" style="float:left;width:100%;margin-left:3%;">
<button id="but1" name="but1" style="width:125px;float:left;margin-left:27px;margin-top:10px;margin-bottom:10px;">Category 1</button>
<button id="but2" name="but2" style="width:125px;float:left;margin-left:27px;margin-top:10px;margin-bottom:10px;">Category 2</button>
<button id="but3" name="but3" style="width:125px;float:left;margin-left:27px;margin-top:10px;margin-bottom:10px;">Category 3</button>
<button id="but4" name="but4" style="width:125px;float:left;margin-left:27px;margin-top:10px;margin-bottom:10px;">Category 4</button>
<button id="but5" name="but5" style="width:125px;float:left;margin-left:27px;margin-top:10px;margin-bottom:10px;">Category 5</button>
</div>
<div style="width:100%;float:left;">
<div id="about_store" name="about_store" style="float:left;width:25%;margin-left:3%;margin-top:5%;margin-bottom:5%;">
<h4 id="sownern" name="sownern"> Store Owner's Name </h4>
<h4 id="ssemail" name="ssemail"> Store Owner's Email </h4>
<h4 id="sspecialty" name="sspecialty"> Store Specialty </h4>
<p id="sdescription" name="sdescription"> Store description </p>
</div>

<div id="products" style="float:left;width:65%;margin-top:5%;margin-bottom:5%;">
<div style="float:left;width:160px;height:150px;border-style:dashed;margin-left:4%;margin-top:2%;margin-bottom:2%;">
pic1
</div>
<div style="float:left;width:160px;height:150px;border-style:dashed;margin-left:4%;margin-top:2%;margin-bottom:2%;">
pic2
</div>
<div style="float:left;width:160px;height:150px;border-style:dashed;margin-left:4%;margin-top:2%;margin-bottom:2%;">
pic3
</div>
<div style="float:left;width:160px;height:150px;border-style:dashed;margin-left:4%;margin-top:2%;margin-bottom:2%;">
pic4
</div>
<div style="float:left;width:160px;height:150px;border-style:dashed;margin-left:4%;margin-top:2%;margin-bottom:2%;">
pic5
</div>
<div style="float:left;width:160px;height:150px;border-style:dashed;margin-left:4%;margin-top:2%;margin-bottom:2%;">
pic6
</div>
<div style="float:left;width:160px;height:150px;border-style:dashed;margin-left:4%;margin-top:2%;margin-bottom:2%;">
pic7
</div>
<div style="float:left;width:160px;height:150px;border-style:dashed;margin-left:4%;margin-top:2%;margin-bottom:2%;">
pic8
</div>
<div style="float:left;width:160px;height:150px;border-style:dashed;margin-left:4%;margin-top:2%;margin-bottom:2%;">
pic9
</div>
<div style="float:left;width:160px;height:150px;border-style:dashed;margin-left:4%;margin-top:2%;margin-bottom:2%;">
pic10
</div>
<div style="float:left;width:160px;height:150px;border-style:dashed;margin-left:4%;margin-top:2%;margin-bottom:2%;">
pic11
</div>
<div style="float:left;width:160px;height:150px;border-style:dashed;margin-left:4%;margin-top:2%;margin-bottom:2%;">
pic12
</div>
<div style="float:left;width:160px;height:150px;border-style:dashed;margin-left:4%;margin-top:2%;margin-bottom:2%;">
pic13
</div>
<div style="float:left;width:160px;height:150px;border-style:dashed;margin-left:4%;margin-top:2%;margin-bottom:2%;">
pic14
</div>
<div style="float:left;width:160px;height:150px;border-style:dashed;margin-left:4%;margin-top:2%;margin-bottom:2%;">
pic15
</div>
</div>
</div>
</div>
</div>
</div>
<!-------------->

<!--div class="sub2" style="width:100%;height:100%;margin-top:5%;">
	<h1 style="margin-left:40%;">Select a Store</h1>
	<div style="margin-left:40%;">
	<input name="store" type="radio" style="margin-left:5%;" value="store0">Create a New Store</input></br>
	<input name="store" type="radio" style="margin-left:5%;"value="store1">Necklaces and More</input></br>
	</div>
</div>-->
<div id="main" class="content" style="width:100%;margin-top:5%;">
<div id="tabs">
    <ul>
        <li><a href="#tabs-1">Vendor Information</a></li>
        <li><a href="#tabs-2">Store Information</a></li>
        <li><a href="#tabs-3">Design Store</a></li>
        <li><a href="#tabs-4">Add Products to Store</a></li>
    </ul>
    <div id="tabs-1">
        <h2 style="margin-left:20%;">Vendor Information</h2>
	<button style="float:left;" class="template1">View Store</button>
<!-- Vendor info -->

<div id="sign-in-up" style="float:left;margin-left:5%;width:300px;border-style:solid;padding-top:10px;padding-left:30px;margin-bottom:20%;">	
<!--step 1-->
	<label class="step1" >Phone Number</label><br class="step1" style=""/>
	<input class="step1" id="phone_number" name="phone_number" type="text" style="width:90%;" value=""> <br class="step1" />

<!--step 2-->
        <label class="step2">Email</label><br class="step2"/>
	<input class="step2" id="semail" name="semail" type="text" style="width:90%;" value=""> <br class="step2"/>

<!--step 3
        <label class="step3" >Email for Customer Contact</label><br class="step3" />
	<input class="step3" id="cemail" name="cemail" type="text" style="width:90%;" value=""> <br class="step3"/>-->

<!--step 4-->
        <label class="step4" >Street Address</label><br class="step4" />
	<input class="step4" id="street_address" name="street_address" type="text" style="width:90%;" value=""> <br class="step4" />

<!--step 5-->
        <label class="step5" >City</label><br class="step5" />
	<input class="step5" id="city" name="city" type="text" style="width:90%;" value=""> <br class="step5" />

<!--step 6-->
        <label class="step6" >State</label><br class="step6" />
	<input class="step6" id="state" name="state" type="text" style="width:90%;" value=""> <br class="step6" />

<!--step 7-->
        <label class="step7" >Zip Code</label><br class="step7" />
	<input class="step7" id="zip" name="zip" type="text" style="width:90%;" value=""> <br class="step7" />
</br>
</br>

<!--save-->
<!--<button name="save_vinfo" id="save_vinfo" style="margin-left:5%;">save</button>-->
</div>
    </div>
    <div id="tabs-2">
        <h2 style="margin-left:20%;">Store Information</h2>
	<button style="float:left;" class="template1">View Store</button>
<!-- Store Info -->

<div id="sign-in-up" style="float:left;margin-left:5%;width:300px;border-style:solid;padding-top:10px;padding-left:30px;margin-bottom:20%;">
			
<!--step 1-->
	<label class="step1" >Store name</label><br class="step1" style=""/>
	<input class="step1" id="sname" name="sname" type="text" style="width:90%;" value=""> <br class="step1" />

<!--step 2-->
        <label class="step2">Store Owner</label><br class="step2"/>
	<input class="step2" id="owner" name="owner" type="text" style="width:90%;" value=""> <br class="step2"/>

<!--step 3-->
        <label class="step3" >Store Specialty</label><br class="step3" />
	<input class="step3" id="specialty" name="specialty" type="text" style="width:90%;" value=""> <br class="step3"/>

<!--step 4-->
        <label class="step4" >Store Description</label><br class="step4" />
	<textarea class="step4" id="description" name="description" type="text" style="width:90%;"></textarea><br class="step4" />

<!--step 5-->
        <label class="step5" >Cost of Shipping</label><br class="step5" />
	<input class="step5" id="shipping" name="shipping" type="text" style="width:90%;" value=""> <br class="step5" />
</br>
</br>

<!--save-->
<!--button name="save_sinfo" id="save_sinfo" style="margin-left:5%;">save</button>-->
</div>
    </div>
    <div id="tabs-3">
        <h2 style="margin-left:20%;">Design Your Store</h2>
	<button class="template1">View Store</button>
<div id="accordion">
    <h3>Choose Your Colors</h3>
    <div>
    <div style="width:100%;float:left;">
<div style="width:33%;float:left;">
	<form action="color.php" method="POST" >
	<button id="background_color" name="background_color" style="margin-left:5%;width:200px;">background</button>
	<input type="hidden" id="selection" name="selection" value="background_color"/>
	</form>
	<form action="color.php" method="POST" >
	<button id="foreground_color" name="foreground_color" style="margin-left:5%;width:200px;">foreground</button>
	<input type="hidden" id="selection" name="selection" value="foreground_color"/>
	</form>
</div>
<div style="width:33%;float:left;">
	<form action="color.php" method="POST" >
	<button id="banner_color" name="banner_color" style="margin-left:5%;width:200px;">banner</button>
	<input type="hidden" id="selection" name="selection" value="banner_color"/>
	</form>
	<form action="color.php" method="POST" >
	<button id="lfont_color" name="lfont_color" style="margin-left:5%;width:200px;">large font</button>
	<input type="hidden" id="selection" name="selection" value="lfont_color"/>
	</form>
	</form>
</div>
<div style="width:33%;float:left;">
	<form action="color.php" method="POST" >
	<button id="sfont_color" name="sfont_color" style="margin-left:5%;width:200px;">small font</button>
	<input type="hidden" id="selection" name="selection" value="sfont_color"/>
	</form>
</div>
</div>
	<!--borders header background foreground store_info banner font1 font 2 -->
    </div>
    <h3>Choose Your Banner Font</h3>
    <div>
	<div class="lfont">
	<h5>Select a banner font</h5>
	<input name="lfont" type="radio" style="margin-left:5%;" value="Calibri">Calibri</input>
	<input name="lfont" type="radio" style="margin-left:5%;"value="Courier">Courier</input>
	<input name="lfont" type="radio" style="margin-left:5%;"value="Comic_Sans">Comic Sans</input>
	<input name="lfont" type="radio" style="margin-left:5%;"value="Times_New_Roman">Times New Roman</input>
	<input name="lfont" type="radio" style="margin-left:5%;"value="Arial">Arial</input></br></br>
</br>
	<button name="save_lfont" id="save_lfont" style="margin-left:5%;">save</button>
	</div>
    </div>
    <h3>Choose Your Store Font</h3>
    <div>
	<div class="sfont">
	<h5>Select a store font</h5>
	<input name="sfont" type="radio" style="margin-left:5%;" value="Calibri">Calibri</input>
	<input name="sfont" type="radio" style="margin-left:5%;"value="Courier">Courier</input>
	<input name="sfont" type="radio" style="margin-left:5%;"value="Comic_Sans">Comic Sans</input>
	<input name="sfont" type="radio" style="margin-left:5%;"value="Times_New_Roman">Times New Roman</input>
	<input name="sfont" type="radio" style="margin-left:5%;"value="Arial">Arial</input></br></br>
</br>
	<button name="save_sfont" id="save_sfont" style="margin-left:5%;">save</button>
	</div>
    </div>
    <h3>Upload Pictures</h3>
    <div>
	<form action="file_upload.php" method="post"
	enctype="multipart/form-data">
	<label for="file"></label>
	<input type="file" name="file" id="file"><br>
	<input type="submit" name="submit" value="Submit">
	</form>

    </div>
    <h3>Choose Your Categories</h3>
    <div>
<!-- Store Info -->

<div id="sign-in-up" style="float:left;margin-left:19%;width:300px;border-style:solid;padding-top:10px;padding-left:30px;margin-bottom:20%;">
			
<!--step 1-->
	<label class="step1" >Category 1</label><br class="step1" style=""/>
	<input class="step1" id="cat1" name="cat1" type="text" style="width:90%;" value=""> <br class="step1" />

<!--step 2-->
        <label class="step2">Category 2</label><br class="step2"/>
	<input class="step2" id="cat2" name="cat2" type="text" style="width:90%;" value=""> <br class="step2"/>

<!--step 3-->
        <label class="step3" >Category 3</label><br class="step3" />
	<input class="step3" id="cat3" name="cat3" type="text" style="width:90%;" value=""> <br class="step3"/>

<!--step 4-->
        <label class="step4" >Category 4</label><br class="step4" />
	<input class="step4" id="cat4" name="cat4" type="text" style="width:90%;"></input><br class="step4" />

<!--step 5-->
        <label class="step5" >Category 5</label><br class="step5" />
	<input class="step5" id="cat5" name="cat5" type="text" style="width:90%;" value=""> <br class="step5" />
</br>
</br>
</div>	

    </div>
</div>
    </div>
    <div id="tabs-4">
        <h2 style="margin-left:20%;">Add Product to Store</h2>
		<div id="content">

		<form action="add_product_back.php" method="post" enctype="multipart/form-data">

		Product Name <label id="required"> *required </label> 
		<span id="name_error" class="error">(50 alpha-numeric characters or less)</span>
		<br /><input type="text" name="name" onblur="name_error_function()" id="name_input" /><br /><br />

		Product Description <label id="required"> *required</label>
 		<span id="desc_error" class="error"> (500 alpha-numeric characters or less)</span>
		<br /><textarea rows="10" cols="50" type="text" name="description"></textarea><br /><br />
		
		Size 
 		<span id="size_error" class="error"> (50 alpha-numeric characters or less)</span>
		<br /><input type="text" name="size" /><br /><br />

		Quantity <label id="required"> *required </label>
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

			<div id="material_options" style="float:left;width:20%;">
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

			<div id="category_options" style="float:left;width:24%;">
				<strong> Site Category </strong> <label id="required"> *required </label> 
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

			<div id="site_category" style="float:left;width:24%;">
				<strong>  Store Category </strong> <label id="required"> *required </label> 
				<ul style="list-style:none;">
				<li><input type="radio" name ="scat" value="cat1" />Category 1</li>
				<li><input type="radio" name ="scat" value="cat2" />Category 2</li>
				<li><input type="radio" name ="scat" value="cat3" />Category 3</li>
				<li><input type="radio" name ="scat" value="cat4" />Category 4</li>
				<li><input type="radio" name ="scat" value="cat5" />Category 5</li>
				</ul>
				<br />
				<br />
			</div>

			<div id="color_options" style="float:left;width:24%;">
				<strong style="margin-left:15px;"> Color </strong> <label id="required"> *required </label> 
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
    </div>
</div>
</div>


<!--<script src="jquery.backstretch.js"></script>
<script src="jquery.backstretch.min.js"></script>-->


<script type="text/javascript">
////*****************************************************////
$(document).ready(function(){

        var username = "<?php echo $username; ?>";
/////////////////////////////////////////////
	if(username == "guest")
	{
		$('#signin').show(); //
		$('#signup').show(); //
		$('#aboutus').show(); //
		$('#cart').show(); //
	}
	else
	{
		$('#stores').show(); //
		$('#logout').show(); //
		$('#cart').show(); //
		$('#aboutus').show(); //
	}
/////////////////////////////////////////////
        var sload = "<?php echo $sload; ?>";
//alert("hello "+sload);
/////////////////////////////////
	    var color = '<?php echo $color;?>';
	    var selection = '<?php echo $selection;?>';
	    if(color != "none")
	    {
		var postData0 = {'action': 'start', 'color': color, 'selection': selection};
	    }
	    else
	    {
            	var postData0 = {'action': 'start', 'color': color};
	    }
            $.ajax({
                type: "POST",
                data: postData0,
                url: "create_store_backend.php",                  //  
                success: function(data)          //on recieve of reply
        		{			
				//$('.content').show();
				if(data.error == "not logged in")
				{
					alert("Please login"+data.store_id);
				}
				if(data.error == "store load fail")
				{
					alert("store load failed");
				}
				if(data.error == "please signin to your account first if you do not have an account then signup for free.")
				{
					$('.content').hide();
					alert("please signin to your account first if you do not have an account then signup for free.");
					return;
				}
				if(data.username == "error")
				{
					alert("tis "+data);
				}
//alert("banner"+data.store.banner_color);

			if(data.store != 'none')
			{
				var store = data.store;
				if(data.store.banner_color != "none")
				{
					//alert('banner'+store.banner_color);
					$('#banner').css({backgroundColor:store.banner_color});
				}
				if(store.background_color != "none")
				{
					$('#store_background').css({backgroundColor:store.background_color});
				}
				if(data.store.foreground_color != "none")
				{
					$('#store_foreground').css({backgroundColor:store.foreground_color});
				}
				if(store.lfont_color != "none")
				{
					$('#store_name').css('color',store.lfont_color);

				}
				if(store.sfont_color != "none")
				{
					$('#sownern').css('color',store.sfont_color);
					$('#ssemail').css('color',store.sfont_color);
					$('#sspecialty').css('color',store.sfont_color);
					$('#sdescription').css('color',store.sfont_color);
				}

				if(store.img1 != "none")
				{
					//alert('hi');
					//$('#store_background').css("background-image", url("bg.jpg"));
//$('#banner').css("background-image", url("bg.jpg"));
//$('#store_foreground').css("background-image", "bg.jpg");
				}
				/*if(store.img2 != "none")
				{
					$('#store_foreground').backstretch("bg.jpg");
				}*/
				/*if(store.img3 != "none")
				{
					$('#banner').css("background-image", url("bg.jpg"));
				}*/
				if(store.specialty != "none")
				{
					$('#sspecialty').html(store.specialty);
				}
				if(store.sname != "none")
				{
					$('#store_name').html(store.sname);
				}
				if(store.description != "none")
				{
					$('#sdescription').html(store.description);
				}
				if(store.owner != "none")
				{
					$('#sownern').html(store.owner);
				}
				if(store.semail != "none")
				{
					$('#ssemail').html(store.semail);
				}
				if(store.lfont != "none")
				{
					if(store.lfont == "Calibri")
					{
						$('#store_name').css('font-family','Calibri');

					}
					else if(store.lfont == "Courier")
					{
						$('#store_name').css('font-family','Courier');

					}
					else if(store.lfont == "Comic_Sans")
					{
						$('#store_name').css('font-family','Comic Sans');

					}
					else if(store.lfont == "Times_New_Roman")
					{
						$('#store_name').css('font-family','Times New Roman');

					}
					else if(store.lfont == "Arial")
					{
						$('#store_name').css('font-family','Arial');

					}

				}
				if(store.sfont != "none")
				{
					if(store.sfont == "Calibri")
					{
						$('#sownern').css('font-family','Calibri');
						$('#ssemail').css('font-family','Calibri');
						$('#sspecialty').css('font-family','Calibri');
						$('#sdescription').css('font-family','Calibri');
					}
					else if(store.sfont == "Courier")
					{
						$('#sownern').css('font-family','Courier');
						$('#ssemail').css('font-family','Courier');
						$('#sspecialty').css('font-family','Courier');
						$('#sdescription').css('font-family','Courier');
					}
					if(store.sfont == "Comic_Sans")
					{
						$('#sownern').css('font-family','Comic Sans');
						$('#ssemail').css('font-family','Comic Sans');
						$('#sspecialty').css('font-family','Comic Sans');
						$('#sdescription').css('font-family','Comic Sans');
					}
					if(store.sfont == "Times_New_Roman")
					{
						$('#sownern').css('font-family','Times New Roman');
						$('#ssemail').css('font-family','Times New Roman');
						$('#sspecialty').css('font-family','Times New Roman');
						$('#sdescription').css('font-family','Times New Roman');
					}
					if(store.sfont == "Arial")
					{
						$('#sownern').css('font-family','Arial');
						$('#ssemail').css('font-family','Arial');
						$('#sspecialty').css('font-family','Arial');
						$('#sdescription').css('font-family','Arial');
					}
				}
			}
				

		

		
				if(color != "none" && color != "")
				{
					//alert(selection);
					if(selection == "banner_color")
					{
						$('#banner').css({backgroundColor:color});
						$('#banner_color').css({backgroundColor:color});
					}
					else if(selection == "background_color")
					{
						$('#store_background').css({backgroundColor:color});
						$('#background_color').css({backgroundColor:color});
					}
					else if(selection == "foreground_color")
					{
						$('#store_foreground').css({backgroundColor:color});
						$('#foreground_color').css({backgroundColor:color});
					}
					else if(selection == "sfont_color")
					{
						$('#sownern').css({color:color});
						$('#ssemail').css({color:color});
						$('#sspecialty').css({color:color});
						$('#sdescription').css({color:color});
						$('#sfont_color').css({backgroundColor:color});
					}
					else if(selection == "lfont_color")
					{
						$('#store_name').css({color:color});
						$('#lfont_color').css({backgroundColor:color});
					}


					$('.content').hide();
					$('.sub').show();
					$('.template1').show();
				}
				else
				{
					/*if()
					{
						$('.content').show();
						$('.sub2').hide();
					}
					else
					{
						$('.content').hide();
						$('.sub2').show();
					}*/
					$('.content').show();
					$('.sub2').hide();

					$('.sub').hide();
				}
                         },
                dataType: "json",
                error: function(data)          //on recieve of reply
                         {
                            alert("hello error");
                         }
        });
	$('.template1').click(function()
	{	
		$('.content').hide();
		$('.sub').show();
/////
				
		if($('#sname').val() != "")
		{
			$('#store_name').html($('#sname').val());
		}
		/*else
		{
			$('#store_name').html('STORE NAME');
		}*/
		if($('#semail').val() != "")
		{
			$('#ssemail').html($('#semail').val());
		}
		if($('#owner').val() != "")
		{
			$('#sownern').html($('#owner').val());
		}
		if($('#specialty').val() != "")
		{
			$('#sspecialty').html($('#specialty').val());
		}
		if($('#description').val() != "")
		{
			$('#sdescription').html($('#description').val());
		}

	
		$('.template1').show();
	});
	$('#back').click(function()
	{
		$('.content').show();
		$('.sub').hide();
	});
        $("#save_sfont").click(function () {
 		
		var font = $('input:radio[name=sfont]:checked').val();
		save_info('sfont', font);
        });
        $("#save_lfont").click(function () {
 		
		var font = $('input:radio[name=lfont]:checked').val();
		save_info('lfont', font);
        });
////////////////////////////////////////#1
	$('#phone_number').blur(function()
	{
		save_info('phone_number', $('#phone_number').val());
	});
////////////////////////////////////////
////////////////////////////////////////#2
	$('#semail').blur(function()
	{
		save_info('semail', $('#semail').val());
	});
////////////////////////////////////////
////////////////////////////////////////#3
	$('#street_address').blur(function()
	{
		save_info('street_address', $('#street_address').val());
	});
////////////////////////////////////////
////////////////////////////////////////#4
	$('#city').blur(function()
	{
		save_info('city', $('#city').val());
	});
////////////////////////////////////////
////////////////////////////////////////#5
	$('#state').blur(function()
	{
		save_info('state', $('#state').val());
	});
////////////////////////////////////////

////////////////////////////////////////#6
	$('#zip').blur(function()
	{
		save_info('zip', $('#zip').val());
	});
////////////////////////////////////////
////////////////////////////////////////#7
	$('#sname').blur(function()
	{
		save_info('sname', $('#sname').val());
	});
////////////////////////////////////////
////////////////////////////////////////#8
	$('#owner').blur(function()
	{
		save_info('owner', $('#owner').val());
	});
////////////////////////////////////////
////////////////////////////////////////#9
	$('#specialty').blur(function()
	{
		save_info('specialty', $('#specialty').val());
	});
////////////////////////////////////////
////////////////////////////////////////#10
	$('#description').blur(function()
	{
		save_info('description', $('#description').val());
	});
////////////////////////////////////////
////////////////////////////////////////#11
	$('#shipping').blur(function()
	{
		save_info('shipping', $('#shipping').val());
	});
////////////////////////////////////////
/*///////////////////////////////////////#12
	$('#').blur(function()
	{
		save_info('zip', $('#').val());
	});
///////////////////////////////////////*/
////////////////////////////////////////#13
	$('#cat1').blur(function()
	{
		save_info('cat1', $('#cat1').val());
	});
////////////////////////////////////////
////////////////////////////////////////#14
	$('#cat2').blur(function()
	{
		save_info('cat2', $('#cat2').val());
	});
////////////////////////////////////////
////////////////////////////////////////#15
	$('#cat3').blur(function()
	{
		save_info('cat3', $('#cat3').val());
	});
////////////////////////////////////////
////////////////////////////////////////#16
	$('#cat4').blur(function()
	{
		save_info('cat4', $('#cat4').val());
	});
////////////////////////////////////////
////////////////////////////////////////#17
	$('#cat5').blur(function()
	{
		save_info('cat5', $('#cat5').val());
	});
////////////////////////////////////////
});
	$(function() 
	{
		$( "#tabs" ).tabs().addClass( "ui-tabs-vertical ui-aboutuser-clearfix" );
		$( "#tabs li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
	});
	$(function() {
		$( "#accordion" ).accordion({
		    collapsible: true,
		    heightStyle: "content"
		});
	});

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

	function save_info(field, value)
	{
////////////////////////////////////////#17
		
	    var postData0 = {'action': 'save_info','field': field,'value': value};
	    $.ajax({
	        type: "POST",
	        data: postData0,
	        url: "create_store_backend.php",                  //  
	        success: function(data)          //on recieve of reply
			{			
				//alert("Saving...");
				if(data.error == 'error saving info')
				{
					alert("error saving info");
				}
				 
	                 },
	        dataType: "json",
	        error: function(data)          //on recieve of reply
	                 {
	                    alert("hello error");
	                 }
	   });
////////////////////////////////////////
	}

	
</script>
</body>
</html>



