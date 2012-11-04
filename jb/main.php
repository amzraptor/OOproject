<link rel="stylesheet" type="text/css" href="css/style.css" /> <!-- Search Bar CSS !-->
<?php
//////////////////////////////////////////////////////////////////
/*FUNCTIONS*/
//////////////////////////////////////////////////////////////////
/*header code*/
function display_header()
{
    return "mainheader.php";
}
//////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////
/*homepage code*/
function display_homepage()
{
    ///html to be displayed
    return "homepage.php";
}
//////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////
/*signupin code*/
function display_signupin()
{
    include "signupinpage.php";
}

//////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////
/*cart code*/
function display_cart()
{
    include "cart.php";
}
//////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////
/*products code*/
function display_products()
{
	include "productspage.php";
}
//////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////
/*logout code*/
function display_logout()
{
	unset($_SESSION['username']);
	echo "thank you visiting.... sign out success!";
}
//////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////
/*footer code*/
function display_footer()
{
    return "footer1.php";
}
//////////////////////////////////////////////////////////////////
function display_page($header, $body, $footer)
{
	sprintf("<!DOCTYPE html>
	<html>
	<div style='height:100%;'><div style='height:100%;'><header>%s</header></div><body>%s</body><footer>%s</footer></div></html>", include $header, include $body, include $footer);
}


//////////////////////////////////////////////////////////////////
/*main begins*/
session_start();
$header = display_header();

/*check that a body exist if not set body to homepage*/
$page = (empty($_SESSION['page']) ? "homepage" : $_SESSION['page']);
//display body
switch($page)
{
case "homepage":
                    $body = display_homepage();
                    break;
case "signupin":
case "signup":
case "signin":
                    $body = display_signupin();
                    break;
case "cart":
                    $body = display_cart();
                    break;
case "products":
                    $body = display_products();
                    break;
case "logout":
                    $body = display_logout();
                    break;
default:    
                    echo"oops there is an error in the main switch";
                    break;
}

$footer = display_footer();
display_page($header, $body, $footer);
?>
