<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{

    public function index()
    {
        $products = Product::orderBy('id','desc')->paginate(10);

        return view('home', compact('products'));
    }

}
