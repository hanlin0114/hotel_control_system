<?php
class db_control{//此乃数据库链接类，里面定义了各种数据库链接操作和方法
	private $host;//主机名字
	private $db_name;//数据库的名字
	private $login;//登陆数据库的名字
	private $password;//登陆数据库的密码
	private $conn;//保留内部的conn连接
	private $result;//暂时存储结果集
	
	 function __construct($host="localhost",$db_name="hotel_control",$login="root",$password="mysql"){//构造函数将一些数据库字段写入生成的类中
		$this->host=$host;
		$this->db_name=$db_name;
		$this->login=$login;
		$this->password=$password;
	}
	public function db_connect(){//创建一个mysqli例程
		$conn=mysqli_connect($this->host, $this->login, $this->password, $this->db_name);
		$this->conn=$conn;
		if($this->conn){
			
		}else{//判断数据库是否正确生成的方法，如果生成失败应该跳向错误处理页面
			
		}
	}
	private function query($sql){
		$result=mysqli_query($this->conn, $sql);
		$this->result=$result;
		mysqli_commit($this->conn);
	}
	public function select_db($tableName,$colvalue="*",$where=""){//查找数据
		 $sql = "SELECT " . $colvalue . " FROM " . $tableName;
         $sql .= $where ? " WHERE " . $where : null;
         $this->query($sql);
	}
	public function insert_db($tableName, $column = array()) {//此方法为插入的方法，注意：此处应使用带有下标名字的数组
		//示例
		/*
		 *  //$userInfo = array('username'=>'system', 'password' => md5("system"));
 			//$db->insert("user", $userInfo);
 			//dump($db->printMessage());
		 
		 */
		$columnName = "";
		$columnValue = "";
		foreach ($column as $key => $value) {
			$columnName .= $key . ",";
			if(gettype($value)=="string" ){
			$columnValue .= "'" . $value . "',";
			}
			if(gettype($value)=="integer"||gettype($value)=="double"){
			    $columnValue .=  $value .",";
			}
		}
		$columnName = substr($columnName, 0, strlen($columnName) - 1);
		$columnValue = substr($columnValue, 0, strlen($columnValue) - 1);
		$sql = "INSERT INTO $tableName($columnName) VALUES($columnValue)";
		$this->query($sql);
	}
	public function update_db($tablename,$colvalue=array(),$where){//此方法为改的方法
		 $updateValue = "";
         foreach ($colvalue as $key => $value) {
             $updateValue .= $key . "='" . $value . "',";
         }
         $updateValue = substr($updateValue, 0, strlen($updateValue) - 1);
         $sql="update $tablename set $updateValue";
         $sql .= $where ? " WHERE $where" : null;
         $this->query($sql);
         if($this->result)
         	return 1;
         else 
         	return 0;
         //最后应该可以输出个TAG以表示输出成功
	}
	public function delete_db($tablename,$where) {//删除一行的方法
		/*$deleteValue = "";
		foreach ($colvalue as $key => $value){
			$deleteValue .=$key . "='".$value."',";
		}
		$deleteValue=substr($deleteValue,0,strlen($deleteValue)-1);
		$sql="delete from '$tablename' ";
		$sql .= $where ? " WHERE $where" : null;*/
		$sql="delete from '$tablename' where '$where'";
		$this->query($sql);
		if($this->result)
			return 1;
		else
			return 0;
	}
	public function return_result() {//将当前的结果集返回（以方便需要进行分页等操作的时候时候使用)
		return $this->result;
	}
	public function return_conn(){//返回连接的方法，正常不建议使用
	    return $this->conn;
	    
	}
}
?>