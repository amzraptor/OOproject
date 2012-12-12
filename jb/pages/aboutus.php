<?php 
include "db/db.php";//include db script
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
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>The Jewlery Box</title>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css" />

<style>
{

 
    .ui-tabs-vertical { width: 55em; }
    .ui-tabs-vertical .ui-tabs-nav { padding: .2em .1em .2em .2em; float: left; width: 12em; }
    .ui-tabs-vertical .ui-tabs-nav li { clear: left; width: 100%; border-bottom-width: 1px !important; border-right-width: 0 !important; margin: 0 -1px .2em 0; }
    .ui-tabs-vertical .ui-tabs-nav li a { display:block; }
    .ui-tabs-vertical .ui-tabs-nav li.ui-tabs-active { padding-bottom: 0; padding-right: .1em; border-right-width: 1px; border-right-width: 1px; }
    .ui-tabs-vertical .ui-tabs-panel { padding: 1em; float: right; width: 40em;}
</style>

<link rel="stylesheet" media="all" href="header.css" type="text/css" />

</head>

<body>
	<div class="header" id="header" name="header">
	
		
	</div>
<div id="tabs" style="margin-top:1%;">
    <ul>
        <li><a href="#tabs-1">About Us</a></li>
        <li><a href="#tabs-2">Contact Us</a></li>
    </ul>
    <div id="tabs-1">
        <h1>About Us</h1>
	<p>The goal of the site is to allow vendors to sell their products in a inexpensive and seemlessly effortless manner.  The vendors have a lot of control over their store from design to sales. The best part is there are no monthly fees and owning a store is free.  Vendors may have as many stores as they like.  The site recieves 2% of every sale, this is the only fee!</p>
	<p> The Jewelry Box is a colaboration from 4 Columbia College Students Brandy, Mark, Zaki, and Marshall.</p>
	<p>December 2012</p>
    </div>
    <div id="tabs-2">
        <h1>Contact Us</h1>
	<p>We are located at 1001 Rogers St. Columbia, Missouri 65202.</p>
	<p>Call us at 1-573-857-6309</p>
	<p>Email us at bdpoagdorado1@cougars.ccis.edu</p>
	
      <form action="email.php" method="POST">
	<button>Email</button>
        </form>

    </div>

</div>
 
</body>
<script type="text/javascript" src = "header.js"></script>
<script type="text/javascript">
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
   $(function() {
        $( "#tabs" ).tabs().addClass( "ui-tabs-vertical ui-aboutuser-clearfix" );
        $( "#tabs li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
    });
    
</script>
</html>




















