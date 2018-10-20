<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/20
 * Time: 19:15
 */
    $con=mysqli_connect('localhost','root','root');
    if($con){
        echo '链接成功';
    }else{
        echo '链接失败';
    }
//    $name=$_GET['name'];
//    $password=$_GET['password'];
    $name='zq';
    $password='123';

    mysqli_select_db($con,'zq');

    $sql='select * from user';

    $result=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($result)){
        if($name==$row['name']&&$password==$row['password']){
//            echo '身份验证成功';
            json_encode('true');
        }else{
//            echo '身份验证失败';
            json_encode('false');
        }
    }

    mysqli_close($con);
