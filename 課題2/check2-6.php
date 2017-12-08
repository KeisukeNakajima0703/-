<?php

	$fileData = file('comments.txt');
	$mode = $_POST['mode'];
	$input_password = $_POST['password']."\n";
	$number = $_POST['num'];
	$answer_password;
	
	//指定番号のパスワードを取得
	foreach($fileData as $i => $line){
		$tmp = explode('<>', $line);
		if($tmp[0] == $number){
			$answer_password = $tmp[4];
			break;
		}
	}
	
	//入力したパスワードが一致した場合、モードによって処理をわける。
	if($input_password == $answer_password){
		if($mode == "1"){
			include('./delete2-6.php');
		}
		if($mode == "2"){
			include('./edit2-6.php');
		}
	}
?>
