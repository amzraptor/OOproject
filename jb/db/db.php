<?php

/////////////////////////////////////////////////////////////////////////////////////
function get_conn_and_connect()
{
    $con = mysql_connect("localhost","root","root");
    if (!$con)
      {
      	echo("I can't get a connection");
      }

    if (!mysql_select_db("jewelry_box", $con))
      {
      	echo("problem with jbox");
      }

    return $con;
}

function get($table, $fields, $values)
{
    if(sizeof($fields) != sizeof($values))
    {
	echo"error in add field and value mismatch.";
	return 0;
    }
    $sql = "";
    for ($i=0; $i<sizeof($fields); $i++)
    {
	$sql.= ("$fields[$i]='$values[$i]' AND ");
    }
    $sql = "SELECT * FROM $table WHERE ".substr($sql,0,-5);
    $con = get_conn_and_connect();
    $query = mysql_query($sql, $con);
    $row = mysql_fetch_array($query);
    if ($row == false) 
    {
        close_conn($con);
        return false;
    }
    close_conn($con);
    return $row;
}

//echo "hello";

/*$x = get_assoc("product",array("product_id"),array(1));
if($x == false)echo "no";
if($x == true) echo $x['likes'];
echo "hello";*/
function get_assoc($table, $fields, $values)
{
    if(sizeof($fields) != sizeof($values))
    {
	echo"error in add field and value mismatch.";
	return 0;
    }
    $sql = "";
    for ($i=0; $i<sizeof($fields); $i++)
    {
	$sql.= ("$fields[$i]='$values[$i]' AND ");
    }
    $sql = "SELECT * FROM $table WHERE ".substr($sql,0,-5);
    $con = get_conn_and_connect();
    $query = mysql_query($sql, $con);
    $row = mysql_fetch_assoc($query);
    if ($row == false) 
    {
	//echo"hey";
        close_conn($con);
        return false;
    }
    close_conn($con);
    return $row;
}

function get_mult_assoc($table, $fields, $values)
{
    if(sizeof($fields) != sizeof($values))
    {
	echo"error in add field and value mismatch.";
	return 0;
    }
    $sql = "";
    for ($i=0; $i<sizeof($fields); $i++)
    {
	$sql.= ("$fields[$i]='$values[$i]' AND ");
    }
    $sql = "SELECT * FROM $table WHERE ".substr($sql,0,-5);
    $con = get_conn_and_connect();
    $query = mysql_query($sql, $con);
    $rows = array();
    $i = 0;

    while ($row = mysql_fetch_assoc($query))
    {
		$rows[$i] = $row;
		$i++;
    }
    if (sizeof($rows) == 0) 
    {
        close_conn($con);
        return false;
    }
    close_conn($con);
    return $rows;
}
/*echo"hey";
$x = get_mult_assoc("store", array("user_username"), array("bdpoag1"));*/
function update($table, $setfields, $setvalues, $wherefields, $wherevalues)
{
    if(sizeof($setfields) != sizeof($setvalues) and sizeof($wherefields) != sizeof($wherevalues) )
    {
	echo"error in add field and value mismatch.";
	return 0;
    }
    $sql = "";
    for ($i=0; $i<sizeof($setfields); $i++)
    {
	$sql.= ("$setfields[$i]='$setvalues[$i]',");
    }

    $sql2 = "";
    for ($i=0; $i<sizeof($wherefields); $i++)
    {
	$sql2.= ("$wherefields[$i] = '$wherevalues[$i]' AND ,");
    }

    $sql = "UPDATE $table SET ".substr($sql,0,-1)." WHERE ".substr($sql2,0,-5);
    $con = get_conn_and_connect();
    $query = mysql_query($sql, $con);
    if ($query == false) 
    {
        close_conn($con);
        return false;
    }
    close_conn($con);
    return true;
}


function add($table, $fields, $values)
{
    if(sizeof($fields) != sizeof($values))
    {
	echo"error in add field and value mismatch.";
	return 0;
    }
    $con = get_conn_and_connect();
    $sql="";
    $sql2="";
    for ($i=0; $i<sizeof($fields); $i++)
    {
	$sql.="$fields[$i],";
	$sql2.="'$values[$i]',";
    }
    $sql = "INSERT INTO $table(".substr($sql,0,-1).")VALUES(".substr($sql2,0,-1).")";
//echo"sql: $sql";
    $query = mysql_query($sql,$con);
    if ($query) 
    {
        $curr_id = mysql_insert_id();
        close_conn($con);
      	return $curr_id;
    }

    close_conn($con);
    return false;
}


function randString()
{
    $length = 24;
    $chars = implode("", range('0', '9')).implode("", range('A', 'Z')).implode("", range('a', 'z')); 
    $str = '';
    $count = strlen($chars);
    while ($length--) 
     {
        $str .= $chars[mt_rand(0, $count-1)];
    }
    return $str;
}

function close_conn($con) 
{
    mysql_close($con);
}

