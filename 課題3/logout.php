<?php
	session_start();
	require_once("./util.php");
	$_SESSION = array();
	if(isset($_COOKIE[session_name()])){
		$param = session_get_cookie_params();
		setcookie(session_name(), '', time()-3600, $param["pass"]);
	}
	session_destroy();
?>
<!DOCTYPE>
<html>
	<head>
		<title>掲示板・トップページ</title>
		<meta charset = "UTF-8">
	</head>
	<body>
		<?php print_top_menu($_SESSION["login"]); ?>
		ログアウトしました。<br>
	</body>
</html>