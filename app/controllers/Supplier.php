<?php
namespace app\controllers;

#[\app\filters\Login]
class Supplier extends \app\core\Controller{
    // public function index() {
    //     $supplier = new \app\models\Supplier();
    //     $shownSuppliers = $expense->getAllShown();
    //     $this->view('Supplier/index', $shownSuppliers);
    // }

    public function create() {
        if(isset($_POST['action'])) {
            $supplier = new \app\models\Supplier();
            $supplier->supplierName = $_POST['supplierName'];
            $supplier->isShown = $_POST['isShown'];
            $supplier->insert();

            header('location:/Supplier/index');
        }
        else {
            $user = new \app\models\User();
            $users = $user->getAll();
            $this->view('Supplier/create',$users);
        }
    }

    public function edit($expense_id) {
        $supplier = new \app\models\Supplier();
        $supplier = $supplier->get($expense_id);
        // might make this into a filter the not null expense
        if($supplier) {
            if(isset($_POST['action'])) {
                $supplier->supplierName = $_POST['supplierName'];
                $supplier->totalExpense = $_POST['totalExpense'];
                $supplier->details = $_POST['details'];
                $supplier->user_id = $_POST['user_id'];
                $supplier->update();

                header('location:/Expense/create');
            }
            else {
                $user = new \app\models\User();
                $users = $user->getAll();
                $this->view('Supplier/edit', ['expense'=>$expense, 'users'=>$users]);
            }
        }
        else {
            header('location:/Supplier/index?error=The chosen expense does not exist');
        }
    }

    public function delete($expense_id) {
        $expense = new \app\models\Supplier();
        $expense = $expense->get($expense_id);
        // might make this into a filter the not null expense
        if($expense) {
            if(isset($_POST['action'])) {
                $expense->delete();
                header('location:/Supplier/index');
            }
            else {
                $this->view('Supplier/delete', $expense);
            }
        }
        else {
            header('location:/Supplier/index?error=The chosen expense does not exist');
        }
    }

    // TODO:
    public function editSuppliers() {
        
    }
}