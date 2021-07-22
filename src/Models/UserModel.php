<?php

namespace App\Models;

use App\config\DB as DB;


class UserModel 
{

    public static function create(array $data)
    {
        $pdo = DB::getInstance();
        $sql = "INSERT INTO users (firstname, lastname, email, password) VALUES (:firstname, :lastname, :email, :password)";
        $stmt = $pdo->prepare($sql);

        if (count($data) > 0) {
            $stmt->execute([

                ':firstname' => $data['firstname'],
                ':lastname' => $data['lastname'], 
                ':email' => $data['email'], 
                ':password' => password_hash($data['password'], PASSWORD_BCRYPT)

            ]);
        }

        $status = $stmt->rowCount();
        if ($stmt->rowCount() != 1) {
            $status = 'Error: Record not deleted';
        } else {
            $status = 'One record affected';
        }
        return $status;

    }

    public static function login(array $data)
    {
        $user = self::getUserByEmail($data['email']);

        if ($user == false) {
            return 'Wrong user credentials';
        } else {

            $pdo = DB::getInstance();
            $sql = "SELECT id, firstname, lastname, email, password FROM users WHERE email = :email AND password = :password LIMIT 1";
            $stmt = $pdo->prepare($sql);


            
            if (count($data) > 0) {
                $check = password_verify($data['password'], $user['password']);

                if (!$check) {
                    
                    return "Wrong password provided";

                } else {

                    $stmt->execute([
                        ':email' => $data['email'], 
                        ':password' => $user['password']

                    ]);
                }

                $result = $stmt->fetch();
            }

        
            return $result;

        }


    }

    public static function update(array $data)
    {
        $user = self::getUserByEmail($data['email']);

        if ($user == false) {
            return 'Wrong user credentials';
        } else {

            $pdo = DB::getInstance();
            $sql = "UPDATE users SET password = :password WHERE email = :email";
            $stmt = $pdo->prepare($sql);

            if (count($data) > 0) {
                $hash = password_hash($data['password'], PASSWORD_BCRYPT);

                $stmt->execute([
                    ':email' => $data['email'], 
                    ':password' => $hash

                ]);

                if ($stmt->rowCount() != 1) {
                    $status = 'Error: Record not updated';
                } else {
                    $status = 'One record affected';
                }

            }

            return $status;

        }

    }

    public static function getUserByEmail($email)
    {
        $pdo = DB::getInstance();
        $sql = "SELECT id, firstname, lastname, email, password FROM users WHERE email = :email LIMIT 1";
        $stmt = $pdo->prepare($sql);

        if (isset($email)) {
            $stmt->execute([
                ':email' => $email 
            ]);
        }

        $result = $stmt->fetch();

        if (empty($result)) {
            return false;
        } else {
            return $result;
        }

    }

    
}