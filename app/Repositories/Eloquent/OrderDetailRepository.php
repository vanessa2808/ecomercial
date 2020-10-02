<?php

namespace App\Repositories\Eloquent;

use App\Models\OrderDetail;
use App\Repositories\Interfaces\OrderDetaiRepositoryInterface;
use DB;
use Illuminate\Support\Facades\Config;

class OrderDetailRepository extends BaseRepository implements OrderDetaiRepositoryInterface
{
    public function getModel()
    {
        return OrderDetail::class;
    }

    public function getOrderDetails()
    {

        return $this->model->paginate(Config::get('app.paginate'));

    }

    public function findOrders($id)
    {
        $result = $this->model->find($id);
        if ($result) {
            return $result;
        }

        return false;
    }

}
