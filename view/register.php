<?php 
require_once "F:/Apache24/htdocs/hotel_control_system/view/headline.php";
?>
<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.min.css" >
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<style type="text/css">
html,body {
	/*height: 100%;*/
}
.box {
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#6699FF', endColorstr='#6699FF'); /*  IE */
	/*background-image:linear-gradient(bottom, #6699FF 0%, #6699FF 100%);
	background-image:-o-linear-gradient(bottom, #6699FF 0%, #6699FF 100%);
	background-image:-moz-linear-gradient(bottom, #6699FF 0%, #6699FF 100%);
	background-image:-webkit-linear-gradient(bottom, #6699FF 0%, #6699FF 100%);
	background-image:-ms-linear-gradient(bottom, #6699FF 0%, #6699FF 100%);*/
	
	margin: 0 auto;
	position: relative;
	width: 50%;
	height: 100%;
}
.login-box {
	width: 100%;
	max-width:500px;
	height: 400px;
	position: absolute;
	top: 50%;

	margin-top: -200px;
	/*设置负值，为要定位子盒子的一半高度*/
	
}
@media screen and (min-width:500px){
	.login-box {
		left: 50%;
		/*设置负值，为要定位子盒子的一半宽度*/
		margin-left: -250px;
	}
}	

.form {
	width: 100%;
	max-width:500px;
	height: 275px;
	margin: 25px auto 0px auto;
	padding-top: 25px;
}	
.login-content {
	height: 300px;
	width: 100%;
	max-width:500px;
	background-color: rgba(255, 250, 2550, .6);
	float: left;
}		
	
	
.input-group {
	margin: 0px 0px 30px 0px !important;
}
.form-control,
.input-group {
	height: 40px;
}

.form-group {
	margin-bottom: 0px !important;
}
.login-title {
	padding: 20px 10px;
	background-color: rgba(0, 0, 0, .6);
}
.login-title h1 {
	margin-top: 10px !important;
}
.login-title small {
	color: #fff;
}

.link p {
	line-height: 20px;
	margin-top: 30px;
}
.btn-sm {
	padding: 8px 24px !important;
	font-size: 16px !important;
}
</style>
</head>
<body>
	<div class="container">
		<p>&nbsp;</p>
		<div class="box">
		<div class="login-box">
			<div class="login-title text-center">
				<h1><small>注册</small></h1>
			</div>
			<div class="login-content ">
			<div class="form">
			<form action="/hotel_control_system/control/n_user_reg.php" method="post">
				<div class="form-group">
					<div class="col-xs-12  ">
						<div class="input-group">
							<span class="input-group-addon">email</span>
							<input type="text" id="username" name="email" class="form-control">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12  ">
						<div class="input-group">
							<span class="input-group-addon">用户名</span>
							<input type="text" id="username" name="username" class="form-control" >
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12  ">
						<div class="input-group">
							<span class="input-group-addon">密    码</span>
							<input type="password" id="password" name="password" class="form-control">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12  ">
						<div class="input-group">
							 <span class="input-group-addon">确认密码</span>
							<input type="password" id="repassword" name="password" class="form-control">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12  ">
						<div class="input-group">
							 <span class="input-group-addon">性    别</span>
							  <div class="form-group">
   					<!--  <label for="name">性别</label>-->
    					<select class="form-control" name="sex">
     							 <option>保密</option>
      							<option>男</option>
      							<option>女</option>
    						</select>						
					</div>
				</div>
				<div class="form-group form-actions">
					<div class="col-xs-4 col-xs-offset-4 ">
						<button type="submit" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-off"></span> 注册</button>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-6 link">
						<!-- <p class="text-center remove-margin"><small>忘记密码？</small> <a href="javascript:void(0)"><small>找回</small></a> -->
						</p>
					</div>
					<div class="col-xs-6 link">
						<!-- <p class="text-center remove-margin"><small>还没注册?</small> <a href="javascript:void(0)"><small>注册</small></a> -->
						</p>
					</div>
				</div>
			</form>
			</div>
		</div>
		</div>
	</div>
	</div>
</body>
</html>