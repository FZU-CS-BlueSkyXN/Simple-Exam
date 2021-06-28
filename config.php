<?php
	$hostname="localhost"; //mysql地址
	$basename="root"; //mysql用户名
	$basepass="123456"; //mysql密码
	$database="exam"; //mysql数据库名称
	$v_question_count = 10; //总题目数
	$v_question_select_num =3; //在答题活动中一共有多少道题目
	//PDO连接数据库
	$conn = new PDO("mysql:dbname=$database;host=$hostname",$basename,$basepass);
	$conn->query('set names utf8;');
?>
