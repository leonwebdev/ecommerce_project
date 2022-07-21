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
     /**
     * create function
     *
     * @return void
     */
    public function create()
    {
        $title = 'Admin | Category';
        return view('/admin/category/create', compact('title'));
    }
    /**
     * store function
     *
     * @return void
     */
    public function store(Request $request)
    {

        $valid = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image'
        ]);
        if($request->file('image')) {
            $path =  $request->file('image')->store('public');
        }

        // Must give in_print a value
        $valid['image'] = basename($path ?? 'default.jpg') ;
        //$valid['in_print'] = $valid['in_print'] ?? 0;

        Category::create($valid);

        session()->flash('success', 'Category successfully created!');
        
        return redirect('/admin/category');


    }
}
