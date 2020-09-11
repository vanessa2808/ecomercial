@section('content')
    @extends('admin.layouts.master')
@section('title', 'admin')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">@lang('messages.users.edit_user')</h3>
                    </div>
                    <form action="{{route('users.update', $user->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">@lang('messages.users.user_name')</label>
                                <input type="text" class="form-control" value="{{$user->user_name}}" id='user_name'
                                       name="user_name"
                                       placeholder="Enter user name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label id="category_custom"
                                   for="exampleInputEmail1">@lang('messages.users.role_id')</label>
                            <select style="margin-left: 20px" name="role_id" id="role_id" data-placeholder="Choose role id"
                                    class="form-control select2">
                                <option disabled value="{{$user->role_id}}">
                                    @if($user->role_id == 0)
                                        Admin
                                    @else
                                        User
                                    @endif
                                </option>
                                <option value="0">Admin</option>
                                <option value="1">User</option>
                            </select>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">@lang('messages.users.phone')</label>
                                <input type="text" class="form-control" value="{{$user->phone}}" id='phone' name="phone"
                                       placeholder="Enter phone" required>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">@lang('messages.users.email')</label>
                                <input type="email" class="form-control" value="{{$user->email}}" id='email'
                                       name="email"
                                       placeholder="Enter email" required>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">@lang('messages.users.address')</label>
                                <input type="text" class="form-control" id='address' value="{{$user->address}}"
                                       name="address"
                                       placeholder="Enter address" required>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">@lang('messages.users.password')</label>
                                <input type="password" class="form-control" id='password' value="{{$user->password}}"
                                       name="password"
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
