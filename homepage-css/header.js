$(document).ready(function(){
	var list = "<div id='logo' >     <div id='logo_image'><img src='Jewelry_Box.png' width='50' height='50' border='0'/";
		
			list = list+"></div><div id='logo_text'><a href='header.php' >THE JEWELRY BOX</a></div>     </div>";

			list = list+"<div id='search_bar'><input type='text' placeholder='necklace ... '></input><input type='submit' value='search'></input></div>";

			list = list+"<div id='buttons' >";


        		list = list+"<form action='signin.php' method='POST'><input id='signin' style='width:90px;display:none;' type='submit' value='Sign In'></input></form>";

        		list = list+"<form action='signup.php' method='POST'><input id='signup' style='width:90px;display:none;' type='submit' value='Sign Up'></input></form>";

        		list = list+"<form action='logout.php' method='POST'><input id='logout' style='width:90px;display:none;' type='submit' value='Logout'></input></form>";

        		list = list+"<form action='stores.php' method='POST'><input id='stores' style='width:90px;display:none;' type='submit' value='Stores'></input></form>";

        		list = list+"<form action='cart.php' method='POST'><input id='cart1' style='width:90px;display:none;' type='submit' value='Cart'></input></form>";

        		list = list+"<form action='aboutus.php' method='POST'><input id='aboutus' style='width:90px;display:none;' type='submit' value='About Us'></input></form></div>";

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
