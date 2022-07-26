<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Gender;
use App\Models\Product;
use App\Models\Product_media;
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
     * create function for add Product form
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
    public function store(Request $request)
    {
        // dd($request);
        $valid = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'description' => 'required|string',
            'color' => 'required|string|max:255',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'quantity' => 'required|numeric|min:0',
            'gender_id' => 'required|min:1',
            'size_id' => 'required|min:1',
            'category_id' => 'required|array|min:1',
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);
        $product = new Product;
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->description = $request->description;
        $product->color = $request->color;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->gender_id = $request->gender_id;
        $product->size_id = $request->size_id;
        $product->summary = '';
        $product->save();
        $product->categories()->attach($request->category_id);

        if ($request->hasfile('images')) {
            $images = $request->file('images');
            $imageArray = [];
            foreach ($images as $image) {
                $path =  basename($image->store('public'));
                array_push($imageArray, [
                    'image' => $path,
                    'label' => '',
                    'product_id' => $product->id
                ]);
            }
            Product_media::insert($imageArray);
        }
        session()->flash('success', 'Product has been successfully created!');
        return redirect('/admin/product');
    }
    public function edit(Product $product)
    {

        $title = 'Admin | Product';
        $categories = Category::all();
        $genders = Gender::all();
        $sizes = Size::all();
        $product->load(['categories', 'product_media']);
        $oldCategoryIds = $product->categories->pluck('id');
        return view('admin/product/edit', compact('title', 'categories', 'genders', 'sizes', 'product', 'oldCategoryIds'));
    }
    public function update(Request $request, $id)
    {
        // dd($request);

        $product = Product::find($id);
        $savedMedia = $product->product_media()->count();
        $isMediaRequired = $savedMedia > 0 ? 'nullable' : 'required';
        $valid = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'description' => 'required|string',
            'color' => 'required|string|max:255',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'quantity' => 'required|numeric|min:0',
            'gender_id' => 'required|min:1',
            'size_id' => 'required|min:1',
            'category_id' => 'required|array|min:1',
            'images' => $isMediaRequired,
            'images.*' => 'image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->description = $request->description;
        $product->color = $request->color;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->gender_id = $request->gender_id;
        $product->size_id = $request->size_id;
        $product->summary = '';
        $product->update();
        $product->categories()->sync($request->category_id);

        if ($request->hasfile('images')) {
            $images = $request->file('images');
            $imageArray = [];
            foreach ($images as $image) {
                $path =  basename($image->store('public'));
                array_push($imageArray, [
                    'image' => $path,
                    'label' => '',
                    'product_id' => $product->id
                ]);
            }
            Product_media::insert($imageArray);
        }
        session()->flash('success', 'Product has been updated successfully!');
        return redirect('/admin/product');
    }
    public function deleteMedia($id)
    {
        $media = Product_media::find($id);
        if ($media->delete()) {
            return response()->json([
                'success' => 'Media has been deleted successfully!'
            ]);
        }
        return response()->json([
            'error' => 'There was a problem deleting media!'
        ]);
    }
    public function destroy(Product $product)
    {
        if ($product->delete()) {
            session()->flash('success', 'Product has been deleted successfully');
            return redirect('/admin/product');
        }
        session()->flash('error', 'There was a problem deleting the product!');
        return redirect('/admin/product');
    }
}
