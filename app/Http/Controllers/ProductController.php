<?php

namespace App\Http\Controllers;

// # 2.2 import model product
use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

// # 1.1 Benerin nama classnya
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {   
        // # 4 Benerin refer view ke folder views/products
        return view('products.index', [
            'products' => Product::latest()->paginate(3)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request) : RedirectResponse
    {
        Product::create($request->all());
        // # 8 benerin routing
        return redirect()->route('products.index')
                ->withSuccess('New product is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product) : View
    {
        return view('products.show', [
            // # 9 benerin nama variabel
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product) : View
    {
        return view('products.edit', [
            // # 11 'products' -> 'product'
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product) : RedirectResponse
    {
        $product->update($request->all());
        return redirect()->back()
                ->withSuccess('Product is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */

    // # 2.1 Benerin parameter Product
    public function destroy(Product $product) : RedirectResponse
    {
        $product->delete();
        // # 12 'index' -> 'products.index'
        return redirect()->route('products.index')
                ->withSuccess('Product is deleted successfully.');
    }
}