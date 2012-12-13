<?php 
$email = $_POST['email'];
//echo $email;

include "db/db.php";//include db script
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
    <meta charset="utf-8" />
    <title>The Jewlery Box</title>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css" />
<link rel="stylesheet" media="all" href="header.css" type="text/css" />

<style>
{
	
    .ui-tabs-vertical { width: 55em; }
    .ui-tabs-vertical .ui-tabs-nav { padding: .2em .1em .2em .2em; float: left; width: 12em; }
    .ui-tabs-vertical .ui-tabs-nav li { clear: left; width: 100%; border-bottom-width: 1px !important; border-right-width: 0 !important; margin: 0 -1px .2em 0; }
    .ui-tabs-vertical .ui-tabs-nav li a { display:block; }
    .ui-tabs-vertical .ui-tabs-nav li.ui-tabs-active { padding-bottom: 0; padding-right: .1em; border-right-width: 1px; border-right-width: 1px; }
    .ui-tabs-vertical .ui-tabs-panel { padding: 1em; float: right; width: 40em;}
</style>

</head>

<body>
	<div class="header" id="header" name="header">
	
		
	</div>

<div>
<div style="margin-left:25%;" id="main">
<h1>Email</h1>
<label>Subject</label></br>
<input id="subject" style="width:50%;"></input></br>
<label>From</label></br>
<input id="from" style="width:50%;"></input></br>
<label>Message</label></br>
<textarea id="message" style="width:50%;height:200px;"></textarea></br>
<button id="send">Send</button>
</div>
</div>

 
</body>
<script type="text/javascript" src = "header.js"></script>
<script type="text/javascript">
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

$("#send").click(function()
	{
		//
	var email = "<?php echo $email; ?>";
	var subject = $("#subject").val();
	var from = $("#from").val();
	var message = $("#message").val();
	var postData2 = {'action': 'email', 'subject': subject, 'from': from, 'message': message, 'email': email};
		$.ajax({
		        type: "POST",
		        data: postData2,
		        url: "email_backend.php",                  //  
		        success: function(data)          //on recieve of reply
		                 {
					//alert("what"+data.error);
					if(data.error != "none")
					{
						alert("error");
					}
					else
					{
						$("#main").html("<h1>Your Email Has Been Sent.</h1>");
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




















