<?php
include "db.php";//include db script
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

function signinlogic($session, $username, $password)
{
//echo"inside  signinlogic";
	if ($session!=NULL)
	{
		"error session is null";
	
		//no input display page
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
				if(email_validated($username))
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
	//error
	echo"error inside  signinlogic or no session";
	return 0;
	
}
?>
