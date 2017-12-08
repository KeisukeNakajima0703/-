<!DOCTYPE html>
<html>
	<head>
		<title>掲示板・プロフィール編集フォーム</title>
		<meta charset = "UTF-8">
		<link rel="stylesheet" type="text/css" href="./style.css">
		<meta name="viewport" content="width=device-width,initial-scale=1">
	</head>
	<body>
	<header>{include file="header.tpl" signed=$signed}</header>
		<h2>プロフィール編集</h2>
	<div class="form">
		<form action="p_update.php" method="post">
			<label>名前:<input type="text" name="name" value={$profile.name}></label><br>
			<label>メールアドレス:<input type="email" name="address" value={$profile.address}></label><br>
			<label>パスワード:<input type="password" name="password" value={$profile.password}></label><br>
			<input type="submit" value="変更">
		</form>
		<input type="button" value="戻る" onclick="location.href='mypage.php'">
	</div>
	<footer></footer>
	</body>
</html>