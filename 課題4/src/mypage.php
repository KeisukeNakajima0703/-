<?php
	session_start();
	require_once("./util.php");
?>
<?php
	$pdo = createPDO();
	try{
		$sql = "select * from users where id = ?";
		$stm = $pdo->prepare($sql);
		$stm->execute(array($_SESSION["id"]));
		$result = $stm->fetch(PDO::FETCH_ASSOC);
	}catch(PDOException $e){
		echo $e->getMessage();
		die();
	}
?>
<?php
	$smarty =& getSmartyObj();
	$smarty->assign("signed", $_SESSION["login"]);
	$smarty->assign("profile", $result);
	$smarty->display("mypage.tpl");
?>