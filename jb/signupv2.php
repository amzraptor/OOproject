<?php
function brandy()
{
return true; //$_POST['inp'];
}

function anal()
{
//anal input and determine mode

//no input display page
if (empty($_POST['username']) && empty($_POST['password']))
{
//
$mode = 0;
}
//inputs valid and user email is validated
//inputs valid and user email is not validated
//username not valid
//password not valid
switch($mode)
{
case 0:
	//this is the first time info
	echo "<!DOCTYPE html>
<html>
<body>
<div style='width=100%'>
<div style='float:left;height=400px;width:40%;margin-top:50px;margin-left:250px;'>
<form action='display_page.php' method='POST' style='height=400px;border-style:solid;padding-top:10px;padding-left:30px;'>
<p style='font-family:'Comic Sans MS', cursive, sans-serif;'>
Login</p>
<label>Username</label></br>
<input type='text' style='width:50%'> </br>
<label>Password</label></br>
<input type='text' style='width:50%'> </br></br>
<input style='font-family:'Comic Sans MS', cursive, sans-serif;' type='submit' value='submit'> </br></br></br>
</form>
</div>
</div>
</body>
</html>";
	break;
case 1:
	//inputs valid and user email is validated
	echo "hey 1";
	break;
case 2:
	//inputs valid and user email is not validated
	echo "hey 2";
	break;
case 3:
	//user name not valid
	echo "hey 3";
	break;
case 4:
	//password not valid
	echo "hey 4";
	break;
default:
	echo "no mode found";
}

}

anal();
?>
