@section('content')
    @extends('admin.layouts.master')
@section('title', 'admin')

<div class="card-body">
    <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>@lang('messages.orders.id')</th>
            <th>@lang('messages.orders.product_name')</th>
            <th>@lang('messages.product.image')</th>
            <th>@lang('messages.orders.order_id')</th>
            <th>@lang('messages.orders.quantity')</th>
            <th>@lang('messages.users.phone')</th>
            <th>@lang('messages.users.address')</th>
            <th>@lang('messages.users.user_name')</th>
        </tr>
        </thead>
        <tbody>
        @foreach($order->order_details as $key => $order_detail)
            <tr>
                <td>{{$order_detail->id}}</td>
                <td>{{$order_detail->product->product_name}}</td>
                <td><img id="format_image" src="{{ asset('image/'.$order_detail->product->product_image)}}">
                </td>
                <td>{{$order_detail->order_id}}</td>
                <td>{{$order_detail->quantity}}</td>
                <td>{{$order->user->phone}}</td>
                <td>{{$order->user->address}}</td>
                <td>{{$order->user->user_name}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
