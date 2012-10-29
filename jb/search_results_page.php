<?php 
session_start();
echo '<!DOCTYPE html>
<html>
    <head>
	<link rel="stylesheet" type="text/css" href="search_bar_style.css" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
        <style>
            *{
                padding:0;
                margin:0;
            }
           
            span.reference{
                position:fixed;
                left:10px;
                bottom:10px;
                font-size:11px;
            }
            span.reference a{
                color:#fff;
                text-decoration:none;
                text-transform: uppercase;
                text-shadow:0 1px 0 #000;
            }
            span.reference a:hover{
                color:#f0f0f0;
            }
            
        </style>

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
      


    </head>



    <body>
        <div class="content">

		<div style="width:20%;height:600px;float:left;background-color:#aaa;">

';

// Use this if searching for product
$product_search_filter = ' <form method="post" onsubmit="return price_adjust();">
		      
			<ul>
				<strong><label style="font-size:20px;">Price</label></strong><br />

				<li><input type="checkbox" name ="price[]" value="0-10" /><label>$0 - $10</label></li>
				<li><input type="checkbox" name ="price[]" value="10-20" /><label>$10 - $20</label></li>
				<li><input type="checkbox" name ="price[]" value="20-50" /><label>$20 - $50</label></li>
				<li><input type="checkbox" name ="price[]" value="50-100" /><label>$50 - $100</label></li>
				<li><input type="checkbox" name ="price[]" value="100-500" /><label>$100 - $500</label></li>
				<li><input type="checkbox" name ="price[]" value="500-1000" /><label>$500 - $1000</label></li>
				<li><input type="checkbox" name ="price[]" value="1000-5000" /><label>$1000 - $5000</label></li>
				<li><input type="checkbox" name ="price[]" value="5000+" /><label>$5000+</label></li>
					
				<strong><label style="font-size:20px;">Order</label></strong><br />

				<li><input type="radio" name ="price_order[]" value="highestfirst" /><label>Highest to Lowest</label></li>
				<li><input type="radio" name ="price_order[]" value="lowestfirst" /><label>Lowest to Highest</label></li>
			</ul>

			<input type="submit" name="filter_submit" value="filter"/>
			
		        </form>';

$store_search_filter = 'Filter by Store popularity';

if($_POST["search_type"] == "bystore")
{ 
	echo $store_search_filter;
}
else
{
	echo $product_search_filter;
}

echo '</div> <div style="width:80%;height:600px;float:left;background-color:#ddd;"> <div style="width:100%;background-color:#eee;">
SOMETHING COULD GO HERE. </div>';

// Database Stuff to handle search_page request		

function search_page()
{
	$db = new mysqli('localhost', 'root', 'root', 'jewelry_box');
	if(!$db) { echo "could not connect to the database"; } 

	if(isset($_POST['inputString']))
	{
		$queryString = $db->real_escape_string($_POST['inputString']);

		if(strlen($queryString) > 0) 
		{
			$search_type = $_POST["search_type"];
			$search = $_POST["search"];
			$gender_search = $_POST["gender"];

			for ($i = 0; $i < 10;$i++)
			{	
				echo $search[$i], " ";
			}				
			echo "<br/>";
			$category_checks = count($search); 
			$gender_checks = count($gender_search);

		
			if ($search_type == "bystore")
			{
				$sql_query = "SELECT store_name FROM STORE WHERE store_name LIKE '%".$queryString."%'";
			}
			else	//if ($search_type == "byproduct")
			{

				$sql_query = "SELECT product_img1, product_name, product_price FROM PRODUCT WHERE product_name LIKE '%".$queryString."%'";

				if ($category_checks >= 1) $sql_query .= " AND ";
				for ($i = 0; $i < $category_checks;$i++)
				{
					$sql_query .= "product_category = " ."'".$search[$i]."'";
					if ($i != $category_checks - 1) $sql_query .= " AND ";	
				}

				if ($gender_checks >= 1) $sql_query .= " AND ";
				for ($i = 0; $i < $gender_checks;$i++)
				{
					$sql_query .= "product_gender = " ."'".$gender_search[$i]."'";
					if ($i != $gender_checks - 1) $sql_query .= " AND ";	
				}
	
			}

			$query = $db->query($sql_query);
			if($query) 
			{
				if ($search_type == "bystore")
				{
					while ($result = $query ->fetch_object()) 
					{
						$query_store_result .= '<div id="store_window" style="
							background-color:red;width:100px;height:100px;margin:10px;float:left;">
							<p onClick="fill(\''.$result->store_name.'\');
							"><b>'.$result->store_name.'</b></p></div>';
					}

					mysql_close($db);
					return $query_store_result;
				}
				else
				{
					while ($result = $query ->fetch_object()) 
					{
					
						$query_product_result .= '<div id="store_window" style="
							background-color:blue;width:200px;height:200px;margin:10px;float:left;">

							<img border="00" src="'.$result->product_img1.'" width="100" height="100" />
							<b>'.$result->product_name.'</b><br />																																																																																									'
							.$result->product_price.'
							</div>';

							echo "<br />IN RESULT: ",$result->product_img1;
					}
					mysql_close($db);
					return $query_product_result;
				}

			}
			else 
			{
				echo "there was a problem with the query";
			}
		}
		else 
		{

		}
	}
	else 
	{
		echo "no";
	}

	mysql_close($db);

}

// Database Stuff to handle price adjustment request
function price_adjust()
{
	$db = new mysqli('localhost', 'root', 'root', 'jewelry_box');
	if(!$db) { echo "could not connect to the database"; } 

	$price = $_POST["price"];
	$price_order = $_POST["price_order"];

	$price_checks = count($price); 
	$result_of_search = search_page();

	if ($price_order == "lowestfirst") $result_of_search .= " ORDER BY product_price ASC";
	if ($price_order == "highestfirst") $result_of_search .= " ORDER BY product_price DESC";

	mysql_close($db);
	echo "<br> QUERY PRODUCT RESULT ",$result_of_search;
}

if(isset($_POST['search_submit']))
{
	echo search_page();
}


echo '</div></div></body></html>';

?>
