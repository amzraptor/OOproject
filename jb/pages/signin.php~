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
<link rel="stylesheet" media="all" href="header.css" type="text/css" />

</head>

<body>
	<div class="header" id="header" name="header">
	
		
	</div>

<div style="margin:75px;">
		<h1> <font>Sign</font> In</h1>
</div>

<div id="main" class="container" style="width:100%;">
<div style="float:left;width:29%;">
<p style="display:hidden;"/>
</div>
<div style="float:left;width:69%;">

<div id="sign-in-up" style="float:left;margin-left:10%;width:300px;padding-top:10px;padding-left:30px;margin-bottom:20%;">	
	

<!--step 1-->
	<label class="step1" style="">Username</label><br class="step1" style=""/>
	<input class="step1" id="username" name="username" type="text" style="width:90%;" value=""> <br class="step1" />

<!--step 2-->
        <label class="step2">Password</label><br class="step2" />
	<input class="step2" id="password" name="password" type="password" style="width:90%;" value="<?php echo $password; ?>"> <br class="step2"/>
<br/>
	<input type="submit" value="done" class="next" id="validate" style="font-family:'Comic Sans MS', cursive, sans-serif;" /></br class="next" ></br class="next" >
</div>
<!--submit-->

<center>
<form action="../index.php" method="POST">
	<input type="submit" class="done" value="return to home page" style="display:none;font-family:'Comic Sans MS', cursive, sans-serif;margin-top:10%;" />

</br class="done" style="display:none;">
</br class="done" style="display:none;">

</form>
</center>


</div>
</div>
</div>
</div>
</body>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<script type="text/javascript" src = "header.js"></script>
<script type="text/javascript">
$(document).ready(function(){
////////////////////////////////////////////
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
						$('#sign-in-up').html("<center><h2>Thank You</h2></center>");
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









