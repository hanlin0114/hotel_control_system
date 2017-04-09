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
<div style="height: 10em">
<div class="div-float" style="width:30em;margin:0em 0em 0em 10em;">
<h1>hotel manage system</h1>
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
</div>
</div>
	<div class="container" id="changeNick" align="center">
		
	</div>
<script src="js/depart.js"></script>
<script>
$(document).ready(function(){  
	getUsername();
	getHeadLine();
	getUsernameP();

});


</script>
</body>
</html>

