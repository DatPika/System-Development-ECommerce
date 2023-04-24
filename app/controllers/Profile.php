<?php
namespace app\controllers;

class Profile extends \app\core\Controller {
    public function index() {
        $profile = new \app\models\ProfileInformation();
        $profile = $profile->getByUserId($_SESSION['user_id']);
        if($profile) {
            $this->view('Profile/index', $profile);   
        }
        else {
            header('location:/Profile/create');
        }
    }

    public function create() {
        if(isset($_POST['action'])) {
            $profile = new \app\models\ProfileInformation();
            $profile->user_id = $_SESSION['user_id'];
            $profile->first_name = $_POST['first_name'];
            $profile->last_name = $_POST['last_name'];
            $profile->middle_name = $_POST['middle_name'];
            $success = $profile->insert();
            if($success) {
                header('location:/Profile/index?success= Profile Created!');   
            }
            else {
                header('location:/Profile/index?error=Something went wrong. You can have only have one profile.');
            }
        }
        else {
            $this->view('Profile/create');
        }
    }

    public function edit() {
        $profile = new \app\models\ProfileInformation();
        $profile = $profile->getByUserId($_SESSION['user_id']);

        if(isset($_POST['action'])) {
            //$profile = new \app\models\ProfileInformation();
            //$profile->user_id = $_SESSION['user_id'];
            $profile->first_name = $_POST['first_name'];
            $profile->last_name = $_POST['last_name'];
            $profile->middle_name = $_POST['middle_name'];

            $this->addPicture($profile->user_id);

            $success = $profile->update();
            if($success == 1) {
                header('location:/Profile/index?success= Profile Edited!');   
            }
            else if($success == 0){
                header('location:/Profile/index?success= Profile Not Changed.');
            }
            else {
                header('location:/Profile/index?error=Something went wrong.');
            }
        }
        else {
            $this->view('Profile/edit', $profile);
        }
    }

    public function addPicture($user_id) {
        // && $_FILES['profilePicture']['error'] == UPLOAD_ERR_OK
        if(isset($_FILES['profilePicture'])) {
            echo "helhle";
            $info = getimagesize($_FILES['profilePicture']['tmp_name']);
            $allowedTypes = [
                'IMAGETYPE_JPEG' => '.jpg',
                'IMAGETYPE_PNG' => '.png',
                'IMAGETYPE_GIF' => '.gif',
            ];
            if($info === false) {
                header('location:/Profile/index?error=Bad file format');
            }
            else if(!array_key_exists($info[2],  $allowedTypes)){
                header('location:/Profile/index?error=The webstie does not support this image format');
            }
            else {
                move_uploaded_file($_FILES['profilePicture']['tmp_name'], "../images/" . $user_id . $allowedTypes[$info[2]]);
                // $path = getcwd().DIRECTORY_SEPERATOR.'images'.DIRECTORY_SEPERATOR;
                // $fileName = uniqid().$allowedTypes[$info[2]];
                // move_uploaded_file($_FILES['profilePicture']['tmp_name'], $path . $fileName);
            }
        }
        else {
            $this->view('Profile/edit', $profile);
        }
    }
}