<?php
	//パラメータ
	$user = 'co-655.it.3919.c';
	$password = 'm8HbkigHk7';
	$host = 'localhost';
	$dbName = 'co_655_it_3919_com';
	$dsn = "mysql:dbname={$dbName};host={$host}";
	
	try{
		$pdo = new PDO($dsn, $user, $password);
		$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$table_stm = "create table if not exists {$dbName}.sample(age int, name varchar(10))";
		$tmp = $pdo->prepare($table_stm);
		$tmp->execute();
		echo "テーブルsampleを作成しました。";
		$pdo=null;
	}catch(PDOException $e){
		echo "error<br>", $e->getMessage();
	}
?>
