<?php
	//�p�����[�^
	$user = 'co-655.it.3919.c';
	$password = 'm8HbkigHk7';
	$host = 'localhost';
	$dbName = 'co_655_it_3919_com';
	$dsn = "mysql:dbname={$dbName};host={$host}";
	
	try{
		//�f�[�^�x�[�X�ڑ�
		$pdo = new PDO($dsn, $user, $password);
		$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		//�f�[�^�ҏW
		$sql = "update sample set neme=\"bbb\" where age = 1";
		$result = $pdo->query($sql);
		if($result){
			echo "�ҏW����";
		}else{
			echo "�ҏW���s";
		}

		
	}catch(PDOException $e){
		echo "error<br>", $e->getMessage();
	}

?>
