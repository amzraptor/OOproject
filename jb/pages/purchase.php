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

//echo"$username and $sessionid";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>The Jewelry Box</title>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css" />
	<!--<script type="text/javascript" src="jquery-1.2.1.pack.js "></script>-->
<style>
.header{
	background-color:black;
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
			<form action="search.php" method="post">
				<input name="search_text" value="" placeholder="necklace"/>
				<input style="width:70px" type="submit" id="search_button" value="search" />
			</form>
		</div>
</div>
<!-- north -->
</head>

<body>

<div style="width:100%;height:100%" class="body">

<div id="tabs">
    <ul>
        <li><a href="#tabs-1">Order Information</a></li>
        <li><a href="#tabs-2">Shipping Information</a></li>
        <li><a href="#tabs-3">Billing Informaion</a></li>
        <li><a href="#tabs-4">Process Order</a></li>
    </ul>
    <div id="tabs-1">
	<div style="margin-left:20%;">
          <h3>Order Information</h3>	
		<table id="myTable" border="1" class="ui-widget">

		<thead class="ui-widget-header">
		    <tr>

			<th>Product Name</th>
			<th>Quantity</th>
			<th>Cost</th>
			<th>Total + </br>Shipping</th>
		    </tr>

		</thead>
		<tbody class="ui-widget-content">

		    <tr>
			<td>Watch</td>
			<td >2</td>
			<td >$10.00</td>
			<td >$22.50</td>

		    </tr>
		    <tr >
			<td>Total</td>
			<td ></td>
			<td ></td>
			<td >$22.50</td>

		    </tr>
		</tbody>
		</table>

		<br />
        </div>
    </div>
    <div id="tabs-2">
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
    <div id="tabs-3">
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
		<label class="step4" >Security Code/label><br class="step4" />
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
    <div id="tabs-4">
	<div style="width:40%;margin-left:20%;">
	<h3>Process Order</h3>
        </br>
	<button id="process" name="process">Process</button>
	</br>
    </div>
</div>

</div>
</body>
<!--
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<script src="jquery.backstretch.js"></script>
<script src="jquery.backstretch.min.js"></script>

<script>
    $.backstretch("bg.jpg");
    
</script>-->	

<script type="text/javascript">
$(function() {
	$( "#tabs" ).tabs();
});
$(document).ready(function(){
	//var validated = "<?php echo $validated; ?>"; 
	var username = "<?php echo $username; ?>";
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
      	/*$('#').click(function () 
      	{
		var postData2 = {'action': 'valid'};
		$.ajax({
		        type: "POST",
		        data: postData2,
		        url: "purchase_backend.php",                  //  

		        success: function(data)          //on recieve of reply
		                 {
					alert("hello");	
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
			alert("Enter the code emailed to you.");
		}
	});*/
});
</script>
</html>




















