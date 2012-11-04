<?php
session_start();
function display($header, $subheader, $body, $footer)
{
sprintf("<!DOCTYPE html>
<html>
<div style='height:100%;'><div style='height:100%;'><header>%s</header></div><body>%s</body><footer>%s</footer></div></html>", include $header, include $body, include $footer);
}

function guesthomelogic($session)
{
	//display guest homepage not first time
	return 0;
}


$mode = guesthomelogic($session);
switch($mode)
{
case 0:
//display guest homepage
$header = "mainheader.php";
$body = "homepage.php";
$footer = "footer1.php";
break;
default:
$header = "guestheader.php";
$body = "body1.php";
$footer = "footer1.php";
break;
}

display($header, $subheader, $body, $footer);

?>
