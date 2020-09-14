@section('content')
    @extends('admin.login.layouts.master')
@section('title', 'admin')

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
            <form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
                @csrf
                <span class="login100-form-title p-b-33">
                    @lang('messages.login_admin')
                </span>
                <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                    <input class="input100" type="email" name="email" placeholder="@lang('messages.email')"
                           id="email" @error('email') is-invalid @enderror value="{{ old('email') }}" required
                           autocomplete="email" autofocus>
                    <span class="focus-input100-1"></span>
                    <span class="focus-input100-2"></span>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="password" id="password" @error('password') is-invalid
                           @enderror required autocomplete="current-password" placeholder="@lang('messages.password')">
                    <span class="focus-input100-1"></span>
                    <span class="focus-input100-2"></span>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="container-login100-form-btn m-t-20">
                    <button type="submit" class="login100-form-btn">
                        @lang('messages.login')
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
