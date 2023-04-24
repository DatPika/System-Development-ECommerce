<?php
namespace app\models;

define('LOG_FILE', 'log.txt');

class UserLog{
	public $name;

	public function insert(){
		//TODO: also lock the file
		$fh = fopen(LOG_FILE, 'a');
		flock($fh, LOCK_EX);//need an exclusive lock to write
		fwrite($fh, "$this->name has visited!\n");
		fclose($fh);//release the resource and the lock
	}

	public function getAll(){
		$contents =  file(LOG_FILE);
		return $contents;
	}

	public function delete($lineNumber){
		//read the file
		$contents = $this->getAll();
		//write the file for each line that does not have this number
		$fh = fopen(LOG_FILE, 'w');
		flock($fh, LOCK_EX);
		foreach ($contents as $lineNum => $entry) {
			if($lineNum != $lineNumber){
				fwrite($fh, $entry);
			}
		}
		fclose($fh);
	}

}