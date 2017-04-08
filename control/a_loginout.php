<?php
session_start();
require 'F:/Apache24/htdocs/hotel_control_system/model/admin_lrg.php';
$user=new user_lgr();
$user->signout();
echo "<script>alert('你已经退出系统');</script>";
header('location:../admin_in.php');

?>