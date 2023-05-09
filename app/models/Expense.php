<?php
namespace app\models;

class Expense extends \app\core\Model{
	public $expense_id;
	#[\app\validators\NonNull]
	#[\app\validators\NonEmpty]
	protected $supplierName;
	#[\app\validators\NonNull]
	#[\app\validators\DoubleLength]
	protected $totalExpense;
	#[\app\validators\NonEmpty]
	protected $details;
	public $user_id;

	protected function setsupplierName($val) {
		$this->supplierName = htmlentities($val, ENT_QUOTES);
	}

	protected function settotalExpense($val) {
		$this->totalExpense = htmlentities($val, ENT_QUOTES);
	}

	protected function setdetails($val) {
		$this->details = htmlentities($val, ENT_QUOTES);
	}
	
	protected function insert(){
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

	protected function update(){
        $SQL = "UPDATE expense SET supplierName=:supplierName, totalExpense=:totalExpense, details=:details, user_id=:user_id where expense_id=:expense_id";
        $STH = self::$connection->prepare($SQL);
        $data = [
            'supplierName'=>$this->supplierName,
            'totalExpense'=>$this->totalExpense,
            'details'=>$this->details,
            'user_id'=>$this->user_id,
            'expense_id'=>$this->expense_id
        ];
        $STH->execute($data);
        return $STH->rowCount();
    }
 
	public function delete(){
		$SQL = "DELETE FROM expense WHERE expense_id=:expense_id";
		$STH = self::$connection->prepare($SQL);
		$data = ['expense_id'=>$this->expense_id];
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

	public function getAllSuppliers(){
		$SQL = "SELECT DISTINCT supplierName FROM expense";
		$STH = self::$connection->prepare($SQL);
		$STH->execute();
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