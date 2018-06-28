<?php

namespace App\Http\Controllers\Site;

use App\City;
use App\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function getIndex() {
        $governs = City::all();
        $types   = Type::all();
        return view('site.pages.home.index', compact('governs', 'types'));
    }
}
