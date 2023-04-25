<?php
namespace app\models;

class PaymentInformation extends \app\core\Model {
    public $payment_id;
    public $project_id;
    public $user_id;
    public $paymentMethod;
    public $amount;
    public $date;

    public function insert() {
        $SQL = "INSERT INTO paymentInformation(project_id, user_id, paymentMethod, amount) value (:project_id, :user_id, :paymentMethod, :amount)";
        $STH = self::$connection->prepare($SQL);
        $data = [
            'project_id'=>$this->project_id,
            'user_id'=>$this->user_id,
            'paymentMethod'=>$this->paymentMethod,
            'amount'=>$this->amount,
        ];
        $STH->execute($data);
        return $STH->rowCount();
    }
    public function update() {
        $SQL = "UPDATE `paymentInformation` SET `project_id`=:project_id, 'user_id'=:user_id,`paymentMethod`=:paymentMethod,`amount`=:amount WHERE payment_id = :payment_id";
        $STH = self::$connection->prepare($SQL);
        $data = [
            'project_id'=>$this->project_id,
            'user_id'=>$this->user_id,
            'paymentMethod'=>$this->paymentMethod,
            'amount'=>$this->amount,
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
    public function getByPaymentId($payment_id) {
        $SQL = "SELECT * FROM paymentInformation WHERE payment_id = :payment_id";
        $STH = self::$connection->prepare($SQL);
        $data = [
            'payment_id'=>$payment_id
        ];
        $STH->execute($data);
        $STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\PaymentInformation');
        return $STH->fetch();
    }
}