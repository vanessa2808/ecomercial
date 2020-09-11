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
                    <div class="shoping__cart__table">
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
                            <tbody>
                            @if($cart)

                                @foreach( $cart->items as $product)
                                    <tr>
                                        <td class="shoping__cart__item">
                                            <h5>{{ $product['product_name'] }}</h5>
                                        </td>
                                        <td class="shoping__cart__price">
                                            {{ $product['price'] }}
                                        </td>
                                        <td>
                                            <img src="{{asset('image/'.$product['product_image'])}}" alt="">
                                        </td>
                                        <form action="{{ route('cart.update',$product['id'])}}" method="post">
                                            @csrf
                                            @method('put')
                                            <td class="shoping__cart__quantity">
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <input id="quantity" name="quantity" type="text"
                                                               value="{{ $product['quantity']}}">
                                                    </div>
                                                </div>
                                            </td>
                                            <button type="submit" class="btn btn-secondary btn-sm">Change</button>
                                        </form>
                                        <td class="shoping__cart__total">
                                            {{$product['price'] * $product['quantity'] }}
                                        </td>
                                        <td class="shoping__cart__item__close">
                                            <form action="{{ route('product.remove', $product['id'] )}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger style1 btn-sm ml-4 float-right">@lang('messages.cart.remove')
                                                </button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="#" class="primary-btn cart-btn">@lang('messages.cart.continue')</a>
                        <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            @lang('messages.cart.update')</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>@lang('messages.cart.discount')</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">@lang('messages.cart.apply')</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5></h5>
                        <ul>
                            <li>@lang('messages.cart.total_quantity') <span>{{$cart->totalQuantity}}</span></li>
                            <li>@lang('messages.cart.total') <span>{{$cart->totalPrice}} VND</span></li>
                        </ul>
                        <a href="#" class="primary-btn">@lang('messages.cart.checkout')</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
@endsection
