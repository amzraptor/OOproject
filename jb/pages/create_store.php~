<?php
session_start();
//session_unset();
$color = "none";
$selection = "none";
if(!empty($_POST['color']))
{
	$color = $_POST['color'];
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
        <form action="help.php" method="POST">
	<button id="help" style="width:70px;float:right;margin-right:10px;margin-top:10px;display:none;">Help</button>
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
<p id="sbio" name="sbio"> Store Bio </p>
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


<div id="main" class="content" style="width:100%;margin-top:5%;">
<div id="tabs">
    <ul>
        <li><a href="#tabs-1">Vendor Information</a></li>
        <li><a href="#tabs-3">Store Information</a></li>
        <li><a href="#tabs-4">Design Store</a></li>
    </ul>
    <div id="tabs-1">
        <h2 style="margin-left:20%;">Vendor Information</h2>
<!-- Vendor info -->

<div id="sign-in-up" style="float:left;margin-left:19%;width:300px;border-style:solid;padding-top:10px;padding-left:30px;margin-bottom:20%;">	
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

<!--save-->
<!--<button name="save_vinfo" id="save_vinfo" style="margin-left:5%;">save</button>-->
</div>
    </div>
    <div id="tabs-3">
        <h2 style="margin-left:20%;">Store Information</h2>
<!-- Store Info -->

<div id="sign-in-up" style="float:left;margin-left:19%;width:300px;border-style:solid;padding-top:10px;padding-left:30px;margin-bottom:20%;">
			
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
        <label class="step4" >Store Biography</label><br class="step4" />
	<textarea class="step4" id="bio" name="bio" type="text" style="width:90%;"></textarea><br class="step4" />

<!--step 5-->
        <label class="step5" >Cost of Shipping</label><br class="step5" />
	<input class="step5" id="shipping" name="shipping" type="text" style="width:90%;" value=""> <br class="step5" />

<!--save-->
<!--button name="save_sinfo" id="save_sinfo" style="margin-left:5%;">save</button>-->
</div>
    </div>
    <div id="tabs-4">
        <h2 style="margin-left:20%;">Design Your Store</h2>
	<button id="template1">View Store</button>
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
    <h3>Choose Your Font</h3>
    <div>
	<div class="lfont">
	<h5>Select a large font</h5>
	<input name="lfont" type="radio" style="margin-left:5%;" value="times">times</input>
	<input name="lfont" type="radio" style="margin-left:5%;"value="fancy">fancy</input>
	<input name="lfont" type="radio" style="margin-left:5%;"value="block">block</input>
	<input name="lfont" type="radio" style="margin-left:5%;"value="elegant">elegant</input>
	<input name="lfont" type="radio" style="margin-left:5%;"value="sharp">sharp</input></br></br>
	<button name="save_lfont" id="save_lfont" style="margin-left:5%;">save</button>
	</div>
	<div class="sfont" style="display:none;">
	<h5>Select a small font</h5>
	<input name="sfont" type="radio" style="margin-left:5%;" value="plain">plain</input>
	<input name="sfont" type="radio" style="margin-left:5%;"value="fancy">fancy</input>
	<input name="sfont" type="radio" style="margin-left:5%;"value="block">block</input>
	<input name="sfont" type="radio" style="margin-left:5%;"value="elegant">elegant</input>
	<input name="sfont" type="radio" style="margin-left:5%;"value="sharp">sharp</input></br></br>
	<button name="save_sfont" id="save_sfont" style="margin-left:5%;">save</button>
	</div>
    </div>
    <h3>Upload Pictures</h3>
    <div>pictures
	<!-- banner background author_pic-->
    </div>
</div>
    </div>

</div>
</div>

<script type="text/javascript">
////*****************************************************////
		/*$('#banner').css({border:'solid'});
		$('#banner').css({backgroundColor:'red'});

		$('#store_background').css({backgroundColor:'red'});

		$('#store_center').css({border:'solid'});
		$('#store_name').css({color:'red'});

		$('#store_category').css({border:'solid'});
		$('#but1').css({backgroundColor:'red'});

		$('#about_store').css({border:'solid'});
		$('#banner').css({backgroundColor:'red'});

		$('#sownern').css({color:'green'});
		$('#scemail').css({color:'red'});	

		$('#sspecialty').css({color:'green'});
		$('#sbio').css({color:'red'});

		$('#products').css({color:'green'});*/

/////
$(document).ready(function(){
//alert("hello ");
        var username = "<?php echo $username; ?>";
/////////////////////////////////////////////
	if(username == "guest")
	{
		$('#signin').show(); //
		$('#signup').show(); //
		$('#help').show(); //
		$('#cart').show(); //
	}
	else
	{
		$('#stores').show(); //
		$('#logout').show(); //
		$('#cart').show(); //
		$('#help').show(); //
	}
/////////////////////////////////////////////
	    var color = '<?php echo $color;?>';
	    var selection = '<?php echo $selection;?>';
	    var store = '<?php echo $store;?>';
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
				if(data.store_foreground_color != "none")
				{
					$('#store_foreground').css({backgroundColor:store.foreground});
				}
				if(store.lfont_color != "none")
				{
					$('#store_name').css({color:store.lfont_color});

				}
				if(store.sfont_color != "none")
				{
					$('#sownern').css({color:store.sfont_color});
					$('#ssemail').css({color:store.sfont_color});
					$('#sspecialty').css({color:store.sfont_color});
					$('#sbio').css({color:store.sfont_color});
				}

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
					$('#sbio').html(store.description);
				}
				if(store.owner != "none")
				{
					$('#sownern').html(store.owner);
				}
				if(store.semail != "none")
				{
					$('#ssemail').html(store.semail);
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
						$('#foreground').css({backgroundColor:color});
					}
					else if(selection == "sfont_color")
					{
						$('#sownern').css({color:color});
						$('#ssemail').css({color:color});
						$('#sspecialty').css({color:color});
						$('#sbio').css({color:color});
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
					$('.content').show();
					$('.sub').hide();
				}
                         },
                dataType: "json",
                error: function(data)          //on recieve of reply
                         {
                            alert("hello error");
                         }
        });
	$('#template1').click(function()
	{	
		$('.content').hide();
		$('.sub').show();
/////
				
		if($('#sname').val() != "")
		{
			$('#store_name').html($('#sname').val());
		}
		else
		{
			$('#store_name').html('STORE NAME');
		}
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
		if($('#bio').val() != "")
		{
			$('#sbio').html($('#bio').val());
		}

	
		$('.template1').show();
	});
	$('#back').click(function()
	{
		$('.content').show();
		$('.sub').hide();
	});
        $("#save_lfont").click(function () {
 
	        alert($('input:radio[name=lfont]:checked').val());
		$('.lfont').hide();
		$('.sfont').show();
		//ajax call store
 
        });
        $("#save_sfont").click(function () {
 
	        alert($('input:radio[name=sfont]:checked').val());
		//ajax call store
 
        });
