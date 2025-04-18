<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductManagementController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $products = Product::all();
        return view('panel/products/productsManger', compact('user', 'products'));
    }
    public function create()
    {
        $user = Auth::user();
        $categories = Category::all();
        return view('panel/products/createProduct', compact('user', 'categories'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'stock' => 'required|integer',
            'discount' => 'nullable|numeric',
            'is_active' => 'nullable|boolean',
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'primary_image' => 'required|string',
        ]);
        $product = Product::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'category_id' => $validated['category_id'],
            'stock' => $validated['stock'],
            'discount' => $validated['discount'] ?? 0,
            'is_active' => $request->has('is_active'),
            'seller_id' => Auth::user()->id,
        ]);
        $uploadedImages = [];
        $isFirst = true;

        foreach ($request->file('images') as $file) {
            $path = $file->store('product_images', 'public');


            $isPrimary = $isFirst;
            if ($isFirst) {
                $isFirst = false;
            }

            $uploadedImages[] = $product->images()->create([
                'image_path' => $path,
                'is_primary' => $isPrimary,
            ]);
        }
        return redirect('dashboard/products');
    }
    public function edit($id)
    {
        $user = Auth::user();
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $images = $product->images;
        return view('panel/products/editProduct', compact('user', 'product', 'categories', 'images'));
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'stock' => 'required|integer|min:0',
            'is_active' => 'nullable|boolean',
            'discount' => 'nullable|numeric|min:0|max:100',
            'primary_image' => 'nullable|exists:product_images,id',
            'new_images' => 'nullable|array',
            'new_images.*' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
            'delete_images' => 'nullable|array',
            'delete_images.*' => 'exists:product_images,id',
        ]);

        $product = Product::findOrFail($id);
        $product->update([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'price' => $validated['price'],
            'category_id' => $validated['category_id'],
            'stock' => $validated['stock'],
            'is_active' => $validated['is_active'] ?? false,
            'discount' => $validated['discount'] ?? null,
        ]);
        if (!empty($validated['delete_images'])) {
            foreach ($validated['delete_images'] as $imageId) {
                $image = ProductImage::find($imageId);
                if ($image) {
                    Storage::delete('public/' . $image->image_path);
                    $image->delete();
                }
            }
        }
        if ($request->hasFile('new_images')) {
            foreach ($request->file('new_images') as $file) {
                $path = $file->store('product_images', 'public');
                $product->images()->create([
                    'image_path' => $path,
                    'is_primary' => false,
                ]);
            }
        }
        if (!empty($validated['primary_image'])) {
            foreach ($product->images as $image) {
                $image->is_primary = ($image->id == $validated['primary_image']) ? true : false;
                $image->save();
            }
        }
        return redirect('dashboard/products');
    }
    public function destroy($id){
        $product=Product::findOrFail($id);
        foreach ($product->images as $image) {
            Storage::delete('public/' . $image->image_path);
            $image->delete();
        }
        $product->delete();
        return redirect('dashboard/products');
    }
}
