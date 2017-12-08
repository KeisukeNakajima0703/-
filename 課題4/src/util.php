<?php
	define( 'SMARTY_DIR', '/home/co-655.it.3919.com/public_html/Smarty/libs/' );
	require_once( SMARTY_DIR .'Smarty.class.php' );
	require_once('/home/co-655.it.3919.com/public_html/CacheLite/Lite.php');

	// Smartyオブジェクト取得
	function & getSmartyObj(){
		static $smarty = null;
		if( is_null( $smarty ) ){
			$smarty = new Smarty();
			$smarty->template_dir = '/home/co-655.it.3919.com/public_html/kadai4/smarty/templates/';
			$smarty->compile_dir  = '/home/co-655.it.3919.com/public_html/kadai4/smarty/templates_c/';
			$smarty->config_dir   = '/home/co-655.it.3919.com/public_html/kadai4/smarty/config/';
			$smarty->cache_dir    = '/home/co-655.it.3919.com/public_html/kadai4/smarty/cache/';
		}
		return $smarty;
	}
	function createPDO(){
		$user = 'co-655.it.3919.c';
		$pass = 'm8HbkigHk7';
		$dsn = "mysql:dbname=co_655_it_3919_com;host=localhost;charset=utf8";
		try{
			$pdo = new PDO($dsn, $user, $pass);
			$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);			
		}catch(PDOException $e){
			echo $e->getMessage();
			die();
		}
		return $pdo;
	}
	
	function insertMedia($file, $num){
		$content = file_get_contents($file["upfile"]["tmp_name"]);
		$extension = pathinfo($file["upfile"]["name"], PATHINFO_EXTENSION);
		$pdo = createPDO();
		try{
			$sql = "insert into medias(number, contents, extension) values(?, ?, ?)";
			$stm = $pdo->prepare($sql);
			$stm->execute(array($num, $content, $extension));
		}catch(PDOException $e){
			echo $e->getMessage();
			die();
		}
	}
	
	function createID($pdo){
		try{
			$sql = "select * from users";
			$stm = $pdo->query($sql);
			$result = $stm->fetchAll();
			$id = sprintf("%06d", count($result)+1);
		}catch(PDOexception $e){
			echo $e->getMessage();
			die();
		}
		
		return $id;
	}
?>