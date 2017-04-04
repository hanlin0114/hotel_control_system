<?php
require 'F:/Apache24/htdocs/hotel_control_system/model/db_control.php';
session_start();
$conn=new db_control();
$conn->db_connect();
$r_id=$_SESSION['r_id'];
$r_price=$_SESSION['r_price'];
$r_discount=$_SESSION['r_discount'];
(string)$c_id=$_POST['c_id'];
$startDate=$_SESSION['startDate'];
$endDate=$_SESSION['endDate'];
$totalPrice=$r_price*$r_discount;
//$query=array("c_id_code"=>$c_id,);
$u_id=$_SESSION['u_id'];
$c_id="232331";
$c_conn=$conn->return_conn();
//$string="$r_id,$c_id,'$startDate','$endDate'";
$result=mysqli_query($c_conn,"call insert_bill($r_id,$u_id,'$c_id','$startDate','$endDate',2,$totalPrice)");
echo mysqli_error($c_conn);
$conn->select_db($tableName="bill_info","b_id",$where="b_rom_id=$r_id and c_id_code='$c_id' and b_r_start_time='$startDate' and b_r_end_time='$endDate' and b_status=2");
$result=$conn->return_result();
$query=array('status'=>2);
$conn->update_db($tablename="room_list",$query, $where="r_id=$r_id");
$row=mysqli_fetch_array($result);
$b_id=$row['b_id'];
$_SESSION['b_id']=$b_id;
echo "<html><div align='center'><table><tr><td>订单号</td><td>".$b_id."</td></tr>"."<tr><td>金额</td><td>".$totalPrice."</td></tr>
    <tr><td>确认支付</td></tr><tr><td><a href='/hotel_control_system/control/paySucess.php'>确认支付</td></tr></div></html>";
?>