<?php
session_start();
$sessionid = session_id();
if(empty($_SESSION['user']))
{
      $_SESSION['user'] = "guest";
      $username = "guest";
}
else
{
      $username = $_SESSION['user'];
}
echo"$username and $sessionid";

?>

<!DOCTYPE html>
<html>
<form action="se2.php" method="POST">
<input type="submit" value="submit"/>
</form>
</html>
