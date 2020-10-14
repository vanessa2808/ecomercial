<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface FavoriteRepositoryInterface
{
    public function updateFavorite($id, array $array);

    public function getFavorites();

    public function deleteFavorite($id);
}
