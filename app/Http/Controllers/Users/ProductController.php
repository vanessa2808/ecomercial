<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class ProductController extends Controller
{
    private $productRepository;
    private $categoryRepository;

    public function __construct(ProductRepositoryInterface $productRepository, CategoryRepositoryInterface $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index(Request $request)
    {
        $category_list = $this->categoryRepository->getCategories();
        $product_list = $this->productRepository->getProducts();
        $key = $request->input('key');
        $product_list = Product::latest()->search($key)
            ->paginate(Config::get('app.paginate'));

        return view('users.products.index', compact(['product_list', 'category_list']));

    }

    public function indexShop(Request $request)
    {
        $category_list = $this->categoryRepository->getCategories();
        $product_list = $this->productRepository->getProducts();

        return view('users.shop.index', compact(['product_list', 'category_list']));

    }

    public function show($id)
    {
        $product = $this->productRepository->findProducts($id);

        if(!($product))
        {

            return redirect()->back();

        }

        return view('users.products.product_details', [
            'product' => $product
        ]);
    }

}
