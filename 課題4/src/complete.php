<?php
	require_once("./util.php");
	$id = $_GET["id"];
	$pdo = createPDO();
	
	try{		
		$sql = "update users set state = ? where id = ?";
		$stm = $pdo->prepare($sql);
		$stm->execute(array(true, $id));
	}catch(PDOException $e){
		echo $e->getMessage();
		die();
	}
?>
<?php
	$smarty =& getSmartyObj();
	$smarty->assign("signed", $_SESSION["login"]);
	$smarty->assign("id", $id);
	$smarty->display("complete.tpl");
?>