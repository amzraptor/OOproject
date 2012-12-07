<?php 

$search = "";

if(empty($_POST['search_text']))
{
	$search = "necklace";
} 
else
{
	$search = $_POST['search_text'];
}

?>

<!doctype html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="css/styles.css">

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="jpages.js"></script>

<style>
 .holder {
    margin:15px 0;
}
.holder a {
    font-size:12px;
    cursor:pointer;
    margin:0 5px;
    color:#333;
}
.holder a:hover {
    background-color:#222;
    color:#fff;
}
.holder a.jp-previous {
    margin-right:15px;
}
.holder a.jp-next {
    margin-left:15px;
}
.holder a.jp-current,a.jp-current:hover {
    color:#FF4242;
    font-weight:bold;
}
.holder a.jp-disabled,a.jp-disabled:hover {
    color:#bbb;
}
.holder a.jp-current,a.jp-current:hover,.holder a.jp-disabled,a.jp-disabled:hover {
    cursor:default;
    background:none;
}
.holder span {
    margin: 0 5px;
}

#product_display {
border: 3px solid #2d3035;
background-color:#2d4044;
width:210px;
height:250px;
color:#fff;
font-weight:bold;	
}

</style>

</head>

<body>

	<div align="center" style="width:100%;">

		<div  style="float:center;min-width:880px;max-width:880px;">
			<form action="" method="post">
				<input name="search_text" value="" placeholder="necklace"/>
				<input type="submit" id="search_button" value="search" />
			</form>
		</div>

	<div class="holder">
		</div>

	</div>

	<ul id="itemContainer">
	</ul>


</body>

<script type="text/javascript">
$(document).ready(function(){
	  var search_word = "<?php echo $search; ?>";
	  var search_string = {"search_words": search_word};

	  $.ajax(
		{
			url:"jquery_test_backend.php",
			data:search_string,
			type:"post",
			dataType:"json",
			success:function(result)
					{ 
						var list = "";
						for (var i=0;i< result.length;i++)
						{ 
							list = list+"<li id='product_display' style='float:left;margin:30px;'>";
							list = list+"<img style='margin-left:5px;margin-top:5px;' src='";
							list = list+result[i].img1;
							list = list+"' width='200' height='200'/ ><br / >";
							list = list+"<span style='text-align:center;display:block;'>";
							list = list+result[i].name;
							list = list+"</span>";
							list = list+"<div id='description' style='text-align:block;display:none;background-color:#000;'><div>";
							list = list+result[i].description;
							list = list+"</div>";
							list = list+"<form action='product_display.php' method='post'><input type='submit' value='more'/ >";
							list = list+"<input type='hidden' name='product_id' value='"+result[i].product_id+"' / >";
							list = list+"<input type='hidden' name='product_image' value='"+result[i].img1+"' / >";
							list = list+"<input type='hidden' name='product_description' value='"+result[i].description+"' / >";
							list = list+"<input type='hidden' name='product_price' value='"+result[i].price+"' / >";
							list = list+"<input type='hidden' name='product_size' value='"+result[i].size+"' / >";
							list = list+"<input type='hidden' name='product_color' value='"+result[i].color+"' / >";
							list = list+"<input type='hidden' name='product_material' value='"+result[i].material+"' / >";
							list = list+"</form></div></li>";
						}

						$('#itemContainer').append(list);
						$("div.holder").jPages(
						{
							containerID  : "itemContainer",
							perPage      : 10,
							startPage    : 1,
							startRange   : 1,
							midRange     : 5,
							endRange     : 1
						});
						
						$('#itemContainer li').hover(function(){
								$(this).children('#description').show()},function(){
								$(this).children('#description').hide();
						});
					},

			error:function(e){alert("there was an error");}
		});

});
</script>

</html>


<!--
<div style="height:100%;width:100%;">
<div>
<div style="width:100%;">

<div style="width:30%;float:left;">

<ul id="cat_list">
	<strong><label style="font-size:20px;">Category</label></strong><br />
	<li><input type="radio" name ="category[]" value="wedding" /><label for="Wedding">Wedding</label></li>
	<li><input type="radio" name ="category[]" value="rings" /><label for="Rings">Rings</label></li>
	<li><input type="radio" name ="category[]" value="bracelets" /><label for="Bracelets">Bracelets</label></li>
	<li><input type="radio" name ="category[]" value="earrings" /><label for="Earrings">Earrings</label></li>
	<li><input type="radio" name ="category[]" value="necklaces" /><label for="Necklaces">Necklaces</label></li>
	<li><input type="radio" name ="category[]" value="brooches" /><label for="Brooches">Brooches</label></li>
	<li><input type="radio" name ="category[]" value="body jewelry" /><label for="body jewelry">Body Jewelry</label></li>
	<li><input type="radio" name ="category[]" value="belt buckles" /><label for="belt buckles">Belt Buckles</label></li>
	<li><input type="radio" name ="category[]" value="charms" /><label for="charms">Charms</label></li>
	<li><input type="radio" name ="category[]" value="watch bands" /><label for="watch bands">Watch Bands</label></li>
	<li><input type="radio" name ="category[]" value="children" /><label for="Children">Children</label></li>
	<li><input type="radio" name ="category[]" value="jewelry boxes" /><label for="jewelry boxes">Jewelry Boxes</label></li>
	<li><input type="radio" name ="category[]" value="other" /><label for="Other">Other</label></li>
</ul>
</div>
<div style="width:70%;float:left;">
<ul id="color_list">
	<strong><label style="font-size:20px;">Color</label></strong><br />
	<li><input type="checkbox" name ="color[]" value="black" />Black</li>
	<li><input type="checkbox" name ="color[]" value="white" />White</li>
	<li><input type="checkbox" name ="color[]" value="red" />Red</li>
	<li><input type="checkbox" name ="color[]" value="green" />Green</li>
	<li><input type="checkbox" name ="color[]" value="blue" />Blue</li>
	<li><input type="checkbox" name ="color[]" value="yellow" />Yellow</li>
	<li><input type="checkbox" name ="color[]" value="gold" />Gold</li>
	<li><input type="checkbox" name ="color[]" value="bronze" />Bronze</li>
	<li><input type="checkbox" name ="color[]" value="silver" />Silver</li>
	<li><input type="checkbox" name ="color[]" value="purple" />Purple</li>
	<li><input type="checkbox" name ="color[]" value="other" />Other</li>
</ul>
</div>
</div>
</div>
!-->


