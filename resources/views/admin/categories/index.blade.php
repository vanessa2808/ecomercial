@section('content')
    @extends('admin.layouts.master')
@section('title', 'admin')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">@lang('messages.category.list_category')</h3>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>@lang('messages.category.id')</th>
                                <th>@lang('messages.category.parent_id')</th>
                                <th>@lang('messages.category.category_name')</th>
                                <th>@lang('messages.category.action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($category_list as $key => $category)
                                <tr>
                                    <td>{{$key +1}}</td>
                                    <td>
                                        @if($category->parent)
                                            {{ $category->parent->category_name }}
                                        @endif
                                    </td>
                                    <td>{{$category->category_name}}</td>
                                    <td>
                                        <a href="{{route('categories.edit', $category->id)}}"
                                           class="btn btn-primary rounded-circle ml-3"><i
                                                class="fas fa-pen text-white">@lang('messages.category.edit')</i>
                                        </a>
                                        <form method="POST" action="{{asset('admin/categories/'.$category->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <td>
                                        <input type="submit" name="submit" value="@lang('messages.category.delete')"
                                               class="btn btn-danger rounded-circle ml-3"
                                               id="button">
                                    </td>
                                    </form>
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
    @if($category_list->hasPages())
        {{ $category_list->links() }}
    @endif
</section>
@endsection
