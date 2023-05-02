<?php
namespace app\controllers;

#[\app\filters\Login]
class Supplier extends \app\core\Controller{
    public function index() {

        if(isset($_POST['action'])) {
            if(!empty($_POST['supplierName'])) {
                $supplierList = "";
                foreach($_POST['supplierName'] as $value){
                    $supplierList .= $value . ',';
                }
                $fh = fopen('supplierList.txt', 'w');
                fwrite($fh, "$supplierList");
                fclose($fh);
            }
            header('location:/Supplier/index');

        $expense = new \app\models\Expense();
        $contents = $expense->getAllSuppliers();
        // $supplier = new \app\models\Supplier();
        // $contents = $supplier->getAll();
        $this->view('Supplier/editSuppliers', $contents);
    }
    // i say to remove this method
    public function addSupplier() {
        if(isset($_POST['action'])){
            $supplier = new \app\models\Supplier();
            $supplier->supplierName = $_POST['supplierName'];
            $supplier->insert();
            header('location:/Supplier/addSupplier');

        }else{
            $expense = new \app\models\Expense();
            $contents = $expense->getAllSuppliers();
            $this->view('Supplier/editSuppliers', $contents);
        }
    }


    public function editSuppliers() {
        $expense = new \app\models\Expense();
        $contents = $expense->getAllSuppliers();
        // $supplier = new \app\models\Supplier();
        // $contents = $supplier->getAll();
        $this->view('Supplier/editSuppliers', $contents);
    }


    public function deleteSupplier($lineNumber) {

    }
}