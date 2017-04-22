<?php
//function_exists(date_default_timezone_set);//在这他总是返回1,这函数是判断这里面的字符是不是一个定义了的函数名
date_default_timezone_set("Etc/GMT");//这是格林威治标准时间,得到的时间和默认时区是一样的
date_default_timezone_set("Etc/GMT+8");//这里比林威治标准时间慢8小时
date_default_timezone_set("Etc/GMT-8");//这里比林威治标准时间快8小时
date_default_timezone_set('Asia/Shanghai'); //设置中国时区
function countDate($day1,$day2){
    $second1 = strtotime($day1);
    $second2 = strtotime($day2);
    
    if ($second1 < $second2) {
        $tmp = $second2;
        $second2 = $second1;
        $second1 = $tmp;
    }
    return ($second1 - $second2) / 86400;
}
?>