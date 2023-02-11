<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @method validate(FormRequest $request, string[] $array)
 */

class ProductService
{
    public function index()
    {
        return Product::all();
    }

    public function store(FormRequest $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'price' => 'required|numeric|min:0'
        ]);

        return Product::create($request->all());
    }

    public function show(Product $product)
    {
        return $product;
    }

    public function update(FormRequest $request, Product $product)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'price' => 'required|numeric|min:0'
        ]);

        $product->update($request->all());

        return $product;
    }

    public function destroy(Product $product)
    {
        $product->delete();
    }
}