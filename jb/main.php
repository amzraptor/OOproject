<!--<link rel="stylesheet" type="text/css" href="css/style.css" /> <!-- Search Bar CSS !-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

<?php
//////////////////////////////////////////////////////////////////
/*FUNCTIONS*/
//////////////////////////////////////////////////////////////////
/*header code*/
function display_header()
{
    //return "mainheader.php";
    return "scratch.php";
}
//////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////
/*homepage code*/
function display_homepage()
{
    return "revised_homepage.php";
}
//////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////
/*signupin code*/
function display_signupin()
{
    $fname = (empty($_POST['fname']) ? NULL : $_POST['fname']);
	$lname = (empty($_POST['lname']) ? NULL : $_POST['lname']);
	$username = (empty($_POST['username']) ? NULL : $_POST['username']);
	$email = (empty($_POST['email']) ? NULL : $_POST['email']);
	$password = (empty($_POST['password']) ? NULL : $_POST['password']);
	$password2 = (empty($_POST['password2']) ? NULL : $_POST['password2']);
    $_POST['action'] = (empty($_POST['action']) ? "" : $_POST['action']);

    /*if the action is signin*/
    if($_POST['action'] == "signin")
    {
        if ($username!=NULL && valid_username($username) && $password!=NULL && valid_password($password))
	    {
		    if (user_in_user($username, $password))
		    {
                //user is signed 
				$_SESSION['username'] = get_user_id($username);
			    if(email_validated($username))
			    {
				    //go to user home
				    return "revised_homepage.php";
			    }
			    else
			    {
                    //go to validate email
				    return "validateemail.php";
			    }
		    }
		    else
		    {
			    //user not found
			    $_POST['action'] = "usernamenotfound";
		    }
	    }
		elseif($username==NULL || !valid_username($username))
	    {
		    $_POST['action'] = "usernameinvalid";
	    }
	    elseif($password==NULL || !valid_password($password))
	    {
		    $_POST['action'] =  "passwordinvalid";
	    }
    }
    /*if the action is signup*/
    elseif($_POST['action'] == "signup")
    {
        if (!($fname==NULL && $lname==NULL && $username==NULL && $email==NULL && $password==NULL && $password2==NULL))
	    {
		    if ($fname!=NULL && valid_name($fname) && $lname!=NULL && valid_name($lname) && $username!=NULL && valid_username($username) && $email!=NULL && valid_email($email) && $password!=NULL && valid_password($password) && $password2!=NULL && valid_password($password2) && $password == $password2)
		    {
			    if (!username_in_use($username))
			    {
				    if(add_user($fname, $lname, $username, $password, $email) != false)
				    {
					    $_POST['action'] = "registrationsuccess";
				    }
			    }
			    else
                {
			        $_POST['action'] = "usernameinuse";
                }
		    }
		    elseif($fname==NULL || !valid_name($fname))
		    {
			    $_POST['action'] = "fnameinvalid";
		    }
		    elseif($lname==NULL || !valid_name($lname))
		    {
			    $_POST['action'] = "lnameinvalid";
		    }
		    elseif($email==NULL || !valid_email($email))
		    {
			    $_POST['action'] = "emailinvalid";
		    }
		    elseif($username==NULL || !valid_username($username))
		    {
			    $_POST['action'] = "usernameinvalid";
		    }
		    elseif($password==NULL || $password!=$password2)
		    {
			    $_POST['action'] = "passwordsdontmatch";
		    }
		    elseif($password==NULL || !valid_password($password))
		    {
			    $_POST['action'] =  "passwordinvalid";
		    }
	    }
    }
    $action = $_POST['action'];
    return "signup-in.php";
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
/*homepage code*/
function display_validateemail()
{
    $username = $_SESSION['username'];
    $validationcode = (empty($_POST['validationcode']) ? NULL : $_POST['validationcode']);
    if ($validationcode!=NULL)
    {
        if ($validationcode == valid/*get_email_valid($username)*/)
        {
            /*update_email_valid($username);*/
            return "revised_homepage.php";
        }
        else
        {
            $_POST['action'] =  "emailinvalid";
        }
    }
    return "validateemail.php";
}
//////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////
/*footer code*/
function display_footer()
{
    return "footer1.php";
}
//////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////
/*valid name code*/
function valid_name($name)
{
	if (preg_match('/^[A-Za-z_]{2,100}$/', $name))
	{
		return true;
	}
	return false;
}
//////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////
/*valid username code*/
function valid_username($username)
{
	if (preg_match('/^[A-Za-z0-9_]{3,20}$/', $username))
	{
		return true;
	}
	return false;
}
//////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////
/*valid password code*/
function valid_password($password)
{
	if (preg_match('/^[A-Za-z0-9_]{6,20}$/', $password))
	{
		return true;
	}
	return false;
}
//////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////
/*valid email code*/
function valid_email($email)
{
	if (preg_match('/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i', $email))
	{
		return true;
	}
	return false;
}
//////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////
/*display page code*/
function display_page($header, $body, $footer)
{
	sprintf("%s%s%s", include $header, include $body, include $footer);
}



//////////////////////////////////////////////////////////////////
/******************main begins***********************************/
/****************************************************************/
/****************************************************************/
//////////////////////////////////////////////////////////////////

include "db.php";//include db script
session_start(); //retrieve the session or start a new one

//check to see if the username is set if it is get the user else get the user
if(isset($_SESSION['username']))
{
	$username = $_SESSION['username'];
}
else
{
	$_SESSION['username'] = "guest";
	$username = "guest";
}

$header = display_header();

/*check that a page exist if not set page to homepage*/
$page = (empty($_POST['page']) ? "homepage" : $_POST['page']);

//display body
switch($page)
{
case "homepage":
                    $body = display_homepage($username);
                    break;
case "signupin":
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
case "validateemail":
                    $body = display_validateemail();
                    break;  
default:    
                    echo"oops there is an error in the main switch";
                    break;
}

$footer = display_footer();
display_page($header, $body, $footer);
?>
