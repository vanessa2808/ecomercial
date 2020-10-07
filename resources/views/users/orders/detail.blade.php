@section('content')
    @extends('users.layouts.master')

    @if( session()->has('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
    @endif

    <section class="breadcrumb-section set-bg" data-setbg="user_layouts/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>@lang('messages.orders.order_detail')</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">@lang('messages.cart.home')</a>
                            <span>@lang('messages.cart.shopping_cart')</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                            <tr>
                                <th>@lang('messages.orders.id')</th>
                                <th>@lang('messages.orders.product_name')</th>
                                <th>@lang('messages.product.image')</th>
                                <th>@lang('messages.orders.quantity')</th>
                                <th>@lang('messages.product.price')</th>
                                <th>@lang('messages.cart.total')</th>
                                <th>@lang('messages.users.phone')</th>
                                <th>@lang('messages.users.address')</th>
                                <th>@lang('messages.users.user_name')</th>
                                <th>@lang('messages.orders.status')</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order->order_details as $key => $order_detail)
                                    <tr>
                                        <td>
                                            {{$key +1}}
                                        </td>
                                        <td>
                                            {{$order_detail->product->product_name}}
                                        </td>
                                        <td><img id="format_image" src="{{ asset('image/'.$order_detail->product->product_image)}}">
                                        <td>{{$order_detail->quantity}}</td>
                                        <td>
                                            {{$order_detail->product->price}}
                                        </td>
                                        <td>
                                            {{$order_detail->quantity*$order_detail->product->price}}
                                        </td>
                                        <td>{{$order->user->phone}}</td>
                                        <td>{{$order->user->address}}</td>
                                        <td>{{$order->user->user_name}}</td>
                                        <td>
                                            @if($order->status === config('const.status.approved'))
                                                @lang('messages.status.approved')
                                            @else
                                                @lang('messages.status.unapproved')
                                            @endif
                                        </td>
                                    </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="col-lg-6">
                            <div class="shoping__checkout">
                                <h5></h5>
                                <ul>
                                    <li>@lang('messages.cart.total') <span id="show_price">${{money_format('%.3n',$order->total_price)}}</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
