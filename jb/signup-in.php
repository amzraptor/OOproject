<?php   
$fname = (empty($_POST['fname']) ? "" : $_POST['fname']);
$lname = (empty($_POST['lname']) ? "" : $_POST['lname']);
$username = (empty($_POST['username']) ? "" : $_POST['username']);
$email = (empty($_POST['email']) ? "" : $_POST['email']);
$password = (empty($_POST['password']) ? "" : $_POST['password']);
$password2 = (empty($_POST['password2']) ? "" : $_POST['password2']);
$action = (empty($_POST['action']) ? "" : $_POST['action']);
//echo"hello:: $action ::";
?>

<link rel="stylesheet" type="text/css" href="css/style.css" /> 
<!DOCTYPE html>
  <html>
    <head>
	<script type="text/javascript" src="jquery-1.2.1.pack.js "></script>
</head>
<body>
<div id="body_background" style="width=100%;height:100%;position:relative;">
<!-- first name is invalid -->
	<div id="fnameinvalid" style="height=10%;width:100%;display:none;position:absolute;" align="center">
		<form id="sign-in-up" style="height:80px;width:300px;border-style:solid;margin-top:10px;">
		<p style="font-family:'Comic Sans MS', cursive, sans-serif;margin-right:10px;margin-left:10px;">
		The first name must contain at least 2 letters and only letters.</form>
	</div>
<!-- last name is invalid -->
	<div id="lnameinvalid" style="height=10%;width:100%;display:none;position:absolute;" align="center">
		<form id="sign-in-up" style="height:80px;width:300px;border-style:solid;margin-top:10px;">
		<p style="font-family:'Comic Sans MS', cursive, sans-serif;margin-right:10px;margin-left:10px;">
		The last name must contain at least 2 letters and only letters.</form>
	</div>
<!-- username is invalid -->
	<div id="usernameinvalid" style="height=10%;width:100%;display:none;position:absolute;" align="center">
		<form id="sign-in-up" style="height:80px;width:300px;border-style:solid;margin-top:10px;">
		<p style="font-family:'Comic Sans MS', cursive, sans-serif;margin-right:10px;margin-left:10px;">
		The username must contain at least 3 letters/numbers and only letters/numbers.</form>
	</div>
<!-- email is invalid -->
	<div id="emailinvalid" style="height=10%;width:100%;display:none;position:absolute;" align="center">
		<form id="sign-in-up" style="height:80px;width:300px;border-style:solid;margin-top:10px;">
		<p style="font-family:'Comic Sans MS', cursive, sans-serif;margin-right:10px;margin-left:10px;">
		The email is not valid.</form>
	</div>
<!-- password is invalid -->
	<div id="passwordinvalid" style="height=10%;width:100%;display:none;position:absolute;" align="center">
		<form id="sign-in-up" style="height:80px;width:300px;border-style:solid;margin-top:10px;">
		<p style="font-family:'Comic Sans MS', cursive, sans-serif;margin-right:10px;margin-left:10px;">
		The password must contain at least 6 letters/numbers and only letters/numbers.</form>
	</div>
<!-- passwords dont match -->
	<div id="passwordsdontmatch" style="height=10%;width:100%;display:none;position:absolute;" align="center">
		<form id="sign-in-up" style="height:80px;width:300px;border-style:solid;margin-top:10px;">
		<p style="font-family:'Comic Sans MS', cursive, sans-serif;margin-right:10px;margin-left:10px;">
		The passwords do not match.</form>
	</div>
<!-- registration success-->
	<div id="registrationsuccess" style="height=10%;width:100%;display:none;position:absolute;" align="center">
		<form id="sign-in-up" style="height:80px;width:300px;border-style:solid;margin-top:10px;">
		<p style="font-family:'Comic Sans MS', cursive, sans-serif;margin-right:10px;margin-left:10px;">
		Success! Please signin and validate your email with the code that has been emailed to you.</form>
	</div>
<!-- username is in use -->
	<div id="usernameinuse" style="height=10%;width:100%;display:none;position:absolute;" align="center">
		<form id="sign-in-up" style="height:80px;width:300px;border-style:solid;margin-top:10px;">
		<p style="font-family:'Comic Sans MS', cursive, sans-serif;margin-right:10px;margin-left:10px;">
		Please choose another username this one is not available.</form>
	</div>
