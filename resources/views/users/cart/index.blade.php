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
                        <h2>@lang('messages.cart.shopping_cart')</h2>
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
                    <div class="shoping__cart__table" id="shoping__cart__table">
                        <table>
                            <thead>
                            <tr>
                                <th class="shoping__product">@lang('messages.cart.product_name')</th>
                                <th>@lang('messages.cart.price')</th>
                                <th>@lang('messages.cart.image')</th>
                                <th>@lang('messages.cart.quantity')</th>
                                <th>@lang('messages.cart.total')</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody id="table-container">
                            @if($cart)
                                @foreach( $cart->items as $product)
                                    <tr id="row-container-{{$product['id']}}">
                                        <td class="shoping__cart__item">
                                            <h5>{{ $product['product_name'] }}</h5>
                                        </td>
                                        <td class="shoping__cart__price">
                                            {{ $product['price'] }}
                                        </td>
                                        <td>
                                            <img src="{{asset('image/'.$product['product_image'])}}" alt="">
                                        </td>
                                        <td class="shoping__cart__quantity">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <span class="dec qtybtn"
                                                          onclick="onCartItemQuantityChanged('{{ $product['id']}}',false)">-</span>
                                                    <input id="quantity-{{$product['id']}}" name="quantity" type="text"
                                                           value="{{ $product['quantity']}}">
                                                    <span class="inc qtybtn" onclick="onCartItemQuantityChanged('{{$product['id']}}',true)">+</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="shoping__cart__total" id="shoping__cart__total">
                                            {{$product['price'] * $product['quantity'] }}
                                        </td>
                                        <td class="shoping__cart__item__close">
                                            <button id="add_button_delete"
                                                    onclick="removeProductCart({{$product['id']}})"
                                                    class="btn btn-danger btn-sm ml-4 float-right">@lang('messages.cart.remove')
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>@lang('messages.cart.detail')</h5>
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>@lang('messages.users.user_name')</th>
                                    <th>@lang('messages.users.address')</th>
                                    <th>@lang('messages.users.phone')</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{Auth::user()->user_name}}</td>
                                    <td>{{Auth::user()->address}}</td>
                                    <td>{{Auth::user()->phone}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5></h5>
                        <ul>
                            <li>@lang('messages.cart.total_quantity') <span id="show_quantity">{{$cart->totalQuantity}}</span></li>
                            <li>@lang('messages.cart.total') <span id="show_price">{{$cart->totalPrice}} VND</span></li>
                        </ul>
                        <a href="{{route('orders.store')}}" class="primary-btn">@lang('messages.cart.checkout')</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
@endsection
