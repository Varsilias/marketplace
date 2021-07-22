<?php

namespace App\core\Requests;

use App\Models\UserModel;

class UserRequest
{
    public function sendRegisterRequest(array $data)
    {
        $message = $this->registerUser($data);
        return $message;

    }

    private function registerUser(array $data) 
    {
        $status = UserModel::create($data);
        return $status;
    }
    
    public function sendLoginRequest(array $data)
    {
        $user = $this->find($data);
        return $user;
    }

    private function find(array $data) 
    {
        // print_r($data);
        $result = UserModel::login($data);
        return $result;
    }

    public function sendPasswordResetRequest($data)
    {
        $status = $this->updatePassword($data);
        return $status;
    }

    private function updatePassword($data)
    {
        $result = UserModel::update($data);
        return $result;
    }

}