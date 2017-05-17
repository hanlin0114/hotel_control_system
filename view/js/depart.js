function getUsername(){
    $.ajax({
        type:"get",
        url:"/hotel_control_system/control/admin_exjson.php",
        dataType:"json",
        success:function(data){
            var value="";
            //i表示在data中的索引位置，n表示包含的信息的对象
            	value=data.username;
            $('#welcome').append(value);
        },
        error:function(){
            window.location="SessionError.php";
        }
    });
    return false;
}
function getHeadLine(){
	$.ajax({
        type:"get",
        url:"/hotel_control_system/control/admin_exjson.php",
        dataType:"json",
        success:function(data){
        	var li="";
        	li+="<li><a href='/hotel_control_system/view/checkUpay.php?u_id="+data.u_id+"'>未支付订单</a></li>";
     	   li+="<li><a href='/hotel_control_system/view/checkPaid.php?u_id="+data.u_id+"'>已支付订单</a></li>";
    	   li+="<li><a href='/hotel_control_system/view/checkFinish.php?u_id="+data.u_id+"'>已完成订单</a></li>";
    	   $('#customerBill').append(li);
    	   var ri="";
       	ri+="<li><a href='/hotel_control_system/view/showInfo.php?u_id="+data.u_id+"'>查看信息</a></li>";
  	   ri+="<li><a href='/hotel_control_system/view/changeNick.php?u_id="+data.u_id+"'>修改昵称</a></li>";
 	   ri+="<li><a href='/hotel_control_system/view/changePassword.php?u_id="+data.u_id+"'>修改密码</a></li>";
 	   $('#customerInfo').append(ri);
        }
		
	});
}

function getUrlParam(name) {
	 var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
	 var r = window.location.search.substr(1).match(reg); //匹配目标参数
	 if (r != null) return unescape(r[2]); return null; //返回参数值
	}

function getUsernameP(){
    $.ajax({
        type:"get",
        url:"/hotel_control_system/control/admin_exjson.php",
        dataType:"json",
        success:function(data){
            var value="";
            //i表示在data中的索引位置，n表示包含的信息的对象
            	value=data.username;
            	var li="";
            	li+="当前用户名"+value+"<br />";
            	li+="<form action='/hotel_control_system/control/changeNick.php' method='post'>新用户名<input type='text' name='username'><br>";
            	li+="<input type='submit' value='确认'></form>";
            	$('#changeNick').append(li);
        }
    });
    
}


