function getUsername(){
    $.ajax({
        type:"get",
        url:"/hotel_control_system/control/admin_exjson.php",
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

