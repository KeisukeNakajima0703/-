<?php
	$isError = false;
	if(isset($_POST['name'], $_POST['comment'], $_POST['password'])){
		if($_POST['name']==="" || $_POST['comment']==="" || $_POST['password']===""){
			$isError = true;
		}
	}else{
		$isError = true;
	}
	if($isError){
		header('location: ./error.php');
		exit();
	}
?>
<?php
	//ファイル読み込み
	require_once("./BoardDB.php");
	
	//名前、コメント、時間, パスワード
	$name = $_POST['name'];
	$comment = $_POST['comment'];
	$time = date('Y-m-d H:i:s');
	$password = $_POST['password'];
	
	//データベース接続、データ追加
	$dataBase = new BoardDB();
	$dataBase->insert($name, $comment, $time, $password);
	
	//リダイレクト
	header('location: ./board.php');
?>
