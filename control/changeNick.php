<?php
require 'F:/Apache24/htdocs/hotel_control_system/model/customer.php';
session_start();
$username=$_POST['username'];
if(!isset($username)){
    $username=$_SESSION['username'];
    
    }
 else{
     $user=new customer();
     if($user->up_username($username))
     {
         $_SESSION['username']=$username;
         header('Location:view/customer_homepage.php');
     }
     else echo "<script>alert('wrong');</script>";
 }
$u_id=$_SESSION['u_id'];
$user=new customer();
$result=$user->showInfo();
$username=$_SESSION['username'];
echo "<html>
<head>
	<link rel='stylesheet' href='css/bootstrap.min.css' >
	<script src='js/jquery-3.1.1.min.js'></script>
	<script src='js/bootstrap.min.js'></script>
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
	</style></head>";
echo "<body>
<div>
<div class='div-float' style='width:30em;margin:0em 0em 0em 10em;'>
<h1>hotel manage system</h1>
</div>
<div id ='registertag class='div-float1' id='welcome' style='width:5em;margin:2em 0em 0em 2em;font-size:1.2em'>
	<a href='/hotel_control_system/loginout.php'>登出</a>
</div>
<div id ='logintag' class='btn-group div-float1' style='width:5em;margin:1.8em 0em 0em 2em;font-size:1.2em'>
	<button type='button' class='btn btn-link dropdown-toggle text-nodecoration' data-toggle='dropdown'>
	   订单信息<span class='caret'></span>
	</button>
	<ul class='dropdown-menu' role='menu'>
	   <li><a href='/hotel_control_system/control/checkUpay.php'>未支付订单</a></li>
	   <li><a href='/hotel_control_system/control/checkPaid.php'>已支付订单</a></li>
	   <li><a href='/hotel_control_system/control/checkFinish.php'>已完成订单</a></li>
	</ul>
</div>
<div id ='detail' class='btn-group div-float1' style='width:5em;margin:1.8em 0em 0em 2em;font-size:1.2em'>
	<button type='button' class='btn btn-link dropdown-toggle text-nodecoration' data-toggle='dropdown'>
	   用户信息<span class='caret'></span>
	</button>
	<ul class='dropdown-men' role='menu'>
	   <li><a href='/hotel_control_system/control/showInfo.php'>查看信息</a></li>
	   <li><a href='/hotel_control_system/control/changeNick.php'>修改昵称</a></li>
	   <li><a href='/hotel_control_system/control/changePassword.php'>修改密码</a></li>
	</ul>
</div>
<div id ='welcome' class='div-float1' style='width:5em;margin:2em 0em 0em 2em;font-size:1.2em'>".$username.
"</div>";
echo "<table class='table table-bordered table-hover definewidth m10' >
    <thead>
    <tr id='roomDetail'>
        <th></th>
        <th>当前用户名</th>
        <th>修改的用户名</th>


    </tr>
    </thead>";
    echo "<th>".$username."</th><th><form action='/hotel_control_system/control/changNick.php' method='post'><input type='text' name='username'/><input type='submit'value='确认'></a>";
    echo "</table></html>";
?>