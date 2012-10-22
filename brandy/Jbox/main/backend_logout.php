<?php
function get_user_id($session_id)
{
	return "456";
}

function logout($user_id)
{
	return true;
}

$session_id = '123';
$user_id = get_user_id($session_id);
if (logout($user_id))
{
	echo ("
<html>
<body>

<form action='../generic_homepage.php' method='post'>
Thanks for visiting!
<input type='submit' />
</form>
</body>
</html>");
}
else 
{
	echo ("problem loging out");
}
?>
