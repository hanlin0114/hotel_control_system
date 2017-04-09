<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!--  此文件用于定义头条-->
<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.min.css" >
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
	<style>
	.div-float{
		float: left;
	}
	.div-float1{
		float:right;
		
	}
	.text-nodecoration{
		text-decoration:none;
	}
	</style>
</head>
<body>
<div style="height:20em">
<div class="div-float" style="width:30em;margin:0em 0em 0em 10em;">
<h1><a href="/hotel_control_system/view/customer_homepage.php">hotel manage system</a></h1>
</div>
<div id ="registertag" class="div-float1" id="welcome" style="width:5em;margin:2em 0em 0em 2em;font-size:1.2em">
	<a href="loginout.php">登出</a>
</div>
<div id ="logintag" class="btn-group div-float1" style="width:5em;margin:1.8em 0em 0em 2em;font-size:1.2em">
	<button type="button" class="btn btn-link dropdown-toggle text-nodecoration" data-toggle="dropdown">
	   订单信息<span class="caret"></span>
	</button>
	<ul class="dropdown-menu" role="menu" id="customerBill">

	</ul>
</div>
<div id ="detail" class="btn-group div-float1 " style="width:5em;margin:1.8em 0em 0em 2em;font-size:1.2em">
	<button type="button" class="btn btn-link dropdown-toggle text-nodecoration" data-toggle="dropdown">
	   用户信息<span class="caret"></span>
	</button>
	<ul class="dropdown-menu" role="menu" id="customerInfo">

	</ul>
</div>
<div id ="welcome" class="div-float1" style="width:5em;margin:2em 0em 0em 2em;font-size:1.2em">
</div></div>
<div align="center" id="main">
</div>

<script src="js/depart.js"></script>
<script>
$(document).ready(function(){  
	getUsername();
	getHeadLine();
});
//获取数据  
function getData(b_id){   
$.ajax({  
type: 'POST',  
url: '/hotel_control_system/control/pay.php',  
data: {'b_id':b_id},  
dataType:'json',    
success:function(json){  
$("#main").empty();  
var li = "";  
var list = json.list;  
$.each(list,function(index,array){ //遍历json数据列  
//li += "<li><a href='#'>"+array['title']+"</a></li>";  
	li+="<form action='/hotel_control_system/control/paySuccess.php' method='post'>";
	li+="订单号"+"<input type='text' value='"+array['b_id']+"'readonly>"+"<br>"+"房间号"+array['r_id']+"<br>";
	li+="入住时间"+array['start_time']+"<br>";
	li+="退房时间"+array['end_time']+"<br>";
	li+="价格"+array['price']+"<br>";
	li+="<input type='submit' value='付款'></form>";

    });  
$("#main").append(li);  
},  
complete:function(){ //生成分页条  

},  
error:function(){  
alert("数据加载失败");  
}  
});  
}

$(function(){  
	b_id=getUrlParam('b_id');
    getData(b_id);  
     
    });
</script>
</body>
</html>