<?php
echo "hello invoice:";
echo $_GET['invoice'];
?>
<?php 
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

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" media="all" href="header.css" type="text/css" />
</head>

<body>
	<div class="header" id="header" name="header">
	
		
	</div>
<div id="main" class="container">



    <div id="pageContent" aligin="center"><h1 style="margin-left:30%;"> Thanks For Visiting! </h1></div> 


  
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




















