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
        }else{
            $expense = new \app\models\Expense();
            $contents = $expense->getAllSuppliers();
            $this->view('Supplier/editSuppliers', $contents);
        }
    }
}