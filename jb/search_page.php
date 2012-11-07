<!DOCTYPE html>
<html>
    <head>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
        <script type="text/javascript">
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
				
				$(document).ready(function()
				{
					$("#byproduct").click(function()
					{
					    $(".sb_dropdown2").show();
					});

					$("#bystore").click(function(){
					    $(".sb_dropdown2").hide();
					});
				});
				
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
				
				/*
				* selecting all checkboxes
				*/
				$ui.find('.sb_dropdown').find('label[for="all"]').prev().bind('click',function(){
					$(this).parent().siblings().find(':checkbox').attr('checked',this.checked).attr('disabled',this.checked);
				});
            });
        </script>	


    </head>

    <body>
        <div class="content">

		<div class="box" align="right" style="margin-right:10px;margin-top:5px;">
	
                <form id="ui_element" class="sb_wrapper" method="post" action="search_results_page.php">
			<!--<input type="hidden" id="session" name="session" value="<?php $_POST['session'] ?>">
			<input type="hidden" id="page" name="page" value="searchresults">!-->
                <p>
			<span class="sb_down"></span>
			<!--<input autocomplete="off" class="sb_input" style="color:white;" 
				type="text" name="inputString" onkeyup="lookup(this.value);" onblur="fill();" />
			<input class="sb_search" type="submit" name="search_submit" onclick="values_checked()" value="search"/>-->
<input class="sb_search" type="submit" name="search_submit" onclick="values_checked()" value="search" style="float:right"/>
<div style="overflow:hidden;paddingright:.5em;">
<input autocomplete="off" class="sb_input" style="color:white;width:100%;" 
				type="text" name="inputString" onkeyup="lookup(this.value);" onblur="fill();" />
</div>
		</p>
	
		<ul class="sb_dropdown" style="display:none;">
			<li class="sb_filter">Filter your search</li>

			<li><input class="sb_input2" id="byproduct" type="radio" name="search_type" value="byproduct" />
			<label for="byproduct" style="font-size:12px;color:white;"><strong>By Product</strong></label></li>
			<li><input class="sb_input2" id="bystore" type="radio" name="search_type" value="bystore"/>
			<label for="bystore" style="font-size:12px;color:white;"><strong>By Store</strong></label></li>
		</ul>
		<ul class="sb_dropdown2" style="display:none;">
			<strong><label style="font-size:20px;color:white;" >Gender</label></strong><br />
			<li><input type="checkbox" name ="gender[]" value="male" /><label for="Male">Male</label></li>
			<li><input type="checkbox" name ="gender[]" value="female" /><label for="Female">Female</label></li>
			<li><input type="checkbox" name ="gender[]" value="unisex" /><label for="Unisex">Unisex</label></li>
		</ul>
		<ul class="sb_dropdown2" style="display:none;">
			<strong><label style="font-size:20px;color:white;">Category</label></strong><br />

			<li><input type="checkbox" name ="search[]" value="wedding" /><label for="Wedding">Wedding</label></li>
			<li><input type="checkbox" name ="search[]" value="rings" /><label for="Rings">Rings</label></li>
			<li><input type="checkbox" name ="search[]" value="bracelets" /><label for="Bracelets">Bracelets</label></li>
			<li><input type="checkbox" name ="search[]" value="earrings" /><label for="Earrings">Earrings</label></li>
			<li><input type="checkbox" name ="search[]" value="necklaces" /><label for="Necklaces">Necklaces</label></li>
			<li><input type="checkbox" name ="search[]" value="brooches" /><label for="Brooches">Brooches</label></li>
			<li><input type="checkbox" name ="search[]" value="body jewelry" /><label for="body jewelry">Body Jewelry</label></li>
			<li><input type="checkbox" name ="search[]" value="belt buckles" /><label for="belt buckles">Belt Buckles</label></li>
			<li><input type="checkbox" name ="search[]" value="charms" /><label for="charms">Charms</label></li>
			<li><input type="checkbox" name ="search[]" value="watch bands" /><label for="watch bands">Watch Bands</label></li>
			<li><input type="checkbox" name ="search[]" value="children" /><label for="Children">Children</label></li>
			
			<li><input type="checkbox" name ="search[]" value="jewelry boxes" /><label for="jewelry boxes">Jewelry Boxes</label></li>
			<li><input type="checkbox" name ="search[]" value="other" /><label for="Other">Other</label></li>
		</ul>
                </form>

            </div>
        </div>

    </body>
</html>
