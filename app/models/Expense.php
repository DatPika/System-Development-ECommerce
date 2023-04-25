<?php
namespace app\models;

class Expense extends \app\core\Model{
	public $expense_id;
	public $supplierName;
	public $totalExpense;
	public $details;
	public $user_id;

	public function insert(){
		$SQL = "INSERT INTO expense (supplierName, totalExpense, details, user_id) value (:supplierName, :totalExpense, :details, :user_id)";
		$STH = self::$connection->prepare($SQL);
		$data = [
			'supplierName'=>$this->supplierName,
			'totalExpense'=>$this->totalExpense,
			'details'=>$this->details,
			'user_id'=>$this->user_id
		];
		$STH->execute($data);
		$this->expense_id = self::$connection->lastInsertId();
	}

	public function update(){
		$SQL = "UPDATE expense SET supplierName=:supplierName, totalExpense=:totalExpense, details=:details where expense_id=:expense_id";
		$STH = self::$connection->prepare($SQL);
		$data = [
			'supplierName'=>$this->supplierName,
			'totalExpense'=>$this->totalExpense,
			'details'=>$this->details,
			'expense_id'=>$this->expense_id
		];
		$STH->execute($data);
		return $STH->rowCount();
	}
 
	public function delete($expense_id){
		$SQL = "DELETE FROM expense WHERE expense_id=:expense_id";
		$STH = self::$connection->prepare($SQL);
		$data = ['expense_id'=>$expense_id];
		$STH->execute($data);
		return $STH->rowCount();
	}

	public function getAll(){
		$SQL = "SELECT * FROM expense";
		$STH = self::$connection->prepare($SQL);
		$STH->execute();
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Expense');
		return $STH->fetchAll();
	}

	public function getAllByColumnDesc($column){
		$SQL = "SELECT * FROM expense ORDER BY :column DESC";
		$STH = self::$connection->prepare($SQL);

		$data = ['column'=>$column];
		$STH->execute($data);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Expense');
		return $STH->fetchAll();
	}

	public function getAllByColumnAsc($column){
		$SQL = "SELECT * FROM expense ORDER BY :column ASC";
		$STH = self::$connection->prepare($SQL);
		$data = ['column'=>$column];
		$STH->execute($data);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Expense');
		return $STH->fetchAll();
	}

	public function get($expense_id){
		$SQL = "SELECT * FROM expense WHERE expense_id=:expense_id";
		$STH = self::$connection->prepare($SQL);
		$STH->execute([
				'expense_id' => $expense_id
			]
		);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Expense');
		return $STH->fetch();
	}
}