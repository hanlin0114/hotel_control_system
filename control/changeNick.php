<?php
require 'F:/Apache24/htdocs/hotel_control_system/model/db_control.php';
session_start();
(string)$username=$_POST['username'];
$u_id=$_SESSION['u_id'];
$conn=new db_control();
$conn->db_connect();
$conn->update_db($tablename="customer_list",$col=array('username'=>$username) ,$where="u_id=$u_id");
$result=$conn->return_result();
if($result){
    $_SESSION['username']=$username;
    header('location:../view/operationSuccess.php');
}
?>