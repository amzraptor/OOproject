<?php 
session_start();

if(empty($_SESSION['user']))
{
      $_SESSION['user'] = "guest";
      $username = "guest";
}
else
{
      $username = $_SESSION['user'];
}
if(!empty($_POST['sload']))
{
	$sload = $_POST['sload'];
      	$_SESSION['store_id'] = $sload;
	$store = $_SESSION['store_id'];
	
}
else
{
	$sload = 'none';
	$store = 'none';
}

?>

<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<link rel="stylesheet" media="all" href="header.css" type="text/css" />


<body>

	<div class="header" id="header" name="header">
	
		
	</div>
	<div class="main" id="main" name="main">
	
		
	</div>


</body>

<script type="text/javascript" src = "header.js"></script>
<script type="text/javascript">
////*****************************************************////
$(document).ready(function(){

        var username = "<?php echo $username; ?>";
/////////////////////////////////////////////
	if(username == "guest")
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
        var sload = "<?php echo $sload; ?>";
        var store = "<?php echo $store; ?>";
	if (sload == "none")
	{
		alert("no store selected");
	}
	else 
	{
	////////////////////////////////
	   var postData0 = {'action': 'start', 'store': store};
		  
	    $.ajax({
		type: "POST",
		data: postData0,
		url: "remove_store_backend.php",                  //  
		success: function(data)          //on recieve of reply
			{		
				if(data.error != "none")
				{
					alert("Please login"+data.store_id);
				}
				else
				{	
					$('#main').append("<h1>Store Has Been Deleted</h1>");
				}
				
		         },
		dataType: "json",
		error: function(data)          //on recieve of reply
		         {
		            alert("hello error");
		         }
		});

/*////////////////////////////////////////////

	  var search_word = "-99";//"<?php echo $search; ?>";
	  var search_string = {"search_words": search_word};

	  $.ajax(
		{
			url:"search_backend.php",
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
							list = list+"<form action='product_display.php' method='post'><input type='submit' style='background:transparent;cursor:pointer;border:none;color:red;' value='view'/ >";
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
		});*/
	}
});
</script>
</html>


