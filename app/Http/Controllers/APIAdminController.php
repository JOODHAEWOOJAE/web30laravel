<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class APIAdminController extends Controller
{
    public function create(Request $request){
        $post = new Post();
        $post->author_id = $request->post('author');
        $post->title = $request->post('title');
        $post->body = $request->post('body');
        $post->image = $request->post('image');
        $post->save();
        return response()->json($post, 201);
    }

    public function update(Request $request, $id){
        $post = Post::find($id);
        $post->author_id = $request->post('author');
        $post->title = $request->post('title');
        $post->body = $request->post('body');
        $post->image = $request->post('image');
        $post->save();
        return response()->json($post, 200);
    }
}
