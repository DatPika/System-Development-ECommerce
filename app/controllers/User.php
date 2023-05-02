<?php
namespace app\controllers;

class User extends \app\core\Controller{

	public function index(){
		if(isset($_POST['action'])){
			$user = new \app\models\User();
			$user = $user->get($_POST['username']);
			if($user){
				if(password_verify($_POST['password'], $user->password_hash)){
					$_SESSION['user_id'] = $user->user_id;
					$_SESSION['username'] = $user->username;
					$_SESSION['secretkey'] = $user->secretkey;
					if(!$user->secretkey) {
						header('location:/Home/index');
					}
					else {
						header('location:/User/verify2fa');
					}
				}else{
					header('location:/User/index?error=Bad username/password combination');
				}
			}else{
				header('location:/User/index?error=Bad username/password combination');
			}
		}else{
			$this->view('User/index');
		}
	}

	public function register(){
		if(isset($_POST['action'])){
			$user = new \app\models\User();
			$usercheck = $user->get($_POST['username']);
			if(!$usercheck){
				$user->username= $_POST['username'];
				$user->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
				$user->insert();
				header('location:/User/index');
			}else{
				header('location:/User/register?error=Username ' . $_POST['username'] . ' already in use. Choose another.');
			}

		}else{
			$this->view('User/register');
		}
	}

	#[\app\filters\Login]
	public function logout(){
		session_destroy();
		header('location:/User/index');
	}

	public function makeQRCode(){
		$data = $_GET['data'];
		\QRcode::png($data);
	}

	#[\app\filters\Login]
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
				$_SESSION['secretkey'] = '';
				$user->update2fa();
				header('location:/Home/index');
			}
			else {
				header('location:/User/setup2fa?error=token not verified!'); // reload
			}		   
		}
		else {
			$secretkey = \app\core\TokenAuth6238::generateRandomClue();
			$_SESSION['secretkey'] = $secretkey;
			var_dump($_SESSION);
			$url = \app\core\TokenAuth6238::getLocalCodeUrl(
			$_SESSION['username'],
			'FavoriteDesign.com',
			$secretkey,
			'Favorite Design\'s Database App');
			$this->view('User/twofasetup', $url);
		}
	}

	#[\app\filters\Login]
	public function verify2fa() {
		var_dump($_SESSION);
		if(isset($_POST['action'])) {
			$currentcode = $_POST['currentCode'];
			if(\app\core\TokenAuth6238::verify(
				$_SESSION['secretkey'], $currentcode
			)) {
				$_SESSION['secretkey'] = '';
				header('location:/Home/index');
			}
			else {
				header('location:/User/verify2fa?error=token not verified!'); // reload
			}	
		}	   
		else {
			$this->view('User/verify2fa');
		}
	}

	//TODO implement verrify 2f1 ans setup2fa and makeQRcode (i have the code i will paste it here later)
}