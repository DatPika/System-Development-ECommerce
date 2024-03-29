<?php
namespace app\validators;

use Attribute;
use app\core\Validator;

#[Attribute]
class DistanceLength implements Validator{
    public function isValid($data) : bool {
        $data = (int) $data;
        return ($data < 10000 && $data >= 0);
    }
}