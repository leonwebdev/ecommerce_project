<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Gender;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $title = 'Admin | Product';
        $products = Product::with(['product_media', 'gender', 'size', 'categories'])->latest()->paginate(10);
        return view('/admin/product/index', compact('title', 'products'));
    }
    /**
     * create function for add post form
     *
     * @return void
     */
    public function create()
    {
        $title = 'Admin | Product';
        $categories = Category::all();
        $genders = Gender::all();
        $sizes = Size::all();
        return view('admin/product/create', compact('title', 'categories', 'genders', 'sizes'));
    }
}
