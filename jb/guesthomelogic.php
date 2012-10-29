<?php

function guesthomelogic($session)
{
	/*if no session*/
	if ($session == NULL)
	{
//echo"inside  guesthome";
		//start a session
		//start_session();
		//display guest homepage first time
		return 0;
	}
	else 
	{
		//display guest homepage not first time
		return 0;
	}

}
?>
