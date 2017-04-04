<?php
   require 'F:/Apache24/htdocs/hotel_control_system/model/db_control.php';
session_start();
$u_id=$_SESSION['u_id'];
$b_id=$_SESSION['b_id'];
$conn=new db_control();
$conn->db_connect();
$query=array('b_status'=>3);
$conn->update_db($tablename="bill_info",$query,$where="b_id='$b_id'");
echo "<html><body>支付成功，请准时入住<br/>";
echo "<a href='/hotel_control_system/view/customer_homepage.php'>点击此处返回主页</a></body></html>";
 ?>
