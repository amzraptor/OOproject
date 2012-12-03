<?php 
include "../db/db.php";//include db script
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

$action = $_POST['action'];
switch($action)
{
case "validate":
	{
	$fname = (empty($_POST['fname']) ? NULL : $_POST['fname']);
	$lname = (empty($_POST['lname']) ? NULL : $_POST['lname']);
	$username = (empty($_POST['username']) ? NULL : $_POST['username']);
	$email = (empty($_POST['email']) ? NULL : $_POST['email']);
	$password = (empty($_POST['password']) ? NULL : $_POST['password']);
	$password2 = (empty($_POST['password2']) ? NULL : $_POST['password2']);
		///echo "username: ".$username."password: ".$password."!";

////////////////////////////////////////////////////////////////////////////////////////////////
		if (!($fname==NULL && $lname==NULL && $username==NULL && $email==NULL && $password==NULL && $password2==NULL))
		    {
			    if ($fname!=NULL && valid_name($fname) && $lname!=NULL && valid_name($lname) && $username!=NULL && valid_username($username) && $email!=NULL && valid_email($email) && $password!=NULL && valid_password($password) && $password2!=NULL && valid_password($password2) && $password == $password2)
			    {
				    if (!username_in_use($username))
				    {
					    if(add_user($fname, $lname, $username, $password, $email) != false)
					    {
 						   $message = sprintf('To: %s\nFrom: bdpoagdorado1@gmail.com \nSubject: Jewelry Box Registration\n\nWelcome to the Jewelry Box the validation code is myemailisvalid, you may signin to your new account!',$email);

						    exec("echo -e '$message' | ssmtp bdpoagdorado1@gmail.com");
						    $arr = array ('result'=>"registrationsuccess");
						    echo json_encode($arr);
						    break;

					    }
					    else
					    {
						    $arr = array ('result'=>"registrationfail");
						    echo json_encode($arr);
						    break;

					    }
				    }
				    else
		        	    {
					$arr = array ('result'=>"usernameinuse");
					echo json_encode($arr);
					break;
		                    }
			    }
			    elseif($fname==NULL || !valid_name($fname))
			    {
				    $arr = array ('result'=>"fnameinvalid");
				    echo json_encode($arr);
				    break;
			    }
			    elseif($lname==NULL || !valid_name($lname))
			    {
				    $arr = array ('result'=>"lnameinvalid");
				    echo json_encode($arr);
				    break;
			    }
			    elseif($email==NULL || !valid_email($email))
			    {
				    $arr = array ('result'=>"emailinvalid");
				    echo json_encode($arr);
				    break;
			    } 
			    elseif($username==NULL || !valid_username($username))
			    {
				    $arr = array ('result'=>"usernameinvalid");
				    echo json_encode($arr);
				    break;
			    }
			    elseif($password==NULL || $password!=$password2)
			    {
				    $arr = array ('result'=>"passwordsdontmatch");
				    echo json_encode($arr);
				    break;
			    }
			    elseif($password==NULL || !valid_password($password))
			    {
				    $arr = array ('result'=>"passwordinvalid");
				    echo json_encode($arr);
				    break;
			    }
			    else
			    {
				    $arr = array ('result'=>"error in signup validation");
				    echo json_encode($arr);
				    break;
			    }
		    }
		$arr = array ('result'=>"form empty");
		echo json_encode($arr);
		break;
	}
default:
	{
		$arr = array ('result'=>"in signin backend error");
		echo json_encode($arr);
		break;
	}
}
?>
























