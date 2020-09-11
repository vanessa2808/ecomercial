@section('content')
    @extends('admin.layouts.master')
@section('title', 'admin')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">@lang('messages.product.add_product')</h3>
                    </div>
                    <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label id="category_custom"
                                   for="exampleInputEmail1">@lang('messages.product.category')</label>
                            <select name="category_id" id="category_id" data-placeholder="Choose category id"
                                    class="form-control select2">
                                <option value="" label="Choose category name"></option>
                                @foreach($category_list as $category)
                                    <option style="color: white"
                                            value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group" id="category_custom">
                            <label for="exampleInputEmail1">@lang('messages.product.product_name')</label>
                            <input type="text" class="form-control" id='product_name' name="product_name"
                                   placeholder="Enter category name" required>
                        </div>
                        <div class="col-sm-12" id="category_custom">
                            <!-- textarea -->
                            <div class="form-group">
                                <label>@lang('messages.product.description')</label>
                                <textarea class="form-control" id="description" name="description" rows="3"
                                          placeholder="Enter ..."></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label id="category_custom" for="exampleInputFile">@lang('messages.product.image')</label>
                            <div id="category_custom" class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile"
                                           name="product_image">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">@lang('messages.product.price')</label>
                                <input type="text" class="form-control" id='price' name="price"
                                       placeholder="Enter category name" required>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">@lang('messages.product.amount')</label>
                                <input type="number" class="form-control" id='amount' name="amount"
                                       placeholder="Enter amount" required>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">@lang('messages.category.submit')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
