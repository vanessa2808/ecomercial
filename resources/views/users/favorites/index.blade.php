@section('content')
    @extends('users.layouts.master')

    <section class="breadcrumb-section set-bg" data-setbg="user_layouts/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>@lang('messages.orders.favorite')</h2>
                        <div class="breadcrumb__option">
                            <a href="#">@lang('messages.cart.home')</a>
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
                                <th>@lang('messages.orders.product_name')</th>
                                <th>@lang('messages.product.create_at')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($favorite_list as $key => $favorite)
                                <tr>
                                    <td> {{$key +1}} </td>
                                    <td> {{$favorite->product->product_name}} </td>
                                    <td> {{$favorite->created_at}} </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
