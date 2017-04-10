<?php
require 'F:/Apache24/htdocs/hotel_control_system/model/db_control.php';
session_start();
$r_id=$_GET['r_id'];
$r_price=$_GET['r_price'];
$r_discount=$_GET['r_discount'];
$startDate=$_GET['startDate'];
$endDate=$_GET["endDate"];
$conn=new db_control();
$conn->db_connect();
$conn->select_db($tableName="room_list","*",$where="r_id=$r_id and r_price=$r_price and r_discount=$r_discount");
$result=$conn->return_result();
if(!isset($result)){
    $string='<script>alert("你所输入的房间信息有误，请确认你的房间信息是否正确")</script>';
    echo htmlentities($string);
}
else{
    $_SESSION['r_id']=$r_id;
    $_SESSION['r_price']=$r_price;
    $_SESSION['r_discount']=$r_discount;
    $_SESSION['startDate']=$startDate;
    $_SESSION['endDate']=$endDate;
    $totalprice=$r_price*$r_discount;
    echo "<html><div align='center' margin='5em'>
    <table>
      <tr>
        <td font-size:200%>房间号</td>
        <td font-size:200%>".$r_id."</td>
      </tr>
      <tr>
        <td font-size:200%>价格</td>
        <td font-size:200%>".$totalprice."</td>
      </tr>
      <tr>
        <td font-size:200%>入住时间</td>
        <td font-size:200%>".$startDate."</td>
      </tr>
      <tr>
        <td font-size:200%>退房时间</td>
        <td font-size:200%>".$endDate."</td>
      </tr>
      <tr>
        <td><form action='/hotel_control_system/control/pPay.php' method='post'>
            请输入身份证号码:<input type='text' name='c_id'>
          <input type='submit' value='预订'>
        </form>
      </td>
      </tr>
    </table>
  </div>
            </html>";
}