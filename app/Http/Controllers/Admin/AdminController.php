<?php

namespace App\Http\Controllers\Admin;

use App\models\Client;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Mail\ResetPassword;
use App\Models\User;
use App\Rules\custom_validation;
use App\Rules\password_validation;
use App\Http\Controllers\Controller;




class AdminController extends Controller
{
    //

    public function index()
    {
        return view('dashboard-front.free-admin');
    }


    public function users()
    {
        $clients = Client::all();
        return view('dashboard-front.users', compact('clients'));
    }

    public function roles()
    {
        $roles = Role::all();
        return view('dashboard-front.roles', compact('roles'));
    }

    function add_role_view()
    {
        return view('dashboard-front.add-role-view');

    }

    function add_role(Request $request)
    {
        Role::create(['name' => $request->role_name , 'guard_name' => $request->guard_name]);
        $roles = Role::all();
        return redirect('roles')->with('roles' , $roles);

    }

    function edit_role_view(Request $request , $id)
    {
        $role = Role::find($id);
        
        return view('dashboard-front.edit-role-view')->with('role' , $role);        
    }


    function edit_role(Request $request)
    {
        $role = Role::find($request->role_id);
        $role->update(['name' => $request->role_name , 'guard_name' => $request->guard_name]);
        $roles = Role::all();
        return redirect('roles')->with('roles' , $roles);

    }

    function delete_role(Request $request , $id)
    {
        $role=Role::find($id);
        $role->delete();
        $roles = Role::all();
        return redirect('roles')->with('roles' , $roles);

    }

    function delete_user(Request $request , $id)
    {
        $user=Client::find($id);
        $user->delete();
        $clients = Client::all();
        return redirect('users')->with('clients' , $clients);
    }


    function create_user_view(Request $request)
    {
        return redirect('create-user-view');

    }


    function create_user(Request $request)
    {
        $validator = validator()->make($request->all() , [
            'name' => 'required',
            'email' => 'required',
            'phone' => ['required' , 'unique:clients' , new custom_validation()],
            'password' => ['required' , new password_validation()],
            'city_id' => 'required'
        ]);

       

        if ($validator->fails()) {
            # code...
             return response()->json("validation error");
        }

        else {
               
        $request->merge(["password" => bcrypt($request->password)]);
        $client = Client::create($request->all());
        $client->api_token = Str::random(60);
        $client->governrate_id = $client->city->governrate_id;
        $client->last_donation_date = $request->last_donation_date;
        $client->date_of_birth = $request->date_of_birth;
        $client->status = true;
        $client->save();
        $client->client_role()->attach(4 , ['model_type' => 'normal_user' , 'model_id' => $client->id]);
        return redirect('users');
            
        }

    }




    function show_user(Request $request , $id)
    {
        $user = User::find($id);
        return view('dashboard-front.user-details' , compact('user'));

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
