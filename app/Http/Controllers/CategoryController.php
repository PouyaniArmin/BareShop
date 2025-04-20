<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $categories = Category::all();
        return view('panel/categories/categoryManager', compact('user', 'categories'));
    }
    public function create()
    {
        $user = Auth::user();
        return view('panel/categories/createCategory', compact('user'));
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required|string|max:355',
            'description'=>'nullable|string'
        ]);
        Category::create([
            'name'=>$request->name,
            'description'=>$request->description    
        ]);
        return redirect('/dashboard/category');
    }

    public function edit(Request $request,$id){
        $user=Auth::user();
        $category=Category::findOrFail($id);
        return view('panel/categories/editCategory', compact('user','category'));
    }
    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $category=Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
            'description' => $request->description,    
        ]);
        return redirect('/dashboard/category');
    }
    public function destroy($id){
        $category=Category::findOrFail($id);
        $category->delete();
        return redirect('/dashboard/category');
    }
}
