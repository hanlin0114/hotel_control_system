<?php
require 'F:/Apache24/htdocs/hotel_control_system/model/db_control.php';
$u_id=$_POST['u_id'];
$password=$_POST['password'];
$password=md5($password);
$username=$_POST['username'];
$sex=$_POST['sex'];
$aLevel=$_POST['aLevel'];
$conn=new db_control();
$conn->db_connect();
$c_conn=$conn->return_conn();
$result=mysqli_query($c_conn,"update admin_list set a_name='$username',password='$password',a_level=$aLevel,sex=$sex where u_id=$u_id");
if(mysqli_affected_rows($result)!=-1){
    echo "<script>alert('修改成功，稍后返回主页');</script>";
    sleep(1);
    header('location:../view/admin_homepage.php');
}
?>