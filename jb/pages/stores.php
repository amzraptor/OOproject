<?php 
include "db/db.php";//include db script
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

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>The Jewlery Box</title>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css" />

<style>
.header{
	background-color:black;
 
    .ui-tabs-vertical { width: 55em; }
    .ui-tabs-vertical .ui-tabs-nav { padding: .2em .1em .2em .2em; float: left; width: 12em; }
    .ui-tabs-vertical .ui-tabs-nav li { clear: left; width: 100%; border-bottom-width: 1px !important; border-right-width: 0 !important; margin: 0 -1px .2em 0; }
    .ui-tabs-vertical .ui-tabs-nav li a { display:block; }
    .ui-tabs-vertical .ui-tabs-nav li.ui-tabs-active { padding-bottom: 0; padding-right: .1em; border-right-width: 1px; border-right-width: 1px; }
    .ui-tabs-vertical .ui-tabs-panel { padding: 1em; float: right; width: 40em;}
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
	<button id="cart1" style="width:90px;float:right;margin-right:10px;margin-top:10px;display:none;">Cart</button>
        </form>
        <form action="aboutus.php" method="POST">
	<button id="aboutus" style="width:90px;float:right;margin-right:10px;margin-top:10px;display:none;">About Us</button>
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

			<div id="stores_list2" style="margin-left:40%;">

			</div>
			
	<div class="sub2" style="width:100%;height:100%;margin-top:5%;">


		<div style="width:50%;float:left;">
		<form action="manage.php" method="POST">
			<h1 style="margin-left:35%;">Manage a Store</h1>
			<div id="stores_list" style="margin-left:40%;"></div>
			<button id="load_store" style="margin-left:45%;">submit</button>
		</form>
		</div>
		<div style="width:50%;float:left;">
		<form action="create_store.php" method="POST">
			<h1 style="margin-left:10%;">Create a Store</h1>
<input name="sload" class='sload' type="radio" style="margin-left:15%;" value="none">Create a New Store</input></br></br>
			<button id="load_store2" style="margin-left:25%;">submit</button>
		</form>
		</div>
	</div>
</body>

<script type="text/javascript">

	var total = 0;
$(document).ready(function(){
	var stores = [];
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


	var postData0 = {'action': 'start'};
	   
            $.ajax({
                type: "POST",
                data: postData0,
                url: "stores_backend.php",                  //  
                success: function(data)          //on recieve of reply
        		  {		
					
				if(data.error == "not logged in")
				{
					alert("Please login");
				}
				else
				{
					for(i=0;i<data.stores.length;i++)
					{
						stores.push(data.stores[i].store_id);
						if(data.stores[i].sname == "none")
						{
	//alert("ids:"+data.stores[i].store_id);
							$('#stores_list').append("<input class='sload' name='sload' type='radio' style='margin-left:5%;'value='"+data.stores[i].store_id+"'>"+"Un-named"+"</input></br></br>");
						}
						else
						{
							$('#stores_list').append("<input class='sload' name='sload' type='radio' style='margin-left:5%;'value='"+data.stores[i].store_id+"'>"+data.stores[i].sname+"</input></br></br>");
						}

					}
					//alert("hee"+stores);
					
					
				}
              		 },
                dataType: "json",
                error: function(data)          //on recieve of reply
                         {
                            alert("hello error");
                         }
            });

///////////////////////////////////////////////////////////////////
 
      
});

</script>
</html>



















