<?php
namespace app\controllers;

#[\app\filters\Login]
#[\app\filters\twofa]
class Expense extends \app\core\Controller{
    public function index() {
        $expense = new \app\models\Expense();
        $expenses = $expense->getAll();
        $this->view('Expense/index', $expenses);
    }

    public function create() {
        if(isset($_POST['action'])) {
            $expense = new \app\models\Expense();
            $expense->supplierName = $_POST['supplierName'];
            $expense->totalExpense = $_POST['totalExpense'];
            $expense->details = $_POST['details'];
            $expense->user_id = $_POST['user_id'];
            $expense->insert();
            $home = new \app\models\Home();
            $home->expense_id = $expense->expense_id;
            $home->insert();
            header('location:/Expense/index');
        }
        else {
            $user = new \app\models\User();
            $users = $user->getAll();
            $this->view('Expense/create',$users);
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
    public function loadMore() {
        header('location:/Expense/index');
    }
}