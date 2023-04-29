<?php
namespace app\controllers;

#[\app\filters\Login]
class Supplier extends \app\core\Controller{
    public function index() {
        $supplier = new \app\models\Supplier();
        $contents = $supplier->getAll();
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

    public function editSuppliers() {
        $supplier = new \app\models\Supplier();
        $contents = $supplier->getAll();
        $this->view('Supplier/editSuppliers', $contents);
    }


    public function deleteSupplier($lineNumber) {

    }
}