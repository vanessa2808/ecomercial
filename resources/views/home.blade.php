@section('content')
    @extends('users.layouts.master')
    
    <div class="hero__item set-bg" data-setbg="user_layouts/img/hero/banner.jpg">
        <div class="hero__text">
            <span>TASTY FOOD</span>
            <h2>Vegetable <br/>100% Organic</h2>
            <p>@lang('messages.user_layouts.title')</p>
            <a href="#" class="primary-btn">@lang('messages.user_layouts.shop_now')</a>
        </div>
    </div>
@endsection
