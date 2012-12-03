<!DOCTYPE html>
<html>
<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="jpages.js"></script>
<style>
 .holder2 {
    margin:15px 0;
}
.holder2 a {
    font-size:12px;
    cursor:pointer;
    margin:0 5px;
    color:#333;
}
.holder2 a:hover {
    background-color:#222;
    color:#fff;
}
.holder2 a.jp-previous {
    margin-right:15px;
}
.holder2 a.jp-next {
    margin-left:15px;
}
.holder2 a.jp-current,a.jp-current:hover {
    color:#FF4242;
    font-weight:bold;
}
.holder2 a.jp-disabled,a.jp-disabled:hover {
    color:#bbb;
}
.holder2 a.jp-current,a.jp-current:hover,.holder a.jp-disabled,a.jp-disabled:hover {
    cursor:default;
    background:none;
}
.holder2 span {
    margin: 0 5px;
}
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
<!-- navigation holder -->
<div class="holder">
</div>

<!-- item container -->
<ul id="itemContainer">

</ul>

<div class="holder2">
</div>

<!-- item container -->
<ul id="itemContainer2">

</ul>

<button>add jPages</button>
</body>
<script type="text/javascript">
$(document).ready(function()
{

	    /* destroy pagination */
	    $("button").click(function()
            {
		     var postData0 = {'action': 'start'};
		     $.ajax({
		        type: "POST",
		        data: postData0,
		        url: "ex_backend.php",                  //  
		        success: function(data)          //on recieve of reply
		        {		
			    //alert("result:"+data.result);
                            var list = "";
			    for (var i=0;i<20;i++)
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
///////////////////////////////////////////////////////////////////////////////
                            var list1 = "";
			    for (var i=0;i<20;i++)
		            { 
				list1 = list1+'<li>whoo'+i+'</li>';
			    }
			    $('#itemContainer2').append(list1);
			    $("div.holder2").jPages({
				containerID  : "itemContainer2",
				perPage      : 3,
				startPage    : 1,
				startRange   : 1,
				midRange     : 5,
				endRange     : 1
			    });
///////////////////////////////////////////////////////////////////////////////
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














