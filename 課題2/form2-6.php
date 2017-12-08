<!DOCTYPE html>
<html>
<head>
	<title>スキルアップインターン用</title>
	<meta charset = "SHIFT_JIS">
</head>
<body>
	<h1>簡易掲示板</h1>
	<form action="receive2-6.php", method="post">
		<fieldset>
		名前:　　　<input type="text" name="name"><br>
		コメント:　<input type="text" name="comment"><br>
		パスワード:<input type="text" name="password"><br>
		<input type="submit" value="送信">
		</fieldset>
	</form>
	
	<fieldset>
	<form action="password2-6.php", method = "post">
		<input type="hidden" name="mode" value="1">
		コメント削除:(input number)<input type="text" name="num"><br>
		<input type="submit" value="削除">
	</form>
	
	<form action="password2-6.php", method = "post">
		<input type="hidden" name="mode" value="2">
		コメント編集:(input number)<input type="text" name="num"><br>
		<input type="submit" value="編集">
	</form>
	</fieldset>
	<?php
		$fileData = file('comments.txt');
		echo "投稿番号　", "名前　　　", "コメント　　　", "投稿時間　　　　　　　　　", "パスワード<br>";
		foreach($fileData as $line){
			$tmp = explode('<>', $line);
			foreach($tmp as $i => $value){
				echo $value, "　　　";
			}
			echo "<br>";
		}
	?>
</body>
</html>