<?php
namespace app\validators;

use Attribute;
use app\core\Validator;

#[Attribute]
class DoubleLength implements Validator{
    public function isValid($data) : bool {
        $data = (double) $data;
        return ($data < 100000 && $data >= 0);
    }
}