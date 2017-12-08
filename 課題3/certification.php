<?php
	session_start();
	require_once("./util.php");
?>
<?php
	$error = array();
	//POSTデータのチェック
	if(isset($_POST["id"]) && !empty($_POST["id"])){
		$id = htmlspecialchars($_POST["id"], ENT_QUOTES, "UTF-8");
	}else{
		$error[] = "IDが未入力です";
	}
	if(isset($_POST["password"]) && !empty($_POST["password"])){
		$password = htmlspecialchars($_POST["password"], ENT_QUOTES, "UTF-8");
	}else{
		$error[] = "パスワードがが未入力です";
	}
?>
<?php	
	$pdo = createPDO();
	try{
		//ユーザ認証
		$sql = "select * from users where id = ?";
		$stm = $pdo->prepare($sql);
		$stm->execute(array($id));
		$result = $stm->fetch(PDO::FETCH_ASSOC);
		if($result["password"] != $password){
			$error[] = "IDまたはパスワードが違います";
		}else if($result["state"] == false){
			$error[] = "本登録が行われていません";
		}else{
			$_SESSION["login"] = true;
			$_SESSION["name"] = $result["name"];
			$_SESSION["id"] = $id;
		}
		}catch(PDOException $e){
		echo $e->getMessage();
		die();
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>掲示板・トップページ</title>
		<meta charset = "UTF-8">
	</head>
	<body>
		<?php 
			if(count($error) == 0){
				header("location:./mypage.php");
				exit();
			}else{
				print_top_menu($_SESSION["login"]); 
				print_errors($error);
				echo "<input type='button' value = '戻る' onclick=\"location.href='login.php'\">";
			}
		?>
	</body>
</html>

