<?php
include "../db/db.php";

$x = $_POST['type'];
$y = $_POST['prod_id'];

$x =array($x);
$y =array($y);


if($x[0] == "1")
{
	$likes = array("likes");
	$prods = array("product_id");

	$old = get("product",$prods,$y);
	$new = ++$old['likes'];
	
	$new2 = array($new);

	$res = update("product",$likes,$new2,$prods,$y);
	if ($res == 0) echo "false";
	echo $new;
}

if($x[0] == "2")
{
	$dislikes = array("dislikes");
	$prods = array("product_id");

	$old = get("product",$prods,$y);
	$new = ++$old['dislikes'];
	
	$new2 = array($new);

	$res = update("product",$dislikes,$new2,$prods,$y);
	echo $new;
}

if($x[0] == "3")
{
	$old = get("product",array("product_id"),$y);
	echo $old['likes'];
}

if($x[0] == "4")
{
	$old = get("product",array("product_id"),$y);
	echo $old['dislikes'];
}

?>
