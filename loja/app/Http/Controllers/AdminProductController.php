<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProductRequest;

use App\Models\Product;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('admin.products', compact('products'));
    }

    public function create()
    {
        return view('admin.product_create');
    }

    public function store(StoreProductRequest $request)
    {
        $input = $request->validate();

        $input['slug'] = Str::slug($input['name']);

        if (!empty($input['cover']) && $input['cover']->isValid()) {
            $file = $input['cover'];
            $path = $file->store('products');
            $input['cover'] = $path;
        }

        Product::create($input);

        return Redirect::route('admin.products');
    }

    public function show()
    {
    }

    public function edit(Product $product)
    {
        return view('admin.product_edit', [
            'product' => $product
        ]);
    }

    public function update(StoreProductRequest $request, Product $product)
    {
        $input = $request->validate();

        $input['slug'] = Str::slug($input['name']);

        if (!empty($input['cover']) && $input['cover']->isValid()) {
            Storage::delete($product->cover ?? '');

            $file = $input['cover'];
            $path = $file->store('products');
            $input['cover'] = $path;
        }

        $product->fill($input);
        $product->save();

        return Redirect::route('admin.products');
    }

    public function destroy(Product $product)
    {
        Storage::delete($product->cover ?? '');
        $product->delete();

        return Redirect::route('admin.products');
    }

    public function destroyImage(Product $product)
    {
        Storage::delete($product->cover ?? '');
        $product->cover = null;
        $product->save();

        // pagina anterior
        return Redirect::back();
    }
}
