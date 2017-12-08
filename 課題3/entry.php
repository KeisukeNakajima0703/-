<?php 
	session_start();
	require_once("./util.php");
?>
<!DOCTYPE>
<html>
	<head>
		<title>掲示板・ユーザ登録</title>
		<meta charset = "UTF-8">
	</head>
	<body>
		<?php print_top_menu($_SESSION["login"]); ?>
		<h2>ユーザ登録画面</h2>
		<form action="confirm.php" method="post">
			<label>名前:<input type="text" name="name" size="20" required></label><br>
			<label>メールアドレス:<input type="email" name="address" size="40" required><label><br>
			<label>パスワード:<input type="password" name="password" size="20" required></label>※6文字以上<br>
			<input type="submit" value="登録">
			<input type="reset" value="リセット">
		</form>
</html>