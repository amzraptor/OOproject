<?php $username = $_SESSION['username']; ?>
<!DOCTYPE html>
  <html>
    <head>
	<script type="text/javascript" src="jquery-1.2.1.pack.js "></script>
</head>
<body>
<div class="header" style="width:100%;height:12%;">

		<!--  LOGO GROUP !-->
		<div style="width:25%;float:left;">
			<form action='main.php' method='POST'>
			<input type="hidden" id="page" name="page" value="guesthome">
			<input type="image" src="images/Website Logo.png" width="150" height="60" alt="submit">
				</form>
		</div>

		
		<div style='width:40%;float:left;'>
		<?php include "search_page.php"; ?>	
		</div>

		<div style="width:15%;float:left;margin-top:2%;">

		<!-- CREATE STORE !--> <div class="userOptions">
		<form action='main.php' method='POST'>
		<input type="hidden" id="page" name="page" value="createstore">
		<input type="submit" id="button" value="create a store"></br>
		</form></div>
		</div>

		<div style="width:15%;float:left;margin-top:2%;margin-left:2%;">
		<!-- USER GROUP !--> <div style='display:none;' class="userOptions">
			<form action='main.php' method='POST' class="userOptions">
			<input type='hidden' id='page' name='page' value='logout'>
			<input  id='button' type='submit' value='logout' class="userOptions"></br></form></div>

		<!-- GUEST GROUP !--> <div style='display:none;' class="guestOptions">
			<form action='main.php' method='POST'  class="guestOptions">
			<input type='hidden' id='page' name='page' value='signupin'>
			<input type='hidden' id='action' name='action' value='signupin'>
			<input  id='button' type='submit' value="signin | signup" class="guestOptions">
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
<script src="jquery.js"></script>
<script src="jquery.backstretch.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<script src="jquery.backstretch.min.js"></script>

<script>
    $.backstretch("backgroundimage.jpg");
    $(".header").backstretch("bgcolor.png");
    
</script>
</body>
</html>
