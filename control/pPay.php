<?php
require 'F:/Apache24/htdocs/hotel_control_system/model/db_control.php';
session_start();
(string)$id_code=$_POST['c_id'];
$s_time=$_SESSION['startDate'];
$e_time=$_SESSION['endDate'];
$r_price=$_SESSION['r_price']*$_SESSION['r_discount'];
$r_id=$_SESSION['r_id'];
$u_id=$_SESSION['u_id'];
$conn=new db_control();
$conn->db_connect();
$conn->select_db($tableName='room_list',"*",$where="r_id=$r_id and r_status=1");
$result=$conn->return_result();
if(mysqli_num_rows($result)){
    $c_conn=$conn->return_conn();
    mysqli_query($c_conn,"update room_list set r_status=2 where r_id=$r_id");
    $quert="call insert_bill($r_id,$u_id,'$id_code','$s_time','$e_time',1,$r_price)";
    $result=mysqli_query($c_conn,"call insert_bill($r_id,$u_id,'$id_code','$s_time','$e_time',1,$r_price)");
    header('location:../view/operationSuccess.php');
}
else{
    header('location:../view/error.php');
}
