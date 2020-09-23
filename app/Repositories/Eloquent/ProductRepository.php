<?php

namespace App\Repositories\Eloquent;

use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use DB;
use Illuminate\Support\Facades\Config;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{

    public function getModel()
    {
        return Product::class;
    }

    public function getProducts()
    {

        return $this->model->paginate(Config::get('app.paginate'));

    }

    public function getProductHome()
    {

        return $this->model->paginate(Config::get('app.paginateHome'));

    }

    public function createProduct(array $data)
    {
        $result = false;
        try {
            if ($data['product_image']) {
                $file = $data['product_image'];
                $image = uniqid() . '_' . $file->getClientOriginalName();
                $file->move('image', $image);
            }
            $product = $this->model->create([
                'category_id' => $data['category_id'],
                'product_name' => $data['product_name'],
                'description' => $data['description'],
                'product_image' => $image,
                'price' => $data['price'],
                'amount' => $data['amount']
            ]);
            $result = true;
        } catch (Exception $exception) {

            return $result;
        }

        return $result;
    }

    public function findProducts($id)
    {
        $result = $this->model->find($id);
        if ($result) {
            return $result;
        }

        return false;
    }

    public function updateProduct($id, array $data)
    {
        $result = false;
        try {
            if (!isset($data['product_image'])) {
                $data['product_image'] = '';
                $file = '';
            }
            if ($data['product_image']) {
                $file = $data['product_image'];
                $image = uniqid() . '_' . $file->getClientOriginalName();
                $file->move('image', $image);
            }
            $product = $this->model->find($id);
            $product = $this->model->update([
                'category_id' => $data['category_id'],
                'product_name' => $data['product_name'],
                'description' => $data['description'],
                'product_image' => $image,
                'price' => $data['price'],
                'amount' => $data['amount']
            ]);
            $result = true;
        } catch (Exception $exception) {

            return $result;
        }

        return $result;
    }

    public function deleteProduct($id)
    {
        $result = $this->model->find($id);
        if ($result) {
            $result->delete();

            return true;
        }
        return false;
    }

}
