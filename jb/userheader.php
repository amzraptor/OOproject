<div>
<!--  LOGO GROUP !-->
<div  class="header" style="height:20%;">
<div style="height:100%;width:52%;float:left;">
<form action='main.php' method='POST'>
		<input type="hidden" id="session" name="session" value="<? $_POST['session'] ?>">
		<input type="hidden" id="page" name="page" value="userhome">
		<input type="image" src="images/Website Logo.png" width="250" height="100" alt="submit">
</br>
	</form>
</div>


<!-- USER OPTIONS GROUP !-->
<div style="height:90px;width:48%;float:right;" align="right">

<div style="height:100%;width:25%;float:right;" align="center">
	<form action='main.php' method='POST'>
		<input type="hidden" id="session" name="session" value="<? $_POST['session'] ?>">
		<input type="hidden" id="page" name="page" value="stores">
<input id="brown_button" type='submit' value="stores(0)"></br>
	</form>
</div>

<div style="height:100%;width:25%;float:right;" align="center">
	<form action='main.php' method='POST'>
		<input type="hidden" id="session" name="session" value="<? $_POST['session'] ?>">
		<input type="hidden" id="page" name="page" value="cart">
<input id="brown_button" type='submit' value="cart(0)"></br>
	</form>
</div>

<div style="height:100%;width:25%;float:right;" align="center">
	<form action='main.php' method='POST'>
		<input type="hidden" id="session" name="session" value="<? $_POST['session'] ?>">
		<input type="hidden" id="page" name="page" value="logout">
<input id="brown_button" type='submit' value="logout"></br>
	</form>
</div>
</div>
