<?php
function randString($charset, $length)
{
    $str = '';
    $count = strlen($charset);
    while ($length--) 
     {
        $str .= $charset[mt_rand(0, $count-1)];
    }
    return $str;
}
 $chars = implode("", range('0', '9')).implode("", range('A', 'Z')).implode("", range('a', 'z')); 
 $fname = $_GET['fname'];
 $lname = $_GET['lname'];
 $username = $fname[0].$lname.'1';
 $to = $_GET['email'];
 $subject = "Jewelry Box Account";
 $password = 'def';//randString($chars, 24);
 $id = 'abc';//randString($chars, 24);/////while id not in db
 $body = sprintf('
<html>
<body>
Click <a href="localhost/jewelery_box/create_password_page.php">here</a> to create a password for your new account using your new username %s and your temporary password %s.
</body>
</html>
', $username, $password);
  $headers = "From: bdpoag1@cougars.ccis.edu\r\n";
  $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"\r\n";

///////////////
$con = mysql_connect("localhost","root","root");
if (!$con)
  {
  	die('Could not connect: ' . mysql_error());
  }


if (!mysql_select_db("jewelry_box", $con))
  {
  	echo("problem with jbox");
  }

$sql="INSERT INTO TEMPUSER(id, fname, lname, username, password, email)
VALUES
('$id','$_GET[fname]','$_GET[lname]', '$username', '$password','$_GET[email]')";

if (!mysql_query($sql,$con))
  {
  	die('Error: ' . mysql_error());
  }
echo "Temp User added";

mysql_close($con);
///////////////
  if (mail($to, $subject, $body, $headers)) 
  {
	   echo("<p>\n\n</p>");
	   echo($chars);
	   echo("<p>\n\n</p>");
	   echo($username);
	   echo("<p>\n\n</p>");
	   echo($password);
	   echo("<p>\n\n</p>");
	   echo("<p>Message successfully sent!</p>");
	   //add temp person and timestamp
  } 
  else 
  {
	   echo($fname);
	   echo("<p>\n\n</p>");
	   echo($lname);
	   echo("<p>\n\n</p>");
	   echo($username);
	   echo("<p>\n\n</p>");
	   echo($to);
	   echo("<p>\n\n</p>");
	   echo("<p>Message delivery failed...</p>");
  }
 //echo("<input type="submit" />");

 ?>
