<?php
require 'F:/Apache24/htdocs/hotel_control_system/model/db_control.php';
session_start();
$a_id=$_SESSION['u_id'];
$conn=new db_control();
$conn->db_connect();
$conn->select_db($tableName="admin_list","moment",$where="u_id=$a_id");
$result=$conn->return_result();
$row=mysqli_fetch_array($result);
if($row[0]==1){
    $c_conn=$conn->return_conn();
    mysqli_query($c_conn,"update admin_list set moment=2 where u_id=$a_id");
    echo "<script>alert('下班打卡成功，上班请不要忘记打卡');</script>";
    header('location:../view/admin_homepage.php');
}
else{
    echo "<script>alert('你当前的状态并不处于上班状态，请和后台管理员确认');</script>";
    header('location:../view/admin_homepage.php');
}
?>
