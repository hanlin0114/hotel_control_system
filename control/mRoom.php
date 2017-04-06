<?php
require 'F:/Apache24/htdocs/hotel_control_system/model/db_control.php';
$r_id=$_POST['r_id'];
$m_time=$_POST['m_time'];
$conn=new db_control();
$conn->db_connect();
$c_conn=$conn->return_conn();
$result=mysqli_query($c_conn, "select * from bill_info where b_rom_id=$r_id and '$m_time' between b_r_start_time and b_r_end_time");
if(mysqli_fetch_row($result)!=0){
    echo "<script>alert('您当前的维护时间和房间有顾客在使用，请挑选其他时间维护')</script>";
}
else{
    $r_price=$_POST['r_price'];
    $r_discount=$_POST['r_discount'];
    $r_size=$_POST['r_size'];
    (string)$r_details=$_POST['r_details'];
    (string)$m_describe=$_POST['m_describe'];
    $r_status=$_POST['r_status'];
    $arr=array(
      'r_price'=>$r_price,
        'r_discount'=>$r_discount,
        'r_size'=>$r_size,
        'r_details'=>$r_details,
        'm_time'=>$m_time,
        'm_describe'=>$m_describe
    );
    $query="update room_list set r_price=$r_price,r_discount=$r_discount,r_status=$r_status,r_size=$r_size,r_details='$r_details',m_time='$m_time',m_describe='$m_describe' where r_id=$r_id";
    echo "<script>alert'$query'</script>";
    $result=mysqli_query($c_conn,$query);
    mysqli_commit($c_conn);
    header('location:../view/maintenance.php');
}
?>