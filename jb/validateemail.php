<?php   
$action = (empty($_POST['action']) ? "" : $_POST['action']);
//$action = "emailinvalid";
?>
<!DOCTYPE html>
  <html>
    <head>
	<script type="text/javascript" src="jquery-1.2.1.pack.js "></script>
</head>
<body>
<div id="body_background" style="width=100%;height:100%;position:relative;">

<!-- email name is invalid -->
	<div id="emailinvalid" style="height=10%;width:100%;display:none;position:absolute;" align="center">
		<form id="sign-in-up" style="height:80px;width:300px;border-style:solid;margin-top:10px;">
		<p style="font-family:'Comic Sans MS', cursive, sans-serif;margin-right:10px;margin-left:10px;">
		The code entered is not a valid code.</form>
</div>

<!-- validation form -->
<div align="center" style="position:absolute;">
<form  action="main.php" id="sign-in-up" method="POST" style="border-style:solid;margin-right:10%;margin-left:10%;margin-top:15%;">
<input type="hidden" id="page" name="page" value="validateemail">
<p style="font-family:'Comic Sans MS', cursive, sans-serif;margin-right:10px;margin-left:10px;margin-top:10px;">
Please validate your email by entering the validation code that was emailed to you. </p></br>
<label>Validation Code</label>
<input type="text" id="validationcode" name="validationcode" align="center" style="width:60%;margin-top:10px;"> </br></br>
<input style="font-family:'Comic Sans MS', cursive, sans-serif;" type="submit" value="submit"> </br></br></br>
</form>
</div> 
</div>
</body>
<script type="text/javascript" >
$(document).ready(function()
{
	var action = '<?php echo $action; ?>';
	if(action == "emailinvalid")
	{
		$('#emailinvalid').show();
	}

});

</script>
</html>
