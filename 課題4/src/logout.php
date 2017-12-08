<?php
	session_start();
	require_once("./util.php");
	$_SESSION = array();
	if(isset($_COOKIE[session_name()])){
		$param = session_get_cookie_params();
		setcookie(session_name(), '', time()-3600, $param["pass"]);
	}
	session_destroy();
	
	$smarty =& getSmartyObj();
	$smarty->display("logout.tpl");
?>