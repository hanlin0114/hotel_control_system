<?php
//require 'F:/Apache24/htdocs/hotel_control_system/model/db_control.php';
require 'F:/Apache24/htdocs/hotel_control_system/model/admin_lrg.php';//注意重名方法
//require 'model' 用来接收额外内容的接口
$email=$_POST["email"];
$password=$_POST['password'];
$userlrg=new user_lgr();
$result=$userlrg->login($email, $password);
if($result){
	header('Location:../view/admin_homepage.php');
}
else{
	header('Location:view/login_error.php');
}