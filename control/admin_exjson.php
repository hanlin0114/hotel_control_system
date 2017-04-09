<?php
session_start();
$username=$_SESSION['username'];
$u_id=$_SESSION['u_id'];
$user=array("username"=>$username,"u_id"=>$u_id);
echo json_encode((object)$user);
?>
