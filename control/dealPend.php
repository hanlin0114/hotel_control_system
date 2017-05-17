<?php
require 'F:/Apache24/htdocs/hotel_control_system/model/db_control.php';
$b_id=$_GET['b_id'];
$conn=new db_control();
$conn->db_connect();
$c_conn=$conn->return_conn();
$result=mysqli_query($c_conn,"update bill_info set b_status=0 where b_id='$b_id'");
if(mysqli_affected_rows($result)!=-1){
    echo "<script>alert('修改成功，稍后返回主页');</script>";
    header('location:../view/admin_homepage.php');
}
?>