<?php
function display($header, $subheader, $body, $footer)
{
	sprintf("<!DOCTYPE html>
	<html>
	<div style='height:100%;'><div style='height:100%;'><header>%s%s</header></div><body>%s</body><footer>%s</footer></div></html>", include $header, include $subheader, include $body, include $footer);
}

function ??????

$mode = ????????
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

?>
