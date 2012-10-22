

<?php
include '../db-util/db_util.php';
include 'header_1.php';

if ( !empty($_POST['username']) && !empty($_POST['password']))
{

 $username = $_POST['username'];
 $password = $_POST['password'];
 
 if(user_not_in_user($username, $password))
 {
	echo("oops the user is not found!");
 }
 else 
 {
echo ("
<html>
<body>
<body>
<div id='content' style='height:500px;'>
<h1> Welcome to the Jewelry Box! </h1>

	<div style='width:20%;float:left;'>
	<h2> pic1.png </h2>
	</div>

	<div style='width:20%;float:left;'>
	<h2> pic2.png </h2>
	</div>

	<div style='width:20%;float:left;'>
	<h2> pic3.png </h2>
	</div>

</div>
</body>
</body>
</html>"
);
 }
}
else
{
echo ("
<html>
<head>
<link rel='stylesheet' type='text/css' href='website_style.css' />
</head>

<body>
<div id='container'>
<div id='content'>
<h1> Sign Up </h1>
<p>New to Jewelry Box. Sign Up here.
<a href='registration_page.php'> Sign Up </a>
</p>

<br />
<h1> Create a Password </h1>
<p> Just registered with the JBox and now you need to create a
new password.
<a href='create_password_page.php'> Create a Password </a>
</p>


<form action='customer_homepage.php' method='post'>
<h1> Sign In </h1>
<p>Welcome back, please signin to your account</p>
</br>
</br>
Username: <input type='text' name='username' id='username' />
</br>
Password: <input type='text' name='password' id='password' />
</br>
<input type='submit' value=' Register ' id='submit' />
</form>
</div>
</div>
</body>
</html>
");
}
include 'footer_1.php'
?>
