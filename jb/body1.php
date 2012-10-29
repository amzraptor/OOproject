<?php
/*echo("send mail\n");
if (mail("bdpoagdorado1@cougars.ccis.edu", "tester", "hi bdog")) 
	{
            echo("<p>A link has been sent to your email along with your new user name and your temporary password!\n</p>");
	}
else
{
echo("not mailing\n");
}
echo("done");*/

$message = "Thanks for signing up. DID IT WORK?";


$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'To: Brandy Poag-Dorado <bdpoagdorado1@cougars.ccis.edu>' . "\r\n";
$headers .= 'From: Brandy Poag <bdpoagdorado1@gmail.com>' . "\r\n";
$headers .= 'Cc: bdpoagdorado1@gmail.com' . "\r\n";
$headers .= 'Bcc: bdpoagdorado1@gmail.com' . "\r\n";	


if(mail("bdpoagdorado1@cougars.ccis.edu","The Jewelry Box. Thanks for signing up!",$message,$headers))
{
	echo "working";
}
else
{
	echo "not working";
}
?>
