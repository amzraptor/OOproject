<?php   
$action = "vendor_info";
?>
<!DOCTYPE html>
  <html>
    <head>
	<script type="text/javascript" src="jquery-1.2.1.pack.js "></script>
</head>
<body>
<div id="background" style="width=100%;height:100%;float:left;">

<!-- vendor_info -->
	<div id="vendor_info" style="float:left;margin-left:2%;height=10%;width:100%;">
		<form id="vendorinfo" style="float:left;background-color:#585858;width:30%;border-style:solid;border-color:white;border-width:6px;"><p style="font-family:'Comic Sans MS', cursive, sans-serif;margin-right:10px;margin-left:5%;">
<h5 style="color:white;margin-left:6%;"><a>Getting Started</a></h5>
<h5 style="color:white;margin-left:6%;"><a>Vendor Infomation</a></h5>
<h5 style="color:white;margin-left:6%;"><a>Store Information</a></h5>
<h5 style="color:white;margin-left:6%;"><a>Design Store</a></h5>
<h5 style="color:white;margin-left:6%;"><a>Manage Store</a></h5>
</form>
</div>
<!-- vendor form -->
<div style="float:left;width:80%;">
<div style="margin-top:5%;margin-left:20%;height:90%;width:100%;" >
<form  align="center" action="main.php" id="vendorform" method="POST" style="width:100%;display:none;border-color:white;border-width:6px;border-style:solid;margin-right:30%;margin-left:10%;background-color:#585858;">
<input type="hidden" id="page" name="page" value="create_store">
<p style="color:white;font-family:'Comic Sans MS', cursive, sans-serif;margin-right:10px;margin-left:30%;margin-top:10px;">
Vendor Infomation </p></br>

<label style="color:white;float:left;margin-left:10%;">Address</label><br>
<input type="text" id="address" name="address" align="center" style="margin-left:10%;width:60%;margin-top:10px;"> </br></br>

<label style="color:white;float:left;margin-left:10%;">Email</label><br>
<input type="text" id="email" name="email" align="center" style="margin-left:10%;width:60%;margin-top:10px;"> </br></br>

<input style="margin-left:10%;font-family:'Comic Sans MS', cursive, sans-serif;" type="submit" value="next"> </br></br></br>
</form>
</div> 
</div>
</div>
</body>
<script type="text/javascript" >
$(document).ready(function()
{
	var action = '<?php echo $action; ?>';
	if(action == "vendor_info")
	{
		$('#vendorform').show();
	}

});

</script>
</html>
