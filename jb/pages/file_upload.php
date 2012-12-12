 <?php
if ($_FILES["file"]["error"] > 0)
  {
	$valid = "no";
  //echo "Error: " . $_FILES["file"]["error"] . "<br>";
  }
else
  {
  /*echo "Upload: " . $_FILES["file"]["name"] . "<br>";
  echo "Type: " . $_FILES["file"]["type"] . "<br>";
  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
  echo "Stored in: " . $_FILES["file"]["tmp_name"];*/
	$valid = "poss";
  }

$allowedExts = array("jpg", "jpeg", "gif", "png");
$extension = end(explode(".", $_FILES["file"]["name"]));
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/png")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 20000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
	$valid = "no";//"Return Code: " . $_FILES["file"]["error"];
    //echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
    /*echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";*/

    if (file_exists("upload/uploads/" . $_FILES["file"]["name"]))
      {
      //echo $_FILES["file"]["name"] . " already exists. ";
		$valid = "no";//$_FILES["file"]["name"] . " already exists. "
      }
    else
      {
		//echo $_FILES["file"]["tmp_name"], "<br />";
      $suc = move_uploaded_file($_FILES["file"]["tmp_name"], "upload/uploads/" . $_FILES["file"]["name"]);
	if ($suc)
	{
		$valid = "success";
	}
	else 
	{
		$valid = "error uploading";
	}
      //echo "Stored in: " . "upload/uploads/" . $_FILES["file"]["name"];
      }
    }
  }
else
  {
  //echo "Invalid file";
  $valid = "error uploading";
  }
$name = $_FILES["file"]["name"];
?> 

<!doctype html>
 
<html>
<head>
    <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
<link rel="stylesheet" media="all" href="header.css" type="text/css" />
</head>
<body>

	<div class="header" id="header" name="header">
	
		
	</div>
<div style="width:100%;">
<div style="margin-left:37%;width:35%;">
<?php
if ($valid == "success")
{
	echo"<h1>Images</h1>
	</br>
	<h3>Select the destination of the $name image.</h3>
	</br>

		<input class='pic' name='pic' type='radio' style='margin-left:5%;' value='background'>Background Image</input></br>
		<input class='pic' name='pic' type='radio' style='margin-left:5%;'value='banner'>Banner Image</input></br>
		<input class='pic' name='pic' type='radio' style='margin-left:5%;'value='author'>Author Image</input></br>";
}
else
{
	echo"<h1> Sorry, an error occured while trying to upload the image.</h1>
	</br>
	valid:$valid";
}
?>
	<form action="create_store.php" method="post">
	<input type="submit" name="submit" value="Return">
	</form>
</br>
</div>
</div>
</body>
<script type="text/javascript" src = "header.js"></script>
<script type="text/javascript">
////*****************************************************////
$(document).ready(function(){
/////////////////////////////////////////////
	var username = '<?php echo $username; ?>';
	if(username == 'guest')
	{
		$('#signin').show(); //
		$('#signup').show(); //
		$('#aboutus').show(); //
		$('#cart1').show(); //
	}
	else
	{
		$('#stores').show(); //
		$('#logout').show(); //
		$('#cart1').show(); //
		$('#aboutus').show(); //
	}

/////////////////////////////////////////////

    $('.pic').click(function(){
	var pic = $('input:radio[name=pic]:checked').val();
	var name = '<?php echo $name; ?>';
//alert("wow"+pic);
	var postData0 = {'pic': pic, 'file': name};
            $.ajax({
                type: "POST",
                data: postData0,
                url: "file_upload_backend.php",                  //  
                success: function(data)          //on recieve of reply
        		{			
				//alert("Saving...");
				if(data.error == 'error saving info')
				{
					alert("error saving info");
				}
				 
                         },
                dataType: "json",
                error: function(data)          //on recieve of reply
                         {
                            alert("hello error");
                         }
           });
    });

});
</script>
</html>








