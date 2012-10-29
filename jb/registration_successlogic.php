<?php
function valid_fname($fname)
{
	return true;
}

function valid_lname($lname)
{
	return true;
}

function valid_username($username)
{
	return true;
}

function valid_password($password)
{
	return true;
}

function valid_email($email)
{
	return true;
}


function registration_successlogic($session,$fname,$lname,$username,$password,$password2)
{
	return 8;
	/*echo"vales $session,$fname,$lname,$username,$password,$password2";
	
	//if no session
	if ($session!=NULL)
	{
		if ($fname==NULL && $lname==NULL && $username==NULL && $email==NULL && $password==NULL && $password2==NULL)
		{
			//display guest homepage first time
			return 7;
		}
		else
		{
			if ($fname!=NULL && valid_fname($fname) && $lname!=NULL && valid_lname($lname) && $username!=NULL && valid_username($username) && $email!=NULL && valid_email($email) && $password!=NULL && valid_password($password) && $password2!=NULL && valid_password($password2) && $password == $password2)
			{
				//registration success
				add_user($fname, $lname, $username, $password, $email);
				return 8;
			}
		}
	}
	else
	{
		//error oops no session
		return -99;
	}*/
}
?>
