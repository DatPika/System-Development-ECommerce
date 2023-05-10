<?php
namespace app\controllers;

#[\app\filters\Login]
#[\app\filters\twofa]
class Home extends \app\core\Controller{
    public function index() {
        $home = new \app\models\Home();
        $home = $home->getAll();
        $this->view('Home/index', $home);
    }
}