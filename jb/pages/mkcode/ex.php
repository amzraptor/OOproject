<!DOCTYPE html>
<html>
<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="jpages.js"></script>

<style>
 .holder {
    margin:15px 0;
}
.holder a {
    font-size:12px;
    cursor:pointer;
    margin:0 5px;
    color:#333;
}
.holder a:hover {
    background-color:#222;
    color:#fff;
}
.holder a.jp-previous {
    margin-right:15px;
}
.holder a.jp-next {
    margin-left:15px;
}
.holder a.jp-current,a.jp-current:hover {
    color:#FF4242;
    font-weight:bold;
}
.holder a.jp-disabled,a.jp-disabled:hover {
    color:#bbb;
}
.holder a.jp-current,a.jp-current:hover,.holder a.jp-disabled,a.jp-disabled:hover {
    cursor:default;
    background:none;
}
.holder span {
    margin: 0 5px;
}
</style>
</head>

<body>

	<div align="center" style="width:100%;">
		<div  style="float:center;min-width:880px;max-width:880px;">
			<input id="search_text" value="" placeholder="Search..."/>
			<button id="search_button">Search</button>
		</div>
	</div>
<!-- navigation holder -->
<div class="holder">
</div>

<!-- item container -->
<ul id="itemContainer">

</ul>

<button>add jPages</button>
</body>

<script type="text/javascript">
$(document).ready(function()
{

	    /* destroy pagination */
	    $("button").click(function()
            {
	 	    var search_word = "n";//$("#search_text").val();
	            var search_string = {"search_words": search_word};

		     var postData0 = {'action': 'start'};
		     $.ajax({
		        type: "POST",
		        data: postData0,
		        url: "ex_backend.php",                  //  
		        success: function(data)          //on recieve of reply
		        {	
						/*for (var i=0;i< result.length;i++)
						{ 
							list = list+"<li id='product_display' style='float:left;margin:30px;'>";
							list = list+"<img style='margin-left:5px;margin-top:5px;' src='";
							list = list+result[i].img1;
							list = list+"' width='200' height='200'/ ><br / >";
							list = list+"<span style='text-align:center;display:block;'>";
							list = list+result[i].name;
							list = list+"</span></li>";
						}*/	
			    //alert("result:"+data.result);
                            var list = "";
			    for (var i=0;i<7;i++)
		            { 
				list = list+'<li>whoo'+i+'</li>';
			    }
			    $('#itemContainer').append(list);
			    $("div.holder").jPages({
				containerID  : "itemContainer",
				perPage      : 3,
				startPage    : 1,
				startRange   : 1,
				midRange     : 5,
				endRange     : 1
			    });
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















