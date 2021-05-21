<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class PostsByCategoryController extends Controller
{
    public function __invoke($key)
    {
        $category = Category::where('key', '=', $key)->first();

        return view('post_by_category', ['category' => $category]);
    }
}
