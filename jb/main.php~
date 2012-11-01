<?php

function analysis()
{

	$page = (empty($_POST['page']) ? "guesthome" : $_POST['page']);
//echo"!page $page!\n";
	
	//analysis input and determine mode 1.by page 2. by page logic
	if($page == "guesthome")
	{
		include "guesthomepage.php";
	}
	else if($page == "userhome")
	{
		include "userhomepage.php";
	}
	else if($page == "signup-in" || $page == "signup" || $page == "signin")
	{
		//echo"hello zaki";
		include "signupinpage.php";
	}
	else if($page == "cart")
	{
		include "cartpage.php";
	}
	else if($page == "products")
	{
		include "productspage.php";
	}
	else if($page == "logout")
	{
	}
	else
	{
		echo"error in main";
	}
}

analysis();
?>
