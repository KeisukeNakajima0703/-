<?php
	$editNumber = $_POST['edit'];
	$fileData = file('comments.txt');
	$target;
	
	foreach($fileData as $num => $line){
		$tmp = explode('<>', $line);
		if($tmp[0] == $editNumber){
			$target = $tmp;
			break;
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>�ҏW�t�H�[��</title>
	<meta charset = "SHIFT_JIS">
</head>
<body>
	<form action="last2-5.php", method="post">
		<input type="hidden" name="edit" value="<?php echo $editNumber; ?>"><br>
		���O:�@�@<input type="text" name="name" value="<?php echo $target[1]; ?>" ><br>
		�R�����g:<input type="text" name="comment" value="<?php echo $target[2]; ?>"<br>
		<input type="submit" value="�ҏW">
	</form>
</body>
</html>
