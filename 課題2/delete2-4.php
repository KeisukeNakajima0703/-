<?php
	$deleteNumber = $_POST['delete'];
	$fileData = file('comments.txt');
	$result = NULL;
	
	foreach($fileData as $num => $line){
		$tmp = explode('<>', $line);
		if($tmp[0] == $deleteNumber){
			$result .=$tmp[0]."<>�Ԃ̃R�����g���폜���܂����B\n";
		}else{
			$result .= $line;
		}
	}
	file_put_contents('comments.txt', $result);
	//���_�C���N�g
	header('location: ./form2-4.php');
	exit();
?>
