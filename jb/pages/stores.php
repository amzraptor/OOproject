<?php 
include "../db/db.php";//include db script
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
{
 
    .ui-tabs-vertical { width: 55em; }
    .ui-tabs-vertical .ui-tabs-nav { padding: .2em .1em .2em .2em; float: left; width: 12em; }
    .ui-tabs-vertical .ui-tabs-nav li { clear: left; width: 100%; border-bottom-width: 1px !important; border-right-width: 0 !important; margin: 0 -1px .2em 0; }
    .ui-tabs-vertical .ui-tabs-nav li a { display:block; }
    .ui-tabs-vertical .ui-tabs-nav li.ui-tabs-active { padding-bottom: 0; padding-right: .1em; border-right-width: 1px; border-right-width: 1px; }
    .ui-tabs-vertical .ui-tabs-panel { padding: 1em; float: right; width: 40em;}
</style>

<link rel="stylesheet" media="all" href="header.css" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
</head>

<body>
	<div class="header" id="header" name="header">
	
		
	</div>
	<div style="width:100%;margin-top:50px;margin-bottom:-27px;"><center><h1> <font>Stores</font> Home </h1><center></div>
	<div class="sub2" style="width:100%;height:600px;">

		<div style="width:24%;float:left;border-right:1px solid #000;height:100%;">
		<form action="create_store.php" method="POST">
			<h1 style="border:none;margin-left:10%;">Create a Store</h1>
<input name="sload" class='sload' type="radio" style="margin-left:10%;" value="none">Create a New Store</input></br></br>
			<button id="load_store2" style="margin-left:15%;">submit</button>
		</form>
		</div>

		<div style="width:24%;float:left;border-right:1px solid #000;height:100%;">
		<form action="manage.php" method="POST">
			<h1 style="border:none;margin-left:10%;">Manage a Store</h1>
			<div id="stores_list" style="margin-left:5%;"></div>
			<button id="load_store" style="margin-left:15%;">submit</button>
		</form>
		</div>

		<div style="width:24%;float:left;border-right:1px solid #000;height:100%;">
		<form action="store.php" method="POST">
			<h1 style="border:none;margin-left:10%;">View a Store</h1>
			<div id="stores_list2" style="margin-left:5%;"></div>
			<button id="load_store" style="margin-left:15%;">submit</button>
		</form>
		</div>

		<div style="width:24%;float:left;height:100%;">
		<form action="remove_store.php" method="POST">
			<h1 style="border:none;margin-left:10%;"> Remove a Store</h1>
			<div id="stores_list3" style="margin-left:5%;"></div>
			<button id="load_store" style="margin-left:15%;">submit</button>
		</form>
		</div>
	</div>
</body>

<script type="text/javascript" src = "header.js"></script>
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
							$('#stores_list2').append("<input class='sload' name='sload' type='radio' style='margin-left:5%;'value='"+data.stores[i].store_id+"'>"+"Un-named"+"</input></br></br>");
							$('#stores_list3').append("<input class='sload' name='sload' type='radio' style='margin-left:5%;'value='"+data.stores[i].store_id+"'>"+"Un-named"+"</input></br></br>");
						}
						else
						{
							$('#stores_list').append("<input class='sload' name='sload' type='radio' style='margin-left:5%;'value='"+data.stores[i].store_id+"'>"+data.stores[i].sname+"</input></br></br>");
							$('#stores_list2').append("<input class='sload' name='sload' type='radio' style='margin-left:5%;'value='"+data.stores[i].store_id+"'>"+data.stores[i].sname+"</input></br></br>");
							$('#stores_list3').append("<input class='sload' name='sload' type='radio' style='margin-left:5%;'value='"+data.stores[i].store_id+"'>"+data.stores[i].sname+"</input></br></br>");
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




















