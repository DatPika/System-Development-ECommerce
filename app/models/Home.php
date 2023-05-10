<?php
namespace app\models;

class Home extends \app\core\Model{

	public $home_id;
	public $project_id;
	public $expense_id;

	public function getAll() {
		$SQL = "SELECT * FROM home ORDER BY home_id DESC";
		$STH = self::$connection->prepare($SQL);
		$STH->execute();
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Home');
		return $STH->fetchAll();
	}

	public function getExpense() {
		$SQL = "SELECT * FROM expense JOIN home ON expense.expense_id=home.expense_id WHERE expense.expense_id=:expense_id";
		$STH = self::$connection->prepare($SQL);
		$STH->execute(['expense_id' => $this->expense_id]);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Expense');
		return $STH->fetch();
	}

	public function getProject() {
		$SQL = "SELECT * FROM project JOIN home ON project.project_id=home.project_id WHERE project.project_id=:project_id";
		$STH = self::$connection->prepare($SQL);
		$STH->execute(['project_id' => $this->project_id]);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Project');
		return $STH->fetch();
	}

	public function insert() {
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