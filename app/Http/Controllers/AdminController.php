<?php

namespace App\Http\Controllers;

use App\models\Client;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    //

    public function index()
    {
        return view('layouts.front.free-admin');
    }


    public function users()
    {
        $clients = Client::all();
        return view('layouts.front.users', compact('clients'));
    }

    public function roles()
    {
        $roles = Role::all();
        return view('layouts.front.roles', compact('roles'));
    }

    function add_role_view()
    {
        return view('layouts.front.add-role-view');

    }

    function add_role(Request $request)
    {
        Role::create(['name' => $request->role_name , 'guard_name' => $request->guard_name]);
        $roles = Role::all();
        return redirect('roles')->with('roles' , $roles);

    }

    function edit_role_view(Request $request , $id)
    {
        $role_id = $id;
        return view('layouts.front.edit-role-view' , compact('role_id'));        
    }


    function edit_role(Request $request , $id)
    {

        $role = Role::find($id);
        $role->update(['name' => $request->role_name , 'guard_name' => $request->guard_name]);
        $roles = Role::all();
        return redirect('roles')->with('roles' , $roles);

    }

    function delete_role(Request $request)
    {

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
