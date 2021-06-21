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
	
	$title_sql = "SELECT content FROM question;";
	$title_result = $conn->query($title_sql);
	$cnt = 0;
	if($title_result->num_rows > 0){
		while($title_row = $title_result->fetch_assoc()){
			++$cnt;
			echo (string)$cnt . ". " . $title_row["content"] . "<br>";
			$pconn = new mysqli($servername,$username,$password,$databasename);
			if($pconn->connect_error){
				echo "连接失败";
				break;
			}
			else{
				$selection_sql = (string)"SELECT optionidinquestion,content FROM options where questionid=".(string)$cnt." order by optionidinquestion;";
				//echo $selection_sql . "<br>";
				$selection_result = $pconn->query($selection_sql);
				if($selection_result->num_rows > 0){
					while($selection_row = $selection_result->fetch_assoc()){
						echo "&nbsp;&nbsp;&nbsp;&nbsp;".$selection_row["optionidinquestion"].". ".$selection_row["content"]."<br>";
						
					}
				}
				echo "<br>";
			}
			
			
		}
	}
	
	
	$conn->close();




?>