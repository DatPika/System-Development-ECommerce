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
        $lineNumber = count(file("supplierList.txt")) + 1;
        fwrite($fh, "$lineNumber : $this->supplierName \n");
        fclose($fh);
	}

	public function delete($lineNumber){
		//read the file
		$contents = $this->getAll();
		//write the file for each line that does not have this number
		$fh = fopen(SUPPLIER_FILE, 'w');
		flock($fh, LOCK_EX);
		foreach ($contents as $lineNum => $entry) {
			if($lineNum != $lineNumber){
				fwrite($fh, $entry);
			}
		}
		fclose($fh);
	}

}