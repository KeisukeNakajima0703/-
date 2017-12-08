<?php
	//パラメータ
	$user = 'co-655.it.3919.c';
	$password = 'm8HbkigHk7';
	$host = 'localhost';
	$dbName = 'co_655_it_3919_com';
	$dsn = "mysql:dbname={$dbName};host={$host}";
	
	try{
		//データベース接続
		$pdo = new PDO($dsn, $user, $password);
		$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		//テーブル内のデータ表示
		$stm = $pdo->query("show create table sample");
		$result = $stm->fetch(PDO::FETCH_ASSOC);
		echo $result;
		$pdo=null;
	}catch(PDOException $e){
		echo "error<br>", $e->getMessage();
	}

?>
