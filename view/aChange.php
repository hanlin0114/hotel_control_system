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
<script src="js/depart.js"><</script>
<script>
$(document).ready(function(){  
	getUsername();
});
function getUrlParam(name) {
	 var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
	 var r = window.location.search.substr(1).match(reg); //匹配目标参数
	 if (r != null) return unescape(r[2]); return null; //返回参数值
	}
var u_id=getUrlParam('u_id');
li="<form action='/hotel_control_system/control/aChange.php' method='post'>";
li+="管理员编号:<input type='text' name='u_id' value='"+u_id+"' readonly/><br/>";
li+="管理员姓名<input type='text' name='username'/><br />";
li+="管理员密码<input type='password' name='password'/><br/>";
li+="确认密码<input type='password' name='rePassword'><br />"
li+="管理员性别<select name='sex'><option value=1>男</option><option value=2>女</option></select><br />";
li+="管理员等级<select name='aLevel'><option value=1>一般管理员</option><option value=2>经理</option><option value=3>超级管理员</option><option value=0>离职</option>";
li+="<input type='submit' value='提交'></form>";

$(document).ready(function(){  
	$('#change').append(li);
});
</script>
 


</body>

</html>
