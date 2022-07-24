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
            ],
        );
        User_address::find($id)->update($valid);
        return redirect('/profile');
    }
}