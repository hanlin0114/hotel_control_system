<?php
session_start();
require "F:/Apache24/htdocs/hotel_control_system/model/db_control.php";
class customer{//定义顾客类
	/*顾客可以有的行为
	 * 1.修改自己的用户名
	 * 2.修改密码
	 * 3.查看自己的订单
	 * 4.删除自己的成立的订单,从数据库中删除
	 * 5.下订单
	 * 6.删除订单
	 * 7.申请人工服务
	 * 8.查看自己的账户信息
	 */
	private $username;
	private  $u_id;
	private $email;
	private $u_level;

	function __construct(){//构造函数将当前session的全部用户信息写入private中
		$this->username=$_SESSION["username"];
		$this->u_id=$_SESSION["u_id"];
		$this->email=$_SESSION["email"];
		$this->u_level=$_SESSION["u_level"];
	}
	public function show_u_detail(){//展示个人信息
	    $json_u_detail="F:/Apache24/htdocs/hotel_control_system/json_u_detail.json";
	    $tem1=fopen($json_u_detail,"w");
	    fwrite($tem1,"");
	    fclose($tem1);
	    $fileHandle=fopen($json_u_detail,"a");
	    $conn=new db_control();
	    $conn->db_connect();
	    $conn->select_db($tableName="customer_list","*",$where="u_id=$this->u_id");
	    $result=$conn->return_result();
	    while($obj=mysqli_fetch_object($result)){
	        $json_code=json_encode($obj);
	        fwrite($fileHandle,$json_code);
	    }
	    fclose($fileHandle);
	}
	
	public function up_username($n_username){//修改用户名的方法
		$db_conn=new db_control();//设置最基础的数据库信息
		$db_conn->db_connect();//数据库连接
		$where="u_id=$this->u_id";
		$arr=array('username'=>$n_username);
		$db_conn->update_db($tablename="customer_list",$arr,$where="u_id=$this->u_id");
		$result=$db_conn->return_result();
		if(isset($result)){
			$this->username=$n_username;
			return 1;//更改成功，并且
		}
		else 
			return 0;//返回0时指更改失败
	}
	public function up_passwd($n_passwd){//修改密码的方法
		$n_passwd=md5($n_passwd);
		$db_conn=new db_control();
		$db_conn->db_connect();
		$where="u_id=$this->u_id";
		$arr=array('password'=>(string)$n_password);
		$db_conn->update_db($tablename="customer_list",$arr, $where);
		$result=$db_conn->return_result();
		if(isset($result)){
			return 1;
		}
		else
			return 0;
	}
	public function show_bill($detect){//显示自己的订单
		$db_conn=new db_control();
		$db_conn->db_connect();
		$db_conn->select_db($tableName="bill_info","*","b_customer_id=$this->u_id  $detect");
		$result=$db_conn->return_result();
		if(isset($result)){
			return $result;//如果有结果返回结果
		}
		else
			return 0;//无结果或查询出错返回0
	}
	public function showInfo(){
	    $db_conn=new db_control();
	    $db_conn->db_connect();
	    $db_conn->select_db($tableName="customer_list","*","u_id=$this->u_id");
	    $result=$db_conn->return_result();
	    if(isset($result))
	        return $result;
	    else 
	        return 0;
	    
	}
	public function delete_bill($b_id){//暂时的删除策略是从数据库中删除掉
		$db_conn=new db_control();
		$db_conn->db_connect();
		$where="b_id=$b_id";
		$db_conn->delete_db($tablename, $where);
		//$result=$db_conn->return_result();
		//$obj=mysqli_fetch_object($result)
		if($result){
			return 1;//删除成功
		}
		else{
			return 0;//删除出现问题
		}
		
	}
	public function sumbit_bill($room_id,$s_time,$e_time,$id_code){//提交订单，也就是预订房间,这部分还要想一想逻辑
		//id_code是身份证号
		$db_conn=new db_control();
		$db_conn->db_connect();
		$where="r_id=$room_id and r_status=0";
		$db_conn->select_db($tableName="bill_info","*",$where);
		$u_id=$_SESSION['u_id'];
		$result=$db_conn->return_result();
		$obj=mysqli_fetch_object($result);
		if(isset($obj)){//这部分不是调用insert方法，而是调用存储过程，所以并不需要query数组添加
			//$query=array("b_cusomer_id"=>$_SESSION['u_id'],"b_rom_id"=>$room_id,"b_r_start_time"=>$s_time,"b_r_");
			//mysqli_query("call insert_bill($room_id,'$id_code',$_SESSION['u_id']),$s_time,$e_time,1");
			$result=mysqli_query("call insert_bill($room_id,'$id_code',$u_id,$s_time,$e_time,1)");
			if($result)
				return 1;//操作成功
			else
				return 0;//操作失败
		}
		else{
			return -1;//代表当前的房间号不可用
		}
		
		
	}
	public function change_state($r_id,$status){
	    $conn=new db_control();
	    $conn->db_connect();
	    $conn->update_db($tablename="room_list",$status, $where="r_id=$r_id");
	    $result=$conn->return_result();
	    if($result)
	        return 1;
	    else 
	        return 0;
	}
	
	
	
	public function cancel_bill($b_id){
		$db_conn=new db_control();//连接订单表
		$db_conn->db_connect();
		/*
		 * 
		 * 这一部分用来鉴定用户的申请退款是否合理
		 * 这部分判定先跳过一下
		 */
		$db_conn->delete_db($tablename, $where);
		$result=$db_conn->return_result();
		if($result){
			return 1;
		}
		else{
			return 0;
		}
	}
	public function pay($u_id,$p_id,$money) {//用户识别，订单标识，金额
		$db_conn=new db_control();
		$db_coon->db_connect();
		/*
		 * 此处部分调用专门的支付接口
		 */
		$where="u_id=$u_id and p_id=$p_id";
		$db_conn->update_db($tablename="bill_info","b_staue=3",$where);//订单状态位为3的时候表示订单已付款
		$result=$db_conn->return_result();
		if($result)
			return 1;//返回1表示付款成功
		else
			return 0;//返回0表示付款失败
	}
}
?>