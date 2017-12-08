<?php
	//ファイル読み込み
	require_once("./BoardDB.php");
	
	//データ取得
	$deleteNumber = $_POST['number'];
	
	//データ削除
	$dataBase = new BoardDB();
	$dataBase->delete($deleteNumber);
	
	//リダイレクト
	header('location: ./board.php');
?>