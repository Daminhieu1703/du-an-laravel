<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Order;
use App\Models\Product;
use App\Models\Sector;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $products = Product::select('id')->count();
        $sectors = Sector::select('id')->count();
        $comments = Comment::select('id')->count();
        $users = User::select('id')->count();
        $orders = Order::select('id')->count();
        $order_list = Order::select('*')->get();
        return view('admin.homepage',compact('products','sectors','comments','users','orders','order_list'));
    }
}
