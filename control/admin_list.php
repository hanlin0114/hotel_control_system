<?php
require "F:/Apache24/htdocs/hotel_control_system/model/db_control.php";
$page=$_POST['pageNum'];
$conn=new db_control();
$conn->db_connect();
$conn->select_db($tableName="admin_list");
$result=$conn->return_result();
$total=mysqli_num_rows($result);
$pageSize=6;//每页显示数，（这部分如果有必要可以设计接口）
$totalPage=ceil($total/$pageSize);
$startPage=$page*$pageSize;
$arr['total']=$total;
$arr['pageSize']=$pageSize;
$arr['totalPage']=$totalPage;
$c_conn=$conn->return_conn();
//$sql2="select * from admin_list order by u_id asc limit $startPage,$pageSize";
$query=mysqli_query($c_conn,"select * from admin_list order by u_id asc limit $startPage,$pageSize");
while($row=mysqli_fetch_array($query)){
    $arr['list'][]=array(
      'a_id'=>$row['u_id'],
      'a_name'=>$row['a_name'],
      'a_level'=>$row['a_level'],
      'moment'=> $row['moment']
    );
}
//$string =json_encode($arr);
echo json_encode($arr);
?>

