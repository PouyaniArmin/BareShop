<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $bestProducts=Product::where('is_active',true)->take(4)->get();
        $categories=Category::withCount('products')->take(3)->get();
        return view('home',compact('bestProducts','categories'));
    }
}