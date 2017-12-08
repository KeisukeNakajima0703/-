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
		
		//データ挿入
		$sql = "insert into sample(age, name) values(1, \"aaa\")";
		$stm = $pdo->prepare($sql);
		$result = $stm->execute();
		if($result){
			echo "挿入成功";
		}else{
			echo "挿入失敗";
		}
		$pdo=null;
	}catch(PDOException $e){
		echo "error<br>", $e->getMessage();
	}

?>
