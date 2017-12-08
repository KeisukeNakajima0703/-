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
<!DOCTYPE>
<html>
	<head>
		<title>掲示板・マイページ</title>
		<meta charset = "UTF-8">
	</head>
	<body>
		<?php print_top_menu($_SESSION["login"]); ?>
		<h2>マイページ</h2>
		こんにちは<?= $_SESSION["name"] ?>さん<br>
		掲示板は<a href="./board/board.php">こちら</a><br>
		<h3>プロフィール</h3>
		ID:<?= $result["id"]; ?><br>
		名前:<?= $result["name"]; ?><br>
		メールアドレス:<?= $result["address"]; ?><br>
		パスワード:<?= $result["password"]; ?><br>
		プロフィール編集<input type="button" value="編集" onclick="location.href='profile.php'">
	</body>
</html>