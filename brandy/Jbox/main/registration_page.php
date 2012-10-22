<!DOCTYPE html>
<?php
include '../db-util/db_util.php';
include 'header_1.php';
function randString2($charset, $length)
{
    $str = '';
    $count = strlen($charset);
    while ($length--) 
     {
        $str .= $charset[mt_rand(0, $count-1)];
    }
    return $str;
}
if(!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['email']))
{
 $chars = implode("", range('0', '9')).implode("", range('A', 'Z')).implode("", range('a', 'z')); 
 $fname = $_GET['fname'];
 $lname = $_GET['lname'];
 $username = $fname[0].$lname.'1';
 $to = $_GET['email'];
 $subject = "Jewelry Box Account";
 $password = 'def';//randString2($chars, 24);
 $body = sprintf('
<html>
<body>
Click <a href="localhost/jewelery_box/Jbox/main/create_password_page.php">here</a> to create a password for your new account using your new username %s and your temporary password %s.
</body>
</html>
', $username, $password);
  $headers = "From: bdpoag1@cougars.ccis.edu\r\n";
  $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"\r\n";

  if(add_tempuser($fname, $lname, $username, $password, $email))
  {
	if (mail($to, $subject, $body, $headers)) 
	{
            echo("<p>A link has been sent to your email along with your new user name and your temporary password!</p>");
	}
  } 
  else 
  {
        echo("<p>Message delivery failed...</p>");
  }
}
else
{
echo("
<html>
<body>
Please enter your information
An email will be sent to you will your username and a link to a site where you can create your password!
</br>
</br>
<form action='registration_page.php' method='post'>
</br>
First Name: <input type='text' name='fname' id='fname' />
</br>
Last  Name: <input type='text' name='lname' id='lname' />
</br>
Email	  : <input type='text' name='email' id='email' />
</br>
<input type='submit' value=' Register ' id='submit' />

</form>

</body>
</html>
");
}
include 'footer_1.php'
?>
	



