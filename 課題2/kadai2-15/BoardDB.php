<?php
class BoardDB{
	//接続パラメータとPDOインスタンス
	const USER = 'co-655.it.3919.c';
	const PASSWORD = 'm8HbkigHk7';
	const DSN = "mysql:dbname=co_655_it_3919_com;host=localhost;charset=utf8";
	private $pdo;
	
	function __construct(){
		$dsn = self::DSN;
		$user = self::USER;
		$password = self::PASSWORD;
		try{
			//データベース接続
			$this->pdo = new PDO($dsn, $user, $password);
			$this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			//テーブル作成
			$sql = "create table if not exists {$dbName}.comments(
				number int,
				name varchar(10),
				comment text,
				time datetime,
				password varchar(10)
			)";
			$result = $this->pdo->query($sql);
			$result->closeCursor();
		}catch(PDOException $e){
			echo $e->getMessage();
			die();
		}
	}
	
	public function print_data(){
		$pdo = $this->pdo; //フィールドを取り出す
		$sql = "select * from comments order by number";
		$stm = $pdo->prepare($sql);
		$stm->execute();
		$result = $stm->fetchAll(PDO::FETCH_ASSOC);
		
		foreach($result as $row){
			echo $row['number']."　".$row['name']."　".$row['comment']."　".$row['time']."　".$row['password']."<br>";
		}
	}
	
	public function insert($name, $comment, $time, $password){
		$pdo = $this->pdo; //フィールドを取り出す
		//番号取り出し
		$sql = "select count(*) as num from comments";
		$result = $pdo->query($sql);
		$number = $result->fetchColumn();
		
		//データ挿入
		$sql = "insert into comments(number, name, comment, time, password) values(?, ?, ?, ?, ?)";
		$stm = $pdo->prepare($sql);
		$stm->execute(array($number + 1, $name, $comment, $time, $password));
	}
	
	public function getPassword($number){
		$pdo = $this->pdo; //フィールドを取り出す
		//パスワード取得
		$sql = "select password from comments where number = ?";
		$stm = $pdo->prepare($sql);
		$stm->execute(array($number));
		$result = $stm->fetch(PDO::FETCH_ASSOC);
		return $result['password'];
	}
	
	public function delete($number){
		$pdo = $this->pdo; //フィールドを取り出す
		//データ削除
		$sql = "delete from comments where number = ?";
		$stm = $pdo->prepare($sql);
		$stm->execute(array($number));
	}
	
	public function getData($number){
		$pdo = $this->pdo; //フィールドを取り出す
		//対象番号のデータを取得する
		$sql = "select * from comments where number = ?";
		$stm = $pdo->prepare($sql);
		$stm->execute(array($number));
		return $stm->fetch(PDO::FETCH_ASSOC);
	}
	
	public function update($number, $name, $comment, $time, $password){
		$pdo = $this->pdo; //フィールドを取り出す
		//対象番号のデータを更新する
		$sql = "update comments set name = ?, comment = ?, time = ?, password = ? where number = ?";
		$stm = $pdo->prepare($sql);
		$stm->execute(array($name, $comment, $time, $password, $number));
	}
}
?>
