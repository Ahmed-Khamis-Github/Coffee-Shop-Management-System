<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(7);

        return View('dashboard.products.index', compact('products'));

    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return View('dashboard.products.create',  ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $slug = $request->merge([
            "slug"=>Str::slug($request->name)
        ]);
      $request_data = $request->all();
        if ($request->hasFile('image')) {
            $image = $request_data["image"];
            $path = $image->store('uploadedfile', 'product_uploads');
            $request_data["image"]=$path;
        }
        $product = Product::create($request_data);
         return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product= Product::findOrFail($id);
        $category = Category::get();
        return View('dashboard.products.edit', compact('product', 'category'),);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, String $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        $product->delete();
        return redirect()->route('products.index');
    }

        // all soft deleted
        public function archive()
        {
            $products = Product::onlyTrashed()->paginate(7);

            return View('dashboard.products.archive', compact('products'));

        }
				//restore
        public function restore(string $id)
        {
            $products = Product::withTrashed()->findOrFail($id);
            $products->restore();

            return redirect()->route('products.index');
        }
}
