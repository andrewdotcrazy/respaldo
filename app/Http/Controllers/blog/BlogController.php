<?php

namespace App\Http\Controllers\blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class BlogController extends Controller
{
    function index(){
        $posts = Post::paginat(2);
        return view('blog.index', compact('posts'));
    }

    function show(int $id)
      {

        // if (Cache::has('post_show_' . $post->id)) {
        //     return Cache::get('post_show_' . $post->id);
        // } else {
        //     $cacheView = view('blog.show', ['post' => $post])->render();
        //     Cache::put('post_show_' . $post->id, $cacheView);
        //     return $cacheView;
        // }

        return cache()->rememberForever('post_show_' . $id, function () use ($id) {
            $post = Post::with('category')->find($id);
            return view('blog.show', ['post' => $post])->render();
        });



        //return view('blog.show', ['post' => $post]);
    }
}
