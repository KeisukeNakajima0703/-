<!DOCTYPE html>
<html>
<head>
<title>���O�ƃR�����g����͂���t�H�[��</title>
<meta charset = "SHIFT_JIS">
</head>
<body>

<form action="ex2-2.php", method="post">
	���O:�@�@<input type="text" name="name"><br>
	�R�����g:<input type="text" name="comment"><br>
	<input type="submit" value="���M">
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
