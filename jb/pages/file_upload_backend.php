<?php
	include "../db/db.php";
	session_start();
	$arr = array ('error'=>"");
	if($_POST['pic']=="background" && save_info($_SESSION['store_id'], 'img1', $_POST['file']) != true)
	{
		$arr['error'] = 'error saving info';
	}
	else if($_POST['pic']=="banner" && save_info($_SESSION['store_id'], 'img2', $_POST['file']) != true)
	{
		$arr['error'] = 'error saving info';
	}
	else if($_POST['pic']=="author" && save_info($_SESSION['store_id'], 'img3', $_POST['file']) != true)
	{
		$arr['error'] = 'error saving info';
	}
	echo json_encode($arr);
?>
