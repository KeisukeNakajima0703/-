<?php
	$editNumber = $_POST['edit'];
	$name = $_POST['name'];
	$comment = $_POST['comment'];
	$password = $_POST['password'];
	$time = date('Y-m-d HŽži•ªs•b');
	
	$fileData = file('comments.txt');
	$result;
	
	foreach($fileData as $num => $line){
		$tmp = explode('<>', $line);
		if($tmp[0] == $editNumber){
			$result .= ($editNumber."<>".$name."<>".$comment."<>".$time."<>".$password."\n");
		}else{
			$result .= $line;
		}
	}
	
	file_put_contents('comments.txt', $result);
	
	header('location: ./form2-6.php');
	exit();
?>