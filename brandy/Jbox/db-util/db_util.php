<?php
/*


seacrch_product($category, $metal, $size, $gemstone, $gender, $store): [  ["prod_name", "cost", "prod_description", "vendor", "prod_id", ["pic1.png", "pic2.png",...] ], [...next prod info...], ....]

logout($user_id) : bool*/

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

function user_not_in_user($username, $password)
{
    $con = get_conn_and_connect();
    $result = mysql_query("SELECT * FROM USER WHERE username='$username' AND password='$password'", $con);
	if ($result == false) 
    {
        return true;
    }
    return false;
}

function get_tempuser_info($username, $password)
{
    $con = get_conn_and_connect();
    $result = mysql_query("SELECT * FROM TEMPUSER WHERE username='$username' AND password='$password'", $con);
    $row = mysql_fetch_array($result);
    close_conn($con);
	return $row;
}

function add_user($username, $password, $temp_password)
{
    $user = get_tempuser_info($username, $temp_password);

    if ($user == false) return false;
    $fname = $user['fname'];
    $lname = $user['lname'];
    $username = $user['username'];
    $password = $password;
    $email = $user['email'];
    $id = randString();
    echo ("$fname");
    echo ("$lname");
    echo ("$username");
    echo ("$password");
    echo ("$email ");   
    echo ("$id");
    
    $con = get_conn_and_connect();
    $sql="INSERT INTO USER(id, fname, lname, username, password, email)
    VALUES
    ('$id','$fname','$lname', '$username', '$password','$email')";

    if (!mysql_query($sql,$con))
      {
        close_conn($con);
      	return false;
      }

    close_conn($con);
    return true;
}

function add_tempuser($fname, $lname, $username, $password, $email)
{
    $id = randString();
    /*echo ("$fname");
    echo ("$lname");
    echo ("$username");
    echo ("$password");
    echo ("$email ");   
    echo ("$id");*/
    
    $con = get_conn_and_connect();
    $sql="INSERT INTO TEMPUSER(id, fname, lname, username, password, email)
    VALUES
    ('$id','$fname','$lname', '$username', '$password','$email')";

    if (!mysql_query($sql,$con))
      {
      	return false;
      }

    close_conn($con);
    return true;
}



function close_conn($con) 
{
    mysql_close($con);
}
/*if (add_tempuser("b", "bp", "bbp1", "dgd", "bdpoagdorado1@cougars.ccis"))
{
    echo ("good");
}
else
{
    echo ("bad");
}*/

?>
