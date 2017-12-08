<!DOCTYPE html>
<html>
	<head>
		<title>掲示板・ユーザ登録</title>
		<meta charset = "UTF-8">
		<link rel="stylesheet" type="text/css" href="./style.css">
		<meta name="viewport" content="width=device-width,initial-scale=1">
	</head>
	<body>
	<header>{include file="header.tpl" signed=$signed}</header>
	<h1>ユーザ登録画面</h1>
	<div class="form">
		<form action="confirm.php" method="post">
			<label>名前:<input type="text" name="name" size="20" required></label><br>
			<label>メールアドレス:<input type="email" name="address" size="40" required><label><br>
			<label>パスワード:<input type="password" name="password" size="20" required></label>※6文字以上<br>
			<input type="submit" value="登録">
			<input type="reset" value="リセット">
		</form>
	</div>
	<footer></footer>
</html>