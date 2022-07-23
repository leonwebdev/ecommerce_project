<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\User_address;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Title for this Controller
     *
     * @var string
     */
    protected $title = 'Admin | User';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = $this->title;
        $users = User::latest()->paginate($this->MAX_PER_PAGE);
        return view('admin.user.index', compact('users', 'title'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $title = $this->title;
        $address = $user->full_address_obj();
        // var_dump($user);
        // die;
        return view('admin.user.edit', compact('user', 'address', 'title'));
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
            'first_name' => ['required', 'string', 'min:3', 'max:255'],
            'last_name' => ['required', 'string', 'min:3', 'max:255'],
            'phone' => [
                'required', 'string', 'min:10', 'max:255',
                'regex:/^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$/',
            ],
            'email' => ['required', 'string', 'email', 'min:5', 'max:255', 'unique:users,email,' . $id,],
            'street' => ['required', 'string', 'min:3', 'max:255'],
            'city' => ['required', 'string', 'min:3', 'max:255'],
            'province' => ['required', 'string', 'min:3', 'max:255'],
            'country' => ['required', 'string', 'min:3', 'max:255'],
            'postal_code' => ['required', 'string', 'min:6', 'max:255'],
        ]);

        $user = User::find($id);
        $address = User_address::find($user->default_address_id);

        // $v_user = [];
        // $v_address = [];

        $v_user['first_name'] = $valid['first_name'];
        $v_user['last_name'] = $valid['last_name'];
        $v_user['phone'] = $valid['phone'];
        $v_user['email'] = $valid['email'];
        $v_address['street'] = $valid['street'];
        $v_address['city'] = $valid['city'];
        $v_address['province'] = $valid['province'];
        $v_address['country'] = $valid['country'];
        $v_address['postal_code'] = $valid['postal_code'];

        // var_dump($v_user, $v_address);
        // die;

        $user->update($v_user);
        $address->update($v_address);

        if ($user->save() && $address->save()) {
            session()->flash('success', 'User information was successfully updated.');
        } else {
            session()->flash('error', 'There was a problem updating the User');
        }
        return redirect('/admin/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user->delete()) {
            session()->flash('success', 'User was deleted');
            return redirect('/admin/user');
        }
        session()->flash('error', 'There was a problem deleting the User');
        return redirect('/admin/user');
    }
}