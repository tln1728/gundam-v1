<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category:id,name')->withCount('variants')->paginate(10);

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

    public function store(ProductStoreRequest $request)
    {
        dd($request->all());
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

        return redirect()->back()->with('success','Tạo sản phẩm thành công');
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
