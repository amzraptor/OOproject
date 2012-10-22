<?php
echo "create-store-backend";

$store_name = $_GET["store_name"];
$prim_category = $_GET["prim-category"];
$store_bio = $_GET["store_bio"];
$theme_layout = $_GET["theme_layout"];

function create_store($store_name, $prim_category, $store_bio, $theme_layout)
{
	echo "store_created";
	echo $store_name;
	echo "\n";
	echo $prim_category;
	echo "\n";
	echo $store_bio;
	echo "\n";
	echo $theme_layout;
}

create_store($store_name, $prim_category, $store_bio, $theme_layout);

?>
