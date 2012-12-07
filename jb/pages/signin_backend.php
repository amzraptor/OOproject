<?php 
session_start();
include "../db/db.php";//include db script


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
$action = $_POST['action'];
switch($action)
{
case "validate":
	{
		$username = (empty($_POST['username']) ? NULL : $_POST['username']);
		$password = (empty($_POST['password']) ? NULL : $_POST['password']);
		//echo "username: ".$username."password: ".$password."!";

        if ($username!=NULL && valid_username($username) && $password!=NULL && valid_password($password))
	    {
		    if (user_in_user($username, $password))
		    {
                		//user is signed 
				$_SESSION['user'] = $username;

				$arr = array ('result'=>"gotohomepage");
				echo json_encode($arr);
				break;
		    }
		    else
		    {
			    //user not found
			    $arr = array ('result'=>"usernamenotfound");
		            echo json_encode($arr);
			    break;
		    }
	    }
	    elseif($username==NULL || !valid_username($username))
	    {
		    $arr = array ('result'=>"usernameinvalid");
		    echo json_encode($arr);
		    break;
	    }
	    elseif($password==NULL || !valid_password($password))
	    {
		    $arr = array ('result'=>"passwordinvalid");
		    echo json_encode($arr);
		    break;
	    }
	    $arr = array ('result'=>"form empty");
	    echo json_encode($arr);
	    break;
	}
default:
	{
		$arr = array ('result'=>"gotohomepage");
		echo json_encode($arr);
		break;
	}
}
?>

















