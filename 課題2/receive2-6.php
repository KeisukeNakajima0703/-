<?php	
	//�t�@�C����ǂݍ���ŃR�����g����ۑ�
	$fileName = 'comments.txt';
	$fileData = file($fileName);
	$number = count($fileData) + 1;

	//���O�A�R�����g�A����
	$name = $_POST['name'];
	$comment = $_POST['comment'];
	$time = date('Y-m-d H��i��s�b');
	$pass = $_POST['password'];
	
	//�t�@�C���ɕۑ�
	file_put_contents($fileName, $number."<>".$name."<>".$comment."<>".$time."<>".$pass."\n", FILE_APPEND);

	//���_�C���N�g
	header('location: ./form2-6.php');
?>