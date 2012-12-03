<?php 
 $message = 'To: bdpoagdorado1@gmail.com\nFrom: bdpoagdorado1@gmail.com \nSubject: Jewelry Box Registration\n\nWelcome to the Jewelry Box the validation code is myemailisvalid, you may signin to your new account!';

exec("echo -e '$message' | ssmtp bdpoagdorado1@gmail.com");


?>
