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
		
		//�f�[�^�}��
		$sql = "insert into sample(age, name) values(1, \"aaa\")";
		$stm = $pdo->prepare($sql);
		$result = $stm->execute();
		if($result){
			echo "�}������";
		}else{
			echo "�}�����s";
		}
		$pdo=null;
	}catch(PDOException $e){
		echo "error<br>", $e->getMessage();
	}

?>
