<?php
	session_start();
	require_once("./util.php");
	$number = $_POST["number"];
	$pdo = createPDO();
	//データ取得
	try{
		$sql = "select * from comments where number = ?";
		$stm = $pdo->prepare($sql);
		$stm->execute(array($number));
		$result = $stm->fetch(PDO::FETCH_ASSOC);
		$comment = $result["comment"];
	}catch(PDOException $e){
		echo $e->getMessage();
		die();
	}
	
	$smarty =& getSmartyObj();
	$smarty->assign("number", $number);
	$smarty->assign("comment", $comment);
	$smarty->display("edit.tpl");
?>