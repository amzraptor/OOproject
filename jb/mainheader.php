
<div class="header">

<!--  LOGO GROUP !-->
<div style="height:20%;">
<div style="height:100%;width:75%;float:left;">
<form action='main.php' method='POST'>
		<input type="hidden" id="page" name="page" value="guesthome">
<input type="image" src="images/Website Logo.png" width="250" height="100" alt="submit">
	</form>
</div>

<!-- SIGNIN|SIGNUP GROUP !-->
<div style="height:100%;width:25%;float:right;" align="right">
	<form action='main.php' method='POST'>
		<input type="hidden" id="page" name="page" value="signup-in">
<input  id="brown_button" type='submit' value="signin | signup"></br>
	</form>
</div>

</div>
<!--  NAV OPTIONS GROUP !-->
<div  class="header" style="width:100%;height:20%;">
<div style='width:40%;float:left;margin-top:20px;'>
<form action='main.php' method='POST'>
		<input type="hidden" id="page" name="page" value="createstore">
<input type="submit" id="brown_button" value="create a store"></br>
</form>
</div>
<div style='width:60%;float:left;'>
<?php include "search_page.php"; ?>	
</div>
</div>
</div>

