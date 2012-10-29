<?php
include "db.php";//include db script
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


function signuplogic($session,$fname,$lname,$username,$email,$password,$password2)
{
//registration success?
//echo"inside  signuplogic fname $fname";
	//if no session
	
	if ($session!=NULL)
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
				if (username_in_use($username))
				{
					echo"sorry username is already in use";
					return 0;
				}
				//registration success
				//echo"display registration success from signuplogic";
				add_user($fname, $lname, $username, $password, $email);
				return 8;
			}
			else
			{
				//user not info not entered correctly
				return 4;
			}
			/*else if($fname==NULL || !valid_name($fname))
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
			}*/
		}
	}
	echo"error inside  signuplogic or no session";
	return 0;
}
?>
