<?php
	session_start();
	require_once("../util.php");
	$number = $_POST["number"];
	$pdo = createPDO();
	//データ取得
	try{
		$sql = "select * from comments where number = ?";
		$stm = $pdo->prepare($sql);
		$stm->execute(array($number));
		$result = $stm->fetch(PDO::FETCH_ASSOC);
		$comment = $result["comment"];
	}catch(PDOException $e){
		echo $e->getMessage();
		die();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>編集フォーム</title>
	<meta charset = "UTF-8">
</head>
<body>
	<form action="update.php", method="post">
		<input type="hidden" name="number" value="<?= $number; ?>"><br>
		コメント:　<br>
		<textarea name="comment" rows="5" cols="40"><?= $comment; ?></textarea><br>
		<input type="submit" value="編集">
	</form>
</body>
</html>