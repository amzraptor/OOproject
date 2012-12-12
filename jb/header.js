$(document).ready(function(){
	var list = "<div id='logo' >     <div id='logo_image'><img src='site_images/Jewelry_Box.png' width='50' height='50' border='0'/";
		
			list = list+"></div><div id='logo_text'><a href='header.php' >THE JEWELRY BOX</a></div>     </div>";

			list = list+"<div id='search_bar'><input type='text' placeholder='necklace ... '></input><input type='submit' value='search' style='width:90px;'></input></div>";

			list = list+"<div id='buttons' >";

        		list = list+"<form style='float:left;margin-right:10px;' action='signin.php' method='POST'><input type='submit' value='sign in' id='signin' style='width:90px;display:none;' /></form>";

        		list = list+"<form style='float:left;margin-right:10px;' action='signup.php' method='POST'><input type='submit' value='sign up' id='signup' style='width:90px;display:none;' /></form>";

        		list = list+"<form style='float:left;margin-right:10px;' action='logout.php' method='POST'><input type='submit' value='sign out' id='logout' style='width:90px;display:none;' /></form>";

        		list = list+"<form style='float:left;margin-right:10px;' action='manage.php' method='POST'><input type='submit' value='stores' id='stores' style='width:90px;display:none;' /></form> ";

        		list = list+"<form style='float:left;margin-right:10px;' action='cart.php' method='POST'><input type='submit' value='cart' id='cart1' style='width:90px;display:none;' /></form>";

        		list = list+"<form style='float:left;margin-right:10px;' action='aboutus.php' method='POST'><input type='submit' value='about us' id='aboutus' style='width:90px;display:none;'></form></div>";

	$('#header').html(list);
	var username = '<?php echo $username; ?>';
/////////////////////////////////////////////
	if(username == 'guest')
	{
		$('#signin').show(); //
		$('#signup').show(); //
		$('#aboutus').show(); //
		$('#cart1').show(); //
	}
	else
	{
		$('#stores').show(); //
		$('#logout').show(); //
		$('#cart1').show(); //
		$('#aboutus').show(); //
	}

/////////////////////////////////////////////

});	
