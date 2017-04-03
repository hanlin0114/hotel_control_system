<?php
//header("Content-type: text/html; charset=utf-8"); 
session_start();


if(empty($_SESSION['username'])){
	//echo "welcome11"."<br/>";
	//echo "welcome11"."<br/>";
	header('Location:view/login.php');//要注意header的具体用法
	//echo "welcome11"."<br/>";
}
else 
	echo "welcome"."<br/>";
?>