<?php
   require 'F:/Apache24/htdocs/hotel_control_system/model/db_control.php';
session_start();
$b_id='201704031414:59:1000001';$_POST['b_id'];
$u_id=2;//$_SESSION['u_id'];
$query="select * from bill_info where b_id='$b_id' and b_customer_id=$u_id and b_status=1";
$conn=new db_control();
$conn->db_connect();
$conn->select_db($tableName='bill_info','*',$where="b_id='$b_id' and b_customer_id=$u_id and b_status=1");
$result=$conn->return_result();
if(mysqli_num_rows($result)){
    //$conn->update_db($tablename="bill_info",$arr=array('b_status'=>2),$where="b_id='$b_id'");
    $c_conn=$conn->return_conn();
    $result=mysqli_query($c_conn, "update bill_info set b_status=2 where b_id='$b_id'");
   //$result=$conn->return_result();
    if($result)
        header('location:../view/operationSuccess.php');
}
else{
    header('location:../view/error.php');
}
 ?>
