
<?php
function user_not_in_db($username, $password)
{//return true if username and temppassword not in temp user in db)
    return false;
}

 $username = $_GET['username'];
 $password = $_GET['password1'];
 
 if(user_not_in_db($username, $password))
 {
	echo("oops the user is not found!");
 }
 else 
 {
	echo("
<html>
enjoy
<form action='customer_homepage.php' method='get'>
</br>
<input type='submit' />

</form>
</body>
");
 }
 
 ?>
