<?php
require "F:/Apache24/htdocs/hotel_control_system/view/user_page_headline.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!--  此文件用于定义头条-->
<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.min.css" >
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
	<style>
	.div-float{
		float: left;
	}
	.div-float1{
		float:right;
		
	}
	.text-nodecoration{
		text-decoration:none;
	}
	</style>
<script>
	/*
	首先应该尝试去遍历的数组的头元素，然后在执行
	*/
function getUsername(){
	  $.ajax({  
		   type:"get",  
		   url:"/hotel_control_system/control/ex_json.php",  
		   dataType:"json",  
		   success:function(data){  
		    var value="";  
		    //i表示在data中的索引位置，n表示包含的信息的对象  
		    $.each(data,function(i,n){  //这部分的I,N的意义是，前面的json中的键，后面的是json的键值
		     //获取对象中属性为optionsValue的值  
		     value+=n; 
		    });  
		      
		    $('#welcome').append(value);  
		   }  
		  });  
		  return false;   
}
$(document).ready(function(){  
		getUsername();
	});

    var curPage = 1; //当前页码  
    var total,pageSize,totalPage;  
    //获取数据  
    function getData(page){   
    $.ajax({  
    type: 'POST',  
    url: '/hotel_control_system/control/pages.php',  
    data: {'pageNum':page-1},  
    dataType:'json',    
    success:function(json){  
    $("#tbody").empty();  
    total = json.total; //总记录数  
    pageSize = json.pageSize; //每页显示条数  
    curPage = page; //当前页  
    totalPage = json.totalPage; //总页数  
    var li = "";  
    var list = json.list;  
    $.each(list,function(index,array){ //遍历json数据列  
    //li += "<li><a href='#'>"+array['title']+"</a></li>";  
		li+="<tr>";
		li+="<td>"+array['r_id']+"</td>"+"<td>"+array['r_size']+"</td>";
		li+="<td>"+array['r_details']+"</td>";
		li+="<td>"+"原价"+array['r_price']+"*"+"折扣:"+array['r_discount']+" "+"现价="+array['r_price']*array["r_discount"]+"</td>";
		li+="</tr>"
        });  
    $("#tbody").append(li);  
    },  
    complete:function(){ //生成分页条  
    getPageBar();  
    },  
    error:function(){  
    alert("数据加载失败");  
    }  
    });  
    }
    function book(){
		 manNum=$('#manNum').val();
		 startDate=$('#startDate').val();
		 endDate=$('#endDate').val();
        $('#roomDetail').empty(); 
        var tableHead="<th>"+"房间号"+"</th>"+"<th>"+"描述"+"</th>"+"<th>"+"价格"+"</th>"+"<th>"+"预订"+"</th>";
        $('#roomDetail').append(tableHead);
	    $.ajax({  
	        type: 'POST',  
	        url: '/hotel_control_system/control/book.php',  
	        data: {'manNum':manNum,'startDate':startDate,'endDate':endDate},  
	        dataType:'json',    
	        success:function(json){  
	        $("#tbody").empty();
	        var li = "";  
	        var list = json.list;  
	        $.each(list,function(index,array){ //遍历json数据列  
	        //li += "<li><a href='#'>"+array['title']+"</a></li>";  
	    		li+="<tr>";
	    		li+="<td>"+array['r_id']+"</td>";
	    		li+="<td>"+array['r_details']+"</td>";
	    		li+="<td>"+"原价"+array['r_price']+"*"+"折扣:"+array['r_discount']+" "+"现价="+array['r_price']*array["r_discount"]+"</td>";
				li+="<td>"+"<a href='/hotel_control_system/control/buy.php?r_id="+array['r_id']+"&r_details="+array['r_details']+"&r_price="+array['r_price']+"&r_discount="+array['r_discount']+"&startDate="+startDate+"&endDate="+endDate+"'>"+"预订"+"</a>";
				li+="</td>"
	    		li+="</tr>"
	            });  
	        $("#tbody").append(li);  
	        },  
	       complete:function(){ //生成分页条  
	        $('#pagecount').empty();
	        },  
	        error:function(){  
	        
	        //$('#tbody').append(li);
	        }  
	        });  
        }  
      
    //获取分页条  
    function getPageBar(){  
    //页码大于最大页数  
    if(curPage>totalPage) curPage=totalPage;  
    //页码小于1  
    if(curPage<1) curPage=1;  
    pageStr = "<span>共"+total+"条</span><span>"+curPage+"/"+totalPage+"</span>";  
      
    //如果是第一页  
    if(curPage==1){  
    pageStr += "<span>首页</span><span>上一页</span>";  
    }else{  
    pageStr += "<span><a href='javascript:void(0)' rel='1'>首页</a></span><span><a href='javascript:void(0)' rel='"+(curPage-1)+"'>上一页</a></span>";  
    }  
      
    //如果是最后页  
    if(curPage>=totalPage){  
    pageStr += "<span>下一页</span><span>尾页</span>";  
    }else{  
    pageStr += "<span><a href='javascript:void(0)' rel='"+(parseInt(curPage)+1)+"'>下一页</a></span><span><a href='javascript:void(0)' rel='"+totalPage+"'>尾页</a></span>";  
    }  
      
    $("#pagecount").html(pageStr);  
    }  
      
    $(function(){  
    getData(1);  
    $("#pagecount").on('click','span a',function(){  
    var rel = $(this).attr("rel");  
    if(rel){  
    getData(rel);  
    }  
    });
    $("#confirm").click(function(){
        book();
    });
    });  
    </script>
