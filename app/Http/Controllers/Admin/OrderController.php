<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Repositories\Interfaces\OrderDetaiRepositoryInterface;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\User;

class OrderController extends Controller
{
    private $orderRepository;
    private $userRepository;
    private $orderDetailRepository;

    public function __construct(OrderRepositoryInterface $orderRepository, UserRepositoryInterface $userRepository, OrderDetaiRepositoryInterface $orderDetailRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->userRepository = $userRepository;
        $this->orderDetailRepository = $orderDetailRepository;
    }

    public function index()
    {
        $order_list = $this->orderRepository->getOrders();
        return view('admin.orders.index', compact(['order_list']));

    }

    public function show($id)
    {
        $order = $this->orderRepository->findOrders($id);
        if (!$order) {

            return redirect()->back();

        }

        return view('admin.orders.detail', [
            'order' => $order,
        ]);
    }

    public function destroy($id)
    {
        $deleteResult = $this->orderRepository->deleteOrder($id);
        if ($deleteResult) {
            return redirect()->route('orders.index')->with('Success', trans('messages.orders.success'));

        } else {

            return redirect()->back()->with('Fail', trans('messages.orders.fail'));
        }
    }

    public function changeStatus(Request $request)
    {
        $order = $this->orderRepository->findOrders($request->order_id);
        if ($order) {
            $order->status = $request->status;
            $order->save();
            return redirect()->with(['success' => @trans('messages.status.success')]);
        } else
        {
            return redirect()->with(['fail' => @trans('messages.status.fail')]);
        }
    }

}
