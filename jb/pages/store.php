<?php 
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
if(!empty($_POST['sload']))
{
	$sload = $_POST['sload'];
      	$_SESSION['store_id'] = $sload;
	$store = $_SESSION['store_id'];
	
}
else
{
	$sload = 'none';
	$store = 'none';
}

?>

<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<link rel="stylesheet" media="all" href="header.css" type="text/css" />
</head>
<body>

	<div class="header" id="header" name="header">
	
		
	</div>

<!--template1-->

<div class="template1" id="store_background" name=="store_background" style="width:100%;float:left;height:14%;">
<div id="banner" name="banner" style="width:80%;float:left;margin-left:10%;margin-top:2%;height:10%;"> 
<p align="center"><lable id="store_name" name="store_name" style="font-size:50px;"> STORE NAME </label></p>
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
</body>

<script type="text/javascript" src = "header.js"></script>
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
        var sload = "<?php echo $sload; ?>";
        var store = "<?php echo $store; ?>";
	if (sload == "none")
	{
		$('.template1').hide();
		alert("no store selected");
	}
	else 
	{
	////////////////////////////////
	   var postData0 = {'action': 'start'};
		  
	    $.ajax({
		type: "POST",
		data: postData0,
		url: "store_backend.php",                  //  
		success: function(data)          //on recieve of reply
			{		
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
				
					alert("please signin to your account first if you do not have an account then signup for free.");
				}
				if(data.username == "error")
				{
					alert("tis "+data);
				}

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
					//$('#store_background').css("background-image", "bg.jpg");
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
		         },
		dataType: "json",
		error: function(data)          //on recieve of reply
		         {
		            alert("hello error");
		         }
		});
	}
});
</script>
</html>


