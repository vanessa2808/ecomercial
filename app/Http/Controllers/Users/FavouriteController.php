<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\Interfaces\FavoriteRepositoryInterface;
use App\Repositories\Eloquent\FavoriteRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class FavouriteController extends Controller
{
    private $favoriteRepository;

    public function __construct(FavoriteRepositoryInterface $favoriteRepository)
    {
        $this->middleware('auth');
        $this->favoriteRepository = $favoriteRepository;
    }

    public function index()
    {
        $favorite_list = $this->favoriteRepository->getFavorites();

        return view('users.favorites.index', compact(['favorite_list']));
    }


    public function update(Request $request, $id)
    {
        try {
            $update = $this->favoriteRepository->updateFavorite($id, $request->all());

            return response()->json($update);
        } catch (Exception $e) {

            return back()->with('fail', trans('messages.favorite.fail'));
        }
    }

    public function destroy($id)
    {
        $deleteResult = $this->favoriteRepository->deleteFavorite($id);
        if ($deleteResult) {
            return response()->json($deleteResult);

        } else {

            return redirect()->back()->with('Fail', trans('messages.product.fail'));
        }
    }

}
