<?php


function get_conn_and_connect()
{
    $con = mysql_connect("localhost","root","root");
    if (!$con)
      {
      	echo("I can't get a connection");
      }

    if (!mysql_select_db("box", $con))
      {
      	echo("problem with jbox");
      }

    return $con;
}

function get_page($id)
{
    $con = get_conn_and_connect();
    $result = mysql_query("SELECT * FROM PAGE WHERE id='$id'", $con);
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
