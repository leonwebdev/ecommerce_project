<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tax;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaxController extends Controller
{
    /**
     * Index function
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {

        $title = 'Admin | Tax';
        $search = $request->query('search');

        if ($search) {
            $taxes = Tax::where('province', 'LIKE', '%' . $search . '%')->orWhere('province_short', 'LIKE', '%' . $search . '%')->latest()->paginate(10);
        } else {
            $taxes = Tax::latest()->paginate(10);
        }
        return view('/admin/tax/index', compact('title', 'taxes'));
    }
}
