<?php 
$action = $_POST['action'];
switch($action)
{
case "start":
	{
		$arr = array ('result'=>"goood");
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
