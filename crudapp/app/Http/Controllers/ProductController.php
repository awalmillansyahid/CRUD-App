<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function add()
    {
        return view('products.add');
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
        ]);

        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->image = $request->input('image');
        $product->save();

        return redirect()->route('products.index')->with('success', 'Produk berhasil disimpan.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string'
        ]);

        $product = Product::findOrFail($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->image = $request->input('image');
        $product->save(); // Simpan perubahan

        return redirect()->route('products.index')->with('success', 'Produk berhasil diedit.');
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete(); // Hapus produk

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
    }
}
