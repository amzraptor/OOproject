<?php $username = $_SESSION['username']; ?>
<link rel="stylesheet" type="text/css" href="css/style.css" /> 
<!DOCTYPE html>
  <html>
    <head>
	<script type="text/javascript" src="jquery-1.2.1.pack.js "></script>
</head>
<body>

<div class="header" style="height:200px;width:100%;">

	<div style="height:60%;width:100%;"><!--this is top row-->
		<!--  LOGO GROUP !-->
		<div style="width:75%;float:left;">
			<form action='main.php' method='POST'>
			<input type="hidden" id="page" name="page" value="guesthome">
			<input type="image" src="images/Website Logo.png" width="250" height="100" alt="submit">
				</form>
		</div>

		<div style="width:25%;float:left;">

			<!-- USER GROUP !--> <div style='display:none;' class="userOptions">
			<form action='main.php' method='POST' class="userOptions">
			<input type='hidden' id='page' name='page' value='logout'>
			<input  id='brown_button' type='submit' value='logout' class="userOptions"></br></form></div>

			<!-- GUEST GROUP !--> <div style='display:none;' class="guestOptions">
			<form action='main.php' method='POST'  class="guestOptions">
			<input type='hidden' id='page' name='page' value='signupin'>
			<input type='hidden' id='action' name='action' value='signupin'>
			<input  id='brown_button' type='submit' value="signin | signup" class="guestOptions">
			</br></form></div>

		</div>

	</div>

<script type="text/javascript" >
$(document).ready(function()
{
	var option = '<?php echo $username; ?>';
	if(option == "guest")
	{
		$('.guestOptions').show();
	}
	else
	{
		$('.userOptions').show();
	}
});

</script>

	<!--  NAV OPTIONS GROUP !-->
	<div class="header" style="width:100%;height:40%;">
		<div style='width:70%;float:left;margin-top:20px;'>
			<form action='main.php' method='POST'>
					<input type="hidden" id="page" name="page" value="createstore">
			<input type="submit" id="brown_button" value="create a store"></br>
			</form>
		</div>
		<div style='width:30%;float:left;'>
		<?php include "search_page.php"; ?>	
		</div>

	</div>

</div>

</body>
</html>
