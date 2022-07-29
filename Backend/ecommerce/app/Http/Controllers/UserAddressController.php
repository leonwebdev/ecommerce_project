<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\User_address;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

class UserAddressController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User_address $user_address)
    {
        $title = 'Edit Address';
        $user = User::find($user_address->user_id);
        // var_dump($user);
        // die;
        return view('auth.address.edit', compact('user_address', 'title', 'user'));
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
        $valid = $request->validate(
            [
                'street' => ['required', 'string', 'min:3', 'max:255'],
                'city' => ['required', 'string', 'min:3', 'max:255'],
                'province' => ['required', 'string', 'min:3', 'max:255'],
                'country' => ['required', 'string', 'min:3', 'max:255'],
                'postal_code' => ['required', 'string', 'min:6', 'max:255'],
                'terms' => ['required'],
            ],
            [
                'terms.required' => 'Please check here to accept our terms and conditions to Update.',
            ]
        );
        // User_address::find($id)->update($valid);
        if (User_address::find($id)->update($valid)) {
            session()->flash('success', 'Address information was successfully updated.');
        } else {
            session()->flash('error', 'There was a problem updating the Address');
        }
        return redirect('/profile');
    }

    /**
     * Update the User Default Address.
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
        return redirect('/profile#User_address');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add New Address";
        return view('auth.address.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = $request->validate(
            [
                'street' => ['required', 'string', 'min:3', 'max:255'],
                'city' => ['required', 'string', 'min:3', 'max:255'],
                'province' => ['required', 'string', 'min:3', 'max:255'],
                'country' => ['required', 'string', 'min:3', 'max:255'],
                'postal_code' => ['required', 'string', 'min:6', 'max:255'],
                'terms' => ['required'],
            ],
            [
                'terms.required' => 'Please check here to accept our terms and conditions to create.',
            ]
        );
        $user_address = new User_address;
        $user_address->user_id = Auth::user()->id;
        $user_address->street = $valid['street'];
        $user_address->city = $valid['city'];
        $user_address->province = $valid['province'];
        $user_address->country = $valid['country'];
        $user_address->postal_code = $valid['postal_code'];
        // $user_address->save();

        if ($user_address->save()) {
            session()->flash('success', 'Address was successfully created.');
        } else {
            session()->flash('error', 'There was a problem creating the Address');
        }
        return redirect('/profile#User_address');
    }
}