//echo"heythere";
/////////////////////////////////////////////////////////////////////////////////////


function update_email_valid($username)
{
    $setfields = array("valid");
    $setvalues = array("true");
    $wherefields = array("username");
    $wherevalues = array($username);
    $row = update("user", $setfields, $setvalues, $wherefields, $wherevalues);
    if ($row != false)
    {
        return true;
    }
    return false;
}

function get_email_valid($username)
{
    $fields = array("username");
    $values = array($username);
    $row = get("user", $fields, $values);
    if($row != false)
    {
        return $id[6];
    }
    return false;
}

function email_validated($username)
{
    $fields = array("username");
    $values = array($username);
    $row = get("user", $fields, $values);
    if ($row != false && $row[6] != "notvalid")//check that emailvalid is true
    {
        return true;
    }
    return false;
}


function username_in_use($username)
{
    $fields = array("username");
    $values = array($username);
    $row = get("user", $fields, $values);
    if ($row == false) 
    {
	    return false;
    }
    return true;
}
//$c = user_in_user("bdpoag1", "pass8888");
//echo"me";
function user_in_user($username, $password)
{
    $fields = array("username", "password");
    $values = array($username, $password);
    $row = get("user", $fields, $values);
    if ($row == false) return false;
    return true;
}

function get_user_info($username, $password)
{
    $fields = array("username", "password");
    $values = array($username, $password);
    return get("user", $fields, $values);
}


function add_user($fname, $lname, $username, $password, $email)
{
    $fields = array("fname", "lname", "username", "password", "email");
    $values = array($fname,$lname, $username, $password, $email);
    return add("user", $fields, $values);
}

///////////////////////////////////////////////////
function get_user_id($username)
{
    $fields = array("username");
    $values = array($username);
    $id = get("user", $fields, $values);
    if($id != false)
    {
        return $id[0];
    }
    return false;
}

//$x = load_stores("bdpoag1");
//echo $x[0]["store_id"];
function load_stores($username)
{
    $fields = array("user_username");
    $values = array($username);
    return get_mult_assoc("store", $fields, $values);
}
/*$x = load_product_invoice(2);
echo "heee";
echo $x[0]["qty"];*/
function load_product_invoice($store_id)
{
    $fields = array("store_id");
    $values = array($store_id);
    return get_mult_assoc("product_invoice", $fields, $values);
}

function load_product($store_id)
{
    $fields = array("store_id");
    $values = array($store_id);
    return get_mult_assoc("product", $fields, $values);
}

function load_invoice($invoice_id)
{
    $fields = array("invoice_id");
    $values = array($invoice_id);
    return get_mult_assoc("invoice", $fields, $values);
}

function invoice_status($invoice_id)
{

	$con = get_conn_and_connect();
	$sql = "";
	$sql = "SELECT status AS status FROM invoice WHERE invoice_id = '$invoice_id'";
	    
	$query = mysql_query($sql, $con);
	$date = mysql_fetch_array($query);
	close_conn($con);
	return $date;
}

function invoice_date($invoice_id)
{

	$con = get_conn_and_connect();
	$sql = "";
	$sql = "SELECT dt AS date FROM invoice WHERE invoice_id = '$invoice_id'";
	    
	$query = mysql_query($sql, $con);
	$date = mysql_fetch_array($query);
	close_conn($con);
	return $date;
}

function invoice_total($invoice_id, $store_id)
{

	$con = get_conn_and_connect();
	$sql = "";
	$sql = "SELECT SUM(price*qty) AS total FROM product_invoice WHERE invoice_id = '$invoice_id' AND store_id = '$store_id'";
	    
	$query = mysql_query($sql, $con);
	$sum = mysql_fetch_array($query);
	close_conn($con);
	return $sum;
}

function get_invoices($store_id)
{
    
    $sql = "";
   
    $sql = "SELECT DISTINCT invoice_id AS invoice FROM product_invoice WHERE store_id = '$store_id'";
    $con = get_conn_and_connect();
    $query = mysql_query($sql, $con);
    $rows = array();
    $i = 0;

    while ($row = mysql_fetch_array($query))
    {
		$rows[$i] = $row;
		$i++;
    }

    close_conn($con);
    return $rows;
}
/*echo "hello";
//$x = get_invoices(3);
$x = invoice_date(3);
echo "hello".$x[0];*/

function load_store($store_id)
{
    $fields = array("store_id");
    $values = array($store_id);
    return get_assoc("store", $fields, $values);
}
/*echo"hello1";
$x = load_store(2);
echo $x['sname'];*/
/*$x = get_assoc("store", array("store_id"),array(2));
echo $x['sname'];*/

function save_color($selection, $color, $store)
{
    $setfields = array($selection);
    $setvalues = array($color);
    $wherefields = array("store_id");
    $wherevalues = array($store);
    $row = update("store", $setfields, $setvalues, $wherefields, $wherevalues);
    if ($row != false)
    {
        return true;
    }
    return false;
}
//add_store("bdpoag1");
function add_store($username)
{
    $fields = array("user_username");
    $values = array($username);
    return add("store", $fields, $values);
}

