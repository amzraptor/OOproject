<?php

function signupinlogic($session)
{
	//echo "hola";
	/*if no session*/
	if ($session != NULL)
	{
		//display signup-in page
		return 3;
	}
	//error
	echo "error inside signup-inlogic";
	return -99;

}
?>
