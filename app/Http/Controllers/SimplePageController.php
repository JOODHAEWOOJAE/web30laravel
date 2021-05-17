<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SimplePageController extends Controller
{
    public function about()
    {
        return view('about');
    }

    public function services()
    {
        return view('services');
    }

    public function contacts()
    {
        return view('contacts');
    }
}
