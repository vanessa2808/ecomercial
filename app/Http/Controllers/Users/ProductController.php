<?php

namespace App\Http\Controllers\Users;

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
        $product_list = $this->productRepository->getProductHome();

        return view('users.products.index', compact(['product_list']));

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
