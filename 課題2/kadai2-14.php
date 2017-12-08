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
		
		//データ削除
		$sql = "delete from sample where age = 1";
		$result = $pdo->query($sql);
		if($result){
			echo "削除完了";
		}else{
			echo "削除失敗";
		}

		
	}catch(PDOException $e){
		echo "error<br>", $e->getMessage();
	}

?>
