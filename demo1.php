<?php
    header('Content-type:text/json;charset=utf-8');
    $goods_id=$_POST['goods_id'];
    $goods_name=$_POST['goods_id'];
    $goods_sales=$_POST['goods_sales'];
    $conn = new mysqli('localhost', 'root', 'wUfG6tMMVseeLkxy', 'supermarket');
    if ($conn -> connect_errno) {
        printf("Connect failed: %s\n", $conn->connect_error);
        exit();
    }
    //查询代码
    $sql = "select * from sales ORDER BY goods_sales ASC limit 3";
    $query = $conn->query($sql);
    $goods_info = array();
    while($row=mysqli_fetch_assoc($query)){
        $goods_info[]=$row;//将取得的所有数据赋值给person_info数组
    }
    echo json_encode($goods_info);//输出JSON
    //查询代码
    //释放结果集+关闭MySQL连接
    $query -> free_result();
    $conn -> close();
?>