////////////////////////////////////////#1
	$('#phone_number').blur(function()
	{
var postData0 = {'action': 'save_info','field': 'phone_number','value': $('#phone_number').val()};
            $.ajax({
                type: "POST",
                data: postData0,
                url: "create_store_backend.php",                  //  
                success: function(data)          //on recieve of reply
        		{			
				alert("Saving...");
				if(data.error == 'error saving info')
				{
					alert("error saving info");
				}
				else
				{
					alert("Your data has been saved.");
				}
                         },
                dataType: "json",
                error: function(data)          //on recieve of reply
                         {
                            alert("hello error");
                         }
           });
	});
////////////////////////////////////////
////////////////////////////////////////#2
	$('#semail').blur(function()
	{
var postData0 = {'action': 'save_info','field': 'semail','value': $('#semail').val()};
            $.ajax({
                type: "POST",
                data: postData0,
                url: "create_store_backend.php",                  //  
                success: function(data)          //on recieve of reply
        		{			
				alert("Saving...");
				if(data.error == 'error saving info')
				{
					alert("error saving info");
				}
				else
				{
					alert("Your data has been saved.");
				}
                         },
                dataType: "json",
                error: function(data)          //on recieve of reply
                         {
                            alert("hello error");
                         }
           });
	});
////////////////////////////////////////
////////////////////////////////////////#3
	$('#street_address').blur(function()
	{
var postData0 = {'action': 'save_info','field': 'street_address','value': $('#street_address').val()};
            $.ajax({
                type: "POST",
                data: postData0,
                url: "create_store_backend.php",                  //  
                success: function(data)          //on recieve of reply
        		{			
				alert("Saving...");
				if(data.error == 'error saving info')
				{
					alert("error saving info");
				}
				else
				{
					alert("Your data has been saved.");
				}
                         },
                dataType: "json",
                error: function(data)          //on recieve of reply
                         {
                            alert("hello error");
                         }
           });
	});
////////////////////////////////////////
////////////////////////////////////////#4
	$('#city').blur(function()
	{
var postData0 = {'action': 'save_info','field': 'city','value': $('#city').val()};
            $.ajax({
                type: "POST",
                data: postData0,
                url: "create_store_backend.php",                  //  
                success: function(data)          //on recieve of reply
        		{			
				alert("Saving...");
				if(data.error == 'error saving info')
				{
					alert("error saving info");
				}
				else
				{
					alert("Your data has been saved.");
				}
                         },
                dataType: "json",
                error: function(data)          //on recieve of reply
                         {
                            alert("hello error");
                         }
           });
	});
////////////////////////////////////////
////////////////////////////////////////#5
	$('#state').blur(function()
	{
var postData0 = {'action': 'save_info','field': 'state','value': $('#state').val()};
            $.ajax({
                type: "POST",
                data: postData0,
                url: "create_store_backend.php",                  //  
                success: function(data)          //on recieve of reply
        		{			
				alert("Saving...");
				if(data.error == 'error saving info')
				{
					alert("error saving info");
				}
				else
				{
					alert("Your data has been saved.");
				}
                         },
                dataType: "json",
                error: function(data)          //on recieve of reply
                         {
                            alert("hello error");
                         }
           });
	});
