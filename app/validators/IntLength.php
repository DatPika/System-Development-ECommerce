<?php
namespace app\validators;

use Attribute;
use app\core\Validator;

#[Attribute]
class IntLength implements Validator{
    public function isValid($data) : bool {
        $data = (int) $data;
        return ($data < 1000 && $data >= 0);
    }
}