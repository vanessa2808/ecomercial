<?php

namespace App\Repositories\Interfaces;

interface ProductRepositoryInterface
{
    public function getProducts();

    public function createProduct(array $data);

    public function findProducts($id);

    public function updateProduct($id, array $attributes);

    public function deleteProduct($id);

}
