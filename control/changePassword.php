<?php
require 'F:/Apache24/htdocs/hotel_control_system/model/db_control.php';
session_start();
$password=$_POST['password'];
$password=md5($password);
$u_id=$_SESSION['u_id'];
$conn=new db_control();
$conn->db_connect();
$conn->update_db($tablename="customer_list",$arr=array('password'=>$password), $where="u_id=$u_id");
$result=$conn->return_result();
if($result){
    header('location:../view/operationSuccess.php');
}
?>