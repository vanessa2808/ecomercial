<?php

namespace App\Repositories\Eloquent;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use DB;
use Illuminate\Support\Facades\Config;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{

    public function getModel()
    {
        return Order::class;
    }

    public function getOrders()
    {

        return $this->model->paginate(Config::get('app.paginate'));

    }

    public function findOrders($id)
    {
        $result = $this->model->find($id);
        if ($result)
        {
            return $result;
        }

        return false;
    }

    public function deleteOrder($id)
    {
        $result = $this->model->find($id);
        if ($result) {
            $result->delete();

            return true;
        }
        return false;
    }

}
