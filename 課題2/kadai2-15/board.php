<!DOCTYPE html>
<html>
<head>
	<title>スキルアップインターン用</title>
	<meta charset = "UTF-8">
</head>
<body>
	<h1>簡易掲示板</h1>
	<form action="insert.php", method="post">
		<fieldset>
		<label>名前:　　　<input type="text" name="name"></label><br>
		<label>コメント:　<input type="text" name="comment"></label><br>
		<label>パスワード:<input type="text" name="password"></label><br>
		<input type="submit" value="送信">
		</fieldset>
	</form>
	
	<fieldset>
	<form action="password.php", method = "post">
		<input type="hidden" name="mode" value="1">
		<label>コメント削除:(input number)<input type="number" name="number"></label><br>
		<input type="submit" value="削除">
	</form>
	
	<form action="password.php", method = "post">
		<input type="hidden" name="mode" value="2">
		<label>コメント編集:(input number)<input type="number" name="number"></label><br>
		<input type="submit" value="編集">
	</form>
	</fieldset>
	
	<?php
		require_once("./BoardDB.php");
		$dataBase = new BoardDB();
		$dataBase->print_data();
	?>
</body>
</html>