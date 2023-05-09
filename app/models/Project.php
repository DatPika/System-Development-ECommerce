<?php
namespace app\models;
use app\core\TimeHelper;

class Project extends \app\core\Model{
	public $project_id;
	public $client_id;
	#[\app\validators\NonNull]
	#[\app\validators\Job]
	protected $job;
	#[\app\validators\DoubleLength]
	protected $projectCost;
	#[\app\validators\NonNull]
	#[\app\validators\DateTime]
	protected $startDate;
	#[\app\validators\DateTime]
	protected $endDate;
	#[\app\validators\Done]
	protected $done;
	#[\app\validators\IntLength]
	protected $surfaceArea;
	#[\app\validators\IntLength]
	protected $lights;
	#[\app\validators\IntLength]
	protected $spots;
	#[\app\validators\IntLength]
	protected $vents;
	protected $works;
	protected $otherInformation;

	protected function setjob($val) {
		$this->job = $val;
	}
	protected function setdone($val) {
		$this->done = $val;
	}

	protected function setprojectCost($val) {
		$this->projectCost = htmlentities($val, ENT_QUOTES);
	}
	protected function setstartDate($val) {
		$this->startDate = TimeHelper::DTInput($val);
	}
	
	protected function setendDate($val) {
		$this->endDate = TimeHelper::DTInput($val);
	}

	protected function setsurfaceArea($val) {
		$this->surfaceArea = htmlentities($val, ENT_QUOTES);
	}
	protected function setlights($val) {
		$this->lights = htmlentities($val, ENT_QUOTES);
	}
	protected function setspots($val) {
		$this->spots = htmlentities($val, ENT_QUOTES);
	}
	protected function setvents($val) {
		$this->vents = htmlentities($val, ENT_QUOTES);
	}
	protected function setworks($val) {
		$this->works = htmlentities($val, ENT_QUOTES);
	}
	protected function setotherInformation($val) {
		$this->otherInformation = htmlentities($val, ENT_QUOTES);
	}

	protected function insert(){
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

	protected function update(){
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
			'otherInformation'=>$this->otherInformation,
			'project_id'=>$this->project_id,
		];
		$STH->execute($data);
		return $STH->rowCount();
	}
 
	public function delete(){
		$SQL = "DELETE FROM project WHERE project_id=:project_id";
		$STH = self::$connection->prepare($SQL);
		$data = ['project_id'=>$this->project_id];
		$STH->execute($data);
		return $STH->rowCount();
	}


	public function getAll(){
		$SQL = "SELECT * FROM project";
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

	public function getAllPayments() {
        $SQL = "SELECT * FROM paymentInformation WHERE project_id = :project_id";
        $STH = self::$connection->prepare($SQL);
        $data = [
            'project_id'=>$this->project_id
        ];
        $STH->execute($data);
        $STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\PaymentInformation');
        return $STH->fetchAll();
    }
    
	public function getClient() {
		$SQL = "SELECT client.* FROM project JOIN client ON project.client_id=client.client_id WHERE project.client_id=:client_id";
		$STH = self::$connection->prepare($SQL);
		$STH->execute([
				'client_id' => $this->client_id
			]
		);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Client');
		return $STH->fetch();
	}
}