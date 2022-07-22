<?php

namespace App\Http\Controllers\Admin;

use App\Models\Inquiry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InquiryController extends Controller
{
    /**
     * Index function
     *
     * @return void
     */
    public function index()
    {
        $title = 'Admin | Inquiry';
        $inquiries = Inquiry::latest()->simplePaginate(10);
        
        return view('/admin/inquiry/index', compact('inquiries','title'));
    }
}
