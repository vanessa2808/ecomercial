<?php

namespace App\Repositories\Interfaces;

interface CategoryRepositoryInterface
{
    public function getCategories();

    public function createCategory(array $data);

    public function findCategories($id);

    public function updateCategory($id, array $attributes);

    public function deleteCategory($id);

}
