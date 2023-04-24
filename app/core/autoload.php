<?php
spl_autoload_register(
	function($class_name){
		// For Linux, MacOS, Windows, Unix, so it is now compatible
		#app\models\ClassName
		$class_name = str_replace("\\", DIRECTORY_SEPARATOR, $class_name);
		require_once($class_name . '.php');
	}
);