function save_info($store, $selection, $value)
{
    $setfields = array($selection);
    $setvalues = array($value);
    $wherefields = array("store_id");
    $wherevalues = array($store);
    return update("store", $setfields, $setvalues, $wherefields, $wherevalues);
}

//Cart Functions /
///////////////////////////////////////////////////
///////////////////////////////////////////////////
function get_info_for_cart($product_id)
{
    $sql = sprintf("SELECT name, description, price, img1 FROM product WHERE product_id = %d;", $product_id);
    return mysql_query($sql);
}
//function to check if a product exists
function productExists($product_id)
{
    //use sprintf to make sure that $product_id is inserted into the query as a number - to prevent SQL injection
    $sql = sprintf("SELECT * FROM product WHERE product_id = %d;", $product_id);

    return mysql_num_rows(mysql_query($sql)) > 0;
}

function save_cart_to_db($user,$product_id)
{
    $user_id = get_user_id($user);
    $fields = array("user_id", "product_id");
    $values = array($user_id, $product_id);
    add("cart", $fields, $values);
}

function load_cart_from_db($user)
{   
    $user_id = get_user_id($user);
    $fields = array("user_id");
    $values = array($user_id);
    $table = "cart";
    if(sizeof($fields) != sizeof($values))
    {
    echo"error in add field and value mismatch.";
    return 0;
    }
    $sql = "";
    for ($i=0; $i<sizeof($fields); $i++)
    {
    $sql.= ("$fields[$i]='$values[$i]' AND ");
    }
    $sql = "SELECT * FROM $table WHERE ".substr($sql,0,-5);
    $con = get_conn_and_connect();
    $query = mysql_query($sql, $con);
    $products = array();
    $i = 0;

    while ($row = mysql_fetch_assoc($query))
    {
    $products[$i] = $row;
    $i++;
    }

    close_conn($con);
    return $products;
}

function delete_products_from_cart($user)
{

    $con = mysql_connect("localhost", "root", "root");
    if (!$con)
    {

        echo"datbabase connection failed";
        exit;

    }

    if(!mysql_select_db("jewelry_box"))
    {
        echo " error selecting db";
        exit;
    }

    $query="SELECT user_id FROM user WHERE username ='$user'";
    if(!$results=mysql_query($query,$con))
    {
        echo mysql_error(), "error";
        exit;
    }

    $row= mysql_fetch_assoc($results);

    $userid= $row['user_id'];

    
    $sql="DELETE FROM cart WHERE user_id='".$userid."'";
    
    $result = mysql_query($sql, $con);

    if(!$result)
    {
        echo "<br/>","error in deletion";
        exit;
    }
    
    close_conn($con);
}

function get_search($table, $fields, $values)
{
    if(sizeof($fields) != sizeof($values))
    {
		echo"error in add field and value mismatch.";
		return 0;
    }

    $sql = "";
    for ($i=0; $i < sizeof($fields); $i++)
    {
		$sql.= ("".$fields[$i]." LIKE '%".$values[$i]."%' AND ");
    }

    $sql = "SELECT * FROM ".$table." WHERE ".substr($sql,0,-5);
	//echo"sql $sql";
    $con = get_conn_and_connect();
    $query = mysql_query($sql, $con);
    $products = array();
    $i = 0;

    while ($row = mysql_fetch_assoc($query))
    {
		$products[$i] = $row;
		$i++;
    }

    close_conn($con);
    return $products;
}

//CHECKOUT FUNCTIONS
/////////////

function get_product_qty_from_db($product_id)
{
    $fields = array("product_id");
    $values = array($product_id);
    $id = get_assoc("product", $fields, $values);
    if($id != false)
    {
        return $id["qty"];
    }
    return false;
}

function modify_product_qty_from_db($product_id, $new_qty)
{
    $con = get_conn_and_connect();

    $sql="UPDATE product SET qty ='$new_qty' WHERE username ='$product_id'";

    
    $sql="DELETE FROM cart WHERE user_id='".$userid."'";
    
    $result = mysql_query($sql, $con);
    
    close_conn($con);

}

function get_product_name($product_id)
{
    $fields = array("product_id");
    $values = array($product_id);
    $id = get_assoc("product", $fields, $values);
    if($id != false)
    {
        return $id["name"];
    }
    return false;
}

function get_product_price($product_id)
{
    $fields = array("product_id");
    $values = array($product_id);
    $id = get_assoc("product", $fields, $values);
    if($id != false)
    {
        return $id["price"];
    }
    return false;
}

function save_shipping_info_to_db($user_id, $street_address, $city, $state, $zip, $attention)
{
    $fields = array("user_id","street_address", "city", "state", "zip", "attention");
    $values = array($user_id, $street_address, $city, $state, $zip, $attention);
    return add("invoice", $fields, $values);
}
?>














