<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="website_style.css" />
<script type="text/javascript" src="includes/jquery-1.2.1.pack.js"></script>
<script type="text/javascript">
function lookup(inputString) {
	if(inputString.length == 0) {
		$('#suggestions').hide();
	}else{
		$.post("search_products_backend.php", {queryString: ""+inputString+""}, function(data) {
			if(data.length >0) {
				$('#suggestions').show();
				$('#autoSuggestionsList').html(data);
			}
			});
	}
}

function fill(thisValue) {
	$('#inputString').val(thisValue);
	setTimeout("$('#suggestions').hide();", 200);
}
</script>

</head>


<body>
<div id="headerpage1">
<!--  LOGO GROUP !-->
<div id="headerpage" style="height:80px;width:60%;float:left;">
<h1 align="left"><a id="logobutton" href="index.php" style="color:white;">THE JEWELRY BOX</a></h1>
</div>

<!-- ACCOUNT INFO GROUP !-->
<div id="headerpage" style="height:80px;width:40%;float:left;" align="right">
	<div id="youraccounttab" style="height:80px;width:50%;float:left;" align="right">
		<a href="account_home.php" style="color:black;">Your Account</a> <br>
		<a href="signin_page.php" style="color:black;">Sign In | Sign Up</a>
	</div>

	<div id="youraccounttab2" style="height:80px;width:50%;float:left;" align="right">
		<a href="index.php" style="color:black;">Cart</a> <br>
		<a href="index.php" style="color:black;">Sign Out</a>
	</div>
</div>

<!-- NAVIGATION AND SEARCH BAR GROUP!-->
<div id="headerpage" style="height:30px;width:70%;float:left">
<ul id="nav">

	<!-- RINGS !-->
	<li>
		<a href="index.php">Rings</a>
		<ul>
			<li> <a href="index.php">type1</a> </li>
			<li> <a href="index.php">type2</a> </li>
		</ul>
	</li>

	<!-- BRACLETS !-->
	<li>
		<a href="index.php">Bracelets</a>
		<ul>
			<li> <a href="index.php">type1</a> </li>
			<li> <a href="index.php">type2</a> </li>
		</ul>
	</li>

	<!-- EARRINGS !-->
	<li>
		<a href="index.php">Earrings</a>
		<ul>
			<li> <a href="index.php">type1</a> </li>
			<li> <a href="index.php">type2</a> </li>
		</ul>
	</li>

	<!-- NECKLACES !-->
	<li>
		<a href="index.php">Necklaces</a>
		<ul>
			<li> <a href="index.php">type1</a> </li>
			<li> <a href="index.php">type2</a> </li>
		</ul>
	</li>

	<!-- WATCHES !-->
	<li>
		<a href="/jewelry_boxindex.php">Watches</a>
		<ul>
			<li> <a href="/jewelry_boxindex.php">type1</a> </li>
			<li> <a href="/jewelry_boxindex.php">type2</a> </li>
		</ul>
	</li>

	<!-- BROWSE !-->
	<li>
		<a href="index.php">Browse</a>
	</li>
</ul>
</div>

<div id="headerpage" style="height:30px;width:30%;float:left;">


<form id="search_form">
<input type="text" size="30" style="font-size: 16px;" name="inputString" id="inputString" onkeyup="lookup(this.value);" onblur="fill();"  />
<span style="font-size:12px;"><input type="submit" name="submit" value="Search" /></span>
<div align="left" class="suggestionsBox" id="suggestions" style="display:none;">
<div align="left" class="suggestionList" id="autoSuggestionsList">

&nbsp;
</div>
</div>
</form>

</div>
</div>
</body>



</html>
