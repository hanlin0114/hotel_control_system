<?php
require 'F:/Apache24/htdocs/hotel_control_system/model/customer.php';
session_start();
$u_id=$_SESSION['u_id'];
$user=new customer();
$result=$user->show_bill("b_status=2");
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
        <th>订单号</th>
        <th>房间号</th>
        <th>入住日期</th>
        <th>退房日期</th>
        <th>价格</th>
         <th>付款</th>
        <th>退订</th>
    </tr>
    </thead>";
    while($row=mysqli_fetch_array($result)){
        echo "<tr><th>".$row['b_id']."</th><th>".$row['b_rom_id']."</th><th>".$row['b_r_start_date']."</th><th>".
        $row['b_r_end_date']."</th><th>".$row['price']."</th><th>"."<a href='/hotel_control_system/control/pay.php?price='".$row['price'].">付款</a></th><th>"
        ."<a href='/hotel_control/system/control/cancelBill.php?b_id='".$row['b_id'].">取消订单</a></th>";
    }
    echo "</table></html>"
?>