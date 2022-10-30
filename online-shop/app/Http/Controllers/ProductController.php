<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('subcategory')->get();
        $categories = Category::get();
        $subcategories = Subcategory::get();

        return view('product.manageProducts', [
            'products' => $products,
            'categories' => $categories,
            'subcategories' => $subcategories,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'description' => 'required|max:1000',
            'subcategory' => 'required|integer',
            'price' => 'required|integer',
            'thumbnail' => 'required|mimes:jpg,jpeg,png|max:1000',
        ]);

        if($validator->fails()) {
            return response('Wrong input.', 400);
        }

        if($request->hasFile('thumbnail')){

            $thumbnail = $request->file('thumbnail')->store('images/thumbnails', 'public');
        }

        Product::create([
            'title' => $request->name,
            'description' => $request->description,
            'subcategory_id' => $request->subcategory,
            'price' => $request->price,
            'thumbnail' => $thumbnail,
        ]);

        return redirect()->route('products.manage'); 
    }

    public function destroy(Request $request)
    {
        $product = Product::findOrFail($request->productId);

        if ($product) {            
            Storage::disk('public')->delete($product->thumbnail);
            
            $product->delete();

            return redirect()->route('products.manage'); 
        }

        return response('Not found.', 400);
    }

    public function showProductList(Request $request) 
    {
        $products = Product::with('subcategory')->get();
        $categories = Category::get();
        $subcategories = Subcategory::get();

        return view('product.productList', [
            'products' => $products,
            'categories' => $categories,
            'subcategories' => $subcategories,
        ]);
    }

    public function getFilteredByCategory($categoryId, Request $request)
    {
        
    }

    public function searchProduct(Request $request)
    {
        $products = Product::with('subcategory')->where('title', 'LIKE', $request->search)->get();
        $categories = Category::get();
        $subcategories = Subcategory::get();

        return view('product.productList', [
            'products' => $products,
            'categories' => $categories,
            'subcategories' => $subcategories,
        ]);
    }
}
