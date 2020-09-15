<?php


namespace App\Repositories\Interfaces;

interface BaseRepositoryInterface
{
    public function getAll();

    public function find($id);

    public function create($attributes = []);

    public function update($id, $attributes = []);

    public function delete($id);
}
