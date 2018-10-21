<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/20
 * Time: 19:15
 */
    $con=mysqli_connect('localhost','root','root','zq');
    header("Access-Control-Allow-Origin: *");
    header('Content-Type:application/json');
//    if($con){
//        echo '链接成功';
//    }else{
//        echo '链接失败';
//    }
    $u=$_GET['u'];
    $name=$_GET['name'];
    $password=$_GET['password'];
//    $u='nuser';
//    $name='zq';
//    $password='123';
    $row_true = array('code' => 1, 'msg' => '正确');
    $row_false = array('code' => 2, 'msg' => '错误');

    switch ($u){
    case 'user': UserCheck();break;
    case 'nuser':InitUser();break;
}

function UserCheck(){
    global $con,$name,$password,$row_true;

    $sql='select * from user';

    $result=mysqli_query($con,$sql);
//        header('Content-Type:application/json');
    while($row=mysqli_fetch_array($result)){
        if($name==$row['name']&&$password==$row['password']){
//            echo '身份验证成功';
            echo json_encode($row_true);
        }
    }
}
    function NameCheck(){
        global $con,$name;
        $num=true;
        $sql="select * from user where name='$name'";
        $result=mysqli_query($con,$sql);
        while($row=mysqli_fetch_array($result)){
            $num=false;
        }
        return $num;
    }

    function InitUser(){
        global $con,$name,$password,$row_true,$row_false;
        $b=NameCheck();
        if($b){
            $sql = "INSERT INTO user (name,password) values('$name','$password')";

            mysqli_query($con, $sql);
            echo json_encode($row_true);

        }else{
            echo json_encode($row_false);
        }
    }
    mysqli_close($con);
