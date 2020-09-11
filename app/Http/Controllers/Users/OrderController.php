<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    protected $cart;
    protected $order;
    protected $product;

    public function __construct(Product $product, Order $order, Cart $cart)
    {
        $this->middleware('auth');
        $this->product = $product;
        $this->order = $order;
        $this->cart = $cart;
    }

    public function index()
    {
        return view('users.orders.index');
    }

    public function create()
    {

    }

    public function store(Request $request)
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
            foreach ($cart->items as $key => $product)
            {
                $new_order_detail = new OrderDetail();
                $new_order_detail->quantity = $product['quantity'];
                $new_order_detail->order_id = $new_order->id;
                $new_order_detail->product_id = $product['id'];
                $new_order_detail->created_at = Carbon::now();
                $new_order_detail->save();
            }
        } catch (\Exception $e)
        {
            DB::rollBack();
            return redirect()->back()->with('success', trans('messages.order.fail'));
        }
        DB::commit();
        session()->forget('cart');

        return redirect()->route('cart.show')->with('success', trans('messages.order.success'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }

}
