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
    public function index(Request $request)
    {

        $categoryFilterStr = $request->query('category');
        $categoryFilter = explode(',', $categoryFilterStr);
        $sizeFilterStr = $request->query('size');
        $sizeFilter = explode(',', $sizeFilterStr);
        $title = 'Product';
        $categories = Category::all();
        $genders = Gender::all();
        $sizes = Size::all();
        $products = Product::with('product_media')->get();
        // $selectedCategory = 
        return view('products/index', compact('title', 'categories', 'genders', 'sizes', 'products', 'categoryFilter', 'sizeFilter'));
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
