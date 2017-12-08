<?php
	$mode = $_POST['mode'];
	$num = $_POST['number'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>パスワード入力フォーム</title>
	<meta charset = "UTF-8">
</head>
<body>
	<h1>パスワード入力画面</h1>
	<fieldset>
	<form action="certification.php", method="post">
		<input type="hidden" name="mode" value="<?php echo $mode; ?>">
		<input type="hidden" name="number"  value="<?php echo $num;  ?>">
		パスワード:<input type="text" name="password"><br>
		<input type="submit" value="確認">
	</form>
	</fieldset>
</body>
</html>