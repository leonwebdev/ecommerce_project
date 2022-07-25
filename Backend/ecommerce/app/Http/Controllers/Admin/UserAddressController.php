<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\User_address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Admin | Address';
        $addresses = User_address::orderBy('user_id', 'asc')->paginate($this->MAX_PER_PAGE);
        return view('admin.address.index', compact('title', 'addresses',));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User_address $address)
    {
        $title = 'Admin | Address';
        // $address = $user_address;
        return view('admin.address.edit', compact('address', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $valid = $request->validate([
            'street' => ['required', 'string', 'min:3', 'max:255'],
            'city' => ['required', 'string', 'min:3', 'max:255'],
            'province' => ['required', 'string', 'min:3', 'max:255'],
            'country' => ['required', 'string', 'min:3', 'max:255'],
            'postal_code' => ['required', 'string', 'min:6', 'max:255'],
        ]);

        $address = User_address::find($id);
        $address->update($valid);

        if ($address->save()) {
            session()->flash('success', 'Address information was successfully updated.');
        } else {
            session()->flash('error', 'There was a problem updating the Address');
        }
        return redirect('/admin/address');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address = User_address::find($id);
        if ($address->delete()) {
            session()->flash('success', 'Address was deleted');
            return redirect('/admin/address');
        }
        session()->flash('error', 'There was a problem deleting the Address');
        return redirect('/admin/address');
    }

    /**
     * Admin Update the User Default Address.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateDefaultAddress(Request $request, $id)
    {
        $user_address = User_address::find($id);
        $user = User::find($user_address->user_id);
        $valid['default_address_id'] = $id;
        $user->update($valid);
        return redirect('/admin/address');
    }
}