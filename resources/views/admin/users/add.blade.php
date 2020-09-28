@section('content')
    @extends('admin.layouts.master')
@section('title', 'admin')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">@lang('messages.users.add_user')</h3>
                    </div>
                    <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">@lang('messages.users.user_name')</label>
                                <input type="text" class="form-control" id='user_name' name="user_name"
                                       placeholder="Enter user name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label id="category_custom"
                                   for="exampleInputEmail1">@lang('messages.users.role_id')</label>
                            <select style="margin-left: 20px" name="role_id" id="role_id" data-placeholder="Choose role id"
                                    class="form-control select2">
                                <option value="" label="Choose user name"></option>
                                <option value="0">Admin</option>
                                <option value="1">User</option>
                            </select>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">@lang('messages.users.phone')</label>
                                <input type="text" class="form-control" id='phone' name="phone"
                                       placeholder="Enter phone" required>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">@lang('messages.users.email')</label>
                                <input type="email" class="form-control" id='email' name="email"
                                       placeholder="Enter email" required>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">@lang('messages.users.address')</label>
                                <input type="text" class="form-control" id='address' name="address"
                                       placeholder="Enter address" required>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">@lang('messages.users.password')</label>
                                <input type="text" class="form-control" id='password' name="password"
                                       placeholder="Enter password" required>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">@lang('messages.users.submit')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
