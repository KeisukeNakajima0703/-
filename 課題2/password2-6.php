<?php
	$mode = $_POST['mode'];
	$num = $_POST['num'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>�p�X���[�h����͂���t�H�[��</title>
	<meta charset = "SHIFT_JIS">
</head>
<body>
	<h1>�p�X���[�h���͉��</h1>
	<fieldset>
	<form action="check2-6.php", method="post">
		<input type="hidden" name="mode" value="<?php echo $mode; ?>">
		<input type="hidden" name="num"  value="<?php echo $num;  ?>">
		�p�X���[�h:<input type="text" name="password"><br>
		<input type="submit" value="�m�F">
	</form>
	</fieldset>
</body>
</html>