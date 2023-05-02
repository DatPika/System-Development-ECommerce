<?php
namespace app\models;

define('SUPPLIER_FILE', 'supplierList.txt');

class Supplier{

	public $supplierName;

	public function getAll(){
		$contents =  file(SUPPLIER_FILE);
		return $contents;
	}

	public function insert(){
		$fh = fopen('supplierList.txt', 'a');
        fwrite($fh, "$this->supplierName,");
        fclose($fh);
	}

}