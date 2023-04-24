<?php
namespace app\controllers;

class User extends \app\core\Controller{

	public function login(){
		if(isset($_POST['action'])){
			$user = new \app\models\User();
			$user = $user->getByUsername($_POST['username']);
			if($user){
				if(password_verify($_POST['password'], $user->password_hash)){
					$_SESSION['user_id'] = $user->user_id;
					$_SESSION['username'] = $user->username;
					$_SESSION['secretkey'] = $user->secretkey;
					if(!$user->secretkey) {
						header('location:/User/profile');
					}
					else {
						header('location:/User/verify2fa');
					}
				}else{
					header('location:/User/index?error=Bad username/password combination');
				}
			}else{
				//no such user
				header('location:/User/index?error=Bad username/password combination');
			}

		}else{
			$this->view('User/index');
		}
	}

	public function register(){//registration page
		if(isset($_POST['action'])){
			//process the input
			$user = new \app\models\User();
			$usercheck = $user->getByUsername($_POST['username']);
			var_dump($usercheck);
			if(!$usercheck){
				$user->username= $_POST['username'];
				$user->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
				$user->insert();
				header('location:/User/index');
			}else{
				header('location:/User/register?error=Username ' . $_POST['username'] . ' already in use. Choose another.');
			}

		}else{
			//display the form
			$this->view('User/register');//TODO: add the new view file
		}
	}

	// Use: /Default/makeQRCode?data=protocol://address
	public function makeQRCode(){
		$data = $_GET['data'];
		\QRcode::png($data);
	}

	#[\app\filters\Login]
	#[\app\filters\twofa]
	public function setup2fa(){
		if(isset($_POST['action'])) {
			$currentcode = $_POST['currentCode'];
			if(\app\core\TokenAuth6238::verify(
				$_SESSION['secretkey'], $currentcode
			)) {
				//the user has verified their proper 2-factor authentication setup
				$user = new \app\models\User();
				$user->user_id = $_SESSION['user_id'];
				$user->secretkey = $_SESSION['secretkey'];

				$user->update2fa();
				header('location:/User/profile');
			}
			else {
				header('location:/User/setup2fa?error=token not verified!'); // reload
			}		   
		}
		else {
			$secretkey = \app\core\TokenAuth6238::generateRandomClue();
			$_SESSION['secretkey'] = $secretkey;
			$url = \app\core\TokenAuth6238::getLocalCodeUrl(
			$_SESSION['username'],
			'Awesome.com',
			$secretkey,
			'Awesome App');
			$this->view('User/twofasetup', $url);
		}
	}

	#[\app\filters\Login]
	public function verify2fa() {
		if(isset($_POST['action'])) {
			$currentcode = $_POST['currentCode'];
			if(\app\core\TokenAuth6238::verify(
				$_SESSION['secretkey'], $currentcode
			)) {
				$_SESSION['secretkey'] = '';
				header('location:/User/profile');
			}
			else {
				header('location:/User/verify2fa?error=token not verified!'); // reload
			}	
		}	   
		else {
			$this->view('User/verify2fa');
		}
	}
	#[\app\filters\Login]
	public function logout(){
		session_destroy();
		header('location:/User/index');
	}

	#[\app\filters\Login]
	#[\app\filters\twofa]
	public function profile(){
		// if(!isset($_SESSION['user_id'])){
		// 	header('location:/User/index');
		// 	return;
		// }
		$message = new \app\models\Message();
		$messages = $message->getAllForUser($_SESSION['user_id']);
		$this->view('User/profile',$messages);
	}

	#[\app\filters\Login]
	#[\app\filters\twofa]
	public function somethingSecret() {
		echo "if you see this you are logged in";
	}
}