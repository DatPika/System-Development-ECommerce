<?php
namespace app\filters;
#[\Attribute]
class Login implements \app\core\AccessFilter{
    public function execute() {
        if(!isset($_SESSION['user_id'])){
            header('location:/User/login');
            return true; // not enoguh, we have to tell the router to do nothing
        }
        return false;
    }
}