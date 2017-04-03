<?php
require "F:/Apache24/htdocs/hotel_control_system/model/user_lrg.php";
$login_out=new user_lgr();
$login_out->signout();
?>
<html>
<body>
<p>你已经登出网站</p>
<p>点击此处返回<a href="login.php">登陆页</a></p>
</body>
</html>