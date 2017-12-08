<?php
	session_start();
	require_once("./util.php");
	
	$cache_id =  $_SESSION["id"]."board";
	$options = array(
		'cacheDir'               => '/home/co-655.it.3919.com/public_html/CacheLite/tmp/',
		'caching'                => 'true', // キャッシュを有効に
		'automaticSerialization' => 'true', // 配列を保存可能に
		'lifeTime'               => 1800,   // 60*30（生存時間：30分）
		'automaticCleaningFactor' => 200,   // 自動で古いファイルを削除（1/200の確率で実行）
		'hashedDirectoryLevel'    => 1,     // ディレクトリ階層の深さ（高速になる）
	);
	
	$cache=new Cache_Lite($options); 
	// キャッシュデータがあるかどうかの判別
	if( $cache_data=$cache->get($cache_id)){
		$result = $cache_data["result"];
		$password = $cache_data["password"];
		$medias = $cache_data["medias"];
	}else{
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
		}catch(PDOException $e){
			echo $e->getMessage();
			die();
		}
		$buff = array(
			"result" => $result,
			"password" => $password,
			"medias" => $medias
		);
		$cache->save($buff, $cache_id);
	}

	$smarty =& getSmartyObj();
	$smarty->assign("signed", $_SESSION["login"]);
	$smarty->assign("comments", $result);
	$smarty->assign("password", $password);
	$smarty->assign("medias", $medias);
	$smarty->display("board.tpl");
?>