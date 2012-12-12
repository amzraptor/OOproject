<!DOCTYPE html>
<html>
<head>
 <script type="text/javascript" src="jQuery.js"></script>
 <script type="text/javascript" src="farbtastic.js"></script>
 <link rel="stylesheet" href="farbtastic.css" type="text/css" />
<link rel="stylesheet" media="all" href="header.css" type="text/css" />


</head>

<body>
	<div class="header" id="header" name="header">
	
		
	</div>

<div id="main" class="container"  style="width:100%;float:left;">
<div class="west" style="width:50%;">
</div>


<div class="east" style="float:left;width:50%;">

<h1 style="margin-left:60%;">Choose a color</h1>
<form action="create_store.php" method="POST" align="center" style="width:400px;margin-left:48%;">
  <div align="center" class="form-item"><label for="color">Color:</label><input type="text" id="color" name="color" value="#123456" /></div><div align="center" id="picker"></div>
<input type="hidden" id="selection" name="selection" value="<?php echo $_POST['selection'];?>"/>
<button id="done" style="float:right;">Done</button>
</form>
</div>
</div>
</body>
<script type="text/javascript" src = "header.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#demo').hide();
    $('#picker').farbtastic('#color');
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
      
});
</script>
</html>




















