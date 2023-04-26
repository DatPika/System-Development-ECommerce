<?php
namespace app\models;

class User extends \app\core\Model{
	public $user_id;
	public $username;
	public $password_hash;

	public function get($username){
		$SQL = 'SELECT * FROM user WHERE username = :username';
		$STH = self::$connection->prepare($SQL);

		$STH->execute(['username'=>$username]);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\User');
		return $STH->fetch();
	}

	public function insert(){
		$SQL = 'INSERT INTO user(username, password_hash) VALUES (:username, :password_hash)';
		$STH = self::$connection->prepare($SQL);

		$STH->execute(['username'=>$this->username,
						'password_hash'=>$this->password_hash]);
		$this->user_id = self::$connection->lastInsertId();
	}
	
	public function getAll() {
        $SQL = "SELECT * FROM user";
        $STH = self::$connection->prepare($SQL);
        $STH->execute();
        $STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\User');
        return $STH->fetchAll();
	}
}