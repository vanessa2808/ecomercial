<?php

namespace App\Repositories\Interfaces;

interface OrderRepositoryInterface
{
    public function getOrders();

    public function findOrders($id);

    public function deleteOrder($id);

}
