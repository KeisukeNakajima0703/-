<?php
	$deleteNumber = $_POST['delete'];
	$fileData = file('comments.txt');
	$result = NULL;
	
	foreach($fileData as $num => $line){
		$tmp = explode('<>', $line);
		if($tmp[0] == $deleteNumber){
			$result .=$tmp[0]."<>番のコメントを削除しました。\n";
		}else{
			$result .= $line;
		}
	}
	file_put_contents('comments.txt', $result);
	//リダイレクト
	header('location: ./form2-4.php');
	exit();
?>
