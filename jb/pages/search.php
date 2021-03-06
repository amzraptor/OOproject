<?php 
session_start();
$search = "";

if(empty($_POST['search_text']))
{
	$search = "necklace";
} 
else
{
	$search = $_POST['search_text'];
}

if(empty($_SESSION['user']))
{
      $_SESSION['user'] = "guest";
      $username = "guest";
      $_SESSION['cart'] = array();
}
else
{
      $username = $_SESSION['user'];
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" media="all" href="header.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/styles.css">
<link rel="stylesheet" type="text/css" href="css/jPages.css">

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
    color:#5599ff;
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
-moz-border-radius: 5px;
-webkit-border-radius: 5px;
-moz-box-shadow:    3px 3px 5px 8px #ddd;
-webkit-box-shadow: 3px 3px 5px 8px #ddd;
box-shadow:         3px 3px 5px 8px #ddd;
width:230px;
height:200px;
color: #54c6e8;
float:left;
margin:30px;
}

#itempic {
width: 95%;
height: 140px;
background-color: #cff;
border: 5px solid #fff;

}

#itemspecs {
margin-right:10px;
margin-left:10px;
font-family: BebasNeue;
font-size: 20px;
/*color:#54c6e8;*/
color:#444;
}

/*#product_display {
border: 3px solid #000;
background-color:#000;
width:210px;
height:250px;
color:#fff;
font-weight:bold;	
}*/

#search_content {
margin-top:75px;
margin-left:75px;
margin-right:75px;
margin-bottom:20px;
}

</style>

</head>

<body>
	<div class="header" id="header" name="header">
	
		
	</div>
		<div id="search_content">
		<h1> <font>Search</font> Results </h1>
		</div>
		<center><div class="holder" style="width:100%;"></div></center>
		<div align="center" style="width:100%;">

		<ul id="itemContainer" style="width:100%;float:left">
		</ul>
		</div>

		<center><div class="holder" style="width:100%;"></div></center>
	
</body>
<script type="text/javascript" src = "header.js"></script>
<script type="text/javascript">
$(document).ready(function(){

/////////////////////////////////////////////
	var username = '<?php echo $username; ?>';
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
							list = list+"<li id='product_display' style='list-style:none;'><div id='itempic'>";
							list = list+"<img src='";
							list = list+result[i].img1;
							list = list+"' width='220' height='140'/ ></div>";
							list = list+"<div id='itemspecs'>";
							list = list+result[i].name;
							list = list+"</div>";
							list = list+"<div id='description' style='text-align:block;display:none;'><div>";
							
							list = list+"</div>";
							list = list+"<form action='product_display.php' method='post'><input type='submit' style='background:transparent;cursor:pointer;border:none;color:#5599ff;' value='view'/ >";
							list = list+"<input type='hidden' name='product_id' value='"+result[i].product_id+"' / >";
							list = list+"<input type='hidden' name='product_image' value='"+result[i].img1+"' / >";
							list = list+'<input type="hidden" name="product_description" value="'+result[i].description+'" / >';
							list = list+"<input type='hidden' name='product_price' value='"+result[i].price+"' / >";
							list = list+"<input type='hidden' name='product_size' value='"+result[i].size+"' / >";
							list = list+"<input type='hidden' name='product_color' value='"+result[i].color+"' / >";
							list = list+'<input type="hidden" name="product_name" value="'+result[i].name+'" / >';
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

