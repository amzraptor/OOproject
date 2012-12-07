<!DOCTYPE html>

<style type="text/css">

@font-face {
font-family: BebasNeue;
src: url('BebasNeue.otf'); /* Edit this line */
}
body {

margin:0;
padding:0;

}

.header {
min-width: 1100px;
height:50px;
border-bottom: 1px solid #ccc;
width:100%;
margin-top:5px;

-moz-box-shadow:    3px 5px 8px #ddd;
-webkit-box-shadow: 3px 5px 8px #ddd;
box-shadow:         3px 5px 8px #ddd;
}

#logo {
width:310px;
float:left;
margin-left:30px;
}

#logo_text {
width:260px;
float:left;
font-family:'BebasNeue';
font-style:none;
font-size:40px;
}

#logo_text a {
text-decoration:none;
color:black;
}

#logo_image {
margin-top:-5px;
width:50px;
float:left;
}

#search_bar {
margin-top:10px;
float:left;
width:300px;
}


#search_bar input[type="text"] {
width:200px;

}

input[type="submit"] {

background-color: #333;
padding: 5px 10px 6px;
color: #fff;
text-decoration: none;
font-weight: bold;
line-height: 1;
-moz-border-radius: 5px;
-webkit-border-radius: 5px;
position: relative;
cursor: pointer;
border:none;

}

#title_banner_bg {
width:100%;
background-color:#79c6e8;
repeat: repeat-x;
}


#title_banner {
width:1000px;
height:150px;
margin:0 auto;
background-image: url('titlehomepage3.png');
}

#content {
margin:75px;

}

h1 {
font-family:BebasNeue;
font-size:40px;	
border-bottom: 1px solid #ccc;

}

h1 font {
font-family:BebasNeue;
font-size:40px;	
color:#54c6e8;
}

#buttons {
float:right;
margin-right: 40px;
margin-top:8px;
}

#item {
-moz-border-radius: 5px;
-webkit-border-radius: 5px;
-moz-box-shadow:    3px 3px 5px 8px #ddd;
-webkit-box-shadow: 3px 3px 5px 8px #ddd;
box-shadow:         3px 3px 5px 8px #ddd;
width:230px;
height:200px;
color: #54c6e8;
}

#itempic {
width: 95%;
height: 140px;
background-color: #cff;
border: 5px solid #fff;
}

#itemspecs {
margin-right:10px;
margin-left:10px;
font-family: BebasNeue;
font-size: 20px;
/*color:#54c6e8;*/
color:#444;
}

</style>


<body>

	<div class="header">
	
		<div id="logo" > 

			<div id="logo_image">
					<img src="Jewelry_Box.png" width="50" height="50" border="0" /> 
			</div>
		
			<div id="logo_text">
				<a href="header.php" >
					THE JEWELRY BOX
				</a>
			</div>

		</div>

		<div id="search_bar">
			<input type="text" placeholder="necklace ... "></input>
			<input type="submit" value="search"></input>
		</div>

		<div id="buttons" >
			<input type="submit" value="button1"></input>
			<input type="submit" value="button2"></input>
			<input type="submit" value="button3"></input>
			<input type="submit" value="button4"></input>

		</div>

	</div>

	<div id="title_banner_bg">

		<div id="title_banner">

		</div>

	</div>

	<div id="content">

		<h1> <font>Top</font> Picks </h1>

		<div id="item">
			<div id="itempic">
				<img src="rings.JPG" width="220" height="140" border="0" /> 
			</div>

			<div id="itemspecs">
				Rings
			</div>
		</div>
			
	</div>

</body>

</html>
