<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Post;

class PostsController extends Controller
{

    function return_posts()
    {
        $posts = Post::all();
        return view('dashboard-front.posts')->with('posts' , $posts);
    }

    function create_post_view()
    {
        return view('dashboard-front.create_governrate');
    }

    function create(Request $request)
    {
        Governrate::create([
            'name' => $request->name , 

        ]);
        $governrates = Governrate::all();
        return redirect('governrates')->with('governrates' , $governrates);

    }


    function show(Request $request)
    {

    }

    function edit_post_view(Request $request)
    {
        $post_id = $request->id;
        return view('dashboard-front.edit_post')->with('post_id' , $post_id);

    }



    function edit(Request $request)
    {
        Post::where('id' , $request->post_id)->update([
            'title' => $request->title
        ]);
        $posts = Post::all();
        return redirect('posts')->with('posts' , $posts);
    }

    function delete(Request $request)
    {

        $post=Post::find($request->id);
        $post->delete();
        $posts = Post::all();
        return redirect('posts')->with('posts' , $posts);
    }
}
