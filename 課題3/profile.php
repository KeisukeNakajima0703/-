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
		<title>掲示板・トップページ</title>
		<meta charset = "UTF-8">
	</head>
	<body>
		<?php print_top_menu(isset($_SESSION["login"]));?>
		<h2>プロフィール編集</h2>
		<form action="p_update.php" method="post">
			<label>名前:<input type="text" name="name" value=<?= $result["name"]; ?>></label><br>
			<label>メールアドレス:<input type="email" name="address" value=<?= $result["address"]; ?>></label><br>
			<label>パスワード:<input type="password" name="password" value=<?= $result["password"]; ?>></label><br>
			<input type="submit" value="変更">
		</form>
		<input type="button" value="戻る" onclick="location.href='mypage.php'">
	</body>
</html>