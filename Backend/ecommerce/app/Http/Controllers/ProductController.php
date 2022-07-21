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
        $title = 'Product';
        // categories and sizes for sidebar
        $categories = Category::all();
        $sizes = Size::all();
        // category filter
        $categoryFilterStr = '';
        $categoryFilter = [];
        $categoryIds = [];
        // size filter
        $sizeFilterStr = '';
        $sizeFilter = [];
        $sizeIds = [];
        // search
        $search = $request->query('search');
        if ($search) {
            $products = Product::with(['product_media', 'categories'])->where('name', 'LIKE', '%' . $search . '%')->get();
        } else if (empty($request->query('category')) && empty($request->query('size'))) {
            $products = Product::with(['product_media', 'categories'])->get();
        } else {
            if ($request->query('category')) {
                $categoryFilterStr = $request->query('category');
                $categoryFilter = explode(',', $categoryFilterStr);
                $categoryIds = Category::whereIn('title', $categoryFilter)->get('id');
            }
            if ($request->query('size')) {
                $sizeFilterStr = $request->query('size');
                $sizeFilter = explode(',', $sizeFilterStr);
                $sizeIds = Size::whereIn('name', $sizeFilter)->get('id');
            }
            if (count($sizeIds) > 0 && count($categoryIds) > 0) {
                // remove categories from list
                $products = Product::with(['product_media', 'categories'])->whereHas('categories', function ($query) use ($categoryIds) {
                    $query->whereIn('category_id', $categoryIds);
                })->whereIn('size_id', $sizeIds)->get();
            } else if (count($sizeIds) > 0) {
                $products = Product::with(['product_media', 'categories'])->whereIn('size_id', $sizeIds)->get();
            } else {
                $products = Product::with(['product_media', 'categories'])->whereHas('categories', function ($query) use ($categoryIds) {
                    $query->whereIn('category_id', $categoryIds);
                })->get();
            }
        }
        return view('products/index', compact('title', 'categories', 'sizes', 'products', 'categoryFilter', 'sizeFilter'));
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
