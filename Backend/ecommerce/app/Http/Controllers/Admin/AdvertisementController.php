<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        return view('/admin/advertisement/create', compact('title'));
    }
    /**
     * store function
     *
     * @return void
     */
    // public function store(Request $request)
    // {

    //     $valid = $request->validate([
    //         'title' => 'required|string|max:255',
    //         'image' => 'nullable|image'
    //     ]);
    //     if($request->file('image')) {
    //         $path =  $request->file('image')->store('public');
    //     }

    //     // Must give in_print a value
    //     $valid['image'] = basename($path ?? 'default.jpg') ;
    //     //$valid['in_print'] = $valid['in_print'] ?? 0;

    //     advertisement::create($valid);

    //     session()->flash('success', 'advertisement successfully created!');
        
    //     return redirect('/admin/advertisement');


    // }
    // /**
    //  * edit function
    //  *
    //  * @return void
    //  */
    // public function edit(advertisement $advertisement)
   
    // {
    //     $title = 'Admin | advertisement';
    //     return view('/admin/advertisement/edit', compact('advertisement', 'title'));
    // }
    // /**
    //  * update function
    //  *
    //  * @return void
    //  */
    // public function update(Request $request, $id)
    // {
    //     $valid = $request->validate([
    //         'id' => 'required|integer',
    //         'title' => 'required|string|max:255',
    //         'image' => 'nullable|image'
    //     ]);

    //     if($request->file('image')) {
    //         $path = $request->file('image')->store('public');
    //     }

    //     $advertisement = advertisement::find($valid['id']);

    //     $valid['image'] = basename($path ?? $advertisement->image);

    //     $advertisement->update($valid);

    //     if($advertisement->save()) {
    //         session()->flash('success', 'advertisement was successfully updated'); 
    //     } else {
    //         session()->flash('error', 'There was a problem updating the advertisement');
    //     }
    //     return redirect('/admin/advertisement');

    // }
    // /**
    //  * destroy function
    //  *
    //  * @return void
    //  */
    // public function destroy(Request $request, $id)
    // {
    //     $advertisement = advertisement::find($id);
    //     if($advertisement->delete()) {
    //         session()->flash('success', 'advertisement was deleted');
    //         return redirect('/admin/advertisement');
    //     }
    //     session()->flash('error', 'There was a problem deleting the advertisement');
    //     return redirect('/admin/advertisement');
        
    // }
    public function search(Request $request)
    {
        $advertisements = Advertisement::latest()->where('title','LIKE','%'.$request->input('search')."%")->simplePaginate(10);
            
        return view('/admin/advertisement', compact('categories'));
    }
}
