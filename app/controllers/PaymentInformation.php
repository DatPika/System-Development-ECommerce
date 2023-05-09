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
            $payment->paymentMethod = $_POST['paymentMethod'];
            $payment->amount = $_POST['amount'];
            $payment->date = $_POST['date'];
            $payment->insert();

            header('location:/PaymentInformation/index/' . $project_id);
        }
        else {
            $user = new \app\models\User();
            $users = $user->getAll();
            $this->view('PaymentInformation/create', $users);
        }
    }

    public function edit($expense_id) {
        $expense = new \app\models\Expense();
        $expense = $expense->get($expense_id);
        // might make this into a filter the not null expense
        if($expense) {
            if(isset($_POST['action'])) {
                $expense->supplierName = $_POST['supplierName'];
                $expense->totalExpense = $_POST['totalExpense'];
                $expense->details = $_POST['details'];
                $expense->user_id = $_POST['user_id'];
                $expense->update();

                header('location:/Expense/index');
            }
            else {
                $user = new \app\models\User();
                $users = $user->getAll();
                $this->view('Expense/edit', ['expense'=>$expense, 'users'=>$users]);
            }
        }
        else {
            header('location:/Expense/index?error=The chosen expense does not exist');
        }
    }

    public function delete($expense_id) {
        $expense = new \app\models\Expense();
        $expense = $expense->get($expense_id);
        // might make this into a filter the not null expense
        if($expense) {
            if(isset($_POST['action'])) {
                $expense->delete();
                header('location:/Expense/index');
            }
            else {
                $this->view('Expense/delete', $expense);
            }
        }
        else {
            header('location:/Expense/index?error=The chosen expense does not exist');
        }
    }

}