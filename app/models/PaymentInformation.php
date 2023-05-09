<?php
namespace app\models;

class PaymentInformation extends \app\core\Model {
    public $payment_id;
    public $project_id;
    public $user_id;
    #[\app\validators\NonNull]
    #[\app\validators\NonEmpty]
    protected $paymentMethod;
    #[\app\validators\NonNull]
    #[\app\validators\DoubleLength]
    protected $amount;
    #[\app\validators\NonNull]
    #[\app\validators\DateTime]
    protected $date;

    protected function setpaymentMethod($val) {
        $this->paymentMethod = htmlentities($val, ENT_QUOTES);
    }

    protected function setamount($val) {
        $this->amount = htmlentities($val, ENT_QUOTES);
    }

    // TODO: add DAteTime Input method and change its format
    protected function setdate($val) {
        $this->date = htmlentities($val, ENT_QUOTES);
    }

    protected function insert() {
        $SQL = "INSERT INTO payment_information(project_id, user_id, paymentMethod, amount, date) value (:project_id, :user_id, :paymentMethod, :amount, :date)";
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
        $SQL = "UPDATE `payment_information` SET `project_id`=:project_id, 'user_id'=:user_id,`paymentMethod`=:paymentMethod,`amount`=:amount, `date`=:date WHERE payment_id = :payment_id";
        $STH = self::$connection->prepare($SQL);
        $data = [
            'project_id'=>$this->project_id,
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
        $SQL = "SELECT * FROM payment_information WHERE payment_id = :payment_id";
        $STH = self::$connection->prepare($SQL);
        $data = [
            'payment_id'=>$payment_id
        ];
        $STH->execute($data);
        $STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\PaymentInformation');
        return $STH->fetch();
    }

}