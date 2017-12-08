<?php
	$data = file('test.txt');
	foreach($data as $line){
		echo $line,"<br>";
	}
?>