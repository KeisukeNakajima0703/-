<!DOCTYPE html>
<html>
<head>
	<title>�X�L���A�b�v�C���^�[���p</title>
	<meta charset = "SHIFT_JIS">
</head>
<body>
	<h1>�ȈՌf����</h1>
	<form action="receive2-6.php", method="post">
		<fieldset>
		���O:�@�@�@<input type="text" name="name"><br>
		�R�����g:�@<input type="text" name="comment"><br>
		�p�X���[�h:<input type="text" name="password"><br>
		<input type="submit" value="���M">
		</fieldset>
	</form>
	
	<fieldset>
	<form action="password2-6.php", method = "post">
		<input type="hidden" name="mode" value="1">
		�R�����g�폜:(input number)<input type="text" name="num"><br>
		<input type="submit" value="�폜">
	</form>
	
	<form action="password2-6.php", method = "post">
		<input type="hidden" name="mode" value="2">
		�R�����g�ҏW:(input number)<input type="text" name="num"><br>
		<input type="submit" value="�ҏW">
	</form>
	</fieldset>
	<?php
		$fileData = file('comments.txt');
		echo "���e�ԍ��@", "���O�@�@�@", "�R�����g�@�@�@", "���e���ԁ@�@�@�@�@�@�@�@�@", "�p�X���[�h<br>";
		foreach($fileData as $line){
			$tmp = explode('<>', $line);
			foreach($tmp as $i => $value){
				echo $value, "�@�@�@";
			}
			echo "<br>";
		}
	?>
</body>
</html>