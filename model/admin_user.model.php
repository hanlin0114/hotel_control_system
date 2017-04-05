<?php
require "F:/Apache24/htdocs/hotel_control_system/model/db_control.php";
session_start();
class admin_user{
	private $u_id;
	private $username;
	private $u_level;
	public function __construct(){
		$this->u_id=$_SESSION["u_id"];
		$this->username=$_SESSION["username"];
		$this->u_level=$_SESSION["u_level"];
	}
	public function insert_rom($r_id,$r_size,$r_detail,$r_price,$r_discount,$r_status){
		/*
		 * 数据表结构
		 * r_id：房间的唯一标识码，也就是房间号
		 * r_status：现状，也就是当前房间有没有被人使用||订购
		 * r_size：房间是几人房
		 //被取消了* type：房间类型，即是普通客房，VIP客房还是特价房
		 * r_detail：描述，此字段可为空，用于描述房间的状态例如装修，有无窗，等东西
		 *r_discount 房间折扣
		 */
		$db_conn=new db_control();
		$db_conn->db_connect();
		//$query="insert into $tablename values $rom_id,$moment,$num,$type,'$describe'";
		$query=array("r_id"=>$r_id,"r_size"=>$r_size,"r_detail"=>$r_detail,"r_price"=>$r_price,"r_discount"=>$r_discount,"r_status"=>$r_status);
		$db_conn->insert_db($tablename="room_list",$query);
		$result=$db_conn->return_result();
		if(isset($result))
			return 1;
		else
			return 0;
	}
	public function delete_rom($rom_id){//删除房间，房间信息输入错的时候进行修改,但一般不建议使用
		$db_conn=new db_control();
		$db_conn->connect();
		$db_conn->select_db($tableName,"useable","where r_id=$rom_id");
		$result=$db_conn->return_result();
		$obj_tem=mysqli_fetch_object($result);
		if($obj->status==1){
			return 0;
		}
		else{
			$db_conn->delete_db($tablename, "r_id=$rom_id");
			if($db_conn->return_result()){
				return 1;
			}
			else return  -1;
		}
	}
	public function update_rom($rom_id){//更新房间信息在更改房间信息需要先将房间置为不可用
		//此方法用于更新房间信息
		$db_conn=new db_control();
		$db_conn->db_connect();
		$db_conn->select_db($tableName,"useable","where rom_id=$rom_id");
		$result=$db_conn->return_result();
		$obj=mysqli_fetch_object($result);
		if($obj->usebale==1){//当房间正在被使用或者没有置为可用时
			return 0;
		}
		else{
			//插入字段
		}
		
	}
	public function set_user_error($uid){//用于设置违规用户（仅针对与用户）
		$db_conn=new db_control();
		$db_conn->db_connect();
		$col=array("u_level"=>0);
		$db_conn->update_db($tablename,$col,"u_id=$u_id");
		$result=$db_conn->return_result();
		if($result)
			return 1;
		else
			return 0;
	}
	public function set_user_normal($uid){//恢复用户的正常权限
		$db_conn=new db_control();
		$db_conn->db_connect();
		$col=array("u_level"=>1);
		$db_conn->update_db($tablename,$col, "u_id=$uid");
		$result=$db_conn->return_result();
		if($result)
			return  1;
		else 
			return 0;
	}
	public function set_user_vip($uid){
		$db_conn=new db_control();
		$db_conn->db_connect();
		$col=array("u_level"=>2);
		$db_conn->update_db($tablename,$col ,"u_id=$uid");
		$result=$db_conn->return_result();
		if($result)
			return 1;
		else
			return 0;
	}
}


?>