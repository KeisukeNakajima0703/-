<?php
	function print_top_menu($sign){
		echo "<h1><a href='http://co-655.99sv-coco.com/kadai3/index.php'>掲示板</a></h1>";
		echo "<ul>";
			echo "<li><a href='http://co-655.99sv-coco.com/kadai3/entry.php'>ユーザ登録</a></li>";
			if(!$sign){
				echo "<li><a href='http://co-655.99sv-coco.com/kadai3/login.php'>ログイン</a></li>";
			}else{
				echo "<li><a href='http://co-655.99sv-coco.com/kadai3/logout.php'>ログアウト</a></li>";
				echo "<li><a href='http://co-655.99sv-coco.com/kadai3/mypage.php'>マイページ</a></li>";
			}
		echo "</ul>";
		
	}
	
	function print_errors($errors){
		echo "以下のエラーが発生しました。<br>";
		foreach($errors as $value){
			echo $value, "<br>";
		}
	}
	
	function print_comments($comments, $password, $medias){
		$url = "contents.php";
		echo "-------------------------<br>";
		foreach($comments as $row){
			//コメント出力
			echo $row['number']."　".$row['name']."　".$row['comment']."　".$row['time']."　"."<br>";
			
			//メディアコンテンツ出力
			foreach($medias as $value){
				if($row["number"] != $value["number"]) continue;
				$extension = $value["extension"];
				if($extension == "jpg" || $extension == "png" || $extension == "gif"){
					echo "<img src={$url}?number={$row['number']}>";
				}else if($extension == "mp4"){
					echo "<video src={$url}?number={$row['number']}>";
				}
			}
			
			if($password == $row["password"]){
				echo "<form action='delete.php' method='post'>";
				echo "<input type='hidden' name = 'number' value = ", $row['number'], ">";
				echo "<input type='submit' value = '削除'>";
				echo "</form>";
				
				echo "<form action='edit.php' method='post'>";
				echo "<input type='hidden' name = 'number' value = ", $row['number'], ">";
				echo "<input type='submit' value = '編集'><br>";
				echo "</form>";
			}
			echo "-------------------------<br>";
		}
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