<?php 
$action = $_POST['action'];
switch($action)
{
case "start":
	{
		session_start();
	      	if(empty($_SESSION['user']))
		{
		      $_SESSION['user'] = "guest";
		}
		echo $_SESSION['user'];
		break;
	}
case "validate":
	{
		echo $_POST['username'];
	}
default:
	{
		echo "error";
	}
}
?>
