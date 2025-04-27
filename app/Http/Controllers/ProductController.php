<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
{
    // Mengambil produk dengan pagination, 10 produk per halaman
    $products = Product::paginate(10);
    return view('products.index', compact('products'));
}


    public function create()
    {
        return view('products.create');
    }

    public function store(ProductRequest $request)
    {
        Product::create($request->validated());
        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->validated());
        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
    }

    // Menampilkan produk yang sudah dihapus (soft deleted)
    public function deleted()
{
    // Mengambil produk yang sudah dihapus (soft deleted)
    $products = Product::onlyTrashed()->paginate(10);
    return view('products.deleted', compact('products'));
}

    // Restore produk yang sudah dihapus
    public function restore($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->restore();

        return redirect()->route('products.deleted')->with('success', 'Produk berhasil dipulihkan.');
    }
}
