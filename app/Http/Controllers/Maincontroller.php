<?php

namespace App\Http\Controllers;

use App\ClientPost;
use App\models\BloodType;
use App\models\Category;
use App\models\City;
use App\models\Client;
use App\models\Governrate;
use Illuminate\Support\Facades\Hash;
use App\models\Post;
//use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePostRequest;
use App\Models\CityClient;
use App\models\DonationRequest;
use App\Models\Favourite;
use App\models\Notification;
use App\Models\Token;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



use function PHPUnit\Framework\returnSelf;

class Maincontroller extends Controller
{
    //


    function add_city(Request $request)
    {

        $city = new City();
        $city->name = $request->name;
        $city->governrate_id = $request->governrate_id;
        $city->save();
        return response()->json(['msg'=>'city added successfully']);
    }

    function cities(Request $request)
    {

        //$cities = City::all();

        
       // $data = $request->user()->client_city()->attach(3);
        $cities = CityClient::where('client_id' , 8)->get();
        return response()->json(['cities' => $cities]);

    }

    function add_governrate(Request $request)
    {
        $governrate = new Governrate();
        $governrate->name = $request->name;
        $governrate->save();
        return response()->json(['msg'=>'governrate added successfully']);

    }

    function governrates()
    {
        $governrates = Governrate::all();
        return response()->json(['governrates' => $governrates]);
    }

    function add_blood_type(Request $request)
    {
        $blood_type = new BloodType();
        $blood_type->name = $request->name;
        $blood_type->save();
        return response()->json(['msg'=>'blood_type added successfully']);

    }

    function blood_types()
    {
        $blood_types = BloodType::all();
        return response()->json(['blood_types' => $blood_types]);

    }


    function create_post(Request $request)
    {

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $post = new Post();
       // $client = Client::where('api_tokem' , $request->api_token)->first();
        $post->client_id = Auth::guard('client')->user()->id;//$request->client_id;
        $post->title = $request->title;
        $post->content = $request->content;


        //public/Images

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('Images'), $filename);
            $post->image= $filename;
        }

        $post->category_id = $request->category_id;
        $post->save();
        return response()->json(["msg"=>$post]);
       

    }

    function posts(Request $request)
    {

       // $client = Client::where('api_token' , $request->api_token)->first();
       
        $posts = Post::where('client_id' , auth()->guard('client')->user()->id)->get();
        return response()->json(["posts"=>$posts , 'user' => $request->user()]);
   

    }

    function post_details(Request $request)
    {
        $post = Post::where('id' , $request->post_id)->get();
        return response()->json(["post_details"=>$post]);
    }


    function add_category(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        
        return response()->json(["msg"=>"category added successfully"]);
        
    }

    function categories()
    {
        $categories = Category::all();
       // $version = app()->version();
        return response()->json(['categories'=>$categories]);
    }


    function create_donation_request(Request $request)
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
                return response()->json(['msg' =>  $donationrequest]);
            }
            else {
                # code...
            }

           
        }
        else {
            # code...
        }
        return response()->json(['msg' =>  $donationrequest]);
       
        
    }



    function donation_requests(Request $request)
    {
        $result = DonationRequest::where('client_id' , $request->user()->id)->get();
        return response()->json(['msg' => $result]);
    }



    function register_notification_token(Request $request)
    {
        $validation = validator()->make($request->all() , [
            'token' => 'required' ,
            'platform' => 'required|in:android,ios'
        ]);

        if ($validation->fails()) {
            # code...
            return response()->json(['msg' => 'failed']);
        }

        Token::where('token' , $request->token)->delete();
        $request->user()->tokens()->create($request->all());
        return response()->json(['msg'=> 'تم التسجيل بنجاح']);
        
    }




    function remove_notification_token(Request $request)
    {
        $validation = validator()->make($request->all() , [
            'token' => 'required' ,
            
        ]);

        if ($validation->fails()) {
            # code...
            $data = $validation->errors();
            return response()->json(['msg' => $data]);
        }

        Token::where('token' , $request->token)->delete();
        return response()->json(['msg'=> 'تم الحذف بنجاح']);


    }





    function profile(Request $request)
    {
        $validation = validator()->make($request->all() , [
            'password' => 'confirmed' , 
            'email' => Rule::unique('clients')->ignore($request->user()->id), 
            'phone' => Rule::unique('clients')->ignore($request->user()->id)
        ]);

        if ($validation->fails()) {
            # code...
            $data = $validation->errors();
            return "fake";
        }

        $loginuser = $request->user();
        $loginuser->update($request->all());


        if ($request->has('password')) {
            # code...
            $loginuser->password = bcrypt($request->password);

        }

        $loginuser->save();


        if ($request->has('governrate_id')) {
            # code...
            $loginuser->client_city()->detach($request->city_id);
            $loginuser->client_city()->attach($request->city_id);
        }

        if ($request->has('blood_type')) {
            # code...
            $bloodtype = BloodType::where('name' ,$request->blood_type )->first();
            $loginuser->blood_types()->detach($bloodtype->id);
            $loginuser->blood_types()->attach($bloodtype->id);

        }
        return "data";
        
    }

   
   


    function add_favourite(Request $request)
    {
        // $fav = new Favourite();
        // $fav->client_id = auth()->guard('client')->user()->id;
        // $fav->post_id = $request->post_id;
        // $fav->save();
        $fav = $request->user()->client_post()->attach($request->post_id ,[
            'client_id' => $request->user()->id ,
            'is_favourite' => true
        ]
        );
        return response()->json(['msg' => 'added to favourite successfully']);
    }


    function favourites(Request $request)
    {
        $data = array();
        $favourite = Favourite::where('client_id' , auth()->guard('client')->user()->id)->get();
        foreach ($favourite as $fav) {
            # code...
            
            array_push($data,Post::where( 'id' , $fav->post_id)->get());
        }
    //    $obj = new Post();
    //    $data = Post::with('post_client')->where('client_id' , $request->user()->id)->get();
//       $data = ClientPost::where('post_id' , $request->post_id)->get();
        return response()->json(['favourites' => $data]);
        
    }


    function clients_of_favourite_post(Request $request)
    {
        $data = array();
        $favourite = Favourite::where('post_id' , $request->post_id)->get();
        foreach ($favourite as $fav) {
            # code...
            
            array_push($data,Client::where( 'id' , $fav->client_id)->get());
        }
       // 
        return response()->json(['favourites' => $data]);
        
    }



    function settings()
    {
        
    }

    function notifications(Request $request)
    {
        
    }
    
    function notification_settings()
    {
        
    }


    function update_notification_settings()
    {
        
    }



    function contacts()
    {
        
    }


    function upload_file(Request $request)
    {

        // storage/app

        $file= $request->file('file_field');
        $filename= $file->getClientOriginalName();

       $res = Storage::disk('local')->put( $filename ,$file );
       return "uploaded";
    }
    
}



        // $city = City::where('id' , $donationrequest->city_id)->get();

        // $governrate = array();
        // foreach ($city as $fav) {
        //     # code...
            
        //     array_push($governrate,Governrate::where('id' , $fav->governrate_id)->get());
        // }

       // $govs = Governrate::where('id' , $city[0]->governrate_id)->get();
