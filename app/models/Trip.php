<?php
namespace app\models;

class Trip extends \app\core\Model{
	public $trip_id;
	public $project_id;
	#[\app\validators\DistanceLength]
	protected $distance;

	protected function setdistance($val) {
		$this->distance = htmlentities($val, ENT_QUOTES);
	}

	protected function insert(){
		$SQL = "INSERT INTO trip (project_id, distance) value (:project_id, :distance)";
		$STH = self::$connection->prepare($SQL);
		$data = [
			'project_id'=>$this->project_id,
			'distance'=>$this->distance
		];
		$STH->execute($data);
		$this->trip_id = self::$connection->lastInsertId();
	}

	protected function update(){
		$SQL = "UPDATE trip SET distance=:distance where trip_id=:trip_id";
		$STH = self::$connection->prepare($SQL);
		$data = [
			'distance'=>$this->distance,
			'trip_id'=>$this->trip_id
		];
		$STH->execute($data);
		return $STH->rowCount();
	}
 
	public function delete(){
		$SQL = "DELETE FROM trip WHERE trip_id=:trip_id";
		$STH = self::$connection->prepare($SQL);
		$data = ['trip_id'=>$this->trip_id];
		$STH->execute($data);
		return $STH->rowCount();
	}


	public function getAll(){
		$SQL = "SELECT * FROM trip ORDER BY trip_id DESC LIMIT 10";
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
	public function getProject() {
		$SQL = "SELECT project.* FROM trip JOIN project ON trip.project_id=project.project_id WHERE trip.project_id=:project_id";
		$STH = self::$connection->prepare($SQL);
		$STH->execute([
				'project_id' => $this->project_id
			]
		);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Project');
		return $STH->fetch();
	}
}