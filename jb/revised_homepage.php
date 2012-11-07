<!-- Search Bar CSS !-->
<!--<script type="text/javascript">
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
<div id="body_background" style="height:100%;width:100%;">

		<div id="slideshow" style="float:left;">
			<div><img name ="homepage_products[]" value="product_1" src="images/JewelryPic_01.png" width="400px" height="400px"></div>
			<div><img name ="homepage_products[]" value="product_2" src="images/JewelryPic_02.png"  width="400px" height="400px"></div>
			<div><img name ="homepage_products[]" value="product_3" src="images/JewelryPic_03.png"  width="400px" height="400px"></div>
			<div><img name ="homepage_products[]" value="product_4" src="images/JewelryPic_04.png" width="400px" height="400px"></div>
		</div>	
	
		<div id="slideshow2" style="float:right;">
			<div><img name ="homepage_stores[]" value="store_1" src="images/Store_01.png"  width="400px" height="400px"></div>
			<div><img name ="homepage_stores[]" value="store_2" src="images/Store_02.png"  width="400px" height="400px"></div>
			<div><img name ="homepage_stores[]" value="store_3" src="images/Store_03.png" width="400px" height="400px"></div>
		</div>	

</div>
	<script src="jquery.js"></script>
  <script src=".jquery.backstretch.js"></script>
	<script>
	    $.backstretch("diamondnecklace.jpg ", {fade: 500});
	    
	    });
    </script>-->


<!doctype html>
<html lang="en">
<head>
	<style>
	    body { line-height: 1.3em; -webkit-font-smoothing: antialiased; }
	    .container {
	        width: 90%;
	        margin: 20px auto;
	        background-color: #FFF;
	        padding: 20px;
	    }
	
	</style>
</head>
<body>
<div id="background" style="height:100%;width:100%;">
    <div class="container" style="height:100%;width:70%;">
     
        </br></br>
    </div>
</div>
<script src="jquery.js"></script>
<script src="jquery.backstretch.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<script src="jquery.backstretch.min.js"></script>

<script>
    $(".container").backstretch([
          "images/JewelryPic_01.png",
          "images/JewelryPic_02.png",
          "images/JewelryPic_03.png"
        ], {
            fade: 750,
            duration: 4000
        });
</script>
</body>
</html>
