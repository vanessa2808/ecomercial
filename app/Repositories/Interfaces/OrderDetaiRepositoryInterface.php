<?php

namespace App\Repositories\Interfaces;

interface OrderDetaiRepositoryInterface
{
    public function getOrderDetails();

    public function findOrders($id);

}
