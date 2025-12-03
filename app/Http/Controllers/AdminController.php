<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class AdminController extends Controller
{

    public function index()
    {
        return view('admin.index');
    }

    public function indexUsers()
    {
        $users = User::orderBy('id','desc')->paginate(10);

        return view('admin.users', compact('users'));
    }

    public function indexProducts()
    {
        $products = Product::orderBy('id','desc')->paginate(10);

        return view('admin.products', compact('products'));
    }

}
