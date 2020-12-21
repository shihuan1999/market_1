<?php
    header('Content-type:text/json;charset=utf-8');
    $goods_id=$_POST['goods_id'];
    $goods_name=$_POST['goods_id'];
    $goods_sales=$_POST['goods_sales'];
    $conn = new mysqli('localhost', 'root', 'wUfG6tMMVseeLkxy', 'supermarket');//连接数据库
    if ($conn -> connect_errno) {//是否连接成功
        printf("Connect failed: %s\n", $conn->connect_error);
        exit();
    }
    //查询代码
    $sql = "select * from sales ORDER BY goods_sales DESC limit 3";
    $query = $conn->query($sql);
    $goods_info = array();
    while($row=mysqli_fetch_assoc($query)){//检查它返回的查询信息是否完全处理结束
        $goods_info[]=$row;//将取得的所有数据赋值给person_info数组
    }
    echo json_encode($goods_info);//输出JSON
    //查询代码
    //释放结果集+关闭MySQL连接
    $query -> free_result();
    $conn -> close();
?>