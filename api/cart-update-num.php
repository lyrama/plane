<?php
	
	/*
	 根据pid 修改 购车中的 商品的数量pnum
	 get请求，
	 参数 pid 
	 参数pnum
	 
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


//根据pid 修改 购车中的 商品的数量
$pid = $_GET['pid'];
$pnum = $_GET['pnum'];
$uid = $_GET['uid'];


$sql = "UPDATE cart SET pnum='$pnum' WHERE pid=$pid AND uid=$uid";


mysqli_select_db( $conn, 'db1' );
$retval = mysqli_query( $conn, $sql );
if(! $retval )
{
  die('无法修改数据: ' . mysqli_error($conn));
}
$arr['msg'] = '修改成功';


echo json_encode($arr);
mysqli_close($conn);
?>