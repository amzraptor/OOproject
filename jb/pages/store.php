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
<link rel="stylesheet" type="text/css" href="css/styles.css">
<link rel="stylesheet" type="text/css" href="css/jPages.css">

<script src="jpages.js"></script>
<style>

 .holder {
    margin:15px 0;
}
.holder a {
    font-size:12px;
    cursor:pointer;
    margin:0 5px;
    color:#333;
}
.holder a:hover {
    background-color:#222;
    color:#fff;
}
.holder a.jp-previous {
    margin-right:15px;
}
.holder a.jp-next {
    margin-left:15px;
}
.holder a.jp-current,a.jp-current:hover {
    color:#FF4242;
    font-weight:bold;
}
.holder a.jp-disabled,a.jp-disabled:hover {
    color:#bbb;
}
.holder a.jp-current,a.jp-current:hover,.holder a.jp-disabled,a.jp-disabled:hover {
    cursor:default;
    background:none;
}
.holder span {
    margin: 0 5px;
}



#product_display {
-moz-border-radius: 5px;
-webkit-border-radius: 5px;
-moz-box-shadow:    3px 3px 5px 8px #ddd;
-webkit-box-shadow: 3px 3px 5px 8px #ddd;
box-shadow:         3px 3px 5px 8px #ddd;
width:230px;
height:200px;
color: #54c6e8;
float:left;
margin:30px;'

}

#itempic {
width: 95%;
height: 140px;
background-color: #cff;
border: 5px solid #fff;

}

#itemspecs {
margin-right:10px;
margin-left:10px;
font-family: BebasNeue;
font-size: 20px;
/*color:#54c6e8;*/
color:#444;
}

/*#product_display {
border: 3px solid #000;
background-color:#000;
width:210px;
height:250px;
color:#fff;
font-weight:bold;	
}*/

</style>
</head>
<body>

	<div class="header" id="header" name="header">
	
		
	</div>

<!--template1-->

<div class="template1" id="store_background" name=="store_background" style="width:100%;float:left;height:14%;">
<div id="banner" name="banner" style="width:80%;float:left;margin-left:10%;margin-top:2%;height:10%;"> 
<p align="center"><lable id="store_name" name="store_name" style="font-size:50px;"> STORE NAME </label></p>
</div>

<div id="store_foreground" name="store_foreground" style="width:80%;float:left;margin-bottom:5%;height:70%;margin-left:10%;">

	<div id="about_store" name="about_store" style="float:left;width:100%;">
      <form action="email.php" method="POST" style="margin-left:70%;">
	<input type="hidden" id="email" name="email" value=""/>
	<button id="ssemail" name="ssemail" style="margin-left:10%;">Email Store Owner</button>
      </form>
	
	<label id="sownern" name="sownern" style="margin-left:10%;float:left;"> Store Owner's Name </label>
	<label id="sspecialty" name="sspecialty" style="margin-left:10%;float:left;"> Store Specialty </label></br>
	<label id="sdescription" name="sdescription" style="margin-left:10%;"> Store description </label>
	</div>

<div id="store_category" name="store_category" style="float:left;width:100%;margin-left:8%;">
<button id="but1" name="but1" style="width:125px;float:left;margin-left:27px;margin-top:10px;margin-bottom:10px;">Category 1</button>
<button id="but2" name="but2" style="width:125px;float:left;margin-left:27px;margin-top:10px;margin-bottom:10px;">Category 2</button>
<button id="but3" name="but3" style="width:125px;float:left;margin-left:27px;margin-top:10px;margin-bottom:10px;">Category 3</button>
<button id="but4" name="but4" style="width:125px;float:left;margin-left:27px;margin-top:10px;margin-bottom:10px;">Category 4</button>
<button id="but5" name="but5" style="width:125px;float:left;margin-left:27px;margin-top:10px;margin-bottom:10px;">Category 5</button>
</div>
<div style="width:100%;float:left;">
<!--
	<div id="about_store" name="about_store" style="float:left;width:15%;margin-top:5%;margin-bottom:5%;">
	<h4 id="sownern" name="sownern"> Store Owner's Name </h4>
	<h4 id="ssemail" name="ssemail"> Store Owner's Email </h4>
	<h4 id="sspecialty" name="sspecialty"> Store Specialty </h4>
	<p id="sdescription" name="sdescription"> Store description </p>
	</div>

-->
	<div id="products" style="float:left;width:80%;">
		<div class="holder" style="margin-left:45%;">
			</div>

		</div>

		<ul id="itemContainer">
		</ul>
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
						$('#email').val(store.semail);
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

/////////////////////////////////////////////

	  var search_word = "-99";//"<?php echo $search; ?>";
	  var search_string = {"search_words": search_word};

	  $.ajax(
		{
			url:"search_backend.php",
			data:search_string,
			type:"post",
			dataType:"json",
			success:function(result)
					{ 
						var list = "";
						for (var i=0;i< result.length;i++)
						{ 
							list = list+"<li id='product_display' style='list-style:none;'><div id='itempic'>";
							list = list+"<img src='";
							list = list+result[i].img1;
							list = list+"' width='220' height='140'/ ></div>";
							list = list+"<div id='itemspecs'>";
							list = list+result[i].name;
							list = list+"</div>";
							list = list+"<div id='description' style='text-align:block;display:none;'><div>";
							
							list = list+"</div>";
							list = list+"<form action='product_display.php' method='post'><input type='submit' style='background:transparent;cursor:pointer;border:none;color:red;' value='view'/ >";
							list = list+"<input type='hidden' name='product_id' value='"+result[i].product_id+"' / >";
							list = list+"<input type='hidden' name='product_image' value='"+result[i].img1+"' / >";
							list = list+'<input type="hidden" name="product_description" value="'+result[i].description+'" / >';
							list = list+"<input type='hidden' name='product_price' value='"+result[i].price+"' / >";
							list = list+"<input type='hidden' name='product_size' value='"+result[i].size+"' / >";
							list = list+"<input type='hidden' name='product_color' value='"+result[i].color+"' / >";
							list = list+'<input type="hidden" name="product_name" value="'+result[i].name+'" / >';
							list = list+"<input type='hidden' name='product_material' value='"+result[i].material+"' / >";
							list = list+"</form></div></li>";
						}

						$('#itemContainer').append(list);
						$("div.holder").jPages(
						{
							containerID  : "itemContainer",
							perPage      : 10,
							startPage    : 1,
							startRange   : 1,
							midRange     : 5,
							endRange     : 1
						});
						
						$('#itemContainer li').hover(function(){
								$(this).children('#description').show()},function(){
								$(this).children('#description').hide();
						});


					},

			error:function(e){alert("there was an error");}
		});
	}
});
</script>
</html>


