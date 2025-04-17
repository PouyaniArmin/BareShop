<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductManagementController extends Controller
{
    public function index(){
        $user=Auth::user();
        return view('panel/products/productsManger',compact('user'));
    }
    public function create(){
        $user=Auth::user();
        return view('panel/products/createProduct',compact('user'));
    }
}
