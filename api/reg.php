<?php

header('Access-Control-Allow-Origin:*');

/*
 	注册接口
 	get请求
 	参数  username 和password
 * 
 * */	
	
$dbhost = '192.168.1.200:3306';  // mysql服务器主机地址
$dbuser = 'root';            // mysql用户名
$dbpass = '';          // mysql用户名密码
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('连接失败: ' . mysqli_error($conn));
}

// 设置编码，防止中文乱码
mysqli_query($conn , "set names utf8");



$username = $_GET['username'];
$password = $_GET['password'];


//注意这里在字符串内部也可以写变量
$sql = "INSERT INTO user (username,password) VALUES ('$username','$password')";

mysqli_select_db( $conn, 'db1' );

$retval = mysqli_query( $conn, $sql );

if(! $retval )
{
  die('无法插入数据: ' . mysqli_error($conn));
}

$arr['code'] = 1;
$arr['msg'] = '注册成功';



echo json_encode($arr);
mysqli_close($conn);



?>