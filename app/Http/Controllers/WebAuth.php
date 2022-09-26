<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Client;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class WebAuth extends Controller
{
    //

    function register(Request $request)
    {
        $validator = validator()->make($request->all() , [
            'name' => 'required',
            'email' => 'required',
            'phone' => ['required' , 'unique:clients'],
            'password' => 'required',
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
       // $client->client_role()->attach(4 , ['model_type' => 'normal_user' , 'model_id' => $client->id]);
        return redirect('index');
            
        }
     
        
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



        if (Auth::guard('client_web')->validate(['phone' => $request->phone , 'password' => $request->password])) {

            # code...
            $client = Client::where('phone' , $request->phone)->first();

            if($client)
        {
            if(Hash::check($request->password , $client->password))
            {
                return redirect('index');//response()->json(['api_token' => $client->api_token , 'user'=>$client]);

            }
            else
        {
            return returnjson(0,'failed','password is not valid');
        }
            
            
        }
        else
        {
            return returnjson(0,'failed','phone number is not valid');
        }
           // 
            }
        else {
            return returnjson(0,'failed','validation error ');
        } 

    }

    
    
}
