<?php

namespace App\Models;

use App\config\DB as DB;

class ProductModel 
{
    public static function create(array $data)
    {
        // print_r($data);
        $pdo = DB::getInstance();
        $sql = "INSERT INTO products (name, image, description, price, stock, discount, user_id) VALUES (:name, :image, :description, :price, :stock, :discount, :user_id)";

        $stmt = $pdo->prepare($sql);

        if (count($data) > 0) {
            $stmt->execute([
                ':name' => $data['name'],
                ':image' => $data['image'], 
                ':description' => $data['description'],
                 
                ':price' =>  $data['price'], 
                ':stock' => $data['stock'],
                ':discount' => $data['discount'],

                ':user_id' => $data['user_id'] 

            ]);
        }

        $status = $stmt->rowCount();
        if ($stmt->rowCount() != 1) {
            $status = 'Could not create product';
        } else {
            $status = 'One record affected';
        }
        return $status;
    }

    public static function getProducts(int $userId)
    {
        $pdo = DB::getInstance();
        $sql = "SELECT id, name, image, description, price, stock, discount FROM products WHERE user_id = :user_id";
        $stmt = $pdo->prepare($sql);

        if (isset($userId)) {
            $stmt->execute([
                ':user_id' => $userId 
            ]);
        }

        $result = $stmt->fetchAll();

        return $result;

    }

    public static function getProductById(int $productId, int $userId)
    {
        $pdo = DB::getInstance();
        $sql = "SELECT id, name, image, description, price, stock, discount FROM products WHERE id = :id AND user_id = :user_id";
        $stmt = $pdo->prepare($sql);

        if (isset($productId, $userId)) {
            $stmt->execute([
                ':id' => $productId,
                ':user_id' => $userId
            ]);
        }

        $result = $stmt->fetch();
        return $result;

    }


    public static function updateProductById(array $data)
    {
        $pdo = DB::getInstance();
        $sql = "UPDATE products SET name = :name, description = :description, price = :price, stock = :stock, discount = :discount WHERE id = :id AND user_id = :user_id";
        $stmt = $pdo->prepare($sql);

        if (isset($data)) {
            $stmt->execute([
                'id' => $data['id'],
                ':name' => $data['name'],
                ':description' => $data['description'],
                 
                ':price' =>  $data['price'], 
                ':stock' => $data['stock'],
                ':discount' => $data['discount'],

                ':user_id' => $data['user_id'] 

            ]);
        }

        if ($stmt->rowCount() != 1) {
            $status = 'Error: Record not updated';
        } else {
            $status = 'One record affected';
        }

        return $status;

    }

    public static function deleteProductById(int $productId, int $userId)
    {
        $pdo = DB::getInstance();
        $sql = "DELETE FROM products WHERE id = :id AND user_id = :user_id";
        $stmt = $pdo->prepare($sql);

        if (isset($productId, $userId)) {
            $stmt->execute([
                ':id' => $productId,
                ':user_id' => $userId
            ]);
        }

        if ($stmt->rowCount() != 1) {
            $status = 'Error: Record not deleted';
        } else {
            $status = 'One record affected';
        }

        return $status;
    }

}