
<div>
<!--  LOGO GROUP !-->
<div style="height:20%;">
<div style="height:100%;width:52%;float:left;background-color:black;">
<form action='main.php' method='POST'>
		<input type="hidden" id="session" name="session" value="<? $_POST['session'] ?>">
		<input type="hidden" id="page" name="page" value="userhome">
<input align="left" style="font-size:250%;margin-left:20px;color:white;background-color:black;font-family:'Comic Sans MS', cursive, sans-serif;margin-right:20px;margin-top:20px;" type='submit' value='THE JEWELRY BOX'></br>
	</form>
</div>


<!-- USER OPTIONS GROUP !-->
<div style="height:90px;width:48%;float:right;background-color:black;" align="right">

<div style="height:100%;width:25%;float:right;background-color:black;" align="center">
	<form action='main.php' method='POST'>
		<input type="hidden" id="session" name="session" value="<? $_POST['session'] ?>">
		<input type="hidden" id="page" name="page" value="stores">
<input style="color:white;background-color:black;font-family:'Comic Sans MS', cursive, sans-serif;margin-right:20px;margin-top:10px;" type='submit' value="stores(0)"></br>
	</form>
</div>

<div style="height:100%;width:25%;float:right;background-color:black;" align="center">
	<form action='main.php' method='POST'>
		<input type="hidden" id="session" name="session" value="<? $_POST['session'] ?>">
		<input type="hidden" id="page" name="page" value="cart">
<input style="color:white;background-color:black;font-family:'Comic Sans MS', cursive, sans-serif;margin-right:20px;margin-top:10px;" type='submit' value="cart(0)"></br>
	</form>
</div>

<div style="height:100%;width:25%;float:right;background-color:black;" align="center">
	<form action='main.php' method='POST'>
		<input type="hidden" id="session" name="session" value="<? $_POST['session'] ?>">
		<input type="hidden" id="page" name="page" value="logout">
<input style="color:white;background-color:black;font-family:'Comic Sans MS', cursive, sans-serif;margin-right:20px;margin-top:10px;" type='submit' value="logout"></br>
	</form>
</div>
</div>
