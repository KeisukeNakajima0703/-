<?php

	$fileData = file('comments.txt');
	$mode = $_POST['mode'];
	$input_password = $_POST['password']."\n";
	$number = $_POST['num'];
	$answer_password;
	
	//�w��ԍ��̃p�X���[�h���擾
	foreach($fileData as $i => $line){
		$tmp = explode('<>', $line);
		if($tmp[0] == $number){
			$answer_password = $tmp[4];
			break;
		}
	}
	
	//���͂����p�X���[�h����v�����ꍇ�A���[�h�ɂ���ď������킯��B
	if($input_password == $answer_password){
		if($mode == "1"){
			include('./delete2-6.php');
		}
		if($mode == "2"){
			include('./edit2-6.php');
		}
	}
?>
