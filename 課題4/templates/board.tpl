<!DOCTYPE html>
<html>
<head>
	<title>掲示板・掲示板</title>
	<meta charset = "UTF-8">
	<link rel="stylesheet" type="text/css" href="./style.css">
	<meta name="viewport" content="width=device-width,initial-scale=1">
</head>
<body>
	<header>{include file="header.tpl" signed=$signed}</header>
	<div class="form">
		<form action="insert.php", method="post" enctype="multipart/form-data">
			コメント:　<br>
			<textarea name="comment" rows="5" cols="40" placeholder="コメントを入力してください"></textarea><br>
			<label>画像または動画: <input type="file" name="upfile"></label><br>
			<input type="submit" value="送信">
		</form>
	</div>
	{foreach from=$comments item=row}
	<div class="comment_rupper">
	<div class="comment_info">
		番号:{$row.number}
		名前:{$row.name}
		投稿時間{$row.time}
	</div>
	<div class="comment">{$row.comment}</div>
		{foreach from=$medias item=value}
			{if $row.number != $value.number} {continue} {/if}
			{if $value.extension == "png" || $value.extension == "gif" || $value.extension == "jpg"}
				<div class="media"><img src=contents.php?number={$value.number}></div>
			{else}
				<div class="media"><video src=contents.php?number={$value.number}></div>
			{/if}
		{/foreach}
		{if $password == $row.password}
		<div class="btn">
			<form action='delete.php' method='post'>
				<input type='hidden' name = 'number' value = {$row.number}>
				<input type='submit' value = '削除'>
			</form>
			<form action='edit.php' method='post'>
				<input type='hidden' name = 'number' value = {$row.number}>
				<input type='submit' value = '編集'><br>
			</form>
		</div>
		{/if}
	</div>
	{/foreach}
	<footer></footer>
</body>
</html>