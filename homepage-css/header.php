<?php 
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
<head>
<link rel="stylesheet" media="all" href="header.css" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
</head>
<body>

	<div class="header" id="header" name="header">
	
		
	</div>

	<div id="title_banner_bg">

		<div id="title_banner">

		</div>

	</div>

	<div id="content">

		<h1> <font>Top</font> Picks </h1>

		<div id="item">
			<div id="itempic">
				<img src="rings.JPG" width="220" height="140" border="0" /> 
			</div>

			<div id="itemspecs">
				Rings
			</div>
		</div>
			
	</div>

</body>
<script type="text/javascript" src = "header.js"></script>


</html>
