<!DOCTYPE html>
<html>
<head>
<title>名前とコメントを入力するフォーム</title>
<meta charset = "SHIFT_JIS">
</head>
<body>

<form action="ex2-2.php", method="post">
	名前:　　<input type="text" name="name"><br>
	コメント:<input type="text" name="comment"><br>
	<input type="submit" value="送信">
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
