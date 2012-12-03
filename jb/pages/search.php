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
<link rel="stylesheet" type="text/css" href="css/styles.css">

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="jpages.js"></script>


<style>
.header{
	background-color:black;
}
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

<!-- north -->
<div class="header" style="width:100%;height:60px;">	

	<div style="color:white;width:50%;float:left;">
		<lable style="font-size:30px;margin-top:5px;margin-left:20px;">The Jewelry Box</lable><br />
<lable style="color:#ccc;font-size:11px;margin-left:30px;">Hand Crafted Trinkets</lable>		
	</div>

	<div style="height:100%;width:50%;float:left">
        <form action="signin.php" method="POST">
	<button id="signin" style="width:90px;float:right;margin-right:10px;margin-top:10px;display:none;">Sign In</button>
        </form>
        <form action="signup.php" method="POST">
	<button id="signup" style="width:90px;float:right;margin-right:10px;margin-top:10px;display:none;">Sign Up</button>
        </form>
        <form action="logout.php" method="POST">
	<button id="logout" style="width:90px;float:right;margin-right:10px;margin-top:10px;display:none;">Logout</button>
        </form>
        <form action="stores.php" method="POST">
	<button id="stores" style="width:90px;float:right;margin-right:10px;margin-top:10px;display:none;">Stores</button>
        </form>
        <form action="cart.php" method="POST">
	<button id="cart" style="width:90px;float:right;margin-right:10px;margin-top:10px;display:none;">Cart</button>
        </form>
        <form action="help.php" method="POST">
	<button id="help" style="width:90px;float:right;margin-right:10px;margin-top:10px;display:none;">Help</button>
        </form>
	</div>
</div>
<div id="search_header" style="float:left;background-color:black;width:100%;">
	
		<div  style="float:right;margin-right:10px;margin-bottom:10px;">
			<form action="" method="post">
				<input name="search_text" value="" placeholder="necklace"/>
				<input style="width:70px" type="submit" id="search_button" value="search" />
			</form>
		</div>
</div>
<!-- north -->
</head>

<body>

	<div align="center" style="width:100%;">

	<div class="holder">
		</div>

	</div>

	<ul id="itemContainer">
	</ul>

</body>
<script type="text/javascript">
$(document).ready(function(){
	  var username = "<?php echo $username; ?>";
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

/////////////////////////////////////////////
					if(username == "guest")
					{
		                    		$('#signin').show(); //
		                    		$('#signup').show(); //
		                    		$('#help').show(); //
		                    		$('#cart').show(); //
					}
					else
					{
		                    		$('#stores').show(); //
		                    		$('#logout').show(); //
		                   		$('#cart').show(); //
		                    		$('#help').show(); //
					}
/////////////////////////////////////////////
					},

			error:function(e){alert("there was an error");}
		});

});
</script>

</html>




















