<?php
namespace app\models;
use app\core\TimeHelper;

class Service extends \app\core\Model{
    public $service_id;
	#[\app\validators\NonNull]
	#[\app\validators\NonEmpty]
    protected $description;
	#[\app\validators\NonNull]
	#[\app\validators\DateTime]
    protected $datetime;// protected forces  the execution of the __set() call 
    public $client_id;
	public $branch_id;

	protected function setdatetime($val) {
		//on setting change the timezone
		$this->datetime = TimeHelper::DTInput($val);
	}

	protected function setdescription($val) {
		$this->description = htmlentities($val, ENT_QUOTES);
	}

	// protected forces  the execution of the __call() call
    protected function insert() {
        $SQL = "INSERT INTO service (description, datetime, client_id, branch_id) value (:description, :datetime, :client_id, :branch_id)";
		$STH = self::$connection->prepare($SQL);
		$data = [
			'description'=>$this->description,
			'datetime'=>$this->datetime,
			'client_id'=>$this->client_id,
			'branch_id' =>$this->branch_id,
		];
		$STH->execute($data);
		$this->service_id = self::$connection->lastInsertId();
    }

    protected function update(){
		$SQL = "UPDATE service SET description=:description, datetime=:datetime, branch_id=:branch_id where service_id=:service_id";
		$STH = self::$connection->prepare($SQL);
		$data = [
			'description'=>$this->description,
			'datetime'=>$this->datetime,
			'service_id'=>$this->service_id,
			'branch_id'=>$this->branch_id,
		];
		$STH->execute($data);
		return $STH->rowCount();
	}
 
	public function delete(){
		$SQL = "DELETE FROM service WHERE service_id=:service_id";
		$STH = self::$connection->prepare($SQL);
		$data = ['service_id'=>$this->service_id];
		$STH->execute($data);
        return $STH->rowCount();
	}


	public function getAllForClient($client_id){
		$SQL = "SELECT * FROM service Join branch on service.branch_id = branch.branch_id where client_id = :client_id";
		$STH = self::$connection->prepare($SQL);
        $data = [
            'client_id'=>$client_id
        ];
		$STH->execute($data);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Service');
		return $STH->fetchAll();
	}

	public function get($service_id){
		$SQL = "SELECT * FROM service join branch on service.branch_id = branch.branch_id WHERE service_id=:service_id";
		$STH = self::$connection->prepare($SQL);
		$STH->execute([
				'service_id' => $service_id
			]
		);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Service');
		return $STH->fetch();
	}

	public function getClient() {
		$SQL = "SELECT * from client where client_id = :client_id";
		$STH = self::$connection->prepare($SQL);
		$data = [
			'client_id'=>$this->client_id,
		];
		$STH->execute($data);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Client');
		return $STH->fetch();
	}
}