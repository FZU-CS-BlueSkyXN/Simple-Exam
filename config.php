<?php
	header("Content-type:text/html;charset=utf-8");  
// $hostname="localhost"; //mysql地址
// $basename="root"; //mysql用户名
// $basepass=""; //mysql密码
// $database="waddt"; //mysql数据库名称

 $hostname="localhost"; //mysql地址
 $basename="root"; //mysql用户名
 $basepass="123456"; //mysql密码
 $database="exam"; //mysql数据库名称

 $v_question_count = 10; //总题目数
 $v_question_select_num =3; //在答题活动中一共有多少道题目
/*
 $conn=mysqli_connect($hostname,$basename,$basepass)or die("error!"); //连接mysql
 mysqli_select_db($database,$conn); //选择mysql数据库
 mysqli_query("set names 'utf8'");//mysql编码
*/
	$conn = new PDO("mysql:dbname=$database;host=$hostname",$basename,$basepass);
	$conn->query('set names utf8;');
?>
