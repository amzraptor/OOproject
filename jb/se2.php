<?php
session_start();
$sessionid = session_id();
$username = $_SESSION['user'];
echo"$username and $sessionid";

?>

<!DOCTYPE html>
<html>
<head>
</head>
</body>
<form action="se1.php" method="POST">
<input type="submit" value="submit"/>
</form>
</body>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<script type="text/javascript">
		var postData2 = {'action': 'validate'};
		$.ajax({
		        type: "POST",
		        data: postData2,
		        url: "se2_b.php",                  //  

		        success: function(data)          //on recieve of reply
		                 {
					
					alert("done"+data.session);	
		                 },
		        dataType: "json",
		        error: function(data)          //on recieve of reply
		                 {
		                    	alert("hello error");
		                 }
		    });
</script>
</html>
