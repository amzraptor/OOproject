




<?php

include('cart_functions.php');

$MyCart= new Cart;

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cart</title>
</head>
<body>

<?php

if (isset($_POST['add']))

{


echo 'item added';
///text field from ""
$newitem = $_POST['textfield'];
$MyCart->Add_to_Cart($newitem);

echo  ' successfly';


}


?>




<form id="form1" name="form1" method="post" action="<?=$_SERVER['PHP_SELF'] ?> " >
<table width="50%" border="1" cellpadding="1">

<tr>
<td width="5px">  <input type="text" name="textfield"  /></td>
<td>info</td>
<td>x</td>
</tr>

</table>
<p>&nbsp; </p>
<p>&nbsp;</p>
<p>


<input name="update" type="submit" value="update" />
</p>
</form>

<hr/>

<form id="form2" name="form2" method="post" action="<?=$_SERVER['PHP_SELF'] ?> " >
<input type="text" name="textfield" />

<input name="add" type="submit" value="add" />

<hr/>
</form>



</body>
</html>
