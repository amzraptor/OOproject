<?php 
include "db/db.php";//include db script

session_start();

if(empty($_SESSION['user']))
{
      $_SESSION['user'] = "guest";
      $username = "guest";
      //$_SESSION['cart'] = array();
}
else
{
      $username = $_SESSION['user'];
}
$sessionid = session_id();
	/*if($cart_array)
    	echo "array : <pre>".print_r($cart_array,true)."</pre><br />\n"; //best way to print multi-dim array!*/

//echo"$username and $sessionid";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>The Jewelry Box</title>
<link rel="stylesheet" media="all" href="header.css" type="text/css" />
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css" />
	<!--<script type="text/javascript" src="jquery-1.2.1.pack.js "></script>-->


</head>

<body>

	<div class="header" id="header" name="header">
	
		
	</div>

<div style="display:none;" id="qtyerror" name="qtyerror">
	<div id="cart">

	</div>
</div>
<div style="width:100%;height:100%" class="body">

	<div id="tabs">
    <ul>
        <li><a href="#tabs-1">Shipping Information</a></li>
        <li><a href="#tabs-2">Billing Informaion</a></li>
        <li><a href="#tabs-3">Process Order</a></li>
    </ul>
    <div id="tabs-1">
	<div style="width:40%;margin-left:20%;">
	<h3>Enter Shipping Information</h3>
	<!--step 1-->
		<label class="step1" >Name on the Shipment</label><br class="step1" style=""/>
		<input class="step1" id="sname" name="sname" type="text" style="width:90%;" value=""> <br class="step1" />

	<!--step 2-->
		<label class="step2">Attention</label><br class="step2"/>
		<input class="step2" id="att" name="att" type="text" style="width:90%;" value=""> <br class="step2"/>

	<!--step 3-->
		<label class="step3" >Email for Invoice</label><br class="step3" />
		<input class="step3" id="email" name="email" type="text" style="width:90%;" value=""> <br class="step3"/>

	<!--step 4-->
		<label class="step4" >Street Address</label><br class="step4" />
		<input class="step4" id="street_address" name="street_address" type="text" style="width:90%;" value=""> <br class="step4" />

	<!--step 5-->
		<label class="step5" >City</label><br class="step5" />
		<input class="step5" id="city" name="city" type="text" style="width:90%;" value=""> <br class="step5" />

	<!--step 6-->
		<label class="step6" >State</label><br class="step6" />
		<input class="step6" id="state" name="state" type="text" style="width:90%;" value=""> <br class="step6" />

	<!--step 7-->
		<label class="step7" >Zip Code</label><br class="step7" />
		<input class="step7" id="zip" name="zip" type="text" style="width:90%;" value=""> <br class="step7" />
	</br>
	</br>
	</div> 
    </div>
    <div id="tabs-2">
	<div style="width:40%;margin-left:20%;">
	<h3>Billing Information</h3>
	<!--step 1-->
		<label class="step1" >Name as it appears on the credit card</label><br class="step1" style=""/>
		<input class="step1" id="ccname" name="ccname" type="text" style="width:90%;" value=""> <br class="step1" />

	<!--step 2-->
		<label class="step2">Credit Card Number</label><br class="step2"/>
		<input class="step2" id="ccnum" name="ccnum" type="text" style="width:90%;" value=""> <br class="step2"/>

	<!--step 3-->
		<label class="step3" >Expiration Date</label><br class="step3" />
		<input class="step3" id="date" name="date" type="text" style="width:90%;" value=""> <br class="step3"/>

	<!--step 4-->
		<label class="step4" >Security Code</label><br class="step4" />
		<input class="step4" id="code" name="code" type="text" style="width:90%;" value=""> <br class="step4" />

	<!--step 5-->
		<label class="step5" >Billing Address</label><br class="step5" />
		<input class="step5" id="baddress" name="baddress" type="text" style="width:90%;" value=""> <br class="step5" />

	<!--step 6-->
		<label class="step6" >City</label><br class="step6" />
		<input class="step6" id="city" name="city" type="text" style="width:90%;" value=""> <br class="step6" />

	<!--step 7-->
		<label class="step7" >State</label><br class="step7" />
		<input class="step7" id="state" name="state" type="text" style="width:90%;" value=""> <br class="step7" />

	<!--step 8-->
		<label class="step8" >Zip Code</label><br class="step8" />
		<input class="step8" id="zip" name="zip" type="text" style="width:90%;" value=""> <br class="step8" />
	</br>
	</br>
	</div> 
    </div>
    <div id="tabs-3">
	<div style="width:40%;margin-left:20%;">
	<h3>Process Order</h3>
        </br>
	<button id="process" name="process">Process</button>
	<div id="invoiceresult" name="invoiceresult">
	</div>
	</br>
    </div>
