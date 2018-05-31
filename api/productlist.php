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


mysqli_options($conn,MYSQLI_OPT_INT_AND_FLOAT_NATIVE,true);  


//编写sql 语句，使用php 函数  去执行sql语句
$sql = "SELECT * FROM product";
//echo $sql;

//执行sql语句
//$retval 查询的结果集
$retval = mysqli_query($conn,$sql);

// 把 所有的查询结果转为数组
$res = mysqli_fetch_all($retval,MYSQLI_ASSOC);

//var_dump($res);

$arr['data'] = $res;
$arr['msg'] = '查询成功';


echo json_encode($arr);








?>