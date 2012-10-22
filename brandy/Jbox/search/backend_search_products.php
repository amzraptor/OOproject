<?php
$prod_name=$_POST['prod_name']; 
$cost=$_POST['cost']; 
$prod_description=$_POST['prod_description']; 
$vendor_name=$_POST['vendor_name']; 
$prod_id=$_POST['prod_id']; 

echo (sprintf("
<html>
<body> 
prod_name: '%s' 
<br />
cost: '%s'
<br />
prod_description: '%s'
<br />
vendor_name: '%s'
<br />
prod_id: '%s'
<br />
<form action='search_products.php' method='post'>
</br>
back to previous page.
</br>
<input type='submit' />
</form>

</body>
</html> ", $prod_name, $cost, $prod_description, $vendor_name, $prod_id));
?>
