<!-- Search Bar CSS !-->

<script type="text/javascript">
$("#slideshow div:gt(0)").hide();

setInterval(function() { 
  $('#slideshow div:first')
    .fadeOut(1000)
    .next()
    .fadeIn(1000)
    .end()
    .appendTo('#slideshow');
},  6000);

$("#slideshow2 div:gt(0)").hide();

setInterval(function() { 
  $('#slideshow2 div:first')
    .fadeOut(1000)
    .next()
    .fadeIn(1000)
    .end()
    .appendTo('#slideshow2');
},  6000);

</script>

<div id="body_background" style="height:100%;float:center;">

		<div id="slideshow" style="float:left;">
				<div><img name ="homepage_products[]" value="product_1" src="images/JewelryPic_01.png" width="500px" height="500px"></div>
				<div><img name ="homepage_products[]" value="product_2" src="images/JewelryPic_02.png" width="500px" height="500px"></div>
				<div><img name ="homepage_products[]" value="product_3" src="images/JewelryPic_03.png" width="500px" height="500px"></div>
				<div><img name ="homepage_products[]" value="product_4" src="images/JewelryPic_04.png" width="500px" height="500px"></div>
		</div>	
	
		<div id="slideshow2" style="float:right;">
				<div><img name ="homepage_stores[]" value="store_1" src="images/Store_01.png" width="500px" height="500px"></div>
				<div><img name ="homepage_stores[]" value="store_2" src="images/Store_02.png" width="500px" height="500px"></div>
				<div><img name ="homepage_stores[]" value="store_3" src="images/Store_03.png" width="500px" height="500px"></div>
		</div>	

</div>
