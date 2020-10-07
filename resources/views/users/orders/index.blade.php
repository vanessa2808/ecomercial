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
                        <h2>@lang('messages.order.order_product')</h2>
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
                                <th>@lang('messages.users.id')</th>
                                <th>@lang('messages.orders.total_price')</th>
                                <th>@lang('messages.orders.status')</th>
                                <th>@lang('messages.product.create_at')</th>
                                <th>@lang('messages.orders.show_detail')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order_list as $key => $order)
                                @if(Auth::user()->email === $order->user->email)
                                    <tr>
                                        <td>
                                            {{$key +1}}
                                        </td>
                                        <td>
                                            {{$order->total_price}}
                                        </td>
                                        <td>
                                            @if($order->status === config('const.status.approved'))
                                                @lang('messages.status.approved')
                                            @else
                                                @lang('messages.status.unapproved')
                                            @endif
                                        </td>
                                        <td>
                                            {{$order->created_at->translatedFormat('l j F Y H:i:s')}}
                                        </td>
                                        <td>
                                            <a href="{{route('users.orders.show',$order->id)}}"
                                               class="btn btn-primary rounded-circle ml-3"><i
                                                    class="fas fa-pen text-white">@lang('messages.orders.show_detail')</i>
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @if($order_list->hasPages())
            {{ $order_list->links() }}
        @endif
    </section>
@endsection
