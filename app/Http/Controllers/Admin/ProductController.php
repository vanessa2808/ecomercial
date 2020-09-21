<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productRepository;
    private $categoryRepository;

    public function __construct(ProductRepositoryInterface $productRepository, CategoryRepositoryInterface $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $product_list = $this->productRepository->getProducts();

        return view('admin.products.index', compact(['product_list']));

    }

    public function create()
    {

        return view('admin.products.add', compact(['product']));

    }

    public function store(ProductRequest $request)
    {
        if ($this->productRepository->createProduct($request->only('category_id', 'product_name', 'description','product_image', 'price','amount')))
        {

            return redirect()->route('products.index')->with('Success', trans('messages.product.success'));

        } else {

            return redirect()->route('products.index')->with('Fail', trans('messages.product.fail'));
        }
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $product = $this->productRepository->findProducts($id);

        return view('admin.products.edit', compact('product'));
    }


    public function update(ProductRequest $request, $id)
    {
        $update = $this->productRepository->updateProduct($id, $request->all());
        if ($update)
        {

            return redirect()->route('products.index')->with('Success', trans('messages.product.success'));

        } else {

            return redirect()->route('products.edit')->with('Fail', trans('messages.product.fail'));
        }
    }

    public function destroy($id)
    {
        $deleteResult = $this->productRepository->deleteProduct($id);
        if ($deleteResult)
        {
            return redirect()->route('products.index')->with('Success', trans('messages.product.success'));

        } else {

            return redirect()->back()->with('Fail', trans('messages.product.fail'));
        }
    }

}
