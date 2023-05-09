<?php
namespace app\models;

class Client extends \app\core\Model{
	public $client_id;
	#[\app\validators\NonNull]
	#[\app\validators\NonEmpty]
	protected $clientName;
	#[\app\validators\NonNull]
	#[\app\validators\NonEmpty]
	protected $address;

	protected function setclientName($val) {
		$this->clientName = htmlentities($val, ENT_QUOTES);
	}

	protected function setaddress($val) {
		$this->address = htmlentities($val, ENT_QUOTES);
	}

	protected function insert(){
		$SQL = "INSERT INTO client (clientName, address) value (:clientName, :address)";
		$STH = self::$connection->prepare($SQL);
		$data = [
			'clientName'=>$this->clientName,
			'address'=>$this->address
		];
		$STH->execute($data);
		$this->client_id = self::$connection->lastInsertId();
	}

	protected function update(){
		$SQL = "UPDATE client SET clientName=:clientName, address=:address where client_id=:client_id";
		$STH = self::$connection->prepare($SQL);
		$data = [
			'clientName'=>$this->clientName,
			'address'=>$this->address,
			'client_id'=>$this->client_id
		];
		$STH->execute($data);
		return $STH->rowCount();
	}
 
	public function delete(){
		$SQL = "DELETE FROM client WHERE client_id=:client_id";
		$STH = self::$connection->prepare($SQL);
		$data = ['client_id'=>$this->client_id];
		$STH->execute($data);
		return $STH->rowCount();
	}


	public function getAll(){
		$SQL = "SELECT * FROM client";
		$STH = self::$connection->prepare($SQL);
		$STH->execute();
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Client');
		return $STH->fetchAll();
	}

	public function get($client_id){
		$SQL = "SELECT * FROM client WHERE client_id=:client_id";
		$STH = self::$connection->prepare($SQL);
		$STH->execute([
				'client_id' => $client_id
			]
		);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Client');
		return $STH->fetch();
	}
}