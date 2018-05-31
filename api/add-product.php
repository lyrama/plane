<?php
	
	/*
 把一个商品加入一个用户的购物车， 
 参数
 商品id，pid
 用户id，uid
 商品数量 pnum
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


mysqli_select_db( $conn, 'db1' );



$pid = $_GET['pid'];
$uid = $_GET['uid'];
$pnum = $_GET['pnum'];


//加入购物车的时候，需要先看数据库中有没有这个商品，如果没有就插入，如果有需要在原来数量基础上累加

$selectSql = "SELECT * FROM cart WHERE pid='$pid' AND uid='$uid'";
$selectRetval = mysqli_query( $conn, $selectSql );
// 把 所有的查询结果转为数组
$selectArr = mysqli_fetch_all($selectRetval,MYSQLI_ASSOC);
if(count($selectArr)){
	//找到原来商品的数量，累加得到数字，更新数据库
	$cart = $selectArr[0];
	$num = $cart['pnum']+$pnum;
	//购物车中存在这个商品
	$updateSql = "UPDATE cart SET pnum='$num' WHERE pid='$pid' AND uid='$uid'";
	$updateRetval = mysqli_query( $conn, $updateSql );
	if(! $updateRetval )
	{
	  die('无法修改数据: ' . mysqli_error($conn));
	}
	$arr['msg'] = '修改成功';


	echo json_encode($arr);
	
}else{
	//购物车中不存在这个商品
	$sql = "INSERT INTO cart (pid,uid,pnum) VALUES ('$pid','$uid','$pnum')";
	//echo $sql;
	
	//$sql = "INSERT INTO student (username,money,time) VALUES ('caoz',88,2018-03-06)";
	
	
	$retval = mysqli_query( $conn, $sql );
	if(! $retval )
	{
	  die('无法插入数据: ' . mysqli_error($conn));
	}
	
	$arr['msg'] = '插入成功';
	
	
	echo json_encode($arr);
}



mysqli_close($conn);



?>