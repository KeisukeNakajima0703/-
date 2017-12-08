<?php
	session_start();
	require_once("./util.php");
?>
<?php
	$errors = array();
	//名前入力チェック
	if(isset($_POST["name"]) && !empty($_POST["name"])){
		$name = htmlspecialchars($_POST["name"], ENT_QUOTES, "UTF-8");
	}else{
		$errors[] = "名前が未入力です";
	}
	//パスワード入力チェック
	if(isset($_POST["password"]) && !empty($_POST["password"])){
		$password = htmlspecialchars($_POST["password"], ENT_QUOTES, "UTF-8");
	}else{
		$errors[] = "パスワードが未入力です";
	}
	if(strlen($password) < 6){
		$errors[] = "パスワードが短いです";
	}
	
	//メールアドレスチェック
	if(isset($_POST["address"]) && !empty($_POST["address"])){
		$address = htmlspecialchars($_POST["address"], ENT_QUOTES, "UTF-8");
	}else{
		$errors[] = "メールアドレスが未入力です";
	}
	if(count($errors) == 0){
		$_SESSION["name"] = $name;
		$_SESSION["address"] = $address;
		$_SESSION["password"] = $password;
	}
?>
<!DOCTYPE>
<html>
	<head>
		<title>掲示板・登録情報確認</title>
		<meta charset = "UTF-8">
	</head>
	<body>
		<?php print_top_menu($_SESSION["login"]); ?>
		<?php if(count($errors) == 0): ?>
			以下の内容で登録します。<br>
			名前:<?= $_SESSION["name"]; ?><br>
			メールアドレス:<?= $_SESSION["address"]; ?><br>
			パスワード:<?= $_SESSION["password"]; ?><br>
			<input type="button" value = "戻る" onclick="location.href='entry.php'">
			<input type="button" value = "登録" onclick="location.href='registration.php'">
		<?php else: ?>
			<?php print_errors($errors); ?>
			<input type="button" value = "戻る" onclick="location.href='entry.php'">
		<?php endif ?>
	</body>
</html>
