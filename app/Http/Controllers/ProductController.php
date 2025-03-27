<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);

        return view('admin.products.list', [
            'products' => $products
        ]);
    }

    public function create()
    {
        return view('admin.products.create', [
            'categories' => Category::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'categoryId' => 'required|exists:categories,id',
            'slug' => 'required|string|unique:products',
            'price' => 'required|numeric|min:0|max:999999999.99',
            'description' => 'required|string',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',

            'productImages' => 'nullable|array',
            'productImages.*' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
        ]);

        // Xử lí upload file cho thumbnail của product
        if ($request->hasFile('thumbnail')) {
            $validatedData['thumbnail'] = $request->file('thumbnail')->store('product_thumbnails');
        }

        $product = Product::create($validatedData);

        // Xử lí upload file cho bảng product image
        $images = [];
        if ($request->hasFile('productImages')) {
            foreach ($request->file('productImages') as $file) {
                $images[] = ['image_url' => $file->store('product_images')];
            }
        }

        // $product->productImages()->createMany($images);

        return redirect()->back();
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
