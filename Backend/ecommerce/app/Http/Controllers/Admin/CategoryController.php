<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Index function
     *
     * @return void
     */
    public function index()
    {
        $title = 'Admin | Category';
        $categories = Category::latest()->simplePaginate(10);
        
        return view('/admin/category/index', compact('categories','title'));
    }
}
