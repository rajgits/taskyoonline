<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $post = auth()->user()->posts;
 
        return response()->json([
            'success' => true,
            'data' => $post
        ]);
    }

    public function store(Request $request)
    {
        $Post = new Post();
        $Post->post_text = $request->post_text;
        $Post->post_type = $request->post_type;

        if (auth()->user()->Posts()->save($Post))   
            return response()->json([
                'success' => true,
                'message'=> 'Post added successfully!',
                'data' => $Post->toArray()
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Post could not be added'
            ], 500);
    }
}
