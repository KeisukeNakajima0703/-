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
		
		//�f�[�^�폜
		$sql = "delete from sample where age = 1";
		$result = $pdo->query($sql);
		if($result){
			echo "�폜����";
		}else{
			echo "�폜���s";
		}

		
	}catch(PDOException $e){
		echo "error<br>", $e->getMessage();
	}

?>
