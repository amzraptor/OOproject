$(document).ready(function(){
	var list = "<div id='logo' >     <div id='logo_image'><img src='site_images/Jewelry_Box.png' width='50' height='50' border='0'/";
		
			list = list+"></div><div id='logo_text'><a href='../index.php' >THE JEWELRY BOX</a></div>     </div>";

			list = list+"<div id='search_bar'><form action='search.php' method='post'><input name='search_text' value='' placeholder='necklace'/><input type='submit' id='search_button' value='search' /></form></div>";

			list = list+"<div id='buttons' >";

        		list = list+"<form style='float:left;margin-right:10px;' action='signin.php' method='POST'><input type='submit' value='sign in' id='signin' style='width:90px;display:none;' /></form>";

        		list = list+"<form style='float:left;margin-right:10px;' action='signup.php' method='POST'><input type='submit' value='sign up' id='signup' style='width:90px;display:none;' /></form>";

        		list = list+"<form style='float:left;margin-right:10px;' action='logout.php' method='POST'><input type='submit' value='sign out' id='logout' style='width:90px;display:none;' /></form>";

        		list = list+"<form style='float:left;margin-right:10px;' action='stores.php' method='POST'><input type='submit' value='stores' id='stores' style='width:90px;display:none;' /></form> ";

        		list = list+"<form style='float:left;margin-right:10px;' action='cart.php' method='POST'><input type='submit' value='cart' id='cart1' style='width:90px;display:none;' /></form>";

        		list = list+"<form style='float:left;margin-right:10px;' action='aboutus.php' method='POST'><input type='submit' value='about us' id='aboutus' style='width:90px;display:none;'></form></div>";

	$('#header').html(list);


});	
