<!DOCTYPE html>
<html>
	<head>
		<title>掲示板・登録情報確認</title>
		<meta charset = "UTF-8">
		<link rel="stylesheet" type="text/css" href="./style.css">
		<meta name="viewport" content="width=device-width,initial-scale=1">
	</head>
	<body>
	<header>{include file="header.tpl" signed=$signed}</header>
		<h2>以下の内容で登録します。</h2>
		<ul>
			<li>名前:{$name}</li>
			<li>メールアドレス{$address}</li>
			<li>パスワード:{$password}</li>
		</ul>
		<input type="button" value = "戻る" onclick="location.href='entry.php'">
		<input type="button" value = "登録" onclick="location.href='registration.php'">
	<footer></footer>
	</body>
</html>