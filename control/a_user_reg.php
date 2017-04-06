<?php
//require_once 'F:/Apache24/htdocs/hotel_control_system/model/db_control.php';
require_once 'F:/Apache24/htdocs/hotel_control_system/model/admin_lrg.php';
$email=$_POST['email'];
$username=$_POST['username'];
$sex=$_POST['sex'];
$password=$_POST['password'];
$user_reg=new user_lgr();
if($sex=="保密")
	$sex=0;
else if($sex=="男性")
	$sex=1;
else if($sex=="女性")
	$sex=2;
$result=$user_reg->a_register($email, $username, $password, $sex,1);//只要是注册了，就是用户等级就是1（普通用户）
if($result==1){
	header('Location:../view/a_login.php');
}
else if($result==-1){
	header('Location:view/reg_had_error.php');
}
else if($result==0){
	header('location:view/reg_sql_error.php');
	
}
?>