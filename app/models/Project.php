<?php
namespace app\models;

class Project extends \app\core\Model{
	public $project_id;
	public $client_id;
	public $job;
	public $projectCost;
	public $startDate;
	public $endDate;
	public $done;
	public $surfaceArea;
	public $lights;
	public $spots;
	public $vents;
	public $works;
	public $otherInformation;

	public function insert(){
		$SQL = "INSERT INTO project (client_id, job, projectCost, startDate, endDate, done, surfaceArea, lights, spots, vents, works, otherInformation) value (:client_id, :job, :projectCost, :startDate, :endDate, :done, :surfaceArea, :lights, :spots, :vents, :works, :otherInformation)";
		$STH = self::$connection->prepare($SQL);
		$data = [
			'client_id'=>$this->client_id,
			'job'=>$this->job,
			'projectCost'=>$this->projectCost,
			'startDate'=>$this->startDate,
			'endDate'=>$this->endDate,
			'done'=>$this->done,
			'surfaceArea'=>$this->surfaceArea,
			'lights'=>$this->lights,
			'spots'=>$this->spots,
			'vents'=>$this->vents,
			'works'=>$this->works,
			'otherInformation'=>$this->otherInformation
		];
		$STH->execute($data);
		$this->project_id = self::$connection->lastInsertId();
	}

	public function update(){
		$SQL = "UPDATE project SET client_id=:client_id, job=:job, projectCost=:projectCost, startDate=:startDate, endDate=:endDate, done=:done, surfaceArea=:surfaceArea, lights=:lights, spots=:spots, vents=:vents, works=:works, otherInformation=:otherInformation where project_id=:project_id";
		$STH = self::$connection->prepare($SQL);
		$data = [
			'client_id'=>$this->client_id,
			'job'=>$this->job,
			'projectCost'=>$this->projectCost,
			'startDate'=>$this->startDate,
			'endDate'=>$this->endDate,
			'done'=>$this->done,
			'surfaceArea'=>$this->surfaceArea,
			'lights'=>$this->lights,
			'spots'=>$this->spots,
			'vents'=>$this->vents,
			'works'=>$this->works,
			'otherInformation'=>$this->otherInformation
		];
		$STH->execute($data);
		return $STH->rowCount();
	}
 
	public function delete($project_id){
		$SQL = "DELETE FROM project WHERE project_id=:project_id";
		$STH = self::$connection->prepare($SQL);
		$data = ['project_id'=>$project_id];
		$STH->execute($data);
	}


	public function getAll(){
		$SQL = "SELECT * FROM project";
		$STH = self::$connection->prepare($SQL);
		$STH->execute();
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Project');
		return $STH->fetchAll();
	}
	public function getAllByColumnDesc($column){
		$SQL = "SELECT * FROM project ORDER BY :column DESC";
		$STH = self::$connection->prepare($SQL);
		$STH->execute();
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Project');
		return $STH->fetchAll();
	}
	public function getAllByColumnAsc($column){
		$SQL = "SELECT * FROM projectORDER BY :column ASC";
		$STH = self::$connection->prepare($SQL);
		$STH->execute();
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Project');
		return $STH->fetchAll();
	}

	public function get($project_id){
		$SQL = "SELECT * FROM project WHERE project_id=:project_id";
		$STH = self::$connection->prepare($SQL);
		$STH->execute([
				'project_id' => $project_id
			]
		);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Project');
		return $STH->fetch();
	}
}