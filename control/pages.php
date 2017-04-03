<?php
require "F:/Apache24/htdocs/hotel_control_system/model/db_control.php";
$page=$_POST['pageNum'];
$conn=new db_control();
$conn->db_connect();
$conn->select_db($tableName="room_list");
$result=$conn->return_result();
$total=mysqli_num_rows($result);
$pageSize=6;//每页显示数，（这部分如果有必要可以设计接口）
$totalPage=ceil($total/$pageSize);
$startPage=$page*$pageSize;
$arr['total']=$total;
$arr['pageSize']=$pageSize;
$arr['totalPage']=$totalPage;
$c_conn=$conn->return_conn();
$query=mysqli_query($c_conn,"select * from room_list order by r_id asc limit $startPage,$pageSize");
while($row=mysqli_fetch_array($query)){
    $arr['list'][]=array(
      'r_id'=>$row['r_id'],
      'r_size'=>$row['r_size'],
      'r_details'=>$row['r_details'],
      'r_discount'=> $row['r_discount'],
      'r_status'=>$row['r_status'],
        'r_price'=>$row['r_price']
    );
}
echo json_encode($arr);
?>

