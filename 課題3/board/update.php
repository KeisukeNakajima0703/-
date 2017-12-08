<?php
	session_start();
	require_once("../util.php");
	//データ取得
	$number = $_POST['number'];
	$comment = $_POST['comment'];
	$time = date('Y-m-d H:i:s');
	$pdo = createPDO();
	try{
		$sql = "update comments set comment = ?, time = ? where number = ?";
		$stm = $pdo->prepare($sql);
		$stm->execute(array($comment, $time, $number));
		
		}catch(PDOException $e){
			echo $e->getMessage();
			die();
		}	
	
	//リダイレクト
	header('location: ./board.php');
?>