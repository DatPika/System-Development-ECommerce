<?php
namespace app\controllers;

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
            //will depend on the view
            if(isset($_POST['user_id'])) {
                $expense->user_id = $_SESSION['user_id'];
            }
            $expense->insert();

            header('location:/Expense/index');
        }
        else {
            $this->view('Expense/create');
        }
    }

    public function edit($expense_id) {
        $expense = new \app\models\Expense();
        $expense = $expense->getByExpenseId($expense_id);
        // might make this into a filter the not null expense
        if($expense) {
            if(isset($_POST['action'])) {
                $expense->supplierName = $_POST['supplierName'];
                $expense->totalExpense = $_POST['totalExpense'];
                $expense->details = $_POST['details'];
                //will depend on the view
                if(isset($_POST['user_id'])) {
                    $expense->user_id = $_SESSION['user_id'];
                }
                $expense->edit();

                header('location:/Expense/index');
            }
            else {
                $this->view('Expense/edit/', $expense);
            }
        }
        else {
            header('location:/Expense/index?error=The chosen expense does not exist');
        }
    }

    public function delete($expense_id) {
        $expense = new \app\models\Expense();
        $expense = $expense->getByExpenseId($expense_id);
        // might make this into a filter the not null expense
        if($expense) {
            if(isset($_POST['action'])) {
                $expense->delete();
                header('location:/Expense/index');
            }
            else {
                $this->view('Expense/delete/', $expense);
            }
        }
        else {
            header('location:/Expense/index?error=The chosen expense does not exist');
        }
    }
}