<?php
	session_start();
	require_once("./util.php");
?>
<?php
	$id = $_SESSION["id"];
	$name = $_POST["name"];
	$address = $_POST["address"];
	$password = $_POST["password"];
?>
<?php
	$pdo = createPDO();
	try{
		$sql = "update users set name = ?, address = ?, password = ? where id = ?";
		$stm = $pdo->prepare($sql);
		$stm->execute(array($name, $address, $password, $id));
	}catch(PDOException $e){
		echo $e->getMessage();
		die();
	}
	header("location:./mypage.php");
?>