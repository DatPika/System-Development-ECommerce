<?php
namespace app\models;

define('SUPPLIER_FILE', 'supplierList.txt');

class Supplier{

	public $supplierName;

	public function getAll(){

		$file = fopen('supplierList.txt', 'r');
		while (($line = fgetcsv($file)) !== FALSE) {
  			//$line is an array of the csv elements
  			print_r($line);
		}
		fclose($file);
		// $contents =  file(SUPPLIER_FILE);
		// return $contents;
	}

}