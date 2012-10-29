<?php
include "db.php";//include db script

function display($header, $subheader, $body, $footer)
{
	sprintf("<!DOCTYPE html>
	<html>
	<div style='height:100%;'><div style='height:100%;'><header>%s%s</header></div><body>%s</body><footer>%s</footer></div></html>", include $header, include $subheader, include $body, include $footer);
}


function valid_name($name)
{
	if (preg_match('/^[A-Za-z_]{2,100}$/', $name))
	{
		return true;
	}
	return false;
}
function valid_username($username)
{
	if (preg_match('/^[A-Za-z0-9_]{3,20}$/', $username))
	{
		return true;
	}
	return false;
}

function valid_password($password)
{
	if (preg_match('/^[A-Za-z0-9_]{6,20}$/', $password))
	{
		return true;
	}
	return false;
}

function valid_email($email)
{
	if (preg_match('/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i', $email))
	{
		return true;
	}
	return false;
}

function signinlogic($session, $username, $password)
{	//no input display page
	if ($username==NULL && $password==NULL)
	{
		//signup-in page
		return 3;
	}
	//inputs valid and user is in db
	else if ($username!=NULL && valid_username($username) && $password!=NULL && valid_password($password))
	{
		if (user_in_user($username, $password))
		{
			if(!email_validated($username))
			{
				//user is signed in go to user home
				return 1;
			}
			else
			{
				//user email needs valid
				return 2;
			}
		}
		else
		{
			//user not found
			return 5;
		}
	}
	else
	{
		//user not info not entered correctly
		return 4;
	}

}



function signuplogic($session,$fname,$lname,$username,$email,$password,$password2)
{
	if ($fname==NULL && $lname==NULL && $username==NULL && $email==NULL && $password==NULL && $password2==NULL)
	{
		///signup-in page
		return 3;
	}
	else
	{
		if ($fname!=NULL && valid_name($fname) && $lname!=NULL && valid_name($lname) && $username!=NULL && valid_username($username) && $email!=NULL && valid_email($email) && $password!=NULL && valid_password($password) && $password2!=NULL && valid_password($password2) && $password == $password2)
		{
			if (!username_in_use($username))
			{
				if(add_user($fname, $lname, $username, $password, $email) != false)
				{
					return 8;
				}
				
			}
			//registration success
			//echo"display registration success from signuplogic";
			echo"sorry username is already in use";
			return 0;
		}
		else
		{
			//user not info not entered correctly
			return 4;
		}
		/***********************else if($fname==NULL || !valid_name($fname))
		{
			echo "fname not valid";
		}
		else if($lname==NULL || !valid_name($lname))
		{
			echo "lname not valid";
		}
		else if($email==NULL || !valid_email($email))
		{
			echo "email not valid";
		}
		else if($username==NULL || !valid_username($username))
		{
			echo "username not valid";
		}
		else if($password==NULL || !valid_email($password) || $password!=$password2)
		{
			echo "password not valid";
		}****************************/
	}
}

function signupinlogic($session)
{
	//display signup-in page
	return 3;

}

$mode = -99;
if($page == "signup-in")
{
    $mode = signupinlogic($session);
}
else if($page == "signup")
{
	$fname = (empty($_POST['fname']) ? NULL : $_POST['fname']);
	$lname = (empty($_POST['lname']) ? NULL : $_POST['lname']);
	$username = (empty($_POST['username']) ? NULL : $_POST['username']);
	$email = (empty($_POST['email']) ? NULL : $_POST['email']);
	$password = (empty($_POST['password']) ? NULL : $_POST['password']);
	$password2 = (empty($_POST['password2']) ? NULL : $_POST['password2']);
	$mode = signuplogic($session,$fname,$lname,$username,$email,$password,$password2);
}
else if($page == "signin")
{

	$un = (empty($_POST['username']) ? NULL : $_POST['username']);
	$pw = (empty($_POST['password']) ? NULL : $_POST['password']);
	$mode = signinlogic($session, $un, $pw);
}

$header = "";
$subheader = "";
$body = "";
$footer = "";
switch($mode)
{
case 0:
	//display guest homepage
	$header = "guestheader.php";
	$subheader = "guestsubheader.php";
	$body = "homepage.php";
	$footer = "footer1.php";
	break;
case 1:
	//user home page
	$header = "userheader.php";
	$subheader = "guestsubheader.php";
	$body = "homepage.php";
	$footer = "footer1.php";
	break;
case 2:
	//inputs valid and user email is not validated
	$header = "guestheader.php";
	$subheader = "guestsubheader.php";
	$body = "validateemail.php";
	$footer = "footer1.php";
	break;
case 3:
	////signup-in page
	$header = "guestheader.php";
	$subheader = "guestsubheader.php";
	$body = "signup-in.php";
	$footer = "footer1.php";
	break;
case 4:
	//one or more fields has been entered incorrectly
	$header = "guestheader.php";
	$subheader = "guestsubheader.php";
	$body = "signup-inbadfield.php";
	$footer = "footer1.php";
	break;
case 5:
	//user and password combo not found in db
	$header = "guestheader.php";
	$subheader = "guestsubheader.php";
	$body = "usernotfound.php";
	$footer = "footer1.php";
	break;
case 6:
	//
	break;
case 7:
	//
	break;
case 8:
	//display registration page if reg successfull
	$header = "guestheader.php";
	$subheader = "guestsubheader.php";
	$body = "registration.php";
	$footer = "footer1.php";
	break;
default:
	$header = "guestheader.php";
	$subheader = "guestsubheader.php";
	$body = "homepage.php";
	$footer = "footer1.php";
	break;
}

display($header, $subheader, $body, $footer);

?>
