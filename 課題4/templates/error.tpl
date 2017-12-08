<!DOCTYPE html>
<html>
	<head>
		<title>掲示板・エラー情報確認</title>
		<meta charset = "UTF-8">
		<link rel="stylesheet" type="text/css" href="./style.css">
		<meta name="viewport" content="width=device-width,initial-scale=1">
	</head>
	<body>
	<header>{include file="header.tpl" signed=$signed}</header>
		<h2>以下のエラーが発生しました</h2>
		{foreach from=$errors item=error}
			<li>{$error}</li>
		{/foreach}
		<input type="button" value = "戻る" onclick="location.href='{$url}'">
	<footer></footer>
	</body>
</html>