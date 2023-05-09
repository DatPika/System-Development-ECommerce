<?php
namespace app\models;
use app\core\TimeHelper;

class PaymentInformation extends \app\core\Model {
    public $payment_id;
    public $project_id;
    public $user_id;
    #[\app\validators\NonEmpty]
    protected $paymentMethod;
    #[\app\validators\DoubleLength]
    protected $amount;
    #[\app\validators\DateTime]
    protected $date;

    protected function setpaymentMethod($val) {
        $this->paymentMethod = htmlentities($val, ENT_QUOTES);
    }

    protected function setamount($val) {
        $this->amount = htmlentities($val, ENT_QUOTES);
    }

    protected function setdate($val) {
        $this->date = TimeHelper::DTInput($val);
    }

    protected function insert() {
        $SQL = "INSERT INTO paymentInformation(project_id, user_id, paymentMethod, amount, date) value (:project_id, :user_id, :paymentMethod, :amount, :date)";
        $STH = self::$connection->prepare($SQL);
        $data = [
            'project_id'=>$this->project_id,
            'user_id'=>$this->user_id,
            'paymentMethod'=>$this->paymentMethod,
            'amount'=>$this->amount,
            'date'=>$this->date
        ];
        $STH->execute($data);
        $this->payment_id = self::$connection->lastInsertId();
    }
    protected function update() {
<<<<<<< HEAD
        $SQL = "UPDATE payment_information SET user_id=:user_id, paymentMethod=:paymentMethod, amount=:amount, date=:date WHERE payment_id = :payment_id";
=======
        $SQL = "UPDATE `paymentInformation` SET `project_id`=:project_id, 'user_id'=:user_id,`paymentMethod`=:paymentMethod,`amount`=:amount, `date`=:date WHERE payment_id = :payment_id";
>>>>>>> 4353b419e6bdb45ef2e092c44326dbf8fd7a079c
        $STH = self::$connection->prepare($SQL);
        $data = [
            'user_id'=>$this->user_id,
            'paymentMethod'=>$this->paymentMethod,
            'amount'=>$this->amount,
            'date'=>$this->date,
            'payment_id'=>$this->payment_id
        ];
        // checking condition if data was changed
        if($STH->execute($data)){
            return $STH->rowCount();
        }
        else {
            return -1;
        }
    }
    public function get($payment_id) {
        $SQL = "SELECT * FROM paymentInformation WHERE payment_id = :payment_id";
        $STH = self::$connection->prepare($SQL);
        $data = [
            'payment_id'=>$payment_id
        ];
        $STH->execute($data);
        $STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\PaymentInformation');
        return $STH->fetch();
    }
<<<<<<< HEAD

    public function delete(){
        $SQL = "DELETE FROM payment_information WHERE payment_id=:payment_id";
        $STH = self::$connection->prepare($SQL);
        $data = ['payment_id'=>$this->payment_id];
        $STH->execute($data);
        return $STH->rowCount();
    }

=======
>>>>>>> 4353b419e6bdb45ef2e092c44326dbf8fd7a079c
}