<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        return view('product.manageProducts');
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

        return response('Product added successfully.', 200);
    }
}
