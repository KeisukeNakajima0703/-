<?php
	//ファイル読み込み
	require_once("./BoardDB.php");
	
	//データ取得
	$mode = $_POST['mode'];
	$number = $_POST['number'];
	$input_password = $_POST['password'];
	$dataBase = new BoardDB();
	$answer_password = $dataBase->getPassword($number);
	
	//入力したパスワードが一致した場合、モードによって処理をわける。
	if($input_password == $answer_password){
		switch($mode){
		case "1":
			require_once("./delete.php");
			break;
		case "2":
			require_once("./edit.php");
		}
	}else{
		header('location: ./error.php');
	}
?>
