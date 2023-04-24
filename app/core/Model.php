<?php
namespace app\core;

use PDO;
use ReflectionClass;

class Model{
	public static ?PDO $connection = null;
	public function __construct(){
		if(self::$connection == null) {
			// load the .env file from the given folder
			$env = \Dotenv\Dotenv::createImmutable(getcwd());
			$env->load();
			$env->required(['db_host', 'db_name', 'db_user', 'db_pass', 'db_charset'])->notEmpty();
			
			$host = $_ENV['db_host'];
			$dbname = $_ENV['db_name'];
			$user = $_ENV['db_user'];
			$pass = $_ENV['db_pass'];
			$charset = $_ENV['db_charset'];
			try {
				$options = [
					PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
					PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_CLASS,
					PDO::ATTR_EMULATE_PREPARES => false
				];
				self::$connection = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $user, $pass, $options);
				self::$connection->query("SET NAMES $charset");
			}
			catch(PDOException $e) {
				echo $e->getMessage();
			}
		}
	}

	public function isValid() : bool {
		$reflection = new ReflectionClass($this);
		$properties = $reflection->getProperties();
		foreach ($properties as $property) {
			$attributes = $property->getAttributes(
				\app\core\Validator::class,
				\ReflectionAttribute::IS_INSTANCEOF
			);
			$data = $property->getValue($this);
			foreach ($attributes as $attribute) {
				//create an object of that validator class
				$validator = $attribute->newInstance();
				//run the validation method on the data in the property
				if(!$validator->isValid($data))
					return false; //false on invalid data
			}
		}
		//return true if all the data is valid
		return true;
	}

	public function __call($method, $args) {
		if($this->isValid()) {
			call_user_func_array([$this, $method], $args);
		}
	}

	public function __set($name, $val) {
		$method = "set$name";
		if(method_exists($this, $method))
			$this->$method($val);
		else
			$this->$name = $val;
	}
	
	public function __get($name) {
		if(isset($this->$name))
			return $this->$name;
		else
			return "";
	}
}