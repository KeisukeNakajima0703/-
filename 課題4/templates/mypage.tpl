<!DOCTYPE html>
<html>
	<head>
		<title>掲示板・マイページ</title>
		<meta charset = "UTF-8">
		<link rel="stylesheet" type="text/css" href="./style.css">
		<meta name="viewport" content="width=device-width,initial-scale=1">
	</head>
	<body>
	<header>{include file="header.tpl" signed=$signed}</header>
		<h2>マイページ</h2>
		こんにちは{$profile.name}さん<br>
		掲示板は<a href="./board.php">こちら</a><br>
		<h3>プロフィール</h3>
		ID:{$profile.id}<br>
		名前:{$profile.name}<br>
		メールアドレス:{$profile.address}<br>
		パスワード:{$profile.password}<br>
		プロフィール編集<input type="button" value="編集" onclick="location.href='profile.php'">
	<footer></footer>
	</body>
</html>