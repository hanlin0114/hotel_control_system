<?php
session_start();
require 'F:/Apache24/htdocs/hotel_control_system/model/db_control.php';
class user_lgr{
	private $user_name;
	private $email;
	private $u_id;
	public function login($email,$passwd){
		$passwd=md5($passwd);//密码使用MD5加密
		$db_conn=new db_control();//此处应进行主机地址，数据库名字，登录密码，密码设置
		$db_conn->db_connect();
		$db_conn->select_db($tableName="admin_list","*","email='$email' and password = '$passwd'");
		$result=$db_conn->return_result();//此处将结果集返回
		$obj=mysqli_fetch_object($result);
		if(isset($obj)){//登陆成功就将用户信息写入session
			
			$_SESSION['username']=$obj->a_name;//写入用户名
			$_SESSION['u_id']=$obj->u_id;//写入用户标志
			$_SESSION['u_level']=$obj->a_level;//写入用户等级
			//setcookie("userrname",$obj->username);//写入cookie以用来用户交互
			return 1;
		}
		else
			return 0;//失败返回false
	}
	public function a_register($email,$username,$passwd,$sex,$c_level){//此方法为一般用户的注册方法//用户名组测其实并没有所谓，最重
		//最重要的，用户的email地址不能重复
		$passwd=md5($passwd);
		$db_conn=new db_control();//这个是针对数据库的内容
		$db_conn->db_connect();
		$db_conn->select_db("admin_list","*","email='$email'");
		$result=$db_conn->return_result();
		$row=mysqli_fetch_array($result);
		if(isset($row)){
			return -1;//这里-1tag表示的是用户名已经被注册
		}
		else{
			$col=array('email'=>$email,'a_name'=>$username,'password'=>$passwd,'sex'=>$sex,'a_level'=>$c_level);
			$db_conn->insert_db($tablename="admin_list",$col);
			$result=$db_conn->return_result();
			if(isset($result)){
				return 1;//1tag注册成功
			}
			else{
				return 0;//0tag表示注册时数据操作出现问题
			}
		}
	}
	public function signout(){
        session_destroy();
	}


}
?>
