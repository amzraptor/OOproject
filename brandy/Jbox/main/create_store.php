<!DOCTYPE html>
<html>
<?php include "header_1.php"; ?>


<body>
<div id="content">
<h1> Create Store </h1>
<h2> Store Name </h2>
<form action="create_store_backend.php" method="get">
Store Name: <input type="text" name="store_name">

<h2> Bio </h2>
Store Bio: <input type="text" name="store_bio">

<h2> Primary Category </h2>

<input type="radio" name="prim-category" value="rings">Rings<br>
<input type="radio" name="prim-category" value="watches">Watches <br>
<input type="radio" name="prim-category" value="bracelets">Bracelets <br>
<input type="radio" name="prim-category" value="necklaces">Necklaces <br>
<input type="radio" name="prim-category" value="earrings">Earrings <br>

<h2> Theme </h2>
<input type="radio" name="theme-layout" value="theme1">Theme 1 <br>
<!-- <iframe src="theme-1.php" width="800" height="600"></iframe> <br><br>  !-->
<input type="radio" name="theme-layout" value="theme2">Theme 2 <br>
<!-- <iframe src="theme-2.php" width="800" height="600"></iframe> !-->

<br />
<input type="submit" value="Create">
</form>
</div>
</body>

<?php include "footer_1.php"; ?>

</html>
