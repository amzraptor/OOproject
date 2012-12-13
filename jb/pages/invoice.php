<?php
//echo "hello invoice:";
//echo $_GET['invoice'];

include "db.php";//include db script
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
if(empty($_GET['invoice']))
{
      $invoice = 'none';
}
else
{
      $invoice = $_GET['invoice'];
}

if(empty($_SESSION['store_id']))
{
      $store = "none";
}
else
{
      $store = $_SESSION['store_id'];
}
//$store = 2;
//$invoice = 1;

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css" />
<link rel="stylesheet" media="all" href="header.css" type="text/css" />
</head>

<body>
	<div class="header" id="header" name="header">
	
		
	</div>
<div id="main" class="container">


		<form action="manage.php" method="POST">
			<input type="hidden" id="sload" name="sload" value="<?php echo $store; ?>"/>
			<button id="back" style="margin-left:1%;margin-top:1%;">back</button>
		</form> 
</div>
</body>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
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
	var invoice = '<?php echo $invoice; ?>';
	var store = '<?php echo $store; ?>';
	if (invoice == "none" || store == "none")
	{
		alert("please select an invoice from a store");
	}
	else
	{//alert("s"+store+"invoice"+invoice);
		var postData2 = {'action': 'get_invoice', 'invoice': invoice, 'store': store};
		$.ajax({
		        type: "POST",
		        data: postData2,
		        url: "invoice_backend.php",                  //  
		        success: function(data)          //on recieve of reply
		                 {
					//alert("what"+data.error);
					if(data.error != "none")
					{
						alert("error");
					}
					else
					{
						//alert("invoice"+data.invoice[0].invoice_id+" store"+data.sname+" price"+data.products[0]['price']+" total"+ data.total[0]);
						$('#main').append("<h1>"+data.sname+":     Invoice #"+data.invoice[0].invoice_id+"</h1><h4>An Invoice Has Been Emailed to You.</h4>"+"<h5>Address:"+data.invoice[0].street_address+"</h5><h5>City:"+data.invoice[0].city+"</h5><h5>State:"+data.invoice[0].state+"</h5><h5>Zip Code:"+data.invoice[0].zip+"</h5>");
						var list = "";
						list = list+"<div><table id='myTable' border='1' class='ui-widget' style='margin-left:1%';><thead class='ui-widget-header'><tr><th style='width:200px;'>Product Id</th><th style='width:600px;'>Product Name</th><th style='width:100px;'>Price $</th><th style='width:100px;'>Quantity</th><th style='width:175px;'>Total $</th></tr></thead><tbody class='ui-widget-content'>";

						for(i=0;i<data.products.length;i++)
						{
							var cost = data.products[i].price * data.products[i].qty;
							list = list+"<tr><td align='left'>"+data.products[i].product_id+"</td><td>"+data.products[i].product_name+"</td><td align='right'>"+data.products[i].price+"</td><td align='right'>"+data.products[i].qty+"</td><td align='right'>"+cost.toFixed(2)+"</td></tr>";
						}
						list = list+"<tr><td>Invoice Total</td><td></td><td></td><td></td><td align='right'>"+data.total[0]+"</td></tr>";
						list = list+"</tbody></table></div>";
						
						$('#main').append(list);

					}
		                 },
		        dataType: "json",
		        error: function(data)          //on recieve of reply
		                 {
		                    	alert("hello error");
		                 }
		    });
	}

      
});
</script>
</html>




















