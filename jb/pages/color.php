<!DOCTYPE html>
<html>
<head>
 <script type="text/javascript" src="jQuery.js"></script>
 <script type="text/javascript" src="farbtastic.js"></script>
 <link rel="stylesheet" href="farbtastic.css" type="text/css" />

<style>
.header{
	background-color:black;
</style>

<!-- north -->
<div class="header" style="width:100%;height:60px;">	

	<div style="color:white;width:50%;float:left;">
		<lable style="font-size:30px;margin-top:5px;margin-left:20px;">The Jewelry Box</lable><br />
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
			<form action="" method="post">
				<input name="search_text" value="" placeholder="necklace"/>
				<input style="width:70px" type="submit" id="search_button" value="search" />
			</form>
		</div>
</div>
<!-- north -->
</head>

<body>

<div id="main" class="container"  style="width:100%;float:left;">
<div class="west" style="width:50%;">
</div>


<div class="east" style="float:left;width:50%;">

<h1 style="margin-left:60%;">Choose a color</h1>
<form action="create_store.php" method="POST" align="center" style="width:400px;margin-left:48%;">
  <div align="center" class="form-item"><label for="color">Color:</label><input type="text" id="color" name="color" value="#123456" /></div><div align="center" id="picker"></div>
<input type="hidden" id="selection" name="selection" value="<?php echo $_POST['selection'];?>"/>
<button id="done" style="float:right;">Done</button>
</form>
</div>
</div>
</body>

<script type="text/javascript">
$(document).ready(function(){
    $('#demo').hide();
    $('#picker').farbtastic('#color');
//alert("hello ");
            var postData0 = {'action': 'start'};
            $.ajax({
                type: "POST",
                data: postData0,
                url: "color_backend.php",                  //  
                success: function(data)          //on recieve of reply
                         {
				if(data.username == "guest")
				{
//alert("data:"+data+"!");
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
                         },
                dataType: "json",
                error: function(data)          //on recieve of reply
                         {
                            alert("hello error");
                         }
            });
	
      
});
</script>
</html>




















