<?php
require 'F:/Apache24/htdocs/hotel_control_system/model/db_control.php';
$b_id=$_GET['b_id'];
$conn=new db_control();
$conn->db_connect();
$conn->select_db($tableName="bill_info","*",$where="b_id='$b_id'");
$result=$conn->return_result();
if(mysqli_num_rows($result)){
    $c_conn=$conn->return_conn();
    $result=mysqli_query($c_conn,"update bill_info set b_status=3 where b_id='$b_id'");
    if($result)
        header('location:../view/admin_success.php');
    else 
        header('location;../view/admin_error.php');
}
?>