<?php
	//ファイル読み込み
	require_once("./BoardDB.php");
	
	//データ取得
	$editNumber = $_POST['edit'];
	$name = $_POST['name'];
	$comment = $_POST['comment'];
	$time = date('Y-m-d H:i:s');
	$password = $_POST['password'];
	
	//データ更新
	$dataBase = new BoardDB();
	$dataBase->update($editNumber, $name, $comment, $time, $password);
	
	//リダイレクト
	header('location: ./board.php');
?>