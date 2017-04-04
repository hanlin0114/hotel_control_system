<?php
require 'F:/Apache24/htdocs/hotel_control_system/model/customer.php';
session_start();
$u_id=$_SESSION['u_id'];
$user=new customer();
$user->show_bill("b_status=2");