</head>
<body>
<div>
<div class="div-float" style="width:30em;margin:0em 0em 0em 10em;">
<h1>hotel manage system</h1>
</div>
<div id ="registertag" class="div-float1" id="welcome" style="width:5em;margin:2em 0em 0em 2em;font-size:1.2em">
	<a href="loginout.php">登出</a>
</div>
<div id ="logintag" class="btn-group div-float1" style="width:5em;margin:1.8em 0em 0em 2em;font-size:1.2em">
	<button type="button" class="btn btn-link dropdown-toggle text-nodecoration" data-toggle="dropdown">
	   订单信息<span class="caret"></span>
	</button>
	<ul class="dropdown-menu" role="menu" id="customerBill">

	</ul>
</div>
<div id ="detail" class="btn-group div-float1 " style="width:5em;margin:1.8em 0em 0em 2em;font-size:1.2em">
	<button type="button" class="btn btn-link dropdown-toggle text-nodecoration" data-toggle="dropdown">
	   用户信息<span class="caret"></span>
	</button>
	<ul class="dropdown-menu" role="menu" id="customerInfo">

	</ul>
</div>
<div id ="welcome" class="div-float1" style="width:5em;margin:2em 0em 0em 2em;font-size:1.2em">
</div>
</div>
<div>
<table class="table table-bordered table-hover definewidth m10">
<tr>
    <td>预订房间详情</td>
    <td >入住人数<input type="number" min="1" max="4" id="manNum"/></td>
    <td>入住事件<input type="date" id="startDate"/></td>
    <td>退房时间<input type="date" id="endDate"></td>
    <td ><input type="button" value="查询" id="confirm"></td>
</tr>
</form>
</div>
   <div>
<table class="table table-bordered table-hover definewidth m10" >
    <thead>
    <tr id="roomDetail">
        <th>房间号</th>
        <th>可住人数</th>
        <th>描述</th>
        <th>价格</th>
       <!--  <th>###</th> -->
    </tr>
    </thead>
<tbody id="tbody">
            </tbody></table>


    </div>
    <div id="pagecount" align="center"></div>

<script src="js/depart.js"><</script>
<script>
$(document).ready(function(){  
	getHeadLine();
});
</script>
    
</body>
</html>

