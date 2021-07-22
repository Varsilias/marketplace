<?php

namespace App\core;

class Validator
{

    public function validateEmail(string $email): string
    {
        return $this->isEmail($email);
    }

    public function ValidateString(string $input): string
    {
        return $this->sanitizeStringInput($input);
    }


    private function isEmail(string $email): string
    {
        $email = $this->sanitizeStringInput($email);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        if ($email == false) {
            return false;
        }

        return $email;
    }

    private function sanitizeStringInput(string $input): string
    {
        $trimmedData = trim($input);
        $data = strip_tags($trimmedData);

        return $data;
    }

}