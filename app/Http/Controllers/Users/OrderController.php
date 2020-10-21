<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmailToAdmin;
use App\Jobs\SendEmailToUser;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Repositories\Interfaces\OrderDetaiRepositoryInterface;
use Mail;

class OrderController extends Controller
{
    protected $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->middleware('auth');
        $this->orderRepository = $orderRepository;
    }

    public function index()
    {
        $order_list = $this->orderRepository->getOrders();
        return view('users.orders.index', compact(['order_list']));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        if ($this->orderRepository->createOrder($request->all()))
        {
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            $orderedProducts = session('cart');
            $total =$cart->totalPrice;
            SendEmailToAdmin::dispatch(config('const.admin_email.admin_mail'), $orderedProducts, $total);
            SendEmailToUser::dispatch(Auth::user()->email, $orderedProducts, $total);

            return redirect()->back()->with('success', trans('messages.order.success'));

        } else {

            return redirect()->route('cart.index')->with('fail', trans('messages.order.fail'));

        }
    }

    public function show($id)
    {
        $order = $this->orderRepository->findOrders($id);
        if((!$order) || ($order->user_id != Auth::user()->id))
        {

            return redirect()->back();

        }

        return view('users.orders.detail', [
            'order' => $order,
        ]);
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
