<?php
	session_start();
	require_once("../util.php");
	$number = $_POST["number"];
	$pdo = createPDO();
	try{
		$sql = "delete from comments where number = ?";
		$stm = $pdo->prepare($sql);
		$stm->execute(array($number));
		
		$sql = "delete from medias where number = ?";
		$stm = $pdo->prepare($sql);
		$stm->execute(array($number));
	}catch(PDOException $e){
		echo $e->getMessage();
		die();
	}
	//リダイレクト
	header('location: ./board.php');
?>