<?php
	include_once ("config.php");

	$questionIdArray = getRandomQuestionId($v_question_count, $v_question_select_num);
	$questionIdStr = arrayToStr($questionIdArray);
	$questionsJson = getQuestionJson($questionIdStr);
	echo $questionsJson;

	// 获取随机题目id,countId为id总数，no为随机n道题目。
	function getRandomQuestionId($CountId, $no) {
		$numbers = range(1, $CountId);
		//shuffle 将数组顺序随即打乱
		shuffle($numbers);
		$result = array_slice($numbers, 0, $no);
		return $result;
	}

	// 将array形式转化为字符串
	function arrayToStr($questionIdArray) {
		$questionIdStr = "";
		for ($i = 0; $i < count($questionIdArray); $i++) {
			$questionIdStr = $questionIdStr . strval($questionIdArray[$i]) . ",";
		}
		return substr($questionIdStr, 0, -1);
	}

	// 获取问题的详细数据，返回json格式
	function getQuestionJson($questionIdStr) {
		//echo $questionIdStr."<br>";
		$sql = "select * from questions where id in (" . $questionIdStr . ");";
		//echo $sql."<br>";
		$result = $GLOBALS['conn']->query($sql);
		//echo "??";
		$num = $result->rowCount();
		if ($num == 0) {
			echo "网络错误！";
			$conn = null;
		}
		$tmpId = 0;
		$questionsArray = Array();
		while ($rs = $result->fetch()) {
			$question = new StdClass;
			$question -> id = $rs["id"];
			$question -> content = $rs["content"];
			$question -> answer1 = $rs["answer1"];
			$question -> answer2 = $rs["answer2"];
			$question -> answer3 = $rs["answer3"];
			$question -> answer4 = $rs["answer4"];
			$question -> answer5 = $rs["answer5"];
			$question -> answer6 = $rs["answer6"];
			$question -> answer7 = $rs["answer7"];
			$question -> answer8 = $rs["answer8"];
			$questionsArray[$tmpId] = $question;
			$tmpId++;
		}
		$questionsJson = json_encode($questionsArray);
		$GLOBALS['conn'] = null;
		return $questionsJson;
	}

?>
