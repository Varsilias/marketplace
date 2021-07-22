<?php

namespace App\client;

use App\core\Validator; 

class Input 
{
    public static function getName($name)
    {
        $validator = new Validator();
        $data = $validator->ValidateString($name);
        return $data;
    }

    public static function getEmail($email)
    {
        $validator = new Validator();
        $data = $validator->validateEmail($email);
        return $data;

    }
    
    public static function checkPassword($password, $confirmPassword)
    {
        $check = $password === $confirmPassword;
        if (!$check) {
            return "Passwords do not match";
        }
        
        return $password;
    }

    public static function getPassword($password)
    {
        return $password;
    }

    
}