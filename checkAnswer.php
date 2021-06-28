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
	$wrongNum = 0;
	
	for ($i = 0; $i < $jsonDataLength; $i++) {
		//var_dump(std_class_object_to_array($jsonData[$i])["id"]);
		if ($jsonData[$i] -> answer == $rightAnswers[$i] -> rightAnswer) {
			$rightNum++;
		} else {
			$wrongNum++;
		}
	}
	echo "{\"code\":0,\"message\":\"您的得分为：".(string)($rightNum)."/".(string)($jsonDataLength)."\"}";
/*
	// 返回不同的HTML样式
	if ($wrongNum == 0) {
		echo "{\"code\":1,\"message\":\"\"}";
	}
	else{
		// 拼接错误信息
		$message = "";
		for ($i = 0; $i < $jsonDataLength; $i++) {
			if ($jsonData[$i] -> answer != $rightAnswers[$i] -> rightAnswer) {
				$message = $message . "题目：". $rightAnswers[$i]->content."<br/>正确答案：".$rightAnswers[$i] -> rightAnswerContent."<br/>";
			}
		}
		echo "{\"code\":0,\"message\":\"".$message."\"}";
	}
*/
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

// guid 生成算法
function guid() {
	if (function_exists('com_create_guid')) {
		return com_create_guid();
	} else {
		mt_srand((double)microtime() * 10000);
		//optional for php 4.2.0 and up.
		$charid = strtoupper(md5(uniqid(rand(), true)));
		$hyphen = chr(45);
		$uuid = substr($charid, 0, 8) . $hyphen . substr($charid, 8, 4) . $hyphen . substr($charid, 12, 4) . $hyphen . substr($charid, 16, 4) . $hyphen . substr($charid, 20, 12);
		return $uuid;
	}
}

//function std_class_object_to_array($stdclassobject) {
//	$_array = is_object($stdclassobject) ? get_object_vars($stdclassobject) : $stdclassobject;
//	foreach ($_array as $key => $value) {
//		$value = (is_array($value) || is_object($value)) ? std_class_object_to_array($value) : $value;
//		$array[$key] = $value;
//	}
//	return $array;
//}
?>
