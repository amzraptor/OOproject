
<div style="width=100%">

	<div style="float:left;height=400px;width:40%;margin-top:50px;margin-left:50px;">
		<form id="sign-in-up" action="main.php" method="POST" style="height=400px;border-style:solid;padding-top:10px;padding-left:30px;">
		<input type="hidden" id="session" name="session" value="<? $_POST['session'] ?>">
		<input type="hidden" id="page" name="page" value="signin">
		<p style="font-family:'Comic Sans MS', cursive, sans-serif;">
		Signin</p>
		<label>Username</label></br>
		<input id="username" name="username" type="text" style="width:50%"> </br>
		<label>Password</label></br>
		<input id="password" name="password" type="text" style="width:50%"> </br></br>
		<input style="font-family:'Comic Sans MS', cursive, sans-serif;" type="submit" value="submit"> </br></br></br>
		</form>
	</div>

	<div style="float:left;height=400px;width:40%;margin-top:50px;margin-left:50px;">
		<form id="sign-in-up" action="main.php" method="POST" style="height=400px;border-style:solid;padding-top:10px;padding-left:30px;">
		<input type="hidden" id="session" name="session" value="<? $_POST['session'] ?>">
		<input type="hidden" id="page" name="page" value="signup">
		<p style="font-family:'Comic Sans MS', cursive, sans-serif;">
		Signup</p>
		<label>First Name</label></br>
		<input id="fname" name="fname" type="text" style="width:50%"> </br>
		<label>Last Name</label></br>
		<input id="lname" name="lname" type="text" style="width:50%"> </br>
		<label>Email</label></br>
		<input id="email" name="email" type="text" style="width:50%"> </br>
		<label>Username (3-20 letter/number)</label></br>
		<input id="username" name="username" type="text" style="width:50%"> </br>
		<label>Password (6-20 letter/number)</label></br>
		<input id="password" name="password" type="text" style="width:50%"> </br>
		<label>Re-Enter Password</label></br>
		<input id="password2" name="password2" type="text" style="width:50%"> </br></br>
		<input style="font-family:'Comic Sans MS', cursive, sans-serif;" type="submit" value="submit"> </br></br></br>
		</form>
	</div>
</div>

