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

if(!empty($_POST['sload']))
{
	$sload = $_POST['sload'];

      	$_SESSION['store_id'] = $sload;
	
}
else
{
	$sload = 'none';
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

<link rel="stylesheet" media="all" href="header.css" type="text/css" />

<style>

 {
    .ui-tabs-vertical { width: 55em; }
    .ui-tabs-vertical .ui-tabs-nav { padding: .2em .1em .2em .2em; float: left; width: 12em; }
    .ui-tabs-vertical .ui-tabs-nav li { clear: left; width: 100%; border-bottom-width: 1px !important; border-right-width: 0 !important; margin: 0 -1px .2em 0; }
    .ui-tabs-vertical .ui-tabs-nav li a { display:block; }
    .ui-tabs-vertical .ui-tabs-nav li.ui-tabs-active { padding-bottom: 0; padding-right: .1em; border-right-width: 1px; border-right-width: 1px; }
    .ui-tabs-vertical .ui-tabs-panel { padding: 1em; float: right; width: 40em;}
</style>

</head>

<body link="blue" alink="violet" vlink="red">
	<div class="header" id="header" name="header">
	
		
	</div>

<div id='main'>
<div id="tabs"  style="margin-top:1.5%;">
    <ul>
        <li><a href="#tabs-1">Add Product to Store</a></li>
        <li><a href="#tabs-2">Pending Orders</a></li>
        <li><a href="#tabs-3">Sales</a></li>
        <li><a href="#tabs-4">Store Inventory</a></li>
        <li><a href="#tabs-5">Design Store</a></li>
        <li><a href="#tabs-6">Publish Store</a></li>
    </ul>
    <div id="tabs-1">
        <h2>Add Product to Store</h2>
		<div id="content">

		<form action="add_product_back.php" method="post" enctype="multipart/form-data">

		Product Name <label id="required"> *required </label> 
		<span id="name_error" class="error">(50 alpha-numeric characters or less)</span>
		<br /><input type="text" name="name" onblur="name_error_function()" id="name_input" /><br /><br />

		Product Description <label id="required"> *required</label>
 		<span id="desc_error" class="error"> (500 alpha-numeric characters or less)</span>
		<br /><textarea rows="10" cols="50" type="text" name="description"></textarea><br /><br />
		
		Size 
 		<span id="size_error" class="error"> (50 alpha-numeric characters or less)</span>
		<br /><input type="text" name="size" /><br /><br />

		Quantity <label id="required"> *required </label>
 		<span id="qty_error" class="error">  (9 numbers or less)</span> 
		<br /><input type="text" name="quantity" /><br /><br />

		Price <label id="required"> *required</label>  
 		<span id="price_error" class="error">(number with two decimal places e.i. 1234.56)</span> 
		<br /><input type="text" name="price" /><br /><br />
	
		<div id="radiobutton_error"></div>

		Gender <label id="required"> *required </label>  <br />
		<input type="radio" name="gender" value="male">Male
		<input type="radio" name="gender" value="female">Female
		<input type="radio" name="gender" value="unisex">Unisex
		<br />
		<br />

		<label for="file">Image</label><label id="required"> *required </label> <br />
			<input type="file" name="file" id="file"><br>
		<br />
		
		<div id="add_options" style="width:100%;min-height:350px;">

			<div id="material_options" style="float:left;width:20%;">
				<strong> Material </strong> <label id="required"> *required </label> 
				<ul style="list-style:none;">
				<li><input type="radio" name ="material" value="gold" />Gold</li>
				<li><input type="radio" name ="material" value="silver" />Silver</li>
				<li><input type="radio" name ="material" value="bronze" />Bronze</li>
				<li><input type="radio" name ="material" value="brass" />Brass</li>
				<li><input type="radio" name ="material" value="wood" />Wood</li>
				<li><input type="radio" name ="material" value="copper" />Copper</li>
				<li><input type="radio" name ="material" value="aluminum" />Aluminum</li>
				<li><input type="radio" name ="material" value="other" />Other</li>
				</ul>
				<br />
				<br />
			</div>

			<div id="category_options" style="float:left;width:24%;">
				<strong> Site Category </strong> <label id="required"> *required </label> 
				<ul style="list-style:none;">
				<li><input type="radio" name ="category" value="wedding" /><label for="Wedding">Wedding</label></li>
				<li><input type="radio" name ="category" value="rings" /><label for="Rings">Rings</label></li>
				<li><input type="radio" name ="category" value="bracelets" /><label for="Bracelets">Bracelets</label></li>
				<li><input type="radio" name ="category" value="earrings" /><label for="Earrings">Earrings</label></li>
				<li><input type="radio" name ="category" value="necklaces" /><label for="Necklaces">Necklaces</label></li>
				<li><input type="radio" name ="category" value="brooches" /><label for="Brooches">Brooches</label></li>
				<li><input type="radio" name ="category" value="body jewelry" /><label for="body jewelry">Body Jewelry</label></li>
				<li><input type="radio" name ="category" value="belt buckles" /><label for="belt buckles">Belt Buckles</label></li>
				<li><input type="radio" name ="category" value="charms" /><label for="charms">Charms</label></li>
				<li><input type="radio" name ="category" value="watch bands" /><label for="watch bands">Watch Bands</label></li>
				<li><input type="radio" name ="category" value="children" /><label for="Children">Children</label></li>
				<li><input type="radio" name ="category" value="jewelry boxes" /><label for="jewelry boxes">Jewelry Boxes</label></li>
				<li><input type="radio" name ="category" value="other" /><label for="Other">Other</label></li>
				</ul>
				<br />
				<br />
			</div>

			<div id="site_category" style="float:left;width:24%;">
				<strong>  Store Category </strong> <label id="required"> *required </label> 
				<ul style="list-style:none;">
				<li><input type="radio" name ="scat" value="cat1" />Category 1</li>
				<li><input type="radio" name ="scat" value="cat2" />Category 2</li>
				<li><input type="radio" name ="scat" value="cat3" />Category 3</li>
				<li><input type="radio" name ="scat" value="cat4" />Category 4</li>
				<li><input type="radio" name ="scat" value="cat5" />Category 5</li>
				</ul>
				<br />
				<br />
			</div>

			<div id="color_options" style="float:left;width:24%;">
				<strong style="margin-left:15px;"> Color </strong> <label id="required"> *required </label> 
				<ul style="list-style:none;">
				<li><input type="radio" name ="color" value="black" />Black</li>
				<li><input type="radio" name ="color" value="white" />White</li>
				<li><input type="radio" name ="color" value="red" />Red</li>
				<li><input type="radio" name ="color" value="green" />Green</li>
				<li><input type="radio" name ="color" value="blue" />Blue</li>
				<li><input type="radio" name ="color" value="yellow" />Yellow</li>
				<li><input type="radio" name ="color" value="gold" />Gold</li>
				<li><input type="radio" name ="color" value="bronze" />Bronze</li>
				<li><input type="radio" name ="color" value="silver" />Silver</li>
				<li><input type="radio" name ="color" value="purple" />Purple</li>
				<li><input type="radio" name ="color" value="other" />Other</li>
				</ul>
				<br />
				<br />
			</div>
		</div>

		<br />

		<input type="submit" name="submit" value="add">
		</form>
		<br />
		</div>
    </div>
    <div id="tabs-2">
        <h2>Pending Orders</h2>
	<div id="edit_ord" name="edit_ord">
		<h3  style="margin-left:25%;">Complete Order</h3>
		<input  style="margin-left:25%;" id="order_field" name="order_field" value="Enter Invoice Number"></input>
		<button id="edit_order" name="edit_order" style="margin-left:10%;">completed</button>
	</div>
	<div id="orders">

	</div>
		<br />
    </div>
   <div id="tabs-3">
        <h2>Sales</h2>
	<div id="sales">

	</div>
		<br />
    </div>
    <div id="tabs-4">
        <h2>Store Inventory</h2>
	<div id="edit_inv" name="edit_inv">
		<h3  style="margin-left:25%;">Edit Product</h3>
		<input  style="margin-left:25%;" id="inventory_field" name="inventory_field" value="Enter Product Id"></input>
		<button id="edit_inventory" name="edit_inventory" style="margin-left:10%;">edit</button>
	</div>
	<div id="inventory">

	</div>
    </div>
   <div id="tabs-5">
        <h2>Design Store</h2>
	<div id="sales">
		<form action="create_store.php" method="POST">
<input name="sload" class='sload' type="radio" style="margin-left:23%;" value="<?php echo $sload?>">Design Store</input></br></br>
			<button id="load_store2" style="margin-left:25%;">submit</button>
		</form>
	</div>
		<br />
    </div>
    <div id="tabs-6">
        <h2>Publish Store</h2>
	<div>
		<h3  style="margin-left:25%;">Publishing a store will make the store visible to site visitors.</h3>
		<button id="publish" name="publish" style="margin-left:35%;width:200px;">Publish</button>
		<button id="unpublish" name="unpublish" style="margin-left:10%;width:200px;">Un-Publish</button>
	</div>
    </div>


</div>
</div>
</body>

<script type="text/javascript" src = "header.js"></script>
<script type="text/javascript">
var total = 0;
var total2 = 0;
$(document).ready(function(){
	var sload = "<?php echo $sload; ?>";
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
	if (sload == "none")
	{
		$('#main').hide();
		alert("no store selected");
	}
	else 
	{
		//alert("store selected:"+sload);
		get_invoices(sload);
		inventory(sload);
	}

////////////////////////////////////////#13
	$('#cat1').blur(function()
	{
		save_info('cat1', $('#cat1').val());
	});
////////////////////////////////////////
////////////////////////////////////////#14
	$('#cat2').blur(function()
	{
		save_info('cat2', $('#cat2').val());
	});
////////////////////////////////////////
////////////////////////////////////////#15
	$('#cat3').blur(function()
	{
		save_info('cat3', $('#cat3').val());
	});
////////////////////////////////////////
////////////////////////////////////////#16
	$('#cat4').blur(function()
	{
		save_info('cat4', $('#cat4').val());
	});
////////////////////////////////////////
////////////////////////////////////////#17
	$('#cat5').blur(function()
	{
		save_info('cat5', $('#cat5').val());
	});
////////////////////////////////////////
////////////////////////////////////////
	$('#edit_order').click(function()
	{
		alert('edit'/*+$('#edit_product').val()*/);
	});
////////////////////////////////////////
////////////////////////////////////////
	$('#edit_inventory').click(function()
	{
		alert('edit'/*+$('#edit_product').val()*/);
	});
////////////////////////////////////////
////////////////////////////////////////
	$('#publish').click(function()
	{
		alert('edit'/*+$('#edit_product').val()*/);
	});
////////////////////////////////////////
////////////////////////////////////////
	$('#unpublish').click(function()
	{
		alert('edit'/*+$('#edit_product').val()*/);
	});
////////////////////////////////////////
      
});
   $(function() {
        $( "#tabs" ).tabs().addClass( "ui-tabs-vertical ui-aboutuser-clearfix" );
        $( "#tabs li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
    });
			////////////for each in data.invoices
			//get the invoice and the product_invoices w/ corresponding invoice_id
			//invoice nums are links and use pagination
			//X1. compute the sum for the invoice and in sales display date invoice num and amount
			//X2. pending display if the invoice is pending show the date invoice num and amount
			//X3. query for all products of store and display in table  format cost
			//4. display invoice
			//5. email working
			//6. have all files comming to manage submit a store_id vis sload
			//7. publish store
    function get_invoices(store_id)
    {
	var postData = {'action':'get_invoices', 'store_id':store_id};
	$.ajax({
                type: "POST",
                data: postData,
                url: "manage_backend.php",                  //  
                success: function(data)          //on recieve of reply
        		  {		
					//alert("help");	
				if(data.error != "")
				{
					alert("Error");
				}
				else
				{
					var list = "<h3>"+data.store_name+"</h3>";
					var list2 = "<h3>"+data.store_name+"</h3>";
					if (data.invoices.length > 0)
					{
						var sum = 0;
						list = list+"<div><table id='myTable' border='1' class='ui-widget' style='margin-left:10%';><thead class='ui-widget-header'><tr><th style='width:300px;'>Date</th><th style='width:100px;'>Invoice</th><th style='width:200px;'>Total $</th></tr></thead><tbody class='ui-widget-content'>";

						var sum2 = 0;
						list2 = list2+"<div><table id='myTable' border='1' class='ui-widget' style='margin-left:10%';><thead class='ui-widget-header'><tr><th style='width:400px;'>Date</th><th style='width:100px;'>Invoice</th><th style='width:200px;'>Total $</th></tr></thead><tbody class='ui-widget-content'>";
						var i;
						for (i=0; i<data.totals.length;i++)
						{
							//alert("id"+data.invoices[i][0]+"  amount"+data.totals[i]+"  date"+data.dates[i][0]+"  status"+data.orders[i][0]);
							//build sales, build pending (2)
							list = list+"<tr><td align='right'>"+data.dates[i][0]+"</td><td align='right'><a style='color:red;' href='invoice.php?invoice="+data.invoices[i][0]+"'>"+data.invoices[i][0]+"</a></td><td align='right'>"+data.totals[i]+"</td></tr>";					
							sum = sum + parseFloat(data.totals[i]);
	
							if(data.orders[i][0] == "pending")
							{
								list2 = list2+"<tr><td>"+data.dates[i][0]+"</td><td align='right'><a style='color:red;' href='invoice.php?invoice="+data.invoices[i][0]+"'>"+data.invoices[i][0]+"</a></td><td align='right'>"+data.totals[i]+"</td></tr>";					
								sum2 = sum2 + parseFloat(data.totals[i]);
							}
						}
						list = list+"<tr><td>Invoice Totals</td><td></td><td align='right'>"+sum+"</td></tr>";
						list = list+"</tbody></table></div>";
						list2 = list2+"<tr><td>Invoice Totals</td><td></td><td align='right'>"+sum2+"</td></tr>";
						list2 = list2+"</tbody></table></div>";
						
						total = total + sum;
						total2 = total2 + sum2;
						$('#sales').append(list);
						$('#orders').append(list2);
						
					}

				}
              		 },
                dataType: "json",
                error: function(data)          //on recieve of reply
                         {
                            alert("hello error");
                         }
            });
    }
//////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
    function inventory(store_id)
    {
	var postData = {'action':'get_inventory', 'store_id':store_id};
	$.ajax({
                type: "POST",
                data: postData,
                url: "manage_backend.php",                  //  
                success: function(data)          //on recieve of reply
        		  {		//alert("yo"+data.item[0].product_id);	
				if(data.error != "")
				{
					alert("Error");
				}
				else
				{
					var list
					if(data.store_name != 'none')
					{
						list = "<h3>"+data.store_name+"</h3>";
					}
					else
					{
						list = "<h3>Un-Named Store</h3>";
					}

					if (data.item.length > 0)
					{
						var sum = 0;
						list = list+"<div><table id='myTable' border='1' class='ui-widget' style='margin-left:10%';><thead class='ui-widget-header'><tr><th style='width:100px;'>Product Id</th><th style='width:600px;'>Product Name</th><th style='width:200px;'>Price $</th><th style='width:100px;'>Quantity</th><th style='width:200px;'>Total $</th></tr></thead><tbody class='ui-widget-content'>";
//alert("id"+data.item[0].product_id+" name"+data.item[0].name+" price"+data.item[0].price+"quantity"+data.item[0].qty+"total..");
						for(i=0;i<data.item.length;i++)
						{
							var cost = data.item[i].price*data.item[i].qty;
							sum = sum + cost;
							
list = list+"<tr><td align='left'>"+data.item[i].product_id+"</td><td>"+data.item[i].name+"</td><td align='right'>"+data.item[i].price+"</td><td align='right'>"+data.item[i].qty+"</td><td align='right'>"+cost.toFixed(2)+"</td></tr>";
						}
						list = list+"<tr><td>Total</td><td></td><td></td><td></td><td align='right'>"+sum.toFixed(2)+"</td></tr>";
						list = list+"</tbody></table></div>";
						
						total = total + sum;
						$('#inventory').append(list);
						
					}


				}
              		 },
                dataType: "json",
                error: function(data)          //on recieve of reply
                         {
                            alert("hello error");
                         }
            });
    }
///////////////////////////////////////////////////////////////////////////
	function save_info(field, value)
	{
	////////////////////////////////////////#17
	
	    var postData0 = {'action': 'save_info','field': field,'value': value};
	    $.ajax({
		type: "POST",
		data: postData0,
		url: "create_store_backend.php",                  //  
		success: function(data)          //on recieve of reply
			{			
				//alert("Saving...");
				if(data.error == 'error saving info')
				{
					alert("error saving info");
				}
				 
		         },
		dataType: "json",
		error: function(data)          //on recieve of reply
		         {
		            alert("hello error");
		         }
	   });
	////////////////////////////////////////
	}

</script>
</html>




















