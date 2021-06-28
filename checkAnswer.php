<?php
	include_once ("config.php");
	if (isset($_POST['data'])) {
		$jsonData = json_decode($_POST['data']);
		$jsonDataLength = count($jsonData);
		// 答案是否有效
		
		for ($i = 0; $i < $jsonDataLength; $i++) {
			if (!is_numeric($jsonData[$i] -> id) || !is_numeric($jsonData[$i] -> answer)) {
				echo "{\"code\":0,\"message\":\"答案格式不正确\"}";
				die();
			}
		}
		// 获取正确答案
		$rightAnswers = getRightAnswers($jsonData);
		// 给出分数,验证答案
		$rightNum = 0;
		for ($i = 0; $i < $jsonDataLength; $i++) {
			if ($jsonData[$i] -> answer == $rightAnswers[$i] -> rightAnswer) {
				$rightNum++;
			}
		}
		echo "{\"code\":1,\"message\":\"您的得分为：".(string)($rightNum)."/".(string)($jsonDataLength)."\"}";
		$GLOBALS['conn'] = null;
	}

	function getRightAnswers($jsonData) {
		$rightAnswers = Array();
		// 拼接题目id号，获取答案
		$questionIds = "";
		for ($i = 0; $i < count($jsonData); $i++) {
			$questionIds = $questionIds . $jsonData[$i] -> id . ",";
		}
		$questionIds = substr($questionIds, 0, -1);
		$sql = "select * from questions where id in (" . $questionIds . ");";
		$result = $GLOBALS['conn']->query($sql);
		$num = $result->rowCount($result);
		if ($num == 0) {
			echo "{\"code\":0,\"message\":\"网络错误\"}";
			$conn = null;
		}
		$tmpId = 0;
		$rightAnswerArray = Array();
		while ($rs = $result->fetch()) {
			$question = new StdClass;
			$question -> id = $rs["id"];
			$question -> rightAnswer = $rs["rightAnswer"];
			$question -> content = $rs["content"];
			if($rs["rightAnswer"] == "1"){
				$question -> rightAnswerContent = $rs["answer1"];
			}else if($rs["rightAnswer"] == "2"){
				$question -> rightAnswerContent = $rs["answer2"];
			}else if($rs["rightAnswer"] == "3"){
				$question -> rightAnswerContent = $rs["answer3"];
			}else if($rs["rightAnswer"] == "4"){
				$question -> rightAnswerContent = $rs["answer4"];
			}else if($rs["rightAnswer"] == "5"){
				$question -> rightAnswerContent = $rs["answer5"];
			}else if($rs["rightAnswer"] == "6"){
				$question -> rightAnswerContent = $rs["answer6"];
			}else if($rs["rightAnswer"] == "7"){
				$question -> rightAnswerContent = $rs["answer7"];
			}else if($rs["rightAnswer"] == "8"){
				$question -> rightAnswerContent = $rs["answer8"];
			}else{
				$question -> rightAnswerContent = "" ;
			}
			$rightAnswerArray[$tmpId] = $question;
			$tmpId++;
		}
		return $rightAnswerArray;
	}

?>
