<?php

namespace App\Repositories\Eloquent;

use App\Jobs\SendEmailToAdmin;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Mockery\Exception;
use Illuminate\Http\Request;
use Mail;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    public function getModel()
    {
        return Order::class;
    }

    public function getOrders()
    {
        return Order::with('user')->paginate(Config::get('app.paginate'));
    }

    public function findOrders($id)
    {
        $result = $this->model->with(['order_details' => function($query) {
            return $query->with('product');
        }])->find($id);
        if ($result) {
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

    public function createOrder(array $data)
    {
        if (!Session::has('cart'))
        {
            return redirect()->route('cart.show');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        DB::beginTransaction();
        try {
            $new_order = new Order();
            $new_order->user_id = Auth::user()->id;
            $new_order->status = config('const.status.unapproved');
            $new_order->total_price = $cart->totalPrice;
            $new_order->save();
            foreach ($cart->items as $key => $product) {
                $new_order_detail = new OrderDetail();
                $new_order_detail->quantity = $product['quantity'];
                $new_order_detail->order_id = $new_order->id;
                $new_order_detail->product_id = $product['id'];
                $new_order_detail->created_at = Carbon::now();
                $new_order_detail->save();
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
        DB::commit();
        session()->forget('cart');

        return true;
    }

}
