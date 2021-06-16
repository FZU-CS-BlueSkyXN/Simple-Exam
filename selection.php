<?php
	/*
	class question{
		var $content;
		var $selections=array();
		var $answer;
		function printQuestion(){
			echo "<p>$content</p>";
			for ($i=1;$i<=4;$i++){
				echo "<p>$i. $selections[i]</p>";
			}
			
		}
	}
	*/
	
	echo "hello world";
	$servername = "localhost";
	$username = "root";
	$password = "";
	$databasename = "questionsystem";
	$conn = new mysqli($servername,$username,$password,$databasename);
	
	if($conn->connect_error){
		die("连接失败：" . $conn->connect_error);
	}
	echo "连接成功<br>";
	
	$sql = "SELECT content FROM question";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			echo $row["content"] . "<br>";
		}
	}
	
	
	$conn->close();




?>