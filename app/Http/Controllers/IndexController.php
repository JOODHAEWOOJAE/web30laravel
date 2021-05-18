<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(){
        $posts = Post::orderBy('id', 'DESC')->get();
        return view('home', ['posts' => $posts]);
    }
}
