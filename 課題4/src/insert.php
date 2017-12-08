<?php
	session_start();
	require_once("./util.php");
	if(isset($_POST['comment']) && !empty($_POST["comment"])){
		$comment = htmlspecialchars($_POST["comment"], ENT_QUOTES, "UTF-8");
	}else{
		header('location: ./error.php');
		exit();
	}
?>
<?php
	$pdo = createPDO();
	$time = date('Y-m-d H:i:s');
	$_SESSION["update"] = true;
	try{
		//名前とパスワード取り出し
		$sql = "select name, password from users where id = ?";
		$stm = $pdo->prepare($sql);
		$stm->execute(array($_SESSION["id"]));
		$result = $stm->fetch(PDO::FETCH_ASSOC);
		$name = $result["name"];
		$password = $result["password"];
		
		//データ挿入
		$sql = "insert into comments(name, comment, time, password) values(?, ?, ?, ?)";
		$stm = $pdo->prepare($sql);
		$stm->execute(array($name, $comment, $time, $password));
		
		//番号取得
		$sql = "select number from comments where time = ?";
		$stm = $pdo->prepare($sql);
		$stm->execute(array($time));
		$result = $stm->fetch(PDO::FETCH_ASSOC);
		$number = $result["number"];
	}catch(PDOException $e){
		echo $e->getMessage();
		die();
	}
	
	$options = array(
		'cacheDir'               => '/home/co-655.it.3919.com/public_html/CacheLite/tmp/',
		'caching'                => 'true', // キャッシュを有効に
		'automaticSerialization' => 'true', // 配列を保存可能に
		'lifeTime'               => 1800,   // 60*30（生存時間：30分）
		'automaticCleaningFactor' => 200,   // 自動で古いファイルを削除（1/200の確率で実行）
		'hashedDirectoryLevel'    => 1,     // ディレクトリ階層の深さ（高速になる）
	);
	
	$cache=new Cache_Lite($options);
	$cache->clean();
	
	//動画像の保存
	if(is_uploaded_file($_FILES["upfile"]["tmp_name"])){
		insertMedia($_FILES, $number);
	}
	//リダイレクト
	header('location: ./board.php');
?>
