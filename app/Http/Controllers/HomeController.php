<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $bestProducts = Product::where('is_active', true)->take(4)->get();
        $categories = Category::withCount('products')->take(3)->get();
        return view('home', compact('bestProducts', 'categories'));
    }
    public function products()
    {
        $products = Product::latest()->get();
        $categories = Category::all();
        return view('products', compact('products', 'categories'));
    }
    public function filteredProducts(Request $request)
    {

        $query = Product::query()->with('images');
        if ($request->has('category') && is_array($request->category)) {
            $query->whereIn('category_id', $request->category);
        }
        if ($request->has('discount') && $request->discount == '1') {
            $query->whereNotNull('discount_price');
        }
        if ($request->has('active') && $request->active == '1') {
            $query->where('is_active', true);
        }
        if ($request->has('price_min') || $request->has('price_max')) {
            $min = $request->input('price_min', 0);
            $max = $request->input('price_max', 999999);
            $query->whereBetween('price', [$min, $max]);
        }
        $products = $query->latest()->get();
        $categories = Category::all();

        return view('products', compact('products', 'categories'));
    }
    public function sortProducts($type)
    {
        $query = Product::query()->with('images');
        switch ($type) {
            case 'price_asc':
                $products = $query->orderBy('price', 'asc')->get();
                break;
            case 'price_desc':
                $products = $query->orderBy('price', 'desc')->get();
                break;
            case 'latest':
                $products = $query->latest()->get();
                break;
            case 'recommended':
            default:
                $products = $query->latest()->get();
                break;
        }

        $categories = Category::all();

        return view('products', compact('products', 'categories'));
    }
}
