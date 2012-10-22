<!--fcreate_password_page.php - here the new customer creates a password for the new account using the unsername from the email-->
<?php
include '../db-util/db_util.php';
include 'header_1.php';
function password_invalid($pw)
{
    if(strlen($pw) < 8 | !preg_match('/^[A-Za-z0-9]+$/', $pw)) 
    {
        return true;
    }
    return false;
}

if ( !empty($_POST['username']) && !empty($_POST['temppassword']) && !empty($_POST['password1']) && !empty($_POST['password2']) )
{
$username = $_POST['username'];
 $password = $_POST['password1'];
 $temp_password = $_POST['temppassword'];

 if($password != $_POST['password2'])
 {
	echo("oops the passwords don't match!");
 }
 elseif(password_invalid($password))
 {
	echo("oops the password is not valid");
 }
 else
{
    add_user($username, $password, $temp_password);	
   echo("
<html>
<body>
User added now you can signin to your account!
</br>
</br>
<form action='customer_homepage.php' method='post'>
</br>
<input type='submit' />

</form>
</body>
");
 }
}
else
{
echo ("
<html>
<body>
Welcome back! Please enter your information below:
</br>
</br>
<form action='create_password_page.php' method='post'>
</br>
Username: <input type='text' name='username' id='username' />
</br>
Temp Password: <input type='text' name='temppassword' id='temppassword'/>
</br>
Please create a new password for your jewelry box account the password must be 8 digits in length and contain only letters and numbers.
</br>
New Password:<input type='text' name='password1' id='password1' />
</br>
Re-Enter New Password: <input type='text' name='password2' id='password2' />
</br>
<input type='submit' value=' Register ' id='submit' />

</form>

</body>
</html>
");
}
include 'footer_1.php'
?>
