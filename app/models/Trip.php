<?php
namespace app\models;

class Trip extends \app\core\Model{
	public $trip_id;
	public $project_id
	public $client_id;
	public $distance;

	public function insert(){
		$SQL = "INSERT INTO project (project_id, client_id, distance) value (:project_id, :client_id, :distance)";
		$STH = self::$connection->prepare($SQL);
		$data = [
			'project_id'=>$this->project_id,
			'client_id'=>$this->client_id,
			'distance'=>$this->distance
		];
		$STH->execute($data);
		$this->trip_id = self::$connection->lastInsertId();
	}

	public function update(){
		$SQL = "UPDATE project SET project_id=:project_id, client_id=:client_id, distance=:distance where trip_id=:trip_id";
		$STH = self::$connection->prepare($SQL);
		$data = [
			'project_id'=>$this->project_id,
			'client_id'=>$this->client_id,
			'distance'=>$this->distance,
			'trip_id'=>$this->trip_id
		];
		$STH->execute($data);
		return $STH->rowCount();
	}
 
	public function delete($trip_id){
		$SQL = "DELETE FROM trip WHERE trip_id=:trip_id";
		$STH = self::$connection->prepare($SQL);
		$data = ['trip_id'=>$trip_id];
		$STH->execute($data);
	}


	public function getAll(){
		$SQL = "SELECT * FROM trip";
		$STH = self::$connection->prepare($SQL);
		$STH->execute();
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Trip');
		return $STH->fetchAll();
	}
	public function getAllByColumnDesc($column){
		$SQL = "SELECT * FROM trip ORDER BY :column DESC";
		$STH = self::$connection->prepare($SQL);
		$STH->execute();
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Trip');
		return $STH->fetchAll();
	}
	public function getAllByColumnAsc($column){
		$SQL = "SELECT * FROM trip ORDER BY :column ASC";
		$STH = self::$connection->prepare($SQL);
		$STH->execute();
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Trip');
		return $STH->fetchAll();
	}

	public function get($trip_id){
		$SQL = "SELECT * FROM trip WHERE trip_id=:trip_id";
		$STH = self::$connection->prepare($SQL);
		$STH->execute([
				'trip_id' => $trip_id
			]
		);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Trip');
		return $STH->fetch();
	}
}