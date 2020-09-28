@section('content')
    @extends('admin.layouts.master')
@section('title', 'admin')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">@lang('messages.users.list_user')</h3>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>@lang('messages.users.id')</th>
                                <th>@lang('messages.users.user_name')</th>
                                <th>@lang('messages.users.role_id')</th>
                                <th>@lang('messages.users.phone')</th>
                                <th>@lang('messages.users.email')</th>
                                <th>@lang('messages.users.address')</th>
                                <th>@lang('messages.users.action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user_list as $key => $user)
                                <tr>
                                    <td>{{$key +1}}</td>
                                    <td>{{$user->user_name}}</td>
                                    <td>
                                        @if($user->role_id == 0)
                                            Admin
                                        @else
                                            User
                                        @endif
                                    </td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->address}}</td>
                                    <td>
                                        <a href="{{route('users.edit', $user->id)}}"
                                           class="btn btn-primary rounded-circle ml-3"><i
                                                class="fas fa-pen text-white">@lang('messages.users.edit')</i>
                                        </a>
                                        <form method="POST" action="{{asset('admin/users/'.$user->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <td>
                                        <input type="submit" name="submit" value="@lang('messages.users.delete')"
                                               class="btn btn-danger rounded-circle ml-3"
                                               id="button">
                                    </td>
                                    </form>
                                    </td>
                                    <td>
                                        <a href="{{route('users.show',$user->id)}}"
                                           class="btn btn-primary rounded-circle ml-3"><i
                                                class="fas fa-pen text-white">@lang('messages.users.show_detail')</i>
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($user_list->hasPages())
        {{ $user_list->links() }}
    @endif
</section>
@endsection
