<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{

    public function orderHistory()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(10);

        return view('user.orderHistory', compact('orders'));
    }

    public function viewOrder($id)
    {
        $user = Auth::user();
        $order = $user->orders->where('id', $id)->firstOrFail();

        return view('user.orderView', compact('order'));
    }

}