////////////////////////////////////////

////////////////////////////////////////#6
	$('#zip').blur(function()
	{
var postData0 = {'action': 'save_info','field': 'zip','value': $('#zip').val()};
            $.ajax({
                type: "POST",
                data: postData0,
                url: "create_store_backend.php",                  //  
                success: function(data)          //on recieve of reply
        		{			
				alert("Saving...");
				if(data.error == 'error saving info')
				{
					alert("error saving info");
				}
				else
				{
					alert("Your data has been saved.");
				}
                         },
                dataType: "json",
                error: function(data)          //on recieve of reply
                         {
                            alert("hello error");
                         }
           });
	});
////////////////////////////////////////
////////////////////////////////////////#7
	$('#sname').blur(function()
	{
var postData0 = {'action': 'save_info','field': 'sname','value': $('#sname').val()};
            $.ajax({
                type: "POST",
                data: postData0,
                url: "create_store_backend.php",                  //  
                success: function(data)          //on recieve of reply
        		{			
				alert("Saving...");
				if(data.error == 'error saving info')
				{
					alert("error saving info");
				}
				else
				{
					alert("Your data has been saved.");
				}
                         },
                dataType: "json",
                error: function(data)          //on recieve of reply
                         {
                            alert("hello error");
                         }
           });
	});
////////////////////////////////////////
////////////////////////////////////////#8
	$('#owner').blur(function()
	{
var postData0 = {'action': 'save_info','field': 'owner','value': $('#owner').val()};
            $.ajax({
                type: "POST",
                data: postData0,
                url: "create_store_backend.php",                  //  
                success: function(data)          //on recieve of reply
        		{			
				alert("Saving...");
				if(data.error == 'error saving info')
				{
					alert("error saving info");
				}
				else
				{
					alert("Your data has been saved.");
				}
                         },
                dataType: "json",
                error: function(data)          //on recieve of reply
                         {
                            alert("hello error");
                         }
           });
	});
////////////////////////////////////////
////////////////////////////////////////#9
	$('#specialty').blur(function()
	{
var postData0 = {'action': 'save_info','field': 'specialty','value': $('#specialty').val()};
            $.ajax({
                type: "POST",
                data: postData0,
                url: "create_store_backend.php",                  //  
                success: function(data)          //on recieve of reply
        		{			
				alert("Saving...");
				if(data.error == 'error saving info')
				{
					alert("error saving info");
				}
				else
				{
					alert("Your data has been saved.");
				}
                         },
                dataType: "json",
                error: function(data)          //on recieve of reply
                         {
                            alert("hello error");
                         }
           });
	});
////////////////////////////////////////
////////////////////////////////////////#10
	$('#bio').blur(function()
	{
var postData0 = {'action': 'save_info','field': 'bio','value': $('#bio').val()};
            $.ajax({
                type: "POST",
                data: postData0,
                url: "create_store_backend.php",                  //  
                success: function(data)          //on recieve of reply
        		{			
				alert("Saving...");
				if(data.error == 'error saving info')
				{
					alert("error saving info");
				}
				else
				{
					alert("Your data has been saved.");
				}
                         },
                dataType: "json",
                error: function(data)          //on recieve of reply
                         {
                            alert("hello error");
                         }
           });
	});
////////////////////////////////////////
////////////////////////////////////////#11
	$('#shipping').blur(function()
	{
var postData0 = {'action': 'save_info','field': 'shipping','value': $('#shipping').val()};
            $.ajax({
                type: "POST",
                data: postData0,
                url: "create_store_backend.php",                  //  
                success: function(data)          //on recieve of reply
        		{			
				alert("Saving...");
				if(data.error == 'error saving info')
				{
					alert("error saving info");
				}
				else
				{
					alert("Your data has been saved.");
				}
                         },
                dataType: "json",
                error: function(data)          //on recieve of reply
                         {
                            alert("hello error");
                         }
           });
	});
////////////////////////////////////////
////////////////////////////////////////#12
	$('#zip').blur(function()
	{
var postData0 = {'action': 'save_info','field': 'zip','value': $('#zip').val()};
            $.ajax({
                type: "POST",
                data: postData0,
                url: "create_store_backend.php",                  //  
                success: function(data)          //on recieve of reply
        		{			
				alert("Saving...");
				if(data.error == 'error saving info')
				{
					alert("error saving info");
				}
				else
				{
					alert("Your data has been saved.");
				}
                         },
                dataType: "json",
                error: function(data)          //on recieve of reply
                         {
                            alert("hello error");
                         }
           });
	});
////////////////////////////////////////
});
	$(function() 
	{
		$( "#tabs" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
		$( "#tabs li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
	});
	$(function() {
		$( "#accordion" ).accordion({
		    collapsible: true,
		    heightStyle: "content"
		});
	});

</script>
</body>
</html>



















