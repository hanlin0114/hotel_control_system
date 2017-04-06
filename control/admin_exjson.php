<?php
session_start();
$username=$_SESSION['username'];
$user=array("username"=>$username);
echo json_encode((object)$user);
?>
