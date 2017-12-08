<?php
$data = file_get_contents('test.txt');
$data .= $_GET['test'] . "\n";
file_put_contents('test.txt', $data);
?>