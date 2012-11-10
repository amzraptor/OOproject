<!DOCTYPE html>
<html>
<head>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="http://jqueryui.com/latest/ui/ui.core.js"></script>
    <script type="text/javascript" src="http://jqueryui.com/latest/ui/ui.sortable.js"></script>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

<style type="text/css">
Html, body {
      Padding: 0;
      Margin: 0;
      Height: 100%;
}
#page {
      Min-height: 100%;       /* for all other browsers */
      height: 100%;           /* for IE */
}
 

#main {
      Padding-bottom: 75px;   /* This value is the height of your footer */
}
 
#footer {
      Position: absolute;
      Width: 100%;
      Bottom: 0;
      Height: 75px;           /* This value is the height of your footer */
}
#sidebar {
      width:39%;
      float:left; 
      background-color: #111;
      color:white;
      font-family: Arial, "MS Trebuchet", sans-serif;            
}

.slideshow {
     width: 39%;
     float:left; 
     margin: 20px auto;
     background-color: #FFF;
     padding: 20px;
     border:solid;
     border-color:white;
     border-width:2px;
}
        
#navagation {
      list-style-type: none;
      margin: 0;
      padding: 0;
      width:300px   
}
#navagation li {
      margin: 0 5px 5px 5px;
      padding: 5px 20px;
      font-size: 1.2em;
      height: 1.5em;
      background-color: #678;
      cursor:pointer;
}
#navagation li.highlight {
      height: 1.5em;
      line-height: 1.2em;
      background-color: #036;
      background-image: none;
      border:none;
}

</style>

</head>
<body>
<div id="page"style="border:solid;"><!--page-->

<div id="header" class="header" style="border:solid;"><!--header-->
<h1>header</h1>
</div><!--header-->

<div id="main" style="border:solid;"><!--main-->

<div id="sidebar"><!--sidebar-->
  <ul id="navagation">
    <li>information</li>
    <li>design</li>
  </ul>
</div><!--sidebar-->

    <div class="slideshow"><!--slideshow-->
    </div><!--slideshow-->

</div><!--main-->

<div id="footer" class="footer" style="border:solid;"><!--footer-->
<h3>footer</h3>
</div><!--footer-->
</div><!--page-->

<script type="text/javascript">
/* automatic page resize */
  $(document).ready(function() {
    $( "#sidebar" ).resizable({      
    });
    $("#sidebar ").bind("resize", function (event, ui) {
            var setWidth = $("#sidebar").width();
            $('#slideshow').width(1224-setWidth);
            $('.menu').width(setWidth-6);
        });
  });
/* navigation menu*/
    $(function() {
        $("#navagation").sortable({
            placeholder: 'highlight'
        });
        $("#navagation").disableSelection();
    });
    </script>
</script>
<script src="jquery.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<script src="jquery.backstretch.js"></script>
<script src="jquery.backstretch.min.js"></script>

<script>
    $.backstretch("greypat.jpg");
    $(".header").backstretch("greybgcolor.png");
    $(".footer").backstretch("greybgcolor.png");
    $(".slideshow").backstretch([
          "images/JewelryPic_01.png",
          "images/JewelryPic_02.png",
          "images/JewelryPic_03.png"
        ], {
            fade: 750,
            duration: 4000
        });
</script>
</body>
</html>
