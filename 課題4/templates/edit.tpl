<!DOCTYPE html>
<html>
<head>
	<title>編集フォーム</title>
	<meta charset = "UTF-8">
</head>
<body>
	<form action="update.php", method="post">
		<input type="hidden" name="number" value={$number}><br>
		コメント:　<br>
		<textarea name="comment" rows="5" cols="40">{$comment}</textarea><br>
		<input type="submit" value="編集">
	</form>
</body>
</html>