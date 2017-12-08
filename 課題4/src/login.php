<?php
	session_start();
	require_once("./util.php");
	$smarty =& getSmartyObj();
	$smarty->assign("signed", $_SESSION["login"]);
	$smarty->display("login.tpl");
?>