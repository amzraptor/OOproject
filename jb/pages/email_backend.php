<?php 
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$from = $_POST['from'];
 $mail = "To: $email\nFrom: $from \nSubject: $subject\n\n$message";

exec("echo -e '$mail' | ssmtp $email");


?>
