<?php
	require_once("./util.php");
	$number = $_GET["number"];
	$pdo = createPDO();
	try{
		$sql = "select contents, extension from medias where number = ?";
		$stm = $pdo->prepare($sql);
		$stm->execute(array($number));
		$result = $stm->fetch(PDO::FETCH_ASSOC);
	}catch(PDOException $e){
		echo $e->getMessage();
		die();
	}
	$contents = $result["contents"];
	$extension = $result["exntension"];
	
	if($extension == "jpg" || $extension == "png" || $extension == "gif"){
		header("Content-type:image/jpg");
	}else{
		header("Content-type:video/mp4");
	}
	echo $contents;
	
?>