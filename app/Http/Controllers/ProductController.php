<?php

namespace App\Http\Controllers;

use App\Models\ProductDetails;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productpage()
    {
        $products = ProductDetails::all();
        return view('product.product', compact('products'));
    }
    public function showUploadForm()
    {
        return view('product.upload');
    }
    public function uploadProduct(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }

        ProductDetails::create([
            'product_name' => $request->input('product_name'),
            'product_image' => $imageName,
        ]);

        return redirect()->route('productpage')->with('success', 'Product updated successfully!');
    }
    public function showEditForm($id)
    {
        $product = ProductDetails::findOrFail($id);
        return view('product.edit', compact('product'));
    }

    public function updateProduct(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required|string',
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = ProductDetails::findOrFail($id);

        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $product->product_image = $imageName;
        }

        $product->product_name = $request->input('product_name');
        $product->save();

        return redirect()->route('productpage')->with('success', 'Product updated successfully!');
    }

    public function deleteProduct($id)
    {
        $product = ProductDetails::findOrFail($id);
        $product->delete();

        return redirect()->route('productpage')->with('success', 'Product deleted successfully!');
    }
    public function searchProducts(Request $request)
    {
        $query = $request->input('query');

        // Split the query into separate terms
        $searchTerms = explode(' ', $query);

        // Query products where product_name matches any of the search terms
        $products = ProductDetails::query();

        foreach ($searchTerms as $term) {
            $products->where('product_name', 'LIKE', "%$term%");
        }

        $products = $products->get();
        return view('product.product', compact('products'));
    }
}
