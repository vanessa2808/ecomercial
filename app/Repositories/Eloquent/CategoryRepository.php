<?php

namespace App\Repositories\Eloquent;

use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use DB;
use Illuminate\Support\Facades\Config;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{

    public function getModel()
    {
        return Category::class;
    }

    public function getCategories()
    {
        return $this->model->paginate(Config::get('app.paginate'));
    }

    public function createCategory(array $data)
    {
        $category = $this->model->create([
            'category_name' => $data['category_name'],
            'parent_id' => $data['parent_id']
        ]);
    }

    public function findCategories($id)
    {
        $result = $this->model->find($id);
        if ($result)
        {
            return $result;
        }

        return false;
    }

    public function updateCategory($id, array $data)
    {
        try {
            $category = $this->model->find($id);
            $category->category_name = $data['category_name'];
            $category->parent_id = $data['parent_id'];
            $category->save();
        } catch (Exception $exception) {

            return false;
        }

        return true;
    }

    public function deleteCategory($id)
    {
        $result = $this->model->find($id);
        if ($result) {
            $result->delete();

            return true;
        }
        return false;
    }

}
