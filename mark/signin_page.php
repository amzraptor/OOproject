<!DOCTYPE html>
<html>

<?php include 'header_1.php' ?>

<head>
<link rel="stylesheet" type="text/css" href="website_style.css" />
</head>

<body>
<div id="container">

<div id="content">
	<div style="width:50%;float:left;" align="left">
		<h1> Sign Up </h1>

		<form id="form_1">
			<br />
			<label>First Name <span class="small">*required</span> </label>
			<input type="text" name="f_name" /><br />

			<label>Last Name <span class="small">*required</span> </label>
			<input type="text" name="l_name" /><br />

			<label>User Name <span class="small">*required</span> </label>
			<input type="text" name="user_name" /><br />

			<label>Password <span class="small">*required</span> </label>
			<input type="password" name="password" /><br />

			<label>Confirm Password <span class="small">*required</span> </label>
			<input type="password" name="confirm_password" /><br />

			<label>E-mail <span class="small">*required</span> </label>
			<input type="email" name="email" /><br />
			<br /> <input type="submit" name="submit_button" value="sign up" /> 
		</form>
	</div>

	<div style="width:50%;float:left;" align="left">
		<h1> Sign In </h1>

		<form id="form_1">	
			<br />
			<label>User Name <span class="small">*required</span> </label>
			<input type="text" name="user_name" /><br />
			<label>Password <span class="small">*required</span> </label>
			<input type="password" name="password" /><br />

			<br /> <input type="submit" name="submit_button" value="sign in" /> 
		</form>
	</div>

</div>
</div>

</body>

<?php include 'footer_1.php' ?>
</html>


