$(document).ready(function(){
	var list = "<div id='logo' ><div id='logo_image'><img src='site_images/Jewelry_Box.png' width='50' height='50' border='0'/";
		
			list = list+"></div><div id='logo_text'><a href='../index.php' >THE JEWELRY BOX</a></div>     </div>";

			list = list+"<div id='search_bar'><form action='search.php' method='post'><input id='sb_input' name='search_text' onclick='search_dropdown()' onblur='search_dropdown2()'value='' placeholder='necklace'/><input type='submit' id='search_button' value='search' /><div id='dropdown' style='width:180px;height:40px;background-color:#444;-moz-border-radius: 5px;-webkit-border-radius: 5px;color:#fff;'><input type='radio' name='search_type' value='by product'>by product</input><br /><input type='radio' name='search_type' value='by store'>by store</input></div></form></div>";

			list = list+"<div id='buttons' >";

        		list = list+"<form style='float:left;margin-right:10px;' action='signin.php' method='POST'><input type='submit' value='sign in' id='signin' style='width:90px;display:none;' /></form>";

        		list = list+"<form style='float:left;margin-right:10px;' action='signup.php' method='POST'><input type='submit' value='sign up' id='signup' style='width:90px;display:none;' /></form>";

        		list = list+"<form style='float:left;margin-right:10px;' action='logout.php' method='POST'><input type='submit' value='sign out' id='logout' style='width:90px;display:none;' /></form>";

        		list = list+"<form style='float:left;margin-right:10px;' action='stores.php' method='POST'><input type='submit' value='stores' id='stores' style='width:90px;display:none;' /></form> ";

        		list = list+"<form style='float:left;margin-right:10px;' action='cart.php' method='POST'><input type='submit' value='cart' id='cart1' style='width:90px;display:none;' /></form>";

        		list = list+"<form style='float:left;margin-right:10px;' action='aboutus.php' method='POST'><input type='submit' value='about us' id='aboutus' style='width:90px;display:none;'></form></div>";

	$('#header').html(list);
	$('#dropdown').hide();
});	

function search_dropdown() {

	$('#dropdown').show();

}

function search_dropdown2() {

	//$('#dropdown').hide();

}


 $(function() {
				/*
				* the element
				*/
				var $ui = $('#ui_element');
				
				/*
				* on focus and on click display the dropdown, 
				* and change the arrow image
				*/
				$ui.find('.sb_input').bind('focus click',function(){
					$ui.find('.sb_down')
					   .addClass('sb_up')
					   .removeClass('sb_down')
					   .andSelf()
					   .find('.sb_dropdown')
					   .show();

				});
				

				/*$(document).ready(function()
				{
					$("#byproduct").click(function()
					{
					    $(".sb_dropdown2").show();
					});

					$("#bystore").click(function(){
					    $(".sb_dropdown2").hide();
					});
				});*/
				
				/*
				* on mouse leave hide the dropdown, 
				* and change the arrow image
				*/
				$ui.bind('mouseleave',function(){
					$ui.find('.sb_up')
					   .addClass('sb_down')
					   .removeClass('sb_up')
					   .andSelf()
					   .find('.sb_dropdown')
					   .hide();

					$(".sb_dropdown2").hide();
				});
            });
