<?php 
include "db/db.php";//include db script

session_start();

if(empty($_SESSION['user']))
{
      $_SESSION['user'] = "guest";
      $username = "guest";
      //$_SESSION['cart'] = array();
}
else
{
        $username = $_SESSION['user'];
	if(email_validated($username))
	{
		$validated = true;
	}
	else
	{
		$validated = false;
	}

	//load cart
}
$sessionid = session_id();

//echo"$username and $sessionid";
?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="jquery-1.2.1.pack.js "></script>
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
	<button id="signin" style="width:90px;float:right;margin-right:10px;margin-top:10px;display:none;">Sign In</button>
        </form>
        <form action="pages/signup.php" method="POST">
	<button id="signup" style="width:90px;float:right;margin-right:10px;margin-top:10px;display:none;">Sign Up</button>
        </form>
        <form action="pages/logout.php" method="POST">
	<button id="logout" style="width:90px;float:right;margin-right:10px;margin-top:10px;display:none;">Logout</button>
        </form>
        <form action="pages/stores.php" method="POST">
	<button id="stores" style="width:90px;float:right;margin-right:10px;margin-top:10px;display:none;">Stores</button>
        </form>
        <form action="pages/cart.php" method="POST">
	<button id="cart" style="width:90px;float:right;margin-right:10px;margin-top:10px;display:none;">Cart</button>
        </form>
        <form action="pages/help.php" method="POST">
	<button id="help" style="width:90px;float:right;margin-right:10px;margin-top:10px;display:none;">Help</button>
        </form>
	</div>
</div>
<div id="search_header" style="float:left;background-color:black;width:100%;">
	
		<div  style="float:right;margin-right:10px;margin-bottom:10px;">
			<form action="pages/search.php" method="post">
				<input name="search_text" value="" placeholder="necklace"/>
				<input style="width:70px" type="submit" id="search_button" value="search" />
			</form>
		</div>
</div>
<!-- north -->
</head>

<body>

<div id="main" class="container" id="container">

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

    

<div class="validate" style="display:none;float:left;margin-left:19%;width:300px;border-style:solid;padding-top:10px;padding-left:30px;margin-bottom:20%;">	
<p style="font-family:'Comic Sans MS', cursive, sans-serif;">Validation Code</p>
<!--step 1-->
	<label class="validate">Enter the validation code.</label><br class="validate"/>
	<input class="validate" id="code" name="code" type="text" style="width:90%;" value=""> <br class="validate" />
	<button id="validate">submit</button>
</div>

</div>
</div>
<!-- east -->
  
</div>
</body>
<script src="jquery.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<script src="jquery.backstretch.js"></script>
<script src="jquery.backstretch.min.js"></script>

<script>
    $.backstretch("bg.jpg");
    
</script>

<script type="text/javascript">
   
$(document).ready(function(){
	var validated = "<?php echo $validated; ?>"; 
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
	    	
		if(validated == true)
		{
			$('#stores').show(); //
			$('#logout').show(); //
			$('#cart').show(); //
			$('#help').show(); //
		}
		else
		{
			$('.validate').show();
		}
	}
		
/////////////////////////////////////////////
      	$('#validate').click(function () 
      	{
		var code = $('#code').val(); 
		if(code == "myemailisvalid")
		{
			$('#stores').show(); //
			$('#logout').show(); //
			$('#cart').show(); //
			$('#help').show(); //
			$('#signin').hide(); //
			$('#signup').hide(); //
			$('.validate').hide();
//ajax to update_email_valid($username)
		var postData2 = {'action': 'valid'};
		$.ajax({
		        type: "POST",
		        data: postData2,
		        url: "index_backend.php",                  //  

		        success: function(data)          //on recieve of reply
		                 {
					if(data.success == 'true')
					{
						alert("Email Validated");
					}
					else
					{
						alert("error");
					}	
		                 },
		        dataType: "json",
		        error: function(data)          //on recieve of reply
		                 {
		                    	alert("hello error");
		                 }
		    });
		}
		else
		{
			alert("Enter the code emailed to you.");
		}
	});
});
</script>
</html>




















