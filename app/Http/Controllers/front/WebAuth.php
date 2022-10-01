<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\models\Client;
use App\models\Post;
use App\models\DonationRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;




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
        $client->assignRole('normal');
       // $client->client_role()->attach(4 , ['model_type' => 'normal_user' , 'model_id' => $client->id]);
        return redirect('index');
            
        }
     
        
    }
    function login(Request $request)
    {
        request()->validate([
            'phone' => 'required',
            'password' => 'required',
            ]);
     
            $credentials = $request->only('phone', 'password');
            if (Auth::guard('client_web')->attempt(['phone' => $request->phone , 'password' => $request->password])) 
            {
            
                $posts = Post::all();
                $donations = DB::table('donation_requests')->join('blood_types' , 'donation_requests.blood_type_id' , '=' , 'blood_types.id')
                ->join('cities' , 'donation_requests.city_id' , '=' , 'cities.id')
                ->select('donation_requests.id','donation_requests.patient_name','donation_requests.hospital_name','blood_types.name AS bloodtype_name' , 'cities.name AS cityname')
                ->get();
               // $clients = User::all();
                return redirect('index')->with(['posts' => $posts , 'donations' => $donations]);

            }
        else
        {
           return redirect('signin');
        }

    }




    function logout()
    {
        Auth::guard('client_web')->logout();
        return redirect('index');
    }

    
    
}
