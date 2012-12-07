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

	<script type="text/javascript" src="jquery-1.2.1.pack.js "></script>

<style type="text/css">

@font-face {
font-family: BebasNeue;
src: url('fonts/BebasNeue.otf'); /* Edit this line */
}
body {

margin:0;
padding:0;

}

.header {
min-width: 1100px;
height:50px;
border-bottom: 1px solid #ccc;
width:100%;
margin-top:5px;

-moz-box-shadow:    3px 5px 8px #ddd;
-webkit-box-shadow: 3px 5px 8px #ddd;
box-shadow:         3px 5px 8px #ddd;
}

#logo {
width:310px;
float:left;
margin-left:30px;
}

#logo_text {
width:260px;
float:left;
font-family:'BebasNeue';
font-style:none;
font-size:40px;
}

#logo_text a {
text-decoration:none;
color:black;
}

#logo_image {
margin-top:-5px;
width:50px;
float:left;
}

#search_bar{
margin-top:10px;
float:left;
width:300px;
}


#search_bar input[type="text"] {
width:200px;

}

input[type="submit"] {

background-color: #333;
padding: 5px 10px 6px;
color: #fff;
text-decoration: none;
font-weight: bold;
line-height: 1;
-moz-border-radius: 5px;
-webkit-border-radius: 5px;
position: relative;
cursor: pointer;
border:none;

}

#title_banner_bg {
width:100%;
background-color:#79c6e8;
repeat: repeat-x;
}


#title_banner {
width:1000px;
height:150px;
margin:0 auto;
background-image: url('site_images/titlehomepage3.png');
}

#content {
margin:75px;

}

h1 {
font-family:BebasNeue;
font-size:40px;	
border-bottom: 1px solid #ccc;

}

h1 font {
font-family:BebasNeue;
font-size:40px;	
color:#54c6e8;
}

#buttons {
float:right;
margin-right: 40px;
margin-top:8px;
}

#item {
-moz-border-radius: 5px;
-webkit-border-radius: 5px;
-moz-box-shadow:    3px 3px 5px 8px #ddd;
-webkit-box-shadow: 3px 3px 5px 8px #ddd;
box-shadow:         3px 3px 5px 8px #ddd;
width:230px;
height:200px;
color: #54c6e8;
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

</style>


<body>

	<div class="header">
	
		<div id="logo" > 

			<div id="logo_image">
					<img src="site_images/Jewelry_Box.png" width="50" height="50" border="0" /> 
			</div>
		
			<div id="logo_text">
				<a href="header.php" >
					THE JEWELRY BOX
				</a>
			</div>

		</div>

		<div id="search_bar">
			<form action="pages/search.php" method="post">
				<input name="search_text" value="" placeholder="necklace"/>
				<input type="submit" id="search_button" value="search" />
			</form>
		</div>

		<div id="buttons" >
		    <form style="float:left;margin-right:10px;" action="pages/signin.php" method="POST">
				<input type="submit" value="sign in" id="signin" style="display:none;" />
		    </form>

		    <form style="float:left;margin-right:10px;" action="pages/signup.php" method="POST">
				<input type="submit" value="sign up" id="signup" style="display:none;" />
		    </form>

		    <form style="float:left;margin-right:10px;" action="pages/logout.php" method="POST">
				<input type="submit" value="sign out" id="logout" style="display:none;" />
		    </form>

		    <form style="float:left;margin-right:10px;" action="pages/manage.php" method="POST">
				<input type="submit" value="stores" id="stores" style="display:none;" />
		    </form>

		    <form style="float:left;margin-right:10px;" action="pages/cart.php" method="POST">
				<input type="submit" value="cart" id="cart" style="display:none;" />
		    </form>

		    <form style="float:left;margin-right:10px;" action="pages/aboutus.php" method="POST">
				<input type="submit" value="about us" id="aboutus" style="display:none;">
		    </form>

		</div>

	</div>

	<div id="title_banner_bg">

		<div id="title_banner">
	
		</div>

	</div>

	<div id="content">

		<h1> <font>Top</font> Picks </h1>

		<div id="item">
			<div id="itempic">
				<img src="images/Default_Pic.png" width="220" height="140" border="0" /> 
			</div>

			<div id="itemspecs">
				Rings
			</div>
		</div>

		<div class="validate" 
		style="display:none;float:left;margin-left:19%;width:300px;border-style:solid;padding-top:10px;padding-left:30px;margin-bottom:20%;">	
		<p style="font-family:'Comic Sans MS', cursive, sans-serif;">Validation Code</p>
		<!--step 1-->
			<label class="validate">Enter the validation code.</label><br class="validate"/>
			<input class="validate" id="code" name="code" type="text" style="width:90%;" value=""> <br class="validate" />
			<button id="validate">submit</button>
		</div>
			
	</div>

</body>

</html>

<script type="text/javascript">
   
$(document).ready(function(){
	var validated = "<?php echo $validated; ?>"; 
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
	    	
		if(validated == true)
		{
			$('#stores').show(); //
			$('#logout').show(); //
			$('#cart').show(); //
			$('#aboutus').show(); //
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
			$('#aboutus').show(); //
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















