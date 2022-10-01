<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\models\Post;
use App\models\Governrate;
use App\models\BloodType;
use App\models\City;
use App\models\DonationRequest;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;


class FrontController extends Controller
{
    //

    function index()
    {
        $posts = Post::all();
        $donations = DB::table('donation_requests')->join('blood_types' , 'donation_requests.blood_type_id' , '=' , 'blood_types.id')
        ->join('cities' , 'donation_requests.city_id' , '=' , 'cities.id')
        ->select('donation_requests.id','donation_requests.patient_name','donation_requests.hospital_name','blood_types.name AS bloodtype_name' , 'cities.name AS cityname')
        ->get();
        return view('sitefront.index')->with(['posts' => $posts , 'donations' => $donations]);
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
       // $requests = DonationRequest::all();

       $requests = DB::table('donation_requests')->join('blood_types' , 'donation_requests.blood_type_id' , '=' , 'blood_types.id')
       ->join('cities' , 'donation_requests.city_id' , '=' , 'cities.id')
       ->select('donation_requests.id','donation_requests.patient_name','donation_requests.hospital_name','blood_types.name AS bloodtype_name' , 'cities.name AS cityname')
       ->get();

       // $bloodtype = $requests->bloodtype->name;
       
        return view('sitefront.donations')->with(['requests' => $requests ]);
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
        $categories = $post->category->name;
        return view('sitefront.post_details')->with(['post' => $post , 'categories' => $categories]);
    }
    function donation_details(Request $request)
    {
        $donation = DB::table('donation_requests' )->where('donation_requests.id' , '=' , $request->id)
          ->join('blood_types' , 'donation_requests.blood_type_id' , '=' , 'blood_types.id')
         ->join('cities' , 'donation_requests.city_id' , '=' , 'cities.id')
        ->select('donation_requests.id','donation_requests.patient_age',
        'donation_requests.patient_name','donation_requests.hospital_name',
        'blood_types.name AS bloodtype_name' , 'cities.name AS cityname' , 'donation_requests.bags_num' ,
        'donation_requests.hospital_address' , 'donation_requests.details' , 'donation_requests.patient_phone' ,
        'donation_requests.latitude' , 'donation_requests.longitude')
        ->first();

        return view('sitefront.donation_details')->with(['donation' => $donation]);
    }
    function create_donation()
    {
        $governrates = Governrate::all();
        $bloodtypes = BloodType::all();
        $cities = City::all();
        return view('sitefront.create_donation')->with(['governrates' => $governrates , 'bloodtypes' => $bloodtypes , 'cities' => $cities ]);
    }


    function about_app()
    {
        return view('sitefront.about_app');
    }
}
