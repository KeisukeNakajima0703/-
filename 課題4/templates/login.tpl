<!DOCTYPE html>
<html>
	<head>
		<title>掲示板・ログインページ</title>
		<meta charset = "UTF-8">
		<link rel="stylesheet" type="text/css" href="./style.css">
		<meta name="viewport" content="width=device-width,initial-scale=1">
	</head>
	<body>
	<header>{include file="header.tpl" signed=$signed}</header>
		<h2>ログイン画面</h2>
	<div class="form">
		<form action="certification.php" method="post">
			<label>ID:<input type="text" name="id" required></label><br>
			<label>パスワード<input type="password" name="password" required></label><br>
			<input type="submit" value="ログイン">
		</form>
	</div>
	<footer></footer>
	</body>
</html>