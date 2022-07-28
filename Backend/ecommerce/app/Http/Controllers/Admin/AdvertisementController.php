<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Http\Controllers\Controller;

class AdvertisementController extends Controller
{
   /**
     * Index function
     *
     * @return void
     */
    public function index()
    {
        $title = 'Admin | Advertisement';
        $advertisements = Advertisement::latest()->simplePaginate(10);

        return view('/admin/advertisement/index', compact('advertisements','title'));
    }
     /**
     * create function
     *
     * @return void
     */
    public function create()
    {
        $title = 'Admin | Advertisement';
        $pages = ['all', 'home', 'product-list', 'product-detail',];
        $area = ['top', 'bottom', 'sidebar', 'slider',];
        return view('/admin/advertisement/create', compact('title','pages','area'));
    }
    /**
     * store function
     *
     * @return void
     */
    public function store(Request $request)
    {

        $valid = $request->validate([
            'image' => 'nullable|image',
            'title' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'pages' => 'required|string|max:255',
            'area' => 'required|string|max:255'

        ]);
        if($request->file('image')) {
            $path =  $request->file('image')->store('public');
        }

        // Must give in_print a value
        $valid['image'] = basename($path ?? 'default.jpg') ;
        //$valid['in_print'] = $valid['in_print'] ?? 0;

        Advertisement::create($valid);

        session()->flash('success', 'Advertisement successfully created!');

        return redirect('/admin/advertisement');


    }
    // /**
    //  * edit function
    //  *
    //  * @return void
    //  */
    public function edit(Advertisement $advertisement)

    {

        $title = 'Admin | Advertisement';
        $pages = ['all', 'home', 'product-list', 'product-detail',];
        $area = ['top', 'bottom', 'sidebar', 'slider',];
        return view('/admin/advertisement/edit', compact('advertisement', 'title','pages','area'));
    }
    /**
     * update function
     *
     * @return void
     */
    public function update(Request $request, $id)
    {
        $valid = $request->validate([
            'id' => 'required|integer',
            'image' => 'nullable|image',
            'title' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'pages' => 'required|string|max:255',
            'area' => 'required|string|max:255'
        ]);

        if($request->file('image')) {
            $path = $request->file('image')->store('public');
        }

        $advertisement = Advertisement::find($valid['id']);

        $valid['image'] = basename($path ?? $advertisement->image);

        $advertisement->update($valid);

        if($advertisement->save()) {
            session()->flash('success', 'Advertisement was successfully updated');
        } else {
            session()->flash('error', 'There was a problem updating the advertisement');
        }
        return redirect('/admin/advertisement');

    }
    /**
     * destroy function
     *
     * @return void
     */
    public function destroy(Request $request, $id)
    {
        $advertisement = Advertisement::find($id);
        if($advertisement->delete()) {
            session()->flash('success', 'Advertisement was deleted');
            return redirect('/admin/advertisement');
        }
        session()->flash('error', 'There was a problem deleting the advertisement');
        return redirect('/admin/advertisement');

    }
    public function search(Request $request)
    {
        $advertisements = Advertisement::latest()->where('title','LIKE','%'.$request->input('search')."%")->simplePaginate(10);

        return view('/admin/advertisement', compact('advertisements'));
    }
}