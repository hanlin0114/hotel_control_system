<?php 
require 'F:/Apache24/htdocs/hotel_control_system/model/db_control.php';
session_start();
$num=$_POST['manNum'];
$startDate=$_POST['startDate'];
$endDate=$_POST['endDate'];

$conn=new db_control();
$conn->db_connect();
$c_conn=$conn->return_conn();
$string1="select distinct b_rom_id from bill_info where(bill_info.b_r_start_time<'$startDate' and bill_info.b_r_end_time<'$endDate' or bill_info.b_r_start_time>'$startDate' and bill_info.b_r_end_time>'$endDate')";
$result=mysqli_query($c_conn, $string1);
while($row=mysqli_fetch_array($result)){
    $r_id=$row['b_rom_id'];
    $string2="select r_id,r_price,r_discount,r_details from room_list where r_id=$r_id and r_size=$num and r_status=1";
    $result1=mysqli_query($c_conn,"select r_id,r_price,r_discount,r_details from room_list where r_id=$r_id and r_size=$num and r_status=1");
    if(mysqli_num_rows($result1)){
    $obj=mysqli_fetch_object($result1);
    $arr['list'][]=array(
        'r_id'=>$obj->r_id,
        'r_price'=>$obj->r_price,
        'r_discount'=>$obj->r_discount,
        'r_details'=>$obj->r_details
    );
    }
}
$result2=mysqli_query($c_conn,"select r_id from room_list where r_id not in (select b_rom_id from bill_info)");
while($row2=mysqli_fetch_array($result2)){
    $r_id=$row2['r_id'];
    $query="select r_id,r_price,r_discount,r_details from room_list where r_id=$r_id and r_size=$num and r_status=1";
    $result3=mysqli_query($c_conn, $query);
    //$obj=mysqli_fetch_array($result3);
    if(mysqli_num_rows($result3)){
        $obj=mysqli_fetch_array($result3);
    $arr['list'][]=array(
        'r_id'=>$obj['r_id'],
        'r_price'=>$obj['r_price'],
        'r_discount'=>$obj['r_discount'],
        'r_details'=>$obj['r_details']
        //此处符合条件的信息已经存放到数组中
    );
    }
}
echo json_encode($arr);


?>