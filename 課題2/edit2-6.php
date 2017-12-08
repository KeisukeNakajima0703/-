<?php
	$editNumber = $_POST['num'];
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
	<title>編集フォーム</title>
	<meta charset = "SHIFT_JIS">
</head>
<body>
	<form action="last2-6.php", method="post">
		<input type="hidden" name="edit" value="<?php echo $editNumber; ?>"><br>
		名前:　　　<input type="text" name="name" value="<?php echo $target[1]; ?>" ><br>
		コメント:　<input type="text" name="comment" value="<?php echo $target[2]; ?>"<br>
		パスワード:<input type="text" name="password" value="<?php echo $target[4]; ?>"><br>
		<input type="submit" value="編集">
	</form>
</body>
</html>
