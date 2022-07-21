<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TermsController extends Controller
{
    public function index()
    {
        $title = 'Terms & Conditions';
        return view('terms', compact('title'));
    }
}
