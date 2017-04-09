<?php
require "F:/Apache24/htdocs/hotel_control_system/model/db_control.php";
session_start();
$u_id=$_SESSION['u_id'];
$page=$_POST['pageNum'];
$conn=new db_control();
$conn->db_connect();
$conn->select_db($tableName="bill_info","*",$where="b_customer_id=$u_id and b_status=2" );
$result=$conn->return_result();
$total=mysqli_num_rows($result);
$pageSize=6;//每页显示数，（这部分如果有必要可以设计接口）
$totalPage=ceil($total/$pageSize);
$startPage=$page*$pageSize;
$arr['total']=$total;
$arr['pageSize']=$pageSize;
$arr['totalPage']=$totalPage;
$c_conn=$conn->return_conn();
$string="select * from bill_info where b_customer_id=$u_id and b_status=1 order by b_id asc limit $startPage,$pageSize";
$query=mysqli_query($c_conn,"select * from bill_info where b_customer_id=$u_id and b_status=2 order by b_id asc limit $startPage,$pageSize");
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

