<?php
require '../model/db_control.php';
$r_id=$_POST['r_id'];
$r_size=$_POST['r_size'];
$r_details=$_POST['r_details'];
$r_price=$_POST['r_price'];
$r_discount=$_POST['r_discount'];
$dbCon=new db_control();
$dbCon->db_connect();
$query=array(
    'r_id'=>(integer)$r_id,
    'r_size'=>(integer)$r_size,
    'r_details'=>(string)$r_details,
    'r_price'=>(double)$r_price,
    'r_discount'=>(double)$r_discount,
    'r_status'=>1
);
$dbCon->insert_db($tableName="room_list",$query);
$result=$dbCon->return_result();
if($result)
    echo json_encode("1");