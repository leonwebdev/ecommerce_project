<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gender;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Product';
        $categories = Category::all();
        $genders = Gender::all();
        $sizes = Size::all();
        $products = Product::with('product_media')->get();
        return view('products/index', compact('title', 'categories', 'genders', 'sizes', 'products'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::with(['product_media', 'gender', 'size', 'categories'])->where('slug', $slug)->first();
        $title = $product->title;
        return view('products/show', compact('title', 'product'));
    }
}
