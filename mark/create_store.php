<!DOCTYPE html>
<html>
<?php include "header_1.php"; ?>


<body>
<div id="content">
<h1> Create Store </h1> 
<br />
																																																									
<form id="form_1" action="create_store_backend.php" method="get">

<div>
	<label> Store Name </label><input type="text" name="store_name"> <br /><br />
	<label> Store Bio </label> <input type="text" name="store_bio" /> <br /> <br />
</div>
<div id="radio_group">
	<label> Primary Category </label>  <br />
	<input type="radio" name="prim-category" value="rings">Rings<br /> 
	<input type="radio" name="prim-category" value="watches">Watches <br />
 	<input type="radio" name="prim-category" value="bracelets">Bracelets <br />
	<input type="radio" name="prim-category" value="necklaces">Necklaces <br />
	<input type="radio" name="prim-category" value="earrings">Earrings <br /><br />
</div>
<br />
<div id="radio_group">
	<label> Template </label> <br />
	<input type="radio" name="template-layout" value="template1">Template 1<br />
	<input type="radio" name="template-layout" value="template2">Template 2 <br />
</div>

<input type="submit" value="Create">
<br />
<br />

</form>
</div>
</body>

<?php include "footer_1.php"; ?>

</html>
