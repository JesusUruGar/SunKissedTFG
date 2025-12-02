<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        return view('admin.index');
    }

    public function indexUsers()
    {
        return view('admin.users');
    }

    public function indexProducts()
    {
        return view('admin.products');
    }

}