</div>

</div>

</body>

<script type="text/javascript" src = "header.js"></script>
<script type="text/javascript">
$(function() {
	$( "#tabs" ).tabs();
});
$(document).ready(function(){
	//var validated = "<?php echo $validated; ?>"; 
	

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
/////////////////////////////////////////////

	/*$.post('purchase_backend.php',{action:action},function(data){
          //start of function
          //after reciving answer
                   
           
          $('#purchase').html(data);  
      
            
            
              
           }//end of function
        )*/
	
		var postData = {'action': 'check_qty' };
		$.ajax({
		        type: "POST",
		        data: postData,
		        url: "purchase_backend.php",                  //  

		        success: function(data)          //on recieve of reply
		            	{

		            		if(data.error != "")
							{
								$('.body').hide();
								$('#qtyerror').show();
								alert(data.error);
							}
					
		            	},
		        dataType: "json",
		        error: function(data)          //on recieve of reply
		                 {
		                    	alert("hello error");
		                 }
		    });
		$('#process').click(function()
			{
				var user_name = <?php echo json_encode($_SESSION['user']); ?>;
				var name = $('#sname').val();
				var atten = $('#att').val();
				var email = $('#email').val();
				var st_ad = $('#street_address').val();
				var city = $('#city').val();
				var state = $('#state').val();
				var zip = $('#zip').val();
				if((name) && (atten) && (email) && (st_ad) && (city) && (state) && (zip))
				{

				var postData = {'action': 'order', 'user_name': user_name , 'name': name, 'atten': atten, 'email': email, 'st_ad' : st_ad, 'city': city, 'state': state, 'zip': zip };
				$.ajax({
		        type: "POST",
		        data: postData,
		        url: "purchase_backend.php",                  //  

		        success: function(data)          //on recieve of reply
		            	{
		            		//alert("city"+data.invoice[0].city);
		            		if(data.error != "")
							{
								alert("Input Problem or DB error");
							}
					else
					{
								$('#process').hide();
								$('#invoiceresult').append("<h1>Invoice #"+data.invoice[0].invoice_id+"</h1><h4>An Invoice Has Been Emailed to You.</h4>"+"<h5>Address:"+data.invoice[0].street_address+"</h5><h5>City:"+data.invoice[0].city+"</h5><h5>State:"+data.invoice[0].state+"</h5><h5>Zip Code:"+data.invoice[0].zip+"</h5>");
						var list = "";
						list = list+"<div><table id='myTable' border='1' class='ui-widget' style='margin-left:1%';><thead class='ui-widget-header'><tr><th style='width:600px;'>Product Name</th><th style='width:100px;'>Price $</th><th style='width:100px;'>Quantity</th><th style='width:175px;'>Total $</th></tr></thead><tbody class='ui-widget-content'>";

						for(i=0;i<data.products.length;i++)
						{
							var cost = data.products[i].price * data.products[i].qty;
							list = list+"<tr><td>"+data.products[i].product_name+"</td><td align='right'>"+data.products[i].price+"</td><td align='right'>"+data.products[i].qty+"</td><td align='right'>"+cost.toFixed(2)+"</td></tr>";
						}
						list = list+"<tr><td>Invoice Total</td><td></td><td></td><td align='right'>"+data.total[0]+"</td></tr>";
						list = list+"</tbody></table></div>";
						
						$('#invoiceresult').append(list);

					}
					
		            	},
		        dataType: "json",
		        error: function(data)          //on recieve of reply
		                 {
		                    	alert("hello error");
		                 }
		    });

			}
			else
			{
				alert("Please fill in all Information!")
			}

				});
	
});
</script>
<script type="text/javascript" src = "cart.js"></script>
</html>
      	




















