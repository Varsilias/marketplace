<?php

namespace App\core\Requests;

use App\Models\ProductModel;

class ProductRequest 
{
    public function sendProduct(array $data)
    {
        $message = $this->createProduct($data);
        return $message;
    }

    private function createProduct(array $data)
    {
        $status = ProductModel::create($data);
        return $status;
    }

    public function getAllProducts(int $userId)
    {
        $products = $this->getProducts($userId);
        return $products;
    }

    private function getProducts(int $userId)
    {
        $products = ProductModel::getProducts($userId);
        return $products;
    }

    public function getSingleProduct(int $productId, int $userId)
    {
        $product = $this->findProduct($productId, $userId);
        return $product;
    }

    private function findProduct(int $productId, int $userId)
    {
        $product = ProductModel::getProductById($productId, $userId);
        return $product;
    }

    public function updateProduct(array $data)
    {
        $message = $this->update($data);
        return $message;
    }

    private function update(array $data)
    {
        $status = ProductModel::updateProductById($data);
        return $status;
    }

    public function deleteProduct(int $productId, int $userId)
    {
        $message = $this-> delete($productId, $userId);
        return $message;
    }

    private function delete(int $productId, int $userId)
    {
        $status = ProductModel::deleteProductById($productId, $userId);
        return $status;
    }
}