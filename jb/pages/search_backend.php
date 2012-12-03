<?php 
include "../db/db.php";//include db script



if(!$_POST['search_words']) die("search text can't be empty"); 


function get_search_results($search_results, $index = 1)
{
	$table = "product";
	$fields =array("name");
	$values =array($search_results);
	
	return get_search($table,$fields,$values);

    
}

$products = get_search_results($_POST['search_words']);
echo json_encode($products);


?>

