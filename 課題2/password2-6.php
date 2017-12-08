<?php
	$mode = $_POST['mode'];
	$num = $_POST['num'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>パスワードを入力するフォーム</title>
	<meta charset = "SHIFT_JIS">
</head>
<body>
	<h1>パスワード入力画面</h1>
	<fieldset>
	<form action="check2-6.php", method="post">
		<input type="hidden" name="mode" value="<?php echo $mode; ?>">
		<input type="hidden" name="num"  value="<?php echo $num;  ?>">
		パスワード:<input type="text" name="password"><br>
		<input type="submit" value="確認">
	</form>
	</fieldset>
</body>
</html>