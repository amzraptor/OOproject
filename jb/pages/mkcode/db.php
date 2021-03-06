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
    $row = mysql_fetch_array($query);
    if ($row == false) 
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
echo"sql: $sql";
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
    if ($row != false && $row[6] == "true")//check that emailvalid is true
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
    $fields = array("fname", "lname", "username", "password", "email", "valid");
    $values = array($fname,$lname, $username, $password, $email, "valid");
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
/* Cart Functions */
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
    $sql = sprintf("SELECT * FROM product WHERE product_id = %d;",
    $product_id);

    return mysql_num_rows(mysql_query($sql)) > 0;
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

?>
























