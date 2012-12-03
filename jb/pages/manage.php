<!DOCTYPE html>
<html>
<head>
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>-->

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
        <form action="pages/signin.php" method="POST">
	<button id="signin" style="width:70px;float:right;margin-right:10px;margin-top:10px;display:none;">Sign In</button>
        </form>
        <form action="pages/signup.php" method="POST">
	<button id="signup" style="width:70px;float:right;margin-right:10px;margin-top:10px;display:none;">Sign Up</button>
        </form>
        <form action="pages/logout.php" method="POST">
	<button id="logout" style="width:70px;float:right;margin-right:10px;margin-top:10px;display:none;">Logout</button>
        </form>
        <form action="pages/stores.php" method="POST">
	<button id="stores" style="width:70px;float:right;margin-right:10px;margin-top:10px;display:none;">Stores</button>
        </form>
        <form action="pages/cart.php" method="POST">
	<button id="cart" style="width:70px;float:right;margin-right:10px;margin-top:10px;display:none;">Cart</button>
        </form>
        <form action="pages/help.php" method="POST">
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

<div id="main" class="container">

<div style="width:100%;height:100%" class="body">

<!-- west(small) -->
<div style="width:29%;float:left;">
west
<div class="west" style="margin-left:5%;">
</div>
</div>
<!-- west -->

<!-- east(big) -->
<div style="width:69%;float:left;">
<div class="east" style="margin-top:80px;">

    <div id="pageContent">content</div> 

</div>
</div>
<!-- east -->
  
</div>
</body>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){

//alert("hello ");
            var postData0 = {'action': 'start'};
            $.ajax({
                type: "POST",
                data: postData0,
                url: "manage_backend.php",                  //  
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




















