<?php 
include "db/db.php";//include db script
session_start();
session_unset();
session_destroy();
session_start();
$_SESSION['user'] = "guest";
//$_SESSION['cart'] = array();
$username = $_SESSION['user'];
$sessionid = session_id();

//echo"$username and $sessionid";
?>
<!DOCTYPE html>
<html>
<head>
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>-->
<link rel="stylesheet" media="all" href="header.css" type="text/css" />
</head>

<body>
	<div class="header" id="header" name="header">
	
		
	</div>
<div id="main" class="container">



    <div id="pageContent" aligin="center"><center><h1 style="margin:75px;"> Thanks For Visiting! </h1></center></div> 


  
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
      
});
</script>
</html>




















