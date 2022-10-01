<?php

namespace App\Http\Controllers\front;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Category;
use App\models\Token;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\models\Post;
use Illuminate\Support\Facades\Storage;


class WebLogic extends Controller
{
    //

    function create_donation(Request $request)
    {
        $rules = [
            'patient_name' => '' , 
            'patient_age' => '' , 
            'blood_type_id'
        ];

        $validation = validator()->make($request->all() , $rules);

        if ($validation->fails()) {
            # code...
            $data = $validation->errors();
            return response()->json(['msg' => $data]);
        }

       
       
       
        $donationrequest = $request->user()->donations()->create($request->all());

        // --> people will send notification to them

        $clientsIds = $donationrequest->city->governrate->clients()
         ->whereHas('bloodtype' , function($q) use ($request , $donationrequest){

              $q->where('blood_type_id' , $donationrequest->blood_type_id);

          })->pluck('clients.id')->toArray();

       // dd($donationrequest->id);
       

        if (count($clientsIds)) {
            # code...
            $notification = $donationrequest->notifications()->create([
                'title' => 'اشعار جديد' ,
                'content' => $request->user()->name . "محتاج تبرع بالدم "  ,
                'donation_requests_id' => $donationrequest->id
            ]);

            $notification->notification_client()->attach($clientsIds);

            $tokens = Token::whereIn('client_id' , $clientsIds)->where('token' , '!=' , null)->pluck('token')->toArray();

            if (count($tokens)) 
            {
                # code...
                // $title = $notification->title;
                // $body = $notification->content;
                // $data = [
                //     'donation_requests_id' => $donationrequest->id
                // ];

                // $send = notifybyfirebase($title , $body , $tokens , $data);
                // info('firebase result' , $send);

                $posts = Post::all();
                $donations = DB::table('donation_requests')->join('blood_types' , 'donation_requests.blood_type_id' , '=' , 'blood_types.id')
                ->join('cities' , 'donation_requests.city_id' , '=' , 'cities.id')
                ->select('donation_requests.id','donation_requests.patient_name','donation_requests.hospital_name','blood_types.name AS bloodtype_name' , 'cities.name AS cityname')
                ->get();
                return redirect('index')->with(['posts' => $posts , 'donations' => $donations]);
            }
            else {
                # code...
            }

           
        }
        else {
            # code...
        }

        $posts = Post::all();
                $donations = DB::table('donation_requests')->join('blood_types' , 'donation_requests.blood_type_id' , '=' , 'blood_types.id')
                ->join('cities' , 'donation_requests.city_id' , '=' , 'cities.id')
                ->select('donation_requests.id','donation_requests.patient_name','donation_requests.hospital_name','blood_types.name AS bloodtype_name' , 'cities.name AS cityname')
                ->get();
                return redirect('index')->with(['posts' => $posts , 'donations' => $donations]);
       // return response()->json(['msg' =>  $donationrequest]);

    }


    function create_post_view()
    {
        $categories = Category::all();
        return view('sitefront.create_post')->with('categories' , $categories);
    }




    function create_post(Request $request)
    {
        $request->validate([
            'image' => 'required',
        ]);
        
        $post = new Post();
       // $client = Client::where('api_tokem' , $request->api_token)->first();
        $post->client_id = Auth::guard('client_web')->user()->id;//$request->client_id;
        $post->title = $request->title;
        $post->content = $request->content;


        //public/Images

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
         //   $file-> move(public_path('Images'), $filename);
         Storage::put('Images'.$filename , $file , 'local');
            $post->image= $filename;
        }

        $post->category_id = $request->category_id;
        $post->save();

        $posts = Post::all();
                $donations = DB::table('donation_requests')->join('blood_types' , 'donation_requests.blood_type_id' , '=' , 'blood_types.id')
                ->join('cities' , 'donation_requests.city_id' , '=' , 'cities.id')
                ->select('donation_requests.id','donation_requests.patient_name','donation_requests.hospital_name','blood_types.name AS bloodtype_name' , 'cities.name AS cityname')
                ->get();
        return redirect('index')->with(['posts' => $posts , 'donations' => $donations]);
        
    }



    function posts()
    {

    }




    function donation_requests()
    {

    }

}
