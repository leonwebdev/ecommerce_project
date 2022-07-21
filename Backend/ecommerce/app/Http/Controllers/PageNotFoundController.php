<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageNotFoundController extends Controller
{
    public function index()
    {
        $title = '404 Page Not Found';
        return view('404PageNotFound', compact(
            'title',
        ));
    }
}
