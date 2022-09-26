<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\models\Post;
use App\models\DonationRequest;
use App\Http\Controllers\Controller;


class FrontController extends Controller
{
    //

    function index()
    {
        return view('sitefront.index');
    }

    function register()
    {
        return view('sitefront.register_f');
    }

    
    function signin()
    {
        return view('sitefront.signin');
    }

    function donations()
    {
        $requests = DonationRequest::all();
        return view('sitefront.donations')->with('requests' , $requests);
    }

    function posts()
    {
        $images = array();
        $posts = Post::all();

        // foreach ($posts as $post) {
        //     # code...
        //     $images = Storage::get($post->image);
        // }
        
        return view('sitefront.posts')->with('posts' ,$posts );
    }


    function who_are_us()
    {
        return view('sitefront.who_are_us');
    }

    function contact_us()
    {
        return view('sitefront.contact_us');
    }

    function post_details(Request $request)
    {
        $post = Post::find($request->id);
        return view('sitefront.post_details')->with('post' , $post);
    }
    function donation_details()
    {
        return view('sitefront.donation_details');
    }
    function create_donation()
    {
        return view('sitefront.create_donation');
    }
    function about_app()
    {
        return view('sitefront.about_app');
    }
}
