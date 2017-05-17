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
                 <li>
                    <a href="pendBill.php"><i class="fa fa-fw"></i> 待处理的订单</a>
                </li>
                <li>
                    <a href="addRoom.php"><i class="fa fa-fw"></i> 增加房间</a>
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
                        增加房间
                    </h1>

                </div>
            </div>
            <!-- /.row -->

            <!-- /.row -->
            <div class="row">
                <p>房间号：<input type="number" id="r_id"/></p>
                <p>房间人数：<input type="number" id="r_size"/></p>
                <p>描述：<input type="text" id="r_details"/></p>
                <p>价格：<input type="number" id="r_price"/></p>
                <p>折扣：<input type="number" id="r_discount"/></p>
                <p><button id="comfirm">添加</button></p>
                <p><label id="show"></label></p>
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
 
    $(function(){  
        $('#comfirm').click(function(){
            var r_id=$('#r_id').val();
            var r_size=$('#r_size').val();
            var r_details=$('#r_details').val();
            var r_price=$('#r_price').val();
            var r_discount=$('#r_discount').val();
            $.ajax({
                type:'post',
                url:'/hotel_control_system/control/addRoom.php',
                data:{'r_id':r_id,'r_size':r_size,'r_details':r_details,'r_price':r_price,'r_discount':r_discount},
                dataType:'json',
                success:function(json){
                    $('#show').empty();
                    $('#show').append('添加成功');
                    $('#r_id').val("");
                    $('#r_size').val("");
                    $('#r_details').val("");
                    $('#r_price').val("");
                    $('#r_discount').val("");
                },
                error:function(){
                    $('#show').empty();
                    $('#show').append('添加失败');
                }
            });
        });
    });
    </script>

</body>

</html>
