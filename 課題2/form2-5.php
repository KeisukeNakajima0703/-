<!DOCTYPE html>
<html>
<head>
	<title>���O�ƃR�����g����͂���t�H�[��</title>
	<meta charset = "SHIFT_JIS">
</head>
<body>
	<form action="receive2-5.php", method="post">
		���O:�@�@<input type="text" name="name"><br>
		�R�����g:<input type="text" name="comment"><br>
		<input type="submit" value="���M">
	</form>
	<form action="delete2-5.php", method = "post">
		�R�����g�폜:<input type="text" name="delete"><br>
		<input type="submit" value="�폜">
	</form>
	<form action="edit2-5.php", method = "post">
		�R�����g�ҏW:<input type="text" name="edit"><br>
		<input type="submit" value="�ҏW">
	</form>
	<?php
		$fileData = file('comments.txt');
		foreach($fileData as $lineNum => $line){
			$tmp = explode('<>', $line);
			foreach($tmp as $i => $value){
				echo $value, "/";
			}
			echo "<br>";
		}
	?>
</body>
</html>
