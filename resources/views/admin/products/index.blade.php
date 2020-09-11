@section('content')
    @extends('admin.layouts.master')
@section('title', 'admin')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">@lang('messages.product.list_product')</h3>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>@lang('messages.product.id')</th>
                                <th>@lang('messages.product.category_name')</th>
                                <th>@lang('messages.product.product_name')</th>
                                <th>@lang('messages.product.description')</th>
                                <th>@lang('messages.product.image')</th>
                                <th>@lang('messages.product.price')</th>
                                <th>@lang('messages.product.amount')</th>
                                <th>@lang('messages.product.create_at')</th>
                                <th>@lang('messages.product.update_at')</th>
                                <th>@lang('messages.category.action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($product_list as $key => $product)
                                <tr>
                                    <td>{{$key +1}}</td>
                                    <td>{{$product->category->category_name}}</td>
                                    <td>{{$product->product_name}}</td>
                                    <td>{{$product->description}}</td>
                                    <td> <img id="styleImage" src="{{ asset('image/'.$product->product_image)}}"></td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->amount}}</td>
                                    <td>{{$product->created_at}}</td>
                                    <td>{{$product->updated_at}}</td>
                                    <td>
                                        <a href="{{route('products.edit', $product->id)}}"
                                           class="btn btn-primary rounded-circle ml-3"><i
                                                class="fas fa-pen text-white">@lang('messages.category.edit')</i>
                                        </a>
                                        <form method="POST" action="{{asset('admin/products/'.$product->id)}}">
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
    @if($product_list->hasPages())
        {{ $product_list->links() }}
    @endif

</section>
@endsection
