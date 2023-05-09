<?php
namespace app\validators;

use Attribute;
use app\core\Validator;

#[Attribute]
class Job implements Validator{
    public function isValid($data) : bool {
        return ($data == "Installation" || $data == "Service" || $data == "Estimation");
    }
}