<!-- username not found -->
	<div id="usernamenotfound" style="height=10%;width:100%;display:none;position:absolute;" align="center">
		<form id="sign-in-up" style="height:80px;width:300px;border-style:solid;margin-top:10px;">
		<p style="font-family:'Comic Sans MS', cursive, sans-serif;margin-right:10px;margin-left:10px;">
		The username was not found.</form>
	</div>
<!-- Signin -->
	<div style="height=90%;position:absolute;">

	<div style="margin-top:20%;width:100%;">

	<div style="float:left;width:50%;">
		<form id="sign-in-up" action="main.php" method="POST" style="float:left;margin-left:10%;width:100%;border-style:solid;padding-top:10px;padding-left:30px;">
			<input type="hidden" id="session" name="session" value="<?php $_POST['session'] ?>">
			<input type="hidden" id="page" name="page" value="signupin">
			<input type="hidden" id="action" name="action" value="signin">			
<p style="font-family:'Comic Sans MS', cursive, sans-serif;">
			Signin</p>
			<label>Username</label></br>
			<input id="username" name="username" type="text" style="width:90%" value="<?php echo$username; ?>"> </br>
			<label>Password</label></br>
			<input id="password" name="password" type="text" style="width:90%"  value="<?php echo$password; ?>"> </br></br>

		<input style="font-family:'Comic Sans MS', cursive, sans-serif;" type="submit" value="submit"> </br></br></br>

		</form>
	</div>

<!-- Signup-->
	<div style="float:left;width:50%;">
		<form id="sign-in-up" action="main.php" method="POST" style="float:left;margin-left:25%;width:100%;border-style:solid;padding-top:10px;padding-left:30px;">
			<input type="hidden" id="session" name="session" value="<?php $_POST['session'] ?>">
			<input type="hidden" id="page" name="page" value="signupin">
			<input type="hidden" id="action" name="action" value="signup">	
			<p style="font-family:'Comic Sans MS', cursive, sans-serif;">
			Signup</p>
			<label>First Name</label></br>
			<input id="fname" name="fname" type="text" value="<?php echo$fname; ?>" style="width:90%"> </br>
			<label>Last Name</label></br>
			<input id="lname" name="lname" type="text" value="<?php echo$lname; ?>" style="width:90%"> </br>
			<label>Email</label></br>
			<input id="email" name="email" type="text" value="<?php echo$email; ?>" style="width:90%"> </br>
			<label>Username (3-20 letter/number)</label></br>
			<input id="username" name="username" type="text" value="<?php echo$username; ?>" style="width:90%"> </br>
			<label>Password (6-20 letter/number)</label></br>
			<input id="password" name="password" type="text" value="<?php echo$password; ?>" style="width:90%"> </br>
			<label>Re-Enter Password</label></br>
			<input id="password2" name="password2" type="text" value="<?php echo$username; ?>" style="width:90%"> </br></br>
			<input style="font-family:'Comic Sans MS', cursive, sans-serif;" type="submit" value="submit"> </br></br></br>
		</form>
	</div>
</div>
</div>
</div>
</body>
<script type="text/javascript" >
$(document).ready(function()
{
	var action = '<?php echo $action; ?>';
	if(action == "fnameinvalid")
	{
		$('#fnameinvalid').show();
	}
	else if(action == "lnameinvalid")
	{
		$('#lnameinvalid').show();
	}
	else if(action == "usernameinvalid")
	{
		$('#usernameinvalid').show();
	}
	else if(action == "emailinvalid")
	{
		$('#emailinvalid').show();
	}
	else if(action == "passwordinvalid")
	{
		$('#passwordinvalid').show();
	}
	else if(action == "passwordsdontmatch")
	{
		$('#passwordsdontmatch').show();
	}
	else if(action == "registrationsuccess")
	{
		$('#registrationsuccess').show();
	}
	else if(action == "usernameinuse")
	{
		$('#usernameinuse').show();
	}
	else if(action == "usernamenotfound")
	{
		$('#usernamenotfound').show();
	}
});

</script>
</html>
