<?php
namespace app\models;

class User extends \app\core\Model{
	public $user_id;
	public $username;
	public $password_hash;
	public $secretkey;

	public function getByUsername($username){
		$SQL = 'SELECT * FROM User WHERE username = :username';
		$STH = self::$connection->prepare($SQL);

		$STH->execute(['username'=>$username]);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\User');
		return $STH->fetch();
	}

	public function insert(){
		$SQL = 'INSERT INTO User(username, password_hash) VALUES (:username, :password_hash)';
		$STH = self::$connection->prepare($SQL);

		$STH->execute(['username'=>$this->username,
						'password_hash'=>$this->password_hash]);
		return self::$connection->lastInsertId();// returns the value of the new PK
	}
	public function update2fa() {
		$SQL = 'UPDATE User set secretkey=:secretkey where user_id=:user_id';
		$STH = self::$connection->prepare($SQL);

		$STH->execute(['user_id'=>$this->user_id, 'secretkey'=>$this->secretkey]);
		return $STH->rowCount();
	}
}