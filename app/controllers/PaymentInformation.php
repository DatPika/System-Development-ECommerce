<?php
namespace app\controllers;

#[\app\filters\Login]
#[\app\filters\twofa]
class PaymentInformation extends \app\core\Controller{
    public function index($project_id) {
        $project = new \app\models\Project();
        $project = $project->get($project_id);
        $payments = $project->getAllPayments();
        $this->view('PaymentInformation/index', [$payments, $project_id]);
    }

    public function create($project_id) {
        if(isset($_POST['action'])) {
            $payment = new \app\models\PaymentInformation();
            $payment->project_id = $project_id;
            $payment->user_id = $_POST['user_id'];
            $payment->paymentMethod = $_POST['payment1'];
            $payment->amount = $_POST['amount'];
            $payment->date = $_POST['date'];
            $payment->insert();

            header('location:/PaymentInformation/index/' . $project_id);
        }
        else {
            $user = new \app\models\User();
            $users = $user->getAll();
            $this->view('PaymentInformation/create', [$users, $project_id]);
        }
    }

    public function edit($payment_id) {
        $payment = new \app\models\PaymentInformation();
        $payment = $payment->get($payment_id);
        // might make this into a filter the not null expense
        if($payment) {
            if(isset($_POST['action'])) {
                $payment->user_id = $_POST['user_id'];
                $payment->paymentMethod = $_POST['payment1'];
                $payment->amount = $_POST['amount'];
                $payment->date = $_POST['date'];
                $payment->update();

                header('location:/PaymentInformation/index/' . $payment->project_id);
            }
            else {
                $user = new \app\models\User();
                $users = $user->getAll();
                $this->view('PaymentInformation/edit', [$users, $payment]);
            }
        }
        else {
            header('location:/Expense/index?error=The chosen expense does not exist');
        }
    }

    public function delete($payment_id) {
        $payment = new \app\models\PaymentInformation();
        $payment = $payment->get($payment_id);
        // might make this into a filter the not null expense
        if($payment) {
            if(isset($_POST['action'])) {
                $payment->delete();
                header('location:/PaymentInformation/index/' . $payment->project_id);
            }
            else {
                $user = new \app\models\User();
                $user = $user->getByUserId($payment->user_id);
                $this->view('PaymentInformation/delete', [$user, $payment, $project_id]);
            }
        }
        else {
            header('location:/Expense/index?error=The chosen expense does not exist');
        }
    }

}