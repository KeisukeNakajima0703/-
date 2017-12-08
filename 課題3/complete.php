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
<!DOCTYPE>
<html>
	<head>
		<title>掲示板・登録完了</title>
		<meta charset = "UTF-8">
	</head>
	<body>
		<?php print_top_menu($_SESSION["login"]);?>
		本登録が完了しました。<br>
		ID:<?= $id; ?><br>
		ログインページは<a href="login.php">こちら</a><br>
	</body>
</html>