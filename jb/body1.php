<?php
echo("send mail\n");
if (mail("bdpoagdorado1@cougars.ccis.edu", "tester", "hi bdog")) 
	{
            echo("<p>A link has been sent to your email along with your new user name and your temporary password!\n</p>");
	}
else
{
echo("not mailing\n");
}
echo("done");
?>
