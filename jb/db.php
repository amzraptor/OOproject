<?php
/*


seacrch_product($category, $metal, $size, $gemstone, $gender, $store): [  ["prod_name", "cost", "prod_description", "vendor", "prod_id", ["pic1.png", "pic2.png",...] ], [...next prod info...], ....]

logout($user_id) : bool*/

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
/*
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
	$sql.= ("$fields[$i] = '$values[$i]' AND ");
    }
    $sql = "SELECT * FROM $table WHERE ".substr($sql,0,-5);
    //echo"sql:$sql";
    $con = get_conn_and_connect();
    $result = mysql_query($sql, $con);
    if ($result == false) return false;
    $row = mysql_fetch_array($result);
    close_conn($con);
    return $row;
}*/

/*function update($table, $fields, $values)
{
    if(sizeof($fields) != sizeof($values))
    {
	echo"error in add field and value mismatch.";
	return 0;
    }
    $sql = "";
    for ($i=0; $i<sizeof($fields); $i++)
    {
	$sql.= ("$fields[$i] = '$values[$i]' AND ");
    }
//"UPDATE SESSIONS SET username='$username' WHERE id='$session'";
    $sql = "UPDATE $table SET ".substr($sql,0,-5);
    //echo"sql:$sql";
    $con = get_conn_and_connect();
    $result = mysql_query($sql, $con);
    if ($result == false) return false;
    $row = mysql_fetch_array($result);
    close_conn($con);
    return $row;
}*/

function add($table, $fields, $values)
{
    if(sizeof($fields) != sizeof($values))
    {
	echo"error in add field and value mismatch.";
	return 0;
    }
    $id = randString();
    //check that the id is not being used
    $con = get_conn_and_connect();
    $sql="";
    $sql2="";
    for ($i=0; $i<sizeof($fields); $i++)
    {
	$sql.="$fields[$i],";
	$sql2.="'$values[$i]',";
    }
    $sql = "INSERT INTO $table(id,".substr($sql,0,-1).")VALUES("."'$id',".substr($sql2,0,-1).")";
    
//echo"sql:$sql";
    if (!mysql_query($sql,$con))
      {
        close_conn($con);
      	return "false";
      }

    close_conn($con);
    return $id;
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


function email_validated($username)
{
    /*
    $fields = array("username");
    $values = array($username,);
    $row = get("USER", $fields, $values);
    if ($row != false && $row[6] == true)//check that emailvalid is true
    {
        return true;
    }
    return false;
    */
    $con = get_conn_and_connect();
    $result = mysql_query("SELECT * FROM USER WHERE username='$username'", $con);
    $row = mysql_fetch_array($result);
    if ($result != false && $row[6] == true/*check that emailvalid is true*/) 
    {
        close_conn($con);
        return true;
    }
    close_conn($con);
    return false;
}

function username_in_use($username)
{
    /*
    $fields = array("username");
    $values = array($username);
    $row = get("USER", $fields, $values);
    if ($row != false) return false;
    return true;
    */
    $con = get_conn_and_connect();
    $result = mysql_query("SELECT * FROM USER WHERE username='$username'", $con);
    $row = mysql_fetch_array($result);
    if ($result != false) 
    {
        close_conn($con);
        return false;
    }
    close_conn($con);
    return true;
}

function user_in_user($username, $password)
{
    /*
    $fields = array("username", "password");
    $values = array($username, $password);
    $row = get("USER", $fields, $values);
    if ($row == false) return false;
    return true;
    */
    $con = get_conn_and_connect();
    $result = mysql_query("SELECT * FROM USER WHERE username='$username' AND password='$password'", $con);
    if ($result == false) 
    {
   	close_conn($con);
        return false;
    }
    close_conn($con);
    return true;
}

function get_user_info($username, $password)
{
    /*
    $fields = array("username", "password");
    $values = array($username, $password);
    return get("USER", $fields, $values);
    */
    $con = get_conn_and_connect();
    $result = mysql_query("SELECT * FROM USER WHERE username='$username' AND password='$password'", $con);
    $row = mysql_fetch_array($result);
    close_conn($con);
    return $row;
}

function add_sessions()
{
    $fields = array("username");
    $values = array("guest");
    return add("SESSIONS", $fields, $values);   
}

//echo "hello";
function session_update_timestamp($session)
{
	//get session id from SESSIONS TABLE
	//update timestamp for this session
	$con = get_conn_and_connect();
	$sql = "UPDATE SESSIONS
        	SET time=CURRENT_TIMESTAMP
        	WHERE id='$session'";
        $result = mysql_query($sql, $con);
	$result = mysql_query($sql, $con);
	close_conn($con);
}

function session_update_username($session, $username)
{
	//change username in SESSIONS TABLE into current logged in user
	$con = get_conn_and_connect();
	$sql = "UPDATE SESSIONS
        	SET username='$username'
        	WHERE id='$session'";
        $result = mysql_query($sql, $con);
	close_conn($con);
	$result = mysql_query($sql, $con);
    close_conn($con);	
}

//echo "hey";
//$id = add_sessions();
//echo "id $id";
//session_update_timestamp("nczXQp5eCKYIQnFCyznF2vF8");
//session_update_username("nczXQp5eCKYIQnFCyznF2vF8", "bdpoag1");

function add_user($fname, $lname, $username, $password, $email)
{
    /*$fields = array("fname", "lname", "username", "password", "email", "valid");
    $values = array($fname,$lname, $username, $password, $email, "false");
    return add("USER", $fields, $values);
    */
    $id = randString();
    $con = get_conn_and_connect();
    $sql="INSERT INTO USER(id, fname, lname, username, password, email, valid)
    VALUES
    ('$id','$fname','$lname', '$username', '$password','$email', 'false')";

    if (!mysql_query($sql,$con))
      {
        close_conn($con);
      	return false;
      }

    close_conn($con);
    return true;
}
//echo ("\nRESULT:::".add_user("gh", "gh", "gh", "gh" ,"gh"));

?>
