<?php

namespace App\Http\Controllers;

use App\models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    //

    public function index()
    {
        return view('free-admin');
    }


    public function users()
    {
        $clients = Client::all();
        return view('users', compact('clients'));
    }


   



    function login(Request $request)
    {
        $validator = validator()->make($request->all() , [

            'phone' => 'required',
            'password' => 'required',
            
        ]);


        if ($validator->fails()) {
            # code...
             return response()->json(['msg'=>"validation error"]);
        }

        $credentials = [
        'phone' => $request->phone ,
        'password' => $request->password ,
        ];

        if(Auth::guard('client_web')->attempt($credentials))
        {
            
            $clients = Client::all();
            return redirect()->route('users')->with('clients' , $clients);

        }
        else
        {
           return redirect('login');
        }
    

    }

    public function logout()
    {
        Auth::guard('client_web')->logout();
        return redirect('login');
    }

    public function test()
    {
        return view('test');
    }
}
