<?php
namespace app\models;

class User extends \app\core\Model{
	public $user_id;
	#[\app\validators\NonNull] 
	#[\app\validators\NonEmpty]
	protected $username;
	#[\app\validators\NonNull]
	#[\app\validators\NonEmpty]
	protected $password_hash;
	public $secretkey;

	protected function setusername($val) {
		$this->username = htmlentities($val, ENT_QUOTES);
	}

	protected function setpassword_hash($val) {
		$this->password_hash = $val;
	}

	public function get($username){
		$SQL = 'SELECT * FROM user WHERE username = :username';
		$STH = self::$connection->prepare($SQL);

		$STH->execute(['username'=>$username]);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\User');
		return $STH->fetch();
	}

	protected function insert(){
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
	public function update2fa() {
		$SQL = 'UPDATE user set secretkey=:secretkey where user_id=:user_id';
		$STH = self::$connection->prepare($SQL);

		$STH->execute(['user_id'=>$this->user_id, 'secretkey'=>$this->secretkey]);
		return $STH->rowCount();
	}
}