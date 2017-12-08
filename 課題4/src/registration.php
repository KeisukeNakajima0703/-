<?php
	session_start();
	require_once("./util.php");
?>
<?php
	$name = $_SESSION["name"];
	$address = $_SESSION["address"];
	$password = $_SESSION["password"];
	
	$pdo = createPDO();
	$id = createID($pdo);
	try{
		//ユーザ登録
		$sql = "insert into users(name, address, id, password, state) value(?, ?, ?, ?, ?)";
		$stm = $pdo->prepare($sql);
		$stm->execute(array($name, $address, $id, $password, false));
	}catch(PDOException $e){
		echo $e->getMessage();
		die();
	}
?>
<?php
	//$my_address = "grape.green0703@gmail.com";
	$url = "http://co-655.99sv-coco.com/kadai4/html/complete.php";
	$subject = "本登録のご案内";
	//$header = "From: {$my_address}\nReply-To: {$my_address}";
	$body = "このメールアドレスから仮登録が行われました\n
	以下のurlから本登録をお願いします\n
	{$url}?id={$id}\n
	あなたの情報は\n
	名前:{$name}\n
	ID:{$id}\n
	パスワード:{$password}";
	
	mb_language("Japanese");
	mb_internal_encoding("UTF-8");
	mb_send_mail($address, $subject, $body);
?>
<?php
	$smarty =& getSmartyObj();
	$smarty->assign("signed", $_SESSION["login"]);
	$smarty->display("registration.tpl");
?>