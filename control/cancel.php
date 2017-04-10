<?php
require 'F:/Apache24/htdocs/hotel_control_system/model/db_control.php';
session_start();
$b_id=$_GET['b_id'];
$conn=new db_control();
$conn->db_connect();
$conn->select_db($tableName="bill_info","*",$where="b_id='$b_id'");
$result=$conn->return_result();
if(mysqli_num_rows($result)){
    if($row=mysqli_fetch_array($result)){
        if($row['b_status']==1){
        $c_conn=$conn->return_conn(); 
        $result=mysqli_query($c_conn,"update bill_info set b_status=0 where b_id='$b_id'");
        mysqli_query($c_conn, "update room_list set r_status=1 where r_id=$r_id");
        header('location:../view/operationSuccess.php');
        }
        else if($row['b_status']==2){
            $c_conn=$conn->return_conn();
            $result=mysqli_query($c_conn,"update bill_info set b_status=-1 where b_id='$b_id'");
           // mysqli_query($c_conn, "update room_list set r_status=1 where r_id=$r_id");
            header('location:../view/operationSuccess.php');
        }
    }
   
}
else{
    header('location:../view/error.php');
}
?>