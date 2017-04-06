<?php
require "F:/Apache24/htdocs/hotel_control_system/model/db_control.php";
$page=$_POST['pageNum'];
$conn=new db_control();
$conn->db_connect();
$conn->select_db($tableName="bill_info","*",$where="b_status=2");
$result=$conn->return_result();
$total=mysqli_num_rows($result);
$pageSize=6;//每页显示数，（这部分如果有必要可以设计接口）
$totalPage=ceil($total/$pageSize);
$startPage=$page*$pageSize;
$arr['total']=$total;
$arr['pageSize']=$pageSize;
$arr['totalPage']=$totalPage;
$c_conn=$conn->return_conn();
$string="select * from bill_info where b_status=2 order by b_id asc limit $startPage,$pageSize";
$query=mysqli_query($c_conn,"select * from bill_info where b_status=2 order by b_id asc limit $startPage,$pageSize");
while($row=mysqli_fetch_array($query)){
    $arr['list'][]=array(
       'b_id'=>$row['b_id'],
      'r_id'=>$row['b_rom_id'],
      'id_code'=>$row['c_id_code'],
      'checkin'=>$row['b_r_start_time'],
      'checkout'=> $row['b_r_end_time']
    );
}
echo json_encode($arr);
?>

