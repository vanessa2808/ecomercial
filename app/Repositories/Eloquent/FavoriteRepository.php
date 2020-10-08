<?php

namespace App\Repositories\Eloquent;

use App\Models\Favorite;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Repositories\Interfaces\FavoriteRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class FavoriteRepository extends BaseRepository implements FavoriteRepositoryInterface
{
    public function getModel()
    {
        return Favorite::class;
    }

    public function getFavorites()
    {
        return Auth::user()->favorites()
            ->with('product')
            ->get();
    }

    public function updateFavorite($id, array $data)
    {
        $favorite = $this->model->create([
            'product_id' => $data['product_id'],
            'user_id' => Auth::user()->id,
        ]);
    }

    public function deleteFavorite($id)
    {
        $result = $this->model->find($id);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }
}
