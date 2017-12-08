<?php
	//ファイル読み込み
	require_once("./BoardDB.php");
	
	//データ取得
	$editNumber = $_POST['number'];
	$dataBase = new BoardDB();
	$data = $dataBase->getData($editNumber);
?>

<!DOCTYPE html>
<html>
<head>
	<title>編集フォーム</title>
	<meta charset = "UTF-8">
</head>
<body>
	<form action="update.php", method="post">
		<input type="hidden" name="edit" value="<?php echo $editNumber; ?>"><br>
		<label>名前:　　　<input type="text" name="name" value="<?php echo $data['name']; ?>" ></label><br>
		<label>コメント:　<input type="text" name="comment" value="<?php echo $data['comment']; ?>"</label><br>
		<label>パスワード:<input type="text" name="password" value="<?php echo $data['password']; ?>"></label><br>
		<input type="submit" value="編集">
	</form>
</body>
</html>