<?php
namespace app\controllers;

class Main extends \app\core\Controller{

	// // Use: /Default/makeQRCode?data=protocol://address
	// public function makeQRCode(){
	// 	$data = $_GET['data'];
	// 	\QRcode::png($data);
	// }

	// #[\app\filters\Login]
	// public function setup2fa(){
	// 	if(isset($_POST['action'])) {
	// 		$currentcode = $_POST['currentCode'];
	// 		if(\app\code\TokenAuth6238::verify(
	// 			$_SESSION['secretkey'], $currentcode
	// 		)) {
	// 			//the user has verified their proper 2-factor authentication setup
	// 			$user = new \app\models\User();
	// 			$user->user_id = $_SESSION['user_id'];
	// 			$user->secret_key = $_SESSION['secretkey'];
	// 			$user->update2fa();
	// 			header('location:'.BASE.'/profile');
	// 		}
	// 		else {
	// 			header('location:'.BASE.'/User/setup2fa?error=token not verified!'); // reload
	// 		}			   
	// 	}
	// 	else {
	// 		$secretkey = \app\core\TokenAuth6238::generateRandomClue();
	// 		$_SESSION['secretkey'] = $secretkey;
	// 		$url = \App\core\TokenAuth6238::getLocalCodeUrl(
	// 		$_SESSION['username'],
	// 		'Awesome.com',
	// 		$secretkey,
	// 		'Awesome App');
	// 		$this->view('User/twofasetup', $url);
	// 	}
	// }

	function index(){
		$this->view('Main/index');
	}

	function index2(){
		$this->view('Main/index2');
	}

	function greetings($name = "Carl"){//optional parameter:$name
		$this->view('Main/greetings', $name);
	}

	function logUser(){
		if(isset($_POST['action'])){
			//data is sent
			$userLog = new \app\models\UserLog();
			$userLog->name = $_POST['name'];
			$userLog->insert();

			header('location:/Main/logUser');
		}else{
			//no data submitted: the user needs to see the form
			$this->view('Main/logUser');
		}
	}

	function viewUserLog(){
		$userLog = new \app\models\UserLog();
		$contents = $userLog->getAll();
		$this->view('Main/userLogList',$contents);
	}

	function logDelete($lineNumber){
		$userLog = new \app\models\UserLog();
		$userLog->delete($lineNumber);
		header('location:/Main/viewUserLog');//redirect
	}


}