<?php
require 'F:/Apache24/htdocs/hotel_control_system/model/db_control.php';
session_start();
$a_id=1;//$_SESSION['u_id'];
$conn=new db_control();
$conn->db_connect();
$conn->select_db($tableName="admin_list","moment",$where="u_id=$a_id");
$result=$conn->return_result();
$row=mysqli_fetch_array($result);
if($row[0]==1){
    echo "<script>alert('你今天已经打过上班卡了，请不要重复打');</script>";
    header('location:../view/admin_homepage.php');
}
else{
    $c_conn=$conn->return_conn();
    mysqli_query($c_conn,"update admin_list set moment=1 where u_id=$a_id");
    echo "<script>alert('上班打卡成功，下班请不要忘记打卡');</script>";
    header('location:../view/admin_homepage.php');
}
?>
