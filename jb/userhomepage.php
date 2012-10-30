<?php
function display($header, $subheader, $body, $footer)
{
	sprintf("<!DOCTYPE html>
	<html>
	<div style='height:100%;'><div style='height:100%;'><header>%s%s</header></div><body>%s</body><footer>%s</footer></div></html>", include $header, include $subheader, include $body, include $footer);
}

function userhomelogic($session)
{
	/*if no session*/
	if ($session == NULL)
	{
		echo"sorry there is no session";
	}
	else
	{
		//display user homepage
		return 1;
		
	}
echo"error userhome";
return -99;
}
$session = (empty($_POST['session']) ? NULL : $_POST['session']);
$session = "1234";////////////////////////
$mode = userhomelogic($session);
switch($mode)
{
case 1:
	//user home page
	$header = "userheader.php";
	$subheader = "guestsubheader.php";
	$body = "homepage.php";
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
