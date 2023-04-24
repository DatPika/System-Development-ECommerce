<?php
namespace app\core;

interface Validator {
    public function isValid($data) : bool;//return true if data is valid and false otherwise
}