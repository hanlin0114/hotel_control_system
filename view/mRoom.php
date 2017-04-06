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
            <a class="navbar-brand" href="admin_homepage.php">hotel_control_system</a>
        </div>
        <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><span id="welcome"></span><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/hotel_control_system/control/clock_in.php"><i class="fa fa-fw"></i> 打卡</a>
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
        
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        房间维护
                    </h1>

                </div>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li >
                    <a href="admin_homepage.php"><i class="fa fa-fw"></i> 管理员名单</a>
                </li>
                <li >
                    <a href="check_in.php"><i class="fa fa-fw"></i> 房间入住</a>
                </li>
                <li >
                    <a href="check_out.php"><i class="fa fa-fw"></i> 房间退房</a>
                </li>
                <li class="active">
                    <a href="maintenance.php"><i class="fa fa-fw"></i> 房间维护</a>
                </li>
                <li>
                    <a href="bill.php"><i class="fa fa-fw"></i> 统计流水</a>
                </li>
            </ul>
        </div>
            <!-- /.row -->

            <!-- /.row -->
            <div id="change" align="center">
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
<script>
function getUrlParam(name) {
	 var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
	 var r = window.location.search.substr(1).match(reg); //匹配目标参数
	 if (r != null) return unescape(r[2]); return null; //返回参数值
	}
var r_id=getUrlParam('r_id');
li="<form action='/hotel_control_system/control/mRoom.php' method='post'>";
li+="房间号:<input type='text' name='r_id' value='"+r_id+"' readonly/><br/>";
li+="房间人数<input type='number' name='r_size'/><br />";
li+="房间描述<input type='text' name='r_details'/><br/>";
li+="房间价格<input type='number' step='0.1' name='r_price' /><br />";
li+="房间折扣<input type='number' step='0.01' name='r_discount'>";
li+="房间状态<select name='r_status'><option value=1>正常使用</option><option value=10>维护中</option></select><br />";
li+="维护时间<input type='date' name='m_time'><br />";
li+="维护描述<input type='text' name='m_describe'><br />";
li+="<input type='submit' value='提交'></form>";

$(document).ready(function(){  
	$('#change').append(li);
});
</script>
 


</body>

</html>
