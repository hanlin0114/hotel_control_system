<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>hotel_control_system</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">hotel_control_system</a>
        </div>
        <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><span id="welcome"></span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/hotel_control_system/control/clock_in.php"><i class="fa fa-fw"></i> 上班</a>
                        </li>
                        <li>
                            <a href="/hotel_control_system/control/clock_out.php"><i class="fa fa-fw "></i> 下班</a>
                        </li>

                        <li class="divider"></li>
                        <li>
                            <a href="/hotel_control_system/control/a_loginout.php"><i class="fa fa-fw"></i> 登出</a>
                        </li>
                    </ul>
                </li>
            </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li >
                    <a href="admin_homepage.php"><i class="fa fa-fw"></i> 管理员名单</a>
                </li>
                <li>
                    <a href="check_in.php"><i class="fa fa-fw"></i> 房间入住</a>
                </li>
                <li>
                    <a href="check_out.php"><i class="fa fa-fw"></i> 房间退房</a>
                </li>
                <li>
                    <a href="maintenance.php"><i class="fa fa-fw"></i> 房间维护</a>
                </li>
                <li class="active">
                    <a href="bill.php"><i class="fa fa-fw"></i> 统计流水</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        查看流水
                    </h1>

                </div>
            </div>
            <!-- /.row -->

            <!-- /.row -->
            <div class="row">
                <table class="table table-bordered table-hover definewidth m10">
                    <thead>
                    <tr id="roomDetail">
                        <th>订单号</th>
                        <th>房间号</th>
                        <th>入住日期</th>
                        <th>退房日期</th>
                        <th>收入金额</th>
                        <!--  <th>###</th> -->
                    </tr>
                    </thead>
                    <tbody id="tbody">

                    </tbody>
                    
                </table>
            </div>





        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Morris Charts JavaScript -->

<script src="js/depart.js"></script>
 <script>
    $(document).ready(function(){  
		getUsername();
	});
    var curPage = 1; //当前页码  
    var total,pageSize,totalPage;  
    //获取数据  
    function getData(page){   
    $.ajax({  
    type: 'POST',  
    url: '/hotel_control_system/control/showBill.php',  
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
    var level;
    var moment
    $.each(list,function(index,array){ //遍历json数据列  
    //li += "<li><a href='#'>"+array['title']+"</a></li>";  
        li+="<tr>";
        li+="<td>"+array['b_id']+"</td>";
        li+="<td>"+array['r_id']+"</td>";
        li+="<td>"+array['checkin']+"</td>";
        li+="<td>"+array['checkout']+"</td>";
        li+="<td>"+array['r_price']+"</td>";
        li+="</tr>";
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
    });
    </script>

</body>

</html>
