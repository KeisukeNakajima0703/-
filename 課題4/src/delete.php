<?php
	session_start();
	require_once("./util.php");
	$number = $_POST["number"];
	$pdo = createPDO();
	try{
		$sql = "delete from comments where number = ?";
		$stm = $pdo->prepare($sql);
		$stm->execute(array($number));
		
		$sql = "delete from medias where number = ?";
		$stm = $pdo->prepare($sql);
		$stm->execute(array($number));
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
	//リダイレクト
	header('location: ./board.php');
?>