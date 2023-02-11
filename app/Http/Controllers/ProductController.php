<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Foundation\Http\FormRequest;

class ProductController extends Controller
{
    public function index()
    {
        $productService = new ProductService();
        $products = $productService->index();

        return view('products.index', compact('products'));
    }

    public function store(FormRequest $request)
    {
        $productService = new ProductService();
        $product = $productService->store($request);

        return redirect()->route('products.index');
    }

    public function show(Product $product)
    {
        $productService = new ProductService();
        $product = $productService->show($product);

        return view('products.show', compact('product'));
    }

    public function update(FormRequest $request, Product $product)
    {
        $productService = new ProductService();
        $product = $productService->update($request, $product);

        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $productService = new ProductService();
        $productService->destroy($product);

        return redirect()->route('products.index');
    }
}
