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
<div class="sign-in-up" style="float:left;margin-left:10%;width:300px;padding-top:10px;padding-left:30px;margin-bottom:20%;">	
<p style="font-family:'Comic Sans MS', cursive, sans-serif;">Signup</p>
<!--step 1-->
	<label class="step1">First Name</label><br/>
	<input class="step1" id="fname" name="fname" type="text" style="width:90%;" value=""> <br/>

<!--step 2-->
        <label class="step2">Last Name</label><br/>
	<input class="step2" id="lname" name="lname" type="text" style="width:90%;" value=""> <br/>

<!--step 3-->
        <label class="step3">Email</label><br/>
	<input class="step3" id="email" name="email" type="text" style="width:90%;" value=""> <br/>

<!--step 4-->
        <label class="step4">Username</label><br/>
	<input class="step4" id="username" name="username" type="text" style="width:90%;" value=""> <br/>

<!--step 5-->
        <label class="step5">Password</label><br/>
	<input class="step5" id="password" name="password" type="text" style="width:90%;" value=""> <br/>

<!--step 6-->
        <label class="step6">Re-Enter Password</label><br/>
	<input class="step6" id="password2" name="password2" type="text" style="width:90%;" value=""> <br/>
	<button class="next" id="validate" style="font-family:'Comic Sans MS', cursive, sans-serif;" >validate</button></br class="next" ></br class="next" >
</div>
<br/>
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
		$('.next').hide();
//alert("in password2");
		var fname = $('#fname').val();
		var lname = $('#lname').val();
		var email = $('#email').val();
		var username = $('#username').val();
		var password = $('#password').val();
		var password2 = $('#password2').val();
		var postData2 = {'action': 'validate','fname': fname, 'lname': lname, 'email': email, 'username': username,   'password': password, 'password2': password2};
		$.ajax({
		        type: "POST",
		        data: postData2,
		        url: "signup_backend.php",                  //  

		        success: function(data_json)          //on recieve of reply
		                 {
					data = data_json.result;
					alert("data"+data);
					if(data == "registrationsuccess")
					{
						alert("The registration was a success an email with a vaildation code will be emailed to you.");
						$(".sign-in-up").html("<h1>Thank You.</h1>");
					}
					else
					{
						$('.next').show();
					}


					if(data == "registrationfail")
					{
						alert("Sorry but the registration failed");
				
					}
					else if(data == "usernameinuse")
					{
       						alert("Please choose another username this one is not available.");
					}
					else if(data == "fnameinvalid")
					{
        					alert("The first name must only consist of characters and have a length greater than 2.");
					}
					else if(data == "lnameinvalid")
					{
	       					alert("The last name must only consist of characters and have a length greater than 2.");
					}
					else if(data == "emailinvalid")
					{
       						alert("The email entered is not valid.")
					}
					else if(data == "usernameinvalid")
					{
       						alert("The username entered is not valid. User name should consist of at least 3 alpha or numeric digits.");
					}
					else if(data == "passwordinvalid")
					{
       						alert("The password entered is not valid. Passwords should consist of at least 6 alpha or numeric digits.");
					}
					else if(data == "passwordsdontmatch")
					{
						alert("The passwords do not match.");
					}
					else if(data == "form empty")
					{
						alert("The registration form must be completed.");
					}
					else if(data == "error in signup validation")
					{
						alert("An error has occured.");
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









