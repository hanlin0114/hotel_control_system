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
<div>
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
</div></div>


<div id ="welcome" class="div-float1" style="width:5em;margin:2em 0em 0em 2em;font-size:1.2em">
</div>

<table class="table table-bordered table-hover definewidth m10">
<thead>
    <tr>
    <th>用户名</th>
    <th>绑定邮箱</th>
    <th>性别</th>
    <th>用户类型</th>
    </tr>
</thead>
<tbody id="showCustomer">
</tbody>
</table>
<script src="js/depart.js"></script>
<script>
$(document).ready(function(){  
	getUsername();
	getHeadLine();
});
var u_id=getUrlParam('u_id');
function showCustomer(){
	$.ajax({
		type:'post',
		url: '/hotel_control_system/control/c_showInfo.php',
		data:{'u_id':u_id},
		dataType:'json',
		success:function(json){
			var li="";
			var level;
			var sex;
			switch (parseInt(json.c_level)){
			case 1:
				level="普通用户";
				break;
			case 2:
				level="高级用户";
				break;
			case 0:
				level="该用户已被停止使用，请联系工作人员";
				break;
			}
			switch (parseInt(json.sex)){
			case 0:
				sex="保密";
				break;
			case 1:
				sex="男性";
				break;
			case 2:
				sex="女性";
				break;
			}
			
			li+="<tr><td>"+json.username+"</td>";
			li+="<td>"+json.email+"</td>";
			li+="<td>"+sex+"</td>";
			li+="<td>"+level+"</td>";
			$('#showCustomer').append(li);
			}
		
	});
}
$(document).ready(function(){  
	showCustomer();
});
</script>
</body>
</html>

