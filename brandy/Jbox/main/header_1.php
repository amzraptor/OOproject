<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="website_style.css" />
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
		<a href="customer_homepage.php" style="color:black;">Sign In | Sign Up</a>
	</div>

	<div id="youraccounttab2" style="height:80px;width:50%;float:left;" align="right">
		<a href="logout.php" style="color:black;">Sign Out</a>
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

	<!-- STORES !-->
	<li>
		<a href="index.php">Stores</a>
	</li>
</ul>
</div>

<div id="headerpage" style="height:30px;width:30%;float:left;">

<div id="searchstores" style="height:80px;width:50%;float:left;" align="right">
	<a href="../search/search_stores.php" style="color:black;">Search Stores</a>
</div>
<div id="searchproducts" style="height:80px;width:50%;float:left;" align="right">
	<a href="../search/search_products.php" style="color:black;">Search Products</a>
</div>
<!--<div class="search_form"><form>
<input type="text" name="s" /> <input type="submit"  id="submit_button" value="Search" />
</form></div>-->

</div>
</div>
</body>



</html>
