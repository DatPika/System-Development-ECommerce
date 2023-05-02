<?php
namespace app\controllers;

#[\app\filters\Login]
class Supplier extends \app\core\Controller{
    public function index() {
        $expense = new \app\models\Expense();
        $contents = $expense->getAllSuppliers();
        $this->view('Supplier/editSuppliers', $contents);
    }

    public function addSupplier() {
        if(isset($_POST['action'])){
            $supplier = new \app\models\Supplier();
            $supplier->supplierName = $_POST['supplierName'];
            $supplier->insert();
            header('location:/Supplier/addSupplier');
        }else{
            $this->view('Supplier/addSupplier');
        }
    }

    public function deleteSupplier($lineNumber) {

    }
}