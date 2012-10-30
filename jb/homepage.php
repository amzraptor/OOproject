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
},  3000);
</script>

<div id="body_background">

		<div style="margin-left:40px;" id="slideshow">
			<div><img name ="homepage_products[]" value="product_1" src="images/JewelryPic_01.png"></div>
			<div><img name ="homepage_products[]" value="product_2" src="images/JewelryPic_02.png"></div>
			<div><img name ="homepage_products[]" value="product_3" src="images/JewelryPic_03.png"></div>
			<div><img name ="homepage_products[]" value="product_4" src="images/JewelryPic_04.png"></div>
		</div>	
</div>
