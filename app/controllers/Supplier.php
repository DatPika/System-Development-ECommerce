<?php
namespace app\controllers;

#[\app\filters\Login]
#[\app\filters\twofa]
class Supplier extends \app\core\Controller{
    public function index() {
         if(isset($_POST['action'])) {
            if(!empty($_POST['supplierName'])) {
                $supplierList = "";
                foreach($_POST['supplierName'] as $value){
                    $supplierList .= $value . ',';
                }
                $fh = fopen('resources/supplierList.txt', 'w');
                fwrite($fh, "$supplierList");
                fclose($fh);
            }
            header('location:/Expense/create');
        }
        else {
            $expense = new \app\models\Expense();
            $contents = $expense->getAllSuppliers();
            // $supplier = new \app\models\Supplier();
            // $contents = $supplier->getAll();
            $this->view('Supplier/editSuppliers', $contents);
        }
    }
}