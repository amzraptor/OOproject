<?php
function display($header, $subheader, $body, $footer)
{
	sprintf("<!DOCTYPE html>
	<html>
	<div style='height:100%;'><div style='height:100%;'><header>%s%s</header></div><body>%s</body><footer>%s</footer></div></html>", include $header, include $subheader, include $body, include $footer);
}

function anal()
{

	$page = (empty($_POST['page']) ? "guesthome" : $_POST['page']);
//echo"!page $page!\n";
	
	//anal input and determine mode 1.by page 2. by page logic
	if($page == "guesthome")
	{
		$session = (empty($_POST['session']) ? NULL : $_POST['session']);
		include "guesthomelogic.php";
		$mode = guesthomelogic($session);
	}
	else if($page == "userhome")
	{
		$session = (empty($_POST['session']) ? NULL : $_POST['session']);
/************************/$session = '1234';
		include "userhomelogic.php";
		$mode = userhomelogic($session);
	}
	else if($page == "signup-in")
	{
//echo"**page signup-in from main**\n";
		$session = (empty($_POST['session']) ? NULL : $_POST['session']);
/************************/$session = '1234';
		include "signup-inlogic.php";
		$mode = signupinlogic($session); 
	}
	else if($page == "logout")
	{
	}
	else if($page == "signup")
	{
		$session = (empty($_POST['session']) ? NULL : $_POST['session']);
		$fname = (empty($_POST['fname']) ? NULL : $_POST['fname']);
		$lname = (empty($_POST['lname']) ? NULL : $_POST['lname']);
		$username = (empty($_POST['username']) ? NULL : $_POST['username']);
		$email = (empty($_POST['email']) ? NULL : $_POST['email']);
		$password = (empty($_POST['password']) ? NULL : $_POST['password']);
		$password2 = (empty($_POST['password2']) ? NULL : $_POST['password2']);
/************************/$session = '1234';
		include "signuplogic.php";
		$mode = signuplogic($session,$fname,$lname,$username,$email,$password,$password2);
	}
	else if($page == "signin")
	{

		$un = (empty($_POST['username']) ? NULL : $_POST['username']);
		$pw = (empty($_POST['password']) ? NULL : $_POST['password']);
/************************/$session = '1234';
		include "signinlogic.php";
		$mode = signinlogic($session, $un, $pw);
	}
	else
	{
		$mode = -99;
	}
//echo"mode $mode\n";
	switch($mode)
	{
	case 0:
		//display guest homepage
		$header = "guestheader.php";
		$subheader = "subheader1.php";
		$body = "homepage.php";
		$footer = "footer1.php";
		break;
	case 1:
		//user home page
		$header = "userheader.php";
		$subheader = "subheader1.php";
		$body = "homepage.php";
		$footer = "footer1.php";
		break;
	case 2:
		//inputs valid and user email is not validated
		$header = "guestheader.php";
		$subheader = "subheader1.php";
		$body = "validateemail.php";
		$footer = "footer1.php";
		break;
	case 3:
		////signup-in page
		$header = "guestheader.php";
		$subheader = "subheader1.php";
		$body = "signup-in.php";
		$footer = "footer1.php";
		break;
	case 4:
		//one or more fields has been entered incorrectly
		$header = "guestheader.php";
		$subheader = "subheader1.php";
		$body = "signup-inbadfield.php";
		$footer = "footer1.php";
		break;
	case 5:
		//user and password combo not found in db
		$header = "guestheader.php";
		$subheader = "subheader1.php";
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
		$subheader = "subheader1.php";
		$body = "registration.php";
		$footer = "footer1.php";
		break;
	default:
		$header = "guestheader.php";
		$subheader = "subheader1.php";
		$body = "body1.php";
		$footer = "footer1.php";
		break;
	}

	display($header, $subheader, $body, $footer);

}

anal();
?>
