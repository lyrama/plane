<?php
	
	//根据商品id删除 用户id 购物车中的商品  
	//参数 pid
	//uid
	
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

//根据商品id删除 购物车中的商品
$pid = $_GET['pid'];
$uid = $_GET['uid'];

$sql = "DELETE FROM `cart` WHERE (`pid`=$pid) AND (`uid`=$uid) ";

mysqli_select_db( $conn, 'db1' );
$retval = mysqli_query( $conn, $sql );
if(! $retval )
{
  die('无法插入数据: ' . mysqli_error($conn));
}

$arr['msg'] = '删除成功';


echo json_encode($arr);
mysqli_close($conn);
?>