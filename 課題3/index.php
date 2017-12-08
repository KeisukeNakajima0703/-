<?php
	session_start();
	require_once("./util.php");
?>
<?php
	$pdo = createPDO();
	try{
		//ユーザ情報テーブル
		$sql = "create table if not exists users(
				name varchar(10) not null,
				address varchar(30) not null,
				id varchar(8) not null primary key,
				password varchar(10) not null,
				state boolean not null
			)";
		$stm = $pdo->query($sql);
		$stm->closeCursor();
		
		//コメント情報テーブル
		$sql = "create table if not exists comments(
				number int auto_increment not null,
				name varchar(20) not null,
				comment text not null,
				time datetime not null,
				password varchar(20) not null,
				index(number)
			)";
		$stm = $pdo->query($sql);
		$stm->closeCursor();
		
		//メディア情報テーブル
		$sql = "create table if not exists medias(
				number int not null,
				contents mediumblob not null,
				extension varchar(5) not null
			)";
		$stm = $pdo->query($sql);
		$stm->closeCursor();
	}catch(PDOException $e){
		echo $e->getMessage();
		die();
	}
?>
<!DOCTYPE>
<html>
	<head>
		<title>掲示板・トップページ</title>
		<meta charset = "UTF-8">
	</head>
	<body>
		<?php print_top_menu(isset($_SESSION["login"]));?>
	</body>
</html>