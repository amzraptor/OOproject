<?php 
include "db.php";//include db script
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

?>
<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" media="all" href="header.css" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
</head>

<body>

	<div class="header" id="header" name="header">
	
		
	</div>

<div id="main" class="container" style="width:100%;">
<div style="float:left;width:29%;">
<p style="display:hidden;"/>
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

<script type="text/javascript" src = "header.js"></script>
<script type="text/javascript">
$(document).ready(function(){

/////////////////////////////////////////////
	var username = '<?php echo $username; ?>';
	if(username == 'guest')
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









