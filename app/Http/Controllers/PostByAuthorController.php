<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;

class PostByAuthorController extends Controller
{
    public function __invoke($key){
        $author = Author::where('key', '=', $key)->first();

        return view('posts_by_author', ['author' => $author]);
    }
}
