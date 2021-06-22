<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class CartAction extends Controller
{
    public function add($id)
    {
        $post = Post::find($id);
        \Cart::add([
            'id' => $post->id,
            'name' => $post->title,
            'price' => $post->author_id,
            'quantity' => 1,
            'attributes' => [
                'image' => $post->image,
            ],
        ]);
        \Session::flash('flash', $post->title . '---' . 'Добавлен ');
        return back();
    }

    public function show()
    {
        return view('cart');
    }

    public function delete($id)
    {
        \Cart::remove($id);
        return back();
    }

    public function update(Request $request)
    {
        foreach ($request->post() ['items_'] as $id => $quantity){
            \Cart::update($id,[
                'quantity' => [
                    'relative' => false,
                    'value' => $quantity
                ]
            ]);
        }
        return back();
    }
}
