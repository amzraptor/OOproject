<link rel="stylesheet" type="text/css" href="css/style.css" /> <!-- Search Bar CSS !-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

<?php
session_start();
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
	/*else if($page == "searchresults")
	{
		include "search_results_page.php";
	}*/
	else if($page == "signup-in" || $page == "signup" || $page == "signin")
	{
		include "signupinpage.php";
	}
	else if($page == "cart")
	{
		include "cart.php";
	}
	else if($page == "products")
	{
		include "productspage.php";
	}
	else if($page == "logout")
	{
		unset($_SESSION['username']);
		echo "thank you visiting.... sign out success!";
	}
	else
	{
		echo"error in main";
	}
}

analysis();
?>
