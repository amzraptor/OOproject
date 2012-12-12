<?php 
include "db.php";//include db script
session_start();

if(empty($_SESSION['user']))
{
      $_SESSION['user'] = "guest";
      $username = "guest";
      $_SESSION['cart'] = array();
}
else
{
      $username = $_SESSION['user'];
	//load cart
}
$sessionid = session_id();

//echo"$username and $sessionid";
?>
<!DOCTYPE html>
<html>
<head>
<style>
.header{background-color:black;}
</style>

<!-- north -->
<div class="header" style="width:100%;height:60px;">	

	<div style="color:white;width:50%;float:left;">
		<lable style="font-size:30px;margin-top:5px;margin-left:20px;">The Jewelry Box</lable><br />
<lable style="color:#ccc;font-size:11px;margin-left:30px;">Hand Crafted Trinkets</lable>		
	</div>
	<div style="height:100%;width:50%;float:left">
        <form action="signin.php" method="POST">
	<button id="signin" style="width:90px;float:right;margin-right:10px;margin-top:10px;display:none;">Sign In</button>
        </form>
        <form action="signup.php" method="POST">
	<button id="signup" style="width:90px;float:right;margin-right:10px;margin-top:10px;display:none;">Sign Up</button>
        </form>
        <form action="logout.php" method="POST">
	<button id="logout" style="width:90px;float:right;margin-right:10px;margin-top:10px;display:none;">Logout</button>
        </form>
        <form action="stores.php" method="POST">
	<button id="stores" style="width:90px;float:right;margin-right:10px;margin-top:10px;display:none;">Stores</button>
        </form>
        <form action="cart.php" method="POST">
	<button id="cart" style="width:90px;float:right;margin-right:10px;margin-top:10px;display:none;">Cart</button>
        </form>
        <form action="aboutus.php" method="POST">
	<button id="aboutus" style="width:90px;float:right;margin-right:10px;margin-top:10px;display:none;">About Us</button>
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
<div id="main" class="container" style="width:100%;">
<div style="float:left;width:29%;">
<h1 style="display:hidden;"/>
</div>
<div style="float:left;width:69%;">
<!-- Signin -->
<div id="sign-in-up" style="float:left;width:300px;padding-top:10px;padding-left:30px;margin-bottom:20%;">	
<p style="font-family:'Comic Sans MS', cursive, sans-serif;">Signin </p>
<!--step 1-->
	<label class="step1" style="">Username</label><br class="step1" style=""/>
	<input class="step1" id="username" name="username" type="text" style="width:90%;" value=""> <br class="step1" />

<!--step 2-->
        <label class="step2">Password</label><br class="step2" />
	<input class="step2" id="password" name="password" type="text" style="width:90%;" value="<?php echo $password; ?>"> <br class="step2"/>
<br/>
	<button class="next" id="validate" style="font-family:'Comic Sans MS', cursive, sans-serif;" >validate</button></br class="next" ></br class="next" >
</div>
<!--submit-->
<form action="../index.php" method="POST">
	<button class="done" style="display:none;font-family:'Comic Sans MS', cursive, sans-serif;margin-top:10%;" > submit</button></br class="done" style="display:none;"></br class="done" style="display:none;">
</form>
</div>
</div>
</div>
</div>
</body>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
//alert("hello ");
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

      	$('#validate').click(
      	function () 
      	{
//alert("whwh");
		var username = $('#username').val();
		var password = $('#password').val();
		var postData2 = {'action': 'validate', 'username': username, 'password': password};
		$.ajax({
		        type: "POST",
		        data: postData2,
		        url: "signin_backend.php",                  //  
		        success: function(data)          //on recieve of reply
		                 {
					//alert(data.result+"  and   "+data.username);
					if(data.result == "gotohomepage")
					{
						$('.message').hide();
						$('.done').show();
						$('#sign-in-up').html("<h1>Thank You</h1>");
					}
					else if(data.result == "usernamenotfound")
					{
						alert("Sorry the user can't be found.");
					}
					else if(data.result == "usernameinvalid")
					{
						alert("The username is not valid.");
					}
					else if(data.result == "passwordinvalid")
					{
						alert("The password is not valid.");
					}
					else if(data.result == "form empty")
					{
						alert("Please fill out the form.");
					}
					else if(data.result== "in signin backend error")
					{
						alert(data.result);
					}
		                 },
		        dataType: "json",
		        error: function(data)          //on recieve of reply
		                 {
		                    	alert("hello error");
		                 }
		    });

	});
      
});

</script>
</html>








