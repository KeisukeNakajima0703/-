<?php
	session_start();
	require_once("../util.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>掲示板・掲示板</title>
	<meta charset = "UTF-8">
</head>
<body>
	{include file="header.tpl" signed=$signed}
	<form action="insert.php", method="post" enctype="multipart/form-data">
		コメント:　<br>
		<textarea name="comment" rows="5" cols="40" placeholder="コメントを入力してください"></textarea><br>
		<label>画像または動画: <input type="file" name="upfile"></label><br>
		<input type="submit" value="送信">
	</form>
	<?php
		$pdo = createPDO();
		try{
			//メディアコンテンツ取り出し
			$stm = $pdo->query("select * from medias");
			$medias = $stm->fetchAll(PDO::FETCH_ASSOC);
			
			//ユーザパスワード取り出し
			$sql = "select password from users where id = ?";
			$stm = $pdo->prepare($sql);
			$stm->execute(array($_SESSION["id"]));
			$result = $stm->fetch(PDO::FETCH_ASSOC);
			$password = $result["password"];
			
			//コメント情報取り出し
			$stm = $pdo->query("select * from comments order by number");
			$result = $stm->fetchAll(PDO::FETCH_ASSOC);
		
			print_comments($result, $password, $medias);
		}catch(PDOException $e){
			echo $e->getMessage();
			die();
		}
	?>
</body>
</html>