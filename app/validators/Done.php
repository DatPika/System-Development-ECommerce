<?php
namespace app\validators;

use Attribute;
use app\core\Validator;

#[Attribute]
class Done implements Validator{
    public function isValid($data) : bool {
        return ($data == "Done" || $data == "Not Done");
    }
}