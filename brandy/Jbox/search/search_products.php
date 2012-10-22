<!--handle pic later <input type='hidden' name='picture array' value='%s' /><br /> 
-->
<?php
function seacrch_product($category, $metal, $size, $gemstone, $gender, $store)
{
	return array( array("heart earings", 
			     "5.00", 
			     "gold dangeling",
			     "Mary's crafts", 
			     "prod1",
			     array("pic1.png", "pic2.png")),
		      array("dragonfly pindant", 
			     "30.00", 
			     "gold pindant with dragonfly",
			     "zale's", 
			     "prod2",
			     array("pic1.png", "pic2.png")),
		      array("heart bracelet", 
			     "10.00", 
			     "silver round",
			     "Mary's crafts", 
			     "prod3",
			     array("pic1.png", "pic2.png")),
		      array("silver bling ring", 
			     "25.00", 
			     "silver bling with ruby",
			     "Meg's crafts", 
			     "prod4",
			     array("pic1.png", "pic2.png"))
		);
}

$products = seacrch_product("all", "all", "all", "all", "all", "all");
foreach ($products as &$prod)
{
	$item = sprintf("
<html>
<body>
<form action='backend_search_products.php' method='post'>
product: '%s'
<input type='hidden' name='prod_name' value='%s' />
<input type='hidden' name='cost' value='%s' />
<input type='hidden' name='prod_description' value='%s' />
<input type='hidden' name='vendor_name' value='%s' /><br />
<input type='hidden' name='prod_id'= value='%s'/>
<input type='submit' />
</form>
</body>
</html>", $prod[0], $prod[0], $prod[1],  $prod[2], $prod[3], $prod[4]);
	echo ($item);
}
?>

