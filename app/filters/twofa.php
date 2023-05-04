<?php
namespace app\filters;
#[\Attribute]
class twofa implements \app\core\AccessFilter{

    public function execute() {
        if(isset($_SESSION['secretkey']) && !empty($_SESSION['secretkey'])){
            header('location:/User/verify2fa');
            return true;
        }
        return false;
    }
}