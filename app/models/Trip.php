<?php
namespace app\models;

class Trip extends \app\core\Model{
	public $trip_id;
	public $project_id;
	#[\app\validators\NonNull]
	#[\app\validators\DistanceLength]
	protected $distance;

	protected function setdistance($val) {
		$this->distance = htmlentities($val, ENT_QUOTES);
	}

	protected function insert(){
		$SQL = "INSERT INTO project (project_id, distance) value (:project_id, :distance)";
		$STH = self::$connection->prepare($SQL);
		$data = [
			'project_id'=>$this->project_id,
			'distance'=>$this->distance
		];
		$STH->execute($data);
		$this->trip_id = self::$connection->lastInsertId();
	}

	protected function update(){
		$SQL = "UPDATE project SET project_id=:project_id, distance=:distance where trip_id=:trip_id";
		$STH = self::$connection->prepare($SQL);
		$data = [
			'project_id'=>$this->project_id,
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
		$SQL = "SELECT * FROM trip";
		$STH = self::$connection->prepare($SQL);
		$STH->execute();
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Trip');
		return $STH->fetchAll();
	}
	// TODO: fix the sql statement by joining the tables trip and project
	public function getAllByColumnDesc($column){
		$SQL = "SELECT * FROM trip ORDER BY :column DESC";
		$STH = self::$connection->prepare($SQL);
		$data = [
			'column'=>$column,
		];
		$STH->execute($data);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Trip');
		return $STH->fetchAll();
	}
	// TODO: fix the sql statement by joining the tables trip and project
	public function getAllByColumnAsc($column){
		$SQL = "SELECT * FROM trip ORDER BY :column ASC";
		$STH = self::$connection->prepare($SQL);
		$data = [
			'column'=>$column,
		];
		$STH->execute($data);
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