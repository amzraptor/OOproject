<div class="header">

<!--  LOGO GROUP !-->
<div style="height:20%;">
<div style="height:100%;width:75%;float:left;">
<form action='main.php' method='POST'>
		<input type="hidden" id="session" name="session" value="<? $_POST['session'] ?>">
		<input type="hidden" id="page" name="page" value="guesthome">
<input type="image" src="images/Website Logo.png" width="250" height="100" alt="submit">
	</form>
</div>

<!-- SIGNIN|SIGNUP GROUP !-->
<div style="height:100%;width:25%;float:right;" align="right">
	<form action='main.php' method='POST'>
		<input type="hidden" id="session" name="session" value="<? $_POST['session'] ?>">
		<input type="hidden" id="page" name="page" value="signup-in">
<input  id="brown_button" type='submit' value="signin | signup"></br>
	</form>
</div>

</div>
</div>
