<?php
require 'F:/Apache24/htdocs/hotel_control_system/model/db_control.php';
$u_id=$_POST['u_id'];
$aLevelStart=$_POST['aLeaveStart'];
$aLevelEnd=$_POST['aLeaveEnd'];
$aLevelType=$_POST['aLeaveType'];
$conn=new db_control();
$conn->db_connect();
$arr=array('u_id'=>$u_id,'start_time'=>$aLevelStart,'end_time'=>$aLevelEnd,'leaveType'=>$aLevelType);
$conn->insert_db($tableName="attendance",$arr);
header('location:../view/admin_homepage.php');
?>