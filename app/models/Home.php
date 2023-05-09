<?php
namespace app\models;

class Home extends \app\core\Model{

	public $home_id;
	public $project_id;
	public $expense_id;

	public function getAll() {
		$SQL = "SELECT * FROM home";
		$STH = self::$connection->prepare($SQL);
		$STH->execute();
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Home');
		return $STH->fetchAll();
	}

	public function create() {
		$SQL = "INSERT INTO home (project_id, expense_id) value (:project_id, :expense_id)";
		$STH = self::$connection->prepare($SQL);
		$data = [
			'project_id'=>$this->project_id,
			'expense_id'=>$this->expense_id
		];
		$STH->execute($data);
		$this->home_id = self::$connection->lastInsertId();
	}
}