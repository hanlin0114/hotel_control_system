<?php
require "F:/Apache24/htdocs/hotel_control_system/model/db_control.php";
$u_id=$_POST['u_id'];
$conn=new db_control();
$conn->db_connect();
$conn->select_db($tableName="customer_list","*",$where="u_id=$u_id");
$result=$conn->return_result();
if(mysqli_num_rows($result)){
    while($row=mysqli_fetch_array($result)){
        $arr=array('username'=>$row['username'],'sex'=>$row['sex'],'email'=>$row['email'],'c_level'=>$row['c_level']);
    }
    echo json_encode($arr);
}
?>