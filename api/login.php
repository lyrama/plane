<?php
	
header('Access-Control-Allow-Origin:*');

//mysql 地址
$dbhost = '192.168.1.200:3306';
//用户名密码
$dbuser = 'root';
$dbpass = '';

$conn = mysqli_connect($dbhost,$dbuser,$dbpass);
if($conn){
	//echo '连接数据库成功';
}
//连接上了 db1 
mysqli_select_db($conn,'db1');
// 设置编码，防止中文乱码
mysqli_query($conn , "set names utf8");


$username = $_GET['username'];
$password = $_GET['password'];


//编写sql 语句，使用php 函数  去执行sql语句
$sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
//echo $sql;

//执行sql语句
//$retval 查询的结果集
$retval = mysqli_query($conn,$sql);

// 把 所有的查询结果转为数组
$res = mysqli_fetch_all($retval,MYSQLI_ASSOC);

//var_dump($res);

if(count($res) !=0){
	$arr['code'] = 1;
	$arr['msg'] = '登录成功';
	$arr['data'] = $res[0];
	
	
	//token  令牌 ，用id 当做令牌
	
}else{
	$arr['code'] = 0;
	$arr['msg'] = '请检查用户名或者密码';
}




echo json_encode($arr);








?>