<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class LanguageController extends Controller
{
    public function index(Request $request, $language)
    {
        if ($language) {
            Session::put('language', $language);
        }
        return redirect()->back();
    }
}
