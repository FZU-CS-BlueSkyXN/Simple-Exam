<?php
/*
	selection.php
	failed:
	{
		state:0
	}
	succeeded:
	{
		state:1,
		[
			{
				questionid:1,//number from 1
				content:"...",
				selection:[
					{
							optionidinquestion:1,
							content:"..."
					},
					{
							optionidinquestion:2,
							content:"..."
					}
				]
		]
	}
*/
?>

<?php

	class Option{
		var $option_id_in_question;
		var $content;
	}
	
	class Question{
		var $question_id;
		var $content;
		var $options;//options
		
	}
	class JsonFile{
		var $state;
		var $questions;
	}
	$servername = "localhost";
	$username = "root";
	$password = "";
	$databasename = "question_system";
	$conn = new mysqli($servername,$username,$password,$databasename);
	
	$jsonResult = new JsonFile;
	$jsonResult->state = 0;
	$jsonResult->questions = Array();
	if($conn->connect_error){
		return json_encode($jsonResult);
	}
	
	$title_sql = "SELECT question_id,content FROM question;";
	$title_result = $conn->query($title_sql);
	$cnt = 0;
	if($title_result->num_rows > 0){
		while($title_row = $title_result->fetch_assoc()){
			++$cnt;
			$question = new Question;
			$question->question_id = $title_row["question_id"];
			$question->content = $title_row["content"];
			$question->options = Array();
			$pconn = new mysqli($servername,$username,$password,$databasename);
			if($pconn->connect_error){
				return json_encode($jsonResult);
				break;
			}
			else{
				$selection_sql = (string)"SELECT option_id_in_question,content FROM options where question_id=".(string)$cnt." order by option_id_in_question;";
				$selection_result = $pconn->query($selection_sql);
				$cnto=0;
				if($selection_result->num_rows > 0){
					while($selection_row = $selection_result->fetch_assoc()){
						++$cnto;
						$option = new Option;
						$option->option_id_in_question = $selection_row["option_id_in_question"];
						$option->content = $selection_row["content"];
						$question->options[$cnto]=$option;
					}
				}
			}
			$jsonResult->questions[$cnt] = $question;
			
		}
	}
	$jsonResult->state = 1;
	
	//testing
	/*
	foreach($jsonResult->questions as $question){
		echo (string)$question->question_id.".".$question->content."<br>";
		foreach($question->options as $option){
			echo (string)$option->option_id_in_question.". ".$option->content."<br>";
		}
		echo "<br>";
	}
	
	return json_encode($jsonResult);
	*/
	$conn->close();




?>