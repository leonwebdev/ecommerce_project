<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TermsController extends Controller
{
    public function index()
    {
        $title = 'terms';
        return view('terms', compact(
            'title',
        ));
    }
}
