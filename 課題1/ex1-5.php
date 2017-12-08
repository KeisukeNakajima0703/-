<?php
$data = $_GET['test'];
file_put_contents('test.txt', $data);
?>