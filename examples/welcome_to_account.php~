<?php
function add_user($id, $fname, $lname, $email, $username, $password)
{
    //add to db
    return true;
}
function user_not_in_tempuser($username, $temppassword)
{//return true if username and temppassword not in temp user in db)
    return 0;
}
function id_in_db($id)
{
    return false;
}
function get_tempuser_info($username, $new_password)
{
    return array("brandy", "poag", "bdpoagdorado1@cougars.ccis.edu");
}
function password_invalid($password)
{
    if(strlen($password) < 8 | !preg_match('/^[A-Za-z0-9]+$/', $password)) 
    {
        return false;
    }
    return true;
}
function randString($charset, $length)
{
    $str = '';
    $count = strlen($charset);
    while ($length--) {
        $str .= $charset[mt_rand(0, $count-1)];
    }
    return $str;
}
 $username = $_GET['username'];
 $password = $_GET['password1'];
 $temp_password = $_GET['temppassword'];
 if($password != $_GET['password2'])
 {
	echo("oops the passwords don't match!");
 }
 elseif(password_invalid($password))
 {
	echo("oops the password is not valid!");
 }

 elseif(user_not_in_tempuser($username, $temp_password))
 {
	echo("oops the user is not found make sure the username and temppassword are correct! ");
 }
 else
 {
     $tempuser = get_tempuser_info($username, $temp_password);
	 $fname = $tempuser[0];
	 $lname = $tempuser[1];
	 $email = $tempuser[2];

	 $chars = implode("", range('0', '9')).implode("", range('A', 'Z')).implode("", range('a', 'z')); 
	 $id = randString($chars, 24);
     while(id_in_db($id))
     {
         $id = randString($chars, 24);
     }
     add_user($id, $fname, $lname, $email, $username, $password);

	
    echo("
<html>
<body>
User added now you can signin to your account!
</br>
</br>
<form action='signin_page.php' method='get'>
</br>
<input type='submit' />

</form>
</body>
");
 }
 
 ?>
