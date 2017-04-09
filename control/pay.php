<?php
session_start();
require "F:/Apache24/htdocs/hotel_control_system/model/db_control.php";
$b_id='201704031414:59:1000001';//$_POST['b_id'];

$conn=new db_control();
$conn->db_connect();
$c_conn=$conn->return_conn();
$query=mysqli_query($c_conn,"select * from bill_info where b_id='$b_id' ");
while($row=mysqli_fetch_array($query)){
    $arr['list'][]=array(
      'b_id'=>$row['b_id'],
      'r_id'=>$row['b_rom_id'],
      'start_time'=>$row['b_r_start_time'],
      'end_time'=> $row['b_r_end_time'],
       'price'=>$row['price']
    );
}
echo json_encode($arr);
?>

