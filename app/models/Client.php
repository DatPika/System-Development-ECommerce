<?php
namespace app\models;

class Client extends \app\core\Model{
	public $client_id;
	public $clientName;
	public $distance;

	public function insert(){
		$SQL = "INSERT INTO client (clientName, distance) value (:clientName, :distance)";
		$STH = self::$connection->prepare($SQL);
		$data = [
			'clientName'=>$this->clientName,
			'distance'=>$this->distance
		];
		$STH->execute($data);
		$this->client_id = self::$connection->lastInsertId();
	}

	public function update(){
		$SQL = "UPDATE client SET clientName=:clientName, distance=:distance where client_id=:client_id";
		$STH = self::$connection->prepare($SQL);
		$data = [
			'clientName'=>$this->clientName,
			'distance'=>$this->distance,
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