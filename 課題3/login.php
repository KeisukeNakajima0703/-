<?php
	session_start();
	require_once("./util.php");
?>
<!DOCTYPE>
<html>
	<head>
		<title>掲示板・ログインページ</title>
		<meta charset = "UTF-8">
	</head>
	<body>
		<?php print_top_menu($_SESSION["login"]); ?>
		<h2>ログイン画面</h2>
		<form action="certification.php" method="post">
			<label>ID:<input type="text" name="id"></label><br>
			<label>パスワード<input type="password" name="password"></label><br>
			<input type="submit" value="ログイン">
		</form>
	</body>
</html>