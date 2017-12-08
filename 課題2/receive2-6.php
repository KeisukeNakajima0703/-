<?php	
	//ファイルを読み込んでコメント数を保存
	$fileName = 'comments.txt';
	$fileData = file($fileName);
	$number = count($fileData) + 1;

	//名前、コメント、時間
	$name = $_POST['name'];
	$comment = $_POST['comment'];
	$time = date('Y-m-d H時i分s秒');
	$pass = $_POST['password'];
	
	//ファイルに保存
	file_put_contents($fileName, $number."<>".$name."<>".$comment."<>".$time."<>".$pass."\n", FILE_APPEND);

	//リダイレクト
	header('location: ./form2-6.php');
?>