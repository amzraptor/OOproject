<?php 
include "../db/db.php";
$action = $_POST['action'];
session_start();
switch($action)
{
case 'email':
	{
		$arr = array ();
		$arr['error'] = 'none';
		if (!empty($_POST['email']) && !empty($_POST['subject']) && !empty($_POST['message']) && !empty($_POST['from']) )
		{
			$email = $_POST['email'];
			$subject = $_POST['subject'];
			$message = $_POST['message'];
			$from = $_POST['from'];
		
			 $mail = "To: $email\nFrom: $from \nSubject: $subject\n\n$message";

			exec("echo -e '$mail' | ssmtp $email");

		}
		else
		{
			$arr['error'] = 'Info not valid';
		}
		echo json_encode($arr);
		break;
	}

default:
	{
		echo "from index backend error";
		break;
	}
}
?>


