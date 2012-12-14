<?php
include "../db/db.php";
session_start();

if(empty($_SESSION['user']))
{
      $_SESSION['user'] = "guest";
      $username = "guest";
}
else
{
      $username = $_SESSION['user'];
}
?>

<!doctype html>
<html>

<head>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<link rel="stylesheet" media="all" href="header.css" type="text/css" />

</head>

<body>
	<div class="header" id="header" name="header">
	
		
	</div>
<div id="background">
	<div id="page">

		<div id="content">
			<h1> Product Added </h1>
			<a href="manage.php"> Back </a>
		<br />
		</div>

	</div>
</div>

</body>
<script type="text/javascript" src = "header.js"></script>
<script type="text/javascript">
////*****************************************************////
$(document).ready(function(){

        var username = "<?php echo $username; ?>";
/////////////////////////////////////////////
	if(username == "guest")
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
});
</script>
</html>

<?php

$name = $_POST['name'];
$description = $_POST['description'];
$size = $_POST['size'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$gender = $_POST['gender'];
$file = "uploads/".$_FILES['file']['name'];
$material = $_POST['material'];
$category = $_POST['category'];
$color = $_POST['color'];
$store_category = $_POST['scat'];

if($size == "") $size = "none";

$fields =array("store_id","name","description","size","qty","price","gender","img1","material","category","color", "store_category");
$values =array($_SESSION['store_id'],$name,$description,$size,$quantity,$price,$gender,$file,$material,$category,$color,$store_category);

for ($i = 0; $i < count($fields);$i++)
{
	echo $fields[$i]." ".$values[$i]."<br />";
}

if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br>";
  }
/*else
  {
  echo "Upload: " . $_FILES["file"]["name"] . "<br>";
  echo "Type: " . $_FILES["file"]["type"] . "<br>";
  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
  echo "Stored in: " . $_FILES["file"]["tmp_name"];
  }*/

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
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
    /*echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";*/

    if (file_exists("uploads/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
        move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/" . $_FILES["file"]["name"]);
   	chmod($_FILES["file"]["tmp_name"], 0755);
        //echo "Stored in: " . "uploads/" . $_FILES["file"]["name"];
      }
    }
  }
else
  {
  echo "Invalid file";
  }

if(add("product",$fields,$values))
{
	echo "Product Added Thank You";
}
else
{
	echo "Error Adding Product";
}
?> 
